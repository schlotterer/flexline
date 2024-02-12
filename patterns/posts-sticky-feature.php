<?php

/**
 * Title: Posts - Sticky.
 * Slug: flexline/posts-sticky-feature
 * Categories: flexline-posts, flexline-modules, flexline-components
 * Block Types: core/query
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Sticky Post Feature"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
        
            <!-- wp:pattern {"slug":"flexline/post-list-single-cover-columns"} /-->

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->