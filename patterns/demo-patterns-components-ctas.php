<?php

/**
 * Title: Demo Patterns - Components CTAs
 * Slug: flexline/demo-patterns-components-ctas
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p><strong>Calls to Action (CTAs)</strong> are the sections that guide your visitors to take the next step — whether that’s signing up, getting in touch, or exploring more. Well-placed CTAs keep your audience engaged and help you reach your goals.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>This page gathers all of our reusable CTA patterns in one spot, with supporting demos and examples. Use these patterns to see how different layouts handle headlines, buttons, and supporting text — and find the right fit for your content and audience.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>Feel free to mix, match, and customize these CTAs to match your style and brand voice. A strong CTA can turn a good page into a great one!</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"flexline-icon-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#call-to-action">CTA Box</a> | <a href="#sticky-cta">Sticky CTA</a> | <a href="#heroes">Page Link CTAs</a> | <a href="#page-link-ctas">CTA - Card with image</a> | <a href="#large-cta">Large CTA</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="cta-box">CTA Box</h3>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
        
        <!-- wp:pattern {"slug":"flexline/cta-box"} /-->

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

    <!-- wp:pattern {"slug":"flexline/cta-full-width"} /-->

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

        <!-- wp:pattern {"slug":"flexline/cta-page-link-bar-dark"} /-->

        <!-- wp:pattern {"slug":"flexline/cta-page-link-bar"} /-->

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

    <!-- wp:pattern {"slug":"flexline/cta-image-text-button"} /-->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-shadow-diffused enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/90e3702f65e241358bc198d1832df2cd?sid=ffda84da-5cd2-42f7-a1bb-5d69714f38e0"} -->
    <figure class="wp-block-image aligncenter size-large is-style-shadow-diffused enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ae084e38d51048b4b46d9e368b6abe85-e2f3553d8e77692d-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="large-cta">Large CTA</h3>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"flexline/cta-large"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-light","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/0f681db75e8d40d8bbd0d8ba52403f7a?sid=f4c1e82c-a42f-4080-b049-723b0f397968"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-light"><img src="https://cdn.loom.com/sessions/thumbnails/0f681db75e8d40d8bbd0d8ba52403f7a-6c6d3fea317c4c2f-full-play.gif" alt="" /></figure>
<!-- /wp:image -->