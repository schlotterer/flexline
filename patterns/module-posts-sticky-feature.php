<?php

/**
 * Title: Posts - Sticky.
 * Slug: flexline/posts-sticky-feature
 * Categories: flexline-modules
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"name":"Sticky Post Feature","categories":["flexline-modules"],"patternName":"flexline/posts-sticky-feature"},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":1,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","className":"","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"className":"","layout":{"type":"default","columnCount":1}} -->
        
        <!-- wp:pattern {"slug":"flexline/post-list-single-feature-post"} /-->

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->