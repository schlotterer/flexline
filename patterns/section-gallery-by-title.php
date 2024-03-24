<?php

/**
 * Title: Section Gallery next to title
 * Slug: flexline/section-gallery-by-title
 * Categories: flexline-sections, flexline-modules
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral","className":"is-style-shadow-light","layout":{"type":"constrained"},"metadata":{"name":"Gallery right of Title"}} -->
<div class="wp-block-group alignfull is-style-shadow-light has-neutral-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"stretch","width":"35%"} -->
        <div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":356,"dimRatio":80,"overlayColor":"primary","minHeight":100,"minHeightUnit":"%","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"className":"is-style-text-shadow","fontSize":"max-48"} -->
                    <h2 class="wp-block-heading is-style-text-shadow has-max-48-font-size" style="font-style:normal;font-weight:500">Full width gallery row with 3 columns.</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Gallery layout with the headline on the left.</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"65%"} -->
        <div class="wp-block-column" style="flex-basis:65%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"align":"full"} -->
                <div class="wp-block-columns alignfull"><!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:columns {"align":"full"} -->
                <div class="wp-block-columns alignfull"><!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->