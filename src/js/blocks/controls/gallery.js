import { Fragment, useEffect } from '@wordpress/element';
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

const getGalleryImageBlocks = (galleryBlock) =>
	galleryBlock?.innerBlocks?.filter((block) => block.name === 'core/image') ||
	[];

const getDesiredImageAttributes = (imageAttributes, lightboxSetting) => ({
	href: undefined,
	linkDestination: IMAGE_LINK_DESTINATION_NONE,
	lightbox: getImageLightboxAttribute(imageAttributes, lightboxSetting),
});

const hasLightboxDrift = (currentLightbox, desiredLightbox) => {
	if (!desiredLightbox) {
		return currentLightbox !== undefined;
	}

	if (!currentLightbox || typeof currentLightbox !== 'object') {
		return true;
	}

	return currentLightbox.enabled !== desiredLightbox.enabled;
};

const getPosterGallerySyncPayload = (imageBlocks, lightboxSetting) => {
	const changedAttributes = {};
	const targetClientIds = [];

	imageBlocks.forEach((block) => {
		const desired = getDesiredImageAttributes(
			block.attributes,
			lightboxSetting
		);
		const hasDrift =
			block.attributes.href !== desired.href ||
			block.attributes.linkDestination !== desired.linkDestination ||
			hasLightboxDrift(block.attributes.lightbox, desired.lightbox);

		if (!hasDrift) {
			return;
		}

		targetClientIds.push(block.clientId);
		changedAttributes[block.clientId] = desired;
	});

	return { targetClientIds, changedAttributes };
};

const syncPosterGalleryImages = ({
	clientId,
	getBlock,
	getSettings,
	updateBlockAttributes,
}) => {
	const galleryBlock = getBlock(clientId);
	const imageBlocks = getGalleryImageBlocks(galleryBlock);

	if (!imageBlocks.length) {
		return;
	}

	const lightboxSetting = getEditorLightboxSetting(getSettings?.());
	const { targetClientIds, changedAttributes } = getPosterGallerySyncPayload(
		imageBlocks,
		lightboxSetting
	);

	if (!targetClientIds.length) {
		return;
	}

	updateBlockAttributes(targetClientIds, changedAttributes, {
		uniqueByBlock: true,
	});
};

const useHooks = (props) => {
	const { getBlock, getSettings } = useSelect(
		(select) => select('core/block-editor'),
		[]
	);
	const { updateBlockAttributes } = useDispatch('core/block-editor');
	const imageSyncFingerprint = useSelect(
		(select) => {
			const blockEditor = select('core/block-editor');
			const galleryBlock = blockEditor.getBlock(props.clientId);
			const imageBlocks = getGalleryImageBlocks(galleryBlock);

			return imageBlocks
				.map(
					(block) =>
						`${block.clientId}|${block.attributes.linkDestination ?? ''}|${
							block.attributes.href ?? ''
						}|${
							block.attributes.lightbox &&
							typeof block.attributes.lightbox === 'object'
								? block.attributes.lightbox.enabled
								: ''
						}`
				)
				.join('||');
		},
		[props.clientId]
	);

	useEffect(() => {
		if (
			!(
				props.attributes.enablePosterGallery &&
				shouldUseCoreGalleryLightbox()
			)
		) {
			return;
		}

		syncPosterGalleryImages({
			clientId: props.clientId,
			getBlock,
			getSettings,
			updateBlockAttributes,
		});
	}, [
		props.clientId,
		props.attributes.enablePosterGallery,
		props.attributes.linkTo,
		props.attributes.className,
		imageSyncFingerprint,
		getBlock,
		getSettings,
		updateBlockAttributes,
	]);
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

		syncPosterGalleryImages({
			clientId: props.clientId,
			getBlock,
			getSettings,
			updateBlockAttributes,
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

export default { controls, getClasses, useHooks };
