<?php
/**
 * Request-scoped feature discovery for rendered and configured pattern content.
 *
 * @package flexline
 */

namespace FlexLine;

/** Return an empty, mergeable discovery result. */
function flexline_component_result() {
	return array(
		'features' => array(),
		'styles'   => array(),
		'scripts'  => array(),
		'fallback' => array(),
	);
}

/**
 * Union discovery results without losing declarations from a cached traversal.
 *
 * @param array $left Existing result.
 * @param array $right Additional result.
 * @return array
 */
function flexline_merge_component_results( $left, $right ) {
	foreach ( array_keys( flexline_component_result() ) as $key ) {
		$left[ $key ] = array_replace( $left[ $key ], $right[ $key ] ?? array() );
	}
	return $left;
}

/**
 * Detect supported class tokens, including WordPress style suffixes.
 *
 * @param string $classes Space-separated class names.
 * @return array Feature flags.
 */
function flexline_class_requirements( $classes ) {
	$result = array();
	foreach ( preg_split( '/\s+/', trim( $classes ) ) as $class ) {
		if ( preg_match( '/^is-style-horizontal-scroll-at-mobile(?:--[\w-]+)?$/', $class ) ) {
			$result['horizontal-scroll-mobile'] = true;
		} elseif ( preg_match( '/^is-style-horizontal-scroll(?:--[\w-]+)?$/', $class ) || 'horizontal-scroll-wrapper' === $class ) {
			$result['horizontal-scroll'] = true;
		}
		if ( preg_match( '/^is-style-slider(?:--[\w-]+)?$/', $class ) || 'slider-wrapper' === $class ) {
			$result['slider'] = true;
		}
		if ( in_array( $class, array( 'enable-modal', 'group-link-type-modal_media' ), true ) ) {
			$result['modal'] = true;
		}
	}
	return $result;
}

/**
 * Inspect actual tag attributes; text, comments and script strings are not classes.
 *
 * @param string $html Rendered HTML.
 * @param array  $attrs Block attributes.
 * @return array Feature flags.
 */
function flexline_markup_requirements( $html, $attrs = array() ) {
	$result = flexline_class_requirements( (string) ( $attrs['className'] ?? '' ) );
	if ( ! empty( $attrs['enableSlider'] ) ) {
		$result['slider'] = true;
	}
	if ( ! empty( $attrs['enableModal'] ) || 'modal_media' === ( $attrs['groupLinkType'] ?? '' ) ) {
		$result['modal'] = true;
	}
	$tags = new \WP_HTML_Tag_Processor( $html );
	while ( $tags->next_tag() ) {
		$result = array_replace( $result, flexline_class_requirements( (string) $tags->get_attribute( 'class' ) ) );
		if ( null !== $tags->get_attribute( 'data-enable-modal' ) ) {
			$result['modal'] = true;
		}
	}
	return $result;
}

/**
 * Read effective references through the plugins' public resolution APIs.
 * These APIs own override/default/fallback semantics and user-pattern validation.
 *
 * @param array $block Parsed block.
 * @return array|null References, null for an unavailable integration, or empty.
 */
function flexline_configured_pattern_references( $block ) {
	$attrs = $block['attrs'] ?? array();
	$name  = $block['blockName'] ?? '';
	if ( 'web4sl/location-map' === $name ) {
		$class = '\\Web4SL_Location_Sync\\Plugin';
		if ( ! is_callable( array( $class, 'resolve_effective_pattern' ) ) ) {
			return null;
		}
		$view = 'list' === ( $attrs['listViewType'] ?? '' ) ? 'list' : 'grid';
		$card = sanitize_text_field( (string) ( $attrs['cardPatternSlug'] ?? '' ) );
		// Match main's renderer: comparison uses grid and falls back to the card override.
		$comparison = sanitize_text_field( (string) ( $attrs['comparisonPatternSlug'] ?? '' ) );
		return array(
			$class::resolve_effective_pattern( $view, $card ),
			$class::resolve_effective_pattern( 'popover', sanitize_text_field( (string) ( $attrs['popoverPatternSlug'] ?? '' ) ) ),
			$class::resolve_effective_pattern( 'grid', $comparison ? $comparison : $card ),
		);
	}
	if ( 'web4sl/advanced-floor-plans' === $name ) {
		$class = '\\Web4SL_Advanced_Floor_Plans\\Plugin';
		if ( ! is_callable( array( $class, 'resolve_effective_pattern' ) ) ) {
			return null;
		}
		return array(
			$class::resolve_effective_pattern( 'list', (string) ( $attrs['listPatternSlug'] ?? '' ) ),
			$class::resolve_effective_pattern( 'panel', (string) ( $attrs['panelPatternSlug'] ?? '' ) ),
		);
	}
	return array();
}

/**
 * Resolve a reference once per request, without rendering any records.
 *
 * @param string $reference Registered slug, user-pattern ID, or template-part ID.
 * @param array  $stack Active references (cycle guard).
 * @param int    $depth Traversal depth.
 * @return array Discovery result.
 */
function flexline_pattern_requirements( $reference, $stack = array(), $depth = 0 ) {
	$result = flexline_component_result();
	$key    = get_current_blog_id() . ':' . get_stylesheet() . ':' . $reference;
	if ( isset( $stack[ $key ] ) || $depth > 32 ) {
		$result['fallback']['recursive-or-deep-pattern'] = true;
		return $result;
	}
	$stack[ $key ] = true;
	$markup        = null;
	if ( preg_match( '/^user-pattern:(\d+)$/', $reference, $match ) ) {
		$post = get_post( (int) $match[1] );
		if ( $post && 'wp_block' === $post->post_type && 'publish' === $post->post_status ) {
			$markup = $post->post_content;
		}
	} elseif ( 0 === strpos( $reference, 'template-part:' ) ) {
		$template = get_block_template( substr( $reference, 14 ), 'wp_template_part' );
		$markup   = $template ? $template->content : null;
	} else {
		$registry = \WP_Block_Patterns_Registry::get_instance();
		if ( $registry->is_registered( $reference ) ) {
			$pattern = $registry->get_registered( $reference );
			$markup  = $pattern['content'] ?? null;
		}
	}
	if ( ! is_string( $markup ) ) {
		$result['fallback']['unresolved-pattern'] = true;
		return $result;
	}
	// Include current bytes so an in-request pattern edit cannot reuse an old result.
	$key .= ':' . md5( $markup );
	if ( isset( $GLOBALS['flexline_pattern_requirements_cache'][ $key ] ) ) {
		return $GLOBALS['flexline_pattern_requirements_cache'][ $key ];
	}
	$result = flexline_discover_pattern_blocks( parse_blocks( $markup ), $stack, $depth + 1 );
	// Do not memoize incomplete traversal, including path-dependent recursion failures.
	if ( empty( $result['fallback'] ) ) {
		$GLOBALS['flexline_pattern_requirements_cache'][ $key ] = $result;
	}
	return $result;
}

/**
 * Inspect configured trees, including external patterns and registered block assets.
 *
 * @param array $blocks Parsed blocks.
 * @param array $stack Active references.
 * @param int   $depth Traversal depth.
 * @return array Discovery result.
 */
function flexline_discover_pattern_blocks( $blocks, $stack = array(), $depth = 0 ) {
	$result = flexline_component_result();
	if ( $depth > 32 ) {
		$result['fallback']['deep-block-tree'] = true;
		return $result;
	}
	foreach ( $blocks as $block ) {
		$GLOBALS['flexline_component_scan_count'] = ( $GLOBALS['flexline_component_scan_count'] ?? 0 ) + 1;
		if ( $GLOBALS['flexline_component_scan_count'] > 4096 ) {
			$result['fallback']['pattern-scan-budget'] = true;
			break;
		}
		$name               = $block['blockName'] ?? '';
		$attrs              = $block['attrs'] ?? array();
		$result['features'] = array_replace( $result['features'], flexline_markup_requirements( $block['innerHTML'] ?? '', $attrs ) );
		$refs               = flexline_configured_pattern_references( $block );
		if ( null === $refs ) {
			$result['fallback']['unavailable-plugin-resolver'] = true;
			$refs = array();
		}
		if ( 'core/pattern' === $name ) {
			$refs[] = (string) ( $attrs['slug'] ?? '' );
		} elseif ( 'core/block' === $name ) {
			$refs[] = 'user-pattern:' . (int) ( $attrs['ref'] ?? 0 );
		} elseif ( 'core/template-part' === $name ) {
			$refs[] = 'template-part:' . ( $attrs['theme'] ?? get_stylesheet() ) . '//' . ( $attrs['slug'] ?? '' );
		}
		if ( 'web4sl/location-map' === $name || 'web4sl/floor-plan-media-toggle' === $name ) {
			$result['features']['modal'] = true;
		}
		if ( ! $name && preg_match( '/\[[a-zA-Z][^\]]*\]/', $block['innerHTML'] ?? '' ) ) {
			$result['fallback']['classic-pattern-shortcode'] = true;
		}
		$type = \WP_Block_Type_Registry::get_instance()->get_registered( $name );
		if ( $type ) {
			foreach ( array(
				'style_handles'       => 'styles',
				'view_style_handles'  => 'styles',
				'script_handles'      => 'scripts',
				'view_script_handles' => 'scripts',
			) as $property => $kind ) {
				foreach ( (array) $type->$property as $handle ) {
					$result[ $kind ][ $handle ] = true;
				}
			}
			// Dynamic callbacks may introduce data-dependent blocks or shortcode output.
			// An integration may supply a complete feature union; null means unknown.
			if ( $type->is_dynamic() && empty( $refs ) && ! in_array( $name, array( 'core/group', 'core/columns', 'core/column', 'core/buttons', 'core/button', 'core/paragraph', 'core/heading', 'core/image', 'core/cover', 'core/post-title', 'core/post-featured-image', 'core/post-excerpt', 'core/post-date', 'core/post-terms' ), true ) ) {
				$declared = apply_filters( 'flexline_dynamic_block_requirements', null, $block );
				if ( is_array( $declared ) ) {
					$result['features'] = array_replace( $result['features'], $declared );
				} else {
					$result['fallback']['dynamic-pattern-output'] = true;
				}
			}
		} elseif ( $name && empty( $refs ) ) {
			$result['fallback']['unregistered-pattern-block'] = true;
		}
		foreach ( array_unique( $refs ) as $reference ) {
			$result = flexline_merge_component_results( $result, flexline_pattern_requirements( $reference, $stack, $depth + 1 ) );
		}
		$result = flexline_merge_component_results( $result, flexline_discover_pattern_blocks( $block['innerBlocks'] ?? array(), $stack, $depth + 1 ) );
	}
	return $result;
}

/**
 * Public union collector. Repeated declarations and cache hits are harmless.
 *
 * @param array $features Supported feature flags.
 */
function flexline_require_components( $features ) {
	$known = array( 'slider', 'horizontal-scroll', 'horizontal-scroll-mobile', 'modal' );
	if ( ! is_array( $features ) || array_diff( array_keys( $features ), $known ) ) {
		$GLOBALS['flexline_component_fallback']['unknown-feature-declaration'] = true;
		return;
	}
	foreach ( $features as $feature => $needed ) {
		if ( $needed ) {
			$GLOBALS['flexline_component_requirements'][ $feature ] = true;
		}
	}
}
add_action( 'flexline_require_components', __NAMESPACE__ . '\flexline_require_components' );
