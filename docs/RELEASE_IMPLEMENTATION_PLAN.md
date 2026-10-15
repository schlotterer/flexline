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
- [ ] Run available local checks and inspect a clean runtime ZIP.
- [ ] Validate GitHub workflow syntax and release refusal cases.
- [ ] Record test commands/results and any unresolved blockers below.
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

Pending implementation verification. Compilation/lint alone does not prove live
upgrade/recovery or Canary acceptance. No publication, live site deployment,
credential setup or DFG reconfiguration is authorized by this document.

Shared action pin: `75a8b70eb28bc57888ac8ed3bc47a0be22a8d634`. This commit is local until the shared
repository is pushed/reviewed; publish it before callers can run on GitHub.
