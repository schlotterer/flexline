<?php
/**
 * Run with wp eval-file in a bootstrapped WordPress installation.
 * Exercises real Core rewrite generation without saving settings or rules.
 *
 * @package flexline
 */

if ( ! defined( 'ABSPATH' ) || ! class_exists( 'WP_Rewrite' ) ) {
	throw new RuntimeException( 'Run through wp eval-file.' );
}

$original_rewrite = $GLOBALS['wp_rewrite'];
try {
	foreach ( array( '/%primary_term%/%postname%/', '/blog/%primary_term%/%postname%/', '/%postname%/', '/%year%/%postname%/' ) as $structure ) {
		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- Isolated test clone; restored in finally.
		$GLOBALS['wp_rewrite']        = clone $original_rewrite;
		$rewrite                      = $GLOBALS['wp_rewrite'];
		$rewrite->permalink_structure = $structure;
		// Simulate Core resetting its flag when permalink settings change.
		$rewrite->use_verbose_page_rules = (bool) preg_match( '/^[^%]*%(?:postname|category|tag|author)%/', $structure );
		$rules                           = $rewrite->rewrite_rules();
		$expected                        = ! str_contains( $structure, '%year%' );
		if ( $rewrite->use_verbose_page_rules !== $expected ) {
			throw new RuntimeException( 'Wrong page precedence: ' . $structure );
		}
		if ( str_contains( $structure, '%primary_term%' ) ) {
			$page_index = null;
			$term_index = null;
			foreach ( array_values( $rules ) as $index => $query ) {
				if ( null === $page_index && str_contains( $query, 'pagename=' ) ) {
					$page_index = $index;
				}
				if ( null === $term_index && str_contains( $query, 'primary_term=' ) ) {
					$term_index = $index;
				}
			}
			if ( null === $page_index || null === $term_index || $page_index >= $term_index ) {
				throw new RuntimeException( 'Page rules must precede primary-term rules.' );
			}
		}
		echo 'PASS ' . esc_html( $structure ) . "\n";
	}
} finally {
	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- Restore the original test environment.
	$GLOBALS['wp_rewrite'] = $original_rewrite;
}
