<?php
/**
 * Additive fragment protocol for the supported theme component handles.
 *
 * @package flexline
 */

namespace FlexLine;

/** Return the fixed transport catalog; arbitrary plugin scripts are not transported. */
function flexline_fragment_asset_catalog() {
	$definitions = array(
		'flexline-component-horizontal-scroll' => array( 'style', 'assets/built/css/component-horizontal-scroll.css', array( 'flexline-base' ) ),
		'flexline-component-slider'            => array( 'style', 'assets/built/css/component-slider.css', array( 'flexline-base' ) ),
		'flexline-modal-css'                   => array( 'style', 'assets/built/css/modal.css', array() ),
		'flexline-scroll'                      => array( 'script', 'assets/built/js/horizontal-scroll.js', array( 'flexline-load-early' ) ),
		'flexline-slider'                      => array( 'script', 'assets/built/js/slider.js', array( 'flexline-load-early', 'wp-i18n' ) ),
		'flexline-modal'                       => array( 'script', 'assets/built/js/modal.js', array( 'flexline-load-early', 'wp-i18n' ) ),
	);
	$catalog     = array();
	foreach ( $definitions as $handle => $definition ) {
		list( $kind, $path, $deps ) = $definition;
		$registered_handle          = 'flexline-modal-css' === $handle ? 'flexline-modal' : $handle;
		$registry                   = 'style' === $kind ? wp_styles() : wp_scripts();
		$item                       = $registry->registered[ $registered_handle ] ?? null;
		$version                    = $item ? $item->ver : flexline_asset_ver( $path );
		$src                        = $item ? $item->src : get_theme_file_uri( $path );
		$src                        = add_query_arg( 'ver', $version, $src );
		$catalog[ $handle ]         = array(
			'handle'       => $handle,
			'kind'         => $kind,
			'src'          => apply_filters( 'style' === $kind ? 'style_loader_src' : 'script_loader_src', $src, $registered_handle ),
			'version'      => (string) $version,
			'dependencies' => $item ? $item->deps : $deps,
		);
	}
	return $catalog;
}

/**
 * Generate metadata only after the plugin's authorized renderer has produced HTML.
 * Cached markup is scanned too; no content or permission resolution is bypassed.
 *
 * @param mixed  $metadata Earlier integration metadata.
 * @param string $html Authorized rendered fragment.
 * @return array
 */
function flexline_fragment_asset_metadata( $metadata, $html ) {
	$features = array_replace( $GLOBALS['flexline_component_requirements'] ?? array(), flexline_markup_requirements( $html ) );
	$handles  = array();
	if ( ! empty( $features['horizontal-scroll'] ) || ! empty( $features['horizontal-scroll-mobile'] ) ) {
		$handles[] = 'flexline-component-horizontal-scroll';
	}
	if ( ! empty( $features['slider'] ) ) {
		$handles[] = 'flexline-component-slider';
	}
	if ( ! empty( $features['modal'] ) ) {
		$handles[] = 'flexline-modal-css';
	}
	foreach ( array(
		'horizontal-scroll' => 'flexline-scroll',
		'slider'            => 'flexline-slider',
		'modal'             => 'flexline-modal',
	) as $feature => $handle ) {
		if ( ! empty( $features[ $feature ] ) ) {
			$handles[] = $handle;
		}
	}
	$catalog = flexline_fragment_asset_catalog();
	return array(
		'schema'   => 1,
		'features' => array_keys( array_filter( $features ) ),
		'assets'   => array_values( array_intersect_key( $catalog, array_fill_keys( $handles, true ) ) ),
	);
}
add_filter( 'web4sl_fragment_assets', __NAMESPACE__ . '\flexline_fragment_asset_metadata', 10, 2 );

/** Predeclare dependencies and translations that cannot safely be reconstructed in JSON. */
function flexline_enqueue_fragment_loader() {
	if ( ! apply_filters( 'flexline_fragment_assets_enabled', ! empty( $GLOBALS['flexline_fragment_host'] ) ) ) {
		return;
	}
	$handle = 'flexline-component-loader';
	if ( wp_script_is( $handle, 'enqueued' ) ) {
		return;
	}
	$path = 'assets/built/js/component-loader.js';
	$deps = array( 'flexline-load-early', 'wp-i18n' );
	foreach ( array( 'flexline-scroll', 'flexline-slider', 'flexline-modal' ) as $dependency ) {
		if ( wp_script_is( $dependency, 'enqueued' ) ) {
			$deps[] = $dependency;
		}
	}
	wp_register_script( $handle, get_theme_file_uri( $path ), $deps, flexline_asset_ver( $path ), true );
	wp_script_add_data( $handle, 'strategy', 'defer' );
	foreach ( array( 'flexline-slider', 'flexline-modal' ) as $translated ) {
		$translations = wp_scripts()->print_translations( $translated, false );
		if ( $translations ) {
			wp_add_inline_script( $handle, $translations, 'before' );
		}
	}
	$config = array(
		'schema'   => 1,
		'complete' => empty( $GLOBALS['flexline_component_delivery']['split'] ),
		'catalog'  => flexline_fragment_asset_catalog(),
	);
	wp_add_inline_script( $handle, 'window.FlexlineComponentAssets = ' . wp_json_encode( $config ) . ';', 'before' );
	wp_enqueue_script( $handle );
}

add_action( 'wp_footer', __NAMESPACE__ . '\\flexline_enqueue_fragment_loader', 1 );
