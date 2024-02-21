<?php
/**
 * Title: Leadership Card.
 * Slug: flexline/team-leadership-card
 * Categories: flexline-components, flexline-modules, flexline-misc
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team - Leadership Card Group"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-card-padded","layout":{"type":"default"},"metadata":{"name":"Leadership Card"}} -->
<div class="wp-block-group alignwide is-style-card-padded" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
<div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.webp'; ?>" alt="Sample Image" class="wp-image-5592"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->