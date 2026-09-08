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
	$is_whole         = 'whole' === $row_type;
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
				aria-label="Section shape label"
				class="regular-text"
				data-frame-field="label"
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][label]"
				value="<?php echo esc_attr( $preset['label'] ?? '' ); ?>"
				placeholder="Gentle wave"
			/>
		</td>
		<td>
			<select
				aria-label="Section shape type"
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
			<?php if ( $is_whole && $attachment_id > 0 && '' === $preview_url ) : ?>
				<p class="description" data-frame-source-warning role="status">This whole shape cannot render. Choose a locally readable Media Library SVG of 256 KiB or less. Block fits SVG proportion also requires a viewBox with positive width and height. The preset remains saved.</p>
			<?php endif; ?>
		</td>
		<td>
			<div class="flexline-frame-height-settings" data-frame-panel="height" <?php echo $is_whole ? 'hidden' : ''; ?>>
			<label>
				<span>Min Height (px)</span>
				<input
					type="number"
					min="1"
					step="1"
					class="small-text"
					data-frame-field="height_min"
					<?php disabled( $is_whole ); ?>
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_min]"
					value="<?php echo esc_attr( $preset['height_min'] ?? 56 ); ?>"
				/>
			</label>
			<label>
				<span>Preferred Height (vw)</span>
				<input
					type="number"
					min="0.1"
					step="0.1"
					class="small-text"
					data-frame-field="height_preferred_vw"
					<?php disabled( $is_whole ); ?>
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_preferred_vw]"
					value="<?php echo esc_attr( $preset['height_preferred_vw'] ?? 7 ); ?>"
				/>
			</label>
			<label>
				<span>Max Height (px)</span>
				<input
					type="number"
					min="1"
					step="1"
					class="small-text"
					data-frame-field="height_max"
					<?php disabled( $is_whole ); ?>
					name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][height_max]"
					value="<?php echo esc_attr( $preset['height_max'] ?? 112 ); ?>"
				/>
			</label>
			</div>
			<div data-frame-panel="mask" <?php echo $is_whole ? '' : 'hidden'; ?>>
			<label>
				<span>Whole Shape Behavior</span>
			<select
				data-frame-field="fit"
				<?php disabled( ! $is_whole ); ?>
				name="flexline_frame_presets[items][<?php echo esc_attr( $index ); ?>][fit]"
			>
				<option value="fill" <?php selected( $fit, 'fill' ); ?>>Shape fills block</option>
				<option value="proportion" <?php selected( $fit, 'proportion' ); ?>>Block fits SVG proportion</option>
			</select>
			</label>
			</div>
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
	<p>Section Shapes use reusable SVG presets to clip Group, Row, Stack, and Grid sections. Choose Top frame or Bottom frame for edge shapes, or Whole section for a full-section mask. Presets and block selections are retained while this feature is disabled.</p>

	<?php settings_errors( Section_Frame_Presets::ENABLE_OPTION ); ?>
	<?php settings_errors( Section_Frame_Presets::PRESETS_OPTION ); ?>

	<form method="post" action="options.php" id="flexline-section-frames-form">
		<?php settings_fields( Section_Frame_Presets::SETTINGS_GROUP ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="flexline-enable-group-frames"><strong>Enable Section Shapes</strong></label>
					<p>Shows Section Shape controls for Group, Row, Stack, and Grid blocks and allows saved shapes to render on the front end.</p>
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
			<p>Create reusable Media Library SVG shapes. Top and bottom frame types use height settings; whole-section types choose whether the shape fills the block or the block fits the SVG proportion.</p>
			<div class="flexline-frame-guidance">
				<div>
					<h3>SVG setup</h3>
					<ul>
						<li>Use a transparent background; opaque pixels are the visible part of the section.</li>
						<li>Top frame SVGs should be opaque below the shape and transparent above it.</li>
						<li>Bottom frame SVGs should be opaque above the shape and transparent below it.</li>
						<li>Whole-section SVGs should include the entire mask shape inside a clean viewBox.</li>
						<li>Whole-section SVGs must be locally readable and no larger than 256 KiB (262,144 bytes). Offloaded media needs a local file copy. Block fits SVG proportion requires a viewBox with positive width and height.</li>
						<li>In Affinity, keep Set view box enabled and enter a valid Raster DPI, such as 300, so the SVG export can be saved.</li>
						<li>Frames stretch automatically; whole-section shapes either fill the selected block or set the block aspect ratio from the SVG viewBox.</li>
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
						<svg viewBox="0 0 2375 1950" role="img" aria-label="Whole-section mask SVG example">
							<path d="M860.938,627.731C863.792,636.181 865.811,644.808 866.251,653.783C868.643,702.575 820.894,742.588 772.323,747.809C724.202,752.982 677.153,732.664 634.624,709.563C592.492,686.678 551.023,660.171 503.979,650.917C444.204,639.158 383.118,656.572 322.599,663.548C261.434,670.6 191.378,663.236 152.229,615.716C127.23,585.37 121.306,544.973 128.926,506.029C122.16,462.352 137.009,413.571 164.726,377.682C201.168,330.495 251.676,311.089 297.894,277.034C337.731,247.682 330.357,193.178 365.857,158.802C398.473,127.219 449.527,116.268 492.227,131.695C539.224,148.674 571.974,192.722 618.007,212.166C662.925,231.139 713.918,224.28 762.56,227.685C811.201,231.09 866.058,251.718 880.459,298.303C885.553,314.782 884.762,331.072 880.778,347.302C881.172,348.399 881.544,349.511 881.892,350.638C892.517,385.01 877.937,418.6 861.809,452.478C851.592,473.938 840.757,495.516 835.664,517.522C844.409,545.742 863.302,571.488 864.753,601.078C865.207,610.349 863.819,619.295 860.938,627.731ZM130.497,514.364C125.23,549.985 131.762,586.153 154.545,613.808C193.063,660.564 262.076,667.506 322.255,660.568C383.08,653.556 444.482,636.156 504.559,647.973C551.899,657.285 593.658,683.898 636.056,706.927C678.055,729.74 724.482,749.934 772.003,744.827C819.074,739.766 865.573,701.215 863.255,653.929C862.889,646.481 861.401,639.281 859.245,632.224C845.617,665.232 809.098,689.569 772.163,693.54C724.342,698.68 677.604,678.424 635.34,655.467C593.075,632.51 551.461,605.95 504.269,596.667C444.343,584.879 383.099,602.286 322.427,609.28C261.755,616.275 192.22,609.122 153.387,561.984C141.788,547.905 134.348,531.641 130.497,514.364ZM834.05,511.807C839.584,491.333 849.573,471.201 859.1,451.189C874.719,418.38 889.111,385.898 879.358,352.628C865.318,401.585 824.862,450.109 832.043,501.679C832.52,505.101 833.203,508.474 834.05,511.807Z" transform="translate(608 501) scale(1.3)" />
						</svg>
						<figcaption>Whole section: full shape inside the viewBox</figcaption>
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
						<th scope="col">Settings</th>
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
