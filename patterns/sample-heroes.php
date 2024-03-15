<?php

/**
 * Title: Sample page displaying all Heroes.
 * Slug: flexline/sample-heroes
 * Categories: flexline-samples
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Home Hero"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-large.webp'; ?>","id":507,"dimRatio":80,"overlayColor":"primary","minHeightUnit":"px","align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":[]},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-507" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-large.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group alignwide has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"}} -->
                <div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"}},"className":"is-style-default","fontSize":"small","fontFamily":"display"} -->
                    <h1 class="wp-block-heading is-style-default has-display-font-family has-small-font-size" style="font-style:normal;font-weight:400;text-transform:uppercase">H1 - Eyebrow - SEO Headline</h1>
                    <!-- /wp:heading -->

                    <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading is-style-default has-max-60-font-size" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"is-style-default"} -->
                    <p class="is-style-default">Donec ullamcorper nulla non metus auctor fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <!-- /wp:paragraph -->

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

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Hero - Split"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}},"className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns alignfull is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);flex-basis:50%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-bottom:var(--wp--preset--spacing--xxx-large)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"570px"}} -->
                <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"neutral","fontSize":"medium","fontFamily":"display"} -->
                        <h1 class="wp-block-heading has-neutral-color has-text-color has-link-color has-display-font-family has-medium-font-size" style="text-transform:uppercase">H1 SEO Eyebrow</h1>
                        <!-- /wp:heading -->

                        <!-- wp:heading {"style":{"typography":{"lineHeight":"1"}},"fontSize":"max-72"} -->
                        <h2 class="wp-block-heading has-max-72-font-size" style="line-height:1">H2 Creative Headline - Aenean lacinia bibendum nulla sed consectetur.</h2>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:paragraph -->
                    <p>Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"stretch","width":"50%","backgroundColor":"primary"} -->
        <div class="wp-block-column is-vertically-aligned-stretch has-primary-background-color has-background" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","id":657,"dimRatio":60,"overlayColor":"primary","focalPoint":{"x":0.95,"y":0.54},"minHeight":100,"minHeightUnit":"%","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-657" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" style="object-position:95% 54%" data-object-fit="cover" data-object-position="95% 54%" />
                <div class="wp-block-cover__inner-container"><!-- wp:spacer {"height":"225px"} -->
                    <div style="height:225px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"top"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"secondary","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"scrollTo animated bounce delay-2s slow"} -->
        <div class="wp-block-button scrollTo animated bounce delay-2s slow" id="scrollTo"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="#scrollTo" style="border-radius:100px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">↓</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Feature Page Meta"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","id":659,"dimRatio":80,"overlayColor":"primary","minHeight":200,"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-659" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group alignwide has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xxx-large);margin-bottom:var(--wp--preset--spacing--xxx-large)"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"spacing":{"blockGap":"0"}},"textColor":"base","layout":{"type":"constrained","contentSize":"700px","wideSize":"1000px"},"fontSize":"x-small"} -->
                <div class="wp-block-group has-base-color has-text-color has-link-color has-x-small-font-size"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"400"}},"className":"is-style-default","fontSize":"small","fontFamily":"display"} -->
                    <h1 class="wp-block-heading has-text-align-center is-style-default has-display-font-family has-small-font-size" style="font-style:normal;font-weight:400;text-transform:uppercase">H1 - Eyebrow - SEO Headline</h1>
                    <!-- /wp:heading -->

                    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default","fontSize":"max-60"} -->
                    <h2 class="wp-block-heading has-text-align-center is-style-default has-max-60-font-size" style="margin-top:0;margin-bottom:0">H2 - Creative Headline</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"0","left":"0"}}},"fontSize":"medium"} -->
                    <p class="has-text-align-center has-medium-font-size" style="margin-right:0;margin-left:0">Donec ullamcorper nulla non metus auctor fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Page Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","minHeight":100,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"0","margin":{"top":"0"}},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:100px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"bottom":"var:preset|spacing|small"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","className":"has-small-font-size","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-small-font-size has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--small);padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none"}},"fontSize":"max-48"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Post Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:200"><!-- wp:post-terms {"term":"category","fontSize":"x-small","fontFamily":"display"} /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Archive Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"dimRatio":80,"overlayColor":"primary","minHeight":50,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull is-light has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->

            <!-- wp:term-description {"textAlign":"center","fontFamily":"body"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Search Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:cover {"dimRatio":80,"overlayColor":"primary","minHeight":50,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"search","textAlign":"center","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Event Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":90,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"textAlign":"left","level":1,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48"} /-->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"neutral-light","fontSize":"x-small"} /--></div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->