<?php
/**
 * Title: Box with image, heading, text, button.
 * Slug: flexline/product-box
 * Categories: flexline-cta, flexline-components
 */
?>
<!-- wp:group {"className":"stacked is-style-outlined","layout":{"type":"default"},"metadata":{"name":"CTA - Image - Border"}} -->
<div class="wp-block-group stacked is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-6.jpg'; ?>" alt="Sample Image" class="wp-image-6001"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"15px"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">FlexLine WordPress Theme</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}}} -->
<p style="line-height:1.5">The ultimate WordPress block theme for agencies and website builders.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Buy FlexLine</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->