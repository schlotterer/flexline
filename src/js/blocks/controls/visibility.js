import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

export const controls = (BlockEdit, props) => (
    <Fragment>
        <BlockEdit {...props} />
        <InspectorControls>
            <PanelBody title="FlexLine Visibility">
                <ToggleControl
                    label="Hide on Desktop"
                    checked={!!props.attributes.hideOnDesktop}
                    onChange={(newValue) =>
                        props.setAttributes({ hideOnDesktop: newValue })
                    }
                />
                <ToggleControl
                    label="Hide on Tablet"
                    checked={!!props.attributes.hideOnTablet}
                    onChange={(newValue) =>
                        props.setAttributes({ hideOnTablet: newValue })
                    }
                />
                <ToggleControl
                    label="Hide on Mobile"
                    checked={!!props.attributes.hideOnMobile}
                    onChange={(newValue) =>
                        props.setAttributes({ hideOnMobile: newValue })
                    }
                />
            </PanelBody>
        </InspectorControls>
    </Fragment>
);

export default { controls };
