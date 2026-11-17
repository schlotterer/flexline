# Phase 4: editor assets and editable button defaults

Implemented locally on `codex/conditional-css-plan`, 2026-11-17. No client-site
installation, saved content, or configuration was changed. Plugin source remains
on the Phase 3 branches based on their main revisions; this phase changes only
FlexLine.

## Editor delivery

Keep the complete `app.css`, `editor.css`, and `modal.css` in `add_editor_style`.
WordPress supplies these to the editor canvas and previews, including the Site
Editor iframe. New blocks and changed settings cannot reliably be predicted by
frontend render-time detection, so the editor does not use conditional component
CSS. A future editor split needs its own insertion/preview lifecycle design.

The existing runtime callback incorrectly used
`wp_should_load_block_editor_scripts_and_styles()`. WordPress deliberately sets
that flag false in `_wp_get_iframed_editor_assets()` to exclude editor-shell scripts
while collecting content assets. The callback now checks the actual admin block
editor screen, allowing slider/scroller runtimes into both canvas types while
excluding ordinary admin pages. Slider translations are registered for the editor
handle too. Shell controls remain on `enqueue_block_editor_assets`; content runtimes
remain on `enqueue_block_assets`.

The read-only WordPress probe measures the complete content CSS at approximately
202 KiB uncompressed (app + editor + modal; see its JSON report for exact sizes).
This intentionally retains overlap between app and editor rules. No editor payload
reduction is claimed. Frontend base/component delivery is unchanged.

## Editable defaults

Plain Text and Outline colors, backgrounds, gradients, borders, shadow, line height,
and spacing now live in the theme.json variation definitions where applicable.
Previously, SCSS selectors with four classes defeated WordPress-generated saved
variation styles. The structural positioning and underline pseudo-elements remain
in SCSS. The arrow continues to use `::after`; the underline uses `::before`.

Outline hover/focus updates `--flexline-outline-color`, used only by its default
text color. Explicit WordPress text-color overrides therefore remain authoritative.
This also avoids Core's per-instance base style overwriting a same-specificity
nested hover color. Normal defaults retain transparent backgrounds, a 1px Outline
border, and the existing alternate hover/focus color.

Canonical classes, including markup carrying both canonical and generated suffix
classes, use WordPress's style resolution. Suffix-only legacy markup retains a
single-class-weight fallback and underline behavior. Such markup has no canonical
variation identity for WordPress to edit; resaving/selecting its style restores
that identity. No automatic content migration is performed.

Global Button styles, variation-specific styles, and individual blocks are separate
layers: a variation's explicit defaults may intentionally override a generic Button
value. Edit that variation or the individual button to override those defaults.
Removing saved variation padding restores Plain Text's zero-padding theme default.

## Verification

`tests/editor-assets-wordpress-probe.php` runs via WP-CLI with themes/plugins skipped.
Arguments: isolated theme root, existing output directory, local fixture base URL.
It uses actual WordPress APIs and writes only fixture files:

- Complete editor theme styles are present.
- Core's iframe collector contains slider/scroller runtime scripts and editor CSS.
- A normal post-editor screen enqueues the runtimes; the dashboard does not.
- WordPress merges default, global Button, custom variation, and child theme data.
- `do_blocks` generates actual per-instance button classes and styles.

Local runtime: WordPress 7.2-RC1, PHP 8.2.29. Browser fixtures verify:

- Insertion after iframe load; slider edit mode, preview mode and working Next control;
  horizontal-scroller controls appear inside the iframe.
- Parent defaults: Plain Text zero padding/transparent background, Outline 11px/15px
  padding with 1px border under the fixture's spacing tokens.
- Saved variation and child theme overrides: 8px/0 padding, custom text/background,
  4px dashed border, 12px radius, line-height 2. Inline individual overrides also win.
- Global Button font sizing propagates through the variations (Core fluid sizing applies).
- Canonical and canonical-plus-suffix markup share saved values; suffix-only legacy
  markup retains its fallback appearance.
- Contact arrow remains visible; underline computes to 3px on hover and Tab focus,
  including a keyboard-focus check with the pointer away from the button.
- Default Outline keyboard-focus color resolves to the alternate token.

Validation: 66 JS tests, 48 PHPUnit tests / 180 assertions, 26 component delivery
contracts, changed-file PHP/SCSS lint and production build. The compiled full/split
CSS equivalence check covers 1,297 declarations, including the intentional button
selector changes. No selectors containing the underline pseudo-elements moved
inside `:is()`.

Evidence: workspace `diagnostics/conditional-assets-phase4-20261117`, including
`editor-report.json`, WordPress-rendered button cases, `editor-iframe.jpg`, and
`button-focus.jpg`. Screenshots show isolated test fixtures, not client design changes.

## Remaining rollout gates

Phase 5 must exercise real Site Editor interactions and the plugins' actual
server-rendered preview UIs with supported package combinations, including child
themes and existing saved Global Styles. These fixtures verify Core's asset/merge
pipeline but do not replace that acceptance matrix. Older supported WordPress
versions, optimizer behavior, installed-package rollback, and client-site canaries
remain open. Conditional frontend loading remains opt-in; no release is included.

## Phase 5 existing-pattern follow-up — 2026-11-17

Actual Site Editor insertion, controls and save/reload now pass. Owner-authorized
Local `/testing/` runs the branch through isolated paths with its child theme retained;
the ten existing docs demo patterns pass 20 conditional/complete HTTP checks.
Shipped floor-plan media/filter/sort/mobile and real editor SSR pass. Shipped location
pagination/infinite/comparison/search plus REST and late stylesheet failure/retry pass.
Cold/warm synced-pattern requirements invalidate after an edit. Minimum WordPress
6.5.7 now has combined-stack location/floor-plan smoke coverage. No runtime changes;
local build and fixture syntax checks pass. Exact evidence, baseline Watch video
validation warning and restoration instructions are in CONDITIONAL_ASSET_ACCEPTANCE.md.
Page-cache/optimizer/CDN, authorized client canaries and hosted CI still gate release;
no production-default change, tag or client deployment occurred.
