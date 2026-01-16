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
		$normalized = normalize_template_slug( (string) $template_file );
		if ( $normalized ) {
			$template_slug = $normalized . '-starter';
			$pattern       = get_block_pattern_by_slug( $template_slug );
			if ( $pattern ) {
				return $pattern;
			}
		}
	}

	// 2. Post-type specific starter pattern.
	$post_type = $post->post_type;

	// Backward compatibility for core post types.
	$legacy_map = array(
		'post' => 'post-starter',
		'page' => 'page-starter',
	);

	if ( isset( $legacy_map[ $post_type ] ) ) {
		// Use legacy naming for posts and pages.
		$pattern_slug = $legacy_map[ $post_type ];
	} else {
		// For custom post types, use WordPress template hierarchy convention.
		// Pattern slug: single-{post_type}-starter
		$pattern_slug = 'single-' . $post_type . '-starter';
	}

	$pattern = get_block_pattern_by_slug( $pattern_slug );
	if ( $pattern ) {
		return $pattern;
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

/**
 * Normalize a template identifier into a bare slug suitable for pattern lookup.
 *
 * Handles formats like:
 * - 'wp_template:theme-slug//template-slug'
 * - 'theme-slug//template-slug'
 * - 'templates/template-slug.html' or 'page-templates/full-width.php'
 *
 * @param string $template Raw template identifier/meta.
 * @return string Normalized slug (e.g. 'template-slug').
 */
function normalize_template_slug( $template ) {
	$tpl = (string) $template;
	if ( '' === $tpl ) {
		return '';
	}
	// Drop leading provider if present, e.g. 'wp_template:' prefix.
	$tpl = preg_replace( '/^[^:]+:/', '', $tpl );
	// If includes theme prefix like 'theme//slug', keep only portion after '//'.
	if ( false !== strpos( $tpl, '//' ) ) {
		$parts = explode( '//', $tpl );
		$tpl   = end( $parts );
	}
	// Trim directories and extension (e.g., 'templates/foo.html' -> 'foo').
	$tpl = pathinfo( wp_basename( $tpl ), PATHINFO_FILENAME );
	// Sanitize to a slug.
	$tpl = sanitize_title( $tpl );
	return $tpl;
}
