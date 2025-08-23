<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine;

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_styles' );

/**
 * Enqueues the necessary styles and scripts for the theme.
 *
 * This function registers and enqueues the necessary styles and scripts for the theme.
 * It includes the theme's main CSS file, the base CSS file, the modal CSS file,
 * the icons CSS file, the customized CSS file, and the necessary scripts.
 *
 * @return void
 */
function flexline_enqueue_styles() {

	// Theme CSS.
	wp_enqueue_style( 'flexline', get_stylesheet_uri(), array(), THEME_VERSION );
	// Styles.
	wp_enqueue_style( 'flexline-base', get_theme_file_uri( 'assets/built/css/app.css' ), array(), THEME_VERSION );
	wp_enqueue_style( 'flexline-modal', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), THEME_VERSION );
	// Icons Styles.
	wp_enqueue_style( 'flexline-icons', get_theme_file_uri( 'assets/css/icons.css' ), array(), THEME_VERSION );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom', get_theme_file_uri( 'assets/css/customize.css' ), array(), THEME_VERSION );

	// Scripts.
	wp_enqueue_script( 'flexline-global', get_theme_file_uri( 'assets/built/js/global.js' ), array(), THEME_VERSION, true );
	$show_menu_on_scroll    = get_option( 'flexline_show_menu_on_scroll_up', false );
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( '1' === $show_menu_on_scroll || '1' === $show_menu_all_the_time ) {
		wp_enqueue_script( 'flexline-headroom', get_theme_file_uri( 'assets/js/headroom.min.js' ), array(), THEME_VERSION, true );
		wp_enqueue_script( 'flexline-headroom-init', get_theme_file_uri( 'assets/built/js/headroom.js' ), array(), THEME_VERSION, true );
	}
	wp_enqueue_script( 'flexline-load-early', get_theme_file_uri( 'assets/built/js/load-early.js' ), array(), THEME_VERSION, false );
	wp_enqueue_script( 'flexline-modal', get_theme_file_uri( 'assets/built/js/modal.js' ), array(), THEME_VERSION, true );
	wp_enqueue_script( 'flexline-slidein', get_theme_file_uri( 'assets/built/js/slidein.js' ), array(), THEME_VERSION, true );

	// Customized Scripts.
	wp_enqueue_script( 'flexline-customize', get_theme_file_uri( 'assets/js/customize.js' ), array(), THEME_VERSION, true );
}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	// Styles.
	wp_enqueue_style( 'flexline-base-admin', get_theme_file_uri( 'assets/built/css/app.css' ), array(), THEME_VERSION );
	// Modal Styles.
	wp_enqueue_style( 'flexline-modal-admin', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), THEME_VERSION );
	// Icons.
	wp_enqueue_style( 'flexline-icons-admin', get_theme_file_uri( 'assets/css/icons.css' ), array(), THEME_VERSION );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom-admin', get_theme_file_uri( 'assets/css/customize.css' ), array(), THEME_VERSION );

	wp_enqueue_script( 'flexline-global-admin', get_theme_file_uri( 'assets/built/js/global.js' ), array(), THEME_VERSION, true );
	// The slide-in admin script is intentionally not enqueued.
	// Template pattern inserter.
	wp_enqueue_script(
		'template-pattern-inserter',
		get_stylesheet_directory_uri() . '/assets/built/js/template-pattern-inserter.js',
		array( 'wp-blocks', 'wp-data', 'wp-api-fetch', 'wp-element', 'wp-components' ),
		THEME_VERSION,
		true
	);
}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );
