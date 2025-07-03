<?php
/**
 * Render theme settings documentation tab.
 *
 * @package flexline
 */

/**
 * Renders the documentation tab for the flexline theme.
 *
 * Generates HTML for a two‑column layout: the docs content on the left and a sticky
 * “On this page” table‑of‑contents on the right. Each top‑level section headline
 * carries an <code>id</code>, which the nav anchors reference, giving users quick
 * jump‑links and smooth scrolling within the tab.
 *
 * @return void
 */
function flexline_render_documentation_tab() {
    ?>
    <style>
        /* Layout */
        .wrapper {
            display: flex;
            flex-wrap: nowrap;
        }

        .wrapper > * {
            padding: 20px;
        }

        .content-container {
            flex: 1 1 auto;
            min-width: 0; /* prevents overflow kicking in on small admin widths */
        }

        .nav-container {
            width: 240px;
            flex-shrink: 0;
        }

        /* Sticky sidebar nav */
        .nav-container nav {
            position: sticky;
            top: 20px;
            border-left: 3px solid #ececec;
            padding-left: 15px;
            font-size: 14px;
        }

        .nav-container nav h4 {
            margin-top: 0;
            font-weight: 600;
        }

        .nav-container ul {
            list-style: none;
            margin: 0 0 0.5rem 0;
            padding: 0;
        }

        .nav-container li {
            margin: 0 0 0.35rem 0;
        }

        .nav-container a {
            text-decoration: none;
        }

        .nav-container ul ul {
            padding-left: 1rem;
        }

        /* Docs table aesthetics */
        .flexline-docs-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            font-size: 13px;
        }

        .flexline-docs-table th,
        .flexline-docs-table td {
            padding: 0.5rem 0.75rem;
            border: 1px solid #dadcde;
            text-align: left;
            vertical-align: top;
        }

        .flexline-docs-table th {
            background: #f5f0e9;
            font-weight: 600;
        }

        code {
            background: #f0f0f0;
            padding: 2px 4px;
            border-radius: 3px;
            font-family: monospace;
            word-break: break-all;
        }
    </style>

    <div class="wrapper">
        <div class="content-container">
            <!-- ✨ INTRO -->
            <section id="intro">
                <h2>Flexline Theme&nbsp;Documentation</h2>
                <p>Below you’ll find a reference for the block‑level Inspector controls <em>and</em> utility classes that ship with the theme. Everything is <strong>opt‑in</strong>: nothing changes until you either (a)&nbsp;add a class in the block editor’s <em>Additional&nbsp;CSS&nbsp;Class(es)</em> field or (b)&nbsp;toggle an option inside the block’s sidebar. Use the nav on the right to jump around.</p>
            </section>
             <!-- ✨ BLOCK OPTIONS -->
             <section id="block-options">
                <h3>Block Options (Flexline&nbsp;Controls)</h3>
                <p>The following extra toggles appear in various core blocks’ sidebars. Use them for quick layout and functionality customizations.</p>

                <table class="flexline-docs-table">
                    <thead>
                        <tr>
                            <th style="width:30%">Option / Attribute</th>
                            <th style="width:25%">Blocks</th>
                            <th>What it does</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ✦ VISIBILITY -->
                        <tr>
                            <td><strong>Hide on Desktop / Tablet / Mobile</strong></td>
                            <td>All blocks with Flexline panel</td>
                            <td>Toggles block visibility at common breakpoints—adds the appropriate <code>flexline-hide‑on‑*</code> class under the hood.</td>
                        </tr>
                        <!-- ✦ IMAGE / COVER -->
                        <tr>
                            <td><strong>Enable Lazy&nbsp;Load</strong></td>
                            <td>Image, Cover</td>
                            <td>Ensures the asset loads immediately (Flexline disables native lazy‑loading by default).</td>
                        </tr>
                        <tr>
                            <td><strong>Open in Modal</strong></td>
                            <td>Image, Button</td>
                            <td>Clicking the block opens a media‑modal (lightbox) instead of following its link.</td>
                        </tr>
                        <!-- ✦ BUTTON -->
                        <tr>
                            <td><strong>Icon&nbsp;Type</strong></td>
                            <td>Button</td>
                            <td>Adds a small SVG icon (download arrow, play symbol, external‑link arrow, etc.) to the right of the label.</td>
                        </tr>
                        <tr>
                            <td><strong>No&nbsp;Wrap</strong></td>
                            <td>Button</td>
                            <td>Prevents the label from breaking onto two lines.</td>
                        </tr>
                        <!-- ✦ GALLERY -->
                        <tr>
                            <td><strong>Poster&nbsp;Gallery</strong></td>
                            <td>Gallery</td>
                            <td>Converts a tiled gallery into a film‑strip style with one large “poster” image.</td>
                        </tr>
                        <!-- ✦ NAVIGATION -->
                        <tr>
                            <td><strong>Enable Scroll&nbsp;@&nbsp;Mobile</strong></td>
                            <td>Navigation</td>
                            <td>Makes the nav list swipeable below <em><?= esc_html( '$mobile' ); ?></em>.</td>
                        </tr>
                        <!-- ✦ GROUP -->
                        <tr>
                            <td><strong>Enable Group Link</strong></td>
                            <td>Group / Stack / Row / Grid</td>
                            <td>Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.</td>
                        </tr>
                        <!-- ✦ COLUMNS / POST TEMPLATE: SCROLLER -->
                        <tr>
                            <td><strong>Horizontal Scroller</strong></td>
                            <td>Columns, Post Template</td>
                            <td>Turns the container into a swipeable carousel; subordinate toggles control nav, auto‑scroll, etc.</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Show Arrow Nav</td>
                            <td></td>
                            <td>Displays prev/next arrow buttons overlaying the scroller.</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Loop</td>
                            <td></td>
                            <td>Clones slides so scrolling never stops.</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Auto Scroll</td>
                            <td></td>
                            <td>Starts scrolling on page load (respecting the chosen interval).</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Hide Scrollbar</td>
                            <td></td>
                            <td>Hides the native scrollbar for a cleaner look.</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Pause on Hover</td>
                            <td></td>
                            <td>Pauses the auto‑scroll when the user hovers over the scroller.</td>
                        </tr>
                        <tr>
                            <td class="pl-3">&nbsp;&mdash; Button Positions / Colors</td>
                            <td></td>
                            <td>Control arrow placement (top/bottom, left/right/center), background, text color, border, and box‑shadow.
                            </td>
                        </tr>
                        <!-- ✦ COLUMNS -->
                        <tr>
                            <td><strong>Stack at Tablet</strong></td>
                            <td>Columns</td>
                            <td>Switches from horizontal columns to a vertical stack at medium screens.</td>
                        </tr>
                        <!-- ✦ CONTENT SHIFT -->
                        <tr>
                            <td><strong>Content Shift / Slide</strong></td>
                            <td>Image, Group, Column, etc.</td>
                            <td>Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.</td>
                        </tr>
                    </tbody>
                </table>
            </section>


            <!-- ✨ STYLE VARIATIONS -->
            <section id="style-variations">
    <h3>Style Variations (Block Styles)</h3>
    <p>Select these from the block’s <strong>Styles ►</strong> menu to instantly change appearance—no custom CSS needed.</p>

    <table class="flexline-docs-table">
        <thead>
            <tr>
                <th style="width:22%">Block</th>
                <th style="width:20%">Style&nbsp;Slug</th>
                <th style="width:22%">Label in Editor</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
<?php
/* -----------------------------------------------------------------------
 * 1.  Source-of-truth array you already register with
 * -------------------------------------------------------------------- */
$block_styles = [
    'core/columns' => [
        'columns-reverse' => __( 'Reverse when stacked', 'flexline' ),
    ],
    'core/group' => [
        'shadow-light'    => __( 'Shadow', 'flexline' ),
        'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
        'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
        'card'            => __( 'Card', 'flexline' ),
        'card-padded'     => __( 'Card w/ Padding', 'flexline' ),
        'card-alt'        => __( 'Card w/ Images that fill', 'flexline' ),
        'outlined'        => __( 'Outlined w/ Padding', 'flexline' ),
        'glass'           => __( 'Glass', 'flexline' ),
        'glass-card'      => __( 'Glass Card', 'flexline' ),
    ],
    'core/image' => [
        'shadow-light'    => __( 'Shadow', 'flexline' ),
        'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
        'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
        'card'            => __( 'Card', 'flexline' ),
    ],
    'core/post-featured-image' => [
        'shadow-light'    => __( 'Shadow', 'flexline' ),
        'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
        'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
        'card'            => __( 'Card', 'flexline' ),
    ],
    'core/list' => [
        'no-disc' => __( 'No Disc', 'flexline' ),
    ],
    'core/navigation' => [
        'main-header-nav' => __( 'Main Header Style', 'flexline' ),
        'dark-over-light' => __( 'Dark on Light', 'flexline' ),
        'light-over-dark' => __( 'Light on Dark', 'flexline' ),
    ],
    'core/navigation-link' => [
        'outline'     => __( 'Outline', 'flexline' ),
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/quote' => [
        'shadow-light'    => __( 'Shadow', 'flexline' ),
        'shadow-dark'     => __( 'Shadow Dark', 'flexline' ),
        'shadow-diffused' => __( 'Shadow Diffused', 'flexline' ),
        'card'            => __( 'Card', 'flexline' ),
        'card-padded'     => __( 'Card w/ Padding', 'flexline' ),
        'outlined'        => __( 'Outlined w/ Padding', 'flexline' ),
        'glass'           => __( 'Glass', 'flexline' ),
        'glass-card'      => __( 'Glass Card', 'flexline' ),
    ],
    'core/social-links' => [
        'outline' => __( 'Outline', 'flexline' ),
    ],
    'core/heading' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
        'creative'    => __( 'Creative', 'flexline' ),
    ],
    'core/site-title' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
        'creative'    => __( 'Creative', 'flexline' ),
    ],
    'core/post-title' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
        'creative'    => __( 'Creative', 'flexline' ),
    ],
    'core/post-terms' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
    ],
    'core/paragraph' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/post-date' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
    ],
    'core/post-author' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/post-author-biography' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/post-author-name' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/post-excerpt' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/post-navigation-link' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
    ],
    'core/query-pagination' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/query-title' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'creative'    => __( 'Creative', 'flexline' ),
    ],
    'core/read-more' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
    ],
    'core/site-tagline' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
        'creative'    => __( 'Creative', 'flexline' ),
    ],
    'core/term-description' => [
        'text-shadow' => __( 'Text Shadow', 'flexline' ),
        'eyebrow'     => __( 'Eyebrow', 'flexline' ),
    ],
    'core/button' => [
        'glass-button' => __( 'Glass Button', 'flexline' ),
        'text-link'    => __( 'Plain Text', 'flexline' ),
    ],
];

/* -----------------------------------------------------------------------
 * 2.  Rich descriptions keyed by same slug
 * -------------------------------------------------------------------- */
$style_descriptions = [
    // Columns
    'columns-reverse'   => 'Maintains column order in the editor but flips it when the Columns block stacks on smaller screens—handy for mobile-first layouts.',
    // Box / layout styles
    'card'              => 'Clean white “card” container with border-radius & light shadow. Zero internal padding so media can edge-to-edge.',
    'card-padded'       => 'Same as Card but with theme-small padding baked in.',
    'card-alt'          => 'Edge-to-edge images on top; inner text gets theme-small padding. Perfect for image-lead cards.',
    'outlined'          => 'Adds a 1-px accent border & padding, no shadow. Minimalist card alternative.',
    'shadow-light'      => 'Subtle, soft shadow for slight elevation.',
    'shadow-dark'       => 'Deeper shadow for stronger lift; hover swaps to diffused shadow when wrapped in a Group Link.',
    'shadow-diffused'   => 'Wide, feathered shadow—great behind covers or hero quotes.',
    'glass'             => 'Frosted-glass effect: semi-transparent base + 10 px blur + saturate.',
    'glass-card'        => 'Glass background plus card border-radius & light shadow—ideal over photography.',
    // Lists
    'no-disc'           => 'Strips bullets & left-padding for clean checklist or icon lists.',
    // Nav
    'main-header-nav'   => 'Opinionated spacing & weight for primary site navigation.',
    'dark-over-light'   => 'Dark text color set atop light backgrounds; pairs with transparent links.',
    'light-over-dark'   => 'Light text on dark backgrounds for hero/footers.',
    'outline'           => 'Navigation links gain a 1 px outline & pill padding on desktop-up.',
    // Text styles
    'text-shadow'       => 'Applies the theme’s subtle text shadow variable for soft lift.',
    'eyebrow'           => 'Small uppercase “eyebrow” heading with custom font/size/color.',
    'creative'          => 'Large decorative headline style using the site’s creative font.',
    // Buttons
    'glass-button'      => 'Transparent glass button with blur & subtle border that intensifies on hover.',
    'text-link'         => 'Removes button chrome so it looks like a plain text link (adds hover underline).',
];

/* -----------------------------------------------------------------------
 * 3.  Render table rows
 * -------------------------------------------------------------------- */
foreach ( $block_styles as $block => $styles ) {
    $rowspan = count( $styles );
    $first   = true;

    foreach ( $styles as $slug => $label ) {
        echo '<tr>';

        // Block name only once
        if ( $first ) {
            echo '<td rowspan="' . esc_attr( $rowspan ) . '"><code>' . esc_html( $block ) . '</code></td>';
            $first = false;
        }

        echo '<td><code>' . esc_html( $slug ) . '</code></td>';
        echo '<td>' . esc_html( $label ) . '</td>';
        echo '<td>' . esc_html( $style_descriptions[ $slug ] ?? '' ) . '</td>';
        echo '</tr>';
    }
}
?>
        </tbody>
    </table>
</section>



            <!-- ✨ UTILITY CLASSES -->
            <section id="utility-classes">
                <h3>Admin &amp; Front‑end Utility Classes</h3>

                <h4 id="whitespace-overflow">Whitespace &amp; Overflow</h4>
                <table class="flexline-docs-table">
                    <thead>
                        <tr>
                            <th style="width:22%">Class</th>
                            <th>Description / When to use it</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>.nowrap</code></td>
                            <td>Prevents text from wrapping. Mostly used on <code>&lt;a&gt;</code> inside <code>.wp-block-button</code> to keep button labels on a single line.</td>
                        </tr>
                    </tbody>
                </table>

                <h4 id="position-helpers">Position Helpers</h4>
                <table class="flexline-docs-table">
                    <thead>
                        <tr>
                            <th style="width:22%">Class</th>
                            <th style="width:28%">Applied CSS</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>.is-position-fixed</code></td>
                            <td><code>position: fixed;<br>width: 100%;<br>z-index: 10;</code></td>
                            <td>Use when you need an element (e.g., alert bar or sticky header) fixed to the viewport without writing custom CSS.</td>
                        </tr>
                        <tr>
                            <td><code>.is-position-absolute</code></td>
                            <td><code>position: absolute;<br>width: 100%;<br>z-index: 10;</code></td>
                            <td>Same as above but absolute positioning—ideal for hero overlays, etc.</td>
                        </tr>
                        <tr>
                            <td><code>.extra-z-index</code></td>
                            <td><code>z-index: 11 !important;</code></td>
                            <td>Bumps an element one layer above default fixed/absolute layers when conflicts arise.</td>
                        </tr>
                        <tr>
                            <td><code>.pointer-events-none</code></td>
                            <td><code>pointer-events: none;</code></td>
                            <td>Makes an element “click‑through”. Handy for decorative layers that sit on top of links or form fields.</td>
                        </tr>
                        <tr>
                            <td><code>.pointer-events-auto</code></td>
                            <td><code>pointer-events: auto;</code></td>
                            <td>Explicitly re‑enables pointer events when a parent element already has <code>pointer-events: none</code>.</td>
                        </tr>
                    </tbody>
                </table>

                <h4 id="flexbox-order">Flexbox Order Shorthands</h4>
                <p>These classes let you rearrange flex‑children at specific breakpoints without writing custom media queries. They’re generated for <strong>tablet</strong> (<code>min‑width: <?= esc_html( '$tablet' ); ?>;</code>) and <strong>mobile</strong> (<code>min‑width: <?= esc_html( '$mobile' ); ?>;</code>).</p>

                <table class="flexline-docs-table">
                    <thead>
                        <tr><th style="width:25%">Class</th><th>Effect at breakpoint</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><code>.is-order-first-tablet</code></td><td><code>order: -1;</code></td></tr>
                        <tr><td><code>.is-order-0-tablet</code></td><td><code>order: 0;</code></td></tr>
                        <?php for ($i = 1; $i <= 9; $i++) : ?>
                            <tr><td><code>.is-order-<?= $i; ?>-tablet</code></td><td><code>order: <?= $i; ?>;</code></td></tr>
                        <?php endfor; ?>
                        <tr><td><code>.is-order-last-tablet</code></td><td><code>order: 99999;</code></td></tr>
                    </tbody>
                </table>

                <table class="flexline-docs-table">
                    <thead>
                        <tr><th style="width:25%">Class</th><th>Effect at breakpoint</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><code>.is-order-first-mobile</code></td><td><code>order: -1;</code></td></tr>
                        <tr><td><code>.is-order-0-mobile</code></td><td><code>order: 0;</code></td></tr>
                        <?php for ($i = 1; $i <= 9; $i++) : ?>
                            <tr><td><code>.is-order-<?= $i; ?>-mobile</code></td><td><code>order: <?= $i; ?>;</code></td></tr>
                        <?php endfor; ?>
                        <tr><td><code>.is-order-last-mobile</code></td><td><code>order: 99999;</code></td></tr>
                        <tr><td><code>.is-justify-content-center-mobile</code></td><td>Adds <code>justify-content: center !important;</code> to the flex‑container on mobile.</td></tr>
                    </tbody>
                </table>
            </section>

            

            <!-- ✨ DEMO PATTERNS -->
            <section id="demo-patterns">
                <h3>Demo Patterns</h3>
                <p>
                    Want to explore every Flexline pattern in one place? Create a
                    blank Page or Post, switch the editor to <strong>Code view</strong>,
                    and paste the snippet below. Hit “Update/Publish” and you’ll get a
                    fully-built demo page showcasing all pattern groups.
                </p>

                <pre>
                    <code>
                        &lt;!-- wp:pattern {"slug":"flexline/demo-patterns-components"} /--&gt;
                        &lt;!-- wp:pattern {"slug":"flexline/demo-patterns-heroes"} /--&gt;
                        &lt;!-- wp:pattern {"slug":"flexline/demo-patterns-modules"} /--&gt;
                        &lt;!-- wp:pattern {"slug":"flexline/demo-patterns-sections"} /--&gt;
                        &lt;!-- wp:pattern {"slug":"flexline/demo-patterns-template-parts"} /--&gt;
                    </code>
                </pre>

                <p class="notice">
                    <em>Tip:</em> After previewing the page, you can delete sections you
                    don’t need or copy individual patterns into other pages.
                </p>
            </section>




            

        </div><!-- /.content-container -->

        <!-- ✨ SIDEBAR NAV -->
        <div class="nav-container">
            <nav aria-label="On‑this‑page navigation">
                <h4>On this page</h4>
                <ul>
                    <li><a href="#intro">Introduction</a></li>
                    <li><a href="#block-options">Flexline Block Options</a></li>
                    <li><a href="#style-variations">Style Variations</a></li>
                    <li><a href="#utility-classes">Utility Classes</a>
                        <ul>
                            <li><a href="#whitespace-overflow">Whitespace &amp; Overflow</a></li>
                            <li><a href="#position-helpers">Position Helpers</a></li>
                            <li><a href="#flexbox-order">Flexbox Order</a></li>
                        </ul>
                    </li>
                    <li><a href="#demo-patterns">Demo Patterns</a></li>
                    
                </ul>
            </nav>
        </div><!-- /.nav-container -->
    </div><!-- /.wrapper -->

    <script>
        // Smooth scroll for in‑page nav links
        (function () {
            const links = document.querySelectorAll('.nav-container a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        })();
    </script>
    <?php
}
