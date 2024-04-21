<?php

/**
 * Title: Events page - using Tribe Events.
 * Slug: flexline/page-events
 * Categories: flexline-events
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"Events Template"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
    
    <!-- wp:pattern {"slug":"flexline/meta-feature-page"} /-->

    <!-- wp:group {"layout":{"type":"constrained","contentSize":"1000px"},"metadata":{"name":"Text Container"}} -->
    <div class="wp-block-group"><!-- wp:paragraph -->
        <p>Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

        <!-- wp:group {"align":"full","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Events List Loop Group"}} -->
    <div class="wp-block-group alignfull is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":80,"overlayColor":"neutral","focalPoint":{"x":0.5,"y":0.35},"contentPosition":"center center","isDark":false,"align":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"spacing":{"blockGap":"0"}},"textColor":"contrast","layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignfull is-light has-contrast-color has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:50% 35%" data-object-fit="cover" data-object-position="50% 35%" />
            <div class="wp-block-cover__inner-container"><!-- wp:query {"queryId":5,"query":{"perPage":10,"pages":0,"offset":0,"postType":"tribe_events","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"align":"wide","layout":{"type":"constrained"}} -->
                <div class="wp-block-query alignwide">
                    <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained","wideSize":"","contentSize":"800px"},"fontSize":"x-small"} -->
                    
                    <!-- wp:pattern {"slug":"flexline/events-list-single-card-alt"} /-->

                    <!-- /wp:post-template -->

                    <!-- wp:pattern {"slug":"flexline/posts-pagination"} /-->

                    <!-- wp:query-no-results -->
                    <!-- wp:heading {"textAlign":"center"} -->
                    <h2 class="wp-block-heading has-text-align-center">Check back soon to learn about future events!</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center">In the mean time find us on social media.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#595f23","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
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

    <!-- wp:pattern {"slug":"flexline/cta-large"} /-->

</div>
<!-- /wp:group -->