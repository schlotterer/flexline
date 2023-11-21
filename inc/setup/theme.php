<?php
/**
 * Set up the theme.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

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
		add_editor_style(
			array(
				'./style.css',
			)
		);

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
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

	}
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\flexline_setup' );