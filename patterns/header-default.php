<?php

/**
 * Title: Header - Left Logo.
 * Slug: flexline/header-default
 * Categories: flexline-headers
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header Base","categories":["flexline-headers"],"patternName":"flexline/header-default"},"className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="padding-top:0;padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:var(--wp--preset--spacing--large)">
    <!-- wp:template-part {"slug":"notification-bar","theme":"flexline","align":"full","className":""} /-->

    <!-- wp:group {"metadata":{"name":"Header Container"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
    <div class="wp-block-group alignwide" id="header_container" style="margin-top:0px;padding-top:8px;padding-right:var(--wp--preset--spacing--small);padding-bottom:8px;padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Logo Group"},"className":"","style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"layout":{"type":"constrained","contentSize":"200px"}} -->
        <div class="wp-block-group" style="margin-top:5px;margin-bottom:5px"><!-- wp:site-logo {"width":225,"className":"","style":{"color":{}}} /--></div>
        <!-- /wp:group -->

        <!-- wp:group {"metadata":{"name":"Navigations Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
        <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Navigations Stack"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Anchor Nav"},"className":"headroom-hide-on-scroll flexline-hide-on-mobile flexline-hide-on-tablet","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"hideOnTablet":true,"hideOnMobile":true} -->
                <div class="wp-block-group headroom-hide-on-scroll flexline-hide-on-mobile flexline-hide-on-tablet"><!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-dark-over-light","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase","lineHeight":"1.05"}},"fontSize":"x-small","layout":{"type":"flex","justifyContent":"center"}} /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"metadata":{"name":"Main Nav"},"className":"flexline-hide-on-mobile flexline-hide-on-tablet","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"hideOnTablet":true,"hideOnMobile":true} -->
                <div class="wp-block-group flexline-hide-on-mobile flexline-hide-on-tablet"><!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","icon":"menu","className":"is-style-main-header-nav","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"none","lineHeight":"1.05"}},"fontSize":"small","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"className":"flexline-hide-on-mobile","layout":{"type":"flex","justifyContent":"center"},"hideOnMobile":true} -->
            <div class="wp-block-buttons flexline-hide-on-mobile"><!-- wp:button {"className":"flexline-icon-none","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button flexline-icon-none" style="text-transform:uppercase"><a class="wp-block-button__link wp-element-button" href="/contact/" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Contact</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->