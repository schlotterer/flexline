<?php
/**
 * Set up the block customizations for media modals.
 *
 * @package flexline
 */

namespace FlexLine;

use WP_HTML_Tag_Processor;
/**
 * Enqueue block editor assets for the FlexLine theme.
 *
 * @return void
 */
function flexline_enqueue_block_editor_assets() {
		// Modal addons to core button and image blocks.
		wp_enqueue_script(
			'flexline-block-extensions',
			get_theme_file_uri( '/assets/built/js/block-extensions.js' ),
			array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-compose', 'wp-rich-text', 'wp-data' ),
			function_exists( __NAMESPACE__ . '\flexline_asset_ver' ) ? flexline_asset_ver( 'assets/built/js/block-extensions.js' ) : ( defined( 'THEME_VERSION' ) ? THEME_VERSION : null ),
			false
		);
}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_enqueue_block_editor_assets' );

/**
 * Merge inline style rules into a block's markup.
 *
 * Appends additional CSS rules to the first HTML tag found in the provided
 * block content.
 *
 * @param string $block_content The original block HTML.
 * @param string $new_style_rules CSS rules to append to the existing style attribute.
 * @return string Updated block HTML with merged inline styles.
 */
function flexline_merge_inline_style( $block_content, $new_style_rules ) {

	// Create the processor.
	$processor = new WP_HTML_Tag_Processor( $block_content );

	// "Move" to the first tag – in many blocks, the wrapper is the first or second tag.
	// If you know the block markup better, you might do while ($processor->next_tag()) ...
	// Or you might specifically look for a <div> or a <figure>, etc.
	if ( $processor->next_tag() ) {
		// Get the existing style attribute, if any.
		$existing_style = $processor->get_attribute( 'style' );

		// If it already has some rules, append a semicolon & space before ours.
		if ( ! empty( $existing_style ) ) {
			$existing_style = rtrim( $existing_style, '; ' ) . '; ';
		}

		// Append the new style rules.
		$combined_style = $existing_style . $new_style_rules;

		// Set it back on the element.
		$processor->set_attribute( 'style', $combined_style );
	}

	// Return the updated HTML markup.
	return $processor->get_updated_html();
}

/**
 * Generate visibility classes based on block attributes.
 *
 * @param array $attrs The block attributes.
 * @return string The generated visibility classes.
 */
function get_visibility_classes( $attrs ) {
	$visibility_classes = '';

	if ( ! empty( $attrs['hideOnMobile'] ) ) {
		$visibility_classes .= 'flexline-hide-on-mobile ';
	}
	if ( ! empty( $attrs['hideOnTablet'] ) ) {
		$visibility_classes .= 'flexline-hide-on-tablet ';
	}
	if ( ! empty( $attrs['hideOnDesktop'] ) ) {
		$visibility_classes .= 'flexline-hide-on-desktop ';
	}

	return $visibility_classes;
}

/**
 * Replace or append classes to a block's content.
 *
 * @param string $block_content The original block content.
 * @param string $added_classes The classes to be added.
 * @return string The modified block content with the new classes.
 */
function add_classes_to_block_content( $block_content, $added_classes ) {
	$search_string  = 'class="';
	$replace_string = 'class="' . esc_attr( $added_classes );

	// Use str_replace_first to ensure only the first occurrence is replaced.
	return str_replace_first( $search_string, $replace_string, $block_content );
}


/**
 * Renders the flexline block modal.
 *
 * @param mixed $block_content The content of the block.
 * @param array $block The block settings.
 * @return mixed The modified block content.
 */
function flexline_block_customizations_render( $block_content, $block ) {

	if ( 'core/button' === $block['blockName'] ) {
		if ( isset( $block['attrs']['iconType'] ) && 'download' === $block['attrs']['iconType'] ) {
				$search_string  = 'href="';
				$replace_string = 'download href="';
				$block_content  = str_replace( $search_string, $replace_string, $block_content );
		}
	}

	if ( 'core/image' === $block['blockName'] ) {

		// Check if your custom attributes are set and not empty.
		if ( isset( $block['attrs']['enableLazyLoad'] ) && ! $block['attrs']['enableLazyLoad'] ) {
			$search_string   = 'loading="lazy"';
			$replace_string  = '';
			$block_content   = str_replace( $search_string, $replace_string, $block_content );
			$search_string2  = 'decoding="async"';
			$replace_string2 = '';
			$block_content   = str_replace( $search_string2, $replace_string2, $block_content );
		} else {
			$search_string  = '<img ';
			$replace_string = '<img decoding="async" loading="lazy" ';
			$block_content  = str_replace( $search_string, $replace_string, $block_content );
		}

		// Add aria-label to linked images using img alt or figcaption (simple, block-style approach).
		if ( false !== strpos( $block_content, '<a' ) ) {

			$label         = '';
			$attachment_id = isset( $block['attrs']['id'] ) ? (int) $block['attrs']['id'] : 0;

			if ( $attachment_id ) {
				$alt      = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
				$filepath = get_attached_file( $attachment_id );
				$filename = $filepath ? basename( $filepath ) : '';

				if ( $alt ) {
					$label = $alt;
				} elseif ( $filename ) {
					$label = sprintf( 'Link to %s', $filename );
				}
			} elseif ( ! empty( $block['attrs']['alt'] ) ) {
				$label = $block['attrs']['alt'];
			}

			if ( '' === $label ) {
				$label = 'Image link';
			}

			$label     = sanitize_text_field( $label );
			$processor = new WP_HTML_Tag_Processor( $block_content );
			while ( $processor->next_tag( 'a' ) ) {
				$has_aria  = $processor->get_attribute( 'aria-label' );
				$has_title = $processor->get_attribute( 'title' );
				if ( null === $has_aria && null === $has_title ) {
					$processor->set_attribute( 'aria-label', $label );
					break; // Label the first anchor encountered.
				}
			}
			$block_content = $processor->get_updated_html();

		}
		if ( isset( $block['attrs']['enableModal'] ) && $block['attrs']['enableModal'] ) {
			// Add a class.
			// Add the media URL as a data attribute if it exists.
			if ( ! empty( $block['attrs']['modalMediaURL'] ) ) {
				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				// $block_content = str_replace('>', ' data-modal-media-url="' . esc_attr($block['attrs']['modalMediaURL']) . '">', $block_content);'.
				$search_string  = '>';
				$replace_string = ' data-modal-media-url="' . esc_attr( $block['attrs']['modalMediaURL'] ) . '">';
				$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
			}
		}
	}

	if ( 'core/site-logo' === $block['blockName'] && ! empty( $block['attrs']['useHighResLogo'] ) ) {
		$width_attr = isset( $block['attrs']['width'] ) ? (int) $block['attrs']['width'] : 0;
		if ( $width_attr > 0 ) {
			$hires_width = max( 1, $width_attr * 2 );
			$processor   = new WP_HTML_Tag_Processor( $block_content );
			if ( $processor->next_tag( 'img' ) ) {
				$sizes_value = sprintf( '(min-width: %1$spx) %1$spx, 100vw', $hires_width );
				$processor->set_attribute( 'sizes', $sizes_value );
				$current_img_class = $processor->get_attribute( 'class' );
				$img_class_string  = is_string( $current_img_class ) ? trim( $current_img_class ) : '';
				if ( false === strpos( ' ' . $img_class_string . ' ', ' flexline-logo-hires ' ) ) {
					$processor->set_attribute( 'class', trim( $img_class_string . ' flexline-logo-hires' ) );
				}
				$block_content = $processor->get_updated_html();
			}
		}
		$block_content = add_classes_to_block_content( $block_content, 'flexline-logo-hires ' );
	}

	if ( 'core/cover' === $block['blockName'] ) {
		// Check if your custom attributes are set and not empty.
		if ( isset( $block['attrs']['enableLazyLoad'] ) && ! $block['attrs']['enableLazyLoad'] ) {
			$search_string   = 'loading="lazy"';
			$replace_string  = '';
			$block_content   = str_replace( $search_string, $replace_string, $block_content );
			$search_string2  = 'decoding="async"';
			$replace_string2 = 'decoding="sync"';
			$block_content   = str_replace( $search_string2, $replace_string2, $block_content );
		} else {
			$search_string  = '<img ';
			$replace_string = '<img loading="lazy" ';
			$block_content  = str_replace( $search_string, $replace_string, $block_content );
		}

			// FlexLine Glass overlay: classes only (no inline styles).
		$toggle    = ! empty( $block['attrs']['flexlineGlassOverlay'] );
		$level     = isset( $block['attrs']['flexlineGlassLevel'] ) ? (float) $block['attrs']['flexlineGlassLevel'] : 0.0;
		$level     = max( 0.0, min( 10.0, $level ) );
		$effective = $level > 0 ? (int) round( $level ) : ( $toggle ? 10 : 0 );
		if ( $effective > 0 ) {
			$block_content = add_classes_to_block_content( $block_content, 'flexline-glass-overlay glass-level-' . $effective . ' ' );
		}
	}

	if ( 'core/group' === $block['blockName'] || 'core/stack' === $block['blockName'] || 'core/row' === $block['blockName'] || 'core/grid' === $block['blockName'] ) {
		if ( isset( $block['attrs']['enableGroupLink'] ) && $block['attrs']['enableGroupLink'] ) {
			if ( ! empty( $block['attrs']['groupLinkURL'] ) ) {
				// Determine target attribute for link types.
				$link_type_raw = isset( $block['attrs']['groupLinkType'] ) ? (string) $block['attrs']['groupLinkType'] : 'self';
				$target_attr   = '';
				if ( 'new_tab' === $link_type_raw ) {
					$target_attr = ' target="_blank" rel="noopener"';
				} elseif ( 'self' === $link_type_raw || 'none' === $link_type_raw ) {
					$target_attr = ''; // Default same-window; no target attribute needed.
				} elseif ( 'modal_media' === $link_type_raw ) {
					// Modal handled via JS on container class 'group-link-type-modal_media'.
					// Do not set target to avoid opening a new tab.
					$target_attr = '';
				}

				$aria_label = ! empty( $block['attrs']['ariaLabel'] ) ? esc_attr( $block['attrs']['ariaLabel'] ) : 'Open link';
				$link       = '<a class="flexline-group-link-anchor is-position-absolute" href="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '" aria-label="' . $aria_label . '" tabindex="0"' . $target_attr . '></a>';

				// Ensure the wrapper carries the link-type class for runtime JS hooks.
				$type_class    = 'group-link-type-' . $link_type_raw;
				$added_classes = 'group-link ' . $type_class . ' ';
				$block_content = add_classes_to_block_content( $block_content, $added_classes );

				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				$search_string  = '>';
				$replace_string = ' data-group-link-url="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '">' . $link;
				$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
			}
		}

		// Slider CSS variables for Group/Stack when enabled.
		if (
			( 'core/group' === $block['blockName'] || 'core/stack' === $block['blockName'] ) &&
			! empty( $block['attrs']['enableSlider'] )
		) {
			$height         = isset( $block['attrs']['sliderHeight'] ) ? trim( (string) $block['attrs']['sliderHeight'] ) : '';
			$transition_ms  = isset( $block['attrs']['transitionDuration'] ) ? (int) $block['attrs']['transitionDuration'] : 500;
			$auto           = ! empty( $block['attrs']['sliderAuto'] );
			$interval_ms    = $auto ? ( (int) ( $block['attrs']['sliderSpeed'] ?? 4000 ) ) : 0;
			$loop           = ! empty( $block['attrs']['sliderLoop'] ) ? 1 : 0;
			$pause_on_hover = ( $auto && ! empty( $block['attrs']['pauseOnHover'] ) ) ? 1 : 0;
			$show_pause     = ( $auto && empty( $block['attrs']['hidePauseButton'] ) ) ? 1 : 0;
			$show_nav       = ! empty( $block['attrs']['sliderNav'] ) ? 1 : 0;

			$vars = '';
			if ( '' !== $height ) {
				$vars .= ' --slider-height: ' . esc_attr( $height ) . ';';
			}
			$vars .= ' --slider-transition-ms: ' . esc_attr( $transition_ms ) . ';';
			$vars .= ' --slider-interval-ms: ' . esc_attr( $interval_ms ) . ';';
			$vars .= ' --slider-loop: ' . esc_attr( $loop ) . ';';
			$vars .= ' --slider-pause-on-hover: ' . esc_attr( $pause_on_hover ) . ';';
			$vars .= ' --slider-show-pause: ' . esc_attr( $show_pause ) . ';';
			$vars .= ' --slider-nav: ' . esc_attr( $show_nav ) . ';';

			if ( $vars ) {
				$block_content = flexline_merge_inline_style( $block_content, $vars );
			}
		}
	}

	if ( 'core/columns' === $block['blockName'] ) {

		$block['attrs']['scrollAuto'] = isset( $block['attrs']['scrollAuto'] ) ? $block['attrs']['scrollAuto'] : false;
		if ( isset( $block['attrs']['enableHorizontalScroller'] ) && $block['attrs']['enableHorizontalScroller'] && $block['attrs']['scrollAuto'] ) {
			$block['attrs']['scrollSpeed'] = isset( $block['attrs']['scrollSpeed'] ) ? $block['attrs']['scrollSpeed'] : 4000;
			$data_scroll_interval          = 'data-scroll-interval="' . $block['attrs']['scrollSpeed'] . '"';
			$search_string                 = '>';
			$replace_string                = ' ' . $data_scroll_interval . '>';
			$block_content                 = str_replace_first( $search_string, $replace_string, $block_content );
		}

		if ( isset( $block['attrs']['enableHorizontalScroller'] ) && $block['attrs']['enableHorizontalScroller'] && isset( $block['attrs']['transitionDuration'] ) ) {
			$block['attrs']['transitionDuration'] = isset( $block['attrs']['transitionDuration'] ) ? $block['attrs']['transitionDuration'] : 500;
			$data_scroll_interval                 = 'data-scroll-speed="' . $block['attrs']['transitionDuration'] . '"';
			$search_string                        = '>';
			$replace_string                       = ' ' . $data_scroll_interval . '>';
			$block_content                        = str_replace_first( $search_string, $replace_string, $block_content );
		}
	}

	// **Add Unique Class and Styles for Content Shift**.
	if ( isset( $block['attrs']['useContentShift'] ) && $block['attrs']['useContentShift'] ) {
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content  = add_classes_to_block_content( $block_content, $added_classes );
		// Generate a unique class based on the block's attributes.
		$unique_class = 'flexline-content-shift-' . substr( md5( wp_json_encode( $block['attrs'] ) ), 0, 8 );
		// Add the unique class to the block's classes.
		$added_classes .= 'flexline-content-shift ' . $unique_class . ' ';
		$block_content  = add_classes_to_block_content( $block_content, $added_classes );

		// Generate the styles.
		$shift_left  = '0';
		$shift_right = '0';
		$shift_up    = '0';
		$shift_down  = '0';
		$slide_x     = '0';
		$slide_y     = '0';
		if ( isset( $block['attrs']['shiftLeft'] ) ) {
				$shift_left = '-' . $block['attrs']['shiftLeft'];
		}
		if ( isset( $block['attrs']['shiftRight'] ) ) {
				$shift_right = '-' . $block['attrs']['shiftRight'];
		}
		if ( isset( $block['attrs']['shiftUp'] ) ) {
				$shift_up = '-' . $block['attrs']['shiftUp'];
		}
		if ( isset( $block['attrs']['shiftDown'] ) ) {
				$shift_down = '-' . $block['attrs']['shiftDown'];
		}
		if ( isset( $block['attrs']['slideHorizontal'] ) ) {
				$slide_x = $block['attrs']['slideHorizontal'];
		}
		if ( isset( $block['attrs']['slideVertical'] ) ) {
				$slide_y = $block['attrs']['slideVertical'];
		}
		// Build the CSS.
		$styles  = ' --flexline-shift-left: ' . esc_attr( $shift_left ) . ';';
		$styles .= ' --flexline-shift-right: ' . esc_attr( $shift_right ) . ';';
		$styles .= ' --flexline-shift-up: ' . esc_attr( $shift_up ) . ';';
		$styles .= ' --flexline-shift-down: ' . esc_attr( $shift_down ) . ';';
		$styles .= ' --flexline-slide-x: ' . esc_attr( $slide_x ) . ';';
		$styles .= ' --flexline-slide-y: ' . esc_attr( $slide_y ) . ';';

		$block_content = flexline_merge_inline_style( $block_content, $styles );
	}
	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_block_customizations_render', 10, 2 );
