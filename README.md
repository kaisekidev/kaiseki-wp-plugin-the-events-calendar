# kaiseki/wp-plugin-the-events-calendar

WordPress helpers for The Events Calendar plugin: event/venue/organizer entity utilities, default-template and option filters.

Provides small read helpers around the plugin's data (`Event`, `Venue`, `Organizer`, `Schedule`) plus
hook providers — wired through `ConfigProvider` and the `the_events_calendar` config key — to set the
default event template, override plugin options, and optionally disable front-end block rendering.

## Installation

```bash
composer require kaiseki/wp-plugin-the-events-calendar
```

Requires PHP 8.2 or newer. Expects The Events Calendar plugin to be active at runtime.

## Usage

Register `ConfigProvider` with your laminas-style config aggregator and configure the
`the_events_calendar` key, activating the providers you want via `kaiseki/wp-hook`:

```php
use Kaiseki\WordPress\TheEventsCalendar\DefaultTemplate;
use Kaiseki\WordPress\TheEventsCalendar\DisableBlockRenderingInFrontend;
use Kaiseki\WordPress\TheEventsCalendar\FilterOptions;

return [
    'the_events_calendar' => [
        'default_template' => ['type' => 'default'],
        'disable_block_rendering' => true,
        // Overrides applied to tribe_get_single_option().
        'options' => [
            'ticket-enabled-post-types' => ['tribe_events'],
        ],
    ],
    'hook' => [
        'provider' => [
            DefaultTemplate::class,
            DisableBlockRenderingInFrontend::class,
            FilterOptions::class,
        ],
    ],
];
```

The `EntityUtils\Event` / `Venue` / `Organizer` helpers wrap the plugin's `tribe_*` lookups (cost,
iCal/Google links, past-event check, …) behind a typed API for use in templates.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
