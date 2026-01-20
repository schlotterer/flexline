<?php
/**
 * FlexLine Utilities Shortcodes (migrated into theme).
 *
 * Registers a small set of helper shortcodes used by the theme and
 * starter content, including copyright year, site name/title, and a
 * shortcode to render the theme’s documentation tab.
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined( 'ABSPATH' ) || exit;

/**
 * Shortcodes container class.
 */
class Shortcodes {
	/**
	 * Register shortcodes.
	 */
	public static function init() {
		add_shortcode( 'flexline_copyright_year', array( __CLASS__, 'flexline_copyright_year_shortcode' ) );
		add_shortcode( 'flexline_theme_docs', array( __CLASS__, 'flexline_theme_docs_shortcode' ) );
		add_shortcode( 'flexline_site_name', array( __CLASS__, 'flexline_site_name_shortcode' ) );
		add_shortcode( 'flexline_page_title', array( __CLASS__, 'flexline_page_title_shortcode' ) );
		add_filter( 'render_block', array( __CLASS__, 'flexline_replace_shortcode_tokens' ), 9, 2 );
	}

	/**
	 * Copyright year or range.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
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

	/**
	 * Replace shortcode tokens in rendered block content.
	 *
	 * @param string $block_content Rendered block content.
	 * @param array  $block         Block data.
	 * @return string
	 */
	public static function flexline_replace_shortcode_tokens( $block_content, $block ) {
		$tokens = array(
			'{{flexline_copyright_year}}' => self::flexline_copyright_year_shortcode( array() ),
			'{{flexline_site_name}}'      => self::flexline_site_name_shortcode(),
			'{{flexline_page_title}}'     => self::flexline_page_title_shortcode(),
		);

		$tokens = apply_filters( 'flexline_shortcode_token_map', $tokens, $block, $block_content );

		foreach ( $tokens as $placeholder => $value ) {
			if ( false === strpos( $block_content, $placeholder ) ) {
				continue;
			}

			$block_content = str_replace( $placeholder, (string) $value, $block_content );
		}

		return $block_content;
	}
}
