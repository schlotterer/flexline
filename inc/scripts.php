<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

 namespace FlexLine\flexline;

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_style_sheet' );
function flexline_enqueue_style_sheet() {

	// Theme CSS
	wp_enqueue_style( 'flexline', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	// Styles
	wp_enqueue_style( 'flexline-base', get_template_directory_uri() . '/assets/built/css/app.css', array(), []);
	wp_enqueue_style( 'flexline-lightbox', get_template_directory_uri() . '/assets/built/css/lightbox.css', array(), []);
	
	// Material Icons
	wp_enqueue_style( 'flexline-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), []);

	// Customized Styles
	wp_enqueue_style( 'flexline-custom', get_template_directory_uri() . '/assets/css/customize.css', array(), []);
	
	// Scripts
	wp_enqueue_script( 'flexline-global', get_template_directory_uri() . '/assets/built/js/global.js',  [], null, true );
	wp_enqueue_script( 'flexline-lightbox', get_template_directory_uri() . '/assets/built/js/lightbox.js',  [], null, true );

	// Customized Scripts
	wp_enqueue_script( 'flexline-customize', get_template_directory_uri() . '/assets/js/customize.js',  [], null, true );

}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	// Styles
	wp_enqueue_style( 'flexline-base-admin', get_template_directory_uri() . '/assets/built/css/app.css', array(), []);
	wp_enqueue_style( 'flexline-lightbox', get_template_directory_uri() . '/assets/built/css/lightbox.css', array(), []);
	// Material Icons
	wp_enqueue_style( 'flexline-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), []);
}
	
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );