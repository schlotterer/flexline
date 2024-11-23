// Set up custom attributes.
// MediaModal - Define custom attributes
export const customModalAttributes = {
	enableModal: {
		type: 'boolean',
		default: false,
	},
	modalMediaURL: {
		type: 'string',
		default: '',
	},
};

// Poster Gallery - Define custom attributes
export const customGalleryAttributes = {
	enablePosterGallery: {
		type: 'boolean',
		default: false,
	},
};

// Lazy Load - Define custom attributes
export const customLazyAttributes = {
	enableLazyLoad: {
		type: 'boolean',
		default: true,
	},
};

// Horizontal Scroll - Define custom attributes
export const customHorizontalScrollAttributes = {
	enableHorizontalScroll: {
		type: 'boolean',
		default: false,
	},
};

// Group - Define custom attributes
export const customGroupAttributes = {
	enableGroupLink: {
		type: 'boolean',
		default: false,
	},
	groupLinkURL: {
		type: 'string',
		default: '',
	},
	groupLinkType: {
		type: 'string',
		default: 'none', // Default to 'none' indicating no link or an unselected state
	},
};

// Visibility - Define custom attributes
export const customVisibilityAttributes = {
	stackAtTablet: {
		type: 'boolean',
		default: false,
	},
	hideOnDesktop: {
		type: 'boolean',
		default: false,
	},
	hideOnTablet: {
		type: 'boolean',
		default: false,
	},
	hideOnMobile: {
		type: 'boolean',
		default: false,
	},
};

// Button Icons - Define custom attributes
export const customIconAttributes = {
	iconType: {
		type: 'string',
		default: 'none', // Default to 'none' indicating no icon selected
	},
};

export const customShiftAttributes = {
	useContentShift: {
		type: 'boolean',
		default: false,
	},
	horizontalShift: {
		type: 'string', // none, left, right
		default: 'none',
	},
	horizontalShiftAmount: {
		type: 'string', // small, medium, large, etc.
		default: '0px',
	},
	verticalShift: {
		type: 'string', // none, top, bottom
		default: 'none',
	},
	verticalShiftAmount: {
		type: 'string',
		default: '0px',
	},
	shiftToTop: {
		type: 'boolean',
		default: false,
	},
	resetMobile: {
		type: 'boolean',
		default: false,
	},
};
