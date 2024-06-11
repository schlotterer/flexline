<?php
/**
 * Adds custom JavaScript settings for the customizer.
 *
 * This function outputs JavaScript settings for customizing the phone link
 * and its visibility on different devices based on theme customizer settings.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Adds custom JavaScript settings for the customizer.
 */
function flexline_customize_js_settings() {
	// Use the existing function to get the processed phone link.
	$href = esc_url( flexline_get_phone_button_link() );

	// Fetch the main phone title for use in aria-label/title.
	$main_phone_title = get_option( 'flexline_main_phone_title', '' );

	// Define an accessible label based on the link type and main phone title.
	$aria_label = ! empty( $main_phone_title ) ? esc_html( $main_phone_title ) : esc_html( 'Contact us' );

	?>
	<script type="text/javascript">
		var FlexlineCustomizerSettings = {
			phoneLink: '<?php echo esc_url( $href ); ?>', // This now uses the processed phone link.
			ariaLabel: '<?php echo esc_attr( $aria_label ); ?>', // Uses the main phone title if available.
			hideOnDesktop: <?php echo get_option( 'flexline_hide_phone_desktop', false ) ? 'true' : 'false'; ?>,
			hideOnTablet: <?php echo get_option( 'flexline_hide_phone_tablet', false ) ? 'true' : 'false'; ?>,
			hideOnMobile: <?php echo get_option( 'flexline_hide_phone_mobile', false ) ? 'true' : 'false'; ?>
		};
	</script>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\flexline_customize_js_settings' );
