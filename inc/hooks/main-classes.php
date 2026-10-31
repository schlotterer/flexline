<?php
/**
 * Adds custom classes to apply to <main>
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds custom classes to apply to <main>
 *
 * @author Joel Schlotterer
 *
 * @param array $new_classes Classes for the <main> element.
 *
 * @return array main classes.
 */
function main_classes( $new_classes ) {

	$classes = array( 'site-main' );

	if ( ! empty( $new_classes ) ) {
		$classes = array_merge( $classes, $new_classes );
	}

	$classes = apply_filters( 'flexline_main_classes', $classes );

	return implode( ' ', $classes );
}
