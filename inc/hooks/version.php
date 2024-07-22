<?php
/**
 * Setup Global Theme Version variable
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

	/**
	 * Setup the global theme version variable.
	 *
	 * This function retrieves the current theme object using the `wp_get_theme()` function
	 * and then defines a constant `THEME_VERSION` with the value of the theme's version.
	 *
	 * @return void
	 */
function flexlinetheme_theme_setup() {
	$theme = wp_get_theme();
	define( 'THEME_VERSION', $theme->get( 'Version' ) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\flexlinetheme_theme_setup' );
