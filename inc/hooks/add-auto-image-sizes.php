<?php
/**
 * Adds auto to sizes attribute for images.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds auto to the sizes attribute for all images.
 *
 * @author Joel Schlotterer
 *
 * @param array $attr Attributes for the image markup.
 *
 * @return array Modified attributes.
 */
function add_auto_to_sizes_attribute( $attr ) {
	if ( isset( $attr['sizes'] ) && 0 !== strpos( $attr['sizes'], 'auto' ) ) {
		$attr['sizes'] = 'auto, ' . trim( $attr['sizes'] );
	}

	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', __NAMESPACE__ . '\\add_auto_to_sizes_attribute', 10, 1 );
