<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display the main phone number as a tel link.
 *
 * @return string The phone number as a tel link.
 * @usage [flexline_phone_number]
 */
function flexline_phone_number_shortcode() {
    // Retrieve the phone number from the customizer settings
    $phone_number = get_theme_mod('flexline_main_phone_number', '');
    $tel_link_number = preg_replace('/\D+/', '', $phone_number);
    // Return the phone number as a tel link if it's set
    if (!empty($phone_number)) {
        return '<a href="tel:' . esc_attr($tel_link_number) . '">' . esc_html($phone_number) . '</a>';
    }

    return ''; // Return empty if the phone number is not set
}
add_shortcode('flexline_phone_number', __NAMESPACE__ . '\flexline_phone_number_shortcode');
