# Web4SL WordPress 7.2 remediation plan

Updated October 16, 2026. FlexLine implementation branch: `wp-7.2-remediation`,
based on `release-2.2.2` at `1bab7b25a36365c3c4b59abd20f2e10d575b1348`.

Adopt as many compatible Core capabilities as possible while preserving the intent
and rendering of existing Web4SL sites. Retain useful FlexLine shortcuts and
specialized behaviors. Convert saved content only through verified mappings with
tested recovery. This document records decisions and remaining acceptance gates;
it does not establish WordPress 7.2 compatibility or authorize deployment.

## Ownership and platform scope

- Review FlexLine and all five Web4SL plugins: Core, Location Sync, Advanced Floor
  Plans, Campaign Manager, and MCP Site Ops. The owner explicitly confirmed MCP
  Site Ops ownership; reconcile its omission from the ownership manifest.
- Review shared CI and explicitly owned child themes for integration effects.
  Treat unlisted child themes, Core, third-party plugins, vendor libraries,
  node_modules, mu-plugins, and configuration outside the ownership allowlist as
  read-only. Fix integrations in owned code or report upstream issues.
- Honor additional approval boundaries for shared utilities, symlinks, and files
  shared by multiple clients. Read applicable AGENTS.md and ownership guidance
  before each repository's implementation; preserve existing uncommitted work.
- MyLifeSite Location Sync remains an additive client extension. Web4SL Location
  Sync owns directory_locations, core metadata, routes, shared blocks, and shared
  behavior. Test both active when shared hooks or registrations change. Keep
  MyLifeSite outside the managed-package release migration.
- This FlexLine branch does not create branches or authorize releases in plugin
  repositories. Record each plugin's exact source revision before implementation.

## Responsive breakpoints first

Add top-level `settings.viewport` to FlexLine theme.json using the existing SCSS
maximum widths: mobile `781.98px`, tablet `991.98px`. Preserve existing SCSS mobile
maximum 781.98px, tablet minimum 782px and maximum 991.98px, desktop minimum 992px,
and additional large-screen rules at 1325px.

Core generates tablet ranges above the mobile maximum; FlexLine starts at 782px.
Test fractional widths around both boundaries rather than claiming exact range
equivalence. Core's Default style is a base across widths, not a desktop-only rule.

Before promotion, inventory saved Core viewport styles in posts, templates,
template parts, patterns, Global Styles, and child-theme JSON. Changing the theme
breakpoints changes the activation ranges of existing Core styles, even without
rewriting content. Inspect merged settings for child-theme and user overrides.
Do not globally convert existing Core content from its former ranges by assumption.

Responsive standard block styling already exists in WordPress 7.1. WordPress 7.2
extends that foundation, including public custom-control helpers. Verify each
block/property combination against actual Core-only and Gutenberg test versions.

## Text shadow decision

- Prefer Core's native picker and presets wherever supported.
- An explicit Core block shadow, including `none`, overrides FlexLine's block-level
  shadow. With no explicit Core value, retain the existing FlexLine fallback.
- Preserve FlexLine's inline toolbar format and saved spans for word/phrase-level
  styling. Explicit inline shadows retain their granular effect within a block.
- Test inherited/theme/user values, clearing versus explicit none, legacy style
  classes, inline spans, and save/reopen behavior before changing precedence.

## Spacing and borders

Expose supported native controls while retaining FlexLine spacing preset slugs,
values, fluid formulas, and legacy class behavior. Disabling default spacing
presets does not disable responsive editing. Keep content-shift transforms,
negative-margin behavior, z-index, and mobile resets separate initially.

| Existing feature | Direction | Existing content |
| --- | --- | --- |
| Per-viewport no-padding classes | Integrate Core; targeted conversion candidate | Keep zero padding at original ranges |
| Horizontal/vertical padding removal | Convert both affected sides together when equivalent | Preserve unrelated sides and viewport settings |
| Individual-side padding removal | Prefer Core for new authoring where supported | Preserve explicit zero versus inherited/unset values |
| All-side or per-side border removal | Integrate after semantic and visual comparison | Retain removal and unaffected radius/other sides |
| Card/outlined spacing and borders | Retain named styles; integrate native styling | Preserve nested padding, clipping, and image-fill behavior |
| Content shifts | Keep specialized behavior | Preserve units, signs, overlap, and reset behavior |

Existing removal classes use `!important`; do not globally weaken them. Identify
active overrides in the inspector so a Core value does not silently appear broken.
Provide a targeted, undoable "Use Core spacing/borders instead" conversion only
where supported and equivalent. Write the equivalent native values and remove
the corresponding class in one edit. Preserve unknown classes and unrelated styles.
For all-side classes, preserve the other sides when editing only one. Border none
and width zero require comparison of style/color resets and hover/focus behavior.

Do not bulk rewrite or resave old content on update. Automatic conversion remains
gated on proven breakpoint, selector, cascade, persistence, and recovery equivalence.

## Layout controls and style variations

| Family | Direction |
| --- | --- |
| Stack at Medium; reverse when stacked | Keep conditional behavior; integrate only verified equivalents |
| Center all at mobile/tablet | Keep shortcut; consider Core backing only if container and direct-child effects match |
| Left/right mobile/tablet | Keep combined column-direction and child alignment behavior |
| Individual alignment, spacing, background and shadow helpers | Prefer native authoring where supported; retain legacy selectors |
| Responsive order, reverse direction, opacity, pointer events, z-index, nowrap | Keep until equivalent supported behavior is verified |
| Visibility | Preserve FlexLine controls and saved Core Hide option; no automatic switch-value change |
| Cards, outlined, glass, typography, button and navigation styles | Keep names and design intent; integrate standard native properties |
| Inline text shadow | Keep granular formatting alongside Core block shadow |
| Sliders, horizontal scrollers, mobile navigation scrolling | Keep runtime features; integrate compatible styling |
| Poster galleries | Keep single-cover presentation; test native Flex/Grid and lightbox interaction |
| Ordinary gallery lightbox | Continue existing WP 7 integration; verify dynamic content and no duplicate handlers |
| Section frames, masks, overlaps | Keep specialized rendering and saved presets |
| Global color/typography variations | Retain preset identities and child-theme references |

Do not remove legacy suffixed style selectors merely because new authoring uses
canonical classes. Inventory actual usage before retiring fallbacks.

## Plugin custom block review

### Composite interface safeguards and separate review

Map and main floor-plan interface visual controls are excluded from the first
implementation pass. First evaluate a surrounding Core Group for outer styling.
Direct controls require a separate working-example review and evidence that the
Group approach is insufficient. No automatic migration for either composite block.

Test borders and padding against fixed heights, overflow, clipping, map resize,
side panels, popovers, tabs, scrolling, media, keyboard focus and focus outlines.
Cover viewport and narrow-container layouts. Preserve rendering with no new values
and inventory saved styles that a renderer correction might newly activate.

### Initial implementation and beta pause

The first pass aligns FlexLine theme viewports and adds typography.textShadow
support to five simple Location Sync blocks and eight simple Floor Plans blocks.
Source and committed runtime block metadata must agree. It does not change saved
content, class precedence, existing typography defaults, or interactive interfaces.
Native shadow precedence and the legacy fallback policy still need beta validation.

Pause further integration, preview-renderer corrections, class conversions, and
composite interface controls until the owner installs WordPress 7.2 beta locally.
Do not install or upgrade the Local environment as part of this pass. In particular,
verify responsive styling and doubled editor/PHP wrappers before changing SSR
attribute forwarding. Automated checks below do not establish visual acceptance.

Prioritize `web4sl-location-sync` and `web4sl-advanced-floor-plans`, then Web4SL
Core's blocks and all other owned block customizations.

- Inventory source and packaged block.json files, registered attributes, block
  supports, registration filters, variations, transforms/deprecations, render
  callbacks, wrapper attributes, custom controls, and editor/frontend assets.
- Map each block's spacing, border, layout, visibility, dimensions, media, and
  typography behavior to Core supports. Include FlexLine extensions applied to
  plugin blocks; do not assume a Core-block migration covers custom blocks.
- Test whether native responsive style attributes survive parsing, REST previews,
  server rendering, sanitization, save/reopen, and package rebuilds. Preserve
  existing block names, attributes, public hooks, routes, and saved markup.
- Verify get_block_wrapper_attributes or equivalent wrapper handling carries
  native styles/classes correctly; fix demonstrated gaps in owned renderers.
- Compare source JS/SCSS with compiled assets and asset dependencies. Test editor
  shell, canvas iframe, Site Editor, frontend, and REST/server previews.
- Cover directory listings, filters, maps, location/contact blocks, floor-plan
  listings, image/media blocks, prices/details, and action buttons. Exercise
  existing and new Core values together, including nested query/post-template use.
- Record per-block recommendations as keep, integrate, or migrate, with supported
  versions, existing-site effects, automated regression coverage, and manual gates.

## Other upstream compatibility work

### Custom block review findings October 16

Source review covered six Location Sync blocks at `6265e9d` and fifteen Advanced
Floor Plans blocks at `01d5152`. Source/build metadata agrees for names, supports,
and attributes across these blocks. Runtime behavior still requires verification.

| Blocks | Existing Core support and integration direction |
| --- | --- |
| Location address, description, phone link, map link | Already declare spacing, borders, shadow, colors and typography and use Core PHP wrapper attributes. Validate native responsive styles first; consider background and text-shadow support additively. Retain center-content behavior. |
| Location filter family | Already declares spacing, text/link colors and basic typography. Add border/shadow/background controls selectively; retain family selection, display modes, decoration, labels and link semantics. |
| Location map | Declares block gap and wide/full alignment. Add outer spacing/borders/background/shadow only after wrapper and clipping tests. Keep internal map/list/filter controls. Current custom card-gap bridge reads only base style.spacing.blockGap into an inline variable; make viewport gap handling explicit before promising responsive card gaps. |
| Floor-plan beds, baths, description, square feet, starting price, availability count and accessibility badge | Already declare broad native visual supports. Validate responsive rendering and text-shadow opt-in. Keep dynamic data, icons, labels and center-content behavior. |
| Floor-plan grouping display | Already declares spacing, colors and typography. Add borders/shadows selectively; retain term/list/icon controls and child targeting. |
| Floor-plan 2D/3D images | Already declare spacing, borders and shadow. Keep legacy aspectRatio and imageFit until native image-targeted responsive styling is equivalent; height is explicitly disabled. |
| Floor-plan video, virtual tour and brochure | Already declare broad visual supports, but media output differs by mode. Fix/verify native styling propagation before adding controls. Preserve inline/poster/modal/link behavior and iframe sizing. |
| Floor-plan media toggle | Already declares spacing, borders, shadow and typography. Retain separate internal button colors, borders, icon layout, active/hover states and expansion behavior; outer Core styles do not replace internal controls. |
| Advanced floor-plan parent | Declares wide/full alignment and typography. Add outer spacing/border/background/shadow with rendering tests. Retain internal tab gap/padding/borders/alignment/colors and list height; its independent tabs-to-select breakpoint must not be changed merely to match theme viewports. |

Specific prerequisites:

- Location address, description, phone-link and map-link editors invoke
  ServerSideRender without current attributes. Pass attributes and verify the
  outer useBlockProps wrapper does not double-apply spacing/borders to the PHP
  wrapper in preview. Compare actual frontend rendering, not just editor appearance.
- Floor_Plan_Media uses get_block_wrapper_attributes for image/poster paths, but
  inline embeds, posterless modal fallback and PDF paths return hand-built wrappers.
  Make support propagation consistent without casually adding DOM levels. Some
  previously saved visual settings may begin applying when this is fixed: inventory
  those values and compare old/new rendering before shipping the correction.
- The brochure block currently delegates to inline PDF rendering despite its
  button name. Treat UI/content behavior changes separately from styling adoption.
- Location-map result layout uses a container query at 781.98px. That measures
  the list container, not the viewport; preserve its ability to reflow in narrow
  side panels even on desktop when aligning theme viewport settings.
- None of the reviewed source blocks explicitly opts into typography.textShadow.
  Add it to appropriate text-bearing blocks under the agreed Core precedence policy.
- Audit alignCenter/is-aligned-center conflicts before replacing them with native
  text alignment; the legacy class targets multiple alignment properties and children.
- Keep existing visibility attributes, legacy experimental support aliases needed
  by supported versions, class names, public hooks, and pattern selectors. Enabling
  generic layout supports must not rearrange map regions, tabs, or toggle controls.
- Test both plugins with FlexLine and MyLifeSite extension where applicable, using
  real post context in Query Loops, templates, patterns and REST-rendered content.

Implementation order: establish wrapper/preview parity; validate already-declared
supports; add outer visual supports; bridge internal responsive styles explicitly;
only then offer proven per-block conversions. No runtime plugin changes were made
as part of this review.

Test KSES consumers and content sanitization; its rewrite may land in 7.2 or 7.3.
Test authentication hardening against MCP, health keys, outer Basic authentication,
capabilities and multisite isolation. Test database-sensitive imports/searches with
quotes, backslashes, JSON, Unicode and wildcards; retain Core SQL-mode defaults.
Review stroke-icon styling and component deprecations without changing custom SVG
assets indiscriminately. Test the DataForm inspector against primary-term panels.
Apply WordPress.org release-review requirements only to directory-distributed code.

## Verification and release acceptance

- Run package-specific existing checks and supported minimum-version tests. Test
  the complete platform on PHP 8.2 and current stable WordPress, with separate
  Core-only prerelease and Core-plus-Gutenberg lanes; record exact versions.
- Build legacy fixtures with classes, custom attributes, Core states, style
  variations, and mixed settings. Test explicit zero/false/none, reset/unset,
  individual sides, nested children, unknown classes, and unrelated edits.
- Compare computed styles and screenshots around 782px, 992px, and 1325px,
  including fractional boundaries and representative mobile/desktop widths.
- Test old frontend rendering before any resave, then open/edit/save/reopen,
  undo/redo and supported recovery. Test user Global Styles and owned child themes.
- Verify actual runtime ZIPs retain blocks, asset manifests, fonts, sanitizer and
  Leaflet dependencies. Run relevant shared-CI refusal/workflow checks if changed.
- Treat the local 7.1.2 installation separately from fleet inventory; prepare the
  stable security update independently of 7.2. Do not infer production versions.
- Reconcile upstream notes at Beta 1 (planned October 20), RC1 (November 17), and
  final (December 8); recheck schedules and final feature inclusion at each gate.
- Retain exact installed recovery packages; code rollback does not reverse data.
  Campaign Manager recovery must read encrypted secrets. Never silently restore
  plaintext secrets or overwrite newer content with an older database.
- Update tested-version metadata only after verification. Keep existing tagged
  package identities, allowlists and pinned shared action. Production-branch pushes
  can trigger DFG consumers; publication, promotion, site changes and credentials
  require their exact authorization. Complete staging/Canary Health, visual and
  recovery acceptance before wider rollout; observe the canary for 48 hours.

## Sources

- [October developer notes](https://developer.wordpress.org/news/2026/10/whats-new-for-developers-october-2026/)
- [WordPress 7.1 responsive styles and configurable viewports](https://make.wordpress.org/core/2026/08/05/responsive-block-styles-and-configurable-viewports-in-wordpress-7-1/)
- [Responsive styles editor documentation](https://wordpress.org/documentation/article/responsive-styles/)
- [Public custom-control viewport helpers](https://github.com/WordPress/gutenberg/pull/82741)
- [Living theme.json reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)
- [WordPress 7.2 schedule](https://make.wordpress.org/core/7-2/)

The living schema includes Gutenberg capabilities beyond a specific Core release;
use target-version schemas and runtime verification for implementation acceptance.

## Local beta resumption October 26 2026

Implementation now uses the actual loaded site checkouts only. FlexLine work is
on wp-7.2-beta-fixes from release-2.2.2 at 75c31cb6; plugin work uses the same
branch name from each current main, merging back into main after acceptance.
Earlier remediation worktrees remain read-only. Local Core is 7.2-beta1, with
network-active Location Sync, Floor Plans and MyLifeSite extension. The main site
uses kingswood-child-theme; system and alpha use FlexLine directly.

Resume the approved breakpoint, simple-block shadow and preview work. Composite
map/floor-plan controls remain a separate review; do not migrate saved content.
The established tagged-runtime-ZIP CI is part of release acceptance, including
checksum verification and production-branch side effects. No push, tags, remote
workflow dispatch, publication, credentials or deployment changes are authorized.

### Scoped beta checkpoint

Breakpoint alignment, native-first shadow fallback, 13 simple block metadata flags,
preview wrapper isolation and directory REST schema agreement are implemented. See
[release progress](RELEASE_IMPLEMENTATION_PLAN.md#26-october--scoped-wordpress-72-beta1-acceptance)
for exact local checks, fixtures, package limitations and release gates. Existing
legacy classes/attributes are retained without resaving old content. Composite map
and floor-plan outer controls, automated migration, remaining platform changes and
final certification remain deferred.

## Current checkpoint — October 30, 2026

The earlier beta pause and branch descriptions are historical. Tokens are now
in release-2.2.2 via PR #583; admin docs use token examples and retain all unrelated
help, while runtime shortcodes/aliases remain compatible. See the current release
progress record for editor evidence, the token-inclusive verified CI artifact and
the fresh read-only KSES comparison. Both known Core KSES failures persist; token
adoption does not silently repair existing shortcode-example content. No bulk
resave, Core patch or composite map/floor-plan control expansion is introduced.
The remaining RC/stable, device, installed-artifact recovery and Canary gates must
pass before a broad 7.2 compatibility claim.
