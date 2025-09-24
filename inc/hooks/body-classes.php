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
	if ( '1' === $show_menu_on_scroll ) {
		$classes[] = 'headroom-in-use';
	}
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( '1' === $show_menu_all_the_time ) {
		$classes[] = 'headroom--fixed-all-the-time';
	}

	// Adds "no-js" class. If JS is enabled, this will be replaced (by javascript) to "js".
	$classes[] = 'no-js';

	// Adds flexline class.
	$classes[] = 'flexline';

	// Slide-in button visibility classes for CSS padding (no new options; mirror existing settings).
	if ( '1' === get_option( 'flexline_hide_search_tablet', false ) ) {
		$classes[] = 'slidein-hide-on-tablet';
	}
	if ( '1' === get_option( 'flexline_hide_search_desktop', false ) ) {
		$classes[] = 'slidein-hide-on-desktop';
	}

	// Web4SL call/phone button visibility -> add body classes for padding-left.
	// Only if the plugin appears active to avoid leaking classes.
	$web4sl_active  = false;
	$active_plugins = (array) get_option( 'active_plugins', array() );
	if ( is_multisite() ) {
		$network_active = (array) get_site_option( 'active_sitewide_plugins', array() );
		$active_plugins = array_merge( $active_plugins, array_keys( $network_active ) );
	}
	foreach ( $active_plugins as $plugin_path ) {
		if ( false !== strpos( $plugin_path, 'web4sl' ) ) {
			$web4sl_active = true;
			break;
		}
	}

	if ( $web4sl_active ) {
		$hide_desktop = (bool) get_option( 'web4sl_hide_phone_desktop', false );
		$hide_tablet  = (bool) get_option( 'web4sl_hide_phone_tablet', false );
		$hide_mobile  = (bool) get_option( 'web4sl_hide_phone_mobile', false );

		if ( ! $hide_mobile ) {
			$classes[] = 'web4sl-phone-link-show-on-mobile';
		}
		if ( ! $hide_tablet ) {
			$classes[] = 'web4sl-phone-link-show-on-tablet';
		}
		if ( ! $hide_desktop ) {
			$classes[] = 'web4sl-phone-link-show-on-desktop';
		}
	}

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
