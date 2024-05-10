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
		'flexline_search_menu_section',
		[
			'title'    => esc_html__( 'Search/Menu Options', 'flexline' ),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);
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
			'description' => __('Here you can configure the address details that will be used throughout your site, particularly within the [flexline_contact_info] and the [flexline_city_state] shortcodes. Ensure each part of the address is entered correctly as it will be displayed on your site exactly as entered here.', 'flexline'),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);
	// Register a default section.
	$wp_customize->add_section(
		'flexline_defaults_section',
		[
			'title'    => esc_html__( 'Defualts', 'flexline' ),
			'description' => __('To display just the current year use this shortcode anywhere in your site (used in subfooter) [flexline_copyright_year]', 'flexline'),
			'priority' => 20,
			'panel'    => 'site-options',
		]
	);

}
add_action( 'customize_register', __NAMESPACE__ . '\customize_sections' );
