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
	wp_enqueue_style( 'flexline-base', get_template_directory_uri() . '/assets/css/base.css', array(), []);
	wp_enqueue_style( 'flexline-utilities', get_template_directory_uri() . '/assets/css/utilities.css', array(), []);
	wp_enqueue_style( 'flexline-templates', get_template_directory_uri() . '/assets/css/templates.css', array(), []);
	
	//wp_enqueue_style( 'flexline-headroom', get_template_directory_uri() . '/assets/css/headroom.css', array(), []);
	wp_enqueue_style( 'flexline', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

	// Customized Styles
	wp_enqueue_style( 'flexline-custom-css', get_template_directory_uri() . '/assets/css/customize.css', array(), []);
	
	// Scripts
	wp_enqueue_script( 'flexline-global', get_template_directory_uri() . '/assets/js/global.js',  [], null, true );
	//wp_enqueue_script( 'flexline-headroom-js', get_template_directory_uri() . '/assets/js/headroom.js',  [], null, false );
	//wp_enqueue_script( 'flexline-headroom--js-init', get_template_directory_uri() . '/assets/js/headroom-init.js', ['flexline-headroom-js'], null, false );

	// Customized Scripts
	wp_enqueue_script( 'flexline-global', get_template_directory_uri() . '/assets/js/customize.js',  [], null, true );
}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	//wp_register_style( 'flexline-swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.4.7' );
}
	
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );