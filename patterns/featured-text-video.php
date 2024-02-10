<?php

/**
 * Title: Text and Video.
 * Slug: flexline/text-video
 * Categories: flexline-modules
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","bottom":"var:preset|spacing|x-large","left":"30px","top":"70px"},"margin":{"top":"0px"},"blockGap":"10px"}},"className":"welcome","layout":{"type":"constrained","wideSize":"","contentSize":""},"metadata":{"name":"Text and Video Popup"}} -->
<div class="wp-block-group alignfull welcome" style="margin-top:0px;padding-top:70px;padding-right:30px;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:30px"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","style":{"typography":{"letterSpacing":"-1px"},"spacing":{"margin":{"bottom":"0px"}}},"className":"wp-block-heading","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-48-font-size" style="margin-bottom:0px;letter-spacing:-1px">Text and Video popup</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"large"} -->
            <p class="has-text-align-left has-large-font-size">FlexLine is the ultimate WordPress theme for website builders.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=G1hKzCkywM8"} -->
            <figure class="wp-block-image aligncenter size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/placeholder-stringlights.gif'; ?>" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->