<?php
/**
 * Adds OG tags to the head for better social sharing.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Adds OG tags to the head for better social sharing.
 *
 * Respects utilities options and detects Yoast, post type archives,
 * front page, search, taxonomies, attachments, etc.
 *
 * @return string Empty string when skipped; echoes meta tags otherwise.
 */
function add_og_tags() {
	$opts = \FlexLine\flexline_utilities_get_options();
	if ( ! empty( $opts['og_skip_if_yoast'] ) && class_exists( 'WPSEO_Options' ) ) {
		return '';
	}

	if ( is_singular() ) {
		global $post;
	}

	$post_content      = ! empty( $post ) ? $post->post_content : '';
	$default_content   = ( $post_content ) ? wp_strip_all_tags( strip_shortcodes( $post_content ) ) : $post_content;
	$default_title     = get_bloginfo( 'name' );
	$default_url       = get_permalink();
	$default_base_desc = ( get_bloginfo( 'description' ) ) ? get_bloginfo( 'description' ) : esc_html__( 'Visit our website to learn more.', 'flexline' );
	$default_type      = 'article';

	$logo_url = get_site_logo_from_block();

	$card_title            = $default_title;
	$card_description      = $default_base_desc;
	$card_long_description = $default_base_desc;
	$card_url              = $default_url;
	$card_image            = $logo_url;
	$card_type             = $default_type;

	if ( is_singular() ) {
		if ( has_post_thumbnail() ) {
			$card_image = get_the_post_thumbnail_url();
		}
	}

	if ( is_singular() && ! is_front_page() ) {
		$card_title            = get_the_title() . ' - ' . $default_title;
		$card_description      = ( $default_content ) ? wp_trim_words( $default_content, 53, '...' ) : $default_base_desc;
		$card_long_description = ( $default_content ) ? wp_trim_words( $default_content, 140, '...' ) : $default_base_desc;
	}

	if ( is_category() || is_tag() || is_tax() ) {
		$term_name      = single_term_title( '', false );
		$card_title     = $term_name . ' - ' . $default_title;
		$specify        = ( is_category() ) ? esc_html__( 'categorized in', 'flexline' ) : esc_html__( 'tagged with', 'flexline' );
		$queried_object = get_queried_object();
		$card_url       = get_term_link( $queried_object );
		$card_type      = 'website';

		$card_long_description = sprintf( esc_html__( 'Posts %1$s %2$s.', 'flexline' ), $specify, $term_name );
		$card_description      = $card_long_description;
	}

	if ( is_search() ) {
		$search_term = get_search_query();
		$card_title  = $search_term . ' - ' . $default_title;
		$card_url    = get_search_link( $search_term );
		$card_type   = 'website';

		$card_long_description = sprintf( esc_html__( 'Search results for %s.', 'flexline' ), $search_term );
		$card_description      = $card_long_description;
	}

	if ( is_home() ) {
		$posts_page = get_option( 'page_for_posts' );
		$card_title = get_the_title( $posts_page ) . ' - ' . $default_title;
		$card_url   = get_permalink( $posts_page );
		$card_type  = 'website';
	}

	if ( is_front_page() ) {
		$front_page = get_option( 'page_on_front' );
		$card_title = ( $front_page ) ? get_the_title( $front_page ) . ' - ' . $default_title : $default_title;
		$card_url   = get_home_url();
		$card_type  = 'website';
	}

	if ( is_post_type_archive() ) {
		$post_type_name = get_post_type();
		$card_title     = $post_type_name . ' - ' . $default_title;
		$card_url       = get_post_type_archive_link( $post_type_name );
		$card_type      = 'website';
	}

	if ( is_attachment() ) {
		$attachment_id = get_the_ID();
		$card_image    = ( wp_attachment_is_image( $attachment_id ) ) ? wp_get_attachment_image_url( $attachment_id, 'full' ) : $card_image;
	}

	?>
	<meta property="og:title" content="<?php echo esc_attr( $card_title ); ?>" />
	<meta property="og:description" content="<?php echo esc_attr( $card_description ); ?>" />
	<meta property="og:url" content="<?php echo esc_url( $card_url ); ?>" />
	<?php if ( $card_image ) : ?>
		<meta property="og:image" content="<?php echo esc_url( $card_image ); ?>" />
	<?php endif; ?>
	<meta property="og:site_name" content="<?php echo esc_attr( $default_title ); ?>" />
	<meta property="og:type" content="<?php echo esc_attr( $card_type ); ?>" />
	<meta name="description" content="<?php echo esc_attr( $card_long_description ); ?>" />
	<?php
}

/**
 * Register OG tags conditionally from Utilities settings.
 */
function flexline_register_og_tags() {
	$opts = flexline_utilities_get_options();
	if ( ! empty( $opts['enable_og_tags'] ) ) {
		add_action( 'wp_head', __NAMESPACE__ . '\\add_og_tags' );
	}
}
add_action( 'init', __NAMESPACE__ . '\\flexline_register_og_tags' );

