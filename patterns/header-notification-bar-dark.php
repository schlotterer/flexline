<?php

/**
 * Title: Header notification bar with text, button.
 * Slug: flexline/header-notification-bar-dark
 * Categories: flexline-headers
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Notification Container"},"align":"full","className":"headroom-hide-on-scroll","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"right":"30px","left":"30px","top":"15px","bottom":"15px"},"margin":{"top":"0"}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull headroom-hide-on-scroll has-base-color has-contrast-background-color has-text-color has-background has-link-color" style="margin-top:0;padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px"><!-- wp:group {"metadata":{"name":"Content Row"},"className":"","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"x-small"} -->
        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5">You can use the <em>Flexline Visibility</em> controls to hide or show this template part at all breakpoints.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":""} -->
        <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none","style":{"typography":{"fontSize":"14px"},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"}}}} -->
            <div class="wp-block-button has-custom-font-size flexline-icon-none" style="font-size:14px"><a class="wp-block-button__link wp-element-button" href="/wp-admin/site-editor.php?postType=wp_template_part&amp;postId=flexline%2F%2Fnotification-bar&amp;canvas=edit" style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px" target="_blank" rel="noreferrer noopener">Change it here</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->