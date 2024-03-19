<?php

/**
 * Title: Timeline Columns
 * Slug: flexline/section-timeline-columns
 * Categories: flexline-sections, flexline-modules
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","gradient":"secondary-secondaryDark","layout":{"type":"constrained"},"metadata":{"name":"Timeline Columns"}} -->
<div class="wp-block-group alignfull has-base-color has-secondary-secondaryDark-gradient-background has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"isStackedOnMobile":false,"align":"full","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}},"className":"is-style-horizontal-scroll"} -->
    <div class="wp-block-columns alignfull is-not-stacked-on-mobile is-style-horizontal-scroll"><!-- wp:column {"verticalAlignment":"center","width":"275px","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
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
                <p class="has-text-align-center has-display-font-family" style="text-transform:none">Gallery Title</p>
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

        <!-- wp:column {"verticalAlignment":"center","width":"700px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:700px"><!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Sticky Post Feature"}} -->
            <div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"constrained"}} -->
                <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
                    <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Post list single Feature Post with cover left"}} -->
                    <div class="wp-block-group is-style-card has-contrast-color has-text-color has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
                        <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch"} -->
                            <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"secondary","minHeight":100,"minHeightUnit":"%","isDark":false,"style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
                                <div class="wp-block-cover is-light" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-0 has-background-dim"></span>
                                    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                                        <p class="has-text-align-center has-large-font-size"></p>
                                        <!-- /wp:paragraph -->

                                        <!-- wp:spacer {"height":"150px"} -->
                                        <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                                        <!-- /wp:spacer -->
                                    </div>
                                </div>
                                <!-- /wp:cover -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
                            <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

                                    <!-- wp:post-title {"isLink":true} /-->

                                    <!-- wp:post-excerpt /-->

                                    <!-- wp:read-more {"fontFamily":"display"} /-->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                    </div>
                    <!-- /wp:group -->
                    <!-- /wp:post-template -->
                </div>
                <!-- /wp:query -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"800px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:800px"><!-- wp:quote {"align":"right","className":"is-style-default","fontFamily":"display"} -->
            <blockquote class="wp-block-quote has-text-align-right is-style-default has-display-font-family"><!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"150px","className":"is-style-hide-on-mobile"} -->
                    <div class="wp-block-column is-vertically-aligned-center is-style-hide-on-mobile" style="flex-basis:150px"><!-- wp:image {"align":"center","id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
                        <figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border is-style-rounded"><img src="https://flexline.test/wp-content/themes/flexline/assets/built/images/fallback-small.webp" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
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