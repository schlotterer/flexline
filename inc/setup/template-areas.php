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
        
            'area'        => 'slide-in-menu',
            'area_tag'    => 'section',
            'label'       => __( 'Slide In Menu', 'flexline' ),
            'description' => __( 'Area for custom full window menu', 'flexline' ),
            'icon'        => 'site'
        
    ];
    
	return $areas;
}