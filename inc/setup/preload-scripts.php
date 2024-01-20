<?php
/**
 * Preload styles and scripts.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Preload styles and scripts.
 *
 * @author WebDevStudios
 */
function preload_scripts() {
	?>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/base.css" as="style"/>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/utilities.css" as="style"/>	
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/customize.css" as="style"/>

	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/global.js" as="script"/>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/customize.js" as="script"/>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );