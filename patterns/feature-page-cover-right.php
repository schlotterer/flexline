<?php
/**
 * Title: Feature - Cover Right
 * Slug: flexline/feature-cover-right
 * Categories: flexline-components
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"animated slideInLeft is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Feature Page with cover right"}} -->
<div class="wp-block-group animated slideInLeft is-style-card has-contrast-color has-text-color has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-columns-reverse"} -->
<div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Feature - Cover Right</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Curabitur blandit tempus porttitor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button {"backgroundColor":"secondary","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-secondary-background-color has-text-color has-background has-link-color wp-element-button">View More →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"stretch"} -->
<div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-3.jpg'; ?>","id":186,"dimRatio":0,"focalPoint":{"x":0.17,"y":0.28},"minHeight":100,"minHeightUnit":"%","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-3.jpg'; ?>" style="object-position:17% 28%" data-object-fit="cover" data-object-position="17% 28%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"150px"} -->
<div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->