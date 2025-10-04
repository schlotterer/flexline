<?php

/**
 * Title: Demo Patterns - Templates
 * Slug: flexline/demo-patterns-templates
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"flexline-icon-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Templates: <a href="#WordPress-List-Templates">List Templates</a> | <a href="#sticky-cta">Page Variations</a> | <a href="#Other-Templates">Other Templates</a> | <a href="#Events-Templates">Events Templates</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->
<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":""} -->
    <p>FlexLine comes with a set of core templates designed to cover the most common WordPress page types right out of the box. Each template is fully customizable and can be combined with your choice of header and footer template parts to create a consistent design system.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>By default, these templates are minimal—providing a clean starting point without pre-filled content. You can:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Manually</strong> add a hero section from the FlexLine patters and create page content as needed.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Automatically</strong> insert starter content by enabling FlexLine’s <strong>Starter Pattern System</strong>, which preloads layouts and block patterns when you create a new page or post.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>If you prefer to start with a “Page Title” layout as your default, simply copy all blocks from the Page with Title template and paste them into the Pages template.</p>
    <!-- /wp:paragraph -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","enableModal":true,"href":"https://www.loom.com/embed/6dfb90a1696b40f7b5fb5c81b6d05110?sid=8b3ae847-cc49-487d-9926-848f06dbded5","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
    <figure class="wp-block-image aligncenter size-large enable-modal is-style-card"><a class="enable-modal-trigger" href="https://www.loom.com/embed/6dfb90a1696b40f7b5fb5c81b6d05110?sid=8b3ae847-cc49-487d-9926-848f06dbded5"><img src="https://cdn.loom.com/sessions/thumbnails/6dfb90a1696b40f7b5fb5c81b6d05110-a71ef96d173e7521-full-play.gif" alt="" /></a></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Primary-Page-Variations">Primary Page Variations</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine includes three main page layout styles, each with a standard and “No Form” variation (removes embedded forms from the design). </p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:table {"className":""} -->
<figure class="wp-block-table">
    <table class="has-fixed-layout">
        <thead>
            <tr>
                <th>Template Name</th>
                <th>Slug</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Page (Default)</strong></td>
                <td><code>page</code></td>
                <td>Clean, standard page layout.</td>
            </tr>
            <tr>
                <td><strong>Page – No Form</strong></td>
                <td><code>page-no-form</code></td>
                <td>Default page without form area.</td>
            </tr>
            <tr>
                <td><strong>Page – Transparent Header</strong></td>
                <td><code>page-hero-title</code></td>
                <td>Full-width hero area with transparent header overlay.</td>
            </tr>
            <tr>
                <td><strong>Page – Transparent Header &amp; No Form</strong></td>
                <td><code>page-hero-title-no-form</code></td>
                <td>Transparent header layout without form area.</td>
            </tr>
            <tr>
                <td><strong>Page – With Page Title</strong></td>
                <td><code>page-no-hero</code></td>
                <td>Standard header area with page title visible.</td>
            </tr>
            <tr>
                <td><strong>Page – With Page Title &amp; No Form</strong></td>
                <td><code>page-no-hero-no-form</code></td>
                <td>Page title layout without form area.</td>
            </tr>
        </tbody>
    </table>
</figure>
<!-- /wp:table -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"href":"https://www.loom.com/embed/b1288f06a5164237b2a515337fb197d9?sid=07182181-2d51-462b-8e99-d43cf2dab4ec","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-card" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/b1288f06a5164237b2a515337fb197d9?sid=07182181-2d51-462b-8e99-d43cf2dab4ec"><img src="https://cdn.loom.com/sessions/thumbnails/b1288f06a5164237b2a515337fb197d9-d9350ab9ec1a3014-full-play.gif" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="WordPress-List-Templates">WordPress List Templates</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>In WordPress, <em>list templates</em> control how collections of posts or other content are displayed. These are used for archive-style pages, search results, and other automatically generated listings. The FlexLine theme includes the following key list templates:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Blog Home</strong> – Displays your most recent posts in reverse chronological order. Used for your main blog page when a static homepage is not set.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Index</strong> – The universal fallback template, used whenever WordPress can’t find a more specific template for the query type.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Archives</strong> – Handles date-based archives (year, month, day), author archives, and taxonomy archives like categories or tags.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Search</strong> – Displays search results based on the visitor’s query, showing matching posts or pages.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Pages &amp; Single Posts (Defaults)</strong> – The base templates for displaying individual posts or pages when no more specific template is available.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p><strong>Note:</strong> FlexLine also includes a full demo pattern dedicated to list views, making it easy to see and customize these templates in action.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>To view the dedicated documentation/demo for list view templates you can include this pattern code in a new page by clicking on edit in code view, once pasted return to visual editor and watch the magic.</p>
    <!-- /wp:paragraph -->

    <!-- wp:code {"className":""} -->
    <pre class="wp-block-code"><code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-templates-list-views"} /--&gt;</code></pre>
    <!-- /wp:code -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Other-Templates">Other Templates</h2>
    <!-- /wp:heading -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Single Post</strong> Default template for individual blog posts.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>404 Page</strong> Displays when content isn’t found.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading"><strong>Blank – No Header or Footer</strong></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>Perfect for landing pages, modals, or embedded app views. Create a page using this template and easily have custom designs to use in modal popups for form or other important content.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"href":"https://www.loom.com/embed/792a78f73a2d4c9fac5e45cf78cdb985?sid=c4cce133-b89c-4f9d-88a3-539f6c1bc6da","linkDestination":"custom","linkClass":"enable-modal-trigger"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-card" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><a class="enable-modal-trigger" href="https://www.loom.com/embed/792a78f73a2d4c9fac5e45cf78cdb985?sid=c4cce133-b89c-4f9d-88a3-539f6c1bc6da"><img src="https://cdn.loom.com/sessions/thumbnails/792a78f73a2d4c9fac5e45cf78cdb985-89a9d0d76037302b-full-play.gif" alt="" /></a></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Text Group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Events-Templates">Events Templates</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine includes patterns and layouts built to work seamlessly with Events Manager, but they can also integrate with most other events plugins using shortcodes or custom blocks.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Getting Started with Events Manager</h3>
    <!-- /wp:heading -->

    <!-- wp:buttons {"className":""} -->
    <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none"} -->
        <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="https://wordpress.org/plugins/events-manager/" target="_blank" rel="noreferrer noopener">Get Events Manager</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine provides custom templates for:</p>
    <!-- /wp:paragraph -->

    <!-- wp:table {"className":""} -->
    <figure class="wp-block-table">
        <table class="has-fixed-layout">
            <thead>
                <tr>
                    <th>Template Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Single Event</td>
                    <td><code>events-single</code></td>
                    <td>Displays details for an individual event.</td>
                </tr>
                <tr>
                    <td>Events List</td>
                    <td><code>events-list</code></td>
                    <td>Shows a list of upcoming events in a responsive layout.</td>
                </tr>
            </tbody>
        </table>
    </figure>
    <!-- /wp:table -->

    <!-- wp:paragraph {"className":"","style":{"typography":{"fontSize":"14px"}}} -->
    <p style="font-size:14px"><em>💡 <strong>Tip:</strong> FlexLine’s admin layouts make it easy to adapt these templates for other event plugins or custom shortcodes.</em></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>To use these templates with Events Manager (EM):</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"ordered":true,"className":""} -->
    <ol class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Download &amp; Import Settings</strong> – Import the provided Events Manager settings file.<!-- wp:list {"className":""} -->
            <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
                <li>This disables EM’s default list view page.</li>
                <!-- /wp:list-item -->

                <!-- wp:list-item {"className":""} -->
                <li>You can then set the Events page to use the <strong>FlexLine Events List</strong> (<code>events-list</code>) template.</li>
                <!-- /wp:list-item -->

                <!-- wp:list-item {"className":""} -->
                <li>From there, edit the intro content however you like.</li>
                <!-- /wp:list-item -->
            </ul>
            <!-- /wp:list -->
        </li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Single Event Template</strong> – The import will also set the single event view to use the <strong>FlexLine Single Event</strong> (<code>single-event</code>) template.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Without Importing</strong> – You can skip the settings import and use EM’s default options if preferred.</li>
        <!-- /wp:list-item -->
    </ol>
    <!-- /wp:list -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Event Registration</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine is designed with <strong>lead capture</strong> in mind and includes a <strong>Gravity Forms</strong> integration for event registration, enabling better CRM workflows. </p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>With FlexLine’s Setup</strong> – The provided single event template embeds a Gravity Form for registration. That form is set up to pass event info directly to hidden form fields.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Using EM’s Native Forms</strong> – You can switch back to Events Manager’s default forms by editing the Single Event formatting and removing the Gravity Form. EM has good documentation and adding their registration forms back into the template is a no-code workflow.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Importing Starter Settings &amp; Formatting</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine includes <strong>Events Manager starter settings</strong> in the theme’s assets.</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"ordered":true,"className":""} -->
    <ol class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Download the <strong><code>events-manager-settings.txt</code></strong> file from the theme’s assets.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>In Events Manager, import this file to apply FlexLine’s formatting and template settings.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>If using the Gravity Form registration, update the <strong>Gravity Form ID</strong> in the Single Event formatting option after import.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>If you want maps and locations displayed, get a <strong>Google Maps API key</strong> and add it in Events Manager’s settings.</li>
        <!-- /wp:list-item -->
    </ol>
    <!-- /wp:list -->

    <!-- wp:buttons {"className":""} -->
    <div class="wp-block-buttons"><!-- wp:button {"className":"flexline-icon-none"} -->
        <div class="wp-block-button flexline-icon-none"><a class="wp-block-button__link wp-element-button" href="/wp-content/themes/flexline/assets/events-manager/em-events-list-single.html">Download Events Manager Settings</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->
