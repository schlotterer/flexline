<?php
/**
 * Return Substring from between two strings.
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Return Fallback image options.
 *
 * @author Joel Schlotterer
 * @return string url for image.
 */
function feature_image_fallback() {
	$fallback_url = get_option( 'flexlinetheme_feature_fallback', '' ) ? get_option( 'flexlinetheme_feature_fallback', '' ) : get_theme_file_uri() . '/assets/built/images/fallback.webp';
	return $fallback_url;
}
