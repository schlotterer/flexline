<?php
/**
 * Adds shortcodes to yoast schema.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Add shortcodes to yoast schema.
 *
 * @author Joel Schlotterer
 *
 * 
 */
/**
 * Add shortcodes to Yoast schema.
 *
 * @author Joel Schlotterer
 *
 */
function shortcodes_in_yoast_schema( $data ) {
    $siteName = do_shortcode('flexline_site_name');
    $formattedAddress = do_shortcode('flexline_city_state');
    
    
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
add_filter( 'wpseo_json_ld_output', __NAMESPACE__ . '\shortcodes_in_yoast_schema', 10, 1 );
