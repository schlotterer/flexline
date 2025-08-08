<?php
/**
 * Custom Template Areas.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds custom template part areas.
 *
 * This function modifies the default template part areas to include a custom
 * 'topbar' area used for a slide-in search and menu section.
 *
 * @param array $areas The existing template part areas.
 * @return array The modified template part areas.
 */
function flexline_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'topbar',
		'area_tag'    => 'section',
		'label'       => __( 'Slide In Menu', 'flexline' ),
		'description' => __( 'Slide in search and menu area.', 'flexline' ),
		'icon'        => 'tag',
	);

	return $areas;
}
add_filter( 'default_wp_template_part_areas', __NAMESPACE__ . '\flexline_template_part_areas' );
