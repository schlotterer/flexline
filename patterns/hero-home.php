<?php

/**
 * Title: Hero for Home Page ( no breadcrumbs ).
 * Slug: flexline/hero-home
 * Categories: flexline-heroes, flexline-sections
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Home Hero","categories":["flexline-heroes"],"patternName":"flexline/hero-home"},"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":507,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeightUnit":"px","metadata":{"name":"Hero Background"},"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-507" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Row"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"metadata":{"name":"Content Width Container"},"layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text Group"},"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group has-link-color"><!-- wp:heading {"level":1,"className":"is-style-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                        <h1 class="wp-block-heading is-style-eyebrow has-base-color has-text-color has-link-color">H1 - Eyebrow - SEO Headline</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                        <h2 class="wp-block-heading is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"is-style-default"} -->
                        <p class="is-style-default">Heroes play a crucial role in grabbing attention and establishing the ambiance. The Flexline theme gives you the tools to craft compelling hero sections designed to captivate and meet the specific demands of the senior living audience.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"metadata":{"name":"Calls to action"}} -->
                    <div class="wp-block-buttons"><!-- wp:button -->
                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#quickForm">Contact Us</a></div>
                        <!-- /wp:button -->

                        <!-- wp:button {"textColor":"base","className":"is-style-outline enable-modal  flexline-icon-video-play","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"iconType":"video-play","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/491423e87fb74c4a99e2e7c889badd98?sid=9d6ea3ff-f31c-4acb-a13b-e851936e5740"} -->
                        <div class="wp-block-button is-style-outline enable-modal  flexline-icon-video-play"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="https://www.loom.com/embed/491423e87fb74c4a99e2e7c889badd98?sid=9d6ea3ff-f31c-4acb-a13b-e851936e5740">Watch video</a></div>
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

    <!-- wp:buttons {"metadata":{"name":"Scroll button"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"}} -->
    <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","className":"scrollTo animated bounce delay-2s slow","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-button scrollTo animated bounce delay-2s slow" id="scrollTo"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->