<?php

/**
 * Title: Text and Poster Gallery.
 * Slug: flexline/text-poster-gallery
 * Categories: flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Text and Poster Gallery","categories":["flexline-modules"],"patternName":"flexline/text-poster-gallery"},"align":"full","className":"welcome","style":{"spacing":{"padding":{"right":"30px","bottom":"var:preset|spacing|x-large","left":"30px","top":"70px"},"margin":{"top":"0px"},"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome" style="margin-top:0px;padding-top:70px;padding-right:30px;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:30px"><!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Poster Gallery</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern presets a columns block with some text and gallery set to Poster style. Don't forget, you can use the columns block "Reverse at Mobile" option to put the gallery above the text at mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Poster Gallery Column"}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"linkTo":"media","metadata":{"name":"Poster Gallery"},"enablePosterGallery":true} -->
            <figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->