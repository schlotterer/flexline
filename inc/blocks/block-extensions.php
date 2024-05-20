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
 * @throws Some_Exception_Class description of exception
 * @return Some_Return_Value
 */
function flexline_enqueue_block_editor_assets() {
	// Modal addons to core button and image blocks.
	wp_enqueue_script(
		'flexline-block-extensions',
		get_theme_file_uri( '/assets/built/js/block-extensions.js' ),
		array( 'wp-blocks', 'wp-element', 'wp-editor' ),
		filemtime( get_theme_file_path( '/assets/built/js/block-extensions.js' ) )
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\flexline_enqueue_block_editor_assets' );


/**
 * Renders the flexline block modal.
 *
 * @param mixed $block_content The content of the block.
 * @param array $block The block settings.
 * @return mixed The modified block content.
 */
function flexline_block_customizations_render( $block_content, $block ) {
	if ( $block['blockName'] === 'core/buttons' ) {
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/button' ) {
		$added_classes = '';
		if ( isset( $block['attrs']['enableModal'] ) && $block['attrs']['enableModal'] ) {
			// Add a class
			$added_classes .= 'enable-modal ';
		}
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/image' ) {
		// Check if your custom attributes are set and not empty

		if ( isset( $block['attrs']['enableLazyLoad'] ) && ! $block['attrs']['enableLazyLoad'] ) {
			$search_string  = 'loading="lazy"';
			$replaceString  = '';
			$block_content  = str_replace( $search_string, $replaceString, $block_content );
			$search_string2 = 'decoding="async"';
			$replaceString2 = '';
			$block_content  = str_replace( $search_string2, $replaceString2, $block_content );
		} else {
			$search_string = '<img ';
			$replaceString = '<img decoding="async" loading="lazy" ';
			$block_content = str_replace( $search_string, $replaceString, $block_content );
		}
		if ( isset( $block['attrs']['enableModal'] ) && $block['attrs']['enableModal'] ) {
			// Add a class
			// $block_content = str_replace('class="', 'class="enable-modal ', $block_content);
			$search_string = 'class="';
			$replaceString = 'class="enable-modal ';
			$block_content = str_replace_first( $search_string, $replaceString, $block_content );
			// Add the media URL as a data attribute if it exists
			if ( ! empty( $block['attrs']['modalMediaURL'] ) ) {
				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				// $block_content = str_replace('>', ' data-modal-media-url="' . esc_attr($block['attrs']['modalMediaURL']) . '">', $block_content);
				$search_string = '>';
				$replaceString = ' data-modal-media-url="' . esc_attr( $block['attrs']['modalMediaURL'] ) . '">';
				$block_content = str_replace_first( $search_string, $replaceString, $block_content );
			}
		}
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );

	}
	if ( $block['blockName'] === 'core/cover' ) {
		// Check if your custom attributes are set and not empty
		if ( isset( $block['attrs']['enableLazyLoad'] ) && ! $block['attrs']['enableLazyLoad'] ) {
			$search_string  = 'loading="lazy"';
			$replaceString  = '';
			$block_content  = str_replace( $search_string, $replaceString, $block_content );
			$search_string2 = 'decoding="async"';
			$replaceString2 = 'decoding="sync"';
			$block_content  = str_replace( $search_string2, $replaceString2, $block_content );
		} else {
			$search_string = '<img ';
			$replaceString = '<img loading="lazy" ';
			$block_content = str_replace( $search_string, $replaceString, $block_content );
		}
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/gallery' ) {
		// Check if your custom attributes are set and not empty
		if ( isset( $block['attrs']['enablePosterGallery'] ) && $block['attrs']['enablePosterGallery'] ) {
			// Add a class
			$search_string = 'class="';
			$replaceString = 'class="poster-gallery ';
			$block_content = str_replace_first( $search_string, $replaceString, $block_content );
		}
	}
	if ( $block['blockName'] === 'core/navigation' ) {
		$added_classes = '';
		// Check if your custom attributes are set and not empty
		if ( isset( $block['attrs']['enableHorizontalScroll'] ) && $block['attrs']['enableHorizontalScroll'] ) {
			// Add a class
			$added_classes .= 'is-style-horizontal-scroll-at-mobile ';
		}
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/group' || $block['blockName'] === 'core/stack' || $block['blockName'] === 'core/row' ) {

		if ( isset( $block['attrs']['enableGroupLink'] ) && $block['attrs']['enableGroupLink'] ) {

			$linkType      = isset( $block['attrs']['groupLinkType'] ) ? $block['attrs']['groupLinkType'] : 'self';
			$aria_label    = ! empty( $block['attrs']['ariaLabel'] ) ? esc_attr( $block['attrs']['ariaLabel'] ) : 'Open link';
			$search_string = 'class="';
			$replaceString = 'class="group-link group-link-type-' . esc_attr( $linkType ) . ' ';
			$block_content = str_replace_first( $search_string, $replaceString, $block_content );

			// Add a class
			// $block_content = str_replace('class="', 'class="group-link group-link-type-' . esc_attr($linkType) . ' ', $block_content);
			if ( ! empty( $block['attrs']['groupLinkURL'] ) ) {
				// Insert your data attribute just before the closing tag of the element.
				// This is a basic string replacement and might need to be adjusted based on the block markup.
				$search_string = '>';
				$replaceString = ' data-group-link-url="' . esc_attr( $block['attrs']['groupLinkURL'] ) . '" tabindex="0" aria-label="' . $aria_label . '">';
				$block_content = str_replace_first( $search_string, $replaceString, $block_content );
			}
		}
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/columns' ) {
		$added_classes = '';
		if ( isset( $block['attrs']['stackAtTablet'] ) && $block['attrs']['stackAtTablet'] ) {
			$added_classes .= 'flexline-stack-at-tablet ';
		}
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if ( $block['blockName'] === 'core/column' ) {
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}
	if (
		$block['blockName'] === 'core/headline' ||
		$block['blockName'] === 'core/paragraph' ||
		$block['blockName'] === 'core/video' ||
		$block['blockName'] === 'core/site-logo' ||
		$block['blockName'] === 'core/post-featured-image' ||
		$block['blockName'] === 'core/navigation-submenu' ||
		$block['blockName'] === 'core/navigation-link' ||
		$block['blockName'] === 'core/html' ||
		$block['blockName'] === 'core/social-link' ||
		$block['blockName'] === 'core/social-links' ||
		$block['blockName'] === 'core/spacer' ||
		$block['blockName'] === 'core/embed' ) {
		$added_classes = '';
		if ( isset( $block['attrs']['hideOnMobile'] ) && $block['attrs']['hideOnMobile'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-mobile ';
		}
		if ( isset( $block['attrs']['hideOnTablet'] ) && $block['attrs']['hideOnTablet'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-tablet ';
		}
		if ( isset( $block['attrs']['hideOnDesktop'] ) && $block['attrs']['hideOnDesktop'] ) {
			// Add a class
			$added_classes .= 'flexline-hide-on-desktop ';
		}
		$search_string = 'class="';
		$replaceString = 'class="' . $added_classes;
		$block_content = str_replace_first( $search_string, $replaceString, $block_content );
	}

	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\flexline_block_customizations_render', 10, 2 );
