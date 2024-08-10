<?php

/**
 * Title: Post List Single Image Text/Outline
 * Slug: flexline/post-list-single-image-outline
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"name":"Post List Single Image Text/Outline"},"style":{"spacing":{"blockGap":"10px"}},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"","dimRatio":20,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}},"className":"is-style-card"} /--></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"className":"is-style-outlined","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

                    <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}}} /-->

                    <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":26,"fontSize":"x-small"} /-->

                    <!-- wp:read-more {"fontFamily":"display"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->