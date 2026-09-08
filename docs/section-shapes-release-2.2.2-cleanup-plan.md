# Section Shapes - 2.2.2 Review Follow-Up

## Status and purpose

**Sessions 1-4 implemented; Session 5 checks recorded with open release gates.**
Automated checks and key Chrome save/reopen flows passed. Remaining browser and
layout acceptance checks below are not yet signed off.

Address the review of `release-2.2.2` against `main`, completed on 2026-09-07.
The reviewed branch tip was `1d96f355`; the comparison main was `4f6decc8`.
Local WordPress core reports version 7.1. The review passed 38 PHPUnit tests
with 126 assertions, nine primary-term contract checks, PHP/JS/SCSS lint,
admin JavaScript lint, and diff whitespace checks. Additional targeted
reproductions exposed the five issues below despite those passing checks.

This is a focused follow-up to [Group Shape Masks](group-shape-masks-plan.md)
and [Section Frames](group-frame-presets-plan.md), not another feature phase.
Keep the existing Settings API form, native array option, preset IDs, root-mask
rendering, shared SCSS, and two whole-shape sizing behaviors.

## Review findings and outcomes

| Finding | Required outcome | Session |
| --- | --- | --- |
| Explicit Top frame selection disappears during serialization | Editor, saved attributes, and PHP agree after switching modes and reopening | 1 |
| Already-normalized SVGs are rejected | Correct, unchanged SVG markup remains a valid source | 2 |
| Single-quoted viewBox is not recognized | Equivalent single/double-quoted viewBoxes produce the same ratio | 2 |
| Hidden height inputs block whole-shape saves | Only fields relevant to the selected type participate in validation/submission | 3 |
| Hidden cells misalign table headings | Every row has consistent columns and clearly labeled settings | 3 |

The review also identified bounded cleanup opportunities: overly defensive
media-picker fallbacks, a large Section Shapes addition to `utils.js`, repeated
preset normalization, uncached failed SVG reads, and release notes filed under
2.2.1. Sessions 4 and 5 cover these without requiring a redesign.

## Working rules

- Follow the governing `app/public/AGENTS.md` and `app/public/OWNERSHIP.md`.
  FlexLine owns these changes; child-theme artwork and uploaded SVGs stay intact.
- For each confirmed bug, first add a test that fails for the reproduced behavior,
  make the smallest correction, and rerun that test and its related suite.
- Test observable behavior: WordPress serialization, rendered form validity,
  normalized SVG sources, and PHP rendering. Source-string assertions alone do
  not establish correctness.
- Use PHPUnit and the existing WordPress JavaScript test tooling/packages.
  Declare any directly imported test dependency. Keep test setup small; no new
  browser automation framework is required for this work.
- Keep tests isolated from real posts/options. Use temporary test attachments or
  fixtures and clean up test state. Record any manual changes to local test pages.
- Preserve saved selections when changing modes and explicit Content Shift
  precedence, including zero values and the mobile-reset behavior.
- Preserve Settings API nonce/capability enforcement, escaped output, Media
  Library attachment checks, bounded reads, and the absence of remote SVG fetching.
- Build generated assets from source. `npm run prod` also applies automatic fixes;
  inspect its resulting diff and verify the final files.
- Record each session's files, tests, manual observations, and remaining gaps in
  this document. A passing unit test is not a substitute for a real admin save.
- Execution guidance from the user: keep testing proportional and move faster.
  Reproduce the bug, verify the fix, and avoid repeating broad checks without a
  new failure or meaningful change. Consolidate remaining manual checks in Session 5.

## Session 1 - Preserve explicit shape modes

**Status:** Implemented; automated verification passed. Live browser check deferred.

**Problem:** `flexlineFrameMode` defaults to `top`. WordPress omits default values
from saved block comments. When retained whole/bottom selections exist, PHP then
infers a different mode. The same default prevents the editor from inferring
older top-and-bottom selections consistently with PHP.

**Changes:**

- Represent an absent mode separately from an explicit `top` selection. Prefer
  removing the schema default and keep the existing fallback for absent values.
- Ensure all four explicit modes serialize and resolve consistently. Retained
  selections must not override an explicit mode.
- Keep editor and PHP fallback behavior aligned for blocks lacking a mode.
- Add a brief comment explaining why the schema must not default to `top`.

**Primary files:** `src/js/blocks/attributes.js`, Section Shapes helpers in
`src/js/blocks/utils.js`, `inc/blocks/block-extensions.php`, focused JS tests,
and `tests/Unit/SectionFramePresetsTest.php`.

**Verification:** Use the installed WordPress block serializer/parser, not a mock
serializer. Cover whole -> top, both -> top, top -> whole -> top, bottom-only and
both selections without a mode, new empty Groups, and whole mode with a missing
preset. Check retained selections and overlap behavior. Rebuild editor assets
before checking save/reload in the local editor and the front end.

**Exit:** Explicit Top frame remains Top frame across serialization, save, reopen,
and PHP rendering; legacy inference and selection restoration still work.

### Session 1 results - 2026-09-07

- Removed the `top` schema default in `src/js/blocks/attributes.js` and documented
  why it must remain unset. Existing editor/PHP fallback helpers needed no changes.
- Added 12 tests in `src/js/blocks/test/section-shape-mode.test.js`, using actual
  WordPress block serialization/parsing and the existing editor preview helper.
  Only inspector component imports are mocked; no new dependencies were installed.
- Before the fix, seven JS cases failed: explicit Top frame, switches back to Top,
  and older bottom/both/whole selections without a mode. All 12 passed afterward.
- Added PHP coverage for explicit-mode precedence, absent-mode inference, and
  restoring only the top frame/overlap with retained bottom/whole selections.
  `composer test` passed: 41 tests, 138 assertions (PHP 8.2.29).
- Added `npm run test:js` and documented the test commands in README.
- `npm run prod` passed with Node 24.14.0, including PHP/SCSS/JS checks and the
  production build. Its initial lint run identified missing Jest environment
  metadata in the new test file; that was corrected before the successful run.
- Rebuilt `assets/built/js/block-extensions.js`; no unrelated generated assets changed.
- Per user guidance, no extended browser testing was performed. A blank local Add
  Page tab was opened and closed without entering content or saving a page;
  WordPress may have created its normal auto-draft. Real editor save/reload and
  frontend visual confirmation remain explicit Session 5 checks.
- No commit made. The other four review fixes remain in Sessions 2 and 3.

## Session 2 - Make SVG normalization reliable

**Status:** Implemented; automated verification passed. Live browser check deferred.

**Changes:**

- Accept successful normalization when output equals input. Only an actual
  parsing/validation failure should yield an unavailable source.
- Correct viewBox extraction so single and double quotes behave identically.
  Keep root-attribute handling focused; use a structured parser if needed to
  avoid fragile parsing, with external resource loading/entity expansion disabled.
- Preserve the distinct stretch/preserve policies, viewBox-derived ratios,
  removal of conflicting width/height in proportional mode, and frame URL fallback.
- Keep whole-mask failure behavior explicit: unreadable/oversized sources remain
  unavailable; proportional mode still requires a usable viewBox.
- Cache failed normalization/read results for the current request where practical,
  using the same attachment/policy boundaries as successful results.

**Primary files:** `inc/functions/class-section-shape-svg-source.php`,
`tests/Unit/SectionFramePresetsTest.php`, and SVG fixtures as needed.

**Verification:** Add cases for already-correct `none` and `xMidYMid meet`, quote
styles, conflicting root sizes, missing/invalid viewBoxes, unavailable files,
the 256 KiB read boundary, and one attachment used under both policies. Repeated
successful and failed lookups should avoid redundant work within one request.
Public source resolution must work, not only the private normalizer.

**Exit:** Valid equivalent SVG exports remain usable in admin, editor, and front
end without manual markup edits or changes to the original attachment.

### Session 2 results - 2026-09-07

- Updated `inc/functions/class-section-shape-svg-source.php` to accept unchanged
  normalized SVG markup and use `PREG_UNMATCHED_AS_NULL` for correct viewBox
  capture selection. Both fixes fit the existing helper without adding a parser
  dependency or changing the uploaded artwork.
- Cache empty source results per attachment/policy and empty aspect-ratio results
  per attachment for the current request. Failures do not repeatedly resolve/read
  the same source, and a failed proportional policy does not suppress fill policy.
- Added five focused PHPUnit methods covering already-correct policies, quote
  styles, failure caching, invalid viewBox policy separation, and the exact
  256 KiB boundary with frame URL fallback. Temporary files are removed in finally
  blocks, and tests verify that original SVG content remains unchanged.
- All five new methods failed before the fix. Afterward, `composer test` passed:
  46 tests, 166 assertions, including existing conflicting-metadata, missing-viewBox,
  successful-cache, and policy-separation coverage (PHP 8.2.29).
- `npm run prod` passed with Node 24.14.0, including PHP/SCSS/JS checks and the
  production build. Production changes for this session are confined to the PHP
  helper; Session 1 work remains intact.
- Extended browser verification remains in Session 5 per the user's request to
  keep checks proportional. No posts, presets, or uploaded attachments changed.
- No commit made. Session 3 addresses the two remaining admin review findings.

## Session 3 - Correct preset table behavior

**Status:** Implemented; automated checks and desktop admin layout check passed.

**Changes:**

- Use a stable five-column table: Label, Type, SVG Shape, Settings, Actions.
- Put labeled Min Height, Preferred Height, and Max Height inputs inside the
  Settings cell for frames; show Whole Shape Behavior there for whole sections.
- Hide and disable inactive field groups. Re-enable them when switching back,
  preserving their in-memory values until normal save normalization occurs.
- Ensure Label, Type, and behavior controls have accessible names. Allow the
  settings layout to wrap at narrow admin widths without moving table headings.
- Preserve row IDs, reorder/remove behavior, SVG selection/preview, one save
  button, submitted-empty clearing, and return to the Section Shapes tab.

**Primary files:** `inc/theme-options/render-theme-frames.php`,
`inc/theme-options/theme-page.php`, `assets/js/theme-options.js`, and focused
admin DOM tests using the rendered row structure.

**Verification:** Reproduce an invalid frame height followed by a switch to
Whole section. Confirm form validity and submitted fields, then switch back and
confirm frame validation resumes. Check mixed, frame-only, whole-only, and empty
tables; add/remove/reorder; keyboard labels/focus; and narrow/wide layouts.
Perform real add/edit/save/reload cycles for label, SVG, type, behavior, and order.
Test global disable/re-enable without losing presets.

**Exit:** Relevant settings save correctly, invisible fields cannot block a save,
and controls remain under the correct heading for every row type.

### Session 3 results - 2026-09-07

- Updated `render-theme-frames.php` to render five stable columns with labeled
  height/behavior controls inside Settings. Label and Type now have accessible
  names. PHP initializes inactive fields as hidden and disabled.
- Updated `assets/js/theme-options.js` to hide and disable inactive settings on
  initialization, row creation, and type changes, restoring values and validation
  when switching back. Submitted option names and preset IDs remain unchanged.
- Added wrapping settings styles and constrained input widths in `theme-page.php`.
- Added three admin DOM tests backed by the actual PHP-rendered manager via
  `tests/Unit/fixtures/render-section-shapes.php`, reusing existing isolated
  WordPress shims. Tests cover table structure, invalid hidden heights and FormData,
  restoration, row creation, reorder, removal, IDs, and reindexed field names.
- The three regression cases failed before the correction. Final JavaScript
  suites passed: 15 tests. PHP suite passed: 46 tests, 166 assertions.
- `npm run prod`, explicit admin JS lint, and diff whitespace checks passed.
  The first build caught test-harness use of eval; replaced it with Jest module
  isolation before the successful build. No new dependencies were needed.
- Read-only desktop Chrome check on the local Section Shapes tab confirmed the
  existing two frame/two whole-shape rows align under Settings and Actions, with
  working SVG previews. No settings were saved or real presets modified.
- Real save/reload, picker replacement, narrow/mobile, and cross-browser checks
  remain in Session 5. All five original code-review bugs now have focused fixes;
  Session 4 covers maintainability and documentation. Nothing committed.

## Session 4 - Simplify and document

**Status:** Implemented; automated checks passed. Live picker confirmation remains in Session 5.

**Code cleanup:**

- Move the cohesive Section Shapes editor helpers/controls into one dedicated
  module and update consumers. Keep the existing Content Shift integration and
  avoid creating a generic control/preset framework or an import cycle.
- Simplify media attachment extraction around the actual WordPress media model.
  Remove fallback branches only after the tested picker confirms they are
  unnecessary. Preserve any fallback supported by a concrete integration need.
- Inspect repeated preset normalization with a representative mixed library.
  Make a small request-local optimization only if measurements justify it and
  same-request option updates remain correct. Otherwise record the result and
  defer it. Do not introduce persistent caches or cache-invalidation machinery.

**Documentation and user clarity:**

- Update README and concise admin SVG guidance with the 256 KiB whole-mask limit,
  local readability requirement, and proportional-mode viewBox requirement.
- Provide a useful warning when a saved whole preset cannot be rendered, explaining
  the known cause where available. Keep saved definitions intact; do not silently
  delete an unavailable preset or add a new upload/save endpoint.
- Move only this branch's Section Shapes release material out of
  `docs/releases/pr-notes-2.2.1.md` into `docs/releases/pr-notes-2.2.2.md`.
  Preserve the actual 2.2.1 history and describe fixes as complete only after
  their sessions pass.
- Link this follow-up from the completed feature plans. Preserve their historical
  checks while distinguishing them from these newly reproduced issues.
- Document any deferred cleanup and why it would add complexity without a proven
  benefit. No version bump, broad naming migration, or new sizing controls here.

**Verification:** Run the regression suites after the module move and picker
cleanup. Check the real media picker and unavailable-preset warning. Confirm
documentation matches final labels and supported behavior. Record any performance
measurement rather than claiming an unmeasured improvement.

**Exit:** Feature code is easier to locate, support guidance explains known
limitations, and 2.2.2 has accurate release notes.

### Session 4 results - 2026-09-07

- Extracted Section Shapes controls and preview helpers into
  `src/js/blocks/section-shapes.js`. Content Shift remains shared in utils;
  imports flow one way, with no new framework or dependencies.
- Verified WordPress core's `wp_prepare_attachment_for_js()` supplies id, url,
  title and filename. Removed duplicate model/property extraction fallbacks.
  A focused picker test checks submitted ID/URL, preview, label and non-SVG rejection.
- Added a server-rendered warning for saved unavailable whole shapes; kept
  definitions intact. The warning describes source requirements rather than
  inventing a specific read failure. Replacing the selection clears the stale warning;
  the normal save/reload validates the new source. Covered with the real PHP fixture.
- Updated README/admin guidance with local readability, 256 KiB and viewBox
  requirements. Moved only Section Shapes release history to 2.2.2 notes and
  linked both completed feature plans to this follow-up.
- Measured normalization with PHP 8.2.29 and existing isolated WordPress shims:
  median of 101 batches, 40 get_presets calls per batch, alternating frame/mask
  rows. 20 presets: 0.474 ms; 100 presets: 2.366 ms. This is a normalization
  microbenchmark, not a live database/page benchmark. No additional cache justified;
  retain same-request option freshness without invalidation machinery.
- JavaScript: 17 tests passed. PHPUnit: 46 tests, 166 assertions passed.
  Production build and PHP/SCSS/source-JS checks passed; admin JS checked separately.
- Per the requested focused pace, live picker replacement and warning appearance
  are deferred to Session 5 alongside save/reload and device checks. No real
  presets or content modified, no version bump, and no commit.

## Session 5 - Production build and release verification

**Status:** Verification pass recorded; remaining release gates listed below.

Run from the FlexLine theme directory using a supported installed Node version
and the local PHP toolchain. Record actual versions and commands in the session
results; the shell's default Node may differ from the build environment.

1. Run the focused PHP and JavaScript regression suites added in Sessions 1-3.
2. Run `npm run prod`; inspect all formatter and generated-asset changes.
3. Run `composer test`, `npm run test:primary-terms`, `npm run lint-php`,
   `npm run lint-js`, and `npm run lint-style` against the final files.
4. Explicitly lint `assets/js/theme-options.js`, which the normal source lint
   command does not cover, and run `git diff --check`.
5. Recheck the affected flows with the built assets and refreshed editor config.

**Manual acceptance matrix:**

- Mixed preset library: save/reload, replace SVG, rename, reorder, delete all,
  and disable/re-enable the feature.
- All four block modes: change, save, reopen, and compare editor/front end.
- Top-only after whole/both mode, retaining prior selections and overlap values.
- Whole shapes: fill/proportion with wide/tall SVGs and the corrected SVG fixtures.
- Default/constrained/wide/full Groups, nested Cover content, padding, and content
  growth; unsupported Row/Stack/Grid layouts still suspend shapes.
- Content Shift: inactive, explicit zero, active per edge, and mobile reset.
- Site Editor and synced-pattern save/reopen using disposable local test content.
- Desktop Chrome/Safari and mobile Chrome/Safari, with responsive layout checks.
  Record actual device/browser testing separately from viewport emulation.

**Exit:** The five review issues have passing regression tests and the relevant
real workflows pass with production assets. Any unavailable browser/device or
other unverified check is recorded as an open release gate, never marked passed.
Prepare a detailed commit message covering behavior, tests, docs, and remaining
limits. Commit/release actions happen when requested.

## Session results template

### Session 5 results - 2026-09-07

- No additional runtime fixes were needed in the exercised paths.
- Final production build: `npm run prod` passed with Node 24.14.0 and PHP 8.2.29.
  Only the expected block-extensions bundle is changed among tracked built assets.
- `composer test`: 46 tests / 166 assertions.
- `npm run test:js -- --watch=false`: 17 tests.
- `npm run test:primary-terms`: nine checks.
- `npm run lint` (JS, SCSS, PHP), explicit
  `npx wp-scripts lint-js assets/js/theme-options.js`, and `git diff --check`: passed.
- Live WordPress 7.1 / desktop Chrome: added a disposable preset, selected an
  existing SVG via the real media picker, saved, and confirmed its label and SVG
  after navigation. Renamed it, entered invalid frame min-height 0, switched to
  whole section/proportion, replaced the SVG, reordered, and saved successfully.
- Disabled/saved/re-enabled/saved the feature and confirmed all five rows remained.
  Removed the disposable row and saved; the original four labels, SVGs, types,
  behavior choices and order were restored. WP-CLI confirmed the four saved
  definitions and attachment IDs. No original preset was removed.
- Created unpublished draft 121740 with constrained Groups in all four modes,
  each retaining top, bottom and whole selections. Saved in the visual editor,
  reopened, and confirmed no invalid-block notice. Frontend preview DOM showed
  exactly the matching mode classes and non-none CSS masks for all four Groups.
- Reopened whole-mode controls showed the saved selection. Changed whole to top
  in the inspector and saved; WP-CLI confirmed explicit top mode with retained
  bottom/whole selections in post_content. This supplements the serialization tests.
- Inspected the desktop admin screenshot: mixed row controls and previews align.
  Opened the editor Mobile viewport, then restored Desktop. This was viewport
  emulation only, not device coverage or full responsive visual acceptance:
  the minimal unpadded text Groups visibly clip content within their masks.
- Removed the disposable draft through WP-CLI (Success: Trashed post 121740).
  The admin Trash attempt did not change its status; cleanup was verified through
  the CLI instead. All verification tabs closed; existing user tabs/content untouched.
- Draft follow-up commit message: `docs/releases/commit-message-2.2.2-cleanup.txt`.
  No commit, publication, version bump or attachment modification.

**Open release gates (not marked passed):**

- Desktop Safari and physical mobile Chrome/Safari; narrow admin layout.
- Site Editor and synced-pattern save/reopen.
- Expanded visual matrix: wide/tall proportion shapes, nested Cover, padding,
  content growth, default/wide/full Groups, unsupported layouts, and Content Shift
  edge/mobile-reset combinations. Prior feature checks remain historical evidence.
- Live delete-all preset clearing and unavailable-SVG warning display; isolated
  automated coverage is not a substitute for those UI checks.
- Live both-to-top transition and reopening after the final whole-to-top save
  (the saved attributes were confirmed, but that final state was not reopened).

Append this record after each completed session:

- Session and completion date:
- Files changed and rationale:
- Failing regression reproduced:
- Final tests/commands and results:
- Manual checks and environment:
- Remaining gaps or deferred work:

## Completion checklist

- [x] Session 1: Explicit modes survive automated serialization/reopening checks; live confirmation tracked in Session 5.
- [x] Session 2: Correct SVG exports normalize reliably in public-source regression tests; live confirmation tracked in Session 5.
- [x] Session 3: Admin validation and table alignment are corrected; remaining live checks tracked in Session 5.
- [x] Session 4: Focused cleanup and 2.2.2 documentation are complete.
- [x] Session 5: Production build and verification results are recorded; open release gates remain above.
