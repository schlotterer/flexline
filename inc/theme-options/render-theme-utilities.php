<?php
/**
 * Render Utilities tab (options + docs) inside FlexLine Options.
 *
 * This embeds the existing Utilities settings (SEO, Discussion) and the
 * Shortcodes reference directly into the FlexLine Options page.
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
	<details>
	<summary>Legacy shortcode reference</summary>
	<p>Retained for existing content and integrations. The theme documentation helper remains shortcode-only.</p>

	<?php
	$shortcodes = array(
		array(
			'title'       => 'Theme Documentation',
			'description' => 'Renders the FlexLine theme documentation tab.',
			'usage'       => '[flexline_theme_docs]',
		),
		array(
			'title'       => 'Page Title',
			'description' => 'Outputs the current page title.',
			'usage'       => '[flexline_page_title]',
		),
		array(
			'title'       => 'Site Name',
			'description' => 'Outputs the site name.',
			'usage'       => '[flexline_site_name]',
		),
		array(
			'title'       => 'Copyright Year',
			'description' => 'Displays the current year or a range from a starting year to the current year.',
			'usage'       => array(
				'[flexline_copyright_year]',
				'[flexline_copyright_year starting_year="2015"]',
				'[flexline_copyright_year starting_year="2010" separator=" - "]',
			),
		),
	);
	?>
	<table class="widefat fixed striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Usage</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ( $shortcodes as $shortcode ) : ?>
			<tr>
				<td><?php echo esc_html( $shortcode['title'] ); ?></td>
				<td><?php echo esc_html( $shortcode['description'] ); ?></td>
				<td>
					<?php
					$usage = $shortcode['usage'];
					if ( is_array( $usage ) ) {
						foreach ( $usage as $usage_item ) {
							printf( '<code style="display:block;margin-bottom:5px;">%s</code>', esc_html( $usage_item ) );
						}
					} else {
						printf( '<code>%s</code>', esc_html( $usage ) );
					}
					?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	</details>
	<?php
}
