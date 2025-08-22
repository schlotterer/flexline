/* eslint-disable @wordpress/no-unsafe-wp-apis */
/**
 * Utility functions for block controls.
 */

// Import components for visibility and content shift controls.
import { InspectorControls } from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	NumberControl,
	SelectControl,
} from '@wordpress/components';

const unitOptions = [
	{ value: 'px', label: 'px' },
	{ value: '%', label: '%' },
	{ value: 'em', label: 'em' },
	{ value: 'rem', label: 'rem' },
	{ value: 'vw', label: 'vw' },
	{ value: 'vh', label: 'vh' },
];

const parseUnitValue = (val) => {
	const match = /^(-?\d*\.?\d*)([a-z%]*)$/i.exec(val || '');
	return {
		value: match && match[1] ? match[1] : '',
		unit: match && match[2] ? match[2] : 'px',
	};
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
				label="Hide on Desktop"
				checked={!!props.attributes.hideOnDesktop}
				onChange={(newValue) =>
					props.setAttributes({
						hideOnDesktop: newValue,
					})
				}
			/>
			<ToggleControl
				label="Hide on Tablet"
				checked={!!props.attributes.hideOnTablet}
				onChange={(newValue) =>
					props.setAttributes({
						hideOnTablet: newValue,
					})
				}
			/>
			<ToggleControl
				label="Hide on Mobile"
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

/**
 * Returns the InspectorControls panel for Content Shift settings.
 *
 * @param {Object}   props               - The component props.
 * @param {Object}   props.attributes    - The block attributes.
 * @param {Function} props.setAttributes - Function to update block attributes.
 * @return {JSX.Element} A JSX fragment containing the Content Shift controls.
 */
export const getContentShiftControls = (props) => {
	const { value: shiftLeftValue, unit: shiftLeftUnit } = parseUnitValue(
		props.attributes.shiftLeft
	);
	const { value: shiftRightValue, unit: shiftRightUnit } = parseUnitValue(
		props.attributes.shiftRight
	);
	const { value: shiftUpValue, unit: shiftUpUnit } = parseUnitValue(
		props.attributes.shiftUp
	);
	const { value: shiftDownValue, unit: shiftDownUnit } = parseUnitValue(
		props.attributes.shiftDown
	);
	const { value: slideHorizontalValue, unit: slideHorizontalUnit } =
		parseUnitValue(props.attributes.slideHorizontal);
	const { value: slideVerticalValue, unit: slideVerticalUnit } =
		parseUnitValue(props.attributes.slideVertical);

	return (
		<InspectorControls group="styles">
			<PanelBody title="FlexLine Content Shift">
				<ToggleControl
					label="Use Content Shift"
					checked={!!props.attributes.useContentShift}
					onChange={(newValue) =>
						props.setAttributes({ useContentShift: newValue })
					}
				/>
				<ToggleControl
					label="Shift Above (z-index)"
					checked={!!props.attributes.shiftToTop}
					onChange={(value) =>
						props.setAttributes({ shiftToTop: value })
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
							<small>Enter positive numbers only.</small>
						</p>
					</>
				)}
				{props.attributes.useContentShift && (
					<>
						<NumberControl
							label="Shift Left"
							min={0}
							value={shiftLeftValue}
							onChange={(val) =>
								props.setAttributes({
									shiftLeft:
										val === ''
											? ''
											: `${val}${shiftLeftUnit}`,
								})
							}
						/>
						<SelectControl
							label="Unit"
							value={shiftLeftUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									shiftLeft:
										shiftLeftValue === ''
											? ''
											: `${shiftLeftValue}${newUnit}`,
								})
							}
						/>
					</>
				)}
				{props.attributes.useContentShift && (
					<>
						<NumberControl
							label="Shift Right"
							min={0}
							value={shiftRightValue}
							onChange={(val) =>
								props.setAttributes({
									shiftRight:
										val === ''
											? ''
											: `${val}${shiftRightUnit}`,
								})
							}
						/>
						<SelectControl
							label="Unit"
							value={shiftRightUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									shiftRight:
										shiftRightValue === ''
											? ''
											: `${shiftRightValue}${newUnit}`,
								})
							}
						/>
					</>
				)}
				{props.attributes.useContentShift && (
					<>
						<NumberControl
							label="Shift Up"
							min={0}
							value={shiftUpValue}
							onChange={(val) =>
								props.setAttributes({
									shiftUp:
										val === ''
											? ''
											: `${val}${shiftUpUnit}`,
								})
							}
						/>
						<SelectControl
							label="Unit"
							value={shiftUpUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									shiftUp:
										shiftUpValue === ''
											? ''
											: `${shiftUpValue}${newUnit}`,
								})
							}
						/>
					</>
				)}
				{props.attributes.useContentShift && (
					<>
						<NumberControl
							label="Shift Down"
							min={0}
							value={shiftDownValue}
							onChange={(val) =>
								props.setAttributes({
									shiftDown:
										val === ''
											? ''
											: `${val}${shiftDownUnit}`,
								})
							}
						/>
						<SelectControl
							label="Unit"
							value={shiftDownUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									shiftDown:
										shiftDownValue === ''
											? ''
											: `${shiftDownValue}${newUnit}`,
								})
							}
						/>
					</>
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
					<>
						<NumberControl
							label="Slide Horizontal ( - to left, + to right )"
							value={slideHorizontalValue}
							onChange={(val) =>
								props.setAttributes({
									slideHorizontal:
										val === ''
											? ''
											: `${val}${slideHorizontalUnit}`,
								})
							}
						/>
						<SelectControl
							label="Unit"
							value={slideHorizontalUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									slideHorizontal:
										slideHorizontalValue === ''
											? ''
											: `${slideHorizontalValue}${newUnit}`,
								})
							}
						/>
					</>
				)}
				{props.attributes.useContentShift && (
					<>
						<NumberControl
							label="Slide Vertical ( - to top, + to bottom )"
							value={slideVerticalValue}
							onChange={(val) =>
								props.setAttributes({
									slideVertical:
										val === ''
											? ''
											: `${val}${slideVerticalUnit}`,
								})
							}
							help="Enter positive or negative values."
						/>
						<SelectControl
							label="Unit"
							value={slideVerticalUnit}
							options={unitOptions}
							onChange={(newUnit) =>
								props.setAttributes({
									slideVertical:
										slideVerticalValue === ''
											? ''
											: `${slideVerticalValue}${newUnit}`,
								})
							}
						/>
					</>
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
