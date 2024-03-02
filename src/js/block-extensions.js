// Accessing WordPress packages from the 'wp' global object
const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl, TextControl, ToolsPanel, SelectControl, ToolsPanelItem } = wp.components;

// Define custom attributes
const customPopUpAttributes = {
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
function addButtonAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/button') {
        settings.attributes = {
            ...settings.attributes,
            ...customPopUpAttributes,
        };
    }
    return settings;
}

// Filter function to add custom attributes to blocks
function addImageAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/image') {
        settings.attributes = {
            ...settings.attributes,
            ...customPopUpAttributes,
            ...customLazyAttributes,
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
const customNavigationAttributes = {
    enableHorizontalScroll: {
        type: 'boolean',
        default: false,
    },
};
// Filter function to add custom attributes to blocks
function addCustomNavigationAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/navigation') {
        settings.attributes = {
            ...settings.attributes,
            ...customNavigationAttributes,
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
    groupLinkType: {
        type: 'string',
        default: 'none', // Default to 'none' indicating no link or an unselected state
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


// Define custom attributes
const customLazyAttributes = {
    enableLazyLoad: {
        type: 'boolean',
        default: true,
    }
};

// Filter function to add custom attributes to blocks
function addCustomCoverAttributes(settings, name) {
    // Target specific blocks
    if (name === 'core/cover') {
        settings.attributes = {
            ...settings.attributes,
            ...customLazyAttributes,
        };
    }
    return settings;
}



// Higher Order Component to add custom controls
const withCustomControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        // Only show on specific blocks
        if (props.name === 'core/image') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Flexline Options">
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
                            <ToggleControl
                                label="Enable Lazy Load"
                                checked={!!props.attributes.enableLazyLoad}
                                onChange={(newValue) => props.setAttributes({ enableLazyLoad: newValue })}
                            />
                        </PanelBody>
                    </InspectorControls>
                </Fragment>
            );
        }
        // Only show on specific blocks
        if (props.name === 'core/cover') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Flexline Options">
                            <ToggleControl
                                label="Enable Lazy Load"
                                checked={!!props.attributes.enableLazyLoad}
                                onChange={(newValue) => props.setAttributes({ enableLazyLoad: newValue })}
                            />
                        </PanelBody>
                    </InspectorControls>
                </Fragment>
            );
        }
        // Only show on specific blocks
        if (props.name === 'core/button') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Flexline Options">
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
                        <PanelBody title="Flexline Options">
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
        if (props.name === 'core/navigation') {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Flexline Options">
                            <ToggleControl
                                label="Enable Horizontal Scroll at Mobile"
                                checked={!!props.attributes.enableHorizontalScroll}
                                onChange={(newValue) => props.setAttributes({ enableHorizontalScroll: newValue })}
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
                        <PanelBody title="Flexline Options">
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
                                <SelectControl
                                    label="Link Type"
                                    value={props.attributes.groupLinkType}
                                    options={[
                                        { label: 'Normal', value: 'none' },
                                        { label: 'New Tab', value: 'new_tab' },
                                        { label: 'Popup Media', value: 'popup_media' },
                                    ]}
                                    onChange={(newValue) => props.setAttributes({ groupLinkType: newValue })}
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
    addButtonAttributes
);

// Hook filters
addFilter(
    'blocks.registerBlockType',
    'flexline/add-custom-attributes',
    addImageAttributes
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
    addCustomNavigationAttributes
);

// Hook filters
addFilter(
    'blocks.registerBlockType',
    'flexline/add-custom-attributes',
    addCustomCoverAttributes
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

