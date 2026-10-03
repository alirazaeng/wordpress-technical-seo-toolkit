# WordPress Technical SEO Toolkit

Production-focused technical SEO patterns for WordPress covering indexing controls, canonical URLs, metadata, structured data, redirects, taxonomy strategy, image SEO, and XML sitemap consistency.

[![Technical SEO Code Quality](https://github.com/alirazaeng/wordpress-technical-seo-toolkit/actions/workflows/quality.yml/badge.svg)](https://github.com/alirazaeng/wordpress-technical-seo-toolkit/actions/workflows/quality.yml) [![Release](https://img.shields.io/github/v/release/alirazaeng/wordpress-technical-seo-toolkit?label=release)](https://github.com/alirazaeng/wordpress-technical-seo-toolkit/releases/latest) [![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

This repository is designed as a maintainable engineering reference rather than a collection of aggressive SEO snippets.

## What this project demonstrates

- WordPress `wp_robots` integration
- deliberate index/noindex policies
- opt-in canonical overrides
- duplicate metadata protection
- structured data output patterns
- compatibility awareness for Rank Math, Yoast, AIOSEO, and SEOPress
- redirect strategy and chain prevention
- taxonomy indexation decision-making
- image SEO and accessibility guidance
- XML sitemap consistency
- WordPress Coding Standards and CI
- technical SEO regression testing

## Safe by default

Every behavior-changing feature is disabled by default.

This matters because technical SEO output can conflict with:

- WordPress core
- SEO plugins
- themes
- custom plugins
- caching/CDN layers
- multilingual systems
- commerce taxonomies

Enable only the feature you deliberately want to own.

## Architecture

```text
wordpress-technical-seo-toolkit/
├── .github/
│   ├── workflows/quality.yml
│   └── pull_request_template.md
├── docs/
│   ├── canonical-strategy.md
│   ├── image-seo.md
│   ├── indexing-vs-crawling.md
│   ├── redirects.md
│   ├── sitemaps.md
│   ├── structured-data.md
│   ├── taxonomy-strategy.md
│   └── testing-checklist.md
├── examples/
│   ├── custom-canonical.php
│   ├── enable-robots-controls.php
│   ├── meta-description.php
│   └── organization-schema.php
└── plugin/
    └── ali-technical-seo-toolkit/
        ├── ali-technical-seo-toolkit.php
        └── includes/
            ├── class-atst-canonical.php
            ├── class-atst-compatibility.php
            ├── class-atst-meta.php
            ├── class-atst-plugin.php
            ├── class-atst-robots.php
            └── class-atst-schema.php
```

## Indexing controls

The robots module uses WordPress's `wp_robots` filter instead of printing a second robots meta tag manually.

Example:

```php
add_filter( 'atst_enable_robots_controls', '__return_true' );
add_filter( 'atst_noindex_post_tags', '__return_true' );
add_filter( 'atst_noindex_author_archives', '__return_true' );
```

Internal search results are configured as noindex by default **only when the module is explicitly enabled**.

See [Indexing vs crawling](docs/indexing-vs-crawling.md).

## Canonical controls

The canonical module is intentionally conservative.

It:

- does nothing by default
- does nothing when a recognized SEO plugin appears to own head metadata
- requires an explicit canonical URL through a filter
- removes WordPress core canonical output only after a replacement is available

Example:

```php
add_filter( 'atst_enable_canonical_override', '__return_true' );

function atst_my_canonical() {
    if ( is_page( 'example-landing-page' ) ) {
        return home_url( '/preferred-landing-page/' );
    }

    return null;
}
add_filter( 'atst_canonical_url', 'atst_my_canonical' );
```

See [Canonical strategy](docs/canonical-strategy.md).

## Metadata

The example meta-description module avoids output when a recognized SEO plugin is active.

That prevents the common portfolio-code mistake of creating duplicate description tags while another plugin already manages the document head.

## Structured data

Structured data is supplied as an array and encoded with `wp_json_encode()`.

The toolkit requires at minimum:

- `@context`
- `@type`

before outputting JSON-LD.

It deliberately does **not** fabricate ratings, prices, reviews, or business claims.

See [Structured data](docs/structured-data.md).

## Redirect strategy

This repository documents redirect engineering rather than pretending redirects are just a plugin checkbox.

Review:

- final destination relevance
- HTTP status
- chains
- loops
- internal links
- sitemap URLs
- canonical consistency

See [Redirects](docs/redirects.md).

## Taxonomy strategy

WordPress and WooCommerce sites can create many archives.

The toolkit encourages evaluating taxonomy types based on:

- search intent
- uniqueness
- inventory/content depth
- internal linking
- pagination
- duplication risk

See [Taxonomy strategy](docs/taxonomy-strategy.md).

## Image SEO

Image SEO guidance covers:

- contextual alt text
- decorative-image behavior
- file naming
- crawlability
- image URLs in structured data
- reserved dimensions and layout stability

See [Image SEO](docs/image-seo.md).

## XML sitemaps

Sitemaps should normally reinforce the site's preferred URL set rather than contradicting canonicals, redirects, or noindex decisions.

See [XML sitemaps](docs/sitemaps.md).

## Compatibility

The toolkit detects common SEO-plugin ownership signals for:

- Rank Math
- Yoast SEO
- All in One SEO
- SEOPress

Detection is deliberately defensive, not a promise of complete compatibility with every version or add-on.

For a real project, extend the active SEO system through its documented APIs when practical instead of printing competing tags.

## Code quality

GitHub Actions validates:

1. Composer configuration
2. dependency installation
3. WordPress Coding Standards
4. PHP syntax across plugin and examples

Run locally:

```bash
composer install
composer lint
find plugin examples -name "*.php" -print0 | xargs -0 -n1 php -l
```

## Testing

Technical SEO changes should be checked as a system.

The regression checklist covers:

- robots directives
- canonicals
- redirects
- metadata ownership
- structured data
- images
- sitemaps
- internal-link consistency

See [Technical SEO testing checklist](docs/testing-checklist.md).

## What is intentionally not included

This project does not include:

- cloaking
- hidden-text tactics
- fake review/rating schema
- mass irrelevant redirects
- credentialed Search Console automation
- private client exports
- production database dumps
- copied premium SEO plugin code

## Author

**Engineer Ali Raza**  
WordPress & WooCommerce Developer · Web Performance Specialist · Technical SEO

- Portfolio: https://engineeraliraza.site
- Upwork: https://www.upwork.com/freelancers/engineeraliraza
- GitHub: https://github.com/alirazaeng

## License

MIT. See [LICENSE](LICENSE).
