<?php

/**
 * Title: Sample page displaying all components.
 * Slug: flexline/sample-components
 * Categories: flexline-samples
 */
namespace FlexLine\flexline;
?>
<!-- wp:heading -->
<h2 class="wp-block-heading">Flexline Address Shortcode</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Below is the shortcode for displaying the local address from the customizer.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->
    [flexline_contact_info]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Call Now button</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Call Now button pattern uses the phone number set in the customizer by default and is ready for click to call. The styles can be adjust per instance.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"is-style-fill"} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="tel:9997776666" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Call Now</a></div>
    <!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Scroll to button</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>This button will overlap the section before and after and will scroll itself to the top of the page on click.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"scrollTo"} -->
    <div class="wp-block-button scrollTo" id="scrollTo"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
    <!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"},"metadata":{"name":"Boxes"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Box with text and button</h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Box - text and button"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Learn More</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Box - text and button"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Learn More</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">CTA Large</h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Footer CTA Group"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Card Link Container"},"enableGroupLink":true,"groupLinkURL":"#"} -->
    <div class="wp-block-group alignwide is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"hasParallax":true,"dimRatio":80,"overlayColor":"primary","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
            <div role="img" class="wp-block-cover__image-background wp-image-189 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"metadata":{"name":"Content Group"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Footer CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
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

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Footer CTA Group"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Card Link Container"},"enableGroupLink":true,"groupLinkURL":"#"} -->
    <div class="wp-block-group alignwide is-style-card"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"hasParallax":true,"dimRatio":80,"overlayColor":"primary","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
            <div role="img" class="wp-block-cover__image-background wp-image-189 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"metadata":{"name":"Content Group"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Footer CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
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

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Footer CTA Group"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Card Link Container"},"enableGroupLink":true,"groupLinkURL":"#"} -->
    <div class="wp-block-group alignwide is-style-outlined"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"hasParallax":true,"dimRatio":80,"overlayColor":"primary","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
            <div role="img" class="wp-block-cover__image-background wp-image-189 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"metadata":{"name":"Content Group"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Footer CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
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

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Footer CTA Group"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Card Link Container"},"enableGroupLink":true,"groupLinkURL":"#"} -->
    <div class="wp-block-group alignwide is-style-card-padded"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":189,"hasParallax":true,"dimRatio":80,"overlayColor":"primary","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignwide has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
            <div role="img" class="wp-block-cover__image-background wp-image-189 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div>
            <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"},"metadata":{"name":"Content Group"},"groupLinkURL":"#"} -->
                <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Footer CTA Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                    <p class="has-text-align-center is-style-text-shadow">Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
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

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"},"metadata":{"name":"Page Link CTAs"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Page Link CTAs</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Page CTA Light"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
    <div class="wp-block-group is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
            <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"constrained"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                    <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                    <p class="has-small-font-size" style="line-height:1.5">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"125px","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
            <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.1">Learn<br>More</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Page CTA Dark"},"enableGroupLink":true,"groupLinkURL":"/community/services-amenities/"} -->
    <div class="wp-block-group is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"},"border":{"radius":{"topLeft":"5px","topRight":"0px","bottomLeft":"5px","bottomRight":"0px"}}},"layout":{"type":"constrained"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                <div class="wp-block-group" style="border-top-left-radius:5px;border-top-right-radius:0px;border-bottom-left-radius:5px;border-bottom-right-radius:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading -->
                    <h2 class="wp-block-heading">Page Link</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                    <p class="has-small-font-size" style="line-height:1.5">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"125px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:125px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}},"border":{"top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"0px","style":"none"},"left":{"color":"var:preset|color|base","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                <div class="wp-block-group" style="border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-color:var(--wp--preset--color--base);border-left-width:1px;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.1">Learn<br>More</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">CTA Full Width</h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"backgroundColor":"primary","textColor":"base","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"CTA - Full Width"}} -->
<div class="wp-block-group alignfull is-style-default has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"metadata":{"name":"CTA - Basic - Row"}} -->
            <div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"large"} -->
                <p class="has-large-font-size" style="line-height:1.5">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"250px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:250px"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"fontSize":"small"} -->
                <div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button">Get Started Today</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"},"metadata":{"name":"CTA with Image"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">CTA - Card with image, heading, text, button</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Default:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":"stacked is-style-default","layout":{"type":"default"},"metadata":{"name":"CTA - Card with image, heading, text, button"}} -->
    <div class="wp-block-group stacked is-style-default" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-6001" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"15px","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:0;padding-bottom:var(--wp--preset--spacing--small);padding-left:0"><!-- wp:heading {"fontSize":"large"} -->
                <h2 class="wp-block-heading has-large-font-size">FlexLine WordPress Theme</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}}} -->
                <p style="line-height:1.5">The ultimate WordPress block theme for agencies and website builders.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Buy FlexLine</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph -->
    <p>Card w/ Padding:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":"stacked is-style-card-padded","layout":{"type":"default"},"metadata":{"name":"CTA - Card with image, heading, text, button"}} -->
    <div class="wp-block-group stacked is-style-card-padded" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-6001" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"15px","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:0;padding-bottom:var(--wp--preset--spacing--small);padding-left:0"><!-- wp:heading {"fontSize":"large"} -->
                <h2 class="wp-block-heading has-large-font-size">FlexLine WordPress Theme</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}}} -->
                <p style="line-height:1.5">The ultimate WordPress block theme for agencies and website builders.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Buy FlexLine</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph -->
    <p>Outlined w/ padding:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":"stacked is-style-outlined","layout":{"type":"default"},"metadata":{"name":"CTA - Card with image, heading, text, button"}} -->
    <div class="wp-block-group stacked is-style-outlined" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-6001" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"15px","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"0","right":"0"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:0;padding-bottom:var(--wp--preset--spacing--small);padding-left:0"><!-- wp:heading {"fontSize":"large"} -->
                <h2 class="wp-block-heading has-large-font-size">FlexLine WordPress Theme</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}}} -->
                <p style="line-height:1.5">The ultimate WordPress block theme for agencies and website builders.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Buy FlexLine</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Galleries</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Photo Poster Gallery Styles and Row </h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Gallery Row - Photo Poster"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Poster Gallery Group - Card"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-default"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Poster Gallery Group - Card"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Poster Gallery Group - Card"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Poster Gallery Group - Card"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Video Gallery Styles and Row </h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Gallery Row - Videos"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Popup - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Caption</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Popup - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Caption</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Popup - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Caption</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Popup - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Caption</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Mixed Media Styles and Row </h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Gallery Row - Media"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Mixed Media Feature - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
                <p class="has-text-align-left has-brand-font-family">Media Popup</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Mixed Media Feature - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
                <p class="has-text-align-left has-brand-font-family">Media Popup</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Mixed Media Feature - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
                <p class="has-text-align-left has-brand-font-family">Media Popup</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Mixed Media Feature - Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-alt"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://storage.googleapis.com/oaktracedg-prod-assets/virtual-tours/new/index.html#node12"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"left","fontFamily":"brand"} -->
                <p class="has-text-align-left has-brand-font-family">Media Popup</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Mixed Media Detailed Styles and Row </h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Gallery Row - Media Detailed"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Gallery Mixed Detailed Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Gallery Mixed Detailed Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Gallery Mixed Detailed Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Gallery Mixed Detailed Card"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-alt"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enablePopup":true,"popupMediaURL":"https://aldersly.org/wp-content/uploads/2022/11/ALD_IL_FloorPlans_V3-Studio-Deluxe.pdf"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|x-small"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"medium","fontFamily":"brand"} -->
                    <p class="has-text-align-left has-brand-font-family has-medium-font-size">Media Title</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 1</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"x-small","fontFamily":"display"} -->
                    <p class="has-display-font-family has-x-small-font-size" style="line-height:1.3">Media Detail 2</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--small)">Sticky Sub Navigation</h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-alternate","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Subnav Sticky"}} -->
<div class="wp-block-group alignfull is-style-default has-base-color has-primary-alternate-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":90,"minHeight":50,"gradient":"primary-primaryDark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:navigation {"ref":691,"overlayMenu":"never","align":"wide","className":"has-text-align-center is-style-horizontal-scroll-at-mobile is-style-light-over-dark","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.1"}},"fontSize":"medium","enableHorizontalScroll":true} /--></div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"},"metadata":{"name":"Pricing Tables"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Pricing Tables</h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Pricing Light"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
                    <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Pricing Light"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
                    <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Pricing Dark"}} -->
            <div class="wp-block-group is-style-card-padded has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
                    <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
                    <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
                    <!-- /wp:separator -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">Feature Item</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Tabs and Accordions - Plethora Plugin</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Accordion:</p>
<!-- /wp:paragraph -->

<!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion"} -->
<!-- wp:pattern {"slug":"flexline/flexline/product-card"} /-->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion"} -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Address Block</h3>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->
    [flexline_contact_info]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion"} -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained","wideSize":"800px"},"metadata":{"name":"Video Feature and Buttons"}} -->
<div class="wp-block-group alignwide"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"className":"wp-block-heading","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-x-large-font-size" id="image-heading-text-buttons" style="margin-top:var(--wp--preset--spacing--medium)">Watch this video</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained","wideSize":"600px"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secondary-color has-text-color has-link-color wp-element-button">Learn More</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:paragraph -->
<p>Vertical Tabs:</p>
<!-- /wp:paragraph -->

<!-- wp:plethoraplugins/tabs {"layout":"vertical","tabLabels":["Vertical Tab 1","Vertical Tab 2","Basic Content"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 1","parentLayout":"vertical"} -->
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:heading -->
    <h2 class="wp-block-heading">Sample Content</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 2","parentLayout":"vertical"} -->
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Pricing Light"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
        <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Basic Content","parentLayout":"vertical"} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Headline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:paragraph -->
<p>Tabs:</p>
<!-- /wp:paragraph -->

<!-- wp:plethoraplugins/tabs {"tabLabels":["Tab 1","Tab 2"],"tabIds":[null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Tab 1","parentLayout":"horizontal"} -->
<!-- wp:pattern {"slug":"flexline/feature-text-video"} /-->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Tab 2","parentLayout":"horizontal"} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Sample Tab content</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content..."} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Teams "}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Team Modules</h2>
    <!-- /wp:heading -->

    <!-- wp:heading {"level":3} -->
    <h3 class="wp-block-heading">Team Member Styles</h3>
    <!-- /wp:heading -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"0"}},"layout":{"type":"constrained"},"metadata":{"name":"Team Members - Card"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Team Member"}} -->
                <div class="wp-block-group is-style-default"><!-- wp:image {"align":"center","id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Name and Title"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Team Member"}} -->
                <div class="wp-block-group is-style-card-padded"><!-- wp:image {"align":"center","id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Name and Title"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Team Member"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:image {"align":"center","id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Name and Title"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Team Member"}} -->
                <div class="wp-block-group is-style-card-alt"><!-- wp:image {"align":"center","id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Name and Title"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:heading {"level":3} -->
    <h3 class="wp-block-heading">Team Leadership Styles</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Default:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team - Leadership Card Group"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default","layout":{"type":"default"},"metadata":{"name":"Leadership Card"}} -->
        <div class="wp-block-group alignwide is-style-default" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
            <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                            <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                            <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph -->
                        <p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph -->
    <p>Outlined w/ padding:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team - Leadership Card Group"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-outlined","layout":{"type":"default"},"metadata":{"name":"Leadership Card"}} -->
        <div class="wp-block-group alignwide is-style-outlined" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
            <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                            <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                            <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph -->
                        <p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph -->
    <p>Card w/ padding:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team - Leadership Card Group"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-card-padded","layout":{"type":"default"},"metadata":{"name":"Leadership Card"}} -->
        <div class="wp-block-group alignwide is-style-card-padded" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
            <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                            <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                            <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph -->
                        <p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph -->
    <p>Card:</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team - Leadership Card Group"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-card","layout":{"type":"default"},"metadata":{"name":"Leadership Card"}} -->
        <div class="wp-block-group alignwide is-style-card" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
            <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                            <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                            <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph -->
                        <p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":""} -->
                <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"},"metadata":{"name":"Testimonials"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading -->
    <h2 class="wp-block-heading">Testimonials</h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Card"}} -->
            <div class="wp-block-group is-style-default"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small","fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family has-small-font-size"><strong>—Allison Taylor, Designer</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Card"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small","fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family has-small-font-size"><strong>—Allison Taylor, Designer</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Card"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small","fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family has-small-font-size"><strong>—Allison Taylor, Designer</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:heading -->
    <h2 class="wp-block-heading">Testimonials w/ Images</h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Testimonial with Picture"}} -->
            <div class="wp-block-group is-style-default"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:image {"id":354,"width":"60px","height":"60px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}},"className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-354" style="border-radius:50px;width:60px;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.5"}},"layout":{"type":"constrained"},"fontFamily":"display","metadata":{"name":"Cite"}} -->
                    <div class="wp-block-group has-display-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1.5"><!-- wp:paragraph {"fontSize":"medium"} -->
                        <p class="has-medium-font-size"><strong>Allison Taylor</strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-x-small-font-size" style="text-transform:uppercase">Designer</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Testimonial with Picture"}} -->
            <div class="wp-block-group is-style-card-padded"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:image {"id":354,"width":"60px","height":"60px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}},"className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-354" style="border-radius:50px;width:60px;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.5"}},"layout":{"type":"constrained"},"fontFamily":"display","metadata":{"name":"Cite"}} -->
                    <div class="wp-block-group has-display-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1.5"><!-- wp:paragraph {"fontSize":"medium"} -->
                        <p class="has-medium-font-size"><strong>Allison Taylor</strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-x-small-font-size" style="text-transform:uppercase">Designer</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Testimonial with Picture"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:image {"id":354,"width":"60px","height":"60px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}},"className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-354" style="border-radius:50px;width:60px;height:60px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.5"}},"layout":{"type":"constrained"},"fontFamily":"display","metadata":{"name":"Cite"}} -->
                    <div class="wp-block-group has-display-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1.5"><!-- wp:paragraph {"fontSize":"medium"} -->
                        <p class="has-medium-font-size"><strong>Allison Taylor</strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                        <p class="has-x-small-font-size" style="text-transform:uppercase">Designer</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:heading -->
    <h2 class="wp-block-heading">Testimonials Wide</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Default:</p>
    <!-- /wp:paragraph -->

    <!-- wp:quote {"align":"right","className":"is-style-default","fontFamily":"display"} -->
    <blockquote class="wp-block-quote has-text-align-right is-style-default has-display-font-family"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"align":"center","id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
                <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                    <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns --><cite>Someone's Name</cite>
    </blockquote>
    <!-- /wp:quote -->

    <!-- wp:paragraph -->
    <p>Outlined w/ padding: </p>
    <!-- /wp:paragraph -->

    <!-- wp:quote {"align":"right","className":"is-style-outlined","fontFamily":"display"} -->
    <blockquote class="wp-block-quote has-text-align-right is-style-outlined has-display-font-family"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"align":"center","id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
                <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                    <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns --><cite>Someone's Name</cite>
    </blockquote>
    <!-- /wp:quote -->

    <!-- wp:paragraph -->
    <p>Card w/ padding:</p>
    <!-- /wp:paragraph -->

    <!-- wp:quote {"align":"right","className":"is-style-card-padded","fontFamily":"display"} -->
    <blockquote class="wp-block-quote has-text-align-right is-style-card-padded has-display-font-family"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"align":"center","id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
                <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                    <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns --><cite>Someone's Name</cite>
    </blockquote>
    <!-- /wp:quote -->

    <!-- wp:paragraph -->
    <p>Shadow:</p>
    <!-- /wp:paragraph -->

    <!-- wp:quote {"align":"right","className":"is-style-shadow-diffused","fontFamily":"display"} -->
    <blockquote class="wp-block-quote has-text-align-right is-style-shadow-diffused has-display-font-family"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
            <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"align":"center","id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
                <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                    <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns --><cite>Someone's Name</cite>
    </blockquote>
    <!-- /wp:quote -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->