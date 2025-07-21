<?php

/**
 * Title: Posts - Sticky.
 * Slug: flexline/posts-sticky-feature
 * Categories: flexline-modules
 * Block Types: core/query
 */
?>
<!-- wp:group {"metadata":{"name":"Sticky Post Feature","categories":["flexline-modules"],"patternName":"flexline/posts-sticky-feature"},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":1,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","className":"","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"className":"","layout":{"type":"default","columnCount":1}} -->
        <!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"className":"is-style-outlined","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-outlined has-contrast-color has-text-color has-link-color"><!-- wp:columns {"className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
            <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch","className":""} -->
                <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","isDark":false,"className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"default"}} -->
                    <div class="wp-block-cover is-light" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-0 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container">

                            <!-- wp:spacer {"height":"150px","className":""} -->
                            <div style="height:150px" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

                        <!-- wp:post-title {"isLink":true,"className":""} /-->

                        <!-- wp:post-excerpt {"className":""} /-->

                        <!-- wp:read-more {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontFamily":"display"} /-->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->