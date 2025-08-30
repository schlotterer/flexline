const { addFilter } = wp.hooks;

import {
	customModalAttributes,
	customVisibilityAttributes,
	customIconAttributes,
	customLazyAttributes,
	customGroupAttributes,
	customHorizontalScrollAttributes,
	customHorizontalScrollerAttributes,
	customSliderAttributes,
	customGalleryAttributes,
	customShiftAttributes,
	customNoWrapAttributes,
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

registerAttributes(
	[
		'core/buttons',
		'core/column',
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
	],
	{ ...customVisibilityAttributes }
);
