<?php
/**
 * Example canonical override.
 *
 * Use only when the canonical target is intentional and no SEO plugin is
 * already responsible for canonical output.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'atst_enable_canonical_override', '__return_true' );

/**
 * Example canonical target.
 *
 * @return string|null
 */
function atst_example_canonical_url() {
	if ( is_page( 'example-landing-page' ) ) {
		return home_url( '/preferred-landing-page/' );
	}

	return null;
}
add_filter( 'atst_canonical_url', 'atst_example_canonical_url' );
