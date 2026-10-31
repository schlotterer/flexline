<?php
/**
 * Register theme settings
 *
 * @package flexline
 */

namespace FlexLine;

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
	$boolean_settings = array(
		'flexline_use_menu_icon',
		'flexline_hide_search_tablet',
		'flexline_hide_search_desktop',
		'flexline_show_menu_on_scroll_up',
		'flexline_show_menu_all_the_time',
		'flexline_enable_core_block_hide',
	);

	foreach ( $boolean_settings as $setting ) {
		register_setting(
			'flexline_theme_options_group',
			$setting,
			array(
				'type'              => 'integer',
				'default'           => 0,
				'sanitize_callback' => 'absint',
			)
		);
	}

	register_setting(
		'flexline_theme_options_group',
		'flexline_feature_fallback',
		array(
			'type'              => 'string',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
}
add_action( 'admin_init', __NAMESPACE__ . '\flexline_register_settings' );
