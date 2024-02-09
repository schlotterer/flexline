<?php
/**
 * Title: Hero for Home Page - Split ( no breadcrumbs ).
 * Slug: flexline/hero-split
 * Categories: flexline-heroes, flexline-sections
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Hero - Split - text left"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","align":"full","style":{"spacing":{"blockGap":{"left":"0"}}},"className":"is-style-default"} -->
<div class="wp-block-columns alignfull are-vertically-aligned-center is-style-default"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);flex-basis:50%"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained","contentSize":"570px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|neutral"}}}},"textColor":"neutral","fontSize":"medium"} -->
<h1 class="wp-block-heading has-neutral-color has-text-color has-link-color has-medium-font-size" style="text-transform:uppercase">H1 SEO Eyebrow</h1>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1"}},"fontSize":"max-72"} -->
<h2 class="wp-block-heading has-max-72-font-size" style="line-height:1">H2 Creative Headline - Aenean lacinia bibendum nulla sed consectetur.</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.jpg'; ?>","id":657,"dimRatio":60,"overlayColor":"primary","focalPoint":{"x":0.95,"y":0.54},"minHeight":80,"minHeightUnit":"vh","layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:80vh"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-657" alt="" src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.jpg'; ?>" style="object-position:95% 54%" data-object-fit="cover" data-object-position="95% 54%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"scroolTo"} -->
<div class="wp-block-button scroolTo"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">↓</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->