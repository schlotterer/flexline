<?php
/**
 * Preload the opening Cover image in the main post content.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Read the opening Cover's eager background image from rendered post content.
 *
 * @param string $html Rendered core/post-content markup.
 * @return array Preload attributes, or an empty array when no hero qualifies.
 */
function get_opening_cover_preload( string $html ): array {
	$processor = new \WP_HTML_Tag_Processor( $html );
	$in_cover  = false;

	while ( $processor->next_token() ) {
		$tag = $processor->get_tag();
		if ( null === $tag ) {
			if ( '#text' === $processor->get_token_type() && '' !== trim( $processor->get_modifiable_text() ) ) {
				return array();
			}
			continue;
		}

		// Only follow the opening branch of layout wrappers into the Cover.
		if ( ! $in_cover && ! $processor->is_tag_closer() ) {
			if ( null !== $processor->get_attribute( 'hidden' ) ||
				$processor->has_class( 'flexline-hide-on-mobile' ) ||
				$processor->has_class( 'flexline-hide-on-tablet' ) ||
				$processor->has_class( 'flexline-hide-on-desktop' ) ) {
				return array();
			}

			if ( 'DIV' === $tag && $processor->has_class( 'wp-block-cover' ) ) {
				$in_cover = true;
				continue;
			}

			if ( in_array( $tag, array( 'DIV', 'MAIN', 'SECTION', 'ARTICLE', 'ASIDE', 'HEADER', 'FOOTER' ), true ) &&
				( $processor->has_class( 'wp-block-post-content' ) || $processor->has_class( 'wp-block-group' ) ||
					$processor->has_class( 'wp-block-columns' ) || $processor->has_class( 'wp-block-column' ) ) ) {
				continue;
			}
		}

		if ( $in_cover && 'SPAN' === $tag && ( $processor->is_tag_closer() || $processor->has_class( 'wp-block-cover__background' ) ) ) {
			continue;
		}

		// Stop before the inner content, a video or a background supplied by CSS.
		if ( ! $in_cover || 'IMG' !== $tag || ! $processor->has_class( 'wp-block-cover__image-background' ) ||
			null !== $processor->get_attribute( 'hidden' ) ||
			'lazy' === strtolower( (string) $processor->get_attribute( 'loading' ) ) ) {
			return array();
		}

		$src = $processor->get_attribute( 'src' );
		if ( ! is_string( $src ) || '' === esc_url_raw( $src, array( 'http', 'https' ) ) ) {
			return array();
		}

		$preload = array(
			'as'            => 'image',
			'fetchpriority' => 'high',
			'href'          => $src,
		);
		$srcset  = $processor->get_attribute( 'srcset' );
		$sizes   = $processor->get_attribute( 'sizes' );
		if ( is_string( $srcset ) && '' !== trim( $srcset ) ) {
			$preload['imagesrcset'] = $srcset;
			if ( is_string( $sizes ) && '' !== trim( $sizes ) ) {
				$preload['imagesizes'] = $sizes;
			}
		}

		$crossorigin = $processor->get_attribute( 'crossorigin' );
		if ( null !== $crossorigin ) {
			$preload['crossorigin'] = is_string( $crossorigin ) ? $crossorigin : 'anonymous';
		}

		return $preload;
	}

	return array();
}

/**
 * Register the preload while the block template is rendered, before wp_head.
 *
 * @param string    $html      Rendered post content.
 * @param array     $block     Parsed block.
 * @param \WP_Block $instance Block instance.
 * @return string Rendered post content.
 */
function register_opening_cover_preload( string $html, array $block, \WP_Block $instance ): string {
	if ( ! is_singular() || did_action( 'wp_head' ) || (int) ( $instance->context['postId'] ?? 0 ) !== get_queried_object_id() ) {
		return $html;
	}

	$preload = get_opening_cover_preload( $html );
	if ( $preload ) {
		add_filter(
			'wp_preload_resources',
			static function ( array $resources ) use ( $preload ): array {
				$remove_duplicate = static function ( string $page_html ) use ( $preload ): string {
					return remove_rocket_image_preload( $page_html, $preload );
				};
				add_filter( 'rocket_buffer', $remove_duplicate, 18 );
				add_filter( 'rocket_performance_hints_buffer', $remove_duplicate, 18 );

				// Browsers without responsive preload support should discover the img normally.
				if ( isset( $preload['imagesrcset'] ) ) {
					unset( $preload['href'] );
				}

				$resources[] = $preload;
				return $resources;
			}
		);
	}

	return $html;
}
add_filter( 'render_block_core/post-content', __NAMESPACE__ . '\\register_opening_cover_preload', 100, 3 );

/**
 * Use FlexLine's hint on pages where it preloads the opening Cover.
 *
 * WP Rocket inserts its critical image links immediately after the title at
 * buffer priority 17. Preserve hints for any other resources.
 *
 * @param string $html    Page HTML after WP Rocket's performance hints.
 * @param array  $preload Opening Cover's image attributes.
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
