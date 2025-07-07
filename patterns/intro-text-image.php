<?php

/**
 * Title: Intro Text and Image.
 * Slug: flexline/text-image
 * Categories: flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Text and Poster Gallery","categories":["flexline-modules"],"patternName":"flexline/text-poster-gallery"},"align":"full","className":"welcome","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome"><!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Text and Image Columns"},"className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Image</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","className":"","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern presets a columns block with some text and an Image. Don't forget, you can use the columns block "Reverse at Mobile" option to put the image above the text at mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":999,"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
            <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" style="aspect-ratio:4/3;object-fit:cover" /></a></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->