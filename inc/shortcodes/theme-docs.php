<?php
/**
 * Shortcode for rendering theme documentation on the front end.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Render theme documentation via shortcode.
 *
 * Usage: [flexline_theme_docs]
 *
 * @return string HTML output of documentation.
 */
function flexline_theme_docs_shortcode() {
    ob_start();
    flexline_render_documentation_tab();
    return ob_get_clean();
}
add_shortcode( 'flexline_theme_docs', __NAMESPACE__ . '\\flexline_theme_docs_shortcode' );

/**
 * Enqueue assets required for the theme docs shortcode.
 *
 * @return void
 */
function flexline_theme_docs_assets() {
    if ( ! is_singular() ) {
        return;
    }

    $post = get_post();

    if ( ! $post || ! has_shortcode( $post->post_content, 'flexline_theme_docs' ) ) {
        return;
    }

    wp_enqueue_style( 'dashicons' );

    wp_enqueue_script(
        'flexline-tablesort',
        get_template_directory_uri() . '/assets/js/tablesort.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'flexline-theme-docs',
        get_template_directory_uri() . '/assets/js/theme-docs.js',
        [ 'flexline-tablesort' ],
        null,
        true
    );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\flexline_theme_docs_assets' );

