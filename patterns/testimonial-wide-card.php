<?php

/**
 * Title: Testimonial Wide with Picture - Card
 * Options : plain, outline, card, card-padded
 * Slug: flexline/testimonial-wide-card
 * Categories: flexline-components, flexline-misc
 */
?>
<!-- wp:quote {"align":"right","className":"is-style-card-padded","fontFamily":"display"} -->
<blockquote class="wp-block-quote has-text-align-right is-style-card-padded has-display-font-family"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":356,"width":"150px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-rounded"} -->
        <figure class="wp-block-image size-thumbnail is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" alt="Sample Image" class="wp-image-356" style="border-radius:100px;aspect-ratio:1;object-fit:cover;width:150px" /></figure>
        <!-- /wp:image -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4}},"fontSize":"large","fontFamily":"brand"} -->
            <p class="has-brand-font-family has-large-font-size" style="line-height:1.4">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna."</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group --><cite>Someone's Name</cite>
</blockquote>
<!-- /wp:quote -->