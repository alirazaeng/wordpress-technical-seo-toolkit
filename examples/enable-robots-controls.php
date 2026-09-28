<?php
/**
 * Example robots controls.
 *
 * @package AliTechnicalSeoToolkit
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'atst_enable_robots_controls', '__return_true' );
add_filter( 'atst_noindex_post_tags', '__return_true' );
add_filter( 'atst_noindex_author_archives', '__return_true' );
