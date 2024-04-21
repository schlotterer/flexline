<?php

/**
 * Title: Sample page displaying all Post and Events components.
 * Slug: flexline/sample-post-components
 * Categories: flexline-samples
 */

namespace FlexLine\flexline;
?>
<!-- wp:heading -->
<h2 class="wp-block-heading">Sticky Posts List</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Like many other components this pattern's post template can use the group style variations for different looks.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Outlined with padding:</p>
<!-- /wp:paragraph -->



<!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Sticky Post Feature"}} -->
<div class="wp-block-group is-style-default"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->

        <!-- wp:pattern {"slug":"flexline/post-list-single-feature-post"} /-->

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->




<!-- wp:paragraph -->
<p>Card:</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Sticky Post Feature"}} -->
<div class="wp-block-group is-style-default"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->

        <!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"is-style-card","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-card has-contrast-color has-text-color has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
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

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Card with Padding</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Sticky Post Feature"}} -->
<div class="wp-block-group is-style-default"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->

        <!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","className":"is-style-card-padded","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-card-padded has-contrast-color has-text-color has-link-color"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
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

        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Post Grid Card Components </h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The "Post Grid Single - Card Image, Category, Title" pattern/component can be used in Loop Blocks using the Grid layout. This pattern has the main 3 style options generally Available.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->

            <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->

            <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
            <div class="wp-block-group is-style-card-padded has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                    <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","style":{"typography":{"lineHeight":"1"}}} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->

            <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","className":"is-style-outlined","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
            <div class="wp-block-group is-style-outlined has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
                <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                    <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","style":{"typography":{"lineHeight":"1"}}} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph -->
<p>The "Post Grid Single - Category, Title" pattern/component foregoes the image and can be used in Loop Blocks using the Grid layout. This pattern has 3 style options generally Available - Card w/ Padding, Outlined w/ padding and default.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"className":"is-style-card-padded","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Grid Single - Outline, Category, Title"}} -->
            <div class="wp-block-group is-style-card-padded" style="min-height:100%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                    <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category"} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"x-large"} /-->

                    <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":19,"style":{"spacing":{"margin":{"top":"0"}},"layout":{"selfStretch":"fill","flexSize":null}}} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->
            
            <!-- wp:pattern {"slug":"flexline/post-grid-single-outline-text"} /-->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template -->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Grid Single - Outline, Category, Title"}} -->
            <div class="wp-block-group is-style-default" style="min-height:100%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                    <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category"} /--></div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"x-large"} /-->

                    <!-- wp:post-excerpt {"moreText":"Read more","excerptLength":19,"style":{"spacing":{"margin":{"top":"0"}},"layout":{"selfStretch":"fill","flexSize":null}}} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Post Lists Components</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Post List Single Image Text/Outline:</p>
<!-- /wp:paragraph -->

<!-- wp:query {"queryId":0,"query":{"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"perPage":"1"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
    
    <!-- wp:pattern {"slug":"flexline/post-list-single-image-outline"} /-->

    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->

<!-- wp:paragraph -->
<p>Post List Single Image Text/Card:</p>
<!-- /wp:paragraph -->

<!-- wp:query {"queryId":0,"query":{"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"perPage":"1"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
    
    <!-- wp:pattern {"slug":"flexline/post-list-single-image-card"} /-->

    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->

<!-- wp:paragraph -->
<p>Post List Single Text/Outline:</p>
<!-- /wp:paragraph -->

<!-- wp:query {"queryId":0,"query":{"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"perPage":"1"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
    
    <!-- wp:pattern {"slug":"flexline/post-list-single-outline"} /-->

    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/section-latest-posts"} /-->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:pattern {"slug":"flexline/section-horizontal-posts-scroll"} /-->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Tribe Events - The Events Calendar list view style options</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Default:</p>
<!-- /wp:paragraph -->

<!-- wp:group {"align":"full","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Events List Loop Group"}} -->
<div class="wp-block-group alignfull is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":80,"overlayColor":"neutral","focalPoint":{"x":0.5,"y":0.35},"contentPosition":"center center","isDark":false,"align":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"spacing":{"blockGap":"0"}},"textColor":"contrast","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light has-contrast-color has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:50% 35%" data-object-fit="cover" data-object-position="50% 35%" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:query {"queryId":5,"query":{"perPage":10,"pages":0,"offset":0,"postType":"tribe_events","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-query alignwide">
                <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained","wideSize":"","contentSize":"800px"},"fontSize":"x-small"} -->
                
                <!-- wp:pattern {"slug":"flexline/events-list-single-card"} /-->
                <!-- /wp:post-template -->

                <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","layout":{"type":"flex","justifyContent":"space-between"}} -->
                <!-- wp:query-pagination-previous /-->

                <!-- wp:query-pagination-numbers /-->

                <!-- wp:query-pagination-next /-->
                <!-- /wp:query-pagination -->

                <!-- wp:query-no-results -->
                <!-- wp:heading {"textAlign":"center"} -->
                <h2 class="wp-block-heading has-text-align-center">Check back soon to learn about future events!</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">In the mean time find us on social media.</p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#595f23","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                </ul>
                <!-- /wp:social-links -->
                <!-- /wp:query-no-results -->
            </div>
            <!-- /wp:query -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Alt:</p>
<!-- /wp:paragraph -->

<!-- wp:group {"align":"full","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Events List Loop Group"}} -->
<div class="wp-block-group alignfull is-style-default"><!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","dimRatio":80,"overlayColor":"neutral","focalPoint":{"x":0.5,"y":0.35},"contentPosition":"center center","isDark":false,"align":"full","style":{"color":{"duotone":"var:preset|duotone|primary"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"spacing":{"blockGap":"0"}},"textColor":"contrast","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light has-contrast-color has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" style="object-position:50% 35%" data-object-fit="cover" data-object-position="50% 35%" />
        <div class="wp-block-cover__inner-container"><!-- wp:query {"queryId":5,"query":{"perPage":10,"pages":0,"offset":0,"postType":"tribe_events","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-query alignwide">
                <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained","wideSize":"","contentSize":"800px"},"fontSize":"x-small"} -->
                <!-- wp:pattern {"slug":"flexline/events-list-single-card-alt"} /-->
                <!-- /wp:post-template -->

                <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"}}}},"textColor":"neutral-dark","layout":{"type":"flex","justifyContent":"space-between"}} -->
                <!-- wp:query-pagination-previous /-->

                <!-- wp:query-pagination-numbers /-->

                <!-- wp:query-pagination-next /-->
                <!-- /wp:query-pagination -->

                <!-- wp:query-no-results -->
                <!-- wp:heading {"textAlign":"center"} -->
                <h2 class="wp-block-heading has-text-align-center">Check back soon to learn about future events!</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">In the mean time find us on social media.</p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#595f23","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                </ul>
                <!-- /wp:social-links -->
                <!-- /wp:query-no-results -->
            </div>
            <!-- /wp:query -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->