<?php
/**
 * Render Utilities tab (options + docs) inside FlexLine Options.
 *
 * This embeds the existing Utilities settings (SEO, Discussion) and the
 * authoring token reference directly into the FlexLine Options page.
 *
 * @package flexline
 */

/**
 * Outputs the Utilities tab contents.
 *
 * @return void
 */
function flexline_render_utilities_tab() {
	?>
	<h2>Utilities Settings</h2>
	<form id="flexline-utilities-form" method="post" action="options.php" style="margin-bottom:2rem;">
		<?php
		settings_errors( 'flexline_utilities' );
		settings_fields( 'flexline_utilities_group' );
		do_settings_sections( 'flexline_utilities' );
		submit_button();
		?>
	</form>

	<h2>Authoring Tokens</h2>
	<p>Use these tokens for new blocks, patterns, templates, titles, SEO metadata, excerpts and Text/Block widgets. Existing shortcodes remain supported. FlexLine tokens work without Web4SL; phone, address and custom Web4SL tokens require the Web4SL plugin.</p>
	<ul>
		<li><code>{{flexline_page_title}}</code> — current page title.</li>
		<li><code>{{flexline_site_name}}</code> — site name.</li>
		<li><code>{{flexline_copyright_year}}</code> — current year.</li>
		<li><code>{{flexline_copyright_year starting_year="2015" separator=" to "}}</code> — year range.</li>
	</ul>
	<p>Use straight double or single quotes for options. Unsupported options stay unchanged. To display a literal token example in page content, add <code>!</code>: <code>{{!flexline_site_name}}</code> displays <code>{{flexline_site_name}}</code>. A Code block alone does not prevent replacement; encoded braces are not a reliable escape.</p>
	<p>No saved content is converted. Keep the updated code installed anywhere that uses the new token options or literal syntax; older versions will display those new expressions unchanged.</p>
	<?php
}
