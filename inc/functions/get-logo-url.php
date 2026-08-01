<?php
/**
 * Get logo from Gutenberg Site Logo block in a template part.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Retrieve the configured site logo URL, with a site icon fallback.
 *
 * @return string The site logo URL or an empty string if none is configured.
 */
function get_site_logo_from_block() {
	$custom_logo_id = (int) get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
		if ( $logo_url ) {
			return esc_url( $logo_url );
		}
	}

	$site_icon_url = get_site_icon_url( 512 );
	return $site_icon_url ? esc_url( $site_icon_url ) : '';
}
