<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use function function_exists;

final class Plugin
{
    public const NAME = 'the-events-calendar/the-events-calendar.php';
    public const PRO_NAME = 'events-calendar-pro/events-calendar-pro.php';

    public static function isActive(): bool
    {
        if (!function_exists('is_plugin_active')) {
            return false;
        }
        return is_plugin_active(self::NAME);
    }

    public static function isProActive(): bool
    {
        if (!function_exists('is_plugin_active')) {
            return false;
        }
        return is_plugin_active(self::PRO_NAME);
    }
}
