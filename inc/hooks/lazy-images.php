

<?php
/**
 * Adds lazy attribute to images
 *
 * @package flexline
*/

/* * Add Lazy Load attributes to all img tags in wordpress 
 * 
add_action( 'wp_footer', function() {
    $body     = ob_get_contents();
    $replaced = preg_replace_callback( '#<img([^>]+)>#u', function( $matches ) {
        list( $match, $attr ) = $matches;
        foreach ( [
            'decoding' => 'async', // This line might be meaningless.
            'loading'  => 'lazy',
        ] as $key => $val ) {
            if ( false !== strpos( $attr, $key . '=' ) ) {
                // If already added, skip.
                continue;
            }
            $attr = sprintf( ' %s="%s"%s', $key, $val, $attr );
        }
        return sprintf( '<img%s>', $attr );
    }, $body );
    ob_end_clean();
    echo $replaced;
}, 9999 );
* */