<?php
/**
 * Preload styles and scripts.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Preload styles and scripts.
 *
 * @author Joel Schlotterer
 */
function preload_scripts() {
	$relative_path = 'assets/built/js/load-early.js';
	$script_url    = add_query_arg(
		'ver',
		rawurlencode( flexline_asset_ver( $relative_path ) ),
		get_theme_file_uri( $relative_path )
	);

	printf(
		'<link rel="%1$s" href="%2$s" as="%3$s" fetchpriority="high">',
		esc_attr( 'preload' ),
		esc_url( $script_url ),
		esc_attr( 'script' )
	);
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );
