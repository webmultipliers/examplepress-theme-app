# __NAME__

__DESC__

An [ExamplePress](https://github.com/webmultipliers/examplepress-theme) companion plugin.

## Setup

1. Clone into `wp-content/plugins/`
2. Run `composer install`
3. Activate in WordPress

## Structure

```
app/templates/     → Your template blocks go here
examplepress.json  → App manifest (routing priority, Troy config)
__SLUG__.php       → Plugin bootstrap
```

See [Companion Plugin Guide](https://github.com/webmultipliers/examplepress-theme/blob/development/docs/companion-plugin.md) for routing, template blocks, and feature overrides.
