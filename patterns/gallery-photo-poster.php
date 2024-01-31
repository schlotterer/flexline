<?php
/**
 * Title: Gallery for photos using the Photo Poster format.
 * Slug: flexline/gallery-photo-poster
 * Categories: galleries
 */
?>
   <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery"}} -->
<div class="wp-block-group">
    <!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
    <figure class="wp-block-gallery has-nested-images columns-3 is-cropped">
        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-9.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-9.jpg'; ?>" alt="" class=""/></a><figcaption class="wp-element-caption">Image Caption</figcaption></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-7.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-7.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-1.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-1.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-8.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-8.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-6.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-6.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-5.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-5.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-4.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-4.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->

        <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
        <figure class="wp-block-image size-large"><a href="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-3.jpg'; ?>"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-3.jpg'; ?>" alt="" class=""/></a></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">Gallery Title</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->