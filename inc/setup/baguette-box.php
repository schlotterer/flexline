<?php
/**
 * Plugin Name:  Modal for Gallery & Image Block
 * Plugin URI:
 * Description:  Adds a Modal to the Block Editor (Gutenberg) Gallery & Image Block.
 * Author:       Johannes Kinast <johannes@travel-dealz.de>
 * Author URI:   https://go-around.de
 * Version:     1.13
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Registers the assets for baguetteBox.
 *
 * This function registers the CSS and JavaScript files required for baguetteBox.
 * It also adds an inline script to initialize baguetteBox with custom selectors and filters.
 *
 * @return void
 */
function register_assets() {
	static $registered = false;
	if ( $registered ) {
		return;
	}
	$registered = true;

	wp_register_style( 'baguettebox-css', get_theme_file_uri( 'assets/baguetteBox/baguetteBox.min.css' ), array(), '1.11.1' );
	wp_register_script( 'baguettebox', get_theme_file_uri( 'assets/baguetteBox/baguetteBox.min.js' ), array(), '1.11.1', true );
	wp_register_script( 'poster-gallery-helper', get_theme_file_uri( 'assets/js/poster-gallery-helper.js' ), array(), THEME_VERSION, true );

	/**
	 * Filters the CSS selector of baguetteBox.js.
	 *
	 * @since 1.10.0
	 *
	 * @param string  $value  The CSS selector to a gallery (or galleries) containing a tags.
	 */
	$default_selector = '.wp-block-gallery,:not(.wp-block-gallery)>.wp-block-image,.wp-block-media-text__media,.gallery';

	// On WP 7+, let core own Gallery lightbox. Legacy baguetteBox should only
	// target legacy indicators/containers and must not bind all core galleries.
	if ( should_use_core_gallery_lightbox() ) {
		$default_selector = '.poster-gallery,:not(.wp-block-gallery)>.wp-block-image,.wp-block-media-text__media,.gallery';
	}

	$baguettebox_selector = apply_filters( 'baguettebox_selector', $default_selector );

	/**
	 * Filters the image files filter of baguetteBox.js.
	 *
	 * @since 1.10.0
	 *
	 * @param string  $value  The RegExp Pattern to match image files. Applied to the a.href attribute.
	 */
	$baguettebox_filter = apply_filters( 'baguettebox_filter', '/.+\.(gif|jpe?g|png|webp|svg|avif|heif|heic|tif?f|)($|\?)/i' );

	// Keep selector/filter filterable in PHP, but move runtime binding into
	// poster-gallery-helper.js so lightbox setup can be refreshed after dynamic
	// block content (for example map comparison cards fetched over REST) is
	// injected post-load.
	$config = wp_json_encode(
		array(
			'selector' => $baguettebox_selector,
			'filter'   => $baguettebox_filter,
		),
		JSON_UNESCAPED_SLASHES
	);

	wp_add_inline_script( 'baguettebox', 'window.flexlineBaguetteConfig = ' . $config . ';', 'before' );
}
add_action( 'init', __NAMESPACE__ . '\register_assets' );

/**
 * Whether core should own gallery lightbox behavior.
 *
 * Note: this controls only how newly authored pattern content is serialized.
 * We do not run automatic migration of legacy saved content in this branch.
 * Legacy poster-gallery markup remains on the baguetteBox fallback path.
 *
 * @return bool
 */
function should_use_core_gallery_lightbox() {
	return version_compare( get_bloginfo( 'version' ), '7.0', '>=' );
}

/**
 * Return Gallery block attributes for poster-gallery patterns.
 *
 * @param array $attrs Gallery block attributes.
 * @return string JSON-encoded block attributes.
 */
function poster_gallery_pattern_attrs( $attrs = array() ) {
	$attrs = array_merge(
		array(
			'enablePosterGallery' => true,
		),
		$attrs
	);

	// New pattern inserts on WP 7+ should serialize directly to core lightbox.
	// Existing saved content is intentionally not rewritten automatically.
	if ( should_use_core_gallery_lightbox() ) {
		$attrs['linkTo'] = 'lightbox';
	}

	return wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES );
}

/**
 * Return Image block attributes for images inside poster-gallery patterns.
 *
 * @param array $attrs Image block attributes.
 * @return string JSON-encoded block attributes.
 */
function poster_gallery_image_pattern_attrs( $attrs = array() ) {
	// Companion to poster_gallery_pattern_attrs(): for newly inserted image
	// children we write the core lightbox flag directly in block attributes.
	if ( should_use_core_gallery_lightbox() ) {
		$attrs['lightbox'] = array(
			'enabled' => true,
		);
	}

	return wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES );
}

/**
 * Remove core lightbox attrs from legacy poster-gallery blocks before WP 7.0.
 *
 * @param array $parsed_block The parsed block.
 * @return array Updated parsed block.
 */
function disable_core_lightbox_for_legacy_gallery_blocks( $parsed_block ) {
	if ( should_use_core_gallery_lightbox() || empty( $parsed_block['blockName'] ) ) {
		return $parsed_block;
	}

	$attrs = isset( $parsed_block['attrs'] ) && is_array( $parsed_block['attrs'] ) ? $parsed_block['attrs'] : array();

	if ( 'core/gallery' === $parsed_block['blockName'] ) {
		unset( $attrs['linkTo'] );
		$parsed_block['attrs'] = $attrs;
	}

	if ( 'core/image' === $parsed_block['blockName'] ) {
		unset( $attrs['lightbox'] );
		$parsed_block['attrs'] = $attrs;
	}

	return $parsed_block;
}
add_filter( 'render_block_data', __NAMESPACE__ . '\disable_core_lightbox_for_legacy_gallery_blocks' );

/**
 * Enqueue legacy baguetteBox assets.
 *
 * @return void
 */
function enqueue_baguettebox_assets() {
	wp_enqueue_script( 'baguettebox' );
	wp_enqueue_script( 'poster-gallery-helper' );
	wp_enqueue_style( 'baguettebox-css' );
}

/**
 * Determine whether a rendered block still needs the legacy lightbox.
 *
 * @param string $block_content The rendered block HTML.
 * @param array  $block         The parsed block.
 * @return bool
 */
function block_needs_legacy_baguettebox( $block_content, $block ) {
	$attrs = isset( $block['attrs'] ) && is_array( $block['attrs'] ) ? $block['attrs'] : array();
	$class = isset( $attrs['className'] ) ? (string) $attrs['className'] : '';
	$block_name = isset( $block['blockName'] ) ? (string) $block['blockName'] : '';
	$has_poster_gallery_marker =
		! empty( $attrs['enablePosterGallery'] ) ||
		false !== strpos( $class, 'poster-gallery' ) ||
		false !== strpos( $block_content, 'poster-gallery' ) ||
		false !== strpos( $block_content, 'enablePosterGallery' );

	// On WP 7+ treat poster-gallery core/gallery blocks as core lightbox-owned.
	// Supports both modern attribute-based poster gallery and legacy class-based
	// style-variation content so older posts do not fall through to baguetteBox.
	if (
		should_use_core_gallery_lightbox() &&
		'core/gallery' === $block_name &&
		$has_poster_gallery_marker
	) {
		return false;
	}

	// Treat a block as "core lightbox-owned" only when explicit runtime markers
	// exist in rendered HTML, or when gallery attrs explicitly request it.
	// Avoid broad text matches that can produce false positives.
	$uses_core_lightbox =
		( isset( $attrs['linkTo'] ) && 'lightbox' === $attrs['linkTo'] ) ||
		false !== strpos( $block_content, 'wp-lightbox-container' ) ||
		false !== strpos( $block_content, 'showLightbox' );

	if ( $uses_core_lightbox ) {
		return false;
	}

	if ( ! empty( $attrs['enablePosterGallery'] ) || false !== strpos( $class, 'poster-gallery' ) ) {
		return true;
	}

	if ( false !== strpos( $block_content, 'poster-gallery' ) || false !== strpos( $block_content, 'enablePosterGallery' ) ) {
		return true;
	}

	if ( false !== strpos( $block_content, 'class="gallery' ) || false !== strpos( $block_content, "class='gallery" ) ) {
		return true;
	}

	if (
		false !== strpos( $block_content, 'wp-block-media-text__media' ) &&
		preg_match( '/<a\b[^>]+href=["\'][^"\']+\.(?:gif|jpe?g|png|webp|svg|avif|heif|heic|tiff?)(?:\?[^"\']*)?["\']/i', $block_content )
	) {
		return true;
	}

	return false;
}

/**
 * Recursively inspect parsed content for legacy gallery behavior.
 *
 * @param array $blocks Parsed blocks.
 * @return bool
 */
function blocks_need_legacy_baguettebox( $blocks ) {
	foreach ( $blocks as $block ) {
		if ( ! is_array( $block ) ) {
			continue;
		}

		$inner_html = isset( $block['innerHTML'] ) ? (string) $block['innerHTML'] : '';
		if ( block_needs_legacy_baguettebox( $inner_html, $block ) ) {
			return true;
		}

		if ( ! empty( $block['innerBlocks'] ) && is_array( $block['innerBlocks'] ) && blocks_need_legacy_baguettebox( $block['innerBlocks'] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Determine whether current singular post content needs legacy lightbox assets.
 *
 * @return bool
 */
function current_content_needs_legacy_baguettebox() {
	if ( ! is_singular() ) {
		return false;
	}

	$post = get_post();
	if ( ! $post || empty( $post->post_content ) || ! function_exists( 'parse_blocks' ) ) {
		return false;
	}

	return blocks_need_legacy_baguettebox( parse_blocks( $post->post_content ) );
}

/**
 * Determine whether current singular post content includes a classic gallery shortcode.
 *
 * @return bool
 */
function current_content_has_classic_gallery_shortcode() {
	if ( ! is_singular() ) {
		return false;
	}

	$post = get_post();
	if ( ! $post || empty( $post->post_content ) ) {
		return false;
	}

	return has_shortcode( $post->post_content, 'gallery' );
}

/**
 * Enqueues the assets for baguetteBox if necessary.
 *
 * This function enqueues the CSS and JavaScript files for baguetteBox if the current post
 * contains a gallery or media-text block.
 *
 * @return void
 */
function enqueue_assets() {
	$legacy_default = current_content_has_classic_gallery_shortcode() || current_content_needs_legacy_baguettebox();

	// On pre-WP7 sites, keep broad parity with historical behavior and enqueue
	// baguetteBox for core gallery/media-text usage even without poster markers.
	if ( ! should_use_core_gallery_lightbox() ) {
		$legacy_default = $legacy_default ||
			has_block( 'core/gallery' ) ||
			has_block( 'core/media-text' ) ||
			current_content_has_classic_gallery_shortcode();
	}

	/**
	 * Filters whether baguettebox assets have to be enqueued.
	 *
	 * @since 1.11
	 *
	 * @param bool  $value  Whether baguettebox assets have to be enqueued.
	 */
	$baguettebox_enqueue_assets = apply_filters(
		'baguettebox_enqueue_assets',
		$legacy_default
	);

	if ( $baguettebox_enqueue_assets ) {
		enqueue_baguettebox_assets();
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

/**
 * Enqueue legacy lightbox assets while rendering legacy gallery blocks.
 *
 * @param string $block_content The rendered block HTML.
 * @param array  $block         The parsed block.
 * @return string
 */
function maybe_enqueue_legacy_baguettebox_for_block( $block_content, $block ) {
	if ( should_use_core_gallery_lightbox() && block_needs_legacy_baguettebox( $block_content, $block ) ) {
		enqueue_baguettebox_assets();
	}

	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\maybe_enqueue_legacy_baguettebox_for_block', 10, 2 );
