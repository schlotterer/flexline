<?php
/**
 * Preload styles and scripts.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Preload styles and scripts.
 *
 * @author Joel Schlotterer
 */
function preload_scripts() {
	printf(
		'<link rel="%1$s" href="%2$s" as="%3$s">',
		esc_attr( 'preload' ),
		esc_url( get_theme_file_uri( 'assets/built/js/load-early.js' ) ),
		esc_attr( 'script' )
	);
	// Minimal critical CSS to avoid FOUSC (hide slides after the first until runtime activates).
	?>
		<style id="flexline-slider-critical" media="all">
			body:not(.block-editor-page) .is-style-slider > *:not(:first-child) {
				position: absolute;
				inset: 0;
				opacity: 0;
				pointer-events: none;
			}

			/* Show the active slide via runtime classes */
			body:not(.block-editor-page) .is-style-slider.slider-runtime-active > *.is-slide-active { opacity: 1; pointer-events: auto; z-index: 2; }
			body:not(.block-editor-page) .is-style-slider.slider-runtime-active > *.is-slide-prev { z-index: 1; }
			/* Inner container variant */
			body:not(.block-editor-page) .is-style-slider.slider-runtime-active > .wp-block-group__inner-container > *.is-slide-active { opacity: 1; pointer-events: auto; z-index: 2; }
			body:not(.block-editor-page) .is-style-slider.slider-runtime-active > .wp-block-group__inner-container > *.is-slide-prev { z-index: 1; }
		</style>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_scripts', 1 );
