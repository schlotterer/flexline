<?php

/**
 * Title: Video Popup - Card.
 * Slug: flexline/gallery-video-card
 * Categories: flexline-components, flexline-galleries
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Popup - Card"},"groupLinkType":"popup_media"} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
    <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
    <p class="has-text-align-center has-brand-font-family">Video Caption</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->