<?php

/**
 * Title: Tabs Accordion
 * Dependencies: Plethora Tabs + Accordions - https://plethoraplugins.com/tabs-accordions/
 * Slug: flexline/tabs-accordion
 * Categories: flexline-modules, flexline-components, flexline-misc
 */
?>
<!-- wp:plethoraplugins/tabs {"layout":"accordion","tabLabels":["Accordion 1","Accordion 2","Accordion 3"],"tabIds":[null,null,null]} -->
<!-- wp:plethoraplugins/tab {"label":"Accordion 1","parentLayout":"accordion"} -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
    <div class="wp-block-column">
        
        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
        
        <!-- wp:pattern {"slug":"flexline/gallery-photo-poster-card"} /-->

    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 2","parentLayout":"accordion"} -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Address Block</h3>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Address Block"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->
    [flexline_contact_info]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Accordion 3","parentLayout":"accordion"} -->

<!-- wp:pattern {"slug":"flexline/section-video-feature"} /-->

<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->