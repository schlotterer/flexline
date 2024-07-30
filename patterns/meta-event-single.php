<?php

/**
 * Title: Event Meta for custom SEO
 * Slug: flexline/meta-event-single
 * Categories: flexline-events
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Event Meta Bar","categories":["flexline-events"],"patternName":"flexline/meta-event-single"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":50,"metadata":{"name":"Feature Image Background"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"className":"is-style-creative","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48"} /-->

            <!-- wp:group {"metadata":{"name":"Categories"},"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size"><!-- wp:post-terms {"term":"category","className":"is-style-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"neutral-light","fontSize":"x-small"} /--></div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->