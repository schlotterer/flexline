<?php
namespace FlexLine\flexline;

/**
 * Renders a formatted address displaying the city and state as set in the WordPress Customizer.
 * This shortcode specifically outputs the city and state in a simple inline format which can be easily inserted into posts, pages, or widgets.
 * It only displays the address if both city and state are configured in the theme's customizer settings.
 *
 * @return string The HTML formatted string of the city and state, or an empty string if not set.
 * @usage Use the shortcode [flexline_city_state] anywhere in your content to display the location. Ensure the 'flexline_address_city' and 'flexline_address_state' are set in the Customizer under the address settings.
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

