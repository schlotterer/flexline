# Flexline Change Testing Plan

This plan validates the reliability, accessibility, metadata, performance, and release-hygiene changes in Flexline.

## 1. Establish the test baseline

1. Start from a clean local WordPress install with the current Flexline build active.
2. Open the browser console, Network panel, and PHP debug log before testing.
3. Prepare pages covering:
   - The normal site header and navigation.
   - A blank or header-less template.
   - A page containing a slider, modal, Query Loop, and linked image where available.
   - A site with a custom logo, site icon, and featured image configured.
4. Record the active locale and whether Yoast SEO or Rank Math is active.
5. Capture the baseline console, network, and PHP log state so new errors or requests can be distinguished from existing ones.

## 2. Run static checks and rebuild assets

From the Flexline theme directory, run:

~~~sh
npm run lint-js
npm run lint-style
npm run build
git diff --check
~~~

Run PHP syntax checks on every changed PHP file:

~~~sh
for f in inc/functions/get-logo-url.php \
inc/functions/utilities-options.php \
inc/hooks/add-og-tags.php \
inc/hooks/body-classes.php \
inc/hooks/query-loop.php \
inc/scripts.php \
inc/setup/preload-assets.php \
inc/theme-options/class-admin.php \
inc/theme-options/theme-settings.php \
inc/blocks/block-extensions.php; do
  php -l "$f" || exit 1
done
~~~

Acceptance criteria:

- JavaScript and SCSS linting pass.
- The production build completes successfully.
- Every changed PHP file passes php -l.
- git diff --check reports no whitespace or conflict-marker errors.
- The generated slide-in, modal, and slider assets reflect the source changes.

## 3. Test slide-in menu behavior

1. Open the slide-in menu with a mouse and confirm the menu becomes visible and usable.
2. Confirm focus moves into the menu and lands on the close control or the first available focusable control.
3. Press Tab repeatedly and confirm focus remains inside the open menu.
4. Press Shift+Tab repeatedly and confirm reverse focus remains inside the menu.
5. Press Escape and confirm:
   - The menu closes.
   - The focus trap is removed.
   - Focus returns to the trigger that opened the menu.
6. Repeat open/close at least 20 times and watch the console for duplicate-listener behavior, errors, or progressively degraded focus handling.
7. Repeat the test on a header-less template and confirm scrolling, resize events, and menu initialization do not throw errors.
8. Test a menu with no focusable descendants and confirm closing remains safe and focus returns to the trigger or a documented fallback.

## 4. Test settings, sanitization, and login hardening

1. Configure a valid recovery slug and fallback credentials, then enable custom login hardening.
2. Confirm the feature behaves as enabled.
3. Set custom_login_enabled explicitly to 0 while leaving fallback credentials present.
4. Confirm the feature remains disabled; fallback credentials must not re-enable it.
5. Repeat with strict mode enabled and disabled.
6. Test invalid URLs, slugs, and empty values through the settings screen and confirm sanitization produces the expected safe values.
7. Confirm existing saved settings remain readable after the update.
8. Inspect saved option values and verify expected types and defaults, including integer flags, URLs, and text values.
9. Confirm the fallback credential path remains available for recovery only and does not override an explicit disabled setting.

## 5. Test logo resolution and SEO metadata ownership

Test each state with no SEO plugin, Yoast SEO active, and Rank Math active.

1. With no SEO plugin active, confirm Flexline emits the expected OG and description tags exactly once.
2. Test logo resolution in this order:
   - A configured custom logo.
   - No custom logo but a configured site icon.
   - Neither configured.
3. Confirm the generated metadata never contains an empty or invalid logo URL.
4. With Yoast active, confirm Flexline suppresses its overlapping OG and description tags.
5. With Rank Math active, confirm Flexline suppresses its overlapping OG and description tags.
6. Confirm the active SEO plugin remains the sole owner of overlapping metadata and no duplicate tags appear in page source.

## 6. Test performance and runtime cleanup

1. Inspect the page Network panel and confirm the removed empty global.js artifact is not requested.
2. Inspect page source and preload headers and confirm there is no universal featured-image preload on normal pages.
3. Resize the viewport repeatedly with the normal header visible and confirm there are no console errors, layout jumps caused by repeated metric updates, or visible resize thrashing.
4. Repeat resizing on a header-less template.
5. Execute Query Loop requests with WP_DEBUG enabled and disabled.
6. Confirm Query Loop behavior is unchanged and there is no unconditional production error_log() output when debug logging is disabled.
7. Note any vendor CSS splitting opportunities separately; do not treat that deferred follow-up as a failure for this pass.

## 7. Test accessibility and internationalization

1. Load a page with a <main id="main"> element and confirm WordPress core generates exactly one skip link.
2. Confirm there is no duplicate custom skip link from the theme.
3. Navigate using only the keyboard, activate the skip link, and confirm focus moves to the existing main content target.
4. Open and close a modal with the keyboard and confirm:
   - Focus is trapped while open.
   - Escape closes the modal.
   - Focus returns to the opener.
5. Test with a non-English locale and confirm JavaScript-generated labels and modal/slider announcements use translated strings from wp-i18n.
6. Run an accessibility scan against representative header, menu, modal, slider, and blank-template pages using Axe or Lighthouse.
7. Record any unrelated baseline findings separately from regressions introduced by this change.

## 8. Test slider controls, focusability, and reduced motion

1. Confirm normal autoplay starts where configured.
2. Test previous, next, pause, and any play controls with both mouse and keyboard.
3. Confirm inactive slides are hidden from assistive technology and their interactive descendants are not keyboard-focusable.
4. Trigger a slide change manually and confirm a concise live status announces the change without excessive repetition.
5. Enable prefers-reduced-motion: reduce before loading the page and confirm autoplay does not start.
6. Change the reduced-motion preference while the page is running and confirm autoplay stops when reduction is enabled.
7. Disable the preference and confirm behavior follows the configured autoplay state without creating duplicate timers.
8. Resize the viewport repeatedly and confirm there are no duplicate controls, layout errors, or duplicated slider announcements.

## 9. Test block HTML processing

Create or use representative blocks covering:

- Wrappers with and without existing classes.
- Nested links and images.
- Modal images.
- Horizontal scrollers.
- Group links.
- Download buttons.

For each case, verify:

1. Classes and attributes are applied to the intended outer or inner element.
2. Existing classes and attributes are preserved.
3. Generated HTML remains valid and properly nested.
4. Repeated rendering does not duplicate classes, attributes, or wrappers.
5. Links, images, modal triggers, and download controls retain their expected behavior.

## 10. Verify release and content hygiene

Run the stale-reference check:

~~~sh
rg -n "alpha\.test|livelle\.test|designfloorplan\.com|flexlinetheme\.com/wp-content|bubuttonToPositiontton" .
~~~

Expected result: no matches outside intentional dependency or demo-media references.

Also verify:

1. style.css, package.json, composer.json, and readme.txt consistently identify version 2.2.0.
2. Package licenses use GPL-3.0-or-later.
3. WordPress compatibility and contributor information are current.
4. The readme no longer describes FlexLine Utilities as an external required plugin.
5. TTF files remain present as project/build assets.
6. No .DS_Store files are tracked.
7. The PHP lint command uses the repository phpcs.xml configuration.

## 11. Perform the final regression pass

Test at desktop, tablet, and mobile widths across:

- Normal pages.
- Blank, archive, search, single, and 404 templates.
- Each available header variant.
- Pages containing modals, sliders, forms, Query Loops, and horizontal scrollers.
- Sites with and without Yoast SEO or Rank Math.

For every scenario, record screenshots plus console, Network, and PHP log results when relevant.

Release readiness requires:

- All automated checks and targeted manual tests pass.
- No new console, PHP, accessibility, or network regressions are observed.
- Existing lint failures are clearly documented as pre-existing if they remain outside the changed code.
- Deferred work remains tracked separately: HTML processor completion, primary-terms.php splitting, vendor CSS measurement, SCSS wrapper cleanup, and pattern descriptions/viewport widths.
