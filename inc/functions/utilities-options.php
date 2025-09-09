<?php
/**
 * FlexLine Utilities options helper.
 *
 * Centralizes reading the utilities options with sane defaults so other
 * theme features (OG tags, security hardening, comments disable, etc.)
 * can reference a consistent source.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Return FlexLine Utilities options merged with defaults.
 *
 * @return array
 */
function flexline_utilities_get_options(): array {
	$defaults = array(
		'enable_og_tags'       => 0,
		'og_skip_if_yoast'     => 0,
		'remove_generator'     => 1,
		'disable_xmlrpc'       => 1,
		'rest_cors_allow_all'  => 0,
		'disable_all_comments' => 0,
	);

	$opts = get_option( 'flexline_utilities', array() );
	return wp_parse_args( is_array( $opts ) ? $opts : array(), $defaults );
}
