<?php

/**
 * Title: Demo Patterns - Modules
 * Slug: flexline/demo-patterns-modules
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p><strong>Heroes</strong> are the bold, eye-catching sections at the top of a page that grab your visitor’s attention and set the tone for your content. They’re designed to showcase your most important message, image, or call to action right up front.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>This page collects all of our hero patterns in one place, with videos to show how they work in real layouts. Use these demos to explore different hero styles, see how they adapt on various screen sizes, and choose the pattern that best fits your content.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#page-intro-variations">Page Intro Variations</a> | <a href="#feature-Image-Links">Feature Image Links</a> | <a href="#feature-Page">Feature Page</a> | <a href="#sticky-post-feature">Sticky Post Feature</a> | <a href="#page-link-ctas">Column Rows</a> | <a href="#Section-Gallery">Section Gallery</a> | <a href="http://Gallery-by-Title-small">Gallery next to Title</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="page-intro-variations">Page Intro Variations</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The page intro patters are set up to help you get going quickly, there is a pattern for intros with an image, a gallery, or a video modal.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Text and Poster Gallery","categories":["flexline-modules"],"patternName":"flexline/text-image"},"align":"full","className":"welcome","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome"><!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Text and Image Columns"},"className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Poster Gallery</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","className":"","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern presets a columns block with some text and an Image. Don't forget, you can use the columns block "Reverse at Mobile" option to put the image above the text at mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":999,"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
            <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" style="aspect-ratio:4/3;object-fit:cover" /></a></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text and Poster Gallery","categories":["flexline-modules"],"patternName":"flexline/text-poster-gallery"},"align":"full","className":"welcome","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome"><!-- wp:columns {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Poster Gallery</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","className":"","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern presets a columns block with some text and gallery set to Poster style. Don't forget, you can use the columns block "Reverse at Mobile" option to put the gallery above the text at mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Poster Gallery Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"linkTo":"media","metadata":{"name":"Poster Gallery"},"className":"poster-gallery","enablePosterGallery":true} -->
            <figure class="wp-block-gallery has-nested-images columns-default is-cropped poster-gallery"><!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text and Video Modal","categories":["flexline-modules"],"patternName":"flexline/text-video"},"align":"full","className":"welcome","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull welcome"><!-- wp:columns {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-36-font-size" style="margin-bottom:0px">Text and Video modal</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","className":"","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern takes advantage of Flexline's custom "Enable Media Modal" option on images to modal up a video in a modal.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"is-style-shadow-light enable-modal","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=G1hKzCkywM8"} -->
            <figure class="wp-block-image aligncenter size-large is-style-shadow-light enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/ee1c9f2c778040869684a7d42b5c44fc?sid=c71b8a3e-f125-4618-a884-61ab905308f8"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ee1c9f2c778040869684a7d42b5c44fc-d6b12d998bcddf68-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="feature-Image-Links">Feature Image Links</h3>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Feature Image Links","categories":["flexline-modules"],"patternName":"flexline/feature-image-links"},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":"","fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-max-36-font-size">Feature Image Links</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":""} -->
            <p>This component uses a gallery block to create images as links in a grid next a headline and text. Use the columns "reverse on mobile" style variation to choose to which content shows first on mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Image Links Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","metadata":{"name":"Gallery with Links"},"align":"center","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}}} -->
            <figure class="wp-block-gallery aligncenter has-nested-images columns-2 is-cropped"><!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|primary"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|secondary"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|alternate"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|neutral-dark"}}} -->
                <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-999" /></a>
                    <figcaption class="wp-element-caption">Page Link Image</figcaption>
                </figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/5ee235f46510467f9c3d68fbae8a7d3b?sid=c4093d7d-d56b-4140-aa1e-78d2f4e6e699"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/5ee235f46510467f9c3d68fbae8a7d3b-a0b897b891122823-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Feature Page with Cover Wrapper"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="feature-Page">Feature Page</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"name":"Feature Page with cover image","categories":["flexline-modules"],"patternName":"flexline/feature-page-cover"},"className":"is-style-card group-link-type-none","layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-card group-link-type-none"><!-- wp:columns {"metadata":{"name":"Content Columns"},"className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
        <div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
            <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                    <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                    <p class="has-contrast-color has-text-color has-link-color">This pattern can be used to tease site content. It uses a cover block and image to create visual interest and respond flexibly to variable content and breakpoints. You can also reverse the columns and choose if you want the image first on mobile in each use.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                    <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button {"className":"enable-modal  flexline-icon-internal-link","iconType":"internal-link","enableModal":true} -->
                        <div class="wp-block-button enable-modal  flexline-icon-internal-link"><a class="wp-block-button__link wp-element-button" href="#">View More</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"stretch","metadata":{"name":"Image Column"},"className":""} -->
            <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":186,"dimRatio":50,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.25,"y":0.51000000000000001},"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Fill Image (Cover)"},"className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"150px","metadata":{"name":"Mobile View Space Holder"},"className":""} -->
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

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/fe0fc616d2d14aa1bd25337b71e12ebd?sid=7b14593c-dd07-452b-a3f7-76733fa3305b"} -->
    <figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/fe0fc616d2d14aa1bd25337b71e12ebd-66fd7e01e88bf61e-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="sticky-post-feature">Sticky Post Feature</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This pattern is designed to feature a single "sticky" post. This can be dropped into to any page.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Sticky Post Feature","categories":["flexline-modules"],"patternName":"flexline/posts-sticky-feature"},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","className":"","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"className":"","layout":{"type":"default","columnCount":3}} -->
        <!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"className":"is-style-outlined","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-outlined has-contrast-color has-text-color has-link-color"><!-- wp:columns {"className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
            <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch","className":""} -->
                <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","isDark":false,"className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"default"}} -->
                    <div class="wp-block-cover is-light" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-0 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
                            <p class="has-text-align-center has-large-font-size"></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:spacer {"height":"150px","className":""} -->
                            <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

                        <!-- wp:post-title {"isLink":true,"className":""} /-->

                        <!-- wp:post-excerpt {"className":""} /-->

                        <!-- wp:read-more {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontFamily":"display"} /-->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/6bdc68b4ee104dcea8b3b727e7bd9c15?sid=329838ac-25f4-4bb2-9756-0b1acfd14855"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/6bdc68b4ee104dcea8b3b727e7bd9c15-88881c4779b63eea-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Columns with Multiple rows wrapper"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="Columns-with-multiple-rows">Columns with multiple rows</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>This patterns is designed to give a fast start to responsive grid type layout using columns.</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"metadata":{"name":"Columns with multiple rows","categories":["flexline-modules"],"patternName":"flexline/columns-multirow"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:columns {"className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":""} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                    <h3 class="wp-block-heading">Info Box</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                    <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/a21a7b37f4234e43a51bd546633b0670?sid=a177844e-a695-4476-8050-c3856c07ec49"} -->
    <figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/a21a7b37f4234e43a51bd546633b0670-f0e83fec81383f24-full-play.gif" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Section-Gallery">Section Gallery</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This patter uses a grid block to add a responsive grid to support many items.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Section Gallery","categories":["flexline-modules"],"patternName":"flexline/section-gallery"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Grid of gallery components."},"align":"wide","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","minimumColumnWidth":"300px"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

        <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

        <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

        <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

        <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

        <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/b444cc9536b94f839ff9cfd6eb499573?sid=c02dd3b3-cba1-4639-b5df-6a686db3d1ce"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/b444cc9536b94f839ff9cfd6eb499573-c64ac6b5a1a3131f-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Gallery-by-Title-small">Gallery next to Title ( small )</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This custom layout combines columns and grids for interesting and flexible group of content. By default it comes with Poster Galleries but you could also use Video Modals or the Detailed media modals.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Gallery by Title Small","categories":["flexline-modules"],"patternName":"flexline/module-gallery-by-title-small"},"className":"is-style-card","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card has-neutral-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:columns {"metadata":{"name":"Text and Galleries Columns"},"align":"full","className":"","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"stretch","width":"35%","metadata":{"name":"Text Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":356,"alt":"Sample Image","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Container / Background"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"is-style-text-shadow","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"max-48"} -->
                    <h2 class="wp-block-heading is-style-text-shadow has-max-48-font-size" style="font-style:normal;font-weight:500">Exciting new gallery layout!</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":""} -->
                    <p>Gallery layout with the headline on the left with the "Card" style variation set on the containing block.</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"65%","metadata":{"name":"Galleries Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%"><!-- wp:group {"metadata":{"name":"Galleries Container"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","minimumColumnWidth":"250px"}} -->
                <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
                    <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

                    <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
                    <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

                    <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
                    <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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

                    <!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card","categories":["flexline-components","flexline-galleries"],"patternName":"flexline/gallery-photo-poster-card"},"className":"group-link-type-none is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkURL":"#"} -->
                    <div class="wp-block-group group-link-type-none is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
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
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/571c362e2cc34b2eac1fad6c37740ffd?sid=2dfcfbf0-b551-417b-89f7-c1636dbcdd37"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/571c362e2cc34b2eac1fad6c37740ffd-98d44188b3bac706-full-play.gif" /></figure>
<!-- /wp:image -->