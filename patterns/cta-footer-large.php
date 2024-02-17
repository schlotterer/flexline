<?php

/**
 * Title: CTA Footer Large
 * Slug: flexline/cta-footer-large
 * Categories: flexline-components, flexline-cta, flexline-modules
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Footer CTA Group"},"enableGroupLink":true,"groupLinkURL":"#"} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":189,"hasParallax":true,"dimRatio":80,"overlayColor":"primary","align":"wide","style":{"color":{"duotone":"var:preset|duotone|primary"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignwide has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
        <div role="img" class="wp-block-cover__image-background wp-image-189 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>)"></div>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained","contentSize":"600px"},"metadata":{"name":"Content Group"},"groupLinkURL":"#"} -->
            <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"textAlign":"center","className":"is-style-text-shadow","fontSize":"max-60"} -->
                <h2 class="wp-block-heading has-text-align-center is-style-text-shadow has-max-60-font-size">Footer CTA Headline</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","className":"is-style-text-shadow"} -->
                <p class="has-text-align-center is-style-text-shadow">Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
                    <div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button">Learn More</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->