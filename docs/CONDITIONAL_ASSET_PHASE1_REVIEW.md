# FlexLine conditional assets Phase 1 review

17 November 2026. This review defines the implementation scope using fetched repository main as the source of truth. Runtime probes exercise the existing installed code and are identified separately below.

The existing render pipeline can discover features inside both plugins' initial pattern output. The main implementation work is consistent requirement declarations, early registration, preservation of pattern dependencies across delayed output, and reliable initialization after content replacement. Advanced Floor Plans already renders its normal interactive content on the server. Location Sync additionally fetches cards and popovers through REST.

## Authoritative baselines and instructions

| Repository | Fetched main commit | Header version | Review checkout |
| --- | --- | --- | --- |
| FlexLine | `b789627bfa4d2d75f2ad989ceddb737bd9382bc2` | 2.2.8 | `release-worktrees/flexline-button-underline`, planning branch `codex/conditional-css-plan` |
| Location Sync | `2cbcbad39e67f871743b0a54911ed8e401821d94` | 1.1.4 | `release-worktrees/location-sync-conditional-audit` |
| Advanced Floor Plans | `8745c804e2bd569c776b2e298794b0135d302313` | 1.0.1 | `release-worktrees/floor-plans-conditional-audit` |

All checkout paths above are relative to the mylifesite2026 workspace. Each repository's `AGENTS.md` was read. The scoped search found no nested AGENTS files. The instructions require preserving active Local checkouts, package compatibility and runtime assets, versioned release artifacts, and verified recovery. Release implementation will follow each repository's release documentation and record its verification results.

Location Sync's active development branch is `c4670d4`, which contains additional preview changes beyond main. Its pattern rendering helpers match the inspected main implementation. The review and proposed changes use the isolated main checkout. Advanced Floor Plans' active clean checkout matches main, and a separate read-only audit checkout was created for consistent source references.

## Complete stylesheet inventory

The machine-readable [SCSS inventory](conditional-assets-scss-inventory.json) lists all 68 SCSS files, their classification, and all 80 resolved imports. The rows below assign every shared implementation module to a delivery responsibility. Frontend wrappers call these shared mixins. Editor wrappers apply their editor scope and any editor-specific additions.

| Shared module under `src/scss/shared/` | Proposed delivery | Trigger and dependency considerations |
| --- | --- | --- |
| `main/_variables.scss` | Build input | Breakpoints and mixins, required when compiling dependent entries |
| `main/_base.scss` | Base | Document defaults and shared transitions |
| `main/_utilities.scss` | Base | Generic utilities and header layout interaction |
| `main/_utility-classes.scss` | Base | Author-applied spacing, color, link, and button helpers |
| `main/_navigation.scss` | Base initially | Common navigation and mobile behavior |
| `main/_slide-in-menu.scss` | Base initially | Slide-in template and runtime, extract after auditing every menu entry point |
| `main/_templates.scss` | Base | Header/search and template layout |
| `main/_gravity-forms.scss` | Integration candidate | Gravity Forms output, including shortcode, popup, and later insertion paths |
| `main/_headroom.scss` | Feature candidate | Headroom options already control its JS, audit utility interactions before moving CSS |
| `main/_events-manager.scss` | Integration candidate | Events Manager views and date controls, including plugin-generated content |
| `main/_query-loop-filters.scss` | Base initially | Filter select styles and related-post visibility helper share this module |
| `blocks/_block-customizations.scss` | Base | Common images, buttons, icon pseudo-elements, and block adjustments |
| `blocks/_style-variations.scss` | Base behavior plus theme.json defaults | Plain Text, Outline, typography variants, and legacy suffixes |
| `blocks/_content-shift.scss` | Base initially | Content-shift classes and custom properties on arbitrary blocks |
| `blocks/_section-frames.scss` | Base initially | Section frame and shape classes, depends on variables and generated preset properties |
| `blocks/_card-variations.scss` | Base initially | Card variants on images/groups, including patterns returned by plugins |
| `blocks/_visibility-variations.scss` | Base | Responsive visibility and stacking on arbitrary nested blocks |
| `blocks/_poster-gallery.scss` | Feature candidate | Poster-gallery markup, Core lightbox and legacy baguetteBox paths |
| `blocks/_icons.scss` | Split with owners when extracted | Contains modal, poster-gallery, and mobile-scroll icon backgrounds |
| `blocks/_horizontal-scroll-variations.scss` | Conditional feature | Desktop scrollers, legacy suffixed classes, and CSS-only mobile scrolling |
| `blocks/_slider-variations.scss` | Conditional feature | Fading slider and its navigation/control variants |
| `blocks/_plethoraplugins.scss` | Integration candidate | Plethora tabs/accordions and mobile panels, currently in the tail |
| `blocks/_visibility-toggle.scss` | Base initially | Toggle visibility and active-button styles, currently in the tail |

Seven build entries currently exist. `app.scss` combines the reduced base, horizontal scroll, slider, and tail in that order. `app-conditional.scss` holds the 19 base/shared imports plus variables. `component-horizontal-scroll.scss`, `component-slider.scss`, and `component-tail.scss` wrap their corresponding owners. `modal.scss` is already separate. `editor.scss` imports variables and 15 editor modules. Its slider, visibility-toggle, and slide-in modules contain editor-specific rules instead of shared imports. The inventory records their exact files.

The first implementation should extract the established slider/scroller/modal requirements and fix the cascade. Forms, Events Manager, galleries, and Plethora should remain available until their complete rendering triggers have been verified. Each candidate can become a later scoped extraction.

### Ordering and specificity dependencies

The full bundle deliberately places horizontal scrolling after generic block styles, slider rules after scrolling, and toggle/Plethora rules last. Broad selectors such as `.wp-element-button`, group/column layout, and active-toggle backgrounds can overlap. Preserve that order during the first extraction. Moving the tail into the base needs computed-style checks for active buttons and mobile panels.

The icon module owns part of mobile-scroll, modal, and poster-gallery presentation. Moving only their structural CSS would leave feature fragments in the base. Track these pieces together before a later extraction.

Plain Text currently forces zero padding with a four-class selector. WordPress's variation rule has lower specificity. Move editable defaults into the variation's theme.json data and test child themes and saved global styles. Keep the corrected underline pseudo-element outside `:is()` and preserve legacy suffix support.

## Feature and runtime inventory

| Feature | Detection and existing runtime | Required change |
| --- | --- | --- |
| Fading slider | `enableSlider`, `.is-style-slider`, `.slider-wrapper`; `window.FlexlineSlider` exposes initialization/teardown; body observer detects new sliders | One declaration for CSS, JS, and first-paint rules; initialize cloned content without stale state |
| Desktop scrolling | Runtime primarily targets `.is-style-horizontal-scroll`; manages `.horizontal-scroll-wrapper`, loops, buttons, columns, and post-template children | Conditional JS plus CSS; invoke `FlexlineHorizontalScroll.init(root)` after frontend insertions and teardown before removal |
| Legacy scrolling | CSS accepts `is-style-horizontal-scroll--…`; runtime selector uses the canonical class | Preserve rendering compatibility and test normalization before assuming every styled scroller is initialized |
| Mobile scrolling | `.is-style-horizontal-scroll-at-mobile` and icon CSS provide native overflow scrolling; runtime does not target this class alone | CSS requirement without automatically requesting desktop-scroller JS |
| Modal | Render hooks inspect modal classes/data attributes and location-map blocks; runtime listens for `flexline:content-updated` and observes content | Register assets before rendering, retain existing observer/event behavior |
| Poster gallery | `assets/js/poster-gallery-helper.js` listens for content updates; PHP selects Core or legacy lightbox behavior | Preserve lightbox selection and required CSS/runtime dependencies during future extraction |
| Floor-plan media | Shared media CSS and registered media-toggle block assets; main parent renderer calls `ensure_block_assets()` | Reuse plugin ownership and its explicit initialization after cloning |

Horizontal-scroll JS installs a body insertion observer in editor context. On the frontend it initializes at readiness/load and listens on `document` for `flexline-horizontal-scroller-updated`, with `detail.root`. Location Sync dispatches `flexline:content-updated` on `window`; list notifications carry a source, while popover notifications also carry an element. These events currently have different contracts. The modal and poster-gallery runtimes subscribe to Location Sync's event. The horizontal-scroll runtime needs a bridge or direct root-scoped call.

The fading-slider observer can discover newly inserted slider elements once its script is loaded. Verify cloned initialized markup explicitly because DOM clones copy classes and data attributes without their original listeners or object state. Advanced Floor Plans currently resets media-toggle markers only.

## Pattern resolution and output paths

### Location Sync main

`includes/traits/trait-post-type.php` provides `resolve_effective_pattern()` and `get_default_pattern_for_view()`. A valid block override wins. Numeric IDs normalize to `user-pattern:<id>`. Otherwise a valid view default wins, followed by the built-in fallback. Default options cover `grid`, `list`, `popover`, and `comparison`.

The location-map renderer resolves three effective paths.

| Surface | Resolution | Initial output and later behavior |
| --- | --- | --- |
| Cards | `cardPatternSlug` with the current list style | Initial cards render in PHP; pagination, filtering, and infinite scrolling request more cards |
| Popovers | `popoverPatternSlug` with the popover default | Hidden hosts render for initial IDs; missing hosts are fetched through `/pattern-render` |
| Comparison cards | `comparisonPatternSlug`, then card override, resolved as `grid` | Hidden comparison hosts render for initial IDs when enabled; later results reuse hosts or fetch grid cards |

The comparison path currently resolves through `grid` even though the resolver supports a separate comparison default. The new declaration adapter must reproduce the actual renderer's choice. Any change to default-selection semantics belongs in a separately verified behavior change.

Registered patterns render through a `core/pattern` reference. User patterns render their stored block markup. Nested synced blocks therefore still need traversal. No per-record pattern selector was found in the inspected resolver, though dynamic blocks can emit record-dependent markup.

The PHP rendered-pattern cache is request-scoped and includes slug, post, global-context flag, editor/user context, stylesheet context, and surface. Cache hits return HTML before recursive rendering. Initial hidden hosts cover only the available initial IDs. Empty result sets can omit all feature markup even when the configured patterns contain features.

REST card responses return `html`, `rendered`, and `ids`. Popover responses return `html`. Client popovers deduplicate pending requests and cache host markup. List and comparison flows guard against stale filter requests. Preserve those behaviors while retaining dependency metadata with cached content.

Location Sync's helper isolates style-engine stores, captures generated block support styles, restores post context, and scopes fragment styles. These are existing requirements for layout parity. The internal single-location PHP template calls `get_header()` before `do_blocks()`, establishing a real late-render compatibility path in addition to the native block canvas.

### Advanced Floor Plans main

`resolve_effective_pattern()` follows override, valid view default, then built-in fallback. The options are `floor_plan_cpt_default_pattern_list` and `floor_plan_cpt_default_pattern_panel`. The renderer consumes `listPatternSlug` and `panelPatternSlug`. The PHP request cache keys rendered HTML by slug, post ID, and global-context flag.

The normal frontend renderer prepares all tab lists in its JSON payload, the initial panel, and hidden per-record panel hosts. `view.js` switches tab list markup and clones matching panel hosts. Both panel replacement paths reset and run `initMediaToggles()`. These standard interactions use already-rendered content. Requirements can be collected before the head even when a tab's HTML is stored inside JSON rather than initially displayed.

The plugin exposes `/pattern-render` and card-render REST handlers returning `markup` and identifying fields. The inspected standard frontend `view.js` does not call those routes. Keep these endpoints compatible, but prioritize the verified cloning path in the first integration change.

The parent renderer explicitly invokes `ensure_block_assets()` for media toggles. `maybe_enqueue_media_toggle_assets()` also handles editor/SSR contexts and inspects page/template blocks. Its parsed-template walker follows `innerBlocks`, so it does not itself resolve every external pattern or synced reference. Actual nested rendering and pattern declarations must cover those references.

The parent frontend runtime initializes on `DOMContentLoaded`. A newly downloaded copy after that event needs an explicit initializer or predeclaration. Reuse the imported media-toggle initialization API and account for its MutationObserver.

## Runtime verification and its limits

Read-only WP-CLI probes registered an in-memory pattern containing a fading slider, horizontal scroller, and modal trigger. They rendered it through each helper and through both actual parent blocks using existing published fixture records. They invoked real WordPress hooks and captured the resulting asset queues and head output. No fixture posts or patterns were saved.

Evidence and the reproducible probe are in the workspace's `diagnostics/conditional-assets-phase1-20261117/` directory. The JSON files contain results, while logs retain bootstrap notices.

| Probe | Result |
| --- | --- |
| Populated myLifeSite2026, WordPress 7.2 Beta 5, PHP 8.2.29 | Relevant hook callbacks callable; collector at final `render_block` priority; theme enqueue at priority 10; startup CSS at head priority 1 |
| Nested patterns through each plugin helper | Both independently declared slider and horizontal-scroll requirements |
| Actual Location Sync parent | In-memory pattern rendered through cards/hosts and declared both features |
| Actual Floor Plans parent | In-memory pattern rendered through tab/panel output and declared both features |
| Native-canvas-style pre-head rendering | Slider CSS, scroll CSS, modal CSS, and startup styles appeared in captured head output |
| REST-context render | Requirements collected in PHP; no head output delivered by that probe, consistent with endpoints returning fragment fields |
| Rendering after head | Component collector returned without collecting new requirements |
| Brice Pointe | Floor Plans helper detected features; Location Sync inactive and Floor Plans had no populated parent fixture, so this site does not establish those integration cases |

The populated test site's theme header remains 2.2.2 with local component-loading work. Its `inc/component-styles.php`, `inc/scripts.php`, slider runtime, and horizontal-scroll runtime are byte-identical to reviewed FlexLine main. Plugin helper comparisons establish the relevant source equivalence. These observations validate current hook behavior, not a future build's complete visual acceptance.

Brice Pointe's parent header is 2.2.8. Its installed Floor Plans header is 0.1.1 although the inspected pattern/asset helper files match main 1.0.1. The first CLI attempt hit the default 128 MiB memory limit in WP Migrate bootstrap. Repeating with a process-local 512 MiB limit succeeded. Treat installed versions and package provenance as a deployment check.

Slider rendering can register its runtime before the normal theme enqueue pass, with a different initial dependency list. Modal handles are enqueued before their normal registration and are resolved later by WordPress. Registration should move early so helpers see a stable dependency graph; the current probe shows this timing works for ordinary pre-head output.

### Supported versions

FlexLine and both plugin headers declare WordPress 6.5 minimum and tested up to 7.0. The active populated canary runs 7.2 Beta 5. Local copies of the Core template canvas for 6.5, 7.0, and 7.2 Beta 5 are byte-identical and render the template before `wp_head()`. This verifies that specific timing assumption across those versions by source comparison.

Full runtime checks on WordPress 6.5 and 7.0 remain acceptance work. The available 6.5 installation is a separate client site. Run supported-version tests in disposable fixtures rather than altering that installation or running older Core against the active canary database. Also verify the installed plugin builds and editor asset paths on the canary used for release acceptance.

## Integration contract for implementation

1. Register feature handles early. A declaration identifies a component and whether it needs CSS, JS, or both. Keep the public `slider` and `horizontal-scroll` identifiers and adapt the existing filter. Mobile-only scrolling adds CSS only.
2. Each plugin exposes its effective pattern references using its own resolver. Traverse references once per request, with cycle protection, and collect required theme features and registered block handles. Include hidden and empty-state possibilities.
3. Render hooks supplement that declaration for data-dependent output. Cached fragment output retains its requirements. Unknown dynamic paths select documented compatibility delivery before the head where possible.
4. Initial pages predeclare all reachable configured pattern assets. This covers Floor Plans' normal tab/panel cloning and most Location Sync patterns without adding a request at interaction time.
5. Location Sync's fragment pipeline retains any newly discovered requirements with its HTML responses and caches. A supported-handle loader waits for missing dependencies before initialization. Keep the schema additive and accept older responses with predeclared assets.
6. Define one root-aware initialization bridge using existing runtime APIs. Accept the legacy content-update event, map `element`/`root` consistently, and preserve teardown, stale-response guards, and media-toggle reset behavior.
7. Plugin operation with other themes remains supported. Feature declarations use optional hooks, and the plugin's own handles continue to be managed by its existing renderer.

The fallback metadata transport must preserve required inline configuration and dependency order. Scope it to the supported handles found in this inventory. Advanced Floor Plans' REST transport extension can share that contract where a consumer needs it, while its standard interface gets predeclaration and clone initialization first.

## Execution scope and revised estimate

Proceed with a small first implementation spanning the FlexLine collector and cascade, plus both plugins' effective-pattern declarations and initialization integration. Include Location Sync's late-fragment dependency handling. Keep forms/events/gallery extraction as follow-up work once their triggers are verified.

Budget approximately 3–5 working days for this scoped implementation and verification. The existing helpers and Floor Plans' pre-rendering reduce the amount of new loading infrastructure. The largest remaining uncertainty is exercising empty, cached, and record-dependent Location Sync fragments together with old/new theme-plugin combinations. Reserve additional time if those cases reveal assets that cannot be predeclared or safely transported through the scoped loader.

Phase 1 has produced the source inventory, runtime timing evidence, pattern/output map, and implementation contract. Supported-version runtime acceptance and browser tests of the refactor remain explicit execution gates in the plan.
