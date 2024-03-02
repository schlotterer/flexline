<?php

/**
 * Title: Mixed Media Popup - Card.
 * Slug: flexline/gallery-mixed-simple-card
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Mixed Media Feature - Card"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
    <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback-small.webp'; ?>" alt="Sample Image" /></figure>
    <!-- /wp:image -->

    <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
    <p class="has-text-align-left has-brand-font-family">Media Popup</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->