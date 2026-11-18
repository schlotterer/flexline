# Conditional component assets

Phase 2 establishes initial-document delivery. `base.css` contains the shared
foundation. Slider, horizontal-scroll, and modal requirements control their CSS
and runtimes together. Forms, Events Manager, navigation, poster galleries and
other shared integrations remain in the base until their triggers are audited.
The complete `app.css`, `app-conditional.css` compatibility alias, and editor
bundle remain packaged.

## Activation and compatibility

`flexline_conditional_component_styles` defaults to true in every WordPress
environment, including staging and production. Deploying this branch enables
conditional delivery without an environment variable or dashboard setting.
An explicitly saved false option or false filter still selects complete mode.
Environment type only limits diagnostic notifications; it does not gate assets.

Clear full-page and optimizer/CDN caches once after deploying this change so cached
HTML is regenerated with the new asset selection. Existing asset URLs use filemtime
versions. No automatic global purge or database migration is introduced; cache
services should be cleared through the site's deployment/cache tools. Reverting
the code or setting the option false restores complete delivery; clear page caches
again after rollback.

Conditional delivery requires the native WordPress template canvas, observed
rendering before the head, readable component files, and a complete requirement
set. Unknown custom templates, malformed declarations, missing references,
recursive patterns, and unknown dynamic pattern output select compatibility.
Compatibility loads app.css, modal.css, and the slider/scroller/modal runtimes,
so custom templates that render after the head have the theme assets available.
This mode now deliberately includes all three runtimes; it costs more than a
verified conditional page. It does not replace a plugin's own asset registration.

`$GLOBALS['flexline_component_delivery']` records the decision, feature union and
fallback reason codes. In Local/development, the `flexline_component_diagnostic`
action receives that result when discovery encounters an unresolved requirement.
No pattern content or IDs are written to public HTML or logs.

## Initial rendering and configured patterns

The final render_block collector sees nested template parts, patterns, Query Loop
results and dynamic output. It reads actual HTML tag attributes and supported
block settings, rather than matching words anywhere in the content. Mobile-only
horizontal scrolling requires component CSS even on desktop, but does not request
the desktop scrolling runtime.

The FlexLine adapter calls the existing public `resolve_effective_pattern()` API
on Location Sync and Advanced Floor Plans. Plugin main remains authoritative for
override/default/fallback behavior. Location comparisons preserve main's grid
resolution with the card override as fallback. Lists, popovers, comparisons and
floor-plan panels are inspected even when their initial results are empty.
No plugin files or record-rendering loops are added by this phase.

Configured pattern discovery follows registered patterns, published user/synced
patterns and template parts through WordPress APIs. It collects registered block
style/view-style and script/view-script handles for WordPress to enqueue with their
normal dependencies and inline configuration. Plugin render helpers retain their
existing context, generated style capture, and owned asset behavior.

Traversal is limited to 32 levels and 4,096 parsed blocks per request, with an
active-reference cycle guard. Successful results are memoized in the request,
keyed by site, stylesheet, reference and source bytes. Cache hits replay feature
and handle declarations. The normal request-wide feature union also survives the
plugins' existing request-scoped HTML cache hits. No persistent cache is added.

A configured dynamic block can emit data-dependent content. Unless it is a known
Core structural/metadata block or resolved pattern host, it selects complete mode.
An integration can use `flexline_dynamic_block_requirements` to return its complete
feature union, including an empty array for a block that cannot introduce theme
features. The default `null` means unknown. Do not use this filter to guess what a
single record happens to render. Runtime-generated unknown plugin handles and
module/localization requirements remain integration acceptance work.

## Declaration API

Declare a union before wp_enqueue_scripts:

```php
do_action( 'flexline_require_components', array(
    'slider' => true,
    'horizontal-scroll-mobile' => true,
    'modal' => true,
) );
```

Supported identifiers are `slider`, `horizontal-scroll`,
`horizontal-scroll-mobile`, and `modal`. Desktop horizontal scrolling requests
both its CSS and runtime. The existing `flexline_required_component_styles` filter
remains supported and now applies to runtime requirements too. Repeated true
flags accumulate; they cannot remove a feature already observed in rendered output.

Registering a requirement after the head cannot retroactively deliver head CSS.
Phase 3 covers the fragment-response protocol and root-aware initialization. Existing editor
bundles and editor runtime enqueue paths remain unchanged in Phase 2.

## Sources and cascade

app.scss composes base, horizontal scrolling, slider, and component-tail in that
order. app-conditional.scss is an alias for base.scss. The small tail still follows
the last selected feature sheet inline. Its broad Plethora/toggle selectors can
overlap earlier component rules, so it was deliberately retained in its original
position. customize.css depends on the selected handles, including modal styles.

Slider startup styles now belong to the head-loaded slider stylesheet and the
complete bundle. They hide later slides before initialization, retain the height
baseline, and preserve the former active-slide and legacy inner-container rules.
The unconditional slider style tag was removed from preload-scripts.php.
Feature runtimes and modal CSS are registered at init with stable dependencies.

## Phase 2 verification — 17 November 2026

- Node 24.19.0 production build and style lint passed.
- Changed runtime PHP files passed PHPCS and syntax checks.
- 26 component contract checks passed, covering delivery, token matching, pattern
  graphs, recursion, budgets, cache replay/site isolation, plugin adapters and fallback.
- Full/split CSS equivalence passed for 1,300 declarations, including order,
  values and importance. The compatibility base alias is byte-identical.
- PHPUnit passed 48 tests / 180 assertions.
- Read-only WordPress 7.2 Beta 5 probes loaded the isolated theme and actual plugin
  main sources, then exercised simple/nested fixtures and both real parent
  renderers with empty results and configured patterns. No content was saved.
- Browser fixtures verified plain-page omission, slider/scroller controls,
  keyboard activation, mobile native overflow/resizing without scroller JS, and
  complete-mode rendering. Blocking slider.js preserved a visible first slide,
  hidden second slide, and the 240px fixture height. Final fresh fixtures had no
  console warnings/errors.

The reusable `tests/component-assets-wordpress-probe.php` runs through WP-CLI with
`--skip-themes --skip-plugins`. Pass the isolated theme root, Location Sync main
root, Floor Plans main root, an existing output directory, and its local HTTP URL.
It generates runtime.json and HTML fixtures; serve the output with an `assets`
symlink to the candidate theme's assets. It does not install or save fixture posts.
Run against a disposable or explicitly authorized local WordPress environment.

Local evidence is retained in the parent workspace under
`diagnostics/conditional-assets-phase2-20261117`. The fixture initially omitted
common slide-in configuration and reused a base-style registration across cases;
both harness issues were corrected before final verification.

This is branch-level initial-page acceptance. WordPress 6.5/7.0 runtime checks,
real client visual/optimization checks, later REST insertions, editor acceptance,
plugin version combinations, and deployment recovery remain later gates. There
is no release tag, production-default switch, or site installation in Phase 2.
