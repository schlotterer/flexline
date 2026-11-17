# FlexLine conditional asset implementation plan

Draft for execution, 17 November 2026.

Phase 1 findings are recorded in [the detailed review](CONDITIONAL_ASSET_PHASE1_REVIEW.md), with a [complete SCSS import inventory](conditional-assets-scss-inventory.json). Repository main is the source of truth for both plugins. Installed-site observations are compatibility evidence.

FlexLine should load a shared foundation on every page and load feature CSS and JavaScript when the page or its configured dynamic patterns require them. Location Sync and Advanced Floor Plans must retain correct rendering, interaction, editor previews, and post context when patterns appear during the initial response or through later REST requests. Site Editor settings must override editable theme defaults, including Plain Text button padding.

Implementation proceeds through the phases below. Checked items represent completed planning work. Implementation and browser acceptance items start unchecked.

## Baseline and source ownership

- [x] Confirm the Plain Text underline fix merged through PR #591 into FlexLine main at `b789627b`. Preserve its valid pseudo-element selectors and hover/focus behavior.
- [x] Inspect the current FlexLine loader, component bundles, plugin render helpers, REST endpoints, and selected browser initialization paths.
- [x] Fetch current main for each repository, record exact commits and installed versions, and reconcile changes since this review. Refresh these baselines again when implementation starts.
- [x] Establish isolated worktrees for FlexLine and both plugin audits. Preserve the existing Local development checkouts and their content.

The authoritative plugin review uses fetched Location Sync main `2cbcbad` and Advanced Floor Plans main `8745c80`. The detailed review records installed-site differences and runtime probe scope. The local Brice Pointe site uses FlexLine 2.2.8 with the underline CSS fix applied. Its successful underline test establishes that behavior only.

| Responsibility | Existing code to extend |
| --- | --- |
| FlexLine requirements and enqueue ordering | `inc/component-styles.php`, `inc/scripts.php` |
| Slider first-paint rules | `inc/setup/preload-scripts.php` |
| Shared and feature CSS | `src/scss/app.scss`, `app-conditional.scss`, `component-*.scss`, `shared/blocks/` |
| Editor assets and style registration | `inc/setup/theme.php`, `inc/blocks/styles.php`, `theme.json` |
| Runtime initialization | `src/js/slider.js`, `src/js/horizontal-scroll.js`, modal runtime and existing content update listeners |
| Location Sync pattern resolution and rendering | `includes/traits/trait-post-type.php`, `includes/utils/class-block-render-helper.php`, `includes/blocks/render-location-map.php` |
| Location Sync later content | `includes/traits/trait-rest.php`, `src/blocks/location-map/` |
| Advanced Floor Plans patterns and assets | `includes/traits/trait-post-type.php`, `includes/utils/class-block-render-helper.php`, `includes/traits/trait-blocks.php`, `includes/blocks/render-advanced-floor-plans.php` |
| Advanced Floor Plans later content | `includes/traits/trait-rest.php`, `src/blocks/advanced-floor-plans/view.js`, `src/blocks/floor-plan-media-toggle/view.js` |
| Build and packaging | `webpack.mix.js`, `release-package.json`, existing runtime-package workflow |

Paths in this table are relative to their owning repository. The existing [conditional CSS documentation](CONDITIONAL_COMPONENT_STYLES.md) describes the deployed experimental split. Update it to the accepted behavior when implementation lands.

## Findings that drive the changes

The reduced bundle currently loads by default only for Local/development and only when the loader recognizes WordPress's native template canvas with observed rendering before the head. Production ordinarily receives the complete bundle. The split contains approximately 65 KiB of base CSS, 35 KiB of horizontal-scroll CSS, and 7 KiB of fading-slider CSS, plus a small inline tail. These are rounded, uncompressed file sizes from the reviewed checkout. Measure actual transferred bytes during acceptance.

Slider CSS and JavaScript currently use separate requirement detectors. Horizontal-scroll JavaScript loads globally, and slider startup CSS prints on every page. The base includes Gravity Forms, Events Manager, poster gallery, and other feature styles. The tail preserves the original cascade after optional components.

Both plugins render nested patterns with `do_blocks()`. These render hooks can report requirements while the initial block template renders. Both expose REST fragment endpoints. Advanced Floor Plans' standard frontend switches pre-rendered tab lists and hidden panel hosts, while Location Sync actively fetches additional cards and popovers. In REST, WordPress's server-side enqueue queue belongs to a separate request. That queue alone cannot load new files into the browser that requested the fragment.

Location Sync captures fragment layout and element CSS, isolates style-engine stores, and preserves location context. Its popover code emits `flexline:content-updated` with the inserted element. Advanced Floor Plans has `ensure_block_assets()`, explicit media-toggle asset registration/fallbacks, and `initMediaToggles()` calls after panel replacement. Determine the complete set of listeners and insertion paths during Phase 1, then reuse these mechanisms.

## Target loading contract

| Asset group | Requirement | Delivery |
| --- | --- | --- |
| Shared foundation | Every page | One base stylesheet |
| Horizontal scrolling | Enabled on a rendered block or within any reachable configured pattern | Feature CSS and its existing runtime |
| Fading slider | `enableSlider` or supported legacy slider markup, including nested patterns | Feature CSS, first-paint rules, and slider runtime |
| Modals | Supported modal triggers or plugin features that open media modals | Modal CSS and runtime |
| Plugin block assets | Plugin blocks in initial or later pattern output | Existing registered plugin handles and dependencies |
| Editor support | Feature inserted or enabled in the active editor canvas | Shared styles and required feature assets in that canvas |

The current fading feature uses the existing `slider` component name. Preserve that public identifier and existing classes while describing it as a fading slider in documentation. Inventory any other carousel integration separately before extending this table.

Every component must have one requirement decision that identifies its CSS, runtime, and necessary first-paint rules. Mobile-only native overflow scrolling requires CSS, while the desktop scroller also requires its runtime. Enqueue each handle once per document, with explicit dependencies and file versions. Keep responsive feature assets available when a viewport change can activate them. A mobile-only scroller therefore contributes a requirement even when the page initially loads on desktop.

The default delivery order is shared foundation, feature assets in documented dependency order, and site customizations. Editable defaults use WordPress's style hierarchy and intentionally low specificity. Structural selectors retain only the specificity needed for their behavior. Stylesheet order alone cannot correct a specificity conflict.

## Phase 1 inventory and integration contract

Deliver a completed inventory before changing the production default.

- [x] Map every SCSS import to shared foundation, feature, plugin integration, editor-only, or compatibility bundle. Record its trigger, dependencies, and any ordering conflicts.
- [x] Audit which horizontal-scroll runtime paths serve other features. Establish all existing class aliases and plugin wrappers before making its JavaScript conditional.
- [x] Enumerate pattern settings and fallback resolution in both plugins. Start with Location Sync `cardPatternSlug` and `popoverPatternSlug`, and Advanced Floor Plans `listPatternSlug` and `panelPatternSlug`. Include global defaults, comparison views, per-block overrides, and any per-record variants found in the resolver.
- [x] Map each REST replacement path, hidden host, cache hit, and editor preview to its renderer and initialization callback.
- [x] Verify hook registration, priority, and asset registration timing with actual WordPress rendering. The existing mocked loader tests do not establish that runtime integration.
- [x] Record supported WordPress versions and compare the relevant Core rendering paths. WordPress 6.5, 7.0, and 7.2 Beta 5 use the same template-canvas timing. Actual plugin render probes passed on the 7.2 Beta 5 populated canary.
- [ ] Complete runtime acceptance on disposable WordPress 6.5 and 7.0 fixtures during implementation verification. Source timing comparison alone does not establish full plugin compatibility.

Implement one small requirement collector in FlexLine. It accepts supported feature identifiers and unions repeated declarations. Preserve the existing `flexline_required_component_styles` integration filter or supply a compatible adapter. Register asset handles early enough that nested render callbacks and plugin helpers can request them before `wp_head()`.

Plugins expose the effective pattern references using their existing resolvers. FlexLine resolves feature requirements from those patterns through an integration adapter. Prefer actions/filters that remain harmless when FlexLine is absent. Plugins retain ownership of their own block handles, pattern permissions, token substitution, and post context.

## Phase 2 initial page and configured patterns

- [x] Introduce an explicitly named base entry point, proposed as `base.scss` producing `base.css`. Keep compatibility artifacts required by current consumers until their migration is verified.
- [x] Consolidate requirement detection for slider CSS, slider JavaScript, horizontal scrolling, and modal assets. Match class tokens and supported block attributes rather than arbitrary text substrings.
- [x] Collect requirements from the complete rendered template, including template parts, synced patterns, nested dynamic blocks, and Query Loop results.
- [x] Traverse all patterns reachable from the configured plugin block, including views that are initially hidden or empty. Follow registered patterns, user patterns, and synced references through existing resolution APIs.
- [x] Guard recursive references with a visited set and bounded traversal. An unresolved or dynamically generated requirement selects the compatibility path for that response and exposes a development diagnostic.
- [x] Associate cached pattern HTML with its requirements so cache hits retain the same asset declarations as fresh renders. Start with request-scoped memoization. Any persistent cache must include site, theme, pattern revision, and configuration dependencies and invalidate when they change.
- [x] Move fading-slider startup rules into feature-owned delivery that reaches the head before first paint. Confirm slides do not flash or collapse while scripts load.
- [x] Audit and resolve tail ordering before moving those rules into the base or their feature owners. Check existing winning declarations at points of overlap.
- [x] Retain an explicit complete-bundle compatibility mode for supported custom templates or integrations whose requirements cannot be determined early. Apply the same CSS and runtime requirement policy to that mode.

Avoid rendering every location or floor-plan record merely to discover assets. Resolve the configured pattern structure once and use render-time declarations for data-dependent output. Document how each data-dependent branch reports the union of assets it can introduce.

Completion requires an ordinary page to load the base and common assets, while each feature page adds only its declared feature bundles. Full compatibility mode remains directly testable.

## Phase 3 patterns arriving after page load

Predeclare requirements from configured patterns on the hosting page wherever possible. Prioritize Floor Plans' existing clone/reset path and Location Sync's active REST clients. Add a small fallback protocol for requirements that become known only when a REST fragment is rendered. Complete this protocol before making production depend on conditional feature delivery.

- [x] Add optional asset metadata to existing fragment responses, preserving current `html` and `markup` fields and response semantics. Define the schema and dependency ordering in both plugin tests.
- [x] Generate metadata from supported registered handles and their dependencies. Include versions and styles/scripts already required by the fragment. Retain authorization and pattern resolution checks before computing it.
- [x] Implement one reusable browser helper for documents hosting dynamic plugin content. Reuse an existing suitable helper if Phase 1 finds one. It loads missing assets once, recognizes assets already in the document, and shares in-flight promises across simultaneous requests.
- [x] Wait for CSS and prerequisite scripts before initializing and revealing interactive replacement content. Preserve the current usable content while a replacement loads. On failure, expose a retryable error through the plugin's existing status UI.
- [x] Ignore stale responses when a newer selection wins. Do not initialize detached panels. Preserve existing cleanup when content is removed.
- [x] Reuse `flexline:content-updated` where its listener contract fits. Ensure the affected root is supplied, scripts loaded after DOM readiness initialize correctly, and each slider/scroller/media toggle initializes once.
- [ ] Preserve `initMediaToggles()` and Location Sync fragment style capture. Verify returned container and element rules style the new content without changing unrelated page layout.
- [ ] Ensure payloads with omitted asset metadata still work with known predeclared requirements or compatibility mode. Test new plugins with the prior supported FlexLine release and the new theme with prior supported plugins.

Asset metadata must be derived from trusted server registrations. Reuse WordPress dependency order, versioning, inline configuration, and script attributes where needed. Restrict the initial transport to the component handles actually required by this project. If a handle needs localization, modules, or initialization settings the transport cannot reproduce, predeclare that dependency or use compatibility delivery for that integration until supported.


## Phase 4 editor behavior and editable defaults

- [x] Make required styles available when a user inserts a feature or changes a setting, including inside the Site Editor iframe and server-rendered plugin previews. Use the editor's asset pipeline and document context.
- [x] Preserve the complete editor bundle during transition if necessary for reliable insertion. Measure and document its eventual relationship to component loading.
- [x] Define Plain Text zero padding in its WordPress style variation defaults. Remove the high-specificity padding reset after verifying both parent-only FlexLine and child themes.
- [x] Check other editable values in Plain Text and Outline fallbacks, especially colors, borders, line height, and padding. Adjust those proven to block saved editor settings.
- [x] Preserve legacy suffixed style classes and the corrected underline selectors. Test defaults, global Button styles, variation-specific styles, child-theme values, and individual block overrides as distinct cases.

Brice Pointe's Contact button is the concrete regression fixture. Its saved vertical padding must compute to 8px, its horizontal padding to 0, and its 3px underline must appear on hover and Tab focus with the arrow visible. Resetting the variation's padding should restore the theme default through WordPress's normal style resolution.

Local Phase 4 implementation and fixture evidence are recorded in
[the editor asset review](CONDITIONAL_EDITOR_ASSETS.md). Real plugin preview UIs,
saved site styles and supported installed-package combinations remain Phase 5 gates.

## Phase 5 acceptance matrix

Use real WordPress fixtures and browser checks for rendering, asset timing, and behavior. Extend focused contract tests for new requirement and response semantics. Replace the existing exact full/split declaration equality assertion if deliberate base reorganization changes ordering, with checks that still detect lost selectors and changed relevant computed styles.

| Scenario | Required evidence |
| --- | --- |
| Plain content page | Base present, unused feature CSS and runtimes absent, common styles correct |
| Fader only, scroller only, both | Correct asset union, each requested once, working controls and keyboard interaction |
| Mobile-only scrolling | Correct startup and resizing behavior in both viewport directions |
| Nested pattern in template part or Query Loop | Requirements discovered before head output |
| Location map cards and popovers | Initial render, filtering, pagination/infinite scroll, comparison view, and newly opened popovers work |
| Floor-plan cards and detail panels | Initial selection, later selection, filter results, media toggle, and modal opening work |
| Feature present only in a later pattern | Assets available before first interaction, correct initialization and layout |
| Initially empty results | Later populated results obtain every required asset |
| Concurrent or stale fragment requests | One asset load, latest result wins, no duplicate controls or orphaned listeners |
| Failed asset request | Existing content usable, error and retry work |
| Registered, user, synced, and recursive patterns | Correct resolution and deduplication, bounded traversal, explicit fallback |
| Pattern and page caches | Warm/cold parity, edited pattern requirements invalidate correctly, site isolation |
| Site Editor and post editor | Immediate appearance on insert/enable, SSR patterns styled inside the correct canvas |
| Plain Text and Outline customization | Saved styles win, defaults work, legacy classes render correctly |
| Complete-bundle compatibility mode | Equivalent usable layout and features, including custom templates |
| Version combinations | Supported prior/new theme and plugin combinations pass or use documented compatibility behavior |

For each applicable case retain page URL, fixture/pattern identifiers, theme/plugin versions, asset request list, computed styles, screenshot, console errors, and interaction result. Record actual transfer size and request counts before and after under the same cache and compression conditions. Include Brice Pointe plus a representative site exercising both dynamic plugins.

## Pull requests and execution order

1. **FlexLine foundation and cascade.** Add the shared requirement collector, base/feature delivery, registration timing fixes, and editable button defaults. Keep rollout controlled by the existing option/filter while integrations are completed. Include built assets and focused verification.
2. **Plugin integration support.** Prepare one PR per affected plugin for effective pattern requirements, compatible response metadata, cached fragment requirements, and browser initialization integration. Share the metadata contract and declare minimum compatible versions where required.
3. **Cross-plugin acceptance.** Run the matrix with exact preview artifacts, resolve failures, verify asset-loader failure and retry behavior, and document supported mixed-version behavior.
4. **Production default and documentation.** Enable conditional delivery by default after acceptance, with existing explicit overrides respected. Update the component documentation, release progress record, runtime package required files, and release notes.

This ordering describes dependencies. Existing code that already fulfills a requirement should be reused, and a plugin PR can be omitted when verified compatibility requires no change.

## Release and recovery

- [ ] Record exact tested versions and the theme/plugin deployment order. Prefer additive plugin support first, followed by enabling the theme's production default.
- [ ] Build preview packages with the repository tooling and verify that base, components, runtimes, fonts, and compatibility assets are present.
- [ ] Retain the installed package and settings for each canary. Exercise returning to complete-bundle mode and restoring the prior supported package against the current content.
- [ ] Invalidate page and optimized asset caches when switching bundles or restoring packages. Verify generated fragment styles and REST content after the transition.
- [ ] Run the applicable package and CodeQL checks on each PR, then follow the repository's tag-based release workflow and obtain deployment authorization for the intended sites.
- [ ] Update `docs/RELEASE_IMPLEMENTATION_PLAN.md` with commands, artifact references, outcomes, and unresolved acceptance cases during execution.

Completion means conditional loading is consistent across supported environments, plugin patterns remain functional through every delivery path, the Style Editor controls editable defaults, and the recorded acceptance matrix supports the shipped version combination.

## Phase 2 execution record — 17 November 2026

Implemented on `codex/conditional-css-plan`, fast-forwarded to released FlexLine
2.2.9 (`ea736a05`) before editing. The separate button release is preserved.
Refetched plugin main: Location Sync `2cbcbad39e67f871743b0a54911ed8e401821d94`,
Advanced Floor Plans `8745c804e2bd569c776b2e298794b0135d302313` (unchanged).
Their existing public resolvers support the Phase 2 adapter, so neither plugin
needed a source change. The Phase 1 plan/review/inventory are now committed.

The tail-order audit chose to retain the inline tail after optional features;
no reorder was needed. Request-scoped pattern discovery retains requirements on
warm lookups and reads every configured surface without rendering records merely
to discover assets. Unknown dynamic output uses complete delivery until an explicit
union can be supplied. Complete mode includes all theme feature runtimes; verified
conditional pages can omit them. The production opt-in policy remains unchanged.

See [the updated loading contract](CONDITIONAL_COMPONENT_STYLES.md) for the API,
limits, exact verification results, reusable WordPress probe and outstanding gates.
Phase 2 has local initial-page coverage. Phase 3 transport and lifecycle implementation
is recorded in [the fragment contract](CONDITIONAL_FRAGMENT_ASSETS.md), including
local checks and remaining installed-package/integration acceptance gates. Phase 4
implementation is recorded in the editor asset review; the broader Phase 5
acceptance matrix remains outstanding.
WordPress 6.5/7.0 execution is still a verification gate. No installed client theme,
plugin, page, or saved option was changed during this implementation.
