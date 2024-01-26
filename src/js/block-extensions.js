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

// Define custom attributes
const customGalleryAttributes = {
    enablePosterGallery: {
        type: 'boolean',
        default: false,
    },
};
// Filter function to add custom attributes to blocks
function addCustomGalleryAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/gallery') {
        settings.attributes = {
            ...settings.attributes,
            ...customGalleryAttributes,
        };
    }
    return settings;
}



// Define custom attributes
const customGroupAttributes = {
    enableGroupLink: {
        type: 'boolean',
        default: false,
    },
    groupLinkURL: {
        type: 'string',
        default: '',
    },
    linkNewTab: {
        type: 'boolean',
        default: false,
    },
};
// Filter function to add custom attributes to blocks
function addCustomGroupAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/group') {
        settings.attributes = {
            ...settings.attributes,
            ...customGroupAttributes,
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
        if (props.name === 'core/gallery') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Poster Gallery Settings">
                            <ToggleControl
                                label="Enable Poster Gallery"
                                checked={!!props.attributes.enablePosterGallery}
                                onChange={(newValue) => props.setAttributes({ enablePosterGallery: newValue })}
                            />
                        </PanelBody>
                    </InspectorControls>
                </Fragment>
            );
        }
        if (props.name === 'core/group') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Group Link">
                            <ToggleControl
                                label="Enable Group Link"
                                checked={!!props.attributes.enableGroupLink}
                                onChange={(newValue) => props.setAttributes({ enableGroupLink: newValue })}
                            />
                            {props.attributes.enableGroupLink && (
                                <TextControl
                                    label="Group Link URL"
                                    value={props.attributes.groupLinkURL}
                                    onChange={(newValue) => props.setAttributes({ groupLinkURL: newValue })}
                                />
                            )}
                            {props.attributes.enableGroupLink && (
                                <ToggleControl
                                    label="Open Link in New Tab"
                                    checked={!!props.attributes.linkNewTab}
                                    onChange={(newValue) => props.setAttributes({ linkNewTab: newValue })}
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

// Hook filters
addFilter(
    'blocks.registerBlockType',
    'flexline/add-custom-attributes',
    addCustomGalleryAttributes
);

// Hook filters
addFilter(
    'blocks.registerBlockType',
    'flexline/add-custom-attributes',
    addCustomGroupAttributes
);

addFilter(
    'editor.BlockEdit',
    'flexline/with-custom-controls',
    withCustomControls
);
