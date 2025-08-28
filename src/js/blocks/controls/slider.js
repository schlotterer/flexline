/* eslint-disable @wordpress/no-unsafe-wp-apis */
import { Fragment, useEffect } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	RangeControl,
	ToggleControl,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

import { getVisibilityControls, getContentShiftControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			{!props.attributes.enableSlider && (
				<PanelBody title="FlexLine Group Link Options">
					<ToggleControl
						label="Enable Group Link"
						checked={!!props.attributes.enableGroupLink}
						onChange={(newValue) =>
							props.setAttributes({ enableGroupLink: newValue })
						}
					/>
					{props.attributes.enableGroupLink && (
						<URLInput
							label="Group Link URL"
							value={props.attributes.groupLinkURL}
							onChange={(newValue) =>
								props.setAttributes({ groupLinkURL: newValue })
							}
						/>
					)}
					{props.attributes.enableGroupLink && (
						<SelectControl
							label="Link Type"
							value={props.attributes.groupLinkType}
							options={[
								{ label: 'Normal', value: 'none' },
								{ label: 'New Tab', value: 'new_tab' },
								{ label: 'Modal Media', value: 'modal_media' },
							]}
							onChange={(newValue) =>
								props.setAttributes({ groupLinkType: newValue })
							}
							__nextHasNoMarginBottom={true}
						/>
					)}
				</PanelBody>
			)}
			{!props.attributes.enableGroupLink && (
				<PanelBody title="FlexLine Slider Options">
					<ToggleControl
						label="Enable Slider"
						checked={!!props.attributes.enableSlider}
						onChange={(newValue) =>
							props.setAttributes({
								enableSlider: newValue,
							})
						}
					/>
					{props.attributes.enableSlider && (
						<SelectControl
							label="Edit or Preview"
							value={props.attributes.editPreviewToggle}
							options={[
								{ value: 'edit', label: 'Edit' },
								{ value: 'preview', label: 'Preview' },
							]}
							onChange={(value) =>
								props.setAttributes({
									editPreviewToggle: value,
								})
							}
						/>
					)}
					{props.attributes.enableSlider && (
						<UnitControl
							label="Container Height"
							type="number"
							min={0}
							value={props.attributes.sliderHeight}
							onChange={(value) =>
								props.setAttributes({ sliderHeight: value })
							}
							units={[
								{ value: 'px', label: 'px' },
								{ value: 'em', label: 'em' },
								{ value: 'rem', label: 'rem' },
								{ value: 'vw', label: 'vw' },
								{ value: 'vh', label: 'vh' },
								{ value: 'svh', label: 'svh' },
							]}
							help="Leave blank for full screen - header height. Use 100svh for mobile friendly full screen height"
						/>
					)}
					{props.attributes.enableSlider && (
						<ToggleControl
							label="Show Arrow Navigation"
							checked={!!props.attributes.sliderNav}
							onChange={(newValue) =>
								props.setAttributes({ sliderNav: newValue })
							}
						/>
					)}
					{props.attributes.enableSlider && (
						<RangeControl
							label="Transition in Milliseconds"
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
					{props.attributes.enableSlider && (
						<ToggleControl
							label="Loop Scrolling"
							checked={!!props.attributes.sliderLoop}
							onChange={(newValue) =>
								props.setAttributes({ sliderLoop: newValue })
							}
						/>
					)}
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
						<ToggleControl
							label="Position Buttons Over Slider"
							checked={!!props.attributes.positionButtonsOver}
							onChange={(newValue) =>
								props.setAttributes({
									positionButtonsOver: newValue,
								})
							}
						/>
					)}
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
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
					{props.attributes.enableSlider && (
						<ToggleControl
							label="Auto Slide"
							checked={!!props.attributes.sliderAuto}
							onChange={(newValue) =>
								props.setAttributes({ sliderAuto: newValue })
							}
						/>
					)}
					{props.attributes.enableSlider &&
						props.attributes.sliderAuto && (
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
					{props.attributes.enableSlider &&
						props.attributes.sliderAuto && (
							<ToggleControl
								label="Pause on Hover"
								checked={!!props.attributes.pauseOnHover}
								onChange={(newValue) =>
									props.setAttributes({
										pauseOnHover: newValue,
									})
								}
							/>
						)}
					{props.attributes.enableSlider &&
						props.attributes.sliderAuto && (
							<RangeControl
								label="Slide Interval in Milliseconds"
								value={props.attributes.sliderSpeed}
								onChange={(newInterval) =>
									props.setAttributes({
										sliderSpeed: newInterval,
									})
								}
								defaultValue={4000}
								min={1000}
								max={10000}
								step={500}
							/>
						)}
				</PanelBody>
			)}
			<PanelBody title="FlexLine Visibility">
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>
		{getContentShiftControls(props)}
	</Fragment>
);

export const getClasses = (attributes) => {
	const removed = [];
	if (attributes.enableSlider === false) {
		removed.push(
			'is-style-slider',
			'slider-transition-fade',
			'slider-transition-slide',
			'slider-navigation',
			'slider-loop',
			'slider-auto',
			'slider-hide-sliderbar',
			'slider-hide-pause-button',
			'slider-buttons-horizontal-left',
			'slider-buttons-horizontal-center',
			'slider-buttons-horizontal-right',
			'slider-buttons-vertical-top',
			'slider-buttons-vertical-bottom',
			'slider-buttons-over',
			'slider-buttons-background-transparent',
			'slider-buttons-background-white',
			'slider-buttons-background-black',
			'slider-buttons-background-gray',
			'slider-buttons-background-primary',
			'slider-buttons-background-secondary',
			'slider-buttons-background-alternate',
			'slider-buttons-text-white',
			'slider-buttons-text-black',
			'slider-buttons-text-gray',
			'slider-buttons-text-primary',
			'slider-buttons-text-secondary',
			'slider-buttons-text-alternate',
			'slider-buttons-border-none',
			'slider-buttons-border-white',
			'slider-buttons-border-black',
			'slider-buttons-border-gray',
			'slider-buttons-border-primary',
			'slider-buttons-border-secondary',
			'slider-buttons-border-alternate',
			'slider-buttons-over',
			'slider-buttons-box-shadow',
			'slider-pause-on-hover'
		);
	} else {
		if (!attributes.enableSlider) {
			removed.push('is-style-slider');
		}
		// Preview/Edit toggle class for editor runtime
		if (attributes.editPreviewToggle !== 'preview') {
			removed.push('slider-preview-mode');
		}
		if (!attributes.sliderNav) {
			removed.push('slider-navigation');
		}
		if (!attributes.sliderLoop) {
			removed.push('slider-loop');
		}
		if (!attributes.sliderAuto) {
			removed.push('slider-auto');
		}
		if (!attributes.hidePauseButton) {
			removed.push('slider-hide-pause-button');
		}
		if (!attributes.positionButtonsOver) {
			removed.push('slider-buttons-over');
		}
		if (attributes.positionButtonsHorizontal !== 'left') {
			removed.push('slider-buttons-horizontal-left');
		}
		if (attributes.positionButtonsHorizontal !== 'right') {
			removed.push('slider-buttons-horizontal-right');
		}
		if (attributes.positionButtonsHorizontal !== 'center') {
			removed.push('slider-buttons-horizontal-center');
		}
		if (attributes.positionButtonsVertical !== 'top') {
			removed.push('slider-buttons-vertical-top');
		}
		if (attributes.positionButtonsVertical !== 'bottom') {
			removed.push('slider-buttons-vertical-bottom');
		}
		if (attributes.buttonsBackgroundColor !== 'transparent') {
			removed.push('slider-buttons-background-transparent');
		}
		if (attributes.buttonsBackgroundColor !== 'white') {
			removed.push('slider-buttons-background-white');
		}
		if (attributes.buttonsBackgroundColor !== 'black') {
			removed.push('slider-buttons-background-black');
		}
		if (attributes.buttonsBackgroundColor !== 'gray') {
			removed.push('slider-buttons-background-gray');
		}
		if (attributes.buttonsBackgroundColor !== 'primary') {
			removed.push('slider-buttons-background-primary');
		}
		if (attributes.buttonsBackgroundColor !== 'secondary') {
			removed.push('slider-buttons-background-secondary');
		}
		if (attributes.buttonsBackgroundColor !== 'alternate') {
			removed.push('slider-buttons-background-alternate');
		}
		if (attributes.buttonsTextColor !== 'white') {
			removed.push('slider-buttons-text-white');
		}
		if (attributes.buttonsTextColor !== 'black') {
			removed.push('slider-buttons-text-black');
		}
		if (attributes.buttonsTextColor !== 'gray') {
			removed.push('slider-buttons-text-gray');
		}
		if (attributes.buttonsTextColor !== 'primary') {
			removed.push('slider-buttons-text-primary');
		}
		if (attributes.buttonsTextColor !== 'secondary') {
			removed.push('slider-buttons-text-secondary');
		}
		if (attributes.buttonsTextColor !== 'alternate') {
			removed.push('slider-buttons-text-alternate');
		}
		if (attributes.buttonsBorderColor !== 'none') {
			removed.push('slider-buttons-border-none');
		}
		if (attributes.buttonsBorderColor !== 'white') {
			removed.push('slider-buttons-border-white');
		}
		if (attributes.buttonsBorderColor !== 'black') {
			removed.push('slider-buttons-border-black');
		}
		if (attributes.buttonsBorderColor !== 'gray') {
			removed.push('slider-buttons-border-gray');
		}
		if (attributes.buttonsBorderColor !== 'primary') {
			removed.push('slider-buttons-border-primary');
		}
		if (attributes.buttonsBorderColor !== 'secondary') {
			removed.push('slider-buttons-border-secondary');
		}
		if (attributes.buttonsBorderColor !== 'alternate') {
			removed.push('slider-buttons-border-alternate');
		}
		if (!attributes.buttonOver) {
			removed.push('slider-buttons-over');
		}
		if (!attributes.buttonsBoxShadow) {
			removed.push('slider-buttons-box-shadow');
		}
		if (!attributes.pauseOnHover) {
			removed.push('slider-pause-on-hover');
		}
		let added = '';
		if (attributes.enableSlider) {
			added += ' is-style-slider';
		}
		if (
			attributes.enableSlider &&
			attributes.editPreviewToggle === 'preview'
		) {
			added += ' slider-preview-mode';
		}
		if (attributes.sliderNav && attributes.enableSlider) {
			added += ' slider-navigation';
		}
		if (attributes.sliderAuto && attributes.enableSlider) {
			added += ' slider-auto';
		}
		if (attributes.sliderLoop && attributes.enableSlider) {
			added += ' slider-loop';
		}
		if (attributes.pauseOnHover && attributes.enableSlider) {
			added += ' slider-pause-on-hover';
		}
		if (attributes.hidePauseButton && attributes.enableSlider) {
			added += ' slider-hide-pause-button';
		}
		if (attributes.positionButtonsHorizontal && attributes.enableSlider) {
			added += ` slider-buttons-horizontal-${attributes.positionButtonsHorizontal}`;
		}
		if (attributes.positionButtonsVertical && attributes.enableSlider) {
			added += ` slider-buttons-vertical-${attributes.positionButtonsVertical}`;
		}
		if (attributes.positionButtonsOver && attributes.enableSlider) {
			added += ' slider-buttons-over';
		}
		if (attributes.buttonsBackgroundColor && attributes.enableSlider) {
			added += ` slider-buttons-background-${attributes.buttonsBackgroundColor}`;
		}
		if (attributes.buttonsTextColor && attributes.enableSlider) {
			added += ` slider-buttons-text-${attributes.buttonsTextColor}`;
		}
		if (attributes.buttonsBorderColor && attributes.enableSlider) {
			added += ` slider-buttons-border-${attributes.buttonsBorderColor}`;
		}
		if (attributes.buttonsBoxShadow && attributes.enableSlider) {
			added += ' slider-buttons-box-shadow';
		}
		return { added, removed };
	}

	return { removed };
};

export const useHooks = (props) => {
	const { attributes, setAttributes } = props;
	const { enableSlider, isStackedOnMobile } = attributes;

	useEffect(() => {
		if (enableSlider && isStackedOnMobile) {
			setAttributes({ isStackedOnMobile: false });
		}
	}, [enableSlider, isStackedOnMobile, setAttributes]);
};

export default { controls, getClasses, useHooks };
