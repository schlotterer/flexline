<?php
/**
 * Register theme settings
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Registers settings for the FlexLine theme options group.
 *
 * This function registers the settings for the FlexLine theme options group, which includes the following options:
 * - flexlinetheme_use_menu_icon
 * - flexlinetheme_hide_search_tablet
 * - flexlinetheme_hide_search_desktop
 * - flexlinetheme_feature_fallback
 *
 * @return void
 */
function flexlinetheme_register_settings() {
    register_setting( 'flexlinetheme_theme_options_group', 'flexlinetheme_use_menu_icon' );
    register_setting( 'flexlinetheme_theme_options_group', 'flexlinetheme_hide_search_tablet' );
    register_setting( 'flexlinetheme_theme_options_group', 'flexlinetheme_hide_search_desktop' );
    register_setting( 'flexlinetheme_theme_options_group', 'flexlinetheme_feature_fallback' );
}
add_action( 'admin_init', __NAMESPACE__ . '\flexlinetheme_register_settings' );

