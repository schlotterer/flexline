<?php
/**
 * Render the Section Frames theme options tab.
 *
 * @package flexline
 */

use FlexLine\Section_Frame_Presets;

/**
 * Render one frame preset manager row.
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

	$attachment_id    = isset( $preset['attachment_id'] ) ? (int) $preset['attachment_id'] : 0;
	$attachment_label = '';
	$attachment_url   = '';
	$preview_url      = '';
	if ( $attachment_id > 0 ) {
		$title            = get_the_title( $attachment_id );
		$attachment_url   = wp_get_attachment_url( $attachment_id );
		$preview_url      = Section_Frame_Presets::get_svg_frame_source( $attachment_id );
		$attachment_label = $title ? $title : basename( (string) $attachment_url );
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
				data-frame-field="side"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][side]"
			>
				<option value="top" <?php selected( $preset['side'] ?? 'top', 'top' ); ?>>Top edge</option>
				<option value="bottom" <?php selected( $preset['side'] ?? 'top', 'bottom' ); ?>>Bottom edge</option>
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
		<td>
			<label>
				<span class="screen-reader-text">Minimum height in pixels</span>
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
		<td>
			<label>
				<span class="screen-reader-text">Preferred height in viewport width units</span>
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
		<td>
			<label>
				<span class="screen-reader-text">Maximum height in pixels</span>
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
		<td>
			<button type="button" class="button" data-frame-move-up aria-label="Move frame shape up">Up</button>
			<button type="button" class="button" data-frame-move-down aria-label="Move frame shape down">Down</button>
			<button type="button" class="button-link-delete" data-frame-remove>Remove</button>
		</td>
	</tr>
	<?php
}

/**
 * Render the Section Frames options tab.
 *
 * @return void
 */
function flexline_render_frames_tab() {
	$is_enabled = Section_Frame_Presets::is_enabled();
	$presets    = Section_Frame_Presets::get_presets();
	?>
	<h2>Section Frames</h2>
	<p>Section Frames use SVG shapes to clip the top or bottom edge of Group sections. Presets and block selections are retained while this feature is disabled.</p>

	<?php settings_errors( Section_Frame_Presets::ENABLE_OPTION ); ?>
	<?php settings_errors( Section_Frame_Presets::PRESETS_OPTION ); ?>

	<form method="post" action="options.php" id="flexline-section-frames-form">
		<?php settings_fields( Section_Frame_Presets::SETTINGS_GROUP ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="flexline-enable-group-frames"><strong>Enable Section Frames</strong></label>
					<p>Shows Section Frame controls for Group blocks and allows saved frame shapes to render on the front end.</p>
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
			<p><strong>Frame Shape Presets are hidden while Section Frames are disabled.</strong></p>
			<p>Re-enable Section Frames to add or edit presets. Existing presets remain saved.</p>
		<?php else : ?>
			<h2>Frame Shape Presets</h2>
			<p>Create reusable Media Library SVG shapes for the top or bottom edge of Group sections.</p>
			<div class="flexline-frame-guidance">
				<div>
					<h3>SVG setup</h3>
					<ul>
						<li>Use a transparent background; opaque pixels are the visible part of the section.</li>
						<li>Top edge SVGs should be opaque below the shape and transparent above it.</li>
						<li>Bottom edge SVGs should be opaque above the shape and transparent below it.</li>
						<li>Export the exact frame strip from the artboard or whole document; do not leave transformed artwork outside the viewBox.</li>
						<li>FlexLine automatically applies <code>preserveAspectRatio="none"</code> for saved frame previews and rendering.</li>
						<li>In Affinity, keep Set view box enabled and enter a valid Raster DPI, such as 300, so the SVG export can be saved.</li>
						<li>Use a wide viewBox, such as <code>0 0 1440 160</code>, and avoid strokes, filters, text, or embedded images.</li>
					</ul>
				</div>
				<div class="flexline-frame-examples" aria-label="Section Frame SVG examples">
					<figure>
						<svg viewBox="0 0 144 48" role="img" aria-label="Top edge SVG example">
							<path d="M0 18 C24 6 48 30 72 18 S120 6 144 18 L144 48 L0 48 Z" />
						</svg>
						<figcaption>Top edge: fill below the line</figcaption>
					</figure>
					<figure>
						<svg viewBox="0 0 144 48" role="img" aria-label="Bottom edge SVG example">
							<path d="M0 0 H144 V30 C120 42 96 18 72 30 S24 42 0 30 Z" />
						</svg>
						<figcaption>Bottom edge: fill above the line</figcaption>
					</figure>
				</div>
			</div>
			<input type="hidden" name="<?php echo esc_attr( Section_Frame_Presets::PRESETS_OPTION ); ?>[_submitted]" value="1" />

			<p class="description flexline-frame-height-note">
				Frame height controls the top or bottom mask band. It changes where the clipped edge sits on the section; it does not move inner block content or replace Group padding controls.
			</p>

			<table class="widefat striped" id="flexline-frame-presets-table">
				<thead>
					<tr>
						<th scope="col">Label</th>
						<th scope="col">Edge</th>
						<th scope="col">SVG Shape</th>
						<th scope="col">Min Height</th>
						<th scope="col">Preferred Height</th>
						<th scope="col">Max Height</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( empty( $presets ) ) {
						flexline_render_frame_preset_row(
							array(
								'id'                  => '',
								'label'               => '',
								'side'                => 'top',
								'attachment_id'       => 0,
								'height_min'          => 56,
								'height_preferred_vw' => 7,
								'height_max'          => 112,
							),
							0
						);
					} else {
						foreach ( $presets as $index => $preset ) {
							flexline_render_frame_preset_row( $preset, $index );
						}
					}
					?>
				</tbody>
			</table>

			<p>
				<button type="button" class="button" id="flexline-add-frame-preset">Add Frame Shape</button>
			</p>
		<?php endif; ?>

		<?php submit_button( 'Save Section Frames' ); ?>
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
							'side'                => 'top',
							'attachment_id'       => 0,
							'height_min'          => 56,
							'height_preferred_vw' => 7,
							'height_max'          => 112,
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
