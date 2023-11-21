<?php
/**
 * Customizer settings.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

use WP_Customize_Image_Control;


/**
 * Register main phone title setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_main_phone_title( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_main_phone_title',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_main_phone_title',
		[
			'label'       => esc_attr__( 'Main Phone Title', 'flexline' ),
			'description' => esc_attr__( 'This optional text will show in front of the phone number with a space in between.', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_main_phone_title' );

/**
 * Register main phone number setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_main_phone_number( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_main_phone_number',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_main_phone_number',
		[
			'label'       => esc_attr__( 'Main Phone Number', 'flexline' ),
			'description' => esc_attr__( 'Format the number how you would like it to display. Make sure there are 10 digits total in the number', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_main_phone_number' );


/**
 * Register address street text setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_address_street( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_address_street',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_address_street',
		[
			'label'       => esc_attr__( 'Street', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_address_street' );

/**
 * Register address city text setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_address_city( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_address_city',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_address_city',
		[
			'label'       => esc_attr__( 'City', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_address_city' );

/**
 * Register address state text setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_address_state( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_address_state',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_address_state',
		[
			'label'       => esc_attr__( 'State', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_address_state' );

/**
 * Register address zip text setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_address_zip( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_address_zip',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_address_zip',
		[
			'label'       => esc_attr__( 'Zip code', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_address_zip' );

/**
 * Register Feature Image Fallback setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_feature_fallback( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_feature_fallback',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'flexline_feature_fallback',
			array(
				'label'       => esc_attr__( 'Feature Image Fallback', 'flexline' ),
				'description' => esc_attr__( 'This image will display in list views when no featured image is present.', 'flexline' ),
				'section'     => 'flexline_default_section',
				'settings'    => 'flexline_feature_fallback',
			)
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_feature_fallback' );

/**
 * Register copyright text setting.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_copyright_text( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_copyright_text',
		[
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_copyright_text',
		[
			'label'       => esc_attr__( 'Copyright Text', 'flexline' ),
			'description' => esc_attr__( 'The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'flexline' ),
			'section'     => 'flexline_default_section',
			'type'        => 'textarea',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_copyright_text' );
