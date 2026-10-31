<?php
/**
 * WP-CLI command for FlexLine primary terms.
 *
 * @package flexline
 */

namespace FlexLine\PrimaryTerms;

use WP_CLI;
use WP_Query;

defined( 'ABSPATH' ) || exit;

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
				'yoast-authoritative'     => 0,
				'rank-math-authoritative' => 0,
				'fallback-flexline'       => 0,
				'seeded-from-fallback'    => 0,
				'unchanged'               => 0,
				'conflicts-resolved'      => 0,
				'invalid-skipped'         => 0,
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
