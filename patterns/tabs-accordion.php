<?php
/**
 * Title: Tabs Accordion
 * Dependencies: Plethora Tabs + Accordions - https://plethoraplugins.com/tabs-accordions/
 * Slug: flexline/tabs-accordion
 * Categories: flexline-modules, flexline-sections
 */
?>
<!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion"} -->
<!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"className":"stacked is-style-card-padded","layout":{"type":"default"},"metadata":{"name":"CTA - Image - Card"}} -->
<div class="wp-block-group stacked is-style-card-padded" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:image {"id":6001,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/feature-3.pg'; ?>" alt="Sample Image" class="wp-image-6001"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"15px"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">FlexLine WordPress Theme</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"}}} -->
<p style="line-height:1.5">The ultimate WordPress block theme for agencies and website builders.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">Buy FlexLine</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion"} -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Address Block</h3>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->
[flexline_contact_info]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion"} -->
<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"constrained","wideSize":"800px"},"metadata":{"name":"Video Feature and Buttons"}} -->
<div class="wp-block-group alignwide"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://youtu.be/X35iJBkwQeU"} -->
<figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/feature-3.pg'; ?>" alt="Sample Image" class="wp-image-362"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"className":"wp-block-heading","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" id="image-heading-text-buttons" style="margin-top:var(--wp--preset--spacing--medium)">Watch this video</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","wideSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"secondary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secondary-color has-text-color has-link-color wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->