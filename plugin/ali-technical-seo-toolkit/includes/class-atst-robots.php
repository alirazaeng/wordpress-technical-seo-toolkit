<?php
/**
 * Robots directive controls.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Robots directive module.
 */
final class ATST_Robots {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'wp_robots', array( $this, 'filter_robots' ) );
	}

	/**
	 * Apply explicit noindex/follow policies to selected archive types.
	 *
	 * @param array $robots Existing robots directives.
	 * @return array
	 */
	public function filter_robots( $robots ) {
		if ( ! ATST_Plugin::feature_enabled( 'robots_controls' ) ) {
			return $robots;
		}

		$noindex = false;

		if ( is_tag() && (bool) apply_filters( 'atst_noindex_post_tags', false ) ) {
			$noindex = true;
		}

		if ( is_author() && (bool) apply_filters( 'atst_noindex_author_archives', false ) ) {
			$noindex = true;
		}

		if ( is_search() && (bool) apply_filters( 'atst_noindex_search_results', true ) ) {
			$noindex = true;
		}

		if ( ! $noindex ) {
			return $robots;
		}

		unset( $robots['index'] );
		$robots['noindex'] = true;
		$robots['follow']  = true;

		return $robots;
	}
}
