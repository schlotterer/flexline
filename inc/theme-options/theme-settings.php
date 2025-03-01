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
 * - flexline_feature_fallback
 *
 * @return void
 */
function flexline_register_settings() {
    register_setting( 'flexline_theme_options_group', 'flexline_use_menu_icon' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_search_tablet' );
    register_setting( 'flexline_theme_options_group', 'flexline_hide_search_desktop' );
    register_setting( 'flexline_theme_options_group', 'flexline_feature_fallback' );
    register_setting( 'flexline_theme_options_group', 'flexline_show_menu_on_scroll_up' );
    register_setting( 'flexline_theme_options_group', 'flexline_show_menu_all_the_time' );
}
add_action( 'admin_init', __NAMESPACE__ . '\flexline_register_settings' );

