<?php

/**
 * Title: Feature Image Links
 * Slug: flexline/feature-image-links
 * Categories: flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Feature Image Links"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}},"className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-max-48-font-size">Feature Image Links</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>This component uses a gallery block to create images as links in a grid next a headline and text. Use the columns "reverse on mobile" style variation to choose to which content shows first on mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","align":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}}} -->
            <figure class="wp-block-gallery aligncenter has-nested-images columns-2 is-cropped"><!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-style-card"} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|secondary"}},"className":"is-style-card"} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|alternate"}},"className":"is-style-card"} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|neutral-dark"}},"className":"is-style-card"} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->