# FlexLine release action

Public FlexLine cannot load an action from the private `schlotterer/web4sl-ci`
repository. This local copy needs no cross-repository credentials and leaves
private-plugin callers on their existing shared action.

`UPSTREAM.json` records the reviewed upstream commit and SHA256 of the unchanged
composite action, two runtime scripts and two upstream test files. No shared
internal documentation, repository history or old branch-publisher scaffold is
included. The action uses Python's standard library, PHP and Composer; the caller
sets up the existing Node/PHP/Composer versions for builds.

Build checks run with read-only repository permissions. The publish and production
jobs check out the exact event SHA with persisted credentials disabled before
loading this action; only those tag-push jobs receive their repository-scoped
write token. PR/main/release-branch/manual previews cannot publish or promote.
Tag builds still require matching versions and main ancestry. Production consumes
the exact verified published ZIP, retains prior runtime history, and refuses
unmanaged baselines, stale versions, tag drift and concurrent writes. Existing
data recovery and separately approved Canary/deployment gates still apply.

The theme's explicit `release-package.json` runtime allowlist excludes `.github`;
these build scripts, fixtures and provenance files must never enter the theme ZIP.

Run the complete local suite from the theme root:

```sh
python3 -B -m unittest discover -s .github/actions/runtime-package/scripts -p 'test_*.py' -v
```

For maintenance, review an explicit new upstream commit, compare only the five
files recorded in `UPSTREAM.json`, port all five together and update their hashes
and the expected commit in `test_local_workflow.py`. Review any intentional local
deviation explicitly rather than silently changing the copied runtime logic.
Run upstream refusal/production tests, local workflow tests, workflow validation
and FlexLine's declared package checks; inspect a new preview ZIP for exact
runtime membership, checksums, fonts and Composer production dependencies.
Never copy upstream docs/history or change private-plugin workflows as part of
this maintenance. Branch previews are the first hosted verification step; creating
a version tag can publish a release and push the DFG production branch and needs
its own authorization.
