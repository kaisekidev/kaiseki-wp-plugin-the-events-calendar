<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\TheEventsCalendar\EntityUtils;

use Safe\DateTimeImmutable;
use Tribe\Utils\Date_I18n_Immutable;

use function get_the_title;
use function tribe_get_cost;
use function tribe_get_gcal_link;
use function tribe_get_single_ical_link;
use function tribe_is_past_event;

final class Event
{
    public function __construct(private readonly ?int $postId = null)
    {
    }

    public function title(?int $postId = null): string
    {
        // @phpstan-ignore-next-line
        return get_the_title($postId ?? $this->postId);
    }

    public function isPastEvent(?int $postId = null): bool
    {
        // @phpstan-ignore-next-line
        return tribe_is_past_event($postId ?? $this->postId);
    }

    public function cost(?int $postId = null): string
    {
        return tribe_get_cost($postId ?? $this->postId);
    }

    public function formattedCost(?int $postId = null): string
    {
        return tribe_get_cost($postId ?? $this->postId, true);
    }

    public function getIcalLink(?int $postId = null): string
    {
        return tribe_get_single_ical_link($postId ?? $this->postId);
    }

    public function getGoogleCalLink(?int $postId = null): string
    {
        return tribe_get_gcal_link($postId ?? $this->postId);
    }

    public function getDateI18nMutable(DateTimeImmutable $date, ?int $postId = null): Date_I18n_Immutable
    {
        return (new Date_I18n_Immutable())
            ->setTimestamp($date->getTimestamp())
            ->setTimezone($date->getTimezone());
    }
}
