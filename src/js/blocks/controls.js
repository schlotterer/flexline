// Importing WordPress packages using ES6 module syntax
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { Fragment, useEffect } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import {
    PanelBody,
    ToggleControl,
    SelectControl,
    __experimentalUnitControl as UnitControl,
} from '@wordpress/components';
console.log(wp.components.UnitControl);


// Utility function to generate visibility classes based on attributes
const getVisibilityClasses = (attrs) => {
	let classes = '';
	if (attrs.hideOnMobile) {
		classes += 'flexline-hide-on-mobile ';
	}
	if (attrs.hideOnTablet) {
		classes += 'flexline-hide-on-tablet ';
	}
	if (attrs.hideOnDesktop) {
		classes += 'flexline-hide-on-desktop ';
	}
	return classes.trim();
};

// Utility function to manage class additions and removals
const updateBlockClasses = (
	currentClasses,
	newClasses,
	removedClasses = []
) => {
	let classList = currentClasses.split(' ').filter(Boolean); // Split classes into an array and filter out empty strings

	// Remove each class from the list that needs to be removed
	removedClasses.forEach((removedClass) => {
		// Handle specific logic for flexline-icon-* classes
		if (removedClass === 'flexline-icon') {
			classList = classList.filter(
				(cls) => !cls.startsWith('flexline-icon-')
			); // Remove all flexline-icon-* classes
		} else {
			classList = classList.filter((cls) => cls !== removedClass); // Remove the specific class
		}
	});

	// Add the new classes
	newClasses.split(' ').forEach((newClass) => {
		classList.push(newClass.trim());
	});

	return [...new Set(classList)].join(' ').trim(); // Ensure unique classes and join them back into a string
};

// Set up the Fields
// Higher Order Component to add custom controls
const withCustomControls = createHigherOrderComponent((BlockEdit) => {
	return (props) => {

		console.log(props);

		useEffect(() => {

			// Add the data attribute to the block's wrapper
			// if (!props.wrapperProps) { props.wrapperProps = {}; }
			// Add the custom data attribute
			// props.wrapperProps[`data-unique-id`] = uniqueId;
			
			// Determine which classes, if any, need to be removed
			const removedClasses = [];
			if (!props.attributes.hideOnMobile) {
				removedClasses.push('flexline-hide-on-mobile');
			}
			if (!props.attributes.hideOnTablet) {
				removedClasses.push('flexline-hide-on-tablet');
			}
			if (!props.attributes.hideOnDesktop) {
				removedClasses.push('flexline-hide-on-desktop');
			}
			if (!props.attributes.enableModal) {
				removedClasses.push('enable-modal');
			}
			if (!props.attributes.enableLazyLoad) {
				removedClasses.push('no-lazy-load');
			}
			if (!props.attributes.enablePosterGallery) {
				removedClasses.push('poster-gallery');
			}
			if (!props.attributes.enableHorizontalScroll) {
				removedClasses.push('is-style-horizontal-scroll-at-mobile');
			}
			if (!props.attributes.enableGroupLink) {
				removedClasses.push('group-link');
			}
			// Remove content shift classes if not enabled
			if (!props.attributes.useContentShift) {
				removedClasses.push('flexline-content-shift');
				removedClasses.push('flexline-content-shift-up');
				removedClasses.push('flexline-content-shift-revert-mobile');
			} else {
				// Remove 'flexline-content-shift-up' if not enabled
				if (!props.attributes.shiftToTop) {
					removedClasses.push('flexline-content-shift-up');
				}
				// Remove 'flexline-content-shift-revert-mobile' if not enabled
				if (!props.attributes.resetMobile) {
					removedClasses.push('flexline-content-shift-revert-mobile');
				}
			}
			// Block-specific logic
			// Remove all existing flexline-icon-* classes when a new icon type is selected
			if (props.name === 'core/button') {
				removedClasses.push('flexline-icon'); // This triggers the logic to remove any flexline-icon-* class
			}

			// New Classes
			// Generate the new visibility and other classes
			let newClasses = getVisibilityClasses(props.attributes);
			newClasses += ' flexline-block-id-' + props.clientId;
			// Add content shift classes if enabled
			if (props.attributes.useContentShift) {
				newClasses += ' flexline-content-shift';
			
				// Add 'flexline-content-shift-up' if enabled
				if (props.attributes.shiftToTop) {
				newClasses += ' flexline-content-shift-up';
				}
			
				// Add 'flexline-content-shift-revert-mobile' if enabled
				if (props.attributes.resetMobile) {
				newClasses += ' flexline-content-shift-revert-mobile';
				}
			}
  

			// Block-specific logic
			if (props.name === 'core/button' || props.name === 'core/image') {
				if (props.attributes.enableModal) {
					newClasses += ' enable-modal';
				}
			}

			if (props.name === 'core/button' && props.attributes.iconType) {
				newClasses += ` flexline-icon-${props.attributes.iconType}`;
			}

			if (props.name === 'core/image' || props.name === 'core/cover') {
				if (props.attributes.enableLazyLoad === false) {
					newClasses += ' no-lazy-load';
				}
			}

			if (
				props.name === 'core/gallery' &&
				props.attributes.enablePosterGallery
			) {
				newClasses += ' poster-gallery';
			}

			if (
				props.name === 'core/navigation' &&
				props.attributes.enableHorizontalScroll
			) {
				newClasses += ' is-style-horizontal-scroll-at-mobile';
			}
			if ([
					'core/group', 
					'core/stack', 
					'core/row', 
					'core/grid'
				].includes(props.name)
			) {
				if (props.attributes.enableGroupLink) {
					const linkType = props.attributes.groupLinkType || 'self';
					newClasses += ` group-link group-link-type-${linkType}`;
				}
			}

			if (
				props.name === 'core/columns' &&
				props.attributes.stackAtTablet
			) {
				newClasses += ' flexline-stack-at-tablet';
			}

			// Combine current classes with updated ones, removing the unwanted classes
			const combinedClasses = updateBlockClasses(
				props.attributes.className || '',
				newClasses,
				removedClasses
			);
			props.setAttributes({ className: combinedClasses });
		}, [
			props.attributes.hideOnMobile,
			props.attributes.hideOnTablet,
			props.attributes.hideOnDesktop,
			props.attributes.enableModal,
			props.attributes.iconType,
			props.attributes.enableLazyLoad,
			props.attributes.enablePosterGallery,
			props.attributes.enableHorizontalScroll,
			props.attributes.enableGroupLink,
			props.attributes.groupLinkType,
			props.attributes.stackAtTablet,
			props.attributes.useContentShift,
			props.attributes.horizontalShift,
			props.attributes.verticalShift,
			props.attributes.shiftToTop,
			props.attributes.resetMobile,
			props.name,
			props,
		]);

		// Only show on specific blocks
		if (props.name === 'core/image') {
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody title="Flexline Options">
							<ToggleControl
								label="Enable Lazy Load"
								checked={!!props.attributes.enableLazyLoad}
								onChange={(newValue) =>
									props.setAttributes({
										enableLazyLoad: newValue,
									})
								}
							/>
							<ToggleControl
								label="Open a Modal"
								checked={!!props.attributes.enableModal}
								onChange={(newValue) =>
									props.setAttributes({
										enableModal: newValue,
									})
								}
							/>
							{props.attributes.enableModal && (
								<URLInput
									label="Modal Media URL"
									value={props.attributes.modalMediaURL}
									onChange={(newValue) =>
										props.setAttributes({
											modalMediaURL: newValue,
										})
									}
								/>
							)}
						</PanelBody>
						<PanelBody title="Flexline Visibility">
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
					<InspectorControls group="styles">
						<PanelBody title="Flexline Content Shift">
							<ToggleControl
								label="Use Content Shift"
								checked={!!props.attributes.useContentShift}
								onChange={(newValue) =>
									props.setAttributes({
										useContentShift: newValue,
									})
								}
							/>
							{props.attributes.useContentShift && (
								<SelectControl
									label="Horizontal Shift"
									value={props.attributes.horizontalShift}
									options={[
										{ label: 'None', value: 'none' },
										{ label: 'Left', value: 'left' },
										{ label: 'Right', value: 'right' },
									]}
									onChange={(value) =>
										props.setAttributes({
											horizontalShift: value,
										})
									}
									__nextHasNoMarginBottom={true}
								/>
							)}
							{props.attributes.horizontalShift !== 'none' && (
								<UnitControl
									label="Horizontal Shift Amount"
									value={
										props.attributes.horizontalShiftAmount
									}
									onChange={(value) =>
										props.setAttributes({
											horizontalShiftAmount: value,
										})
									}
									units={[
										{ value: 'px', label: 'px' },
										{ value: '%', label: '%' },
										{ value: 'em', label: 'em' },
										{ value: 'rem', label: 'rem' },
										{ value: 'vw', label: 'vw' },
										{ value: 'vh', label: 'vh' },
									]}
								/>
							)}
							{props.attributes.useContentShift && (
								<SelectControl
									label="Vertical Shift"
									value={props.attributes.verticalShift}
									options={[
										{ label: 'None', value: 'none' },
										{ label: 'Up', value: 'up' },
										{ label: 'Down', value: 'down' },
									]}
									onChange={(value) =>
										props.setAttributes({
											verticalShift: value,
										})
									}
									__nextHasNoMarginBottom={true}
								/>
							)}
							{props.attributes.verticalShift !== 'none' && (
								<UnitControl
									label="Vertical Shift Amount"
									value={props.attributes.verticalShiftAmount}
									onChange={(value) =>
										props.setAttributes({
											verticalShiftAmount: value,
										})
									}
									units={[
										{ value: 'px', label: 'px' },
										{ value: '%', label: '%' },
										{ value: 'em', label: 'em' },
										{ value: 'rem', label: 'rem' },
										{ value: 'vw', label: 'vw' },
										{ value: 'vh', label: 'vh' },
									]}
								/>
							)}
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Shift to Top (z-index)"
									checked={props.attributes.shiftToTop}
									onChange={(value) =>
										props.setAttributes({
											shiftToTop: value,
										})
									}
								/>
							)}
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Restore Normal on Mobile"
									checked={props.attributes.resetMobile}
									onChange={(value) =>
										props.setAttributes({
											resetMobile: value,
										})
									}
								/>
							)}
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
								onChange={(newValue) =>
									props.setAttributes({
										enableLazyLoad: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		// Only show on specific blocks
		if (props.name === 'core/buttons') {
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody title="Flexline Options">
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		if (props.name === 'core/button') {
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody title="Flexline Options">
							<SelectControl
								label="Icon Type"
								value={props.attributes.iconType}
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
									// Add more options as needed
								]}
								onChange={(newValue) =>
									props.setAttributes({
										iconType: newValue,
									})
								}
								__nextHasNoMarginBottom={true}
							/>
							<ToggleControl
								label="Open Link in a Modal"
								checked={!!props.attributes.enableModal}
								onChange={(newValue) =>
									props.setAttributes({
										enableModal: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
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
								onChange={(newValue) =>
									props.setAttributes({
										enablePosterGallery: newValue,
									})
								}
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
								checked={
									!!props.attributes.enableHorizontalScroll
								}
								onChange={(newValue) =>
									props.setAttributes({
										enableHorizontalScroll: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
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
						<PanelBody title="Flexline Group Link Options">
							<ToggleControl
								label="Enable Group Link"
								checked={!!props.attributes.enableGroupLink}
								onChange={(newValue) =>
									props.setAttributes({
										enableGroupLink: newValue,
									})
								}
							/>
							{props.attributes.enableGroupLink && (
								<URLInput
									label="Group Link URL"
									value={props.attributes.groupLinkURL}
									onChange={(newValue) =>
										props.setAttributes({
											groupLinkURL: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableGroupLink && (
								<SelectControl
									label="Link Type"
									value={props.attributes.groupLinkType}
									options={[
										{ label: 'Normal', value: 'none' },
										{ label: 'New Tab', value: 'new_tab' },
										{
											label: 'Modal Media',
											value: 'modal_media',
										},
									]}
									onChange={(newValue) =>
										props.setAttributes({
											groupLinkType: newValue,
										})
									}
									__nextHasNoMarginBottom={true}
								/>
							)}
						</PanelBody>
						<PanelBody title="Flexline Visibility">
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
					<InspectorControls group="styles">
						<PanelBody title="Flexline Content Shift">
							<ToggleControl
								label="Use Content Shift"
								checked={!!props.attributes.useContentShift}
								onChange={(newValue) =>
									props.setAttributes({
										useContentShift: newValue,
									})
								}
							/>
							{props.attributes.useContentShift && (
								<SelectControl
									label="Horizontal Shift"
									value={props.attributes.horizontalShift}
									options={[
										{ label: 'None', value: 'none' },
										{ label: 'Left', value: 'left' },
										{ label: 'Right', value: 'right' },
									]}
									onChange={(value) =>
										props.setAttributes({
											horizontalShift: value,
										})
									}
									__nextHasNoMarginBottom={true}
								/>
							)}
							{props.attributes.horizontalShift !== 'none' && (
								<UnitControl
									label="Horizontal Shift Amount"
									value={
										props.attributes.horizontalShiftAmount
									}
									onChange={(value) =>
										props.setAttributes({
											horizontalShiftAmount: value,
										})
									}
									units={[
										{ value: 'px', label: 'px' },
										{ value: '%', label: '%' },
										{ value: 'em', label: 'em' },
										{ value: 'rem', label: 'rem' },
										{ value: 'vw', label: 'vw' },
										{ value: 'vh', label: 'vh' },
									]}
								/>
							)}
							{props.attributes.useContentShift && (
								<SelectControl
									label="Vertical Shift"
									value={props.attributes.verticalShift}
									options={[
										{ label: 'None', value: 'none' },
										{ label: 'Up', value: 'up' },
										{ label: 'Down', value: 'down' },
									]}
									onChange={(value) =>
										props.setAttributes({
											verticalShift: value,
										})
									}
									__nextHasNoMarginBottom={true}
								/>
							)}
							{props.attributes.verticalShift !== 'none' && (
								<UnitControl
									label="Vertical Shift Amount"
									value={props.attributes.verticalShiftAmount}
									onChange={(value) =>
										props.setAttributes({
											verticalShiftAmount: value,
										})
									}
									units={[
										{ value: 'px', label: 'px' },
										{ value: '%', label: '%' },
										{ value: 'em', label: 'em' },
										{ value: 'rem', label: 'rem' },
										{ value: 'vw', label: 'vw' },
										{ value: 'vh', label: 'vh' },
									]}
								/>
							)}
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Shift to Top (z-index)"
									checked={props.attributes.shiftToTop}
									onChange={(value) =>
										props.setAttributes({
											shiftToTop: value,
										})
									}
								/>
							)}
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Restore Normal on Mobile"
									checked={props.attributes.resetMobile}
									onChange={(value) =>
										props.setAttributes({
											resetMobile: value,
										})
									}
								/>
							)}
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		if (
			[
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
				'core/social-links',
			].includes(props.name)
		) {
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody title="Flexline Visibility">
							{props.name === 'core/columns' && (
								<ToggleControl
									label="Stack at Tablet"
									checked={!!props.attributes.stackAtTablet}
									onChange={(newValue) =>
										props.setAttributes({
											stackAtTablet: newValue,
										})
									}
								/>
							)}
							<ToggleControl
								label="Hide on Desktop"
								checked={!!props.attributes.hideOnDesktop}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnDesktop: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Tablet"
								checked={!!props.attributes.hideOnTablet}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnTablet: newValue,
									})
								}
							/>
							<ToggleControl
								label="Hide on Mobile"
								checked={!!props.attributes.hideOnMobile}
								onChange={(newValue) =>
									props.setAttributes({
										hideOnMobile: newValue,
									})
								}
							/>
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		return <BlockEdit {...props} />;
	};
}, 'withCustomControls');
// Apply Controls filter
addFilter(
	'editor.BlockEdit',
	'flexline/with-custom-controls',
	withCustomControls
);
