<?php
/** CLI-only contract: bootstrap must use a write-blocking test database adapter. */
if ( PHP_SAPI !== 'cli' || empty( $argv[1] ) ) {
    exit( "Usage: php tests/authoring-tokens-integration.php /path/to/read-only/wp-load.php\n" );
}
require $argv[1];
if ( ! $wpdb instanceof Web4SL_KSES_Read_Only_DB ) {
    throw new RuntimeException( 'A write-blocking test database adapter is required.' );
}
use FlexLine_Utilities\Shortcodes as Tokens;
$count = 0;
function flexline_token_check( $condition, $message ) {
    global $count;
    ++$count;
    if ( ! $condition ) { throw new RuntimeException( $message ); }
}
$post = get_post( (int) $wpdb->get_var( "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'page' ORDER BY ID LIMIT 1" ) );
flexline_token_check( $post instanceof WP_Post, 'Read-only title context exists.' );
$values = array(
    '{{flexline_copyright_year}}' => Tokens::flexline_copyright_year_shortcode( array() ),
    '{{flexline_copyright_year starting_year="2015" separator=" to "}}' => Tokens::flexline_copyright_year_shortcode( array( 'starting_year' => '2015', 'separator' => ' to ' ) ),
    "{{flexline_copyright_year starting_year='2015' separator=' - '}}" => Tokens::flexline_copyright_year_shortcode( array( 'starting_year' => '2015' ) ),
    '{{flexline_site_name}}' => Tokens::flexline_site_name_shortcode(),
    '{{flexline_page_title}}' => Tokens::flexline_page_title_shortcode(),
);
foreach ( $values as $token => $expected ) {
    flexline_token_check( Tokens::flexline_replace_shortcode_tokens( $token, array() ) === $expected, 'Existing renderer parity.' );
    foreach ( array( true, false ) as $legacy ) {
        $callback = static function () use ( $legacy ) { return $legacy; };
        add_filter( 'wp_kses_force_legacy_parser', $callback, PHP_INT_MAX );
        try {
            $source = '<!-- wp:paragraph --><p>' . $token . '</p><!-- /wp:paragraph -->';
            flexline_token_check( do_blocks( wp_unslash( wp_filter_post_kses( wp_slash( $source ) ) ) ) === do_blocks( $source ), 'Save and render parity.' );
            $source = '<!-- wp:group --><div class="wp-block-group"><!-- wp:code --><pre class="wp-block-code"><code>' . str_replace( '{{', '{{!', $token ) . '</code></pre><!-- /wp:code --></div><!-- /wp:group -->';
            $rendered = do_blocks( wp_unslash( wp_filter_post_kses( wp_slash( $source ) ) ) );
            flexline_token_check( false !== strpos( $rendered, '&#123;&#123;' ), 'Literal survives nested rendering.' );
            flexline_token_check( html_entity_decode( wp_strip_all_tags( $rendered ), ENT_QUOTES, 'UTF-8' ) === $token, 'Literal displays original token.' );
        } finally { remove_filter( 'wp_kses_force_legacy_parser', $callback, PHP_INT_MAX ); }
    }
}
foreach ( array( '{{flexline_copyright_year wrong="2015"}}', '{{flexline_copyright_year starting_year="2015" trailing}}', '{{unknown_token}}' ) as $token ) {
    flexline_token_check( Tokens::flexline_replace_shortcode_tokens( $token, array() ) === $token, 'Unsupported expressions preserved.' );
}
foreach ( array( 'the_title', 'single_post_title', 'the_excerpt', 'widget_text_content', 'widget_block_content', 'wpseo_title', 'wpseo_metadesc', 'wpseo_opengraph_title', 'wpseo_opengraph_desc', 'wpseo_opengraph_site_name', 'wpseo_twitter_title', 'wpseo_twitter_description', 'rank_math/frontend/title', 'rank_math/frontend/description', 'rank_math/opengraph/facebook/og_title', 'rank_math/opengraph/facebook/og_description', 'rank_math/opengraph/twitter/twitter_title', 'rank_math/opengraph/twitter/twitter_description' ) as $hook ) {
    flexline_token_check( false !== strpos( apply_filters( $hook, '{{flexline_copyright_year starting_year="2015" separator=" to "}}', $post->ID ), '2015 to ' . gmdate( 'Y' ) ), 'Context options before typography: ' . $hook );
    flexline_token_check( false !== strpos( apply_filters( $hook, '{{!flexline_site_name}}', $post->ID ), '&#123;&#123;flexline_site_name&#125;&#125;' ), 'Context literal preserved: ' . $hook );
}
if ( ! is_callable( array( 'Web4SL_Core\\Shortcodes', 'render_authoring_tokens' ) ) ) {
    flexline_token_check( false !== has_filter( 'the_title', array( Tokens::class, 'flexline_render_context_tokens' ) ), 'Standalone/older-plugin title fallback registered.' );
}
$instance = new WP_Block( parse_blocks( '<!-- wp:paragraph --><p>{{flexline_page_title}}</p><!-- /wp:paragraph -->' )[0] );
$instance->context['postId'] = $post->ID;
flexline_token_check( false !== strpos( $instance->render(), esc_html( get_the_title( $post->ID ) ) ), 'Core block post context renders the correct title.' );
flexline_token_check( has_shortcode( '[flexline_theme_docs]', 'flexline_theme_docs' ), 'Administrative helper preserved.' );
flexline_token_check( null === Tokens::flexline_render_context_tokens( null ), 'Non-string filter inputs preserved.' );
echo 'PASS: ' . $count . ' FlexLine token assertions; WordPress ' . get_bloginfo( 'version' ) . '; Web4SL ' . ( class_exists( 'Web4SL_Core\\Shortcodes' ) ? 'active' : 'absent' ) . "; database writes blocked.\n";
