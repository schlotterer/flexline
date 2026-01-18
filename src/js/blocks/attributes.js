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

// Logo - Define custom attributes
export const customLogoAttributes = {
	useHighResLogo: {
		type: 'boolean',
		default: false,
	},
};

// Cover overlay options - Define custom attributes
export const customCoverOverlayAttributes = {
	// Toggle for applying Flexline glass effect to Cover overlay only
	flexlineGlassOverlay: {
		type: 'boolean',
		default: false,
	},
	// Range 0..10 controlling intensity (10 => blur 10px, saturate 70%)
	flexlineGlassLevel: {
		type: 'number',
		default: 0,
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
	enableHorizontalScrollAtMobile: {
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
};

// Slider - Define custom attributes
export const customSliderAttributes = {
	enableSlider: {
		type: 'boolean',
		default: false,
	},
	editPreviewToggle: {
		type: 'string',
		default: 'edit',
	},
	sliderHeight: {
		type: 'string',
		default: '',
	},
	sliderNav: {
		type: 'boolean',
		default: true,
	},
	sliderAuto: {
		type: 'boolean',
		default: false,
	},
	sliderSpeed: {
		type: 'number',
		default: 4000,
	},
	sliderLoop: {
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

// Related Posts - Define custom attributes
export const customRelatedPostsAttributes = {
	// Core toggle
	enableRelatedPosts: {
		type: 'boolean',
		default: false,
	},
	// Taxonomy to match on
	relatedPostsTaxonomy: {
		type: 'string',
		default: 'category',
	},
	// Scope: current post type only, or all post types
	relatedPostsScope: {
		type: 'string',
		enum: ['current', 'all'],
		default: 'current',
	},
};
