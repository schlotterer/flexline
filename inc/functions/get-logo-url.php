<?php
/**
 * Get logo from Gutenberg logo block
 *
 * @package flexline
 */

namespace FlexLine;

// Function to get the site logo URL from the Site Editor block
function get_site_logo_from_block() {
	// Assuming the header template part is used and its slug is 'header'
	$header_template_part = get_block_template( 'theme_slug//header', 'wp_template_part' );

	if ( $header_template_part && isset( $header_template_part->content ) ) {
		$blocks = parse_blocks( $header_template_part->content );

		foreach ( $blocks as $block ) {
			if ( $block['blockName'] === 'core/site-logo' ) {
				if ( isset( $block['attrs']['url'] ) ) {
					return esc_url( $block['attrs']['url'] );
				}
			}
		}
	}
	return '';
}
