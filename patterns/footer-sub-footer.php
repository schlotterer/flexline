<?php
/**
 * Title: Footer Sub Footer
 * Slug: flexline/footer-sub-footer
 * Categories: flexline-footers
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"}}},"backgroundColor":"contrast","textColor":"base","className":"has-background-color","layout":{"type":"constrained"},"fontSize":"small","metadata":{"name":"Footer - Sub Footer"}} -->
<div class="wp-block-group alignfull has-background-color has-base-color has-contrast-background-color has-text-color has-background has-link-color has-small-font-size" style="margin-top:0px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide"><!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">©<?php echo esc_html(date('Y')); ?> Your Company LLC </p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><a href="#">Privacy Policy</a> · <a href="#">Terms of Service</a> · <a href="#">Contact Us</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:image {"width":"auto","height":"40px","sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/built/images/mand-eho.webp' ) ); ?>" alt="" class="" style="width:auto;height:40px" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"width":"auto","height":"40px","sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/built/images/mand-ada.png' ) ); ?>" alt="" class="" style="width:auto;height:40px" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"width":"auto","height":"40px","sizeSlug":"full","linkDestination":"none"} -->
            <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/built/images/mand-pet-friendly.webp' ) ); ?>" alt="" class="" style="width:auto;height:40px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
