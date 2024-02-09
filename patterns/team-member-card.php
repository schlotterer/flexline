<?php
/**
 * Title: Team Member Card
 * Slug: flexline/team-member-card
 * Categories: flexline-components, flexline-misc
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-card-padded","layout":{"type":"constrained"},"metadata":{"name":"Team Member Card"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:image {"align":"center","id":3489,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/fallback.jpg'; ?>" alt="Sample Image" class="wp-image-3489" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Name and Title"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->