<?php
/**
 * Custom Template Areas.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

add_filter( 'default_wp_template_part_areas', __NAMESPACE__ . '\flexline_template_part_areas' );

function flexline_template_part_areas( array $areas ) {
        $areas[] = [

        'area'        => 'topbar',
        'area_tag'    => 'section',
        'label'       => __( 'Top Bar', 'flexline' ),
        'description' => __( 'Top Bar area for notifications', 'flexline' ),
        'icon'        => 'tag'

    ];
    $areas[] = [
        
            'area'        => 'general',
            'area_tag'    => 'section',
            'label'       => __( 'General', 'flexline' ),
            'description' => __( 'General content', 'flexline' ),
            'icon'        => 'site'
        
    ];
    
	return $areas;
}