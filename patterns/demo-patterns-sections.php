<?php

/**
 * Title: Demo Patterns - Sections
 * Slug: flexline/demo-patterns-sections
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>The <strong>Section Patterns</strong> are ready-made building blocks for full-width sections and complex page structures — like sidebars, link lists, featured content, and timelines. Each pattern is tested and fully responsive, so you can trust they’ll look great and work well on any screen size. Use these flexible layouts to organize your content clearly and keep your pages easy to navigate.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"extra-z-index is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull extra-z-index is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#Colored-Cards">Color Cards</a> | <a href="#Colored-Image-Cards-with-links">Image Cards</a> | <a href="#Features-Section">Features Section</a> | <a href="#Page-Links">Page Links</a> | <a href="#Page-Links-with-Sticky-sidebar">Page Links with Sticky sidebar</a> | <a href="#Section-with-Sidebar">Section with Sidebar</a> | <a href="#Timeline">Timeline</a> | <a href="#Posts-Scroll">Posts Scroll</a> | <a href="#Latest-Posts">Latest Posts</a> | <a href="#Media-Modal-Wide-cards">Media Modal Wide cards</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Colored Cards with links","categories":["flexline-sections"],"patternName":"flexline/section-colored-box-links"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"var:preset|spacing|large"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--large);padding-top:0;padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text"},"className":"","layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
        <h3 class="wp-block-heading" id="Colored-Cards">Color Cards with links</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":""} -->
        <p>This section makes for a great page intro and takes advantage of the Flexline text link style for buttons.</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","className":"wp-block-heading","style":{"typography":{"letterSpacing":"-1px"}},"fontSize":"max-60"} -->
        <h2 class="wp-block-heading has-text-align-center has-max-60-font-size" id="text-on-left-image-on-right" style="letter-spacing:-1px">Colored cards with links</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.5"}}} -->
        <p class="has-text-align-center" style="line-height:1.5">This pattern offers another way drive traffic down a content funnel. The card container in this case has the "Card" style variation applied.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Boxes - colored background"},"align":"wide","className":"is-style-card","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide is-style-card"><!-- wp:columns {"align":"wide","className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--medium)"><!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"neutral"} -->
            <div class="wp-block-column has-neutral-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:25%"><!-- wp:paragraph {"className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"max-72","fontFamily":"display"} -->
                <p class="has-display-font-family has-max-72-font-size" style="font-style:normal;font-weight:400;line-height:1">01</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"className":"wp-block-heading","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                <h3 class="wp-block-heading has-small-font-size" style="text-transform:uppercase">Design</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="line-height:1.5">The foundation on which aesthetics, user experience, and functionality is built.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                <p class="has-small-font-size"><a href="#features">Learn More →</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"primary","textColor":"base"} -->
            <div class="wp-block-column has-base-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:25%"><!-- wp:paragraph {"className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"max-72","fontFamily":"display"} -->
                <p class="has-display-font-family has-max-72-font-size" style="font-style:normal;font-weight:400;line-height:1">02</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"className":"wp-block-heading","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                <h3 class="wp-block-heading has-small-font-size" style="text-transform:uppercase">Patterns</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="line-height:1.5">A preset bundle of blocks that empower builders and amplify their creativity.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"small"} -->
                <p class="has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"secondary","textColor":"base"} -->
            <div class="wp-block-column has-base-color has-secondary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:25%"><!-- wp:paragraph {"className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"max-72","fontFamily":"display"} -->
                <p class="has-display-font-family has-max-72-font-size" style="font-style:normal;font-weight:400;line-height:1">03</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"className":"wp-block-heading","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                <h3 class="wp-block-heading has-small-font-size" style="text-transform:uppercase">Layouts</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="line-height:1.5">A collection of full-page patterns used to showcase content or a message.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"small"} -->
                <p class="has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"contrast","textColor":"base"} -->
            <div class="wp-block-column has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:25%"><!-- wp:paragraph {"className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"max-72","fontFamily":"display"} -->
                <p class="has-display-font-family has-max-72-font-size" style="font-style:normal;font-weight:400;line-height:1">04</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"className":"wp-block-heading","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                <h3 class="wp-block-heading has-small-font-size" style="text-transform:uppercase">Styles</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="line-height:1.5">An essential element of web design used to create a visually striking design.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"small"} -->
                <p class="has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/a0be14a17e634a688a4afeae8ca3f227?sid=62d211fa-a1d5-4169-b3af-deed1aaa3b21"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/a0be14a17e634a688a4afeae8ca3f227-67ba0fd9d867730f-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Colored-Image-Cards-with-links">Colored Image Cards with links</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section makes for a good home page section linking to pages deeper in the site. It takes advantage of halftone styles on images to differentiate the page links.</p>
<!-- /wp:paragraph -->

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

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/ce8445feda0a4d37bd3119411c1061f5?sid=71024f48-892f-4f39-bfe7-d96e844ec66c"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ce8445feda0a4d37bd3119411c1061f5-eb8d62269ecf3a21-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Features-Section">Features Section</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section uses the Feature Page with cover image pattern to feature your most important pages in section with a fixed background image and color set. The Feature Page with cover image patter can reverse the rows to alternate what side the image is on.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Featured Section","categories":["flexline-sections"],"patternName":"flexline/section-cover-boxes"},"align":"full","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","hasParallax":true,"dimRatio":90,"overlayColor":"primary","isUserOverlayColor":true,"align":"full","className":"","style":{"color":{"duotone":["#000000","#ffffff"]},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
        <div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-48-font-size">Feature Section</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
            <p class="has-text-align-center is-style-text-shadow">This pattern sets up a background with a cover block to feature sections of content. In this case we're using the Feature Page with cover image pattern as the feature.</p>
            <!-- /wp:paragraph -->

            <!-- wp:pattern {"slug":"flexline/feature-page-cover"} /-->
            
            <!-- wp:pattern {"slug":"flexline/feature-page-cover"} /-->

        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/80b62a580acf46ae91b851dbbcc6b9d5?sid=d91f9d32-c163-4049-aa98-4b28d3099523"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/80b62a580acf46ae91b851dbbcc6b9d5-38b713c026849512-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Page-Links">Page Links</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The Page Links section uses the Page CTA Light ( or dark ) components to create a list of feature pages with a subtle background color and image. This section also uses a Sticky Sub-navigation to help maintain some context .</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"50px","className":""} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"flexline/section-page-links"} /-->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/abcf77eee2ee44ce9f55569b87907cd7?sid=ff3a1ec4-3f3f-4202-8726-509e034794f0"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/abcf77eee2ee44ce9f55569b87907cd7-e7a3aa1c5148b459-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Page-Links-with-Sticky-sidebar">Page Links with Sticky sidebar</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section provides a layout with sticky left sidebar with a list of Page CTA Light ( or dark ) components.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"50px","className":""} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"flexline/section-page-links-sticky-sidebar"} /-->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/f55fb756d46545dd8c77c4ef92582455?sid=5f015beb-6643-4443-8088-fb139a7853e0"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/f55fb756d46545dd8c77c4ef92582455-2f99f022101245b1-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Section-with-Sidebar">Section with Sidebar (sticky)</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":""} -->
<p>This section provides a layout with sticky left sidebar sub navigation. The right section feature a couple of sample content items but any combo of existing patterns could be used in the right column.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Section with Sidebar (sticky)","categories":["flexline-sections"],"patternName":"flexline/section-sidebar"},"align":"full","className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"metadata":{"name":"Section Columns"},"align":"wide","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"300px","metadata":{"name":"Small Column"},"className":"flexline-hide-on-mobile flexline-hide-on-tablet","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"hideOnTablet":true,"hideOnMobile":true} -->
        <div class="wp-block-column flexline-hide-on-mobile flexline-hide-on-tablet" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:300px"><!-- wp:group {"metadata":{"name":"Sticky Group"},"className":"","style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0"><!-- wp:group {"metadata":{"name":"Subnav Container"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":""}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"dimRatio":90,"minHeight":50,"gradient":"primary-primaryDark","metadata":{"name":"Subnav Background"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
                        <div class="wp-block-cover__inner-container"><!-- wp:navigation {"ref":78,"overlayMenu":"never","align":"wide","className":"has-text-align-center is-style-light-over-dark","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.1"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap","orientation":"vertical"}} /--></div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"","metadata":{"name":"Large Column"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Content Group with Background"},"align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|medium"}},"gradient":"neutral-neutralLight","layout":{"type":"constrained"}} -->
            <div class="wp-block-group alignfull has-neutral-neutralLight-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":""} -->
                <h2 class="wp-block-heading">Section with Background</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":""} -->
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <!-- /wp:paragraph -->

                <!-- wp:pattern {"slug":"flexline/columns-multirow"} /-->

            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"className":"is-style-dots"} -->
            <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
            <!-- /wp:separator -->

            <!-- wp:heading {"textAlign":"center","className":""} -->
            <h2 class="wp-block-heading has-text-align-center">Frequently Asked Questions</h2>
            <!-- /wp:heading -->

            <!-- wp:pattern {"slug":"flexline/tabs-accordion"} /-->

        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/f7f5bfd3e1d944e8beca058fec5075fe?sid=b0227215-23ca-42cf-a604-f4695225cdc7"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/f7f5bfd3e1d944e8beca058fec5075fe-d2d0d3ffb3702d48-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Timeline">Timeline Columns Slider</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The <strong>Timeline Columns Slider</strong> pattern uses Flexline’s powerful custom options for the Columns block to create a smooth, scrollable timeline layout. This turns a simple set of columns into an interactive horizontal content slider — perfect for showcasing steps in a process, milestones, or related content side by side. Each <strong>Column</strong> acts as a timeline item — just add your content blocks inside (like images, text, quotes, or media).</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Timeline Columns Container","categories":["flexline-sections"],"patternName":"flexline/section-timeline-columns"},"align":"wide","className":"is-style-card-padded","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|small","right":"0"}},"shadow":"var:preset|shadow|diffused"},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--small);box-shadow:var(--wp--preset--shadow--diffused)"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Timeline Columns Slider"},"align":"full","className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary scroller-buttons-box-shadow","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"left":"0"}}},"enableHorizontalScroller":true,"scrollAuto":true,"scrollLoop":true,"hideScrollbar":true,"buttonsBoxShadow":true,"transitionDuration":400} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary scroller-buttons-box-shadow" style="padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:275px"><!-- wp:heading {"className":""} -->
            <h2 class="wp-block-heading">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":""} -->
            <p>This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Poster Gallery Group - Card"},"className":"is-style-default group-link group-link-type-none","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"enableGroupLink":true,"groupLinkURL":"#"} -->
            <div class="wp-block-group is-style-default group-link group-link-type-none"><!-- wp:gallery {"columns":3,"linkTo":"media","className":"poster-gallery","style":{"layout":{"selfStretch":"fill","flexSize":null}},"enablePosterGallery":true} -->
                <figure class="wp-block-gallery has-nested-images columns-3 is-cropped poster-gallery"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                    <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":""} -->
                    <figure class="wp-block-image size-large"><a href="<?php echo esc_url(feature_image_fallback()); ?>"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->

                <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"textTransform":"none"}},"fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Poster Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"350px","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:350px">
            
            <!-- wp:pattern {"slug":"flexline/testimonial-card"} /-->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:275px"><!-- wp:heading {"textAlign":"center","className":""} -->
            <h2 class="wp-block-heading has-text-align-center">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":""} -->
            <p class="has-text-align-center">This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"500px","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:500px"><!-- wp:group {"metadata":{"name":"Video Modal - Card"},"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"groupLinkType":"modal_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","className":"","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"800px","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:800px">
            
            <!-- wp:pattern {"slug":"flexline/testimonial-wide"} /-->

        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/1453e1d8345248769ce63ee30c3c925a?sid=e4a63b6e-3f02-422d-959a-48bc2a0f94d9"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/1453e1d8345248769ce63ee30c3c925a-3830c07cc0ae3a46-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Posts-Scroll">Horizontal Posts Scroll</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The <strong>Horizontal Posts Scroll</strong> pattern combines WordPress’s <strong>Query Loop</strong> block with Flexline’s custom scroller options to display your latest posts in a smooth, side-scrolling slider. It’s perfect for highlighting featured blog posts, news, or any repeatable post type in a more dynamic way. The Query Loop automatically pulls in your latest posts (or any post type you choose) and displays each one inside the Post Template block.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/section-horizontal-posts-scroll"} /-->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/e956bd7be50f4dfc993393fadc653ce3?sid=b47b3c74-b262-41a0-998c-cbab9de0c617"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/e956bd7be50f4dfc993393fadc653ce3-b78867b38975de13-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Latest-Posts">Latest Posts</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>Showing the 3 latest post.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/section-latest-posts"} /-->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/2a311f8afa6a4a97944c719f9c471b9d?sid=fe114c94-6aaf-4245-9e5b-a1bb582d10bf"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/2a311f8afa6a4a97944c719f9c471b9d-e700b516a9adf61a-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Media-Modal-Wide-cards">Media Modal Wide cards</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section provides alternating layouts with images that click open modals for video or other web content in an iframe.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/section-gallery-wide-modal-cards"} /-->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/ea62ee08772840489bc066d74ddb668f?sid=aca8fcce-2e99-44d4-b8cf-0bfb06d99ba4"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ea62ee08772840489bc066d74ddb668f-69cc7871bef514d1-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->