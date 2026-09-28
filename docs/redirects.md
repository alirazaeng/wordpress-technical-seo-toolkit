# Redirects

Redirects change the destination users and crawlers reach. Treat them as routing behavior, not decorative SEO metadata.

## Use a permanent redirect when

- a page has permanently moved
- an old taxonomy URL has a clear replacement
- a legacy slug should consolidate into a maintained URL
- protocol/hostname normalization requires one preferred destination

## Avoid redirect chains

Prefer:

```text
old URL → final URL
```

instead of:

```text
old URL → intermediate URL → final URL
```

## Before redirecting a taxonomy

Check:

- whether the archive has organic traffic
- inbound links
- internal links
- products/posts attached to it
- canonical state
- sitemap inclusion
- the semantic relevance of the destination

Do not mass-redirect unrelated thin pages to the homepage.

## Test after deployment

Confirm:

- expected HTTP status
- final destination
- no loop
- no chain
- internal links updated
- sitemap points to final URLs
- canonical on destination is consistent
