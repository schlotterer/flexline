<?php

/**
 * Title: Slide In Navigation.
 * Slug: flexline/slide-in-menu
 * Categories: flexline-utilities
 * 
 * 
 */
// Retrieve the phone number from the customizer settings
$phone_number = get_theme_mod('flexline_main_phone_number', '');
$tel_link_number = preg_replace('/\D+/', '', $phone_number);
?>
<!-- wp:group {"tagName":"aside","lock":{"move":true,"remove":true},"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"backgroundColor":"primary","layout":{"type":"constrained"},"metadata":{"name":"Slide In Menu"}} -->
<aside id="slide-in-menu" class="wp-block-group has-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Logo and Feature Buttons"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"metadata":{"name":"Logo, Search and Feature Buttons"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":250,"style":{"color":{"duotone":["#ffffff","#ffffff"]}}} /-->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","style":{"spacing":{"padding":{"left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" href="/contact/" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--x-large)">Contact</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","style":{"spacing":{"padding":{"left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="tel:<?php echo $tel_link_number; ?>" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--x-large)">Call Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:search {"label":"Search","showLabel":false,"width":100,"widthUnit":"%","buttonText":"Search","style":{"layout":{"selfStretch":"fill","flexSize":null}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"},"metadata":{"name":"Menu Columns"}} -->
<div class="wp-block-group has-base-color has-text-color has-link-color"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"ref":427,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"0"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"ref":428,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"0"}}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></aside>
<!-- /wp:group -->