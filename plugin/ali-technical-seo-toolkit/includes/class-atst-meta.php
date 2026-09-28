<?php
/**
 * Metadata controls.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Metadata module.
 */
final class ATST_Meta {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_head', array( $this, 'render_meta_description' ), 2 );
	}

	/**
	 * Render an opt-in meta description when no major SEO plugin owns metadata.
	 *
	 * @return void
	 */
	public function render_meta_description() {
		if ( ! ATST_Plugin::feature_enabled( 'meta_description' ) ) {
			return;
		}

		if ( ATST_Compatibility::seo_plugin_active() ) {
			return;
		}

		$description = (string) apply_filters( 'atst_meta_description', '' );
		$description = trim( wp_strip_all_tags( $description ) );

		if ( '' === $description ) {
			return;
		}

		printf(
			'<meta name="description" content="%s" />' . PHP_EOL,
			esc_attr( $description )
		);
	}
}
