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
	register_block_pattern_category(
		'galleries',
		array(
			'label'       => __( 'Galleries', 'flexline' ),
			'description' => __( 'Display various media types.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'heros',
		array(
			'label'       => __( 'Heros', 'flexline' ),
			'description' => __( 'Hero patterns for pages', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'titles-meta',
		array(
			'label'       => __( 'Titles and Meta', 'flexline' ),
			'description' => __( 'Page titles and meta information.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'utilities',
		array(
			'label'       => __( 'Specialty Template Utilities', 'flexline' ),
			'description' => __( 'Small pre-configured parts for templates.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'components',
		array(
			'label'       => __( 'Components', 'flexline' ),
			'description' => __( 'Small pre-configured pieces for creating custom layouts.', 'flexline' ),
		)
	);

}

add_action( 'init', __NAMESPACE__ . '\flexline_register_block_pattern_categories' );