import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

export const controls = (BlockEdit, props) => (
    <Fragment>
        <BlockEdit {...props} />
        <InspectorControls>
            <PanelBody title="FlexLine Options">
                <ToggleControl
                    label="Enable Poster Gallery"
                    checked={!!props.attributes.enablePosterGallery}
                    onChange={(newValue) =>
                        props.setAttributes({ enablePosterGallery: newValue })
                    }
                />
            </PanelBody>
        </InspectorControls>
    </Fragment>
);

export const getClasses = (attributes) => {
    let added = '';
    if (attributes.enablePosterGallery) {
        added += ' poster-gallery';
    }
    return { added };
};

export default { controls, getClasses };
