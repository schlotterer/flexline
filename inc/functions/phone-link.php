<?php
/**
 * Return final href string for a phone number link.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Generates an href string for a phone button link based on the phone number's content.
 *
 * @return string Href value for the phone link.
 */
function flexline_get_phone_button_link() {
	$phone_number = get_option( 'flexline_main_phone_number', '' );

	// Early return if the phone number field is empty.
	if ( empty( $phone_number ) ) {
		return '';
	}

	// Return the phone number as is if it contains a hash symbol.
	if ( strpos( $phone_number, '#' ) !== false ) {
		return esc_url( $phone_number );
	}

	// Extract numeric content from the phone number.
	$numeric_phone_number = preg_replace( '/\D/', '', $phone_number );

	// Return the phone number as a tel: link if it has enough digits (assumed 7 or more for validity).
	if ( strlen( $numeric_phone_number ) >= 7 ) {
		return 'tel:' . esc_attr( $numeric_phone_number );
	}

	// Return the phone number as is if it doesn't have enough digits for a tel: link.
	return esc_html( $phone_number );
}
