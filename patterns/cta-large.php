<?php

/**
 * Title: CTA Large
 * Slug: flexline/cta-large
 * Categories: flexline-components, flexline-cta
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Large CTA Container"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Large CTA"},"align":"wide","className":"is-style-default","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"metadata":{"name":"Background Image"},"align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-189" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
            <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Group"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Large CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">This is an extra large CTA with a padding around it. This is often used for the main CTA on a page near the footer.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->