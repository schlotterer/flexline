<?php 
/**
 * Use image from customizer as fallback to the featured image.
 *
 * @package flexline
 */

namespace FlexLine\flexline;




function flexline_featured_image_fallback( $value, $post_id, $size ) {
    if ( $value ) {
        // If there's already a featured image ID, return it.
        return $value;
    }

    // Get the fallback image URL from the Customizer
    $fallback_image_url = get_theme_mod( 'flexline_fallback_image', '' );

    // If there's a URL, try to get the attachment ID
    if ( !empty($fallback_image_url) ) {
        // Convert the URL to an attachment ID
        $attachment_id = attachment_url_to_postid( $fallback_image_url );

        // If we find an attachment ID, return it
        if ( $attachment_id ) {
            return $attachment_id;
        }
    }
    var_dump($fallback_image_url);
    die();
    // Return the original value if no fallback image is found
    return $value;
}
add_filter( 'get_post_thumbnail_id', __NAMESPACE__ . '\flexline_featured_image_fallback', 10, 3 );
