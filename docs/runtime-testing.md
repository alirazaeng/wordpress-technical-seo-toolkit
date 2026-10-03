# Runtime Integration Testing

The integration workflow boots a disposable WordPress site using wp-env and activates this repository's plugin.

It verifies runtime behavior for:

- safe defaults
- meta-description output
- structured-data validation and output
- search-result robots directives
- canonical output through `wp_head`
- ownership behavior when a recognized SEO plugin is present

The test uses no Search Console credentials, ranking data, private client exports, or production database content.

## Local execution

Docker is required.

```bash
npm install --global @wordpress/env@11.16.0
wp-env start --update
wp-env run cli wp atst-test
wp-env destroy
```
