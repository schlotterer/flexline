<?php

/**
 * Title: Intro Text and Video.
 * Slug: flexline/text-video
 * Categories: flexline-modules
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Text and Video Modal","categories":["flexline-modules"],"patternName":"flexline/text-video"},"align":"full","className":"welcome","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome"><!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Video modal</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern takes advantage of FlexLine's custom "Enable Media Modal" option on images to modal up a video in a modal.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"is-style-shadow-light","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/5dab5cacc2c44ba5999c657ba652756b?sid=7971ecc5-3c30-47e0-8038-2f5d683800b1"} -->
            <figure class="wp-block-image aligncenter size-large is-style-shadow-light"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->