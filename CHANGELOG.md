# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-06-01

First tagged release.

### Added

- Helpers for The Events Calendar: `EntityUtils\Event` / `Venue` / `Organizer` / `Schedule` read
  utilities, and the `DefaultTemplate`, `DisableBlockRenderingInFrontend` and `FilterOptions` hook
  providers wired by `ConfigProvider` from the `the_events_calendar` config key.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target); `thecodingmachine/safe` pinned to `^2.0`.
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11 schema, composer-require-checker 4) and depends
  on `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config (the scanned The Events Calendar
  plugin is kept via `scanDirectories`); `kaiseki/config` and `kaiseki/wp-hook` pinned to `^2.0`. CI now
  runs via the reusable workflow in `kaisekidev/.github`.

### Fixed

- PHPStan 2 (level max): removed the `@phpstan-ignore` lines in `EntityUtils\Event` — `title()` passes
  `0` (the WordPress "current post" default) so the id is never null, and `isPastEvent()` is given a
  correct `tribe_is_past_event()` signature via a `stubFiles` stub (the plugin defines it untyped) plus a
  strict `=== true` on the result. No behaviour change.
