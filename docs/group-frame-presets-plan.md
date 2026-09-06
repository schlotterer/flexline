# FlexLine Group Frames — gated controls and Content Shift compatibility

## Summary

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

### 2. Settings model and Frames admin

Implement object-oriented PHP for feature enablement, preset validation, stable IDs, and attachment resolution.

Add the gated preset manager using existing Theme Options and Media Library patterns. Support accessible add/edit/remove/reorder actions and a separate settings group.

**Exit:** toggling and saving retain hidden presets; invalid submissions produce useful errors; storage tests pass.

### 3. Frontend masking

Register frame attributes and implement a common activation check covering global toggle, block toggle, supported layout, and valid preset.

Apply the planned classes and CSS variables to the Group root using WordPress HTML processing APIs. Implement top, bottom, and combined masks with seam tolerance and short-container safeguards.

**Exit:** masks clip backgrounds and content correctly; both toggles suppress output; preset edits affect fresh renders without page edits.

### 4. Block controls and preview

Add the gated Styles panel, side-filtered selects, and unavailable-preset notices. Pass resolved presets through existing editor configuration.

Apply preview properties without persisting generated frame classes or styles in saved content.

**Exit:** disabling/re-enabling retains choices, save/reload produces no validation errors, and post/Site Editor previews match frontend output.

### 5. Overlap and Content Shift integration

Implement responsive half/full overlap and the per-edge precedence contract.

Integrate carefully with existing editor wrapper-property handling, which currently writes and clears margins in multiple places. Avoid adding another competing margin writer.

**Exit:** Content Shift wins consistently, mobile reset behaves as specified, and toggle changes restore the correct remaining styles.

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

### 7. Documentation and handoff

Update README and the existing plan with configuration instructions, SVG prerequisites, toggle retention behavior, Content Shift precedence, cache refresh expectations, and rollback steps.

**Exit:** reproducible setup and acceptance checklist; existing OCW content remains untouched.

## Boundaries and handoffs

No production deployment, automatic migration, external SVG URLs, bundled artwork, automatic padding, or left/right frames.

Each session records review results, changes, tests, limitations, commit, and next step. Preset and global-toggle changes affect fresh renders; existing page/CDN caches require their normal purge process.
