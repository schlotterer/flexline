<?php
/**
 * Miscellaneous Utilities hooks (shortcodes in meta, SVG mimes).
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined('ABSPATH') || exit;

// Allow shortcodes in various meta fields.
add_filter( 'the_title', 'do_shortcode' );
add_filter( 'single_post_title', 'do_shortcode' );
add_filter( 'wpseo_title', 'do_shortcode' );
add_filter( 'wpseo_metadesc', 'do_shortcode' );
add_filter( 'wpseo_opengraph_title', 'do_shortcode' );
add_filter( 'wpseo_opengraph_desc', 'do_shortcode' );
add_filter( 'wpseo_opengraph_site_name', 'do_shortcode' );
add_filter( 'wpseo_twitter_title', 'do_shortcode' );
add_filter( 'wpseo_twitter_description', 'do_shortcode' );
add_filter( 'the_excerpt', 'do_shortcode' );

/**
 * Enable custom mime types (SVG, SVGZ).
 */
function custom_mime_types( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\\custom_mime_types' );

