<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display the main phone number with optional custom link and text.
 * This shortcode generates a telephone link or an anchor link based on the presence of a "#" symbol in the phone number.
 * It utilizes the "Main Phone Title" from the WordPress Customizer for the link text and aria-label by default.
 * Users can override the link URL and text via shortcode attributes for custom usage.
 *
 * Usage:
 * [flexline_phone_number] - Uses the phone number and "Main Phone Title" from the Customizer settings.
 * [flexline_phone_number link="tel:6665554444"] - Overrides the default or Customizer-defined link with a custom link - make sure to include the "tel:" prefix if it's a phone number.
 * [flexline_phone_number text="Custom Text"] - Overrides the default or Customizer-defined link text with custom text.
 * [flexline_phone_number link="http://example.com" text="Custom Text"] - Overrides both the link and text.
 *
 * @param array $atts Shortcode attributes - 'link' for custom URL, 'text' for custom link text.
 * @return string HTML content for the phone number link.
 */
function flexline_phone_number_shortcode($atts) {
    // Define default attributes for the shortcode
    $atts = shortcode_atts(array(
        'link' => '', // Optional custom link
        'text' => '', // Optional custom text
    ), $atts, 'flexline_phone_number');

    // Use the custom link if provided, otherwise use the default phone link logic
    $href = !empty($atts['link']) ? esc_url($atts['link']) : flexline_get_phone_button_link();
    
    // Fetch the "Main Phone Title" if set, otherwise fallback to the phone number itself
    $mainPhoneTitle = get_theme_mod('flexline_main_phone_title', '');
    $defaultLinkText = get_theme_mod('flexline_main_phone_number', '');

    // Use custom text if provided, otherwise determine the appropriate text
    $linkText = !empty($atts['text']) ? $atts['text'] : (!empty($mainPhoneTitle) ? $mainPhoneTitle : $defaultLinkText);

    // Determine the appropriate aria-label
    $aria_label = !empty($mainPhoneTitle) ? $mainPhoneTitle : "Call us";
    if (empty($atts['text']) && strpos($href, 'tel:') !== false) {
        // If it's a tel link and no custom text is set, and Main Phone Title is set, use it; otherwise, use the phone number
        $linkText = !empty($mainPhoneTitle) ? $mainPhoneTitle : $linkText;
    } else if (empty($atts['text'])) {
        // For non-tel links or custom links without custom text, use the Main Phone Title as the link text if available
        $linkText = $aria_label;
    }
    
    // Build the link HTML with accessibility attributes
    $link_html = sprintf('<a href="%s" aria-label="%s">%s</a>', $href, esc_attr($aria_label), esc_html($linkText));

    return $link_html;
}
add_shortcode('flexline_phone_number', __NAMESPACE__ . '\flexline_phone_number_shortcode');