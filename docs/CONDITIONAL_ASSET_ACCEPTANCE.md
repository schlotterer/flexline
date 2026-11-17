# Phase 5 acceptance record — local checks, rollout held

Work remains on `codex/conditional-css-plan`. This is **partial acceptance**, not
permission to enable conditional delivery by default or deploy to client sites.
The production opt-in policy is unchanged. No active Local/client installation
was modified. Package installation, content writes and recovery occurred only in
disposable Docker WordPress installations.

## Verified package/environment record

Exact commits, ZIP SHA256s, file counts, package-gate results, external asset sizes
and mixed-version results are in `CONDITIONAL_ASSET_ACCEPTANCE.json`.
All three repositories were fetched; main had no commits missing from these branches.

- FlexLine runtime: `766ef0ab` plus the earlier Phase 2–4 work; preview version remains
  2.2.9 and is distinguished from released 2.2.9 by commit and ZIP hash.
- Location Sync: `a1b9423`, based on main `2cbcbad`; candidate 1.1.4.
- Advanced Floor Plans: `607074e`, based on main `8745c80`; candidate 1.0.1.
- Platform dependency: retained released Web4SL 1.2.6 ZIP. Location Sync correctly
  refused activation without it; the fixture was then corrected.
- Installed combined stack: WordPress 7.1.4 / PHP 8.2.35 / MySQL 8.0.46.
- Minimum-version theme probe: official WordPress 6.5.7 / PHP 8.2.35.
- Location Sync PHP suite: official WordPress 6.8.0 tests, separate disposable DB,
  host PHP 8.2.29. 71 tests / 247 assertions passed.

The package tool was the repository/shared pinned implementation; its SHA256 matches
FlexLine's vendored copy and the plugin workflow's shared pin. `build --execute`
passed for every final artifact. FlexLine also passed 66 JS tests, 48 PHPUnit tests /
180 assertions, 28 component delivery contracts, and 1,297 full/split CSS declarations.
Location Sync passed 14 JS tests. Floor Plans passed two JS tests. Both plugins'
additive metadata PHP contracts passed and are now required package checks; Floor
Plans' lifecycle JS tests are now a package gate too.

## Regression found and fixed

WordPress 6.5 did not apply Plain Text's custom theme.json variation defaults. The
Phase 4 candidate therefore displayed a filled button with 12px/16px padding.
`button-compat.css` now loads only before WordPress 6.6, through both frontend and
editor style pipelines. It matches Core 6.5's block specificity without `!important`,
retains inline overrides, and restores transparent background and zero padding.
Browser verification on 6.5.7 passed. Newer WordPress continues to use editable
variation defaults; no compatibility sheet is enqueued there. The new file is a
required package artifact. Tests cover both sides of the version boundary.

## Acceptance matrix status

| Scenario | Evidence/status |
| --- | --- |
| Plain, slider, scroller, both | Installed HTTP pages deliver the expected feature unions. Plain has no feature runtimes. Exact request/byte lists retained. |
| Location cards and later results | Real REST-backed cards render; subsequent results initialize; card slider Next changes the active slide. |
| Map popover | Expanding a cluster then opening Maple fetches the configured scroller pattern. Its Next control changes scroll position. |
| Floor-plan detail selection | Selecting Maple replaces Cedar; the cloned slider's Next control works. |
| Floor-plan media | 3D/2D controls work before and after changing the selected floor plan. Synthetic attachments only. |
| Conservative fallback | Floor Plans with the dynamic media-toggle pattern reports `dynamic-pattern-output` and retains complete CSS/runtimes. This is expected safety behavior, not an optimization success. |
| Mixed versions/recovery | All four released/candidate theme/plugin combinations render cards/pages. Metadata appears only with candidate theme + candidate plugins. Seeded content/meta checksums remain identical across all four swaps. |
| Concurrent/stale/failure/retry | Phase 3 JS contract tests pass in package verification. Dedicated HTTP failure-injection/browser acceptance remains open. |
| Pattern graph/cache/site isolation | Phase 2 contract coverage retained; full page/optimizer cache integration remains open. |
| Buttons | Phase 4 modern-Core default/global/variation/child/individual fixtures retained; minimum-version regression fixed and retested here. |
| Real post/Site Editor previews | **Partially verified.** Native Chrome loads the actual candidate post-editor canvas, including Floor Plans content/media tabs and scroller controls. Blank canvas is isolated to in-app browser blob navigation (see diagnosis below). Shipped hero/timeline patterns render without validation warnings; hero Next and draft save pass, timeline Next changes visible columns. Site Editor and full interaction coverage remain open. |
| Mobile resize, comparison/filter variants, modal opening | Full interaction matrix remains open. Do not infer passes from related slider/media checks. |
| Brice Pointe and representative client canary | Not deployed; no candidate client-site acceptance claimed. |

A fixture initially used plain permalinks, causing the map client to receive HTML
at its REST URL. Configuring normal pretty permalinks resolved that setup issue;
subsequent REST/map checks passed. The fixture seed now applies this configuration.

## Measured external theme assets

Identity encoding, same local server and unique external theme CSS/JS requests.
These numbers exclude inline CSS, fonts, Core/plugin assets, rendering time and
production compression/cache effects. They are not whole-page performance claims.

| Page | Conditional requests / bytes | Complete requests / bytes |
| --- | ---: | ---: |
| Plain | 4 / 74,577 | 8 / 169,378 |
| Slider | 6 / 100,579 | 8 / 169,378 |
| Scroller | 6 / 131,048 | 8 / 169,378 |
| Both | 8 / 157,050 | 8 / 169,378 |
| Location patterns | 11 / 177,198 | 9 / 178,513 |
| Floor-plan dynamic media | 9 / 178,513 | 9 / 178,513 |

The plain page saves 94,801 bytes and four requests. Location patterns add requests
for only a small byte reduction; dynamic Floor Plans currently save nothing. This
supports keeping rollout controlled until the remaining matrix is complete.

## Recovery and cache requirements

Retained released ZIPs: FlexLine 2.2.9, Location Sync 1.1.4, Floor Plans 1.0.1.
All four combinations were tested against the same expanded synthetic content,
including media references. No database restore was used. This proves scoped
code rollback/content preservation, not complete client installation recovery.

Direct ZIP copies initially exposed stale PHP opcode cache across swaps. Because
file-copy testing bypasses WordPress Upgrader's invalidation, the final mixed-version
script restarts the disposable PHP container before every probe. All four then pass.
Any deployment/recovery adapter must invalidate PHP opcode caches and relevant page,
object and optimized-asset caches. Page/CDN/optimizer purges remain a client gate.

Prefer additive plugin support before theme rollout. Keep complete-bundle delivery
available. Do not enable the production default until real editor, remaining UI,
cache/optimizer, supported-version and authorized canary checks are complete.

## Evidence and reproduction

Workspace evidence: `diagnostics/conditional-assets-phase5-20261117` contains the
three final package directories, release receipts, HTTP inventory, all mixed-version
results, fixture IDs and browser screenshots. Screenshots show synthetic local sites.

Reusable guarded fixture helpers live in `tests/fixtures/conditional-assets/`.
The PHP helpers refuse databases outside the named disposable environment. Use the
retained ZIPs and separate test databases; never point these at a client database.
`mixed-versions.py <evidence-directory>` expects extracted `staging`, `prior-staging`
and the named disposable container. `http-matrix.py <evidence-directory>` measures
its six synthetic routes. The final runtime packages passed all required local gates;
GitHub package/CodeQL checks still require PR execution.

## Blank editor diagnosis — 2026-11-17

The in-app browser aborts the editor's `blob:` document navigation with
`net::ERR_ABORTED`; the iframe remains `about:blank`, without a captured JavaScript
exception. A standalone control page (no WordPress/theme/plugin code) reproduces
this: ordinary same-origin HTTP and `srcdoc` iframes render, but a Blob URL does not.
The identical three controls all render in installed native Google Chrome.

Native Chrome also renders the actual candidate WordPress post editor: the Floor
Plans block shows Cedar/Maple/Oak/Willow, panel content and 3D/2D tabs. The combined
fixture shows horizontal-scroll controls, but Gutenberg reports invalid Group
markup for its hand-authored slider. These observations establish canvas loading,
not a full interaction pass. Correct/regenerate that editor fixture and verify
slider insertion, selection, preview, save/reload and Site Editor next.

No production code or browser security setting was changed for this diagnosis.
Use native Chrome for real editor acceptance; do not add a theme workaround for
the in-app browser. Reproduction controls are retained in
`tests/fixtures/conditional-assets/editor-iframe-probe.html` and
`editor-iframe-http.html`; serve both together over HTTP. Local diagnostic evidence
is under `diagnostics/conditional-assets-editor-20261117`. This closes the unknown
blank-canvas cause, not the remaining Phase 5 release gates.

### Follow-up using shipped patterns

At the user's direction, editor acceptance now uses unmodified registered
`flexline/hero-slider` and `flexline/section-timeline-columns` content, seeded as
separate disposable drafts by `seed-editor-patterns.php` (IDs 24 and 25 in this run).
Both load without the hand-authored fixture's invalid-block warning. Hero Next
changes visible slide content and draft save reports success. Timeline renders
its controls and Next changes the visible column set. Screenshots:
`shipped-hero-editor.png` and `shipped-timeline-editor.png` in the diagnostic folder.
The old minimal fixtures remain for reproducible frontend byte/rollback comparisons;
they are not the source of truth for editor validation. Save/reload persistence,
editing/insertion variants and Site Editor still require full acceptance.
