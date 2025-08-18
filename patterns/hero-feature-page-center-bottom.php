<?php

/**
 * Title: Feature Page Meta Center Bottom.
 * Slug: flexline/meta-feature-page-center-bottom
 * Categories: flexline-heroes
 * Block Types: core/template-part/header
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Feature Page Meta - bottom centered."},"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.53,"y":0.45},"minHeight":200,"isDark":false,"metadata":{"name":"Featured Image Cover"},"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":{}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull is-light" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Stack"},"style":{"dimensions":{"minHeight":"425px"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
            <div class="wp-block-group" style="min-height:425px"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                <div class="wp-block-group alignwide has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"metadata":{"name":"SEO and Creative Headlines"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"blockGap":"0"}},"textColor":"base","fontSize":"x-small","layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
                    <div class="wp-block-group has-base-color has-text-color has-link-color has-x-small-font-size"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-eyebrow"} -->
                        <h1 class="wp-block-heading has-text-align-center is-style-eyebrow">SEO Eyebrow Headline</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"textAlign":"center","className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                        <h2 class="wp-block-heading has-text-align-center is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">Creative Headline</h2>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->