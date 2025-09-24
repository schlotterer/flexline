import { Fragment } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, ToggleControl, SelectControl } from '@wordpress/components';
import { getVisibilityControls, getContentShiftControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Group Link Options">
				<ToggleControl
					label="Enable Group Link"
					checked={!!props.attributes.enableGroupLink}
					onChange={(newValue) =>
						props.setAttributes({ enableGroupLink: newValue })
					}
				/>
				{props.attributes.enableGroupLink && (
					<URLInput
						label="Group Link URL"
						value={props.attributes.groupLinkURL}
						onChange={(newValue) =>
							props.setAttributes({ groupLinkURL: newValue })
						}
					/>
				)}
				{props.attributes.enableGroupLink && (
					<SelectControl
						label="Link Type"
						value={props.attributes.groupLinkType}
						options={[
							{ label: 'Normal', value: 'none' },
							{ label: 'New Tab', value: 'new_tab' },
							{ label: 'Modal Media', value: 'modal_media' },
						]}
						onChange={(newValue) =>
							props.setAttributes({ groupLinkType: newValue })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
			</PanelBody>
			<PanelBody title="FlexLine Visibility">
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>
		{getContentShiftControls(props)}
	</Fragment>
);

export const getClasses = (attributes) => {
	let added = '';
	const removed = [
		'group-link-type-none',
		'group-link-type-new_tab',
		'group-link-type-modal_media',
		'group-link-type-self',
	];
	if (attributes.enableGroupLink) {
		const linkType = attributes.groupLinkType || 'self';
		added += ` group-link group-link-type-${linkType}`;
	}
	return { added, removed };
};

export default { controls, getClasses };
