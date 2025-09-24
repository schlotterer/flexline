import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl, RangeControl } from '@wordpress/components';
import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Options">
				<ToggleControl
					label="Enable Lazy Load"
					checked={!!props.attributes.enableLazyLoad}
					onChange={(newValue) =>
						props.setAttributes({ enableLazyLoad: newValue })
					}
				/>
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>

		{/* Range inside the Color panel so it appears near Overlay controls */}
		<InspectorControls group="color">
			<div style={{ gridColumn: '1 / -1', width: '100%' }}>
				<RangeControl
					label="FlexLine Glass Style"
					value={props.attributes.flexlineGlassLevel ?? 0}
					onChange={(val) => {
						const level =
							typeof val === 'number'
								? Math.max(0, Math.min(10, Math.round(val)))
								: 0;
						props.setAttributes({ flexlineGlassLevel: level });
						if (
							level > 0 &&
							!props.attributes.flexlineGlassOverlay
						) {
							props.setAttributes({ flexlineGlassOverlay: true });
						}
						if (
							level === 0 &&
							props.attributes.flexlineGlassOverlay
						) {
							props.setAttributes({
								flexlineGlassOverlay: false,
							});
						}
					}}
					min={0}
					max={10}
					step={1}
				/>
			</div>
		</InspectorControls>
	</Fragment>
);

export const getClasses = (attributes) => {
	let added = '';
	const removed = [];
	if (attributes.enableLazyLoad === false) {
		added += ' no-lazy-load';
	}
	// Remove any previous glass-level-* classes when updating
	for (let i = 1; i <= 10; i++) {
		removed.push(`glass-level-${i}`);
	}
	const rawLevel = Number(attributes.flexlineGlassLevel ?? 0);
	let effective = 0;
	if (rawLevel > 0) {
		effective = Math.min(10, Math.max(1, Math.round(rawLevel)));
	} else if (attributes.flexlineGlassOverlay) {
		effective = 10;
	}
	if (effective > 0) {
		added += ` flexline-glass-overlay glass-level-${effective}`;
	}
	return { added, removed };
};

export default { controls, getClasses };
