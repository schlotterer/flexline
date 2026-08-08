# Prepare FlexLine 2.2.1 reliability, accessibility, metadata, and release hygiene updates

## Summary

This PR prepares FlexLine 2.2.1 with runtime bug fixes, accessibility improvements, metadata cleanup, release hygiene, and documentation for known structural debt.

The largest behavioral changes are:

- Remove FlexLine’s theme-owned alternate login behavior in favor of the site security stack.
- Make FlexLine OG/meta output defer to Yoast or Rank Math when either SEO plugin is active.
- Fix slide-in menu runtime/focus behavior.
- Improve modal/slider accessibility and reduced-motion behavior.
- Document primary-term structural debt and the planned Yoast-priority refactor.
- Clean up lint/build issues in touched files and release metadata.

No intentional breaking changes to public block attributes or saved block content.

## Key Changes

### Slide-in menu reliability

- Fixed malformed focus selector in `src/js/slidein.js`.
- Bound focus-trap listener per menu instance and removed it on close.
- Added guards for templates without `header.site-header`.
- Ensured focus returns to the trigger after close.
- Added fallback focus behavior when no focusable menu elements exist.
- Removed unnecessary production console error for missing slide-in markup.
- Rebuilt built slide-in asset.

### Metadata and SEO behavior

- Kept FlexLine OG tags enabled by default when no SEO plugin owns metadata.
- Suppressed FlexLine OG/description output when Yoast SEO is active.
- Suppressed FlexLine OG/description output when Rank Math is active.
- Replaced block parsing logo lookup with `custom_logo`, then site-icon fallback.
- Consolidated utilities defaults into the shared options helper.
- Added explicit setting defaults/sanitization for utilities settings.

### Alternate login removal

- Removed FlexLine’s custom/alternate-login routing and settings.
- Removed fallback credentials and strict-mode login blocking.
- Added network-safe migration to remove obsolete custom-login settings from `flexline_utilities`.
- Standardized behavior on WordPress core `/wp-login.php`.
- Documented rollout expectation that 2FA/security enforcement belongs to SiteGround Security, Wordfence, or another operational security layer.

### Accessibility and i18n

- Confirmed WordPress core skip-link handling; no duplicate skip link added.
- Routed JavaScript-generated labels/announcements through `@wordpress/i18n`.
- Registered required `wp-i18n` dependencies.
- Improved modal focus restoration and keyboard behavior.
- Improved slider reduced-motion behavior, including runtime preference changes.
- Added live status behavior for user-triggered slide changes.
- Prevented inactive slider slides from remaining keyboard-focusable.

### Performance/runtime cleanup

- Removed/guarded unnecessary runtime logging.
- Stopped enqueueing the empty `global.js` artifact.
- Removed universal featured-image preload.
- Debounced/scheduled header metric updates with `requestAnimationFrame`.
- Left vendor CSS splitting as a deferred measured follow-up.

### Release hygiene

- Updated release version to `2.2.1` across theme metadata/manifests.
- Standardized license metadata to GPLv3-or-later.
- Updated stale readme/plugin dependency language.
- Removed confirmed local development/demo URLs where appropriate.
- Removed tracked `.DS_Store` files.
- Corrected PHP lint command to use the repository `phpcs.xml`.
- Cleaned PHPCS issues in touched pattern files.
- Documented that FlexLine SCSS still uses Sass `@import` and should be migrated to `@use` only as a separate controlled refactor.

### Primary terms documentation

- Added documentation for `primary-terms.php` structural debt.
- Added a step-by-step execution plan for the future primary-term refactor.
- Captured the intended source-of-truth model:
  - Yoast primary term wins when present and valid.
  - Rank Math is supported where present.
  - FlexLine/Web4SL primary term data remains fallback/compatibility data.
  - FlexLine should not overwrite Yoast or Rank Math metadata.
- Noted this in the changelog as deferred technical debt.

## Testing Performed

Automated checks run successfully:

```bash
npm run lint-php
npm run lint
npm run production
git diff --check
```

Additional checks:

- PHP syntax checks on changed PHP files.
- Production build completed successfully.
- PHPCBF/PHPCS cleanup completed for touched FlexLine files.
- Confirmed no remaining FlexLine lint failures in the current branch scope.

Manual validation completed:

- `/wp-login.php` loads after removing alternate-login behavior.
- `/wp-admin` access works.
- Multisite login flow works.
- Logout works.
- Password reset route works; local email delivery is blocked by local mail configuration, not by FlexLine login routing.
- Slide-in menu opens/closes with keyboard and pointer input.
- Escape closes slide-in menu.
- Repeated open/close cycles do not duplicate focus handlers.
- Header-less templates do not throw slide-in/header errors.
- Modal focus restoration works.
- Slider reduced-motion behavior works.
- Inactive slides are not keyboard-focusable.
- WordPress core skip link is present; no duplicate theme skip link added.
- With Yoast active, FlexLine does not emit duplicate OG/description tags.
- With Yoast skipped/inactive, FlexLine emits fallback OG/description tags when the utility setting is enabled.
- Events Manager meta warning confirmed as third-party output, not FlexLine.
- Gravity Forms reCAPTCHA `sitekey` console error confirmed as local/plugin configuration noise, not FlexLine.

## Known Notes / Deferred Work

- FlexLine SCSS still uses `@import`. This is intentional for this PR; migrating to Sass `@use` changes scoping behavior and should be handled as a separate refactor.
- Vendor CSS splitting remains deferred until there is visual regression coverage and measured frontend payload data.
- `primary-terms.php` remains structurally dense. This PR documents the final refactor plan, but the refactor itself should be done test-first in a separate focused pass.
- Some third-party console warnings may remain in local testing:
  - Events Manager malformed meta warning.
  - Gravity Forms reCAPTCHA missing local site key.
  - jQuery Migrate informational notice.
  These are not introduced by this PR.

## Compatibility

- No intentional saved-content breaking changes.
- No intentional public block attribute changes.
- Existing utility settings remain readable.
- FlexLine OG fallback remains enabled by default when no supported SEO plugin is active.
- Yoast/Rank Math remain authoritative for overlapping SEO metadata.
- Standard WordPress login is now the only login URL.
- TTF files remain in the project as build/source assets and are not removed.
