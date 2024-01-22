<?php
/**
 * Title: Hero with image and page title.
 * Slug: flexline/hero-image-page-title
 * Categories: featured
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/feature-3.jpg'; ?>","dimRatio":60,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-912" alt="" src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/feature-3.jpg'; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-large"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->