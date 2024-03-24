<?php

/**
 * Title: Single Event page - using Tribe Events.
 * Slug: flexline/page-event-single
 * Categories: flexline-events
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Single Event Layout"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0">
    
    <!-- wp:pattern {"slug":"flexline/meta-event-single"} /-->

    <!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Event Single Wrap"}} -->
    <div class="wp-block-group"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"right":"0","left":"0"}}}} -->
            <div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:66.66%"><!-- wp:post-content /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:gravityforms/form {"formId":"2","title":false,"description":false,"ajax":true,"inputSize":"lg","inputBorderRadius":"3","inputPrimaryColor":"#919A3B","buttonPrimaryBackgroundColor":"#595f23"} /--></div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
    
    <!-- wp:pattern {"slug":"flexline/cta-large"} /-->

</main>
<!-- /wp:group -->