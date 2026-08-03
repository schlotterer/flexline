<?php
/**
 * Miscellaneous Utilities hooks (shortcodes in meta, SVG mimes).
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined( 'ABSPATH' ) || exit;

// Allow shortcodes in various meta fields.
add_filter( 'the_title', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'single_post_title', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_title', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_metadesc', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_opengraph_title', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_opengraph_desc', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_opengraph_site_name', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_twitter_title', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'wpseo_twitter_description', __NAMESPACE__ . '\\render_allowed_shortcodes' );
add_filter( 'the_excerpt', __NAMESPACE__ . '\\render_allowed_shortcodes' );

/**
 * Render only approved Web4SL/FlexLine shortcodes when Web4SL is available.
 *
 * @param mixed $value Filtered value.
 * @return mixed
 */
function render_allowed_shortcodes( $value ) {
	if ( class_exists( '\\Web4SL_Core\\Shortcodes' ) ) {
		return \Web4SL_Core\Shortcodes::render_allowed_shortcodes( $value );
	}

	return $value;
}

/**
 * Enable the SVG mime type; SVG content is sanitized by Web4SL before upload.
 *
 * @param array $mimes Allowed mime types keyed by file extension.
 * @return array Filtered mime types.
 */
function custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\\custom_mime_types' );
