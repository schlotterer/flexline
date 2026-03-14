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
		// Keep this list limited to styles not declared in theme.json variations.
		// Duplicates here can trigger WordPress suffixing (e.g., --8) and style mismatches.
		$styles = array(
			'core/accordion'                        => array(
				'card'                  => __( 'Card', 'flexline' ),
				'card-padded'           => __( 'Card w/ Padding', 'flexline' ),
				'outlined'              => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                 => __( 'Glass', 'flexline' ),
				'glass-card'            => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding' => __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-item'                   => array(
				'card'                  => __( 'Card', 'flexline' ),
				'card-padded'           => __( 'Card w/ Padding', 'flexline' ),
				'outlined'              => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                 => __( 'Glass', 'flexline' ),
				'glass-card'            => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding' => __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-heading'                => array(
				'card'                  => __( 'Card', 'flexline' ),
				'card-padded'           => __( 'Card w/ Padding', 'flexline' ),
				'outlined'              => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                 => __( 'Glass', 'flexline' ),
				'glass-card'            => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding' => __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/accordion-panel'                  => array(
				'card'                  => __( 'Card', 'flexline' ),
				'card-padded'           => __( 'Card w/ Padding', 'flexline' ),
				'outlined'              => __( 'Outlined w/ Padding', 'flexline' ),
				'glass'                 => __( 'Glass', 'flexline' ),
				'glass-card'            => __( 'Glass Card', 'flexline' ),
				'glass-card-no-padding' => __( 'Glass Card (No Padding)', 'flexline' ),
			),
			'core/page-link'                        => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/tag-link'                         => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/category-link'                    => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/home-link'                        => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/navigation-submenu'               => array(
				'outline' => __( 'Outline', 'flexline' ),
			),
			'core/term-description'                 => array(
				'eyebrow'     => __( 'Eyebrow', 'flexline' ),
				'text-shadow' => __( 'Text Shadow', 'flexline' ),
			),
			// Web4SL Floor Plan image-like blocks (use image styles only).
			'web4sl/floor-plan-2d-image'            => array(
				'card' => __( 'Card', 'flexline' ),
			),
			'web4sl/floor-plan-3d-image'            => array(
				'card' => __( 'Card', 'flexline' ),
			),
			'web4sl/floor-plan-video-button'        => array(
				'card' => __( 'Card', 'flexline' ),
			),
			'web4sl/floor-plan-virtual-tour-button' => array(
				'card' => __( 'Card', 'flexline' ),
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
