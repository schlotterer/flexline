<?php
/**
 * Return Substring from between two strings.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Return Fallback image options.
 *
 * @author Joel Schlotterer
 * @return string url for image.
 */
function feature_image_fallback() {
	$fallback_url = get_theme_mod( 'flexline_feature_fallback', '' ) ? get_theme_mod( 'flexline_feature_fallback', '' ) : get_theme_file_uri() . '/assets/built/images/fallback.webp';
	return $fallback_url;
}
