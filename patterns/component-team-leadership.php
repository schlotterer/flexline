<?php

/**
 * Title: Team Leadership.
 * Slug: flexline/team-leadership
 * Categories: flexline-components, flexline-misc
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Leadership Card"},"className":"is-style-card-padded","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Leadership Info"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Name and Title"},"className":"","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                <div class="wp-block-group"><!-- wp:heading {"className":"wp-block-heading","fontSize":"x-large"} -->
                    <h2 class="wp-block-heading has-x-large-font-size" id="text-on-left-image-on-right">First Lastname</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
                    <p class="has-x-small-font-size" style="text-transform:uppercase">Job Title</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph {"className":""} -->
                <p>This block is designed to feature leadership in the organization. The image goes first on mobile by using the custom "Row Reverse" option on the columns block.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none","className":""} -->
            <figure class="wp-block-image size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-5592" style="aspect-ratio:3/2;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->