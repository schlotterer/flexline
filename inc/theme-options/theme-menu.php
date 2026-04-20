<?php
/**
 * Create theme menu options.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds a theme page to the WordPress admin menu for managing FlexLine theme options.
 *
 * @return void
 */
function flexline_add_admin_menu() {
	add_theme_page(
		'FlexLine Options',
		'FlexLine Options',
		'manage_options',
		'flexline_theme_options',
		'flexline_theme_options_page'
	);
}
add_action( 'admin_menu', __NAMESPACE__ . '\flexline_add_admin_menu' );

/**
 * Enqueues the WordPress media uploader if the current request is an admin request.
 *
 * @param string $hook Current admin page hook.
 * @return void
 */
function flexline_enqueue_media_uploader( $hook ) {
	if ( 'appearance_page_flexline_theme_options' !== $hook ) {
		return;
	}

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_media_uploader' );

/**
 * Enqueue scripts for the theme options page.
 *
 * @param string $hook Current admin page hook.
 * @return void
 */
function flexline_enqueue_theme_options_assets( $hook ) {
	if ( 'appearance_page_flexline_theme_options' !== $hook ) {
		return;
	}

	$base = trailingslashit( get_theme_file_uri( 'assets/js' ) );
	wp_enqueue_script( 'flexline-tablesort', $base . 'tablesort.js', array(), flexline_asset_ver( 'assets/js/tablesort.js' ), true );
	wp_enqueue_script( 'flexline-theme-docs', $base . 'theme-docs.js', array( 'flexline-tablesort' ), flexline_asset_ver( 'assets/js/theme-docs.js' ), true );
	wp_enqueue_script(
		'flexline-theme-options',
		$base . 'theme-options.js',
		array(),
		flexline_asset_ver( 'assets/js/theme-options.js' ),
		true
	);
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_theme_options_assets' );
