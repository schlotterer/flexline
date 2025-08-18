<?php
/**
 * Create theme menu options.
 *
 * @package flexline
 */

namespace FlexLine;

/**
 * Adds a theme page to the WordPress admin menu for managing FlexLine theme options.
 *
 * @return void
 */
function flexline_add_admin_menu() {
    add_theme_page(
        'FlexLine Theme Options', 
        'Theme Options', 
        'manage_options', 
        'flexline_theme_options', 
        'flexline_theme_options_page'
    );
}
add_action( 'admin_menu', __NAMESPACE__ . '\flexline_add_admin_menu' );

/**
 * Enqueues the WordPress media uploader if the current request is an admin request.
 *
 * @return void
 */
function flexline_enqueue_media_uploader() {
    if (is_admin()) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_media_uploader');

/**
 * Enqueue scripts for the theme options page.
 *
 * @param string $hook Current admin page hook.
 * @return void
 */
function flexline_enqueue_theme_options_assets( $hook ) {
    if ( 'appearance_page_flexline_theme_options' !== $hook ) {
        return;
    }

    $base = get_template_directory_uri() . '/assets/js/';
    wp_enqueue_script( 'tablesort', $base . 'tablesort.js', array(), '1.0', true );
    wp_enqueue_script( 'flexline-theme-docs', $base . 'theme-docs.js', array( 'tablesort' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\flexline_enqueue_theme_options_assets' );
