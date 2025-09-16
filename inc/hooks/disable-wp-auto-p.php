<?php
/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * Runs after the main query is available so block detection works,
 * preventing extra <p> tags around block and shortcode output.
 */
function disable_wpautop_for_gutenberg() {
	// Only proceed if wpautop is currently attached to the_content.
	if ( ! has_filter( 'the_content', 'wpautop' ) ) {
		return;
	}

	// Determine the main queried post and check for blocks.
	$post_id = get_queried_object_id();
	if ( $post_id ) {
		$post = get_post( $post_id );
		if ( $post && has_blocks( $post->post_content ) ) {
			remove_filter( 'the_content', 'wpautop' );
		}
	}
}

// Run after the main query is set so we can reliably detect blocks.
add_action( 'wp', __NAMESPACE__ . '\\disable_wpautop_for_gutenberg', 9 );

