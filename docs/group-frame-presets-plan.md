# FlexLine Group Frames — gated controls and Content Shift compatibility

## Summary

Follow-up: [2.2.2 review cleanup](section-shapes-release-2.2.2-cleanup-plan.md).
The results below are historical feature checks; final cleanup acceptance is
tracked separately in that plan.

Implement centrally managed Group frame presets in seven manageable sessions. Add a site-wide enable toggle and a per-Group toggle, both defaulting to off.

Follow the repository’s Lead review → Senior implementation → QA workflow. Each session ends with relevant checks, documentation, a focused commit, and a recorded next step.

## Controls and saved state

**Theme Options → Frames**

- Add “Enable Group Frames,” stored as `flexline_enable_group_frames`.
- Show the preset manager only when enabled.
- Disabling suspends all frame rendering and overlap, and hides block-level frame controls.
- Preserve presets and block selections while disabled, including when saving the hidden admin section.

**Group Styles → FlexLine Frame**

- Show “Use Frames,” stored as boolean `flexlineUseFrames`.
- Reveal frame selections and overlap controls only when checked.
- Unchecking removes the effects but retains selections and overlap choices.
- Re-enabling restores valid selections.

**Preset model**

- Store ordered presets in `flexline_frame_presets`: immutable ID, label, top/bottom side, SVG attachment ID, and responsive height fields.
- Accept Media Library SVGs only; begin with no bundled presets.
- Use minimum pixels, preferred `vw`, and maximum pixels, defaulting to `56 / 7 / 112`. Validate positive finite values and minimum ≤ maximum.
- Store selected IDs in `flexlineFrameTop` and `flexlineFrameBottom`.
- Store per-edge overlap as `none`, `half`, or `full`, defaulting to `none`.
- Resolve current preset data during rendering. Missing or wrong-side presets leave that edge unframed.

Support ordinary Groups with absent, default, or constrained layouts. Retain settings but suspend effects on Row, Stack, and Grid variations.

## Content Shift compatibility contract

- Frames own mask properties and frame-specific CSS variables. They do not alter Content Shift attributes, transforms, horizontal margins, or z-index.
- Frame overlap can affect vertical margins only when Content Shift is not actively controlling that edge.
- An enabled, explicitly supplied Content Shift value—including zero—takes precedence: `shiftUp` over top overlap, `shiftDown` over bottom overlap.
- Preserve suppressed overlap selections. Explain beside the overlap control that Content Shift currently controls that edge.
- Respect “Restore Normal on Mobile”: when Content Shift stops applying at its existing mobile breakpoint, the configured frame overlap becomes effective again.
- Disabling either frame toggle removes all frame margin overrides and leaves Content Shift behavior intact.
- Use explicit shared CSS rules for precedence, including editor preview. Do not depend on stylesheet order or competing `!important` declarations.
- Keep padding manual. Existing “Raise z-index” remains the stacking control; verify its behavior with masked containers.

## Implementation sessions

### 1. Architecture and prerequisites

Review ownership boundaries, class/module structure, settings registration, and editor/frontend loading contexts.

Establish project-local PHPUnit tooling. Verify and document the existing Web4SL SVG sanitization prerequisite without silently introducing another sanitizer.

Confirm compatibility with the theme’s declared WordPress 6.5/PHP 8.1 minimum and the local WordPress 7.1 files.

**Exit:** reviewed architecture, explicit dependencies, reproducible checks, and recorded baseline results.

**Session 1 status:** completed locally on 2026-09-07.

Architecture findings:

- Parent-theme ownership is correct. FlexLine should own reusable Section Frames settings, block attributes, editor controls, render-time class/style injection, and shared CSS. OCW should remain a source of client-specific preset artwork and fallback manual classes, not the implementation home for this reusable feature.
- Theme includes are directory-based from `functions.php`: `inc/blocks/`, `inc/functions/`, `inc/hooks/`, `inc/setup/`, `inc/scripts.php`, and `inc/theme-options/`. Frame PHP should stay in those existing areas rather than introducing a parallel loader.
- Theme Options already uses `Appearance > FlexLine Options` with tabbed settings. The global feature toggle and preset manager should add a new `Section Frames` tab or a clearly separated `Section Frames` section, with settings registered through `inc/theme-options/theme-settings.php` or a small included settings class.
- Frontend block mutations already centralize in `inc/blocks/block-extensions.php` and use `WP_HTML_Tag_Processor`. Frame rendering should use the same HTML API, preferably through small helper classes/functions instead of expanding the existing render callback into more procedural branches.
- Editor block controls are centralized in `src/js/blocks/controls/`, `src/js/blocks/attributes.js`, `src/js/blocks/controls/index.js`, and `src/js/blocks/wrapper-props.js`. Section Frames controls should be added to the Group handler and gated by localized editor config from `flexline_enqueue_block_editor_assets()`.
- Content Shift currently writes classes, CSS variables, and direct editor-preview margin/transform fallbacks in more than one place. Frame overlap must integrate with that existing wrapper/render path and should not create a second independent margin writer.
- Supported block scope should remain ordinary `core/group` only for frame effects. Attributes may be retained on `core/row`, `core/stack`, and `core/grid`, but effects should be suspended there as planned.

Dependency and compatibility findings:

- FlexLine declares `Requires at least: 6.5`, `Tested up to: 7.0`, `Requires PHP: 8.1`, and version `2.2.0` in `style.css` and `readme.txt`.
- The local runtime used for this review is PHP 8.2.29, Node 16.17.0, npm 8.15.0, and PHPCS 3.13.6.
- The local WordPress checkout contains WordPress 7.1 files; existing FlexLine editor compatibility code already checks WordPress 7.0+ behavior for core Gallery lightbox, Breadcrumbs, and Visibility.
- PHPUnit was not installed before this session. Added project-local PHPUnit tooling with `phpunit/phpunit:^10.5`, `phpunit.xml.dist`, `tests/bootstrap.php`, and a minimal smoke test in `tests/Unit/BootstrapTest.php`.
- Composer audit initially reported advisories in PHPCS/WPCS dev tooling. Updated the affected packages to patched versions: `squizlabs/php_codesniffer` 3.13.6, `wp-coding-standards/wpcs` 3.4.1, and `phpcsstandards/phpcsutils` 1.2.3.
- SVG upload enabling currently happens in `inc/hooks/utilities-shortcode-misc.php` via `upload_mimes`, with a code comment stating that SVG content is sanitized by Web4SL before upload. FlexLine does not currently include or instantiate an SVG sanitizer.
- Frame presets must therefore continue accepting only Media Library SVG attachments and must fail closed when the resolved attachment is missing, not SVG, or cannot be trusted. Do not add a second sanitizer inside FlexLine unless the platform ownership decision changes.

Baseline commands:

```bash
php -v
node -v
npm -v
vendor/bin/phpcs --version
composer audit
composer test
npm run test:primary-terms
npm run lint-js
npm run lint-style
vendor/bin/phpcs --extensions=php
```

Baseline results:

- `composer test` passes: 1 PHPUnit smoke test, 2 assertions.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `npm run lint-js` passes.
- `npm run lint-style` passes.
- `vendor/bin/phpcs --extensions=php` passes after a pre-existing reserved-keyword callback parameter was renamed in `inc/blocks/block-extensions.php`.
- `composer validate --strict` reports the manifest is valid, with the existing warning that Composer packages published to Packagist should omit the `version` field.
- `composer audit` passes with no security vulnerability advisories found. Composer still warns that its future default for abandoned-package auditing will change, so the project can later set `audit.abandoned` explicitly if needed.

Session 2 starting point:

- Add the Section Frames settings model and validation first, covered by PHPUnit unit tests.
- Keep the first implementation pass independent of editor UI and frontend masks until preset storage, IDs, side validation, height validation, and attachment resolution are tested.

### 2. Settings model and Frames admin

Implement object-oriented PHP for feature enablement, preset validation, stable IDs, and attachment resolution.

Add the gated preset manager using existing Theme Options and Media Library patterns. Support accessible add/edit/remove/reorder actions and a separate settings group.

**Exit:** toggling and saving retain hidden presets; invalid submissions produce useful errors; storage tests pass.

**Session 2 status:** completed locally on 2026-09-07.

Implemented:

- Added `FlexLine\Section_Frame_Presets` as the Section Frames settings model.
- Registered separate Settings API groups for the global enable toggle and preset storage.
- Added `Appearance > FlexLine Options > Section Frames`.
- Added the global `Enable Section Frames` control backed by `flexline_enable_group_frames`.
- Added the gated `Frame Shape Presets` manager backed by `flexline_frame_presets`.
- Preset rows support label, edge side, Media Library SVG attachment ID, responsive min/preferred/max height values, remove, and keyboard-accessible up/down reorder actions.
- New preset IDs are generated server-side when missing or duplicated; existing valid IDs are retained.
- Invalid submissions preserve the previously saved presets and report settings errors instead of partially saving bad rows.
- Omitted preset input preserves saved presets, while an intentionally submitted empty manager clears presets.
- Attachment validation accepts only Media Library items whose MIME type resolves to `image/svg+xml`.
- Follow-up fix on 2026-09-07: moved the unsaved preset row prototype into a table-wrapped `<template>` so placeholder fields are not submitted with the form, added client-side row validation for missing labels or SVG attachments, made Theme Options tabs URL-addressable so preset saves return to `tab=frames`, and collapsed Section Frames to one settings group/form/save button so the enable toggle and presets cannot be saved separately by accident.

Verification:

- `composer test` passes: 9 PHPUnit tests, 20 assertions.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `vendor/bin/phpcs --extensions=php` passes.
- `npx wp-scripts lint-js assets/js/theme-options.js` passes.

Session 3 starting point:

- Add frame block attributes and frontend rendering behind the global toggle, per-block toggle, supported-layout check, and side-aware preset resolution.
- Keep OCW manual `ocw-shape` classes untouched while introducing FlexLine-owned Section Frame classes/CSS variables.

### 3. Frontend masking

Register frame attributes and implement a common activation check covering global toggle, block toggle, supported layout, and valid preset.

Apply the planned classes and CSS variables to the Group root using WordPress HTML processing APIs. Implement top, bottom, and combined masks with seam tolerance and short-container safeguards.

**Exit:** masks clip backgrounds and content correctly; both toggles suppress output; preset edits affect fresh renders without page edits.

**Session 3 status:** completed locally on 2026-09-07.

Implemented:

- Registered Section Frame block attributes for Group-family blocks: `flexlineUseFrames`, `flexlineFrameTop`, `flexlineFrameBottom`, `flexlineFrameOverlapTop`, and `flexlineFrameOverlapBottom`.
- Added side-aware render resolution that returns the preset SVG URL and responsive height clamp from the saved preset model.
- Added a shared render activation check requiring the global enable option, the per-block `Use Frames` attribute, a supported ordinary Group layout, and at least one valid side-matched preset.
- Added frontend root classes and CSS variables through the existing `WP_HTML_Tag_Processor` render path for `core/group`.
- Suspended frame effects on Row, Stack, and Grid layouts while retaining their saved attributes for future editor UI compatibility.
- Added shared frontend/editor SCSS for top, bottom, and combined CSS masks, including short-container safeguards and overlap-tolerant mask sizing.
- Left overlap margin behavior for session 5 so this pass only clips the Group frame shape and does not compete with Content Shift.

Verification:

- `composer test` passes: 13 PHPUnit tests, 31 assertions.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `vendor/bin/phpcs --extensions=php` passes.
- `npm run lint-js` passes.
- `npm run lint-style` passes.
- `npm run build` passes and refreshes compiled assets.

Session 4 starting point:

- Localize resolved Section Frame presets into the editor config.
- Add the gated Group Styles controls with side-filtered top/bottom selects and unavailable-preset notices.
- Apply editor preview classes and CSS variables through wrapper props without persisting generated output in saved block content.

### 4. Block controls and preview

Add the gated Styles panel, side-filtered selects, and unavailable-preset notices. Pass resolved presets through existing editor configuration.

Apply preview properties without persisting generated frame classes or styles in saved content.

**Exit:** disabling/re-enabling retains choices, save/reload produces no validation errors, and post/Site Editor previews match frontend output.

**Session 4 status:** completed locally on 2026-09-07.

Implemented:

- Added editor configuration for Section Frames to `window.flexlineBlockExtensions.sectionFrames`.
- The editor config includes the global enabled state and only renderable presets: valid Media Library SVG, valid side, current attachment URL, and responsive height clamp.
- Added a `FlexLine Section Frames` panel in the block Styles inspector for ordinary Group editing.
- The panel is hidden when Section Frames are globally disabled, preserving saved block selections while avoiding inactive controls.
- Added `Use Section Frames`, `Top Frame Shape`, and `Bottom Frame Shape` controls with side-filtered preset options.
- Added editor notices for missing side presets, unavailable saved selections, and unsupported Row/Stack/Grid layouts.
- Added editor preview-only wrapper classes and CSS variables through `editor.BlockListBlock` wrapper props.
- Generated frame classes and frame CSS variables are not persisted to saved block `className` or saved markup.
- Left overlap controls and margin behavior for session 5 so editor preview remains aligned with current frontend masking behavior.

Verification:

- `composer test` passes: 15 PHPUnit tests, 38 assertions.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `vendor/bin/phpcs --extensions=php` passes.
- `npm run lint-js` passes.
- `npm run lint-style` passes.
- `npm run build` passes and refreshes compiled assets.

Session 5 starting point:

- Add top/bottom overlap controls and implement the half/full responsive margin behavior.
- Integrate overlap with Content Shift precedence, including explicit zero values and mobile reset behavior.
- Keep the editor wrapper and frontend render paths in sync while avoiding competing margin writers.

### 5. Overlap and Content Shift integration

Implement responsive half/full overlap and the per-edge precedence contract.

Integrate carefully with existing editor wrapper-property handling, which currently writes and clears margins in multiple places. Avoid adding another competing margin writer.

**Exit:** Content Shift wins consistently, mobile reset behaves as specified, and toggle changes restore the correct remaining styles.

**Session 5 status:** completed locally on 2026-09-07.

Implemented:

- Added per-edge Section Frame overlap controls in the Group Styles panel.
- Overlap controls are available after a valid top or bottom frame selection and store `none`, `half`, or `full` on the existing frame overlap attributes.
- Added frontend render classes and CSS variables for responsive half/full top and bottom overlap.
- Added editor preview classes, CSS variables, and direct inline preview margins for active frame overlap.
- Content Shift only overrides a frame overlap when Content Shift is enabled and the matching edge field is intentionally set, including explicit zero values.
- Top and bottom precedence are independent: active `shiftUp` only controls top overlap, and active `shiftDown` only controls bottom overlap.
- When Content Shift controls an edge and Restore Normal on Mobile is enabled, the frame overlap is emitted as mobile-only so it resumes at the existing mobile breakpoint.
- Updated Content Shift editor preview fallbacks so direct inline margins/transforms do not defeat Restore Normal on Mobile.

Verification:

- `composer test` passes: 21 PHPUnit tests, 58 assertions.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `vendor/bin/phpcs --extensions=php` passes.
- `npm run lint-js` passes.
- `npm run lint-style` passes.
- `npm run build` passes and refreshes compiled assets.

Session 6 starting point:

- Run integration QA across admin saving, editor reload, frontend rendering, Content Shift overlap precedence, mobile reset, existing Group spacing, Row/Stack/Grid suspension, and deleted preset/media cases.

Session 6 review cleanup:

- Keep SVG normalization in the Section Frame preset resolver so uploaded Media Library files are not mutated.
- Cache normalized SVG data URIs for the current request to avoid repeatedly reading and encoding the same attachment.
- Treat a submitted empty preset manager as an intentional clear action, while still preserving presets when the manager is not submitted.
- Do not add a REST or AJAX normalizer for newly selected, unsaved admin previews yet; saved previews, editor previews, and front-end rendering use the normalized source.

### 6. Integration QA

Test:

- Global and block toggle combinations, including save/reload while disabled.
- Top/bottom/both masks, deleted presets/media, and layout transforms.
- Overlap against empty, zero, and nonzero Content Shift values on each edge.
- Mobile reset, horizontal shifts, slide transforms, raised z-index, and existing Group spacing.
- Background colors/gradients/images, nested content, short Groups, keyboard interaction, and Group links.
- Post editor, Site Editor, frontend, supported browsers, and minimum WordPress compatibility.

Run PHPUnit, PHP lint/PHPCS, JS/CSS lint, explicit lint for modified admin JS, and `npm run build`.

**Exit:** no unresolved feature regressions; unrelated baseline failures are identified separately.

**Session 6 status:** completed locally on 2026-09-07.

QA coverage recorded:

- Admin saving verified during implementation: global enablement, preset add/edit, Media Library SVG selection, label/image persistence, tab retention after save, single combined save action, remove/reorder behavior, and submitted empty preset clearing.
- Editor behavior verified while testing: controls appear in the Group Styles panel when globally enabled, saved frame selections reload, top/bottom side filters work, unavailable/missing side selections are called out, and unsupported Row/Stack/Grid layouts retain attributes without rendering.
- Rendering behavior verified while testing: top-only, bottom-only, combined top/bottom frames, different top/bottom heights, Cover/background image/gradient cases, constrained Group width, and the combined-mask placement correction.
- Overlap behavior covered by tests and manual checks: `none`, `half`, `full`, explicit Content Shift `0`, per-edge precedence, and mobile-reset overlap restoration.
- SVG workflow reviewed with real Affinity exports. FlexLine now normalizes readable SVG sources at render/preview time by applying `preserveAspectRatio="none"` without mutating uploaded Media Library files.
- Manual browser/editor coverage still belongs in release QA: Chrome post editor, Site Editor canvas, front end, and Safari CSS mask sanity.

Verification:

- `npm run prod` passes and refreshes compiled assets.
- `composer test` passes: 23 PHPUnit tests, 67 assertions.
- `vendor/bin/phpcs --extensions=php` passes.
- `npm run test:primary-terms` passes: 9 standalone contract checks.
- `npm run lint-js` passes.
- `npm run lint-style` passes.
- `git diff --check` passes.

### 7. Documentation and handoff

Update README and the existing plan with configuration instructions, SVG prerequisites, toggle retention behavior, Content Shift precedence, cache refresh expectations, and rollback steps.

**Exit:** reproducible setup and acceptance checklist; existing OCW content remains untouched.

**Session 7 status:** completed locally on 2026-09-07.

Documentation added:

- Added README instructions for configuring Section Frames in FlexLine Options and applying presets from the Group Styles panel.
- Documented supported Group layouts and retained-but-suspended behavior for Row, Stack, and Grid.
- Documented SVG setup requirements, including Affinity export settings and automatic `preserveAspectRatio="none"` normalization.
- Documented saved option names, block-attribute storage, cache refresh expectations, and rollback paths.
- Recorded Session 6 QA coverage and remaining release-level browser/editor sanity checks in this plan.

Acceptance checklist for release handoff:

- `Appearance > FlexLine Options > Section Frames` can enable/disable the feature without deleting saved presets.
- Presets can be added, edited, reordered, removed, and fully cleared.
- Presets reject non-SVG Media Library attachments.
- Saved presets remain available after admin reload.
- Group Styles controls show only when the global feature is enabled.
- Top selector only lists top presets; bottom selector only lists bottom presets.
- Missing/deleted/wrong-side presets do not render broken masks.
- Ordinary/default/constrained Group blocks render selected frames.
- Row, Stack, and Grid layouts retain settings but do not render frames.
- Top-only, bottom-only, and combined frames render against background color, gradient, image, and nested Cover content.
- Combined top/bottom frames remain aligned when top and bottom heights differ.
- Overlap values behave independently per edge.
- Content Shift overrides only the matching edge when explicitly active, including `0`.
- Content Shift mobile reset allows configured frame overlap to resume at the mobile breakpoint.
- Production assets are rebuilt before release.

## Boundaries and handoffs

No production deployment, automatic migration, external SVG URLs, bundled artwork, automatic padding, or left/right frames.

Each session records review results, changes, tests, limitations, commit, and next step. Preset and global-toggle changes affect fresh renders; existing page/CDN caches require their normal purge process.
