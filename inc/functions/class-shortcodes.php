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
		add_filter( 'render_block', array( __CLASS__, 'flexline_replace_shortcode_tokens' ), 9, 3 );
		// Web4SL supplies these contexts when active; standalone FlexLine needs
		// its own token-only callbacks, without executing any shortcode registry.
		if ( ! is_callable( array( '\\Web4SL_Core\\Shortcodes', 'render_authoring_tokens' ) ) ) {
			foreach ( array( 'the_title', 'single_post_title', 'the_excerpt', 'widget_text_content', 'widget_block_content', 'wpseo_title', 'wpseo_metadesc', 'wpseo_opengraph_title', 'wpseo_opengraph_desc', 'wpseo_opengraph_site_name', 'wpseo_twitter_title', 'wpseo_twitter_description', 'rank_math/frontend/title', 'rank_math/frontend/description', 'rank_math/opengraph/facebook/og_title', 'rank_math/opengraph/facebook/og_description', 'rank_math/opengraph/twitter/twitter_title', 'rank_math/opengraph/twitter/twitter_description' ) as $hook ) {
				add_filter( $hook, array( __CLASS__, 'flexline_render_context_tokens' ), 8, 2 );
			}
		}
	}

	/**
	 * Render tokens in supported non-block contexts without changing stored text.
	 *
	 * @param mixed $value Filtered value.
	 * @param mixed $context Post ID, post or SEO presentation.
	 * @return mixed
	 */
	public static function flexline_render_context_tokens( $value, $context = null ) {
		if ( ! is_string( $value ) ) {
			return $value;
		}
		$source  = is_object( $context ) ? ( $context->source ?? $context ) : null;
		$post_id = is_numeric( $context ) ? (int) $context : (int) ( $source->ID ?? 0 );
		return self::flexline_replace_shortcode_tokens( $value, array( 'postId' => $post_id ) );
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
		$site_name = get_bloginfo( 'name' ) ? esc_html( get_bloginfo( 'name' ) ) : 'flexline';
		return $site_name;
	}

	/**
	 * Page title shortcode.
	 *
	 * @return string
	 */
	public static function flexline_page_title_shortcode() {
		return self::render_page_title( 0 );
	}

	/**
	 * Resolve explicit token context without changing shortcode attributes.
	 *
	 * @param int $post_id Post ID, or zero for the current post.
	 * @return string
	 */
	private static function render_page_title( int $post_id ): string {
		static $is_rendering = false;
		if ( $is_rendering ) {
			return '';
		}
		$is_rendering = true;
		try {
			return esc_html( get_the_title( $post_id ) );
		} finally {
			$is_rendering = false;
		}
	}

	/**
	 * Replace shortcode tokens in rendered block content.
	 *
	 * @param string         $block_content Rendered block content.
	 * @param array          $block         Block data.
	 * @param \WP_Block|null $instance Block instance with optional post context.
	 * @return string
	 */
	public static function flexline_replace_shortcode_tokens( $block_content, $block, $instance = null ) {
		$block_content = preg_replace_callback(
			'/\{\{!(flexline_[^{}]+)\}\}/',
			static function ( array $matches ): string {
				return '&#123;&#123;' . str_replace( array( '[', ']' ), array( '&#91;', '&#93;' ), esc_html( $matches[1] ) ) . '&#125;&#125;';
			},
			$block_content
		);
		if ( false === strpos( $block_content, '{{flexline_' ) ) {
			return $block_content;
		}
		if ( $instance instanceof \WP_Block && ! empty( $instance->context['postId'] ) ) {
			$block['postId'] = (int) $instance->context['postId'];
		}
		$block_content = preg_replace_callback(
			'/\{\{flexline_copyright_year(\s+[^{}]+)\}\}/',
			static function ( array $matches ): string {
				if ( ! preg_match( '~\A(?:\s+[a-z_][a-z0-9_]*=(?:"[^"{}]*"|\'[^\'{}]*\'|[^\s"\'{}=<>`]+))+\s*\z~i', $matches[1] ) ) {
					return $matches[0];
				}
				$attributes = shortcode_parse_atts( $matches[1] );
				if ( ! is_array( $attributes ) || ! $attributes || array_diff( array_keys( $attributes ), array( 'starting_year', 'separator' ) ) ) {
					return $matches[0];
				}
				return self::flexline_copyright_year_shortcode( $attributes );
			},
			$block_content
		);
		$tokens        = array(
			'{{flexline_copyright_year}}' => self::flexline_copyright_year_shortcode( array() ),
			'{{flexline_site_name}}'      => self::flexline_site_name_shortcode(),
			'{{flexline_page_title}}'     => self::render_page_title( (int) ( $block['postId'] ?? 0 ) ),
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
