<?php
/**
 * Title: Post list single Feature Post with cover left
 * Slug: flexline/post-list-single-feature-post
 * Categories: flexline-posts, flexline-components
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"is-style-outlined","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-outlined has-contrast-color has-text-color has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
    <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch"} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","isDark":false,"style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-0 has-background-dim"></span>
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
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

                <!-- wp:post-title {"isLink":true} /-->

                <!-- wp:post-excerpt /-->

                <!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontFamily":"display"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->