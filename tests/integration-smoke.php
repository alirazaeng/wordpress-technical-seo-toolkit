<?php
/**
 * Disposable wp-env integration smoke tests.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

WP_CLI::add_command(
	'atst-test',
	static function () {
		$assert = static function ( $condition, $message ) {
			if ( ! $condition ) {
				WP_CLI::error( $message );
			}

			WP_CLI::log( 'PASS: ' . $message );
		};

		$assert( class_exists( 'ATST_Plugin' ), 'Technical SEO Toolkit booted.' );
		$assert( class_exists( 'ATST_Robots' ), 'Robots module loaded.' );
		$assert( class_exists( 'ATST_Canonical' ), 'Canonical module loaded.' );
		$assert( class_exists( 'ATST_Meta' ), 'Metadata module loaded.' );
		$assert( class_exists( 'ATST_Schema' ), 'Structured-data module loaded.' );

		$assert( false === ATST_Plugin::feature_enabled( 'meta_description' ), 'Metadata output is disabled by default.' );
		$assert( false === ATST_Plugin::feature_enabled( 'structured_data' ), 'Structured-data output is disabled by default.' );

		$meta = new ATST_Meta();

		ob_start();
		$meta->render_meta_description();
		$default_meta = trim( ob_get_clean() );

		$assert( '' === $default_meta, 'No meta description is emitted before opt-in.' );

		add_filter( 'atst_enable_meta_description', '__return_true' );
		add_filter(
			'atst_meta_description',
			static function () {
				return 'Runtime SEO integration description.';
			}
		);

		ob_start();
		$meta->render_meta_description();
		$enabled_meta = ob_get_clean();

		$assert(
			false !== strpos( $enabled_meta, 'Runtime SEO integration description.' ),
			'Opt-in meta description renders through WordPress.'
		);

		$schema = new ATST_Schema();

		add_filter( 'atst_enable_structured_data', '__return_true' );
		add_filter(
			'atst_structured_data',
			static function () {
				return array(
					'@context' => 'https://schema.org',
					'@type'    => 'Organization',
					'name'     => 'Integration Test Organization',
				);
			}
		);

		ob_start();
		$schema->render_json_ld();
		$schema_output = ob_get_clean();

		$assert(
			false !== strpos( $schema_output, 'application/ld+json' )
			&& false !== strpos( $schema_output, 'Integration Test Organization' ),
			'Validated JSON-LD renders when explicitly enabled.'
		);

		$robots = new ATST_Robots();
		$query  = new WP_Query();

		$query->is_search      = true;
		$GLOBALS['wp_query']   = $query;
		$GLOBALS['wp_the_query'] = $query;

		add_filter( 'atst_enable_robots_controls', '__return_true' );

		$robots_output = $robots->filter_robots( array( 'index' => true ) );

		$assert(
			isset( $robots_output['noindex'], $robots_output['follow'] )
			&& true === $robots_output['noindex']
			&& true === $robots_output['follow']
			&& ! isset( $robots_output['index'] ),
			'Search results become noindex,follow through wp_robots policy.'
		);

		$canonical = new ATST_Canonical();

		add_filter( 'atst_enable_canonical_override', '__return_true' );
		add_filter(
			'atst_canonical_url',
			static function () {
				return 'https://example.test/preferred-url/';
			}
		);

		$canonical->maybe_replace_core_canonical();

		ob_start();
		do_action( 'wp_head' );
		$head_output = ob_get_clean();

		$assert(
			false !== strpos( $head_output, 'rel="canonical"' )
			&& false !== strpos( $head_output, 'https://example.test/preferred-url/' ),
			'Canonical override is emitted through the real wp_head lifecycle.'
		);

		if ( ! defined( 'RANK_MATH_VERSION' ) ) {
			define( 'RANK_MATH_VERSION', 'integration-test' );
		}

		ob_start();
		$meta->render_meta_description();
		$owned_meta = trim( ob_get_clean() );

		$assert( '' === $owned_meta, 'Metadata output yields when a recognized SEO plugin owns the head.' );

		WP_CLI::success( 'Technical SEO runtime integration smoke tests passed.' );
	}
);
