<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Include other customizer files.
 *
 * @author WebDevStudios
 */
function include_custom_controls() {
	require get_template_directory() . '/inc/customizer/panels.php';
	require get_template_directory() . '/inc/customizer/sections.php';
	require get_template_directory() . '/inc/customizer/settings.php';
	require get_template_directory() . '/inc/customizer/class-text-editor-custom-control.php';
}
add_action( 'customize_register', __NAMESPACE__ . '\include_custom_controls', -999 );

/**
 * Enqueue customizer related scripts.
 *
 * @author WebDevStudios
 */
function customize_scripts() {
	wp_enqueue_script( 'flexline-customize-livepreview', get_template_directory_uri() . '/inc/customizer/assets/scripts/livepreview.js', [ 'jquery', 'customize-preview' ], '1.0.0', true );
}
add_action( 'customize_preview_init', __NAMESPACE__ . '\customize_scripts' );

