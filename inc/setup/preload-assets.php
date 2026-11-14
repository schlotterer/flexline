<?php
/**
 * Preload the first opted-in image in the main post content.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Mark the image controlled by FlexLine's explicit Lazy Load setting.
 *
 * @param string $html  Rendered Image or Cover block.
 * @param array  $block Parsed block.
 * @return string Rendered block markup.
 */
function mark_image_preload_candidate( string $html, array $block ): string {
	if ( false !== ( $block['attrs']['enableLazyLoad'] ?? null ) || ! is_singular() || did_action( 'wp_head' ) ) {
		return $html;
	}

	$is_cover  = 'core/cover' === $block['blockName'];
	$processor = new \WP_HTML_Tag_Processor( $html );
	while ( $processor->next_tag() ) {
		$tag = $processor->get_tag();
		if ( 'PICTURE' === $tag || ( $is_cover && $processor->has_class( 'wp-block-cover__inner-container' ) ) ) {
			break;
		}

		if ( 'IMG' === $tag && ( ! $is_cover || $processor->has_class( 'wp-block-cover__image-background' ) ) ) {
			$processor->set_attribute( 'data-flexline-preload-candidate', true );
			return $processor->get_updated_html();
		}
	}

	return $html;
}
add_filter( 'render_block_core/image', __NAMESPACE__ . '\\mark_image_preload_candidate', 100, 2 );
add_filter( 'render_block_core/cover', __NAMESPACE__ . '\\mark_image_preload_candidate', 100, 2 );

/**
 * Find the first visible opted-in image in the rendered post content.
 *
 * @param string $html Rendered core/post-content markup.
 * @return \WP_HTML_Processor|null Processor positioned on the selected image.
 */
function find_image_preload_candidate( string $html ): ?\WP_HTML_Processor {
	if ( ! str_contains( $html, 'data-flexline-preload-candidate' ) ) {
		return null;
	}

	$processor    = \WP_HTML_Processor::create_fragment( $html );
	$hidden_depth = null;
	while ( $processor && $processor->next_tag() ) {
		$depth = count( $processor->get_breadcrumbs() );
		if ( null !== $hidden_depth && $depth > $hidden_depth ) {
			continue;
		}
		$hidden_depth = null;
		if ( null !== $processor->get_attribute( 'hidden' ) ||
			$processor->has_class( 'flexline-hide-on-mobile' ) ||
			$processor->has_class( 'flexline-hide-on-tablet' ) ||
			$processor->has_class( 'flexline-hide-on-desktop' ) ) {
			$hidden_depth = $depth;
			continue;
		}

		if ( 'IMG' !== $processor->get_tag() || null === $processor->get_attribute( 'data-flexline-preload-candidate' ) ||
			in_array( 'PICTURE', $processor->get_breadcrumbs(), true ) ) {
			continue;
		}

		$src = $processor->get_attribute( 'src' );
		if ( is_string( $src ) && '' !== esc_url_raw( $src, array( 'http', 'https' ) ) ) {
			return $processor;
		}
	}

	return null;
}

/**
 * Register the preload while the block template is rendered, before wp_head.
 *
 * @param string    $html      Rendered post content.
 * @param array     $block     Parsed block.
 * @param \WP_Block $instance Block instance.
 * @return string Rendered post content.
 */
function register_image_preload( string $html, array $block, \WP_Block $instance ): string {
	static $registered = false;
	if ( $registered || ! is_singular() || did_action( 'wp_head' ) || (int) ( $instance->context['postId'] ?? 0 ) !== get_queried_object_id() ) {
		return $html;
	}

	$image = find_image_preload_candidate( $html );
	if ( ! $image ) {
		return $html;
	}

	$preload = array(
		'as'            => 'image',
		'fetchpriority' => 'high',
		'href'          => $image->get_attribute( 'src' ),
	);
	$srcset  = $image->get_attribute( 'srcset' );
	$sizes   = $image->get_attribute( 'sizes' );
	if ( is_string( $srcset ) && '' !== trim( $srcset ) ) {
		$preload['imagesrcset'] = $srcset;
		if ( is_string( $sizes ) && '' !== trim( $sizes ) ) {
			$preload['imagesizes'] = $sizes;
		}
	}

	$crossorigin = $image->get_attribute( 'crossorigin' );
	if ( null !== $crossorigin ) {
		$preload['crossorigin'] = is_string( $crossorigin ) ? $crossorigin : 'anonymous';
	}

	$registered = true;
	$image->set_attribute( 'loading', 'eager' );
	$image->set_attribute( 'data-no-lazy', '1' );
	$image->remove_attribute( 'data-flexline-preload-candidate' );
	$image->set_attribute( 'data-flexline-preloaded', true );

	add_filter(
		'wp_preload_resources',
		static function ( array $resources ) use ( $preload ): array {
			$remove_duplicate = static function ( string $page_html ) use ( $preload ): string {
				return remove_rocket_image_preload( $page_html, $preload );
			};
			add_filter( 'rocket_buffer', $remove_duplicate, 18 );
			add_filter( 'rocket_performance_hints_buffer', $remove_duplicate, 18 );
			add_action( 'od_register_tag_visitors', __NAMESPACE__ . '\\skip_preloaded_image_in_image_prioritizer', 20 );

			// Browsers without responsive preload support should discover the img normally.
			if ( isset( $preload['imagesrcset'] ) ) {
				unset( $preload['href'] );
			}

			$resources[] = $preload;
			return $resources;
		}
	);

	return $image->get_updated_html();
}
add_filter( 'render_block_core/post-content', __NAMESPACE__ . '\\register_image_preload', 100, 3 );

/**
 * Keep Image Prioritizer's visitor active for the rest of the page.
 *
 * @param \OD_Tag_Visitor_Registry $registry Optimization Detective tag visitors.
 */
function skip_preloaded_image_in_image_prioritizer( \OD_Tag_Visitor_Registry $registry ): void {
	$visitor = $registry->get_registered( 'image-prioritizer/img' );
	if ( ! $visitor ) {
		return;
	}

	$registry->unregister( 'image-prioritizer/img' );
	$registry->register(
		'image-prioritizer/img',
		static function ( \OD_Tag_Visitor_Context $context ) use ( $visitor ): bool {
			if ( 'IMG' === $context->processor->get_tag() && null !== $context->processor->get_attribute( 'data-flexline-preloaded' ) ) {
				return true;
			}

			return $visitor( $context );
		}
	);
}

/**
 * Use FlexLine's hint for the selected image.
 *
 * WP Rocket inserts its critical image links immediately after the title at
 * buffer priority 17. Preserve hints for any other resources.
 *
 * @param string $html    Page HTML after WP Rocket's performance hints.
 * @param array  $preload Selected image's attributes.
 * @return string HTML with the duplicate WP Rocket image hint removed.
 */
function remove_rocket_image_preload( string $html, array $preload ): string {
	return preg_replace_callback(
		'#<link rel="preload" data-rocket-preload as="image" [^>]*>#i',
		static function ( array $matches ) use ( $preload ): string {
			$link = new \WP_HTML_Tag_Processor( $matches[0] );
			$link->next_tag( 'LINK' );
			if ( $preload['href'] === $link->get_attribute( 'href' ) ||
				( isset( $preload['imagesrcset'] ) && $preload['imagesrcset'] === $link->get_attribute( 'imagesrcset' ) ) ) {
				return '';
			}

			return $matches[0];
		},
		$html
	) ?? $html;
}
