<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_style_sheet' );
/**
 * Enqueues the necessary styles and scripts for the theme.
 *
 * This function registers and enqueues the necessary styles and scripts for the theme.
 * It includes the theme's main CSS file, the base CSS file, the modal CSS file,
 * the icons CSS file, the customized CSS file, and the necessary scripts.
 *
 * @return void
 */
function flexline_enqueue_style_sheet() {

	// Theme CSS.
	wp_enqueue_style( 'flexline', get_template_directory_uri() . '/style.css', array(), THEME_VERSION );
	// Styles.
	wp_enqueue_style( 'flexline-base', get_template_directory_uri() . '/assets/built/css/app.css', array(), THEME_VERSION );
	wp_enqueue_style( 'flexline-modal', get_template_directory_uri() . '/assets/built/css/modal.css', array(), THEME_VERSION );
	// Icons Styles.
	wp_enqueue_style( 'flexline-icons', get_template_directory_uri() . '/assets/css/icons.css', array(), THEME_VERSION );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom', get_template_directory_uri() . '/assets/css/customize.css', array(), THEME_VERSION );

	// Scripts.
	wp_enqueue_script( 'flexline-global', get_template_directory_uri() . '/assets/built/js/global.js', array(), THEME_VERSION, true );
	wp_enqueue_script( 'flexline-modal', get_template_directory_uri() . '/assets/built/js/modal.js', array(), THEME_VERSION, true );
	wp_enqueue_script( 'flexline-slidein', get_template_directory_uri() . '/assets/built/js/slidein.js', array(), THEME_VERSION, true );

	// Customized Scripts.
	wp_enqueue_script( 'flexline-customize', get_template_directory_uri() . '/assets/js/customize.js', array(), THEME_VERSION, true );
}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	// Styles.
	wp_enqueue_style( 'flexline-base-admin', get_template_directory_uri() . '/assets/built/css/app.css', array(), THEME_VERSION );
	wp_enqueue_style( 'flexline-modal', get_template_directory_uri() . '/assets/built/css/modal.css', array(), THEME_VERSION );
	// Icons.
	wp_enqueue_style( 'flexline-icons', get_template_directory_uri() . '/assets/css/icons.css', array(), THEME_VERSION );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom', get_template_directory_uri() . '/assets/css/customize.css', array(), THEME_VERSION );
	// Modal Scripts.
	wp_enqueue_style( 'flexline-modal', get_template_directory_uri() . '/assets/built/css/modal.css', array(), THEME_VERSION );

}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );
