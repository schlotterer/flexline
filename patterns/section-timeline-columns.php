<?php

/**
 * Title: Timeline Columns
 * Slug: flexline/section-timeline-columns
 * Categories: flexline-sections, flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Timeline Columns","categories":["flexline-modules"],"patternName":"flexline/section-timeline-columns"},"align":"wide","className":"is-style-outlined","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|small","right":"0"}}},"gradient":"neutral-neutralLight","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide is-style-outlined has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"isStackedOnMobile":false,"align":"full","className":"is-style-horizontal-scroll horizontal-scroller-navigation scroller-pause-on-hover horizontal-scroller-buttons-horizontal-left horizontal-scroller-buttons-vertical-bottom scroller-buttons-border-none horizontal-scroller-hide-scrollbar scroller-buttons-text-default scroller-buttons-background-default","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"left":"0"}}},"enableHorizontalScroller":true,"scrollLoop":false,"hideScrollbar":true,"buttonsTextColor":"default","buttonsBackgroundColor":"default","buttonsBoxShadow":true} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile is-style-horizontal-scroll horizontal-scroller-navigation scroller-pause-on-hover horizontal-scroller-buttons-horizontal-left horizontal-scroller-buttons-vertical-bottom scroller-buttons-border-none horizontal-scroller-hide-scrollbar scroller-buttons-text-default scroller-buttons-background-default" style="padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"275px","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
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

        <!-- wp:column {"verticalAlignment":"center","className":"","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Testimonial Card"},"className":"is-style-card-padded","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
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