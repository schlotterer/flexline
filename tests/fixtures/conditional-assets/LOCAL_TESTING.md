# Existing-pattern Phase 5 regression setup

These helpers are test-only and excluded from runtime ZIPs. Never copy the preview
adapter to a client installation. `local-preview.php` refuses anything except Local
`mylifesite2026.test`, blog 5 (`/testing/`). The owner authorized that subsite.

The current setup retains the subsite's `oconnor-woods-child-theme` and saved styles.
The shared parent checkout remains unchanged on its archived recovery branch.

## Local paths

- MU adapter: `wp-content/mu-plugins/flexline-phase5-testing.php` (copy of local-preview.php).
- `mu-plugins/flexline-phase5-source/flexline` is a symlink to the existing
  `release-worktrees/flexline-button-underline` branch worktree.
- The same directory has an `oconnor-woods-child-theme` symlink to the original child.
- `mu-plugins/flexline-phase5-release/flexline` contains the retained exact released
  v2.2.9 ZIP, with a child-theme symlink alongside it. `?phase5_release=1` selects
  this baseline for a request; normal requests use the branch.
- Candidate plugin ZIPs are extracted beneath `plugins/phase5-candidates/`.
  Only blog 5's in-memory network-plugin list substitutes those paths.
- Theme root/parent directory/URI filters ensure PHP, theme.json, patterns and
  built assets resolve to the selected copy. No stored activation option changes.
- `?complete=1` selects complete CSS. The default in this local adapter is conditional.
- Explicit `phase5-*` routes bypass this test site's pre-existing primary-term
  catch-all rule. Refresh blog 5's rewrite rules after installing/removing the adapter.

Build in the branch worktree with Node 24.19.0: `npm run build`. Do not run the
production autofix script. Restore unrelated generated changes only after review.

## Fixtures and evidence

Run `seed-local-demos.php` via `wp eval-file` with `--url=http://mylifesite2026.test/testing/`.
It creates the ten existing docs demo references and a `phase5-regression` index,
retaining IDs in `flexline_phase5_demo_pages` / `flexline_phase5_demo_index`.
It does not overwrite existing pages on repeat runs. Capture JSON as `demo-pages.json`.
Run `check-local-demos.py <evidence-directory>` to check both delivery modes and
retain response bodies and actual stylesheet/script inventories (not preload hints).

`seed-local-floorplans.php` creates two synthetic floor plans and grouping terms,
using existing local image attachments and the plugin's shipped card/detail patterns.
It records IDs in `flexline_phase5_floorplan_fixture` and is idempotent.

Location Sync's runtime is main-site-only. Use `seed-location-variants.php` in the
existing disposable single-site container, not by changing the Local plugin policy.
The supported pagination attribute value is `paginated`; comparison also needs the
global `web4sl_enable_comparison` option enabled.

`late-pattern-response.php` is a disposable REST-only probe. Start a Location Map
page at `/phase5-late-pattern/` with `flexline/hero-slider` as card, popover and
comparison patterns and `listNavigationMode: paginated`, two results per page.
Confirm the initial page is split and does not load scroller assets. Only after
initial load, set `phase5_late_scroller` to 1. This hook appends the existing Timeline
pattern to later authorized card responses and recomputes real asset metadata.
Block `component-horizontal-scroll.css` in the test tab, click pagination Next,
verify old content remains plus Retry, unblock and Retry, then verify exactly one
stylesheet/runtime/control set and a working Next control. Clear browser overrides
and set `phase5_late_scroller` back to 0 afterward. Do not publish this hook.

Actual editors require native Chrome in this environment: the in-app browser aborts
Blob iframe navigation independently of WordPress. Use the existing Hero Slider and
Timeline patterns for insertion/save tests, not the earlier minimal synthetic markup.

## Restore the authorized Local test site

Remove/disable only `flexline-phase5-testing.php`, then flush rewrite rules for
`/testing/`. Normal original theme/plugin paths immediately resume. No database
restore is needed. The new regression pages/records can remain for future tests;
if removing them, use the recorded IDs and WordPress Trash rather than broad deletes.
Preserve original child/theme/network-plugin options and unrelated content.

Release signoff still requires actual optimizer/CDN and authorized client canaries;
these helpers do not change the production opt-in policy.
