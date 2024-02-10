<?php

/**
 * Title: Section testimonial cars on background.
 * Slug: flexline/section-testimonials-on-bkg
 * Categories: flexline-sections
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Quote Group"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":356,"dimRatio":50,"align":"full","style":{"color":{"duotone":["#0F6185","#ffffff"]},"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|xx-large","right":"var:preset|spacing|xx-large"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--xx-large)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Tiles"}} -->
            <div class="wp-block-group alignfull"><!-- wp:columns {"align":"wide"} -->
                <div class="wp-block-columns alignwide"><!-- wp:column {"width":""} -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/testimonial-card-light"} /-->
                        <!-- wp:pattern {"slug":"flexline/testimonial-card-picture-light"} /-->

                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":""} -->
                    <div class="wp-block-column">
                        
                    <!-- wp:pattern {"slug":"flexline/testimonial-card-picture-light"} /-->  
                    <!-- wp:pattern {"slug":"flexline/testimonial-card-light"} /-->
                        
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":""} -->
                    <div class="wp-block-column">
                        
                        <!-- wp:pattern {"slug":"flexline/testimonial-card-light"} /-->
                        <!-- wp:pattern {"slug":"flexline/testimonial-card-picture-light"} /-->

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