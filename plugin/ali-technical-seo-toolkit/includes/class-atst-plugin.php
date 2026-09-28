<?php
/**
 * Main plugin coordinator.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin coordinator.
 */
final class ATST_Plugin {

	/**
	 * Singleton instance.
	 *
	 * @var ATST_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Get instance.
	 *
	 * @return ATST_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize modules.
	 *
	 * @return void
	 */
	public function init() {
		foreach ( array(
			'class-atst-compatibility.php',
			'class-atst-robots.php',
			'class-atst-canonical.php',
			'class-atst-meta.php',
			'class-atst-schema.php',
		) as $file ) {
			require_once ATST_DIR . 'includes/' . $file;
		}

		( new ATST_Robots() )->init();
		( new ATST_Canonical() )->init();
		( new ATST_Meta() )->init();
		( new ATST_Schema() )->init();
	}

	/**
	 * Whether a feature is enabled.
	 *
	 * Features are disabled by default to avoid fighting an installed SEO
	 * plugin or changing indexation unexpectedly.
	 *
	 * @param string $feature Feature slug.
	 * @return bool
	 */
	public static function feature_enabled( $feature ) {
		$feature = sanitize_key( $feature );

		return (bool) apply_filters( 'atst_enable_' . $feature, false );
	}
}
