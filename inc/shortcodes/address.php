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
            <p><a class="phone-link" href="<?php echo esc_url($href); ?>" aria-label="<?php echo esc_attr($aria_label); ?>" title="<?php echo esc_attr($aria_label); ?>"><span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg></span> <?php echo esc_html($mainPhoneTitle); ?></a></p>
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
