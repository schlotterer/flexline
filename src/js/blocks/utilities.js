// Import toggle for the visibility controls.
import { ToggleControl } from '@wordpress/components';
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
 * Returns a string of responsive classes based on the provided attributes.
 *
 * @param {Object} attributes - An object containing responsive attributes (hideOnMobile, hideOnTablet, hideOnDesktop)
 * @return {string} A string of responsive classes
 */
export const getResponsiveClasses = (attributes) => {
	let classes = '';

	if (attributes.hideOnMobile) {
		classes += ' flexline-hide-on-mobile';
	}
	if (attributes.hideOnTablet) {
		classes += ' flexline-hide-on-tablet';
	}
	if (attributes.hideOnDesktop) {
		classes += ' flexline-hide-on-desktop';
	}

	return classes.trim();
};
