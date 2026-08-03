<?php
/**
 * FlexLine Utilities admin page and settings (migrated into theme).
 *
 * @package flexline
 */

namespace FlexLine_Utilities;

defined( 'ABSPATH' ) || exit;

/**
 * Admin settings page for Utilities options.
 */
class Admin {

	/**
	 * Register settings. UI is rendered on the FlexLine Options page.
	 *
	 * @return void
	 */
	public static function init() {
		// Settings registration remains; the standalone Utilities menu is retired.
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
	}

	/**
	 * Add Utilities page under Appearance.
	 *
	 * @return void
	 */
	public static function add_admin_menu() {
		add_theme_page(
			'FlexLine Utilities',
			'FlexLine Utilities',
			'manage_options',
			'flexline_utilities',
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Merge saved options with defaults.
	 */
	private static function get_options(): array {
		$saved = get_option( 'flexline_utilities', array() );
		return \wp_parse_args( is_array( $saved ) ? $saved : array(), \FlexLine\flexline_utilities_get_defaults() );
	}

	/**
	 * Register settings and render sections/fields.
	 *
	 * @return void
	 */
	public static function register_settings() {
		register_setting(
			'flexline_utilities_group',
			'flexline_utilities',
			array(
				'sanitize_callback' => array( __CLASS__, 'sanitize_options' ),
				'default'           => \FlexLine\flexline_utilities_get_defaults(),
			)
		);

		// SEO section.
			add_settings_section(
				'flexline_utilities_section_seo',
				'SEO Utilities',
				function () {
					$options = self::get_options();
					?>
				<p>
					<label for="flexline-util-enable-og-tags">
						<input id="flexline-util-enable-og-tags" type="checkbox"
							name="flexline_utilities[enable_og_tags]"
							value="1" <?php checked( $options['enable_og_tags'], 1 ); ?> />
						<strong>Open Graph (OG) Meta Tags</strong>
					</label><br />
					<span class="description">
						Outputs <code>&lt;meta property="og:*"&gt;</code> tags (title, description, URL, image, type) and a matching
						<code>&lt;meta name="description"&gt;</code> for better social sharing.
					</span>
				</p>
					<?php
				},
				'flexline_utilities'
			);

		// Security section.
			add_settings_section(
				'flexline_utilities_section_security',
				'Security Utilities',
				function () {
					$options = self::get_options();
					?>
				<p>
					<label for="flexline-util-remove-generator">
						<input id="flexline-util-remove-generator" type="checkbox"
							name="flexline_utilities[remove_generator]"
							value="1" <?php checked( $options['remove_generator'], 1 ); ?> />
						<strong>Remove “generator” Meta</strong>
					</label><br />
					<span class="description">
						Removes the WordPress version “generator” meta tag from page output for minor hardening.
					</span>
				</p>
				<p>
					<label for="flexline-util-disable-xmlrpc">
						<input id="flexline-util-disable-xmlrpc" type="checkbox"
							name="flexline_utilities[disable_xmlrpc]"
							value="1" <?php checked( $options['disable_xmlrpc'], 1 ); ?> />
						<strong>Disable XML-RPC</strong>
					</label><br />
					<span class="description">
						Turns off XML-RPC endpoints which are rarely needed and can be a brute-force vector.
					</span>
				</p>
					<p>
						<label for="flexline-util-rest-cors-allow-all">
							<input id="flexline-util-rest-cors-allow-all" type="checkbox"
								name="flexline_utilities[rest_cors_allow_all]"
							value="1" <?php checked( $options['rest_cors_allow_all'], 1 ); ?> />
						<strong>REST API: Allow Any Origin (*)</strong>
					</label><br />
					<span class="description">
							Adds “Access-Control-Allow-Origin: *” to REST responses. Useful for public APIs—avoid if you need to restrict origins.
						</span>
					</p>
					<?php
				},
				'flexline_utilities'
			);

		// Discussion section.
		add_settings_section(
			'flexline_utilities_section_discussion',
			'Discussion Utilities',
			function () {
				$options = self::get_options();
				$val     = ! empty( $options['disable_all_comments'] ) ? 1 : 0;
				?>
				<p>
					<label for="flexline-util-disable-all-comments">
					<input id="flexline-util-disable-all-comments" type="checkbox"
						name="flexline_utilities[disable_all_comments]"
						value="1" <?php checked( $val, 1 ); ?> />
					<strong>Disable Comments Sitewide</strong>
					</label><br />
					<span class="description">Removes all comment functionality and UI: closes comments & pings, hides existing comments, removes admin menu & dashboard widget, strips REST endpoints, and removes the admin bar comments icon.</span>
				</p>
				<?php
			},
			'flexline_utilities'
		);
	}

	/**
	 * Sanitize checkbox options.
	 *
	 * @param array $input Raw input array from form.
	 * @return array Sanitized options.
	 */
	public static function sanitize_options( $input ) {
		$input = is_array( $input ) ? $input : array();

		$keys      = array(
			'enable_og_tags',
			'remove_generator',
			'disable_xmlrpc',
			'rest_cors_allow_all',
			'disable_all_comments',
		);
		$sanitized = array();
		foreach ( $keys as $k ) {
			$sanitized[ $k ] = ( 1 === (int) ( $input[ $k ] ?? 0 ) ) ? 1 : 0; // Yoda.
		}

		return \wp_parse_args( $sanitized, \FlexLine\flexline_utilities_get_defaults() );
	}

	/**
	 * Render the Utilities admin page.
	 *
	 * @return void
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1>FlexLine Utilities</h1>

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
		</div>
		<?php
	}
}
