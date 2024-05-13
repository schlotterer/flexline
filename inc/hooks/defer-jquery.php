<?php
/**
 * Defer jQuery.
 *
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