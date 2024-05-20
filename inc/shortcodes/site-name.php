<?php
/**
 * Shortcode for displaying the site name.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Shortcode to display the site name.
 *
 * @return string The formatted site name.
 * @usage [flexline_site_name] this is for use primarily in starter content.
 */
function flexline_site_name_shortcode() {
	// Get the site name.
	$site_name = get_bloginfo( 'name' ) ? '<span class="site-name">' . esc_html( get_bloginfo( 'name' ) ) . '</span>' : '<span class="site-name">Flexline</span>';

	// Start output buffering.
	ob_start();
	echo esc_html( $site_name ); // Escaped earlier.
	// Return the buffered content.
	return ob_get_clean();
}
add_shortcode( 'flexline_site_name', __NAMESPACE__ . '\flexline_site_name_shortcode' );
