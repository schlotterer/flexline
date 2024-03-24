<?php

/**
 * Title: Header with site title, navigation.
 * Slug: flexline/header-default
 * Categories: flexline-headers
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"layout":{"type":"constrained"},"metadata":{"name":"Header Base"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--large);padding-bottom:0;padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0px;padding-top:10px;padding-right:var(--wp--preset--spacing--small);padding-bottom:10px;padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="margin-top:5px;margin-bottom:5px"><!-- wp:site-logo {"width":225} /--></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":1934,"overlayMenu":"never","overlayBackgroundColor":"base","overlayTextColor":"base","className":"is-style-main-header-nav","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase"}},"fontSize":"small","hideOnTablet":true,"hideOnMobile":true} /--></div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"hideOnTablet":true,"hideOnMobile":true} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":47,"overlayMenu":"never","icon":"menu","className":"is-style-main-header-nav","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"none"}},"fontSize":"small"} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"hideOnMobile":true} -->
            <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button" style="text-transform:uppercase"><a class="wp-block-button__link wp-element-button" href="/contact/" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Contact</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->