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
 * the icons CSS file, the customized CSS file, and the necessary scripts.
 *
 * @return void
 */
function flexline_enqueue_styles() {

	// Theme CSS.
	$stylesheet     = trailingslashit( get_stylesheet_directory() ) . 'style.css';
	$stylesheet_ver = file_exists( $stylesheet ) ? (string) filemtime( $stylesheet ) : ( defined( 'THEME_VERSION' ) ? THEME_VERSION : '' );
	wp_enqueue_style( 'flexline', get_stylesheet_uri(), array(), $stylesheet_ver );
	// Styles.
	wp_enqueue_style( 'flexline-base', get_theme_file_uri( 'assets/built/css/app.css' ), array(), flexline_asset_ver( 'assets/built/css/app.css' ) );
	wp_enqueue_style( 'flexline-modal', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), flexline_asset_ver( 'assets/built/css/modal.css' ) );
	// Icons Styles.
	wp_enqueue_style( 'flexline-icons', get_theme_file_uri( 'assets/css/icons.css' ), array(), flexline_asset_ver( 'assets/css/icons.css' ) );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom', get_theme_file_uri( 'assets/css/customize.css' ), array(), flexline_asset_ver( 'assets/css/customize.css' ) );
	// Scripts.
	wp_enqueue_script( 'flexline-global', get_theme_file_uri( 'assets/built/js/global.js' ), array(), flexline_asset_ver( 'assets/built/js/global.js' ), true );
	wp_enqueue_script( 'flexline-scroll', get_theme_file_uri( 'assets/built/js/horizontal-scroll.js' ), array(), flexline_asset_ver( 'assets/built/js/horizontal-scroll.js' ), true );
	$show_menu_on_scroll    = get_option( 'flexline_show_menu_on_scroll_up', false );
	$show_menu_all_the_time = get_option( 'flexline_show_menu_all_the_time', false );
	if ( '1' === $show_menu_on_scroll || '1' === $show_menu_all_the_time ) {
		wp_enqueue_script( 'flexline-headroom', get_theme_file_uri( 'assets/js/headroom.min.js' ), array(), flexline_asset_ver( 'assets/js/headroom.min.js' ), true );
		wp_enqueue_script( 'flexline-headroom-init', get_theme_file_uri( 'assets/built/js/headroom.js' ), array(), flexline_asset_ver( 'assets/built/js/headroom.js' ), true );
	}
	wp_enqueue_script( 'flexline-modal', get_theme_file_uri( 'assets/built/js/modal.js' ), array(), flexline_asset_ver( 'assets/built/js/modal.js' ), true );
	wp_enqueue_script( 'flexline-slidein', get_theme_file_uri( 'assets/built/js/slidein.js' ), array(), flexline_asset_ver( 'assets/built/js/slidein.js' ), true );

	// Customized Scripts.
	wp_enqueue_script( 'flexline-customize', get_theme_file_uri( 'assets/js/customize.js' ), array(), flexline_asset_ver( 'assets/js/customize.js' ), true );

		// Load early scripts.
		wp_enqueue_script( 'flexline-load-early', get_theme_file_uri( 'assets/built/js/load-early.js' ), array(), flexline_asset_ver( 'assets/built/js/load-early.js' ), false );

		// Register slider runtime (footer + defer). It will be enqueued conditionally in render_block.
		wp_register_script(
			'flexline-slider',
			get_theme_file_uri( 'assets/built/js/slider.js' ),
			array(),
			flexline_asset_ver( 'assets/built/js/slider.js' ),
			true
		);
		wp_script_add_data( 'flexline-slider', 'defer', true );
}

/**
 * Enqueue scripts for all admin pages.
 */
function flexline_admin_enqueue_scripts() {
	// Styles.
	wp_enqueue_style( 'flexline-base-admin', get_theme_file_uri( 'assets/built/css/app.css' ), array(), flexline_asset_ver( 'assets/built/css/app.css' ) );
	// Modal Styles.
	wp_enqueue_style( 'flexline-modal-admin', get_theme_file_uri( 'assets/built/css/modal.css' ), array(), flexline_asset_ver( 'assets/built/css/modal.css' ) );
	// Icons.
	wp_enqueue_style( 'flexline-icons-admin', get_theme_file_uri( 'assets/css/icons.css' ), array(), flexline_asset_ver( 'assets/css/icons.css' ) );
	// Customized Styles.
	wp_enqueue_style( 'flexline-custom-admin', get_theme_file_uri( 'assets/css/customize.css' ), array(), flexline_asset_ver( 'assets/css/customize.css' ) );

	wp_enqueue_script( 'flexline-global-admin', get_theme_file_uri( 'assets/built/js/global.js' ), array(), flexline_asset_ver( 'assets/built/js/global.js' ), true );
	wp_enqueue_script( 'flexline-scroll-admin', get_theme_file_uri( 'assets/built/js/horizontal-scroll.js' ), array(), flexline_asset_ver( 'assets/built/js/horizontal-scroll.js' ), true );
	// Slider runtime is needed for Preview mode in the editor.
	wp_enqueue_script( 'flexline-slider-admin', get_theme_file_uri( 'assets/built/js/slider.js' ), array(), flexline_asset_ver( 'assets/built/js/slider.js' ), true );
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
			wp_register_script(
				'flexline-slider',
				get_theme_file_uri( 'assets/built/js/slider.js' ),
				array(),
				flexline_asset_ver( 'assets/built/js/slider.js' ),
				true
			);
			wp_script_add_data( 'flexline-slider', 'defer', true );
		}
		wp_enqueue_script( 'flexline-slider' );
		$done = true;
	}
	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_maybe_enqueue_slider', 10, 2 );
