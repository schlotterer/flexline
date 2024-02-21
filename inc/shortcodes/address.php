<?php
/**
 * Shortcode to display copyright year.
 *
 * @package flexline
 * @usage [flexline_contact_info]
 */

namespace FlexLine\flexline;

/**
 * Retrieve contact information and format it for display.
 *
 * @return string The formatted contact information.
 */
function flexline_contact_info_shortcode() {
    // Retrieve customizer settings
    $phone_number = get_theme_mod('flexline_main_phone_number', '');
    $numeric_phone_number = preg_replace('/\D/', '', $phone_number); // Remove non-numeric characters
    $street = get_theme_mod('flexline_address_street', '');
    $city = get_theme_mod('flexline_address_city', '');
    $state = get_theme_mod('flexline_address_state', '');
    $zip = get_theme_mod('flexline_address_zip', '');

    // Format the address
    $formatted_address = '<span>' . esc_html($street) . '</span><br><span>' . esc_html($city) . ', ' . $state . ' ' . $zip .'</span>';
    $google_maps_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($formatted_address);

    // Start output buffering
    ob_start();
    ?>
    <address class="contact-info">
        <?php if (!empty($phone_number)) : ?>
            <p><a class="phone-link" href="tel:<?php echo esc_attr($numeric_phone_number); ?>"><span class="material-symbols-outlined">call</span> <?php echo esc_html($phone_number); ?></a></p>
        <?php endif; ?>
        <?php if (!empty($formatted_address)) : ?>
            <p>
                <?php echo $formatted_address; ?><br>
                <a class="map-link" href="<?php echo esc_url($google_maps_url); ?>" target="_blank"><span class="material-symbols-outlined">location_on</span> View on Google Maps</a>
            </p>
        <?php endif; ?>
    </address>
    <?php
    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('flexline_contact_info', __NAMESPACE__ . '\flexline_contact_info_shortcode');