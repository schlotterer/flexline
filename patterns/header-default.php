<?php

/**
 * Title: Header with site title, navigation.
 * Slug: flexline/header-default
 * Categories: flexline-headers
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Header Base"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0;padding-left:0"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0px;padding-top:10px;padding-right:var(--wp--preset--spacing--small);padding-bottom:10px;padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="margin-top:5px;margin-bottom:5px"><!-- wp:site-logo {"width":225} /--></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":48,"overlayMenu":"never","overlayBackgroundColor":"primary","overlayTextColor":"base","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase"}},"fontSize":"small","blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"screenSize":{"hideOnScreenSize":{"small":true,"medium":true}}}}]}} /-->

                    <!-- wp:navigation {"ref":54,"openSubmenusOnClick":true,"overlayMenu":"never","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"screenSize":{"hideOnScreenSize":{"large":true,"medium":true}}}}]}} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"},"blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"screenSize":{"hideOnScreenSize":{"medium":true,"small":true}}}}]}} -->
                <div class="wp-block-group"><!-- wp:navigation {"ref":5,"overlayMenu":"never","icon":"menu","overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"none"}},"fontSize":"small","blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":[]}]}} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"screenSize":{"hideOnScreenSize":{"small":true}}}}]}} -->
            <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"typography":{"textTransform":"uppercase"}}} -->
                <div class="wp-block-button" style="text-transform:uppercase"><a class="wp-block-button__link wp-element-button" href="https://websitesforseniorliving.com/contact/" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Contact</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->