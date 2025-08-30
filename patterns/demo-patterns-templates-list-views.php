<?php

/**
 * Title: Demo Patterns - Templates - List Views
 * Slug: flexline/demo-patterns-templates-list-views
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine;
?>
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
 
<!-- wp:group {"metadata":{"name":"Intro Text"},"className":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"className":""} -->
    <p>Here we outline the different post list archive elements and styles for use in the Blog, Archive, Search and Term templates.</p>
    <!-- /wp:paragraph -->
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
    <p>By default the FlexLine blog template comes with a special feature sticky post pattern before the main list view. The sticky post pattern will display the latest blog post set as sticky.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/posts-sticky-feature"} /-->

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
    <div class="wp-block-column is-vertically-aligned-center">
        
        <!-- wp:pattern {"slug":"flexline/post-grid-single-card-alt"} /-->
       
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":""} -->
<div class="wp-block-columns are-vertically-aligned-center">
    <!-- wp:column {"verticalAlignment":"center","className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"className":""} -->
        <h4 class="wp-block-heading" id="Post-Grid-Single-Outline">Post Grid Single - Outline, Category, Title</h4>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":""} -->
        <p>Post Grid Single - Outline, Category, Title pattern displays the fallback image or a featured image if set for a given post. The image is displayed as a duotone by default but can be changed. The card also displays the primary category and the post title and applies the Card w/ Image style to the containing group.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","className":""} -->
    <div class="wp-block-column is-vertically-aligned-center">
        
        <!-- wp:pattern {"slug":"flexline/post-grid-single-outline-text"} /-->

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

<!-- wp:pattern {"slug":"flexline/posts-grid"} /-->


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

<!-- wp:pattern {"slug":"flexline/meta-archive"} /-->

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

<!-- wp:pattern {"slug":"flexline/post-list-single-image-card"} /-->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Post-List-Single-Image-Text-Outline">Post List Single Image Text/Outline</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>List view outline style.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/post-list-single-image-outline"} /-->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":""} -->
    <h4 class="wp-block-heading" id="Archive-Index-Post-list">Archive/Index Post list - Latests Posts</h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>By default the Archive and Index lists use the Post List Single Image Text/Outline pattern for the list and includes 9 posts and pagination.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/posts-list"} /-->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-shadow-diffused","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/ef239a1aa7914bb6991385dea6d4a0f0?sid=ff1f4883-c6c3-4492-b344-6f11aac700eb"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-shadow-diffused" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/ef239a1aa7914bb6991385dea6d4a0f0-b82e973ab6403f2d-full-play.gif" /></figure>
<!-- /wp:image -->

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

<!-- wp:pattern {"slug":"flexline/meta-search"} /-->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading" id="Post-List-Single-Text-Outline">Post List Single Text/Outline</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>This single list item pattern does not include the featured image or a fallback.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flexline/post-list-single-outline"} /-->

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

    <!-- wp:pattern {"slug":"flexline/post-list-single-outline"} /-->

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

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:paragraph {"className":""} -->
<p>Note: Each of these templates has a custom CTA that should be set to point to correct link, or remove the pattern. </p>
<!-- /wp:paragraph -->