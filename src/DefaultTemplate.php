<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

use function array_column;
use function array_search;
use function array_splice;
use function is_array;
use function is_int;

final class DefaultTemplate implements HookCallbackProviderInterface
{
    /**
     * @param array<mixed>|null $defaultBlocks
     * @param array<string>|null $removeBlocks
     */
    public function __construct(
        private readonly ?array $defaultBlocks,
        private readonly ?array $removeBlocks
    ) {
    }

    public function registerHookCallbacks(): void
    {
        add_filter('tribe_events_editor_default_template', [$this, 'updateDefaultBlocks']);
    }

    /**
     * @param array<mixed> $blocks
     *
     * @return array<mixed>
     */
    public function updateDefaultBlocks(array $blocks): array
    {
        if (is_array($this->defaultBlocks)) {
            return $this->defaultBlocks;
        }
        if (!is_array($this->removeBlocks)) {
            return $blocks;
        }
        foreach ($this->removeBlocks as $name) {
            $blocks = $this->removeFromBlock($name, $blocks);
        }
        return $blocks;
    }

    /**
     * @param string $name
     * @param array<mixed>  $blocks
     *
     * @return array<mixed>
     */
    private function removeFromBlock(string $name, array $blocks): array
    {
        $names = array_column($blocks, 0);
        $index = array_search($name, $names, true);

        if (!is_int($index)) {
            return $blocks;
        }

        array_splice(
            $blocks,
            $index,
            1
        );

        return $blocks;
    }
}
