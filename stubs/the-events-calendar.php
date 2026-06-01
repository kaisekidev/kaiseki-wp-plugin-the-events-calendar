<?php

/**
 * PHPStan stub for The Events Calendar.
 *
 * The plugin is scanned via `scanDirectories`, but `tribe_is_past_event()` is
 * defined with an untyped `$event = null` parameter and no docblock, so PHPStan
 * infers its parameter type as `null` and rejects the post id we pass. This stub
 * gives it the correct signature (it accepts an event/post id, or null for the
 * current event) and takes precedence over the scanned definition.
 */

/**
 * @param int|null $event
 */
function tribe_is_past_event(?int $event = null): bool {}
