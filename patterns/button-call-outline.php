<?php
/**
 * Title: Button Call - outline
 * Slug: flexline/button-call-outline
 * Categories: featured
 */

 // Retrieve the phone number from the customizer settings
 $phone_number = get_theme_mod('flexline_main_phone_number', '');
 $tel_link_number = preg_replace('/\D+/', '', $phone_number);
?>
<!-- wp:button {"textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline">
    <a class="wp-block-button__link has-secondary-color has-text-color has-link-color wp-element-button" href="tel:<?php echo $tel_link_number; ?>" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Call Now</a>
</div>
<!-- /wp:button -->