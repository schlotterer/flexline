# Managed package release instructions

Read README and docs/RELEASE_IMPLEMENTATION_PLAN.md before release work; update
that progress record with commands, results and unresolved acceptance gates.
Preserve other agents' changes and the active Local site checkout.

Preserve backward compatibility for schema/data/options, public interfaces and
package dependencies where practical. Every release must demonstrate safe prior-ZIP
rollback or document/test additional recovery steps and data-loss limits. Prefer
additive migrations. Never assume code rollback reverses data changes or restore
an old database over newer content automatically. Declare dependency versions and
upgrade/rollback order. Retain exact artifacts and actual installation recovery
points, and verify the relevant Canary Health/visual checks before broader rollout.

Build from version tags on commits reachable from main, not moving feature branches.
Use release-package.json and the pinned shared action. Preserve runtime assets,
fonts and dependencies; exclude source-only build inputs and dev dependencies.
Do not delete tracked builds while existing DFG consumers require them. Child themes
keep their existing revert-main/redeploy process; MyLifeSite Location Sync is excluded.
Site deployments and credentials require their own exact approval.
