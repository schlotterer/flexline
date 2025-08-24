/* eslint-disable @wordpress/no-unsafe-wp-apis */
/* global MutationObserver */
import { Fragment, useEffect } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	RangeControl,
	ToggleControl,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Scroller Options">
				<ToggleControl
					label="Enable Horizontal Scroller"
					checked={!!props.attributes.enableHorizontalScroller}
					onChange={(newValue) =>
						props.setAttributes({
							enableHorizontalScroller: newValue,
						})
					}
				/>
				{props.attributes.enableHorizontalScroller && (
					<SelectControl
						label="Transition Type"
						value={props.attributes.transitionType}
						options={[
							{ value: 'slide', label: 'Slide' },
							{ value: 'fade', label: 'Fade' },
						]}
						onChange={(value) =>
							props.setAttributes({
								transitionType: value,
							})
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller &&
					props.attributes.transitionType === 'fade' && (
						<UnitControl
							label="Container Height"
							type="number"
							min={0}
							value={props.attributes.fadeHeight}
							onChange={(value) =>
								props.setAttributes({ fadeHeight: value })
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
				{props.attributes.enableHorizontalScroller &&
					props.attributes.transitionType === 'fade' && (
						<SelectControl
							label="Media Display type"
							value={props.attributes.fadeMediaDisplay}
							options={[
								{ value: 'normal', label: 'Normal' },
								{ value: 'cover', label: 'Cover' },
								{ value: 'contain', label: 'Contain' },
							]}
							onChange={(value) =>
								props.setAttributes({
									fadeMediaDisplay: value,
								})
							}
						/>
					)}
				{props.attributes.enableHorizontalScroller && (
					<ToggleControl
						label="Show Arrow Navigation"
						checked={!!props.attributes.scrollNav}
						onChange={(newValue) =>
							props.setAttributes({ scrollNav: newValue })
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
					<ToggleControl
						label="Hide Scrollbar"
						checked={!!props.attributes.hideScrollbar}
						onChange={(newValue) =>
							props.setAttributes({ hideScrollbar: newValue })
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller &&
					props.name !== 'core/post-template' && (
						<ToggleControl
							label="Loop Scrolling"
							checked={!!props.attributes.scrollLoop}
							onChange={(newValue) =>
								props.setAttributes({ scrollLoop: newValue })
							}
						/>
					)}
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
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
				{props.attributes.enableHorizontalScroller && (
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
							props.setAttributes({ buttonsBorderColor: value })
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller && (
					<ToggleControl
						label="Add Box Shadow to Buttons"
						checked={!!props.attributes.buttonsBoxShadow}
						onChange={(newValue) =>
							props.setAttributes({ buttonsBoxShadow: newValue })
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller && (
					<ToggleControl
						label="Auto Scroll"
						checked={!!props.attributes.scrollAuto}
						onChange={(newValue) =>
							props.setAttributes({ scrollAuto: newValue })
						}
					/>
				)}
				{props.attributes.enableHorizontalScroller &&
					props.attributes.scrollAuto && (
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
				{props.attributes.enableHorizontalScroller &&
					props.attributes.scrollAuto && (
						<ToggleControl
							label="Pause on Hover"
							checked={!!props.attributes.pauseOnHover}
							onChange={(newValue) =>
								props.setAttributes({ pauseOnHover: newValue })
							}
						/>
					)}
				{props.attributes.enableHorizontalScroller &&
					props.attributes.scrollAuto && (
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

export const getClasses = (attributes) => {
	const removed = [];
	if (!attributes.enableHorizontalScroller) {
		removed.push(
			'is-style-horizontal-scroll',
			'horizontal-scroller-transition-fade',
			'horizontal-scroller-transition-slide',
			'horizontal-fader-media-cover',
			'horizontal-fader-media-contain',
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
	} else {
		if (attributes.transitionType !== 'fade') {
			removed.push('horizontal-scroller-transition-fade');
		}
		if (attributes.transitionType !== 'slide') {
			removed.push('horizontal-scroller-transition-slide');
		}
		if (attributes.fadeMediaDisplay !== 'cover') {
			removed.push('horizontal-fader-media-cover');
		}
		if (attributes.fadeMediaDisplay !== 'contain') {
			removed.push('horizontal-fader-media-contain');
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
			removed.push('horizontal-scroller-buttons-over');
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
		if (!attributes.buttonOver) {
			removed.push('scroller-buttons-over');
		}
		if (!attributes.buttonsBoxShadow) {
			removed.push('scroller-buttons-box-shadow');
		}
		if (!attributes.pauseOnHover) {
			removed.push('scroller-pause-on-hover');
		}
	}
	let added = '';
	if (attributes.enableHorizontalScroller) {
		added += ' is-style-horizontal-scroll';
	}
	if (attributes.scrollNav && attributes.enableHorizontalScroller) {
		added += ' horizontal-scroller-navigation';
	}
	if (attributes.transitionType === 'fade') {
		added += ' horizontal-scroller-transition-fade';
	}
	if (attributes.transitionType === 'slide') {
		added += ' horizontal-scroller-transition-slide';
	}
	if (attributes.fadeMediaDisplay === 'cover') {
		added += ' horizontal-fader-media-cover';
	}
	if (attributes.fadeMediaDisplay === 'contain') {
		added += ' horizontal-fader-media-contain';
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
