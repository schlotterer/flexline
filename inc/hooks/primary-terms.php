<?php
/**
 * Canonical primary-term ownership, sync, breadcrumbs, and tooling.
 *
 * @package flexline
 */

namespace FlexLine\PrimaryTerms;

use WP_CLI;
use WP_Post;
use WP_Query;
use WP_Taxonomy;

defined( 'ABSPATH' ) || exit;

const SOURCE_W4SL      = 'w4sl';
const SOURCE_YOAST     = 'yoast';
const SOURCE_RANK_MATH = 'rank_math';
const SOURCE_FALLBACK  = 'fallback';

const CANONICAL_PREFIX = 'w4sl_primary_';

/**
 * Wire all hooks for primary-term ownership.
 *
 * @return void
 */
function bootstrap_primary_terms(): void {
	add_action( 'init', __NAMESPACE__ . '\\register_primary_term_meta_keys', 20 );
	add_action( 'init', __NAMESPACE__ . '\\register_primary_term_permalink_rewrite_tag', 20 );

	add_action( 'added_post_meta', __NAMESPACE__ . '\\handle_added_post_meta', 10, 4 );
	add_action( 'updated_post_meta', __NAMESPACE__ . '\\handle_updated_post_meta', 10, 4 );
	add_action( 'deleted_post_meta', __NAMESPACE__ . '\\handle_deleted_post_meta', 10, 4 );
	add_action( 'set_object_terms', __NAMESPACE__ . '\\handle_set_object_terms', 10, 6 );
	add_action( 'save_post', __NAMESPACE__ . '\\handle_save_post', 50, 3 );

	add_action( 'add_inline_data', __NAMESPACE__ . '\\add_quick_edit_inline_data', 10, 2 );
	add_action( 'quick_edit_custom_box', __NAMESPACE__ . '\\render_quick_edit_primary_category', 10, 3 );
	add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\enqueue_quick_edit_assets' );
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_sidebar_assets' );

	add_filter( 'block_core_breadcrumbs_post_type_settings', __NAMESPACE__ . '\\filter_breadcrumbs_post_type_settings', 10, 3 );
	add_filter( 'available_permalink_structure_tags', __NAMESPACE__ . '\\filter_available_permalink_structure_tags' );
	add_filter( 'pre_post_link', __NAMESPACE__ . '\\filter_pre_post_link_primary_term_tag', 10, 3 );
	add_filter( 'post_link_category', __NAMESPACE__ . '\\filter_post_link_category_primary_term', 10, 3 );

	if ( defined( 'WP_CLI' ) && WP_CLI && class_exists( 'WP_CLI' ) && class_exists( 'WP_CLI_Command' ) ) {
		WP_CLI::add_command( 'flexline primary-term', __NAMESPACE__ . '\\Primary_Term_CLI_Command' );
	}
}

/**
 * Register canonical primary term keys in REST for editor-side updates.
 *
 * @return void
 */
function register_primary_term_meta_keys(): void {
	$public_post_types = get_post_types(
		array(
			'public' => true,
		),
		'names'
	);

	if ( empty( $public_post_types ) ) {
		return;
	}

	foreach ( get_public_taxonomy_slugs() as $taxonomy ) {
		$meta_key = canonical_meta_key( $taxonomy );

		foreach ( $public_post_types as $post_type ) {
			if ( ! is_object_in_taxonomy( $post_type, $taxonomy ) ) {
				continue;
			}

			register_post_meta(
				$post_type,
				$meta_key,
				array(
					'type'              => 'integer',
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => 'absint',
					'auth_callback'     => static function () {
						$args      = func_get_args();
						$object_id = isset( $args[2] ) ? (int) $args[2] : 0;
						if ( $object_id > 0 ) {
							return current_user_can( 'edit_post', $object_id );
						}
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}
	}
}

/**
 * Return all public taxonomy slugs.
 *
 * @return array
 */
function get_public_taxonomy_slugs(): array {
	return get_taxonomies(
		array(
			'public' => true,
		),
		'names'
	);
}

/**
 * Return public taxonomies attached to a post type.
 *
 * @param string $post_type Post type slug.
 * @return array
 */
function get_public_taxonomies_for_post_type( string $post_type ): array {
	if ( '' === $post_type || ! post_type_exists( $post_type ) ) {
		return array();
	}

	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$slugs      = array();

	foreach ( $taxonomies as $taxonomy ) {
		if ( ! $taxonomy instanceof WP_Taxonomy || ! $taxonomy->public ) {
			continue;
		}
		$slugs[] = $taxonomy->name;
	}

	sort( $slugs );

	return $slugs;
}

/**
 * Return public taxonomies attached to a post.
 *
 * @param int $post_id Post ID.
 * @return array
 */
function get_public_taxonomies_for_post( int $post_id ): array {
	$post_type = get_post_type( $post_id );
	if ( ! $post_type ) {
		return array();
	}

	return get_public_taxonomies_for_post_type( $post_type );
}

/**
 * Build canonical key for a taxonomy.
 *
 * @param string $taxonomy Taxonomy slug.
 * @return string
 */
function canonical_meta_key( string $taxonomy ): string {
	return CANONICAL_PREFIX . $taxonomy;
}

/**
 * Build source key for a taxonomy and source.
 *
 * @param string $taxonomy Taxonomy slug.
 * @param string $source   Source key.
 * @return string
 */
function source_meta_key( string $taxonomy, string $source ): string {
	if ( SOURCE_YOAST === $source ) {
		return '_yoast_wpseo_primary_' . $taxonomy;
	}

	if ( SOURCE_RANK_MATH === $source ) {
		return 'rank_math_primary_' . $taxonomy;
	}

	return canonical_meta_key( $taxonomy );
}

/**
 * Build timestamp key for a taxonomy and source.
 *
 * @param string $taxonomy Taxonomy slug.
 * @param string $source   Source key.
 * @return string
 */
function source_timestamp_meta_key( string $taxonomy, string $source ): string {
	return CANONICAL_PREFIX . $taxonomy . '_ts_' . $source;
}

/**
 * Parse a primary-term-related meta key.
 *
 * @param string $meta_key Meta key.
 * @return array|null
 */
function parse_primary_term_meta_key( string $meta_key ): ?array {
	if ( preg_match( '/^w4sl_primary_([a-z0-9_\-]+)_ts_(w4sl|yoast|rank_math)$/', $meta_key, $matches ) ) {
		return array(
			'taxonomy'     => $matches[1],
			'source'       => $matches[2],
			'is_timestamp' => true,
		);
	}

	if ( preg_match( '/^w4sl_primary_([a-z0-9_\-]+)$/', $meta_key, $matches ) ) {
		return array(
			'taxonomy'     => $matches[1],
			'source'       => SOURCE_W4SL,
			'is_timestamp' => false,
		);
	}

	if ( preg_match( '/^_yoast_wpseo_primary_([a-z0-9_\-]+)$/', $meta_key, $matches ) ) {
		return array(
			'taxonomy'     => $matches[1],
			'source'       => SOURCE_YOAST,
			'is_timestamp' => false,
		);
	}

	if ( preg_match( '/^rank_math_primary_([a-z0-9_\-]+)$/', $meta_key, $matches ) ) {
		return array(
			'taxonomy'     => $matches[1],
			'source'       => SOURCE_RANK_MATH,
			'is_timestamp' => false,
		);
	}

	return null;
}

/**
 * Return true when source plugin is active.
 *
 * @param string $source Source key.
 * @return bool
 */
function is_source_available( string $source ): bool {
	if ( SOURCE_W4SL === $source ) {
		return true;
	}

	if ( SOURCE_YOAST === $source ) {
		return defined( 'WPSEO_VERSION' ) || class_exists( 'WPSEO_Options' );
	}

	if ( SOURCE_RANK_MATH === $source ) {
		return defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath' );
	}

	return false;
}

/**
 * Return true when Rank Math primary-term UI ownership should apply.
 *
 * @return bool
 */
function is_rank_math_active(): bool {
	return is_source_available( SOURCE_RANK_MATH );
}

/**
 * Return true when Yoast exposes primary-term UI for a post type.
 *
 * @param string $post_type Post type slug.
 * @return bool
 */
function is_yoast_primary_terms_enabled_for_post_type( string $post_type ): bool {
	if ( '' === $post_type || ! post_type_exists( $post_type ) || ! is_source_available( SOURCE_YOAST ) ) {
		return false;
	}

	$all_taxonomies = get_object_taxonomies( $post_type, 'objects' );
	if ( ! is_array( $all_taxonomies ) || empty( $all_taxonomies ) ) {
		return false;
	}

	$hierarchical_taxonomies = array_filter(
		$all_taxonomies,
		static function ( $taxonomy ) {
			return $taxonomy instanceof WP_Taxonomy && ! empty( $taxonomy->hierarchical );
		}
	);

	if ( empty( $hierarchical_taxonomies ) ) {
		return false;
	}

	$primary_taxonomies = (array) apply_filters( 'wpseo_primary_term_taxonomies', $hierarchical_taxonomies, $post_type, $all_taxonomies );

	return ! empty( $primary_taxonomies );
}

/**
 * Return true when FlexLine primary-term UI should be hidden.
 *
 * @param string $post_type Post type slug.
 * @return bool
 */
function should_hide_flexline_primary_terms_ui( string $post_type ): bool {
	if ( is_rank_math_active() ) {
		return true;
	}

	if ( ! is_source_available( SOURCE_YOAST ) || '' === $post_type ) {
		return false;
	}

	return is_yoast_primary_terms_enabled_for_post_type( $post_type );
}

/**
 * Resolve the current admin post type when possible.
 *
 * @return string
 */
function get_current_admin_post_type(): string {
	$post_type = '';

	if ( function_exists( 'get_current_screen' ) ) {
		$screen = get_current_screen();
		if ( $screen && ! empty( $screen->post_type ) ) {
			$post_type = (string) $screen->post_type;
		}
	}

	if ( '' === $post_type && isset( $_REQUEST['post_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$post_type = sanitize_key( wp_unslash( (string) $_REQUEST['post_type'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	if ( '' === $post_type && isset( $_REQUEST['post'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$post_id = absint( wp_unslash( (string) $_REQUEST['post'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $post_id > 0 ) {
			$resolved_post_type = get_post_type( $post_id );
			if ( $resolved_post_type ) {
				$post_type = (string) $resolved_post_type;
			}
		}
	}

	return $post_type;
}

/**
 * Return true when writes should mirror to source key.
 *
 * @param string $source   Source key.
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @return bool
 */
function should_mirror_to_source( string $source, int $post_id, string $taxonomy ): bool {
	if ( SOURCE_W4SL === $source ) {
		return false;
	}

	if ( is_source_available( $source ) ) {
		return true;
	}

	$key = source_meta_key( $taxonomy, $source );

	return metadata_exists( 'post', $post_id, $key );
}

/**
 * Read a post meta value as integer.
 *
 * @param int    $post_id  Post ID.
 * @param string $meta_key Meta key.
 * @return int
 */
function get_post_meta_int( int $post_id, string $meta_key ): int {
	return (int) get_post_meta( $post_id, $meta_key, true );
}

/**
 * Update integer meta only when changed.
 *
 * @param int    $post_id  Post ID.
 * @param string $meta_key Meta key.
 * @param int    $value    Value.
 * @return bool
 */
function update_meta_int_if_changed( int $post_id, string $meta_key, int $value ): bool {
	$current = get_post_meta_int( $post_id, $meta_key );
	if ( $current === $value ) {
		return false;
	}

	update_post_meta( $post_id, $meta_key, $value );

	return true;
}

/**
 * Delete meta only when present.
 *
 * @param int    $post_id  Post ID.
 * @param string $meta_key Meta key.
 * @return bool
 */
function delete_meta_if_present( int $post_id, string $meta_key ): bool {
	if ( ! metadata_exists( 'post', $post_id, $meta_key ) ) {
		return false;
	}

	delete_post_meta( $post_id, $meta_key );

	return true;
}

/**
 * Return true when the term is valid for the post and taxonomy.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @param int    $term_id  Term ID.
 * @return bool
 */
function is_valid_term_for_post( int $post_id, string $taxonomy, int $term_id ): bool {
	if ( $term_id <= 0 || ! taxonomy_exists( $taxonomy ) ) {
		return false;
	}

	if ( ! term_exists( $term_id, $taxonomy ) ) {
		return false;
	}

	$has_term = has_term( $term_id, $taxonomy, $post_id );
	if ( is_wp_error( $has_term ) ) {
		return false;
	}

	return (bool) $has_term;
}

/**
 * Return first assigned term ID for a post/taxonomy.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @return int
 */
function get_first_assigned_term_id( int $post_id, string $taxonomy ): int {
	$terms = get_the_terms( $post_id, $taxonomy );
	if ( ! is_array( $terms ) || empty( $terms ) || is_wp_error( $terms ) ) {
		return 0;
	}

	return (int) $terms[0]->term_id;
}

/**
 * Return true when taxonomy is public and attached to post.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @return bool
 */
function is_supported_post_taxonomy( int $post_id, string $taxonomy ): bool {
	if ( $post_id <= 0 || '' === $taxonomy || ! taxonomy_exists( $taxonomy ) ) {
		return false;
	}

	$tax_obj = get_taxonomy( $taxonomy );
	if ( ! $tax_obj || ! $tax_obj->public ) {
		return false;
	}

	$post_type = get_post_type( $post_id );
	if ( ! $post_type ) {
		return false;
	}

	return is_object_in_taxonomy( $post_type, $taxonomy );
}

/**
 * Return true when synchronization lock is active.
 *
 * @return bool
 */
function is_sync_locked(): bool {
	return sync_lock_counter() > 0;
}

/**
 * Execute callback with synchronization lock held.
 *
 * @param callable $callback Callback.
 * @return mixed
 */
function with_sync_lock( callable $callback ) {
	sync_lock_counter( 1 );

	try {
		return $callback();
	} finally {
		sync_lock_counter( -1 );
	}
}

/**
 * Read/mutate lock depth.
 *
 * @param int $delta Optional increment/decrement.
 * @return int
 */
function sync_lock_counter( int $delta = 0 ): int {
	static $depth = 0;

	if ( 0 !== $delta ) {
		$depth += $delta;
		if ( $depth < 0 ) {
			$depth = 0;
		}
	}

	return $depth;
}

/**
 * Resolve and normalize the best primary term ID for a post/taxonomy.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @return int
 */
function resolve_primary_term_id( int $post_id, string $taxonomy ): int {
	$result = normalize_primary_term_for_taxonomy( $post_id, $taxonomy );

	return (int) ( $result['term_id'] ?? 0 );
}

/**
 * Normalize primary-term state for one post/taxonomy.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @param array  $args     Optional args.
 * @return array
 */
function normalize_primary_term_for_taxonomy( int $post_id, string $taxonomy, array $args = array() ): array {
	$dry_run = ! empty( $args['dry_run'] );

	if ( ! is_supported_post_taxonomy( $post_id, $taxonomy ) ) {
		return array(
			'status'     => 'invalid-skipped',
			'term_id'    => 0,
			'source'     => '',
			'changed'    => false,
			'post_id'    => $post_id,
			'taxonomy'   => $taxonomy,
			'seeded'     => false,
			'has_terms'  => false,
			'has_source' => false,
		);
	}

	$canonical_key = canonical_meta_key( $taxonomy );
	$yoast_key     = source_meta_key( $taxonomy, SOURCE_YOAST );
	$rank_key      = source_meta_key( $taxonomy, SOURCE_RANK_MATH );

	$raw_values = array(
		SOURCE_W4SL      => get_post_meta_int( $post_id, $canonical_key ),
		SOURCE_YOAST     => get_post_meta_int( $post_id, $yoast_key ),
		SOURCE_RANK_MATH => get_post_meta_int( $post_id, $rank_key ),
	);

	$candidates = array();
	foreach ( $raw_values as $source => $term_id ) {
		if ( is_valid_term_for_post( $post_id, $taxonomy, $term_id ) ) {
			$candidates[ $source ] = $term_id;
		}
	}

	$timestamps = array(
		SOURCE_W4SL      => get_post_meta_int( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_W4SL ) ),
		SOURCE_YOAST     => get_post_meta_int( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_YOAST ) ),
		SOURCE_RANK_MATH => get_post_meta_int( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_RANK_MATH ) ),
	);

	$has_any_timestamp = false;
	foreach ( $timestamps as $value ) {
		if ( $value > 0 ) {
			$has_any_timestamp = true;
			break;
		}
	}

	$winner_source = '';
	$winner_term   = 0;

	if ( ! empty( $candidates ) && $has_any_timestamp ) {
		$priority = array(
			SOURCE_W4SL      => 3,
			SOURCE_YOAST     => 2,
			SOURCE_RANK_MATH => 1,
		);

		$best_ts      = -1;
		$best_prio    = -1;
		$best_source  = '';
		$best_term_id = 0;

		foreach ( $candidates as $source => $term_id ) {
			$ts   = $timestamps[ $source ] ?? 0;
			$prio = $priority[ $source ] ?? 0;

			if ( $ts > $best_ts || ( $ts === $best_ts && $prio > $best_prio ) ) {
				$best_ts      = $ts;
				$best_prio    = $prio;
				$best_source  = $source;
				$best_term_id = $term_id;
			}
		}

		$winner_source = $best_source;
		$winner_term   = $best_term_id;
	} elseif ( isset( $candidates[ SOURCE_YOAST ] ) ) {
			$winner_source = SOURCE_YOAST;
			$winner_term   = $candidates[ SOURCE_YOAST ];
	} elseif ( isset( $candidates[ SOURCE_RANK_MATH ] ) ) {
		$winner_source = SOURCE_RANK_MATH;
		$winner_term   = $candidates[ SOURCE_RANK_MATH ];
	} elseif ( isset( $candidates[ SOURCE_W4SL ] ) ) {
		$winner_source = SOURCE_W4SL;
		$winner_term   = $candidates[ SOURCE_W4SL ];
	} else {
		$fallback_term = get_first_assigned_term_id( $post_id, $taxonomy );
		if ( $fallback_term > 0 ) {
			$winner_source = SOURCE_FALLBACK;
			$winner_term   = $fallback_term;
		}
	}

	$canonical_before = $raw_values[ SOURCE_W4SL ];
	$has_terms        = get_first_assigned_term_id( $post_id, $taxonomy ) > 0;
	$changed          = false;

	if ( $winner_term <= 0 ) {
		if ( ! $dry_run ) {
			$changed = with_sync_lock(
				static function () use ( $post_id, $taxonomy, $canonical_key, $yoast_key, $rank_key ) {
					$did_change = false;

					$did_change = delete_meta_if_present( $post_id, $canonical_key ) || $did_change;

					if ( should_mirror_to_source( SOURCE_YOAST, $post_id, $taxonomy ) ) {
						$did_change = delete_meta_if_present( $post_id, $yoast_key ) || $did_change;
					}
					if ( should_mirror_to_source( SOURCE_RANK_MATH, $post_id, $taxonomy ) ) {
						$did_change = delete_meta_if_present( $post_id, $rank_key ) || $did_change;
					}

					$did_change = delete_meta_if_present( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_W4SL ) ) || $did_change;
					$did_change = delete_meta_if_present( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_YOAST ) ) || $did_change;
					$did_change = delete_meta_if_present( $post_id, source_timestamp_meta_key( $taxonomy, SOURCE_RANK_MATH ) ) || $did_change;

					return $did_change;
				}
			);
		}

		return array(
			'status'     => 'invalid-skipped',
			'term_id'    => 0,
			'source'     => '',
			'changed'    => $changed,
			'post_id'    => $post_id,
			'taxonomy'   => $taxonomy,
			'seeded'     => false,
			'has_terms'  => $has_terms,
			'has_source' => false,
		);
	}

	$winner_ts_source = SOURCE_FALLBACK === $winner_source ? SOURCE_W4SL : $winner_source;
	$winner_ts_key    = source_timestamp_meta_key( $taxonomy, $winner_ts_source );
	$winner_ts        = $timestamps[ $winner_ts_source ] ?? 0;
	$seeded           = ! $has_any_timestamp && 0 === $canonical_before;
	$now              = time();

	if ( ! $dry_run ) {
		$changed = with_sync_lock(
			static function () use ( $post_id, $taxonomy, $winner_term, $winner_ts_key, $winner_ts, $canonical_key, $yoast_key, $rank_key, $now ) {
				$did_change = false;

				$did_change = update_meta_int_if_changed( $post_id, $canonical_key, $winner_term ) || $did_change;

				if ( should_mirror_to_source( SOURCE_YOAST, $post_id, $taxonomy ) ) {
					$did_change = update_meta_int_if_changed( $post_id, $yoast_key, $winner_term ) || $did_change;
				}

				if ( should_mirror_to_source( SOURCE_RANK_MATH, $post_id, $taxonomy ) ) {
					$did_change = update_meta_int_if_changed( $post_id, $rank_key, $winner_term ) || $did_change;
				}

				if ( $winner_ts <= 0 ) {
					$did_change = update_meta_int_if_changed( $post_id, $winner_ts_key, $now ) || $did_change;
				}

				return $did_change;
			}
		);
	}

	$status = 'conflicts-resolved';
	if ( $seeded && SOURCE_YOAST === $winner_source ) {
		$status = 'seeded-from-yoast';
	} elseif ( $seeded && SOURCE_RANK_MATH === $winner_source ) {
		$status = 'seeded-from-rankmath';
	} elseif ( $seeded && SOURCE_FALLBACK === $winner_source ) {
		$status = 'seeded-from-fallback';
	} elseif ( ! $changed && $canonical_before === $winner_term ) {
		$status = 'unchanged';
	}

	return array(
		'status'     => $status,
		'term_id'    => $winner_term,
		'source'     => $winner_source,
		'changed'    => $changed,
		'post_id'    => $post_id,
		'taxonomy'   => $taxonomy,
		'seeded'     => $seeded,
		'has_terms'  => $has_terms,
		'has_source' => true,
	);
}

/**
 * Mark source timestamp based on a source-meta change event.
 *
 * @param int    $post_id    Post ID.
 * @param string $taxonomy   Taxonomy slug.
 * @param string $source     Source key.
 * @param int    $term_id    Term ID.
 * @param bool   $is_deleted True if meta was deleted.
 * @return void
 */
function mark_source_timestamp_from_event( int $post_id, string $taxonomy, string $source, int $term_id, bool $is_deleted ): void {
	$timestamp_key = source_timestamp_meta_key( $taxonomy, $source );

	with_sync_lock(
		static function () use ( $post_id, $taxonomy, $source, $term_id, $is_deleted, $timestamp_key ) {
			if ( $is_deleted ) {
				delete_meta_if_present( $post_id, $timestamp_key );
				return;
			}

			if ( is_valid_term_for_post( $post_id, $taxonomy, $term_id ) ) {
				update_meta_int_if_changed( $post_id, $timestamp_key, time() );
				return;
			}

			delete_meta_if_present( $post_id, $timestamp_key );
		}
	);
}

/**
 * Handle added post meta.
 *
 * @param int    $meta_id    Meta ID.
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Meta key.
 * @param mixed  $meta_value Meta value.
 * @return void
 */
function handle_added_post_meta( $meta_id, $post_id, $meta_key, $meta_value ): void {
	handle_primary_meta_change( (int) $post_id, (string) $meta_key, $meta_value, false );
}

/**
 * Handle updated post meta.
 *
 * @param int    $meta_id    Meta ID.
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Meta key.
 * @param mixed  $meta_value Meta value.
 * @return void
 */
function handle_updated_post_meta( $meta_id, $post_id, $meta_key, $meta_value ): void {
	handle_primary_meta_change( (int) $post_id, (string) $meta_key, $meta_value, false );
}

/**
 * Handle deleted post meta.
 *
 * @param array|int $meta_ids   Meta IDs.
 * @param int       $post_id    Post ID.
 * @param string    $meta_key   Meta key.
 * @param mixed     $meta_value Meta value.
 * @return void
 */
function handle_deleted_post_meta( $meta_ids, $post_id, $meta_key, $meta_value ): void {
	handle_primary_meta_change( (int) $post_id, (string) $meta_key, $meta_value, true );
}

/**
 * React to primary-term meta updates.
 *
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Meta key.
 * @param mixed  $meta_value Meta value.
 * @param bool   $is_deleted True on delete.
 * @return void
 */
function handle_primary_meta_change( int $post_id, string $meta_key, $meta_value, bool $is_deleted ): void {
	if ( $post_id <= 0 || is_sync_locked() ) {
		return;
	}

	$parsed = parse_primary_term_meta_key( $meta_key );
	if ( ! $parsed || ! empty( $parsed['is_timestamp'] ) ) {
		return;
	}

	$taxonomy = (string) $parsed['taxonomy'];
	$source   = (string) $parsed['source'];

	if ( ! is_supported_post_taxonomy( $post_id, $taxonomy ) ) {
		return;
	}

	$term_id = absint( $meta_value );

	mark_source_timestamp_from_event( $post_id, $taxonomy, $source, $term_id, $is_deleted );
	normalize_primary_term_for_taxonomy( $post_id, $taxonomy );
}

/**
 * Normalize taxonomy when terms change on a post.
 *
 * @param int    $object_id  Post ID.
 * @param array  $terms      Terms.
 * @param array  $tt_ids     Term taxonomy IDs.
 * @param string $taxonomy   Taxonomy slug.
 * @param bool   $append     Append flag.
 * @param array  $old_tt_ids Old term taxonomy IDs.
 * @return void
 */
function handle_set_object_terms( $object_id, $terms, $tt_ids, $taxonomy, $append, $old_tt_ids ): void {
	$post_id = (int) $object_id;
	if ( $post_id <= 0 || is_sync_locked() ) {
		return;
	}

	if ( ! is_supported_post_taxonomy( $post_id, (string) $taxonomy ) ) {
		return;
	}

	normalize_primary_term_for_taxonomy( $post_id, (string) $taxonomy );
}

/**
 * Save-post normalization + quick-edit persistence.
 *
 * @param int     $post_id Post ID.
 * @param WP_Post $post    Post object.
 * @param bool    $update  Whether updating existing post.
 * @return void
 */
function handle_save_post( $post_id, $post, $update ): void {
	$post_id = (int) $post_id;
	if ( $post_id <= 0 || is_sync_locked() ) {
		return;
	}

	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}

	if ( ! $post instanceof WP_Post ) {
		$post = get_post( $post_id );
		if ( ! $post instanceof WP_Post ) {
			return;
		}
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	handle_quick_edit_primary_category_save( $post_id );

	foreach ( get_public_taxonomies_for_post( $post_id ) as $taxonomy ) {
		normalize_primary_term_for_taxonomy( $post_id, $taxonomy );
	}
}

/**
 * Save quick-edit canonical category when provided.
 *
 * @param int $post_id Post ID.
 * @return void
 */
function handle_quick_edit_primary_category_save( int $post_id ): void {
	$post_type = get_post_type( $post_id );
	if ( $post_type && should_hide_flexline_primary_terms_ui( (string) $post_type ) ) {
		return;
	}

	if ( ! isset( $_REQUEST['_inline_edit'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return;
	}

	$nonce = sanitize_text_field( wp_unslash( (string) $_REQUEST['_inline_edit'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
	if ( ! wp_verify_nonce( $nonce, 'inlineeditnonce' ) ) {
		return;
	}

	if ( ! isset( $_REQUEST['w4sl_primary_category_quick_edit'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return;
	}

	if ( ! is_supported_post_taxonomy( $post_id, 'category' ) ) {
		return;
	}

	$term_id = absint( wp_unslash( (string) $_REQUEST['w4sl_primary_category_quick_edit'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

	with_sync_lock(
		static function () use ( $post_id, $term_id ) {
			$key = canonical_meta_key( 'category' );
			if ( $term_id > 0 && is_valid_term_for_post( $post_id, 'category', $term_id ) ) {
				update_meta_int_if_changed( $post_id, $key, $term_id );
				update_meta_int_if_changed( $post_id, source_timestamp_meta_key( 'category', SOURCE_W4SL ), time() );
			} else {
				delete_meta_if_present( $post_id, $key );
				delete_meta_if_present( $post_id, source_timestamp_meta_key( 'category', SOURCE_W4SL ) );
			}
		}
	);
}

/**
 * Provide inline row value for quick-edit script.
 *
 * @param WP_Post       $post             Post object.
 * @param \WP_Post_Type $post_type_object Post type object.
 * @return void
 */
function add_quick_edit_inline_data( $post, $post_type_object ): void {
	if ( ! $post instanceof WP_Post ) {
		return;
	}

	if ( should_hide_flexline_primary_terms_ui( (string) $post->post_type ) ) {
		return;
	}

	if ( ! is_object_in_taxonomy( $post->post_type, 'category' ) ) {
		return;
	}

	$value = get_post_meta_int( $post->ID, canonical_meta_key( 'category' ) );
	echo '<div class="w4sl_primary_category">' . esc_html( (string) $value ) . '</div>';
}

/**
 * Render quick edit field for canonical primary category.
 *
 * @param string $column_name Column name.
 * @param string $post_type   Post type.
 * @param string $taxonomy    Taxonomy (unused for posts table).
 * @return void
 */
function render_quick_edit_primary_category( $column_name, $post_type, $taxonomy ): void {
	if ( 'categories' !== $column_name ) {
		return;
	}

	if ( should_hide_flexline_primary_terms_ui( (string) $post_type ) ) {
		return;
	}

	if ( ! is_object_in_taxonomy( (string) $post_type, 'category' ) ) {
		return;
	}
	?>
	<fieldset class="inline-edit-col-right inline-edit-w4sl-primary-term">
		<div class="inline-edit-col">
			<label class="alignleft">
				<span class="title"><?php esc_html_e( 'Primary Category', 'flexline' ); ?></span>
				<select name="w4sl_primary_category_quick_edit" class="w4sl-primary-category-quick-edit">
					<option value="0"><?php esc_html_e( 'Auto (first assigned)', 'flexline' ); ?></option>
				</select>
			</label>
		</div>
	</fieldset>
	<?php
}

/**
 * Enqueue quick-edit script on post list screens.
 *
 * @param string $hook_suffix Current admin hook.
 * @return void
 */
function enqueue_quick_edit_assets( $hook_suffix ): void {
	if ( 'edit.php' !== $hook_suffix ) {
		return;
	}

	$post_type = get_current_admin_post_type();
	if ( '' === $post_type ) {
		$post_type = 'post';
	}

	if ( should_hide_flexline_primary_terms_ui( $post_type ) ) {
		return;
	}

	wp_enqueue_script(
		'flexline-primary-term-quick-edit',
		get_theme_file_uri( 'assets/js/primary-term-quick-edit.js' ),
		array( 'jquery', 'inline-edit-post' ),
		function_exists( '\\FlexLine\\flexline_asset_ver' ) ? \FlexLine\flexline_asset_ver( 'assets/js/primary-term-quick-edit.js' ) : ( defined( 'THEME_VERSION' ) ? THEME_VERSION : '' ),
		true
	);
}

/**
 * Enqueue block-editor sidebar controls.
 *
 * @return void
 */
function enqueue_sidebar_assets(): void {
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	$post_type = get_current_admin_post_type();
	if ( should_hide_flexline_primary_terms_ui( $post_type ) ) {
		return;
	}

	wp_enqueue_script(
		'flexline-primary-term-sidebar',
		get_theme_file_uri( 'assets/js/primary-term-sidebar.js' ),
		array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-i18n' ),
		function_exists( '\\FlexLine\\flexline_asset_ver' ) ? \FlexLine\flexline_asset_ver( 'assets/js/primary-term-sidebar.js' ) : ( defined( 'THEME_VERSION' ) ? THEME_VERSION : '' ),
		true
	);
}

/**
 * Register the custom permalink tag used for primary-category URLs.
 *
 * @return void
 */
function register_primary_term_permalink_rewrite_tag(): void {
	add_rewrite_tag( '%primary_term%', '([^/]+)', 'primary_term=' );
}

/**
 * Expose the primary-term permalink tag in Settings > Permalinks.
 *
 * @param array $available_tags Existing available tags.
 * @return array
 */
function filter_available_permalink_structure_tags( array $available_tags ): array {
	/* translators: %s: Permalink structure tag. */
	$available_tags['primary_term'] = __( '%s (Primary category slug from FlexLine Primary Terms.)', 'flexline' );

	return $available_tags;
}

/**
 * Resolve custom %primary_term% token via core %category% replacement.
 *
 * @param string  $permalink Permalink structure.
 * @param WP_Post $post      Post object.
 * @param bool    $leavename Whether to keep post name.
 * @return string
 */
function filter_pre_post_link_primary_term_tag( string $permalink, $post, bool $leavename ): string { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
	if ( ! $post instanceof WP_Post || 'post' !== $post->post_type ) {
		return $permalink;
	}

	if ( ! str_contains( $permalink, '%primary_term%' ) ) {
		return $permalink;
	}

	return str_replace( '%primary_term%', '%category%', $permalink );
}

/**
 * Use canonical primary category when resolving %category% in post permalinks.
 *
 * @param mixed   $cat  Preferred category object/ID from core.
 * @param array   $cats Assigned categories.
 * @param WP_Post $post Post object.
 * @return mixed
 */
function filter_post_link_category_primary_term( $cat, array $cats, $post ) {
	if ( ! $post instanceof WP_Post || 'post' !== $post->post_type ) {
		return $cat;
	}

	$post_id = (int) $post->ID;
	if ( $post_id <= 0 || ! is_supported_post_taxonomy( $post_id, 'category' ) ) {
		return $cat;
	}

	$primary_term_id = resolve_primary_term_id( $post_id, 'category' );
	if ( $primary_term_id <= 0 ) {
		return $cat;
	}

	foreach ( $cats as $candidate ) {
		if ( isset( $candidate->term_id ) && (int) $candidate->term_id === $primary_term_id ) {
			return $candidate;
		}
	}

	return $cat;
}

/**
 * Use canonical term preference for core breadcrumbs.
 *
 * @param array  $settings  Breadcrumb settings.
 * @param string $post_type Post type.
 * @param int    $post_id   Post ID.
 * @return array
 */
function filter_breadcrumbs_post_type_settings( $settings, $post_type, $post_id ): array {
	$post_id   = (int) $post_id;
	$post_type = (string) $post_type;

	if ( $post_id <= 0 || '' === $post_type ) {
		return $settings;
	}

	$taxonomies = wp_filter_object_list(
		get_object_taxonomies( $post_type, 'objects' ),
		array(
			'publicly_queryable' => true,
			'show_in_rest'       => true,
		)
	);
	if ( empty( $taxonomies ) ) {
		return $settings;
	}

	$taxonomy_slugs = array_keys( $taxonomies );
	sort( $taxonomy_slugs );

	if ( 'post' === $post_type ) {
		$category_index = array_search( 'category', $taxonomy_slugs, true );
		if ( false !== $category_index ) {
			unset( $taxonomy_slugs[ $category_index ] );
			array_unshift( $taxonomy_slugs, 'category' );
		}
	}

	// Core breadcrumbs only read taxonomy/term settings when the block is in taxonomy mode
	// (prefersTaxonomy=true). We still return settings unconditionally so pattern defaults can
	// opt into the behavior without any plugin coupling.
	foreach ( $taxonomy_slugs as $taxonomy ) {
		$term_id = resolve_primary_term_id( $post_id, $taxonomy );
		if ( $term_id <= 0 ) {
			continue;
		}

		$term = get_term( $term_id, $taxonomy );
		if ( ! $term || is_wp_error( $term ) ) {
			continue;
		}

		$settings['taxonomy'] = $taxonomy;
		$settings['term']     = (string) $term->slug;

		// First valid canonical match wins; if this taxonomy no longer resolves, core falls back.
		return $settings;
	}

	return $settings;
}

if ( class_exists( '\\WP_CLI_Command' ) ) {
	/**
	 * WP-CLI command for primary-term backfill/reporting.
	 */
	class Primary_Term_CLI_Command extends \WP_CLI_Command {
		/**
		 * Backfill canonical primary terms and source timestamps.
		 *
		 * ## OPTIONS
		 *
		 * [--post_type=<post_type>]
		 * : Limit to one post type.
		 *
		 * [--taxonomy=<taxonomy>]
		 * : Limit to one taxonomy.
		 *
		 * [--dry-run]
		 * : Compute results without writing.
		 *
		 * [--report=<format>]
		 * : Report format: table or json.
		 * ---
		 * default: table
		 * options:
		 *   - table
		 *   - json
		 * ---
		 *
		 * ## EXAMPLES
		 *
		 *     wp flexline primary-term backfill --dry-run --report=json
		 *
		 * @param array $args       Positional args.
		 * @param array $assoc_args Assoc args.
		 * @return void
		 */
		public function backfill( $args, $assoc_args ): void {
			$dry_run     = ! empty( $assoc_args['dry-run'] );
			$report      = isset( $assoc_args['report'] ) ? (string) $assoc_args['report'] : 'table';
			$post_type   = isset( $assoc_args['post_type'] ) ? sanitize_key( (string) $assoc_args['post_type'] ) : '';
			$taxonomy    = isset( $assoc_args['taxonomy'] ) ? sanitize_key( (string) $assoc_args['taxonomy'] ) : '';
			$per_page    = 200;
			$page        = 1;
			$total_posts = 0;

			if ( '' !== $post_type && ! post_type_exists( $post_type ) ) {
				WP_CLI::error( sprintf( 'Unknown post type: %s', $post_type ) );
			}

			if ( '' !== $taxonomy ) {
				$tax_obj = get_taxonomy( $taxonomy );
				if ( ! $tax_obj || ! $tax_obj->public ) {
					WP_CLI::error( sprintf( 'Unknown or non-public taxonomy: %s', $taxonomy ) );
				}
			}

			$post_types = '' !== $post_type
			? array( $post_type )
			: get_post_types(
				array(
					'public' => true,
				),
				'names'
			);

			$counts = array(
				'seeded-from-yoast'    => 0,
				'seeded-from-rankmath' => 0,
				'seeded-from-fallback' => 0,
				'unchanged'            => 0,
				'conflicts-resolved'   => 0,
				'invalid-skipped'      => 0,
			);

			do {
				$query = new WP_Query(
					array(
						'post_type'              => $post_types,
						'post_status'            => 'any',
						'posts_per_page'         => $per_page,
						'paged'                  => $page,
						'fields'                 => 'ids',
						'orderby'                => 'ID',
						'order'                  => 'ASC',
						'no_found_rows'          => true,
						'update_post_meta_cache' => false,
						'update_post_term_cache' => false,
					)
				);

				$post_ids     = array_map( 'intval', (array) $query->posts );
				$total_posts += count( $post_ids );

				foreach ( $post_ids as $post_id ) {
					$taxonomies = get_public_taxonomies_for_post( $post_id );
					if ( '' !== $taxonomy ) {
						$taxonomies = array_values(
							array_filter(
								$taxonomies,
								static function ( $tax_slug ) use ( $taxonomy ) {
									return $tax_slug === $taxonomy;
								}
							)
						);
					}

					if ( empty( $taxonomies ) ) {
						continue;
					}

					foreach ( $taxonomies as $taxonomy_slug ) {
						$result = normalize_primary_term_for_taxonomy(
							$post_id,
							$taxonomy_slug,
							array(
								'dry_run' => $dry_run,
							)
						);

						$status = (string) ( $result['status'] ?? 'invalid-skipped' );
						if ( ! isset( $counts[ $status ] ) ) {
							$status = 'invalid-skipped';
						}
						++$counts[ $status ];
					}
				}

				++$page;
			} while ( ! empty( $post_ids ) );

			if ( 'json' === $report ) {
				WP_CLI::line(
					wp_json_encode(
						array(
							'dry_run'          => $dry_run,
							'post_type_filter' => $post_type,
							'taxonomy_filter'  => $taxonomy,
							'posts_scanned'    => $total_posts,
							'counts'           => $counts,
						),
						JSON_PRETTY_PRINT
					)
				);
				return;
			}

			$rows = array();
			foreach ( $counts as $status => $count ) {
				$rows[] = array(
					'status' => $status,
					'count'  => $count,
				);
			}

			\WP_CLI\Utils\format_items( 'table', $rows, array( 'status', 'count' ) );
			WP_CLI::success(
				sprintf(
					'Backfill complete (%s). Posts scanned: %d.',
					$dry_run ? 'dry-run' : 'write',
					$total_posts
				)
			);
		}
	}
}

bootstrap_primary_terms();
