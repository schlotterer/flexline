<?php

/**
 * Title: Gallery for photos using the Photo Poster format.
 * Slug: flexline/gallery-photo-poster
 * Categories: flexline-components, flexline-galleries
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery"}} -->
<div class="wp-block-group"><!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-shadow-light"} -->
        <figure class="wp-block-image size-large is-style-shadow-light"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="" /></a></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
    <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->