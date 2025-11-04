<?php 
/**
 * Adds custom images sizes.
 *
 * @package flexline
 */

 namespace FlexLine;


// Theme image sizes — register only what we use
add_theme_support('post-thumbnails');

add_image_size( 'thumb-square', 400, 400, true );         // Square thumbnails for grids/cards
add_image_size( 'card-image', 640, 480, true );           // Used in content cards
add_image_size( 'medium-content', 768, 0 );               // For typical content width
add_image_size( 'wide-content', 1400, 0 );                // For full-width layout sections
add_image_size( 'hero', 1920, 1080, true );               // Large hero banners (HD)