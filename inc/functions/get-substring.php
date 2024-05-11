<?php
/**
 * Return Substring from between two strings.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Return Substring from between two strings.
 *
 * @param string $string whole string.
 * @param string $start the section to start from.
 * @param string $end the section to end at.
 *
 * @author Joel Schlotterer
 * @return string Ads Script for head.
 */
function get_string_between( $string, $start, $end ) {
	$string = ' ' . $string;
	$ini    = strpos( $string, $start );
	if ( 0 === $ini ) {
		return '';
	}
	$ini += strlen( $start );
	$len  = strpos( $string, $end, $ini ) - $ini;
	return substr( $string, $ini, $len );
}
