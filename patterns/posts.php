<?php

/**
 * Title: List of posts in one column.
 * Slug: flexline/posts
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:post-template -->

    <!-- wp:pattern {"slug":"flexline/post-list-single-outline"} /-->

    <!-- /wp:post-template -->

    <!-- wp:pattern {"slug":"flexline/posts-pagination"} /-->
</div>
<!-- /wp:query -->