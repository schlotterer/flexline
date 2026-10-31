# Mobile preset cards — 31 October 2026

This is the original browser-test receipt from before commit/push. The fix has
since been committed, pushed, built in hosted CI and installed from the exact
verified ZIP. See [current release status](pr-notes-2.2.2.md). No release tag,
publication or DFG promotion occurred. No extra checkout/worktree was created.

## Change

The Section Shapes preset manager stacks each row into a card at viewport widths
up to 1024px. Above that, it retains the five-column desktop table. Labels, Type,
SVG Shape, Settings and Actions appear in that order. Visible mobile labels are
hidden from assistive technology to avoid duplicating the retained column headers;
explicit table/row/cell roles and existing input labels remain. Hidden template
rows and inactive settings remain hidden/disabled. Long attachment names can wrap.

Only inc/theme-options/theme-page.php and render-theme-frames.php change at
runtime. The inputs, names, IDs, settings storage, media picker and reordering
JavaScript are unchanged. No data migration or frontend shape sizing change.
The 1024px cutoff also avoids the slight overflow observed immediately above the
initial 782px cutoff with the WordPress admin sidebar present.

## Live checks

Used the existing independent Docker canary at 127.0.0.1:63188, official WordPress
7.2 Beta 2 / PHP 8.2.35. Applied just the two changed owned PHP files over the
previously tested candidate. These results cover that patched working tree;
the original 30 October ZIP did not contain this fix. Subsequent hosted CI/ZIP
verification and native installation are complete, as recorded in the current
release status linked above.

Preserved all seven original synthetic presets, then started an empty canary
preset library. No real Local presets, uploads or content were used.

- At 390px, created QA Mobile wave, chose QA Top wave through the real WordPress
  Media Library, and set min height to 44px.
- Added QA Mobile decorative as a whole-section/proportion preset and chose
  QA Wide proportion through its own media picker.
- Moved the decorative preset up, saved through options.php and reopened. UI and
  database confirmed both settings, attachments 7/4, and the new order.
- Reopened the saved decorative card's media picker and replaced its SVG with
  QA Tall proportion. Renamed the wave card and moved the decorative card down
  using Enter on the Down button. Saved and reopened: order, name, 44px height,
  proportion behavior and the changed SVG label persisted.
- Whole-shape height inputs remain disabled; frame fit remains disabled. Tab from
  Choose SVG goes to Whole Shape Behavior, then to Up, skipping hidden controls.
- Two-preset layout checked at 320,390,600,782,783,820,960,1024,1025,1280,1440px.
  Document scroll width never exceeded client width. Cards through 1024px;
  table rows and hidden mobile labels above it. Each row retains five cells.
- Removed both disposable presets through the UI, saved and confirmed an empty
  array. Restored the original seven synthetic definitions exactly. Checked that
  mixed library again at 320,390,782,1024,1025,1440px with no horizontal overflow.
- Captured posts and postmeta were unchanged during the UI checks. No existing
  Local content was resaved. Temporary browser viewport overrides were reset.

These are desktop Chrome viewport/keyboard checks. They do not assert a new
physical-device or Safari pass for the changed admin CSS.

## Automated checks

- PHP syntax checks for both changed files: passed.
- vendor/bin/phpcs on both changed files: passed.
- vendor/bin/phpunit --configuration phpunit.xml.dist: 48 tests / 180 assertions.
- Existing JavaScript regression suite: 2 suites / 21 tests, using Node 24.14.0.
- Extracted changed inline CSS with repository stylelint config: passed.
- git diff --check: passed.

No compiled frontend assets require rebuilding for these PHP-rendered admin
styles. The subsequent fresh release package was generated and checked;
publication still requires authorization.

## Acceptance clarification

Owner clarified that proportion mode is primarily for standalone decorative
shapes, without content inside. The earlier content/padding/minimum-height stress
case is retained as a recorded behavior, not a release blocker for that intended
use. No frontend sizing change was made. Empty decorative shape acceptance is a
separate frontend check, not claimed by this admin-only verification.

Native ZIP recovery evidence and its original-archive/Fleet limits remain in the
[30 October receipt](acceptance-2.2.2-2026-10-30.md).

Evidence in the parent Local workspace:
diagnostics/flexline-mobile-presets-20261031/ — mobile/desktop screenshots,
form snapshots, breakpoint geometry, saved database proof and exact synthetic
preset restoration receipt. The screenshot shows disposable values before cleanup.
