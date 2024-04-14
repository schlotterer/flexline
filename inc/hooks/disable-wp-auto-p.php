<?php 
/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * @author Joel Schlotterer
 */
function disable_wpautop_for_gutenberg() {
	// If we have blocks in place, don't add wpautop.
	if ( has_filter( 'the_content', 'wpautop' ) && has_blocks() ) {
		remove_filter( 'the_content', 'wpautop' );
	}
}

add_filter( 'init', __NAMESPACE__ . '\disable_wpautop_for_gutenberg', 9 );