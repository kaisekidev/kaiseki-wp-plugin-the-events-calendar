<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class PluginOptionsFactory
{
    public function __invoke(ContainerInterface $container): PluginOptions
    {
        $config = Config::get($container);
        /** @var array<string, string> $options */
        $options = $config->get('the_events_calendar/options', []);
        return new PluginOptions($options);
    }
}
