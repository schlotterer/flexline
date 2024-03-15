<?php

/**
 * Title: Sample page displaying Modules.
 * Slug: flexline/samples-modules
 * Categories: flexline-samples
 */
?>
<!-- wp:paragraph -->
<p>A Module/Row in Flexline represents a collection of curated blocks and components combined to make more complication rows of content. These are ready to use pieces of content that have been tested responsively. You can use them directly or use them to build something new.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}},"className":"is-style-columns-reverse"} -->
<div class="wp-block-columns are-vertically-aligned-center is-style-columns-reverse"><!-- wp:column {"verticalAlignment":"center","width":""} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"max-48"} -->
        <h2 class="wp-block-heading has-max-48-font-size" id="sample-heading">Feature Image Links</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>This component uses a gallery block to create images as links in a grid next a headline and text.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":""} -->
    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","align":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}}} -->
        <figure class="wp-block-gallery aligncenter has-nested-images columns-2 is-cropped"><!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|primary"}},"className":"is-style-card"} -->
            <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a>
                <figcaption class="wp-element-caption">Page Link Image</figcaption>
            </figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|secondary"}},"className":"is-style-card"} -->
            <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a>
                <figcaption class="wp-element-caption">Page Link Image</figcaption>
            </figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|alternate"}},"className":"is-style-card"} -->
            <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a>
                <figcaption class="wp-element-caption">Page Link Image</figcaption>
            </figure>
            <!-- /wp:image -->

            <!-- wp:image {"id":999,"sizeSlug":"medium","linkDestination":"custom","style":{"color":{"duotone":"var:preset|duotone|neutral-dark"}},"className":"is-style-card"} -->
            <figure class="wp-block-image size-medium is-style-card"><a href="/contact/"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a>
                <figcaption class="wp-element-caption">Page Link Image</figcaption>
            </figure>
            <!-- /wp:image -->
        </figure>
        <!-- /wp:gallery -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Feature Page - Cover</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Default:</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Feature Page with cover image"},"enableGroupLink":true,"groupLinkURL":"/independent-living/floor-plans"} -->
<div class="wp-block-group is-style-card"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-columns-reverse"} -->
    <div class="wp-block-columns is-style-columns-reverse"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
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

        <!-- wp:column {"verticalAlignment":"stretch"} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","id":186,"dimRatio":50,"overlayColor":"primary","focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" />
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
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Reversed: columns flipped and the columns block style variation set to default rather than reverse on mobile.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Feature Page with cover image"},"enableGroupLink":true,"groupLinkURL":"/independent-living/floor-plans"} -->
<div class="wp-block-group is-style-card"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"className":"is-style-default"} -->
    <div class="wp-block-columns is-style-default"><!-- wp:column {"verticalAlignment":"stretch"} -->
        <div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","id":186,"dimRatio":50,"overlayColor":"primary","focalPoint":{"x":0.25,"y":0.51},"minHeight":100,"minHeightUnit":"%","style":{"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="border-radius:0px;min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-186" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" style="object-position:25% 51%" data-object-fit="cover" data-object-position="25% 51%" />
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
            <div class="wp-block-group"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"max-36"} -->
                <h2 class="wp-block-heading has-contrast-color has-text-color has-link-color has-max-36-font-size">Feature Page</h2>
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

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","bottom":"var:preset|spacing|x-large","left":"30px","top":"70px"},"margin":{"top":"0px"},"blockGap":"10px"}},"className":"welcome","layout":{"type":"constrained"},"metadata":{"name":"Text and Video Popup"}} -->
<div class="wp-block-group alignfull welcome" style="margin-top:0px;padding-top:70px;padding-right:30px;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:30px"><!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","style":{"typography":{"letterSpacing":"-1px"},"spacing":{"margin":{"bottom":"0px"}}},"className":"wp-block-heading","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-48-font-size" style="margin-bottom:0px;letter-spacing:-1px">Text and Video popup</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">FlexLine is the ultimate WordPress theme for website builders.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
            <figure class="wp-block-image aligncenter size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","bottom":"var:preset|spacing|x-large","left":"30px","top":"70px"},"margin":{"top":"0px"},"blockGap":"10px"}},"className":"welcome","layout":{"type":"constrained"},"metadata":{"name":"Text and Poster Gallery"}} -->
<div class="wp-block-group alignfull welcome" style="margin-top:0px;padding-top:70px;padding-right:30px;padding-bottom:var(--wp--preset--spacing--x-large);padding-left:30px"><!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","style":{"typography":{"letterSpacing":"-1px"},"spacing":{"margin":{"bottom":"0px"}}},"className":"wp-block-heading","fontSize":"max-48"} -->
            <h2 class="wp-block-heading has-text-align-left has-max-48-font-size" style="margin-bottom:0px;letter-spacing:-1px">Text and Poster Gallery</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","fontSize":"small"} -->
            <p class="has-text-align-left has-small-font-size">This pattern presets a columns block with some text and gallery set to Poster style. Don't forget, you can use the columns block "Reverse at Mobile" option to put the gallery above the text at mobile.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:gallery {"linkTo":"media","enablePosterGallery":true} -->
            <figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->

                <!-- wp:image {"id":999,"sizeSlug":"large","linkDestination":"media","className":"is-style-card"} -->
                <figure class="wp-block-image size-large is-style-card"><a class="wp-image-185" href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-999" /></a></figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Columns with multiple rows</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You can use any component inside of a column, in this sample we're using Info Boxes. You can simply duplicate a column to add another and you can duplicate the columns block to add more rows.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"},"metadata":{"name":"Columns with multiple rows"}} -->
<div class="wp-block-group"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"className":"is-style-outlined","layout":{"type":"constrained"},"metadata":{"name":"Info Box"}} -->
            <div class="wp-block-group is-style-outlined"><!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading" id="sample-heading-1">Build with FlexLine</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">FlexLine is a powerful WordPress theme created for agencies and professional website builders.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--small)">Sticky Sub Navigation</h2>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-alternate","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Subnav Sticky"}} -->
<div class="wp-block-group alignfull is-style-default has-base-color has-primary-alternate-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","dimRatio":90,"minHeight":50,"gradient":"primary-primaryDark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:navigation {"ref":691,"overlayMenu":"never","align":"wide","className":"has-text-align-center is-style-horizontal-scroll-at-mobile is-style-light-over-dark","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500","lineHeight":"1.1"}},"fontSize":"medium","enableHorizontalScroll":true} /--></div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained","wideSize":"800px"},"metadata":{"name":"Video Feature and Buttons"}} -->
<div class="wp-block-group alignwide"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-362" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"className":"wp-block-heading","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-x-large-font-size" id="image-heading-text-buttons" style="margin-top:var(--wp--preset--spacing--medium)">Watch this video</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained","wideSize":"600px"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secondary-color has-text-color has-link-color wp-element-button">Learn More</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"0"},"blockGap":"var:preset|spacing|small"}},"gradient":"neutral-neutralLight","className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"Horizontal Post Scroll"}} -->
<div class="wp-block-group alignfull is-style-default has-neutral-neutralLight-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:0;padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"align":"wide"} -->
    <h2 class="wp-block-heading alignwide">Horizontal Post Scroll</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":9,"query":{"perPage":"9","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"full"} -->
    <div class="wp-block-query alignfull"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-horizontal-scroll","layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Grid Single - Card Image, Category, Title"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":"latests-posts-3-card","layout":{"type":"constrained"},"metadata":{"name":"Latests Posts - 3 card"}} -->
<div class="wp-block-group alignfull latests-posts-3-card" style="padding-right:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Latest Posts</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":4,"query":{"perPage":3,"pages":"3","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"base","className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"},"metadata":{"name":"Post Grid Single - Card Image, Category, Title"}} -->
        <div class="wp-block-group is-style-card-alt has-base-background-color has-background" style="min-height:100%"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","id":527,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-primary-primaryDark-gradient-background"></span><img class="wp-block-cover__image-background wp-image-527" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"200px","dimRatio":50,"gradient":"primary-primaryDark","style":{"color":{"duotone":"var:preset|duotone|primary"}}} /--></div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""},"layout":{"selfStretch":"fill","flexSize":null}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"x-small","fontFamily":"display"} -->
                <div class="wp-block-group has-display-font-family has-x-small-font-size" style="text-transform:uppercase"><!-- wp:post-terms {"term":"category","style":{"typography":{"lineHeight":"1"}}} /--></div>
                <!-- /wp:group -->

                <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"fontSize":"large","fontFamily":"brand"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
        <p></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral","className":"is-style-card","layout":{"type":"constrained"},"metadata":{"name":"Gallery by Title Small"}} -->
<div class="wp-block-group alignwide is-style-card has-neutral-background-color has-background" style="padding-top:0;padding-bottom:0"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"stretch","width":"35%"} -->
        <div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:35%"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>","id":356,"dimRatio":80,"overlayColor":"primary","minHeight":100,"minHeightUnit":"%","style":{"color":{"duotone":"var:preset|duotone|primary"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--large);min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-356" alt="Sample Image" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"className":"is-style-text-shadow","fontSize":"max-48"} -->
                    <h2 class="wp-block-heading is-style-text-shadow has-max-48-font-size" style="font-style:normal;font-weight:500">Gallery layout with the headline on the left.</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor.</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-columns alignfull"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery Group - Card Alt"},"enableGroupLink":true,"groupLinkURL":"#"} -->
                        <div class="wp-block-group is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
                            <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                                <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->
                            </figure>
                            <!-- /wp:gallery -->

                            <!-- wp:paragraph {"align":"center","fontFamily":"display"} -->
                            <p class="has-text-align-center has-display-font-family">Gallery Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery Group - Card Alt"},"enableGroupLink":true,"groupLinkURL":"#"} -->
                        <div class="wp-block-group is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
                            <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                                <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->
                            </figure>
                            <!-- /wp:gallery -->

                            <!-- wp:paragraph {"align":"center","fontFamily":"display"} -->
                            <p class="has-text-align-center has-display-font-family">Gallery Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-columns alignfull"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery Group - Card Alt"},"enableGroupLink":true,"groupLinkURL":"#"} -->
                        <div class="wp-block-group is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
                            <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                                <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->
                            </figure>
                            <!-- /wp:gallery -->

                            <!-- wp:paragraph {"align":"center","fontFamily":"display"} -->
                            <p class="has-text-align-center has-display-font-family">Gallery Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"is-style-card-alt","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Poster Gallery Group - Card Alt"},"enableGroupLink":true,"groupLinkURL":"#"} -->
                        <div class="wp-block-group is-style-card-alt"><!-- wp:gallery {"columns":3,"linkTo":"media","enablePosterGallery":true} -->
                            <figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
                                <figure class="wp-block-image size-large is-style-default"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->

                                <!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
                                <figure class="wp-block-image size-large"><a href="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="" /></a></figure>
                                <!-- /wp:image -->
                            </figure>
                            <!-- /wp:gallery -->

                            <!-- wp:paragraph {"align":"center","fontFamily":"display"} -->
                            <p class="has-text-align-center has-display-font-family">Gallery Title</p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Tabbed Content</h2>
<!-- /wp:heading -->

<!-- wp:plethoraplugins/tabs {"tabLabels":["Tab 1","Tab 2"],"tabIds":[null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Tab 1","parentLayout":"horizontal"} -->
<!-- wp:pattern {"slug":"flexline/feature-text-video"} /-->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Tab 2","parentLayout":"horizontal"} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Sample Tab content</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"placeholder":"Tab content..."} -->
<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.<br>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:plethoraplugins/tabs {"layout":"vertical","tabLabels":["Vertical Tab 1","Vertical Tab 2","Basic Content"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 1","parentLayout":"vertical"} -->
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:heading -->
    <h2 class="wp-block-heading">Sample Content</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 2","parentLayout":"vertical"} -->
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Pricing Light"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size" style="line-height:1.5">Personal</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"x-large"} -->
        <p class="has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:500">$95/yr.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"backgroundColor":"neutral","className":"has-text-color has-background-color has-alpha-channel-opacity has-base-background-color has-background is-style-wide"} -->
        <hr class="wp-block-separator has-text-color has-neutral-color has-alpha-channel-opacity has-neutral-background-color has-background has-background-color has-base-background-color is-style-wide" />
        <!-- /wp:separator -->

        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">Feature Item</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"width":100} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Basic Content","parentLayout":"vertical"} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Headline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->

<!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion"} -->
<!-- wp:pattern {"slug":"flexline/flexline/product-card"} /-->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion"} -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Address Block</h3>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->
    [flexline_contact_info]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion"} -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained","wideSize":"800px"},"metadata":{"name":"Video Feature and Buttons"}} -->
<div class="wp-block-group alignwide"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=qZ0_aa6RxvQ"} -->
    <figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/built/images/fallback-small.webp'; ?>" alt="Sample Image" class="wp-image-362" /></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"className":"wp-block-heading","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-x-large-font-size" id="image-heading-text-buttons" style="margin-top:var(--wp--preset--spacing--medium)">Watch this video</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained","wideSize":"600px"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secondary-color has-text-color has-link-color wp-element-button">Learn More</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->