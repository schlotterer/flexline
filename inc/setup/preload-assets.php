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
 * @author Corey Collins
 */
function preload_assets() {
    // TODO: check it first
	echo '<link rel="preload" href="' . esc_url( 'https://thelinkgoeshere.com' ) . '" as="image">';


}
add_action( 'wp_head', __NAMESPACE__ . '\preload_assets', 1 );
