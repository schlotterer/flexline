<?php
/**
 * Register theme settings
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Registers settings for the FlexLine theme options group.
 *
 * This function registers the settings for the FlexLine theme options group, which includes the following options:
 * - flexline_use_menu_icon
 * - flexline_hide_search_tablet
 * - flexline_hide_search_desktop
 * - flexline_main_phone_title
 * - flexline_main_phone_number
 * - flexline_hide_phone_desktop
 * - flexline_hide_phone_tablet
 * - flexline_hide_phone_mobile
 * - flexline_address_street
 * - flexline_address_city
 * - flexline_address_state
 * - flexline_address_zip
 * - flexline_feature_fallback
 *
 * @return void
 */
function flexline_register_settings() {
    register_setting( 'flexline_theme_options_group', 'flexline_use_menu_icon' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_search_tablet' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_search_desktop' );
    register_setting( 'flexline_theme_options_group', 'flexline_main_phone_title' );
    register_setting( 'flexline_theme_options_group', 'flexline_main_phone_number' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_phone_desktop' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_phone_tablet' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_phone_mobile' );
    register_setting( 'flexline_theme_options_group', 'flexline_address_street' );
    register_setting( 'flexline_theme_options_group', 'flexline_address_city' );
    register_setting( 'flexline_theme_options_group', 'flexline_address_state' );
    register_setting( 'flexline_theme_options_group', 'flexline_address_zip' );
    register_setting( 'flexline_theme_options_group', 'flexline_feature_fallback' );
}
add_action( 'admin_init', __NAMESPACE__ . '\flexline_register_settings' );

