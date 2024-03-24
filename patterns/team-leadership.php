<?php

/**
 * Title: Team Leadership.
 * Slug: flexline/team-leadership
 * Categories: flexline-components, flexline-misc
 */
namespace FlexLine\flexline;
?>
<!-- wp:group {"className":"is-style-outlined","layout":{"type":"default"},"metadata":{"name":"Team Leadership"}} -->
<div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}},"className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Leadership Info"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"},"metadata":{"name":"Name and Title"}} -->
                <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                    <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                    <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph -->
                <p>With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5592,"sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->