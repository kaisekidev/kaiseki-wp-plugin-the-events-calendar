<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class DefaultTemplateFactory
{
    public function __invoke(ContainerInterface $container): DefaultTemplate
    {
        $config = Config::get($container);
        /** @var array<mixed>|null $defaultBlocks */
        $defaultBlocks = $config->get('the_events_calendar/default_blocks', null, true);
        /** @var list<string>|null $removeBlocks */
        $removeBlocks = $config->get('the_events_calendar/remove_default_blocks', null, true);
        return new DefaultTemplate($defaultBlocks, $removeBlocks);
    }
}
