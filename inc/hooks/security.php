<?php
/**
 * Security functions (conditional) migrated from Utilities plugin.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Write a debug log line only when WP_DEBUG is enabled.
 *
 * @param string $message Log message.
 * @return void
 */
function flexline_security_debug_log( string $message ): void {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log( '[FlexLine Security] ' . $message );
	}
}

/**
 * Return a generic 404 to avoid leaking login endpoint details.
 *
 * @return void
 */
function flexline_send_obscured_404(): void {
	if ( ! headers_sent() ) {
		status_header( 404 );
		nocache_headers();
	}
	wp_die( 'Not Found', 'Not Found', array( 'response' => 404 ) );
}

/**
 * Return true when custom login hardening is enabled.
 *
 * @param array $opts Utilities options.
 * @return bool
 */
function flexline_is_custom_login_enabled( array $opts ): bool {
	$has_slug = ! empty( $opts['custom_login_slug'] );
	if ( ! $has_slug ) {
		return false;
	}

	if ( ! empty( $opts['custom_login_enabled'] ) ) {
		return true;
	}

	// Failsafe: if strict mode + fallback credentials are configured, enforce hardening even
	// when the enable checkbox value is unexpectedly dropped by settings serialization.
	return ! empty( $opts['custom_login_strict_mode'] )
		&& ! empty( $opts['custom_login_fallback_key'] )
		&& ! empty( $opts['custom_login_fallback_value'] );
}

/**
 * Normalize the current request path relative to home path.
 *
 * @return string Path without leading/trailing slash.
 */
function flexline_get_request_path(): string {
	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( (string) $_SERVER['REQUEST_URI'] ) : '/';
	$path        = (string) wp_parse_url( $request_uri, PHP_URL_PATH );
	$path        = trim( $path, '/' );

	$home_path = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$home_path = trim( $home_path, '/' );

	if ( '' !== $home_path && ( $path === $home_path || 0 === strpos( $path, $home_path . '/' ) ) ) {
		$path = (string) substr( $path, strlen( $home_path ) );
		$path = trim( $path, '/' );
	}

	return $path;
}

/**
 * Return true when request should bypass login hardening checks.
 *
 * @return bool
 */
function flexline_should_bypass_login_hardening(): bool {
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		return true;
	}
	if ( defined( 'DOING_CRON' ) && DOING_CRON ) {
		return true;
	}
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		return true;
	}
	if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
		return true;
	}
	return false;
}

/**
 * Return custom login URL.
 *
 * @param array $opts Utilities options.
 * @param array $query Optional query args.
 * @return string
 */
function flexline_get_custom_login_url( array $opts, array $query = array() ): string {
	$slug = trim( (string) $opts['custom_login_slug'], '/' );
	$url  = home_url( '/' . $slug . '/' );
	if ( ! empty( $query ) ) {
		$url = add_query_arg( $query, $url );
	}
	return $url;
}

/**
 * Rewrite a URL that targets wp-login.php to use the custom login slug.
 *
 * @param string $url Original URL.
 * @param array  $opts Utilities options.
 * @return string
 */
function flexline_rewrite_login_url( string $url, array $opts ): string {
	$slug = trim( (string) $opts['custom_login_slug'], '/' );
	if ( '' === $slug ) {
		return $url;
	}
	$rewritten = preg_replace( '#/wp-login\.php\b#', '/' . $slug . '/', $url, 1 );
	return is_string( $rewritten ) ? $rewritten : $url;
}

/**
 * Return true when fallback query key/value are valid for this request.
 *
 * @param array $opts Utilities options.
 * @return bool
 */
function flexline_is_valid_login_fallback_request( array $opts ): bool {
	$key   = (string) ( $opts['custom_login_fallback_key'] ?? '' );
	$value = (string) ( $opts['custom_login_fallback_value'] ?? '' );
	if ( '' === $key || '' === $value ) {
		return false;
	}
	if ( ! isset( $_GET[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return false;
	}
	$provided = sanitize_text_field( wp_unslash( (string) $_GET[ $key ] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	return hash_equals( $value, $provided );
}

/**
 * Route custom login slug requests through wp-login.php.
 *
 * @param array $opts Utilities options.
 * @return void
 */
function flexline_maybe_handle_custom_login_request( array $opts ): void {
	if ( flexline_should_bypass_login_hardening() ) {
		return;
	}

	$path = flexline_get_request_path();
	$slug = trim( (string) $opts['custom_login_slug'], '/' );

	if ( '' === $slug || $path !== $slug ) {
		return;
	}

	if ( ! defined( 'FLEXLINE_CUSTOM_LOGIN_REQUEST' ) ) {
		define( 'FLEXLINE_CUSTOM_LOGIN_REQUEST', true );
	}
	$GLOBALS['pagenow'] = 'wp-login.php';
	flexline_security_debug_log( 'Serving wp-login.php via custom slug "' . $slug . '"' );

	require ABSPATH . 'wp-login.php';
	exit;
}

/**
 * Block direct wp-login.php access in strict mode unless bypass is valid.
 *
 * @return void
 */
function flexline_maybe_block_default_login_request(): void {
	if ( flexline_should_bypass_login_hardening() ) {
		return;
	}

	$opts = flexline_utilities_get_options();
	if ( ! flexline_is_custom_login_enabled( $opts ) || empty( $opts['custom_login_strict_mode'] ) ) {
		return;
	}

	if ( defined( 'FLEXLINE_CUSTOM_LOGIN_REQUEST' ) && FLEXLINE_CUSTOM_LOGIN_REQUEST ) {
		return;
	}

	if ( flexline_is_valid_login_fallback_request( $opts ) ) {
		flexline_security_debug_log( 'Default login fallback key accepted.' );
		return;
	}

	flexline_security_debug_log( 'Blocked direct wp-login.php request with obscured 404.' );
	flexline_send_obscured_404();
}

/**
 * Block unauthenticated wp-admin requests in strict mode.
 *
 * @param array $opts Utilities options.
 * @return void
 */
function flexline_maybe_block_unauthenticated_admin_request( array $opts ): void {
	if ( flexline_should_bypass_login_hardening() ) {
		return;
	}

	if ( empty( $opts['custom_login_strict_mode'] ) || is_user_logged_in() ) {
		return;
	}

	$path = flexline_get_request_path();
	if ( 0 !== strpos( $path, 'wp-admin' ) ) {
		return;
	}

	$allowed = array(
		'wp-admin/admin-ajax.php',
		'wp-admin/admin-post.php',
	);
	if ( in_array( $path, $allowed, true ) ) {
		return;
	}

	flexline_security_debug_log( 'Blocked unauthenticated /wp-admin request with obscured 404: ' . $path );
	flexline_send_obscured_404();
}

/**
 * Filter login URL to use custom login slug.
 *
 * @param string      $login_url Original login URL.
 * @param string      $redirect Redirect URL.
 * @param bool|string $force_reauth Force reauth flag.
 * @return string
 */
function flexline_filter_login_url( $login_url, $redirect, $force_reauth ): string {
	$opts = flexline_utilities_get_options();
	if ( ! flexline_is_custom_login_enabled( $opts ) ) {
		return (string) $login_url;
	}

	$url = flexline_rewrite_login_url( (string) $login_url, $opts );
	unset( $redirect, $force_reauth );
	return $url;
}

/**
 * Filter lost password URL to use custom login slug.
 *
 * @param string $lostpassword_url Lost password URL.
 * @param string $redirect Redirect target.
 * @return string
 */
function flexline_filter_lostpassword_url( $lostpassword_url, $redirect ): string {
	$opts = flexline_utilities_get_options();
	if ( ! flexline_is_custom_login_enabled( $opts ) ) {
		return (string) $lostpassword_url;
	}

	$url = flexline_rewrite_login_url( (string) $lostpassword_url, $opts );
	unset( $redirect );
	return $url;
}

/**
 * Filter site_url login endpoints to custom login slug for plugin compatibility.
 *
 * @param string   $url Full URL.
 * @param string   $path Path relative to site URL.
 * @param string   $scheme Scheme context.
 * @param int|null $blog_id Blog ID.
 * @return string
 */
function flexline_filter_site_url_for_login( $url, $path, $scheme, $blog_id ): string {
	$opts = flexline_utilities_get_options();
	if ( ! flexline_is_custom_login_enabled( $opts ) ) {
		return (string) $url;
	}

	unset( $blog_id );
	$path = (string) $path;
	if ( false !== strpos( $path, 'wp-login.php' ) || in_array( (string) $scheme, array( 'login', 'login_post' ), true ) ) {
		return flexline_rewrite_login_url( (string) $url, $opts );
	}
	return (string) $url;
}

/**
 * Register conditional hardening hooks.
 *
 * @return void
 */
function flexline_register_security_hooks() {
	$opts = \FlexLine\flexline_utilities_get_options();
	flexline_security_debug_log(
		sprintf(
			'Loaded options: enabled=%s slug=%s strict=%s fallback_key=%s',
			empty( $opts['custom_login_enabled'] ) ? '0' : '1',
			(string) ( $opts['custom_login_slug'] ?? '' ),
			empty( $opts['custom_login_strict_mode'] ) ? '0' : '1',
			empty( $opts['custom_login_fallback_key'] ) ? '' : 'set'
		)
	);

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
				// Mark unused parameters to satisfy code analysis.
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

	if ( flexline_is_custom_login_enabled( $opts ) ) {
		add_filter( 'login_url', __NAMESPACE__ . '\\flexline_filter_login_url', 10, 3 );
		add_filter( 'lostpassword_url', __NAMESPACE__ . '\\flexline_filter_lostpassword_url', 10, 2 );
		add_filter( 'site_url', __NAMESPACE__ . '\\flexline_filter_site_url_for_login', 10, 4 );
		add_action( 'login_init', __NAMESPACE__ . '\\flexline_maybe_block_default_login_request', 1 );

		// Handle custom slug and strict wp-admin hardening for this request.
		flexline_maybe_handle_custom_login_request( $opts );
		flexline_maybe_block_unauthenticated_admin_request( $opts );
	}
}
add_action( 'init', __NAMESPACE__ . '\\flexline_register_security_hooks', 1 );

/**
 * Optional original CORS function (not used by default).
 *
 * @return void
 */
function cors_control() {
	header( 'Access-Control-Allow-Origin: *' );
}
