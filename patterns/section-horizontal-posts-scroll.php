<?php

/**
 * Title: Query loop with horizontal posts scroll
 * Slug: flexline/section-horizontal-posts-scroll
 * Categories: flexline-sections
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"0"},"blockGap":"var:preset|spacing|small"}},"gradient":"neutral-neutralLight","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Horizontal Post Scroll"}} -->
<div class="wp-block-group alignfull is-style-default has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:0;padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"align":"wide"} -->
    <h2 class="wp-block-heading alignwide">Horizontal Post Scroll</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":9,"query":{"perPage":"9","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"full"} -->
    <div class="wp-block-query alignfull">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-horizontal-scroll","layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->