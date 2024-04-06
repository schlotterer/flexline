<?php

/**
 * Title: Gallery for photos using the Photo Poster format as a card.
 * Slug: flexline/gallery-photo-poster-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"},"enableGroupLink":true,"groupLinkURL":"#"} -->
<div class="wp-block-group is-style-default" style="min-height:100%"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"id":291,"sizeSlug":"full","linkDestination":"media"} -->
        <figure class="wp-block-image size-full"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-291" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":289,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-289" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":296,"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
        <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-296" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":268,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-268" /></a></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
    <p class="has-text-align-center has-display-font-family" style="text-transform:none">Poster Gallery Title</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->