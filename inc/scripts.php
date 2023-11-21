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

	// Styles
	wp_enqueue_style( 'flexline', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'flexline-headroom', get_template_directory_uri() . '/assets/css/headroom.css', array(), []);
	// Scripts
	wp_enqueue_script( 'flexline-headroom', get_template_directory_uri() . '/assets/js/headroom.js',  [], null, false );
	wp_enqueue_script( 'flexline-headroom-init', get_template_directory_uri() . '/assets/js/headroom-init.js', ['flexline-headroom'], null, false );
}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	//wp_register_style( 'flexline-swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.4.7' );
}
	
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );