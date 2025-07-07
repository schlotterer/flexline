<?php

/**
 * Title: Demo Patterns - Components Misc.
 * Slug: flexline/demo-patterns-components-misc
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.1"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.1">Patterns: <a href="#call-to-action">Scroll-to Button</a> | <a href="#info-box">Info Box</a> | <a href="#heroes">Pricing Tables</a> | <a href="#team-leadership">Team Leadership</a> | <a href="#team-member">Team Member</a> | <a href="#testimonials">Testimonials</a> | <a href="#plethora-tabs">Plethora Tabs</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro Content Container"},"align":"full","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:details {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
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
<h3 class="wp-block-heading" id="scroll-to-button">Scroll-to Button</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The <strong>Scroll-to Button</strong> provides a simple way for users to scroll to the next section of the page. By default, the button targets its own position, and it uses a negative margin to remove itself from the normal document flow. This ensures it does not add unwanted spacing between sections.<br>The negative margin behavior is controlled by <strong>Flexline’s Content Shift</strong> options and can be adjusted as needed to fine-tune spacing.<br>Additionally, you can configure the button to scroll to a specific ID or anchor elsewhere on the page, rather than its default behavior of scrolling to itself.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Scroll-to - previous content"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"bottom":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-background-color has-background" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","className":""} -->
    <p class="has-text-align-center">Previous section content</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Scroll-to button","categories":["flexline-components","flexline-utilities","flexline-misc"],"patternName":"flexline/button-scroll-to"},"className":"flexline-content-shift flexline-content-shift-above flexline-content-shift-up flexline-content-shift-down","layout":{"type":"constrained"},"useContentShift":true,"shiftUp":"18px","shiftDown":"18px","shiftToTop":true} -->
<div id="scrollTo" class="wp-block-group flexline-content-shift flexline-content-shift-above flexline-content-shift-up flexline-content-shift-down"><!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"}} -->
    <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"className":"animated bounce delay-2s slow  flexline-icon-none","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-button animated bounce delay-2s slow  flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Scroll-to - next content"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"top":"0"}}},"backgroundColor":"highlight","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-highlight-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","className":""} -->
    <p class="has-text-align-center">Next section content</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/6aa17b4fb3a44263bdca18d6ce537769?sid=01fddf67-3614-405e-b829-ae7566cec769"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/6aa17b4fb3a44263bdca18d6ce537769-35d775dc647adb1d-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Info Box Group Background"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="info-box">Info Box</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Info Box","categories":["flexline-misc"],"patternName":"flexline/info-box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
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

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/f4676bc81c7f432f8b1af8d0442ecab8?sid=761d716e-d177-43f7-a5d5-441b74533b45"} -->
            <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/f4676bc81c7f432f8b1af8d0442ecab8-2f512c15e98a27c1-full-play.gif" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Pricing Group"},"align":"full","className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"className":""} -->
    <div class="wp-block-columns"><!-- wp:column {"className":""} -->
        <div class="wp-block-column"><!-- wp:heading {"level":3,"className":""} -->
            <h3 class="wp-block-heading" id="pricing-tables">Pricing Table Sections</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":""} -->
            <p>Compare offerings with ready to use pricing table sections with calls-to-action. </p>
            <!-- /wp:paragraph -->

            <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/1222d97d6d2840d3b9b29c9278efc261?sid=b8b2156b-5a03-4ab3-8016-084806e7bf43"} -->
            <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/1222d97d6d2840d3b9b29c9278efc261-b9584b921cc1dc78-full-play.gif" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Pricing Dark","categories":["flexline-misc"],"patternName":"flexline/pricing-card-dark"},"className":"is-style-card-padded","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card-padded has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
                    <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100,"className":"flexline-icon-none"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 flexline-icon-none"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Pricing Light","categories":["flexline-misc"],"patternName":"flexline/pricing-card-light"},"className":"is-style-card-padded","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
                    <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"default"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide","backgroundColor":"neutral"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","className":"","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100,"className":"flexline-icon-none"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 flexline-icon-none"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Team Blocks","categories":["flexline-misc"],"patternName":"flexline/team-leadership"},"align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="team-leadership">Team Leadership Card</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"name":"Leadership Card"},"className":"is-style-card-padded","layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-card-padded"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
        <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Leadership Info"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Name and Title"},"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                        <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Last-Name</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph {"className":""} -->
                    <p>This block is designed to feature leadership in the organization. The image goes first on mobile by using the custom "Row Reverse" option on the columns block.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","className":""} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="team-member">Team Member Card</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"metadata":{"name":"Team Member","categories":["flexline-misc"],"patternName":"flexline/team-member"},"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","className":""} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"metadata":{"name":"Name and Title"},"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"className":"","fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
                    <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/a7e34b40914c42519b414b5a21054731?sid=2e3d250d-01e1-473d-b1d8-11e96fd6eda5"} -->
            <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/a7e34b40914c42519b414b5a21054731-6310d163375e8e6f-full-play.gif" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Testimonials Group"},"align":"full","className":"","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="testimonials">Testimonials</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"className":""} -->
    <div class="wp-block-columns"><!-- wp:column {"className":""} -->
        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Testimonial Card","categories":["flexline-misc"],"patternName":"flexline/testimonial-card"},"className":"is-style-card-padded","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","className":"","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","className":"","fontSize":"small","fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family has-small-font-size"><strong>—Allison Taylor, Designer</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Testimonial with Picture","categories":["flexline-misc"],"patternName":"flexline/testimonial-picture"},"className":"is-style-card-padded","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:image {"id":303,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded","style":{"border":{"radius":"50px"}}} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-303" style="border-radius:50px;object-fit:cover;width:60px;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"metadata":{"name":"Cite"},"className":"","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.5"}},"fontFamily":"display","layout":{"type":"default"}} -->
                    <div class="wp-block-group has-display-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1.5"><!-- wp:paragraph {"className":"","fontSize":"medium"} -->
                        <p class="has-medium-font-size"><strong>Allison Taylor</strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-x-small-font-size" style="text-transform:uppercase">Designer</p>
                        <!-- /wp:paragraph -->
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

    <!-- wp:quote {"textAlign":"right","metadata":{"categories":["flexline-misc"],"patternName":"flexline/testimonial-wide","name":"Testimonial Wide with Picture"},"className":"","fontFamily":"display"} -->
    <blockquote class="wp-block-quote has-text-align-right has-display-font-family"><!-- wp:columns {"className":""} -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100px"}}} -->
                <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                    <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns --><cite>Someone's Name</cite>
    </blockquote>
    <!-- /wp:quote -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/7cad8852bd4d49b2b0378afd0d55f679?sid=727f0b50-85bc-4f0c-a48e-c48bd08391bd"} -->
    <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><img src="https://cdn.loom.com/sessions/thumbnails/7cad8852bd4d49b2b0378afd0d55f679-fab1a5abaeb4aa2e-full-play.gif" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"59px","className":""} -->
<div style="height:59px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="plethora-tabs">Plethora Plugins Tabs + Accordions</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>Flexline theme has created some custom styles to support the <a href="https://wordpress.org/plugins/plethora-tabs-accordions/" target="_blank" rel="noreferrer noopener">Plethora Plugins Tabs + Accordions plugin</a>. The following are some example use cases. </p>
<!-- /wp:paragraph -->

<!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null],"className":"","metadata":{"name":"Accordion","categories":["flexline-misc"],"patternName":"flexline/tabs-accordion"}} -->
<!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section 2</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section 3</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:plethoraplugins/tabs {"layout":"vertical","tabLabels":["Vertical Tab 1","Vertical Tab 2","Basic Content"],"tabIds":[null,null,null],"className":"","metadata":{"name":"Vertical Tabs","categories":["flexline-misc"],"patternName":"flexline/tabs-vertical"}} -->
<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 1","parentLayout":"vertical","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 2","parentLayout":"vertical","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section 2</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Basic Content","parentLayout":"vertical","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section 3</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:plethoraplugins/tabs {"tabLabels":["Tab 1","Tab 2"],"tabIds":[null,null],"className":"","metadata":{"name":"Tabs","categories":["flexline-misc"],"patternName":"flexline/tabs"}} -->
<!-- wp:plethoraplugins/tab {"label":"Tab 1","parentLayout":"horizontal","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Tab 2","parentLayout":"horizontal","className":""} -->
<!-- wp:heading {"className":""} -->
<h2 class="wp-block-heading">Sample Section 2</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:spacer {"height":"59px","className":""} -->
<div style="height:59px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->