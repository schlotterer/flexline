<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display contact information, excluding phone numbers with a #.
 *
 * @return string The formatted contact information.
 * @usage [flexline_site_name]
 */    
function flexline_site_name_shortcode() {
    // Get the site name
    $siteName = get_bloginfo('name') ? '<span class="site-name">' . esc_html(get_bloginfo('name')) . '</span>' : '<span class="site-name">Flexline</span>';
    
    // Start output buffering
    ob_start();
    echo $siteName;
    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('flexline_site_name', __NAMESPACE__ . '\flexline_site_name_shortcode');

