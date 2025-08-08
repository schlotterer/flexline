<?php

/**
 * Title: Media Modal - Card.
 * Slug: flexline/gallery-media-card-wide
 * Categories: flexline-components, flexline-galleries
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Gallery Modal - Wide"},"style":{"spacing":{"blockGap":"0"}},"className":"is-style-outlined","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-outlined"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Image Column"}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Mixed Media Feature - Card"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"groupLinkType":"popup_media"} -->
            <div class="wp-block-group is-style-card-alt"><!-- wp:image {"id":826,"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","enableModal":true,"modalMediaURL":"#"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="" class="wp-image-826" style="aspect-ratio:3/2;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","metadata":{"name":"Text Column"},"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
            <h2 class="wp-block-heading">Modal Link Card</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>This pattern has a headline and paragraph on one side and image with a media in a modal link</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->