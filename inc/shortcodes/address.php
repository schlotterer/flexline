<?php
/**
 * Shortcode for displaying contact information.
 *
 * This shortcode dynamically fetches address and phone number details from the theme settings,
 * allowing for easy updates through the WordPress admin panel.
 *
 * 
 * @usage [flexline_contact_info] - Place this shortcode in any post, page, or widget area to display the contact information.
 * @note Ensure the 'flexline_main_phone_number', 'flexline_main_phone_title', 'flexline_address_street', 'flexline_address_city',
 * 'flexline_address_state', and 'flexline_address_zip' are properly set in the Flexline theme settings to see the effects.
 * 
 * 
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Renders an address block with contact information.
 *
 * @return string The formatted HTML content containing the contact information and Google Maps link.
 */
function flexline_contact_info_shortcode() {
	// Retrieve customizer settings for phone link and phone title.
	$href = flexline_get_phone_button_link();

	$main_phone_title = get_option( 'flexline_main_phone_title', '' );
	$phone_number     = get_option( 'flexline_main_phone_number', '' );
	$phone_link_text  = ! empty( $main_phone_title ) ? $main_phone_title : $phone_number;
	$aria_label       = ! empty( $main_phone_title ) ? $main_phone_title : 'Call us';

	// Determine whether to show the phone link.
	$show_phone_link = ! ( false !== strpos( $phone_number, '#' ) && false === strpos( $phone_number, '/' ) );

	$street = get_option( 'flexline_address_street', '' );
	$city   = get_option( 'flexline_address_city', '' );
	$state  = get_option( 'flexline_address_state', '' );
	$zip    = get_option( 'flexline_address_zip', '' );

	// Format the address.
	$formatted_address = '<span>' . esc_html( $street ) . '</span><br><span>' . esc_html( $city ) . ', ' . esc_html( $state ) . ' ' . esc_html( $zip ) . '</span>';
	$google_maps_url   = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $street . ' ' . $city . ' ' . $state . ' ' . $zip );

	// Start output buffering.
	ob_start();
	?>
	<address class="contact-info">
		<?php if ( $show_phone_link && ! empty( $href ) ) : ?>
			<p><a class="phone-link" href="<?php echo esc_url( $href ); ?>" aria-label="<?php echo esc_attr( $aria_label ); ?>" title="<?php echo esc_attr( $aria_label ); ?>"><span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg></span> <?php echo esc_html( $phone_link_text ); ?></a></p>
		<?php endif; ?>
		<?php if ( ! empty( $formatted_address ) ) : ?>
			<p>
				<?php
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped - escaped above. 
				echo $formatted_address; ?><br>
				<a class="map-link" href="<?php echo esc_url( $google_maps_url ); ?>" target="_blank" title="View on Google Maps"><span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg></span> View on Google Maps</a>
			</p>
		<?php endif; ?>
	</address>
	<?php
	// Return the buffered content.
	return ob_get_clean();
}
add_shortcode( 'flexline_contact_info', __NAMESPACE__ . '\flexline_contact_info_shortcode' );
