## Building from Source

If you intend to clone the repository for custom development or contributions, please:
- [Review the Contribution Guidelines](CONTRIBUTION_GUIDELINES.md)
- [Review the Coding Standards](docs/coding-standards.md)
- [Review the Code of Conduct](CODE_OF_CONDUCT.md)

Then you can follow these instructions:

### Prerequisites

- Node.js (LTS version recommended)
- npm (Node Package Manager)
- nvm (Node Version Manager) – recommended for managing multiple Node.js versions
- **Composer** – required for managing PHP dependencies

### Build Instructions

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/schlotterer/flexline.git
   cd flexline
   ```

2. **Switch to the Recommended Node.js Version**:
   - Ensure you are using the correct version of Node.js as specified in the `.nvmrc` file.
   ```bash
   nvm use
   ```
   - If the required version is not installed, nvm will prompt you to install it.

3. **Install Node.js Dependencies**:
   ```bash
   npm install
   ```

4. **Install PHP Dependencies**:
   - Ensure Composer is installed on your system.
   ```bash
   composer install
   ```

5. **Development Build**:
   - Compiles assets without minification for easier debugging.
   ```bash
   npm run dev
   ```

6. **Watch Mode**:
   - Automatically rebuilds assets when files change, useful during active development.
   ```bash
   npm run watch
   ```

7. **Production Build**:
   - Minifies assets for production use.
   ```bash
   npm run prod
   ```

### Linting and Pre-commit Hooks

To maintain code quality and ensure consistency across contributions, our project utilizes linting tools for PHP, JavaScript, and SCSS, and enforces these standards through pre-commit hooks managed by Husky.

#### Pre-commit Hooks

Pre-commit hooks are set up to run automatically on every commit to ensure that changes adhere to our coding standards. When you attempt to commit changes, the following linting processes are triggered:

- **PHP files** are automatically fixed and checked with PHP_CodeSniffer.
- **JavaScript files** are linted and automatically fixed with ESLint.
- **SCSS files** are linted and automatically fixed with Stylelint.

If there are any linting errors that cannot be automatically fixed, the commit will be aborted, and you will need to manually resolve these issues.

#### Manually Running Linters

If you wish to manually lint your files prior to committing, you can use the following commands:

- **Lint PHP files**:
  ```bash
  npm run lint-php
  ```

- **Automatically fix PHP files**:
  ```bash
  npm run fix-php
  ```

- **Lint JavaScript files**:
  ```bash
  npm run lint-js
  ```

- **Lint SCSS files**:
  ```bash
  npm run lint-style
  ```

These commands provide a way to proactively check and fix your code, helping you avoid surprises during the commit process.

### SCSS Module Migration Debt

FlexLine still uses Sass `@import` throughout the theme SCSS tree. The
production build currently silences the known `@import` deprecation warning so
release builds stay readable, but the underlying migration is still needed.

Do not convert these imports casually one file at a time. Moving from `@import`
to `@use` changes variable, mixin, and function scoping, so the migration should
be handled as a controlled SCSS architecture refactor with a full visual
regression pass across frontend pages, editor styles, modals, and block
variations.

## Block Utility Functions

Reusable React helpers for block controls live in `src/js/blocks/utils.js`.

- `getVisibilityControls( props )` – renders ToggleControls to hide blocks on desktop, tablet, or mobile.
- `getContentShiftControls( props )` – outputs the Content Shift/Slide panel for applying negative margins and transforms.

## Responsive Visibility

FlexLine responsive visibility controls are available in the block inspector and write FlexLine attributes/classes (`hideOnDesktop`, `hideOnTablet`, `hideOnMobile` and `flexline-hide-on-*`) for frontend breakpoint behavior. This does not affect the separate Visibility Toggle Groups feature.

Inspector labels intentionally keep breakpoint ranges on the secondary help
line. Main labels should stay short, for example `Hide on Tablet`, while the
help text carries ranges such as `(782px - 991.98px)`.

## Positioned Background Image Utilities

FlexLine includes opt-in utility classes for decorative block background images
that should sit smaller in a corner or edge position instead of covering the
whole block. Assign the background image through the WordPress block controls,
then add one position class in **Advanced > Additional CSS class(es)**:

- `flexline-bkg-top-left`
- `flexline-bkg-top-center`
- `flexline-bkg-top-right`
- `flexline-bkg-center-left`
- `flexline-bkg-center-center`
- `flexline-bkg-center-right`
- `flexline-bkg-bottom-left`
- `flexline-bkg-bottom-center`
- `flexline-bkg-bottom-right`

Size and inset the image with custom properties on the same block:

```css
--flexline-background-width: clamp(240px, 42vw, 720px);
--flexline-background-height: auto;
--flexline-background-x-offset: 0px;
--flexline-background-y-offset: 0px;
```

The utility only controls `background-repeat`, `background-size`, and
`background-position`. It does not set the background image, color, or overlay.

## Shortcode Tokens

FlexLine shortcodes remain available for backward compatibility, and the same values can be used as token placeholders inside block content and patterns. Tokens are replaced at render time using double braces, for example:

- `{{flexline_copyright_year}}`
- `{{flexline_site_name}}`
- `{{flexline_page_title}}`

Empty token values render as blank strings.

## Plugin Integrations

FlexLine ships opinionated styling for several third-party plugins so they feel native without extra CSS tweaks:

- [Gravity Forms](https://www.gravityforms.com/) – aligns form fields, buttons, and validation messages with the theme’s typography and spacing.
- [Events Manager](https://wordpress.org/plugins/events-manager/) – keeps event lists, single templates, and the bundled starter settings consistent with FlexLine layouts.
- [Query Loop Filters](https://github.com/humanmade/query-filter) – matches filter bars and control states from Human Made’s Query Loop Filters plugin to the theme’s navigation spacing and button treatments.
- [Yoast SEO](https://yoast.com/wordpress/plugins/seo/) and [Rank Math SEO](https://wordpress.org/plugins/seo-by-rank-math/) – optional. FlexLine mirrors canonical primary-term choices to/from both plugins when installed.

## Authentication and Security Ownership

FlexLine does not own alternate-login URLs, fallback credentials, strict login
blocking, or 2FA enforcement. Standard WordPress authentication uses
`/wp-login.php`.

Use the operational security stack for 2FA:

- SiteGround Security Optimizer on SiteGround-hosted sites.
- Wordfence Login Security where Wordfence owns login security.
- The official Two-Factor plugin only where enrollment/compliance can be
  audited operationally.

Do not enable overlapping login-security systems without an explicit operations
decision. See [`SECURITY.md`](SECURITY.md) for rollout notes.

## Pattern Rendering Dependency

FlexLine supplies theme styles, global style presets, and block variations that
custom Web4SL patterns depend on, but it does not render Web4SL directory or
floor-plan patterns itself.

For `web4sl-location-sync`, pattern rendering must happen in the plugin so the
plugin can provide the correct `directory_locations` post context, REST security
rules, and fragment-local WordPress style-engine output. If directory card or
popover spacing/link colors regress after a WordPress update, start with
`web4sl-location-sync/docs/pattern-rendering-architecture.md`, not FlexLine
theme wrappers.

## Primary Terms and Breadcrumbs

- FlexLine owns canonical primary terms in post meta using `w4sl_primary_{taxonomy}`.
- On WordPress 7.0+ patterns use the core `core/breadcrumbs` block, not Yoast’s breadcrumbs block.
- FlexLine filters `block_core_breadcrumbs_post_type_settings` so core breadcrumbs prefer the canonical primary term (when the block uses taxonomy mode, e.g. `prefersTaxonomy: true`).
- If Yoast or Rank Math is active, FlexLine bi-directionally syncs primary-term values so editor changes and plugin UI changes stay aligned.
- Related posts and categories “Primary Term Only” mode both use the shared resolver, so behavior stays consistent across features.

## WordPress 6.9 Accordion Block

WordPress 6.9 ships a native accordion/accordion-item/heading/panel family. FlexLine automatically injects its visibility toggles and card/glass style variations into each of those blocks, so editors can keep using the same FlexLine controls—such as Card, Card w/ Padding, Outline, Glass, and Glass Card—without depending on a third-party accordion plugin.
