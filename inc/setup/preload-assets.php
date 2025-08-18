<?php
/**
 * Preload assets.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Preload assets.
 *
 * @author Joel Schlotterer
 */
function preload_assets() {
	
	// Get the featured image url.
	$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	if ( $featured_image_url ) {
		echo '<link rel="preload" href="' . esc_url( $featured_image_url ) . '" as="image"/>';
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_assets', 1 );
