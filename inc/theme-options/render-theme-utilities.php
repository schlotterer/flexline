<?php
/**
 * Render Utilities tab (options + docs) inside FlexLine Options.
 *
 * This embeds the existing Utilities settings (SEO, Security, Discussion)
 * and the Shortcodes reference directly into the FlexLine Options page.
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
	<form method="post" action="options.php" style="margin-bottom:2rem;">
		<?php
		settings_fields( 'flexline_utilities_group' );
		do_settings_sections( 'flexline_utilities' );
		submit_button();
		?>
	</form>

	<h2>Shortcodes</h2>
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
	<?php
}
