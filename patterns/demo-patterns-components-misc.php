<?php

/**
 * Title: Demo Patterns - Components Misc.
 * Slug: flexline/demo-patterns-components-misc
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#scroll-to-button">Scroll-to Button</a> | <a href="#sticky-nav">Sticky Navigation</a> | <a href="#info-box">Info Box</a> | <a href="#pricing-tables">Pricing Tables</a> | <a href="#team-leadership">Teams</a> | <a href="#testimonials">Testimonials</a> | <a href="#plethora-tabs">Plethora Tabs</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>Our Miscellaneous Component Patterns are the extra pieces that help round out your pages and make your content more engaging, organized, and actionable. Think of these as your flexible building blocks for adding helpful details, navigation, and extra context wherever you need it.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>Use these patterns to fill in the gaps, support your main content, and create a more polished, user-friendly experience. Each component is ready to mix, match, and customize to fit your brand.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="scroll-to-button">Scroll-to Button</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The <strong>Scroll-to Button</strong> provides a simple way for users to scroll to the next section of the page. By default, the button targets its own position, and it uses a negative margin to remove itself from the normal document flow. This ensures it does not add unwanted spacing between sections.<br>The negative margin behavior is controlled by <strong>FlexLine’s Content Shift</strong> options and can be adjusted as needed to fine-tune spacing.<br>Additionally, you can configure the button to scroll to a specific ID or anchor elsewhere on the page, rather than its default behavior of scrolling to itself.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Scroll-to - previous content"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"bottom":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-background-color has-background" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","className":""} -->
    <p class="has-text-align-center">Previous section content</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/button-scroll-to"} /-->

<!-- wp:group {"metadata":{"name":"Scroll-to - next content"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"top":"0"}}},"backgroundColor":"highlight","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-highlight-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","className":""} -->
    <p class="has-text-align-center">Next section content</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/6aa17b4fb3a44263bdca18d6ce537769?sid=01fddf67-3614-405e-b829-ae7566cec769","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/6aa17b4fb3a44263bdca18d6ce537769?sid=01fddf67-3614-405e-b829-ae7566cec769"><img src="https://cdn.loom.com/sessions/thumbnails/6aa17b4fb3a44263bdca18d6ce537769-35d775dc647adb1d-full-play.gif" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Sticky Nav Wrapper"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="sticky-nav">Sticky Navigation</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The Sticky Navigation pattern uses WordPress menus to display sub navigation type functionality that will still to the top of the window when scrolling.</p>
    <!-- /wp:paragraph -->

    <!-- wp:pattern {"slug":"flexline/subnav-sticky"} /-->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/91c4cd63790c4c489863c7c290de23de?sid=1faffbff-69ff-4b35-83b5-d84177d7b1bf","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
    <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/91c4cd63790c4c489863c7c290de23de?sid=1faffbff-69ff-4b35-83b5-d84177d7b1bf"><img src="https://cdn.loom.com/sessions/thumbnails/91c4cd63790c4c489863c7c290de23de-8c73148fccc73156-full-play.gif" alt="" /></a></figure>
    <!-- /wp:image -->

    <!-- wp:group {"metadata":{"name":"Info Box Group Background"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
        <h3 class="wp-block-heading" id="info-box">Info Box</h3>
        <!-- /wp:heading -->

        <!-- wp:columns {"verticalAlignment":"center","className":""} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">

                <!-- wp:pattern {"slug":"flexline/info-box"} /-->

            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/f4676bc81c7f432f8b1af8d0442ecab8?sid=761d716e-d177-43f7-a5d5-441b74533b45","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
                <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/f4676bc81c7f432f8b1af8d0442ecab8?sid=761d716e-d177-43f7-a5d5-441b74533b45"><img src="https://cdn.loom.com/sessions/thumbnails/f4676bc81c7f432f8b1af8d0442ecab8-2f512c15e98a27c1-full-play.gif" alt="" /></a></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
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

            <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/1222d97d6d2840d3b9b29c9278efc261?sid=b8b2156b-5a03-4ab3-8016-084806e7bf43","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/1222d97d6d2840d3b9b29c9278efc261?sid=b8b2156b-5a03-4ab3-8016-084806e7bf43"><img src="https://cdn.loom.com/sessions/thumbnails/1222d97d6d2840d3b9b29c9278efc261-b9584b921cc1dc78-full-play.gif" alt="" /></a></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column">

            <!-- wp:pattern {"slug":"flexline/pricing-card-dark"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column">

            <!-- wp:pattern {"slug":"flexline/pricing-card-light"} /-->

        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Team Blocks","categories":["flexline-misc"],"patternName":"flexline/team-leadership"},"align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="team-leadership">Team Leadership Card</h3>
    <!-- /wp:heading -->

    <!-- wp:pattern {"slug":"flexline/team-leadership"} /-->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="team-member">Team Member Card</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">

            <!-- wp:pattern {"slug":"flexline/team-member"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/a7e34b40914c42519b414b5a21054731?sid=2e3d250d-01e1-473d-b1d8-11e96fd6eda5","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/a7e34b40914c42519b414b5a21054731?sid=2e3d250d-01e1-473d-b1d8-11e96fd6eda5"><img src="https://cdn.loom.com/sessions/thumbnails/a7e34b40914c42519b414b5a21054731-6310d163375e8e6f-full-play.gif" alt="" /></a></figure>
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
        <div class="wp-block-column">

            <!-- wp:pattern {"slug":"flexline/testimonial-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":""} -->
        <div class="wp-block-column">
            <!-- wp:pattern {"slug":"flexline/testimonial-picture"} /-->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:pattern {"slug":"flexline/testimonial-wide"} /-->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/7cad8852bd4d49b2b0378afd0d55f679?sid=727f0b50-85bc-4f0c-a48e-c48bd08391bd","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
    <figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/7cad8852bd4d49b2b0378afd0d55f679?sid=727f0b50-85bc-4f0c-a48e-c48bd08391bd"><img src="https://cdn.loom.com/sessions/thumbnails/7cad8852bd4d49b2b0378afd0d55f679-fab1a5abaeb4aa2e-full-play.gif" alt="" /></a></figure>
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
<p>FlexLine theme has created some custom styles to support the <a href="https://wordpress.org/plugins/plethora-tabs-accordions/" target="_blank" rel="noreferrer noopener">Plethora Plugins Tabs + Accordions plugin</a>. The following are some example use cases. </p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/tabs-accordion"} /-->

<!-- wp:pattern {"slug":"flexline/tabs-vertical"} /-->

<!-- wp:spacer {"height":"59px","className":""} -->
<div style="height:59px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
