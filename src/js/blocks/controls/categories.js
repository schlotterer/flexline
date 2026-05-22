import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

export const controls = (BlockEdit, props) => {
	const { attributes, setAttributes } = props;

	return (
		<Fragment>
			<BlockEdit {...props} />
			<InspectorControls>
				<PanelBody title="FlexLine Categories" initialOpen={false}>
					<ToggleControl
						label="Show primary term only"
						help="When viewing a singular post, limit terms to its resolved primary term for the selected taxonomy."
						checked={!!attributes.flexlinePrimaryTermOnly}
						onChange={(value) =>
							setAttributes({ flexlinePrimaryTermOnly: value })
						}
					/>
				</PanelBody>
			</InspectorControls>
		</Fragment>
	);
};

export default { controls };
