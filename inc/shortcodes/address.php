<?php
namespace FlexLine\flexline;

/**
 * Shortcode to display contact information, excluding phone numbers with a #.
 *
 * @return string The formatted contact information.
 * @usage [flexline_contact_info]
 */
function flexline_contact_info_shortcode() {
    // Retrieve customizer settings for phone link and phone title
    $phone_info = flexline_get_phone_button_link();
    $href = $phone_info['href'];
    $mainPhoneTitle = get_theme_mod('flexline_main_phone_title', '');
    $aria_label = !empty($mainPhoneTitle) ? $mainPhoneTitle : "Call us";

    // Determine whether to show the phone link
    $showPhoneLink = strpos($href, '#') === false;

    $street = get_theme_mod('flexline_address_street', '');
    $city = get_theme_mod('flexline_address_city', '');
    $state = get_theme_mod('flexline_address_state', '');
    $zip = get_theme_mod('flexline_address_zip', '');

    // Format the address
    $formatted_address = '<span>' . esc_html($street) . '</span><br><span>' . esc_html($city) . ', ' . esc_html($state) . ' ' . esc_html($zip) .'</span>';
    $google_maps_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($formatted_address);

    // Start output buffering
    ob_start();
    ?>
    <address class="contact-info">
        <?php if ($showPhoneLink && !empty($href)) : ?>
            <p><a class="phone-link" href="<?php echo esc_url($href); ?>" aria-label="<?php echo esc_attr($aria_label); ?>" title="<?php echo esc_attr($aria_label); ?>"><span class="material-symbols-outlined">phone</span> <?php echo esc_html($mainPhoneTitle); ?></a></p>
        <?php endif; ?>
        <?php if (!empty($formatted_address)) : ?>
            <p>
                <?php echo $formatted_address; ?><br>
                <a class="map-link" href="<?php echo esc_url($google_maps_url); ?>" target="_blank" title="View on Google Maps"><span class="material-symbols-outlined">map</span> View on Google Maps</a>
            </p>
        <?php endif; ?>
    </address>
    <?php
    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('flexline_contact_info', __NAMESPACE__ . '\flexline_contact_info_shortcode');
