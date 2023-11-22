<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

use function in_array;
use function is_array;
use function is_string;
use function str_starts_with;

final class DisableBlockRenderingInFrontend implements HookCallbackProviderInterface
{
    /**
     * @param bool|list<string> $config
     */
    public function __construct(private readonly bool|array|null $config)
    {
    }

    public function registerHookCallbacks(): void
    {
        if ($this->config !== true && !is_array($this->config)) {
            return;
        }
        add_filter('render_block', [$this, 'disableBlockRendering'], 10, 2);
    }

    /**
     * @param string               $blockContent
     * @param array<string, mixed> $block
     */
    public function disableBlockRendering(string $blockContent, array $block): string
    {
        if (
            !isset($block['blockName'])
            || !is_string($block['blockName'])
            || str_starts_with($block['blockName'], 'tribe/')
        ) {
            return $blockContent;
        }

        if ($this->config === true) {
            return '';
        }

        if (is_array($this->config) && in_array($block['blockName'], $this->config, true)) {
            return '';
        }

        return $blockContent;
    }
}
