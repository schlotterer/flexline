import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl, SelectControl } from '@wordpress/components';

export const controls = (BlockEdit, props) => (
    <Fragment>
        <BlockEdit {...props} />
        <InspectorControls>
            <PanelBody title="FlexLine Options">
                <SelectControl
                    label="Icon Type"
                    value={props.attributes.iconType}
                    options={[
                        { label: 'None', value: 'none' },
                        { label: 'Internal Link →', value: 'internal-link' },
                        { label: 'Download ⤓', value: 'download' },
                        { label: 'Play Video ►', value: 'video-play' },
                        { label: 'Open Modal ⤢', value: 'open-modal' },
                        { label: 'Link Out ↗', value: 'link-out' },
                    ]}
                    onChange={(newValue) => props.setAttributes({ iconType: newValue })}
                    __nextHasNoMarginBottom={true}
                />
                <ToggleControl
                    label="Open Link in a Modal"
                    checked={!!props.attributes.enableModal}
                    onChange={(newValue) =>
                        props.setAttributes({ enableModal: newValue })
                    }
                />
                <ToggleControl
                    label="Do not allow text to wrap unless there is a return or break"
                    checked={!!props.attributes.noWrap}
                    onChange={(newValue) =>
                        props.setAttributes({ noWrap: newValue })
                    }
                />
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

export const getClasses = (attributes) => {
    const removed = ['flexline-icon'];
    let added = '';
    if (attributes.enableModal) {
        added += ' enable-modal';
    }
    if (attributes.iconType && attributes.iconType !== 'none') {
        added += ` flexline-icon-${attributes.iconType}`;
    }
    if (attributes.noWrap) {
        added += ' nowrap';
    }
    return { removed, added };
};

export default { controls, getClasses };
