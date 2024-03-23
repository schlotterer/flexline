<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display the main phone number.
 * Generates a tel link or an anchor link based on the presence of a # symbol,
 * including accessibility features for better screen reader support.
 * Uses "Main Phone Title" from the customizer for alt, aria-labels, and link text.
 *
 * @return string The phone number as a link.
 * @usage [flexline_phone_number]
 */
function flexline_phone_number_shortcode() {
    // Fetch the href value from a custom function that determines the link type
    $href = flexline_get_phone_button_link();
    
    // Fetch the "Main Phone Title" if set, otherwise fallback to the phone number itself
    $mainPhoneTitle = get_theme_mod('flexline_main_phone_title', '');
    $linkText = get_theme_mod('flexline_main_phone_number', '');

    // Determine the appropriate aria-label and link text
    $aria_label = !empty($mainPhoneTitle) ? $mainPhoneTitle : "Call us";
    if (strpos($href, 'tel:') !== false) {
        // If it's a tel link and Main Phone Title is set, use it; otherwise, use the phone number
        $linkText = !empty($mainPhoneTitle) ? $mainPhoneTitle : $linkText;
    } else {
        // For non-tel links, use the Main Phone Title as the link text if available
        $linkText = $aria_label;
    }
    
    // Build the link HTML with accessibility attributes
    $link_html = sprintf('<a href="%s" aria-label="%s">%s</a>', $href, esc_attr($aria_label), esc_html($linkText));

    return $link_html;
}
add_shortcode('flexline_phone_number', __NAMESPACE__ . '\flexline_phone_number_shortcode');