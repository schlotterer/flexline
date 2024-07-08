<?php

/**
 * Title: Single Event page - using Tribe Events.
 * Slug: flexline/events-single
 * Categories: flexline-events
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"Single Event Layout"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0">
    
    <!-- wp:pattern {"slug":"flexline/meta-page"} /-->

    <!-- wp:columns {"metadata":{"name":"Sidebar Section"},"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"stackAtTablet":true} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"","metadata":{"name":"Large Column"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Content Group"},"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
                <!-- wp:post-content {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"350px","metadata":{"name":"Small Column"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
        <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:350px"><!-- wp:group {"metadata":{"name":"Sticky Container"},"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Subnav Sticky"},"className":"is-style-default","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":""}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"dimRatio":0,"minHeight":50,"gradient":"primary-primaryDark","isDark":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover is-light" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:gravityforms/form {"formId":"1","title":false,"description":false,"ajax":true,"inputBorderRadius":"0","inputBorderColor":"#af844b","inputPrimaryColor":"#7A8442","descriptionColor":"#8B807C","buttonPrimaryBackgroundColor":"#7A8442"} /--></div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    
    <!-- wp:pattern {"slug":"flexline/cta-large"} /-->

</main>
<!-- /wp:group -->