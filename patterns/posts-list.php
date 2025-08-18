<?php

/**
 * Title: List of posts.
 * Slug: flexline/posts-list
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"perPage":9},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->

    <!-- wp:pattern {"slug":"flexline/post-list-single-image-outline"} /-->

    <!-- /wp:post-template -->

    <!-- wp:pattern {"slug":"flexline/posts-pagination"} /-->
</div>
<!-- /wp:query -->
