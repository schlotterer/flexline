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
	if ( is_admin() || ! is_singular() ) {
		return;
	}

	$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	if ( ! $thumbnail_id ) {
		return;
	}

	$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	if ( ! $image || empty( $image[0] ) ) {
		return;
	}

	$featured_image_url = $image[0];
	$image_srcset       = wp_get_attachment_image_srcset( $thumbnail_id, 'full' );
	$image_sizes        = wp_get_attachment_image_sizes( $thumbnail_id, 'full' );

	echo '<link rel="preload" href="' . esc_url( $featured_image_url ) . '" as="image" fetchpriority="high"';
	if ( $image_srcset ) {
		echo ' imagesrcset="' . esc_attr( $image_srcset ) . '"';
	}
	if ( $image_sizes ) {
		echo ' imagesizes="' . esc_attr( $image_sizes ) . '"';
	}
	echo ' />';
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_assets', 1 );
