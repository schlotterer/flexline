<?php

/**
 * Title: Page Meta for custom SEO
 * Slug: flexline/page-meta-seo
 * Categories: flexline-heroes, flexline-sections
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Page Meta Bar SEO"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","dimRatio":80,"overlayColor":"primary","minHeight":50,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"0"},"color":{"duotone":["#000000","#ffffff"]}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"bottom":"var:preset|spacing|large"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-light"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"base","layout":{"type":"default"},"fontSize":"x-small","fontFamily":"display"} -->
            <div class="wp-block-group alignwide has-base-color has-text-color has-link-color has-display-font-family has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--large);padding-right:0;padding-left:0"><!-- wp:yoast-seo/breadcrumbs /--></div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"300"}},"fontSize":"small"} -->
            <h1 class="wp-block-heading has-text-align-center has-small-font-size" style="font-style:normal;font-weight:300;text-transform:uppercase">H1 SEO Headline</h1>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-center has-max-36-font-size">H2 Creative Headline</h2>
            <!-- /wp:heading -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->