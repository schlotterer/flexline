<?php

/**
 * Title: Demo Patterns - Heroes
 * Slug: flexline/demo-patterns-heroes
 * Categories: flexline-demos
 * Inserter: false
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#hero-split">Hero Slider</a> | <a href="#home-hero">Home Hero</a> | <a href="#hero-split">Hero Split</a> | <a href="#feature-page-bottom">Feature Page Bottom</a> | <a href="#feature-page-centered">Feature Page Centered</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p><strong>Heroes</strong> are the bold, eye-catching sections at the top of a page that grab your visitor’s attention and set the tone for your content. They’re designed to showcase your most important message, image, or call to action right up front.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>This page collects all of our hero patterns in one place, with videos to show how they work in real layouts. Use these demos to explore different hero styles, see how they adapt on various screen sizes, and choose the pattern that best fits your content.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Hero Slider - Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="hero-slider">Hero Slider</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The Hero Slider pattern shows how any Group-based container (Group, Stack, Row, or Grid) can be switched into “slider” mode. When enabled, each first-level child block becomes a slide. By default, the toolbar inserter will add new Cover blocks, since they’re designed to hold full-size background images. If another block type is dragged in, the editor will automatically wrap it inside a Cover so the layout stays consistent.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>The Cover block is flexible and fills the available space, making it the ideal base for hero slides. Editors can fine-tune the slider through the block sidebar: adjusting height, transition speed, loop behavior, auto-advance, and navigation buttons.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/hero-slider"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/7f6b828156184abb8462fa7b7fe0e0d6?sid=5ef8015e-d9f1-4a2b-8309-144c155e689a","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-card" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/7f6b828156184abb8462fa7b7fe0e0d6?sid=5ef8015e-d9f1-4a2b-8309-144c155e689a"><img src="https://cdn.loom.com/sessions/thumbnails/7f6b828156184abb8462fa7b7fe0e0d6-39dd6c16af9f4f25-full-play.gif" /></a></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="home-hero">Home Hero</h3>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"flexline/hero-home"} /-->

<!-- wp:spacer {"height":"30px","className":""} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/56f37570c2854166ab3d4da0e5ad32f6?sid=74b6db6a-c0e1-47e7-9db9-0b560a002b1f","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/56f37570c2854166ab3d4da0e5ad32f6?sid=74b6db6a-c0e1-47e7-9db9-0b560a002b1f"><img src="https://cdn.loom.com/sessions/thumbnails/56f37570c2854166ab3d4da0e5ad32f6-80b332077323c194-full-play.gif" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="hero-split">Hero Split</h3>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"flexline/hero-split"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/e3b0ad3c624543d098e452d5ab9e29d8?sid=61586abe-8b2e-4bbc-b67e-d1362d365a5d","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/e3b0ad3c624543d098e452d5ab9e29d8?sid=61586abe-8b2e-4bbc-b67e-d1362d365a5d"><img src="https://cdn.loom.com/sessions/thumbnails/e3b0ad3c624543d098e452d5ab9e29d8-a1d44ec26ab4bc1b-full-play.gif" alt="" /></a></figure>
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

<!-- wp:pattern {"slug":"flexline/meta-feature-page-center-bottom"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/cc6cdb749f284629842eed0d34f7c2a0?sid=d06b20a8-b875-43f3-9956-d91a43985fe0","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/cc6cdb749f284629842eed0d34f7c2a0?sid=d06b20a8-b875-43f3-9956-d91a43985fe0"><img src="https://cdn.loom.com/sessions/thumbnails/cc6cdb749f284629842eed0d34f7c2a0-fcc0a8ebbba50720-full-play.gif" alt="" /></a></figure>
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

<!-- wp:pattern {"slug":"flexline/meta-feature-page"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-dots enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"enableModal":true,"href":"https://www.loom.com/embed/1e5abc0ca7a14332853da5f9b7d29b22?sid=4fb9fa78-5cb5-497c-a21a-8151acef7a76","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large is-style-dots enable-modal" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/1e5abc0ca7a14332853da5f9b7d29b22?sid=4fb9fa78-5cb5-497c-a21a-8151acef7a76"><img src="https://cdn.loom.com/sessions/thumbnails/1e5abc0ca7a14332853da5f9b7d29b22-7500bbd9b3d0a39d-full-play.gif" alt="" /></a></figure>
<!-- /wp:image -->
