<?php
/**
 * Customizer sections.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Register the section sections.
 *
 * @author Joel Schlotterer
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function customize_sections( $wp_customize ) {

	// Register a default section.
	$wp_customize->add_section(
		'flexline_phone_section',
		[
			'title'    => esc_html__( 'Phone Link Settings', 'flexline' ),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);
	// Register a default section.
	$wp_customize->add_section(
		'flexline_address_section',
		[
			'title'    => esc_html__( 'Address', 'flexline' ),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);
	// Register a default section.
	$wp_customize->add_section(
		'flexline_defaults_section',
		[
			'title'    => esc_html__( 'Defualts', 'flexline' ),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);

}
add_action( 'customize_register', __NAMESPACE__ . '\customize_sections' );
