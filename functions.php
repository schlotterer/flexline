<?php
/**
 * Flexline functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Get all the include files for the theme.
 *
 * @author Joel Schlotterer
 */
function include_inc_files() {
	$files = array(
		// If a new folder is added please do it in alphabetical order.
		'inc/blocks/', // Block Customizations.
		'inc/customizer/customizer.php', // Customizer additions for global custom fields.
		'inc/functions/', // Custom functions that act independently of the theme templates.
		'inc/hooks/', // Load custom filters and hooks.
		'inc/setup/', // Theme setup.
		'inc/scripts.php', // Scripts and Styles loading.
		'inc/shortcodes/', // Load shortcodes.
		'inc/theme-options/', // Load theme options.
	);

	foreach ( $files as $include ) {
		$include = trailingslashit( get_template_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require $file;
			}
		} else {
			require $include;
		}
	}
}

include_inc_files();
