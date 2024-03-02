<?php

/**
 * Title: Mixed Media Popup - detailed.
 * Slug: flexline/gallery-mixed-detailed
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Gallery Mixed Detailed Card"}} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback-small.webp'; ?>" alt="Sample Image" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
        <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
        <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
        <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->