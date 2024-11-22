const { addFilter } = wp.hooks;

import {
	customModalAttributes,
	customVisibilityAttributes,
	customIconAttributes,
	customLazyAttributes,
	customGroupAttributes,
	customHorizontalScrollAttributes,
	customGalleryAttributes,
	customShiftAttributes,
} from './attributes';

// Button - Filter function to add custom attributes to blocks
function addCustomButtonAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/button') {
		settings.attributes = {
			...settings.attributes,
			...customIconAttributes,
			...customModalAttributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Button - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomButtonAttributes
);

// Buttons - Filter function to add custom attributes to blocks
function addCustomButtonsAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/buttons') {
		settings.attributes = {
			...settings.attributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Buttons - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomButtonsAttributes
);

// Column- Filter function to add custom attributes to blocks
function addCustomColumnAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/column') {
		settings.attributes = {
			...settings.attributes,
			...customVisibilityAttributes,
			...customShiftAttributes,
		};
	}
	return settings;
}
// Column - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomColumnAttributes
);

// Cover - Filter function to add custom attributes to blocks
function addCustomCoverAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/cover') {
		settings.attributes = {
			...settings.attributes,
			...customLazyAttributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Cover - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomCoverAttributes
);

// Gallery - Filter function to add custom attributes to blocks
function addCustomGalleryAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/gallery') {
		settings.attributes = {
			...settings.attributes,
			...customGalleryAttributes,
		};
	}
	return settings;
}
// Gallery - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomGalleryAttributes
);

// Group - Filter function to add custom attributes to blocks
function addCustomGroupAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/group') {
		settings.attributes = {
			...settings.attributes,
			...customGroupAttributes,
			...customVisibilityAttributes,
			...customShiftAttributes,
		};
	}
	return settings;
}
// Group - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomGroupAttributes
);

// Image - Filter function to add custom attributes to blocks
function addCustomImageAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/image') {
		settings.attributes = {
			...settings.attributes,
			...customModalAttributes,
			...customLazyAttributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Image -Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomImageAttributes
);

// Navigation - Filter function to add custom attributes to blocks
function addCustomNavigationAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/navigation') {
		settings.attributes = {
			...settings.attributes,
			...customHorizontalScrollAttributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Navigation - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomNavigationAttributes
);

// Visibility - Filter function to add custom attributes to blocks
function addCustomVisibilityAttributes(settings, name) {
	if (
		[
			'core/columns',
			'core/spacer',
			'core/paragraph',
			'core/heading',
			'core/video',
			'core/site-logo',
			'core/post-featured-image',
			'core/embed',
			'core/html',
			'core/social-link',
			'core/social-links',
		].includes(name)
	) {
		// Extend the existing attributes with custom visibility attributes
		settings.attributes = {
			...settings.attributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Visibility - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-attributes',
	addCustomVisibilityAttributes
);
