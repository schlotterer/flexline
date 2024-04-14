<?php
/**
 * Adds shortcodes to meta.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Allows shortcodes for meta
 *
 * @author Joel Schlotterer
 *
 * 
 */
// Activate shortcode function in Post Title.
add_filter( 'the_title', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'single_post_title', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_title', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_metadesc', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_opengraph_title', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_opengraph_desc', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_opengraph_site_name', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_twitter_title', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'wpseo_twitter_description', __NAMESPACE__ . '\do_shortcode' );
add_filter( 'the_excerpt', __NAMESPACE__ . '\do_shortcode' );