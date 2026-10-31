<?php
/**
 * Set up the theme.
 *
 * @package flexline
 */

namespace FlexLine;

if ( ! function_exists( 'flexline_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function flexline_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'flexline', get_template_directory() . '/languages' );

		// Enqueue editor styles and fonts.
		$editor_styles = array(
			'./style.css',
			'./assets/built/css/app.css',
			'./assets/built/css/editor.css',
			'./assets/built/css/modal.css',
		);
		$custom_css    = get_theme_file_path( 'assets/css/customize.css' );
		if ( file_exists( $custom_css ) && filesize( $custom_css ) > 0 ) {
			$editor_styles[] = './assets/css/customize.css';
		}
		add_editor_style( $editor_styles );
		add_theme_support( 'editor-styles' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

		// Gutenberg responsive embed support.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	}
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\flexline_setup' );
