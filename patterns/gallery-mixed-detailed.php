<?php
/**
 * Title: Mixed Media Popup - detailed.
 * Slug: flexline/gallery-mixed-detailed
 * Categories: galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"},"metadata":{"name":"Gallery Mixed Detailed"}} -->
<div class="wp-block-group">
    <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-3.jpg'; ?>" alt="Sample Image" class=""/></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small)">
        <!-- wp:heading {"textAlign":"left","fontSize":"medium"} -->
        <h2 class="wp-block-heading has-text-align-left has-medium-font-size">Media Title</h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small"} -->
        <p class="has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small"} -->
        <p class="has-x-small-font-size" style="line-height:1.3">Media Detail 2.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->