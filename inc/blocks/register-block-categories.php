<?php
/**
 * Register custom block category(ies).
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Register_flexlinetheme_category
 *
 * @param array $categories block categories.
 * @return array $categories block categories.
 * @author Inna Gutnik <inna.Gutnik@webdevstudios.com>
 * @since  2023-05-30
 */
function register_flexlinetheme_category( $categories ) {
	$custom_block_category = array(
		'slug'  => __( 'flexline-blocks-category', 'flexlinetheme' ),
		'title' => __( 'FlexLine Blocks', 'flexlinetheme' ),
	);

	$categories_sorted    = array();
	$categories_sorted[0] = $custom_block_category;

	foreach ( $categories as $category ) {
		$categories_sorted[] = $category;
	}

	return $categories_sorted;
}

add_filter( 'block_categories_all', __NAMESPACE__ . '\register_flexlinetheme_category', 10, 1 );
