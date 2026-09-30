# WordPress Technical SEO Toolkit v1.0.0

First stable release of the safe-by-default technical SEO toolkit for WordPress.

## Included modules

- robots/indexation controls
- canonical URL override pattern
- meta-description pattern
- structured-data/JSON-LD pattern
- SEO-plugin compatibility detection

## Documentation

- crawling vs indexing
- canonical strategy
- redirects
- taxonomy indexation
- image SEO
- XML sitemaps
- structured-data validation
- regression testing

## Safe by default

All behavior-changing features remain disabled until explicitly enabled. The toolkit also avoids printing its optional canonical, metadata, or schema output when a recognized SEO plugin appears to own those responsibilities.

## Requirements

- WordPress 6.4+
- PHP 8.0+

## Validation

GitHub Actions validates Composer configuration, WordPress Coding Standards, and PHP syntax.

## License

MIT.
