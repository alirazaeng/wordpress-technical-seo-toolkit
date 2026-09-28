# Security Policy

This repository contains technical SEO examples for WordPress.

Never commit:

- WordPress credentials or salts
- API tokens
- Search Console credentials
- customer exports
- private site backups
- production database dumps
- confidential client URLs or infrastructure details

SEO code should also follow normal WordPress security practices: sanitize input, escape output, check capabilities for privileged actions, and avoid direct database writes when public APIs are available.
