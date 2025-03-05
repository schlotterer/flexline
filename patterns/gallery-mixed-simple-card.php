<?php

/**
 * Title: Mixed Media Modal - Card.
 * Slug: flexline/gallery-mixed-simple-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Mixed Media Feature"},"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"modal_media"} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","metadata":{"name":"Modal Link / Image"},"className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"metadata":{"name":"Title Group"},"className":"","layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"left","metadata":{"name":"Media Modal Title"},"className":"","fontFamily":"brand"} -->
        <p class="has-text-align-left has-brand-font-family">Media Modal</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->