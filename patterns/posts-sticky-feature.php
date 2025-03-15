<?php

/**
 * Title: Posts - Sticky.
 * Slug: flexline/posts-sticky-feature
 * Categories: flexline-modules, flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:group {"layout":{"type":"default"},"metadata":{"name":"Sticky Post Feature"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
        
        <!-- wp:pattern {"slug":"flexline/post-list-single-feature-post"} /-->

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->