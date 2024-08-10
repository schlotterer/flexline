<?php

/**
 * Title: Page Meta Bar
 * Slug: flexline/meta-page
 * Categories: flexline-heroes, flexline-posts-templates
 */
?>
<!-- wp:group {"metadata":{"name":"Page Meta Bar","categories":["flexline-heroes"],"patternName":"flexline/meta-page"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":100,"metadata":{"name":"Featured Image Background"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"0","margin":{"top":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:100px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"className":"has-small-font-size","style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"bottom":"var:preset|spacing|small"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
            <div class="wp-block-group has-small-font-size has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--small);padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"className":"is-style-creative","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->