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
                'label'       => __( 'Slide In Menu', 'flexline' ),
                'description' => __( 'Slide in search and menu area.', 'flexline' ),
                'icon'        => 'tag'

        ];
    
	return $areas;
}