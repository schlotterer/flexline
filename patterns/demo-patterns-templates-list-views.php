<?php

/**
 * Title: Demo Patterns - Templates - List Views
 * Slug: flexline/demo-patterns-templates-list-views
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>Here we outline the different post list archive elements and styles for use in the Blog, Archive, Search and Term templates.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"extra-z-index is-style-shadow-light","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull extra-z-index is-style-shadow-light has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#Colored-Cards">Sticky Post Pattern</a> | <a href="#Colored-Image-Cards-with-links">Post Grid Single</a> | <a href="#Post-Grid-Single-Outline">Post Grid Single Outlined</a> | <a href="#Grid-of-posts-in-three-columns">Posts Grid</a> | <a href="#Archive-Meta-Bar">Archive Meta Bar</a> | <a href="#Page-Links-with-Sticky-sidebar">Post List Single Card</a> | <a href="#Post-List-Single-Image-Text-Outline">Post List Single Outlined</a> | <a href="#Archive-Index-Post-list">Archive &amp; Index List</a> | <a href="#Search-Meta-Bar">Search Meta Bar</a> | <a href="#Post-List-Single-Text-Outline">Post List Single Text Outlined</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">The Blog Template</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The blog template is the primary blog page template. For this page we usually use a hero Feature Hero from the component patterns to match the other heroes on the site.<br>After the hero the blog template provides a content section where you can add any block you like.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="Sticky-Post-Pattern">Sticky Post Pattern</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>By default the Flexline blog template comes with a special feature sticky post pattern before the main list view. The sticky post pattern will display the latest blog post set as sticky.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Sticky Post Feature","categories":["flexline-modules"],"patternName":"flexline/posts-sticky-feature"},"className":"","layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":5,"query":{"perPage":9,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"wide","className":"","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"className":"","layout":{"type":"default","columnCount":3}} -->
        <!-- wp:group {"metadata":{"name":"Post list single Feature Post with cover left"},"className":"is-style-outlined","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-outlined has-contrast-color has-text-color has-link-color"><!-- wp:columns {"className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
            <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch","className":""} -->
                <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"%","className":"","style":{"border":{"radius":"0px"}},"layout":{"type":"default"}} -->
                    <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-0 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
                            <p class="has-text-align-center has-large-font-size"></p>
                            <!-- /wp:paragraph -->

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

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/6bdc68b4ee104dcea8b3b727e7bd9c15?sid=329838ac-25f4-4bb2-9756-0b1acfd14855"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/6bdc68b4ee104dcea8b3b727e7bd9c15-88881c4779b63eea-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Blog Template list</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>By default the blog template list view is set up as grid of cards, but this can be swapped out for any of the following views as well. Any of these list are interchangeable.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","className":""} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"className":""} -->
        <h4 class="wp-block-heading" id="Post-Grid-Single">Post Grid Single - Card Image, Category, Title</h4>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":""} -->
        <p>Post Grid Single - Card Image, Category, Title pattern displays the fallback image or a featured image if set for a given post. The image is displayed as a duotone by default but can be changed. The card also displays the primary category and the post title and applies the Card w/ Image style to the containing group.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title","categories":["flexline-posts-templates"],"patternName":"flexline/post-grid-single-card-alt"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"https://alpha.local/wp-content/uploads/2024/09/alpha-9.0.001-pexels-sara-734725946-20310343-jpg.avif","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","metadata":{"name":"Fallback \u0026 Featured Images"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><img class="wp-block-cover__image-background wp-image-527" alt="" src="https://alpha.local/wp-content/uploads/2024/09/alpha-9.0.001-pexels-sara-734725946-20310343-jpg.avif" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span>
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"metadata":{"name":"Title \u0026 Meta"},"className":"is-style-default","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Category"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":""} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"className":""} -->
        <h4 class="wp-block-heading" id="Post-Grid-Single-Outline">Post Grid Single - Outline, Category, Title</h4>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":""} -->
        <p>Post Grid Single - Outline, Category, Title pattern displays the fallback image or a featured image if set for a given post. The image is displayed as a duotone by default but can be changed. The card also displays the primary category and the post title and applies the Card w/ Image style to the containing group.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Post Grid Single - Outline, Category, Title","categories":["flexline-posts-templates"],"patternName":"flexline/post-grid-single-outline-text"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
        <div class="wp-block-group is-style-outlined" style="min-height:100%"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":""} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"x-large"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":19,"className":"","style":{"spacing":{"margin":{"top":"0"}},"layout":{"selfStretch":"fill","flexSize":null}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/9962d8231e894e7ab3af141a1d5dda04?sid=8be06b4a-95b3-4819-9f7e-039518cba6d7"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/9962d8231e894e7ab3af141a1d5dda04-8edc8c66ba1857a1-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Grid-of-posts-in-three-columns">Grid of posts in three columns</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>This pattern uses Loop block with the Post Grid Single patterns for the post template. By default the loop is set to display the 9 latest posts and includes pagination.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:query {"queryId":9,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":null,"parents":[]},"enhancedPagination":true,"metadata":{"categories":["flexline-posts-templates"],"patternName":"flexline/posts-grid","name":"Grid of posts in three columns."},"className":"alignwide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
    <!-- wp:group {"metadata":{"name":"Post Grid Single - Card Image, Category, Title"},"className":"is-style-card-alt","style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
    <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"https://alpha.local/wp-content/uploads/2024/09/alpha-9.0.001-pexels-sara-734725946-20310343-jpg.avif","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","metadata":{"name":"Featured \u0026 Fallback Images"},"className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><img class="wp-block-cover__image-background wp-image-527" alt="" src="https://alpha.local/wp-content/uploads/2024/09/alpha-9.0.001-pexels-sara-734725946-20310343-jpg.avif" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span>
            <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
        </div>
        <!-- /wp:cover -->

        <!-- wp:group {"metadata":{"name":"Title \u0026 Meta"},"className":"is-style-default","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
        <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Category"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"lineHeight":"1"}}} /--></div>
            <!-- /wp:group -->

            <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:group {"metadata":{"name":"Previous / Next"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:query-pagination {"paginationArrow":"arrow","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous {"className":""} /-->

        <!-- wp:query-pagination-next {"className":""} /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->

<!-- wp:paragraph {"className":""} -->
<p>video</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">The Archive and Index Templates</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The Archive template is used for date, category, tag, author, or custom-post‐type archives. While the index template serves a s fallback if no other template is found. At their starting points both templates use the article meta bar and a post list.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="Archive-Meta-Bar">Archive Meta Bar</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The default archive template uses the Archive Meta Bar pattern as it's hero/title section. It includes a cover block ready to take a background image, breadcrumbs, a dynamic archive title and term description if it exists.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Archive Meta Bar","categories":["flexline-posts-templates"],"patternName":"flexline/meta-archive"},"align":"full","className":"","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":50,"isDark":false,"metadata":{"name":"Background Image"},"align":"full","className":"no-lazy-load","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull is-light no-lazy-load has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Breadcrumbs"},"className":"","style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0;font-style:normal;font-weight:400"><!-- wp:yoast-seo/breadcrumbs {"className":""} /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false,"className":"is-style-creative","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->

            <!-- wp:term-description {"textAlign":"center","className":"is-style-default","fontFamily":"body"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Archive/Index List</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>These templates use a posts list rather than a grid.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Post-List-Single-Card">Post List Single Card - Image, Category, Title</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>List view card style.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post List Single Card - Image, Category, Title","categories":["flexline-posts-templates"],"patternName":"flexline/post-list-single-image-card"},"className":"is-style-default","style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"50px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default" style="min-height:50px"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"flexline-hide-on-mobile","hideOnMobile":true} -->
        <div class="wp-block-column is-vertically-aligned-center flexline-hide-on-mobile" style="flex-basis:20%"><!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"100%","dimRatio":30,"gradient":"primary-primaryDark","className":"","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"is-style-card-padded","style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"125px"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-card-padded" style="min-height:125px"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase","textDecoration":"none"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"x-small","fontFamily":"display"} /-->

                <!-- wp:post-title {"isLink":true,"className":"","style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}},"fontSize":"x-large"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","showMoreOnNewLine":false,"excerptLength":20,"className":""} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Post-List-Single-Image-Text-Outline">Post List Single Image Text/Outline</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>List view outline style.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post List Single Image Text/Outline","categories":["flexline-posts-templates"],"patternName":"flexline/post-list-single-image-outline"},"className":"is-style-default","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"","dimRatio":20,"gradient":"primary-primaryDark","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}}} /--></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

                    <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}}} /-->

                    <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":26,"className":"","fontSize":"x-small"} /-->

                    <!-- wp:read-more {"className":"","fontFamily":"display"} /-->
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

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Archive-Index-Post-list">Archive/Index Post list - Latests Posts</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>By default the Archive and Index lists use the Post List Single Image Text/Outline pattern for the list and includes 9 posts and pagination.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":9},"metadata":{"categories":["flexline-posts-templates"],"patternName":"flexline/posts-list","name":"List of posts."},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"","layout":{"type":"default","columnCount":3}} -->
    <!-- wp:group {"metadata":{"name":"Post List Single Image Text/Outline"},"className":"is-style-default","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-default"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"","dimRatio":20,"gradient":"primary-primaryDark","className":"is-style-card","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}}} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"","className":""} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"is-style-outlined","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-outlined"><!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

                        <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}}} /-->

                        <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":26,"className":"","fontSize":"x-small"} /-->

                        <!-- wp:read-more {"className":"","fontFamily":"display"} /-->
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
    <!-- /wp:post-template -->

    <!-- wp:group {"metadata":{"name":"Previous / Next"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:query-pagination {"paginationArrow":"arrow","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous {"className":""} /-->

        <!-- wp:query-pagination-next {"className":""} /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->

<!-- wp:paragraph {"className":""} -->
<p>video</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">Search Archive</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The search archive uses a custom Search Meta Bar pattern and a single column simplified list view.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Search-Meta-Bar">Search Meta Bar</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>This hero uses a custom dynamic title bar that includes the search term and bread crumb. You can set a background using the cover block. By default the image will be a duo tone and have an overlay for text readability. All of this is adjustable at the template level.<br>NOTE: Breadcrumbs depend on the Yoast SEO breadcrumbs block, but any other breadcrumb could be used or this block could be removed. </p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Search Meta Bar","categories":["flexline-posts-templates"],"patternName":"flexline/meta-search"},"align":"full","className":"","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:cover {"alt":"An older man sitting outdoors, holding two small dogs and smiling.","dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":50,"sizeSlug":"large","align":"full","className":"no-lazy-load","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull no-lazy-load" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"className":"","style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs {"className":""} /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"search","textAlign":"center","className":"","style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="Post-List-Single-Text-Outline">Post List Single Text/Outline</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>This single list item pattern does not include the featured image or a fallback.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post List Single Text/Outline","categories":["flexline-posts-templates"],"patternName":"flexline/post-list-single-outline"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group is-style-outlined"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

    <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}}} /-->

    <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":32,"className":"","fontSize":"x-small"} /-->

    <!-- wp:read-more {"className":"","fontFamily":"display"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">List of posts in one column.</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The search template uses the List of posts in one column pattern for a single column list view.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":9},"metadata":{"categories":["flexline-posts-templates"],"patternName":"flexline/posts","name":"List of posts in one column."},"className":"","layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":""} -->
    <!-- wp:group {"metadata":{"name":"Post List Single Text/Outline"},"className":"is-style-outlined","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
    <div class="wp-block-group is-style-outlined"><!-- wp:post-terms {"term":"category","className":"","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small","fontFamily":"display"} /-->

        <!-- wp:post-title {"isLink":true,"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}}} /-->

        <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":32,"className":"","fontSize":"x-small"} /-->

        <!-- wp:read-more {"className":"","fontFamily":"display"} /-->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:group {"metadata":{"name":"Previous / Next"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:query-pagination {"paginationArrow":"arrow","className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-dark"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"fontSize":"x-small","fontFamily":"display","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous {"className":""} /-->

        <!-- wp:query-pagination-next {"className":""} /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->