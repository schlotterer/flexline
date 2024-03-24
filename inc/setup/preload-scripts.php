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
 * @author Joel Schlotterer
 */
function preload_scripts() {
	/*  None of these really need preloading, leaving them here for reference.
	?>
	wp_enqueue_style( 'flexline-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), []);
	
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/built/css/template.css" as="style"/>	
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/customize.css" as="style"/>

	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/built/js/global.js" as="script"/>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/customize.js" as="script"/>
	<?php   
	*/
	//echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" as="style"/>';
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );