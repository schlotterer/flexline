<?php

/**
 * Title: Quick Form
 * Slug: flexline/footer-quick-form
 * Categories: flexline-sections, flexline-footers
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Quick Form"}} -->
<div id="quickForm" class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>","id":506,"dimRatio":90,"overlayColor":"neutral-dark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}},"color":{"duotone":"var:preset|duotone|neutral-dark"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><span aria-hidden="true" class="wp-block-cover__background has-neutral-dark-background-color has-background-dim-90 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-506" alt="" src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/fallback.jpg'; ?>" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","fontSize":"max-36"} -->
            <h2 class="wp-block-heading has-text-align-center has-max-36-font-size">We're excited to hear from you!</h2>
            <!-- /wp:heading -->

            <!-- wp:group {"layout":{"type":"constrained","contentSize":"700px"}} -->
            <div class="wp-block-group"><!-- wp:gravityforms/form {"formId":"3","title":false,"description":false,"ajax":true,"inputSize":"lg","inputBorderRadius":"0","inputBorderColor":"#ffffff","inputColor":"#0e161e","inputPrimaryColor":"#595f23","labelColor":"#ffffff","descriptionColor":"#ffffff","buttonPrimaryBackgroundColor":"#595f23","buttonPrimaryColor":"#ffffff"} /--></div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->