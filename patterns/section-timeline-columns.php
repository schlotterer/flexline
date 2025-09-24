<?php

/**
 * Title: Timeline Columns
 * Slug: flexline/section-timeline-columns
 * Categories: flexline-sections
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Timeline Columns Container","categories":["flexline-sections"],"patternName":"flexline/section-timeline-columns"},"align":"wide","className":"is-style-card-padded","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|small","right":"0"}},"shadow":"var:preset|shadow|diffused"},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--small);box-shadow:var(--wp--preset--shadow--diffused)"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Timeline Columns Slider"},"align":"full","className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary scroller-buttons-box-shadow","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"left":"0"}}},"enableHorizontalScroller":true,"scrollAuto":true,"scrollLoop":true,"hideScrollbar":true,"buttonsBoxShadow":true,"transitionDuration":400} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary scroller-buttons-box-shadow" style="padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:275px"><!-- wp:heading {"className":""} -->
            <h2 class="wp-block-heading">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":""} -->
            <p>This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card"},"className":"is-style-default group-link group-link-type-none","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-default group-link group-link-type-none">
                
                <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

                <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Poster Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"350px","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:350px">
            
            <!-- wp:pattern {"slug":"flexline/testimonial-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:275px"><!-- wp:heading {"textAlign":"center","className":""} -->
            <h2 class="wp-block-heading has-text-align-center">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":""} -->
            <p class="has-text-align-center">This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"500px","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:500px">
            
            <!-- wp:pattern {"slug":"flexline/gallery-video-card"} /-->
            
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"800px","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:800px">
            
            <!-- wp:pattern {"slug":"flexline/testimonial-wide"} /-->
             
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->