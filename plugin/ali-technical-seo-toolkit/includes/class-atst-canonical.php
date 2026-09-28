<?php
/**
 * Canonical URL controls.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Canonical URL module.
 */
final class ATST_Canonical {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp', array( $this, 'maybe_replace_core_canonical' ) );
	}

	/**
	 * Replace WordPress core canonical output only when explicitly enabled.
	 *
	 * @return void
	 */
	public function maybe_replace_core_canonical() {
		if ( ! ATST_Plugin::feature_enabled( 'canonical_override' ) ) {
			return;
		}

		if ( ATST_Compatibility::seo_plugin_active() ) {
			return;
		}

		$url = apply_filters( 'atst_canonical_url', null );

		if ( ! is_string( $url ) || '' === trim( $url ) ) {
			return;
		}

		remove_action( 'wp_head', 'rel_canonical' );
		add_action(
			'wp_head',
			static function () use ( $url ) {
				printf(
					'<link rel="canonical" href="%s" />' . PHP_EOL,
					esc_url( $url )
				);
			},
			10
		);
	}
}
