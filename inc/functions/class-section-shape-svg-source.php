<?php
/**
 * Shared SVG source normalization for Section Shapes.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Resolves Media Library SVG attachments for CSS mask usage.
 */
class Section_Shape_SVG_Source {

	public const POLICY_STRETCH  = 'stretch';
	public const POLICY_PRESERVE = 'preserve';

	private const MAX_INLINE_SVG_BYTES = 262144;

	/**
	 * Normalized SVG data URIs generated during the current request.
	 *
	 * @var array<string,string>
	 */
	private static array $data_uri_cache = array();

	/**
	 * SVG aspect ratios parsed during the current request.
	 *
	 * @var array<int,string>
	 */
	private static array $aspect_ratio_cache = array();

	/**
	 * Return a renderable SVG source for a stretching frame.
	 *
	 * Frames preserve their existing URL fallback because they already shipped
	 * with that behavior.
	 *
	 * @param int $attachment_id SVG attachment ID.
	 * @return string
	 */
	public static function get_frame_source( int $attachment_id ): string {
		if ( ! self::is_svg_attachment( $attachment_id ) ) {
			return '';
		}

		$data_uri = self::get_data_uri( $attachment_id, self::POLICY_STRETCH );
		if ( '' !== $data_uri ) {
			return $data_uri;
		}

		return self::get_attachment_url( $attachment_id );
	}

	/**
	 * Return a normalized inline SVG source for a whole-section shape mask.
	 *
	 * Whole-section masks need predictable fit behavior. If the file cannot be
	 * normalized, the preset is treated as unavailable instead of falling back
	 * to an unnormalized attachment URL.
	 *
	 * @param int    $attachment_id SVG attachment ID.
	 * @param string $fit           Shape mask fit, fill or proportion.
	 * @return string
	 */
	public static function get_shape_mask_source( int $attachment_id, string $fit ): string {
		if ( ! self::is_svg_attachment( $attachment_id ) ) {
			return '';
		}

		$policy = 'proportion' === sanitize_key( $fit ) ? self::POLICY_PRESERVE : self::POLICY_STRETCH;

		return self::get_data_uri( $attachment_id, $policy );
	}

	/**
	 * Return a viewBox-derived aspect ratio for a shape mask attachment.
	 *
	 * @param int $attachment_id SVG attachment ID.
	 * @return string CSS aspect-ratio value, or an empty string when unavailable.
	 */
	public static function get_viewbox_aspect_ratio( int $attachment_id ): string {
		if ( $attachment_id <= 0 || ! function_exists( 'get_attached_file' ) ) {
			return '';
		}

		if ( isset( self::$aspect_ratio_cache[ $attachment_id ] ) ) {
			return self::$aspect_ratio_cache[ $attachment_id ];
		}

		$file = get_attached_file( $attachment_id );
		if ( ! is_string( $file ) || '' === $file || ! is_readable( $file ) ) {
			return '';
		}

		$file_size = filesize( $file );
		if ( false === $file_size || $file_size > self::MAX_INLINE_SVG_BYTES ) {
			return '';
		}

		$svg = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( ! is_string( $svg ) || '' === trim( $svg ) || ! preg_match( '/<svg\b([^>]*)>/i', $svg, $root_matches ) ) {
			return '';
		}

		$root_attributes                            = is_string( $root_matches[1] ) ? $root_matches[1] : '';
		self::$aspect_ratio_cache[ $attachment_id ] = self::parse_viewbox_aspect_ratio( $root_attributes );

		return self::$aspect_ratio_cache[ $attachment_id ];
	}

	/**
	 * Reset the request cache. Intended for isolated unit tests.
	 *
	 * @return void
	 */
	public static function reset_cache(): void {
		self::$data_uri_cache     = array();
		self::$aspect_ratio_cache = array();
	}

	/**
	 * Check whether an attachment is a Media Library SVG.
	 *
	 * @param int $attachment_id Attachment ID.
	 * @return bool
	 */
	public static function is_svg_attachment( int $attachment_id ): bool {
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
	public static function get_attachment_url( int $attachment_id ): string {
		if ( $attachment_id <= 0 || ! function_exists( 'wp_get_attachment_url' ) ) {
			return '';
		}

		$url = wp_get_attachment_url( $attachment_id );
		return is_string( $url ) ? $url : '';
	}

	/**
	 * Build a normalized SVG data URI for a Media Library attachment.
	 *
	 * @param int    $attachment_id SVG attachment ID.
	 * @param string $policy        Normalization policy.
	 * @return string
	 */
	private static function get_data_uri( int $attachment_id, string $policy ): string {
		if ( $attachment_id <= 0 || ! function_exists( 'get_attached_file' ) ) {
			return '';
		}

		$policy = self::normalize_policy( $policy );
		$key    = $attachment_id . ':' . $policy;
		if ( isset( self::$data_uri_cache[ $key ] ) ) {
			return self::$data_uri_cache[ $key ];
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

		if ( preg_match( '/<svg\b([^>]*)>/i', $svg, $root_matches ) ) {
			$root_attributes                            = is_string( $root_matches[1] ) ? $root_matches[1] : '';
			self::$aspect_ratio_cache[ $attachment_id ] = self::parse_viewbox_aspect_ratio( $root_attributes );
		}

		$svg = self::normalize_svg_root( $svg, $policy );
		if ( '' === $svg ) {
			return '';
		}

		self::$data_uri_cache[ $key ] = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode( $svg );

		return self::$data_uri_cache[ $key ];
	}

	/**
	 * Normalize a requested SVG policy.
	 *
	 * @param string $policy Requested policy.
	 * @return string
	 */
	private static function normalize_policy( string $policy ): string {
		return self::POLICY_PRESERVE === $policy ? self::POLICY_PRESERVE : self::POLICY_STRETCH;
	}

	/**
	 * Normalize the root SVG element for the requested CSS mask policy.
	 *
	 * @param string $svg    SVG markup.
	 * @param string $policy Normalization policy.
	 * @return string
	 */
	private static function normalize_svg_root( string $svg, string $policy ): string {
		if ( ! preg_match( '/<svg\b([^>]*)>/i', $svg, $root_matches ) ) {
			return '';
		}

		$root_attributes = is_string( $root_matches[1] ) ? $root_matches[1] : '';
		if ( self::POLICY_PRESERVE === $policy && ! self::has_usable_viewbox( $root_attributes ) ) {
			return '';
		}

		$normalized = preg_replace_callback(
			'/<svg\b([^>]*)>/i',
			static function ( array $matches ) use ( $policy ): string {
				$attributes = is_string( $matches[1] ) ? $matches[1] : '';

				$attributes = self::remove_root_attribute( $attributes, 'preserveAspectRatio' );
				if ( self::POLICY_PRESERVE === $policy ) {
					$attributes = self::remove_root_attribute( $attributes, 'width' );
					$attributes = self::remove_root_attribute( $attributes, 'height' );
				}

				$preserve = self::POLICY_PRESERVE === $policy ? 'xMidYMid meet' : 'none';

				return '<svg' . $attributes . ' preserveAspectRatio="' . $preserve . '">';
			},
			$svg,
			1
		);

		return is_string( $normalized ) && $normalized !== $svg ? $normalized : '';
	}

	/**
	 * Remove a root SVG attribute by name.
	 *
	 * @param string $attributes Root SVG attributes.
	 * @param string $name       Attribute name.
	 * @return string
	 */
	private static function remove_root_attribute( string $attributes, string $name ): string {
		$pattern = '/\s+' . preg_quote( $name, '/' ) . '\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]+)/i';
		$updated = preg_replace( $pattern, '', $attributes );

		return is_string( $updated ) ? $updated : $attributes;
	}

	/**
	 * Determine whether root SVG attributes include a usable viewBox.
	 *
	 * @param string $attributes Root SVG attributes.
	 * @return bool
	 */
	private static function has_usable_viewbox( string $attributes ): bool {
		return '' !== self::parse_viewbox_aspect_ratio( $attributes );
	}

	/**
	 * Return a CSS aspect-ratio value from root SVG attributes.
	 *
	 * @param string $attributes Root SVG attributes.
	 * @return string
	 */
	private static function parse_viewbox_aspect_ratio( string $attributes ): string {
		if ( ! preg_match( '/\sviewBox\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s>]+))/i', $attributes, $matches ) ) {
			return '';
		}

		$value = $matches[1] ?? $matches[2] ?? $matches[3] ?? '';
		$parts = preg_split( '/[\s,]+/', trim( (string) $value ) );
		if ( ! is_array( $parts ) || 4 !== count( $parts ) ) {
			return '';
		}

		if ( ! is_numeric( $parts[2] ) || ! is_numeric( $parts[3] ) ) {
			return '';
		}

		$width  = (float) $parts[2];
		$height = (float) $parts[3];

		if ( ! is_finite( $width ) || ! is_finite( $height ) || $width <= 0 || $height <= 0 ) {
			return '';
		}

		return self::format_number( $width ) . ' / ' . self::format_number( $height );
	}

	/**
	 * Format an SVG viewBox number for CSS output.
	 *
	 * @param float $value Numeric value.
	 * @return string
	 */
	private static function format_number( float $value ): string {
		return rtrim( rtrim( number_format( $value, 6, '.', '' ), '0' ), '.' );
	}
}
