<?php

/**
 * Title: Team Member
 * Slug: flexline/team-member
 * Categories: flexline-components, flexline-misc
 */
namespace FlexLine;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"is-style-default","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Team Member"}} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"align":"center","id":3489,"aspectRatio":"3/2","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(feature_image_fallback()); ?>" alt="Sample Image" class="wp-image-3489" style="aspect-ratio:3/2;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"metadata":{"name":"Name and Title"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
        <h3 class="wp-block-heading has-text-align-center has-medium-font-size" id="member-name-1">Member Name</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5","textTransform":"uppercase"}},"fontSize":"x-small"} -->
        <p class="has-text-align-center has-x-small-font-size" style="line-height:1.5;text-transform:uppercase">Title</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->