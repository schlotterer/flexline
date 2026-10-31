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

			<?php
			require_once __DIR__ . '/render-theme-utilities.php';
			\flexline_render_utilities_tab();
			?>

		</div>
		<?php
	}
}
