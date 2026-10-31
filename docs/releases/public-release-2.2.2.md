# FlexLine 2.2.2: Shapes, WordPress 7.2 Readiness, and ZIP-Delivered Updates

FlexLine 2.2.2 brings reusable Section Shapes, preparation for WordPress 7.2, and
versioned theme ZIPs built and checked through our release pipeline. It also
updates the guidance for adding dynamic content: use tokens for new work while
existing FlexLine and Web4SL shortcodes remain supported for older content.

## Shape your sections

Section Shapes adds reusable SVG presets for top edges, bottom edges, or a whole
section silhouette. Apply them to Group, Row, Stack, and Grid blocks, with
separate choices for top, bottom, both edges, or the whole section.

Choose **Shape fills block** when content and padding should determine the
section's size. Choose **Block fits SVG proportion** for standalone decorative
shapes that follow the SVG's proportions, without content inside them.

Create and manage presets under **Appearance → FlexLine Options → Section
Shapes**. The preset manager now stacks into labeled cards on phones and narrow
tablet screens, keeping SVG selection, settings, and reorder controls accessible.
Larger screens retain the table. Existing frame presets and saved selections are
preserved, including when the feature is disabled.

## Preparing for WordPress 7.2

This release aligns theme breakpoint settings with FlexLine's existing responsive
styles and prepares supported text-shadow controls to inherit Core behavior while
retaining the legacy fallback. Existing responsive controls and classes remain.

This is readiness work, not a claim of complete compatibility with the final
WordPress 7.2 release. Further Core testing continues as WordPress develops.

### What's happening with shortcodes?

During WordPress 7.2 testing, we found that content sanitization—WordPress's KSES
filtering—could change escaped shortcode examples into text that later executes
as a shortcode. Tokens provide our supported authoring path for the affected
FlexLine and Web4SL helpers, including a way to display examples literally.

**The shortcode-authoring issue is handled for this release through tokens and
updated authoring guidance.** This does not mean WordPress Core's underlying
behavior was patched. The separate `noscript` sanitization issue is unchanged.

Existing shortcodes continue to render. This update does not convert or resave
existing pages, patterns, or templates. You do not need to replace working legacy
content just to install the update. When adding, moving, or replacing dynamic
content, use its supported token instead.

For example, use `{{flexline_site_name}}` in new content in place of the legacy
`[flexline_site_name]` helper. This guidance covers supported FlexLine/Web4SL
helpers; it is not a conversion rule for every plugin's shortcodes.

### Using tokens

Paste the token where you want its value to appear. It is resolved when the
content is rendered, using your current site settings or page context.

| What to display | Token |
| --- | --- |
| Site name | `{{flexline_site_name}}` |
| Current page title | `{{flexline_page_title}}` |
| Current copyright year | `{{flexline_copyright_year}}` |
| Copyright year range | `{{flexline_copyright_year starting_year="2015" separator=" to "}}` |

FlexLine's tokens work without Web4SL. Phone, address, and other `web4sl_*` tokens
require the Web4SL plugin. The expanded options, literal-example syntax, and
native Button URL behavior below require the companion **Web4SL token update**;
installing FlexLine alone does not update that plugin.

With that companion update, examples include:

- `{{web4sl_phone_text}}` for the visible phone number.
- `{{web4sl_address}}` for the configured address markup.
- `{{web4sl_phone_number text="Call our team"}}` for a generated phone link with
  custom text.

For a native WordPress Button, enter `/{{web4sl_phone_href}}` in its URL field,
including the leading slash. Use `{{web4sl_phone_text}}` for the button's visible
phone number, or type your own label such as “Call our team.” Web4SL resolves the
URL to the configured telephone link on the frontend.

Use text-only tokens in titles and SEO fields. Address, contact, and generated
phone-link tokens produce HTML and belong in content. A Custom HTML block gives
generated contact markup a faithful editor preview. Use straight quotation marks
for named options.

### Showing a token as an example

To display a token without replacing it, put `!` immediately after the opening
braces:

```text
{{!flexline_site_name}}
```

That displays the text `{{flexline_site_name}}` to your reader. With the Web4SL
token update, the same pattern works for its tokens:

```text
{{!web4sl_phone_number text="Call our team"}}
```

A Code block alone does not stop token replacement. Use the literal prefix when
publishing an example; encoded braces are not a reliable substitute.

The full references are in **FlexLine Options → Utilities** and the Web4SL
plugin's **Authoring Tokens** documentation. Keep the corresponding updated theme
and plugin installed wherever you use the new token features.

## Versioned ZIP delivery

Theme release ZIPs are now built and checked in CI, with checksums and source
information identifying each package. They include the theme's runtime assets,
fonts, and required PHP dependencies while leaving out development tools and
source-only build files.

This release also removes the duplicate Montserrat font filename that could make
package verification ambiguous. ZIP publication and the managed production-branch
update run together through the approved release workflow.

Existing content is not automatically migrated as part of the update. Continue
to use your site's normal approved theme-update process.
