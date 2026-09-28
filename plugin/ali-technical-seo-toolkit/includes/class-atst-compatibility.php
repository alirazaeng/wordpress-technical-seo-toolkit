<?php
/**
 * SEO plugin compatibility helpers.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * SEO plugin compatibility helpers.
 */
final class ATST_Compatibility {

	/**
	 * Whether a major SEO plugin appears to own head metadata.
	 *
	 * @return bool
	 */
	public static function seo_plugin_active() {
		return defined( 'RANK_MATH_VERSION' )
			|| defined( 'WPSEO_VERSION' )
			|| defined( 'AIOSEO_VERSION' )
			|| defined( 'SEOPRESS_VERSION' );
	}
}
