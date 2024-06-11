<?php
/**
 * Create theme menu options.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Adds a theme page to the WordPress admin menu for managing FlexLine theme options.
 *
 * @return void
 */
function flexline_add_admin_menu() {
    add_theme_page(
        'Flexline Theme Options', 
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
