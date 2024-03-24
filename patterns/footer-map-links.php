<?php

/**
 * Title: Footer with Map and links
 * Slug: flexline/footer-map-links
 * Categories: flexline-footers
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"margin":{"top":"0px"}}},"backgroundColor":"contrast","textColor":"base","className":"has-background-color","layout":{"type":"constrained"},"fontSize":"small","metadata":{"name":"Footer Map and Links"}} -->
<div class="wp-block-group alignfull has-background-color has-base-color has-contrast-background-color has-text-color has-background has-link-color has-small-font-size" style="margin-top:0px"><!-- wp:cover {"dimRatio":90,"overlayColor":"contrast","align":"full","style":{"color":{"duotone":"var:preset|duotone|neutral-dark"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-90 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:columns {"align":"wide","style":{"elements":{"link":{"color":[]}},"spacing":{"blockGap":{"left":"var:preset|spacing|x-small"}}}} -->
            <div class="wp-block-columns alignwide has-link-color"><!-- wp:column {"width":"250px","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"className":"is-justify-content-center-mobile"} -->
                <div class="wp-block-column is-justify-content-center-mobile" style="flex-basis:250px"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"className":"has-text-align-center","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group has-text-align-center"><!-- wp:site-logo {"width":200,"style":{"color":{"duotone":["#ffffff","#ffffff"]}}} /-->

                        <!-- wp:shortcode -->
                        [flexline_contact_info]
                        <!-- /wp:shortcode -->

                        <!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#000","iconBackgroundColor":"base","iconBackgroundColorValue":"#fff","style":{"spacing":{"blockGap":"10px"}},"className":"is-style-default"} -->
                        <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"twitter"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
                <div class="wp-block-column"><!-- wp:image {"align":"center","id":385,"width":"325px","height":"auto","aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"custom"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><a href="https://www.google.com/maps"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/map.webp'; ?>" alt="" class="wp-image-385" style="aspect-ratio:3/2;object-fit:cover;width:325px;height:auto" /></a></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"200px"} -->
                <div class="wp-block-column" style="flex-basis:200px"><!-- wp:navigation {"ref":373,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"style":{"spacing":{"blockGap":"0"}}} /--></div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"200px"} -->
                <div class="wp-block-column" style="flex-basis:200px"><!-- wp:navigation {"ref":376,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"style":{"spacing":{"blockGap":"0"}}} /--></div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->