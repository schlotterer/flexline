<?php

/**
 * Title: Feature Page - Cover 
 * Slug: flexline/feature-page-cover
 * Categories: flexline-modules, flexline-components
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Feature Page with cover image","categories":["flexline-components"],"patternName":"flexline/feature-page-cover"},"className":"is-style-card","layout":{"type":"constrained"},"enableGroupLink":true,"groupLinkURL":"/independent-living/floor-plans"} -->
<div class="wp-block-group is-style-card"><!-- wp:columns {"metadata":{"name":"Content Columns"},"className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"metadata":{"name":"Text Column"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text Group"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-link-color">This pattern can be used to tease site content. It uses a cover block and image to create visual interest and respond flexibly to variable content and breakpoints. You can also reverse the columns and choose if you want the image first on mobile in each use.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">View More →</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"stretch","metadata":{"name":"Image Column"}} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":186,"dimRatio":50,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Fill Image (Cover)"},"style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" />
                <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"150px","metadata":{"name":"Mobile View Space Holder"}} -->
                    <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->