<?php

/**
 * Title: Page Meta Bar
 * Slug: flexline/page-meta
 * Categories: flexline-heroes, flexline-sections
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Page Meta Bar"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","dimRatio":0,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"primary","minHeight":100,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"0","margin":{"top":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:100px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"bottom":"var:preset|spacing|small"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"neutral-light","className":"has-small-font-size","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"fontSize":"x-small","fontFamily":"display"} -->
                    <div class="wp-block-group alignwide has-small-font-size has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--small);padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"textAlign":"left","level":1,"align":"wide","style":{"typography":{"textTransform":"none"}},"fontSize":"max-48"} /-->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->