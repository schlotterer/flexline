<?php

/**
 * Title: Mixed Media Modal - Card.
 * Slug: flexline/gallery-mixed-simple-card
 * Categories: flexline-components, flexline-galleries
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Mixed Media Feature - Card"},"groupLinkType":"modal_media"} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enableModal":true,"modalMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
    <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
    <p class="has-text-align-left has-brand-font-family">Media Modal</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->