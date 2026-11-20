# Phase 3: late fragment assets

## Current activation policy — 2026-11-17

The owner authorized removing the environment restriction: conditional delivery now
defaults on in all environments when this branch is deployed. Explicit option/filter
opt-outs and conservative compatibility fallbacks remain supported. Earlier entries
below describing production opt-in record the previous policy and are superseded.
The one-time automatic WP Rocket/SiteGround cache migration is documented in
CONDITIONAL_COMPONENT_STYLES.md; separate CDN and rollback purges remain deployment tasks.
This change does not merge, tag, publish, or deploy the branch to a client site.


Implemented locally on 2026-11-17. Production conditional delivery remains opt-in.
No installed theme/plugin, saved content, or site configuration was changed.

## Contract

Location Sync and Advanced Floor Plans apply `web4sl_fragment_assets` after their
existing authorized renderer returns markup. With no integration filter, responses
are unchanged. FlexLine adds an optional `assets` object alongside existing fields:

```json
{"schema":1,"features":["slider"],"assets":[{"handle":"flexline-slider","kind":"script","src":"registered-url?ver=version","version":"version","dependencies":["flexline-load-early","wp-i18n"]}]}
```

The actual slider manifest also includes its CSS descriptor before the script.
Supported transport is limited to horizontal-scroll, slider and modal CSS/runtimes.
Mobile-only scrolling requires CSS only. URLs, versions and dependencies come from
WordPress registrations or the same theme asset registration definitions. Base CSS,
load-early, wp-i18n and translation configuration are predeclared on host documents.
Arbitrary plugin modules, inline configuration, and unknown third-party handles
must remain predeclared or use complete compatibility delivery.

The document publishes a trusted catalog as `FlexlineComponentAssets`. The loader
rejects unknown handles, mismatched URLs/versions, and unsupported schemas. It
shares in-flight promises, recognizes existing assets, loads CSS before scripts,
and inserts component CSS before the stable cascade-tail anchor. A failed load
removes the failed element and permits retry. A catalog mismatch requires refresh.

`FlexlineComponents.ensure(manifest)` resolves before replacement is revealed.
`init(root)` and `teardown(root)` scope component lifecycle work. Existing
`flexline:content-updated` events accept `detail.root` or legacy `detail.element`;
rootless events retain document scope. Removed subtrees receive cleanup too.

## Plugin behavior

Location Sync awaits metadata in the shared card fetcher and popover fetcher.
The previous list stays usable if asset loading fails; status UI offers retry.
Newer filter requests may proceed while an older asset load is pending, and the
older response cannot replace newer content. Closed popovers are not initialized.
Successful popover HTML is cached only after its assets finish loading. Existing
fragment style capture and authorization/pattern resolution remain unchanged.

Advanced Floor Plans still uses its server-prepared lists and hidden panel hosts.
It tears down replaced content, preserves media-toggle reset/init, and emits scoped
content-updated events after cloning. DOM clones retain attributes but lose runtime
objects; slider/scroller initialization now detects and resets that copied state.
Its REST endpoints expose the same optional metadata for external consumers.

## Verification

Sources of truth: Location Sync main `2cbcbad39e67f871743b0a54911ed8e401821d94`
and Floor Plans main `8745c804e2bd569c776b2e298794b0135d302313`, each branched as
`codex/conditional-fragment-assets`. Theme work remains on `codex/conditional-css-plan`.

- All JS suites: theme 66 tests, Location Sync 14, Floor Plans 2.
- Theme PHPUnit: 48 tests / 180 assertions; component PHP contracts: 26 cases.
- Each plugin's standalone PHP contract verifies absent, additive and invalid metadata.
- 1,300 compiled CSS declarations retain original selectors, values and ordering.
- Changed JS lint, theme PHP lint, plugin PHP syntax and all production builds pass.
- Read-only WordPress 7.2-beta5 / PHP 8.2.29 probes pass initial-page delivery,
  configured nested patterns, real fragment catalog ordering, both plugin response
  adapters and omission of metadata with the theme filter removed.
- Browser fixture starts without feature bundles, requests the same fragment twice
  concurrently, and produces exactly one of each of four required asset elements.
  Slider navigation works before and after cloning initialized markup; removal clears
  the displayed content. JS tests cover failure/retry, stale responses, detached
  roots, old response shapes and media-toggle preservation.

Reproduce the WordPress integration using `tests/component-fragments-wordpress-probe.php`
with the same five arguments documented in `component-assets-wordpress-probe.php`.
Evidence is in the workspace `diagnostics/conditional-assets-phase3-20261117`.
The screenshot is an isolated test fixture, not a client-site design change.

## Remaining acceptance and rollout gates

Phase 3 implementation is ready for review. Full installed old/new package pairings,
real Location Sync map/filter/comparison surfaces and floor-plan combinations,
optimizer/CDN behavior, narrower browser matrix, WordPress 6.5/7.0, and styled
fragment isolation remain Phase 5 integration acceptance gates. Do not enable
conditional delivery by default based solely on these local fixtures.
Phase 4 editor behavior/defaults work is next. No release or deployment is included.

Deploy additive plugin support first, then theme support, keeping complete delivery
available. There are no data migrations. Reverting either plugin preserves response
compatibility; reverting the theme removes metadata generation and returns plugins
to legacy/predeclared behavior. Invalidate page/asset caches when changing versions.
