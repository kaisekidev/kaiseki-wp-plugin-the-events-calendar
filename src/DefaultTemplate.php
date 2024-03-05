<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\WordPress\Hook\HookProviderInterface;

use function add_filter;

final class DefaultTemplate implements HookProviderInterface
{
    /**
     * @param list<array{0: string, 1?: array<string, mixed>}> $defaultTemplate
     */
    public function __construct(
        private readonly array $defaultTemplate,
    ) {
    }

    public function addHooks(): void
    {
        add_filter('tribe_events_editor_default_template', [$this, 'updateDefaultBlocks']);
    }

    /**
     * @return list<array{0: string, 1?: array<string, mixed>}>
     */
    public function updateDefaultBlocks(): array
    {
        return $this->defaultTemplate;
    }
}
