# Indexing vs Crawling

Technical SEO decisions are easier when crawl control, indexing control, canonicalization, and redirects are treated as separate mechanisms.

## robots.txt

A robots.txt rule controls crawling. It is not a reliable replacement for a page-level `noindex` directive.

If a URL must remain crawlable so a search engine can discover its `noindex`, blocking that URL in robots.txt can work against the intended outcome.

## Meta robots / X-Robots-Tag

Use indexing directives when the goal is to control whether an otherwise accessible resource should appear in search results.

WordPress exposes the `wp_robots` filter for page-level robots directives.

## Canonical

A canonical URL is a consolidation signal for duplicate or near-duplicate URLs. It is not the same as a redirect and should not be used merely because a URL is inconvenient.

## Redirect

Use redirects when users and crawlers should be sent to another URL.

For permanent URL changes, a permanent server-side redirect is normally preferable to relying on a canonical alone.

## Practical rule

Before changing a URL, answer four questions:

1. Should it be crawlable?
2. Should it be indexable?
3. Is another URL the preferred duplicate?
4. Should visitors actually be redirected elsewhere?

Those answers determine the appropriate mechanism.
