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
	printf(
		'<link rel="%1$s" href="%2$s" as="%3$s" />',
		esc_attr( 'preload' ),
		esc_url( get_theme_file_uri( 'assets/built/js/load-early.js' ) ),
		esc_attr( 'javascript' )
	);
	printf(
		'<link rel="%1$s" href="%2$s" as="%3$s" />',
		esc_attr( 'preload' ),
		esc_url( get_theme_file_uri( 'assets/built/js/slider.js' ) ),
		esc_attr( 'javascript' )
	);
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );
