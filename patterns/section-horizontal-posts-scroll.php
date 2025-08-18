<?php

/**
 * Title: Query loop with horizontal posts scroll
 * Slug: flexline/section-horizontal-posts-scroll
 * Categories: flexline-sections
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Horizontal Post Scroll","categories":["flexline-sections"],"patternName":"flexline/section-horizontal-posts-scroll"},"align":"wide","className":"is-style-card-padded","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"70px","left":"var:preset|spacing|medium","right":"0"},"blockGap":"var:preset|spacing|small"}},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:0;padding-bottom:70px;padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"align":"wide","className":""} -->
    <h2 class="wp-block-heading alignwide">Latest Posts Slider</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"className":""} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-auto horizontal-scroller-hide-scrollbar scroller-pause-on-hover horizontal-scroller-buttons-horizontal-left horizontal-scroller-buttons-vertical-bottom scroller-buttons-background-primary scroller-buttons-text-white scroller-buttons-border-none scroller-buttons-box-shadow","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":null},"enableHorizontalScroller":true,"scrollAuto":true,"hideScrollbar":true,"buttonsBackgroundColor":"primary","buttonsBoxShadow":true} -->

        <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->