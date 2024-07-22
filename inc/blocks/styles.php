<?php
/**
 * Register block styles.
 *
 * @package flexlinetheme
 * @since 0.9.2
 */

namespace Flexlinetheme\flexlinetheme;
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

function flexlinetheme_register_block_styles() {

	$block_styles = array(
		'core/post-template'       => array(
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexlinetheme' ),
		),
		'core/columns'             => array(
			'columns-reverse'   => __( 'Reverse when stacked', 'flexlinetheme' ),
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexlinetheme' ),
		),
		'core/group'               => array(
			'shadow-light'    => __( 'Shadow', 'flexlinetheme' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexlinetheme' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexlinetheme' ),
			'card'            => __( 'Card', 'flexlinetheme' ),
			'card-padded'     => __( 'Card w/ Padding', 'flexlinetheme' ),
			'card-alt'        => __( 'Card w/ Images that fill', 'flexlinetheme' ),
			'outlined'        => __( 'Outlined w/ Padding', 'flexlinetheme' ),
			'glass'           => __( 'Glass', 'flexlinetheme' ),
			'glass-card'      => __( 'Glass Card', 'flexlinetheme' ),
		),
		'core/image'               => array(
			'shadow-light'    => __( 'Shadow', 'flexlinetheme' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexlinetheme' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexlinetheme' ),
			'card'            => __( 'Card', 'flexlinetheme' ),
		),
		'core/post-featured-image' => array(
			'shadow-light'    => __( 'Shadow', 'flexlinetheme' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexlinetheme' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexlinetheme' ),
			'card'            => __( 'Card', 'flexlinetheme' ),
		),
		'core/list'                => array(
			'no-disc' => __( 'No Disc', 'flexlinetheme' ),
		),
		'core/navigation'          => array(
			'main-header-nav' => __( 'Main Header Style', 'flexlinetheme' ),
			'dark-over-light' => __( 'Dark on Light', 'flexlinetheme' ),
			'light-over-dark' => __( 'Light on Dark', 'flexlinetheme' ),
		),
		'core/navigation-link'     => array(
			'outline'     => __( 'Outline', 'flexlinetheme' ),
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		'core/quote'               => array(
			'shadow-light'    => __( 'Shadow', 'flexlinetheme' ),
			'shadow-dark'     => __( 'Shadow Dark', 'flexlinetheme' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexlinetheme' ),
			'card'            => __( 'Card', 'flexlinetheme' ),
			'card-padded'     => __( 'Card w/ Padding', 'flexlinetheme' ),
			'outlined'        => __( 'Outlined w/ Padding', 'flexlinetheme' ),
			'glass'           => __( 'Glass', 'flexlinetheme' ),
			'glass-card'      => __( 'Glass Card', 'flexlinetheme' ),
		),
		'core/social-links'        => array(
			'outline' => __( 'Outline', 'flexlinetheme' ),
		),
		'core/heading'             => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
			'creative' => __( 'Creative', 'flexlinetheme' ),
		),
		'core/site-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
			'creative' => __( 'Creative', 'flexlinetheme' ),
		),
		'core/post-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
			'creative' => __( 'Creative', 'flexlinetheme' ),
		),
		'core/post-terms'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
		),
		'core/paragraph'           => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		
		'core/post-date'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
		),
		'core/post-author'        => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		
		'core/post-author-biography' => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		
		'core/post-author-name'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		
		'core/post-excerpt'       => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		
		'core/post-navigation-link' => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
		),
		
		'core/post-terms'         => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
		),
		'core/query-pagination'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		'core/query-title'        => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'creative' => __( 'Creative', 'flexlinetheme' ),
		),
		'core/read-more'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
		),
		'core/site-tagline'       => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
			'creative' => __( 'Creative', 'flexlinetheme' ),
		),
		'core/term-description'   => array(
			'text-shadow' => __( 'Text Shadow', 'flexlinetheme' ),
			'eyebrow' => __( 'Eyebrow', 'flexlinetheme' ),
		),
		'core/button'              => array(
			'glass-button' => __( 'Glass Button', 'flexlinetheme' ),
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
add_action( 'init', __NAMESPACE__ . '\flexlinetheme_register_block_styles' );
