import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
    <Fragment>
        <BlockEdit {...props} />
        <InspectorControls>
            <PanelBody title="FlexLine Options">
                <ToggleControl
                    label="Enable Horizontal Scroll at Mobile"
                    checked={!!props.attributes.enableHorizontalScroll}
                    onChange={(newValue) =>
                        props.setAttributes({ enableHorizontalScroll: newValue })
                    }
                />
                {getVisibilityControls(props)}
            </PanelBody>
        </InspectorControls>
    </Fragment>
);

export const getClasses = (attributes) => {
    let added = '';
    if (attributes.enableHorizontalScroll) {
        added += ' is-style-horizontal-scroll-at-mobile';
    }
    return { added };
};

export default { controls, getClasses };
