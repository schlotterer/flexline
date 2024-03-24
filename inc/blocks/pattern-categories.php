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
		'flexline-components',
		array(
			'label'       => __( 'Components', 'flexline' ),
			'description' => __( 'Small pre-configured pieces for creating custom layouts.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-misc',
		array(
			'label'       => __( 'Components - Misc', 'flexline' ),
			'description' => __( 'Misc component types.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-cta',
		array(
			'label'       => __( 'Components - Call-to-action', 'flexline' ),
			'description' => __( 'CTA patterns for pages', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-galleries',
		array(
			'label'       => __( 'Components - Galleries', 'flexline' ),
			'description' => __( 'Display various media types.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-heroes',
		array(
			'label'       => __( 'Components - Heroes', 'flexline' ),
			'description' => __( 'Hero patterns for pages', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-posts',
		array(
			'label'       => __( 'Components - Posts', 'flexline' ),
			'description' => __( 'Components for posts and post lists.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-modules',
		array(
			'label'       => __( 'Modules', 'flexline' ),
			'description' => __( 'Rows of components in groups', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-sections',
		array(
			'label'       => __( 'Sections', 'flexline' ),
			'description' => __( 'Curated sections of components and modules for pages.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-samples',
		array(
			'label'       => __( 'Content Samples', 'flexline' ),
			'description' => __( 'Samples of patterns for review and testing.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-page',
		array(
			'label'       => __( 'Template - Pages', 'flexline' ),
			'description' => __( 'Full pages with multiple sections that are grouped together.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-events',
		array(
			'label'       => __( 'Template - Events', 'flexline' ),
			'description' => __( 'Events Templates.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-headers',
		array(
			'label'       => __( 'Template Parts - Headers', 'flexline' ),
			'description' => __( 'Header designs for templates', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-footers',
		array(
			'label'       => __( 'Template Parts - Footers', 'flexline' ),
			'description' => __( 'Footer designs for templates.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-utilities',
		array(
			'label'       => __( 'Template Parts - Utilities', 'flexline' ),
			'description' => __( 'Small pre-configured parts for templates.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-samples',
		array(
			'label'       => __( 'Testing Samples', 'flexline' ),
			'description' => __( 'Samples of patterns and configurations for testing and training.', 'flexline' ),
		)
	);
	

}

add_action( 'init', __NAMESPACE__ . '\flexline_register_block_pattern_categories' );