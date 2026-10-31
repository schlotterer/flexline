<?php
/**
 * Enqueue assets for the theme docs shortcode on the front end.
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue assets when the [flexline_theme_docs] shortcode is present.
 *
 * @return void
 */
function enqueue_theme_docs_assets() {
	if ( ! is_singular() ) {
		return;
	}

	$post = get_post();
	if ( ! $post || ! has_shortcode( $post->post_content, 'flexline_theme_docs' ) ) {
		return;
	}

	wp_enqueue_style( 'dashicons' );

	$tablesort_rel = 'assets/js/tablesort.js';
	$docs_rel      = 'assets/js/theme-docs.js';
	$tablesort_v   = file_exists( get_theme_file_path( $tablesort_rel ) ) ? (string) filemtime( get_theme_file_path( $tablesort_rel ) ) : (string) wp_get_theme()->get( 'Version' );
	$docs_v        = file_exists( get_theme_file_path( $docs_rel ) ) ? (string) filemtime( get_theme_file_path( $docs_rel ) ) : (string) wp_get_theme()->get( 'Version' );

	$base = trailingslashit( get_theme_file_uri( 'assets/js' ) );
	wp_enqueue_script( 'flexline-tablesort', $base . 'tablesort.js', array(), $tablesort_v, true );
	wp_enqueue_script( 'flexline-theme-docs', $base . 'theme-docs.js', array( 'flexline-tablesort' ), $docs_v, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_theme_docs_assets' );
