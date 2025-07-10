<?php

/**
 * Title: Demo Patterns - Components Galleries
 * Slug: flexline/demo-patterns-components-galleries
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>Our <strong>Gallery Patterns</strong> are flexible building blocks for showcasing rich media — whether it’s photos, videos, or other embedded content. These patterns help you tell a more visual story and keep visitors engaged.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>Use these patterns to highlight portfolios, media libraries, product shots, or any collection of visuals. Each one is designed to be flexible and easy to adapt — just drop in your media, adjust the layout as needed, and give your audience a smooth, immersive experience.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#poster-gallery">Poster Gallery</a> | <a href="#video-modal">Video Modal</a> | <a href="#gallery-media-detailed">Gallery Media Detailed</a> | <a href="#gallery-media-download">Gallery Media w/ Download</a> | <a href="#modal-link-card">Modal Link Card</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Galleries Group"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="poster-gallery">Poster Gallery</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Poster Gallery"},"className":"is-style-dots"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-dots"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group group-link group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped poster-gallery"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:group {"metadata":{"name":"Title Container"},"className":"","layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","metadata":{"name":"Poster Gallery Title"},"className":"","style":{"typography":{"textTransform":"none","lineHeight":"1.1"}},"fontFamily":"display"} -->
                    <p class="has-text-align-center has-display-font-family" style="line-height:1.1;text-transform:none">Poster Gallery Title</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/e38d05ced34a4992adf99712e9dda11a?sid=516d7482-4da7-44b6-92e3-a9e16a06ab3f"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><img src="https://cdn.loom.com/sessions/thumbnails/e38d05ced34a4992adf99712e9dda11a-6e1a3e5e871f87db-full-play.gif" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="video-modal">Video Modal</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Media Modal"},"className":"is-style-dots"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-dots"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Video Modal","categories":["flexline-galleries"],"patternName":"flexline/gallery-video-card"},"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"groupLinkType":"modal_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://youtu.be/NsYHfdHTaGM"} -->
                <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"metadata":{"name":"Title Container"},"className":"","layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","metadata":{"name":"Video Title"},"className":"","fontFamily":"brand"} -->
                    <p class="has-text-align-center has-brand-font-family">Video Title</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/5dab5cacc2c44ba5999c657ba652756b?sid=7c032d01-31e9-400e-b966-2eecc7e6b3c6"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><img src="https://cdn.loom.com/sessions/thumbnails/5dab5cacc2c44ba5999c657ba652756b-79db7e1df624575e-full-play.gif" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="gallery-media-detailed">Gallery Media Detailed</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Gallery Mixed Detailed"},"className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Gallery Mixed Detailed","categories":["flexline-galleries"],"patternName":"flexline/gallery-mixed-detailed-card"},"className":"is-style-default","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"modal_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","metadata":{"name":"Modal Link / Image"},"className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
                <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"metadata":{"name":"Media Details"},"className":"","style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"align":"left","metadata":{"name":"Media Title"},"className":"","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"metadata":{"name":"Media Detail 1"},"className":"","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"metadata":{"name":"Media Detail 2"},"className":"","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/216005a682c24cfb982cdf1874dea97f?sid=ed612bd6-2e7e-47ad-a637-f9cdae076577"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><img src="https://cdn.loom.com/sessions/thumbnails/216005a682c24cfb982cdf1874dea97f-86a96d4dd2f5aaa8-full-play.gif" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="gallery-media-download">Gallery Media With Download</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Gallery Media Download Group"},"className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Gallery Media with Download","categories":["flexline-galleries"],"patternName":"flexline/gallery-media-download"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:image {"id":765,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","metadata":{"name":"Image with Modal Link"},"className":"has-custom-border is-style-default enable-modal","style":{"color":[],"border":[]},"enableModal":true,"modalMediaURL":"https://designfloorplan.com/plan/?PlanID=3624"} -->
                <figure class="wp-block-image size-large has-custom-border is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-765" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"metadata":{"name":"Text and Download"},"className":"","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
                <div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|x-small","bottom":"0"}}}} -->
                    <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"0","margin":{"top":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Title"},"className":"","style":{"typography":{"lineHeight":"1.1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"medium","fontFamily":"brand"} -->
                                <p class="has-text-align-left has-primary-color has-text-color has-link-color has-brand-font-family has-medium-font-size" style="line-height:1.1">Title</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"metadata":{"name":"Detail 1"},"className":"","style":{"typography":{"lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","fontSize":"x-small","fontFamily":"display"} -->
                                <p class="has-neutral-dark-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="line-height:1.3">Detail 1.a | Detail 1.b</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"metadata":{"name":"Detail 2"},"className":"","style":{"typography":{"lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","fontSize":"x-small","fontFamily":"display"} -->
                                <p class="has-neutral-dark-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="line-height:1.3">Detail 2</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"40px","metadata":{"name":"Download Column"},"className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
                        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:40px"><!-- wp:buttons {"metadata":{"name":"Download Button Group"},"className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
                            <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"metadata":{"name":"Download Button"},"className":"is-style-fill  flexline-icon-none","style":{"spacing":{"padding":{"left":"14px","right":"14px","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}},"border":{"radius":"200px"}},"fontSize":"x-large"} -->
                                <div class="wp-block-button is-style-fill  flexline-icon-none"><a class="wp-block-button__link has-x-large-font-size has-custom-font-size wp-element-button" href="https://storage.googleapis.com/jkvswo-prod-assets/uploads/ce638028-jkv_greatroomapartment_studio_442_rev.pdf" style="border-radius:200px;padding-top:var(--wp--preset--spacing--x-small);padding-right:14px;padding-bottom:var(--wp--preset--spacing--x-small);padding-left:14px" target="_blank" rel="noreferrer noopener">⤓</a></div>
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
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/375e895ced7441beaca739541d038554?sid=f0b67f70-e6d1-4d63-b15c-0380d1b5cd39"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><img src="https://cdn.loom.com/sessions/thumbnails/375e895ced7441beaca739541d038554-ebd7213859638578-full-play.gif" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="modal-link-card">Modal Link Card</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"name":"Gallery Modal - Wide","categories":["flexline-galleries"],"patternName":"flexline/gallery-media-card-wide"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image Column"},"className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Mixed Media Feature - Card"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
                <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":826,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"#"} -->
                    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-826" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":""} -->
                <h2 class="wp-block-heading">Modal Link Card</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":""} -->
                <p>This pattern has a headline and paragraph on one side and image with a media in a modal link</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-shadow-diffused enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/3be4cabf6d8b4d5e9ac095fcaa6da12b?sid=e17335dc-7c11-4d32-bf0e-cbdb3b92a9bf"} -->
    <figure class="wp-block-image aligncenter size-large is-style-shadow-diffused enable-modal" style="margin-top:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/3be4cabf6d8b4d5e9ac095fcaa6da12b-225821ec9ce62ee1-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->