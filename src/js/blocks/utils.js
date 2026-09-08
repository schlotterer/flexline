/* eslint-disable @wordpress/no-unsafe-wp-apis */
/**
 * Utility functions for block controls.
 */

// Import components for visibility and content shift controls.
import { InspectorControls } from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	SelectControl,
	Notice,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

export const shouldUseCoreGalleryLightbox = () =>
	!!window.flexlineBlockExtensions?.useCoreGalleryLightbox;

export const getLegacyGalleryLightboxAttributes = (blockName, attrs = {}) => {
	if (shouldUseCoreGalleryLightbox()) {
		return null;
	}

	if (blockName === 'core/gallery' && attrs.linkTo === 'lightbox') {
		return {
			linkTo: 'none',
		};
	}

	if (blockName === 'core/image' && attrs.lightbox !== undefined) {
		return {
			lightbox: undefined,
		};
	}

	return null;
};

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

export const isGroupLayoutSupportedForSectionFrames = (attributes = {}) => {
	const type = attributes.layout?.type || '';
	return type === '' || type === 'default' || type === 'constrained';
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

export const isContentShiftEdgeActive = (attributes = {}, edge) => {
	if (!attributes.useContentShift) {
		return false;
	}

	return isContentShiftFieldSet(
		edge === 'top' ? attributes.shiftUp : attributes.shiftDown
	);
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
		blockName !== 'core/group' ||
		!getSectionFrameConfig().enabled ||
		!attributes.flexlineUseFrames ||
		!isGroupLayoutSupportedForSectionFrames(attributes)
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
	if (props.name !== 'core/group' || !config.enabled) {
		return null;
	}

	const { attributes } = props;
	const mode = getSectionShapeMode(attributes);
	const topPresets = config.presets.filter((preset) => preset.side === 'top');
	const bottomPresets = config.presets.filter(
		(preset) => preset.side === 'bottom'
	);
	const shapeMaskConfig = getSectionShapeMaskConfig();
	const layoutSupported = isGroupLayoutSupportedForSectionFrames(attributes);

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
				{attributes.flexlineUseFrames && !layoutSupported && (
					<Notice status="warning" isDismissible={false}>
						Section Shapes are available on ordinary Group layouts.
						Row, Stack, and Grid layouts keep their saved choices
						but do not render shapes.
					</Notice>
				)}
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
						disabled={!layoutSupported}
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
						disabled={!layoutSupported}
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
							disabled={!layoutSupported}
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
						disabled={!layoutSupported}
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
							disabled={!layoutSupported}
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
						disabled={!layoutSupported}
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

/**
 * Returns a JSX fragment containing ToggleControls for hiding an element on different screen sizes.
 *
 * @param {Object}   props                          - The component props.
 * @param {Object}   props.attributes               - The element attributes.
 * @param {boolean}  props.attributes.hideOnDesktop - Whether the element is hidden on desktop.
 * @param {boolean}  props.attributes.hideOnTablet  - Whether the element is hidden on tablet.
 * @param {boolean}  props.attributes.hideOnMobile  - Whether the element is hidden on mobile.
 * @param {Function} props.setAttributes            - A function to update the element attributes.
 * @return {JSX.Element} A JSX fragment containing the ToggleControls.
 */
export const getVisibilityControls = (props) => {
	return (
		<>
			<ToggleControl
				label={
					<>
						<span>Hide on Desktop</span>
						<span style={{ display: 'block' }}>(992px+)</span>
					</>
				}
				checked={!!props.attributes.hideOnDesktop}
				onChange={(newValue) =>
					props.setAttributes({
						hideOnDesktop: newValue,
					})
				}
			/>
			<ToggleControl
				label={
					<>
						<span>Hide on Tablet</span>
						<span style={{ display: 'block' }}>
							(782px - 991.98px)
						</span>
					</>
				}
				checked={!!props.attributes.hideOnTablet}
				onChange={(newValue) =>
					props.setAttributes({
						hideOnTablet: newValue,
					})
				}
			/>
			<ToggleControl
				label={
					<>
						<span>Hide on Mobile</span>
						<span style={{ display: 'block' }}>
							(0px - 781.98px)
						</span>
					</>
				}
				checked={!!props.attributes.hideOnMobile}
				onChange={(newValue) =>
					props.setAttributes({
						hideOnMobile: newValue,
					})
				}
			/>
		</>
	);
};

export const getVisibilityPanel = (
	props,
	legacyControls = null,
	panelProps = {}
) => {
	return (
		<PanelBody title="FlexLine Visibility" {...panelProps}>
			{legacyControls}
			{getVisibilityControls(props)}
		</PanelBody>
	);
};

/**
 * Returns the InspectorControls panel for Content Shift settings.
 *
 * @param {Object}   props               - The component props.
 * @param {Object}   props.attributes    - The block attributes.
 * @param {Function} props.setAttributes - Function to update block attributes.
 * @return {JSX.Element} A JSX fragment containing the Content Shift controls.
 */
export const getContentShiftControls = (props) => {
	const disableContentShiftAttributes = {
		useContentShift: false,
		shiftLeft: undefined,
		shiftRight: undefined,
		shiftUp: undefined,
		shiftDown: undefined,
		slideHorizontal: undefined,
		slideVertical: undefined,
		resetMobile: false,
	};

	return (
		<InspectorControls group="styles">
			<PanelBody title="FlexLine Content Shift">
				<ToggleControl
					label="Raise z-index"
					checked={!!props.attributes.shiftToTop}
					onChange={(value) =>
						props.setAttributes({ shiftToTop: value })
					}
				/>
				<ToggleControl
					label="Use Content Shift"
					checked={!!props.attributes.useContentShift}
					onChange={(newValue) =>
						props.setAttributes(
							newValue
								? { useContentShift: true }
								: disableContentShiftAttributes
						)
					}
				/>
				{props.attributes.useContentShift && (
					<ToggleControl
						label="Restore Normal on Mobile"
						checked={!!props.attributes.resetMobile}
						onChange={(value) =>
							props.setAttributes({ resetMobile: value })
						}
					/>
				)}
				{props.attributes.useContentShift && (
					<>
						<hr />
						<p>
							SHIFT - NEGATIVE MARGINS <br />
							<small>
								Leave empty to keep normal margins. Enter 0 for
								an explicit zero shift.
							</small>
						</p>
					</>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Shift Left"
						type="number"
						min={0}
						value={props.attributes.shiftLeft}
						onChange={(value) =>
							props.setAttributes({ shiftLeft: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
					/>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Shift Right"
						type="number"
						min={0}
						value={props.attributes.shiftRight}
						onChange={(value) =>
							props.setAttributes({ shiftRight: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
					/>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Shift Up"
						type="number"
						min={0}
						value={props.attributes.shiftUp}
						onChange={(value) =>
							props.setAttributes({ shiftUp: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
					/>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Shift Down"
						type="number"
						min={0}
						value={props.attributes.shiftDown}
						onChange={(value) =>
							props.setAttributes({ shiftDown: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
					/>
				)}
				{props.attributes.useContentShift && (
					<>
						<hr />
						<p>
							SLIDE - TRANSLATE <br />
							<small>Positive or negative numbers</small>
						</p>
					</>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Slide Horizontal ( - to left, + to right )"
						value={props.attributes.slideHorizontal}
						onChange={(value) =>
							props.setAttributes({ slideHorizontal: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
					/>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Slide Vertical ( - to top, + to bottom )"
						value={props.attributes.slideVertical}
						onChange={(value) =>
							props.setAttributes({ slideVertical: value })
						}
						units={[
							{ value: 'px', label: 'px' },
							{ value: '%', label: '%' },
							{ value: 'em', label: 'em' },
							{ value: 'rem', label: 'rem' },
							{ value: 'vw', label: 'vw' },
							{ value: 'vh', label: 'vh' },
						]}
						help="Enter positive or negative values."
					/>
				)}
			</PanelBody>
		</InspectorControls>
	);
};

// Utility function to generate visibility classes based on attributes
export const getVisibilityClasses = (attrs) => {
	let classes = '';
	if (attrs.hideOnMobile) {
		classes += 'flexline-hide-on-mobile ';
	}
	if (attrs.hideOnTablet) {
		classes += 'flexline-hide-on-tablet ';
	}
	if (attrs.hideOnDesktop) {
		classes += 'flexline-hide-on-desktop ';
	}
	return classes.trim();
};

/**
 * Returns whether a content-shift field is intentionally set.
 *
 * Empty string means "inherit normal margins" while any numeric/unit value,
 * including 0, is treated as intentional.
 *
 * @param {string|number|undefined|null} value Field value from block attributes.
 * @return {boolean} True if the field is intentionally set.
 */
export const isContentShiftFieldSet = (value) => {
	if (value === undefined || value === null) {
		return false;
	}

	if (typeof value === 'string') {
		return value.trim() !== '';
	}

	return true;
};

/**
 * Trims a content-shift field into a normalized string, or empty string when unset.
 *
 * @param {string|number|undefined|null} value Field value from block attributes.
 * @return {string} Normalized field value or empty string when unset.
 */
export const normalizeContentShiftInput = (value) => {
	if (!isContentShiftFieldSet(value)) {
		return '';
	}

	return `${value}`.trim();
};

/**
 * Converts a positive shift value into its negative margin form.
 *
 * Explicit zero remains zero (never `-0`), preserving the "0 = intentional"
 * behavior without introducing invalid-looking values.
 *
 * @param {string|number|undefined|null} value Field value from block attributes.
 * @return {string} Negative shift value, zero value, or empty string when unset.
 */
export const toNegativeContentShiftValue = (value) => {
	const normalized = normalizeContentShiftInput(value);
	if (!normalized) {
		return '';
	}

	const match = normalized.match(/^(-?\d*\.?\d+)([a-z%]*)$/i);
	if (!match) {
		return normalized.startsWith('-') ? normalized : `-${normalized}`;
	}

	const amount = Number(match[1]);
	const unit = match[2] || '';

	if (!Number.isFinite(amount) || amount === 0) {
		return `0${unit}`;
	}

	return `${-Math.abs(amount)}${unit}`;
};

// Utility function to manage class additions and removals
export const updateBlockClasses = (
	currentClasses,
	newClasses,
	removedClasses = []
) => {
	let classList = currentClasses.split(' ').filter(Boolean); // Split classes into an array and filter out empty strings

	// Remove each class from the list that needs to be removed
	removedClasses.forEach((removedClass) => {
		// Handle specific logic for flexline-icon-* classes
		if (removedClass === 'flexline-icon') {
			classList = classList.filter(
				(cls) => !cls.startsWith('flexline-icon-')
			); // Remove all flexline-icon-* classes
		} else {
			classList = classList.filter((cls) => cls !== removedClass); // Remove the specific class
		}
	});

	// Add the new classes
	newClasses.split(' ').forEach((newClass) => {
		classList.push(newClass.trim());
	});

	return [...new Set(classList)].join(' ').trim(); // Ensure unique classes and join them back into a string
};
