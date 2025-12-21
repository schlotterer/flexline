<?php
/**
 * Related Posts Query Modification
 *
 * Modifies Query Loop block queries when enableRelatedPosts is active.
 * Only applies on singular frontend views.
 *
 * @package FlexLine
 */

namespace FlexLine\Blocks;

/**
 * Registry of Query Loop settings keyed by queryId.
 *
 * WP runs the query_loop_block_query_vars filter while iterating inner blocks
 * such as core/post-template, so we cannot read the Query block attributes
 * directly at that stage. Instead we capture them early and stash the values
 * here for the duration of the request.
 *
 * @var array
 */
global $flexline_related_query_registry;
$flexline_related_query_registry = array();

/**
 * Capture Query Loop attributes before render so we can reference them while building queries.
 *
 * @param array $parsed_block Current parsed block.
 * @return array
 */
function register_related_posts_query_settings( $parsed_block, $source_block = array() ) {
	global $flexline_related_query_registry;

	if ( empty( $parsed_block['blockName'] ) || 'core/query' !== $parsed_block['blockName'] ) {
		return $parsed_block;
	}

	$attrs = $parsed_block['attrs'] ?? array();

	$query_id            = isset( $attrs['queryId'] ) ? absint( $attrs['queryId'] ) : 0;
	static $generated_id = -1; // Provide predictable keys when editor did not assign a queryId yet.

	if ( empty( $attrs['enableRelatedPosts'] ) ) {
		if ( $query_id && isset( $flexline_related_query_registry[ $query_id ] ) ) {
			unset( $flexline_related_query_registry[ $query_id ] );
			error_log( sprintf( 'Cleared related settings for queryId %d (disabled)', $query_id ) );
		}
		return $parsed_block;
	}

	if ( ! $query_id ) {
		$query_id                         = $generated_id;
		$parsed_block['attrs']['queryId'] = $query_id;
		--$generated_id;
	}

	$flexline_related_query_registry[ $query_id ] = array(
		'enabled'  => true,
		'taxonomy' => sanitize_key( $attrs['relatedPostsTaxonomy'] ?? 'category' ),
		'scope'    => $attrs['relatedPostsScope'] ?? 'current',
	);

	// Ensure this query does not inherit the global query when related posts enabled.
	$current_query = $attrs['query'] ?? array();
	if ( empty( $current_query ) || ! array_key_exists( 'inherit', $current_query ) || $current_query['inherit'] ) {
		$current_query['inherit']       = false;
		$parsed_block['attrs']['query'] = $current_query;
		$flexline_related_query_registry[ $query_id ]['force_inherit_false'] = true;
		error_log( sprintf( 'Forced inherit=false for queryId %d', $query_id ) );
	}

	error_log(
		sprintf(
			'Registered related posts settings for queryId %d (taxonomy: %s, scope: %s)',
			$query_id,
			$flexline_related_query_registry[ $query_id ]['taxonomy'],
			$flexline_related_query_registry[ $query_id ]['scope']
		)
	);

	return $parsed_block;
}
add_filter( 'render_block_data', __NAMESPACE__ . '\\register_related_posts_query_settings', 10, 2 );

/**
 * Modify Query Loop query vars for related posts
 *
 * @param array    $query_vars Query vars to modify.
 * @param WP_Block $block      Block instance.
 * @param int      $page       Current page.
 * @return array Modified query vars.
 */
function related_posts_query_vars( $query_vars, $block, $page ) {
	global $flexline_related_query_registry;

	$query_id = $block->context['queryId'] ?? null;

	// Debug logging.
	error_log(
		sprintf(
			'Related Posts Filter Called for block: %s (queryId: %s)',
			$block->name ?? 'unknown',
			$query_id ? (string) $query_id : 'none'
		)
	);

	if ( ! $query_id || empty( $flexline_related_query_registry[ $query_id ] ) ) {
		error_log( 'No related settings registered for this queryId; skipping' );
		return $query_vars;
	}

	$settings = $flexline_related_query_registry[ $query_id ];

	if ( empty( $settings['enabled'] ) ) {
		error_log( 'Related Posts disabled for this queryId' );
		return $query_vars;
	}

	error_log( 'Related Posts IS enabled for this queryId' );

	// 2. Only apply on singular views.
	if ( ! is_singular() ) {
		return $query_vars;
	}

	$post_id = get_queried_object_id();
	if ( ! $post_id ) {
		return $query_vars;
	}

	// 3. Get configuration from registered settings.
	$taxonomy = $settings['taxonomy'];
	$scope    = $settings['scope'];

	// 4. Validate taxonomy exists.
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return $query_vars;
	}

	// 5. Resolve which term to match.
	$term_id = get_related_posts_term_id( $post_id, $taxonomy );

	// Debug: Log the term being used.
	if ( $term_id > 0 ) {
		$term = get_term( $term_id, $taxonomy );
		if ( $term && ! is_wp_error( $term ) ) {
			error_log( sprintf( 'Related Posts: Using term "%s" (ID: %d) from taxonomy "%s"', $term->name, $term_id, $taxonomy ) );
		}
	} else {
		error_log( 'Related Posts: No term found for matching' );
	}

	if ( $term_id <= 0 ) {
		// No term found - return empty results rather than all posts.
		$query_vars['post__in'] = array( 0 ); // Forces empty result set.
		return $query_vars;
	}

	// 6. Set post type scope.
	if ( 'current' === $scope ) {
		$query_vars['post_type'] = get_post_type( $post_id );
	} elseif ( 'all' === $scope ) {
		// Use public, queryable post types only (exclude attachments, nav items, etc.).
		$query_vars['post_type'] = get_public_post_types();
	}

	// 7. Exclude current post.
	$existing_excludes          = (array) ( $query_vars['post__not_in'] ?? array() );
	$query_vars['post__not_in'] = array_unique( array_merge( $existing_excludes, array( $post_id ) ) );
	error_log( sprintf( 'Related Posts: Excluding current post ID %d from results', $post_id ) );

	// 8. Add taxonomy filter (merge with existing tax_query if present).
	$new_tax_query = array(
		'taxonomy' => $taxonomy,
		'field'    => 'term_id',
		'terms'    => array( $term_id ),
	);

	if ( isset( $query_vars['tax_query'] ) && is_array( $query_vars['tax_query'] ) ) {
		// Merge with existing tax queries.
		$query_vars['tax_query'][]           = $new_tax_query;
		$query_vars['tax_query']['relation'] = 'AND'; // All conditions must match.
	} else {
		$query_vars['tax_query'] = array( $new_tax_query );
	}

	return $query_vars;
}

/**
 * Resolve best term ID for related posts matching
 *
 * Automatically uses smart fallback:
 * 1. Yoast SEO primary term
 * 2. Rank Math SEO primary term
 * 3. First assigned term
 *
 * @param int    $post_id  Post to get term from.
 * @param string $taxonomy Taxonomy name.
 * @return int Term ID, or 0 if none found.
 */
function get_related_posts_term_id( $post_id, $taxonomy ) {
	// Option 1: Yoast Primary Term.
	$yoast_key = '_yoast_wpseo_primary_' . $taxonomy;
	$term_id   = (int) get_post_meta( $post_id, $yoast_key, true );
	if ( $term_id > 0 && term_exists( $term_id, $taxonomy ) ) {
		return $term_id;
	}

	// Option 2: Rank Math Primary Term.
	// Rank Math uses: rank_math_primary_{taxonomy} (NO underscore prefix).
	// Example: rank_math_primary_category.
	$rank_math_key = 'rank_math_primary_' . $taxonomy;
	$term_id       = (int) get_post_meta( $post_id, $rank_math_key, true );

	/**
	 * Filter Rank Math primary term ID
	 *
	 * Allows sites to override Rank Math meta key detection if needed.
	 *
	 * @param int    $term_id   Detected term ID (may be 0).
	 * @param int    $post_id   Current post ID.
	 * @param string $taxonomy  Taxonomy being queried.
	 * @param string $meta_key  Meta key that was checked.
	 */
	$term_id = (int) apply_filters(
		'flexline_rank_math_primary_term_id',
		$term_id,
		$post_id,
		$taxonomy,
		$rank_math_key
	);

	if ( $term_id > 0 && term_exists( $term_id, $taxonomy ) ) {
		return $term_id;
	}

	// Option 3: First assigned term (fallback).
	$terms = get_the_terms( $post_id, $taxonomy );
	if ( is_array( $terms ) && ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		return (int) $terms[0]->term_id;
	}

	return 0;
}

/**
 * Get list of public, queryable post types
 *
 * Excludes attachments, revisions, nav menu items, etc.
 *
 * @return array Post type names.
 */
function get_public_post_types() {
	$post_types = get_post_types(
		array(
			'public'             => true,
			'publicly_queryable' => true,
		),
		'names'
	);

	// Explicitly exclude attachment even if it's technically queryable.
	$excluded   = array( 'attachment', 'wp_block', 'wp_template', 'wp_template_part', 'wp_navigation' );
	$post_types = array_diff( $post_types, $excluded );

	/**
	 * Filter post types available for "all" scope
	 *
	 * @param array $post_types Post type names.
	 */
	return apply_filters( 'flexline_related_posts_allowed_types', array_values( $post_types ) );
}
