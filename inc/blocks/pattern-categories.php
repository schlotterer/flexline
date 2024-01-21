<?php
/**
 * Set up the theme Block Pattern Categories.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Register block pattern categories.
 *
 * @since 1.0.4
 */
function flexline_register_block_pattern_categories() {

	register_block_pattern_category(
		'page',
		array(
			'label'       => __( 'Page', 'flexline' ),
			'description' => __( 'Create a full page with multiple patterns that are grouped together.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'pricing',
		array(
			'label'       => __( 'Pricing', 'flexline' ),
			'description' => __( 'Compare features for your digital products or service plans.', 'flexline' ),
		)
	);

}

add_action( 'init', __NAMESPACE__ . '\flexline_register_block_pattern_categories' );