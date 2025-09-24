<?php
/**
 * Replace the WordPress login logo with the site logo.
 *
 * Provides an optional black-on-black duotone treatment.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Try to resolve the site logo URL.
 *
 * Priority:
 * - Site Editor block logo via FlexLine utility (if available)
 * - Custom Logo (Customizer)
 * - Site Icon (favicon) as a last resort
 *
 * @return string Logo URL or empty string.
 */
function login_logo_get_url() {
	$url = '';

	// Prefer the Site Editor block logo if the helper exists.
	if ( function_exists( __NAMESPACE__ . '\\get_site_logo_from_block' ) ) {
		$maybe = get_site_logo_from_block();
		if ( is_string( $maybe ) && $maybe ) {
			$url = esc_url_raw( $maybe );
		}
	}

	// Fallback to Customizer custom logo.
	if ( ! $url ) {
		$custom_logo_id = (int) get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id ) {
			$maybe = wp_get_attachment_image_url( $custom_logo_id, 'full' );
			if ( $maybe ) {
				$url = esc_url_raw( $maybe );
			}
		}
	}

	// Fallback to site icon (favicon) if set.
	if ( ! $url ) {
		$maybe = get_site_icon_url( 256 );
		if ( $maybe ) {
			$url = esc_url_raw( $maybe );
		}
	}

	return $url;
}

/**
 * Output CSS to replace the login logo.
 *
 * Filters:
 * - `flexline_login_logo_duotone` (bool): Apply black-on-black duotone. Default true.
 * - `flexline_login_logo_color` (string): Hex/RGB color used when masking. Default '#000'.
 * - `flexline_login_logo_use_mask` (bool): Use CSS mask technique when possible. Default true.
 */
function replace_wp_login_logo() {
	$logo_url = login_logo_get_url();
	if ( ! $logo_url ) {
		return; // No change if no site logo found.
	}

	$apply_duotone = (bool) apply_filters( 'flexline_login_logo_duotone', true );
	$mask_color    = (string) apply_filters( 'flexline_login_logo_color', '#000' );
	$use_mask      = (bool) apply_filters( 'flexline_login_logo_use_mask', true );

	// Basic sanitization for CSS color value (allow simple hex or rgb/rgba keywords).
	if ( ! preg_match( '/^(#[0-9a-fA-F]{3,8}|rgba?\([^\)]+\)|hsl[a]?\([^\)]+\)|[a-zA-Z]+)$/', $mask_color ) ) {
		$mask_color = '#000';
	}

	// Build CSS with a mask-based duotone fallback to filter-based.
	$css = 'body.login #login h1 a{background-position:center;background-repeat:no-repeat;background-size:contain;width:84px;height:84px;}';

	if ( $apply_duotone && $use_mask ) {
		// Use the logo as a mask and fill with black for a crisp silhouette.
		$css .= sprintf(
			'body.login #login h1 a{background-image:none!important;-webkit-mask-image:url(%1$s);mask-image:url(%1$s);-webkit-mask-size:contain;mask-size:contain;-webkit-mask-position:center;mask-position:center;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;width:300px;background-color:%2$s;}',
			esc_url( $logo_url ),
			esc_attr( $mask_color )
		);
	} else {
		// Show original image; optionally force to black via filters.
		$css .= sprintf(
			'body.login #login h1 a{background-image:url(%1$s)!important;}',
			esc_url( $logo_url )
		);
		if ( $apply_duotone ) {
			// Force-to-black look without masking (works broadly on modern browsers).
			$css .= 'body.login #login h1 a{filter:grayscale(1) brightness(0);}';
		}
	}

	// Tweak link focus outline contrast for accessibility.
	$css .= 'body.login #login h1 a:focus{box-shadow:0 0 0 2px #fff,0 0 0 4px #2271b1;}';

	wp_add_inline_style( 'login', $css );
}
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\replace_wp_login_logo' );

/**
 * Point the login logo link to the site home.
 *
 * @return string
 */
function login_logo_url() {
	return home_url( '/' );
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\\login_logo_url' );

/**
 * Set the login logo title to the site name.
 *
 * @return string
 */
function login_logo_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', __NAMESPACE__ . '\\login_logo_title' );
