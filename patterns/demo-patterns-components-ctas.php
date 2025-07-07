<?php

/**
 * Title: Demo Patterns - Components CTAs
 * Slug: flexline/demo-patterns-components-ctas
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"flexline-icon-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.1"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.1">Patterns: <a href="#call-to-action">CTA Box</a> | <a href="#sticky-cta">Sticky CTA</a> | <a href="#heroes">Page Link CTAs</a> | <a href="#page-link-ctas">CTA - Card with image</a> | <a href="#large-cta">Large CTA</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro Content Container"},"align":"full","className":"flexline-icon-none","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:details {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
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
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="cta-box">CTA Box</h3>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Box - text and button","categories":["flexline-cta"],"patternName":"flexline/cta-box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
            <h3 class="wp-block-heading">CTA Box</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":""} -->
            <p>Use this box with button in columns or in it's own row. The default headline is an h3 so make sure there is an h2 before this or change the headline to an h2 for accessibility.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"className":""} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Learn More</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"enable-modal is-style-shadow-diffused","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/539a0078dd3d475b976949819e3ba7fa?sid=6b1d8813-eb5c-4925-aff1-7521fce13ea8"} -->
        <figure class="wp-block-image size-large enable-modal is-style-shadow-diffused"><img src="https://cdn.loom.com/sessions/thumbnails/539a0078dd3d475b976949819e3ba7fa-303802e654d76273-full-play.gif" alt="" /></figure>
        <!-- /wp:image -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"metadata":{"name":"Sticky CTA Scroll Group"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:0"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="sticky-cta">Sticky CTA - Full Width</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"name":"CTA - Full Width"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary-light"}}}},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"50px","right":"50px"}},"position":{"type":"sticky","top":"0px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"},"shiftToTop":true} -->
    <div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:8px;padding-right:50px;padding-bottom:8px;padding-left:50px"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"70%","className":"flexline-hide-on-mobile","hideOnMobile":true} -->
            <div class="wp-block-column is-vertically-aligned-center flexline-hide-on-mobile" style="flex-basis:70%"><!-- wp:paragraph {"align":"left","className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"medium","fontFamily":"brand"} -->
                <p class="has-text-align-left has-brand-font-family has-medium-font-size" style="line-height:1.5">This CTA creates a full width feature and button that can be sticky.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-fill  flexline-icon-open-modal","fontSize":"small","iconType":"open-modal"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill  flexline-icon-open-modal"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="http://alpha.websitesforseniorliving.com/schedule-a-tour/">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"className":""} -->
    <div class="wp-block-columns"><!-- wp:column {"width":"33.33%","className":""} -->
        <div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph {"className":""} -->
            <p>The Full width CTA is sticky by default. When a pattern/block is sticky it will stay visible stuck to the top of its container until the container is fully scrolled away. If left in the root of the content it will stay at the top until you reach the footer.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"66.66%","className":""} -->
        <div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/ae084e38d51048b4b46d9e368b6abe85?sid=ac96c7f0-0e25-4ff4-80cd-e2590cdfa396"} -->
            <figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ae084e38d51048b4b46d9e368b6abe85-e2f3553d8e77692d-full-play.gif" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:group {"metadata":{"name":"Page CTA Container"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
        <h3 class="wp-block-heading" id="page-link-ctas">Page Link CTAs - Light and Dark</h3>
        <!-- /wp:heading -->

        <!-- wp:group {"metadata":{"name":"Page CTA Dark","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar-dark"},"className":"group-link group-link-type-none is-style-shadow-light","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"#"} -->
        <div class="wp-block-group group-link group-link-type-none is-style-shadow-light has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"lock":{"move":true,"remove":true},"metadata":{"name":"CTA Content Columns"},"className":"","style":{"spacing":{"blockGap":{"left":"0"},"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
            <div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><!-- wp:column {"verticalAlignment":"center","width":"","templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"Title and Text Column"},"className":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Title and Text Group"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"border":{"radius":{"topLeft":"5px","topRight":"0px","bottomLeft":"5px","bottomRight":"0px"}}},"layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                    <div class="wp-block-group" style="border-top-left-radius:5px;border-top-right-radius:0px;border-bottom-left-radius:5px;border-bottom-right-radius:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":""} -->
                        <h2 class="wp-block-heading">Page Link</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"125px","templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"Learn More"},"className":"is-style-hide-on-mobile"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Group"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}},"border":{"top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"0px","style":"none"},"left":{"color":"var:preset|color|base","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                    <div class="wp-block-group" style="border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-color:var(--wp--preset--color--base);border-left-width:1px;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"900","textTransform":"uppercase"}},"fontSize":"small","fontFamily":"display"} -->
                        <p class="has-text-align-center has-display-font-family has-small-font-size" style="font-style:normal;font-weight:900;line-height:1.1;text-transform:uppercase">Learn<br>More</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
        <div class="wp-block-group group-link group-link-type-none is-style-shadow-light has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
            <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.1">Learn<br>More</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->

        <!-- wp:spacer {"height":"30px","className":""} -->
        <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/b37f06884117455ea984a87b5b7b9932?sid=d3898491-03b8-4ab5-a460-67499ac28fe7"} -->
        <figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused"><img src="https://cdn.loom.com/sessions/thumbnails/90e3702f65e241358bc198d1832df2cd-31cf39abb737553b-full-play.gif" alt="" /></figure>
        <!-- /wp:image -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="cta-card-with-image">CTA - Card with image, heading, text and button</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"name":"CT - Card with image, heading, text, button","categories":["flexline-cta"],"patternName":"flexline/cta-image-text-button"},"className":"stacked is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group stacked is-style-default" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"sizeSlug":"full","linkDestination":"none","className":""} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-6001" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":"15px","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:0;padding-bottom:var(--wp--preset--spacing--small);padding-left:0"><!-- wp:heading {"className":"","fontSize":"large"} -->
                <h2 class="wp-block-heading has-large-font-size">CTA - Card with image, heading, text, button</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}}} -->
                <p style="line-height:1.5">This CTA incorporates an image on the left and stacks responsively.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":""} -->
                <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Learn More</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-shadow-diffused enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/90e3702f65e241358bc198d1832df2cd?sid=ffda84da-5cd2-42f7-a1bb-5d69714f38e0"} -->
    <figure class="wp-block-image aligncenter size-large is-style-shadow-diffused enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ae084e38d51048b4b46d9e368b6abe85-e2f3553d8e77692d-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="large-cta">Large CTA</h3>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Large CTA Container","categories":["flexline-cta"],"patternName":"flexline/cta-large"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Large CTA"},"align":"wide","className":"is-style-default","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"metadata":{"name":"Background Image"},"align":"wide","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide"><img class="wp-block-cover__image-background wp-image-189" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Group"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Large CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">This is an extra large CTA with a padding around it. This is often used for the main CTA on a page near the footer.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"className":"","layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","className":"flexline-icon-none"} -->
                        <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
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

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-light","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/0f681db75e8d40d8bbd0d8ba52403f7a?sid=f4c1e82c-a42f-4080-b049-723b0f397968"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-light"><img src="https://cdn.loom.com/sessions/thumbnails/0f681db75e8d40d8bbd0d8ba52403f7a-6c6d3fea317c4c2f-full-play.gif" alt="" /></figure>
<!-- /wp:image -->