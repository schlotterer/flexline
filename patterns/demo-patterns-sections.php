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
        <h2 class="wp-block-heading has-text-align-center has-max-60-font-size" id="text-on-left-image-on-right" style="letter-spacing:-1px">Colored Image Boxes</h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Image Cards"},"align":"full","className":"is-style-default","style":{"spacing":{"margin":{"bottom":"0"}},"border":{"top":{"color":"var:preset|color|secondary","width":"1px"},"right":{"width":"0px","style":"none"},"bottom":{"color":"var:preset|color|secondary","width":"1px"},"left":{"width":"0px","style":"none"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-default" style="border-top-color:var(--wp--preset--color--secondary);border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;border-left-style:none;border-left-width:0px;margin-bottom:0"><!-- wp:columns {"align":"full","className":"flexline-stack-at-tablet","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0"}}},"stackAtTablet":true} -->
        <div class="wp-block-columns alignfull flexline-stack-at-tablet" style="margin-top:0"><!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(180deg,rgba(222,222,222,0.57) 3%,rgb(223,223,223) 79%)"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
            <div class="wp-block-column has-contrast-color has-text-color has-background has-link-color" style="background:linear-gradient(180deg,rgba(222,222,222,0.57) 3%,rgb(223,223,223) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":631,"isUserOverlayColor":true,"focalPoint":{"x":0.82,"y":0.55},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|large","left":"var:preset|spacing|large","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><img class="wp-block-cover__image-background wp-image-631" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:82% 55%" data-object-fit="cover" data-object-position="82% 55%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Design</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">The foundation on which aesthetics, user experience, and functionality is built.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"secondary","fontSize":"small"} -->
                        <p class="has-secondary-color has-text-color has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":633,"alt":"Delicious gourmet cheese topped with fresh berries and apricot jam.","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|large","left":"var:preset|spacing|large","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"duotone":"var:preset|duotone|secondary"}},"textColor":"base","layout":{"type":"constrained"}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><img class="wp-block-cover__image-background wp-image-633" alt="Delicious gourmet cheese topped with fresh berries and apricot jam." src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Patterns</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">A preset bundle of blocks that empower builders and amplify their creativity.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"secondary","fontSize":"small"} -->
                        <p class="has-secondary-color has-text-color has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%)"}}} -->
            <div class="wp-block-column has-background" style="background:linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":636,"focalPoint":{"x":0.19,"y":0.57},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|alternate"}}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><img class="wp-block-cover__image-background wp-image-636" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:19% 57%" data-object-fit="cover" data-object-position="19% 57%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|large","left":"var:preset|spacing|large","top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
                        <div style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Layouts</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">A collection of full-page patterns used to showcase content or a message.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"secondary","fontSize":"small"} -->
                        <p class="has-secondary-color has-text-color has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                        <!-- /wp:paragraph -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%","className":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|x-small"},"color":{"gradient":"linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%)"}}} -->
            <div class="wp-block-column has-background" style="background:linear-gradient(177deg,rgba(176,132,76,0.31) 0%,rgb(175,132,75) 79%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":638,"alt":"Happy senior couple embracing on a cozy sofa.","focalPoint":{"x":0.34,"y":1},"minHeight":100,"minHeightUnit":"%","gradient":"dark-transparent-bottom-to-top","contentPosition":"bottom center","align":"full","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|x-small"},"color":{"duotone":"var:preset|duotone|dark"}}} -->
                <div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><img class="wp-block-cover__image-background wp-image-638" alt="Happy senior couple embracing on a cozy sofa." src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:34% 100%" data-object-fit="cover" data-object-position="34% 100%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-dark-transparent-bottom-to-top-gradient-background"></span>
                    <div class="wp-block-cover__inner-container"><!-- wp:spacer {"className":""} -->
                        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:heading {"level":3,"className":"wp-block-heading is-style-text-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"max-36"} -->
                        <h3 class="wp-block-heading is-style-text-shadow has-max-36-font-size" style="text-transform:uppercase">Styles</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="line-height:1.5">An essential element of web design used to create a visually striking design.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"secondary","fontSize":"small"} -->
                        <p class="has-secondary-color has-text-color has-link-color has-small-font-size"><a href="#">Learn More →</a></p>
                        <!-- /wp:paragraph -->
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
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":356,"hasParallax":true,"dimRatio":90,"overlayColor":"primary","isUserOverlayColor":true,"align":"full","className":"","style":{"color":{"duotone":["#000000","#ffffff"]},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
        <div class="wp-block-cover__image-background wp-image-356 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(feature_image_fallback()); ?>)"></div><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-48-font-size">Feature Section</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
            <p class="has-text-align-center is-style-text-shadow">This pattern sets up a background with a cover block to feature sections of content. In this case we're using the Feature Page with cover image pattern as the feature.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"metadata":{"name":"Feature Page with cover image","categories":["flexline-modules"],"patternName":"flexline/feature-page-cover"},"className":"is-style-card group-link-type-none","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card group-link-type-none"><!-- wp:columns {"metadata":{"name":"Content Columns"},"className":"is-style-columns-reverse","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
                <div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                            <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                            <p class="has-contrast-color has-text-color has-link-color">This pattern can be used to tease site content. It uses a cover block and image to create visual interest and respond flexibly to variable content and breakpoints. You can also reverse the columns and choose if you want the image first on mobile in each use.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                            <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button {"className":"enable-modal  flexline-icon-internal-link","iconType":"internal-link","enableModal":true} -->
                                <div class="wp-block-button enable-modal  flexline-icon-internal-link"><a class="wp-block-button__link wp-element-button" href="#">View More</a></div>
                                <!-- /wp:button -->
                            </div>
                            <!-- /wp:buttons -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"stretch","metadata":{"name":"Image Column"},"className":""} -->
                    <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":186,"dimRatio":50,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Fill Image (Cover)"},"className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span>
                            <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"150px","metadata":{"name":"Mobile View Space Holder"},"className":""} -->
                                <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                            </div>
                        </div>
                        <!-- /wp:cover -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Feature Page with cover image","categories":["flexline-modules"],"patternName":"flexline/feature-page-cover"},"className":"is-style-card group-link-type-none","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-card group-link-type-none"><!-- wp:columns {"metadata":{"name":"Content Columns"},"className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
                <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch","metadata":{"name":"Image Column"},"className":""} -->
                    <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":186,"dimRatio":50,"overlayColor":"primary","isUserOverlayColor":true,"focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Fill Image (Cover)"},"className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" /><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span>
                            <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"150px","metadata":{"name":"Mobile View Space Holder"},"className":""} -->
                                <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                            </div>
                        </div>
                        <!-- /wp:cover -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
                    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                        <div class="wp-block-group"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                            <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                            <p class="has-contrast-color has-text-color has-link-color">This pattern can be used to tease site content. It uses a cover block and image to create visual interest and respond flexibly to variable content and breakpoints. You can also reverse the columns and choose if you want the image first on mobile in each use.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:buttons {"className":"","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                            <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button {"className":"enable-modal  flexline-icon-internal-link","iconType":"internal-link","enableModal":true} -->
                                <div class="wp-block-button enable-modal  flexline-icon-internal-link"><a class="wp-block-button__link wp-element-button" href="#">View More</a></div>
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
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Page-Links">Page Links</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The Page Links section uses the Page CTA Light ( or dark ) components to create a list of feature pages with a subtle background color and image. This section also uses a Sticky Sub-navigation to help maintain some context .</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"50px","className":""} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Page Links","categories":["flexline-sections"],"patternName":"flexline/section-page-links"},"align":"full","className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Subnav Sticky"},"align":"full","className":"extra-z-index is-style-shadow-dark","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull extra-z-index is-style-shadow-dark has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":54,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"top":"17px","bottom":"17px","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover alignfull" style="padding-top:17px;padding-right:var(--wp--preset--spacing--large);padding-bottom:17px;padding-left:var(--wp--preset--spacing--large);min-height:54px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:navigation {"ref":31,"overlayMenu":"never","align":"wide","className":"has-text-align-center is-style-horizontal-scroll-at-mobile is-style-light-over-dark","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400","lineHeight":"1.1"}},"fontSize":"small","fontFamily":"display","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"enableHorizontalScroll":true} /--></div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:group -->

    <!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":169,"dimRatio":90,"overlayColor":"neutral","isUserOverlayColor":true,"isDark":false,"align":"full","className":"","style":{"color":{"duotone":["#000000","#ffffff"]},"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light" style="margin-top:0"><img class="wp-block-cover__image-background wp-image-169" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                        <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Page-Links-with-Sticky-sidebar">Page Links with Sticky sidebar</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section provides a layout with sticky left sidebar with a list of Page CTA Light ( or dark ) components.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"50px","className":""} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Page Links Sticky Sidebar","categories":["flexline-sections"],"patternName":"flexline/section-page-links-sticky-sidebar"},"align":"full","className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"gradient":"secondary-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-primary-gradient-background has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"hasParallax":true,"isRepeated":true,"dimRatio":80,"isUserOverlayColor":true,"gradient":"neutralDark-neutralLight","metadata":{"name":"Page Links Background"},"align":"full","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax is-repeated" style="margin-top:0;margin-bottom:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim has-background-gradient has-neutralDark-neutralLight-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:columns {"metadata":{"name":"Sidebar Section"},"align":"wide","className":"flexline-stack-at-tablet","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"stackAtTablet":true} -->
            <div class="wp-block-columns alignwide flexline-stack-at-tablet"><!-- wp:column {"width":"35%","metadata":{"name":"Small Column"},"className":""} -->
                <div class="wp-block-column" style="flex-basis:35%"><!-- wp:group {"metadata":{"name":"Sticky Container"},"className":"","style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"0","right":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Subnav Sticky"},"className":"is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"position":{"type":""},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group is-style-card has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"dimRatio":90,"minHeight":50,"gradient":"primary-primaryDark","contentPosition":"center center","className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
                            <div class="wp-block-cover" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
                                <div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"","fontSize":"max-48"} -->
                                    <h2 class="wp-block-heading has-max-48-font-size"><strong>Page Links</strong></h2>
                                    <!-- /wp:heading -->

                                    <!-- wp:paragraph {"className":""} -->
                                    <p>This section uses a sticky sidebar to hold context while you continue to scroll through link cards.</p>
                                    <!-- /wp:paragraph -->

                                    <!-- wp:paragraph {"className":""} -->
                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec sed odio dui.</p>
                                    <!-- /wp:paragraph -->
                                </div>
                            </div>
                            <!-- /wp:cover -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"65%","metadata":{"name":"Large Column"},"className":"","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:65%"><!-- wp:group {"metadata":{"name":"Content Group"},"align":"wide","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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

                        <!-- wp:group {"metadata":{"name":"Page CTA Light","categories":["flexline-cta"],"patternName":"flexline/cta-page-link-bar"},"className":"group-link group-link-type-none is-style-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"},"enableGroupLink":true,"groupLinkURL":"/health-services/assisted-living"} -->
                        <div class="wp-block-group group-link group-link-type-none is-style-card has-base-color has-primary-background-color has-text-color has-background has-link-color"><!-- wp:columns {"templateLock":"all","lock":{"move":true,"remove":true},"metadata":{"name":"CTA content columns"},"className":"","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Title and Text Column"},"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-contrast-color has-text-color has-link-color"><!-- wp:group {"metadata":{"name":"Title and Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"base","layout":{"type":"default"},"groupLinkURL":"/events","groupLinkType":"new_tab"} -->
                                    <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
                                        <h2 class="wp-block-heading has-primary-color has-text-color has-link-color">Page Link</h2>
                                        <!-- /wp:heading -->

                                        <!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"","style":{"typography":{"lineHeight":"1.5"},"layout":{"selfStretch":"fixed","flexSize":"720px"}},"fontSize":"small"} -->
                                        <p class="has-small-font-size" style="line-height:1.5">The page link CTAs use the "Enable Group Link" option on the containing group allowing the entire CTA to be clickable.</p>
                                        <!-- /wp:paragraph -->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:column -->

                                <!-- wp:column {"verticalAlignment":"center","width":"125px","metadata":{"name":"Learn More Text Column"},"className":"","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary"} -->
                                <div class="wp-block-column is-vertically-aligned-center has-primary-background-color has-background" style="flex-basis:125px"><!-- wp:group {"metadata":{"name":"Learn More Text"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
                                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
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
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Section-with-Sidebar">Section with Sidebar (sticky)</h3>
<!-- /wp:heading -->

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

                <!-- wp:group {"metadata":{"name":"Columns with multiple rows"},"align":"wide","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group alignwide"><!-- wp:columns {"align":"wide","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-columns alignwide"><!-- wp:column {"className":""} -->
                        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                                <h3 class="wp-block-heading">Info Box</h3>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                                <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"className":""} -->
                        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                                <h3 class="wp-block-heading">Info Box</h3>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                                <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"className":""} -->
                        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                                <h3 class="wp-block-heading">Info Box</h3>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                                <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->
                    </div>
                    <!-- /wp:columns -->

                    <!-- wp:columns {"align":"wide","className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-columns alignwide"><!-- wp:column {"className":""} -->
                        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                                <h3 class="wp-block-heading">Info Box</h3>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                                <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"className":""} -->
                        <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Info Box"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3,"className":""} -->
                                <h3 class="wp-block-heading">Info Box</h3>
                                <!-- /wp:heading -->

                                <!-- wp:paragraph {"className":"","fontSize":"small"} -->
                                <p class="has-small-font-size">A simple box with headline and content ready for use in columns with variable styles.</p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column {"className":""} -->
                        <div class="wp-block-column"></div>
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

            <!-- wp:heading {"textAlign":"center","className":""} -->
            <h2 class="wp-block-heading has-text-align-center">Frequently Asked Questions</h2>
            <!-- /wp:heading -->

            <!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null],"className":"","metadata":{"name":"Accordion","categories":["flexline-misc"],"patternName":"flexline/tabs-accordion"}} -->
            <!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion","className":""} -->
            <!-- wp:heading {"className":""} -->
            <h2 class="wp-block-heading">Sample Section</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
            <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            <!-- /wp:paragraph -->
            <!-- /wp:plethoraplugins/tab -->

            <!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion","className":""} -->
            <!-- wp:heading {"className":""} -->
            <h2 class="wp-block-heading">Sample Section 2</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
            <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            <!-- /wp:paragraph -->
            <!-- /wp:plethoraplugins/tab -->

            <!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion","className":""} -->
            <!-- wp:heading {"className":""} -->
            <h2 class="wp-block-heading">Sample Section 3</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"placeholder":"Tab content...","className":""} -->
            <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            <!-- /wp:paragraph -->
            <!-- /wp:plethoraplugins/tab -->
            <!-- /wp:plethoraplugins/tabs -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

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
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--small);box-shadow:var(--wp--preset--shadow--diffused)"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Timeline Columns Slider"},"align":"full","className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"left":"0"}}},"enableHorizontalScroller":true,"scrollAuto":true,"scrollLoop":true,"hideScrollbar":true,"buttonsBoxShadow":true,"transitionDuration":400} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-buttons-vertical-bottom horizontal-scroller-hide-scrollbar horizontal-scroller-buttons-horizontal-left horizontal-scroller-auto scroller-pause-on-hover scroller-buttons-border-none horizontal-scroller-loop scroller-buttons-text-white scroller-buttons-background-secondary" style="padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
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
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);flex-basis:350px"><!-- wp:group {"metadata":{"name":"Testimonial Card"},"className":"is-style-card-padded","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-card-padded has-contrast-color has-text-color has-link-color"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
                <p class="has-text-align-center has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","className":"","style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","className":"","fontSize":"small","fontFamily":"display"} -->
                <p class="has-text-align-center has-display-font-family has-small-font-size"><strong>—Allison Taylor, Designer</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
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
            <div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","className":"","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"800px","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:800px"><!-- wp:quote {"textAlign":"right","className":"is-style-default","fontFamily":"display"} -->
            <blockquote class="wp-block-quote has-text-align-right is-style-default has-display-font-family"><!-- wp:columns {"className":""} -->
                <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
                    <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100px"}}} -->
                        <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
                    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
                        <div class="wp-block-group"><!-- wp:paragraph {"className":"","style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
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
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Posts-Scroll">Horizontal Posts Scroll</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>The <strong>Horizontal Posts Scroll</strong> pattern combines WordPress’s <strong>Query Loop</strong> block with Flexline’s custom scroller options to display your latest posts in a smooth, side-scrolling slider. It’s perfect for highlighting featured blog posts, news, or any repeatable post type in a more dynamic way. The Query Loop automatically pulls in your latest posts (or any post type you choose) and displays each one inside the Post Template block.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Horizontal Post Scroll","categories":["flexline-sections"],"patternName":"flexline/section-horizontal-posts-scroll"},"align":"wide","className":"is-style-card-padded","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"0"},"blockGap":"var:preset|spacing|small"}},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-card-padded has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:0;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"align":"wide","className":""} -->
    <h2 class="wp-block-heading alignwide">Latest Posts Slider</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"className":""} -->
    <div class="wp-block-query"><!-- wp:post-template {"className":"scroller-buttons-text-default scroller-buttons-background-default is-style-horizontal-scroll horizontal-scroller-navigation horizontal-scroller-auto horizontal-scroller-hide-scrollbar scroller-pause-on-hover horizontal-scroller-buttons-horizontal-left horizontal-scroller-buttons-vertical-bottom scroller-buttons-background-primary scroller-buttons-text-white scroller-buttons-border-none","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"250px"},"enableHorizontalScroller":true,"scrollAuto":true,"hideScrollbar":true,"buttonsBackgroundColor":"primary","buttonsBoxShadow":true} -->
        <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"https://staging2.flexlinetheme.com/wp-content/themes/flexline/assets/built/images/fallback.webp","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><img class="wp-block-cover__image-background wp-image-527" alt="" src="https://staging2.flexlinetheme.com/wp-content/themes/flexline/assets/built/images/fallback.webp" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"className":"is-style-default","style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Latest-Posts">Latest Posts</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>Showing the 3 latest post.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Latests Posts - 3 card","categories":["flexline-sections"],"patternName":"flexline/section-latest-posts"},"align":"full","className":"latests-posts-3-card","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull latests-posts-3-card" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"textAlign":"center","className":""} -->
    <h2 class="wp-block-heading has-text-align-center">Latest Posts</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":4,"query":{"perPage":3,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide","className":"","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","metadata":{"name":"Featured \u0026 Fallback Images"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"metadata":{"name":"Title \u0026 Meta"},"className":"is-style-default","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Category"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results {"className":""} -->
        <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results.","className":""} -->
        <p></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"className":""} -->
<h3 class="wp-block-heading" id="Media-Modal-Wide-cards">Media Modal Wide cards</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":""} -->
<p>This section provides alternating layouts with images that click open modals for video or other web content in an iframe.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Media Modal Wide Cards","categories":["flexline-sections"],"patternName":"flexline/section-gallery-wide-modal-cards"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Gallery Modal - Wide"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image Column"},"className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Mixed Media Feature - Card"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
                <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":826,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"#"} -->
                    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-826" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":""} -->
                <h2 class="wp-block-heading">Modal Link Card</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":""} -->
                <p>This pattern has a headline and paragraph on one side and image with a media in a modal link</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Gallery Modal - Wide","categories":["flexline-galleries"],"patternName":"flexline/gallery-media-card-wide"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":""} -->
                <h2 class="wp-block-heading">Modal Link Card</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":""} -->
                <p>This pattern has a headline and paragraph on one side and image with a media in a modal link</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image Column"},"className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Mixed Media Feature - Card"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
                <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":826,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"#"} -->
                    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-826" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":"Gallery Modal - Wide"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image Column"},"className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Mixed Media Feature - Card"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
                <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":826,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default enable-modal","enableModal":true,"modalMediaURL":"#"} -->
                    <figure class="wp-block-image size-large is-style-default enable-modal"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-826" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":""} -->
                <h2 class="wp-block-heading">Modal Link Card</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":""} -->
                <p>This pattern has a headline and paragraph on one side and image with a media in a modal link</p>
                <!-- /wp:paragraph -->
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