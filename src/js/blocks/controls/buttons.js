import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import {
	getVisibilityControls,
	shouldShowFlexlineVisibilityPanel,
} from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		{shouldShowFlexlineVisibilityPanel() && (
			<InspectorControls>
				<PanelBody title="FlexLine Options">
					{getVisibilityControls(props)}
				</PanelBody>
			</InspectorControls>
		)}
	</Fragment>
);

export default { controls };
