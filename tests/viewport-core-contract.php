<?php
// phpcs:ignoreFile -- Standalone CLI contract; WordPress runtime functions are unavailable.
/**
 * Check theme/SCSS viewport agreement using an installed Core parser, without DB.
 * Run: WP_CORE_DIR=/path/to/wordpress php tests/viewport-core-contract.php
 *
 * @package flexline
 */

declare(strict_types=1);

$core = getenv( 'WP_CORE_DIR' );
if ( ! $core || ! is_file( $core . '/wp-includes/class-wp-theme-json.php' ) ) {
	fwrite( STDERR, "Set WP_CORE_DIR to an installed WordPress directory.\n" );
	exit( 1 );
}
require $core . '/wp-includes/class-wp-theme-json.php';
if ( ! method_exists( 'WP_Theme_JSON', 'get_viewport_media_queries' ) ) {
	fwrite( STDERR, "Core lacks configurable viewport support.\n" );
	exit( 1 );
}
$theme = json_decode( file_get_contents( dirname( __DIR__ ) . '/theme.json' ), true, 512, JSON_THROW_ON_ERROR );
$viewports = $theme['settings']['viewport'];
$scss = file_get_contents( dirname( __DIR__ ) . '/src/scss/shared/main/_variables.scss' );
foreach ( array( 'mobile' => 'm', 'tablet' => 'tLarge' ) as $viewport => $variable ) {
	if ( ! preg_match( '/\$' . $variable . '\s*:\s*' . preg_quote( $viewports[ $viewport ], '/' ) . '\s*;/', $scss ) ) {
		throw new RuntimeException( 'Core viewport differs from SCSS: ' . $viewport );
	}
}
$queries = WP_Theme_JSON::get_viewport_media_queries( $viewports, array( 'include_desktop' => true ) );
$expected = array(
	'@mobile' => '@media (width <= 781.98px)',
	'@tablet' => '@media (781.98px < width <= 991.98px)',
	'@desktop' => '@media (width > 991.98px)',
);
if ( $queries !== $expected ) {
	throw new RuntimeException( 'Unexpected Core viewport ranges.' );
}
echo "PASS: Core viewport queries match FlexLine maxima.\n";
echo json_encode( $queries, JSON_PRETTY_PRINT ) . "\n";
