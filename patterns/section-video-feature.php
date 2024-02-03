<?php
/**
 * Title: Section with image, text, buttons.
 * Slug: flexline/section-video-feature
 * Categories: flexline-sections, flexline-modules
 */
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained","wideSize":"800px"},"metadata":{"name":"Video Feature and Buttons"}} -->
<div class="wp-block-group alignwide"><!-- wp:image {"id":362,"sizeSlug":"large","linkDestination":"none","className":"is-style-shadow-light","enablePopup":true,"popupMediaURL":"https://youtu.be/X35iJBkwQeU"} -->
<figure class="wp-block-image size-large is-style-shadow-light"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/featured-6.jpg'; ?>" alt="Sample Image" class="wp-image-362"/></figure>
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
<!-- /wp:group -->