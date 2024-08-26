<?php

/**
 * Title: Post List Single Image Text/Card
 * Slug: flexline/post-list-single-image-card
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"name":"Post Card - Image, Category, Title"},"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default" style="min-height:100%"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"20%","hideOnMobile":true} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"className":"is-style-card","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"100%","dimRatio":30,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"125px"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-card-padded" style="min-height:125px"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","textDecoration":"none"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

                <!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}},"fontSize":"x-large"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","showMoreOnNewLine":false,"excerptLength":20} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->