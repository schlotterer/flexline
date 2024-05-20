<?php
/**
 * Replaces the first occurrence of a string in a string.
 *
 * This function searches for the first occurrence of a specified string
 * within another string and replaces it with a given replacement string.
 *
 * @param string $search  The substring to search for.
 * @param string $replace The replacement string.
 * @param string $subject The string to search within.
 * @return string The modified string with the first occurrence of the search string replaced.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Replaces the first occurrence of a string in a string.
 *
 * @param string $search  The substring to search for.
 * @param string $replace The replacement string.
 * @param string $subject The string to search within.
 * @return string The modified string with the first occurrence of the search string replaced.
 */
function str_replace_first( $search, $replace, $subject ) {
	$pos = strpos( $subject, $search );
	if ( false !== $pos ) {
		return substr_replace( $subject, $replace, $pos, strlen( $search ) );
	}
	return $subject;
}
