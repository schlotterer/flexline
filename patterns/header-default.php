<?php
/**
 * Title: Header with site title, navigation.
 * Slug: flexline/header-default
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0px"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;padding-top:15px;padding-right:var(--wp--preset--spacing--small);padding-bottom:15px;padding-left:var(--wp--preset--spacing--small)">
<!-- wp:site-logo {"width":225} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
    <!-- wp:navigation {"openSubmenusOnClick":true,"overlayMenu":"never","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
    <!-- wp:navigation {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"typography":{"textTransform":"uppercase"}}} /--></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->