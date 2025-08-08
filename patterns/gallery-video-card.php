<?php

/**
 * Title: Video Modal.
 * Slug: flexline/gallery-video-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Video Modal"},"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"groupLinkType":"modal_media"} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://youtu.be/NsYHfdHTaGM"} -->
    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"metadata":{"name":"Title Container"},"className":"","layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","metadata":{"name":"Video Title"},"className":"","fontFamily":"brand"} -->
        <p class="has-text-align-center has-brand-font-family">Video Title</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->