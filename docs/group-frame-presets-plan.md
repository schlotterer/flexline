# FlexLine Group Frame Presets

## Summary

This document captures a future FlexLine parent-theme feature for reusable Group block frame presets. The goal is to let editors apply managed SVG clipping masks to Group blocks from the block inspector, while site-level frame definitions remain centralized in FlexLine Theme Options.

The O'Connor Woods child theme `ocw-shape` CSS mask utilities are the current reference for the clipping approach. They should be treated as a proof of concept for using CSS masks on the container itself, not as the final FlexLine class API or source of hardcoded masks.

## V1 Scope

V1 should support:

- `core/group` blocks only.
- Top and bottom frame sides only.
- SVG presets managed in the FlexLine parent theme.
- Per-side frame selection in the Group block inspector.
- Server-side preset resolution during block render.

V1 should not support:

- Cover, Columns, Column, Row, Stack, or Grid block frame controls.
- Left or right frame sides.
- Per-block frame height overrides.
- Client-child-theme-specific frame management.
- ACF or another admin dependency.

Left and right frame sides should remain future scope until corner behavior and SVG requirements are proven.

## Theme Options Model

Add a new FlexLine Theme Options "Frames" tab with a repeater-style preset manager.

Store presets in a new `flexline_frame_presets` option. Each preset row should include:

- Label.
- Generated id/slug.
- Side: `top` or `bottom` in v1.
- SVG media attachment id and/or SVG URL.
- Mask height.

The admin UI should reuse the existing FlexLine Theme Options media-library upload pattern rather than adding a new dependency.

Uploaded SVGs should be edge mask SVGs:

- black or opaque visible area;
- transparent clipped area;
- already oriented for the selected side;
- sized as a single edge mask, not as a full decorative illustration.

## Editor And Render Model

Add Group block attributes:

- `flexlineFrameTop`
- `flexlineFrameBottom`

Add a "FlexLine Frame" inspector panel on Group blocks with:

- Top Frame select populated only with top-side presets.
- Bottom Frame select populated only with bottom-side presets.

Saved block content should store only the selected preset ids. During `render_block`, FlexLine should resolve the current preset data from `flexline_frame_presets` and apply the render output. This keeps existing pages connected to updated Theme Options presets without requiring page edits.

Rendered classes:

- `flexline-frame`
- `flexline-frame-top`
- `flexline-frame-bottom`

Rendered CSS variables:

- `--flexline-frame-top-mask`
- `--flexline-frame-top-height`
- `--flexline-frame-bottom-mask`
- `--flexline-frame-bottom-height`

## CSS Model

Use `mask-image` and `-webkit-mask-image` on the Group block itself so the actual container is clipped. The mask should affect the Group's background color, gradient, background image behavior, and nested content.

The FlexLine implementation should not use pseudo-elements for the frame shape in v1. Pseudo-elements create divider-like color layers; this feature is intended to clip the actual container shape.

Top-only, bottom-only, and top-plus-bottom states should all work. CSS should include small overlap tolerance where needed to avoid visible one-pixel gaps between mask layers.

## Test Plan

Validate the feature with:

- Theme Options add, remove, reorder, save, and reload behavior for frame presets.
- Safe SVG media upload and saved attachment/URL values.
- Group inspector preset lists filtered by side.
- Editor preview and frontend output for top-only, bottom-only, and top-plus-bottom frames.
- Background colors, gradients, images, and nested content clipped by the same mask.
- Existing Groups updating after a Theme Options preset changes, without editing page content.
- `npm run lint-js`.
- `npm run lint-style`.
- PHP lint/PHPCS for changed PHP files where practical.
- Rebuilt frontend and editor assets.

## Assumptions

- This belongs in the FlexLine parent theme, not client child themes.
- OCW remains a reference implementation only.
- V1 supports Group blocks, top frames, and bottom frames.
- Preset height is managed centrally in Theme Options.
- Preset SVGs are trusted admin-managed media-library assets and still sanitized as URLs/attachments.
