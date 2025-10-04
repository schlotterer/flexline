<?php

/**
 * Title: Demo Patterns - Components Galleries
 * Slug: flexline/demo-patterns-components-galleries
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine;
?>
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
 
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>Our <strong>Gallery Patterns</strong> are flexible building blocks for showcasing rich media — whether it’s photos, videos, or other embedded content. These patterns help you tell a more visual story and keep visitors engaged.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>Use these patterns to highlight portfolios, media libraries, product shots, or any collection of visuals. Each one is designed to be flexible and easy to adapt — just drop in your media, adjust the layout as needed, and give your audience a smooth, immersive experience.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Galleries Group"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="poster-gallery">Poster Gallery</h3>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Poster Gallery"},"className":"is-style-dots"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-dots"><!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            
            <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"href":"https://www.loom.com/embed/e38d05ced34a4992adf99712e9dda11a?sid=516d7482-4da7-44b6-92e3-a9e16a06ab3f","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><a class="enable-modal-trigger" href="https://www.loom.com/embed/e38d05ced34a4992adf99712e9dda11a?sid=516d7482-4da7-44b6-92e3-a9e16a06ab3f"><img src="https://cdn.loom.com/sessions/thumbnails/e38d05ced34a4992adf99712e9dda11a-6e1a3e5e871f87db-full-play.gif" alt="" /></a></figure>
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
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            
            <!-- wp:pattern {"slug":"flexline/gallery-video-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"href":"https://www.loom.com/embed/5dab5cacc2c44ba5999c657ba652756b?sid=7c032d01-31e9-400e-b966-2eecc7e6b3c6","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><a class="enable-modal-trigger" href="https://www.loom.com/embed/5dab5cacc2c44ba5999c657ba652756b?sid=7c032d01-31e9-400e-b966-2eecc7e6b3c6"><img src="https://cdn.loom.com/sessions/thumbnails/5dab5cacc2c44ba5999c657ba652756b-79db7e1df624575e-full-play.gif" alt="" /></a></figure>
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
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            
            <!-- wp:pattern {"slug":"flexline/gallery-mixed-detailed-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"href":"https://www.loom.com/embed/216005a682c24cfb982cdf1874dea97f?sid=ed612bd6-2e7e-47ad-a637-f9cdae076577","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><a class="enable-modal-trigger" href="https://www.loom.com/embed/216005a682c24cfb982cdf1874dea97f?sid=ed612bd6-2e7e-47ad-a637-f9cdae076577"><img src="https://cdn.loom.com/sessions/thumbnails/216005a682c24cfb982cdf1874dea97f-86a96d4dd2f5aaa8-full-play.gif" alt="" /></a></figure>
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
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            
            <!-- wp:pattern {"slug":"flexline/gallery-media-download"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:image {"sizeSlug":"large","className":"is-style-shadow-diffused enable-modal","enableModal":true,"href":"https://www.loom.com/embed/375e895ced7441beaca739541d038554?sid=f0b67f70-e6d1-4d63-b15c-0380d1b5cd39","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
            <figure class="wp-block-image size-large is-style-shadow-diffused enable-modal"><a class="enable-modal-trigger" href="https://www.loom.com/embed/375e895ced7441beaca739541d038554?sid=f0b67f70-e6d1-4d63-b15c-0380d1b5cd39"><img src="https://cdn.loom.com/sessions/thumbnails/375e895ced7441beaca739541d038554-ebd7213859638578-full-play.gif" alt="" /></a></figure>
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

    <!-- wp:pattern {"slug":"flexline/gallery-media-card-wide"} /-->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"is-style-shadow-diffused enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"enableModal":true,"href":"https://www.loom.com/embed/3be4cabf6d8b4d5e9ac095fcaa6da12b?sid=e17335dc-7c11-4d32-bf0e-cbdb3b92a9bf","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
    <figure class="wp-block-image aligncenter size-large is-style-shadow-diffused enable-modal" style="margin-top:var(--wp--preset--spacing--medium)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/3be4cabf6d8b4d5e9ac095fcaa6da12b?sid=e17335dc-7c11-4d32-bf0e-cbdb3b92a9bf"><img src="https://cdn.loom.com/sessions/thumbnails/3be4cabf6d8b4d5e9ac095fcaa6da12b-225821ec9ce62ee1-full-play.gif" alt="" /></a></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->
