<?php

/**
 * Title: Gallery for photos using the Photo Poster format as a card.
 * Slug: flexline/gallery-photo-poster-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card"},"className":"is-style-card-padded","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"constrained"},"groupLinkURL":"#"} -->
<div class="wp-block-group is-style-card-padded" style="min-height:100%"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fixed","flexSize":"250px"}},"enablePosterGallery":true} -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"id":893,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="A group of smiling seniors wearing party hats toast their champagne glasses" class="wp-image-893" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":892,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Three senior woman sit at a table with cake and toast their glasses" class="wp-image-892" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"id":891,"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="A group of seniors with wine glasses toast while a smiling elderly man holds a drink bottle" class="wp-image-891" /></a></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
    <p class="has-text-align-center has-display-font-family" style="text-transform:none">Poster Gallery</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->