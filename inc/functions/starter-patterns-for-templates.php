<?php
/**
 * Dynamically insert starter patterns based on template.
 *
 * @package flexline
 */
namespace FlexLine\flexline;


/**
 * Auto-insert different starter patterns based on the assigned template.
 *
 * For pages (or other post types that allow custom templates),
 * this function checks the chosen template file name,
 * then looks up a wp_block pattern with the same slug (minus the .html).
 *
 * @param string  $content The default post content.
 * @param WP_Post $post    The post object.
 * @return string          Modified post content.
 */

function auto_insert_pattern_based_on_template( $content, $post ) {
  
    var_dump($content);
    // Only run on empty content (i.e., brand-new posts).
    if ("" !== $content  ) {
        return $content;
    }
    echo 'are we here?';
    // Only proceed if the post has a valid template set.
    $template_file = get_page_template_slug( get_the_ID() );
    var_dump($template_file);
    if ( ! $template_file ) {
        return $content;
    }


    // Example: if $template_file = 'page-hero-title.html', remove the extension and add '-starter' to get 'page-hero-title-starter'.
    // This becomes the pattern slug we'll look for in wp_block.
    $pattern_slug = pathinfo( $template_file, PATHINFO_FILENAME ) . '-starter';

    // Query the database for a wp_block with that slug.
    $args  = array(
        'post_type'      => 'wp_block',
        'name'           => $pattern_slug,  // 'name' matches the post slug
        'post_status'    => 'publish',
        'posts_per_page' => 1,
    );
    $query = new \WP_Query( $args );

    if ( ! $query->have_posts() ) {
        return $content; // No matching pattern found
    }

    // Retrieve the pattern's post_content and use it as the default content.
    $pattern_post = $query->posts[0];
    return $pattern_post->post_content;
}
add_filter( 'default_content', __NAMESPACE__ . '\auto_insert_pattern_based_on_template', 10, 2 );
