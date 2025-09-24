<?php
/**
 * Pass Search Menu Variables to JS
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Outputs JavaScript settings for customizing the search menu.
 *
 * This function generates a script block with settings for the search menu,
 * based on theme customizer options. These settings control the visibility
 * of the search feature and the use of a menu icon on desktop.
 *
 * @return void
 */
function flexline_customize_search_menu_js_settings() {
	if ( ! wp_script_is( 'flexline-slidein', 'enqueued' ) ) {
			return;
	}

		$settings = array(
			'useMenuIconOnDesktop' => (bool) get_option( 'flexline_use_menu_icon', false ),
			'hideSearchOnTablet'   => (bool) get_option( 'flexline_hide_search_tablet', false ),
			'hideSearchOnDesktop'  => (bool) get_option( 'flexline_hide_search_desktop', false ),
		);

		wp_add_inline_script(
			'flexline-slidein',
			'var FlexLineCustomizerSearchMenuSettings = ' . wp_json_encode( $settings ) . ';',
			'before'
		);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\flexline_customize_search_menu_js_settings', 20 );
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\flexline_customize_search_menu_js_settings', 20 );
