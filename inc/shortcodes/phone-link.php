<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display the main phone number.
 * Generates a tel link or an anchor link based on the presence of a # symbol,
 * including accessibility features for better screen reader support.
 *
 * @return string The phone number as a link.
 * @usage [flexline_phone_number]
 */
function flexline_phone_number_shortcode() {
    
    $href = flexline_get_phone_button_link();
    $linkText = get_theme_mod('flexline_main_phone_number', '');
    $aria_label = "call us";
    if (strpos($href, 'tel:') !== false) {
        $linkText = $linkText;
    }else{
        $linkText =  $aria_label;
    }
    
    // Build the link HTML with accessibility attributes
    $link_html = sprintf('<a href="%s" aria-label="%s">%s</a>', $href, $aria_label, esc_html($linkText));

    return $link_html;
}
add_shortcode('flexline_phone_number', __NAMESPACE__ . '\flexline_phone_number_shortcode');



