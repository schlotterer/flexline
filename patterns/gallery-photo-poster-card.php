<?php

/**
 * Title: Gallery for photos using the Photo Poster format as a card.
 * Slug: flexline/gallery-photo-poster-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"enableGroupLink":true,"groupLinkURL":"#"} -->
<div class="wp-block-group group-link group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped poster-gallery"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
        <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->

    <!-- wp:group {"metadata":{"name":"Title Container"},"className":"","layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","metadata":{"name":"Poster Gallery Title"},"className":"","style":{"typography":{"textTransform":"none","lineHeight":"1.1"}},"fontFamily":"display"} -->
        <p class="has-text-align-center has-display-font-family" style="line-height:1.1;text-transform:none">Poster Gallery Title</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->