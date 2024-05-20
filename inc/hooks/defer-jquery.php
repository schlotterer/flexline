<?php
/**
 * Defer jQuery.
 * If you're not using something like GravityForms you can use this function to defer the loading of jQuery and drastically improve performance. 
 * WPRocket actually handles jQuery correctly so this is not needed if you're using WPRocket.
 * TODO: Add admin switch for this function.
 * @package flexline
 */

namespace FlexLine\flexline;

/**
 * Defer jQuery.
 *
 * @author Joel Schlotterer
 *
 */
function defer_jquery() {
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '/js/jquery/jquery.js', [], null, [ 'strategy'  => 'defer']);
      wp_enqueue_script('jquery');
    }
  }
//add_action('wp_enqueue_scripts', __NAMESPACE__ . '\defer_jquery',100);