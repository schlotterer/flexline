<?php

/**
 * Title: Mixed Media Popup - detailed - outlined.
 * Slug: flexline/gallery-mixed-detailed-outlined
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Gallery Mixed Detailed Outlined"}} -->
<div class="wp-block-group is-style-outlined"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
    <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
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