<?php

/**
 * Title: CTA Page Link Bar
 * Slug: flexline/cta-page-link-bar
 * Description: Use the Group Link option to make the entire CTA clickable.
 * Categories: flexline-components, flexline-cta
 */
?>
<!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
<div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
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