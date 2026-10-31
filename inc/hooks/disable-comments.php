<?php
/**
 * Disable all comments sitewide (front end, admin UI, REST endpoints).
 *
 * Provides a comprehensive “no comments” mode by closing comments/pings,
 * stripping UI and REST endpoints, and removing scripts/widgets.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Boot handler to disable comments globally when option enabled.
 *
 * @return void
 */
function disable_comments_boot() {
	$opts = get_option( 'flexline_utilities', array() );
	if ( empty( $opts['disable_all_comments'] ) ) {
		return; // Feature is off.
	}

	// 1) Front-end: close comments & pings; hide existing.
	add_filter( 'comments_open', '__return_false', 20, 2 );
	add_filter( 'pings_open', '__return_false', 20, 2 );
	add_filter( 'comments_array', '__return_empty_array', 10, 2 );

	// Default new posts to closed (UI-level).
	add_filter( 'pre_option_default_comment_status', fn() => 'closed' );
	add_filter( 'pre_option_default_ping_status', fn() => 'closed' );

	// Don’t enqueue comment-reply.js.
	add_action(
		'wp_enqueue_scripts',
		function () {
			wp_deregister_script( 'comment-reply' );
		},
		20
	);

	// 2) Post types: remove support.
	add_action(
		'init',
		function () {
			foreach ( get_post_types() as $pt ) {
				if ( post_type_supports( $pt, 'comments' ) ) {
					remove_post_type_support( $pt, 'comments' );
				}
				if ( post_type_supports( $pt, 'trackbacks' ) ) {
					remove_post_type_support( $pt, 'trackbacks' );
				}
			}
		},
		100
	);

	// 3) Admin UI cleanup.
	add_action(
		'admin_menu',
		function () {
			remove_menu_page( 'edit-comments.php' );
		},
		999
	);

	add_action(
		'admin_init',
		function () {
			global $pagenow;
			if ( 'edit-comments.php' === $pagenow ) {
				wp_safe_redirect( admin_url() );
				exit;
			}
			// Remove “Recent Comments” from Dashboard.
			remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		},
		100
	);

	add_action(
		'admin_bar_menu',
		function ( $wp_admin_bar ) {
			$wp_admin_bar->remove_node( 'comments' );
		},
		999
	);

	// 4) Widgets: remove Recent Comments widget.
	add_action(
		'widgets_init',
		function () {
			unregister_widget( 'WP_Widget_Recent_Comments' );
		},
		11
	);

	// 5) REST API: remove comments endpoints.
	add_filter(
		'rest_endpoints',
		function ( $endpoints ) {
			foreach ( array_keys( $endpoints ) as $route ) {
				if ( 0 === strpos( $route, '/wp/v2/comments' ) ) {
					unset( $endpoints[ $route ] );
				}
			}
			return $endpoints;
		}
	);
}
add_action( 'init', __NAMESPACE__ . '\\disable_comments_boot', 9 );
