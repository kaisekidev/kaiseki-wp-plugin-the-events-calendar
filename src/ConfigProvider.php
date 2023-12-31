<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'hook' => [
                'provider' => [],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    DefaultTemplate::class => DefaultTemplateFactory::class,
                    DisableBlockRenderingInFrontend::class => DisableBlockRenderingInFrontendFactory::class,
                    FilterOptions::class => FilterOptionsFactory::class,
                ],
            ],
        ];
    }
}
