<?php

/**
 * Title: Hero for Home Page - Split ( no breadcrumbs ).
 * Slug: flexline/hero-split
 * Categories: flexline-heroes
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Hero - Split","categories":["flexline-heroes"],"patternName":"flexline/hero-split"},"align":"full","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"align":"full","className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns alignfull is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"0","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:var(--wp--preset--spacing--medium);flex-basis:50%"><!-- wp:group {"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:spacer {"height":"0px","className":"flexline-hide-on-tablet flexline-hide-on-mobile","style":{"layout":{"selfStretch":"fixed","flexSize":"60px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"hideOnTablet":true,"hideOnMobile":true} -->
                <div style="margin-top:0;margin-bottom:0;height:0px" aria-hidden="true" class="wp-block-spacer flexline-hide-on-tablet flexline-hide-on-mobile"></div>
                <!-- /wp:spacer -->

                <!-- wp:group {"className":"","layout":{"type":"constrained","contentSize":"570px"}} -->
                <div class="wp-block-group"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":1,"className":"is-style-eyebrow"} -->
                        <h1 class="wp-block-heading is-style-eyebrow">H1 SEO Eyebrow</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"className":"is-style-creative","style":{"typography":{"lineHeight":"1"}},"fontSize":"max-72"} -->
                        <h2 class="wp-block-heading is-style-creative has-max-72-font-size" style="line-height:1">H2 Creative Headline - Aenean lacinia bibendum nulla sed consectetur.</h2>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph {"className":""} -->
                    <p>Heroes play a crucial role in grabbing attention and establishing the ambiance. The Flexline theme gives you the tools to craft compelling hero sections designed to captivate and meet the specific demands of the senior living audience.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:spacer {"height":"0px","className":"flexline-hide-on-tablet flexline-hide-on-mobile","style":{"layout":{"selfStretch":"fixed","flexSize":"10px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"hideOnTablet":true,"hideOnMobile":true} -->
                <div style="margin-top:0;margin-bottom:0;height:0px" aria-hidden="true" class="wp-block-spacer flexline-hide-on-tablet flexline-hide-on-mobile"></div>
                <!-- /wp:spacer -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"","backgroundColor":"primary"} -->
        <div class="wp-block-column is-vertically-aligned-stretch has-primary-background-color has-background" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.95,"y":0.54},"minHeight":100,"minHeightUnit":"%","className":"","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:100%"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:95% 54%" data-object-fit="cover" data-object-position="95% 54%" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"225px","className":""} -->
                    <div style="height:225px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:pattern {"slug":"flexline/button-scroll-to"} /-->

</div>
<!-- /wp:group -->

