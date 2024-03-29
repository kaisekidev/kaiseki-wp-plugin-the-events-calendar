<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class FilterOptionsFactory
{
    public function __invoke(ContainerInterface $container): FilterOptions
    {
        $config = Config::fromContainer($container);
        /** @var array<string, string> $options */
        $options = $config->array('the_events_calendar.options');

        return new FilterOptions($options);
    }
}
