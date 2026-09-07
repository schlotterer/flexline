<?php
declare(strict_types=1);

namespace {
	$GLOBALS['flexline_section_frame_test_options'] = array();
	$GLOBALS['flexline_section_frame_test_mimes']   = array();
	$GLOBALS['flexline_section_frame_test_urls']    = array();
	$GLOBALS['flexline_section_frame_test_files']   = array();
	$GLOBALS['flexline_section_frame_test_file_reads'] = array();
	$GLOBALS['flexline_section_frame_test_titles']  = array();
	$GLOBALS['flexline_section_frame_test_errors']  = array();
	$GLOBALS['flexline_section_frame_test_uuid']    = 0;

	function get_option( $option, $default = false ) {
		return array_key_exists( $option, $GLOBALS['flexline_section_frame_test_options'] )
			? $GLOBALS['flexline_section_frame_test_options'][ $option ]
			: $default;
	}

	function get_post_mime_type( $attachment_id ) {
		return $GLOBALS['flexline_section_frame_test_mimes'][ (int) $attachment_id ] ?? '';
	}

	function wp_get_attachment_url( $attachment_id ) {
		return $GLOBALS['flexline_section_frame_test_urls'][ (int) $attachment_id ] ?? false;
	}

	function get_attached_file( $attachment_id ) {
		$attachment_id = (int) $attachment_id;
		$GLOBALS['flexline_section_frame_test_file_reads'][ $attachment_id ] = ( $GLOBALS['flexline_section_frame_test_file_reads'][ $attachment_id ] ?? 0 ) + 1;

		return $GLOBALS['flexline_section_frame_test_files'][ (int) $attachment_id ] ?? '';
	}

	function attachment_url_to_postid( $url ): int {
		$id = array_search( $url, $GLOBALS['flexline_section_frame_test_urls'], true );
		return false === $id ? 0 : (int) $id;
	}

	function get_the_title( $post_id ): string {
		return $GLOBALS['flexline_section_frame_test_titles'][ (int) $post_id ] ?? '';
	}

	function wp_parse_url( $url, $component = -1 ) {
		return parse_url( $url, $component );
	}

	function absint( $value ): int {
		return abs( (int) $value );
	}

	function sanitize_key( $key ): string {
		$key = strtolower( (string) $key );
		return preg_replace( '/[^a-z0-9_-]/', '', $key );
	}

	function sanitize_text_field( $value ): string {
		return trim( strip_tags( (string) $value ) );
	}

	function wp_generate_uuid4(): string {
		$GLOBALS['flexline_section_frame_test_uuid']++;
		return '00000000-0000-4000-8000-' . str_pad( (string) $GLOBALS['flexline_section_frame_test_uuid'], 12, '0', STR_PAD_LEFT );
	}

	function add_settings_error( $setting, $code, $message, $type = 'error' ): void {
		$GLOBALS['flexline_section_frame_test_errors'][] = compact( 'setting', 'code', 'message', 'type' );
	}

	function add_filter(): void {}

	function add_action(): void {}

	function wp_allowed_protocols(): array {
		return array( 'http', 'https' );
	}

	function esc_url_raw( $url, $protocols = null ): string {
		return (string) $url;
	}
}

namespace FlexLine\Tests\Unit {
	use FlexLine\Section_Frame_Presets;
	use PHPUnit\Framework\TestCase;

	require_once dirname( __DIR__, 2 ) . '/inc/functions/class-section-frame-presets.php';
	require_once dirname( __DIR__, 2 ) . '/inc/blocks/block-extensions.php';

	final class SectionFramePresetsTest extends TestCase {

		protected function setUp(): void {
			$GLOBALS['flexline_section_frame_test_options'] = array();
			$GLOBALS['flexline_section_frame_test_mimes']   = array(
				10 => 'image/svg+xml',
				20 => 'image/png',
				30 => 'image/svg+xml',
			);
			$GLOBALS['flexline_section_frame_test_urls']    = array(
				10 => 'https://example.test/uploads/top.svg',
				20 => 'https://example.test/uploads/not-svg.png',
				30 => 'https://example.test/uploads/bottom.svg',
			);
			$GLOBALS['flexline_section_frame_test_titles']  = array(
				10 => 'Saved top',
				30 => 'Saved bottom',
			);
			$GLOBALS['flexline_section_frame_test_files']      = array();
			$GLOBALS['flexline_section_frame_test_file_reads'] = array();
			$GLOBALS['flexline_section_frame_test_errors']     = array();
			$GLOBALS['flexline_section_frame_test_uuid']       = 0;

			$cache = new \ReflectionProperty( Section_Frame_Presets::class, 'normalized_svg_data_uri_cache' );
			$cache->setAccessible( true );
			$cache->setValue( null, array() );
		}

		public function test_sanitize_enabled_returns_integer_flag(): void {
			self::assertSame( 1, Section_Frame_Presets::sanitize_enabled( '1' ) );
			self::assertSame( 0, Section_Frame_Presets::sanitize_enabled( 'true' ) );
			self::assertSame( 0, Section_Frame_Presets::sanitize_enabled( 0 ) );
		}

		public function test_sanitize_presets_normalizes_valid_rows(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'                   => 'Gentle Top',
							'label'                => ' <strong>Gentle top</strong> ',
							'side'                 => 'top',
							'attachment_id'        => '10',
							'height_min'           => '56',
							'height_preferred_vw'  => '7.5',
							'height_max'           => '112',
						),
					),
				)
			);

			self::assertSame(
				array(
					array(
						'id'                  => 'gentletop',
						'label'               => 'Gentle top',
						'side'                => 'top',
						'attachment_id'       => 10,
						'height_min'          => 56.0,
						'height_preferred_vw' => 7.5,
						'height_max'          => 112.0,
					),
				),
				$result
			);
		}

		public function test_missing_input_preserves_saved_presets(): void {
			$saved = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = $saved;

			self::assertSame( $saved, Section_Frame_Presets::sanitize_presets( null ) );
		}

		public function test_submitted_empty_manager_clears_saved_presets(): void {
			$saved = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = $saved;

			self::assertSame( array(), Section_Frame_Presets::sanitize_presets( array( '_submitted' => '1' ) ) );
			self::assertSame( 'flexline_frame_presets', $GLOBALS['flexline_section_frame_test_errors'][0]['setting'] );
			self::assertSame( 'updated', $GLOBALS['flexline_section_frame_test_errors'][0]['type'] );
			self::assertStringContainsString( '0 frame shape presets saved', $GLOBALS['flexline_section_frame_test_errors'][0]['message'] );
		}

		public function test_already_normalized_presets_are_idempotent(): void {
			$normalized = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			self::assertSame( $normalized, Section_Frame_Presets::sanitize_presets( $normalized ) );
			self::assertSame( array(), $GLOBALS['flexline_section_frame_test_errors'] );
		}

		public function test_submitted_blank_row_clears_presets(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			self::assertSame(
				array(),
				Section_Frame_Presets::sanitize_presets(
					array(
						'items' => array(
							array(
								'id'                  => '',
								'label'               => '',
								'side'                => 'top',
								'attachment_id'       => '',
								'height_min'          => 56,
								'height_preferred_vw' => 7,
								'height_max'          => 112,
							),
						),
					)
				)
			);
		}

		public function test_invalid_svg_preserves_saved_presets_and_reports_error(): void {
			$saved = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = $saved;

			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'bad_image',
							'label'         => 'Bad image',
							'side'          => 'bottom',
							'attachment_id' => 20,
						),
					),
				)
			);

			self::assertSame( $saved, $result );
			self::assertSame( 'flexline_frame_presets', $GLOBALS['flexline_section_frame_test_errors'][0]['setting'] );
			self::assertStringContainsString( 'must use an SVG', $GLOBALS['flexline_section_frame_test_errors'][0]['message'] );
		}

		public function test_invalid_height_range_preserves_saved_presets(): void {
			$saved = array(
				array(
					'id'                  => 'saved_bottom',
					'label'               => 'Saved bottom',
					'side'                => 'bottom',
					'attachment_id'       => 30,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = $saved;

			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'                  => 'bad_height',
							'label'               => 'Bad height',
							'side'                => 'top',
							'attachment_id'       => 10,
							'height_min'          => 120,
							'height_preferred_vw' => 7,
							'height_max'          => 80,
						),
					),
				)
			);

			self::assertSame( $saved, $result );
			self::assertStringContainsString( 'minimum height', $GLOBALS['flexline_section_frame_test_errors'][0]['message'] );
		}

		public function test_duplicate_or_missing_ids_are_replaced_with_unique_ids(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'shared_id',
							'label'         => 'First',
							'side'          => 'top',
							'attachment_id' => 10,
						),
						array(
							'id'            => 'shared_id',
							'label'         => 'Second',
							'side'          => 'bottom',
							'attachment_id' => 30,
						),
						array(
							'label'         => 'Third',
							'side'          => 'top',
							'attachment_id' => 10,
						),
					),
				)
			);

			self::assertSame( 'shared_id', $result[0]['id'] );
			self::assertNotSame( 'shared_id', $result[1]['id'] );
			self::assertNotSame( '', $result[2]['id'] );
			self::assertCount( 3, array_unique( array_column( $result, 'id' ) ) );
		}

		public function test_sanitize_presets_resolves_attachment_url_and_label_fallback(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'                  => '',
							'label'               => '',
							'side'                => 'top',
							'attachment_id'       => '',
							'attachment_url'      => 'https://example.test/uploads/top.svg',
							'height_min'          => 56,
							'height_preferred_vw' => 7,
							'height_max'          => 112,
						),
					),
				)
			);

			self::assertCount( 1, $result );
			self::assertSame( 'Saved top', $result[0]['label'] );
			self::assertSame( 10, $result[0]['attachment_id'] );
			self::assertSame( 'top', $result[0]['side'] );
			self::assertNotSame( '', $result[0]['id'] );
		}

		public function test_resolve_preset_requires_matching_side_and_svg_attachment(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'                  => 'saved_bottom',
					'label'               => 'Saved bottom',
					'side'                => 'bottom',
					'attachment_id'       => 20,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			self::assertSame( 'Saved top', Section_Frame_Presets::resolve_preset( 'saved_top', 'top' )['label'] );
			self::assertNull( Section_Frame_Presets::resolve_preset( 'saved_top', 'bottom' ) );
			self::assertNull( Section_Frame_Presets::resolve_preset( 'saved_bottom', 'bottom' ) );
		}

		public function test_resolve_preset_for_render_includes_url_and_css_height(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.25,
					'height_max'          => 112.0,
				),
			);

			$preset = Section_Frame_Presets::resolve_preset_for_render( 'saved_top', 'top' );

			self::assertSame( 'https://example.test/uploads/top.svg', $preset['url'] );
			self::assertSame( 'clamp(56px, 7.25vw, 112px)', $preset['height'] );
		}

		public function test_resolve_preset_for_render_normalizes_svg_source_when_file_is_readable(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-frame' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"><path d="M0 40H1440V160H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.25,
					'height_max'          => 112.0,
				),
			);

			$preset = Section_Frame_Presets::resolve_preset_for_render( 'saved_top', 'top' );
			unlink( $file );

			self::assertStringStartsWith( 'data:image/svg+xml;charset=UTF-8,', $preset['url'] );
			self::assertStringContainsString( 'preserveAspectRatio="none"', rawurldecode( $preset['url'] ) );
			self::assertSame( 'clamp(56px, 7.25vw, 112px)', $preset['height'] );
		}

		public function test_normalized_svg_source_is_cached_during_request(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-frame' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"><path d="M0 40H1440V160H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][30] = $file;

			$first  = Section_Frame_Presets::get_svg_frame_source( 30 );
			$second = Section_Frame_Presets::get_svg_frame_source( 30 );
			unlink( $file );

			self::assertSame( $first, $second );
			self::assertStringStartsWith( 'data:image/svg+xml;charset=UTF-8,', $first );
			self::assertSame( 1, $GLOBALS['flexline_section_frame_test_file_reads'][30] );
		}

		public function test_editor_config_is_disabled_without_presets_by_default(): void {
			self::assertSame(
				array(
					'enabled' => false,
					'presets' => array(),
				),
				Section_Frame_Presets::get_editor_config()
			);
		}

		public function test_editor_config_includes_only_renderable_presets_when_enabled(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.25,
					'height_max'          => 112.0,
				),
				array(
					'id'                  => 'bad_bottom',
					'label'               => 'Bad bottom',
					'side'                => 'bottom',
					'attachment_id'       => 20,
					'height_min'          => 40.0,
					'height_preferred_vw' => 5.0,
					'height_max'          => 80.0,
				),
			);

			$config = Section_Frame_Presets::get_editor_config();

			self::assertTrue( $config['enabled'] );
			self::assertCount( 1, $config['presets'] );
			self::assertSame( 'saved_top', $config['presets'][0]['id'] );
			self::assertSame( 'top', $config['presets'][0]['side'] );
			self::assertSame( 'https://example.test/uploads/top.svg', $config['presets'][0]['url'] );
			self::assertSame( 'clamp(56px, 7.25vw, 112px)', $config['presets'][0]['height'] );
		}

		public function test_section_frame_render_data_requires_global_and_block_toggles(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			self::assertSame(
				array(
					'classes' => '',
					'style'   => '',
				),
				\FlexLine\flexline_get_section_frame_render_data(
					array(
						'flexlineUseFrames' => true,
						'flexlineFrameTop'  => 'saved_top',
					)
				)
			);

			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ] = 1;

			self::assertSame(
				array(
					'classes' => '',
					'style'   => '',
				),
				\FlexLine\flexline_get_section_frame_render_data(
					array(
						'flexlineUseFrames' => false,
						'flexlineFrameTop'  => 'saved_top',
					)
				)
			);
		}

		public function test_section_frame_render_data_outputs_classes_and_css_vars(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'                  => 'saved_bottom',
					'label'               => 'Saved bottom',
					'side'                => 'bottom',
					'attachment_id'       => 30,
					'height_min'          => 40.0,
					'height_preferred_vw' => 5.5,
					'height_max'          => 90.0,
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames'  => true,
					'flexlineFrameTop'   => 'saved_top',
					'flexlineFrameBottom' => 'saved_bottom',
				)
			);

			self::assertSame( 'flexline-section-frame flexline-section-frame-top flexline-section-frame-bottom ', $result['classes'] );
			self::assertStringContainsString( '--flexline-frame-top-image: url("https://example.test/uploads/top.svg")', $result['style'] );
			self::assertStringContainsString( '--flexline-frame-top-height: clamp(56px, 7vw, 112px)', $result['style'] );
			self::assertStringContainsString( '--flexline-frame-bottom-image: url("https://example.test/uploads/bottom.svg")', $result['style'] );
			self::assertStringContainsString( '--flexline-frame-bottom-height: clamp(40px, 5.5vw, 90px)', $result['style'] );
		}

		public function test_section_frame_overlap_outputs_margin_vars_without_content_shift(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'                  => 'saved_bottom',
					'label'               => 'Saved bottom',
					'side'                => 'bottom',
					'attachment_id'       => 30,
					'height_min'          => 40.0,
					'height_preferred_vw' => 5.5,
					'height_max'          => 90.0,
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames'         => true,
					'flexlineFrameTop'          => 'saved_top',
					'flexlineFrameBottom'       => 'saved_bottom',
					'flexlineFrameOverlapTop'   => 'half',
					'flexlineFrameOverlapBottom' => 'full',
				)
			);

			self::assertStringContainsString( 'flexline-section-frame-overlap-top', $result['classes'] );
			self::assertStringContainsString( 'flexline-section-frame-overlap-bottom', $result['classes'] );
			self::assertStringContainsString( '--flexline-frame-top-overlap: calc(var(--flexline-frame-top-height) * -0.5)', $result['style'] );
			self::assertStringContainsString( '--flexline-frame-bottom-overlap: calc(var(--flexline-frame-bottom-height) * -1)', $result['style'] );
		}

		public function test_section_frame_overlap_only_yields_to_active_content_shift_edge(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'                  => 'saved_bottom',
					'label'               => 'Saved bottom',
					'side'                => 'bottom',
					'attachment_id'       => 30,
					'height_min'          => 40.0,
					'height_preferred_vw' => 5.5,
					'height_max'          => 90.0,
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames'         => true,
					'flexlineFrameTop'          => 'saved_top',
					'flexlineFrameBottom'       => 'saved_bottom',
					'flexlineFrameOverlapTop'   => 'half',
					'flexlineFrameOverlapBottom' => 'full',
					'useContentShift'           => true,
					'shiftUp'                   => '',
					'shiftDown'                 => '0px',
				)
			);

			self::assertStringContainsString( 'flexline-section-frame-overlap-top', $result['classes'] );
			self::assertStringNotContainsString( 'flexline-section-frame-overlap-bottom ', $result['classes'] );
			self::assertStringContainsString( '--flexline-frame-top-overlap:', $result['style'] );
			self::assertStringNotContainsString( '--flexline-frame-bottom-overlap:', $result['style'] );
		}

		public function test_section_frame_overlap_resumes_on_mobile_when_content_shift_resets(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames'       => true,
					'flexlineFrameTop'        => 'saved_top',
					'flexlineFrameOverlapTop' => 'full',
					'useContentShift'         => true,
					'shiftUp'                 => '0px',
					'resetMobile'             => true,
				)
			);

			self::assertStringContainsString( 'flexline-section-frame-overlap-top-mobile', $result['classes'] );
			self::assertStringContainsString( '--flexline-frame-top-overlap: calc(var(--flexline-frame-top-height) * -1)', $result['style'] );
		}

		public function test_section_frame_render_data_suspends_flex_and_grid_layouts(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			self::assertSame(
				array(
					'classes' => '',
					'style'   => '',
				),
				\FlexLine\flexline_get_section_frame_render_data(
					array(
						'flexlineUseFrames' => true,
						'flexlineFrameTop'  => 'saved_top',
						'layout'            => array( 'type' => 'flex' ),
					)
				)
			);

			self::assertSame(
				array(
					'classes' => '',
					'style'   => '',
				),
				\FlexLine\flexline_get_section_frame_render_data(
					array(
						'flexlineUseFrames' => true,
						'flexlineFrameTop'  => 'saved_top',
						'layout'            => array( 'type' => 'grid' ),
					)
				)
			);
		}
	}
}
