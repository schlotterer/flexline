<?php

/**
 * Title: Post Meta Bar
 * Slug: flexline/post-meta
 * Categories: flexline-heroes, flexline-sections, flexline-posts
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Post Meta Bar"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":527,"dimRatio":0,"overlayColor":"primary","minHeight":50,"align":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","minHeight":50,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right","verticalAlignment":"top"}} -->
                    <div class="wp-block-group alignwide has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:post-terms {"term":"category","fontSize":"x-small","fontFamily":"display"} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->