<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display contact information, excluding phone numbers with a #.
 *
 * @return string The formatted contact information.
 * @usage [flexline_city_state]
 */    
function flexline_city_state_shortcode() {
    
    if(get_theme_mod('flexline_address_city', '') && get_theme_mod('flexline_address_state', '')) {
        // Retrieve customizer settings for address
        $city = get_theme_mod('flexline_address_city', '');
        $state = get_theme_mod('flexline_address_state', '');
        // Format the address
        $formatted_address = '<span>' . esc_html($city) . ', ' . esc_html($state) . '</span>';
    }
    
    // Start output buffering
    ob_start();
    echo $formatted_address;
    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('flexline_city_state', __NAMESPACE__ . '\flexline_city_state_shortcode');

