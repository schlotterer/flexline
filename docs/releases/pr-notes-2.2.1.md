# FlexLine 2.2.1 PR Notes

## Summary

FlexLine 2.2.1 is a stabilization and release-hygiene update. It removes the
theme-owned login hardening feature, fixes confirmed menu/slider/runtime issues,
clarifies metadata ownership, improves editor and frontend accessibility, and
sets clearer boundaries around primary-term ownership.

It also includes a small responsive-alignment feature, targeted pattern
standards cleanup, regenerated production assets, and a documentation
reorganization.

No intentional public block-attribute or saved-pattern compatibility break is
included.

## What Changed

### Authentication and security ownership

- Removed FlexLine's alternate-login URL, fallback credentials, strict-mode
  blocking, URL filters, and related settings.
- Removed the remaining theme-owned security utility controls for generator
  meta removal, XML-RPC disabling, and global REST CORS headers.
- Added a multisite-safe migration that removes the retired custom-login values
  from `flexline_utilities`.
- Standardized the supported login path on WordPress core `/wp-login.php`.
- Kept 2FA and login protection outside the theme, where SiteGround Security,
  Wordfence, or another operational security layer can manage them.
- Added `SECURITY.md` and refreshed release/license metadata.

### SEO, utilities, and shortcode behavior

- FlexLine now suppresses its overlapping Open Graph and description tags when
  Yoast SEO or Rank Math is active; the active SEO plugin owns that metadata.
- FlexLine continues to emit fallback OG/description metadata when the utility
  is enabled and no supported SEO plugin is active.
- Replaced logo block parsing with the WordPress `custom_logo` API and a
  site-icon fallback.
- Consolidated utility defaults and added explicit defaults, types, and
  sanitization for utility settings.
- Preserved approved `web4sl_*` and `flexline_*` title/metadata shortcodes while
  keeping the shortcode execution guardrails introduced in this branch.

### Slide-in menu, modal, and slider reliability

- Fixed the malformed slide-in focus selector and removed the missing-element
  production console error.
- Made focus-trap binding/teardown instance-safe, restored trigger focus on
  close, and handled menus without focusable descendants.
- Guarded header-dependent code for header-less templates.
- Improved modal focus restoration and keyboard behavior.
- Added `prefers-reduced-motion` support to sliders, including runtime preference
  changes.
- Added live status for user-triggered slide changes and removed inactive slides
  from keyboard navigation.
- Registered the required `wp-i18n` dependencies for JavaScript-generated UI
  labels and announcements.

### Performance and runtime cleanup

- Removed the empty `global.js` source/build artifact and its enqueue.
- Removed the universal featured-image preload.
- Removed/guarded production logging in the Query Loop path.
- Scheduled header metric updates with `requestAnimationFrame` to reduce resize
  reflow churn.

### Block editor and responsive controls

- Added force-left and force-right alignment controls at responsive breakpoints.
- Cleaned the FlexLine Visibility inspector labels so the breakpoint range is
  shown only in the secondary help text.
- Updated block-extension and related-post behavior to match the current editor
  and build output.

### Primary terms: ownership and first refactor step

- Added focused resolver contract tests and `npm run test:primary-terms`.
- Made Yoast the preferred valid primary-term authority; Rank Math remains a
  read-only compatibility authority when Yoast has no valid value.
- Retained FlexLine's canonical primary-term meta as a cache/fallback for
  breadcrumbs, permalinks, REST/editor state, and sites without SEO-plugin
  ownership.
- Preserved safe first-assigned-term seeding only when no valid explicit source
  exists.
- Stopped FlexLine from mirroring writes into Yoast or Rank Math metadata.
- Extracted the WP-CLI command into
  `inc/hooks/primary-terms/class-primary-term-cli-command.php` while keeping the
  existing command name compatible.

### Standards, build output, and documentation

- Ran production asset generation and committed the resulting built assets.
- Cleaned PHPCS/PHPCBF issues in the touched FlexLine code and pattern files.
- Refreshed Browserslist data and suppressed known legacy Sass API warning noise
  from the current Laravel Mix toolchain.
- Moved working documentation into `docs/`, including testing, coding standards,
  font conversion, deferred-refactor, and primary-term documentation.
- Added a 2.2.1 branch-testing record and the primary-terms refactor report.

## Validation Completed

Automated checks passed:

```bash
npm run lint-php
npm run lint
npm run production
npm run test:primary-terms
git diff --check
```

Focused PHP syntax and PHPCS checks also passed for the primary-terms files and
resolver contract test.

Manual checks completed:

- Standard `/wp-login.php`, `/wp-admin`, multisite login, and logout paths work.
- Password-reset routing works. Local email delivery remains dependent on local
  mail configuration and was not a FlexLine routing failure.
- Slide-in keyboard navigation, Escape, repeated open/close cycles, and
  header-less templates work without first-party errors.
- Modal focus restoration, slider reduced-motion behavior, and inactive-slide
  focusability were checked.
- WordPress core's skip link is present; FlexLine does not add a duplicate.
- With Yoast active, FlexLine does not emit duplicate OG/description metadata.
- With Yoast skipped/inactive, FlexLine emits its enabled fallback metadata.

## Compatibility Notes

- Existing saved utility settings remain readable.
- No saved block attributes or pattern markup are intentionally changed.
- Standard WordPress login is now the only FlexLine-supported login URL.
- Yoast and Rank Math are never overwritten by FlexLine primary-term writes.
- FlexLine primary-term data remains available as a canonical cache/fallback.
- TTF files remain in the repository as font-conversion/build inputs.

## Deferred Work and Known External Noise

- FlexLine SCSS still uses `@import`. Migrating to Sass `@use` changes scoping
  behavior and is intentionally deferred to a dedicated refactor.
- Vendor CSS splitting remains deferred until visual regression coverage and
  frontend payload measurements exist.
- `primary-terms.php` is still structurally dense after the CLI extraction. The
  remaining split is documented in `docs/deferred-refactors-plan.md` and should
  proceed test-first.
- Events Manager's malformed-meta warning and Gravity Forms' missing local
  reCAPTCHA site-key error are third-party/local-configuration issues, not
  regressions introduced by this release.
