<?php

/**
 * Title: Query loop with horizontal posts scroll
 * Slug: flexline/section-horizontal-posts-scroll
 * Categories: flexline-sections
 */
?>
<!-- wp:group {"metadata":{"name":"Horizontal Post Scroll","categories":["flexline-sections"],"patternName":"flexline/section-horizontal-posts-scroll"},"align":"wide","className":"is-style-card-padded","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"0"},"blockGap":"var:preset|spacing|small"}},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"align":"wide","className":""} -->
    <h2 class="wp-block-heading alignwide">Latest Posts Slider</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"className":""} -->
    <div class="wp-block-query"><!-- wp:post-template {"className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-auto horizontal-scroller-hide-scrollbar scroller-pause-on-hover horizontal-scroller-buttons-horizontal-left horizontal-scroller-buttons-vertical-bottom scroller-buttons-background-primary scroller-buttons-text-white scroller-buttons-border-none","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"250px"},"enableHorizontalScroller":true,"scrollAuto":true,"hideScrollbar":true,"buttonsBackgroundColor":"primary","buttonsBoxShadow":true} -->
        <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"https://staging2.flexlinetheme.com/wp-content/themes/flexline/assets/built/images/fallback.webp","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><img class="wp-block-cover__image-background wp-image-527" alt="" src="https://staging2.flexlinetheme.com/wp-content/themes/flexline/assets/built/images/fallback.webp" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"className":"is-style-default","style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->