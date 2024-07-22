<?php

/**
 * Title: Section Page Links with sticky subnav.
 * Slug: flexline/section-page-links
 * Categories: flexline-sections
 */
namespace Flexlinetheme\flexlinetheme;
?>
<!-- wp:group {"metadata":{"name":"Page Links"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">
    
    <!-- wp:pattern {"slug":"flexline/subnav-sticky"} /-->

    <!-- wp:cover {"url":"<?php echo esc_url(feature_image_fallback()); ?>","id":169,"dimRatio":90,"overlayColor":"neutral","isUserOverlayColor":true,"isDark":false,"align":"full","style":{"color":{"duotone":["#000000","#ffffff"]},"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light" style="margin-top:0"><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-90 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-169" alt="" src="<?php echo esc_url(feature_image_fallback()); ?>" data-object-fit="cover"/>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)">
                <!-- wp:pattern {"slug":"flexline/cta-page-link-bar"} /-->
                <!-- wp:pattern {"slug":"flexline/cta-page-link-bar"} /-->
                <!-- wp:pattern {"slug":"flexline/cta-page-link-bar"} /-->
                <!-- wp:pattern {"slug":"flexline/cta-page-link-bar"} /-->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

</div>
<!-- /wp:group -->