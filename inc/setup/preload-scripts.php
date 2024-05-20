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
	/*
	* There isn't really anything to preload right now, but it's set up for it.
	* echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" as="style"/>';
	*/
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );
