<?php

/**
 * Title: Video Popup - Card.
 * Slug: flexline/gallery-video-card
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"0","bottom":"0"}}},"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Video Popup - Card"}} -->
<div class="wp-block-group is-style-card-padded" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://youtu.be/X35iJBkwQeU"} -->
    <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="Sample Image" class="wp-image-362" /></figure>
    <!-- /wp:image -->

    <!-- wp:paragraph {"align":"center","className":"is-style-default","fontFamily":"display"} -->
    <p class="has-text-align-center is-style-default has-display-font-family">Video Caption</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->