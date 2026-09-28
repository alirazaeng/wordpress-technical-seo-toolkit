<?php
/**
 * Example Organization structured data.
 *
 * Replace placeholders with verified business information before use.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'atst_enable_structured_data', '__return_true' );

/**
 * Example Organization schema.
 *
 * @return array
 */
function atst_example_organization_schema() {
	if ( ! is_front_page() ) {
		return array();
	}

	return array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => 'Example Organization',
		'url'      => home_url( '/' ),
	);
}
add_filter( 'atst_structured_data', 'atst_example_organization_schema' );
