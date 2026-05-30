# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.1 - 2026-05-30

### What's Changed

* ci: add automated changelog workflow by @wolfgangschaefer in https://github.com/kaisekidev/kaiseki-string-filter/pull/2

**Full Changelog**: https://github.com/kaisekidev/kaiseki-string-filter/compare/1.0.0...1.0.1

## 1.0.0 - 2026-05-29

First tagged release.

### Added

- `StringFilterInterface` and `StringFilterPipeline` for composing string transformations.
- Built-in filters: `PregReplaceStringFilter`, `RemoveDanglingColon`, and double-bracket unwrappers
  for `<< >>`, `{{ }}`, `(( ))`, and `[[ ]]`.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11, composer-require-checker 4) and depend on
  `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config; CI runs via the reusable
  workflow in `kaisekidev/.github`. Dropped the redundant direct `friendsofphp/php-cs-fixer` dev dependency.
