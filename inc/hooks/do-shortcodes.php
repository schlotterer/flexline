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