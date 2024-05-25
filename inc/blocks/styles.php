<?php
/**
 * Register block styles.
 *
 * @package flexline
 * @since 0.9.2
 */

namespace FlexLine\flexline;

	/**
	 * Registers block styles for various core blocks.
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
	 *
	 * @return void
	 */
function flexline_register_block_styles() {

	$block_styles = array(
		'core/post-template'       => array(
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexline' ),
		),
		'core/columns'             => array(
			'columns-reverse'   => __( 'Reverse on Mobile', 'flexline' ),
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexline' ),
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
		),
		'core/site-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/post-title'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/post-terms'          => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/paragraph'           => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/button'              => array(
			'glass-button' => __( 'Glass Button', 'flexline' ),
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
