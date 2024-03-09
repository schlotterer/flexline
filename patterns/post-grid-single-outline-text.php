<?php

/**
 * Title: Post Grid Single - Outline, Category, Title
 * Slug: flexline/post-grid-single-outline-text
 * Categories: flexline-posts, flexline-components
 * Block Types: core/query
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Grid Single - Outline, Category, Title"}} -->
<div class="wp-block-group is-style-outlined" style="min-height:100%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
        <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category"} /--></div>
        <!-- /wp:group -->

        <!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"x-large"} /-->

        <!-- wp:post-excerpt {"excerptLength":19,"style":{"spacing":{"margin":{"top":"0"}},"layout":{"selfStretch":"fill","flexSize":null}}} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->