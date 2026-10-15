# FlexLine: exact historical discrepancy and Linux CI scope

Status: implementation checkpoint ready for Joel's review. Read-only/source and
documentation clarification; no tag was moved or published and no fonts were
renamed/deleted. See RECOVERY_VERIFICATION.json for the existing fixture evidence.

## Tag/header mismatch

Existing local tag **`2.2.1`** resolves to commit
`f06da6597f65d5b43224e5d7f5ffeff5710e31f5`. At that exact revision:

- `style.css:13` declares `Version: 2.2.0`.
- `package.json:3` declares version `2.2.0`.
- `composer.json:4` declares version `2.2.0`.

The reconstructed historical ZIP therefore reports header version 2.2.0; it is
not proven to be the bytes of an installed production 2.2.1 release. Retain the
old tag unchanged. The prepared candidate aligns these declarations at 2.2.2,
matching Joel's intended final **`v2.2.2`** tag after feature work merges into main.
The active `release-2.2.2` feature checkout was not altered by release-tooling work.

## Filename case discrepancy

That historical tree contains both:

- `assets/fonts/Montserrat/Montserrat-VariableFont_wght.woff2`
- `assets/fonts/Montserrat/montserrat-variablefont_wght.woff2`

Both blobs have SHA256
`3fb1102ae9faef4750889284dff01cc4d1933873dbe98582ab5d28062a3bff91`.
They are identical bytes with different path casing. A case-insensitive Mac
filesystem cannot retain both as separate files. Exact historical path-manifest
comparison failed in the Mac WordPress recovery fixture, although seeded content
and theme settings survived. Isolated Linux extraction verified **all 407**
historical runtime files, including both aliases. This is static Linux archive
proof, not a full Linux WordPress upgrade/downgrade test.

The current tracked font tree also retains the two path spellings; do not delete
or rename a compatibility path by assumption. Local Mac preview ZIP contents may
therefore differ from a fresh Linux checkout's path set. Fleet rollout must pin
and distribute the single final Linux-produced ZIP/digest, not rebuild per site
or equate platform-specific preview archives.

## What existing Linux CI can prove after an approved push

The prepared [.github/workflows/release.yml](../.github/workflows/release.yml)
already runs on **ubuntu-24.04** and calls the pinned shared packaging action.
For the new candidate it will:

1. Run configured lint/unit/contract checks and the production build.
2. Assemble runtime files from the Linux checkout, retain fonts/runtime Composer
   dependencies, and verify the ZIP's path membership and per-file checksums.
3. On a version-tag run, reject a header/package/tag mismatch, wrong checkout or
   commit outside main; the publisher rechecks the exact remote tag namespace.

A push of only the isolated feature branch does **not** trigger this new workflow:
its push branch filter is main. Open an approved PR targeting main to run preview
checks, or use manual dispatch after the workflow is available as required by
GitHub. A main push produces a preview; a `v*` tag push can publish a candidate.
Do not create a tag just to obtain a build-only check.

Existing CI does **not** automatically fetch/reinstall historical tag 2.2.1,
validate actual production baseline bytes, or run a WordPress/database downgrade
fixture. Its archive checks do not flag identical case aliases as invalid on Linux;
Linux can retain both. No new historical-recovery CI service was added. The next
Linux PR/preview run can verify the candidate's real Linux package and manifest;
full Linux WordPress recovery and actual baseline provenance remain explicit
acceptance work.

## Precise next approvals/decisions

- Review/push `schlotterer/web4sl-ci` and the six caller implementation branches,
  preserving their pinned shared commit and confirming private Actions access.
  Create review PRs so the Linux checks can run without release publication.
- Confirm which retained artifact/commit is the actual intended historical
  recovery point; the mismatched old tag alone cannot establish that identity.
- After acceptance, explicitly authorize a concrete release/tag and exact Canary
  target. Do not rewrite old tags, normalize font paths or deploy from WIP branches
  as part of the documentation checkpoint.

No additional local scaffold is required before Joel reviews this handoff.
