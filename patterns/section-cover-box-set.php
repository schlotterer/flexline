<?php

/**
 * Title: Section with cover boxes to highlight content and provide links.
 * Slug: flexline/section-cover-boxes
 * Categories: flexline-sections
 */

namespace Flexlinetheme\flexlinetheme;
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Featured Section"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":356,"hasParallax":true,"dimRatio":90,"overlayColor":"primary","align":"full","style":{"color":{"duotone":["#000000","#ffffff"]},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div role="img" class="wp-block-cover__image-background wp-image-356 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div>
        <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-48-font-size">Feature Section</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
            <p class="has-text-align-center is-style-text-shadow">This pattern sets up a background with a cover block to feature sections of content. In this case we're using the Feature Page with cover image pattern as the feature.</p>
            <!-- /wp:paragraph -->

            <!-- wp:pattern {"slug":"flexline/feature-page-cover"} /-->
            <!-- wp:pattern {"slug":"flexline/feature-page-cover"} /-->

        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->