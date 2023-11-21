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
        /** @var list<array{0: string, 1?: array<string, mixed>}> $defaultTemplate */
        $defaultTemplate = $config->array('the_events_calendar/default_template');
        return new DefaultTemplate($defaultTemplate);
    }
}
