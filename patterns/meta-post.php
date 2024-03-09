<?php

/**
 * Title: Post Meta Bar
 * Slug: flexline/post-meta
 * Categories: flexline-heroes, flexline-posts
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Post Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"brand"} -->
            <div class="wp-block-group has-base-color has-text-color has-link-color has-brand-font-family has-x-small-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:post-terms {"term":"category","fontSize":"x-small","fontFamily":"display"} /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->