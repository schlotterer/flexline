<?php

/**
 * Title: Testimonial with Picture
 * Slug: flexline/testimonial-picture
 * Categories: flexline-components, flexline-misc
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"default"},"metadata":{"name":"Testimonial with Picture"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"max-72"} -->
    <p class="has-primary-color has-text-color has-link-color has-max-72-font-size" style="line-height:1">“</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
    <p class="has-brand-font-family has-large-font-size" style="margin-top:0;line-height:1.4"><em>With its clean, minimal design and powerful features, FlexLine enables agencies to build cool websites.</em></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:image {"id":303,"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50px"}},"className":"is-style-rounded"} -->
        <figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-303" style="border-radius:50px;object-fit:cover;width:60px;height:60px" /></figure>
        <!-- /wp:image -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.5"}},"layout":{"type":"default"},"fontFamily":"display","metadata":{"name":"Cite"}} -->
        <div class="wp-block-group has-display-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1.5"><!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size"><strong>Allison Taylor</strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
            <p class="has-x-small-font-size" style="text-transform:uppercase">Designer</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->