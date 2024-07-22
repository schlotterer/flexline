<?php

/**
 * Title: Text and Video.
 * Slug: flexline/text-video
 * Categories: flexline-modules
 */

namespace Flexlinetheme\flexlinetheme;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","bottom":"var:preset|spacing|x-large","left":"30px","top":"70px"},"margin":{"top":"0px"},"blockGap":"10px"}},"className":"welcome","layout":{"type":"constrained"},"metadata":{"name":"Text and Video Modal"}} -->
<div class="wp-block-group alignfull welcome" style="margin-top:0px;padding-top:70px;padding-right:30px;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:30px"><!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","style":{"typography":{"letterSpacing":"-1px"},"spacing":{"margin":{"bottom":"0px"}}},"className":"wp-block-heading","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-48-font-size" style="margin-bottom:0px;letter-spacing:-1px">Text and Video modal</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern takes advantage of Flexline's custom "Enable Media Modal" option on images to modal up a video in a modal.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=G1hKzCkywM8"} -->
            <figure class="wp-block-image aligncenter size-large is-style-shadow-light"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->