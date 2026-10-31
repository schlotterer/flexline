# FlexLine 2.2.2 acceptance — 30 October 2026

Historical status for the original 30 October ZIP: native installation/recovery
passed, with two responsive observations recorded below. On 31 October the admin
stacking issue was fixed and tested in the working tree; the owner clarified that
the content-filled proportion stress case is outside its intended decorative use.
See the [31 October follow-up](mobile-presets-2.2.2-2026-10-31.md) for current
results and the fresh-package requirement. No release was published.

## Artifact and environment

- Integration branch: `release-2.2.2`, runtime source commit
  `9cacf20666151096a6cb3d6b5ab7d51e9f67a4eb`.
- Exact hosted CI artifact: `flexline-2.2.2.zip`, 333 runtime files.
- SHA256: `eff2ea69605269f9c1589a5cb10772602375383c2f3d1a12661b9d9162def70f`.
- Hosted CI run: `41099792397`; publication/production jobs skipped.
- Disposable Linux Docker WordPress, PHP 8.2.35, MySQL 8.0, official WordPress
  7.2 Beta 2. All 3,516 checked Core files matched the official archive; generated
  configuration and wp-content were excluded from this comparison.
- Core archive SHA256:
  `b1e1257fb208b6a399a457182f20d96726f2812ff003eadeb60bb9232f623e81`.
- Independent database and synthetic content/media/presets only. No real site
  files, database, credentials or user uploads were mounted into the canary.
  Existing Local content and presets were not resaved by these tests.
- Canary is confined to localhost at `http://127.0.0.1:63188`; its WordPress/DB
  containers use an internal network. Outbound PHP HTTP/mail are blocked.
  Expected blocked Core update-check warnings are not a successful remote
  connectivity/Health test. No theme fatal error was observed in exercised paths.

## Section Shapes results

| Check | Result |
| --- | --- |
| Top, bottom, both edges and whole masks | Matching mode classes and active CSS masks in the final ZIP |
| Both-to-top and whole-to-top | Changed and saved in the visual editor; reopened top-only controls; saved bottom/whole selections and overlap values retained |
| Whole fill/proportion, wide/tall SVGs | Masks and viewBox ratios applied; proportion sizing has the narrow-layout finding below |
| Default/constrained/wide/full Groups | Masked rendering exercised; desktop widths followed the selected layout |
| Row, Stack and Grid Group variations | Shapes render and retain the layout; these are supported, as current feature documentation says |
| Nested Cover, 48px padding, content growth | Cover content and all seven growth paragraphs retained; fill-mode block grows with content |
| Content Shift explicit zero | Top shift remains 0px and overrides top frame overlap; bottom overlap remains active |
| Content Shift per edge | Active top/bottom shifts remain -24px; only the matching frame overlap is suppressed |
| Mobile reset | At 781px, the reset top shift yields to frame overlap; at 782px the -24px Content Shift remains active |
| Synced pattern save/reopen | Disposable wp_block 12 changed from QA Wide proportion to QA Wide fill, saved with “Pattern updated”, reopened with saved selection and no invalid-block notice |
| Site Editor save/reopen | Disposable wp_template 13 changed to QA Wide fill, saved with “Template updated”, reopened with saved selection and no invalid-block notice |
| Delete all presets | Removed all seven synthetic rows and saved through the admin form; a database read confirmed an empty array. Restored only the synthetic preset snapshot before recovery tests |
| Unavailable whole SVG | Live warning says the SVG cannot render and the preset remains saved; affected frontend content renders without a mask |
| Chrome responsive widths | 1440, 992, 991, 782, 781 and 390px geometry recorded; two failures below |
| Desktop Safari, iPhone, iPad | Owner reported checks complete in this chat; browser versions and exact device/build/URL evidence were not captured by automation |
| Android | Untested: owner has no additional devices available |

Safari automation twice timed out despite Safari being running; owner performed
that browser check. Physical checks above are owner-reported, not inferred from
Chrome viewport emulation. Temporary Chrome viewport overrides were reset.

The old checklist sentence saying Row/Stack/Grid suspend shapes contradicted the
current implementation and website article. The acceptance expectation is now
support for these Group variations, rather than introducing a new restriction.

## Findings on the original 30 October ZIP (see 31 October follow-up)

1. **Whole proportion masks can force horizontal overflow on narrow containers.**
   With a 4:1 SVG and a 311px content container at a 390px viewport, a proportion
   Group with no padding/minimum height stays 311px wide. Adding 48px padding
   makes it 384px wide; setting Core minimum height to 180px makes it 720px wide.
   The same SVG in fill mode with that minimum height stays 311px wide. The page
   scroll width becomes 752px. This was reproduced on a separate disposable page
   using Core's actual `style.dimensions.minHeight`, not just the matrix's test
   minimum height. Proportion mode currently sets aspect-ratio without a sizing
   constraint in `src/scss/shared/blocks/_section-frames.scss:56`.
   Any fix must preserve wide/full alignment, explicit author sizing, content
   growth, nested layouts and editor/frontend parity; do not blindly constrain
   every Group to its parent's content width.
2. **Section Shapes admin preset table overflows at 390px.** The table measures
   approximately 750px and makes the document approximately 760px wide, with
   visible overflow on its parent. This is page-level horizontal overflow, not a
   contained table scroller. Preserve five-column desktop organization, inactive
   input disabling, media controls and action accessibility when fixing the narrow
   layout. Relevant owned code: `inc/theme-options/theme-page.php` and
   `inc/theme-options/render-theme-frames.php:245`.

No runtime fix was included in this testing pass. The results apply to the exact
ZIP above; a changed runtime needs a new build and appropriate repeated checks.

## Native ZIP recovery

The previous GitHub 2.2.1 release has no attached runtime ZIP. Used its original,
unmodified downloadable GitHub source ZIP, SHA256
`0cecba00154123ad05414d9c8e785e3352f7e65e30aea52e9e4a30d2def71cdf`.
Its original theme header says 2.2.0. This is not asserted to be a backup of any
hosted installation. The native upgrader source-selection hook normalizes the
GitHub archive root to `flexline`; archive bytes are unchanged.

Used WordPress Theme_Upgrader with overwrite_package, followed by explicit theme
activation; no direct replacement of the installed theme directory:

1. Original prior archive installed and activated before the candidate.
2. Candidate installed; new matrix/template/pattern/content/options created.
3. Prior archive restored; all 548 installed files matched its archive exactly.
4. Candidate reinstalled; all 333 files matched exactly, with no old source files.
5. Created published page 25 and changed the recovery setting after that upgrade.
6. Prior archive restored again; the newer page, all captured posts, non-editor-lock
   postmeta and tested options remained intact. The newer page rendered in the
   browser while the prior theme was active.
7. Candidate reinstalled again; all 333 files matched and the same captured newer
   data remained intact. Canary remains on 2.2.2.

No database restore was used. Raw snapshots are retained. Explicit switch_theme
refreshes `theme_mods_flexline.sidebars_widgets.time`; that single Core timestamp
was excluded from the exact data comparison. Widget assignments and all other
captured values were compared without normalization. This does not claim every
unexamined database table is unchanged.

Linux restored both historical case-only Montserrat aliases from the prior ZIP.
The final candidate restored only the canonical uppercase WOFF2. Consequently,
this native installer result does **not** certify Fleet rollback: the historical
source archive still has the known case ambiguity and is not a Fleet runtime
package. Retain/test the actual target recovery package and delivery adapter
before a hosted deployment; never restore an old database over newer content.

## Retained evidence

Parent Local workspace: `diagnostics/flexline-222-acceptance-20261030/`.
Includes original prior ZIP, canary metadata/setup, fixture IDs, Core comparison,
UI AX/DOM receipts/screenshots, responsive geometry, raw data/file snapshots,
per-install archive comparisons and recovery scripts/results.
The exact candidate ZIP remains under the theme's ignored
`.release-output/hosted-final-token-docs-9cacf206/` directory.

Review fixtures: matrix `/?page_id=10`, newer recovery content `/?page_id=25`,
isolated sizing reproduction `/?page_id=26` on the localhost canary above.
The canary remains available for review; no new Git checkout/worktree was created.

This closes the listed installation and UI exercises with the findings recorded;
it is not general WordPress 7.2 certification, Android coverage, target-specific
Canary Health, installed SEO integration or a newer beta/RC compatibility result.
