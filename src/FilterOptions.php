<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\WordPress\Hook\HookProviderInterface;

use function add_filter;
use function array_key_exists;

final class FilterOptions implements HookProviderInterface
{
    /**
     * @param array<string, string> $options
     */
    public function __construct(private readonly array $options)
    {
    }

    public function addHooks(): void
    {
        add_filter('tribe_get_single_option', [$this, 'updateOption'], 10, 3);
    }

    public function updateOption(mixed $option, mixed $default, string $optionName): mixed
    {
        if (array_key_exists($optionName, $this->options)) {
            return $this->options[$optionName];
        }

        return $option;
    }
}
