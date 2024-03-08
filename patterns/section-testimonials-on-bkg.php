<?php

/**
 * Title: Section testimonial cars on background.
 * Slug: flexline/section-testimonials-on-bkg
 * Categories: flexline-sections
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Quote Group"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","id":514,"dimRatio":80,"gradient":"primary-primaryDark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"color":{"duotone":"var:preset|duotone|primary"}},"textColor":"contrast","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-contrast-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-514" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full","layout":{"type":"constrained"},"metadata":{"name":"Testimonial Tiles"}} -->
            <div class="wp-block-group alignfull"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-columns alignwide"><!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
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