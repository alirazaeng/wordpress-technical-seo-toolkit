<?php
/**
 * Plugin Name: Ali Technical SEO Toolkit
 * Description: Opt-in WordPress technical SEO patterns for robots directives, canonicals, metadata, structured data, and diagnostics.
 * Version: 1.0.0
 * Author: Engineer Ali Raza
 * License: MIT
 * Requires at least: 6.4
 * Requires PHP: 8.0
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

define( 'ATST_VERSION', '1.0.0' );
define( 'ATST_FILE', __FILE__ );
define( 'ATST_DIR', plugin_dir_path( __FILE__ ) );

require_once ATST_DIR . 'includes/class-atst-plugin.php';

ATST_Plugin::instance()->init();
