<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds custom classes to the array of body classes.
 *
 * @author Joel Schlotterer
 *
 * @param array $classes Classes for the body element.
 *
 * @return array Body classes.
 */
function body_classes( $classes ) {
	// Allows for incorrect snake case like is_IE to be used without throwing errors.
	global $is_IE, $is_edge, $is_safari;

	// If it's IE, add a class.
	if ( $is_IE ) {
		$classes[] = 'ie';
	}

	// If it's Edge, add a class.
	if ( $is_edge ) {
		$classes[] = 'edge';
	}

	// If it's Safari, add a class.
	if ( $is_safari ) {
		$classes[] = 'safari';
	}

	// Are we on mobile?
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	// Give all pages a unique class.
	if ( is_page() ) {
		$classes[] = 'page-' . basename( get_permalink() );
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add a class if header is fixed all the time.
	$show_menu_on_scroll = get_option( 'flexline_show_menu_on_scroll_up', false );
	if ( "1" === $show_menu_on_scroll ) {
		$classes[] = 'headroom-in-use';
	}
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( "1" === $show_menu_all_the_time ) {
		$classes[] = 'headroom--fixed-all-the-time';
	}

	// Adds "no-js" class. If JS is enabled, this will be replaced (by javascript) to "js".
	$classes[] = 'no-js';

	// Adds flexline class.
	$classes[] = 'flexline';

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
