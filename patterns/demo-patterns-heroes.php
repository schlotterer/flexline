<?php

/**
 * Title: Demo Patterns - Heroes
 * Slug: flexline/demo-patterns-heroes
 * Categories: flexline-demos
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.1"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.1">Patterns: <a href="#call-to-action">Home Hero</a> | <a href="#sticky-cta">Hero Split</a> | <a href="#heroes">Feature Page Bottom</a> | <a href="#page-link-ctas">Feature Page Centered</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro Content Container"},"align":"full","className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:details {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
    <details class="wp-block-details">
        <summary><strong>What they are</strong></summary><!-- wp:paragraph {"className":""} -->
        <p>Components bundle a handful of core blocks (Button, Image, Group, etc.) plus theme styles into a reusable unit—e.g., a <strong>Video Pop Card</strong> that opens a lightbox, a <strong>Floor-Plan Download</strong> with icon and price tag, or a <strong>Testimonial Badge</strong> with author photo.</p>
        <!-- /wp:paragraph -->
    </details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
    <details class="wp-block-details">
        <summary><strong><strong>Why they matter</strong></strong></summary><!-- wp:paragraph {"className":""} -->
        <p>They’re small enough to drop anywhere—inside a Column, alongside a paragraph, or nested inside a larger Module—without breaking your grid or typography.</p>
        <!-- /wp:paragraph -->
    </details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
    <details class="wp-block-details">
        <summary><strong><strong>How they differ from other pattern types</strong></strong></summary><!-- wp:table {"className":""} -->
        <figure class="wp-block-table">
            <table class="has-fixed-layout">
                <thead>
                    <tr>
                        <th>Pattern Type</th>
                        <th>Primary Purpose</th>
                        <th>Typical Example</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Component</strong></td>
                        <td>One functional nugget</td>
                        <td>Video pop card</td>
                    </tr>
                    <tr>
                        <td><strong>Module</strong></td>
                        <td>Curated row/cluster of content</td>
                        <td>Logo strip carousel</td>
                    </tr>
                    <tr>
                        <td><strong>Hero</strong></td>
                        <td>Above-the-fold attention grabber; usually full-viewport height</td>
                        <td>Big headline + background video</td>
                    </tr>
                    <tr>
                        <td><strong>Section</strong></td>
                        <td>Full page slice that combines Modules and Components</td>
                        <td>Services overview with heading &amp; 3 feature cards</td>
                    </tr>
                    <tr>
                        <td><strong>Template Part</strong></td>
                        <td>Reusable site chrome shared across many templates</td>
                        <td>Header, Footer, Off-canvas menu</td>
                    </tr>
                </tbody>
            </table>
        </figure>
        <!-- /wp:table -->
    </details>
    <!-- /wp:details -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="home-hero">Home Hero</h3>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Home Hero","categories":["flexline-heroes"],"patternName":"flexline/hero-home"},"align":"full","className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":507,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeightUnit":"px","metadata":{"name":"Hero Background"},"align":"full","className":"no-lazy-load","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull no-lazy-load" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><img class="wp-block-cover__image-background wp-image-507" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Row"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"metadata":{"name":"Content Width Container"},"className":"","layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group has-link-color"><!-- wp:heading {"level":1,"className":"is-style-eyebrow"} -->
                        <h1 class="wp-block-heading is-style-eyebrow">H1 - Eyebrow - SEO Headline</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"lineHeight":"1"}},"textColor":"base"} -->
                        <h2 class="wp-block-heading is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;line-height:1">H2 - Creative Headline</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"is-style-default"} -->
                        <p class="is-style-default">Heroes play a crucial role in grabbing attention and establishing the ambiance. The Flexline theme gives you the tools to craft compelling hero sections designed to captivate and meet the specific demands of the senior living audience.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"metadata":{"name":"Calls to action"},"className":""} -->
                    <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none"} -->
                        <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#quickForm">Contact Us</a></div>
                        <!-- /wp:button -->

                        <!-- wp:button {"textColor":"base","className":"is-style-outline enable-modal  flexline-icon-video-play","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"iconType":"video-play","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                        <div class="wp-block-button is-style-outline enable-modal  flexline-icon-video-play"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="https://www.loom.com/embed/56f37570c2854166ab3d4da0e5ad32f6?sid=74b6db6a-c0e1-47e7-9db9-0b560a002b1f">Watch video</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"metadata":{"name":"Scroll-to button"},"className":"flexline-content-shift flexline-content-shift-above flexline-content-shift-up","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"useContentShift":true,"shiftUp":"18px","shiftToTop":true} -->
    <div id="home-hero-next" class="wp-block-group flexline-content-shift flexline-content-shift-above flexline-content-shift-up" style="margin-top:0;margin-bottom:0"><!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"}} -->
        <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","className":"animated bounce delay-2s slow  flexline-icon-none","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
            <div class="wp-block-button animated bounce delay-2s slow  flexline-icon-none"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"30px","className":""} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/56f37570c2854166ab3d4da0e5ad32f6?sid=74b6db6a-c0e1-47e7-9db9-0b560a002b1f"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/56f37570c2854166ab3d4da0e5ad32f6-80b332077323c194-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="hero-split">Hero Split</h3>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Hero - Split","categories":["flexline-heroes"],"patternName":"flexline/hero-split"},"align":"full","className":"is-style-dots","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-dots"><!-- wp:columns {"align":"full","className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
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
        <div class="wp-block-column is-vertically-aligned-stretch has-primary-background-color has-background" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":657,"dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.95,"y":0.54},"minHeight":100,"minHeightUnit":"%","className":"","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:100%"><img class="wp-block-cover__image-background wp-image-657" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:95% 54%" data-object-fit="cover" data-object-position="95% 54%" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span>
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

    <!-- wp:group {"metadata":{"name":"Scroll-to button"},"className":"flexline-content-shift flexline-content-shift-above flexline-content-shift-up","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"useContentShift":true,"shiftUp":"18px","shiftToTop":true} -->
    <div id="hero-split-next" class="wp-block-group flexline-content-shift flexline-content-shift-above flexline-content-shift-up" style="margin-top:0;margin-bottom:0"><!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"}} -->
        <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","className":"animated bounce delay-2s slow  flexline-icon-none","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
            <div class="wp-block-button animated bounce delay-2s slow  flexline-icon-none"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/e3b0ad3c624543d098e452d5ab9e29d8?sid=61586abe-8b2e-4bbc-b67e-d1362d365a5d"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/e3b0ad3c624543d098e452d5ab9e29d8-a1d44ec26ab4bc1b-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="feature-page-bottom">Feature Page with Meta - Bottom Centered</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This hero uses the page featured image by default. It can be replaced but for use in templates we have this defaulting to the featured image.<br>NOTE: These include the breadcrumbs block from <a href="https://wordpress.org/plugins/wordpress-seo/">Yoast SEO</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Feature Page Meta - bottom centered.","categories":["flexline-heroes"],"patternName":"flexline/meta-feature-page-center-bottom"},"align":"full","className":"","style":{"spacing":{"margin":{"bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.53,"y":0.45},"minHeight":200,"metadata":{"name":"Featured Image Cover"},"align":"full","className":"no-lazy-load","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull no-lazy-load" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Stack"},"className":"","style":{"dimensions":{"minHeight":"425px"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
            <div class="wp-block-group" style="min-height:425px"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"align":"wide","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                <div class="wp-block-group alignwide has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs {"className":""} /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"metadata":{"name":"SEO and Creative Headlines"},"className":"","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:group {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"blockGap":"0"}},"textColor":"base","fontSize":"x-small","layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
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

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/cc6cdb749f284629842eed0d34f7c2a0?sid=d06b20a8-b875-43f3-9956-d91a43985fe0"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/cc6cdb749f284629842eed0d34f7c2a0-fcc0a8ebbba50720-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="feature-page-centered">Feature Page with Meta - Centered</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This hero uses the page featured image by default. It can be replaced but for use in templates we have this defaulting to the featured image.<br>NOTE: These include the breadcrumbs block from <a href="https://wordpress.org/plugins/wordpress-seo/">Yoast SEO</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Feature Page Meta","categories":["flexline-heroes"],"patternName":"flexline/meta-feature-page"},"align":"full","className":"","style":{"spacing":{"margin":{"bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":200,"metadata":{"name":"Featured Image Background"},"align":"full","className":"no-lazy-load","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull no-lazy-load" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"align":"wide","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
            <div class="wp-block-group alignwide has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs {"className":""} /--></div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Headlines and text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xxx-large);margin-bottom:var(--wp--preset--spacing--xxx-large)"><!-- wp:group {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"blockGap":"0"}},"textColor":"base","fontSize":"x-small","layout":{"type":"constrained","contentSize":"900px","wideSize":"1000px"}} -->
                <div class="wp-block-group has-base-color has-text-color has-link-color has-x-small-font-size"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                    <h1 class="wp-block-heading has-text-align-center is-style-eyebrow has-base-color has-text-color has-link-color">H1 - Eyebrow - SEO Headline</h1>
                    <!-- /wp:heading -->

                    <!-- wp:heading {"textAlign":"center","className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"","style":{"spacing":{"margin":{"right":"0","left":"0"}}},"fontSize":"medium"} -->
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

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/1e5abc0ca7a14332853da5f9b7d29b22?sid=4fb9fa78-5cb5-497c-a21a-8151acef7a76"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/1e5abc0ca7a14332853da5f9b7d29b22-7500bbd9b3d0a39d-full-play.gif" /></figure>
<!-- /wp:image -->