<?php

/**
 * Title: Tabs Vertical
 * Dependencies: Plethora Tabs + Accordions - https://plethoraplugins.com/tabs-accordions/
 * Slug: flexline/tabs-vertical
 * Categories: flexline-modules, flexline-components, flexline-misc
 */
?>
<!-- wp:plethoraplugins/tabs {"layout":"vertical","tabLabels":["Vertical Tab 1","Vertical Tab 2","Basic Content"],"tabIds":[null,null,null],"metadata":{"name":"Vertical Tabs"}} -->
<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 1","parentLayout":"vertical"} -->
<!-- wp:group {"className":"is-style-card-padded","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card-padded"><!-- wp:heading -->
    <h2 class="wp-block-heading">Sample Content</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Vertical Tab 2","parentLayout":"vertical"} -->

<!-- wp:pattern {"slug":"flexline/pricing-card-light"} /-->

<!-- /wp:plethoraplugins/tab -->

<!-- wp:plethoraplugins/tab {"label":"Basic Content","parentLayout":"vertical"} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Headline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.</p>
<!-- /wp:paragraph -->
<!-- /wp:plethoraplugins/tab -->
<!-- /wp:plethoraplugins/tabs -->