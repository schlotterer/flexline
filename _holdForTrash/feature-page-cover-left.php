<?php

/**
 * Title: Feature - Cover Left
 * Slug: flexline/feature-cover-left
 * Categories: flexline-modules
 */
?>
<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Feature Page with cover left"},"enableGroupLink":true,"groupLinkURL":"/independent-living/cost-of-living-il/"} -->
<div class="wp-block-group is-style-card"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
    <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch"} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>","id":658,"dimRatio":50,"overlayColor":"secondary","minHeight":100,"minHeightUnit":"%","isDark":false,"style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-light" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-658" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback.webp'; ?>" data-object-fit="cover" />
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
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
                <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color">Featured Page</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|highlight"}}}}},"textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-link-color">Curabitur blandit tempus porttitor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                <div class="wp-block-buttons" style="margin-bottom:0"><!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">View More →</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->