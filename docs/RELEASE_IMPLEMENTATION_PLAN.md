# flexline release implementation plan

## Scope and starting point

Repository: `schlotterer/flexline`. Implementation branch:
`codex/tagged-package-releases`, isolated under `mylifesite2026/release-worktrees`.
Starting commit: `6ae660c3e1c499a77e842803d7ced9be7d91e772`. This is a local source checkpoint,
not an accepted release. Existing feature work must merge/rebase into main before
release tags are created. Feature branches may be named for intended versions;
only **vMAJOR.MINOR.PATCH tags on commits reachable from main** publish candidates.

Feature branch release-2.2.2 is WIP. Owner intends final v2.2.2 after merge to main. Align package/composer versions to header only in this isolated branch. Compile with npm run build, never npm run production (auto-fixes source). Retain REM fonts referenced by theme.json and SVG sanitizer runtime dependency. Existing child-theme rendering remains in Canary scope; child-theme workflows do not change.

## Implementation sequence and progress

- [x] Inspect existing build, dependency locks, runtime paths and tests.
- [x] Define `release-package.json` runtime allowlist, checks and recovery metadata.
- [x] Add pinned shared packaging action and repository release workflow.
- [x] Run available local checks and inspect a clean runtime ZIP.
- [x] Validate GitHub workflow syntax and release refusal cases.
- [x] Record test commands/results and any unresolved blockers below.
- [ ] Review/merge shared CI first, then this repository's implementation PR.
- [ ] Run GitHub CI at the merged main commit (no publication for main pushes).
- [ ] Owner creates version tag; verify candidate ZIP/checksums/metadata assets.
- [ ] Separately authorized upgrade/recovery and Canary Health/visual acceptance.

## Files and build contract

`release-package.json` is the authoritative package-specific allowlist and exact
check command list. PHP/runtime source remains in the ZIP; source-only JS/SCSS,
tests, CI, docs and development dependencies do not. Each ZIP has one `flexline/`
root, preserving installed identity. Required block assets and explicit required
files fail closed when missing. Runtime third-party source under vendor is needed.
Do not remove tracked build files while DFG branch consumers depend on them.

Run preview packaging through the pinned `web4sl-ci` action or locally:

```sh
python3 /path/to/web4sl-ci/scripts/package_release.py build --execute --root "$PWD" --output /new/private/output
python3 /path/to/web4sl-ci/scripts/package_release.py verify --output /new/private/output
```

The output directory must not exist. Without `--tag`, output is a non-publishable
preview. CI release builds resolve the tag, require exact version/commit and main
ancestry, run checks/build once, then generate ZIP, SHA256SUMS and release.json.
Publishing occurs in a separate write-scoped job, downloads/verifies the built
assets and refuses existing releases instead of overwriting. No site secrets,
DFG calls, branch deployments or WordPress writes belong to this workflow.

## Compatibility and recovery rule

Preserve backward compatibility for stored schema/data/options and public APIs
where practical. Prefer additive migrations so the previous supported package can
run against updated data. Otherwise document/test the additional recovery route,
including irreversible changes and data-loss limits. Code rollback does not undo
data changes. Never automatically restore an older database over newer content.
Declare supported dependency versions and upgrade/recovery ordering. Retain exact
current/prior approved ZIPs and each installation's actual recovery package.

## Verification record and next handoff

Local build/package verification is complete; see RELEASE_VERIFICATION.json.
Compilation/lint alone does not prove live
upgrade/recovery or Canary acceptance. No publication, live site deployment,
credential setup or DFG reconfiguration is authorized by this document.

Shared action pin: `e8f8566927ab16213c425dfee4a4809a6be4f0c0`. This commit is local until the shared
repository is pushed/reviewed; publish it before callers can run on GitHub.

### Completed local verification

- Complete `package_release.py build --execute` returned zero.
- Package checks: 48 PHPUnit tests / 180 assertions, primary-terms contract, JS/CSS lint and production build.
- ZIP validated: 437 runtime files; SHA256 `27bed56fd980bf1fb1f7e46475d4ea0e50c8b0040face211eed5d3751ef9d575`.
- Installed/activated the ZIP in a fresh WordPress 6.8 synthetic fixture with
  outbound HTTP blocked; all six packages loaded together on a subsequent boot.
- Fixture MySQL containers were removed and absence confirmed.
- New workflow passed actionlint 1.7.7; shared tool has 21 passing refusal and
  mocked-publication tests. Shellcheck/pyflakes were not installed for actionlint.
- Node 22.19.0 and PHP 8.2.29 were used locally. CI's declared PHP lane still
  needs its own GitHub run. No active Local installation or child theme changed.

Exact source/artifact/environment evidence is in `RELEASE_VERIFICATION.json`.
Local ZIPs/checksums/metadata are in ignored `.release-output/`; these are previews,
not published releases. The full real-package builds used shared tooling a6367e1;
the final pin adds only build-receipt/publication guards, covered by 21 tool tests.
The preview bytes remain verified; final tagged GitHub builds will rebuild from
the merged source and use the final pin.

### Remaining acceptance and handoff

1. Review/push the shared CI branch/commit, confirm private Actions access, then
   review this repository branch. No remote branch or release was created here.
2. Merge/rebase the feature work into main before creating a release tag. The
   local implementation branch is a preparation branch, not the final release.
3. Execute GitHub CI and verify its runner/dependency/permission behavior. Mocked
   publisher tests do not prove actual GitHub release upload or immutability.
4. Test the actual previous-version upgrade and recovery with synthetic stored
   data, declared dependency bounds and the exact deployment adapter. Fresh ZIP
   activation does not establish downgrade safety or production compatibility.
5. Separately authorize the exact Canary package/target, then run existing Health
   and visual checks before broader rollout. No automatic deployment is wired.

The 2.2.2 header was already present. Only isolated package/composer metadata and
lock metadata were aligned to the owner's intended v2.2.2; no tag was created,
and the active release-2.2.2 work-in-progress checkout was not changed.

### Additional local review and recovery verification

- [x] Review runtime manifests and preserve existing branch consumers.
- [x] Reject moved/ambiguous remote tags before draft creation and publication;
  resolve lightweight and annotated tag objects in the exact tags namespace.
  Shared tooling now has **26 passing tests**, with no real GitHub mutations.
- [x] Exercise historical snapshot → candidate → historical snapshot on disposable
  WordPress 6.8 single-site and multisite, observing main and child data.
- [x] Preserve synthetic content created both before and after upgrade, plus
  package-specific native settings (Health token, Site Ops off-consent/key hash,
  floor-plan setting, Location Sync setting, theme mods, or GA4 settings).
- [x] Remove/confirm absence of the synthetic database container.

Historical baseline: `f06da6597f65d5b43224e5d7f5ffeff5710e31f5` (header 2.2.0).
Source: Reconstructed from locally available Git-tracked runtime files; not a retained or production-verified release artifact. No rebuild or old metadata rewrite.
Readiness: **partial-filesystem-proof**. Reconstructed Git runtime snapshot, not retained production bytes; seeded settings/content coverage only. Exact installed recovery artifact and full functional/Canary acceptance remain unverified. Historical tag 2.2.1 declares header 2.2.0. Mac case-insensitive extraction collapses two identical Montserrat font aliases; Linux static extraction verifies all 407 files, but full Linux WordPress downgrade remains untested.

Five plugin cases reproduced the exact baseline and candidate file manifests.
FlexLine's historical font-case alias limitation is documented separately;
settings/content preservation must not be confused with complete file proof.
For Campaign Manager, the database value stays encrypted through recovery, but
the legacy bridge cannot interpret it. Reinstalling the candidate restores secret
interpretation in both topologies; that forward recovery does not make legacy
downgrade compatible. No credential algorithm or stored production data changed.

See `RECOVERY_VERIFICATION.json` for case-level evidence. Local reconstructed
recovery ZIP/provenance is retained in ignored `.recovery-output/`, alongside
previous `.release-output/` preview bytes (not overwritten). The previews' old
release metadata predates these new readiness annotations; future tagged builds
will include the current `release-package.json` compatibility limits.

**Next action:** review/push shared tooling first, then callers and GitHub CI.
Before deployment acceptance, obtain exact retained/installed baseline artifacts
and validate broader functionality/activation/dependency scopes and Canary pages.
Campaign Manager additionally needs a compatible legacy recovery package or
owner-selected recovery policy; do not invent an unsafe reverse secret migration.

### Morning review decision ready

Implementation checkpoint is ready for Joel's review. See [HISTORICAL_RELEASE_CLARIFICATION.md](HISTORICAL_RELEASE_CLARIFICATION.md)
for exact source evidence, practical options and the approvals/decisions needed.
This note changes no storage/runtime/deployment behavior.

## 16 October — Node 24 build verification

Build runtime pinned to Node 24.19.0 in workflows and `.nvmrc`; relevant JavaScript
actions now pin verified Node-24 releases. Composer is pinned to 2.10.3 and the
runner label to Ubuntu 24.04. Existing package/PHP requirements, release controls,
shared action pin, runtime allowlists and installed package versions are preserved.
A full isolated build and ZIP checksum/file verification passed using Node
24.19.0, Composer 2.10.3 and local PHP 8.2.29. No active Local checkout was used for compilation or dependency installation.

See `NODE24_BUILD_VERIFICATION.json` for snapshot identity, action pins, artifacts
and results. These are local proofs; Ubuntu/GitHub execution of the updated
workflows remains unverified. No source/runtime dependency upgrades, version tags,
GitHub publication, live deployment or changes to existing recovery gates occurred.

GitHub currently has only the old shared CI `main`; Web4SL's tagged packaging run
38902050611 failed during job setup because shared action commit
`e8f8566927ab16213c425dfee4a4809a6be4f0c0` is unavailable remotely. Push/review
the prepared shared implementation first, then callers. Preserve existing tags;
version changes and a new candidate tag remain owner-led release steps.

## 16 October — tagged production branch wiring

Owner confirmed the intended DFG path: tag → one verified ZIP → published release
→ production branch, not ZIP publication alone. All three shared-action steps pin
`1f74bb9a8bedeebf8744c394c37edb66b3c7ae17` on shared branch `codex/tagged-production-branch`.
Push/review shared code first and preserve that commit when merging, then callers.

The tag-only production job depends on successful release publication, downloads
the same artifact and has a separate contents-write token and per-repository
concurrency group. Preview/main builds cannot update production. Git uses normal
fast-forward pushes and preserves prior runtime trees; stale releases, same-version
byte changes, unmanaged baselines and races are refused. No runtime/schema/data,
site branch, webhook or credential was changed. Existing recovery gates remain.

All six real runtime trees and branch archives were verified against their ZIP
file hashes; actual DFG 1.0.13 installed each twice on disposable WordPress 6.8
multisite, retaining seeded option/post data and removing obsolete files. The
shared suite passed 43 tests. API guards were mocked; actual private GitHub token
push, branch protections and webhook delivery still need remote/staging acceptance.
Activation/migrations and real-site Health/visual/recovery checks remain separate.
See PRODUCTION_BRANCH_VERIFICATION.json and the shared verification receipt.

## 26 October — scoped WordPress 7.2-beta1 acceptance

Work was performed in the loaded `mylifesite2026/app/public` checkouts, on local
`wp-7.2-beta-fixes` branches. No additional checkout/worktree was created. Old
remediation worktrees remain untouched. No push, tag, remote workflow, publication,
version bump or deployment was performed.

Local Core: 7.2-beta1. Build runtime: Node 24.19.0 / CLI PHP 8.2.29; Local web
runtime: PHP 8.2.27. The local main-site pattern and alpha draft page exercised
native spacing, borders and text shadow alongside legacy controls. Draft fixtures
are labeled `WP 7.2 beta acceptance draft 2026-10-26`: main-site wp_block 121765,
alpha page 5281, and the initial unsupported-context system wp_block 1382. Location
Sync intentionally registers blocks on the main site only; the system fixture's
unsupported blocks are not a beta regression. Existing published content and
options were not rewritten. MyLifeSite Location Sync remained network-active.

Local runtime packages are preview artifacts under workspace
`diagnostics/wp72-beta-20261026/packages/`; the established
`web4sl-ci/scripts/package_release.py build` and `verify` paths are used, without
`--execute` or a tag. They are not publishable releases (`checks_passed: false`),
and checksums/file validation must not be represented as full CI acceptance.
Local shared packaging/refusal suite: 43 tests passed. Map, media and composite
floor-plan runtime build files remain unchanged; outer controls are deferred.

No schema/data migration or automatic resave is introduced. Code rollback means
reinstalling the exact retained pre-update package; never restore an older DB over
new content. New native text-shadow settings require supporting Core. Full stable
Core/minimum-version regression, retained installed-artifact recovery, beta/RC
retesting and production Canary acceptance remain release gates. Browser warnings
about existing iframe styles and third-party deprecations were observed, so this
is scoped acceptance, not a claim of a warning-free editor or complete WP 7.2
platform certification.

FlexLine: configured mobile/tablet maxima 781.98px/991.98px to match SCSS. Native
text shadows (including explicit none/presets) override the zero-specificity legacy
fallback; inline child shadows remain. Existing visibility option/default and
legacy classes stay intact. Declared the existing four directory layout attributes
server-side for the four Location blocks already extended by FlexLine: Core's SSR
sanitizer restores client defaults, which otherwise fail REST schema validation.
This adds no new controls or saved-data migration. Other block schemas are untouched.

Checks: production build, JS/SCSS lint, PHPUnit 48 tests/180 assertions,
`php tests/primary-terms-resolver-contract.php` (9 cases),
`php tests/directory-preview-schema-contract.php`, and
`WP_CORE_DIR=/absolute/path/to/app/public php tests/viewport-core-contract.php`
passed. The viewport contract uses installed Core, without a DB. Browser checks
at 390/781/782/900/991/992/1325px confirmed 7/11/23px native responsive padding and
existing visibility classes. Mobile/tablet editor canvases reflected 781/991px.
Fractional legacy boundary gaps are documented in the remediation plan.

The existing package workflow now also covers release-2.2.2 pushes/PRs. YAML and
branch/tag-only publication guard checks passed; actual GitHub execution is still
unverified. Tags must be reachable from main. Publishing a tag can subsequently
update the production branch and trigger DFG consumers; that action remains
separately authorized. Shared action pin and runtime package identity are retained.

## 26 October — canonical Montserrat package path

Joel reported that staging2 Fleet verification rejects the two Git-tracked font
paths differing only by capitalization. Removed the lowercase tracked duplicate
from release-2.2.2, retaining `assets/fonts/Montserrat/Montserrat-VariableFont_wght.woff2`.
Both original Git entries have blob f690491158b57f323c5ddc4204edcf986ea18707;
the retained font SHA256 remains
`3fb1102ae9faef4750889284dff01cc4d1933873dbe98582ab5d28062a3bff91`.
The Mac working file was normalized to the canonical spelling, with the index
change limited to deletion of the lowercase alias. Added the exact canonical
path to release-package.json required files so packaging refuses a missing or
incorrectly cased canonical font. Current runtime source references already use
that spelling; no references, font bytes, versions or database content changed.

Checks passed: Git index and local preview ZIP have no case-fold path collisions;
ZIP contains the uppercase path only with the original SHA256; source search
found no lowercase font reference in runtime code. Established shared
`package_release.py build` and `verify` succeeded using cached locked Composer
runtime dependencies with network disabled. Preflight evidence is in workspace
`diagnostics/wp72-beta-20261026/packages/font-case-preflight/`; committed preview
is retained separately under `font-case-final/`. These previews retain
`checks_passed: false`; no full CI rerun or Fleet integration pass is claimed.

Historical tags/archives and prior recovery evidence are unchanged. Restoring a
historical ZIP can reintroduce the collision and be rejected by Fleet; select and
verify an exact supported recovery artifact before rollout. Before removing the
alias on a case-sensitive hosted site, separately approve the concrete correction
and check saved/custom references plus font loading there. Joel reports the
approved staging2 diagnostic is installed and MCP/Health verified; that is not
approval to modify its theme. No push, tag, publication or hosted change occurred.


## 27 October — public FlexLine uses a repository-local release action

The hosted release-2.2.2 preview failed before build setup because public FlexLine
cannot resolve the private shared action. The shared commit is already published;
private-plugin callers continue to use it. FlexLine now uses
`.github/actions/runtime-package`, copied byte-for-byte from reviewed upstream
`1f74bb9a8bedeebf8744c394c37edb66b3c7ae17`. The copy contains only the composite
action, packaging/production scripts and their refusal tests. `UPSTREAM.json`
records exact hashes; its README describes the review/parity update procedure.
No upstream internal docs, history or old branch publisher were copied.

All three release jobs use the local action. Publish and production first check
out `${{ github.sha }}` with credentials persistence disabled, then download the
same-run artifact. They retain tag-push-only conditions and scoped write tokens;
build/PR/branch/manual previews remain read-only. Existing manifest, exact-byte
verification, tag/version/main ancestry, publication refusal and production
history/race/recovery guards are unchanged. The explicit runtime allowlist and
`.github` exclusion keep this tooling out of the installable theme ZIP.

Local verification on clean starting HEAD 8fc6441f57ad178705af795ea753fafc57fcc2cc:

- All five upstream files exactly match the reviewed Git commit and recorded hashes.
- 48 release-tool tests passed: 43 upstream tests plus five local action/workflow
  tests, including actual composite Bash execution and write-job checkout guards.
  Production tests use disposable local bare Git remotes; GitHub APIs are mocked.
- Ruby/Psych parsed both workflow/action YAML files; `git diff --check` passed.
  `actionlint` was unavailable locally; hosted runner semantics remain to verify.
- Node 24.19.0 JS/SCSS lint passed. PHPUnit: 48 tests / 180 assertions. Primary-term
  contract: 9 cases; directory-schema and installed-Core viewport contracts passed.
- Production compilation passed in a disposable source snapshot with existing
  Node dependencies; the active theme's compiled assets were not overwritten.
  The snapshot block-extensions bundle differs in webpack module numbering/order;
  AST-based comparison confirmed the same module bodies and bootstrap after ID
  normalization. This is not a claim of reproducing committed build bytes.
- Composer 2.10.3 with cached locked runtime dependencies and networking disabled
  built/verified separate local-action and unchanged-upstream previews. Both ZIPs
  and metadata are identical: 333 runtime files, ZIP SHA256
  `f95ebc6d4ca74cffe9dbcfaa987d4cd9c3e978ad1a64d913fb535ffb1f328df0`.
  No case-fold collisions or local tooling; canonical Montserrat and SVG sanitizer
  runtime dependencies remain. These previews use current committed runtime
  assets, `checks_passed: false` and no tag; they cannot be published.

The first package attempt used an unavailable default Composer cache and failed
with networking disabled. Repeating with the existing cached locked dependency
and Composer 2.10.3 succeeded; no dependency/lockfile update was needed.

No push, tag, release, production branch/site update, credential/access setting or
private shared/plugin repository change occurred. No runtime source or tracked
compiled asset was changed. Next: review/commit this local diff, then explicitly
authorize pushing release-2.2.2 for a hosted preview. Verify complete runner
checks and resulting artifact; publication/production must stay skipped. Merge to
main and any version tag/DFG promotion remain separately approved release steps.

## 30 October — release readiness and hosted CI verification

release-2.2.2 is clean at ebf5738b before this checkpoint. The GitHub preview
40508011617 succeeded: local-action tests, lint/PHP contracts, production build
and artifact upload passed; publish and production were skipped as required.
Downloaded the actual runtime-package artifact and verified it with the vendored
package_release.py. Provenance matches ebf5738b1020897f4d488efa2599521c84289111,
checks_passed true, tag null; ZIP SHA256 is
f95ebc6d4ca74cffe9dbcfaa987d4cd9c3e978ad1a64d913fb535ffb1f328df0.
All 26 referenced WOFF2 paths exist, canonical Montserrat is retained, case-fold
collisions are absent, and .github action tooling is excluded from the ZIP.
Downloaded evidence is retained in ignored .release-output/hosted-40508011617/.

The existing JavaScript suite passed locally on Node 24.19.0: two suites, 21 tests.
Added that existing command and the standalone directory-preview-schema contract
to release-package.json checks so hosted release builds enforce them. No runtime
source/assets, dependencies, saved content or Core files changed for this work.
The Core viewport contract still requires a separately installed supporting Core;
this release CI does not establish WordPress 7.2 compatibility.

2.2.2 includes Section Shapes, runtime-package CI, font cleanup, native-first
text-shadow fallback and viewport alignment. The remaining 7.2 platform audit and
KSES upstream issues are separate from this release. Device/UI/recovery gates in
docs/releases/pr-notes-2.2.2.md remain explicit limitations; do not label them passed.
Before the final tag, resolve whether ZIP publication should stay coupled to the
DFG production job or be split like Web4SL 1.2.2. Publication/production has not
been triggered by this readiness checkpoint.

Remote push of the added test gates was refused by automatic approval review,
which cited the owner's earlier no-push instruction. The command was rejected
before execution; no remote mutation occurred. Preserve the local commit and
obtain explicit approval before pushing the release branch or opening its PR.
No workaround, version tag, publication or production update was attempted.

## 30 October — authoring tokens (outside the 2.2.2 release branch)

Owner approved a separate token-authoring enhancement. Created local
`feature/authoring-tokens` from clean release-2.2.2 at 8b091faa in the existing
Local theme checkout. release-2.2.2 and PR #582 are untouched; no new worktree.

Added named copyright options and `{{!flexline_name}}` literal examples while
retaining existing tokens, shortcodes and the administrative theme-docs helper.
Supported title/SEO/excerpt/Text/Block widget contexts resolve before typography.
A capability check delegates to a supporting Web4SL version; standalone FlexLine
and older Web4SL APIs retain the theme's token-only fallback. Literal output is
protected from ancestor rendering and subsequent shortcode passes. Admin Utilities
docs favor tokens with a collapsed legacy reference. No saved page is rewritten.

Integration tests run against official 7.2 Beta 2 with database writes blocked,
using both KSES parsers and Web4SL active/absent. They cover default/parameterized
rendering, context hooks, nested literal examples and malformed options. WPCS
checks the changed runtime PHP. A PHP-rendered static documentation preview was
visually inspected. Evidence is in diagnostics/kses-issue-followup-20261030 in
the parent Local site. Prior committed renderer comparisons demonstrate unchanged
existing output and literal display of new syntax on rollback. No package install
or hosted Canary/recovery acceptance is claimed by these source-level checks.

No version/dependency/asset change, content save, database migration, Core change,
commit, push, PR modification, tag, publication or production promotion. README
records that old packages display new expressions unchanged: review newer usages
before a rollback; never restore an older database automatically. Editor insertion,
actual SEO integration and target-site package/Canary acceptance remain gates.
This enhancement does not resolve Core KSES defects or establish 7.2 certification.

Final local results: 126 Web4SL assertions, 78 FlexLine assertions with Web4SL
active and 79 with it absent, plus 16 comparisons against prior committed PHP.
Changed runtime PHP syntax, FlexLine WPCS and both Git diff whitespace checks pass.
Web4SL's two Health contracts and publication-workflow contract pass. All content
probes used the write-blocked isolated Beta 2 runtime; no existing content was saved.

## 30 October — editor acceptance and local commit preparation

Owner authorized editor testing without resaving existing content, followed by
local commits in both repos, with no push. Created only one new disposable page,
ID 121771, on the main Local site; it remains an unpublished draft for review.
No existing post, page, pattern, template or settings form was opened for saving.
The browser preview reports active Core 7.2-beta3; Core was not updated here.
This UI result is separate from the checksum-verified isolated Beta 2 contracts.

Inserted fixtures via the code editor, switched to the visual editor, edited the
native Button label and URL through its actual controls, saved the new draft,
previewed it and reopened it. Blocks retained their syntax without validation or
recovery notices. Both namespaces, default/site/page values, year ranges, full
phone/contact HTML and the legacy shortcode rendered as expected. Four nested
Code examples stayed literal, including dynamic-field syntax and a shortcode
inside token text. Unsupported options stayed uninterpreted. A read-only check
verified seven saved-fixture properties, including draft status and raw tokens.

Core's Button URL control rejected a bare phone href token. The accepted authoring
form is `/{{web4sl_phone_href}}`; Web4SL now unwraps only that exact complete href
attribute before resolving the token. Ordinary paths/data attributes/text remain
unchanged. Raw HTML's original bare href form remains supported. Documentation
explains the editor form and rollback limit: older Web4SL would retain the extra
slash before the phone URL. No Core or editor-vendor JavaScript was patched.

The updated Beta 2 Web4SL contract passed 131 assertions, including both KSES
parsers and the exact URL wrapper. FlexLine's unchanged runtime contract has 78
assertions with Web4SL and 79 without it; prior-code comparisons have 16 checks.
Evidence in the parent Local site's diagnostics/kses-issue-followup-20261030:
token-editor-visual.png, token-editor-preview.png, token-editor-reopened.txt,
token-editor-roundtrip.json and updated authoring-tokens-integration.log.

This closes editor insertion/save/reopen/preview acceptance for these fixtures.
Installed SEO integration, target-specific Canary and exact prior-ZIP installation
recovery remain separate gates; no broad 7.2 certification is claimed. No existing
content migration, Core change, release version/tag, publication, DFG promotion
or remote push was performed. The CI release branches/PR remain unchanged.
