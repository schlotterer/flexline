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
