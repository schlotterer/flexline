const { addFilter } = wp.hooks;

import {
	customModalAttributes,
	customVisibilityAttributes,
	customIconAttributes,
	customLazyAttributes,
	customGroupAttributes,
	customHorizontalScrollAttributes,
	customHorizontalScrollerAttributes,
	customGalleryAttributes,
	customShiftAttributes,
	customNoWrapAttributes,
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
			...customNoWrapAttributes,
		};
	}
	return settings;
}
// Button - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-button-attributes',
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
	'flexline/add-custom-buttons-attributes',
	addCustomButtonsAttributes
);

// Column- Filter function to add custom attributes to blocks
function addCustomColumnAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/column') {
		settings.attributes = {
			...settings.attributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Column - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-column-attributes',
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
	'flexline/add-custom-cover-attributes',
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
	'flexline/add-custom-gallery-attributes',
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
	'flexline/add-custom-group-attributes',
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
			...customShiftAttributes,
		};
	}
	return settings;
}
// Image -Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-custom-image-attributes',
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
	'flexline/add-custom-navigation-attributes',
	addCustomNavigationAttributes
);

// Columns - Filter function to add custom attributes to blocks
function addColumnsAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/columns') {
		settings.attributes = {
			...settings.attributes,
			...customHorizontalScrollerAttributes,
			...customVisibilityAttributes,
		};
	}
	return settings;
}
// Columns - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-columns-attributes',
	addColumnsAttributes
);

// Post Template - Filter function to add custom attributes to blocks
function addPostTemplateAttributes(settings, name) {
	// Target specific blocks
	if (name === 'core/post-template') {
		settings.attributes = {
			...settings.attributes,
			...customHorizontalScrollerAttributes,
		};
	}
	return settings;
}
// Navigation - Hook filters
addFilter(
	'blocks.registerBlockType',
	'flexline/add-post-template-attributes',
	addPostTemplateAttributes
);

// Visibility - Filter function to add custom attributes to blocks
function addCustomVisibilityAttributes(settings, name) {
	if (
		[
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
	'flexline/add-custom-visibility-attributes',
	addCustomVisibilityAttributes
);
