<?php

/**
 * Title: Floor Plan Toggle 3D/2D
 * Slug: flexline/gallery-floor-plan-toggle
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;

?>
<!-- wp:group {"metadata":{"name":"Floor Plan 3D/2D Toggle"},"className":"visibility-toggle-group is-style-default","style":{"border":{"width":"1px"}},"borderColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group visibility-toggle-group is-style-default has-border-color has-primary-border-color" style="border-width:1px"><!-- wp:cover {"url":"<?php echo esc_url( feature_image_fallback() ); ?>","dimRatio":0,"isUserOverlayColor":true,"minHeight":50,"isDark":false,"sizeSlug":"medium","className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"color":{"duotone":["#F5F5F5","#ffffff"]}},"textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-contrast-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:50px"><img class="wp-block-cover__image-background  size-medium" alt="" src="<?php echo esc_url( feature_image_fallback() ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"","style":{"dimensions":{"minHeight":""},"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Button Controls"},"className":"is-position-absolute","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group is-position-absolute"><!-- wp:buttons {"metadata":{"name":"2D / 3D"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-buttons" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:button {"metadata":{"name":"3D Toggle Button"},"className":"visibility-toggle toggle-active","style":{"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"border":{"radius":"0px"}}} -->
<div class="wp-block-button visibility-toggle toggle-active" id="toggle-3D"><a class="wp-block-button__link wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">3D</a></div>
<!-- /wp:button -->

<!-- wp:button {"metadata":{"name":"2D Toggle Button"},"className":"visibility-toggle","style":{"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"border":{"radius":"0px"}}} -->
<div class="wp-block-button visibility-toggle" id="toggle-2D"><a class="wp-block-button__link wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">2D</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:buttons {"metadata":{"name":"Other Buttons"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"metadata":{"name":"PDF Download"},"className":"is-style-fill flexline-icon-download","style":{"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"border":{"top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"1px","color":"#0F4E63"},"left":{"width":"1px","color":"#0F4E63"},"radius":"0px"}},"fontSize":"small","iconType":"download"} -->
<div class="wp-block-button is-style-fill flexline-icon-download"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="https://livelle.test/wp-content/uploads/2025/09/AmenitiesMap-updated_6-18-25_web.pdf" style="border-radius:0px;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#0F4E63;border-bottom-width:1px;border-left-color:#0F4E63;border-left-width:1px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">PDF</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Toggle Images"},"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"},"slideHorizontal":"-100%"} -->
<div class="wp-block-group"><!-- wp:image {"aspectRatio":"3/2","scale":"contain","sizeSlug":"full","linkDestination":"none","metadata":{"name":"3D Floor Plan"},"className":"toggle-3D toggle-is-visible"} -->
<figure class="wp-block-image size-full toggle-3D toggle-is-visible"><img src="<?php echo esc_url( feature_image_fallback() ); ?>" alt="" class="" style="aspect-ratio:3/2;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"3/2","scale":"contain","sizeSlug":"full","linkDestination":"none","metadata":{"name":"2D Floor Plan"},"className":"toggle-2D toggle-is-hidden"} -->
<figure class="wp-block-image size-full toggle-2D toggle-is-hidden"><img src="<?php echo esc_url( feature_image_fallback() ); ?>" alt="" class="" style="aspect-ratio:3/2;object-fit:contain"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Content"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"textAlign":"center","className":"","style":{"typography":{"lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="line-height:1.2">Floor Plan Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":""} -->
<p class="has-text-align-center">Floor Plan Descriptions</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":""} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Learn more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
