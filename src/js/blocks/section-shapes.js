import { InspectorControls } from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	SelectControl,
	Notice,
} from '@wordpress/components';
import { isContentShiftEdgeActive } from './utils';

const sectionFrameClassNames = [
	'flexline-section-frame',
	'flexline-section-frame-top',
	'flexline-section-frame-bottom',
	'flexline-section-shape-mask',
	'flexline-section-shape-mask-proportion',
	'flexline-section-frame-overlap-top',
	'flexline-section-frame-overlap-bottom',
	'flexline-section-frame-overlap-top-mobile',
	'flexline-section-frame-overlap-bottom-mobile',
];

const sectionFrameStyleVars = [
	'--flexline-frame-top-image',
	'--flexline-frame-top-height',
	'--flexline-frame-top-overlap',
	'--flexline-frame-bottom-image',
	'--flexline-frame-bottom-height',
	'--flexline-frame-bottom-overlap',
	'--flexline-shape-mask-image',
	'--flexline-shape-mask-size',
	'--flexline-shape-mask-aspect-ratio',
];

const sectionFrameOverlapOptions = [
	{ label: 'No overlap', value: 'none' },
	{ label: 'Half frame overlap', value: 'half' },
	{ label: 'Full frame overlap', value: 'full' },
];

const sectionFrameSupportedBlocks = [
	'core/group',
	'core/stack',
	'core/row',
	'core/grid',
];

export const isBlockSupportedForSectionFrames = (blockName) =>
	sectionFrameSupportedBlocks.includes(blockName);

export const getSectionFrameConfig = () => {
	const config = window.flexlineBlockExtensions?.sectionFrames || {};

	return {
		enabled: !!config.enabled,
		presets: Array.isArray(config.presets) ? config.presets : [],
	};
};

export const getSectionShapeMaskConfig = () => {
	const config = window.flexlineBlockExtensions?.sectionShapeMasks || {};

	return {
		enabled: !!config.enabled,
		presets: Array.isArray(config.presets) ? config.presets : [],
	};
};

const getSectionFramePresetForSide = (presetId, side) => {
	const id = `${presetId || ''}`.trim();
	if (!id) {
		return null;
	}

	return (
		getSectionFrameConfig().presets.find(
			(preset) => preset.id === id && preset.side === side
		) || null
	);
};

const getSectionShapeMode = (attributes = {}) => {
	const mode = attributes.flexlineFrameMode;
	if (['top', 'bottom', 'both', 'whole'].includes(mode)) {
		return mode;
	}

	if (attributes.flexlineShapeMask) {
		return 'whole';
	}

	if (attributes.flexlineFrameTop && attributes.flexlineFrameBottom) {
		return 'both';
	}

	if (attributes.flexlineFrameBottom) {
		return 'bottom';
	}

	return 'top';
};

const modeUsesTopFrame = (mode) => mode === 'top' || mode === 'both';
const modeUsesBottomFrame = (mode) => mode === 'bottom' || mode === 'both';

const getSectionShapeMaskPreset = (presetId) => {
	const id = `${presetId || ''}`.trim();
	if (!id) {
		return null;
	}

	return (
		getSectionShapeMaskConfig().presets.find(
			(preset) => preset.id === id
		) || null
	);
};

const hasUnavailableSectionShapeMaskSelection = (presetId) =>
	!!`${presetId || ''}`.trim() && !getSectionShapeMaskPreset(presetId);

const hasUnavailableSectionFrameSelection = (presetId, side) =>
	!!`${presetId || ''}`.trim() &&
	!getSectionFramePresetForSide(presetId, side);

const getSectionFrameOptions = (side, selectedId) => {
	const sidePresets = getSectionFrameConfig().presets.filter(
		(preset) => preset.side === side
	);
	const options = [
		{
			label: side === 'top' ? 'No top frame' : 'No bottom frame',
			value: '',
		},
		...sidePresets.map((preset) => ({
			label: preset.label,
			value: preset.id,
		})),
	];

	if (hasUnavailableSectionFrameSelection(selectedId, side)) {
		options.push({
			label: 'Unavailable saved frame',
			value: selectedId,
		});
	}

	return options;
};

const getSectionShapeMaskOptions = (selectedId) => {
	const options = [
		{
			label: 'No whole-section shape',
			value: '',
		},
		...getSectionShapeMaskConfig().presets.map((preset) => ({
			label: preset.label,
			value: preset.id,
		})),
	];

	if (hasUnavailableSectionShapeMaskSelection(selectedId)) {
		options.push({
			label: 'Unavailable saved shape',
			value: selectedId,
		});
	}

	return options;
};

const getSectionFrameSideNotice = (presetId, side) => {
	if (!hasUnavailableSectionFrameSelection(presetId, side)) {
		return null;
	}

	return (
		<Notice status="warning" isDismissible={false}>
			The saved {side} frame shape is unavailable or assigned to the other
			edge.
		</Notice>
	);
};

const getSectionShapeMaskNotice = (presetId) => {
	if (!hasUnavailableSectionShapeMaskSelection(presetId)) {
		return null;
	}

	return (
		<Notice status="warning" isDismissible={false}>
			The saved whole-section shape is unavailable.
		</Notice>
	);
};

const cssUrlValue = (url) =>
	`url("${`${url || ''}`.replace(/\\/g, '\\\\').replace(/"/g, '\\"')}")`;

const normalizeSectionFrameOverlap = (value) =>
	value === 'half' || value === 'full' ? value : 'none';

const getSectionFrameOverlapValue = (heightVar, overlap) => {
	if (overlap === 'half') {
		return `calc(var(${heightVar}) * -0.5)`;
	}

	if (overlap === 'full') {
		return `calc(var(${heightVar}) * -1)`;
	}

	return '';
};

const getSectionFrameOverlapClass = (attributes, edge, overlap) => {
	if (normalizeSectionFrameOverlap(overlap) === 'none') {
		return '';
	}

	const contentShiftActive = isContentShiftEdgeActive(attributes, edge);
	if (!contentShiftActive) {
		return `flexline-section-frame-overlap-${edge}`;
	}

	return attributes.resetMobile
		? `flexline-section-frame-overlap-${edge}-mobile`
		: '';
};

export const getSectionFramePreviewProps = (blockName, attributes = {}) => {
	const empty = {
		classes: [],
		removedClasses: sectionFrameClassNames,
		styles: Object.fromEntries(
			sectionFrameStyleVars.map((name) => [name, undefined])
		),
		inlineStyles: {},
	};

	if (
		!isBlockSupportedForSectionFrames(blockName) ||
		!getSectionFrameConfig().enabled ||
		!attributes.flexlineUseFrames
	) {
		return empty;
	}

	const top = getSectionFramePresetForSide(
		attributes.flexlineFrameTop,
		'top'
	);
	const bottom = getSectionFramePresetForSide(
		attributes.flexlineFrameBottom,
		'bottom'
	);
	const mode = getSectionShapeMode(attributes);
	const shapeMask =
		mode === 'whole'
			? getSectionShapeMaskPreset(attributes.flexlineShapeMask)
			: null;

	if (
		!shapeMask &&
		(!modeUsesTopFrame(mode) || !top) &&
		(!modeUsesBottomFrame(mode) || !bottom)
	) {
		return empty;
	}

	const classes = ['flexline-section-frame'];
	const styles = { ...empty.styles };
	const inlineStyles = {};

	if (shapeMask) {
		classes.push('flexline-section-shape-mask');
		if (shapeMask.fit === 'proportion') {
			classes.push('flexline-section-shape-mask-proportion');
		}
		styles['--flexline-shape-mask-image'] = cssUrlValue(shapeMask.url);
		styles['--flexline-shape-mask-size'] = shapeMask.css_size;
		if (shapeMask.aspect_ratio) {
			styles['--flexline-shape-mask-aspect-ratio'] =
				shapeMask.aspect_ratio;
		}
	}

	if (modeUsesTopFrame(mode) && top) {
		classes.push('flexline-section-frame-top');
		styles['--flexline-frame-top-image'] = cssUrlValue(top.url);
		styles['--flexline-frame-top-height'] = top.height;

		const topOverlap = normalizeSectionFrameOverlap(
			attributes.flexlineFrameOverlapTop
		);
		const topOverlapClass = getSectionFrameOverlapClass(
			attributes,
			'top',
			topOverlap
		);
		if (topOverlapClass) {
			const topOverlapValue = getSectionFrameOverlapValue(
				'--flexline-frame-top-height',
				topOverlap
			);
			classes.push(topOverlapClass);
			styles['--flexline-frame-top-overlap'] = topOverlapValue;

			if (!isContentShiftEdgeActive(attributes, 'top')) {
				inlineStyles.marginTop = topOverlapValue;
				inlineStyles.marginBlockStart = topOverlapValue;
			}
		}
	}

	if (modeUsesBottomFrame(mode) && bottom) {
		classes.push('flexline-section-frame-bottom');
		styles['--flexline-frame-bottom-image'] = cssUrlValue(bottom.url);
		styles['--flexline-frame-bottom-height'] = bottom.height;

		const bottomOverlap = normalizeSectionFrameOverlap(
			attributes.flexlineFrameOverlapBottom
		);
		const bottomOverlapClass = getSectionFrameOverlapClass(
			attributes,
			'bottom',
			bottomOverlap
		);
		if (bottomOverlapClass) {
			const bottomOverlapValue = getSectionFrameOverlapValue(
				'--flexline-frame-bottom-height',
				bottomOverlap
			);
			classes.push(bottomOverlapClass);
			styles['--flexline-frame-bottom-overlap'] = bottomOverlapValue;

			if (!isContentShiftEdgeActive(attributes, 'bottom')) {
				inlineStyles.marginBottom = bottomOverlapValue;
				inlineStyles.marginBlockEnd = bottomOverlapValue;
			}
		}
	}

	return {
		classes,
		removedClasses: sectionFrameClassNames,
		styles,
		inlineStyles,
	};
};

const getSectionFrameOverlapNotice = (attributes, edge) => {
	if (!isContentShiftEdgeActive(attributes, edge)) {
		return null;
	}

	return (
		<Notice status="info" isDismissible={false}>
			Content Shift currently controls this edge. Frame overlap resumes on
			mobile when Restore Normal on Mobile is enabled.
		</Notice>
	);
};

export const getSectionFrameControls = (props) => {
	const config = getSectionFrameConfig();
	if (!isBlockSupportedForSectionFrames(props.name) || !config.enabled) {
		return null;
	}

	const { attributes } = props;
	const mode = getSectionShapeMode(attributes);
	const topPresets = config.presets.filter((preset) => preset.side === 'top');
	const bottomPresets = config.presets.filter(
		(preset) => preset.side === 'bottom'
	);
	const shapeMaskConfig = getSectionShapeMaskConfig();

	return (
		<InspectorControls group="styles">
			<PanelBody
				title="FlexLine Section Shapes"
				initialOpen={!!attributes.flexlineUseFrames}
			>
				<ToggleControl
					label="Use Section Shapes"
					checked={!!attributes.flexlineUseFrames}
					onChange={(newValue) =>
						props.setAttributes({ flexlineUseFrames: newValue })
					}
				/>
				{attributes.flexlineUseFrames && (
					<SelectControl
						label="Shape Type"
						value={mode}
						options={[
							{ label: 'Top frame', value: 'top' },
							{ label: 'Bottom frame', value: 'bottom' },
							{ label: 'Top and bottom frames', value: 'both' },
							{ label: 'Whole section', value: 'whole' },
						]}
						onChange={(value) =>
							props.setAttributes({ flexlineFrameMode: value })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
				{attributes.flexlineUseFrames &&
					modeUsesTopFrame(mode) &&
					topPresets.length === 0 &&
					!attributes.flexlineFrameTop && (
						<Notice status="info" isDismissible={false}>
							Add Top frame shapes in FlexLine Section Shapes
							options.
						</Notice>
					)}
				{attributes.flexlineUseFrames && modeUsesTopFrame(mode) && (
					<SelectControl
						label="Top Frame Shape"
						value={attributes.flexlineFrameTop || ''}
						options={getSectionFrameOptions(
							'top',
							attributes.flexlineFrameTop
						)}
						onChange={(value) =>
							props.setAttributes({ flexlineFrameTop: value })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
				{attributes.flexlineUseFrames &&
					modeUsesTopFrame(mode) &&
					getSectionFrameSideNotice(
						attributes.flexlineFrameTop,
						'top'
					)}
				{attributes.flexlineUseFrames &&
					modeUsesTopFrame(mode) &&
					attributes.flexlineFrameTop && (
						<SelectControl
							label="Top Frame Overlap"
							value={normalizeSectionFrameOverlap(
								attributes.flexlineFrameOverlapTop
							)}
							options={sectionFrameOverlapOptions}
							onChange={(value) =>
								props.setAttributes({
									flexlineFrameOverlapTop: value,
								})
							}
							__nextHasNoMarginBottom={true}
						/>
					)}
				{attributes.flexlineUseFrames &&
					modeUsesTopFrame(mode) &&
					attributes.flexlineFrameTop &&
					getSectionFrameOverlapNotice(attributes, 'top')}
				{attributes.flexlineUseFrames &&
					modeUsesBottomFrame(mode) &&
					bottomPresets.length === 0 &&
					!attributes.flexlineFrameBottom && (
						<Notice status="info" isDismissible={false}>
							Add Bottom frame shapes in FlexLine Section Shapes
							options.
						</Notice>
					)}
				{attributes.flexlineUseFrames && modeUsesBottomFrame(mode) && (
					<SelectControl
						label="Bottom Frame Shape"
						value={attributes.flexlineFrameBottom || ''}
						options={getSectionFrameOptions(
							'bottom',
							attributes.flexlineFrameBottom
						)}
						onChange={(value) =>
							props.setAttributes({ flexlineFrameBottom: value })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
				{attributes.flexlineUseFrames &&
					modeUsesBottomFrame(mode) &&
					getSectionFrameSideNotice(
						attributes.flexlineFrameBottom,
						'bottom'
					)}
				{attributes.flexlineUseFrames &&
					modeUsesBottomFrame(mode) &&
					attributes.flexlineFrameBottom && (
						<SelectControl
							label="Bottom Frame Overlap"
							value={normalizeSectionFrameOverlap(
								attributes.flexlineFrameOverlapBottom
							)}
							options={sectionFrameOverlapOptions}
							onChange={(value) =>
								props.setAttributes({
									flexlineFrameOverlapBottom: value,
								})
							}
							__nextHasNoMarginBottom={true}
						/>
					)}
				{attributes.flexlineUseFrames &&
					modeUsesBottomFrame(mode) &&
					attributes.flexlineFrameBottom &&
					getSectionFrameOverlapNotice(attributes, 'bottom')}
				{attributes.flexlineUseFrames &&
					mode === 'whole' &&
					shapeMaskConfig.presets.length === 0 &&
					!attributes.flexlineShapeMask && (
						<Notice status="info" isDismissible={false}>
							Add Whole section shapes in FlexLine Section Shapes
							options.
						</Notice>
					)}
				{attributes.flexlineUseFrames && mode === 'whole' && (
					<SelectControl
						label="Whole Section Shape"
						value={attributes.flexlineShapeMask || ''}
						options={getSectionShapeMaskOptions(
							attributes.flexlineShapeMask
						)}
						onChange={(value) =>
							props.setAttributes({ flexlineShapeMask: value })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
				{attributes.flexlineUseFrames &&
					mode === 'whole' &&
					getSectionShapeMaskNotice(attributes.flexlineShapeMask)}
			</PanelBody>
		</InspectorControls>
	);
};
