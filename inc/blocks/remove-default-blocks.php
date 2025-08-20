<?php
/**
 * Removes the core Pull Quote block.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Removes the core Pull Quote block.
 *
 * @return array
 */
function flexline_remove_default_blocks() {
	// Get all registered blocks.
	$registered_blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

	// Disable default Blocks you want to remove individually.
	unset( $registered_blocks['core/pullquote'] );

	// Get keys from array.
	$registered_blocks = array_keys( $registered_blocks );

	// Merge allowed core blocks with plugins blocks.
	return $registered_blocks;
}

add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\flexline_remove_default_blocks' );
