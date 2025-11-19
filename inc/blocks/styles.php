<?php
/**
 * Register block styles.
 *
 * @package flexline
 * @since 0.9.2
 */

namespace FlexLine;

/**
 * Get all registered block styles.
 *
 * Returns the array of block styles used throughout the theme. This serves as
 * the single source of truth for both registration and documentation.
 *
 * @since 0.9.2
 *
 * @return array
 */
function flexline_get_block_styles() {
		$styles = array(
			'core/accordion'           => array(
				'card'        => __( 'Card', 'flexline' ),
				'card-padded' => __( 'Card w/ Padding', 'flexline' ),
				'outlined'    => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-item'      => array(
				'card'                 => __( 'Card', 'flexline' ),
				'card-padded'          => __( 'Card w/ Padding', 'flexline' ),
				'outlined'             => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-heading'   => array(
				'card'                 => __( 'Card', 'flexline' ),
				'card-padded'          => __( 'Card w/ Padding', 'flexline' ),
				'outlined'             => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-panel'     => array(
				'card'                 => __( 'Card', 'flexline' ),
				'card-padded'          => __( 'Card w/ Padding', 'flexline' ),
				'outlined'             => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/columns'              => array(
				'columns-reverse' => __( 'Reverse when stacked', 'flexline' ),
			),
			'core/group'                => array(
				'card'                 => __( 'Card', 'flexline' ),
				'card-padded'          => __( 'Card w/ Padding', 'flexline' ),
				'card-alt'             => __( 'Card w/ Images that fill', 'flexline' ),
				'outlined'             => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/image'                => array(
				'card' => __( 'Card', 'flexline' ),
			),
			'core/post-featured-image'  => array(
				'card' => __( 'Card', 'flexline' ),
			),
			'core/list'                 => array(
				'no-disc' => __( 'No Disc', 'flexline' ),
			),
			'core/navigation'           => array(
				'main-header-nav' => __( 'Main Header Style', 'flexline' ),
				'dark-over-light' => __( 'Dark on Light', 'flexline' ),
				'light-over-dark' => __( 'Light on Dark', 'flexline' ),
			),
			'core/navigation-link'      => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/page-link'            => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/tag-link'             => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/category-link'        => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/home-link'            => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/navigation-submenu'   => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/quote'                => array(
				'card'                 => __( 'Card', 'flexline' ),
				'card-padded'          => __( 'Card w/ Padding', 'flexline' ),
				'outlined'             => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                => __( 'Glass', 'flexline' ),
				'glass-card'           => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding'=> __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/social-links'         => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/heading'              => array(
				'eyebrow'  => __( 'Eyebrow', 'flexline' ),
				'creative' => __( 'Creative', 'flexline' ),
			),
			'core/site-title'           => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'creative'    => __( 'Creative', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/post-title'           => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'creative'    => __( 'Creative', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/post-terms'           => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/post-date'            => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/post-navigation-link' => array(
				'eyebrow' => __( 'Eyebrow', 'flexline' ),
			),
			'core/query-title'          => array(
				'creative'    => __( 'Creative', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/site-tagline'         => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'creative'    => __( 'Creative', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/term-description'     => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			'core/button'               => array(
				'glass-button' => __( 'Glass Button', 'flexline' ),
				'text-link'    => __( 'Plain Text', 'flexline' ),
			),
		);

		return $styles;
}

/**
 * Register block styles.
 *
 * Iterates through the block styles array and registers each style with
 * WordPress.
 *
 * @return void
 */
function flexline_register_block_styles() {
	$block_styles = flexline_get_block_styles();

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
				register_block_style(
					$block,
					array(
						'name'  => $style_name,
						'label' => $style_label,
					)
				);
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\\flexline_register_block_styles' );
