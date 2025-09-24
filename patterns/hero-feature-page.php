<?php

/**
 * Title: Feature Page Meta.
 * Slug: flexline/meta-feature-page
 * Categories: flexline-heroes
 * Block Types: core/template-part/header
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Feature Page Meta","categories":["flexline-heroes"],"patternName":"flexline/meta-feature-page"},"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":200,"metadata":{"name":"Featured Image Background"},"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
            <div class="wp-block-group alignwide has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Headlines and text"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xxx-large);margin-bottom:var(--wp--preset--spacing--xxx-large)"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"blockGap":"0"}},"textColor":"base","fontSize":"x-small","layout":{"type":"constrained","contentSize":"900px","wideSize":"1000px"}} -->
                <div class="wp-block-group has-base-color has-text-color has-link-color has-x-small-font-size"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                    <h1 class="wp-block-heading has-text-align-center is-style-eyebrow has-base-color has-text-color has-link-color">H1 - Eyebrow - SEO Headline</h1>
                    <!-- /wp:heading -->

                    <!-- wp:heading {"textAlign":"center","className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"0","left":"0"}}},"fontSize":"medium"} -->
                    <p class="has-text-align-center has-medium-font-size" style="margin-right:0;margin-left:0">Donec ullamcorper nulla non metus auctor fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->