<?php

/**
 * Title: Archive Meta Bar
 * Slug: flexline/meta-archive
 * Categories: flexline-heroes, flexline-posts
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Archive Meta Bar"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background"><!-- wp:cover {"dimRatio":80,"overlayColor":"primary","minHeight":50,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"},"enableLazyLoad":false} -->
    <div class="wp-block-cover alignfull is-light has-base-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"fontStyle":"normal","fontWeight":"200"}},"textColor":"neutral-light","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group has-neutral-light-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0;font-style:normal;font-weight:200"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false,"style":{"typography":{"textTransform":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"max-48","fontFamily":"brand"} /-->

            <!-- wp:term-description {"textAlign":"center","fontFamily":"body"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->