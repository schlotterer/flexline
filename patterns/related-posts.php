<?php
/**
 * Title: Related Posts
 * Slug: flexline/related-posts
 * Categories: query
 * Description: Shows posts related to the current post by shared category
 * Keywords: related, similar, query loop
 * Block Types: core/query
 *
 * @package FlexLine
 */
?>
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Related', 'flexline' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"metadata":{"name":"flexline-related-posts"},"enableRelatedPosts":true,"relatedPostsTaxonomy":"category","relatedPostsScope":"current","className":"flexline-related-posts-pattern"} -->
<div class="wp-block-query flexline-related-posts-pattern"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

<!-- wp:post-title {"isLink":true,"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"moreText":"Read more","showMoreOnNewLine":false,"excerptLength":20} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'No related posts found.', 'flexline' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
