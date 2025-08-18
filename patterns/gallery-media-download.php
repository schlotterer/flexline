<?php

/**
 * Title: Mixed Media Modal - detailed - with download.
 * Slug: flexline/gallery-media-download
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Gallery Media with Download"},"style":{"spacing":{"blockGap":"0"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
<div class="wp-block-group is-style-outlined"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","metadata":{"name":"Image with Modal Link"},"style":{"color":{},"border":{}},"className":"is-style-default","enableModal":true,"modalMediaURL":"https://designfloorplan.com/plan/?PlanID=3624"} -->
    <figure class="wp-block-image size-large has-custom-border is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"metadata":{"name":"Text and Download"},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
    <div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|x-small","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Text Group"},"style":{"spacing":{"blockGap":"0","margin":{"top":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-group" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Title"},"style":{"typography":{"lineHeight":"1.1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-primary-color has-text-color has-link-color has-brand-font-family has-medium-font-size" style="line-height:1.1">Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"metadata":{"name":"Detail 1"},"style":{"typography":{"lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-neutral-dark-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="line-height:1.3">Detail 1.a | Detail 1.b</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"metadata":{"name":"Detail 2"},"style":{"typography":{"lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-neutral-dark-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="line-height:1.3">Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"40px","metadata":{"name":"Download Column"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:40px"><!-- wp:buttons {"metadata":{"name":"Download Button Group"},"layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"metadata":{"name":"Download Button"},"style":{"spacing":{"padding":{"left":"14px","right":"14px","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}},"border":{"radius":"200px"}},"className":"is-style-fill","fontSize":"x-large"} -->
                    <div class="wp-block-button has-custom-font-size is-style-fill has-x-large-font-size"><a class="wp-block-button__link wp-element-button" href="https://storage.googleapis.com/jkvswo-prod-assets/uploads/ce638028-jkv_greatroomapartment_studio_442_rev.pdf" style="border-radius:200px;padding-top:var(--wp--preset--spacing--x-small);padding-right:14px;padding-bottom:var(--wp--preset--spacing--x-small);padding-left:14px" target="_blank" rel="noreferrer noopener">⤓</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->