<?php
/**
 * Customizer settings.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

use WP_Customize_Image_Control;


/**
 * Register Search/Menu Settings.
 *
 * @author Joel Schlotterer
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_search_menu( $wp_customize ) {
	
	// Use Menu Icon at all breakpoints
    $wp_customize->add_setting('flexline_use_menu_icon', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('flexline_use_menu_icon', array(
        'label' => esc_html__('Use menu icon at all breakpoints', 'flexline'),
        'section' => 'flexline_search_menu_section',
        'settings' => 'flexline_use_menu_icon',
        'type' => 'checkbox',
    ));

	// Hide on Desktop
    $wp_customize->add_setting('flexline_hide_search_desktop', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('flexline_hide_search_desktop', array(
        'label' => esc_html__('Hide Search/Menu at Desktop', 'flexline'),
        'section' => 'flexline_search_menu_section',
        'settings' => 'flexline_hide_search_desktop',
        'type' => 'checkbox',
    ));

	
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_search_menu' );

function customize_main_phone_title( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'flexline_main_phone_title',
		[
			'default'           => 'call us',
			'sanitize_callback' => 'wp_kses_post',
		]
	);

	// Create the setting field.
	$wp_customize->add_control(
		'flexline_main_phone_title',
		[
			'label'       => esc_attr__( 'Main Phone Link Text', 'flexline' ),
			'description' => esc_attr__( 'This optional text will the text in alt tag and for the link text in the phone and address shortcodes as well as the alt text in the header phone link.', 'flexline' ),
			'section'     => 'flexline_phone_section',
			'type'        => 'text',
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_main_phone_title' );

/**
 * Register main phone number setting.
 *
 * @author Joel Schlotterer
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
			'description' => esc_attr__( 'This can be a phone number with 10 numeric digits, an anchor(#) link to phone number/s, or any other link (/contact/)', 'flexline' ),
			'section'     => 'flexline_phone_section',
			'type'        => 'text',
		]
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_main_phone_number' );

/**
 * Register Header Phone Link Display Options
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function customize_header_phone_display_options( $wp_customize ) {
    
    // Hide on Desktop
    $wp_customize->add_setting('flexline_hide_phone_desktop', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('flexline_hide_phone_desktop', array(
        'label' => esc_html__('Hide header phone link on Desktop', 'flexline'),
        'section' => 'flexline_phone_section',
        'settings' => 'flexline_hide_phone_desktop',
        'type' => 'checkbox',
    ));

    // Repeat for Tablet and Mobile
    // Hide on Tablet
    $wp_customize->add_setting('flexline_hide_phone_tablet', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('flexline_hide_phone_tablet', array(
        'label' => esc_html__('Hide header phone link on Tablet', 'flexline'),
        'section' => 'flexline_phone_section',
        'settings' => 'flexline_hide_phone_tablet',
        'type' => 'checkbox',
    ));

    // Hide on Mobile
    $wp_customize->add_setting('flexline_hide_phone_mobile', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('flexline_hide_phone_mobile', array(
        'label' => esc_html__('Hide header phone link on Mobile', 'flexline'),
        'section' => 'flexline_phone_section',
        'settings' => 'flexline_hide_phone_mobile',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', __NAMESPACE__ . '\customize_header_phone_display_options');






/**
 * Register address street text setting.
 *
 * @author Joel Schlotterer
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
			'section'     => 'flexline_address_section',
			'type'        => 'text',
		]
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_address_street' );

/**
 * Register address city text setting.
 *
 * @author Joel Schlotterer
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
			'section'     => 'flexline_address_section',
			'type'        => 'text',
		]
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_address_city' );

/**
 * Register address state text setting.
 *
 * @author Joel Schlotterer
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
			'section'     => 'flexline_address_section',
			'type'        => 'text',
		]
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_address_state' );

/**
 * Register address zip text setting.
 *
 * @author Joel Schlotterer
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
			'section'     => 'flexline_address_section',
			'type'        => 'text',
		]
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_address_zip' );

/**
 * Register Feature Image Fallback setting.
 *
 * @author Joel Schlotterer
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
				'section'     => 'flexline_defaults_section',
				'settings'    => 'flexline_feature_fallback',
			)
		)
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\customize_feature_fallback' );

