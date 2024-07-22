<?php
/**
 * Return Substring from between two strings.
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Return Substring from between two strings.
 *
 * @param string $initial_string whole string.
 * @param string $start the section to start from.
 * @param string $end the section to end at.
 *
 * @author Joel Schlotterer
 * @return string Ads Script for head.
 */
function get_string_between( $initial_string, $start, $end ) {
	$initial_string = ' ' . $initial_string;
	$ini            = strpos( $initial_string, $start );
	if ( 0 === $ini ) {
		return '';
	}
	$ini += strlen( $start );
	$len  = strpos( $initial_string, $end, $ini ) - $ini;
	return substr( $initial_string, $ini, $len );
}
