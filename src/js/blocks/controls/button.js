import { Fragment, useEffect, useRef } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	Notice,
} from '@wordpress/components';
import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Options">
				<SelectControl
					label="Icon Type"
					value={props.attributes.iconType}
					options={[
						{ label: 'None', value: 'none' },
						{ label: 'Internal Link →', value: 'internal-link' },
						{ label: 'Download ⤓', value: 'download' },
						{ label: 'Play Video ►', value: 'video-play' },
						{ label: 'Open Modal ⤢', value: 'open-modal' },
						{ label: 'Link Out ↗', value: 'link-out' },
					]}
					onChange={(newValue) =>
						props.setAttributes({ iconType: newValue })
					}
					__nextHasNoMarginBottom={true}
				/>
				<ToggleControl
					label="Open Link in a Modal"
					checked={!!props.attributes.enableModal}
					onChange={(newValue) =>
						props.setAttributes({ enableModal: newValue })
					}
				/>
				{props.attributes.enableModal &&
					(props.attributes.tagName || 'a') === 'button' && (
						<>
							<URLInput
								label="Modal Media URL"
								value={props.attributes.modalMediaURL}
								onChange={(newValue) =>
									props.setAttributes({
										modalMediaURL: newValue,
									})
								}
							/>
							{!(props.attributes.modalMediaURL || '').trim() && (
								<Notice status="warning" isDismissible={false}>
									Modal Media URL is required when HTML
									element is set to button.
								</Notice>
							)}
						</>
					)}
				<ToggleControl
					label="Do not allow text to wrap unless there is a return or break"
					checked={!!props.attributes.noWrap}
					onChange={(newValue) =>
						props.setAttributes({ noWrap: newValue })
					}
				/>
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>
	</Fragment>
);

const isEmpty = (value) =>
	value === undefined || value === null || `${value}`.trim() === '';

export const useHooks = (props) => {
	const previousTagNameRef = useRef(props.attributes.tagName || 'a');

	useEffect(() => {
		const currentTagName = props.attributes.tagName || 'a';
		const previousTagName = previousTagNameRef.current;

		if (previousTagName === currentTagName) {
			return;
		}

		if (previousTagName === 'a' && currentTagName === 'button') {
			const nextModalUrl = props.attributes.modalMediaURL;
			const currentLinkUrl = props.attributes.url;
			if (isEmpty(nextModalUrl) && !isEmpty(currentLinkUrl)) {
				props.setAttributes({ modalMediaURL: currentLinkUrl });
			}
		}

		if (previousTagName === 'button' && currentTagName === 'a') {
			const currentLinkUrl = props.attributes.url;
			const modalUrl = props.attributes.modalMediaURL;
			if (isEmpty(currentLinkUrl) && !isEmpty(modalUrl)) {
				props.setAttributes({ url: modalUrl });
			}
		}

		previousTagNameRef.current = currentTagName;
	}, [
		props,
		props.attributes.modalMediaURL,
		props.attributes.tagName,
		props.attributes.url,
	]);
};

export const getClasses = (attributes) => {
	const removed = ['flexline-icon'];
	let added = '';
	if (attributes.enableModal) {
		added += ' enable-modal';
	}
	if (attributes.iconType && attributes.iconType !== 'none') {
		added += ` flexline-icon-${attributes.iconType}`;
	}
	if (attributes.noWrap) {
		added += ' nowrap';
	}
	return { removed, added };
};

export default { controls, getClasses, useHooks };
