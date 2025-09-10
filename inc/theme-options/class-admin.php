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

	// Central defaults (first load behavior).
	private const DEFAULTS = array(
		'enable_og_tags'       => 1,
		'og_skip_if_yoast'     => 1,
		'remove_generator'     => 1,
		'disable_xmlrpc'       => 1,
		'rest_cors_allow_all'  => 0,
		'disable_all_comments' => 0,
	);

	/**
	 * Hook admin menu and settings registration.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
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
		return \wp_parse_args( is_array( $saved ) ? $saved : array(), self::DEFAULTS );
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
				'default'           => self::DEFAULTS,
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
					<label>
						<input type="checkbox"
							name="flexline_utilities[enable_og_tags]"
							value="1" <?php checked( $options['enable_og_tags'], 1 ); ?> />
						<strong>Open Graph (OG) Meta Tags</strong>
					</label><br />
					<span class="description">
						Outputs <code>&lt;meta property="og:*"&gt;</code> tags (title, description, URL, image, type) and a matching
						<code>&lt;meta name="description"&gt;</code> for better social sharing.
					</span>
				</p>
				<p>
					<label>
						<input type="checkbox"
							name="flexline_utilities[og_skip_if_yoast]"
							value="1" <?php checked( $options['og_skip_if_yoast'], 1 ); ?> />
						<strong>Skip OG Tags if Yoast SEO is Active</strong>
					</label><br />
					<span class="description">
						If enabled, OG tags won’t be output when Yoast SEO is installed (Yoast will handle them).
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
					<label>
						<input type="checkbox"
							name="flexline_utilities[remove_generator]"
							value="1" <?php checked( $options['remove_generator'], 1 ); ?> />
						<strong>Remove “generator” Meta</strong>
					</label><br />
					<span class="description">
						Removes the WordPress version “generator” meta tag from page output for minor hardening.
					</span>
				</p>
				<p>
					<label>
						<input type="checkbox"
							name="flexline_utilities[disable_xmlrpc]"
							value="1" <?php checked( $options['disable_xmlrpc'], 1 ); ?> />
						<strong>Disable XML-RPC</strong>
					</label><br />
					<span class="description">
						Turns off XML-RPC endpoints which are rarely needed and can be a brute-force vector.
					</span>
				</p>
				<p>
					<label>
						<input type="checkbox"
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
					<label>
					<input type="checkbox"
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
		$keys      = array(
			'enable_og_tags',
			'og_skip_if_yoast',
			'remove_generator',
			'disable_xmlrpc',
			'rest_cors_allow_all',
			'disable_all_comments',
		);
		$sanitized = array();
		foreach ( $keys as $k ) {
			$sanitized[ $k ] = ( 1 === (int) ( $input[ $k ] ?? 0 ) ) ? 1 : 0; // Yoda.
		}
		return \wp_parse_args( $sanitized, self::DEFAULTS );
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
