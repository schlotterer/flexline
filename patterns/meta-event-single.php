<?php
/**
 * Title: Event Meta for custom SEO
 * Slug: flexline/meta-event-single
 * Categories: flexline-heroes, flexline-sections
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Event Meta Bar"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">
        <!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":527,"dimRatio":0,"overlayColor":"primary","minHeight":50,"align":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
            <div class="wp-block-cover__inner-container"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"primary","minHeight":50,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
                        <div class="wp-block-group alignwide has-base-color has-text-color has-link-color" style="padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /-->

                            <!-- wp:post-terms {"term":"category"} /-->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:post-title {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-36"} /-->

                        <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                        <div class="wp-block-group alignwide has-base-color has-text-color has-link-color"><!-- wp:tribe/event-datetime /--></div>
                        <!-- /wp:group -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:group -->