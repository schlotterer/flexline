<?php
/**
 * Set up the block customizations for media modals.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Enqueue block editor assets for Flexline theme.
 *
 * @Throws Some_Exception_Class description of exception.
 */
function flexline_enqueue_block_editor_assets() {
	// Modal addons to core button and image blocks.
	wp_enqueue_script(
		'flexline-block-extensions',
		get_theme_file_uri( '/assets/built/js/block-extensions.js' ),
		array( 'wp-blocks', 'wp-element', 'wp-editor' ),
		THEME_VERSION,
		false
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_enqueue_block_editor_assets' );

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
	if ( 'core/buttons' === $block['blockName'] ) {
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
	}
	if ( 'core/button' === $block['blockName'] ) {
		$added_classes = '';
		if ( isset( $block['attrs']['enableModal'] ) && $block['attrs']['enableModal'] ) {
			// Add a class.
			$added_classes .= 'enable-modal ';
		}
		if ( isset( $block['attrs']['iconType'] ) && $block['attrs']['iconType'] === 'download' ) {
			$search_string   = 'href="';
			$replace_string  = 'download href="';
			$block_content   = str_replace( $search_string, $replace_string, $block_content );
		}

		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		if ( isset( $block['attrs']['iconType'] ) && $block['attrs']['iconType'] ) {
			$added_classes .= 'flexline-icon-' . $block['attrs']['iconType'] . ' ';
		}
		$block_content = add_classes_to_block_content( $block_content, $added_classes );

	}
	if ( 'core/image' === $block['blockName'] ) {
		// Check if your custom attributes are set and not empty.
		$added_classes = '';
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
			$added_classes .= 'enable-modal ';
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
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
	}
	if ( 'core/cover' === $block['blockName'] ) {
		$added_classes = '';
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
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );

	}
	if ( 'core/gallery' === $block['blockName'] ) {
		// Check if your custom attributes are set and not empty.
		if ( isset( $block['attrs']['enablePosterGallery'] ) && $block['attrs']['enablePosterGallery'] ) {
			// Add a class.
			$added_classes = 'poster-gallery ';
			$block_content = add_classes_to_block_content( $block_content, $added_classes );
		}
	}
	if ( 'core/navigation' === $block['blockName'] ) {
		$added_classes = '';
		// Check if your custom attributes are set and not empty.
		if ( isset( $block['attrs']['enableHorizontalScroll'] ) && $block['attrs']['enableHorizontalScroll'] ) {
			// Add a class.
			$added_classes .= 'is-style-horizontal-scroll-at-mobile ';
		}
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );

	}
	if ( 'core/group' === $block['blockName'] || 'core/stack' === $block['blockName'] || 'core/row' === $block['blockName'] || 'core/grid' === $block['blockName'] ) {
		$added_classes = '';
		if ( isset( $block['attrs']['enableGroupLink'] ) && $block['attrs']['enableGroupLink'] ) {

			$link_type      = isset( $block['attrs']['groupLinkType'] ) ? $block['attrs']['groupLinkType'] : 'self';
			$aria_label     = ! empty( $block['attrs']['ariaLabel'] ) ? esc_attr( $block['attrs']['ariaLabel'] ) : 'Open link';
			$added_classes = 'group-link group-link-type-' . esc_attr( $link_type ) . ' ';

			// Add a class.
			if ( ! empty( $block['attrs']['groupLinkURL'] ) ) {
				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				$search_string  = '>';
				$replace_string = ' data-group-link-url="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '" tabindex="0" aria-label="' . $aria_label . '">';
				$block_content  = str_replace_first( $search_string, $replace_string, $block_content );
			}
		}
		
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );

	}
	if ( 'core/columns' === $block['blockName'] ) {
		$added_classes = '';
		if ( isset( $block['attrs']['stackAtTablet'] ) && $block['attrs']['stackAtTablet'] ) {
			$added_classes .= 'flexline-stack-at-tablet ';
		}
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
	}
	if ( 'core/column' === $block['blockName'] ) {
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
	}
	if (
		'core/heading' === $block['blockName'] ||
		'core/paragraph' === $block['blockName'] ||
		'core/video' === $block['blockName'] ||
		'core/site-logo' === $block['blockName'] ||
		'core/post-featured-image' === $block['blockName'] ||
		'core/navigation-submenu' === $block['blockName'] ||
		'core/navigation-link' === $block['blockName'] ||
		'core/html' === $block['blockName'] ||
		'core/social-link' === $block['blockName'] ||
		'core/social-links' === $block['blockName'] ||
		'core/spacer' === $block['blockName'] ||
		'core/embed' === $block['blockName'] ) {
		$added_classes = '';
		// Generate the visibility classes.
		$added_classes .= get_visibility_classes( $block['attrs'] );
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
	}


	 // **Add Unique Class and Styles for Content Shift**
	 if ( isset( $block['attrs']['useContentShift'] ) && $block['attrs']['useContentShift'] ) {
        // Generate a unique class based on the block's attributes
        $unique_class = 'flexline-content-shift-' . substr( md5( serialize( $block['attrs'] ) ), 0, 8 );
        // Add the unique class to the block's classes
        $added_classes .= $unique_class . ' ';
        // Generate the styles
        $h_shift = '0';
        $v_shift = '0';
        if ( isset( $block['attrs']['horizontalShift'], $block['attrs']['horizontalShiftAmount'] ) && $block['attrs']['horizontalShift'] !== 'none' ) {
            $direction = $block['attrs']['horizontalShift'] === 'left' ? '-' : '';
            $h_shift = $direction . esc_attr( $block['attrs']['horizontalShiftAmount'] );
        }
        if ( isset( $block['attrs']['verticalShift'], $block['attrs']['verticalShiftAmount'] ) && $block['attrs']['verticalShift'] !== 'none' ) {
            $direction = $block['attrs']['verticalShift'] === 'up' ? '-' : '';
            $v_shift = $direction . esc_attr( $block['attrs']['verticalShiftAmount'] );
        }
        // Build the CSS
        $styles = '.' . esc_attr( $unique_class ) . ' {';
        $styles .= ' --flexline-shift-x: ' . esc_attr( $h_shift ) . ';';
        $styles .= ' --flexline-shift-y: ' . esc_attr( $v_shift ) . ';';
        $styles .= '}';

        // Inject the styles
        $style_tag = '<style type="text/css">' . $styles . '</style>';
		$block_content = add_classes_to_block_content( $block_content, $added_classes );
        $block_content = $block_content . $style_tag;
    }


	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_block_customizations_render', 10, 2 );
