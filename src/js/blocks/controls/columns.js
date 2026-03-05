/* global MutationObserver */
import { Fragment, useEffect } from '@wordpress/element';
import {
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	RangeControl,
	Button,
} from '@wordpress/components';
import { getVisibilityControls } from '../utils';

const iconButtonLabel = (id, label) =>
	id ? `Change ${label} Icon (ID ${id})` : `Select ${label} Icon`;

const renderIconControl = (props, attributeName, label) => {
	const iconId = props.attributes[attributeName] || 0;
	return (
		<div>
			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) =>
						props.setAttributes({
							[attributeName]: media?.id || 0,
						})
					}
					allowedTypes={['image']}
					value={iconId}
					render={({ open }) => (
						<Button onClick={open} variant="secondary" size="small">
							{iconButtonLabel(iconId, label)}
						</Button>
					)}
				/>
			</MediaUploadCheck>
			{iconId > 0 && (
				<Button
					variant="tertiary"
					size="small"
					onClick={() => props.setAttributes({ [attributeName]: 0 })}
				>
					Clear {label} Icon
				</Button>
			)}
		</div>
	);
};

export const controls = (BlockEdit, props) => {
	const isScrollerEnabled = !!props.attributes.enableHorizontalScroller;
	const isAutoScrollEnabled = !!props.attributes.scrollAuto;
	const isSideButtonsMode = props.attributes.buttonDisplayMode === 'sides';

	return (
		<Fragment>
			<BlockEdit {...props} />
			<InspectorControls>
				<PanelBody title="FlexLine Scroller Options">
					<ToggleControl
						label="Enable Horizontal Scroller"
						checked={isScrollerEnabled}
						onChange={(newValue) =>
							props.setAttributes({
								enableHorizontalScroller: newValue,
							})
						}
					/>
					{isScrollerEnabled && (
						<ToggleControl
							label="Show Arrow Navigation"
							checked={!!props.attributes.scrollNav}
							onChange={(newValue) =>
								props.setAttributes({ scrollNav: newValue })
							}
						/>
					)}
					{isScrollerEnabled && (
						<RangeControl
							label="Scroll transition in Milliseconds"
							value={props.attributes.transitionDuration}
							onChange={(newInterval) =>
								props.setAttributes({
									transitionDuration: newInterval,
								})
							}
							defaultValue={500}
							min={100}
							max={1500}
							step={50}
						/>
					)}
					{isScrollerEnabled && (
						<ToggleControl
							label="Hide Scrollbar"
							checked={!!props.attributes.hideScrollbar}
							onChange={(newValue) =>
								props.setAttributes({ hideScrollbar: newValue })
							}
						/>
					)}
					{isScrollerEnabled &&
						props.name !== 'core/post-template' && (
							<ToggleControl
								label="Loop Scrolling"
								checked={!!props.attributes.scrollLoop}
								onChange={(newValue) =>
									props.setAttributes({
										scrollLoop: newValue,
									})
								}
							/>
						)}
					{isScrollerEnabled && (
						<ToggleControl
							label="Auto Scroll"
							checked={isAutoScrollEnabled}
							onChange={(newValue) =>
								props.setAttributes({ scrollAuto: newValue })
							}
						/>
					)}
					{isScrollerEnabled && isAutoScrollEnabled && (
						<ToggleControl
							label="Hide Pause Button"
							checked={!!props.attributes.hidePauseButton}
							onChange={(newValue) =>
								props.setAttributes({
									hidePauseButton: newValue,
								})
							}
						/>
					)}
					{isScrollerEnabled && isAutoScrollEnabled && (
						<ToggleControl
							label="Pause on Hover"
							checked={!!props.attributes.pauseOnHover}
							onChange={(newValue) =>
								props.setAttributes({ pauseOnHover: newValue })
							}
						/>
					)}
					{isScrollerEnabled && isAutoScrollEnabled && (
						<RangeControl
							label="Scroll Interval in Milliseconds"
							value={props.attributes.scrollSpeed}
							onChange={(newInterval) =>
								props.setAttributes({
									scrollSpeed: newInterval,
								})
							}
							defaultValue={4000}
							min={1000}
							max={10000}
							step={500}
						/>
					)}
				</PanelBody>
				<PanelBody
					title="FlexLine Scroller Buttons & Indicators"
					initialOpen={false}
				>
					{isScrollerEnabled && (
						<SelectControl
							label="Buttons Display Mode"
							value={props.attributes.buttonDisplayMode}
							options={[
								{ value: 'bottom', label: 'Bottom' },
								{ value: 'sides', label: 'Sides' },
							]}
							onChange={(value) =>
								props.setAttributes({
									buttonDisplayMode: value,
								})
							}
						/>
					)}
					{isScrollerEnabled && (
						<ToggleControl
							label="Show Range Dots"
							checked={!!props.attributes.showRangeDots}
							onChange={(newValue) =>
								props.setAttributes({ showRangeDots: newValue })
							}
						/>
					)}
					{isScrollerEnabled && !isSideButtonsMode && (
						<SelectControl
							label="Buttons Horizontal Position"
							value={props.attributes.positionButtonsHorizontal}
							options={[
								{ value: 'left', label: 'Left' },
								{ value: 'center', label: 'Center' },
								{ value: 'right', label: 'Right' },
							]}
							onChange={(value) =>
								props.setAttributes({
									positionButtonsHorizontal: value,
								})
							}
						/>
					)}
					{isScrollerEnabled && !isSideButtonsMode && (
						<SelectControl
							label="Buttons Vertical Position"
							value={props.attributes.positionButtonsVertical}
							options={[
								{ value: 'top', label: 'Top' },
								{ value: 'bottom', label: 'Bottom' },
							]}
							onChange={(value) =>
								props.setAttributes({
									positionButtonsVertical: value,
								})
							}
						/>
					)}
					{isScrollerEnabled && !isSideButtonsMode && (
						<ToggleControl
							label="Position Buttons Over Scroller"
							checked={!!props.attributes.positionButtonsOver}
							onChange={(newValue) =>
								props.setAttributes({
									positionButtonsOver: newValue,
								})
							}
						/>
					)}
					{isScrollerEnabled && (
						<SelectControl
							label="Buttons Text Color"
							value={props.attributes.buttonsTextColor}
							options={[
								{ value: 'default', label: 'Default' },
								{ value: 'white', label: 'White' },
								{ value: 'black', label: 'Black' },
								{ value: 'primary', label: 'Primary' },
								{ value: 'secondary', label: 'Secondary' },
								{ value: 'alternate', label: 'Alternate' },
								{ value: 'gray', label: 'Gray' },
							]}
							onChange={(value) =>
								props.setAttributes({ buttonsTextColor: value })
							}
						/>
					)}
					{isScrollerEnabled && (
						<SelectControl
							label="Buttons Background Color"
							value={props.attributes.buttonsBackgroundColor}
							options={[
								{ value: 'default', label: 'Default' },
								{ value: 'transparent', label: 'Transparent' },
								{ value: 'white', label: 'White' },
								{ value: 'black', label: 'Black' },
								{ value: 'primary', label: 'Primary' },
								{ value: 'secondary', label: 'Secondary' },
								{ value: 'alternate', label: 'Alternate' },
								{ value: 'gray', label: 'Gray' },
							]}
							onChange={(value) =>
								props.setAttributes({
									buttonsBackgroundColor: value,
								})
							}
						/>
					)}
					{isScrollerEnabled && (
						<SelectControl
							label="Buttons Border Color"
							value={props.attributes.buttonsBorderColor}
							options={[
								{ value: 'none', label: 'None' },
								{ value: 'white', label: 'White' },
								{ value: 'black', label: 'Black' },
								{ value: 'primary', label: 'Primary' },
								{ value: 'secondary', label: 'Secondary' },
								{ value: 'alternate', label: 'Alternate' },
								{ value: 'gray', label: 'Gray' },
							]}
							onChange={(value) =>
								props.setAttributes({
									buttonsBorderColor: value,
								})
							}
						/>
					)}
					{isScrollerEnabled && (
						<ToggleControl
							label="Add Box Shadow to Buttons"
							checked={!!props.attributes.buttonsBoxShadow}
							onChange={(newValue) =>
								props.setAttributes({
									buttonsBoxShadow: newValue,
								})
							}
						/>
					)}
					{isScrollerEnabled && (
						<div>
							<p>Prev Icon</p>
							{renderIconControl(
								props,
								'prevIconMediaId',
								'Prev'
							)}
						</div>
					)}
					{isScrollerEnabled && (
						<div>
							<p>Next Icon</p>
							{renderIconControl(
								props,
								'nextIconMediaId',
								'Next'
							)}
						</div>
					)}
					{isScrollerEnabled && (
						<div>
							<p>Pause Icon</p>
							{renderIconControl(
								props,
								'pauseIconMediaId',
								'Pause'
							)}
						</div>
					)}
				</PanelBody>
				<PanelBody title="FlexLine Visibility">
					<ToggleControl
						label="Stack at Tablet"
						checked={!!props.attributes.stackAtTablet}
						onChange={(newValue) =>
							props.setAttributes({ stackAtTablet: newValue })
						}
					/>
					{getVisibilityControls(props)}
				</PanelBody>
			</InspectorControls>
		</Fragment>
	);
};

export const getClasses = (attributes) => {
	const removed = [];
	if (!attributes.enableHorizontalScroller) {
		removed.push(
			'is-style-horizontal-scroll',
			'horizontal-scroller-navigation',
			'horizontal-scroller-loop',
			'horizontal-scroller-auto',
			'horizontal-scroller-hide-scrollbar',
			'horizontal-scroller-hide-pause-button',
			'horizontal-scroller-buttons-horizontal-left',
			'horizontal-scroller-buttons-horizontal-center',
			'horizontal-scroller-buttons-horizontal-right',
			'horizontal-scroller-buttons-vertical-top',
			'horizontal-scroller-buttons-vertical-bottom',
			'horizontal-scroller-buttons-over',
			'horizontal-scroller-buttons-sides',
			'horizontal-scroller-show-dots',
			'scroller-buttons-background-transparent',
			'scroller-buttons-background-white',
			'scroller-buttons-background-black',
			'scroller-buttons-background-gray',
			'scroller-buttons-background-primary',
			'scroller-buttons-background-secondary',
			'scroller-buttons-background-alternate',
			'scroller-buttons-text-white',
			'scroller-buttons-text-black',
			'scroller-buttons-text-gray',
			'scroller-buttons-text-primary',
			'scroller-buttons-text-secondary',
			'scroller-buttons-text-alternate',
			'scroller-buttons-border-none',
			'scroller-buttons-border-white',
			'scroller-buttons-border-black',
			'scroller-buttons-border-gray',
			'scroller-buttons-border-primary',
			'scroller-buttons-border-secondary',
			'scroller-buttons-border-alternate',
			'scroller-buttons-over',
			'scroller-buttons-box-shadow',
			'scroller-pause-on-hover'
		);
	}
	if (!attributes.scrollNav) {
		removed.push('horizontal-scroller-navigation');
	}
	if (!attributes.scrollLoop) {
		removed.push('horizontal-scroller-loop');
	}
	if (!attributes.scrollAuto) {
		removed.push('horizontal-scroller-auto');
	}
	if (!attributes.hideScrollbar) {
		removed.push('horizontal-scroller-hide-scrollbar');
	}
	if (!attributes.hidePauseButton) {
		removed.push('horizontal-scroller-hide-pause-button');
	}
	if (!attributes.positionButtonsOver) {
		removed.push(
			'horizontal-scroller-buttons-over',
			'scroller-buttons-over'
		);
	}
	if (attributes.positionButtonsHorizontal !== 'left') {
		removed.push('horizontal-scroller-buttons-horizontal-left');
	}
	if (attributes.positionButtonsHorizontal !== 'right') {
		removed.push('horizontal-scroller-buttons-horizontal-right');
	}
	if (attributes.positionButtonsHorizontal !== 'center') {
		removed.push('horizontal-scroller-buttons-horizontal-center');
	}
	if (attributes.positionButtonsVertical !== 'top') {
		removed.push('horizontal-scroller-buttons-vertical-top');
	}
	if (attributes.positionButtonsVertical !== 'bottom') {
		removed.push('horizontal-scroller-buttons-vertical-bottom');
	}
	if (attributes.buttonsBackgroundColor !== 'transparent') {
		removed.push('scroller-buttons-background-transparent');
	}
	if (attributes.buttonsBackgroundColor !== 'white') {
		removed.push('scroller-buttons-background-white');
	}
	if (attributes.buttonsBackgroundColor !== 'black') {
		removed.push('scroller-buttons-background-black');
	}
	if (attributes.buttonsBackgroundColor !== 'gray') {
		removed.push('scroller-buttons-background-gray');
	}
	if (attributes.buttonsBackgroundColor !== 'primary') {
		removed.push('scroller-buttons-background-primary');
	}
	if (attributes.buttonsBackgroundColor !== 'secondary') {
		removed.push('scroller-buttons-background-secondary');
	}
	if (attributes.buttonsBackgroundColor !== 'alternate') {
		removed.push('scroller-buttons-background-alternate');
	}
	if (attributes.buttonsTextColor !== 'white') {
		removed.push('scroller-buttons-text-white');
	}
	if (attributes.buttonsTextColor !== 'black') {
		removed.push('scroller-buttons-text-black');
	}
	if (attributes.buttonsTextColor !== 'gray') {
		removed.push('scroller-buttons-text-gray');
	}
	if (attributes.buttonsTextColor !== 'primary') {
		removed.push('scroller-buttons-text-primary');
	}
	if (attributes.buttonsTextColor !== 'secondary') {
		removed.push('scroller-buttons-text-secondary');
	}
	if (attributes.buttonsTextColor !== 'alternate') {
		removed.push('scroller-buttons-text-alternate');
	}
	if (attributes.buttonsBorderColor !== 'none') {
		removed.push('scroller-buttons-border-none');
	}
	if (attributes.buttonsBorderColor !== 'white') {
		removed.push('scroller-buttons-border-white');
	}
	if (attributes.buttonsBorderColor !== 'black') {
		removed.push('scroller-buttons-border-black');
	}
	if (attributes.buttonsBorderColor !== 'gray') {
		removed.push('scroller-buttons-border-gray');
	}
	if (attributes.buttonsBorderColor !== 'primary') {
		removed.push('scroller-buttons-border-primary');
	}
	if (attributes.buttonsBorderColor !== 'secondary') {
		removed.push('scroller-buttons-border-secondary');
	}
	if (attributes.buttonsBorderColor !== 'alternate') {
		removed.push('scroller-buttons-border-alternate');
	}
	if (attributes.buttonDisplayMode !== 'sides') {
		removed.push('horizontal-scroller-buttons-sides');
	}
	if (!attributes.showRangeDots) {
		removed.push('horizontal-scroller-show-dots');
	}
	if (!attributes.buttonsBoxShadow) {
		removed.push('scroller-buttons-box-shadow');
	}
	if (!attributes.pauseOnHover) {
		removed.push('scroller-pause-on-hover');
	}

	let added = '';
	if (attributes.enableHorizontalScroller) {
		added += ' is-style-horizontal-scroll';
	}
	if (attributes.scrollNav && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-navigation';
	}
	if (attributes.scrollAuto && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-auto';
	}
	if (attributes.scrollLoop && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-loop';
	}
	if (attributes.hideScrollbar && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-hide-scrollbar';
	}
	if (attributes.pauseOnHover && attributes.enableHorizontalScroller) {
		added += ' scroller-pause-on-hover';
	}
	if (attributes.hidePauseButton && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-hide-pause-button';
	}
	if (
		attributes.positionButtonsHorizontal &&
		attributes.enableHorizontalScroller
	) {
		added += ` horizontal-scroller-buttons-horizontal-${attributes.positionButtonsHorizontal}`;
	}
	if (
		attributes.positionButtonsVertical &&
		attributes.enableHorizontalScroller
	) {
		added += ` horizontal-scroller-buttons-vertical-${attributes.positionButtonsVertical}`;
	}
	if (attributes.positionButtonsOver && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-buttons-over';
	}
	if (
		attributes.buttonsBackgroundColor &&
		attributes.enableHorizontalScroller
	) {
		added += ` scroller-buttons-background-${attributes.buttonsBackgroundColor}`;
	}
	if (attributes.buttonsTextColor && attributes.enableHorizontalScroller) {
		added += ` scroller-buttons-text-${attributes.buttonsTextColor}`;
	}
	if (attributes.buttonsBorderColor && attributes.enableHorizontalScroller) {
		added += ` scroller-buttons-border-${attributes.buttonsBorderColor}`;
	}
	if (attributes.buttonsBoxShadow && attributes.enableHorizontalScroller) {
		added += ' scroller-buttons-box-shadow';
	}
	if (
		attributes.buttonDisplayMode === 'sides' &&
		attributes.enableHorizontalScroller
	) {
		added += ' horizontal-scroller-buttons-sides';
	}
	if (attributes.showRangeDots && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-show-dots';
	}
	if (attributes.stackAtTablet) {
		added += ' flexline-stack-at-tablet';
	}
	return { added, removed };
};

export const useHooks = (props) => {
	const {
		attributes: { enableHorizontalScroller, isStackedOnMobile },
		setAttributes,
		name,
	} = props;
	useEffect(() => {
		if (enableHorizontalScroller && isStackedOnMobile) {
			setAttributes({ isStackedOnMobile: false });
		}
	}, [enableHorizontalScroller, isStackedOnMobile, setAttributes]);

	useEffect(() => {
		if (name === 'core/columns') {
			const toggleWarning = () => {
				document
					.querySelectorAll('.components-notice.is-warning')
					.forEach((notice) => {
						const textDiv = notice.querySelector(
							'.components-notice__content'
						);
						if (
							textDiv.textContent.includes(
								'exceeds the recommended amount'
							)
						) {
							notice.style.display = enableHorizontalScroller
								? 'none'
								: '';
						}
					});
			};
			toggleWarning();
			const observer = new MutationObserver(toggleWarning);
			observer.observe(document.body, { childList: true, subtree: true });
			return () => observer.disconnect();
		}
	}, [name, enableHorizontalScroller]);
};

export default { controls, getClasses, useHooks };
