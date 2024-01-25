// Accessing WordPress packages from the 'wp' global object
const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl, TextControl, ToolsPanel, ToolsPanelItem } = wp.components;

// Define custom attributes
const customAttributes = {
    enablePopup: {
        type: 'boolean',
        default: false,
    },
    popupMediaURL: {
        type: 'string',
        default: '',
    },
};

// Filter function to add custom attributes to blocks
function addCustomAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/image' || name === 'core/button') {
        settings.attributes = {
            ...settings.attributes,
            ...customAttributes,
        };
    }
    return settings;
}

// Higher Order Component to add custom controls
const withCustomControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        // Only show on specific blocks
        if (props.name === 'core/image' || props.name === 'core/button') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Mixed Media Popup Settings">
                            <ToggleControl
                                label="Enable Mixed Media Popup"
                                checked={!!props.attributes.enablePopup}
                                onChange={(newValue) => props.setAttributes({ enablePopup: newValue })}
                            />
                            {props.attributes.enablePopup && (
                                <TextControl
                                    label="Popup Media URL"
                                    value={props.attributes.popupMediaURL}
                                    onChange={(newValue) => props.setAttributes({ popupMediaURL: newValue })}
                                />
                            )}
                        </PanelBody>
                    </InspectorControls>
                </Fragment>
            );
        }
        return <BlockEdit {...props} />;
    };
}, 'withCustomControls');

// Hook filters
addFilter(
    'blocks.registerBlockType',
    'flexline/add-custom-attributes',
    addCustomAttributes
);

addFilter(
    'editor.BlockEdit',
    'flexline/with-custom-controls',
    withCustomControls
);
