import { Fragment, useEffect, useRef } from '@wordpress/element';
import {
	InspectorControls,
	store as blockEditorStore,
} from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { __ } from '@wordpress/i18n';
import { getVisibilityControls, getContentShiftControls } from '../utils';

const ImageControlsComponent = ({ BlockEdit, ...blockProps }) => {
	const { attributes, setAttributes, clientId } = blockProps;
	const {
		enableModal,
		modalMediaURL,
		href,
		align,
		enableLazyLoad,
		className = '',
	} = attributes;
	const linkPromptedRef = useRef(false);
	const isSelected = useSelect(
		(select) => select(blockEditorStore).isBlockSelected(clientId),
		[clientId]
	);
	const hasLink = !!href;
	const hasLegacyModal =
		(typeof className === 'string' && className.includes('enable-modal')) ||
		!!modalMediaURL;

	useEffect(() => {
		if (!enableModal && hasLegacyModal) {
			setAttributes({ enableModal: true });
		}
	}, [enableModal, hasLegacyModal, setAttributes]);

	useEffect(() => {
		if (!enableModal) {
			linkPromptedRef.current = false;
			return;
		}

		if (modalMediaURL && !hasLink) {
			setAttributes({
				href: modalMediaURL,
				linkDestination: 'custom',
				modalMediaURL: '',
			});
		}
	}, [enableModal, modalMediaURL, hasLink, setAttributes]);

	useEffect(() => {
		if (!enableModal) {
			return;
		}
		if (align !== 'center') {
			setAttributes({ align: 'center' });
		}
	}, [enableModal, align, setAttributes]);

	useEffect(() => {
		if (!enableModal || hasLink) {
			linkPromptedRef.current = false;
		}
	}, [enableModal, hasLink]);

	useEffect(() => {
		if (!enableModal || hasLink || !isSelected || linkPromptedRef.current) {
			return;
		}

		linkPromptedRef.current = true;

		let cancelled = false;

		const openToolbarLinkControl = (attempt = 0) => {
			if (cancelled) {
				return;
			}

			// Bail if the popover is already visible.
			if (document.querySelector('.block-editor-url-popover')) {
				return;
			}

			const label = __('Link');
			const button = document.querySelector(
				`button[aria-label="${label}"]`
			);

			if (button) {
				button.click();
				return;
			}

			if (attempt < 5) {
				setTimeout(() => openToolbarLinkControl(attempt + 1), 120);
			} else {
				linkPromptedRef.current = false;
			}
		};

		openToolbarLinkControl();

		return () => {
			cancelled = true;
		};
	}, [enableModal, hasLink, isSelected]);

	useEffect(() => {
		if (hasLink) {
			linkPromptedRef.current = false;
		}
	}, [hasLink]);

	return (
		<Fragment>
			<BlockEdit {...blockProps} />
			<InspectorControls>
				<PanelBody title="FlexLine Options">
					<ToggleControl
						label="Enable Lazy Load"
						checked={!!enableLazyLoad}
						onChange={(newValue) =>
							setAttributes({ enableLazyLoad: newValue })
						}
					/>
					<ToggleControl
						label="Open a Modal"
						checked={!!enableModal}
						help={__(
							'Uses the image link URL for the modal content.'
						)}
						onChange={(newValue) =>
							setAttributes({ enableModal: newValue })
						}
					/>
				</PanelBody>
				<PanelBody title="FlexLine Visibility">
					{getVisibilityControls(blockProps)}
				</PanelBody>
			</InspectorControls>
			{getContentShiftControls(blockProps)}
		</Fragment>
	);
};

export const controls = (BlockEdit, props) => (
	<ImageControlsComponent BlockEdit={BlockEdit} {...props} />
);

export const getClasses = (attributes) => {
	let added = '';
	if (attributes.enableModal) {
		added += ' enable-modal';
	}
	if (attributes.enableLazyLoad === false) {
		added += ' no-lazy-load';
	}
	return { added };
};

export default { controls, getClasses };
