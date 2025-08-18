<?php

/**
 * Title: Post Meta Bar
 * Slug: flexline/meta-post
 * Categories: flexline-posts-templates
 */
?>
<!-- wp:group {"metadata":{"name":"Post Meta Bar","categories":["flexline-posts-templates"],"patternName":"flexline/meta-post"},"align":"full","className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":50,"align":"full","className":"no-lazy-load","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull no-lazy-load" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"top"}} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:post-terms {"term":"category","className":"","fontSize":"x-small","fontFamily":"display"} /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"className":"","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->