<?php
/**
 * Register block styles.
 *
 * @since 0.9.2
 */

 namespace FlexLine\flexline;

function flexline_register_block_styles() {

	$block_styles = array(
		'core/columns' => array(
			'columns-reverse' => __( 'Reverse on Mobile', 'flexline' ),
		),
		'core/column' => array(
			'hide-on-mobile' => __( 'Hide on Mobile', 'flexline' ),
			'hide-on-desktop' => __( 'Hide on Desktop', 'flexline' ),
		),
		'core/group' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
			'card' => __( 'Card', 'flexline' ),
			'card-padded' => __( 'Card w/ Padding', 'flexline' ),
		),
		'core/image' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
		),
		'core/list' => array(
			'no-disc' => __( 'No Disc', 'flexline' ),
		),
		'core/navigation-link' => array(
			'outline' => __( 'Outline', 'flexline' ),
		),
		'core/quote' => array(
			'shadow-light' => __( 'Shadow', 'flexline' ),
			'shadow-dark' => __( 'Shadow Dark', 'flexline' ),
			'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
		),
		'core/social-links' => array(
			'outline' => __( 'Outline', 'flexline' ),
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
