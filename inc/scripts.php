<?php
/**
 * Set up the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine;

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
	$path = get_theme_file_path( $relative_path );
	if ( file_exists( $path ) ) {
		return (string) filemtime( $path );
	}
	return defined( 'THEME_VERSION' ) ? THEME_VERSION : '';
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
	wp_enqueue_style( 'flexline-base', get_theme_file_uri( 'assets/built/css/app.css' ), array(), flexline_asset_ver( 'assets/built/css/app.css' ) );
	// Register modal styles. Enqueue is conditional in render_block.
	wp_register_style( 'flexline-modal', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), flexline_asset_ver( 'assets/built/css/modal.css' ) );
	// Customized Styles.
	$custom_css_path = get_theme_file_path( 'assets/css/customize.css' );
	if ( file_exists( $custom_css_path ) && filesize( $custom_css_path ) > 0 ) {
		wp_enqueue_style( 'flexline-custom', get_theme_file_uri( 'assets/css/customize.css' ), array(), flexline_asset_ver( 'assets/css/customize.css' ) );
	}
	// Scripts.
	$early_handle = 'flexline-load-early';
	wp_register_script(
		$early_handle,
		get_theme_file_uri( 'assets/built/js/load-early.js' ),
		array(),
		flexline_asset_ver( 'assets/built/js/load-early.js' ),
		false
	);
	wp_script_add_data( $early_handle, 'strategy', 'defer' );
	wp_enqueue_script( $early_handle );

	$early_deps = array( $early_handle );

	wp_enqueue_script( 'flexline-global', get_theme_file_uri( 'assets/built/js/global.js' ), $early_deps, flexline_asset_ver( 'assets/built/js/global.js' ), true );
	wp_enqueue_script( 'flexline-scroll', get_theme_file_uri( 'assets/built/js/horizontal-scroll.js' ), $early_deps, flexline_asset_ver( 'assets/built/js/horizontal-scroll.js' ), true );
	$show_menu_on_scroll    = get_option( 'flexline_show_menu_on_scroll_up', false );
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( '1' === $show_menu_on_scroll || '1' === $show_menu_all_the_time ) {
		wp_enqueue_script( 'flexline-headroom', get_theme_file_uri( 'assets/js/headroom.min.js' ), $early_deps, flexline_asset_ver( 'assets/js/headroom.min.js' ), true );
		wp_enqueue_script( 'flexline-headroom-init', get_theme_file_uri( 'assets/built/js/headroom.js' ), array_merge( $early_deps, array( 'flexline-headroom' ) ), flexline_asset_ver( 'assets/built/js/headroom.js' ), true );
	}
	// Register modal runtime. Enqueue is conditional in render_block.
	wp_register_script( 'flexline-modal', get_theme_file_uri( 'assets/built/js/modal.js' ), $early_deps, flexline_asset_ver( 'assets/built/js/modal.js' ), true );
	wp_enqueue_script( 'flexline-slidein', get_theme_file_uri( 'assets/built/js/slidein.js' ), $early_deps, flexline_asset_ver( 'assets/built/js/slidein.js' ), true );

	// Customized Scripts.
	wp_enqueue_script( 'flexline-customize', get_theme_file_uri( 'assets/js/customize.js' ), $early_deps, flexline_asset_ver( 'assets/js/customize.js' ), true );

	// Register slider runtime (footer + defer). It will be enqueued conditionally in render_block.
	wp_register_script(
		'flexline-slider',
		get_theme_file_uri( 'assets/built/js/slider.js' ),
		$early_deps,
		flexline_asset_ver( 'assets/built/js/slider.js' ),
		true
	);
	wp_script_add_data( 'flexline-slider', 'strategy', 'defer' );

	$relative_path = 'assets/built/js/visibility-toggle.js';

	wp_enqueue_script(
		'flexline-visibility-toggle',
		get_theme_file_uri( $relative_path ),
		$early_deps,
		flexline_asset_ver( $relative_path ),
		true
	);

	$defer_handles = array(
		'flexline-global',
		'flexline-scroll',
		'flexline-headroom',
		'flexline-headroom-init',
		'flexline-modal',
		'flexline-slidein',
		'flexline-customize',
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
	// Styles.
	wp_enqueue_style( 'flexline-base-admin', get_theme_file_uri( 'assets/built/css/app.css' ), array(), flexline_asset_ver( 'assets/built/css/app.css' ) );
	// Modal Styles.
	wp_enqueue_style( 'flexline-modal-admin', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), flexline_asset_ver( 'assets/built/css/modal.css' ) );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom-admin', get_theme_file_uri( 'assets/css/customize.css' ), array(), flexline_asset_ver( 'assets/css/customize.css' ) );

	wp_enqueue_script( 'flexline-global-admin', get_theme_file_uri( 'assets/built/js/global.js' ), array(), flexline_asset_ver( 'assets/built/js/global.js' ), true );
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
	if ( ! is_admin() ) {
		return;
	}

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
		$editor_runtime_deps,
		flexline_asset_ver( 'assets/built/js/slider.js' ),
		true
	);
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\flexline_admin_enqueue_canvas_runtime_assets' );


/**
 * Conditionally enqueue modal assets only when modal trigger markup is present.
 *
 * @param string $block_content The rendered HTML of the current block.
 * @param array  $block         The parsed block array (name, attrs, innerBlocks, etc.).
 *
 * @return string Possibly-modified block content.
 */
function flexline_maybe_enqueue_modal( $block_content, $block ) {
	static $done = false;
	if ( $done ) {
		return $block_content;
	}

	$attrs = isset( $block['attrs'] ) ? (array) $block['attrs'] : array();
	$class = isset( $attrs['className'] ) ? (string) $attrs['className'] : '';
	$needs = false;

	if ( $class ) {
		if ( false !== strpos( $class, 'enable-modal' ) || false !== strpos( $class, 'group-link-type-modal_media' ) ) {
			$needs = true;
		}
	}

	if ( ! $needs && $block_content ) {
		if (
			false !== strpos( $block_content, 'enable-modal' ) ||
			false !== strpos( $block_content, 'group-link-type-modal_media' ) ||
			false !== strpos( $block_content, 'data-enable-modal' )
		) {
			$needs = true;
		}
	}

	if ( $needs ) {
		wp_enqueue_style( 'flexline-modal' );
		wp_enqueue_script( 'flexline-modal' );
		$done = true;
	}

	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_maybe_enqueue_modal', 10, 2 );


/**
 * Conditionally enqueue the slider runtime only when a slider block is present.
 *
 * @param string $block_content The rendered HTML of the current block.
 * @param array  $block         The parsed block array (name, attrs, innerBlocks, etc.).
 *
 * @return string Possibly-modified block content.
 */
function flexline_maybe_enqueue_slider( $block_content, $block ) {
	static $done = false;
	if ( $done || empty( $block ) ) {
		return $block_content;
	}
	$name  = isset( $block['blockName'] ) ? $block['blockName'] : '';
	$attrs = isset( $block['attrs'] ) ? (array) $block['attrs'] : array();
	$needs = false;
	if ( in_array( $name, array( 'core/group', 'core/stack' ), true ) ) {
		if ( ! empty( $attrs['enableSlider'] ) ) {
			$needs = true;
		} else {
			$class = isset( $attrs['className'] ) ? (string) $attrs['className'] : '';
			if ( $class && false !== strpos( $class, 'is-style-slider' ) ) {
				$needs = true;
			}
		}
	}
	if ( ! $needs && $block_content && false !== strpos( $block_content, 'is-style-slider' ) ) {
		$needs = true;
	}
	if ( $needs ) {
		if ( ! wp_script_is( 'flexline-slider', 'registered' ) ) {
			$deps = wp_script_is( 'flexline-load-early', 'registered' ) ? array( 'flexline-load-early' ) : array();
			wp_register_script(
				'flexline-slider',
				get_theme_file_uri( 'assets/built/js/slider.js' ),
				$deps,
				flexline_asset_ver( 'assets/built/js/slider.js' ),
				true
			);
			wp_script_add_data( 'flexline-slider', 'strategy', 'defer' );
		}
		wp_enqueue_script( 'flexline-slider' );
		$done = true;
	}
	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_maybe_enqueue_slider', 10, 2 );
