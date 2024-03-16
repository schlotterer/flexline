<?php

/**
 * Title: Sticky Subnav.
 * Slug: flexline/subnav-sticky
 * Categories: flexline-modules
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-alternate","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Subnav Sticky"}} -->
<div class="wp-block-group alignfull is-style-default has-base-color has-primary-alternate-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":90,"minHeight":50,"gradient":"primary-primaryDark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:navigation {"ref":443,"overlayMenu":"never","align":"wide","className":"has-text-align-center is-style-horizontal-scroll-at-mobile is-style-light-over-dark","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.1"}},"fontSize":"medium","enableHorizontalScroll":true} /--></div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->