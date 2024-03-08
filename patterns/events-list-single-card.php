<?php

/**
 * Title: Events List Single Card/Outline
 * Slug: flexline/events-list-single-card
 * Categories: flexline-posts, flexline-components
 */
?>
<!-- wp:group {"tagName":"article","align":"wide","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Event List Single Card"}} -->
<article class="wp-block-group alignwide is-style-card"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"width":""} -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":147,"width":"40px","sizeSlug":"thumbnail","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
                    <figure class="wp-block-image size-thumbnail is-resized"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/icon-calendar.webp'; ?>" alt="Calendar Icon" class="wp-image-147" style="width:40px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary"} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:tribe/event-datetime /-->

                <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"0"}}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"180px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:180px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:read-more {"content":"RSVP","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"200px"}},"backgroundColor":"primary","textColor":"base","className":"wp-button-element"} /--></div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</article>
<!-- /wp:group -->