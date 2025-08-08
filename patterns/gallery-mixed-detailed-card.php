<?php

/**
 * Title: Mixed Media Modal - detailed - card.
 * Slug: flexline/gallery-mixed-detailed-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Gallery Mixed Detailed"},"className":"is-style-default","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"modal_media"} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","metadata":{"name":"Modal Link / Image"},"className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"metadata":{"name":"Media Details"},"className":"","style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"align":"left","metadata":{"name":"Media Title"},"className":"","fontSize":"medium","fontFamily":"brand"} -->
        <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"metadata":{"name":"Media Detail 1"},"className":"","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
        <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"metadata":{"name":"Media Detail 2"},"className":"","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
        <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->