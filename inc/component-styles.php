<?php
/**
 * Feature delivery for the native block-template canvas and compatibility mode.
 *
 * @package flexline
 */

namespace FlexLine;

require_once __DIR__ . '/component-requirements.php';
require_once __DIR__ . '/component-fragments.php';

/**
 * Record the native canvas, whose complete template renders before wp_head.
 *
 * @param string $template Selected PHP template path.
 * @return string
 */
function flexline_component_template( $template ) {
	$GLOBALS['flexline_component_native_canvas'] = wp_normalize_path( $template ) === wp_normalize_path( ABSPATH . WPINC . '/template-canvas.php' );
	return $template;
}
add_filter( 'template_include', __NAMESPACE__ . '\flexline_component_template', PHP_INT_MAX );

/** Register stable dependencies before nested blocks can request assets. */
function flexline_register_component_assets() {
	wp_register_script( 'flexline-load-early', get_theme_file_uri( 'assets/built/js/load-early.js' ), array(), flexline_asset_ver( 'assets/built/js/load-early.js' ), false );
	wp_script_add_data( 'flexline-load-early', 'strategy', 'defer' );
	foreach ( array(
		'scroll' => 'horizontal-scroll',
		'slider' => 'slider',
		'modal'  => 'modal',
	) as $handle => $file ) {
		$path = 'assets/built/js/' . $file . '.js';
		$deps = array( 'flexline-load-early' );
		if ( 'scroll' !== $handle ) {
			$deps[] = 'wp-i18n';
		}
		wp_register_script( 'flexline-' . $handle, get_theme_file_uri( $path ), $deps, flexline_asset_ver( $path ), true );
		wp_script_add_data( 'flexline-' . $handle, 'strategy', 'defer' );
		if ( 'scroll' !== $handle ) {
			wp_set_script_translations( 'flexline-' . $handle, 'flexline', get_template_directory() . '/languages' );
		}
	}
	wp_register_style( 'flexline-modal', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), flexline_asset_ver( 'assets/built/css/modal.css' ) );
}
add_action( 'init', __NAMESPACE__ . '\flexline_register_component_assets', 20 );

/**
 * Observe all nested rendering, including template parts, Query Loops and cache hits.
 *
 * @param string $content Rendered markup.
 * @param array  $block Parsed block.
 * @return string
 */
function flexline_collect_component_styles( $content, $block ) {
	if ( is_admin() ) {
		return $content;
	}
	if ( in_array( $block['blockName'] ?? '', array( 'web4sl/location-map', 'web4sl/advanced-floor-plans' ), true ) ) {
		$GLOBALS['flexline_fragment_host'] = true;
	}
	// Capture requirements even in fragment requests; delivery remains request-local.
	flexline_require_components( flexline_markup_requirements( $content, $block['attrs'] ?? array() ) );
	if ( ! did_action( 'wp_head' ) ) {
		$GLOBALS['flexline_component_render_seen'] = true;
		$references                                = flexline_configured_pattern_references( $block );
		if ( null === $references ) {
			$GLOBALS['flexline_component_fallback']['unavailable-plugin-resolver'] = true;
		}
		foreach ( (array) $references as $reference ) {
			$result = flexline_pattern_requirements( $reference );
			flexline_require_components( $result['features'] );
			$GLOBALS['flexline_component_fallback'] = array_replace( $GLOBALS['flexline_component_fallback'] ?? array(), $result['fallback'] );
			foreach ( array( 'styles', 'scripts' ) as $kind ) {
				$GLOBALS['flexline_pattern_assets'][ $kind ] = array_replace( $GLOBALS['flexline_pattern_assets'][ $kind ] ?? array(), $result[ $kind ] );
			}
		}
		if ( 'web4sl/location-map' === ( $block['blockName'] ?? '' ) || 'web4sl/floor-plan-media-toggle' === ( $block['blockName'] ?? '' ) ) {
			flexline_require_components( array( 'modal' => true ) );
		}
	}
	return $content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_collect_component_styles', PHP_INT_MAX, 2 );

/** Handles that must precede site-level customization. */
function flexline_component_style_dependencies() {
	return $GLOBALS['flexline_component_style_handles'] ?? array( 'flexline-base' );
}

/**
 * Deliver one feature union for CSS, runtimes and startup styling.
 * Complete mode includes all theme feature runtimes for late/custom templates.
 */
function flexline_enqueue_component_styles() {
	flexline_register_component_assets();
	$local   = in_array( wp_get_environment_type(), array( 'local', 'development' ), true );
	$enabled = (bool) apply_filters( 'flexline_conditional_component_styles', get_option( 'flexline_conditional_component_styles', $local ) );
	$split   = $enabled && ! is_admin() && ! empty( $GLOBALS['flexline_component_native_canvas'] ) && ! empty( $GLOBALS['flexline_component_render_seen'] );
	$files   = array(
		'tail'              => 'assets/built/css/component-tail.css',
		'base'              => 'assets/built/css/base.css',
		'horizontal-scroll' => 'assets/built/css/component-horizontal-scroll.css',
		'slider'            => 'assets/built/css/component-slider.css',
	);
	foreach ( $files as $file ) {
		if ( ! is_readable( get_theme_file_path( $file ) ) ) {
			$GLOBALS['flexline_component_fallback']['missing-component-file'] = true;
		}
	}
	// Retain the original integration filter; it now declares runtime needs as well.
	flexline_require_components( apply_filters( 'flexline_required_component_styles', $GLOBALS['flexline_component_requirements'] ?? array() ) );
	foreach ( array( 'styles', 'scripts' ) as $kind ) {
		foreach ( array_keys( $GLOBALS['flexline_pattern_assets'][ $kind ] ?? array() ) as $handle ) {
			$registered = 'styles' === $kind ? wp_style_is( $handle, 'registered' ) : wp_script_is( $handle, 'registered' );
			if ( ! $registered ) {
				$GLOBALS['flexline_component_fallback']['unregistered-pattern-asset'] = true;
				continue;
			}
			if ( 'styles' === $kind ) {
				wp_enqueue_style( $handle );
			} else {
				wp_enqueue_script( $handle );
			}
		}
	}
	$split    = $split && empty( $GLOBALS['flexline_component_fallback'] );
	$required = $split ? ( $GLOBALS['flexline_component_requirements'] ?? array() ) : array_fill_keys( array( 'slider', 'horizontal-scroll', 'modal' ), true );
	$base     = $split ? $files['base'] : 'assets/built/css/app.css';
	wp_enqueue_style( 'flexline-base', get_theme_file_uri( $base ), array(), flexline_asset_ver( $base ) );
	$handles = array( 'flexline-base' );
	if ( $split ) {
		foreach ( array( 'horizontal-scroll', 'slider' ) as $component ) {
			$needed = ! empty( $required[ $component ] ) || ( 'horizontal-scroll' === $component && ! empty( $required['horizontal-scroll-mobile'] ) );
			if ( $needed ) {
				$handle = 'flexline-component-' . $component;
				wp_enqueue_style( $handle, get_theme_file_uri( $files[ $component ] ), $handles, flexline_asset_ver( $files[ $component ] ) );
				$handles[] = $handle;
			}
		}
		// Broad toggle/Plethora overrides must remain after optional feature rules.
		wp_register_style( 'flexline-component-tail', false, $handles, flexline_asset_ver( $files['tail'] ) );
		wp_enqueue_style( 'flexline-component-tail' );
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local compiled asset.
		wp_add_inline_style( 'flexline-component-tail', file_get_contents( get_theme_file_path( $files['tail'] ) ) );
		$handles[] = 'flexline-component-tail';
	}
	foreach ( array(
		'horizontal-scroll' => 'flexline-scroll',
		'slider'            => 'flexline-slider',
		'modal'             => 'flexline-modal',
	) as $feature => $handle ) {
		if ( ! empty( $required[ $feature ] ) ) {
			wp_enqueue_script( $handle );
		}
	}
	if ( ! empty( $required['modal'] ) ) {
		wp_enqueue_style( 'flexline-modal' );
		$handles[] = 'flexline-modal';
	}
	$GLOBALS['flexline_component_style_handles'] = $handles;
	$GLOBALS['flexline_component_delivery']      = array(
		'split'    => $split,
		'features' => $required,
		'fallback' => array_keys( $GLOBALS['flexline_component_fallback'] ?? array() ),
	);
	flexline_enqueue_fragment_loader();
	if ( $local && ! empty( $GLOBALS['flexline_component_fallback'] ) ) {
		// Inspectable without leaking pattern IDs or content into public HTML/logs.
		do_action( 'flexline_component_diagnostic', $GLOBALS['flexline_component_delivery'] );
	}
}
