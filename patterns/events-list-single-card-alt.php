<?php

/**
 * Title: Events List Single Card Alt
 * Slug: flexline/events-list-single-card-alt
 * Categories: flexline-events
 */
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Event List Single Card Alt"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"className":"is-style-card-padded","layout":{"type":"constrained"}} -->
<article class="wp-block-group alignwide is-style-card-padded" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":""} -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
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

        <!-- wp:column {"verticalAlignment":"center","width":"125px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:125px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","className":"wp-block-button is-style-card","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group wp-block-button is-style-card has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:read-more {"content":"RSVP","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fit","flexSize":null}},"textColor":"base","className":"wp-button-element"} /--></div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</article>
<!-- /wp:group -->