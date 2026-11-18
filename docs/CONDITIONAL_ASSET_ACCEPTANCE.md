# Phase 5 acceptance record — local and hosted checks passed, rollout held

## Current activation policy — 2026-11-17

The owner authorized removing the environment restriction: conditional delivery now
defaults on in all environments when this branch is deployed. Explicit option/filter
opt-outs and conservative compatibility fallbacks remain supported. Earlier entries
below describing production opt-in record the previous policy and are superseded.
The one-time automatic WP Rocket/SiteGround cache migration is documented in
CONDITIONAL_COMPONENT_STYLES.md; separate CDN and rollback purges remain deployment tasks.
This change does not merge, tag, publish, or deploy the branch to a client site.


Work remains on `codex/conditional-css-plan`. This is **partial acceptance**, not
permission to deploy to client sites. The activation default was subsequently
changed with owner authorization as recorded above. Initial package/recovery tests used disposable Docker installations. The owner later
authorized the dedicated `mylifesite2026.test/testing/` subsite for branch testing.
That subsite now has isolated candidate paths and new regression content. Other
subsites and shared theme/plugin source files were preserved; no client deployment occurred.

## Verified package/environment record

Exact commits, ZIP SHA256s, file counts, package-gate results, external asset sizes
and mixed-version results are in `CONDITIONAL_ASSET_ACCEPTANCE.json`.
All three repositories were fetched; main had no commits missing from these branches.

- FlexLine runtime: `766ef0ab` plus the earlier Phase 2–4 work; preview version remains
  2.2.9 and is distinguished from released 2.2.9 by commit and ZIP hash.
- Location Sync: `a1b9423`, based on main `2cbcbad`; candidate 1.1.4.
- Advanced Floor Plans: `607074e`, based on main `8745c80`; candidate 1.0.1.
- Platform dependency: retained released Web4SL 1.2.6 ZIP. Location Sync correctly
  refused activation without it; the fixture was then corrected.
- Installed combined stack: WordPress 7.1.4 / PHP 8.2.35 / MySQL 8.0.46.
- Minimum-version theme probe: official WordPress 6.5.7 / PHP 8.2.35.
- Location Sync PHP suite: official WordPress 6.8.0 tests, separate disposable DB,
  host PHP 8.2.29. 71 tests / 247 assertions passed.

The package tool was the repository/shared pinned implementation; its SHA256 matches
FlexLine's vendored copy and the plugin workflow's shared pin. `build --execute`
passed for every final artifact. FlexLine also passed 66 JS tests, 48 PHPUnit tests /
180 assertions, 28 component delivery contracts, and 1,297 full/split CSS declarations.
Location Sync passed 14 JS tests. Floor Plans passed two JS tests. Both plugins'
additive metadata PHP contracts passed and are now required package checks; Floor
Plans' lifecycle JS tests are now a package gate too.

## Regression found and fixed

WordPress 6.5 did not apply Plain Text's custom theme.json variation defaults. The
Phase 4 candidate therefore displayed a filled button with 12px/16px padding.
`button-compat.css` now loads only before WordPress 6.6, through both frontend and
editor style pipelines. It matches Core 6.5's block specificity without `!important`,
retains inline overrides, and restores transparent background and zero padding.
Browser verification on 6.5.7 passed. Newer WordPress continues to use editable
variation defaults; no compatibility sheet is enqueued there. The new file is a
required package artifact. Tests cover both sides of the version boundary.

## Acceptance matrix status

| Scenario | Evidence/status |
| --- | --- |
| Plain, slider, scroller, both | Installed HTTP pages deliver the expected feature unions. Plain has no feature runtimes. Exact request/byte lists retained. |
| Location cards and later results | Real REST-backed cards render; subsequent results initialize; card slider Next changes the active slide. |
| Map popover | Expanding a cluster then opening Maple fetches the configured scroller pattern. Its Next control changes scroll position. |
| Floor-plan detail selection | Selecting Maple replaces Cedar; the cloned slider's Next control works. |
| Floor-plan media | 3D/2D controls work before and after changing the selected floor plan. Synthetic attachments only. |
| Conservative fallback | Floor Plans with the dynamic media-toggle pattern reports `dynamic-pattern-output` and retains complete CSS/runtimes. This is expected safety behavior, not an optimization success. |
| Mixed versions/recovery | All four released/candidate theme/plugin combinations render cards/pages. Metadata appears only with candidate theme + candidate plugins. Seeded content/meta checksums remain identical across all four swaps. |
| Concurrent/stale/failure/retry | Phase 3 JS contract tests pass in package verification. Live REST-request failure and later stylesheet failure/retry now pass; see follow-up below. Deterministic concurrent/stale cases retain the Phase 3 contract coverage. |
| Pattern graph/cache/site isolation | Phase 2 contract coverage retained; real synced-pattern cold/warm and edit-invalidation checks now pass. Full page/optimizer/CDN integration remains a rollout gate. |
| Buttons | Phase 4 modern-Core default/global/variation/child/individual fixtures retained; minimum-version regression fixed and retested here. |
| Real post/Site Editor previews | **Passed scoped checks.** Shipped Hero Slider inserted in actual Site Editor, controls work immediately, save/reload retains it. Real post editor renders shipped hero/timeline and Floor Plans server previews; 2D switching works with the Local child theme. Existing Watch video warning reproduces with released 2.2.9 on Core 7.2-RC1; tracked below. |
| Mobile resize, comparison/filter variants, modal opening | Desktop/mobile/desktop scroller and mobile navigation checks pass. Location taxonomy checkbox mouse/keyboard/reset, keyword/no-results/reset, pagination/infinite and comparison cards/table pass. Floor-plan grouping, sort, media expansion/close and mobile selection persistence pass. |
| Brice Pointe and representative client canary | Not deployed; no candidate client-site acceptance claimed. |

A fixture initially used plain permalinks, causing the map client to receive HTML
at its REST URL. Configuring normal pretty permalinks resolved that setup issue;
subsequent REST/map checks passed. The fixture seed now applies this configuration.

## Measured external theme assets

Identity encoding, same local server and unique external theme CSS/JS requests.
These numbers exclude inline CSS, fonts, Core/plugin assets, rendering time and
production compression/cache effects. They are not whole-page performance claims.

| Page | Conditional requests / bytes | Complete requests / bytes |
| --- | ---: | ---: |
| Plain | 4 / 74,577 | 8 / 169,378 |
| Slider | 6 / 100,579 | 8 / 169,378 |
| Scroller | 6 / 131,048 | 8 / 169,378 |
| Both | 8 / 157,050 | 8 / 169,378 |
| Location patterns | 11 / 177,198 | 9 / 178,513 |
| Floor-plan dynamic media | 9 / 178,513 | 9 / 178,513 |

The plain page saves 94,801 bytes and four requests. Location patterns add requests
for only a small byte reduction; dynamic Floor Plans currently save nothing. This
supports keeping rollout controlled until the remaining matrix is complete.

## Recovery and cache requirements

Retained released ZIPs: FlexLine 2.2.9, Location Sync 1.1.4, Floor Plans 1.0.1.
All four combinations were tested against the same expanded synthetic content,
including media references. No database restore was used. This proves scoped
code rollback/content preservation, not complete client installation recovery.

Direct ZIP copies initially exposed stale PHP opcode cache across swaps. Because
file-copy testing bypasses WordPress Upgrader's invalidation, the final mixed-version
script restarts the disposable PHP container before every probe. All four then pass.
Any deployment/recovery adapter must invalidate PHP opcode caches and relevant page,
object and optimized-asset caches. Page/CDN/optimizer purges remain a client gate.

Prefer additive plugin support before theme rollout. Keep complete-bundle delivery
available. Do not enable the production default until real editor, remaining UI,
cache/optimizer, supported-version and authorized canary checks are complete.

## Evidence and reproduction

Workspace evidence: `diagnostics/conditional-assets-phase5-20261117` contains the
three final package directories, release receipts, HTTP inventory, all mixed-version
results, fixture IDs and browser screenshots. Screenshots show synthetic local sites.

Reusable guarded fixture helpers live in `tests/fixtures/conditional-assets/`.
The PHP helpers refuse databases outside the named disposable environment. Use the
retained ZIPs and separate test databases; never point these at a client database.
`mixed-versions.py <evidence-directory>` expects extracted `staging`, `prior-staging`
and the named disposable container. `http-matrix.py <evidence-directory>` measures
its six synthetic routes. The final runtime packages passed all required local gates;
GitHub package/CodeQL checks still require PR execution.

## Blank editor diagnosis — 2026-11-17

The in-app browser aborts the editor's `blob:` document navigation with
`net::ERR_ABORTED`; the iframe remains `about:blank`, without a captured JavaScript
exception. A standalone control page (no WordPress/theme/plugin code) reproduces
this: ordinary same-origin HTTP and `srcdoc` iframes render, but a Blob URL does not.
The identical three controls all render in installed native Google Chrome.

Native Chrome also renders the actual candidate WordPress post editor: the Floor
Plans block shows Cedar/Maple/Oak/Willow, panel content and 3D/2D tabs. The combined
fixture shows horizontal-scroll controls, but Gutenberg reports invalid Group
markup for its hand-authored slider. These observations establish canvas loading,
not a full interaction pass. Correct/regenerate that editor fixture and verify
slider insertion, selection, preview, save/reload and Site Editor next.

No production code or browser security setting was changed for this diagnosis.
Use native Chrome for real editor acceptance; do not add a theme workaround for
the in-app browser. Reproduction controls are retained in
`tests/fixtures/conditional-assets/editor-iframe-probe.html` and
`editor-iframe-http.html`; serve both together over HTTP. Local diagnostic evidence
is under `diagnostics/conditional-assets-editor-20261117`. This closes the unknown
blank-canvas cause, not the remaining Phase 5 release gates.

### Follow-up using shipped patterns

At the user's direction, editor acceptance now uses unmodified registered
`flexline/hero-slider` and `flexline/section-timeline-columns` content, seeded as
separate disposable drafts by `seed-editor-patterns.php` (IDs 24 and 25 in this run).
Both load without the hand-authored fixture's invalid-block warning. Hero Next
changes visible slide content and draft save reports success. Timeline renders
its controls and Next changes the visible column set. Screenshots:
`shipped-hero-editor.png` and `shipped-timeline-editor.png` in the diagnostic folder.
The old minimal fixtures remain for reproducible frontend byte/rollback comparisons;
they are not the source of truth for editor validation. Save/reload persistence,
editing/insertion variants and Site Editor still require full acceptance.

## Expanded local regression acceptance — 2026-11-17

### Existing-pattern environments

- **Actual Site Editor, WP 7.1.4 / PHP 8.2.35:** inserted shipped `flexline/hero-slider`
  using the pattern inserter. Controls appeared immediately inside the real canvas.
  Pause/Next/Previous changed slides. Saved only Blog Home (unchecked unrelated
  auto-created template parts/navigation), reloaded and confirmed the inserted
  pattern and controls persisted. Post editor hero draft save was already verified.
- **Authorized Local multisite `/testing/` (blog 5), WP 7.2-RC1 / PHP 8.2.27:**
  retained `oconnor-woods-child-theme`, its saved styles and existing content.
  Parent runtime and theme.json resolve to the existing `codex/conditional-css-plan`
  worktree through a guarded MU preview adapter. Candidate plugin ZIPs live in
  separate directories. The adapter applies only to this local domain and blog 5.
  No stored theme/network-plugin activation settings changed.
- The docs page's ten `flexline/demo-patterns-*` references became ten new published
  regression pages (121384–121393). Index: `/testing/phase5-regression`.
  Each page returned HTTP 200 in conditional and complete modes: **20/20**, no
  duplicate stylesheet/script tags and no PHP fatal output. Preload hints are counted
  separately from script tags. Original byte measurements above remain unchanged;
  these richer child-theme demos are a separate regression sample.
- `/testing/phase5-floorplans` uses shipped `fp-card-list` and `fp-detail-panel`,
  two synthetic records (121395/121396), two grouping terms, and existing local media.
  Group selection, descending sort, 2D/3D switching, expand/close and mobile dropdown
  selection work; selecting Cedar at 390px remains selected after returning to 1280px.
  Actual editor SSR preview also renders and switches from 3D to 2D.
- **WP 6.5.7 / PHP 8.2.35 combined stack:** installed candidate plugins plus Web4SL
  1.2.6 in the disposable minimum-version site. Shipped location cards render and
  keyword filtering selects Maple. Shipped floor-plan patterns render; selecting
  Maple, switching 2D, expanding and closing work without captured console errors.
  This extends the earlier minimum-version button test; it is not every PHP/Core permutation.

### Frontend interactions and late assets

The existing Heroes demo passes keyboard slider navigation (status changes to
Slide 2 of 3; active slide reaches opacity 1). Its real media modal opens, Escape
closes it, focus returns to its trigger and body scrolling is restored. The Sections
Timeline scroller responds to Enter (scrollLeft 2401 -> 2675). Resizing keeps exactly
one set of controls per scroller. Mobile-only navigation lists change from desktop
`overflow-x: visible` to `auto` at 390px (439px content in 251px viewport), then back
to visible at 1280px. The gallery's existing 2D/3D controls switch pressed states.
All browser viewport/network overrides were cleared after testing.

Location Sync intentionally boots only on the multisite main site, so its full
matrix stays in the isolated single-site fixture rather than changing that policy.
Shipped directory grid/popover/comparison patterns cover paginated page 2 (Oak,
Willow), infinite appended results, comparison cards/table, empty keyword results
and reset to populated results. The comparison setting must be enabled globally;
the supported navigation value is `paginated`, not `pagination`.

A blocked real `location-cards` REST request preserves existing cards and offers
Retry; unblocking and Retry loads page 2. A second probe starts with shipped Hero
Slider card patterns and no scroller CSS/runtime. A guarded disposable REST hook
then appends the shipped Timeline pattern only to later responses. Blocking its
required `component-horizontal-scroll.css` leaves both existing sliders usable,
adds Retry, and inserts no unstyled scroller. Unblock/Retry yields exactly one new
stylesheet, one runtime, one wrapper and one Next control, with the error removed.
The new Next control works immediately (scrollLeft 3225 -> 3500). Injection was
subsequently disabled. This validates the real plugin replacement/asset-loader path;
the test hook itself is not runtime plugin code.

### Cache, baseline findings and isolation

Synced pattern 121398 initially references the shipped Hero Slider; page 121399
loads `base.css + component-slider.css` identically cold/warm. Updating only the
synced pattern to the shipped Timeline changes the next request to
`base.css + component-horizontal-scroll.css`, again stable warm, without manually
clearing caches. This tests WordPress/theme requirement invalidation, not a CDN.

Two setup/existing issues were isolated:

1. The Local site's existing `%primary_term%` catch-all route discarded the new
   page query and redirected it home. The local preview adapter supplies an explicit
   `phase5-*` fixture route; existing routes and permalink settings are unchanged.
2. The Heroes demo's Home Hero **Watch video** block reports invalid content in the
   WP 7.2-RC1 editor. The identical warning reproduces when the adapter serves the
   exact released v2.2.9 ZIP. No recovery/save of this block was applied. Track its
   pattern/editor compatibility separately; it is not a new conditional-CSS defect.
   The shipped Hero Slider and Timeline used for insertion checks validate normally.

A third-party Loom embed logged `crypto.randomUUID` unavailable on HTTP Local;
its modal still opens/closes. This is not a theme runtime exception. No real forms
were submitted. Other subsite HTTP responses lack the Phase 5 header. The original
shared checkout was preserved verbatim at `db51c8c9` on
`archive/local-flexline-snapshot-20261117`, with annotated tag
`#deadbranch-2026-11-17-125153`; its source fixes already match released v2.2.9.

### Evidence, reproducibility and remaining release gates

`diagnostics/conditional-assets-local-testing-20261117` retains demo IDs/content
hashes, 20 response bodies, asset inventory, cache before/after lists, responsive
measurements, late-asset retry counts, and screenshots. The Site Editor save proof
is in `diagnostics/conditional-assets-editor-20261117/site-editor-saved.png`.
Fixture helpers are under `tests/fixtures/conditional-assets/`; see `LOCAL_TESTING.md`.
The local production build passed; its unrelated generated block-extensions.js
change was restored. Fixture PHP/Python syntax and `git diff --check` pass. Runtime
code did not change, so prior exact preview ZIP hashes remain applicable.

**Phase 5 release signoff remains held** for actual page-cache/optimizer/CDN behavior,
authorized Brice Pointe and representative client canaries/recovery. Conditional production delivery remains opt-in. Local
checks must not be promoted to a claim that these external gates passed.


## Final checkbox and hosted-package acceptance — 2026-11-17

The apparent taxonomy checkbox reset was a test-sequence error, not a demonstrated
runtime regression. The earlier automation targeted South while Phase 5 Region was
collapsed. Its options remained discoverable in the initial accessibility tree,
but the options container had `max-height: 0`; clicking that control did not select
it. Opening the Region dropdown first, then using the same checkbox check action,
leaves South selected and renders **Oak and Willow / 2 Results**. No taxonomy,
cache, package or runtime edits were needed between failure and success. The filter
dropdown source has no differences from Location Sync's `origin/main`.

Keyboard Space on North, followed by Space to deselect South, produces **Cedar and
Maple / 2 Results**. Both selected yields zero results because this synthetic family
uses the existing `multi=false` default (all selected terms required). Reset Filters
returns **4 Results / Page 1 of 2** and clears selections. Repeating open-dropdown →
South `check()` passes. No console errors or warnings were captured. Evidence:
`location-checkbox-passed.jpg` and `location-checkbox-passed.txt` in the Local
follow-up diagnostics directory. The initially collapsed options' accessibility
exposure is an existing dropdown behavior, not changed or certified by this work.

Hosted checks passed on the exact heads recorded in the JSON receipt:

| Draft PR | Package | Additional checks |
| --- | --- | --- |
| [FlexLine #593](https://github.com/schlotterer/flexline/pull/593) | [Passed](https://github.com/schlotterer/flexline/actions/runs/44157165889) | [CodeQL passed](https://github.com/schlotterer/flexline/actions/runs/44157156150) |
| [Location Sync #86](https://github.com/schlotterer/web4sl-location-sync/pull/86) | [Passed](https://github.com/schlotterer/web4sl-location-sync/actions/runs/44157263431) | [Validation passed](https://github.com/schlotterer/web4sl-location-sync/actions/runs/44157263418) |
| [Advanced Floor Plans #5](https://github.com/schlotterer/web4sl-advanced-floor-plans/pull/5) | [Passed](https://github.com/schlotterer/web4sl-advanced-floor-plans/actions/runs/44157279595) | [Validation passed](https://github.com/schlotterer/web4sl-advanced-floor-plans/actions/runs/44157279420) |

Both hosted plugin ZIPs match the locally tested ZIPs byte for byte. Hosted FlexLine
SHA256 is `49404d89f8fdf88c90dbe4eaad52f810dddce3702118001c87ca6d61dc6df517`.
It differs from the original local ZIP in five generated Composer support files
(listed in JSON), with no differences in theme source, built CSS/JS or dependency
library code. Keep both artifact identities; do not substitute the local hash for
the hosted artifact. The pinned `package_release.py verify --root <theme-worktree>
--output <hosted-flexline-directory>` command passes. The exact hosted theme ZIP was
installed on both disposable WordPress 7.1.4 and 6.5.7 environments, restarting PHP
containers to invalidate opcode caches; location cards/checkboxes and floor-plan
Maple selection/2D switching pass. Hosted files and hashes are retained under
`diagnostics/conditional-assets-local-testing-20261117/hosted-*`.

**Local acceptance and hosted CI gates are closed. External rollout gates remain
open:** actual page-cache/optimizer/CDN integration and explicitly authorized client
canaries with installation recovery. This documentation closeout changes no runtime
code, dependencies, versions or production defaults. PRs stay drafts; no merge, tag,
publication or client deployment is implied. Prior dated checkpoints above describe
historical progress; this section and the JSON receipt are the current status.


## Local checkout and primary-term routing correction — 2026-11-17

The owner requested normal Local loading. The adapter was removed, its source retained
in local diagnostics, and `codex/conditional-css-plan` is now checked out in the actual
`wp-content/themes/flexline` repository. The old worktree is detached. Normal installed
plugins and the existing child theme load; candidate plugin substitutions are no longer
active. The archived local snapshot and its dead-branch tag remain intact.

Removing the adapter exposed an existing routing defect from `4d1d52e8` (April 20):
Core does not recognize `%primary_term%` as a leading text tag, so its generic term
rule precedes page rules. This intercepted both real pages and the regression pages.
The theme now enables Core's verbose page handling for a leading `%primary_term%`,
both during init/request parsing and during rule generation (including after Core
resets its flags). Real pages take precedence; nonexistent page matches fall through
to post rules. Existing tag/query semantics, permalink settings and content are unchanged.

Verification: real Core generation passes primary-term, prefixed primary-term, normal
post-name and numeric-year structures via `wp eval-file tests/primary-term-permalinks-integration.php`.
All nine primary-term resolver contracts pass. PHP syntax/PHPCS and `git diff --check`
pass. After `wp --url=http://mylifesite2026.test/testing/ rewrite flush`, About Us, FAQ,
regression index, Heroes and Floor Plans return HTTP 200 at their original URLs, as do
two existing category/post URLs. Only the testing subsite's rules were flushed.

For another affected site, refresh its permalink rules once after installing this fix;
do not flush on every request. Reverting code requires regenerating that site's rules
as well and may restore the original routing defect. No content/schema migration is
needed. The earlier conditional-asset ZIP hashes and full acceptance runs describe the
prior commit, not this additional PHP routing change. No release or client deployment
has occurred; external rollout gates remain open.
