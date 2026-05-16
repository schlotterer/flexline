import { addFilter } from '@wordpress/hooks';

const withFlexlineSaveProps = (extraProps, blockType, attributes) => {
	if (blockType?.name !== 'core/button') {
		return extraProps;
	}

	const nextProps = { ...extraProps };
	const modalUrl = (attributes?.modalMediaURL || '').trim();
	const shouldSetModalUrl = !!attributes?.enableModal && !!modalUrl;

	if (shouldSetModalUrl) {
		nextProps['data-modal-media-url'] = modalUrl;
	} else {
		delete nextProps['data-modal-media-url'];
	}

	return nextProps;
};

addFilter(
	'blocks.getSaveContent.extraProps',
	'flexline/with-save-props',
	withFlexlineSaveProps
);
