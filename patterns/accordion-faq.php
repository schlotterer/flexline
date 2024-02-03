<?php
/**
 * Title: FAQ/Accordion.
 * Slug: flexline/accordion-faq
 * Categories: flexline-components, flexline-misc
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"FAQ / Accordions"}} -->
<div class="wp-block-group"><!-- wp:plethoraplugins/tabs {"layout":"accordion","theme":"basic","tabLabels":["FAQ Title text","FAQ Title 2"],"tabIds":[null,null],"hTabResponsive":"accordion"} -->
<!-- wp:plethoraplugins/tab {"label":"FAQ Title text","parentLayout":"accordion"} -->
<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:heading -->
<h2 class="wp-block-heading">Content Headline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:image {"id":895,"sizeSlug":"full","linkDestination":"none","enablePopup":true,"popupMediaURL":"https://www.youtube.com/watch?v=G1hKzCkywM8"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/placeholder-stringlights.gif'; ?>" alt="" class=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"FAQ Title 2","parentLayout":"accordion"} -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading -->
<h2 class="wp-block-heading">Section Heading</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-column has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" id="sample-heading-1">Build with FlexLine</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>FlexLine is a powerful WordPress theme created for agencies and professional website builders. With its clean, minimal design, FlexLine provides the perfect canvas for stylish and sophisticated websites.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-column has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" id="sample-heading-1">Build with FlexLine</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>FlexLine is a powerful WordPress theme created for agencies and professional website builders. With its clean, minimal design, FlexLine provides the perfect canvas for stylish and sophisticated websites.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs --></div>
<!-- /wp:group -->