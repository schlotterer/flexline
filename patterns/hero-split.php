<?php

/**
 * Title: Hero for Home Page - Split ( no breadcrumbs ).
 * Slug: flexline/hero-split
 * Categories: flexline-heroes, flexline-sections
 */
namespace FlexLine\flexline;
?>
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
                    <p>Heroes play a crucial role in grabbing attention and establishing the ambiance. The Flexline theme gives you the tools to craft compelling hero sections designed to captivate and meet the specific demands of the senior living audience.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"stretch","width":"50%","backgroundColor":"primary"} -->
        <div class="wp-block-column is-vertically-aligned-stretch has-primary-background-color has-background" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":657,"dimRatio":60,"overlayColor":"primary","focalPoint":{"x":0.95,"y":0.54},"minHeight":100,"minHeightUnit":"%","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-657" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:95% 54%" data-object-fit="cover" data-object-position="95% 54%" />
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

    <!-- wp:pattern {"slug":"flexline/button-scroll-to"} /-->
</div>
    <!-- /wp:group -->