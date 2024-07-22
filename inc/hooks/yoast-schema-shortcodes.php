<?php
/**
 * Adds shortcodes to Yoast schema.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Add shortcodes to Yoast schema.
 *
 * This function replaces placeholders in Yoast SEO schema with actual data
 * from the theme settings.
 *
 * @param array $data The schema data to be filtered.
 * @return array The filtered schema data with replaced placeholders.
 *
 * @author Joel Schlotterer
 */
function flexline_schema_fix( $data ) {
	$site_name         = get_bloginfo( 'name' ) ? '<span class="site-name">' . esc_html( get_bloginfo( 'name' ) ) . '</span>' : '<span class="site-name">Flexline</span>';
	$formatted_address = '';
	if ( get_option( 'flexline_address_city', '' ) && get_option( 'flexline_address_state', '' ) ) {
		$city              = get_option( 'flexline_address_city', '' );
		$state             = get_option( 'flexline_address_state', '' );
		$formatted_address = '<span>' . esc_html( $city ) . ', ' . esc_html( $state ) . '</span>';
	}

	if ( isset( $data['@graph'] ) ) {
		foreach ( $data['@graph'] as $key => $graph ) {
			// Define fields to search for placeholders.
			$fields = array( 'description', 'name', 'headline', 'alternateName', 'text' ); // Add more fields as needed.

			foreach ( $fields as $field ) {
				if ( isset( $graph[ $field ] ) ) {
					$data['@graph'][ $key ][ $field ] = str_replace( '[flexline_site_name]', $site_name, $graph[ $field ] );
					$data['@graph'][ $key ][ $field ] = str_replace( '[flexline_city_state]', $formatted_address, $graph[ $field ] );
				}
			}
		}
	}

	return $data;
}

add_filter( 'wpseo_json_ld_output', __NAMESPACE__ . '\flexline_schema_fix', 10, 1 );
