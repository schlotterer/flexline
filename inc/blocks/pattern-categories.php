<?php
/**
 * Set up the theme Block Pattern Categories.
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Register block pattern categories.
 *
 * @since 1.0.4
 */
function flexlinetheme_register_block_pattern_categories() {

	register_block_pattern_category(
		'flexline-components',
		array(
			'label'       => __( 'Components', 'flexlinetheme' ),
			'description' => __( 'Small pre-configured pieces for creating custom layouts.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-misc',
		array(
			'label'       => __( 'Components - Misc', 'flexlinetheme' ),
			'description' => __( 'Misc component types.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-cta',
		array(
			'label'       => __( 'Components - Call-to-action', 'flexlinetheme' ),
			'description' => __( 'CTA patterns for pages', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-galleries',
		array(
			'label'       => __( 'Components - Galleries', 'flexlinetheme' ),
			'description' => __( 'Display various media types.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-heroes',
		array(
			'label'       => __( 'Components - Heroes', 'flexlinetheme' ),
			'description' => __( 'Hero patterns for pages', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-posts',
		array(
			'label'       => __( 'Components - Posts', 'flexlinetheme' ),
			'description' => __( 'Components for posts and post lists.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-modules',
		array(
			'label'       => __( 'Modules', 'flexlinetheme' ),
			'description' => __( 'Rows of components in groups', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-sections',
		array(
			'label'       => __( 'Sections', 'flexlinetheme' ),
			'description' => __( 'Curated sections of components and modules for pages.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-samples',
		array(
			'label'       => __( 'Content Samples', 'flexlinetheme' ),
			'description' => __( 'Samples of patterns for review and testing.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-page',
		array(
			'label'       => __( 'Template - Pages', 'flexlinetheme' ),
			'description' => __( 'Full pages with multiple sections that are grouped together.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-events',
		array(
			'label'       => __( 'Template - Events', 'flexlinetheme' ),
			'description' => __( 'Events Templates.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-headers',
		array(
			'label'       => __( 'Template Parts - Headers', 'flexlinetheme' ),
			'description' => __( 'Header designs for templates', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-footers',
		array(
			'label'       => __( 'Template Parts - Footers', 'flexlinetheme' ),
			'description' => __( 'Footer designs for templates.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-utilities',
		array(
			'label'       => __( 'Template Parts - Utilities', 'flexlinetheme' ),
			'description' => __( 'Small pre-configured parts for templates.', 'flexlinetheme' ),
		)
	);
	register_block_pattern_category(
		'flexline-samples',
		array(
			'label'       => __( 'Testing Samples', 'flexlinetheme' ),
			'description' => __( 'Samples of patterns and configurations for testing and training.', 'flexlinetheme' ),
		)
	);
}

add_action( 'init', __NAMESPACE__ . '\flexlinetheme_register_block_pattern_categories' );
