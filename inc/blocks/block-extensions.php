<?php
/**
 * Set up the block customizations for media modals.
 *
 * @package flexline
 */

namespace FlexLine\flexline;
use WP_HTML_Tag_Processor;
/**
 * Enqueue block editor assets for Flexline theme.
 *
 * @Throws Some_Exception_Class description of exception.
 */
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_enqueue_block_editor_assets' );
 function flexline_enqueue_block_editor_assets() {
	// Modal addons to core button and image blocks.
	wp_enqueue_script(
		'flexline-block-extensions',
		get_theme_file_uri( '/assets/built/js/block-extensions.js' ),
		[ 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-compose' ],
		THEME_VERSION,
		false
	);
}

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
		if ( isset( $block['attrs']['iconType'] ) && $block['attrs']['iconType'] === 'download' ) {
			$search_string   = 'href="';
			$replace_string  = 'download href="';
			$block_content   = str_replace( $search_string, $replace_string, $block_content );
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

	}

	if ( 'core/group' === $block['blockName'] || 'core/stack' === $block['blockName'] || 'core/row' === $block['blockName'] || 'core/grid' === $block['blockName'] ) {
		if ( isset( $block['attrs']['enableGroupLink'] ) && $block['attrs']['enableGroupLink'] ) {					
			if ( ! empty( $block['attrs']['groupLinkURL'] ) ) {
				$link_type      = isset( $block['attrs']['groupLinkType'] ) ? '_'.$block['attrs']['groupLinkType'] : '_self';
				$aria_label     = ! empty( $block['attrs']['ariaLabel'] ) ? esc_attr( $block['attrs']['ariaLabel'] ) : 'Open link';
				$link = '<a class="flexline-group-link-anchor is-position-absolute" href="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '" aria-label="' . $aria_label . '" tabindex="0" target="' . $link_type . '"></a>';

				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				$search_string  = '>';
				$replace_string = ' data-group-link-url="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '">'.$link;
				$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
			}
		}

	}
	if ( 'core/columns' === $block['blockName'] ) {
		if ( isset( $block['attrs']['enableHorizontalScroller'] ) && $block['attrs']['enableHorizontalScroller'] && $block['attrs']['scrollAuto'] ) {
			$data_scroll_interval = 'data-scroll-interval="' . $block['attrs']['scrollSpeed'] . '"';
			$search_string  = '>';
			$replace_string = ' '.$data_scroll_interval.'>';
			$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
		}

		if ( isset( $block['attrs']['enableHorizontalScroller'] ) && $block['attrs']['enableHorizontalScroller'] && isset($block['attrs']['transitionDuration'])  ) {
			$data_scroll_interval = 'data-scroll-speed="' . $block['attrs']['transitionDuration'] . '"';
			$search_string  = '>';
			$replace_string = ' '.$data_scroll_interval.'>';
			$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
		}
	}

	 // **Add Unique Class and Styles for Content Shift**
	 if ( isset( $block['attrs']['useContentShift'] ) && $block['attrs']['useContentShift'] ) {
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
		 // Generate a unique class based on the block's attributes
		 $unique_class = 'flexline-content-shift-' . substr( md5( serialize( $block['attrs'] ) ), 0, 8 );
		 // Add the unique class to the block's classes
		 $added_classes .= 'flexline-content-shift ' . $unique_class . ' ';
		 $block_content = add_classes_to_block_content( $block_content, $added_classes );

		// Generate the styles
		$shiftLeft = '0';
		$shiftRight = '0';
		$shiftUp = '0';
		$shiftDown = '0';
		$slideX = '0';
		$slideY = '0';
		if ( isset( $block['attrs']['shiftLeft'] ) ) {
			$shiftLeft = '-'.$block['attrs']['shiftLeft'];
		}
		if ( isset( $block['attrs']['shiftRight'] ) ) {
			$shiftRight = '-'.$block['attrs']['shiftRight'];
		}
		if ( isset( $block['attrs']['shiftUp'] ) ) {
			$shiftUp = '-'.$block['attrs']['shiftUp'];
		}
		if ( isset( $block['attrs']['shiftDown'] ) ) {
			$shiftDown = '-'.$block['attrs']['shiftDown'];
		}
		if ( isset( $block['attrs']['slideHorizontal'] ) ) {
			$slideX = $block['attrs']['slideHorizontal'];
		}
		if ( isset( $block['attrs']['slideVertical'] ) ) {
			$slideY = $block['attrs']['slideVertical'];
		}
        // Build the CSS
        $styles = ' --flexline-shift-left: ' . esc_attr( $shiftLeft ) . ';';
        $styles .= ' --flexline-shift-right: ' . esc_attr( $shiftRight ) . ';';
        $styles .= ' --flexline-shift-up: ' . esc_attr( $shiftUp ) . ';';
        $styles .= ' --flexline-shift-down: ' . esc_attr( $shiftDown ) . ';';
        $styles .= ' --flexline-slide-x: ' . esc_attr( $slideX ) . ';';
        $styles .= ' --flexline-slide-y: ' . esc_attr( $slideY ) . ';';

		$block_content = flexline_merge_inline_style( $block_content, $styles );
    }
	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_block_customizations_render', 10, 2 );
