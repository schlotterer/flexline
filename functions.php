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
 * @author WebDevStudios
 */
function include_inc_files() {
	$files = [
		'inc/customizer/customizer.php', // Customizer additions.
		'inc/scripts.php', // Scripts and Styles.
		'inc/blocks/', // Customizer additions.
		'inc/setup/', // Theme setup.
		'inc/functions/', // Custom functions that act independently of the theme templates.
		'inc/hooks/', // Load custom filters and hooks.
		'inc/shortcodes/', // Load shortcodes.
		//'inc/walker-classes/', // Walker classes.
	];

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

