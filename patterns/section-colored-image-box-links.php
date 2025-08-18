<?php

/**
 * Title: Section with colored boxes with image in the background and links
 * Slug: flexline/section-colored-image-box-links
 * Categories: flexline-sections
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Colored Image Cards with links","categories":["flexline-sections"],"patternName":"flexline/section-colored-image-box-links"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"var:preset|spacing|xxx-large","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--xxx-large);margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Headline"},"className":"","layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"wp-block-heading","style":{"typography":{"letterSpacing":"-1px"}},"fontSize":"max-60"} -->
        <h2 class="wp-block-heading has-text-align-center has-max-60-font-size" style="letter-spacing:-1px">Colored Image Cards with links</h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Image Cards"},"align":"full","className":"is-style-default","style":{"spacing":{"margin":{"bottom":"0"}},"border":{"top":{"color":"var:preset|color|secondary","width":"1px"},"right":{"width":"0px","style":"none"},"bottom":{"color":"var:preset|color|secondary","width":"1px"},"left":{"width":"0px","style":"none"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-default" style="border-top-color:var(--wp--preset--color--secondary);border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;border-left-style:none;border-left-width:0px;margin-bottom:0"><!-- wp:columns {"align":"full","className":"flexline-stack-at-tablet","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0"}}},"stackAtTablet":true} -->
        <div class="wp-block-columns alignfull flexline-stack-at-tablet" style="margin-top:0"><!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(180deg,rgba(222,222,222,0.57) 3%,rgb(223,223,223) 79%)"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
            <div class="wp-block-column has-contrast-color has-text-color has-background has-link-color" style="background:linear-gradient(180deg,rgba(222,222,222,0.57) 3%,rgb(223,223,223) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","isUserOverlayColor":true,"focalPoint":{"x":0.82,"y":0.55},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:100%"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:82% 55%" data-object-fit="cover" data-object-position="82% 55%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Design</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">The foundation on which aesthetics, user experience, and functionality is built.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"className":""} -->
                        <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-text-link  flexline-icon-none"} -->
                            <div class="wp-block-button is-style-text-link  flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#">Learn More →</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","alt":"Delicious gourmet cheese topped with fresh berries and apricot jam.","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"duotone":"var:preset|duotone|secondary"}},"textColor":"base","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:100%"><img class="wp-block-cover__image-background" alt="Delicious gourmet cheese topped with fresh berries and apricot jam." src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Patterns</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">A preset bundle of blocks that empower builders and amplify their creativity.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"className":""} -->
                        <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-text-link  flexline-icon-none"} -->
                            <div class="wp-block-button is-style-text-link  flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#">Learn More →</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%)"}}} -->
            <div class="wp-block-column has-background" style="background:linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","focalPoint":{"x":0.19,"y":0.57},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|alternate"}}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:100%"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:19% 57%" data-object-fit="cover" data-object-position="19% 57%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|large","left":"var:preset|spacing|large","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
                        <div style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Layouts</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">A collection of full-page patterns used to showcase content or a message.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"className":""} -->
                        <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-text-link  flexline-icon-none"} -->
                            <div class="wp-block-button is-style-text-link  flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#">Learn More →</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%)"}}} -->
            <div class="wp-block-column has-background" style="background:linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","alt":"Happy senior couple embracing on a cozy sofa.","focalPoint":{"x":0.34,"y":1},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|dark"}}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:100%"><img class="wp-block-cover__image-background" alt="Happy senior couple embracing on a cozy sofa." src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:34% 100%" data-object-fit="cover" data-object-position="34% 100%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Styles</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">An essential element of web design used to create a visually striking design.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"className":""} -->
                        <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-text-link  flexline-icon-none"} -->
                            <div class="wp-block-button is-style-text-link  flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="#">Learn More →</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->