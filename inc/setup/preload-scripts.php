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
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/wp-content/themes/flexline/assets/built/js/load-early.js" as="javascript"/>';
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );
