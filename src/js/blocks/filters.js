const { addFilter } = wp.hooks;
const { registerBlockVariation } = wp.blocks;

import {
	customModalAttributes,
	customVisibilityAttributes,
	customIconAttributes,
	customLazyAttributes,
	customCoverOverlayAttributes,
	customGroupAttributes,
	customHorizontalScrollAttributes,
	customHorizontalScrollerAttributes,
	customSliderAttributes,
	customGalleryAttributes,
	customShiftAttributes,
	customNoWrapAttributes,
	customLogoAttributes,
	customRelatedPostsAttributes,
} from './attributes';

function registerAttributes(blockNames, attributes) {
	blockNames.forEach((blockName) => {
		addFilter(
			'blocks.registerBlockType',
			`flexline/add-${blockName.replace(/\//g, '-')}-attributes`,
			(settings, name) => {
				if (name === blockName) {
					settings.attributes = {
						...settings.attributes,
						...attributes,
					};
				}
				return settings;
			}
		);
	});
}

registerAttributes(['core/button'], {
	...customIconAttributes,
	...customModalAttributes,
	...customVisibilityAttributes,
	...customNoWrapAttributes,
});

registerAttributes(['core/cover'], {
	...customLazyAttributes,
	...customVisibilityAttributes,
	...customCoverOverlayAttributes,
});

registerAttributes(['core/gallery'], { ...customGalleryAttributes });

registerAttributes(['core/group'], {
	...customGroupAttributes,
	...customVisibilityAttributes,
	...customShiftAttributes,
	...customSliderAttributes,
});

registerAttributes(['core/stack'], {
	...customSliderAttributes,
	...customGroupAttributes,
	...customVisibilityAttributes,
	...customShiftAttributes,
});

registerAttributes(['core/image'], {
	...customModalAttributes,
	...customLazyAttributes,
	...customVisibilityAttributes,
	...customShiftAttributes,
});

registerAttributes(['core/navigation'], {
	...customHorizontalScrollAttributes,
	...customVisibilityAttributes,
});

registerAttributes(['core/columns'], {
	...customHorizontalScrollerAttributes,
	...customVisibilityAttributes,
});

registerAttributes(['core/post-template'], {
	...customHorizontalScrollerAttributes,
});

registerAttributes(['core/query'], {
	...customRelatedPostsAttributes,
});

const relatedPostsAllowedControls = [
	'inherit',
	'order',
	'sticky',
	'taxQuery',
	'author',
	'search',
	'parents',
	'format',
	'postCount',
	'offset',
	'pages',
];

registerBlockVariation('core/query', {
	name: 'flexline-related-posts',
	title: 'FlexLine Related Posts',
	description: 'Related posts settings with fixed post type control.',
	attributes: {
		enableRelatedPosts: true,
	},
	isActive: (attributes) => !!attributes?.enableRelatedPosts,
	allowedControls: relatedPostsAllowedControls,
	scope: ['block'],
});

addFilter(
	'blocks.registerBlockType',
	'flexline/add-core-query-related-context',
	(settings, name) => {
		if (name !== 'core/query') {
			return settings;
		}

		settings.providesContext = {
			...(settings.providesContext || {}),
			'flexline/relatedPostsEnabled': 'enableRelatedPosts',
			'flexline/relatedPostsTaxonomy': 'relatedPostsTaxonomy',
			'flexline/relatedPostsScope': 'relatedPostsScope',
		};

		return settings;
	}
);

registerAttributes(
	[
		'core/accordion',
		'core/accordion-item',
		'core/accordion-heading',
		'core/accordion-panel',
		'core/buttons',
		'core/column',
		'core/spacer',
		'core/paragraph',
		'core/heading',
		'core/video',
		'core/post-featured-image',
		'core/embed',
		'core/html',
		'core/social-link',
		'core/social-links',
	],
	{ ...customVisibilityAttributes }
);

registerAttributes(['core/site-logo'], {
	...customVisibilityAttributes,
	...customLogoAttributes,
});

registerAttributes(
	[
		'web4sl/location-address',
		'web4sl/location-phone-link',
		'web4sl/location-map-link',
		'web4sl/location-filter-family',
	],
	{ ...customVisibilityAttributes }
);

// Floor plan blocks: visibility only (no stackAtTablet).
const floorPlanVisibility = {
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

registerAttributes(
	[
		'web4sl/advanced-floor-plans',
		'web4sl/floor-plan-2d-image',
		'web4sl/floor-plan-3d-image',
		'web4sl/floor-plan-accessibility-badge',
		'web4sl/floor-plan-baths',
		'web4sl/floor-plan-beds',
		'web4sl/floor-plan-brochure-button',
		'web4sl/floor-plan-media-toggle',
		'web4sl/floor-plan-square-feet',
		'web4sl/floor-plan-starting-price',
		'web4sl/floor-plan-video-button',
		'web4sl/floor-plan-virtual-tour-button',
	],
	{ ...floorPlanVisibility }
);
