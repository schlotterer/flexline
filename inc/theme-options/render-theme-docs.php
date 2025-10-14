<?php
/**
 * Render theme settings documentation tab.
 *
 * @package flexline
 */

namespace FlexLine;

if ( ! function_exists( __NAMESPACE__ . '\\flexline_render_documentation_tab' ) ) {
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
		// Unified block documentation.
		$block_docs = array(
			'All blocks with FlexLine panel' => array(
				'attributes' => array(
					array(
						'name'        => 'Hide on Desktop / Tablet / Mobile',
						'description' => 'Toggles block visibility at common breakpoints—adds the appropriate <code>flexline-hide‑on‑*</code> class under the hood.',
					),
				),
			),
			'core/image'                     => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Lazy Load',
						'description' => 'When true (the default), the image gets loading="lazy". Set it to false to omit the attribute so the browser loads the image immediately — ideal for hero images.',
					),
					array(
						'name'        => 'Open in Modal',
						'description' => 'Clicking the block opens a media‑modal (lightbox) instead of following its link.',
					),
					array(
						'name'        => 'Content Shift / Slide',
						'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
					),
				),
			),
			'core/cover'                     => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Lazy Load',
						'description' => 'When true (the default), the image gets loading="lazy". Set it to false to omit the attribute so the browser loads the image immediately — ideal for hero images.',
					),
					array(
						'name'        => 'FlexLine Glass Overlay',
						'description' => 'Adds <code>flexline-glass-overlay</code> and a glass-level class (1–10) to the Cover overlay so it gains a frosted blur & saturation effect. The range control lives in the Color panel and toggles the overlay automatically.',
					),
				),
			),
			'core/button'                    => array(
				'attributes' => array(
					array(
						'name'        => 'Open in Modal',
						'description' => 'Clicking the block opens a media‑modal (lightbox) instead of following its link.',
					),
					array(
						'name'        => 'Icon Type',
						'description' => 'Adds a small SVG icon (download arrow, play symbol, external‑link arrow, etc.) to the right of the label.',
					),
					array(
						'name'        => 'No Wrap',
						'description' => 'Prevents the label from breaking onto two lines.',
					),
				),
			),
			'core/gallery'                   => array(
				'attributes' => array(
					array(
						'name'        => 'Poster Gallery',
						'description' => 'Converts a tiled gallery into a film‑strip style with one large “poster” image.',
					),
				),
			),
			'core/navigation'                => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Scroll @ Mobile',
						'description' => 'Makes the nav list swipeable below <em>$mobile</em>.',
					),
				),
			),
			'core/group'                     => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Group Link',
						'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
					),
					array(
						'name'        => 'Content Shift / Slide',
						'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
					),
					array(
						'name'        => 'Slider (Fading)',
						'description' => 'Turns the Group into a fading slider. Direct children become slides (Cover blocks are required). In the editor, non‑Cover children are auto‑wrapped into Cover. Runtime is class‑driven (<code>is-style-slider</code>) and reads CSS variables; it writes no inline layout, only classes. <ul>' .
							'<li><strong>Edit or Preview</strong> — toggles editor runtime (Preview adds <code>slider-preview-mode</code>).</li>' .
							'<li><strong>Container Height</strong> — sets <code>--slider-height</code> and adds <code>slider-has-height</code> when provided. Default is <code>calc(100svh - header-height)</code>.</li>' .
							'<li><strong>Show Arrow Navigation</strong> — adds <code>slider-navigation</code> and shows Prev/Next (and optional Pause) buttons.</li>' .
							'<li><strong>Transition in Milliseconds</strong> — controls fade duration via <code>--slider-transition-ms</code> (default 500ms).</li>' .
							'<li><strong>Loop Slides</strong> — adds <code>slider-loop</code> (default on).</li>' .
							'<li><strong>Buttons Position</strong> — horizontal: <code>left|center|right</code>; vertical: <code>top|bottom</code>; optionally “over” the slider (<code>slider-buttons-over</code>).</li>' .
							'<li><strong>Buttons Colors</strong> — text/background/border variants (e.g., <code>slider-buttons-text-white</code>, <code>slider-buttons-background-primary</code>, <code>slider-buttons-border-gray</code>).</li>' .
							'<li><strong>Box Shadow</strong> — adds <code>slider-buttons-box-shadow</code>.</li>' .
							'<li><strong>Auto Slide</strong> — enables autoplay (<code>slider-auto</code>) with <em>Slide Interval</em> (<code>--slider-interval-ms</code>, default 4000ms), <em>Pause on Hover</em> (<code>slider-pause-on-hover</code>), and optional <em>Hide Pause Button</em>.</li>' .
							'<li><strong>Accessibility</strong> — buttons have labels; only the active slide accepts pointer events to prevent focus traps.</li>' .
						'</ul>',
					),
				),
			),
			'core/stack'                     => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Group Link',
						'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
					),
					array(
						'name'        => 'Content Shift / Slide',
						'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
					),
					array(
						'name'        => 'Slider (Fading)',
						'description' => 'Same slider feature as Group: enables a fading slider over Stack children (Cover slides). Includes navigation, autoplay, loop, button positions/colors, and height control. See Group → Slider for full option list.',
					),
				),
			),
			'core/row'                       => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Group Link',
						'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
					),
					array(
						'name'        => 'Content Shift / Slide',
						'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
					),
					array(
						'name'        => 'Slider (Fading)',
						'description' => 'Same slider feature as Group: enables a fading slider over Row children (Cover slides). Includes navigation, autoplay, loop, button positions/colors, and height control. See Group → Slider for full option list.',
					),
				),
			),
			'core/grid'                      => array(
				'attributes' => array(
					array(
						'name'        => 'Enable Group Link',
						'description' => 'Makes the entire container clickable—either self, new tab, or opens media modal depending on settings.',
					),
					array(
						'name'        => 'Slider (Fading)',
						'description' => 'Same slider feature as Group: enables a fading slider over Grid children (Cover slides). Includes navigation, autoplay, loop, button positions/colors, and height control. See Group → Slider for full option list.',
					),
				),
			),
			'core/columns'                   => array(
				'attributes' => array(
					array(
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
					),
					array(
						'name'        => 'Stack at Tablet',
						'description' => 'Switches from horizontal columns to a vertical stack at medium screens.',
					),
					array(
						'name'        => 'Content Shift / Slide',
						'description' => 'Applies negative margins or transforms so content can nudge or slide relative to its normal flow—values are written as CSS custom properties.',
					),
				),
			),
			'core/post-template'             => array(
				'attributes' => array(
					array(
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
					),
				),
			),
			'core/site-logo'                 => array(
				'attributes' => array(
					array(
						'name'        => 'Use High-Resolution Logo',
						'description' => 'Adds <code>flexline-logo-hires</code> and sets a new sizes min-width value to twice the image width setting.',
					),
				),
			),

		);

		// Merge registered block styles.
		$block_styles       = \FlexLine\flexline_get_block_styles();
		$text_shadow_blocks = array(
			// Core content blocks that surface the RichText toolbar.
			'core/paragraph',
			'core/heading',
			'core/list',
			'core/quote',
			'core/pullquote',
			'core/verse',
			'core/preformatted',
			'core/code',
			'core/table',
			'core/post-excerpt',
			'core/post-author',
			'core/cover',
			'core/media-text',

			// Media captions and embeds expose inline formatting controls.
			'core/image',
			'core/gallery',
			'core/audio',
			'core/video',
			'core/embed',
		);

		sort( $text_shadow_blocks, SORT_NATURAL | SORT_FLAG_CASE );

		$text_shadow_description = __( 'Adds FlexLine’s subtle shadow inline via the RichText toolbar (wraps selections in <code>is-style-text-shadow</code>). Available wherever a block exposes standard inline formats.', 'flexline' );

		$style_descriptions = array(
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
			'eyebrow'         => 'Small uppercase “eyebrow” heading with custom font/size/color - used for SEO headlines.',
			'creative'        => 'Large decorative headline style using the site’s creative font.',
			'glass-button'    => 'Transparent glass button with blur & subtle border that intensifies on hover.',
			'text-link'       => 'Removes button chrome so it looks like a plain text link (adds hover underline).',
		);

		foreach ( $block_styles as $block => $styles ) {
			foreach ( $styles as $slug => $label ) {
				$block_docs[ $block ]['styles'][] = array(
					'slug'        => $slug,
					'label'       => $label,
					'description' => $style_descriptions[ $slug ] ?? '',
				);
			}
		}

		$all_attribute_names = array();
		$all_style_slugs     = array();

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
							$attributes = $data['attributes'] ?? array();
							$styles     = $data['styles'] ?? array();

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

						<div class="flexline-inline-format">
							<h2>Inline Formats ( RichText Toolbar )</h2>
							<ul>
								<li><strong>Text Shadow:</strong><?php echo ' ' . wp_kses_post( $text_shadow_description ); ?></li>
							</ul>
							
							
						</div>
					</div>
				</section>


				<!-- ✨ IMAGE TOGGLE GROUPS -->
				<section id="visibility-toggle">
					<h3>Image Toggle Groups</h3>
					<p>Build button-controlled image swaps using stock Button and Image blocks—no custom block needed. Each group is self-contained so multiple toggles can exist on the same page or pattern.</p>
					<ul>
						<li><strong>Wrapper:</strong> place buttons and images inside <code>&lt;div class="visibility-toggle-group"&gt;</code> to scope the script.</li>
						<li><strong>Buttons:</strong> add the <code>visibility-toggle</code> class and set a unique HTML Anchor (for example, <code>interior</code>). The script uses that anchor value to match images.</li>
						<li><strong>Images:</strong> add a class that matches a button anchor (e.g., <code>class="interior"</code>) plus either <code>toggle-is-visible</code> or <code>toggle-is-hidden</code> so the default state is explicit.</li>
						<li><strong>Active state:</strong> mark one button with <code>.active</code> and its corresponding image with <code>.toggle-is-visible</code>; other images should start with <code>.toggle-is-hidden</code>.</li>
					</ul>
					<p>The runtime listens for clicks on <code>.visibility-toggle</code> buttons, applies the <code>.active</code> state, sets <code>aria-pressed</code>, and swaps the visible image by toggling <code>.toggle-is-visible</code> / <code>.toggle-is-hidden</code> within the same group.</p>
					<pre><code>&lt;div class="visibility-toggle-group"&gt;
	&lt;div class="buttons"&gt;
		&lt;button class="visibility-toggle active" id="exterior"&gt;Exterior&lt;/button&gt;
		&lt;button class="visibility-toggle" id="interior"&gt;Interior&lt;/button&gt;
	&lt;/div&gt;
	&lt;div class="images"&gt;
		&lt;img class="exterior toggle-is-visible" src="exterior.jpg" alt="" /&gt;
		&lt;img class="interior toggle-is-hidden" src="interior.jpg" alt="" /&gt;
	&lt;/div&gt;
&lt;/div&gt;</code></pre>
					<p><em>Editor tip:</em> Use the Button block’s <strong>HTML Anchor</strong> field to set the ID/anchor that maps to your images, and use <strong>Additional CSS class(es)</strong> on each image to assign the matching class name.</p>
				</section>


				<!-- ✨ PLUGIN INTEGRATIONS -->
				<section id="plugin-integrations">
					<h3>Plugin Integrations</h3>
					<p>FlexLine ships ready-made styling for a handful of popular plugins so their output matches the theme without custom CSS.</p>
					<ul>
						<li><strong>Gravity Forms</strong> – form fields, buttons, and validation states inherit FlexLine spacing, typography, and color tokens.</li>
						<li><strong>Events Manager</strong> – event archives and single layouts align with theme spacing; starter settings live in <code>assets/events-manager/</code> for quick imports.</li>
						<li><strong>Query Loop Filters</strong> – Human Made’s filter controls adopt FlexLine navigation spacing, button treatments, and form styling for consistent filter bars. <a href="https://github.com/humanmade/query-filter" target="_blank">Download from Github</a></li>
						<li><strong>Yoast SEO</strong> – required when you use patterns that include the Yoast Breadcrumbs block; the theme expects the plugin to render breadcrumb markup.</li>
					</ul>
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
					<p>These classes let you rearrange flex‑children at specific breakpoints without writing custom media queries. They’re generated for <strong>tablet</strong> (<code>min‑width: <?php echo esc_html( '$tablet' ); ?>;</code>) and <strong>mobile</strong> (<code>min‑width: <?php echo esc_html( '$mobile' ); ?>;</code>).</p>
	
					<table class="flexline-docs-table">
						<thead>
							<tr><th style="width:25%">Class</th><th>Effect at breakpoint</th></tr>
						</thead>
						<tbody>
							<tr><td><code>.is-order-first-tablet</code></td><td><code>order: -1;</code></td></tr>
							<tr><td><code>.is-order-0-tablet</code></td><td><code>order: 0;</code></td></tr>
							<?php for ( $i = 1; $i <= 9; $i++ ) : ?>
									<tr><td><code>.is-order-<?php echo esc_attr( $i ); ?>-tablet</code></td><td><code>order: <?php echo esc_html( $i ); ?>;</code></td></tr>
							<?php endfor; ?>
							<tr><td><code>.is-order-last-tablet</code></td><td><code>order: 99999;</code></td></tr>
							<tr><td><code>.is-justify-content-center-tablet</code></td><td>Adds <code>justify-content: center !important;</code> to the flex‑container at the tablet breakpoint.</td></tr>
							<tr><td><code>.is-align-items-center-tablet</code></td><td>Adds <code>align-items: center !important;</code> to the flex‑container at the tablet breakpoint.</td></tr>
							<tr><td><code>.is-text-align-center-tablet</code></td><td>Adds <code>text-align: center !important;</code> to the container at the tablet breakpoint.</td></tr>
							<tr><td><code>.is-center-tablet</code></td><td>Centers content at the tablet breakpoint: <code>justify-content: center</code>, <code>align-items: center</code>, and <code>text-align: center</code>.</td></tr>
						</tbody>
					</table>
	
					<table class="flexline-docs-table">
						<thead>
							<tr><th style="width:25%">Class</th><th>Effect at breakpoint</th></tr>
						</thead>
						<tbody>
							<tr><td><code>.is-order-first-mobile</code></td><td><code>order: -1;</code></td></tr>
							<tr><td><code>.is-order-0-mobile</code></td><td><code>order: 0;</code></td></tr>
													<?php for ( $i = 1; $i <= 9; $i++ ) : ?>
																<tr><td><code>.is-order-<?php echo esc_attr( $i ); ?>-mobile</code></td><td><code>order: <?php echo esc_html( $i ); ?>;</code></td></tr>
														<?php endfor; ?>
							<tr><td><code>.is-order-last-mobile</code></td><td><code>order: 99999;</code></td></tr>
							<tr><td><code>.is-justify-content-center-mobile</code></td><td>Adds <code>justify-content: center !important;</code> to the flex‑container on mobile.</td></tr>
							<tr><td><code>.is-align-items-center-mobile</code></td><td>Adds <code>align-items: center !important;</code> to the flex‑container on mobile.</td></tr>
							<tr><td><code>.is-text-align-center-mobile</code></td><td>Adds <code>text-align: center !important;</code> to the container on mobile.</td></tr>
							<tr><td><code>.is-center-mobile</code></td><td>Centers content on mobile: <code>justify-content: center</code>, <code>align-items: center</code>, and <code>text-align: center</code>.</td></tr>
						</tbody>
					</table>

					<h4 id="opacity">Opacity</h4>
					<p>Quick helpers for element transparency. Base classes apply at all sizes; <code>-tablet</code> and <code>-mobile</code> variants apply only within those breakpoints.</p>

					<table class="flexline-docs-table">
						<thead>
							<tr>
								<th style="width:22%">Class</th>
								<th>Applied CSS</th>
							</tr>
						</thead>
						<tbody>
							<?php for ( $i = 0; $i <= 100; $i += 10 ) : ?>
								<?php $val = ( 100 === $i ) ? '1' : ( 0 === $i ? '0' : '0.' . intval( $i / 10 ) ); ?>
								<tr>
									<td><code>.opacity-<?php echo esc_html( $i ); ?></code></td>
									<td><code>opacity: <?php echo esc_html( $val ); ?>;</code></td>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>

					<table class="flexline-docs-table">
						<thead>
							<tr>
								<th style="width:22%">Class</th>
								<th>Applied CSS (tablet range)</th>
							</tr>
						</thead>
						<tbody>
							<?php for ( $i = 0; $i <= 100; $i += 10 ) : ?>
								<?php $val = ( 100 === $i ) ? '1' : ( 0 === $i ? '0' : '0.' . intval( $i / 10 ) ); ?>
								<tr>
									<td><code>.opacity-<?php echo esc_html( $i ); ?>-tablet</code></td>
									<td><code>opacity: <?php echo esc_html( $val ); ?>;</code> (<?php echo esc_html( '$tablet' ); ?>)</td>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>

					<table class="flexline-docs-table">
						<thead>
							<tr>
								<th style="width:22%">Class</th>
								<th>Applied CSS (mobile range)</th>
							</tr>
						</thead>
						<tbody>
							<?php for ( $i = 0; $i <= 100; $i += 10 ) : ?>
								<?php $val = ( 100 === $i ) ? '1' : ( 0 === $i ? '0' : '0.' . intval( $i / 10 ) ); ?>
								<tr>
									<td><code>.opacity-<?php echo esc_html( $i ); ?>-mobile</code></td>
									<td><code>opacity: <?php echo esc_html( $val ); ?>;</code> (<?php echo esc_html( '$mobile' ); ?>)</td>
								</tr>
							<?php endfor; ?>
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
						<li><a href="#visibility-toggle">Image Toggle Groups</a></li>
						<li><a href="#plugin-integrations">Plugin Integrations</a></li>
						<li><a href="#utility-classes">Utility Classes</a>
							<ul>
								<li><a href="#whitespace-overflow">Whitespace &amp; Overflow</a></li>
								<li><a href="#position-helpers">Position Helpers</a></li>
								<li><a href="#flexbox-order">Flexbox Order</a></li>
								<li><a href="#opacity">Opacity</a></li>
							</ul>
						</li>
						<li><a href="#demo-patterns">Demo Patterns</a></li>
						
					</ul>
					<?php /* Utilities features are now built into the theme. */ ?>
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
