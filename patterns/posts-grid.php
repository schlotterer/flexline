<?php

/**
 * Title: Grid of posts in three columns.
 * Slug: flexline/posts-grid
 * Categories: flexline-posts
 * Block Types: core/query
 */
?>
<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
    <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
    
    <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->

    <!-- /wp:post-template -->

    <!-- wp:pattern {"slug":"flexline/posts-pagination"} /-->
    
</div>
<!-- /wp:query -->