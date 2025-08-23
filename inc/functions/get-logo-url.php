<?php
/**
 * Get logo from Gutenberg logo block
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Retrieves the site logo URL from the Site Editor block.
 *
 * @return string The site logo URL or an empty string if none is found.
 */
function get_site_logo_from_block() {
	// Assuming the header template part is used and its slug is 'header'.
	$header_template_part = get_block_template( wp_get_theme()->get_stylesheet() . '//header', 'wp_template_part' );

	if ( $header_template_part && isset( $header_template_part->content ) ) {
		$blocks = parse_blocks( $header_template_part->content );

		foreach ( $blocks as $block ) {
			if ( 'core/site-logo' === $block['blockName'] ) {
				if ( isset( $block['attrs']['url'] ) ) {
					return esc_url( $block['attrs']['url'] );
				}
			}
		}
	}
	return '';
}
