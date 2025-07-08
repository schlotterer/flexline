<?php

/**
 * Title: Events List
 * Slug: flexline/events-list
 * Categories: flexline-posts-templates
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Events List Group"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"dimRatio":0,"overlayColor":"neutral","isUserOverlayColor":true,"minHeight":50,"isDark":false,"metadata":{"name":"Events Background"},"align":"full","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light" style="min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-background-color has-background-dim-0 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:shortcode -->
            [events_list]
            <!-- /wp:shortcode -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->