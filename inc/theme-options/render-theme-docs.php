<?php
/**
 * Render theme settings documentation tab.
 *
 * @package flexline
 */
namespace FlexLine;

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
if ( ! function_exists( __NAMESPACE__ . '\\flexline_render_documentation_tab' ) ) {
    function flexline_render_documentation_tab() {
        // Unified block documentation.
        $block_docs = [
            'All blocks with FlexLine panel' => [
                'attributes' => [
                    [
                        'name'        => 'Hide on Desktop / Tablet / Mobile',
                        'description' => 'Toggles block visibility at common breakpoints—adds the appropriate <code>flexline-hide‑on‑*</code> class under the hood.',
                    ],
                ],
            ],
            'core/image' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Lazy Load',
                        'description' => 'When true (the default), the image gets loading="lazy". Set it to false to omit the attribute so the browser loads the image immediately — ideal for hero images.',
                    ],
                    [
                        'name'        => 'Open in Modal',
                        'description' => 'Clicking the block opens a media‑modal (lightbox) instead of following its link.',
                    ],
                    [
                        'name'        => 'Content Shift / Slide',
                        'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
                    ],
                ],
            ],
            'core/cover' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Lazy Load',
                        'description' => 'When true (the default), the image gets loading="lazy". Set it to false to omit the attribute so the browser loads the image immediately — ideal for hero images.',
                    ],
                ],
            ],
            'core/button' => [
                'attributes' => [
                    [
                        'name'        => 'Open in Modal',
                        'description' => 'Clicking the block opens a media‑modal (lightbox) instead of following its link.',
                    ],
                    [
                        'name'        => 'Icon Type',
                        'description' => 'Adds a small SVG icon (download arrow, play symbol, external‑link arrow, etc.) to the right of the label.',
                    ],
                    [
                        'name'        => 'No Wrap',
                        'description' => 'Prevents the label from breaking onto two lines.',
                    ],
                ],
            ],
            'core/gallery' => [
                'attributes' => [
                    [
                        'name'        => 'Poster Gallery',
                        'description' => 'Converts a tiled gallery into a film‑strip style with one large “poster” image.',
                    ],
                ],
            ],
            'core/navigation' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Scroll @ Mobile',
                        'description' => 'Makes the nav list swipeable below <em>$mobile</em>.',
                    ],
                ],
            ],
            'core/group' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Group Link',
                        'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
                    ],
                    [
                        'name'        => 'Content Shift / Slide',
                        'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
                    ],
                ],
            ],
            'core/stack' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Group Link',
                        'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
                    ],
                    [
                        'name'        => 'Content Shift / Slide',
                        'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
                    ],
                ],
            ],
            'core/row' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Group Link',
                        'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
                    ],
                    [
                        'name'        => 'Content Shift / Slide',
                        'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
                    ],
                ],
            ],
            'core/grid' => [
                'attributes' => [
                    [
                        'name'        => 'Enable Group Link',
                        'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
                    ],
                ],
            ],
            'core/columns'       => [
                'attributes' => [
                    [
                        'name'        => 'Horizontal Scroller',
                        'description' => 'Turns the container into a swipeable carousel; subordinate toggles control nav, auto‑scroll, etc. <ul>' .
                            '<li>Show Arrow Nav</li>' .
                            '<li>Position Buttons Over Scroller</li>' .
                            '<li>Scroll transition in milliseconds</li>' .
                            '<li>Loop</li>' .
                            '<li>Auto Scroll</li>' .
                            '<li>Hide Pause Button</li>' .
                            '<li>Scroll interval in milliseconds</li>' .
                            '<li>Hide Scrollbar</li>' .
                            '<li>Pause on Hover</li>' .
                            '<li>Button Positions / Colors</li>' .
                            '</ul>',
                    ],
                    [
                        'name'        => 'Stack at Tablet',
                        'description' => 'Switches from horizontal columns to a vertical stack at medium screens.',
                    ],
                    [
                        'name'        => 'Content Shift / Slide',
                        'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
                    ],
                ],
            ],
            'core/post-template' => [
                'attributes' => [
                    [
                        'name'        => 'Horizontal Scroller',
                        'description' => 'Turns the container into a swipeable carousel; subordinate toggles control nav, auto‑scroll, etc. <ul>' .
                            '<li>Show Arrow Nav</li>' .
                            '<li>Position Buttons Over Scroller</li>' .
                            '<li>Scroll transition in milliseconds</li>' .
                            '<li>Loop</li>' .
                            '<li>Auto Scroll</li>' .
                            '<li>Hide Pause Button</li>' .
                            '<li>Scroll interval in milliseconds</li>' .
                            '<li>Hide Scrollbar</li>' .
                            '<li>Pause on Hover</li>' .
                            '<li>Button Positions / Colors</li>' .
                            '</ul>',
                    ],
                ],
            ],
        ];
    
        // Merge registered block styles.
        $block_styles       = \FlexLine\flexline_get_block_styles();
        $style_descriptions = [
            'columns-reverse' => 'Maintains column order in the editor but flips it when the Columns block stacks on smaller screens—handy for mobile-first layouts.',
            'card'            => 'Clean white “card” container with border-radius & light shadow. Zero internal padding so media can edge-to-edge.',
            'card-padded'     => 'Same as Card but with theme-small padding baked in.',
            'card-alt'        => 'Edge-to-edge images on top; inner text gets theme-small padding. Perfect for image-lead cards.',
            'outlined'        => 'Adds a 1-px accent border & padding, no shadow. Minimalist card alternative.',
            'shadow-light'    => 'Subtle, soft shadow for slight elevation.',
            'shadow-dark'     => 'Deeper shadow for stronger lift; hover swaps to diffused shadow when wrapped in a Group Link.',
            'shadow-diffused' => 'Wide, feathered shadow—great behind covers or hero quotes.',
            'glass'           => 'Frosted-glass effect: semi-transparent base + 10 px blur + saturate.',
            'glass-card'      => 'Glass background plus card border-radius & light shadow, ideal over photography.',
            'no-disc'         => 'Strips bullets & left-padding for clean checklist or icon lists.',
            'main-header-nav' => 'Opinionated spacing & weight for primary site navigation.',
            'dark-over-light' => 'Dark text color set atop light backgrounds; pairs with transparent links.',
            'light-over-dark' => 'Light text on dark backgrounds for hero/footers.',
            'outline'         => 'Navigation links gain a 1 px outline & padding on desktop-up.',
            'text-shadow'     => 'Applies the theme’s subtle text shadow variable for soft lift.',
            'eyebrow'         => 'Small uppercase “eyebrow” heading with custom font/size/color - used for SEO headlines.',
            'creative'        => 'Large decorative headline style using the site’s creative font.',
            'glass-button'    => 'Transparent glass button with blur & subtle border that intensifies on hover.',
            'text-link'       => 'Removes button chrome so it looks like a plain text link (adds hover underline).',
        ];
    
        foreach ( $block_styles as $block => $styles ) {
            foreach ( $styles as $slug => $label ) {
                $block_docs[ $block ]['styles'][] = [
                    'slug'        => $slug,
                    'label'       => $label,
                    'description' => $style_descriptions[ $slug ] ?? '',
                ];
            }
        }
    
        $all_attribute_names = [];
        $all_style_slugs     = [];
    
        foreach ( $block_docs as $data ) {
            if ( ! empty( $data['attributes'] ) ) {
                foreach ( $data['attributes'] as $attr ) {
                    $all_attribute_names[] = $attr['name'];
                }
            }
    
            if ( ! empty( $data['styles'] ) ) {
                foreach ( $data['styles'] as $style ) {
                    $all_style_slugs[] = $style['slug'];
                }
            }
        }
    
        $unique_attribute_names = array_unique( $all_attribute_names );
        sort( $unique_attribute_names, SORT_NATURAL | SORT_FLAG_CASE );
    
        $unique_style_slugs = array_unique( $all_style_slugs );
        sort( $unique_style_slugs, SORT_NATURAL | SORT_FLAG_CASE );
    
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
                margin-top: 1rem;
                border-left: 3px solid #ececec;
                padding-left: 15px;
                font-size: 14px;
            }
    
            .nav-container nav h4 {
                padding-top: 5rem;
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
    
            .flexline-docs-table td.block-name {
                background: #fdfdfd;
                font-weight: 600;
            }
    
            .flexline-docs-table tbody tr:nth-child(even) td.block-name {
                background: #f7f7f7;
            }
    
            .flexline-docs-table li {
                position: relative;
            }
    
            code {
                background: #f0f0f0;
                padding: 2px 4px;
                border-radius: 3px;
                font-family: monospace;
                word-break: break-all;
            }
    
            .flexline-info {
                background: none;
                border: 0;
                padding: 0;
                margin-left: 0.25rem;
                cursor: pointer;
                color: inherit;
                vertical-align: middle;
            }
    
            .flexline-tooltip {
                position: absolute;
                z-index: 10;
                background: #333;
                color: #fff;
                padding: 0.5rem;
                border-radius: 4px;
                font-size: 12px;
                line-height: 1.4;
                max-width: 260px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }
    
            .flexline-tooltip[hidden] {
                display: none;
            }
    
            /*
            ## Customize CSS here to avoid dealing with a build.
            */
    
            .flexline-info { color: #767676; }           /* medium gray */
            .flexline-info:hover,
            .flexline-info:focus { color: #505050; }     /* darker on interaction */
            .flexline-info svg { fill: currentcolor; }
    
            .flexline-tooltip code {
                color: inherit;             /* match tooltip text color */
                background: transparent;    /* remove light background */
            }
    
        </style>
    
        <div class="wrapper">
            <div class="content-container">
                <!-- ✨ INTRO -->
                <section id="intro">
                    <h2>FlexLine Theme&nbsp;Documentation</h2>
                    <p class="notice notice-info">
                        Grab the <a href="https://github.com/schlotterer/flexline-utilities/archive/refs/heads/main.zip">FlexLine Utilities plugin</a> for extra helpers and shortcodes like <code>[flexline_theme_docs]</code>.
                    </p>
                    <p>Below you’ll find a reference for the block‑level Inspector controls <em>and</em> utility classes that ship with the theme. Everything is <strong>opt‑in</strong>: nothing changes until you either (a)&nbsp;add a class in the block editor’s <em>Additional&nbsp;CSS&nbsp;Class(es)</em> field or (b)&nbsp;toggle an option inside the block’s sidebar. Use the nav on the right to jump around.</p>
                </section>
                <!-- ✨ BLOCK OPTIONS & STYLES -->
                <section id="block-options">
                    <h3>Block Options &amp; Style Variations</h3>
                    <p>The following custom attributes and style variations are available on various core blocks.</p>
    
                    <div id="flexline-docs-table-container">
                        <style>
                            #flexline-docs-table-container .flexline-docs-filters {
                                display: flex;
                                gap: 1rem;
                                margin-bottom: 1rem;
                                flex-wrap: wrap;
                            }
                            #flexline-docs-table-container .flexline-docs-filters .flexline-filter {
                                display: flex;
                                align-items: center;
                                gap: 0.5rem;
                            }
                            #flexline-docs-table-container .flexline-docs-filters .flexline-filter label{
                                white-space: nowrap;
                            }
                        </style>
                        <div class="flexline-docs-filters">
                            <div class="flexline-filter">
                                <label for="flexline-attribute-filter">Filter by attribute</label>
                                <select id="flexline-attribute-filter">
                                    <option value="">All</option>
                                    <?php foreach ( $unique_attribute_names as $attr_name ) : ?>
                                        <option value="<?php echo esc_attr( $attr_name ); ?>"><?php echo esc_html( $attr_name ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
    
                            <div class="flexline-filter">
                                <label for="flexline-style-filter">Filter by style</label>
                                <select id="flexline-style-filter">
                                    <option value="">All</option>
                                    <?php foreach ( $unique_style_slugs as $style_slug ) : ?>
                                        <option value="<?php echo esc_attr( $style_slug ); ?>"><?php echo esc_html( $style_slug ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
    
                        <table id="flexline-docs-table" class="flexline-docs-table">
                            <thead>
                                <tr>
                                    <th style="width:25%">Block Name</th>
                                    <th style="width:35%">Custom Attribute</th>
                                    <th>Style Variation</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ( $block_docs as $block => $data ) {
                                $attributes = $data['attributes'] ?? [];
                                $styles     = $data['styles'] ?? [];
    
                                $attribute_names = array_column( $attributes, 'name' );
                                $style_slugs     = array_column( $styles, 'slug' );
    
                                echo '<tr data-attributes="' . esc_attr( implode( ', ', $attribute_names ) ) . '" data-styles="' . esc_attr( implode( ', ', $style_slugs ) ) . '">';
                                echo '<td class="block-name"><code>' . esc_html( $block ) . '</code></td>';
    
                                echo '<td>';
                                if ( $attributes ) {
                                    echo '<ul>';
                                    foreach ( $attributes as $attr ) {
                                        echo '<li><strong>' . esc_html( $attr['name'] ) . '</strong>';
                                        if ( ! empty( $attr['description'] ) ) {
                                            echo ' <button class="flexline-info" aria-expanded="false"><span class="dashicons dashicons-info"></span></button>';
                                            echo '<div class="flexline-tooltip" role="tooltip" hidden>' . wp_kses_post( $attr['description'] ) . '</div>';
                                        }
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</td>';
    
                                echo '<td>';
                                if ( $styles ) {
                                    echo '<ul>';
                                    foreach ( $styles as $style ) {
                                        echo '<li><strong>' . esc_html( $style['label'] ) . ' -</strong> <code>' . esc_html( $style['slug'] ) . '</code>';
                                        if ( ! empty( $style['description'] ) ) {
                                            echo ' <button class="flexline-info" aria-expanded="false"><span class="dashicons dashicons-info"></span></button>';
                                            echo '<div class="flexline-tooltip" role="tooltip" hidden>' . esc_html( $style['description'] ) . '</div>';
                                        }
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</td>';
    
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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
                        Want to explore every FlexLine pattern in one place? Create a
                        blank Page or Post, switch the editor to <strong>Code view</strong>,
                        and paste the snippet below. Hit “Update/Publish” and you’ll get a
                        fully-built demo page showcasing all pattern groups and templates.
                    </p>
    
                    <pre>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-components-ctas"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-components-galleries"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-components-misc"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-heroes"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-modules"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-sections"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-template-parts"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-templates"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-templates-list-views"} /--&gt;</code>
                        <code>&lt;!-- wp:pattern {"slug":"flexline/demo-patterns-templates-starter-content"} /--&gt;</code>
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
                        <li><a href="#block-options">FlexLine Block Options &amp; Styles</a></li>
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
}
