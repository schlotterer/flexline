<?php
/**
 * Shortcode to display copyright year.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Generates a shortcode for displaying the current year or a range from a specific starting year to the current year.
 *
 * @param array $atts {
 *     Optional. An array of attributes to customize the output.
 *
 *     @type string $starting_year The year from which to start the range. If not specified, only the current year will be displayed.
 *     @type string $separator The character or string to separate the starting year and the current year. Default is ' - '.
 * }
 *
 * @return string The formatted copyright year text. If the starting year is specified and differs from the current year,
 *                it returns a range (e.g., "2015 - 2021"). If the starting year is the current year or not provided, it returns just the current year.
 *
 * @usage To display just the current year: [flexline_copyright_year]
 *        To display a range from a specific year to the current year: [flexline_copyright_year starting_year="2015"]
 *        To customize the separator in the range: [flexline_copyright_year starting_year="2010" separator=" to "]
 */
function create_shortcode_copyright_year( $atts ) {
	// Setup defaults.
	$args = shortcode_atts(
		array(
			'starting_year' => '',
			'separator'     => ' - ',
		),
		$atts
	);

	$current_year = gmdate( 'Y' );

	// Return current year if starting year is empty.
	if ( ! $args['starting_year'] ) {
		return $current_year;
	}

	return esc_html( $args['starting_year'] . $args['separator'] . $current_year );
}

add_shortcode( 'flexline_copyright_year', __NAMESPACE__ . '\create_shortcode_copyright_year', 15 );
