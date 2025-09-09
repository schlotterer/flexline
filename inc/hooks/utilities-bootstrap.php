<?php
/**
 * Bootstrap Utilities components moved from the plugin.
 *
 * @package flexline
 */

namespace FlexLine;

defined('ABSPATH') || exit;

/**
 * Initialize Utilities admin and shortcodes after theme is set up.
 */
add_action('after_setup_theme', function() {
    if ( class_exists('FlexLine_Utilities\\Admin') ) {
        \FlexLine_Utilities\Admin::init();
    }
    if ( class_exists('FlexLine_Utilities\\Shortcodes') ) {
        \FlexLine_Utilities\Shortcodes::init();
    }
});

