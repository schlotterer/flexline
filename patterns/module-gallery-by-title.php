<?php

/**
 * Title: Module Gallery next to title
 * Slug: flexline/module-gallery-by-title-small
 * Categories: flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Gallery by Title Small"},"className":"is-style-card","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card has-neutral-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:columns {"metadata":{"name":"Text and Galleries Columns"},"align":"full","className":"","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"stretch","width":"35%","metadata":{"name":"Text Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":356,"alt":"Sample Image","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Container / Background"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"is-style-text-shadow","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"max-48"} -->
                    <h2 class="wp-block-heading is-style-text-shadow has-max-48-font-size" style="font-style:normal;font-weight:500">Exciting new gallery layout!</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":""} -->
                    <p>Gallery layout with the headline on the left with the "Card" style variation set on the containing block.</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"65%","metadata":{"name":"Galleries Column"},"className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%"><!-- wp:group {"metadata":{"name":"Galleries Container"},"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","minimumColumnWidth":"250px"}} -->
                <div class="wp-block-group">
                    
                    <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                    <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->