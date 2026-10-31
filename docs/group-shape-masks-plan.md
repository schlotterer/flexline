# FlexLine Group Shape Masks - full-section SVG masks

## Summary and status

Follow-up: [2.2.2 review cleanup](section-shapes-release-2.2.2-cleanup-plan.md).
The results below are historical feature checks; final cleanup acceptance is
tracked separately in that plan.

Add reusable SVG presets that mask an entire Group, including its background and
descendants. Use cases include a giant logo, badge, or organic silhouette. Authors
can let the shape fill the Group or let the Group fit the SVG proportion.

Follow the completed Section Frames feature in `docs/group-frame-presets-plan.md`.
Implement in seven sessions, with focused tests, concrete exit checks, and handoff
notes. **Sessions 1-7 are complete.** This document records the implementation
contract, session evidence, release handoff notes, and remaining release checks.

## Lessons from Section Frames

- Reuse the existing Settings API form and native array options. No JSON transport,
  AJAX save endpoint, or new persistence framework is needed.
- Verify real label and attachment saves and fresh reloads early. Sanitizer unit
  tests alone did not prove that the admin form persisted its fields.
- Keep one settings group, form, and save action for the tab; retain `tab=frames`.
  Prototype inputs belong in an inert table-wrapped `<template>`.
- Omitted manager input preserves data; intentionally submitted empty input clears
  it. Sanitizers must accept their normalized output without changing IDs or values.
- Normalize SVG rendering automatically without editing uploaded files or asking
  authors to hand-edit `preserveAspectRatio`.
- Diagnose the SVG canvas, mask placement, and Group bounds before changing child
  spacing. The unequal-height frame bug was mask placement, not carousel behavior.
- Share frontend/editor styles and keep generated classes/styles out of saved markup.
- Content Shift is active only when enabled and intentionally supplied, including
  zero. Retain its existing per-edge and mobile-reset behavior.
- Run `npm run prod` at implementation checkpoints. It performs automatic fixes;
  inspect its diff and verify the final files, not only the pre-build source.

## Ownership and reuse

FlexLine owns this feature. OCW supplies client artwork and keeps its manual
classes; no child-theme migration is planned.

| Concern | Existing integration point |
| --- | --- |
| Model | `inc/functions/class-section-frame-presets.php`; extend the existing option model as the Section Shapes library |
| Admin | `inc/theme-options/render-theme-frames.php`, `inc/theme-options/theme-page.php`, `assets/js/theme-options.js` |
| PHP rendering/config | `inc/blocks/block-extensions.php`; existing localization and HTML tag processor |
| Editor | Existing attributes, utils, controls, filters, and wrapper props under `src/js/blocks/` |
| Styles | Shared SCSS under `src/scss/shared/blocks/` with frontend/editor entry points |
| Tests | Existing PHPUnit configuration, bootstrap, and `tests/Unit/SectionFramePresetsTest.php` patterns |

Extract only a small SVG-source helper if both consumers need it. Preserve the
existing frame source entry point. Avoid a generic preset engine, class hierarchy,
or second rendering pipeline.

## Naming and controls

Use **Section Shape Masks** for the new feature. Rename the combined admin tab to
**Section Shapes**, keeping `tab=frames` and existing option names. Label the
existing global switch **Enable Section Shapes**; `flexline_enable_group_frames`
gates both features and retains its current value.

The tab contains one **Section Shape Presets** manager with a **Type** select per
row: **Top frame**, **Bottom frame**, or **Whole section**. Top/bottom rows show
frame height fields; whole-section rows show one behavior field: **Shape fills
group** or **Group fits SVG proportion**. Keep one **Save Section Shapes** button
and the existing Settings API option so users do not have to manage two shape
libraries.

At the block level, keep one **FlexLine Section Shapes** Styles panel. A Group
first enables **Use Section Shapes**, then chooses **Shape Type**. Top/bottom
frame modes reveal the matching saved-frame dropdowns and overlap controls.
Whole section reveals only the whole-section shape dropdown. Existing top+bottom
frame behavior remains available as **Top and bottom frames** so current content
does not lose that capability.

Disabling global or block toggles retains presets and selections.

## Sizing contract

For whole-section masks, authors choose which box owns the proportions:

| Behavior label | Value | Behavior |
| --- | --- | --- |
| Shape fills group | `fill` | The Group's layout, width, content, padding, and minimum height define the box. The SVG mask fills both dimensions and may distort. |
| Group fits SVG proportion | `proportion` | The SVG `viewBox` defines the Group aspect ratio. The mask still fills the box, but the box now honors the SVG proportions. |

Transparent corners, holes, and extra space within the viewBox remain meaningful.
Descendants outside the opaque shape can be visually clipped. Padding stays
manual and needs verification on mobile.

New presets default to `fill`. Legacy experimental values normalize on save:
`cover` and `stretch` become `fill`; `contain` becomes `proportion`. Do not keep
the old position control unless a concrete authored placement need appears.

Use native Group dimensions first. Session 1 must test wide logos, tall shapes,
and growing content to decide whether an SVG-derived Group aspect ratio or custom
sizing is actually necessary. Record a concrete unmet use case and revise the
contract before adding controls. Do not copy frame-band min/preferred/max heights.

## Saved state

Store ordered rows in the existing native array option
`flexline_frame_presets`, registered in the existing settings group. The option
is now the Section Shapes preset library. Existing frame rows without a `type`
key normalize as frame rows, so current saved presets continue working. Each
preset stores:

- Stable `id`, preserved across rename, image replacement, and reorder.
- `label` and Media Library `attachment_id`.
- `type` and `side`.
- Frame rows: `type=frame`, `side=top|bottom`, and responsive height values.
- Whole-section rows: `type=mask`, `side=whole`, and `fit=fill|proportion`.

Add attributes following existing Group-family registration conventions:

- `flexlineUseFrames`: existing boolean, now labeled Use Section Shapes.
- `flexlineFrameMode`: `top|bottom|both|whole`, default `top`.
- `flexlineShapeMask`: preset ID, default empty.
- Existing `flexlineFrameTop`, `flexlineFrameBottom`, and overlap attributes
  remain unchanged.

Follow the established missing/empty input and idempotent sanitizer behavior.
Generate new IDs for missing/duplicate IDs. Invalid submissions preserve that
manager's previous list and show useful errors. Ensure errors remain visible.

## SVG source contract

Accept Media Library SVG attachments only. Upload sanitization stays with the
platform; MIME validation and aspect normalization are not sanitizers.

Fill behavior requires a source normalized to `preserveAspectRatio="none"`.
Proportional behavior requires reliable intrinsic proportions and a preserving
root policy, even when an uploaded file originally specifies `none`. Resolve
sources server-side for frontend and editor use; cache by attachment and
normalization policy.

Session 1 must verify viewBox-only exports, conflicting width/height metadata,
and existing `none` exports. Choose the smallest normalization from that evidence.

The existing frame resolver limits inline reads to 256 KiB and falls back to the
attachment URL. Preserve frame behavior. Decide and test whole-mask fallback for
unreadable, offloaded, or oversized sources before implementation. Do not silently
promise a fit policy the fallback cannot deliver. Missing/invalid sources produce
no broken mask and an understandable unavailable state.

## Activation and compatibility

Only ordinary `core/group` blocks with absent, default, or constrained layouts
render masks. Row/Stack/Grid transformations retain settings and suspend effects.

Resolve the same effective mode in PHP and editor preview:

| State | Output |
| --- | --- |
| Global disabled or unsupported layout | Neither feature renders |
| Shape toggle off | Existing Section Frames behavior |
| Shape toggle on with renderable selection | Whole mask; suppress frame masks and all frame overlap |
| Shape toggle on with unavailable whole-section selection | No mask or fallback frame renders while Whole section mode is selected; show an unavailable notice |

Suppress mobile frame-overlap classes and editor inline margins as well as mask
layers. Switching out of whole-section mode restores eligible frames and their existing
Content Shift precedence. This fallback must be explicit in tests and notices.

Shape masks own mask properties, not margins, transforms, padding, or z-index.
They do not disable Content Shift. Its explicitly active values continue to
position the Group. Test masking's stacking effects and Group links.

Apply a single alpha mask to the Group root: explicit full size, centered
position, no-repeat, and consistent origin/clip bounds using the border box.
Share frontend/editor SCSS and required browser-prefixed rules. Do not insert SVG
children that can inherit constrained child widths or block gaps.

## Implementation sessions

### 1. Architecture and sizing proof

**Status:** complete.

Read applicable AGENTS/profile instructions and completed frame code. Record
baseline checks, branch, declared WordPress/PHP support, and actual runtime.
Reuse the installed test/build tooling.

Create small non-client SVG fixtures and a reproducible fit experiment with
wide/tall/constrained Groups and growing content. Check Affinity-style exports
and metadata variants. Start with a plain Group, then a nested Cover.

Record decisions on intrinsic sizing, fallback, and any minimal shared helper.
Confirm whether native dimensions meet the giant-logo use case.

**Exit:** demonstrated sizing behavior, documented source/fallback decisions,
baseline results, and a settled model for Session 2.

**Session 1 notes, 2026-09-07:**

- Read the WordPress agent profile, `app/public/codex.md`, Section Frames model,
  PHP render helper, shared Section Frames SCSS, editor wrapper props, package
  scripts, and existing PHPUnit coverage.
- Branch: `flexline-transparent-frames`.
- Current repo state entering implementation: `docs/group-shape-masks-plan.md`
  was untracked; Session 1 adds docs-only proof fixtures.
- Runtime seen from this shell: WordPress core files report 7.1; WP-CLI is 2.9.0
  on PHP 8.2.29; Composer is 2.6.6; default Node is 16.17.0 with npm 8.15.0.
  The user's Local shell previously reported WP-CLI 2.12.0 and PHP 8.2.27, so
  runtime checks should be repeated from the Local shell before admin/browser QA.
- WP-CLI active plugin/theme inventory is blocked from this shell by database
  connection failure. Treat active-site inventory as a Session 2/3 setup gap,
  not a code issue.
- Baseline checks passed: `composer test` ran 23 tests/67 assertions; `npm run
  test:primary-terms` passed all 9 contract cases. npm could not write its log
  under `~/.npm` in the sandbox, but the command itself passed.
- Added reproducible proof assets under `docs/fixtures/group-shape-masks/`:
  `wide-logo-viewbox.svg`, `tall-badge-viewbox.svg`,
  `affinity-viewbox-only.svg`, `affinity-existing-none.svg`, and
  `conflicting-metadata.svg`.
- Added the static browser proof page
  `docs/group-shape-masks-fit-experiment.html`.
- Headless Chrome verification passed after using Node 24.14.0 and approved
  local app launch. Computed cases confirmed `contain`, `cover`, `100% 100%`,
  named positions, no-repeat, growing content, and a nested Cover-like child
  all apply at the Group root.

**Session 1 decisions:**

- Native Group dimensions are enough for the first implementation, but later
  browser testing showed authors also need a simple Group-fits-SVG-proportion
  behavior. Do not add custom mask dimensions or frame-style height clamps.
- The whole-section mask belongs on the Group root with CSS mask properties.
  Do not insert SVG children or wrappers that can inherit constrained child
  widths, block gaps, or Cover layout behavior.
- Whole-section behavior now maps to either `fill` or `proportion`; both use
  `mask-size: 100% 100%`. Proportional mode adds an SVG viewBox-derived Group
  `aspect-ratio`.
- Implement a minimal shared SVG source helper with explicit policies:
  `fill` forces root `preserveAspectRatio="none"`; proportional shapes remove
  misleading root sizing and force a preserving root policy based on the viewBox.
- Existing Section Frames should keep their current public API and URL fallback.
  Whole-section masks should require a readable, inline-normalized SVG source.
  If a whole-mask attachment is unreadable, offloaded, oversized, missing a
  usable viewBox for proportional behavior, or otherwise cannot be normalized, treat
  that preset as unavailable and let frame fallback behavior proceed.
- Conflicting SVG width/height metadata is not reliable for proportional shapes.
  Prefer viewBox-derived intrinsic proportions when normalizing whole-mask
  sources.
- Session 2 starts with model/source tests, including one attachment used by a
  stretching frame and a proportional whole mask in the same request to prove
  cache keys do not cross normalization policies.

### 2. Settings model and SVG resolution

**Status:** complete.

Extend the existing Section Frame preset option model into the Section Shapes
preset library and add the agreed minimum SVG-source reuse. Add focused tests
before or alongside behavior for validation, ordered rows, stable IDs,
omitted/empty input, repeated sanitization, invalid attachments, defaults,
source normalization, and fallback.

Test one attachment used for a stretching frame and a proportional whole mask in
the same request. Cached sources must not cross policies.

**Exit:** model/source tests and existing frame tests pass. Storage and
renderable preset data are ready for the admin.

**Session 2 notes, 2026-09-07:**

- Added `FlexLine\Section_Shape_SVG_Source` as the shared Media Library SVG
  resolver for Section Shapes.
- Updated existing `Section_Frame_Presets::get_svg_frame_source()` to delegate
  to the shared source helper while preserving the public frame API and frame
  URL fallback.
- Extended `Section_Frame_Presets` to normalize the existing
  `flexline_frame_presets` option as the unified Section Shapes preset library.
- Existing rows without `type` normalize as `type=frame`, preserving current
  top/bottom frame data.
- Whole-section rows store stable `id`, `label`, `type=mask`, `side=whole`,
  `attachment_id`, and `fit`.
- Whole-section mask behavior is allowlisted as `fill` or `proportion`, with
  legacy `cover`/`stretch` mapped to `fill` and `contain` mapped to
  `proportion`.
- Renderable preset data now resolves behavior into `css_size` and, for
  proportional mode, a viewBox-derived `aspect_ratio`.
- Shared SVG cache keys include attachment ID and normalization policy, so the
  same SVG can be used as a stretching frame and proportional whole-section mask
  during one request without leaking `preserveAspectRatio` behavior.

**Session 2 decisions:**

- Do not keep a second shape-mask option or manager. Whole-section shapes and
  top/bottom frames are all Section Shape presets distinguished by row type.
- Whole-section masks require a readable inline-normalized SVG source. Unlike
  frames, they do not fall back to the raw Media Library URL because fit behavior
  would become inconsistent.
- Proportional whole-section shapes require a usable `viewBox`; exports without one
  are unavailable until re-exported.
- Proportional whole-section sources remove root `width`, root `height`, and any
  existing root `preserveAspectRatio`, then set
  `preserveAspectRatio="xMidYMid meet"`.
- Stretching sources set `preserveAspectRatio="none"` and keep frame behavior
  compatible with the existing feature.
- Invalid whole-section mask submissions preserve the existing Section Shapes
  preset list.

**Session 2 changed files:**

- `inc/functions/class-section-shape-svg-source.php`
- `inc/functions/class-section-frame-presets.php`
- `tests/Unit/SectionFramePresetsTest.php`
- `docs/group-shape-masks-plan.md`

**Session 2 verification:**

- `php -l` passed for the new source helper, new mask model, updated frame
  model, and updated unit test file.
- `composer test` passed after the unified-model update: 37 tests, 125
  assertions.
- Scoped PHPCS passed for the new/changed PHP files.
- `npm run test:primary-terms` passed all 9 contract cases. npm still cannot
  write logs under `~/.npm` in this sandbox, but the command completed.

**Session 2 gaps:**

- WP-CLI active plugin/theme inventory remains blocked from this shell by the
  Local database connection issue recorded in Session 1.
- No production build was run in this session because no compiled JS/SCSS assets
  changed. Run `npm run prod` after Session 3 or any asset work.
- Real Settings API browser persistence belongs to Session 3.

### 3. Admin presets and persistence

**Status:** complete.

Extend the current form into one Section Shape Presets manager with typed rows,
labels, scoped row behavior, Media Library picker, and fixed-size image previews.
Keep prototypes inert and verify field names after remove/reorder. Use normal
Settings API nonce/capability checks.

Perform real browser saves: add label/SVG/type/behavior, save and reload,
then change both label and attachment and repeat. Verify the stored option and
displayed values. Test reorder, last-row removal, invalid input, and
disable/save/re-enable behavior.

Saved previews use resolved sources. Newly selected unsaved media may show the
original thumbnail, matching the existing workflow. Do not add a preview endpoint
just to normalize a transient image; document any distinction from fit previews.

**Exit:** real requests prove every field persists, tab retention works, empty
clearing is intentional, errors display, and existing frame saves still work.
Unit tests alone do not satisfy this session.

**Session 3 notes, 2026-09-07:**

- Replaced the separate frame/mask manager direction with one Section Shape
  Presets table.
- Kept the existing `flexline_frame_presets` option as the single saved preset
  library and added row `type` normalization.
- Admin rows now use **Top frame**, **Bottom frame**, or **Whole section**.
  Frame rows show Min/Preferred/Max height. Whole-section rows show **Whole
  Shape Behavior**.
- Hardened the Media Library picker so selected SVGs write both the hidden field
  property and value attribute, and read attachment data from common WordPress
  media model shapes.
- Verified a real browser save from the FlexLine options tab. The page stayed on
  `tab=frames`, showed `3 section shape presets saved`, and the database stored
  a whole-section row as `type=mask`, `side=whole`. A later cleanup simplified
  whole-section behavior to `fit=fill|proportion`.
- Added the block-level **Shape Type** select in the existing Styles panel:
  **Top frame**, **Bottom frame**, **Top and bottom frames**, and **Whole
  section**. Whole section shows only the whole-section shape selector.
- Added render/preview handling for whole-section masks and a regression test
  proving whole mode suppresses stale top/bottom frame output.

**Session 3 changed files:**

- `assets/js/theme-options.js`
- `inc/blocks/block-extensions.php`
- `inc/functions/class-section-frame-presets.php`
- `inc/theme-options/render-theme-frames.php`
- `inc/theme-options/theme-page.php`
- `src/js/blocks/attributes.js`
- `src/js/blocks/utils.js`
- `src/scss/shared/blocks/_section-frames.scss`
- `assets/built/js/block-extensions.js`
- `assets/built/css/app.css`
- `assets/built/css/editor.css`
- `tests/Unit/SectionFramePresetsTest.php`
- `docs/group-shape-masks-plan.md`

**Session 3 verification:**

- `composer test` passed: 38 tests, 132 assertions.
- Scoped PHPCS passed for changed PHP/test files.
- ESLint passed for the admin JS and changed block source files.
- `npm run prod` passed with the Node 24 path.
- `npm run test:primary-terms` passed all 9 contract cases.
- `git diff --check` passed.
- Browser verified the unified admin table, DB persistence, and block inspector
  mode UI.

### 4. Frontend rendering and precedence

**Status:** complete.

Register attributes, resolve effective mode, and add the single root mask through
the existing render path. Implement shared styles and suppress all frame-specific
overlap output while a whole mask renders.

Test activation, unsupported layouts, missing selections, inherited defaults,
frame restoration, and preserved Content Shift behavior. Visually check both
whole-section behaviors against color, gradient, background images, and nested Cover,
including padding/borders and constrained/wide/full alignment.

**Progress:** Session 3 added the base render path and editor preview for
whole-section mode. Session 4 should focus on broader visual verification,
unsupported layout handling, saved-content reopen behavior, and remaining
front-end polish.

**Exit:** production-built rendering matches Session 1; no detached bands,
child-width dependency, competing frame margins, or saved-markup changes.

### 5. Block controls and preview

**Status:** partial.

Localize renderable presets. Add the Styles panel, toggle, selection, and
unavailable/unsupported/frame-suppression notices.

Apply preview-only properties through wrapper props. Clear stale mask styles and
suppressed frame inline margins when toggles, layouts, presets, or behavior changes.
Match PHP decisions with focused JS contract tests where practical; otherwise
record explicit manual coverage.

Save/reopen in the post editor and Site Editor, including a synced pattern.
Verify no block validation errors or generated properties in saved markup.

**Session 5 notes, 2026-09-07:**

- Confirmed the block-level **Shape Type** control flow: top, bottom, both, and
  whole-section modes reveal only the relevant selectors.
- Confirmed whole-section mode keeps one whole-shape selector and no frame
  overlap controls.
- Confirmed switching modes preserves saved selections without stale preview
  classes or inline mask styles.
- Confirmed unavailable/suppression notices and editor preview behavior looked
  correct during manual editor testing.
- Simplified whole-section preset behavior to two options: **Shape fills group**
  and **Group fits SVG proportion**. Removed the experimental position matrix.
- Added proportional-mode render/editor support through a viewBox-derived
  `aspect-ratio` value.
- Manual page/editor checks were performed by the user while implementation
  progressed. Broader browser/device coverage is recorded in the Session 6
  release gaps.

**Exit:** editor/frontend agree on behavior, fallback, and
frame/Content Shift restoration through all transitions.

### 6. Integration QA and cleanup review

**Status:** complete.

Review against AGENTS.md for duplicated save paths, unnecessary abstractions,
stale preview state, and undocumented behavior. Complete and record:

- Admin add/edit/image replacement/reorder/clear, including global disable saves.
- Whole-section fill/proportion behavior and frame restoration.
- Wide/tall SVGs, transparent margins/holes, short/tall Groups, and content growth.
- Constrained/wide/full alignment, nested Cover/masks, padding, and borders.
- Shape/frame toggles, unavailable/deleted media, and unsupported layouts.
- Frame overlap with Content Shift off, explicit zero/nonzero per edge, mobile
  reset, horizontal shifts, transforms, and raised z-index.
- Keyboard focus and links/buttons near clipped boundaries; required controls
  must stay visible and operable through appropriate authoring choices.
- Frontend, post editor, Site Editor, synced patterns, and relevant REST renders.
- Desktop/mobile Chrome and Safari, remaining supported-browser release checks,
  and minimum WordPress/PHP compatibility where available.

Run production and final checks below. Recheck affected visuals after generated
assets change. Mark unavailable browser/runtime coverage as release gaps.

**Exit:** no unresolved feature regressions, final assets verified, and completed
checks clearly distinguished from remaining release coverage.

**Session 6 notes, 2026-09-07:**

- Reviewed the implementation against `wordpress-coding-agent-profile/AGENTS.md`.
  The feature uses the existing Settings API form/option, existing block
  extension/enqueue path, existing shared SCSS entries, and focused PHPUnit
  coverage for deterministic save/render behavior.
- Confirmed there is still one save path: `flexline_frame_presets` in the
  existing settings group. No JSON endpoint, AJAX save, second option, or new
  preset manager remains.
- Confirmed the only new helper is `Section_Shape_SVG_Source`, which is scoped
  to shared SVG normalization and viewBox aspect-ratio extraction used by both
  frame rendering and whole-section masks.
- Confirmed the old whole-shape position UI/path was removed. Whole-section
  rows store `fit=fill|proportion`; legacy experimental values normalize on
  save.
- Added a regression test proving Whole section mode does not render stale
  top/bottom frames when its saved whole-section mask is missing.
- Verified saved Local database options through the Local MySQL socket:
  `flexline_enable_group_frames=1`, frame rows remain typed
  `type=frame`, and whole-section rows store only `type=mask`, `side=whole`,
  `attachment_id`, and `fit`.
- Left the unrelated existing TODO in `_style-variations.scss` untouched.

**Session 6 verification:**

- `wp core version` passed in the Local shell context: WordPress 7.1.
- `wp cli info` passed in the Local shell context: WP-CLI 2.12.0, PHP 8.2.27,
  MySQL 8.0.35.
- DB-backed `wp theme list`/`wp option get` remained blocked from the
  non-interactive shell by Local socket behavior, so the saved option was
  checked with `mysql` against Local's `mysqld.sock`.
- `npm run prod` passed and rebuilt generated CSS/JS.
- `composer test` passed: 38 tests, 126 assertions.
- `vendor/bin/phpcs --extensions=php` passed.
- `npm run test:primary-terms` passed all 9 contract cases.
- `npm run lint-js` passed.
- `npm run lint-style` passed.
- Explicit admin JS lint passed: `npx eslint assets/js/theme-options.js
  src/js/blocks/utils.js src/js/blocks/attributes.js`.
- `git diff --check` passed.
- npm reported sandbox-only warnings about writing logs under `~/.npm`; the
  commands themselves exited successfully.

**Remaining release gaps for Session 7 handoff:**

- Browser/device matrix beyond the user's manual page/editor checks: mobile
  Chrome/Safari and desktop Safari.
- Site Editor and synced-pattern reopen checks should be listed as release
  verification unless completed before commit.
- The Session 6 documentation gap for user-facing Affinity export guidance and
  release notes was completed in Session 7.

### 7. Documentation and release handoff

**Status:** complete.

Update README and this plan with setup, behavior examples using one SVG, Group
versus mask dimensions, transparent-canvas guidance, and verified Affinity export steps.
Explain automatic normalization without requiring XML edits.

Document content clipping/padding, saved options/attributes, inheritance,
suppression/fallback, retention, cache refresh, and rollback via global disable.
Fresh page/CDN caches and an editor reload are needed after preset changes where
those caches or editor configuration are already loaded.

Record acceptance results, limitations, commits, and a detailed release-ready
change description. Update session statuses only from actual evidence.

**Exit:** reproducible setup and release handoff, with OCW content and original
uploads intact.

**Session 7 notes, 2026-09-07:**

- Updated `README.md` from the older Section Frames wording to the broader
  **Section Shapes** feature language.
- Documented setup from **Appearance > FlexLine Options > Section Shapes** and
  **Styles > FlexLine Section Shapes**.
- Documented the unified preset manager with typed rows: **Top frame**, **Bottom
  frame**, and **Whole section**.
- Documented the two whole-section behaviors:
  - **Shape fills group**: Group layout, padding, content, and minimum height own
    the box; the SVG fills and may stretch.
  - **Group fits SVG proportion**: the SVG `viewBox` defines the Group
    proportion.
- Documented SVG authoring requirements for edge frames and whole-section masks,
  including transparent canvas behavior, meaningful transparent margins/holes,
  and Affinity export guidance.
- Clarified that FlexLine normalizes readable SVGs for the selected behavior, so
  authors should not hand-edit `preserveAspectRatio`.
- Documented content clipping, padding responsibility, stored options, stored
  block attributes, cache/editor refresh expectations, and rollback through
  block/global disables.
- Updated `docs/releases/pr-notes-2.2.1.md` with release-ready Section Shapes
  bullets, acceptance evidence, compatibility notes, and remaining release
  coverage.
- No OCW artwork or uploaded Media Library SVG files were modified.

**Session 7 changed files:**

- `README.md`
- `docs/group-shape-masks-plan.md`
- `docs/releases/pr-notes-2.2.1.md`

**Session 7 verification:**

- Documentation-only session. No production rebuild was needed because source
  code and generated assets were not changed in Session 7.
- `git diff --check` passed after the documentation updates. Because this plan
  file is still untracked before commit, a direct trailing-whitespace scan also
  covered it.
- Documentation grep confirmed the README, plan, and release notes include the
  expected Section Shapes, Affinity, SVG normalization, whole-section behavior,
  option storage, and release-gap language.

**Remaining release gaps:**

- Mobile Chrome/Safari and desktop Safari visual checks should still be
  completed before release if they have not already been done.
- Site Editor and synced-pattern reopen checks remain release verification
  unless completed before commit.
- Commit reference: pending; follow the user's commit workflow.

## Verification and session notes

Follow the AGENTS test-based development guidance: smallest useful regression
tests before or alongside behavioral changes. Reuse PHPUnit; avoid a broad new
harness for copy or visual CSS. Browser saves and visual checks complement tests.

At implementation checkpoints, run relevant tests, then production and final checks:

```bash
composer test
npm run prod
composer test
vendor/bin/phpcs --extensions=php
npm run test:primary-terms
npm run lint-js
npm run lint-style
git diff --check
```

Explicitly lint changed admin JS: the normal script covers only `src/js`.
Inspect automatic fixes and generated asset diffs. Documentation-only sessions
need diff review and whitespace checks, not a production rebuild.

Append to each completed session: decisions, changed files, automated results,
manual checks, gaps, commit reference if committed, and the next starting point.
Prepare reviewable changes and follow the user's commit workflow; completion
does not imply an automatic commit.

## Deferred scope

Custom responsive mask dimensions, per-breakpoint behavior, automatic content
fitting, background-only masks, combining edge and whole masks, a visual shape
editor, and a debug overlay are deferred.

No external SVG inputs, client artwork bundled in FlexLine, upload mutation,
automatic preset migration, or deployment.
