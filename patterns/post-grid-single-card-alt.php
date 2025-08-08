<?php

/**
 * Title: Post Grid Single - Card Image, Category, Title
 * Slug: flexline/post-grid-single-card-alt
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","metadata":{"name":"Featured \u0026 Fallback Images"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"metadata":{"name":"Title \u0026 Meta"},"className":"is-style-default","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
    <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Category"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
        <!-- /wp:group -->

        <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->