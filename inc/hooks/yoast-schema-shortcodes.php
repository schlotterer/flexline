<?php
/**
 * Adds shortcodes to yoast schema.
 *
 * @package flexline
 */

namespace FlexLine\flexline;
/**
 * Add shortcodes to Yoast schema.
 *
 * @author Joel Schlotterer
 *
 */

function flexline_schema_fix( $data ) {
    $siteName = get_bloginfo('name') ? '<span class="site-name">' . esc_html(get_bloginfo('name')) . '</span>' : '<span class="site-name">Flexline</span>';
    $formattedAddress = '';
    if (get_theme_mod('flexline_address_city', '') && get_theme_mod('flexline_address_state', '')) {
        $city = get_theme_mod('flexline_address_city', '');
        $state = get_theme_mod('flexline_address_state', '');
        $formattedAddress = '<span>' . esc_html($city) . ', ' . esc_html($state) . '</span>';
    }
    
    if (isset($data['@graph'])) {
        foreach ($data['@graph'] as $key => $graph) {
            // Define fields to search for placeholders
            $fields = ['description', 'name', 'headline', 'alternateName', 'text']; // Add more fields as needed

            foreach ($fields as $field) {
                if (isset($graph[$field])) {
                    $data['@graph'][$key][$field] = str_replace('[flexline_site_name]', $siteName, $graph[$field]);
                    $data['@graph'][$key][$field] = str_replace('[flexline_city_state]', $formattedAddress, $graph[$field]);
                }
            }
        }
    }
    
    return $data;
}

add_filter( 'wpseo_json_ld_output', __NAMESPACE__ . '\flexline_schema_fix', 10, 1 );
