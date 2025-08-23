<?php
/**
 * Prevents WordPress from adding a decoding attribute to images,
 * letting browsers handle decoding behavior.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Removes decoding tags from all images
 *
 * @package flexline
 */
function flexline_remove_decoding() {
	$auto = false;
	return $auto;
}
add_filter( 'wp_img_tag_add_decoding_attr', __NAMESPACE__ . '\flexline_remove_decoding', 20 );
