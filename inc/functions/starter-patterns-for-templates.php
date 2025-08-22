<?php
/**
 * Dynamically insert starter patterns based on template.
 * The theme also comes with page and post starter starter patterns.
 * Duplicate them and name them Page Starter and Post Starter to have them auto insert when a new page or post is created.
 * theme-page-starter-starter.php and theme-post-starter-starter.php
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Insert a starter pattern when a new post or page is created.
 *
 * @param string   $content Default content for the post.
 * @param \WP_Post $post    Post object.
 * @return string Starter pattern content or original content.
 */
function auto_insert_pattern_smart( $content, $post ) {
	if ( ! empty( $content ) ) {
		return $content;
	}

	// 1. Template-specific pattern (if a template is selected and supports it)
	$template_file = get_page_template_slug( $post->ID );
	if ( $template_file ) {
		$template_slug = pathinfo( $template_file, PATHINFO_FILENAME ) . '-starter';
		$pattern       = get_block_pattern_by_slug( $template_slug );
		if ( $pattern ) {
			return $pattern;
		}
	}

	// 2. Fallback to post-type starter (old behaviour)
	$fallback_map = array(
		'post' => 'post-starter',
		'page' => 'page-starter',
	);
	$post_type = $post->post_type;
	if ( isset( $fallback_map[ $post_type ] ) ) {
		$pattern = get_block_pattern_by_slug( $fallback_map[ $post_type ] );
		if ( $pattern ) {
			return $pattern;
		}
	}

	return $content;
}
add_filter( 'default_content', __NAMESPACE__ . '\auto_insert_pattern_smart', 10, 2 );

/**
 * Convenience wrapper for fetching a published wp_block by slug.
 *
 * @param string $slug Slug of the block pattern.
 * @return string|false Block pattern content if found, otherwise false.
 */
function get_block_pattern_by_slug( $slug ) {
	$q = new \WP_Query(
		array(
			'post_type'      => 'wp_block',
			'name'           => $slug,
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'no_found_rows'  => true,
		)
	);
	return $q->have_posts() ? $q->posts[0]->post_content : false;
}
