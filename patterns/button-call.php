<?php
/**
 * Title: Button Call - outline
 * Slug: flexline/button-call-outline
 * Categories: flexline-elements
 */
 // Retrieve the phone number from the customizer settings
 $phone_number = get_theme_mod('flexline_main_phone_number', '');
 $tel_link_number = preg_replace('/\D+/', '', $phone_number);
?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"textColor":"base","style":{"spacing":{"padding":{"left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="<?php echo $tel_link_number; ?>" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--x-large)">Call Now</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->