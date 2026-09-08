<?php
/**
 * Section Frame preset storage and validation.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Manages Section Frame feature options and reusable frame presets.
 */
class Section_Frame_Presets {

	public const ENABLE_OPTION          = 'flexline_enable_group_frames';
	public const PRESETS_OPTION         = 'flexline_frame_presets';
	public const SETTINGS_GROUP         = 'flexline_section_frames_group';
	public const ENABLE_SETTINGS_GROUP  = self::SETTINGS_GROUP;
	public const PRESETS_SETTINGS_GROUP = self::SETTINGS_GROUP;

	private const DEFAULT_HEIGHT_MIN          = 56.0;
	private const DEFAULT_HEIGHT_PREFERRED_VW = 7.0;
	private const DEFAULT_HEIGHT_MAX          = 112.0;
	private const MAX_INLINE_SVG_BYTES        = 262144;

	/**
	 * Normalized SVG data URIs generated during the current request.
	 *
	 * @var array<int,string>
	 */
	private static array $normalized_svg_data_uri_cache = array();

	/**
	 * Register Section Frame settings.
	 *
	 * @return void
	 */
	public static function register_settings(): void {
		register_setting(
			self::ENABLE_SETTINGS_GROUP,
			self::ENABLE_OPTION,
			array(
				'type'              => 'integer',
				'default'           => 0,
				'sanitize_callback' => array( __CLASS__, 'sanitize_enabled' ),
			)
		);

		register_setting(
			self::PRESETS_SETTINGS_GROUP,
			self::PRESETS_OPTION,
			array(
				'type'              => 'array',
				'default'           => array(),
				'sanitize_callback' => array( __CLASS__, 'sanitize_presets' ),
			)
		);
	}

	/**
	 * Sanitize the global enabled flag.
	 *
	 * @param mixed $value Raw submitted value.
	 * @return int
	 */
	public static function sanitize_enabled( $value ): int {
		return ( 1 === (int) $value ) ? 1 : 0;
	}

	/**
	 * Determine whether Section Frames are globally enabled.
	 *
	 * @return bool
	 */
	public static function is_enabled(): bool {
		return 1 === (int) get_option( self::ENABLE_OPTION, 0 );
	}

	/**
	 * Return normalized saved presets.
	 *
	 * @return array<int,array<string,mixed>>
	 */
	public static function get_presets(): array {
		$saved = get_option( self::PRESETS_OPTION, array() );
		if ( ! is_array( $saved ) ) {
			return array();
		}

		return self::normalize_presets( $saved, false );
	}

	/**
	 * Resolve a saved preset by ID and edge side.
	 *
	 * @param string $preset_id Preset ID.
	 * @param string $side      Expected side, top or bottom.
	 * @return array<string,mixed>|null
	 */
	public static function resolve_preset( string $preset_id, string $side ): ?array {
		$preset_id = sanitize_key( $preset_id );
		$side      = self::normalize_side( $side );
		if ( '' === $preset_id || '' === $side ) {
			return null;
		}

		foreach ( self::get_presets() as $preset ) {
			if ( $preset_id !== $preset['id'] || $side !== $preset['side'] ) {
				continue;
			}

			if ( ! self::is_svg_attachment( (int) $preset['attachment_id'] ) ) {
				return null;
			}

			return $preset;
		}

		return null;
	}

	/**
	 * Resolve a saved preset and include its current attachment URL.
	 *
	 * @param string $preset_id Preset ID.
	 * @param string $side      Expected side, top or bottom.
	 * @return array<string,mixed>|null
	 */
	public static function resolve_preset_for_render( string $preset_id, string $side ): ?array {
		$preset = self::resolve_preset( $preset_id, $side );
		if ( null === $preset ) {
			return null;
		}

		return self::prepare_preset_for_render( $preset );
	}

	/**
	 * Return editor configuration for Section Frame controls and preview.
	 *
	 * @return array{enabled:bool,presets:array<int,array<string,mixed>>}
	 */
	public static function get_editor_config(): array {
		$config = array(
			'enabled' => self::is_enabled(),
			'presets' => array(),
		);

		if ( ! $config['enabled'] ) {
			return $config;
		}

		foreach ( self::get_presets() as $preset ) {
			$prepared = self::prepare_preset_for_render( $preset );
			if ( null !== $prepared ) {
				$config['presets'][] = $prepared;
			}
		}

		return $config;
	}

	/**
	 * Return a renderable SVG source for a frame attachment.
	 *
	 * When possible this returns a normalized data URI with
	 * preserveAspectRatio="none" on the root SVG so design-tool exports stretch
	 * cleanly as CSS masks. If the attachment file cannot be read, it falls
	 * back to the Media Library URL.
	 *
	 * @param int $attachment_id SVG attachment ID.
	 * @return string
	 */
	public static function get_svg_frame_source( int $attachment_id ): string {
		if ( ! self::is_svg_attachment( $attachment_id ) ) {
			return '';
		}

		$data_uri = self::get_normalized_svg_data_uri( $attachment_id );
		if ( '' !== $data_uri ) {
			return $data_uri;
		}

		return self::get_attachment_url( $attachment_id );
	}

	/**
	 * Add render/editor fields to a normalized preset.
	 *
	 * @param array<string,mixed> $preset Normalized preset row.
	 * @return array<string,mixed>|null
	 */
	private static function prepare_preset_for_render( array $preset ): ?array {
		if ( ! self::is_svg_attachment( (int) $preset['attachment_id'] ) ) {
			return null;
		}

		$url = self::get_svg_frame_source( (int) $preset['attachment_id'] );
		if ( '' === $url ) {
			return null;
		}

		$preset['url']    = $url;
		$preset['height'] = sprintf(
			'clamp(%spx, %svw, %spx)',
			self::format_number( (float) $preset['height_min'] ),
			self::format_number( (float) $preset['height_preferred_vw'] ),
			self::format_number( (float) $preset['height_max'] )
		);

		return $preset;
	}

	/**
	 * Sanitize submitted preset rows.
	 *
	 * Missing input means the manager was not submitted, so existing presets are
	 * preserved. A submitted blank row intentionally clears presets.
	 * WordPress can also pass an already-normalized option array back through
	 * this callback during update flows, so the callback must be idempotent.
	 *
	 * @param mixed $input Raw submitted option value.
	 * @return array<int,array<string,mixed>>
	 */
	public static function sanitize_presets( $input ): array {
		if ( ! is_array( $input ) ) {
			return self::get_saved_raw_presets();
		}

		if ( array() === $input ) {
			return array();
		}

		if ( self::is_preset_list( $input ) ) {
			return self::normalize_presets( $input, false );
		}

		$items = isset( $input['items'] ) && is_array( $input['items'] ) ? $input['items'] : array();
		if ( empty( $items ) ) {
			if ( ! empty( $input['_submitted'] ) ) {
				self::add_notice( 'saved-frame-presets', '0 frame shape presets saved.' );
				return array();
			}

			return self::get_saved_raw_presets();
		}

		return self::normalize_presets( $items, true );
	}

	/**
	 * Determine whether an array is already in stored preset-list shape.
	 *
	 * @param array $input Raw or stored option value.
	 * @return bool
	 */
	private static function is_preset_list( array $input ): bool {
		if ( isset( $input['items'] ) ) {
			return false;
		}

		foreach ( $input as $item ) {
			if ( is_array( $item ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Normalize preset rows.
	 *
	 * @param array $items         Raw rows.
	 * @param bool  $record_errors Whether validation errors should be reported.
	 * @return array<int,array<string,mixed>>
	 */
	private static function normalize_presets( array $items, bool $record_errors ): array {
		$presets  = array();
		$seen_ids = array();
		$errors   = array();

		foreach ( $items as $index => $item ) {
			if ( ! is_array( $item ) ) {
				continue;
			}

			$preset = self::normalize_preset( $item, $seen_ids, (int) $index, $errors );
			if ( null !== $preset ) {
				$presets[] = $preset;
			}
		}

		if ( ! empty( $errors ) ) {
			if ( $record_errors ) {
				foreach ( $errors as $error_code => $message ) {
					self::add_error( $error_code, $message );
				}
			}

			return self::get_saved_raw_presets();
		}

		if ( $record_errors ) {
			self::add_notice(
				'saved-frame-presets',
				sprintf(
					'%d frame shape preset%s saved.',
					count( $presets ),
					1 === count( $presets ) ? '' : 's'
				)
			);
		}

		return $presets;
	}

	/**
	 * Normalize one preset row.
	 *
	 * @param array $item     Raw row.
	 * @param array $seen_ids IDs already used during this normalization pass.
	 * @param int   $index    Submitted row index.
	 * @param array $errors   Error collector.
	 * @return array<string,mixed>|null
	 */
	private static function normalize_preset( array $item, array &$seen_ids, int $index, array &$errors ): ?array {
		$attachment_id = self::normalize_attachment_id( $item );
		$label         = self::sanitize_label( $item['label'] ?? '' );

		if ( '' === $label && $attachment_id <= 0 ) {
			return null;
		}

		if ( '' === $label ) {
			$label = self::get_attachment_label( $attachment_id );
		}

		$side = self::normalize_side( $item['side'] ?? '' );
		if ( '' === $side ) {
			$errors[ 'invalid-side-' . $index ] = sprintf( 'Frame shape "%s" must use Top edge or Bottom edge.', $label );
			return null;
		}

		if ( ! self::is_svg_attachment( $attachment_id ) ) {
			$errors[ 'invalid-svg-' . $index ] = sprintf( 'Frame shape "%s" must use an SVG from the Media Library.', $label );
			return null;
		}

		$height = self::normalize_height( $item, $label, $index, $errors );
		if ( empty( $height ) ) {
			return null;
		}

		$id = self::normalize_id( $item['id'] ?? '' );
		if ( '' === $id || isset( $seen_ids[ $id ] ) ) {
			$id = self::generate_id( $label, $attachment_id, $side, $seen_ids );
		}
		$seen_ids[ $id ] = true;

		return array(
			'id'                  => $id,
			'label'               => $label,
			'side'                => $side,
			'attachment_id'       => $attachment_id,
			'height_min'          => $height['min'],
			'height_preferred_vw' => $height['preferred_vw'],
			'height_max'          => $height['max'],
		);
	}

	/**
	 * Normalize responsive height fields.
	 *
	 * @param array  $item   Raw row.
	 * @param string $label  Preset label.
	 * @param int    $index  Submitted row index.
	 * @param array  $errors Error collector.
	 * @return array{min:float,preferred_vw:float,max:float}|null
	 */
	private static function normalize_height( array $item, string $label, int $index, array &$errors ): ?array {
		$min          = self::normalize_positive_float( $item['height_min'] ?? self::DEFAULT_HEIGHT_MIN );
		$preferred_vw = self::normalize_positive_float( $item['height_preferred_vw'] ?? self::DEFAULT_HEIGHT_PREFERRED_VW );
		$max          = self::normalize_positive_float( $item['height_max'] ?? self::DEFAULT_HEIGHT_MAX );

		if ( null === $min || null === $preferred_vw || null === $max ) {
			$errors[ 'invalid-height-' . $index ] = sprintf( 'Frame shape "%s" needs positive height values.', $label );
			return null;
		}

		if ( $min > $max ) {
			$errors[ 'invalid-height-range-' . $index ] = sprintf( 'Frame shape "%s" needs a minimum height that is less than or equal to the maximum height.', $label );
			return null;
		}

		return array(
			'min'          => $min,
			'preferred_vw' => $preferred_vw,
			'max'          => $max,
		);
	}

	/**
	 * Sanitize a preset label.
	 *
	 * @param mixed $label Raw label.
	 * @return string
	 */
	private static function sanitize_label( $label ): string {
		if ( function_exists( 'sanitize_text_field' ) ) {
			return sanitize_text_field( (string) $label );
		}

		return trim( wp_strip_all_tags( (string) $label ) );
	}

	/**
	 * Normalize an edge side.
	 *
	 * @param mixed $side Raw side.
	 * @return string
	 */
	private static function normalize_side( $side ): string {
		$side = sanitize_key( (string) $side );
		return in_array( $side, array( 'top', 'bottom' ), true ) ? $side : '';
	}

	/**
	 * Normalize an immutable preset ID.
	 *
	 * @param mixed $id Raw ID.
	 * @return string
	 */
	private static function normalize_id( $id ): string {
		$id = sanitize_key( (string) $id );
		return preg_match( '/^[a-z0-9][a-z0-9_-]{2,63}$/', $id ) ? $id : '';
	}

	/**
	 * Normalize the selected SVG attachment ID, falling back to submitted URL.
	 *
	 * @param array $item Raw row.
	 * @return int
	 */
	private static function normalize_attachment_id( array $item ): int {
		$attachment_id = absint( $item['attachment_id'] ?? 0 );
		if ( $attachment_id > 0 || empty( $item['attachment_url'] ) || ! function_exists( 'attachment_url_to_postid' ) ) {
			return $attachment_id;
		}

		return absint( attachment_url_to_postid( (string) $item['attachment_url'] ) );
	}

	/**
	 * Return a label from an attachment title or URL basename.
	 *
	 * @param int $attachment_id Attachment ID.
	 * @return string
	 */
	private static function get_attachment_label( int $attachment_id ): string {
		if ( $attachment_id <= 0 ) {
			return '';
		}

		$title = function_exists( 'get_the_title' ) ? self::sanitize_label( get_the_title( $attachment_id ) ) : '';
		if ( '' !== $title ) {
			return $title;
		}

		$url  = self::get_attachment_url( $attachment_id );
		$path = wp_parse_url( $url, PHP_URL_PATH );
		if ( ! $path ) {
			$path = $url;
		}

		return self::sanitize_label( pathinfo( $path, PATHINFO_FILENAME ) );
	}

	/**
	 * Normalize a positive finite number.
	 *
	 * @param mixed $value Raw number.
	 * @return float|null
	 */
	private static function normalize_positive_float( $value ): ?float {
		if ( ! is_numeric( $value ) ) {
			return null;
		}

		$value = (float) $value;
		if ( ! is_finite( $value ) || $value <= 0 ) {
			return null;
		}

		return $value;
	}

	/**
	 * Format stored float values for CSS output.
	 *
	 * @param float $value Numeric value.
	 * @return string
	 */
	private static function format_number( float $value ): string {
		return rtrim( rtrim( number_format( $value, 3, '.', '' ), '0' ), '.' );
	}

	/**
	 * Generate a new unique preset ID.
	 *
	 * @param string $label         Preset label.
	 * @param int    $attachment_id SVG attachment ID.
	 * @param string $side          Edge side.
	 * @param array  $seen_ids      IDs already used during this normalization pass.
	 * @return string
	 */
	private static function generate_id( string $label, int $attachment_id, string $side, array $seen_ids ): string {
		do {
			$seed = function_exists( 'wp_generate_uuid4' ) ? wp_generate_uuid4() : uniqid( '', true );
			$id   = 'frame_' . substr( md5( $label . '|' . $attachment_id . '|' . $side . '|' . $seed ), 0, 12 );
		} while ( isset( $seen_ids[ $id ] ) );

		return $id;
	}

	/**
	 * Check whether an attachment is a Media Library SVG.
	 *
	 * @param int $attachment_id Attachment ID.
	 * @return bool
	 */
	private static function is_svg_attachment( int $attachment_id ): bool {
		if ( $attachment_id <= 0 || ! function_exists( 'get_post_mime_type' ) ) {
			return false;
		}

		return 'image/svg+xml' === get_post_mime_type( $attachment_id );
	}

	/**
	 * Return an attachment URL when available.
	 *
	 * @param int $attachment_id Attachment ID.
	 * @return string
	 */
	private static function get_attachment_url( int $attachment_id ): string {
		if ( $attachment_id <= 0 || ! function_exists( 'wp_get_attachment_url' ) ) {
			return '';
		}

		$url = wp_get_attachment_url( $attachment_id );
		return is_string( $url ) ? $url : '';
	}

	/**
	 * Build a normalized SVG data URI for a Media Library attachment.
	 *
	 * @param int $attachment_id SVG attachment ID.
	 * @return string
	 */
	private static function get_normalized_svg_data_uri( int $attachment_id ): string {
		if ( $attachment_id <= 0 || ! function_exists( 'get_attached_file' ) ) {
			return '';
		}

		if ( isset( self::$normalized_svg_data_uri_cache[ $attachment_id ] ) ) {
			return self::$normalized_svg_data_uri_cache[ $attachment_id ];
		}

		$file = get_attached_file( $attachment_id );
		if ( ! is_string( $file ) || '' === $file || ! is_readable( $file ) ) {
			return '';
		}

		$file_size = filesize( $file );
		if ( false === $file_size || $file_size > self::MAX_INLINE_SVG_BYTES ) {
			return '';
		}

		// SVG uploads are already restricted to Media Library SVG attachments.
		$svg = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( ! is_string( $svg ) || '' === trim( $svg ) ) {
			return '';
		}

		$svg = self::normalize_svg_preserve_aspect_ratio( $svg );
		if ( '' === $svg ) {
			return '';
		}

		self::$normalized_svg_data_uri_cache[ $attachment_id ] = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode( $svg );

		return self::$normalized_svg_data_uri_cache[ $attachment_id ];
	}

	/**
	 * Force preserveAspectRatio="none" on the root SVG element.
	 *
	 * @param string $svg SVG markup.
	 * @return string
	 */
	private static function normalize_svg_preserve_aspect_ratio( string $svg ): string {
		$normalized = preg_replace_callback(
			'/<svg\b([^>]*)>/i',
			static function ( array $matches ): string {
				$attributes = preg_replace(
					'/\s+preserveAspectRatio\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]+)/i',
					'',
					$matches[1]
				);

				if ( ! is_string( $attributes ) ) {
					$attributes = $matches[1];
				}

				return '<svg' . $attributes . ' preserveAspectRatio="none">';
			},
			$svg,
			1
		);

		return is_string( $normalized ) && $normalized !== $svg ? $normalized : '';
	}

	/**
	 * Return raw saved presets without reporting new validation errors.
	 *
	 * @return array<int,array<string,mixed>>
	 */
	private static function get_saved_raw_presets(): array {
		if ( ! function_exists( 'get_option' ) ) {
			return array();
		}

		$saved = get_option( self::PRESETS_OPTION, array() );
		return is_array( $saved ) ? array_values( $saved ) : array();
	}

	/**
	 * Add a settings error when WordPress settings APIs are available.
	 *
	 * @param string $code    Error code.
	 * @param string $message Error message.
	 * @return void
	 */
	private static function add_error( string $code, string $message ): void {
		if ( function_exists( 'add_settings_error' ) ) {
			add_settings_error( self::PRESETS_OPTION, $code, $message, 'error' );
		}
	}

	/**
	 * Add a settings success notice when WordPress settings APIs are available.
	 *
	 * @param string $code    Notice code.
	 * @param string $message Notice message.
	 * @return void
	 */
	private static function add_notice( string $code, string $message ): void {
		if ( function_exists( 'add_settings_error' ) ) {
			add_settings_error( self::PRESETS_OPTION, $code, $message, 'updated' );
		}
	}
}

if ( function_exists( 'add_action' ) ) {
	add_action( 'admin_init', array( Section_Frame_Presets::class, 'register_settings' ) );
}
