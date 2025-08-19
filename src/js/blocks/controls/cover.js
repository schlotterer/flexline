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
                    label="Enable Lazy Load"
                    checked={!!props.attributes.enableLazyLoad}
                    onChange={(newValue) =>
                        props.setAttributes({ enableLazyLoad: newValue })
                    }
                />
                {getVisibilityControls(props)}
            </PanelBody>
        </InspectorControls>
    </Fragment>
);

export const getClasses = (attributes) => {
    let added = '';
    if (attributes.enableLazyLoad === false) {
        added += ' no-lazy-load';
    }
    return { added };
};

export default { controls, getClasses };
