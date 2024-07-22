<?php
/**
 * Adds custom classes to apply to <main>
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

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

	$classes = apply_filters( 'flexlinetheme_main_classes', $classes );

	return implode( ' ', $classes );
}
