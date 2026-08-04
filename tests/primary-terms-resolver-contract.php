<?php
// phpcs:ignoreFile
/**
 * Contract tests for FlexLine primary-term resolution.
 *
 * These tests intentionally use a small WordPress function shim instead of the
 * WordPress PHPUnit suite so primary-term precedence can be verified in this
 * theme repository without adding a full WP test install.
 *
 * @package flexline
 */

declare(strict_types=1);

define( 'ABSPATH', __DIR__ . '/../' );

if ( ! class_exists( 'WP_Post' ) ) {
	/**
	 * Minimal WP_Post shim.
	 */
	class WP_Post {
		/**
		 * Post ID.
		 *
		 * @var int
		 */
		public $ID;

		/**
		 * Post type.
		 *
		 * @var string
		 */
		public $post_type = 'post';
	}
}

if ( ! class_exists( 'WP_Taxonomy' ) ) {
	/**
	 * Minimal WP_Taxonomy shim.
	 */
	class WP_Taxonomy {
		/**
		 * Taxonomy name.
		 *
		 * @var string
		 */
		public $name = 'category';

		/**
		 * Public flag.
		 *
		 * @var bool
		 */
		public $public = true;

		/**
		 * UI flag.
		 *
		 * @var bool
		 */
		public $show_ui = true;

		/**
		 * REST flag.
		 *
		 * @var bool
		 */
		public $show_in_rest = true;

		/**
		 * Hierarchical flag.
		 *
		 * @var bool
		 */
		public $hierarchical = true;
	}
}

$GLOBALS['flexline_primary_terms_test'] = array();

/**
 * Reset fake WordPress data.
 *
 * @return void
 */
function flexline_primary_terms_test_reset(): void {
	$GLOBALS['flexline_primary_terms_test'] = array(
		'meta'    => array(),
		'terms'   => array(
			'category' => array(
				1 => 'Alpha',
				2 => 'Bravo',
				3 => 'Charlie',
			),
		),
		'assigned' => array(),
		'updates' => array(),
		'deletes' => array(),
	);
}

/**
 * Assign fake terms to a fake post.
 *
 * @param int   $post_id  Post ID.
 * @param array $term_ids Term IDs.
 * @return void
 */
function flexline_primary_terms_assign_terms( int $post_id, array $term_ids ): void {
	$GLOBALS['flexline_primary_terms_test']['assigned'][ $post_id ]['category'] = array_map( 'intval', $term_ids );
}

/**
 * Set fake post meta.
 *
 * @param int    $post_id Post ID.
 * @param string $key     Meta key.
 * @param int    $value   Meta value.
 * @return void
 */
function flexline_primary_terms_set_meta( int $post_id, string $key, int $value ): void {
	$GLOBALS['flexline_primary_terms_test']['meta'][ $post_id ][ $key ] = $value;
}

/**
 * Assert equality.
 *
 * @param mixed  $expected Expected value.
 * @param mixed  $actual   Actual value.
 * @param string $message  Message.
 * @return void
 */
function flexline_primary_terms_assert_same( $expected, $actual, string $message ): void {
	if ( $expected !== $actual ) {
		throw new RuntimeException(
			sprintf(
				"%s\nExpected: %s\nActual: %s",
				$message,
				var_export( $expected, true ),
				var_export( $actual, true )
			)
		);
	}
}

/**
 * Assert truthy value.
 *
 * @param mixed  $actual  Actual value.
 * @param string $message Message.
 * @return void
 */
function flexline_primary_terms_assert_true( $actual, string $message ): void {
	flexline_primary_terms_assert_same( true, (bool) $actual, $message );
}

function add_action(): void {}
function add_filter(): void {}
function add_rewrite_tag(): void {}
function apply_filters( $hook_name, $value ) {
	return $value;
}
function absint( $value ): int {
	return abs( (int) $value );
}
function taxonomy_exists( $taxonomy ): bool {
	return isset( $GLOBALS['flexline_primary_terms_test']['terms'][ $taxonomy ] );
}
function get_taxonomy( $taxonomy ) {
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return false;
	}
	$object       = new WP_Taxonomy();
	$object->name = $taxonomy;
	return $object;
}
function post_type_exists( $post_type ): bool {
	return 'post' === $post_type;
}
function get_post_type( $post_id ) {
	return $post_id > 0 ? 'post' : false;
}
function is_object_in_taxonomy( $post_type, $taxonomy ): bool {
	return 'post' === $post_type && 'category' === $taxonomy;
}
function term_exists( $term_id, $taxonomy ) {
	return isset( $GLOBALS['flexline_primary_terms_test']['terms'][ $taxonomy ][ (int) $term_id ] );
}
function has_term( $term_id, $taxonomy, $post_id ): bool {
	return in_array(
		(int) $term_id,
		$GLOBALS['flexline_primary_terms_test']['assigned'][ (int) $post_id ][ $taxonomy ] ?? array(),
		true
	);
}
function is_wp_error( $thing ): bool {
	return false;
}
function get_the_terms( $post_id, $taxonomy ) {
	$assigned = $GLOBALS['flexline_primary_terms_test']['assigned'][ (int) $post_id ][ $taxonomy ] ?? array();
	if ( empty( $assigned ) ) {
		return array();
	}

	return array_map(
		static function ( int $term_id ) use ( $taxonomy ) {
			return (object) array(
				'term_id' => $term_id,
				'name'    => $GLOBALS['flexline_primary_terms_test']['terms'][ $taxonomy ][ $term_id ],
				'slug'    => strtolower( $GLOBALS['flexline_primary_terms_test']['terms'][ $taxonomy ][ $term_id ] ),
			);
		},
		$assigned
	);
}
function get_post_meta( $post_id, $key, $single = false ) {
	return $GLOBALS['flexline_primary_terms_test']['meta'][ (int) $post_id ][ $key ] ?? '';
}
function metadata_exists( $type, $post_id, $key ): bool {
	return isset( $GLOBALS['flexline_primary_terms_test']['meta'][ (int) $post_id ][ $key ] );
}
function update_post_meta( $post_id, $key, $value ): void {
	$GLOBALS['flexline_primary_terms_test']['meta'][ (int) $post_id ][ $key ]     = (int) $value;
	$GLOBALS['flexline_primary_terms_test']['updates'][] = array( (int) $post_id, $key, (int) $value );
}
function delete_post_meta( $post_id, $key ): void {
	unset( $GLOBALS['flexline_primary_terms_test']['meta'][ (int) $post_id ][ $key ] );
	$GLOBALS['flexline_primary_terms_test']['deletes'][] = array( (int) $post_id, $key );
}

require __DIR__ . '/../inc/hooks/primary-terms.php';

$tests = array(
	'yoast wins over flexline fallback'        => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 10, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 10, 'w4sl_primary_category', 1 );
		flexline_primary_terms_set_meta( 10, '_yoast_wpseo_primary_category', 2 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 10, 'category' );

		flexline_primary_terms_assert_same( 2, $result['term_id'], 'Yoast term should be resolved.' );
		flexline_primary_terms_assert_same( 'yoast', $result['source'], 'Yoast should be reported as source.' );
		flexline_primary_terms_assert_same( 2, get_post_meta( 10, '_yoast_wpseo_primary_category', true ), 'Yoast meta should not be changed.' );
		flexline_primary_terms_assert_same( 2, get_post_meta( 10, 'w4sl_primary_category', true ), 'FlexLine canonical cache should track the Yoast winner.' );
	},
	'rank math wins when yoast is invalid'     => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 16, array( 1, 2, 3 ) );
		flexline_primary_terms_set_meta( 16, 'w4sl_primary_category', 1 );
		flexline_primary_terms_set_meta( 16, '_yoast_wpseo_primary_category', 99 );
		flexline_primary_terms_set_meta( 16, 'rank_math_primary_category', 3 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 16, 'category' );

		flexline_primary_terms_assert_same( 3, $result['term_id'], 'Rank Math term should resolve after invalid Yoast.' );
		flexline_primary_terms_assert_same( 'rank_math', $result['source'], 'Rank Math should be reported as source.' );
		flexline_primary_terms_assert_same( 3, get_post_meta( 16, 'rank_math_primary_category', true ), 'Rank Math meta should not be changed.' );
		flexline_primary_terms_assert_same( 3, get_post_meta( 16, 'w4sl_primary_category', true ), 'FlexLine canonical cache should track the Rank Math winner.' );
	},
	'invalid yoast falls back to flexline'     => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 11, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 11, 'w4sl_primary_category', 1 );
		flexline_primary_terms_set_meta( 11, '_yoast_wpseo_primary_category', 3 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 11, 'category' );

		flexline_primary_terms_assert_same( 1, $result['term_id'], 'FlexLine fallback should be used when Yoast term is not assigned.' );
		flexline_primary_terms_assert_same( 'w4sl', $result['source'], 'FlexLine should be reported as fallback source.' );
		flexline_primary_terms_assert_same( 3, get_post_meta( 11, '_yoast_wpseo_primary_category', true ), 'Invalid Yoast meta should not be deleted.' );
	},
	'missing yoast falls back to flexline'     => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 12, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 12, 'w4sl_primary_category', 2 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 12, 'category' );

		flexline_primary_terms_assert_same( 2, $result['term_id'], 'FlexLine fallback should resolve without Yoast.' );
		flexline_primary_terms_assert_same( 'w4sl', $result['source'], 'FlexLine should be reported as source.' );
	},
	'no source seeds from first assigned term' => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 13, array( 1, 2 ) );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 13, 'category' );

		flexline_primary_terms_assert_same( 1, $result['term_id'], 'First assigned term should seed FlexLine canonical fallback.' );
		flexline_primary_terms_assert_same( 'fallback', $result['source'], 'Fallback source should be reported.' );
		flexline_primary_terms_assert_same( 1, get_post_meta( 13, 'w4sl_primary_category', true ), 'Seeded fallback should be cached in FlexLine canonical meta.' );
	},
	'unassigned flexline fallback is reseeded' => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 14, array( 1 ) );
		flexline_primary_terms_set_meta( 14, 'w4sl_primary_category', 2 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 14, 'category' );

		flexline_primary_terms_assert_same( 1, $result['term_id'], 'Invalid fallback should reseed from first assigned term.' );
		flexline_primary_terms_assert_same( 1, get_post_meta( 14, 'w4sl_primary_category', true ), 'Invalid FlexLine fallback should be replaced.' );
	},
	'flexline save does not overwrite yoast'   => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 15, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 15, '_yoast_wpseo_primary_category', 2 );

		FlexLine\PrimaryTerms\handle_primary_meta_change( 15, 'w4sl_primary_category', 1, false );

		flexline_primary_terms_assert_same( 2, get_post_meta( 15, '_yoast_wpseo_primary_category', true ), 'Yoast meta should not be overwritten by FlexLine fallback save.' );
		flexline_primary_terms_assert_same( 2, FlexLine\PrimaryTerms\resolve_primary_term_id( 15, 'category' ), 'Yoast term should remain authoritative.' );
	},
	'seo cache does not become user fallback'  => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 17, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 17, 'w4sl_primary_category', 2 );
		flexline_primary_terms_set_meta( 17, 'w4sl_primary_category_ts_yoast', 100 );

		$result = FlexLine\PrimaryTerms\normalize_primary_term_for_taxonomy( 17, 'category' );

		flexline_primary_terms_assert_same( 1, $result['term_id'], 'SEO-owned canonical cache should not resurrect after SEO primary is gone.' );
		flexline_primary_terms_assert_same( 'fallback', $result['source'], 'First assigned fallback should be used instead.' );
	},
	'deleted yoast primary does not resurrect cache' => static function (): void {
		flexline_primary_terms_test_reset();
		flexline_primary_terms_assign_terms( 18, array( 1, 2 ) );
		flexline_primary_terms_set_meta( 18, 'w4sl_primary_category', 2 );
		flexline_primary_terms_set_meta( 18, 'w4sl_primary_category_ts_yoast', 100 );

		FlexLine\PrimaryTerms\handle_primary_meta_change( 18, '_yoast_wpseo_primary_category', 2, true );

		flexline_primary_terms_assert_same( 1, get_post_meta( 18, 'w4sl_primary_category', true ), 'Deleted Yoast primary should be replaced by first assigned fallback.' );
		flexline_primary_terms_assert_same( 1, FlexLine\PrimaryTerms\resolve_primary_term_id( 18, 'category' ), 'Deleted Yoast primary should not be resurrected from cache.' );
	},
);

$failures = 0;

foreach ( $tests as $name => $test ) {
	try {
		$test();
		echo "PASS {$name}\n";
	} catch ( Throwable $throwable ) {
		++$failures;
		echo "FAIL {$name}\n{$throwable->getMessage()}\n";
	}
}

if ( $failures > 0 ) {
	exit( 1 );
}
