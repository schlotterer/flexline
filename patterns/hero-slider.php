<?php

/**
 * Title: Hero slider for Home Page ( no breadcrumbs ).
 * Slug: flexline/hero-slider
 * Categories: flexline-heroes
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Slider Pattern"},"align":"full","className":"","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"metadata":{"name":"Slider Group - Settings"},"align":"full","className":"is-style-slider slider-loop slider-buttons-background-transparent slider-buttons-text-white slider-buttons-border-white slider-navigation slider-buttons-vertical-bottom slider-buttons-horizontal-left slider-buttons-box-shadow slider-auto slider-preview-mode slider-buttons-over","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"},"enableSlider":true,"editPreviewToggle":"preview","sliderAuto":true,"sliderSpeed":8500,"sliderLoop":true,"positionButtonsOver":true,"buttonsBackgroundColor":"transparent","buttonsBorderColor":"white","buttonsBoxShadow":true,"transitionDuration":1000,"pauseOnHover":false} -->
    <div class="wp-block-group alignfull is-style-slider slider-loop slider-buttons-background-transparent slider-buttons-text-white slider-buttons-border-white slider-navigation slider-buttons-vertical-bottom slider-buttons-horizontal-left slider-buttons-box-shadow slider-auto slider-preview-mode slider-buttons-over" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"isUserOverlayColor":true,"minHeightUnit":"px","gradient":"dark-transparent-left-to-right","sizeSlug":"large","metadata":{"name":"Slide 1"},"align":"full","className":"no-lazy-load","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
        <div class="wp-block-cover alignfull no-lazy-load" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim has-background-gradient has-dark-transparent-left-to-right-gradient-background"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Row"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"metadata":{"name":"Content Width Container"},"className":"","layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                    <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group has-link-color"><!-- wp:heading {"level":1,"className":"is-style-eyebrow"} -->
                            <h1 class="wp-block-heading is-style-eyebrow"><span class="is-style-text-shadow">A Block-Level Slider</span></h1>
                            <!-- /wp:heading -->

                            <!-- wp:heading {"className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"lineHeight":"1"}},"textColor":"base"} -->
                            <h2 class="wp-block-heading is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;line-height:1"><span class="is-style-text-shadow">Turn any Group block into a slider.</span></h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"is-style-default"} -->
                            <p class="is-style-default"><span class="is-style-text-shadow">Any Group, Stack, Row, or Grid can display it's content as a slider. Each direct child becomes a slide, usually a Cover block with full-size imagery and layout flexibility.</span></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"className":"","fontSize":"x-small"} -->
                            <p class="has-x-small-font-size"><em><span class="is-style-text-shadow">Note: The first slide uses the featured image and lazy loading is turned off. </span></em></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
        </div>
        <!-- /wp:cover -->

        <!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":2928,"isUserOverlayColor":true,"minHeightUnit":"px","gradient":"dark-transparent-right-to-left","sizeSlug":"large","metadata":{"name":"Slide 2"},"align":"full","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><img class="wp-block-cover__image-background wp-image-2928 size-large" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-right-to-left-gradient-background"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Row"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"metadata":{"name":"Content Width Container"},"className":"","layout":{"type":"constrained","contentSize":"600px","wideSize":"1000px"}} -->
                    <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right"}} -->
                        <div class="wp-block-group has-link-color"><!-- wp:heading {"textAlign":"right","level":1,"className":"is-style-eyebrow"} -->
                            <h1 class="wp-block-heading has-text-align-right is-style-eyebrow"><span class="is-style-text-shadow">Flexible Hero Layouts</span></h1>
                            <!-- /wp:heading -->

                            <!-- wp:heading {"textAlign":"right","className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"lineHeight":"1"}},"textColor":"base"} -->
                            <h2 class="wp-block-heading has-text-align-right is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;line-height:1">Cover Block <span class="is-style-text-shadow">Creative Freedom</span></h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"right","className":"is-style-default"} -->
                            <p class="has-text-align-right is-style-default"><span class="is-style-text-shadow">The slider gives you a way to feature multiple hero images or messages in one section. It reduces the need for extra templates or custom code.</span></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
        </div>
        <!-- /wp:cover -->

        <!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":2928,"dimRatio":80,"isUserOverlayColor":true,"minHeightUnit":"px","gradient":"alternate-highlight","contentPosition":"bottom center","sizeSlug":"large","metadata":{"name":"Slide 3"},"align":"full","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><img class="wp-block-cover__image-background wp-image-2928 size-large" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient has-alternate-highlight-gradient-background"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content Row"},"align":"wide","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"stretch"}} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"metadata":{"name":"Content Width Container"},"className":"","layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                    <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"bottom"}} -->
                        <div class="wp-block-group has-link-color"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
                            <h1 class="wp-block-heading has-text-align-center is-style-eyebrow has-base-color has-text-color has-link-color"><span class="is-style-text-shadow">Toggle + Adjust Options</span></h1>
                            <!-- /wp:heading -->

                            <!-- wp:heading {"textAlign":"center","className":"is-style-creative","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"lineHeight":"1"}},"textColor":"base"} -->
                            <h2 class="wp-block-heading has-text-align-center is-style-creative has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;line-height:1"><span class="is-style-text-shadow">Full feature control</span></h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","className":"is-style-default"} -->
                            <p class="has-text-align-center is-style-default"><span class="is-style-text-shadow">Enable the slider in the sidebar, then set height, transition speed, loop, auto-slide, and button styles. Slides fade in/out automatically or with arrow controls. And switch between edit and preview modes so you verify your design before you publish.</span></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"metadata":{"name":"Scroll-to button","categories":["flexline-misc"],"patternName":"flexline/button-scroll-to"},"className":"flexline-content-shift flexline-content-shift-above flexline-content-shift-up flexline-content-slide-y","layout":{"type":"constrained"},"useContentShift":true,"shiftUp":"36px","shiftDown":"","shiftToTop":true,"slideVertical":"18px"} -->
                <div id="scrollTo" class="wp-block-group flexline-content-shift flexline-content-shift-above flexline-content-shift-up flexline-content-slide-y"><!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"}} -->
                    <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"className":"animated bounce delay-2s slow is-style-glass-button","style":{"border":{"radius":"100px","top":{"color":"var:preset|color|base","width":"1px"},"right":{},"bottom":{"color":"var:preset|color|neutral","width":"1px"},"left":{}},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"shadow":"var:preset|shadow|dark"}} -->
                        <div class="wp-block-button animated bounce delay-2s slow is-style-glass-button"><a class="wp-block-button__link wp-element-button" href="#scrollTo" style="border-radius:100px;border-top-color:var(--wp--preset--color--base);border-top-width:1px;border-bottom-color:var(--wp--preset--color--neutral);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--dark)">↓</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->