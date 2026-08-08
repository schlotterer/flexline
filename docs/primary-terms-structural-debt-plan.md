# Primary Terms Structural Debt Plan

## Summary

`inc/hooks/primary-terms.php` works today, but it has grown into a mixed-purpose
module that is hard to change safely. PHPCS is correctly flagging two structural
problems:

- The file contains both procedural hook functions and an object-oriented WP-CLI
  command class.
- The CLI class is not in a class-named file such as
  `class-primary-term-cli-command.php`.

The first refactor pass completed the highest-value structural step by moving
the WP-CLI command into `inc/hooks/primary-terms/class-primary-term-cli-command.php`.
The remaining procedural hook, sync, admin, REST/query, and helper split should
still happen incrementally after the new resolver contract tests are preserved.

## Primary-term ownership model

FlexLine should not be a two-way sync engine for SEO plugin metadata.

Resolved primary-term precedence is:

1. Valid Yoast primary-term meta.
2. Valid Rank Math primary-term meta.
3. Valid FlexLine canonical meta when it represents user-owned fallback state.
4. First assigned term as a seed for FlexLine's canonical cache.
5. No primary term.

Write policy:

- FlexLine may write `w4sl_primary_{taxonomy}` for its own breadcrumbs,
  permalink, REST, editor, and fallback consumers.
- FlexLine may write its own `w4sl_primary_{taxonomy}_ts_*` tracking metadata.
- FlexLine must not write, restore, or delete `_yoast_wpseo_primary_{taxonomy}`.
- FlexLine must not write, restore, or delete `rank_math_primary_{taxonomy}`.
- Yoast remains the priority for current client sites.

This is not only a style issue. The file owns registration, synchronization,
admin behavior, REST/query integration, helper logic, and CLI behavior in one
place. Those concerns likely share ordering assumptions and helper functions.
Refactoring without coverage could break term synchronization or editor/admin
behavior.

## Current responsibilities

The current primary terms module includes several separate responsibilities:

- Registering primary-term support and related hooks.
- Synchronizing selected primary terms when posts and taxonomy terms change.
- Handling term deletion, reassignment, and stale primary-term metadata.
- Rendering and saving admin/editor UI controls.
- Exposing primary-term data to REST/query consumers.
- Adjusting permalink/archive/query behavior where primary terms are involved.
- Providing WP-CLI commands for maintenance or synchronization.

## Risks

The risky parts are coupling and execution order:

- Hook callbacks may depend on helper functions declared later in the same file.
- Admin, REST, sync, and CLI flows may share assumptions about meta keys and
  taxonomy state.
- Moving the CLI class without preserving helper availability could break CLI
  commands.
- Renaming functions or changing file load order could break hooks registered by
  string callback.
- Primary-term sync can be affected by post save, term save, term deletion, and
  bulk import workflows.

## Refactor principles

Do not convert this into a broad cleanup without regression coverage.

When refactoring:

- Keep public function names, hook names, meta keys, and filters stable at first.
- Move one responsibility at a time.
- Preserve load order explicitly from a small bootstrap file.
- Add compatibility wrappers if a renamed internal function is unavoidable.
- Prefer small commits that can be tested independently.

## Proposed target structure

```text
inc/hooks/primary-terms/
  bootstrap.php
  registration.php
  sync.php
  admin.php
  rest.php
  query.php
  helpers.php
  class-primary-term-cli-command.php
```

Suggested ownership:

- `bootstrap.php`: load order and hook registration entry point.
- `registration.php`: taxonomy/post-type support declarations.
- `sync.php`: save, delete, reassignment, and cleanup behavior.
- `admin.php`: admin/editor UI rendering and save handling.
- `rest.php`: REST fields and API-facing primary-term data.
- `query.php`: permalink/archive/query integrations.
- `helpers.php`: shared pure-ish helpers for term/meta lookup.
- `class-primary-term-cli-command.php`: WP-CLI command class only.

## Implementation sequence

### 1. Add regression coverage or a manual acceptance harness

Before moving code, cover these scenarios:

- Saving a post with a selected primary term.
- Changing the post's assigned terms after a primary term is selected.
- Removing a term that is currently selected as primary.
- Reassigning or deleting taxonomy terms.
- Confirming primary-term REST output.
- Confirming admin/editor UI displays and saves expected values.
- Confirming any permalink/archive behavior affected by primary terms.
- Running existing WP-CLI primary-term commands.

### 2. Extract the CLI command class first

Move only the WP-CLI class into:

```text
inc/hooks/primary-terms/class-primary-term-cli-command.php
```

Keep the command registration behavior unchanged. If the class calls procedural
helpers, continue loading those helpers before the class.

Acceptance:

- PHPCS no longer reports the class-file-name error for `primary-terms.php`.
- CLI commands still register and run.
- No hook names or command names change.

### 3. Introduce a primary-terms bootstrap directory

Create `inc/hooks/primary-terms/bootstrap.php` and load the existing file from
there initially. Then move responsibilities into the directory incrementally.

Acceptance:

- Theme load order remains stable.
- All existing hooks still register once.

### 4. Split synchronization logic

Move save/delete/reassignment behavior into `sync.php`.

Acceptance:

- Post save sync still works.
- Term deletion/reassignment cleanup still works.
- Import/bulk update workflows do not duplicate or lose primary-term metadata.

### 5. Split admin/editor UI

Move admin metabox/sidebar/control behavior into `admin.php`.

Acceptance:

- Editor UI still shows current primary terms.
- Saving from the editor persists the expected meta.
- Invalid selections are rejected or normalized.

### 6. Split REST/query/permalink behavior

Move REST fields into `rest.php` and query/permalink behavior into `query.php`.

Acceptance:

- REST output stays backward compatible.
- Frontend URLs, archives, and query behavior remain unchanged.

### 7. Normalize helpers and internal naming

After the responsibilities are separated, consolidate helper functions into
`helpers.php`. Only then consider renaming internal helpers.

Acceptance:

- No public hooks, filters, settings, meta keys, or CLI command names change
  without a documented compatibility decision.

## Validation checklist

- `php -l` on every changed PHP file.
- Branch-scoped PHPCS on every changed primary-term file.
- Existing build/lint gates that are relevant to the release branch.
- Manual editor save test for a post with primary terms.
- Manual term deletion/reassignment test.
- REST response check for a post with and without a primary term.
- CLI command smoke test.
- Frontend archive/permalink smoke test where primary terms affect output.

## Deferred decision

Full cleanup of `inc/hooks/primary-terms.php` is deferred until the above
coverage/acceptance checks exist. Until then, release branches should avoid
large structural edits to this file unless they are directly required for a
confirmed bug fix.
