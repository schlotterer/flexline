# FlexLine 2.2.2 PR Notes

## Summary

Section Shapes adds reusable top/bottom frames and whole-Group SVG masks.
This is a working release record; final release verification remains pending.

## Feature Changes

### Section Shapes and Group masks

- Expanded the reusable Section Frames work into a unified **Section Shapes**
  feature for ordinary/default/constrained Group blocks.
- Kept one admin preset library backed by the existing `flexline_frame_presets`
  option. Presets are now typed as **Top frame**, **Bottom frame**, or **Whole
  section**.
- Renamed the admin/editor controls around the broader Section Shapes concept
  while preserving the existing option names and saved frame selections.
- Added whole-section SVG masks that clip the Group root, including the
  background and descendants, without inserting layout-affecting wrapper markup
  or SVG children.
- Added the block-level **Shape Type** selector: **Top frame**, **Bottom frame**,
  **Top and bottom frames**, or **Whole section**. Each mode reveals only its
  relevant saved-shape controls.
- Added two whole-section behaviors: **Shape fills group** for layout-owned
  dimensions and **Group fits SVG proportion** for viewBox-derived aspect ratio.
- Normalized readable Media Library SVGs server-side for admin previews, editor
  previews, and frontend masks so authors do not need to hand-edit
  `preserveAspectRatio`.
- Added fixed-size admin SVG previews and user-facing Affinity export guidance.
- Preserved Content Shift behavior. Frame overlap is overridden only when
  Content Shift is explicitly active on the matching edge, including explicit
  zero values.
- Whole-section mode suppresses stale top/bottom frame rendering and overlap
  while it is selected, then restores saved frame settings when the editor
  switches back to a frame mode.
- Added PHPUnit coverage for Section Shape preset normalization, SVG source
  normalization/cache-policy separation, and whole-section render fallback.

- Documented Section Shapes setup, SVG authoring requirements, Affinity export
  settings, cache refresh expectations, and rollback behavior.

## Review Cleanup

- Save explicit shape modes, including top-only, rather than infer them from stale selections.
- Accept already-normalized SVG roots and single-quoted viewBox values.
- Cache failed SVG reads per request and policy, without modifying uploaded artwork.
- Keep preset controls in five stable columns and disable inactive height inputs.
- Isolate Section Shapes editor controls in section-shapes.js; retain shared Content Shift logic.
- Use the standard WordPress media attachment JSON for picker selections.
- Warn when a saved whole SVG cannot render; preserve its preset definition.
- Document the 256 KiB (262,144 byte), locally readable whole-mask requirement.
  Proportional mode additionally needs a viewBox with positive width and height.

## Compatibility

- Existing top/bottom frame presets remain stored in `flexline_frame_presets`.
  Rows without a `type` key normalize as frame rows.
- Whole-section presets require readable Media Library SVGs. Proportional mode
  also requires a usable SVG `viewBox`.
- Existing option names and attachment files are unchanged. No version bump is part of cleanup.
- Whole masks fail open when unavailable; edge frames retain their attachment-URL fallback.

## Verification Record

Historical feature-session checks (not a substitute for final cleanup verification):

- Section Shapes admin saves were checked in a Local browser and verified
  against the Local database option. Label, SVG attachment, type, behavior, and
  reordered preset state persisted through reloads.
- Whole-section fill/proportion behavior, frame-mode restoration, top/bottom
  frame rendering, nested Cover content, constrained Group placement, and
  Content Shift precedence were manually checked during editor/frontend testing.

Cleanup checks and outstanding acceptance work are tracked in the
[cleanup plan](../section-shapes-release-2.2.2-cleanup-plan.md).
Focused coverage includes actual block serialization, PHP SVG boundaries,
render fallback, and the PHP-rendered admin form with media selection.

## Pending Release Checks

Session 5 production, lint, 46 PHP tests, 17 JS tests and nine primary-term
checks passed. Live Chrome preset save/replace/reorder and disable/re-enable
passed with original presets restored. A disposable draft verified four-mode
save/reopen and frontend masks plus whole-to-top saved attributes, then was
trashed. The cleanup plan records remaining UI and device gates explicitly.

- Section Shapes still need final release-device coverage for mobile
  Chrome/Safari, desktop Safari, and any Site Editor or synced-pattern reopen
  checks not completed before release.
- Expanded layout acceptance, live unavailable-SVG warnings and delete-all
  clearing remain pending; see the Session 5 results for the full list.
