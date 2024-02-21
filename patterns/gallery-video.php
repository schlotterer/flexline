<?php

/**
 * Title: Video Popup.
 * Slug: flexline/gallery-video
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"},"metadata":{"name":"Video Popup"}} -->
<div class="wp-block-group"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://youtu.be/X35iJBkwQeU"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.webp'; ?>" alt="Sample Image" class="wp-image-362" /></figure>
    <!-- /wp:image -->

    <!-- wp:paragraph {"align":"center","fontFamily":"display"} -->
    <p class="has-text-align-center has-display-font-family">Video Caption</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->