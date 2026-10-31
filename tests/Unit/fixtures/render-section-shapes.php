<?php
/** Render the real preset manager with isolated WordPress test shims. */
require dirname( __DIR__, 2 ) . '/bootstrap.php';
require dirname( __DIR__ ) . '/SectionFramePresetsTest.php';

function esc_attr( $value ) { return htmlspecialchars( (string) $value, ENT_QUOTES ); }
function esc_html( $value ) { return esc_attr( $value ); }
function esc_html__( $value, $domain ) { return esc_html( $value ); }
function esc_url( $value, $protocols = null ) { return esc_attr( $value ); }
function selected( $value, $expected ) { if ( $value === $expected ) { echo 'selected'; } }
function checked( $value ) { if ( $value ) { echo 'checked'; } }
function disabled( $value ) { if ( $value ) { echo 'disabled'; } }
function settings_errors( $option ) {}
function settings_fields( $group ) {}
function submit_button( $label ) { echo '<button type="submit">' . esc_html( $label ) . '</button>'; }

$GLOBALS['flexline_section_frame_test_options']['flexline_enable_group_frames'] = 1;
$GLOBALS['flexline_section_frame_test_mimes'][10] = 'image/svg+xml';
$GLOBALS['flexline_section_frame_test_options']['flexline_frame_presets'] = array(
	array( 'id' => 'saved_top', 'label' => 'Top', 'type' => 'frame', 'side' => 'top', 'attachment_id' => 10 ),
	array( 'id' => 'saved_mask', 'label' => 'Whole', 'type' => 'mask', 'side' => 'whole', 'attachment_id' => 10, 'fit' => 'fill' ),
);

require dirname( __DIR__, 3 ) . '/inc/theme-options/render-theme-frames.php';
flexline_render_frames_tab();
