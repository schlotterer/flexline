<?php

/**
 * Title: Demo Patterns - Templates - Starter Content
 * Slug: flexline/demo-patterns-templates-starter-content
 * Categories: flexline-demos 
 * Inserter: false
 */

namespace FlexLine\flexline;
?>
<!-- wp:group {"metadata":{"name":"Subnav Sticky","categories":["flexline-components"],"patternName":"flexline/subnav-sticky"},"align":"full","className":"flexline-icon-none","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"textColor":"base","gradient":"primary-primaryDark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull flexline-icon-none has-base-color has-primary-primaryDark-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"minHeight":50,"minHeightUnit":"px","gradient":"primary-primaryDark","align":"full","className":"","style":{"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"8px","bottom":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-base-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--large);padding-bottom:8px;padding-left:var(--wp--preset--spacing--large);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-primary-primaryDark-gradient-background"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|warning"},":hover":{"color":{"text":"var:preset|color|highlight"}}}},"typography":{"lineHeight":"1.3"}},"textColor":"base","fontFamily":"display"} -->
            <p class="has-base-color has-text-color has-link-color has-display-font-family" style="line-height:1.3">Patterns: <a href="#Quick‑Start-–-Page-&amp;-Post-Starters">Quick Start</a> | <a href="#Template‑Specific-Starters">Template Specific Starters</a> | <a href="#Synced-Patterns-&amp;-Overrides">Synced Patterns &amp; Overrides</a> </p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"text group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">Purpose</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>Automatically seed a brand‑new page or post with a block pattern you control—saving clicks and speeding up content creation.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine includes a helper that watches for a blank editor and silently inserts the right pattern. By default, FlexLine does nothing unless you’ve set up one of the starter patterns below.</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading">How It Works</h2>
    <!-- /wp:heading -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li><strong>Default:</strong> Gutenberg opens blank.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Page/Post Starters:</strong> If you duplicate and rename the shipped <code>page-starter-starter</code> or <code>post-starter-starter</code> patterns to <code>page-starter</code> or <code>post-starter</code>, FlexLine will auto-insert them whenever you create a new page or post.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li><strong>Template-Specific Starters:</strong> For any theme template, create a pattern whose slug matches the template slug with <code>starter</code> appended. If a post/page uses that template, FlexLine inserts the matching pattern.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"text group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Quick‑Start-–-Page-&amp;-Post-Starters">Quick‑Start – Page &amp; Post Starters</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>FlexLine ships with blueprint “starter starter” patterns for posts and pages. Duplicate once, rename, and you’re set.</p>
    <!-- /wp:paragraph -->

    <!-- wp:table {"className":""} -->
    <figure class="wp-block-table">
        <table class="has-fixed-layout">
            <thead>
                <tr>
                    <th>Ships‑With Pattern</th>
                    <th>Duplicate &amp; Rename To</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>flexline/post-starter-starter</code></td>
                    <td><code>flexline/post-starter</code></td>
                    <td>Seeds every new post</td>
                </tr>
                <tr>
                    <td><code>flexline/page-starter-starter</code></td>
                    <td><code>flexline/page-starter</code></td>
                    <td>Seeds every new page</td>
                </tr>
            </tbody>
        </table>
    </figure>
    <!-- /wp:table -->

    <!-- wp:paragraph {"className":""} -->
    <p><strong>Steps:</strong></p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"ordered":true,"className":""} -->
    <ol class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>In Site Editor, go to <strong>Patterns → All Patterns</strong>.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Locate the starter pattern.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>⋯ → <strong>Duplicate</strong>.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Rename the Title and Slug exactly as shown above.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Edit blocks to match your preferred default content.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Save. Done.</li>
        <!-- /wp:list-item -->
    </ol>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>💡 <em>Tip:</em> Need unique defaults per author? Create variations (e.g. <code>post-starter-marketing</code>) and have authors duplicate/rename as needed.</p>
    <!-- /wp:paragraph -->

    <!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/2264ecddc28a4bbaa56910c34e85ac6b?sid=f866bc23-0ff1-4f50-b134-f4848042f6cd"} -->
    <figure class="wp-block-image aligncenter size-large enable-modal is-style-card" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/2264ecddc28a4bbaa56910c34e85ac6b-909a66f8f02d8a83-full-play.gif" alt="" /></figure>
    <!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"text group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Template‑Specific-Starters">Template‑Specific Starters</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>Coming soon:</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p>For custom templates (e.g. <code>page-hero-title.php</code>):</p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Create a pattern whose slug equals the template filename (no extension) plus <code>starter</code>.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Example: <code>page-hero-title-starer.php</code> → <code>page-hero-title-starter</code></li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>When a post or page uses that template, FlexLine auto‑inserts the matching pattern.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","align":"center","className":"enable-modal is-style-card","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"enableModal":true,"modalMediaURL":"https://www.loom.com/embed/3d1a56ebc7894762a79ff12827d0b391?sid=41cfdc28-cdd2-496a-a379-21840939d249"} -->
<figure class="wp-block-image aligncenter size-large enable-modal is-style-card" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><img src="https://cdn.loom.com/sessions/thumbnails/3d1a56ebc7894762a79ff12827d0b391-dbde3211ac8d0b73-full-play.gif" /></figure>
<!-- /wp:image -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"text group"},"className":"","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":""} -->
    <h2 class="wp-block-heading" id="Synced-Patterns-&amp;-Overrides">Synced Patterns &amp; Overrides (WP 6.5+)</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":""} -->
    <p>Pattern overrides let you lock layout &amp; style while allowing per‑instance content changes.</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"className":""} -->
    <p><strong>Why use them with starters?</strong></p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"className":""} -->
    <ul class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Keep recurring sections (hero, testimonials, CTAs) consistent.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Edit content per page without breaking structure.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Global style updates cascade site‑wide.</li>
        <!-- /wp:list-item -->
    </ul>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p><strong>Setup:</strong></p>
    <!-- /wp:paragraph -->

    <!-- wp:list {"ordered":true,"className":""} -->
    <ol class="wp-block-list"><!-- wp:list-item {"className":""} -->
        <li>Create/duplicate a pattern under <strong>Patterns → My Patterns</strong> and toggle <strong>Synced</strong>.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>In the pattern editor, select blocks to vary → enable <strong>Overrides</strong>.</li>
        <!-- /wp:list-item -->

        <!-- wp:list-item {"className":""} -->
        <li>Insert anywhere—including inside a starter pattern.</li>
        <!-- /wp:list-item -->
    </ol>
    <!-- /wp:list -->

    <!-- wp:paragraph {"className":""} -->
    <p>💡 <em>Pro Tip:</em> Lock structural blocks (Columns, Groups) and override only content blocks.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":""} -->
<p></p>
<!-- /wp:paragraph -->