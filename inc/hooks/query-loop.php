<?php
/**
 * Query Loop Block Hooks
 *
 * @package FlexLine
 */

namespace FlexLine\Hooks;

use function FlexLine\Blocks\related_posts_query_vars;

// Modify Query Loop query vars for related posts.
add_filter(
	'query_loop_block_query_vars',
	'FlexLine\Blocks\related_posts_query_vars',
	10,
	3
);

/**
 * Add related posts attributes to the Query block context so child blocks can access them.
 *
 * @param array $metadata Block metadata.
 * @return array
 */
function extend_query_block_context_metadata( $metadata ) {
	if ( empty( $metadata['name'] ) ) {
		return $metadata;
	}

	$context_keys = array(
		'flexline/relatedPostsEnabled',
		'flexline/relatedPostsTaxonomy',
		'flexline/relatedPostsScope',
	);

	if ( 'core/query' === $metadata['name'] ) {
		error_log( 'Adding flexline context to core/query metadata' );

		$metadata['providesContext'] = array_merge(
			$metadata['providesContext'] ?? array(),
			array(
				'flexline/relatedPostsEnabled'  => 'enableRelatedPosts',
				'flexline/relatedPostsTaxonomy' => 'relatedPostsTaxonomy',
				'flexline/relatedPostsScope'    => 'relatedPostsScope',
			)
		);
	}

	$consumer_blocks = array(
		'core/post-template',
		'core/query-pagination-previous',
		'core/query-pagination-next',
		'core/query-pagination-numbers',
		'core/query-no-results',
	);

	if ( in_array( $metadata['name'], $consumer_blocks, true ) ) {
		$metadata['usesContext'] = array_merge(
			$metadata['usesContext'] ?? array(),
			$context_keys
		);
	}

	return $metadata;
}

add_filter( 'block_type_metadata', __NAMESPACE__ . '\\extend_query_block_context_metadata' );
