<?php

/**
 * Title: Timeline Columns
 * Slug: flexline/section-timeline-columns
 * Categories: flexline-sections, flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"0","right":"0"}}},"gradient":"neutral-neutralLight","className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Timeline Columns"}} -->
<div class="wp-block-group alignwide is-style-outlined has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0"><!-- wp:columns {"isStackedOnMobile":false,"align":"full","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"},"padding":{"left":"0"}}},"className":"is-style-horizontal-scroll"} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile is-style-horizontal-scroll" style="padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"275px","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:275px"><!-- wp:heading -->
            <h2 class="wp-block-heading">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
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
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Poster Gallery Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Card"}} -->
            <div class="wp-block-group is-style-card-padded has-contrast-color has-text-color has-link-color"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
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

        <!-- wp:column {"verticalAlignment":"center","width":"275px","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:275px"><!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center">Timeline</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">This is a columns block with the Horizontal Scroll style variation selected.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"500px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:500px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"},"metadata":{"name":"Video Modal - Card"},"groupLinkType":"modal_media"} -->
            <div class="wp-block-group is-style-default"><!-- wp:image {"id":362,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enableModal":true,"modalMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-362" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"align":"center","fontFamily":"brand"} -->
                <p class="has-text-align-center has-brand-font-family">Video Title</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"800px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:800px"><!-- wp:quote {"align":"right","className":"is-style-default","fontFamily":"display"} -->
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
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->