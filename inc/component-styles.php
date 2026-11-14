<?php
/**
 * Conservative component CSS loading for the native block-template canvas.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Record only the native canvas, whose markup renders before wp_head.
 *
 * @param string $template Selected PHP template path.
 * @return string Unchanged template path.
 */
function flexline_component_template( $template ) {
	$GLOBALS['flexline_component_native_canvas'] = wp_normalize_path( $template ) === wp_normalize_path( ABSPATH . WPINC . '/template-canvas.php' );
	return $template;
}
add_filter( 'template_include', __NAMESPACE__ . '\\flexline_component_template', PHP_INT_MAX );

/**
 * Observe nested/pattern/dynamic markup, not just the main post.
 *
 * @param string $content Rendered block markup.
 * @param array  $block Parsed block definition.
 * @return string Unchanged rendered markup.
 */
function flexline_collect_component_styles( $content, $block ) {
	if ( is_admin() || did_action( 'wp_head' ) ) {
		return $content;
	}
	$GLOBALS['flexline_component_render_seen'] = true;
	$requirements                              = $GLOBALS['flexline_component_requirements'] ?? array();
	if ( false !== strpos( $content, 'is-style-horizontal-scroll' ) ) {
		$requirements['horizontal-scroll'] = true;
	}
	if ( false !== strpos( $content, 'is-style-slider' ) || false !== strpos( $content, 'slider-wrapper' ) || ! empty( $block['attrs']['enableSlider'] ) ) {
		$requirements['slider'] = true;
	}
	$GLOBALS['flexline_component_requirements'] = $requirements;
	return $content;
}
add_filter( 'render_block', __NAMESPACE__ . '\\flexline_collect_component_styles', PHP_INT_MAX, 2 );

/** Handles that must precede site-level customization. */
function flexline_component_style_dependencies() {
	return $GLOBALS['flexline_component_style_handles'] ?? array( 'flexline-base' );
}

/**
 * Load complete CSS unless we have a verified native-canvas render.
 *
 * The option defaults on only in Local/development. Returning false from the
 * filter restores the full bundle. Integrations inserting components after
 * template rendering must declare them with flexline_required_component_styles,
 * or disable this optimization for that request. No runtime selector pruning.
 */
function flexline_enqueue_component_styles() {
	$local   = in_array( wp_get_environment_type(), array( 'local', 'development' ), true );
	$enabled = (bool) apply_filters( 'flexline_conditional_component_styles', get_option( 'flexline_conditional_component_styles', $local ) );
	$split   = $enabled && ! is_admin() && ! empty( $GLOBALS['flexline_component_native_canvas'] ) && ! empty( $GLOBALS['flexline_component_render_seen'] );
	$files   = array(
		'tail'              => 'assets/built/css/component-tail.css',
		'base'              => 'assets/built/css/app-conditional.css',
		'horizontal-scroll' => 'assets/built/css/component-horizontal-scroll.css',
		'slider'            => 'assets/built/css/component-slider.css',
	);
	foreach ( $files as $file ) {
		if ( ! is_readable( get_theme_file_path( $file ) ) ) {
			$split = false;
		}
	}
	$required = apply_filters( 'flexline_required_component_styles', $GLOBALS['flexline_component_requirements'] ?? array() );
	// Unknown declaration contracts are safer with the complete bundle.
	if ( ! is_array( $required ) || array_diff( array_keys( $required ), array( 'horizontal-scroll', 'slider' ) ) ) {
		$split = false;
	}
	$base = $split ? $files['base'] : 'assets/built/css/app.css';
	wp_enqueue_style( 'flexline-base', get_theme_file_uri( $base ), array(), flexline_asset_ver( $base ) );
	$handles = array( 'flexline-base' );
	if ( $split ) {
		foreach ( array( 'horizontal-scroll', 'slider' ) as $component ) {
			if ( ! empty( $required[ $component ] ) ) {
				$handle = 'flexline-component-' . $component;
				wp_enqueue_style( $handle, get_theme_file_uri( $files[ $component ] ), $handles, flexline_asset_ver( $files[ $component ] ) );
				$handles[] = $handle;
			}
		}
	}
	if ( $split ) {
		// Preserve the original cascade after optional components without another request.
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local compiled asset, never a remote URL.
		wp_add_inline_style( end( $handles ), file_get_contents( get_theme_file_path( $files['tail'] ) ) );
	}
	$GLOBALS['flexline_component_style_handles'] = $handles;
}
