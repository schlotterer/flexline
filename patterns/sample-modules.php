<?php

/**
 * Title: Sample page displaying Modules.
 * Slug: flexline/samples-modules
 * Categories: flexline-samples
 */

namespace FlexLine\flexline;
?>
<!-- wp:paragraph -->
<p>A Module/Row in Flexline represents a collection of curated blocks and components combined to make more complication rows of content. These are ready to use pieces of content that have been tested responsively. You can use them directly or use them to build something new.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/feature-image-links"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Feature Page - Cover</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Default:</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/feature-page-cover"} /-->

<!-- wp:paragraph -->
<p>Reversed: columns flipped and the columns block style variation set to default rather than reverse on mobile.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Feature Page with cover image"},"enableGroupLink":true,"groupLinkURL":"/independent-living/floor-plans"} -->
<div class="wp-block-group is-style-card"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"stretch"} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":186,"dimRatio":50,"overlayColor":"primary","focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:spacer {"height":"150px"} -->
                    <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-link-color">This pattern can be used to tease site content. It uses a cover block and image to create visual interest and respond flexibly to variable content and breakpoints. You can also reverse the columns and choose if you want the image first on mobile in each use.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">View More →</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/section-video-feature"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/text-poster-gallery"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Columns with multiple rows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You can use any component inside of a column, in this sample we're using Info Boxes. You can simply duplicate a column to add another and you can duplicate the columns block to add more rows.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/columns-multirow"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:0">Sticky Sub Navigation</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sticky Sub navigation can use menus to make keeping site context easier. They can live anywhere in a page but will stick to the top once scrolled to that position and will stay there until its containing block clears the screen. This can be hidden at mobile, or you can also use the the "Sticky Sub navigation can use menus to make keeping site context easier. They can live anywhere in a page but will stick to the top once scrolled to that position and will stay there until its containing block clears the screen. This can be hidden at mobile, or you can also use the the "Enable horizontal scroll at mobile" option to leave it on screen an allow it to scroll horizontally.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/subnav-sticky"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/section-video-feature"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Horizontal Post Scroll</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>By setting the custom "Horizontal Scroll" style variation on the Post Template block set to grid view you can create a horizontal scroller of any post variation the Query Loop block can come up with.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/section-horizontal-posts-scroll"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Latest Posts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Latest Post pattern display the 3 most recent post in a grid format. You can set custom content if there is no posts. But really just have at least 3 posts...</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flexline/section-latest-posts"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/section-gallery-by-title-small"} /-->

<!-- wp:heading -->
<h2 class="wp-block-heading">Tabbed Content</h2>
<!-- /wp:heading -->

<!-- wp:pattern {"slug":"flexline/tabs"} /-->
<!-- wp:pattern {"slug":"flexline/tabs-vertical"} /-->
<!-- wp:pattern {"slug":"flexline/tabs-accordion"} /-->