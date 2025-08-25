/* eslint-disable @wordpress/no-unsafe-wp-apis */
/**
 * Utility functions for block controls.
 */

// Import components for visibility and content shift controls.
import { InspectorControls } from '@wordpress/block-editor';
import {
	ToggleControl,
	PanelBody,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

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
