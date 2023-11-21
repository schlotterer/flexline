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
 * @author WebDevStudios
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function customize_sections( $wp_customize ) {

	// Register a default section.
	$wp_customize->add_section(
		'flexline_default_section',
		[
			'title'    => esc_html__( 'Defaults', 'flexline' ),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);

}
add_action( 'customize_register', __NAMESPACE__ . '\customize_sections' );
