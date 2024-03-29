<?php

/**
 * Title: Hero for Home Page ( no breadcrumbs ).
 * Slug: flexline/hero-home
 * Categories: flexline-heroes, flexline-sections
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Home Hero"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":507,"dimRatio":80,"overlayColor":"primary","minHeightUnit":"px","align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-507" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group has-link-color"><!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"}},"className":"is-style-default","fontSize":"small","fontFamily":"display"} -->
                        <h1 class="wp-block-heading is-style-default has-display-font-family has-small-font-size" style="font-style:normal;font-weight:400;text-transform:uppercase">H1 - Eyebrow - SEO Headline</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default","fontSize":"max-60"} -->
                        <h2 class="wp-block-heading is-style-default has-max-60-font-size" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"is-style-default"} -->
                        <p class="is-style-default">Donec ullamcorper nulla non metus auctor fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons -->
                    <div class="wp-block-buttons"><!-- wp:button -->
                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#quickForm">Contact Us</a></div>
                        <!-- /wp:button -->

                        <!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"className":"is-style-outline","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="https://www.youtube.com/watch?v=qZ0_aa6RxvQ">Watch video</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"scrollTo animated bounce delay-2s slow"} -->
        <div class="wp-block-button scrollTo animated bounce delay-2s slow" id="scrollTo"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->