<?php

/**
 * Title: Header with Centered logo.
 * Slug: flexline/header-centered
 * Categories: flexline-headers
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header Centered"},"className":"is-style-shadow-diffused","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-shadow-diffused" style="margin-top:0;padding-top:0;padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"Anchor Navigation"},"align":"full","style":{"spacing":{"padding":{"top":"2px","bottom":"2px","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"gradient":"primary-primaryDark","layout":{"type":"constrained"},"hideOnMobile":true} -->
    <div class="wp-block-group alignfull has-primary-primaryDark-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:2px;padding-right:var(--wp--preset--spacing--medium);padding-bottom:2px;padding-left:var(--wp--preset--spacing--medium)"><!-- wp:navigation {"ref":75,"showSubmenuIcon":false,"overlayMenu":"never","overlayBackgroundColor":"primary","overlayTextColor":"neutral-light","className":"is-style-light-over-dark","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","justifyContent":"center"},"hideOnTablet":true,"hideOnMobile":true} /--></div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Header Container"},"align":"wide","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" id="header_container" style="margin-top:0px;padding-top:10px;padding-right:var(--wp--preset--spacing--small);padding-bottom:10px;padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","metadata":{"name":"Navigation Sections"},"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Navigation Left"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"hideOnMobile":true} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"},"hideOnTablet":true,"hideOnMobile":true} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":155,"showSubmenuIcon":false,"overlayMenu":"never","icon":"menu","className":"is-style-main-header-nav","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"capitalize"}},"fontSize":"small","fontFamily":"display","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"200px","metadata":{"name":"Logo"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:200px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                <div class="wp-block-group" style="margin-top:5px;margin-bottom:5px"><!-- wp:site-logo {"width":180,"shouldSyncIcon":false} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Navigation Right"},"hideOnMobile":true} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"},"hideOnTablet":true,"hideOnMobile":true} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":156,"showSubmenuIcon":false,"overlayMenu":"never","icon":"menu","className":"is-style-main-header-nav","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"capitalize"}},"fontSize":"small","fontFamily":"display","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->