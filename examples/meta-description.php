<?php
/**
 * Example opt-in meta description.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'atst_enable_meta_description', '__return_true' );

/**
 * Example description.
 *
 * @return string
 */
function atst_example_meta_description() {
	if ( is_front_page() ) {
		return 'Example technical SEO description generated through a WordPress filter.';
	}

	return '';
}
add_filter( 'atst_meta_description', 'atst_example_meta_description' );
