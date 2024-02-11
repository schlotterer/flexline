<?php

/**
 * Title: Events List Loop
 * Slug: flexline/events-list-loop
 * Categories: flexline-posts, flexline-sections
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Events List Loop Group"}} -->
<div class="wp-block-group alignfull is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","dimRatio":80,"overlayColor":"secondary","focalPoint":{"x":0.5,"y":0.35},"contentPosition":"center center","isDark":false,"align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignwide is-light has-base-color has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" style="object-position:50% 35%" data-object-fit="cover" data-object-position="50% 35%" />
        <div class="wp-block-cover__inner-container"><!-- wp:query {"queryId":5,"query":{"perPage":10,"pages":0,"offset":0,"postType":"tribe_events","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-query alignwide">
                <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","wideSize":"","contentSize":"800px"},"fontSize":"x-small"} -->
                
                <!-- wp:pattern {"slug":"flexline/events-list-single-card"} /-->

                <!-- /wp:post-template -->

                <!-- wp:query-pagination {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
                <!-- wp:query-pagination-previous /-->

                <!-- wp:query-pagination-numbers /-->

                <!-- wp:query-pagination-next /-->
                <!-- /wp:query-pagination -->

                <!-- wp:query-no-results -->
                <!-- wp:heading {"textAlign":"center"} -->
                <h2 class="wp-block-heading has-text-align-center">Check back soon to learn about future events!</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">In the mean time find us on social media.</p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"base","iconColorValue":"#ffffff","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                </ul>
                <!-- /wp:social-links -->
                <!-- /wp:query-no-results -->
            </div>
            <!-- /wp:query -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->