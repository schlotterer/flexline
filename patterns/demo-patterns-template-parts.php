<?php

/**
 * Title: Demo Patterns - Template Parts
 * Slug: flexline/demo-patterns-template-parts
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"flexline-icon-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Template Parts: <a href="#Headers">Headers</a> | <a href="#Notification-Bar">Notification Bar</a> | <a href="#Flexible-Footer-Options">Footer Options</a> | <a href="#Slide-In">Slide-In</a> | <a href="#General-Template-Part">General</a></p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading"><strong>Modular Templates for Maximum Flexibility</strong></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The FlexLine theme is designed with adaptability in mind—and that extends to its templates. Each template uses modular template parts for the header, footer, and slide-in panel, allowing you to mix, match, and customize layouts with ease.</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Headers</strong>: Two header template parts—<strong>Default</strong> and <strong>Transparent</strong>—each with three pre-designed patterns for quick style switching.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Footers</strong>: Two footer template parts—<strong>Default</strong> and <strong>No Form</strong>—each with five layout-ready patterns to suit different content needs.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Slide-in Panel</strong>: A flexible off-canvas area designed for mobile navigation, search, or any custom functionality you want to add.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>General Area</strong>: An open template section that can be used creatively for hero sections, callouts, or any block-based layout you envision.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal","enableModal":true,"modalMediaURL":"https://www.loom.com/embed/acf9de66a9fe47898691b7fb3515b0b7?sid=91309aaa-341c-4b59-8e20-0672ec533f67"} -->
    <figure class="wp-block-image aligncenter size-large enable-modal"><img src="https://cdn.loom.com/sessions/thumbnails/acf9de66a9fe47898691b7fb3515b0b7-2f4ff6f2ae81a8ed-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Headers">Headers</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p><strong>Standard and Transparent Header Template Variations</strong></p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Standard Header</strong> – Positioned within the normal document flow, this header occupies space like any other block and pushes content downward accordingly.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Transparent Header</strong> – Positioned absolutely over the page content. It typically appears over a hero image or colored background, allowing that background to show through for a more immersive visual effect.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>Switching between these designs is easy using the Site Editor—just apply a Header Template Part pattern to the header area to change its appearance and behavior.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":3,"className":""} -->
    <h3 class="wp-block-heading">Header Pattern Options</h3>
    <!-- /wp:heading -->

    <!-- wp:table {"className":""} -->
    <figure class="wp-block-table">
        <table class="has-fixed-layout">
            <thead>
                <tr>
                    <th>Pattern Name</th>
                    <th>Display Style</th>
                    <th>Default</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Left Logo</td>
                    <td>Standard</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td>Left Logo – Transparent</td>
                    <td>Transparent</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td>Centered Logo</td>
                    <td>Standard</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Centered Logo – Transparent </td>
                    <td>Transparent</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Flagged Logo</td>
                    <td>Standard</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Flagged Logo – Transparent </td>
                    <td>Transparent</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </figure>
    <!-- /wp:table -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/97433373213f4d4e8dac00fe4dc08514?sid=f4ae7cf8-ed38-439d-9e31-1d254d48dfa8"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/97433373213f4d4e8dac00fe4dc08514-53437b8197ed6534-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Notification-Bar">Notification Bar</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The <strong>notification bar</strong> is included in all of the designed header template patterns as a template part. This means no mater what layout you choose you can have the option for a globally controlled notification bar.</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Control its <strong>content and styles</strong> globally.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Use the <strong>FlexLine Visibility</strong> options to show/hide the bar across all pages from a single location.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/8b118671a7de44aaa76ab680eb81db2e?sid=3a738e15-293a-43c5-9687-d81341d2856d"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/8b118671a7de44aaa76ab680eb81db2e-4585dfeb5114f1e7-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Flexible-Footer-Options"><strong>Flexible Footer Options</strong></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The FlexLine theme includes two core footer template parts designed to suit a variety of site needs:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Footer with Form</strong> – Ideal for capturing leads, newsletter signups, or contact requests. Includes support for different form styles and layouts.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Footer without Form</strong> – A cleaner, content-focused layout for when the main form is in the content, or a careers portal, or the focus on the page would be hurt by a large form.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>To help you dial in the perfect layout, the theme includes several pattern variations you can apply to either footer template:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Footer with Map and Links</strong> – Great for local businesses or physical locations. Displays a map alongside key navigation links.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Footer with Phone Directory and Links</strong> – Perfect for organizations or teams that need to showcase multiple contact numbers.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Quick Form with Sticky Address</strong> – A compact contact form paired with a persistent location/address section.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Quick Form Only</strong> – A minimalist approach focused solely on collecting user input.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Footer Submenu</strong> – Adds a secondary layer of navigation or utility links below the main footer content.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>You can also swap in different content patterns, including:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Two footer layout variations</strong> for links and business info.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Two form styles</strong>, letting you choose between a simple field layout or a more styled version.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Optional sub-footer</strong> pattern for copyright, privacy policy, or extra navigation.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>Together, these options make it easy to build a footer that fits your brand, supports your goals, and adapts as your site grows.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/8af7448c0e8446a7a4f5bfb2fef862b1?sid=c1c81eb5-7ba8-4f1d-9c97-3736f4c83660"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/8af7448c0e8446a7a4f5bfb2fef862b1-a3a6d52138567b58-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Slide-In">Slide-In (Mobile Navigation)</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>The <strong>Slide-In</strong> template part opens when the search/mobile nav icon is clicked. By default, the search icon is vertically centered in the header and positioned on the right side of the page. On desktop, it appears as a <strong>search icon</strong>; on tablet and mobile devices, it appears as a <strong>hamburger navigation icon</strong>. You can force the hamburger icon to display at all breakpoints via theme settings, or disable the slide-in option entirely.</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Default use:</strong> site search + mobile navigation</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Fully editable Gutenberg template part—ideal for <strong>custom mobile menus</strong></li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Can be disabled entirely in theme settings</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","className":"enable-modal","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/f1b0dbb7531a43c385d490a6698f0d0d?sid=55e86d7d-5b54-4d71-81bd-a840a2232c18"} -->
<figure class="wp-block-image aligncenter size-large enable-modal" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/f1b0dbb7531a43c385d490a6698f0d0d-a9481f10c448d37b-full-play.gif" alt="" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">General Template Part</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>An open, flexible section you can use for custom elements—like:</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Promotional banners</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Page-level CTAs</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>A secondary notification bar</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->