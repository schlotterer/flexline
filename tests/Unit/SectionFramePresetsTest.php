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
	use FlexLine\Section_Shape_SVG_Source;
	use PHPUnit\Framework\TestCase;

	require_once dirname( __DIR__, 2 ) . '/inc/functions/class-section-shape-svg-source.php';
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

			Section_Shape_SVG_Source::reset_cache();
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
						'type'                => 'frame',
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
			self::assertStringContainsString( '0 section shape presets saved', $GLOBALS['flexline_section_frame_test_errors'][0]['message'] );
		}

		public function test_already_normalized_presets_are_idempotent(): void {
			$normalized = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'type'                => 'frame',
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

		public function test_explicit_section_shape_modes_override_retained_selections(): void {
			$attrs = array(
				'flexlineFrameTop'    => 'saved_top',
				'flexlineFrameBottom' => 'saved_bottom',
				'flexlineShapeMask'   => 'saved_mask',
			);

			foreach ( array( 'top', 'bottom', 'both', 'whole' ) as $mode ) {
				$attrs['flexlineFrameMode'] = $mode;
				self::assertSame( $mode, \FlexLine\flexline_normalize_section_shape_mode( $attrs ) );
			}
		}

		public function test_section_shape_mode_infers_selections_only_when_mode_is_absent(): void {
			self::assertSame( 'top', \FlexLine\flexline_normalize_section_shape_mode( array() ) );
			self::assertSame( 'bottom', \FlexLine\flexline_normalize_section_shape_mode( array( 'flexlineFrameBottom' => 'saved_bottom' ) ) );
			self::assertSame(
				'both',
				\FlexLine\flexline_normalize_section_shape_mode(
					array(
						'flexlineFrameTop'    => 'saved_top',
						'flexlineFrameBottom' => 'saved_bottom',
					)
				)
			);
			self::assertSame( 'whole', \FlexLine\flexline_normalize_section_shape_mode( array( 'flexlineShapeMask' => 'saved_mask' ) ) );
		}

		public function test_explicit_top_mode_restores_only_top_frame_and_overlap(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ] = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array( 'id' => 'saved_top', 'label' => 'Top', 'side' => 'top', 'attachment_id' => 10 ),
				array( 'id' => 'saved_bottom', 'label' => 'Bottom', 'side' => 'bottom', 'attachment_id' => 30 ),
			);
			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames'         => true,
					'flexlineFrameMode'         => 'top',
					'flexlineFrameTop'          => 'saved_top',
					'flexlineFrameBottom'       => 'saved_bottom',
					'flexlineShapeMask'         => 'saved_mask',
					'flexlineFrameOverlapTop'   => 'half',
					'flexlineFrameOverlapBottom' => 'full',
				)
			);
			self::assertSame( 'flexline-section-frame flexline-section-frame-top flexline-section-frame-overlap-top ', $result['classes'] );
			self::assertStringContainsString( '--flexline-frame-top-overlap:', $result['style'] );
			self::assertStringNotContainsString( '--flexline-frame-bottom-', $result['style'] );
			self::assertStringNotContainsString( '--flexline-shape-mask-', $result['style'] );
		}

		public function test_section_shape_mode_whole_outputs_mask_and_suppresses_frame_rendering(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300"><path d="M0 0H1200V300H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'type'                => 'frame',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'proportion',
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames' => true,
					'flexlineFrameMode' => 'whole',
					'flexlineFrameTop'  => 'saved_top',
					'flexlineShapeMask' => 'saved_mask',
				)
			);
			unlink( $file );

			self::assertStringContainsString( 'flexline-section-shape-mask', $result['classes'] );
			self::assertStringContainsString( 'flexline-section-shape-mask-proportion', $result['classes'] );
			self::assertStringNotContainsString( 'flexline-section-frame-top ', $result['classes'] );
			self::assertStringContainsString( '--flexline-shape-mask-image:', $result['style'] );
			self::assertStringContainsString( '--flexline-shape-mask-size: 100% 100%', $result['style'] );
			self::assertStringContainsString( '--flexline-shape-mask-aspect-ratio: 1200 / 300', $result['style'] );
			self::assertStringNotContainsString( '--flexline-frame-top-image:', $result['style'] );
		}

		public function test_section_shape_mode_whole_with_missing_mask_does_not_render_stale_frames(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'type'                => 'frame',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
			);

			$result = \FlexLine\flexline_get_section_frame_render_data(
				array(
					'flexlineUseFrames' => true,
					'flexlineFrameMode' => 'whole',
					'flexlineFrameTop'  => 'saved_top',
					'flexlineShapeMask' => 'missing_mask',
				)
			);

			self::assertSame(
				array(
					'classes' => '',
					'style'   => '',
				),
				$result
			);
		}

		public function test_sanitize_presets_normalizes_whole_section_rows(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'Logo Shape',
							'label'         => ' <strong>Logo shape</strong> ',
							'type'          => 'whole',
							'attachment_id' => '10',
							'fit'           => 'proportion',
						),
					),
				)
			);

			self::assertSame(
				array(
					array(
						'id'            => 'logoshape',
						'label'         => 'Logo shape',
						'type'          => 'mask',
						'side'          => 'whole',
						'attachment_id' => 10,
						'fit'           => 'proportion',
					),
				),
				$result
			);
		}

		public function test_sanitize_presets_defaults_whole_section_behavior(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'badge',
							'label'         => 'Badge',
							'type'          => 'whole',
							'attachment_id' => '10',
							'fit'           => 'bad-fit',
						),
					),
				)
			);

			self::assertSame( 'fill', $result[0]['fit'] );
			self::assertArrayNotHasKey( 'position', $result[0] );
		}

		public function test_whole_section_shape_rows_are_idempotent(): void {
			$normalized = array(
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'fill',
				),
			);

			self::assertSame( $normalized, Section_Frame_Presets::sanitize_presets( $normalized ) );
			self::assertSame( array(), $GLOBALS['flexline_section_frame_test_errors'] );
		}

		public function test_invalid_whole_section_svg_preserves_saved_presets_and_reports_error(): void {
			$saved = array(
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'fill',
				),
			);
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = $saved;

			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'bad_image',
							'label'         => 'Bad image',
							'type'          => 'whole',
							'attachment_id' => 20,
							'fit'           => 'fill',
						),
					),
				)
			);

			self::assertSame( $saved, $result );
			self::assertSame( 'flexline_frame_presets', $GLOBALS['flexline_section_frame_test_errors'][0]['setting'] );
			self::assertStringContainsString( 'must use an SVG', $GLOBALS['flexline_section_frame_test_errors'][0]['message'] );
		}

		public function test_whole_section_duplicate_or_missing_ids_are_replaced_with_unique_ids(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'            => 'shared_id',
							'label'         => 'First',
							'type'          => 'whole',
							'attachment_id' => 10,
						),
						array(
							'id'            => 'shared_id',
							'label'         => 'Second',
							'type'          => 'whole',
							'attachment_id' => 30,
						),
						array(
							'label'         => 'Third',
							'type'          => 'whole',
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

		public function test_whole_section_sanitize_presets_resolves_attachment_url_and_label_fallback(): void {
			$result = Section_Frame_Presets::sanitize_presets(
				array(
					'items' => array(
						array(
							'id'             => '',
							'label'          => '',
							'type'           => 'whole',
							'attachment_id'  => '',
							'attachment_url' => 'https://example.test/uploads/top.svg',
							'fit'            => 'cover',
						),
					),
				)
			);

			self::assertCount( 1, $result );
			self::assertSame( 'Saved top', $result[0]['label'] );
			self::assertSame( 10, $result[0]['attachment_id'] );
			self::assertSame( 'mask', $result[0]['type'] );
			self::assertSame( 'whole', $result[0]['side'] );
			self::assertSame( 'fill', $result[0]['fit'] );
			self::assertArrayNotHasKey( 'position', $result[0] );
			self::assertNotSame( '', $result[0]['id'] );
		}

		public function test_whole_section_resolve_preset_for_render_outputs_css_values(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300"><path d="M0 0H1200V300H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'proportion',
				),
			);

			$preset = Section_Frame_Presets::resolve_shape_mask_preset_for_render( 'saved_mask' );
			unlink( $file );

			self::assertNotNull( $preset );
			self::assertSame( 'proportion', $preset['fit'] );
			self::assertSame( '100% 100%', $preset['css_size'] );
			self::assertSame( '1200 / 300', $preset['aspect_ratio'] );
			self::assertStringStartsWith( 'data:image/svg+xml;charset=UTF-8,', $preset['url'] );
		}

		public function test_editor_configs_filter_unified_shape_presets_by_type(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300"><path d="M0 0H1200V300H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::ENABLE_OPTION ]  = 1;
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'                  => 'saved_top',
					'label'               => 'Saved top',
					'type'                => 'frame',
					'side'                => 'top',
					'attachment_id'       => 10,
					'height_min'          => 56.0,
					'height_preferred_vw' => 7.0,
					'height_max'          => 112.0,
				),
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'proportion',
				),
			);

			$frame_config = Section_Frame_Presets::get_editor_config();
			$mask_config  = Section_Frame_Presets::get_shape_mask_editor_config();
			unlink( $file );

			self::assertCount( 1, $frame_config['presets'] );
			self::assertSame( 'saved_top', $frame_config['presets'][0]['id'] );
			self::assertCount( 1, $mask_config['presets'] );
			self::assertSame( 'saved_mask', $mask_config['presets'][0]['id'] );
			self::assertSame( '100% 100%', $mask_config['presets'][0]['css_size'] );
			self::assertSame( '1200 / 300', $mask_config['presets'][0]['aspect_ratio'] );
		}

		public function test_already_normalized_shape_sources_remain_renderable(): void {
			foreach ( array( 'fill' => 'none', 'proportion' => 'xMidYMid meet' ) as $fit => $policy ) {
				$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
				$svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300" preserveAspectRatio="' . $policy . '"><path d="M0 0H1200V300H0Z"/></svg>';
				file_put_contents( $file, $svg );
				$GLOBALS['flexline_section_frame_test_files'][10] = $file;
				Section_Shape_SVG_Source::reset_cache();
				try {
					$source = Section_Shape_SVG_Source::get_shape_mask_source( 10, $fit );
					self::assertSame( 'data:image/svg+xml;charset=UTF-8,' . rawurlencode( $svg ), $source );
					self::assertSame( $source, Section_Shape_SVG_Source::get_shape_mask_source( 10, $fit ) );
					self::assertSame( $svg, file_get_contents( $file ) );
				} finally {
					unlink( $file );
				}
			}
		}

		public function test_viewbox_quote_styles_produce_equivalent_sources_and_ratios(): void {
			foreach ( array( '"', "'" ) as $quote ) {
				$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
				file_put_contents( $file, '<svg xmlns="http://www.w3.org/2000/svg" viewBox=' . $quote . '0 0 1200 300' . $quote . '><path d="M0 0H1200V300H0Z"/></svg>' );
				$GLOBALS['flexline_section_frame_test_files'][10] = $file;
				Section_Shape_SVG_Source::reset_cache();
				try {
					self::assertSame( '1200 / 300', Section_Shape_SVG_Source::get_viewbox_aspect_ratio( 10 ) );
					$source = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' );
					self::assertStringStartsWith( 'data:image/svg+xml;charset=UTF-8,', $source );
					self::assertStringContainsString( 'preserveAspectRatio="xMidYMid meet"', rawurldecode( $source ) );
				} finally {
					unlink( $file );
				}
			}
		}

		public function test_failed_source_and_ratio_lookups_are_cached_per_request(): void {
			for ( $attempt = 0; $attempt < 2; $attempt++ ) {
				self::assertSame( '', Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' ) );
				self::assertSame( '', Section_Shape_SVG_Source::get_viewbox_aspect_ratio( 10 ) );
			}
			self::assertSame( 2, $GLOBALS['flexline_section_frame_test_file_reads'][10] );
		}

		public function test_failed_proportional_normalization_does_not_block_fill_policy(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			file_put_contents( $file, '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 300"><path d="M0 0H1200V300H0Z"/></svg>' );
			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			try {
				self::assertSame( '', Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' ) );
				self::assertSame( '', Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' ) );
				self::assertSame( 1, $GLOBALS['flexline_section_frame_test_file_reads'][10] );
				self::assertStringStartsWith( 'data:image/svg+xml;', Section_Shape_SVG_Source::get_shape_mask_source( 10, 'fill' ) );
			} finally {
				unlink( $file );
			}
		}

		public function test_shape_source_read_limit_and_frame_url_fallback(): void {
			foreach ( array( 262144, 262145 ) as $bytes ) {
				$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
				$svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300"><path d="M0 0H1200V300H0Z"/></svg>';
				file_put_contents( $file, str_pad( $svg, $bytes ) );
				$GLOBALS['flexline_section_frame_test_files'][10] = $file;
				$GLOBALS['flexline_section_frame_test_file_reads'][10] = 0;
				Section_Shape_SVG_Source::reset_cache();
				try {
					$source = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'fill' );
					self::assertSame( $source, Section_Shape_SVG_Source::get_shape_mask_source( 10, 'fill' ) );
					self::assertSame( 1, $GLOBALS['flexline_section_frame_test_file_reads'][10] );
					if ( 262144 === $bytes ) {
						self::assertStringStartsWith( 'data:image/svg+xml;', $source );
					} else {
						self::assertSame( '', $source );
						self::assertSame( 'https://example.test/uploads/top.svg', Section_Shape_SVG_Source::get_frame_source( 10 ) );
					}
				} finally {
					unlink( $file );
				}
			}
		}

		public function test_shape_mask_preserving_source_removes_conflicting_svg_metadata(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="300" viewBox="0 0 300 1200" preserveAspectRatio="none"><path d="M0 0H300V1200H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$source = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' );
			unlink( $file );

			$decoded = rawurldecode( $source );
			self::assertStringStartsWith( 'data:image/svg+xml;charset=UTF-8,', $source );
			self::assertStringContainsString( 'viewBox="0 0 300 1200"', $decoded );
			self::assertStringContainsString( 'preserveAspectRatio="xMidYMid meet"', $decoded );
			self::assertStringNotContainsString( 'width="1200"', $decoded );
			self::assertStringNotContainsString( 'height="300"', $decoded );
			self::assertStringNotContainsString( 'preserveAspectRatio="none"', $decoded );
		}

		public function test_shape_mask_preserving_source_requires_usable_viewbox(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="300"><path d="M0 0H1200V300H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;
			$source = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' );
			unlink( $file );

			self::assertSame( '', $source );
		}

		public function test_shape_mask_source_does_not_use_frame_url_fallback(): void {
			self::assertSame( 'https://example.test/uploads/top.svg', Section_Frame_Presets::get_svg_frame_source( 10 ) );
			self::assertSame( '', Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' ) );
		}

		public function test_svg_source_cache_is_scoped_by_policy(): void {
			$file = tempnam( sys_get_temp_dir(), 'flexline-mask' );
			self::assertIsString( $file );
			file_put_contents(
				$file,
				'<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="300" viewBox="0 0 1200 300"><path d="M0 0H1200V300H0Z"/></svg>'
			);

			$GLOBALS['flexline_section_frame_test_files'][10] = $file;

			$frame_source      = Section_Frame_Presets::get_svg_frame_source( 10 );
			$shape_mask_source = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' );
			$shape_mask_again  = Section_Shape_SVG_Source::get_shape_mask_source( 10, 'proportion' );
			unlink( $file );

			self::assertStringContainsString( 'preserveAspectRatio="none"', rawurldecode( $frame_source ) );
			self::assertStringContainsString( 'preserveAspectRatio="xMidYMid meet"', rawurldecode( $shape_mask_source ) );
			self::assertSame( $shape_mask_source, $shape_mask_again );
			self::assertSame( 2, $GLOBALS['flexline_section_frame_test_file_reads'][10] );
		}

		public function test_shape_mask_editor_config_uses_global_section_shapes_switch(): void {
			$GLOBALS['flexline_section_frame_test_options'][ Section_Frame_Presets::PRESETS_OPTION ] = array(
				array(
					'id'            => 'saved_mask',
					'label'         => 'Saved mask',
					'type'          => 'mask',
					'side'          => 'whole',
					'attachment_id' => 10,
					'fit'           => 'fill',
				),
			);

			self::assertSame(
				array(
					'enabled' => false,
					'presets' => array(),
				),
				Section_Frame_Presets::get_shape_mask_editor_config()
			);
		}
	}
}
