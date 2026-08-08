# FlexLine Deferred Refactors Plan

## Summary

This document captures known structural and tooling work intentionally deferred from the FlexLine 2.2.1 reliability release. These items should be handled as focused follow-up branches with their own validation gates.

The deferred work is:

- migrate FlexLine SCSS from Sass `@import` to `@use`;
- measure and split vendor CSS only when visual regression coverage and payload data justify it;
- refactor `inc/hooks/primary-terms.php` test-first into focused modules.

## 1. Sass `@import` to `@use` migration

### Current state

FlexLine SCSS still uses Sass `@import` internally. This is intentional for 2.2.1 because migrating the full SCSS tree to `@use` changes variable, mixin, and namespace scoping behavior.

### Risk

A mechanical `@import` to `@use` replacement can silently change compiled CSS if:

- shared variables are no longer global;
- mixins require namespace prefixes;
- import order previously controlled cascade or variable overrides;
- duplicate partial inclusion currently affects output;
- editor and frontend bundles rely on the same global partial side effects.

### Execution plan

1. Capture a production CSS baseline:
   - run `npm run production`;
   - save generated CSS file sizes and hashes;
   - capture representative frontend and editor screenshots.
2. Inventory all SCSS entrypoints and partial dependencies.
3. Group partials by purpose:
   - tokens/settings;
   - mixins/functions;
   - base/global styles;
   - block styles;
   - editor-only styles;
   - vendor/plugin overrides.
4. Convert low-risk mixin/function partials first.
5. Convert shared token partials with explicit `@forward` modules.
6. Convert entrypoints one at a time.
7. Compare compiled CSS after each step.
8. Run visual smoke tests across:
   - header variants;
   - buttons;
   - modals;
   - sliders;
   - forms;
   - directory/floor-plan patterns;
   - editor iframe rendering.

### Acceptance criteria

- `npm run production` succeeds without new Sass warnings from FlexLine source.
- Compiled CSS differences are understood and intentional.
- Frontend and editor visual smoke tests pass.
- Any required namespace conventions are documented in `docs/coding-standards.md`.

## 2. Vendor CSS splitting

### Current state

Vendor CSS splitting remains deferred. The release does not split vendor styles because file-size reduction alone is not enough justification; the change needs measured frontend behavior and visual regression coverage.

### Risk

Splitting vendor CSS can introduce regressions when:

- blocks depend on vendor/plugin CSS being present earlier than expected;
- editor and frontend enqueue order diverge;
- async/deferred loading creates flashes of unstyled content;
- pages using sliders, modals, forms, maps, or accordions need styles before JavaScript initialization;
- cached pages retain old handles or stale built assets.

### Execution plan

1. Establish baseline metrics:
   - total CSS payload by template type;
   - render-blocking CSS;
   - LCP/CLS in representative pages;
   - cache behavior with WP Rocket/SiteGround optimizations.
2. Inventory CSS by source:
   - FlexLine app/editor bundles;
   - third-party vendor styles;
   - plugin styles;
   - block-specific styles;
   - inline WordPress style-engine output.
3. Identify candidates for conditional enqueueing.
4. Add visual regression coverage before changing enqueue behavior.
5. Split only one candidate group at a time.
6. Validate with cache cleared and cache warm.

### Acceptance criteria

- Measurable payload or render improvement is documented.
- No frontend visual regressions in representative templates.
- No editor iframe style regressions.
- No slider/modal/form/map initialization regressions.
- Enqueue conditions are documented and covered by smoke tests.

## 3. Primary terms structural refactor

### Current state

`inc/hooks/primary-terms.php` remains structurally dense. It mixes resolver logic, synchronization, admin behavior, REST behavior, query helpers, and WP-CLI handling in one file.

The intended source-of-truth model is:

1. Yoast primary term wins when present and valid.
2. Rank Math primary term is supported when present and valid.
3. FlexLine/Web4SL primary term metadata remains fallback/compatibility data.
4. FlexLine must not overwrite Yoast or Rank Math metadata.

### Risk

This file touches taxonomy behavior that can affect breadcrumbs, related content, admin UI, REST output, and client content expectations. A broad refactor without tests could change client behavior silently.

### Execution plan

1. Write focused resolver tests before moving code:
   - valid Yoast primary wins;
   - invalid Yoast primary is ignored;
   - valid Rank Math primary is used when Yoast is absent/invalid;
   - FlexLine fallback is used only when plugin primary values are unavailable or invalid;
   - stale fallback values are ignored;
   - REST/query/CLI helpers use the same resolver.
2. Introduce one central resolver with source metadata:
   - `yoast`;
   - `rank_math`;
   - `flexline`;
   - `none`.
3. Split the file mechanically after tests are green:
   - `bootstrap.php`;
   - `registration.php`;
   - `resolver.php`;
   - `sync.php`;
   - `admin.php`;
   - `rest.php`;
   - `query.php`;
   - `helpers.php`;
   - `class-primary-term-cli-command.php`.
4. Preserve public helper names where templates or plugins may call them.
5. Run branch-scoped PHPCS after the split.
6. Document the new module boundaries.

### Acceptance criteria

- Yoast remains authoritative for current client sites.
- Rank Math support remains compatible.
- FlexLine fallback metadata remains readable.
- No migration modifies Yoast or Rank Math metadata.
- Resolver behavior is covered by automated tests.
- Admin, REST, query, and CLI paths agree on resolved term/source.
- Touched files pass branch-scoped PHPCS.

## Release sequencing

Recommended order:

1. Primary terms refactor, because it has the highest behavior risk and already has a written execution plan.
2. Sass `@use` migration, because it affects build architecture and compiled output.
3. Vendor CSS splitting, because it should be driven by measurement and visual regression coverage.

Each item should be a separate branch/PR.
