# Changelog

## [Unreleased]

### Added

- disposable WordPress runtime integration workflow using wp-env
- runtime tests for safe defaults, meta-description output, JSON-LD, robots directives, canonical output, and metadata ownership
- structured bug-report and feature-request issue forms
- runtime integration status badge
- runtime-testing documentation

### Changed

- GitHub Actions checkout dependency updated to the current maintained major version
- technical SEO validation now includes real WordPress lifecycle execution in addition to static checks

All notable changes to this project will be documented here.

## [1.0.0] - 2026-09-30

### Added

- WordPress `wp_robots` integration
- opt-in index/noindex controls
- conservative canonical override pattern
- meta-description output pattern
- JSON-LD structured-data output pattern
- compatibility detection for Rank Math, Yoast SEO, AIOSEO, and SEOPress
- indexing-vs-crawling documentation
- canonical strategy
- redirect guidance
- taxonomy indexation guidance
- image SEO guidance
- XML sitemap consistency guidance
- structured-data validation guidance
- technical SEO regression checklist
- WordPress Coding Standards and PHP syntax CI

### Changed

- plugin version promoted from `0.1.0` to `1.0.0` for the first stable tagged release
