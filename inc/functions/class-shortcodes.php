<?php
/**
 * FlexLine Utilities Shortcodes (migrated into theme).
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined( 'ABSPATH' ) || exit;

class Shortcodes {
	/**
	 * Register shortcodes.
	 */
	public static function init() {
		add_shortcode( 'flexline_copyright_year', array( __CLASS__, 'flexline_copyright_year_shortcode' ) );
		add_shortcode( 'flexline_theme_docs', array( __CLASS__, 'flexline_theme_docs_shortcode' ) );
		add_shortcode( 'flexline_site_name', array( __CLASS__, 'flexline_site_name_shortcode' ) );
		add_shortcode( 'flexline_page_title', array( __CLASS__, 'flexline_page_title_shortcode' ) );
	}

	/**
	 * Copyright year or range.
	 */
	public static function flexline_copyright_year_shortcode( $atts ) {
		$args = shortcode_atts(
			array(
				'starting_year' => '',
				'separator'     => ' - ',
			),
			$atts
		);

		$current_year = gmdate( 'Y' );
		if ( ! $args['starting_year'] ) {
			return $current_year;
		}

		return esc_html( $args['starting_year'] . $args['separator'] . $current_year );
	}

	/**
	 * Theme docs shortcode (renders theme’s documentation tab).
	 */
	public static function flexline_theme_docs_shortcode() {
		if ( ! function_exists( 'FlexLine\\flexline_render_documentation_tab' ) ) {
			return '';
		}
		ob_start();
		\FlexLine\flexline_render_documentation_tab();
		return ob_get_clean();
	}

	/**
	 * Site name shortcode.
	 */
	public static function flexline_site_name_shortcode() {
		ob_start();
		$site_name = get_bloginfo( 'name' ) ? esc_html( get_bloginfo( 'name' ) ) : 'flexline';
		echo $site_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return ob_get_clean();
	}

	/**
	 * Page title shortcode.
	 */
	public static function flexline_page_title_shortcode() {
		$page_title = get_the_title();
		ob_start();
		echo $page_title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return ob_get_clean();
	}
}

/**
 * Enqueue assets for the theme docs shortcode on the front end.
 */
function enqueue_theme_docs_assets() {
	if ( ! is_singular() ) {
		return;
	}

	$post = get_post();
	if ( ! $post || ! has_shortcode( $post->post_content, 'flexline_theme_docs' ) ) {
		return;
	}

	wp_enqueue_style( 'dashicons' );

	$theme_uri = get_template_directory_uri();
	wp_enqueue_script(
		'flexline-tablesort',
		$theme_uri . '/assets/js/tablesort.js',
		array(),
		null,
		true
	);
	wp_enqueue_script(
		'flexline-theme-docs',
		$theme_uri . '/assets/js/theme-docs.js',
		array( 'flexline-tablesort' ),
		null,
		true
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_theme_docs_assets' );
