<?php
// phpcs:ignoreFile -- Standalone CLI contract; WordPress runtime functions are unavailable.
/**
 * Verify the legacy directory layout schema accepted by server previews.
 *
 * @package flexline
 */

declare(strict_types=1);

// Load the hooks without a database or WordPress runtime.
function add_action( ...$args ) {} // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
function add_filter( ...$args ) {} // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
require dirname( __DIR__ ) . '/inc/blocks/block-extensions.php';

foreach ( array( 'location-address', 'location-phone-link', 'location-map-link', 'location-filter-family' ) as $block ) {
	$metadata = array( 'name' => 'web4sl/' . $block, 'supports' => array( 'spacing' => true ) );
	$actual = \FlexLine\flexline_register_directory_layout_attributes( $metadata );
	foreach ( array( 'stackAtTablet', 'hideOnDesktop', 'hideOnTablet', 'hideOnMobile' ) as $attribute ) {
		if ( $actual['attributes'][ $attribute ] !== array( 'type' => 'boolean', 'default' => false ) ) {
			throw new RuntimeException( 'Missing server schema for ' . $attribute );
		}
	}
	if ( $actual['supports'] !== $metadata['supports'] ) {
		throw new RuntimeException( 'Existing supports changed.' );
	}
}
$existing = array( 'name' => 'web4sl/location-address', 'attributes' => array( 'stackAtTablet' => array( 'type' => 'boolean', 'default' => true ) ) );
if ( ! \FlexLine\flexline_register_directory_layout_attributes( $existing )['attributes']['stackAtTablet']['default'] ) {
	throw new RuntimeException( 'An existing declaration was replaced.' );
}
foreach ( array( 'web4sl/location-map', 'web4sl/advanced-floor-plans', 'core/paragraph' ) as $name ) {
	$untouched = array( 'name' => $name );
	if ( \FlexLine\flexline_register_directory_layout_attributes( $untouched ) !== $untouched ) {
		throw new RuntimeException( 'An unrelated block was changed.' );
	}
}
echo "PASS: legacy directory controls accepted without changing other schemas.\n";
