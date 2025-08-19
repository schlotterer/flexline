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
