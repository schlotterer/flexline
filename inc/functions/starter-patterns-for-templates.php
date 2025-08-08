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
 * Auto-insert a block pattern stored in the database into new posts.
 *
 * This function retrieves a block pattern (stored as a post of type 'wp_block')
 * based on the new post’s type. If found, its post content is returned
 * as the default content.
 *
 * @param string  $content The default post content.
 * @param WP_Post $post    The post object.
 * @return string Modified post content.
 */
function auto_insert_pattern_from_db( $content, $post ) {
    // Only modify content if it's empty (i.e. for new posts).
    if ( ! empty( $content ) ) {
        return $content;
    }

    // Map each post type to its corresponding block pattern slug.
    $pattern_slugs = array(
        'post' => 'post-starter',  // Replace with your actual slug for posts.
        'page' => 'page-starter',  // Replace with your actual slug for pages.
        // Add additional mappings for other custom post types if needed.
    );

    $post_type = $post->post_type;
    if ( empty( $post_type ) || ! isset( $pattern_slugs[ $post_type ] ) ) {
        return $content;
    }

    $pattern_slug = $pattern_slugs[ $post_type ];

    // Query the block pattern from the database using WP_Query.
    $args = array(
        'post_type'      => 'wp_block',
        'name'           => $pattern_slug,
        'post_status'    => 'publish',
        'posts_per_page' => 1,
    );
    $query = new \WP_Query( $args );

    if ( ! $query->have_posts() ) {
        return $content;
    }

    $pattern = $query->posts[0];

    // Return the post_content of the retrieved block pattern.
    return $pattern->post_content;
}
add_filter( 'default_content', __NAMESPACE__ . '\auto_insert_pattern_from_db', 10, 2 );
