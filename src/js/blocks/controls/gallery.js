import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { useDispatch, useSelect } from '@wordpress/data';
import { shouldUseCoreGalleryLightbox } from '../utils';

const IMAGE_LINK_DESTINATION_NONE = 'none';

const getPosterGalleryAttributes = (enablePosterGallery) => {
	const nextAttributes = { enablePosterGallery };

	if (enablePosterGallery && shouldUseCoreGalleryLightbox()) {
		nextAttributes.linkTo = 'lightbox';
	}

	return nextAttributes;
};

const getEditorLightboxSetting = (settings = {}) => {
	if (settings.lightbox && typeof settings.lightbox === 'object') {
		return settings.lightbox;
	}

	const globalFeatures = settings.__experimentalFeatures || {};
	const blockLightbox =
		globalFeatures.blocks?.['core/image']?.lightbox || null;

	return blockLightbox || globalFeatures.lightbox || null;
};

const getImageLightboxAttribute = (imageAttributes, lightboxSetting) => {
	if (lightboxSetting?.enabled) {
		// With global lightbox enabled, core gallery keeps image-level lightbox unset.
		return undefined;
	}

	return {
		...(imageAttributes?.lightbox || {}),
		enabled: true,
	};
};

const Controls = ({ BlockEdit, ...props }) => {
	const { getBlock, getSettings } = useSelect(
		(select) => select('core/block-editor'),
		[]
	);
	const { updateBlockAttributes } = useDispatch('core/block-editor');

	const togglePosterGallery = (newValue) => {
		props.setAttributes(getPosterGalleryAttributes(newValue));

		if (!(newValue && shouldUseCoreGalleryLightbox())) {
			return;
		}

		const galleryBlock = getBlock(props.clientId);
		const imageBlocks =
			galleryBlock?.innerBlocks?.filter(
				(block) => block.name === 'core/image'
			) || [];

		if (!imageBlocks.length) {
			return;
		}

		const lightboxSetting = getEditorLightboxSetting(getSettings?.());
		const changedAttributes = {};
		const targetClientIds = [];

		imageBlocks.forEach((block) => {
			targetClientIds.push(block.clientId);
			changedAttributes[block.clientId] = {
				href: undefined,
				linkDestination: IMAGE_LINK_DESTINATION_NONE,
				lightbox: getImageLightboxAttribute(
					block.attributes,
					lightboxSetting
				),
			};
		});

		updateBlockAttributes(targetClientIds, changedAttributes, {
			uniqueByBlock: true,
		});
	};

	return (
		<Fragment>
			<BlockEdit {...props} />
			<InspectorControls>
				<PanelBody title="FlexLine Options">
					<ToggleControl
						label="Enable Poster Gallery"
						checked={!!props.attributes.enablePosterGallery}
						onChange={togglePosterGallery}
					/>
				</PanelBody>
			</InspectorControls>
		</Fragment>
	);
};

export const controls = (BlockEdit, props) => (
	<Controls BlockEdit={BlockEdit} {...props} />
);

export const getClasses = (attributes) => {
	let added = '';
	if (attributes.enablePosterGallery) {
		added += ' poster-gallery';
	}
	return { added };
};

export default { controls, getClasses };
