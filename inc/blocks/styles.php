<?php
/**
 * Register block styles.
 *
 * @package flexline
 * @since 0.9.2
 */

namespace FlexLine\flexline;
/**
 * Register block styles.
 *
 * This function registers block styles for various core blocks in WordPress.
 * The registered block styles include:
 * - 'horizontal-scroll' for 'core/post-template'
 * - 'columns-reverse' and 'horizontal-scroll' for 'core/columns'
 * - Various styles for 'core/group'
 * - Various styles for 'core/image'
 * - Various styles for 'core/post-featured-image'
 * - 'no-disc' for 'core/list'
 * - 'main-header-nav', 'dark-over-light', and 'light-over-dark' for 'core/navigation'
 * - 'outline' and 'text-shadow' for 'core/navigation-link'
 * - Various styles for 'core/quote'
 * - 'outline' for 'core/social-links'
 * - 'text-shadow' for 'core/heading', 'core/site-title', 'core/post-title', and 'core/post-terms'
 * - 'text-shadow' for 'core/paragraph'
 * - 'glass-button' for 'core/button'
 * - 'text-shadow' for 'core/post-date', 'core/post-author', 'core/post-author-biography', 'core/post-author-name', 'core/post-excerpt', 'core/post-navigation-link', 'core/post-terms', 'core/query-pagination', 'core/query-title', 'core/read-more', 'core/site-tagline', and 'core/term-description'
 *
 * @return void
 */

function flexline_register_block_styles() {

	$block_styles = array(
		'core/columns'             => array(
			'columns-reverse'   => __( 'Reverse when stacked', 'flexline' ),
		),
		'core/group'               => array(
			'shadow-light'    => __( 'Shadow', 'flexline' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card'            => __( 'Card', 'flexline' ),
			'card-padded'     => __( 'Card w/ Padding', 'flexline' ),
			'card-alt'        => __( 'Card w/ Images that fill', 'flexline' ),
			'outlined'        => __( 'Outlined w/ Padding', 'flexline' ),
			'glass'           => __( 'Glass', 'flexline' ),
			'glass-card'      => __( 'Glass Card', 'flexline' ),
		),
		'core/image'               => array(
			'shadow-light'    => __( 'Shadow', 'flexline' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card'            => __( 'Card', 'flexline' ),
		),
		'core/post-featured-image' => array(
			'shadow-light'    => __( 'Shadow', 'flexline' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card'            => __( 'Card', 'flexline' ),
		),
		'core/list'                => array(
			'no-disc' => __( 'No Disc', 'flexline' ),
		),
		'core/navigation'          => array(
			'main-header-nav' => __( 'Main Header Style', 'flexline' ),
			'dark-over-light' => __( 'Dark on Light', 'flexline' ),
			'light-over-dark' => __( 'Light on Dark', 'flexline' ),
		),
		'core/navigation-link'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/page-link'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/tag-link'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/category-link'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/home-link'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/navigation-submenu'     => array(
			'outline'     => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/post-navigation-link'     => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/page-list'     => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/quote'               => array(
			'shadow-light'    => __( 'Shadow', 'flexline' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card'            => __( 'Card', 'flexline' ),
			'card-padded'     => __( 'Card w/ Padding', 'flexline' ),
			'outlined'        => __( 'Outlined w/ Padding', 'flexline' ),
			'glass'           => __( 'Glass', 'flexline' ),
			'glass-card'      => __( 'Glass Card', 'flexline' ),
		),
		'core/social-links'        => array(
			'outline' => __( 'Outline', 'flexline' ),
		),
		'core/heading'             => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
			'creative' => __( 'Creative', 'flexline' ),
		),
		'core/site-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
			'creative' => __( 'Creative', 'flexline' ),
		),
		'core/post-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
			'creative' => __( 'Creative', 'flexline' ),
		),
		'core/post-terms'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
		),
		'core/paragraph'           => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		
		'core/post-date'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
		),
		'core/post-author'        => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		
		'core/post-author-biography' => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		
		'core/post-author-name'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		
		'core/post-excerpt'       => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		
		'core/post-navigation-link' => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
		),
		
		'core/post-terms'         => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
		),
		'core/query-pagination'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/query-title'        => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'creative' => __( 'Creative', 'flexline' ),
		),
		'core/read-more'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/site-tagline'       => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
			'creative' => __( 'Creative', 'flexline' ),
		),
		'core/term-description'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
			'eyebrow' => __( 'Eyebrow', 'flexline' ),
		),
		'core/button'              => array(
			'glass-button' => __( 'Glass Button', 'flexline' ),
			'text-link' => __( 'Plain Text', 'flexline' ),
		),
	);

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
add_action( 'init', __NAMESPACE__ . '\flexline_register_block_styles' );
