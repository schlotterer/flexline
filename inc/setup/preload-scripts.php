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
	$relative_path = 'assets/built/js/load-early.js';
	$script_url    = add_query_arg(
		'ver',
		rawurlencode( flexline_asset_ver( $relative_path ) ),
		get_theme_file_uri( $relative_path )
	);

	printf(
		'<link rel="%1$s" href="%2$s" as="%3$s" fetchpriority="high">',
		esc_attr( 'preload' ),
		esc_url( $script_url ),
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
