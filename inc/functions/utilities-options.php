<?php
/**
 * FlexLine Utilities options helper.
 *
 * Centralizes reading the utilities options with sane defaults so other
 * theme features (OG tags, comments disable, etc.) can reference a consistent
 * source.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Return the canonical FlexLine Utilities defaults.
 *
 * @return array
 */
function flexline_utilities_get_defaults(): array {
	return array(
		'enable_og_tags'       => 1,
		'disable_all_comments' => 0,
	);
}

/**
 * Return FlexLine Utilities options merged with defaults.
 *
 * @return array
 */
function flexline_utilities_get_options(): array {
	$defaults = flexline_utilities_get_defaults();

	$opts = get_option( 'flexline_utilities', array() );
	return wp_parse_args( is_array( $opts ) ? $opts : array(), $defaults );
}
