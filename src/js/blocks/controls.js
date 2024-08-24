// Import necessary WordPress packages and utilities
const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, SelectControl } = wp.components;
const { URLInput } = wp.blockEditor;

// Import utilities for visibility controls and responsive classes
import { getVisibilityControls, getResponsiveClasses } from './utilities';

const withCustomControls = createHigherOrderComponent((BlockEdit) => {
	return (props) => {
		const { name, attributes, setAttributes } = props;
		const blockProps = {
			className: getResponsiveClasses(attributes),
		};

		const renderVisibilityControls = () => (
			<PanelBody title="Flexline Visibility Options">
				{getVisibilityControls({ attributes, setAttributes })}
			</PanelBody>
		);

		// Define control panels for specific blocks
		const getPanelBodyContent = () => {
			switch (name) {
				case 'core/image':
					return (
						<>
							<ToggleControl
								label="Enable Lazy Load"
								checked={!!attributes.enableLazyLoad}
								onChange={(newValue) =>
									setAttributes({ enableLazyLoad: newValue })
								}
							/>
							<ToggleControl
								label="Open a Modal"
								checked={!!attributes.enableModal}
								onChange={(newValue) =>
									setAttributes({ enableModal: newValue })
								}
							/>
							{attributes.enableModal && (
								<URLInput
									label="Modal Media URL"
									value={attributes.modalMediaURL}
									onChange={(newValue) =>
										setAttributes({
											modalMediaURL: newValue,
										})
									}
								/>
							)}
							{renderVisibilityControls()}
						</>
					);
				case 'core/cover':
					return (
						<>
							<ToggleControl
								label="Enable Lazy Load"
								checked={!!attributes.enableLazyLoad}
								onChange={(newValue) =>
									setAttributes({ enableLazyLoad: newValue })
								}
							/>
							{renderVisibilityControls()}
						</>
					);
				case 'core/buttons':
					return renderVisibilityControls();
				case 'core/button':
					return (
						<>
							<SelectControl
								label="Icon Type"
								value={attributes.iconType}
								options={[
									{ label: 'None', value: 'none' },
									{
										label: 'Internal Link →',
										value: 'internal-link',
									},
									{ label: 'Download ⤓', value: 'download' },
									{
										label: 'Play Video ►',
										value: 'video-play',
									},
									{
										label: 'Open Modal ⤢',
										value: 'open-modal',
									},
									{ label: 'Link Out ↗', value: 'link-out' },
								]}
								onChange={(newValue) =>
									setAttributes({ iconType: newValue })
								}
							/>
							<ToggleControl
								label="Open Link in a Modal"
								checked={!!attributes.enableModal}
								onChange={(newValue) =>
									setAttributes({ enableModal: newValue })
								}
							/>
							{renderVisibilityControls()}
						</>
					);
				case 'core/group':
					return (
						<>
							<ToggleControl
								label="Enable Group Link"
								checked={!!attributes.enableGroupLink}
								onChange={(newValue) =>
									setAttributes({ enableGroupLink: newValue })
								}
							/>
							{attributes.enableGroupLink && (
								<>
									<URLInput
										label="Group Link URL"
										value={attributes.groupLinkURL}
										onChange={(newValue) =>
											setAttributes({
												groupLinkURL: newValue,
											})
										}
									/>
									<SelectControl
										label="Link Type"
										value={attributes.groupLinkType}
										options={[
											{ label: 'Normal', value: 'none' },
											{
												label: 'New Tab',
												value: 'new_tab',
											},
											{
												label: 'Modal Media',
												value: 'modal_media',
											},
										]}
										onChange={(newValue) =>
											setAttributes({
												groupLinkType: newValue,
											})
										}
									/>
								</>
							)}
							{renderVisibilityControls()}
						</>
					);
				// Add more cases for other block types as needed
				default:
					return renderVisibilityControls();
			}
		};

		return (
			<Fragment>
				<BlockEdit {...props} {...blockProps} />
				<InspectorControls>{getPanelBodyContent()}</InspectorControls>
			</Fragment>
		);
	};
}, 'withCustomControls');

// Apply Controls filter
addFilter(
	'editor.BlockEdit',
	'flexline/with-custom-controls',
	withCustomControls
);
