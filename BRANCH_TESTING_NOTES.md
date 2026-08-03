# Branch-vs-Main Testing Notes

## Scope and comparison basis

These notes cover the current working trees compared with each repository's
local `main` branch as of 2026-08-01.

Important repository state:

- `flexline` is on `release-2.2.1` and contains commits ahead of local `main`
  plus additional uncommitted changes.
- `web4sl`, `web4sl-location-sync`, `mylifesite-location-sync`,
  `web4sl-campaign-manager`, `web4sl-advanced-floor-plans`, and
  `web4sl-mcp-site-ops` are currently on `main`; their remediation changes are
  uncommitted working-tree changes.
- The repositories must still be split into one branch, commit, and PR per
  repository before release.
- This document is a test and review aid. It does not replace the repository
  test suites or the release gate.

For tracked changes, the comparison is equivalent to:

```bash
git diff main
```

Untracked files are listed explicitly because `git diff main` does not include
them until they are staged.

## Common release gate

Run these checks from each repository before committing:

```bash
git diff --check
find . -path './vendor' -prune -o -path './node_modules' -prune \
  -o -name '*.php' -type f -print0 | xargs -0 -n1 php -l
```

Also run the repository's configured PHPCS, PHPUnit, JavaScript lint,
stylesheet lint, and build commands. Confirm generated assets are included in
the same repository commit as their source changes.

## 1. FlexLine theme

### Change inventory

Tracked changes versus `main` include:

- Release and documentation: `CHANGELOG.md`, `composer.json`, `package.json`,
  `package-lock.json`, `style.css`, `readme.txt`, `phpcs.xml`, and
  `inc/theme-options/render-theme-docs.php`.
- Generated assets and build inputs: `assets/built/css/app.css`,
  `assets/built/css/editor.css`, `assets/built/js/load-early.js`,
  `assets/built/js/modal.js`, `assets/built/js/slidein.js`,
  `assets/built/js/slider.js`, `src/js/load-early.js`, `src/js/modal.js`,
  `src/js/slidein.js`, `src/js/slider.js`, `webpack.mix.js`, and the removal of
  `src/js/global.js` and `assets/built/js/global.js`.
- Block and content behavior: `inc/blocks/block-extensions.php`,
  `inc/blocks/related-posts.php`, `inc/functions/get-logo-url.php`,
  `inc/functions/utilities-options.php`, `inc/hooks/utilities-shortcode-misc.php`,
  `inc/hooks/body-classes.php`, `inc/hooks/query-loop.php`,
  `inc/setup/preload-assets.php`, and the changed pattern files under
  `patterns/`.
- Security and settings: `inc/hooks/security.php`,
  `inc/theme-options/class-admin.php`, `inc/theme-options/theme-settings.php`,
  `inc/hooks/add-og-tags.php`, and `inc/scripts.php`.
- Hygiene: tracked `assets/.DS_Store` is removed.

Untracked changes to include and test:

- `SECURITY.md`
- `inc/hooks/migrations.php`
- `BRANCH_TESTING_NOTES.md`

### Test notes

#### Build and asset parity

1. Run `npm run build` on Node 18 or newer.
2. Confirm the build succeeds and generated files are modified only where
   expected.
3. Confirm `src/js/global.js` and `assets/built/js/global.js` are absent and
   no PHP enqueue references the removed `global.js` handle or file.
4. Load representative front-end and editor pages and verify there are no
   404s for JavaScript or CSS assets.
5. Confirm the generated slide-in and slider assets contain the current source
   behavior, including i18n calls and reduced-motion handling.

Run the theme test matrix on the supported PHP floor declared by the branch
and on the production PHP version. Confirm activation, admin screens, front-end
rendering, and all changed blocks remain functional on PHP 8.1 and newer.

#### Responsive utility classes

1. Test the new left and right force-alignment utility classes at each declared
   breakpoint.
2. Verify the class wins only at its intended breakpoint, does not leak into
   neighboring breakpoints, and does not alter unrelated alignment utilities.
3. Test in editor preview and on the front end at desktop, tablet, and mobile
   widths, including nested block and RTL-sensitive layouts where applicable.
4. In the block inspector, confirm `Stack at Medium`, `Hide on Desktop`,
   `Hide on Tablet`, and `Hide on Mobile` show clean main labels with the
   breakpoint range only on the secondary line. Confirm finite ranges use the
   `(XXXpx - XXXpx)` format.

#### Slide-in menu and modal behavior

1. Test a normal header template and a header-less/blank template.
2. Open and close the menu repeatedly with mouse, keyboard, and Escape.
3. Tab through the menu and verify focus remains trapped while open.
4. Verify focus returns to the trigger after close. Test a menu with no
   focusable descendants and confirm the menu itself receives safe fallback
   focus.
5. Confirm repeated open/close cycles do not multiply keydown listeners.
6. Verify the page remains console-clean when no slide-in element exists.
7. Open and close modal media and verify focus restoration, Escape handling,
   and keyboard access.

#### Slider accessibility and motion

1. Use previous, next, pause, and any slide navigation controls with keyboard
   only.
2. Confirm inactive slides have `aria-hidden="true"`, are inert, and do not
   expose focusable descendants to keyboard navigation.
3. Confirm user-triggered slide changes produce a concise live status without
   noisy announcements during autoplay.
4. Enable `prefers-reduced-motion: reduce` before page load and confirm
   autoplay does not start.
5. Change the preference at runtime through browser emulation and confirm
   autoplay stops and restarts correctly.
6. Test one-slide, two-slide, and multi-slide configurations, including
   editor preview mode.

#### Settings, login migration, and security ownership

1. On a staging multisite copy, inventory sites with
   `custom_login_enabled=1` before enabling the migration.
2. Run the theme migration and verify the five obsolete custom-login keys are
   removed from every site while unrelated `flexline_utilities` settings remain
   unchanged.
3. Confirm `/wp-login.php`, password reset, `/wp-admin`, multisite login, and
   logout work normally. Confirm the old custom slug is not redirected by the
   theme.
4. Verify administrator communication is completed before production rollout.
5. Test 2FA through the operational security owner: SiteGround Security
   Optimizer on SiteGround sites, Wordfence Login Security where Wordfence is
   used, or the audited native Two-Factor plugin where applicable. Do not enable
   overlapping enforcement systems without an explicit operational decision.
6. Submit settings containing HTML/script payloads through the admin UI and
   verify stored values are sanitized and escaped on output.

#### SEO, shortcodes, logos, and body classes

1. Test page titles and excerpts containing approved `web4sl_*` and
   `flexline_*` shortcodes.
2. Confirm unrelated shortcode tags are not executed by title/metadata
   rendering and that the global shortcode registry is restored afterward.
3. Test `[web4sl_page_title]` recursively and confirm it terminates safely.
4. Test with no SEO plugin, Yoast active, and Rank Math active. Confirm
   FlexLine does not emit overlapping OG/description tags when an SEO plugin
   owns the metadata.
5. Test custom logo, missing custom logo, and site-icon fallback behavior.
6. Confirm Web4SL owns phone-related body classes and FlexLine does not add a
   duplicate set.
7. Confirm Query Loop pages do not write unconditional production logs.

#### Block, pattern, preload, and content regression coverage

1. Smoke-test block extension output in post content, editor preview, and
   nested blocks. Verify markup is preserved and no malformed attributes are
   introduced.
2. Test related-post output with normal taxonomies, Yoast primary terms, Rank
   Math primary terms, and no primary-term metadata.
3. Test representative changed patterns: accordion, quick-form address,
   floor-plan gallery, and media download.
4. Verify normal pages do not receive a universal featured-image preload and
   responsive image `srcset`/`sizes` behavior remains intact.
5. Test header variants, blank pages, archives, single views, forms, maps,
   sliders, and modals at desktop, tablet, and mobile widths.
6. Confirm no development hosts such as `alpha.test` or `livelle.test` remain
   in production-facing theme content. Keep intentional Loom demo media only.
7. Confirm all TTF files remain present.

## 2. Web4SL core plugin

### Change inventory

Tracked changes include `.gitignore`, `assets/js/click-to-call.js`,
`includes/class-options-vars.php`, `includes/class-settings.php`,
`includes/class-shortcodes.php`, `web4sl.php`, and package metadata.

Untracked additions include:

- `.github/workflows/ci.yml`
- `assets/js/admin-settings.js`
- `composer.json` and `composer.lock`
- `includes/class-svg-security.php`
- `uninstall.php`
- `vendor/` containing `enshrined/svg-sanitize`

### Test notes

#### SVG upload security

1. Upload a legitimate SVG logo containing paths, groups, classes, viewBox,
   internal `#fragment` references, and normal dimensions. Confirm it remains
   usable in the media library and front end.
2. Upload SVGs containing `<script>`, inline event handlers, `<foreignObject>`,
   `javascript:` URLs, `data:` URLs, external hrefs, and CSS `url()` references.
   Confirm the upload is rejected or sanitized before it enters uploads and the
   unsafe content is absent from the stored file.
3. Upload `.svgz` and confirm it is rejected.
4. Test a missing Composer vendor directory in staging and confirm SVG uploads
   fail closed with a useful error rather than accepting unsanitized content.
5. Run `wp web4sl sanitize-existing-svgs --dry-run` against a backup or
   production copy. Record sites, files, changed files, and errors.
6. Review the dry-run report before running the rewrite command. Do not run the
   rewrite command against production until the report is approved.
7. After a controlled rewrite test, confirm attachment files and metadata still
   resolve correctly.

#### Settings, localization, and admin UI

1. Submit every Web4SL setting through `options.php` using HTML/script payloads
   and verify URL, text, email, and boolean sanitization.
2. Confirm settings defaults and types persist correctly when checkbox fields
   are omitted or submitted as unexpected values.
3. Verify admin tabs work with mouse, keyboard, direct hash URLs, and browser
   back/forward navigation.
4. Confirm click-to-call labels and runtime configuration are provided through
   the localized script data, not unsafe inline HTML strings.
5. Confirm `wp-i18n` is a declared dependency and translated strings load in a
   configured locale.

#### Shortcodes and metadata

1. Test approved Web4SL/FlexLine shortcodes in titles and SEO metadata.
2. Register a non-approved shortcode that would visibly mutate output and
   confirm it is not executed by the metadata allowlist.
3. Confirm the global shortcode registry is identical before and after
   rendering.
4. Test Yoast and Rank Math title, description, Open Graph, and Twitter
   filters independently.
5. Confirm event shortcodes used for Events Manager asset priming still work
   in the event block path; the metadata allowlist must not break that separate
   integration.

#### Plugin lifecycle

1. Activate, deactivate, and uninstall the plugin on a staging site.
2. Confirm uninstall preserves content and removes data only when the explicit
   opt-in cleanup setting is enabled.
3. Verify CI runs PHP checks, configured lint jobs, and builds.
4. Confirm the proprietary license, header version, `Update URI: false`,
   Composer lock, and vendor tree are included in the intended commit.

## 3. Web4SL Location Sync

### Change inventory

Tracked changes include `README.md`, `composer.json`,
`includes/class-cli-migrate-filters.php`, `includes/traits/trait-cache.php`,
`includes/traits/trait-post-type.php`, `includes/traits/trait-rest.php`,
`includes/utils/class-block-render-helper.php`, package metadata, and the main
plugin file.

Untracked additions include `.github/workflows/ci.yml`, `CHANGELOG.md`,
`docs/plugin-ownership.md`, `tests/Unit/RestRenderingTest.php`, and
`uninstall.php`.

### Test notes

#### Public REST rendering

Use REST requests as both anonymous and authenticated users. For each request,
test published, draft, pending, private, trashed, nonexistent, wrong-post-type,
and user-authored `wp_block` IDs.

Expected results:

- Published `directory_locations` posts render for anonymous requests.
- Draft/private/trashed/pending/nonexistent/wrong-post-type context does not
  expose content anonymously.
- An authenticated editor can preview only posts and patterns they can edit.
- Unpublished user patterns are hidden anonymously.
- Published user patterns remain available where intended.
- Public routes remain callable; they simply refuse unauthorized post context.

Repeat requests with different users and contexts to ensure the render cache
does not serve editor-only output to anonymous users.

#### Automated tests and runtime behavior

1. Run the new REST rendering PHPUnit tests with `WP_TESTS_DIR` configured.
2. Run the existing unit and integration suites.
3. Confirm the local test bootstrap has the WordPress test library; without it,
   record the suite as environment-blocked rather than passing it by omission.
4. Trigger cache regeneration and verify debug logging is silent when
   `WP_DEBUG` is false and available when it is true.
5. Confirm the legacy malformed CLI file no longer causes a PHP parse error and
   that no removed command is advertised or registered.

#### Settings, lifecycle, and coexistence

1. Submit location settings containing HTML/script payloads and verify the
   configured sanitizers preserve only intended text, URLs, flags, and pattern
   identifiers.
2. Activate Web4SL Location Sync and MyLifeSite Location Sync together.
3. Verify `directory_locations`, core location metadata, core REST routes, and
   core blocks register once.
4. Verify MyLifeSite adds only client-specific metadata, sync behavior, blocks,
   print behavior, and additive hooks.
5. Test both plugins' admin, REST, block-editor, sync, and print paths in the
   same site. Confirm there is no mutual-exclusion guard.
6. Uninstall the plugin with default settings and confirm location content is
   retained. Test opt-in cleanup separately.

## 4. MyLifeSite Location Sync

### Change inventory

Tracked changes include `README.md`, the main plugin header/runtime version,
and package metadata. Untracked additions include CI, changelog,
`docs/plugin-ownership.md`, and `uninstall.php`.

### Test notes

1. Verify the runtime version comes from the plugin header and matches the
   package manifest.
2. Activate this plugin with Web4SL Location Sync active and repeat the
   coexistence tests in the previous section.
3. Confirm the ownership documentation matches actual registrations, hooks,
   metadata, REST behavior, and blocks.
4. Run sync, admin, print, and client-specific block smoke tests with both
   plugins active.
5. Verify uninstall preserves locations, floor plans, media, and client data
   by default.
6. Run the build. Record the existing full JavaScript lint baseline separately
   if it fails on unchanged files; do not classify that baseline as a
   remediation regression without a changed-file comparison.

## 5. Web4SL Campaign Manager

### Change inventory

Tracked changes include `.gitignore`, `README.md`, `composer.json`,
`inc/class-ga4-gravity-bridge.php`, `inc/class-utm-fields.php`, and the main
plugin file.

Untracked additions include CI, `CHANGELOG.md`, `composer.lock`,
`docs/campaign-data-flow.md`, `inc/class-logger.php`,
`inc/class-secret-storage.php`, `phpunit.xml.dist`, tests, and `uninstall.php`.

### Test notes

#### GA4 secret storage

1. Save a new API secret and inspect the saved option. Confirm it uses the
   versioned `enc:v1:` AES-GCM format and does not contain the plaintext.
2. Reload the settings page. Confirm the API secret input is type `password`,
   its value is empty/masked, and the plaintext never appears in page source.
3. Resubmit unrelated settings with the masked or empty secret field and
   confirm the stored secret is preserved.
4. Use the explicit clear control and confirm the stored secret is removed.
5. Seed a legacy plaintext option, reload/save settings, and confirm it is
   transparently migrated to encrypted storage.
6. Test a malformed encrypted value and confirm Measurement Protocol delivery
   fails closed without exposing the secret.
7. With valid settings and a valid client ID, verify the Measurement Protocol
   request is sent. With missing/invalid settings, verify no request is sent.
8. Use a test HTTP client or WordPress HTTP mock to confirm the API secret is
   present only in the outbound request and never in rendered admin HTML.

#### Campaign capture and logging

1. Capture every documented UTM, click ID, Google client ID, landing page,
   referrer, and page-history field.
2. Verify cookie, Gravity Forms entry meta, recipient, retention, and
   Measurement Protocol behavior against `docs/campaign-data-flow.md`.
3. Confirm current capture behavior remains unchanged in this pass; do not
   claim consent gating until the separate privacy work item is implemented and
   reviewed.
4. Run with `WP_DEBUG` false and true and verify diagnostics follow the single
   logger path.

#### Automated and lifecycle tests

1. Run `composer test` and the PHPUnit suite.
2. Add/run direct `options.php` submissions containing HTML/script payloads and
   verify measurement ID, event name, and flags are sanitized.
3. Activate/deactivate/uninstall and confirm attribution data remains by
   default; test explicit cleanup separately.
4. Verify the proprietary header version is the source of truth and Composer
   metadata is synchronized.

## 6. Web4SL Advanced Floor Plans

### Change inventory

Tracked changes include `composer.json`,
`includes/blocks/render-floor-plan-media-toggle.php`,
`includes/traits/trait-admin-settings.php`, package metadata, and the main
plugin file. Untracked additions include CI, `CHANGELOG.md`,
`includes/class-logger.php`, and `uninstall.php`.

### Test notes

1. Open the Floor Plan Settings screen as an administrator and confirm the
   accessible-icon setting saves a valid attachment ID only.
2. Attempt the same POST as a user without `manage_options` and confirm a 403
   response.
3. Submit HTML/script payloads and invalid IDs; confirm the setting is reduced
   to a safe integer and no unsafe content is stored.
4. Test floor-plan media-toggle preview with and without a current floor-plan
   post. Confirm preview selection and output remain correct.
5. Run with `WP_DEBUG` false and true and verify preview diagnostics use the
   centralized logger only when debugging is enabled.
6. Expand a floor-plan media toggle containing a tour, video, or PDF iframe.
   Confirm the modal wrapper remains centered, stays within the viewport, and
   preserves the 16:9 ratio at desktop and mobile widths.
7. Run `npm run build` and confirm the former `postcss-calc` parse warning for
   `min(90vw, ...)` is absent. Sass deprecation and Browserslist notices may
   remain as separate tooling warnings.
8. Run floor-plan grouping, media, import, archive, and representative front-
   end block smoke tests.
9. Run the build and record existing JavaScript/SCSS lint failures separately
   when they are on unchanged baseline files.
10. Uninstall with defaults and confirm floor-plan content and media are never
   deleted. Test opt-in cleanup only in a disposable environment.

## 7. Web4SL MCP Site Ops

The only change versus `main` is plugin metadata: proprietary licensing and
`Update URI: false`. No functional refactor is included.

Test by activating the plugin and confirming:

- It loads without PHP warnings or fatal errors.
- Existing MCP/site-ops commands and integrations remain available.
- The header displays the expected version, proprietary license, and update URI.
- No uninstall or destructive cleanup behavior was introduced.

## Validation evidence already available

The current working tree has already received the following checks:

- PHP syntax checks pass across all six maintained repositories.
- Campaign Manager PHPUnit passes: 3 tests and 7 assertions.
- SVG sanitizer smoke tests pass for scripts, event handlers, foreign objects,
  external references, and retained internal fragments.
- Builds pass for FlexLine, Web4SL, both location-sync plugins, and Advanced
  Floor Plans.
- Targeted FlexLine and Web4SL JavaScript lint passes.
- `git diff --check` passes in all affected repositories.

## Validation gaps before release

- The location-sync PHPUnit suite requires the WordPress test library and a
  configured `WP_TESTS_DIR`.
- A live WordPress database/site was not available for anonymous/editor REST
  requests, multisite migration, login, 2FA, options.php, and browser tests.
- MyLifeSite and Advanced Floor Plans retain pre-existing full JavaScript/SCSS
  lint debt; run changed-file lint and a baseline comparison before treating
  those failures as regressions.
- PHPCS, full browser accessibility checks, visual regression checks, and
  production/backup dry-run reporting remain release-gate work.
