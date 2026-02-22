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
		'enable_og_tags'              => 1,
		'remove_generator'            => 1,
		'disable_xmlrpc'              => 1,
		'rest_cors_allow_all'         => 0,
		'disable_all_comments'        => 0,
		'custom_login_enabled'        => 0,
		'custom_login_slug'           => '',
		'custom_login_strict_mode'    => 1,
		'custom_login_fallback_key'   => '',
		'custom_login_fallback_value' => '',
	);

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
		return \wp_parse_args( is_array( $saved ) ? $saved : array(), self::DEFAULTS );
	}

	/**
	 * Return reserved slugs that should never be used for custom login.
	 *
	 * @return array
	 */
	private static function get_reserved_login_slugs(): array {
		return array(
			'wp-admin',
			'wp-login',
			'wp-login.php',
			'wp-signup',
			'wp-signup.php',
			'wp-register',
			'wp-register.php',
			'admin',
			'login',
			'register',
			'dashboard',
			'xmlrpc.php',
			'wp-json',
		);
	}

	/**
	 * Validate custom login slug strength and safety.
	 *
	 * @param string $slug Sanitized slug.
	 * @return bool
	 */
	private static function is_valid_custom_login_slug( string $slug ): bool {
		if ( strlen( $slug ) < 8 ) {
			return false;
		}
		if ( ! preg_match( '/[a-z]/', $slug ) || ! preg_match( '/\d/', $slug ) ) {
			return false;
		}
		if ( in_array( $slug, self::get_reserved_login_slugs(), true ) ) {
			return false;
		}
		if ( 0 === strpos( $slug, 'wp-' ) ) {
			return false;
		}
		return true;
	}

	/**
	 * Sanitize key/value token used for emergency fallback.
	 *
	 * @param string $token Raw token.
	 * @return string
	 */
	private static function sanitize_token( string $token ): string {
		$sanitized = preg_replace( '/[^a-zA-Z0-9_-]/', '', $token );
		return is_string( $sanitized ) ? $sanitized : '';
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
					$slug    = (string) $options['custom_login_slug'];
					$key     = (string) $options['custom_login_fallback_key'];
					$value   = (string) $options['custom_login_fallback_value'];
					$alt_url = $slug ? home_url( '/' . trim( $slug, '/' ) . '/' ) : '';
					$fallback_preview = '';
					if ( $key && $value ) {
						$fallback_preview = add_query_arg( $key, $value, home_url( '/wp-login.php' ) );
					}
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
					<hr />
					<p>
							<label>
								<input type="hidden"
									form="flexline-utilities-form"
									name="flexline_utilities[custom_login_enabled]"
									value="0" />
								<input type="checkbox"
									form="flexline-utilities-form"
									name="flexline_utilities[custom_login_enabled]"
									value="1" <?php checked( (int) $options['custom_login_enabled'], 1 ); ?> />
							<strong>Enable Alternate Login URL</strong>
						</label><br />
						<span class="description">
							Enables a custom login slug and blocks direct access to the default WordPress login page in strict mode.
						</span>
					</p>
					<p>
						<label for="flexline-custom-login-slug"><strong>Alternate Login Slug</strong></label><br />
							<input id="flexline-custom-login-slug"
								form="flexline-utilities-form"
								type="text"
								class="regular-text"
								name="flexline_utilities[custom_login_slug]"
							value="<?php echo esc_attr( $slug ); ?>"
							placeholder="secure-entry-9x7" />
						<br />
						<span class="description">Use at least 8 characters and include both letters and numbers.</span>
					</p>
					<p>
						<label>
								<input type="checkbox"
									form="flexline-utilities-form"
									name="flexline_utilities[custom_login_strict_mode]"
									value="1" <?php checked( (int) $options['custom_login_strict_mode'], 1 ); ?> />
							<strong>Strict Mode (block direct /wp-login.php and unauthenticated /wp-admin)</strong>
						</label>
					</p>
					<p>
						<label for="flexline-custom-login-fallback-key"><strong>Emergency Fallback Key</strong></label><br />
							<input id="flexline-custom-login-fallback-key"
								form="flexline-utilities-form"
								type="text"
								class="regular-text"
								name="flexline_utilities[custom_login_fallback_key]"
							value="<?php echo esc_attr( $key ); ?>"
							placeholder="rescue" />
					</p>
					<p>
						<label for="flexline-custom-login-fallback-value"><strong>Emergency Fallback Value</strong></label><br />
							<input id="flexline-custom-login-fallback-value"
								form="flexline-utilities-form"
								type="text"
								class="regular-text"
								name="flexline_utilities[custom_login_fallback_value]"
							value="<?php echo esc_attr( $value ); ?>"
							placeholder="your-secret-value" />
					</p>
					<?php if ( $alt_url ) : ?>
						<p>
							<strong>Alternate Login URL:</strong>
							<input type="text" class="regular-text code" readonly value="<?php echo esc_url( $alt_url ); ?>" />
						</p>
					<?php endif; ?>
					<?php if ( $fallback_preview ) : ?>
						<p>
							<strong>Emergency Fallback URL Preview:</strong>
							<input type="text" class="regular-text code" readonly value="<?php echo esc_url( $fallback_preview ); ?>" />
						</p>
					<?php endif; ?>
					<?php if ( ! empty( $options['custom_login_enabled'] ) ) : ?>
						<div class="notice notice-warning inline">
							<p><strong>Warning:</strong> You can lock yourself out if you lose the custom slug and fallback credentials.</p>
						</div>
					<?php endif; ?>
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
		$input = is_array( $input ) ? $input : array();
		$saved = self::get_options();

		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			$keys = implode( ',', array_keys( $input ) );
			error_log( '[FlexLine Utilities] sanitize_options keys: ' . $keys );
			error_log(
				'[FlexLine Utilities] custom_login payload: enabled=' .
				(string) ( $input['custom_login_enabled'] ?? 'missing' ) .
				' slug=' . (string) ( $input['custom_login_slug'] ?? 'missing' ) .
				' fallback_key=' . (string) ( $input['custom_login_fallback_key'] ?? 'missing' ) .
				' fallback_value=' . (string) ( $input['custom_login_fallback_value'] ?? 'missing' )
			);
		}

		$keys      = array(
			'enable_og_tags',
			'remove_generator',
			'disable_xmlrpc',
			'rest_cors_allow_all',
			'disable_all_comments',
			'custom_login_enabled',
			'custom_login_strict_mode',
		);
		$sanitized = array();
		foreach ( $keys as $k ) {
			$sanitized[ $k ] = ( 1 === (int) ( $input[ $k ] ?? 0 ) ) ? 1 : 0; // Yoda.
		}

		$raw_slug = (string) ( $input['custom_login_slug'] ?? '' );
		$slug     = trim( sanitize_title_with_dashes( $raw_slug ), '/' );
		if ( '' === $slug && ! empty( $saved['custom_login_slug'] ) ) {
			$slug = (string) $saved['custom_login_slug'];
		}
		if ( $slug && ! self::is_valid_custom_login_slug( $slug ) ) {
			add_settings_error(
				'flexline_utilities',
				'flexline_invalid_custom_login_slug',
				'Alternate login slug is invalid. Use at least 8 characters, include letters and numbers, and avoid reserved terms.',
				'error'
			);
			$slug = ! empty( $saved['custom_login_slug'] ) ? (string) $saved['custom_login_slug'] : '';
		}

		$fallback_key = self::sanitize_token( (string) ( $input['custom_login_fallback_key'] ?? '' ) );
		$fallback_val = self::sanitize_token( (string) ( $input['custom_login_fallback_value'] ?? '' ) );
		if ( '' === $fallback_key && ! empty( $saved['custom_login_fallback_key'] ) ) {
			$fallback_key = (string) $saved['custom_login_fallback_key'];
		}
		if ( '' === $fallback_val && ! empty( $saved['custom_login_fallback_value'] ) ) {
			$fallback_val = (string) $saved['custom_login_fallback_value'];
		}

		// Prevent lockout by requiring a usable slug and fallback secrets when alternate login is enabled.
		$has_fallback      = ( '' !== $fallback_key && '' !== $fallback_val );
		$submitted_enabled = (int) ( $input['custom_login_enabled'] ?? 0 );
		if ( 0 === $submitted_enabled && '' !== $slug && $has_fallback && 1 === (int) $sanitized['custom_login_strict_mode'] ) {
			// Failsafe for environments where checkbox values are intermittently dropped.
			$sanitized['custom_login_enabled'] = 1;
			add_settings_error(
				'flexline_utilities',
				'flexline_auto_enabled_custom_login',
				'Alternate login was auto-enabled because slug, strict mode, and fallback credentials are set.',
				'warning'
			);
		}

		if ( 1 === (int) $sanitized['custom_login_enabled'] ) {
			if ( '' === $slug ) {
				add_settings_error(
					'flexline_utilities',
					'flexline_missing_custom_login_slug',
					'Alternate login could not be enabled because no valid slug was provided.',
					'error'
				);
				$sanitized['custom_login_enabled'] = 0;
			}
			if ( '' === $fallback_key || '' === $fallback_val ) {
				$fallback_key = 'rescue_' . strtolower( wp_generate_password( 6, false, false ) );
				$fallback_val = wp_generate_password( 24, false, false );
				add_settings_error(
					'flexline_utilities',
					'flexline_generated_custom_login_fallback',
					'Emergency fallback key/value were auto-generated so alternate login can be safely enabled.',
					'warning'
				);
			}
		}

		$sanitized['custom_login_slug']           = $slug;
		$sanitized['custom_login_fallback_key']   = $fallback_key;
		$sanitized['custom_login_fallback_value'] = $fallback_val;

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
