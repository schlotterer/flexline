<?php
/**
 * Title: Sticky Subnav.
 * Slug: flexline/subnav-sticky
 * Categories: flexline-modules
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-alternate","className":"is-style-shadow-light","layout":{"type":"constrained"},"metadata":{"name":"Subnav Sticky"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-base-color has-primary-alternate-gradient-background has-text-color has-background has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.jpg'; ?>","dimRatio":90,"minHeight":50,"gradient":"primary-alternate","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-alternate-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
    <!-- wp:navigation {"overlayMenu":"never","align":"wide","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|large"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"2"}},"fontSize":"medium"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
