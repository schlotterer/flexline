<?php

/**
 * Title: Post List pagination.
 * Slug: flexline/posts-pagination
 * Categories: flexline-posts-templates
 * Block Types: core/query
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Previous / Next"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:query-pagination {"paginationArrow":"arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"x-small","fontFamily":"display"} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
</div>
<!-- /wp:group -->