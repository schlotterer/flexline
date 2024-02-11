<?php

/**
 * Title: Post Grid Card Alt
 * Slug: flexline/post-grid-single-card-alt
 * Categories: flexline-posts, flexline-components
 * Block Types: core/query
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"backgroundColor":"base","className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Card - Image, Category, Title"}} -->
<div class="wp-block-group is-style-card-alt has-base-background-color has-background"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":527,"dimRatio":50,"minHeight":16,"minHeightUnit":"rem","gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:16rem"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","height":"250px","dimRatio":70,"gradient":"primary-primaryDark","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"duotone":"var:preset|duotone|primary"}}} /--></div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","textDecoration":"none"},"elements":{"link":{"color":{"text":"var:preset|color|highlight"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

        <!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"x-large"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->