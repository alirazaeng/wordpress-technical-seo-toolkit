<?php
/**
 * Structured data controls.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Structured data module.
 */
final class ATST_Schema {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_head', array( $this, 'render_json_ld' ), 20 );
	}

	/**
	 * Render opt-in JSON-LD supplied through a validated array filter.
	 *
	 * @return void
	 */
	public function render_json_ld() {
		if ( ! ATST_Plugin::feature_enabled( 'structured_data' ) ) {
			return;
		}

		if ( ATST_Compatibility::seo_plugin_active() ) {
			return;
		}

		$data = apply_filters( 'atst_structured_data', array() );

		if ( ! is_array( $data ) || empty( $data['@context'] ) || empty( $data['@type'] ) ) {
			return;
		}

		echo '<script type="application/ld+json">';
		echo wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
		echo '</script>' . "
";
	}
}
