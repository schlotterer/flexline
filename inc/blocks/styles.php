<?php
/**
 * Register block styles.
 *
 * @since 0.9.2
 */

 namespace FlexLine\flexline;

function flexline_register_block_styles() {

	$block_styles = array(
		'core/post-template' => array(
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexline' ),
		),
		'core/columns' => array(
			'columns-reverse' => __( 'Reverse on Mobile', 'flexline' ),
			'horizontal-scroll' => __( 'Horizontal Scroll', 'flexline' ),
		),
		'core/group' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card' => __( 'Card', 'flexline' ),
			'card-padded' => __( 'Card w/ Padding', 'flexline' ),
			'card-alt' => __( 'Card w/ Images that fill', 'flexline' ),
			'outlined' => __( 'Outlined w/ Padding', 'flexline' ),
		),
		'core/image' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card' => __( 'Card', 'flexline' ),
		),
		'core/post-featured-image' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card' => __( 'Card', 'flexline' ),
		),
		'core/list' => array(
			'no-disc' => __( 'No Disc', 'flexline' ),
		),
		'core/navigation' => array(
			'main-header-nav' => __( 'Main Header Style', 'flexline' ),
			'dark-over-light' => __( 'Dark on Light', 'flexline' ),
			'light-over-dark' => __( 'Light on Dark', 'flexline' ),
		),
		'core/navigation-link' => array(
			'outline' => __( 'Outline', 'flexline' ),
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/quote' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card' => __( 'Card', 'flexline' ),
			'card-padded' => __( 'Card w/ Padding', 'flexline' ),
			'outlined' => __( 'Outlined w/ Padding', 'flexline' ),
		),
		'core/social-links' => array(
			'outline' => __( 'Outline', 'flexline' ),
		),
		'core/heading' => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		),
		'core/paragraph' => array(
			'text-shadow' => __( 'Text Shadow', 'flexline' ),
		)
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
