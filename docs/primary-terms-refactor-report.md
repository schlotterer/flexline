# Primary Terms Refactor Report

## Summary

This pass locked the primary-term ownership contract with focused tests and
removed the highest-risk structural issue by extracting the WP-CLI command class
from the mixed procedural hook file.

Yoast remains the priority primary-term source for current client sites. Rank
Math remains supported as a read-only compatibility source. FlexLine retains its
own canonical primary-term meta for breadcrumbs, permalinks, REST/editor state,
and sites without SEO-plugin primary-term ownership.

## Files changed

- `inc/hooks/primary-terms.php`
  - Added explicit resolver semantics for Yoast, Rank Math, FlexLine fallback,
    and first-assigned seeding.
  - Stopped mirroring FlexLine writes into Yoast/Rank Math primary-term meta.
  - Preserved hook callback signatures.
  - Loads the extracted WP-CLI command class when WP-CLI is available.
- `inc/hooks/primary-terms/class-primary-term-cli-command.php`
  - New class-named WP-CLI command file.
  - Keeps the existing `wp flexline primary-term backfill` command name.
  - Reports resolver statuses aligned to the new ownership model.
- `tests/primary-terms-resolver-contract.php`
  - New standalone focused contract test harness.
  - Uses WordPress function shims so resolver behavior can be verified without
    a full WordPress PHPUnit install.
- `package.json`
  - Added `npm run test:primary-terms`.
- `docs/primary-terms-structural-debt-plan.md`
  - Added the primary-term ownership model and write policy.
- `CHANGELOG.md`
  - Added release notes for the resolver tests, ownership policy, and CLI split.

## Behavior covered by tests

- Yoast wins over FlexLine fallback and updates only FlexLine canonical cache.
- Rank Math wins when Yoast has no valid assigned term.
- Invalid Yoast values fall back to FlexLine user-owned canonical meta.
- FlexLine canonical meta works when Yoast/Rank Math are absent.
- No explicit source seeds FlexLine canonical meta from the first assigned term.
- Stale/unassigned FlexLine fallback is reseeded from the first assigned term.
- FlexLine meta changes do not overwrite Yoast primary-term meta.
- SEO-owned canonical cache does not resurrect a deleted SEO-plugin primary term.
- Deleted Yoast primary-term events do not resurrect the previous cached value.

## Commands run

```bash
php -l inc/hooks/primary-terms.php
php -l inc/hooks/primary-terms/class-primary-term-cli-command.php
php -l tests/primary-terms-resolver-contract.php
npm run test:primary-terms
vendor/bin/phpcs --standard=phpcs.xml inc/hooks/primary-terms.php inc/hooks/primary-terms/class-primary-term-cli-command.php tests/primary-terms-resolver-contract.php
```

All listed commands passed.

`npm` reported that it could not write a debug log under the user-level npm log
directory because of sandbox permissions. The test itself completed and passed.

## Remaining tech debt

The WP-CLI class has been extracted. The remaining procedural responsibilities
in `inc/hooks/primary-terms.php` should still be split incrementally into:

- registration;
- synchronization;
- admin/editor UI;
- REST/query/permalink behavior;
- shared helpers.

That remaining split should be mechanical and covered by the new resolver
contract tests plus manual editor/CLI validation.

## Manual validation still recommended

- With Yoast active, set a primary category and confirm breadcrumbs/permalinks
  use the Yoast value.
- Confirm `w4sl_primary_category` updates as FlexLine's cache while Yoast meta
  remains unchanged.
- Delete the Yoast primary term and confirm FlexLine does not restore Yoast meta.
- Disable Yoast/Rank Math and confirm FlexLine primary-term fields still save
  and drive breadcrumbs/permalinks.
- Run `wp flexline primary-term backfill --dry-run --report=table` on a local
  site and confirm statuses match the new labels.
