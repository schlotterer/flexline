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

// NoWrap - Define custom attributes
export const customNoWrapAttributes = {
	noWrap: {
		type: 'boolean',
		default: false,
	},
};

// Horizontal Scroll - Define custom attributes
export const customHorizontalScrollAttributes = {
	enableHorizontalScroll: {
		type: 'boolean',
		default: false,
	},
};

// Horizontal Scroller - Define custom attributes
export const customHorizontalScrollerAttributes = {
	enableHorizontalScroller: {
		type: 'boolean',
		default: false,
	},
	scrollNav: {
		type: 'boolean',
		default: true,
	},
	scrollAuto: {
		type: 'boolean',
		default: false,
	},
	scrollSpeed: {
		type: 'number',
		default: 4000,
	},
	scrollLoop: {
		type: 'boolean',
		default: false,
	},
	hideScrollbar: {
		type: 'boolean',
		default: false,
	},
	hidePauseButton: {
		type: 'boolean',
		default: false,
	},
	positionButtonsHorizontal: {
		type: 'select',
		default: 'left',
	},
	positionButtonsVertical: {
		type: 'select',
		default: 'bottom',
	},
	positionButtonsOver: {
		type: 'boolean',
		default: false,
	},
	buttonsTextColor: {
		type: 'select',
		default: 'white',
	},
	buttonsBackgroundColor: {
		type: 'select',
		default: 'secondary',
	},
	buttonsBorderColor: {
		type: 'select',
		default: 'none',
	},
	buttonsBoxShadow: {
		type: 'boolean',
		default: false,
	},
	transitionDuration: {
		type: 'number',
		default: 500,
	},
	pauseOnHover: {
		type: 'boolean',
		default: true,
	},
	flexlineTransition: {
		type: 'string',
		default: 'slide',
	},
	flexlineHeight: {
		type: 'string',
		default: '',
	},
	flexlineMedia: {
		type: 'string',
		default: 'fill',
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

// Shift - Define custom attributes
export const customShiftAttributes = {
	useContentShift: {
		type: 'boolean',
		default: false,
	},
	shiftLeft: {
		type: 'string', // none, left, right
		default: '0px',
	},
	shiftRight: {
		type: 'string', // small, medium, large, etc.
		default: '0px',
	},
	shiftUp: {
		type: 'string', // none, top, bottom
		default: '0px',
	},
	shiftDown: {
		type: 'string',
		default: '0px',
	},
	shiftToTop: {
		type: 'boolean',
		default: false,
	},
	slideHorizontal: {
		type: 'string', // small, medium, large, etc.
		default: '0px',
	},
	slideVertical: {
		type: 'string', // none, top, bottom
		default: '0px',
	},
	resetMobile: {
		type: 'boolean',
		default: false,
	},
};
