<?php
/**
 * Customizer panels.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Add a custom panels to attach sections too.
 *
 * @author Joel Schlotterer
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Class.
 */
function customize_panels( $wp_customize ) {
	// Register a new panel.
	$wp_customize->add_panel(
		'site-options',
		array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Site Options', 'flexline' ),
			'description'    => esc_html__( 'Other theme options.', 'flexline' ),
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_panels' );
