// Accessing WordPress packages from the 'wp' global object
const { addFilter }                  = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { Fragment }                   = wp.element;
const { InspectorControls }          = wp.blockEditor;
const { PanelBody, ToggleControl, ToolsPanel, SelectControl, ToolsPanelItem } = wp.components;
const { URLInput } = wp.blockEditor;

// Define custom attributes
const customModalAttributes = {
	enableModal: {
		type: 'boolean',
		default: false,
			},
			modalMediaURL: {
				type: 'string',
				default: '',
					},
					};

					// Filter function to add custom attributes to blocks
					function addCustomButtonAttributes(settings, name) {
							// Target specific blocks
						if (name === 'core/button') {
							settings.attributes = {
									...settings.attributes,
									...customModalAttributes,
									...customVisibilityAttributes,
							};
						}
						return settings;
					}

					// Filter function to add custom attributes to blocks
					function addCustomButtonsAttributes(settings, name) {
						// Target specific blocks
						if (name === 'core/buttons') {
							settings.attributes = {
								...settings.attributes,
								...customVisibilityAttributes,
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
								function addCustomImageAttributes(settings, name) {
										// Target specific blocks
									if (name === 'core/image') {
										settings.attributes = {
														...settings.attributes,
														...customModalAttributes,
														...customLazyAttributes,
														...customVisibilityAttributes,
										};
									}
									return settings;
								}

								// Filter function to add custom attributes to blocks
								function addCustomCoverAttributes(settings, name) {
									// Target specific blocks
									if (name === 'core/cover') {
										settings.attributes = {
													...settings.attributes,
													...customLazyAttributes,
													...customVisibilityAttributes,
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
											const customHorizontalScrollAttributes = {
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
																	...customHorizontalScrollAttributes,
																	...customVisibilityAttributes,
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
																								...customVisibilityAttributes,
																							};
																						}
																						return settings;
																					}

																					const customVisibilityAttributes = {
																						stackAtTablet: {
																							type: 'boolean',
																							default: false,
																								},
																								hideOnDesktop: {
																									type: 'boolean',
																									default: false,
																										},
																										hideOnTablet: {
																											type: 'boolean',
																											default: false,
																												},
																												hideOnMobile: {
																													type: 'boolean',
																													default: false,
																														},
																														};
																														function addCustomVisibilityAttributes(settings, name) {
																															if (['core/column', 'core/columns', 'core/spacer', 'core/paragraph', 'core/heading', 'core/video', 'core/site-logo', 'core/post-featured-image', 'core/embed', 'core/html', 'core/social-link', 'core/social-links'].includes( name )) {
																																// Extend the existing attributes with custom visibility attributes
																																settings.attributes = {
																																	...settings.attributes,
																																	...customVisibilityAttributes,
																																};
																															}
																															return settings;
																														}



																														// Higher Order Component to add custom controls
																														const withCustomControls = createHigherOrderComponent(
																															(BlockEdit) => {
																																return (props) => {
                                                                                                                            // Only show on specific blocks
																																	if (props.name === 'core/image') {
																																					return (
																																					< Fragment >
																																					< BlockEdit {...props} / >
																																					< InspectorControls >
																																					< PanelBody title = "Flexline Options" >
																																					< ToggleControl
																																					label             = "Enable Lazy Load"
																																					checked           = { ! ! props.attributes.enableLazyLoad}
																																					onChange          = {(newValue) => props.setAttributes( { enableLazyLoad: newValue } )}
																																					/ >
																																					< ToggleControl
																																					label             = "Enable Mixed Media Modal"
																																					checked           = { ! ! props.attributes.enableModal}
																																					onChange          = {(newValue) => props.setAttributes( { enableModal: newValue } )}
																																					/ >
																																					{props.attributes.enableModal && (
																																						< URLInput
																																						label         = "Modal Media URL"
																																						value         = {props.attributes.modalMediaURL}
																																						onChange      = {(newValue) => props.setAttributes( { modalMediaURL: newValue } )}
																																						/ >
																																					)}
																																					< ToggleControl
																																					label    = "Hide on Desktop"
																																					checked  = { ! ! props.attributes.hideOnDesktop}
																																					onChange = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																					/ >
																																					< ToggleControl
																																					label    = "Hide on Tablet"
																																					checked  = { ! ! props.attributes.hideOnTablet}
																																					onChange = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																					/ >
																																					< ToggleControl
																																					label    = "Hide on Mobile"
																																					checked  = { ! ! props.attributes.hideOnMobile}
																																					onChange = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																					/ >
																																					< / PanelBody >
																																					< / InspectorControls >
																																					< / Fragment >
																																										);
																																		}
																																	// Only show on specific blocks
																																	if (props.name === 'core/cover') {
																																			return (
																																			< Fragment >
																																			< BlockEdit {...props} / >
																																			< InspectorControls >
																																			< PanelBody title = "Flexline Options" >
																																			< ToggleControl
																																			label             = "Enable Lazy Load"
																																			checked           = { ! ! props.attributes.enableLazyLoad}
																																			onChange          = {(newValue) => props.setAttributes( { enableLazyLoad: newValue } )}
																																			/ >
																																			< ToggleControl
																																			label             = "Hide on Desktop"
																																			checked           = { ! ! props.attributes.hideOnDesktop}
																																			onChange          = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																			/ >
																																			< ToggleControl
																																			label             = "Hide on Tablet"
																																			checked           = { ! ! props.attributes.hideOnTablet}
																																			onChange          = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																			/ >
																																			< ToggleControl
																																			label             = "Hide on Mobile"
																																			checked           = { ! ! props.attributes.hideOnMobile}
																																			onChange          = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																			/ >
																																			< / PanelBody >
																																			< / InspectorControls >
																																			< / Fragment >
																																								);
																																		}
																																	// Only show on specific blocks
																																	if (props.name === 'core/buttons') {
																																						return (
																																						< Fragment >
																																						< BlockEdit {...props} / >
																																						< InspectorControls >
																																						< PanelBody title = "Flexline Options" >
																																						< ToggleControl
																																						label             = "Hide on Desktop"
																																						checked           = { ! ! props.attributes.hideOnDesktop}
																																						onChange          = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																						/ >
																																						< ToggleControl
																																						label             = "Hide on Tablet"
																																						checked           = { ! ! props.attributes.hideOnTablet}
																																						onChange          = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																						/ >
																																						< ToggleControl
																																						label             = "Hide on Mobile"
																																						checked           = { ! ! props.attributes.hideOnMobile}
																																						onChange          = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																						/ >
																																						< / PanelBody >
																																						< / InspectorControls >
																																						< / Fragment >
																																						);
																																		}
																																	if (props.name === 'core/button') {
																																				return (
																																				< Fragment >
																																				< BlockEdit {...props} / >
																																				< InspectorControls >
																																				< PanelBody title = "Flexline Options" >
																																				< ToggleControl
																																				label             = "Enable Mixed Media Modal"
																																				checked           = { ! ! props.attributes.enableModal}
																																				onChange          = {(newValue) => props.setAttributes( { enableModal: newValue } )}
																																				/ >
																																				< ToggleControl
																																				label             = "Hide on Desktop"
																																				checked           = { ! ! props.attributes.hideOnDesktop}
																																				onChange          = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																				/ >
																																				< ToggleControl
																																				label             = "Hide on Tablet"
																																				checked           = { ! ! props.attributes.hideOnTablet}
																																				onChange          = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																				/ >
																																				< ToggleControl
																																				label             = "Hide on Mobile"
																																				checked           = { ! ! props.attributes.hideOnMobile}
																																				onChange          = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																				/ >
																																				< / PanelBody >
																																				< / InspectorControls >
																																				< / Fragment >
																																				);
																																		}
																																	if (props.name === 'core/gallery') {
																																		return (
																																		< Fragment >
																																		< BlockEdit {...props} / >
																																		< InspectorControls >
																																		< PanelBody title = "Flexline Options" >
																																		< ToggleControl
																																		label             = "Enable Poster Gallery"
																																		checked           = { ! ! props.attributes.enablePosterGallery}
																																		onChange          = {(newValue) => props.setAttributes( { enablePosterGallery: newValue } )}
																																		/ >
																																		< / PanelBody >
																																		< / InspectorControls >
																																		< / Fragment >
																																		);
																																		}
																																	if (props.name === 'core/navigation') {
																																		return (
																																		< Fragment >
																																		< BlockEdit {...props} / >
																																		< InspectorControls >
																																		< PanelBody title = "Flexline Options" >
																																		< ToggleControl
																																		label             = "Enable Horizontal Scroll at Mobile"
																																		checked           = { ! ! props.attributes.enableHorizontalScroll}
																																		onChange          = {(newValue) => props.setAttributes( { enableHorizontalScroll: newValue } )}
																																		/ >
																																		< ToggleControl
																																		label             = "Hide on Desktop"
																																		checked           = { ! ! props.attributes.hideOnDesktop}
																																		onChange          = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																		/ >
																																		< ToggleControl
																																		label             = "Hide on Tablet"
																																		checked           = { ! ! props.attributes.hideOnTablet}
																																		onChange          = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																		/ >
																																		< ToggleControl
																																		label             = "Hide on Mobile"
																																		checked           = { ! ! props.attributes.hideOnMobile}
																																		onChange          = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																		/ >
																																		< / PanelBody >
																																		< / InspectorControls >
																																		< / Fragment >
																																		);
																																		}
																																	if (props.name === 'core/group') {
																																		return (
																																		< Fragment >
																																		< BlockEdit {...props} / >
																																		< InspectorControls >
																																		< PanelBody title = "Flexline Options" >
																																		< ToggleControl
																																		label             = "Enable Group Link"
																																		checked           = { ! ! props.attributes.enableGroupLink}
																																		onChange          = {(newValue) => props.setAttributes( { enableGroupLink: newValue } )}
																																		/ >
																																		{props.attributes.enableGroupLink && (
																																			< URLInput
																																			label         = "Group Link URL"
																																			value         = {props.attributes.groupLinkURL}
																																			onChange      = {(newValue) => props.setAttributes( { groupLinkURL: newValue } )}
																																			/ >
																																		)}
																																		{props.attributes.enableGroupLink && (
																																			< SelectControl
																																			label   = "Link Type"
																																			value   = {props.attributes.groupLinkType}
																																			options = {[
																																				{ label: 'Normal', value: 'none' },
																																				{ label: 'New Tab', value: 'new_tab' },
																																				{ label: 'Modal Media', value: 'modal_media' },
																																				]}
																																		onChange    = {(newValue) => props.setAttributes( { groupLinkType: newValue } )}
																																		/ >
																																		)}
																																		< ToggleControl
																																		label    = "Hide on Desktop"
																																		checked  = { ! ! props.attributes.hideOnDesktop}
																																		onChange = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																		/ >
																																		< ToggleControl
																																		label    = "Hide on Tablet"
																																		checked  = { ! ! props.attributes.hideOnTablet}
																																		onChange = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																		/ >
																																		< ToggleControl
																																		label    = "Hide on Mobile"
																																		checked  = { ! ! props.attributes.hideOnMobile}
																																		onChange = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																		/ >
																																		< / PanelBody >

																																		< / InspectorControls >
																																		< / Fragment >
																																		);
																																		}
																																	if ([
																																	'core/column',
																																	'core/columns',
																																	'core/spacer',
																																	'core/paragraph',
																																	'core/heading',
																																	'core/video',
																																	'core/site-logo',
																																	'core/post-featured-image',
																																	'core/embed',
																																	'core/navigation-submenu',
																																	'core/navigation-link',
																																	'core/html',
																																	'core/social-link',
																																	'core/social-links'
																																	].includes( props.name )) {
																																	return (
																																	< Fragment >
																																	< BlockEdit {...props} / >
																																	< InspectorControls >
																																	< PanelBody title        = "Flexline Options" >
																																	{props.name === 'core/columns' && (
																																					< ToggleControl
																																					label    = "Stack at Tablet"
																																					checked  = { ! ! props.attributes.stackAtTablet}
																																					onChange = {(newValue) => props.setAttributes( { stackAtTablet: newValue } )}
																																					/ >
																																				)}
																																	< ToggleControl
																																	label    = "Hide on Desktop"
																																	checked  = { ! ! props.attributes.hideOnDesktop}
																																	onChange = {(newValue) => props.setAttributes( { hideOnDesktop: newValue } )}
																																	/ >
																																	< ToggleControl
																																	label    = "Hide on Tablet"
																																	checked  = { ! ! props.attributes.hideOnTablet}
																																	onChange = {(newValue) => props.setAttributes( { hideOnTablet: newValue } )}
																																	/ >
																																	< ToggleControl
																																	label    = "Hide on Mobile"
																																	checked  = { ! ! props.attributes.hideOnMobile}
																																	onChange = {(newValue) => props.setAttributes( { hideOnMobile: newValue } )}
																																	/ >
																																	< / PanelBody >
																																	< / InspectorControls >
																																	< / Fragment >
																																										);
																																	}
																																	return < BlockEdit {...props} / > ;
																																};
																															},
																															'withCustomControls'
																														);

																																	// Hook filters
																																	addFilter(
																																		'blocks.registerBlockType',
																																		'flexline/add-custom-attributes',
																																		addCustomButtonAttributes
																																	);

																																	// Hook filters
																																	addFilter(
																																		'blocks.registerBlockType',
																																		'flexline/add-custom-attributes',
																																		addCustomButtonsAttributes
																																	);

																																	// Hook filters
																																	addFilter(
																																		'blocks.registerBlockType',
																																		'flexline/add-custom-attributes',
																																		addCustomImageAttributes
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
																																		addCustomVisibilityAttributes
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
