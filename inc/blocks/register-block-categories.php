<?php
/**
 * Register custom block category(ies).
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Register_flexline_category
 *
 * @param array $categories block categories.
 * @return array $categories block categories.
 * @author Inna Gutnik <inna.Gutnik@webdevstudios.com>
 * @since  2023-05-30
 */
function register_flexline_category( $categories ) {
	$custom_block_category = [
		'slug'  => __( 'flexline-blocks-category', 'flexline' ),
		'title' => __( 'FlexLine Blocks', 'flexline' ),
	];

	$categories_sorted    = [];
	$categories_sorted[0] = $custom_block_category;

	foreach ( $categories as $category ) {
		$categories_sorted[] = $category;
	}

	return $categories_sorted;
}

add_filter( 'block_categories_all', __NAMESPACE__ . '\register_flexline_category', 10, 1 );
