<?php
/**
 * Adds OG tags to the head for better social sharing.
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Removes decoding tags from all images
 *
 * @package flexlinetheme
 */
function flexlinetheme_remove_decoding() {
	$auto = false;
	return $auto;
}
add_filter( 'wp_img_tag_add_decoding_attr', __NAMESPACE__ . '\flexlinetheme_remove_decoding', 20 );
