<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class DisableBlockRenderingInFrontendFactory
{
    public function __invoke(ContainerInterface $container): DisableBlockRenderingInFrontend
    {
        $config = Config::fromContainer($container);
        /** @var bool|list<string> $option */
        $option = $config->get('the_events_calendar.disable_block_rendering');

        return new DisableBlockRenderingInFrontend($option);
    }
}
