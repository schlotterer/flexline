<?php
/**
 * Provides a fallback image URL when no featured image is set.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Return Fallback image options.
 *
 * @author Joel Schlotterer
 * @return string url for image.
 */
function feature_image_fallback() {
	$theme_level_fallback = get_template_directory_uri() . '/assets/built/images/fallback.webp';
	$fallback_setting_url = get_option( 'flexline_feature_fallback', '' );
	$fallback_url         = isset( $fallback_setting_url ) && '' !== $fallback_setting_url ? $fallback_setting_url : $theme_level_fallback;
	return $fallback_url;
}
