<?php
/**
 * Security functions migrated from Utilities plugin.
 *
 * Login routing and alternate-login hardening intentionally do not live in the
 * theme. SiteGround Security Optimizer, Wordfence, or an audited WordPress
 * 2FA plugin owns authentication policy for each deployment.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Register the small, opt-in security utilities that remain theme-owned.
 *
 * @return void
 */
function flexline_register_security_hooks(): void {
	$opts = \FlexLine\flexline_utilities_get_options();

	if ( ! empty( $opts['remove_generator'] ) ) {
		add_filter( 'the_generator', '__return_false' );
	}

	if ( ! empty( $opts['disable_xmlrpc'] ) ) {
		add_filter( 'xmlrpc_enabled', '__return_false' );
	}

	if ( ! empty( $opts['rest_cors_allow_all'] ) ) {
		add_filter(
			'rest_pre_serve_request',
			function ( $served, $result, $request ) {
				unset( $result, $request );
				if ( ! headers_sent() ) {
					header( 'Access-Control-Allow-Origin: *' );
					header( 'Vary: Origin', false );
				}
				return $served;
			},
			10,
			3
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\flexline_register_security_hooks', 1 );

/**
 * Optional original CORS function (not used by default).
 *
 * @return void
 */
function cors_control(): void {
	header( 'Access-Control-Allow-Origin: *' );
}
