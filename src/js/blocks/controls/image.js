import { Fragment } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { getVisibilityControls, getContentShiftControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Options">
				<ToggleControl
					label="Enable Lazy Load"
					checked={!!props.attributes.enableLazyLoad}
					onChange={(newValue) =>
						props.setAttributes({ enableLazyLoad: newValue })
					}
				/>
				<ToggleControl
					label="Open a Modal"
					checked={!!props.attributes.enableModal}
					onChange={(newValue) =>
						props.setAttributes({ enableModal: newValue })
					}
				/>
				{props.attributes.enableModal && (
					<URLInput
						label="Modal Media URL"
						value={props.attributes.modalMediaURL}
						onChange={(newValue) =>
							props.setAttributes({ modalMediaURL: newValue })
						}
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
	if (attributes.enableModal) {
		added += ' enable-modal';
	}
	if (attributes.enableLazyLoad === false) {
		added += ' no-lazy-load';
	}
	return { added };
};

export default { controls, getClasses };
