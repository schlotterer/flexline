<?php

/**
 * Title: Section - Latest Posts
 * Slug: flexline/section-latest-posts
 * Categories: flexline-sections, flexline-modules, flexline-posts
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":"latests-posts-3-card","layout":{"type":"constrained"},"metadata":{"name":"Latests Posts - 3 card"}} -->
<div class="wp-block-group alignfull latests-posts-3-card" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Latest Posts</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":4,"query":{"perPage":3,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":3}} -->
        
        <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->

        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
        <p></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->