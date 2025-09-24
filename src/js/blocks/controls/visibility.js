import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Visibility">
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>
	</Fragment>
);

export default { controls };
