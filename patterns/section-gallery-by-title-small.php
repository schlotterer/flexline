<?php

/**
 * Title: Section Gallery next to title - Small
 * Slug: flexline/section-gallery-by-title-small
 * Categories: flexline-sections, flexline-modules
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Gallery Next Title Small","categories":["flexline-modules"],"patternName":"flexline/section-gallery-by-title-small"},"align":"wide","className":"is-style-card","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-card has-neutral-light-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"stackAtTablet":true} -->
    <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"stretch","width":"350px","metadata":{"name":"Text Column"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}}} -->
        <div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:350px"><!-- wp:cover {"url":"https://alpha.test/wp-content/uploads/2024/05/charlie-0.0.008-pexels-suzyhazelwood-2495651-jpg.webp","id":356,"alt":"Sample Image","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","metadata":{"name":"Background Image"},"style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--small);min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="https://alpha.test/wp-content/uploads/2024/05/charlie-0.0.008-pexels-suzyhazelwood-2495651-jpg.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"is-style-text-shadow","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"max-48"} -->
                    <h2 class="wp-block-heading is-style-text-shadow has-max-48-font-size" style="font-style:normal;font-weight:500">Exciting new gallery layout!</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Gallery layout with the headline on the left with the "Card" style variation set on the containing block.</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Gallery Column"}} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"metadata":{"name":"Grid of Poster Galleries"},"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"grid","minimumColumnWidth":"325px"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)">

                <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->
                <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->