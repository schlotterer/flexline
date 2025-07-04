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

            

        </div><!-- /.content-container -->

        <!-- ✨ SIDEBAR NAV -->
        <div class="nav-container">
            <nav aria-label="On‑this‑page navigation">
                <h4>On this page</h4>
                <ul>
                    <li><a href="#intro">Introduction</a></li>
                    <li><a href="#block-options">Flexline Block Options</a></li>
                    <li><a href="#utility-classes">Utility Classes</a>
                        <ul>
                            <li><a href="#whitespace-overflow">Whitespace &amp; Overflow</a></li>
                            <li><a href="#position-helpers">Position Helpers</a></li>
                            <li><a href="#flexbox-order">Flexbox Order</a></li>
                        </ul>
                    </li>
                    
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
