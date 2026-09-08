<?php
/**
 * Render the Section Shapes theme options tab.
 *
 * @package flexline
 */

use FlexLine\Section_Frame_Presets;
use FlexLine\Section_Shape_SVG_Source;

/**
 * Render one Section Shape preset manager row.
 *
 * @param array $preset      Preset data.
 * @param mixed $index       Row index or template placeholder.
 * @param bool  $is_template Whether this row is used as the JS template.
 * @return void
 */
function flexline_render_frame_preset_row( array $preset, $index, bool $is_template = false ) {
	$row_attributes = $is_template
		? ' data-frame-preset-row hidden'
		: ' data-frame-preset-row';

	$preset_type      = (string) ( $preset['type'] ?? 'frame' );
	$preset_side      = (string) ( $preset['side'] ?? 'top' );
	$row_type         = 'mask' === $preset_type || 'whole' === $preset_side ? 'whole' : $preset_side;
	$attachment_id    = isset( $preset['attachment_id'] ) ? (int) $preset['attachment_id'] : 0;
	$attachment_label = '';
	$attachment_url   = '';
	$preview_url      = '';
	$fit              = Section_Frame_Presets::normalize_fit( $preset['fit'] ?? 'fill' );

	if ( $attachment_id > 0 ) {
		$title            = get_the_title( $attachment_id );
		$attachment_url   = wp_get_attachment_url( $attachment_id );
		$attachment_label = $title ? $title : basename( (string) $attachment_url );

		if ( 'whole' === $row_type && class_exists( Section_Shape_SVG_Source::class ) ) {
			$preview_url = Section_Shape_SVG_Source::get_shape_mask_source( $attachment_id, $fit );
		} else {
			$preview_url = Section_Frame_Presets::get_svg_frame_source( $attachment_id );
		}
	}
	?>
	<tr<?php echo $row_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<td>
			<input
				type="hidden"
				data-frame-field="id"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][id]"
				value="<?php echo esc_attr( $preset['id'] ?? '' ); ?>"
			/>
			<input
				type="text"
				class="regular-text"
				data-frame-field="label"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][label]"
				value="<?php echo esc_attr( $preset['label'] ?? '' ); ?>"
				placeholder="Gentle wave"
			/>
		</td>
		<td>
			<select
				data-frame-field="type"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][type]"
			>
				<option value="top" <?php selected( $row_type, 'top' ); ?>>Top frame</option>
				<option value="bottom" <?php selected( $row_type, 'bottom' ); ?>>Bottom frame</option>
				<option value="whole" <?php selected( $row_type, 'whole' ); ?>>Whole section</option>
			</select>
		</td>
		<td>
			<input
				type="hidden"
				data-frame-field="attachment_id"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][attachment_id]"
				value="<?php echo esc_attr( $attachment_id ); ?>"
			/>
			<input
				type="hidden"
				data-frame-field="attachment_url"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][attachment_url]"
				value="<?php echo esc_url( $attachment_url ); ?>"
			/>
			<div class="flexline-frame-svg-preview" data-frame-svg-preview>
				<?php if ( '' !== $preview_url ) : ?>
					<img src="<?php echo esc_url( $preview_url, array_merge( wp_allowed_protocols(), array( 'data' ) ) ); ?>" alt="" loading="lazy" />
				<?php endif; ?>
			</div>
			<p class="flexline-frame-svg-actions">
				<button type="button" class="button" data-frame-choose-svg>Choose SVG</button>
				<span data-frame-attachment-label>
					<?php echo $attachment_label ? esc_html( $attachment_label ) : esc_html__( 'No SVG selected', 'flexline' ); ?>
				</span>
			</p>
		</td>
		<td data-frame-panel="height">
			<label>
				<span class="screen-reader-text">Minimum frame height in pixels</span>
				<input
					type="number"
					min="1"
					step="1"
					class="small-text"
					data-frame-field="height_min"
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_min]"
					value="<?php echo esc_attr( $preset['height_min'] ?? 56 ); ?>"
				/>
				px
			</label>
		</td>
		<td data-frame-panel="height">
			<label>
				<span class="screen-reader-text">Preferred frame height in viewport width units</span>
				<input
					type="number"
					min="0.1"
					step="0.1"
					class="small-text"
					data-frame-field="height_preferred_vw"
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_preferred_vw]"
					value="<?php echo esc_attr( $preset['height_preferred_vw'] ?? 7 ); ?>"
				/>
				vw
			</label>
		</td>
		<td data-frame-panel="height">
			<label>
				<span class="screen-reader-text">Maximum frame height in pixels</span>
				<input
					type="number"
					min="1"
					step="1"
					class="small-text"
					data-frame-field="height_max"
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_max]"
					value="<?php echo esc_attr( $preset['height_max'] ?? 112 ); ?>"
				/>
				px
			</label>
		</td>
		<td data-frame-panel="mask">
			<select
				data-frame-field="fit"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][fit]"
			>
				<option value="fill" <?php selected( $fit, 'fill' ); ?>>Shape fills group</option>
				<option value="proportion" <?php selected( $fit, 'proportion' ); ?>>Group fits SVG proportion</option>
			</select>
		</td>
		<td>
			<button type="button" class="button" data-frame-move-up aria-label="Move section shape up">Up</button>
			<button type="button" class="button" data-frame-move-down aria-label="Move section shape down">Down</button>
			<button type="button" class="button-link-delete" data-frame-remove>Remove</button>
		</td>
	</tr>
	<?php
}

/**
 * Render the Section Shapes options tab.
 *
 * @return void
 */
function flexline_render_frames_tab() {
	$is_enabled    = Section_Frame_Presets::is_enabled();
	$shape_presets = Section_Frame_Presets::get_presets();
	?>
	<h2>Section Shapes</h2>
	<p>Section Shapes use reusable SVG presets to clip Group sections. Choose Top frame or Bottom frame for edge shapes, or Whole section for a full Group mask. Presets and block selections are retained while this feature is disabled.</p>

	<?php settings_errors( Section_Frame_Presets::ENABLE_OPTION ); ?>
	<?php settings_errors( Section_Frame_Presets::PRESETS_OPTION ); ?>

	<form method="post" action="options.php" id="flexline-section-frames-form">
		<?php settings_fields( Section_Frame_Presets::SETTINGS_GROUP ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="flexline-enable-group-frames"><strong>Enable Section Shapes</strong></label>
					<p>Shows Section Shape controls for Group blocks and allows saved shapes to render on the front end.</p>
				</th>
				<td>
					<input
						id="flexline-enable-group-frames"
						type="checkbox"
						name="<?php echo esc_attr( Section_Frame_Presets::ENABLE_OPTION ); ?>"
						value="1"
						<?php checked( $is_enabled ); ?>
					/>
				</td>
			</tr>
		</table>

		<?php if ( ! $is_enabled ) : ?>
			<p><strong>Section Shape presets are hidden while Section Shapes are disabled.</strong></p>
			<p>Re-enable Section Shapes to add or edit presets. Existing shape presets remain saved.</p>
		<?php else : ?>
			<h2>Section Shape Presets</h2>
			<p>Create reusable Media Library SVG shapes. Top and bottom frame types use height settings; whole-section types choose whether the shape fills the Group or the Group fits the SVG proportion.</p>
			<div class="flexline-frame-guidance">
				<div>
					<h3>SVG setup</h3>
					<ul>
						<li>Use a transparent background; opaque pixels are the visible part of the section.</li>
						<li>Top frame SVGs should be opaque below the shape and transparent above it.</li>
						<li>Bottom frame SVGs should be opaque above the shape and transparent below it.</li>
						<li>Whole-section SVGs should include the entire mask shape inside a clean viewBox.</li>
						<li>In Affinity, keep Set view box enabled and enter a valid Raster DPI, such as 300, so the SVG export can be saved.</li>
						<li>Frames stretch automatically; whole-section shapes either fill the Group or set the Group aspect ratio from the SVG viewBox.</li>
					</ul>
				</div>
				<div class="flexline-frame-examples" aria-label="Section Shape SVG examples">
					<figure>
						<svg viewBox="0 0 144 48" role="img" aria-label="Top frame SVG example">
							<path d="M0 18 C24 6 48 30 72 18 S120 6 144 18 L144 48 L0 48 Z" />
						</svg>
						<figcaption>Top frame: fill below the line</figcaption>
					</figure>
					<figure>
						<svg viewBox="0 0 144 48" role="img" aria-label="Bottom frame SVG example">
							<path d="M0 0 H144 V30 C120 42 96 18 72 30 S24 42 0 30 Z" />
						</svg>
						<figcaption>Bottom frame: fill above the line</figcaption>
					</figure>
					<figure>
						<svg viewBox="0 0 144 72" role="img" aria-label="Whole-section mask SVG example">
							<path d="M6 18 H138 V54 H6 Z M20 30 H124 V42 H20 Z" fill-rule="evenodd" />
						</svg>
						<figcaption>Whole section: full-box mask with transparent cutout</figcaption>
					</figure>
				</div>
			</div>
			<input type="hidden" name="<?php echo esc_attr( Section_Frame_Presets::PRESETS_OPTION ); ?>[_submitted]" value="1" />

			<table class="widefat striped" id="flexline-frame-presets-table">
				<thead>
					<tr>
						<th scope="col">Label</th>
						<th scope="col">Type</th>
						<th scope="col">SVG Shape</th>
						<th scope="col" data-frame-heading="height">Min Height</th>
						<th scope="col" data-frame-heading="height">Preferred Height</th>
						<th scope="col" data-frame-heading="height">Max Height</th>
						<th scope="col" data-frame-heading="mask">Whole Shape Behavior</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( empty( $shape_presets ) ) {
						flexline_render_frame_preset_row(
							array(
								'id'                  => '',
								'label'               => '',
								'type'                => 'frame',
								'side'                => 'top',
								'attachment_id'       => 0,
								'height_min'          => 56,
								'height_preferred_vw' => 7,
								'height_max'          => 112,
								'fit'                 => 'fill',
							),
							0
						);
					} else {
						foreach ( $shape_presets as $index => $preset ) {
							flexline_render_frame_preset_row( $preset, $index );
						}
					}
					?>
				</tbody>
			</table>

			<p>
				<button type="button" class="button" id="flexline-add-frame-preset">Add Section Shape</button>
			</p>
		<?php endif; ?>

		<?php submit_button( 'Save Section Shapes' ); ?>
	</form>
	<?php if ( $is_enabled ) : ?>
		<template id="flexline-frame-preset-row-template">
			<table>
				<tbody>
					<?php
					flexline_render_frame_preset_row(
						array(
							'id'                  => '',
							'label'               => '',
							'type'                => 'frame',
							'side'                => 'top',
							'attachment_id'       => 0,
							'height_min'          => 56,
							'height_preferred_vw' => 7,
							'height_max'          => 112,
							'fit'                 => 'fill',
						),
						'__index__'
					);
					?>
				</tbody>
			</table>
		</template>
	<?php endif; ?>
	<?php
}
