import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { getVisibilityPanel } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>{getVisibilityPanel(props)}</InspectorControls>
	</Fragment>
);

export default { controls };
