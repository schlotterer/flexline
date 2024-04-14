<?php
/**
 * Adds OG tags to the head for better social sharing.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Adds OG tags to the head for better social sharing.
 *
 * @author Corey Collins
 *
 * @return string An empty string if Yoast is not found, otherwise a block of meta tag HTML.
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