# Section Shapes

Proposed slug: `/custom-attributes/section-shapes/`
Category: Custom Attributes
Blocks: Group

## Listing Card

Card title: Section Shapes
Card meta: Group
Suggested image: editor screenshot showing a Group with a visible top frame, bottom frame, or whole-section SVG mask selected in the FlexLine Section Shapes panel.
Example SVGs: `docs/website/section-shapes-examples/top-gentle-wave.svg`, `docs/website/section-shapes-examples/bottom-gentle-wave.svg`, and `docs/website/section-shapes-examples/whole-curvy-shape.svg`.

## Excerpt

Section Shapes let FlexLine users add reusable SVG top frames, bottom frames, and whole-section masks to Group blocks. Use them to create custom curved edges, branded section silhouettes, and more expressive layouts without writing custom CSS.

## Article Draft

We are excited to introduce **Section Shapes**, a FlexLine feature that gives Group blocks custom SVG edges and full-section masks directly from the block editor. With Section Shapes, site builders can create top and bottom frames, organic section transitions, and whole-section silhouettes such as logos, badges, or custom background shapes without writing custom CSS for each page.

Section Shapes are built around reusable SVG presets. Create the preset once in FlexLine Options, then apply it to any ordinary Group block from the editor sidebar. This keeps custom layouts consistent across the site while still giving editors control over which shape appears on each section.

## Key Benefits

- **Custom section edges:** Add reusable top or bottom frames to create waves, curves, angles, and branded transitions between sections.
- **Whole-section masks:** Clip an entire Group to a single SVG silhouette so backgrounds and child blocks sit inside a custom shape.
- **Reusable presets:** Manage shape files once in the theme options and select them by name in the editor.
- **Responsive sizing:** Use minimum, preferred, and maximum frame heights so edge shapes scale predictably across screen sizes.
- **Editor-friendly controls:** Enable Section Shapes per Group and show only the shape options that apply to the selected mode.
- **Content Shift compatibility:** Continue using Content Shift where needed; matching edge overlap is only overridden when Content Shift is specifically active.

## How Section Shapes Work

Section Shapes use SVG files from the Media Library as masks. Opaque parts of the SVG reveal the Group, and transparent parts clip it away. For top and bottom frames, the SVG creates an edge mask at that side of the Group. For whole-section shapes, the SVG masks the full Group, including the background and any child blocks inside it.

The feature is opt-in globally and per block. This means existing pages do not change just because presets exist. A site admin first enables Section Shapes and creates presets under **Appearance > FlexLine Options > Section Shapes**. Editors then enable **Use Section Shapes** on the Group blocks where those presets should render.

## Setting Up Shape Presets

1. Go to **Appearance > FlexLine Options > Section Shapes**.
2. Enable **Section Shapes**.
3. Add a new Section Shape preset.
4. Enter a clear label so editors can recognize the shape later.
5. Choose an SVG from the Media Library.
6. Select the preset type: **Top frame**, **Bottom frame**, or **Whole section**.
7. Save Section Shapes.

For top and bottom frames, use the **Min**, **Preferred**, and **Max** fields to control the responsive height of the frame. These fields size the SVG mask band at the edge of the section. They do not add padding or move the content inside the Group.

For whole-section masks, choose one of two behaviors:

- **Shape fills group:** The Group controls the size. Its width, content, padding, and minimum height define the box, and the SVG stretches to fill it.
- **Group fits SVG proportion:** The SVG viewBox controls the Group's aspect ratio. This is useful when the shape itself should define the height from the available width.

## Applying a Shape to a Group

1. Edit a page or template in the WordPress editor.
2. Select an ordinary Group block.
3. Open the block sidebar and go to **Styles > FlexLine Section Shapes**.
4. Enable **Use Section Shapes**.
5. Choose a **Shape Type**:
   - **Top frame**
   - **Bottom frame**
   - **Top and bottom frames**
   - **Whole section**
6. Select the saved shape preset shown for that type.
7. Save the page and preview it on the front end.

Section Shapes are intended for ordinary Group blocks. Row, Stack, and Grid layouts retain saved settings but do not render the visual shape.

## Preparing SVG Files

The cleanest results come from SVG files built specifically for masking. The color of the shape is less important than its transparency: opaque areas show the Group, and transparent areas clip it away.

For top frames, fill the area below the edge and leave the area above the edge transparent. For bottom frames, fill the area above the edge and leave the area below the edge transparent. For whole-section masks, make the entire visible silhouette fit inside the SVG artboard or document bounds.

When exporting from Affinity, use SVG format, enable **Set view box**, use a valid Raster DPI such as `300`, and keep the artboard bounds intentional. Transparent corners, holes, and margins inside the SVG matter because they become part of the mask.

Whole-section masks should stay small and simple. FlexLine expects a locally readable Media Library SVG no larger than 256 KiB for whole-section masks. The **Group fits SVG proportion** behavior also needs a valid SVG `viewBox` with positive width and height.

## Layout Tips

Top and bottom frame overlap controls move the shaped Group against nearby sections. They do not reposition the content inside the Group. If a headline, button, or image needs to sit farther away from a curve or cutout, use the Group's normal padding, spacing, width, and minimum-height controls.

Whole-section masks clip both the Group background and the blocks inside it, but the content still lays out in a rectangular editor area. Keep important text, links, buttons, and focusable controls inside the visible part of the shape, then check the result at desktop and mobile widths.

## Creative Uses

Section Shapes are useful for adding branded transitions between content bands, creating hero sections with custom silhouettes, framing testimonial or feature sections, and giving campaign pages a stronger visual identity without making every page a custom template.

For example, a senior living community site might use a gentle wave between lifestyle sections, a custom bottom frame under a photo-driven hero, or a logo-shaped mask around a featured neighborhood callout. The same shape presets can then be reused across multiple pages for a consistent design system.

## Best Practices

- Use clear preset labels so editors know which shape they are selecting.
- Keep frame SVGs wide and short, such as `1440 x 160`.
- Keep whole-section SVG bounds deliberate and avoid accidental transparent margins.
- Use whole-section proportion mode when the shape should control the section ratio.
- Use fill mode when the section's content, padding, or Cover minimum height should control the layout.
- Preview on multiple screen sizes before publishing.
- Use Content Shift intentionally when a shaped section needs to overlap surrounding content.

Section Shapes give FlexLine users a practical way to move beyond rectangular sections while keeping the workflow inside familiar WordPress controls.
