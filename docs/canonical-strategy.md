# Canonical Strategy

## Good canonical candidates

Canonicalization can help consolidate equivalent or near-equivalent URLs such as controlled parameter variants or duplicate publishing paths.

## Avoid conflicting signals

Do not combine signals carelessly.

Examples of problematic combinations include:

- canonical URL points to page B while internal links consistently promote page A
- a canonical target redirects somewhere else
- a canonical target is noindexed
- sitemap lists non-canonical variants
- HTTP and HTTPS versions disagree
- trailing-slash variants are inconsistently linked

## Self-referencing canonicals

For indexable canonical pages, a self-referencing canonical is often useful because it makes the preferred URL explicit.

## WordPress plugin compatibility

If Rank Math, Yoast SEO, AIOSEO, SEOPress, or another SEO system already manages canonicals, extend that system's supported hooks instead of printing a second canonical tag.

This toolkit deliberately suppresses its optional canonical output when a recognized SEO plugin appears to be active.
