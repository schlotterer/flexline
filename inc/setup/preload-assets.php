<?php
/**
 * Preload assets.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Preload assets.
 *
 * @author Joel Schlotterer
 */
function preload_assets() {
	// TODO: check it first. Preloading is generally happening in WP Rocket, or the Header Footer plugin - but this is here if you need it.
	// echo '<link rel="preload" href="' . esc_url( get_stylesheet_directory_uri() ) . '/assets/built/images/fallback.png" as="image"/>'; .
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_assets', 1 );
