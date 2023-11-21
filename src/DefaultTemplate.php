<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

final class DefaultTemplate implements HookCallbackProviderInterface
{
    /**
     * @param list<array{0: string, 1?: array<string, mixed>}> $defaultTemplate
     */
    public function __construct(
        private readonly array $defaultTemplate,
    ) {
    }

    public function registerHookCallbacks(): void
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
