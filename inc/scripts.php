<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine;

require_once __DIR__ . '/component-styles.php';

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_styles' );

/**
 * Return a cache-busting version string for a theme asset using filemtime.
 * Falls back to THEME_VERSION if the file is not found.
 *
 * @param string $relative_path Path relative to the theme root.
 * @return string Version string
 */
function flexline_asset_ver( $relative_path ) {
	static $cache = array();
	if ( isset( $cache[ $relative_path ] ) ) {
		return $cache[ $relative_path ];
	}
	$path                    = get_theme_file_path( $relative_path );
	$cache[ $relative_path ] = file_exists( $path )
		? (string) filemtime( $path )
		: ( defined( 'THEME_VERSION' ) ? THEME_VERSION : '' );
	return $cache[ $relative_path ];
}

/**
 * Enqueues the necessary styles and scripts for the theme.
 *
 * This function registers and enqueues the necessary styles and scripts for the theme.
 * It includes the theme's main CSS file, the base CSS file, the modal CSS file,
 * the customized CSS file, and the necessary scripts.
 *
 * @return void
 */
function flexline_enqueue_styles() {
	// Styles.
	flexline_enqueue_component_styles();
	// Customized Styles.
	$custom_css_path = get_theme_file_path( 'assets/css/customize.css' );
	if ( file_exists( $custom_css_path ) && filesize( $custom_css_path ) > 0 ) {
		wp_enqueue_style( 'flexline-custom', get_theme_file_uri( 'assets/css/customize.css' ), flexline_component_style_dependencies(), flexline_asset_ver( 'assets/css/customize.css' ) );
	}
	// Scripts.
	$early_handle = 'flexline-load-early';
	wp_enqueue_script( $early_handle );
	$early_deps             = array( $early_handle );
	$show_menu_on_scroll    = get_option( 'flexline_show_menu_on_scroll_up', false );
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( (bool) $show_menu_on_scroll || (bool) $show_menu_all_the_time ) {
		wp_enqueue_script( 'flexline-headroom', get_theme_file_uri( 'assets/js/headroom.min.js' ), $early_deps, flexline_asset_ver( 'assets/js/headroom.min.js' ), true );
		wp_enqueue_script( 'flexline-headroom-init', get_theme_file_uri( 'assets/built/js/headroom.js' ), array_merge( $early_deps, array( 'flexline-headroom' ) ), flexline_asset_ver( 'assets/built/js/headroom.js' ), true );
	}
	$i18n_deps = array_merge( $early_deps, array( 'wp-i18n' ) );
	wp_enqueue_script( 'flexline-slidein', get_theme_file_uri( 'assets/built/js/slidein.js' ), $i18n_deps, flexline_asset_ver( 'assets/built/js/slidein.js' ), true );
	wp_set_script_translations( 'flexline-slidein', 'flexline', get_template_directory() . '/languages' );

	$relative_path = 'assets/built/js/visibility-toggle.js';

	wp_enqueue_script(
		'flexline-visibility-toggle',
		get_theme_file_uri( $relative_path ),
		$early_deps,
		flexline_asset_ver( $relative_path ),
		true
	);

	$defer_handles = array(
		'flexline-scroll',
		'flexline-headroom',
		'flexline-headroom-init',
		'flexline-modal',
		'flexline-slidein',
		'flexline-visibility-toggle',
	);
	foreach ( $defer_handles as $handle ) {
		if ( wp_script_is( $handle, 'registered' ) ) {
			wp_script_add_data( $handle, 'strategy', 'defer' );
		}
	}
}

/**
 * Enqueue block editor shell assets (sidebar UI and editor chrome).
 */
function flexline_admin_enqueue_scripts() {
	// The slide-in admin script is intentionally not enqueued.
	// Template pattern inserter.
	wp_enqueue_script(
		'template-pattern-inserter',
		get_theme_file_uri( 'assets/built/js/template-pattern-inserter.js' ),
		array( 'wp-blocks', 'wp-data', 'wp-api-fetch', 'wp-element', 'wp-components' ),
		flexline_asset_ver( 'assets/built/js/template-pattern-inserter.js' ),
		true
	);
}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_admin_enqueue_scripts' );

/**
 * Enqueue block-content runtimes for admin editor canvas contexts.
 *
 * Block-content DOM runtimes must enqueue via enqueue_block_assets in admin
 * to support iframe/non-iframe editor canvases.
 */
function flexline_admin_enqueue_canvas_runtime_assets() {
	// Core deliberately disables should_load_block_editor_scripts_and_styles
	// while collecting iframe content assets. Use the host screen instead.
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! is_admin() || ! $screen || ! $screen->is_block_editor() ) {
		return;
	}

	wp_enqueue_style( 'flexline-editor', get_theme_file_uri( 'assets/built/css/editor.css' ), array(), flexline_asset_ver( 'assets/built/css/editor.css' ) );

	$editor_runtime_deps = array( 'wp-data', 'wp-dom-ready' );

	wp_enqueue_script(
		'flexline-scroll-admin',
		get_theme_file_uri( 'assets/built/js/horizontal-scroll.js' ),
		$editor_runtime_deps,
		flexline_asset_ver( 'assets/built/js/horizontal-scroll.js' ),
		true
	);

	// Slider runtime is needed for Preview mode in the editor canvas.
	wp_enqueue_script(
		'flexline-slider-admin',
		get_theme_file_uri( 'assets/built/js/slider.js' ),
		array_merge( $editor_runtime_deps, array( 'wp-i18n' ) ),
		flexline_asset_ver( 'assets/built/js/slider.js' ),
		true
	);
	wp_set_script_translations( 'flexline-slider-admin', 'flexline', get_template_directory() . '/languages' );
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\flexline_admin_enqueue_canvas_runtime_assets' );
