<?php
/**
 * Security functions (conditional) migrated from Utilities plugin.
 *
 * @package flexline
 */

namespace FlexLine;

defined('ABSPATH') || exit;

/**
 * Register conditional hardening hooks.
 */
function flexline_register_security_hooks() {
    $opts = \FlexLine\flexline_utilities_get_options();

    if ( ! empty( $opts['remove_generator'] ) ) {
        add_filter( 'the_generator', '__return_false' );
    }

    if ( ! empty( $opts['disable_xmlrpc'] ) ) {
        add_filter( 'xmlrpc_enabled', '__return_false' );
    }

    if ( ! empty( $opts['rest_cors_allow_all'] ) ) {
        add_filter( 'rest_pre_serve_request', function( $served, $result, $request ) {
            if ( ! headers_sent() ) {
                header( 'Access-Control-Allow-Origin: *' );
                header( 'Vary: Origin', false );
            }
            return $served;
        }, 10, 3 );
    }
}
add_action( 'init', __NAMESPACE__ . '\\flexline_register_security_hooks' );

/**
 * Optional original CORS function (not used by default).
 */
function cors_control() {
    header( 'Access-Control-Allow-Origin: *' );
}

