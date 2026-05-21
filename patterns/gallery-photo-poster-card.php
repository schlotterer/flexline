<?php

/**
 * Title: Gallery for photos using the Photo Poster format as a card.
 * Slug: flexline/gallery-photo-poster-card
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
<div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery <?php echo poster_gallery_pattern_attrs( array( 'columns' => 3, 'className' => 'poster-gallery', 'style' => array( 'layout' => array( 'selfStretch' => 'fill', 'flexSize' => null ) ) ) ); ?> -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped poster-gallery"><!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => 'is-style-default' ) ); ?> -->
        <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
        <!-- /wp:image -->

        <!-- wp:image <?php echo poster_gallery_image_pattern_attrs( array( 'sizeSlug' => 'large', 'linkDestination' => 'none', 'className' => '' ) ); ?> -->
        <figure class="wp-block-image size-large"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
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
