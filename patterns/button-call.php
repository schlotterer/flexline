<?php

/**
 * Title: Button Call
 * Slug: flexline/button-call
 * Categories: flexline-utilities, flexline-components, flexline-cta
 */
// Retrieve the phone number from the customizer settings
namespace FlexLine\flexline;
$mainPhoneTitle = get_option('flexline_main_phone_title', '');
$phoneLinkText = !empty($mainPhoneTitle) ? $mainPhoneTitle : "Call Now";
$aria_label = !empty($mainPhoneTitle) ? $mainPhoneTitle : "Call Now";
$tel_link_number = flexline_get_phone_button_link();
?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"is-style-fill"} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" aria-label="<?php echo $aria_label; ?>" href="<?php echo $tel_link_number; ?>" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)"><?php echo $phoneLinkText; ?></a></div>
    <!-- /wp:button -->
</div>
<!-- /wp:buttons -->