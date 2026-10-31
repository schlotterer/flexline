<?php
/**
 * SVG upload sanitization and migration support.
 *
 * @package flexline
 */

namespace FlexLine;

use enshrined\svgSanitize\Sanitizer;
use WP_Error;

defined( 'ABSPATH' ) || exit;

/**
 * Sanitize SVG uploads before WordPress moves them into the uploads directory.
 */
class SVG_Security {

	/**
	 * Temporary paths that passed the upload sanitizer during this request.
	 *
	 * @var array<string, bool>
	 */
	private static $sanitized_uploads = array();

	/**
	 * Register upload filters and the WP-CLI command.
	 */
	public static function init() {
		add_filter( 'wp_handle_upload_prefilter', array( __CLASS__, 'sanitize_upload' ) );
		add_filter( 'wp_check_filetype_and_ext', array( __CLASS__, 'allow_sanitized_svg' ), 10, 5 );

		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			\WP_CLI::add_command( 'flexline sanitize-existing-svgs', array( __CLASS__, 'sanitize_existing' ) );
		}
	}

	/**
	 * Sanitize an uploaded SVG temporary file.
	 *
	 * @param array $file Upload data.
	 * @return array
	 */
	public static function sanitize_upload( $file ) {
		$extension = strtolower( pathinfo( isset( $file['name'] ) ? (string) $file['name'] : '', PATHINFO_EXTENSION ) );

		if ( 'svgz' === $extension ) {
			$file['error'] = __( 'SVGZ uploads are not supported. Upload an SVG file instead.', 'flexline' );

			return $file;
		}

		if ( 'svg' !== $extension ) {
			return $file;
		}

		if ( ! class_exists( Sanitizer::class ) ) {
			$file['error'] = __( 'SVG uploads are temporarily unavailable because the sanitizer dependency is missing.', 'flexline' );

			return $file;
		}

		$tmp_name  = isset( $file['tmp_name'] ) ? (string) $file['tmp_name'] : '';
		$sanitized = self::sanitize_path( $tmp_name );

		if ( is_wp_error( $sanitized ) ) {
			$file['error'] = $sanitized->get_error_message();

			return $file;
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents -- WordPress upload prefilters operate on a local temporary upload buffer.
		if ( false === file_put_contents( $tmp_name, $sanitized, LOCK_EX ) ) {
			$file['error'] = __( 'The sanitized SVG could not be written to the upload buffer.', 'flexline' );
		} else {
			self::$sanitized_uploads[ $tmp_name ] = true;
		}

		return $file;
	}

	/**
	 * Allow WordPress to accept a validated SVG after prefilter sanitization.
	 *
	 * @param array       $data File type data.
	 * @param string      $file Full temporary file path.
	 * @param string      $filename Original filename.
	 * @param array       $mimes Allowed MIME types.
	 * @param string|bool $real_mime Detected real MIME type.
	 * @return array
	 */
	public static function allow_sanitized_svg( $data, $file, $filename, $mimes, $real_mime ) {
		unset( $mimes, $real_mime );

		$extension = strtolower( pathinfo( (string) $filename, PATHINFO_EXTENSION ) );

		if ( 'svg' !== $extension || ! is_string( $file ) || ! isset( self::$sanitized_uploads[ $file ] ) ) {
			return $data;
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Reading a local upload buffer, not a remote URL.
		$contents = file_get_contents( $file );

		if ( false === $contents || ! preg_match( '/<svg\b/i', $contents ) ) {
			return $data;
		}

		$data['ext']             = 'svg';
		$data['type']            = 'image/svg+xml';
		$data['proper_filename'] = $filename;

		return $data;
	}

	/**
	 * Sanitize a file or return a WP_Error.
	 *
	 * @param string $path SVG file path.
	 * @return string|WP_Error
	 */
	public static function sanitize_path( $path ) {
		if ( '' === $path || ! is_readable( $path ) ) {
			return new WP_Error( 'flexline_svg_unreadable', __( 'The SVG file could not be read.', 'flexline' ) );
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Reading a local SVG file from the media library.
		$contents = file_get_contents( $path );

		if ( false === $contents || '' === trim( $contents ) ) {
			return new WP_Error( 'flexline_svg_empty', __( 'The SVG file is empty or unreadable.', 'flexline' ) );
		}

		$sanitizer = new Sanitizer();
		// Keep internal fragment references for legitimate logos, but remove external resource references from uploaded SVGs.
		$sanitizer->removeRemoteReferences( true );
		$sanitized = $sanitizer->sanitize( $contents );

		if ( false === $sanitized || '' === trim( (string) $sanitized ) ) {
			return new WP_Error( 'flexline_svg_invalid', __( 'The SVG did not pass sanitization.', 'flexline' ) );
		}

		return self::remove_external_references( (string) $sanitized );
	}

	/**
	 * Remove external href references that the sanitizer intentionally permits.
	 *
	 * @param string $svg Sanitized SVG markup.
	 * @return string|WP_Error
	 */
	private static function remove_external_references( $svg ) {
		// phpcs:disable WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase -- DOMDocument exposes camelCase properties.
		$document = new \DOMDocument();
		$previous = libxml_use_internal_errors( true );
		$loaded   = $document->loadXML( $svg, LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING );
		libxml_clear_errors();
		libxml_use_internal_errors( $previous );

		if ( ! $loaded || ! $document->documentElement ) {
			return new WP_Error( 'flexline_svg_invalid_markup', __( 'The sanitized SVG contains invalid markup.', 'flexline' ) );
		}

		$elements           = $document->getElementsByTagName( '*' );
		$elements_to_remove = array();

		foreach ( $elements as $element ) {
			foreach ( array( 'href', 'xlink:href' ) as $attribute_name ) {
				if ( ! $element->hasAttribute( $attribute_name ) ) {
					continue;
				}

				$value = trim( $element->getAttribute( $attribute_name ) );
				if ( preg_match( '#^(?:https?:|file:|data:|javascript:|vbscript:|//)#i', $value ) ) {
					$element->removeAttribute( $attribute_name );
				}
			}

			if ( $element->hasAttribute( 'style' ) && self::css_contains_unsafe_url( $element->getAttribute( 'style' ) ) ) {
				$element->removeAttribute( 'style' );
			}

			if ( 'style' === strtolower( $element->tagName ) && self::css_contains_unsafe_url( $element->textContent ) ) {
				$elements_to_remove[] = $element;
			}
		}

		foreach ( $elements_to_remove as $element ) {
			if ( $element->parentNode ) {
				$element->parentNode->removeChild( $element );
			}
		}

		$output = $document->saveXML( $document->documentElement );
		// phpcs:enable WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

		return $output;
	}

	/**
	 * Determine whether inline CSS contains an unsafe url() reference.
	 *
	 * @param string $css CSS text.
	 * @return bool
	 */
	private static function css_contains_unsafe_url( $css ): bool {
		if ( ! is_string( $css ) || '' === trim( $css ) ) {
			return false;
		}

		if ( ! preg_match_all( '/url\(\s*([\'"]?)(.*?)\1\s*\)/is', $css, $matches ) ) {
			return false;
		}

		foreach ( $matches[2] as $raw_url ) {
			$url = trim( html_entity_decode( (string) $raw_url, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );

			if ( '' === $url || str_starts_with( $url, '#' ) ) {
				continue;
			}

			if ( preg_match( '#^(?:https?:|file:|data:|javascript:|vbscript:|//)#i', $url ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Sanitize existing SVG attachments across the network.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Associative arguments.
	 */
	public static function sanitize_existing( $args, $assoc_args ) {
		unset( $args );

		$dry_run  = isset( $assoc_args['dry-run'] );
		$verbose  = $dry_run || isset( $assoc_args['verbose'] );
		$site_ids = is_multisite() ? get_sites( array( 'fields' => 'ids' ) ) : array( get_current_blog_id() );
		$summary  = array(
			'sites'   => 0,
			'files'   => 0,
			'changed' => 0,
			'errors'  => 0,
		);

		foreach ( $site_ids as $site_id ) {
			if ( is_multisite() ) {
				switch_to_blog( (int) $site_id );
			}

			++$summary['sites'];
			$attachments = get_posts(
				array(
					'post_type'      => 'attachment',
					'post_status'    => 'inherit',
					'post_mime_type' => 'image/svg+xml',
					'posts_per_page' => -1,
					'fields'         => 'ids',
				)
			);

			foreach ( $attachments as $attachment_id ) {
				++$summary['files'];
				$path  = get_attached_file( $attachment_id );
				$clean = self::sanitize_path( (string) $path );

				if ( is_wp_error( $clean ) ) {
					++$summary['errors'];
					\WP_CLI::warning( sprintf( 'Attachment %d: %s', $attachment_id, $clean->get_error_message() ) );
					continue;
				}

				// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Comparing a local media-library file.
				$original = file_get_contents( $path );

				if ( hash_equals( (string) $original, (string) $clean ) ) {
					continue;
				}

				++$summary['changed'];

				if ( $verbose ) {
					\WP_CLI::line(
						sprintf(
							'%s attachment %d on site %d: %s (%s)',
							$dry_run ? 'Would sanitize' : 'Sanitizing',
							(int) $attachment_id,
							(int) $site_id,
							get_the_title( $attachment_id ),
							(string) $path
						)
					);
				}

				// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents -- Updating a local attachment file after sanitization.
				if ( ! $dry_run && false === file_put_contents( $path, $clean, LOCK_EX ) ) {
					++$summary['errors'];
					\WP_CLI::warning( sprintf( 'Attachment %d: sanitized file could not be written.', $attachment_id ) );
				}
			}

			if ( is_multisite() ) {
				restore_current_blog();
			}
		}

		\WP_CLI::success( sprintf( '%s %d SVG files across %d sites; %d changed, %d errors.', $dry_run ? 'Dry run inspected' : 'Sanitized', $summary['files'], $summary['sites'], $summary['changed'], $summary['errors'] ) );
	}
}
