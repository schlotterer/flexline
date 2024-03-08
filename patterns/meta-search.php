<?php

/**
 * Title: Search Meta Bar
 * Slug: flexline/meta-search
 * Categories: flexline-heroes, flexline-sections, flexline-posts
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Search Meta Bar"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","id":356,"dimRatio":80,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group alignwide has-base-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:query-title {"type":"search","textAlign":"center"} /-->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->