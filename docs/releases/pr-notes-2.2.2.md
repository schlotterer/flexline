# FlexLine 2.2.2 PR Notes

## Summary

FlexLine 2.2.2 centers on Section Shapes, WordPress 7.2 readiness and
ZIP-delivered versioned updates through CI. Token authoring and responsive
preset administration support that work. Existing frame settings and legacy
shortcode rendering remain compatible; this is not full final-7.2 certification.

The mobile fix, hosted CI and exact-ZIP installation checks are complete.
Publication and DFG production promotion have not occurred. Remaining limits and
release actions are listed below.

[Draft public release and shortcode/token guide](public-release-2.2.2.md).

## Feature Changes

### Section Shapes and Group masks

- Expanded the reusable Section Frames work into a unified **Section Shapes**
  feature for Group, Row, Stack, and Grid blocks.
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
- Expanded rendering and editor controls across Group, Row, Stack, and Grid
  blocks.
- Added two whole-section behaviors: **Shape fills block** for layout-owned
  dimensions and **Block fits SVG proportion** for viewBox-derived aspect ratio.
- Normalized readable Media Library SVGs server-side for admin previews, editor
  previews, and frontend masks so authors do not need to hand-edit
  `preserveAspectRatio`.
- Added fixed-size admin SVG previews and user-facing Affinity export guidance.
- Added Section Shapes to the in-admin Documentation tab and drafted the
  companion website article for the Custom Attributes section.
- Preserved Content Shift behavior. Frame overlap is overridden only when
  Content Shift is explicitly active on the matching edge, including explicit
  zero values.
- Whole-section mode suppresses stale top/bottom frame rendering and overlap
  while it is selected, then restores saved frame settings when the editor
  switches back to a frame mode.
- Added PHPUnit coverage for Section Shape preset normalization, SVG source
  normalization/cache-policy separation, and whole-section render fallback.

- Documented Section Shapes setup, SVG authoring requirements, Affinity export
  settings, cache refresh expectations, rollback behavior, and admin/user-facing
  article copy.

### Authoring tokens and runtime delivery

- Expanded authoring token options and literal-example syntax. Admin examples
  favor tokens; existing shortcode registrations and aliases still render older
  content. No existing content was automatically rewritten.
- Added the repository-local release action, Node 24 builds, runtime-only ZIPs,
  provenance/checksums and mandatory editor/schema regression checks.
- Removed the duplicate lowercase Montserrat font path while retaining the
  canonical WOFF2 and required runtime dependencies.
- Included scoped core breakpoint alignment, native text-shadow precedence with
  legacy fallback and directory preview attribute schemas.

## Review Cleanup

- Save explicit shape modes, including top-only, rather than infer them from stale selections.
- Accept already-normalized SVG roots and single-quoted viewBox values.
- Cache failed SVG reads per request and policy, without modifying uploaded artwork.
- Keep five desktop columns and stack labeled preset cards through 1024px.
  Preserve disabled inactive inputs, SVG selection, reorder actions and keyboard order.
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
- Existing option names and attachment files are unchanged; no stored-data migration.
- Whole masks fail open when unavailable; edge frames retain their attachment-URL fallback.

## Completed verification

- Hosted branch CI [41212422925](https://github.com/schlotterer/flexline/actions/runs/41212422925)
  and PR CI [41212427782](https://github.com/schlotterer/flexline/actions/runs/41212427782)
  passed for documentation receipt commit 7fbd395d. The runtime fix is d014d07f.
  Publish and DFG production jobs were skipped in both runs.
- Independently verified the 333-file ZIP: checksums, exact source identity, all
  145 owned PHP files, font references/case uniqueness and runtime exclusions.
  Only the two intended admin PHP files differ from the preceding candidate.
- Verified ZIP SHA256:
  `27d958ea8a47eeab3042ebc943517e0fd11b2b73d8f9725677f10a76b1fe306d`.
  The 7fbd395d artifact is byte-identical to the installed d014d07f artifact.
- Native WordPress Theme_Upgrader installation in the independent official
  Beta 2/PHP 8.2.35 Linux canary matched all 333 files. Captured posts, postmeta
  and tested settings survived without database restore; only Core's expected
  widget-activation timestamp was excluded from the data comparison.
- Section Shapes checks include mode transitions, Site Editor and synced-pattern
  save/reopen, unavailable-SVG warning/fallback, delete-all, Content Shift
  zero/edge/mobile reset, nested Cover and content growth.
- Mobile admin cards passed live save/reopen, real SVG selection/replacement,
  both reorder directions including keyboard and 11 widths from 320 to 1440px
  without horizontal overflow. Disposable presets were removed and the original
  seven synthetic definitions restored exactly.
- PHP: 48 tests / 180 assertions. JavaScript: 2 suites / 21 tests. Scoped PHPCS,
  extracted inline CSS stylelint and diff checks passed.
- Token contracts passed with/without Web4SL; disposable editor roundtrips and
  read-only custom-block/pattern/document probes are recorded in release progress.
  No existing Local content was resaved by these tests.

Detailed historical receipts: [30 October ZIP/recovery](acceptance-2.2.2-2026-10-30.md),
[mobile preset checks](mobile-presets-2.2.2-2026-10-31.md),
[cleanup history](../section-shapes-release-2.2.2-cleanup-plan.md) and
[release progress](../RELEASE_IMPLEMENTATION_PLAN.md).

## Coverage and recovery limits

- Owner reported desktop Safari, iPhone and iPad checks complete. Android remains
  untested. The changed stacked admin UI has Chrome viewport/keyboard coverage;
  no new physical-device/Safari pass is claimed for that CSS change.
- Proportion mode is primarily for standalone decorative shapes without content.
  The earlier content/padding stress case is retained as an observation, not a
  release blocker for that intended use. No frontend sizing change was made;
  focused empty decorative-shape acceptance remains separate.
- Native prior-ZIP restore/re-upgrade preserved newer synthetic data and matched
  installed files. The historical GitHub 2.2.1 source archive declares header
  2.2.0 and contains both font-case aliases. It is not an actual hosted backup or
  a verified Fleet rollback package. Target-specific recovery, Canary Health and
  installed SEO integration remain separate deployment acceptance limits.
- The shortcode-related KSES authoring issue is handled for this release through
  supported tokens, literal-example syntax and updated documentation. Existing
  shortcodes remain for legacy rendering; use tokens when adding, moving or
  replacing dynamic content. No automatic conversion/resave occurs. This is not
  a claim that the upstream Core sanitizer was patched.
- The separate NOSCRIPT issue and broader newer-beta/RC verification remain
  distinct. Web4SL examples using the expanded options/literal/Button URL behavior
  require its companion token update, which is not in the published v1.2.3 tag.

## Low-priority backlog (not 2.2.2 release gates)

- [Location map outer visual controls](https://github.com/schlotterer/web4sl-location-sync/issues/85).
- [Main floor-plan interface outer visual controls](https://github.com/schlotterer/web4sl-advanced-floor-plans/issues/4).
- [Safe content/class migration evaluation](https://github.com/schlotterer/flexline/issues/584).

Each issue is labeled Low Priority. Existing layout/control and migration
safeguards remain part of that future review; no implementation or automatic
migration is introduced by this release.

## Release actions still pending

PR #582 remains draft and unmerged into main. After final review/acceptance,
merge to main and verify main CI. Creating v2.2.2 requires separate publication
authorization. The approved workflow keeps ZIP publication and DFG production
branch promotion coupled; production consumers may react to that branch update.
Retain each target's actual recovery package and never restore an older database
over newer content. No tag, publication or production promotion is authorized by
this note.
