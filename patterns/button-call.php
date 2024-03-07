<?php
/**
 * Title: Button Call
 * Slug: flexline/button-call
 * Categories: flexline-utilities
 */
 // Retrieve the phone number from the customizer settings
 $phone_number = get_theme_mod('flexline_main_phone_number', '');
 $tel_link_number = preg_replace('/\D+/', '', $phone_number);
?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="tel:<?php echo $tel_link_number; ?>" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">Call Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->