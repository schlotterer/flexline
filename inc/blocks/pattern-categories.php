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
		'flexline-elements',
		array(
			'label'       => __( 'Base Elements', 'flexline' ),
			'description' => __( 'Basic parts for building up content.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-components',
		array(
			'label'       => __( 'Components', 'flexline' ),
			'description' => __( 'Small pre-configured pieces for creating custom layouts.', 'flexline' ),
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
		'flexline-modules',
		array(
			'label'       => __( 'Modules', 'flexline' ),
			'description' => __( 'Rows of components', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-sections',
		array(
			'label'       => __( 'Sections', 'flexline' ),
			'description' => __( 'Curated sections for pages.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-page',
		array(
			'label'       => __( 'Pages', 'flexline' ),
			'description' => __( 'Create a full page with multiple patterns that are grouped together.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-posts',
		array(
			'label'       => __( 'Template - Posts', 'flexline' ),
			'description' => __( 'Create a full page with multiple patterns that are grouped together.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-headers',
		array(
			'label'       => __( 'Template - Headers', 'flexline' ),
			'description' => __( 'Header designs for templates', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-footers',
		array(
			'label'       => __( 'Template - Footers', 'flexline' ),
			'description' => __( 'Footer designs for templates.', 'flexline' ),
		)
	);
	register_block_pattern_category(
		'flexline-utilities',
		array(
			'label'       => __( 'Template - Utilities', 'flexline' ),
			'description' => __( 'Small pre-configured parts for templates.', 'flexline' ),
		)
	);
	

}

add_action( 'init', __NAMESPACE__ . '\flexline_register_block_pattern_categories' );