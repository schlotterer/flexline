<?php

/**
 * Title: Intro Text and Feature Image Links
 * Slug: flexline/feature-image-links
 * Categories: flexline-modules
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Feature Image Links","categories":["flexline-modules"],"patternName":"flexline/feature-image-links"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Text Column"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-max-36-font-size">Feature Image Links</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>This component uses a gallery block to create images as links in a grid next a headline and text. Use the columns "reverse on mobile" style variation to choose to which content shows first on mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Image Links Column"}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","metadata":{"name":"Gallery with Links"},"align":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}}} -->
            <figure class="wp-block-gallery aligncenter has-nested-images columns-2 is-cropped"><!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|alternate"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|neutral-dark"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="" /></a>
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