// Importing WordPress packages using ES6 module syntax
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { Fragment, useEffect, useRef } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	__experimentalUnitControl as UnitControl,
	RangeControl,
} from '@wordpress/components';

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
		const { attributes, clientId } = props;
		// Generate a unique class using clientId
		const uniqueClass = `block-${clientId}`;
		// Reference to keep track of the style element
		const styleElementRef = useRef(null);

		useEffect(() => {
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
			// Scroller
			if (!props.attributes.enableHorizontalScroller) {
				removedClasses.push('is-style-horizontal-scroll');
				removedClasses.push('horizontal-scroller-navigation');
				removedClasses.push('horizontal-scroller-loop');
				removedClasses.push('horizontal-scroller-auto');
				removedClasses.push('horizontal-scroller-hide-scrollbar');
				removedClasses.push('horizontal-scroller-hide-pause-button');
				removedClasses.push('horizontal-scroller-buttons-horizontal-left');
				removedClasses.push('horizontal-scroller-buttons-horizontal-center');
				removedClasses.push('horizontal-scroller-buttons-horizontal-right');
				removedClasses.push('horizontal-scroller-buttons-vertical-top');
				removedClasses.push('horizontal-scroller-buttons-vertical-bottom');
				removedClasses.push('horizontal-scroller-buttons-over');
			}
			if (!props.attributes.scrollNav) {
				removedClasses.push('horizontal-scroller-navigation');
			}
			if (!props.attributes.scrollLoop) {
				removedClasses.push('horizontal-scroller-loop');
			}
			if (!props.attributes.scrollAuto) {
				removedClasses.push('horizontal-scroller-auto');
			}
			if (!props.attributes.hideScrollbar) {
				removedClasses.push('horizontal-scroller-hide-scrollbar');
			}
			if (!props.attributes.hidePauseButton) {
				removedClasses.push('horizontal-scroller-hide-pause-button');
			}
			if (!props.attributes.positionButtonsOver) {
				removedClasses.push('horizontal-scroller-buttons-over');
			}
			if (props.attributes.positionButtonsHorizontal !== 'left') {
				removedClasses.push('horizontal-scroller-buttons-horizontal-left');
			}
			if (props.attributes.positionButtonsHorizontal !== 'right') {
				removedClasses.push('horizontal-scroller-buttons-horizontal-right');
			}
			if (props.attributes.positionButtonsHorizontal !== 'center') {
				removedClasses.push('horizontal-scroller-buttons-horizontal-center');
			}
			if (props.attributes.positionButtonsVertical !== 'top') {
				removedClasses.push('horizontal-scroller-buttons-vertical-top');
			}
			if (props.attributes.positionButtonsVertical !== 'bottom') {
				removedClasses.push('horizontal-scroller-buttons-vertical-bottom');
			}
			if (!props.attributes.enableGroupLink) {
				removedClasses.push('group-link');
			}			
			// Remove content shift classes if not enabled
			if (!props.attributes.useContentShift) {
				removedClasses.push('flexline-content-shift');
				removedClasses.push('flexline-content-shift-above');
				removedClasses.push('flexline-content-shift-revert-mobile');
				removedClasses.push('flexline-content-shift-left');
				removedClasses.push('flexline-content-shift-right');
				removedClasses.push('flexline-content-shift-up');
				removedClasses.push('flexline-content-shift-down');
				removedClasses.push('flexline-content-slide-x');
				removedClasses.push('flexline-content-slide-y');
			}
			if (props.attributes.useContentShift) {
				if ('0px' === props.attributes.shiftLeft) {
					removedClasses.push('flexline-content-shift-left');
				}
				if ('0px' === props.attributes.shiftRight) {
					removedClasses.push('flexline-content-shift-right');
				}
				if ('0px' === props.attributes.shiftUp) {
					removedClasses.push('flexline-content-shift-up');
				}
				if ('0px' === props.attributes.shiftDown) {
					removedClasses.push('flexline-content-shift-down');
				}
				if ('0px' === props.attributes.slideHorizontal) {
					removedClasses.push('flexline-content-slide-x');
				}
				if ('0px' === props.attributes.slideVertical) {
					removedClasses.push('flexline-content-slide-y');
				}
				// Remove 'flexline-content-shift-up' if not enabled
				if (!props.attributes.shiftToTop) {
					removedClasses.push('flexline-content-shift-above');
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

			// Add content shift classes if enabled
			if (props.attributes.useContentShift) {
				newClasses += ' flexline-content-shift';

				if ('0px' !== props.attributes.shiftLeft) {
					newClasses += ' flexline-content-shift-left';
				}
				if ('0px' !== props.attributes.shiftRight) {
					newClasses += ' flexline-content-shift-right';
				}
				if ('0px' !== props.attributes.shiftUp) {
					newClasses += ' flexline-content-shift-up';
				}
				if ('0px' !== props.attributes.shiftDown) {
					newClasses += ' flexline-content-shift-down';
				}
				if ('0px' !== props.attributes.slideHorizontal) {
					newClasses += ' flexline-content-slide-x';
				}
				if ('0px' !== props.attributes.slideVertical) {
					newClasses += ' flexline-content-slide-y';
				}
				// Add 'flexline-content-shift-up' if enabled
				if (props.attributes.shiftToTop) {
					newClasses += ' flexline-content-shift-above';
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
			// Scroller
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' is-style-horizontal-scroll';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.scrollNav &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-navigation';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.scrollAuto &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-auto';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.scrollLoop &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-loop';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.hideScrollbar &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-hide-scrollbar';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.hidePauseButton &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-hide-pause-button';
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.positionButtonsHorizontal &&
				props.attributes.enableHorizontalScroller
			) {
				const horPosition = props.attributes.positionButtonsHorizontal;
				newClasses += ' horizontal-scroller-buttons-horizontal-' + horPosition;
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.positionButtonsVertical &&
				props.attributes.enableHorizontalScroller
			) {
				const vertPosition = props.attributes.positionButtonsVertical;
				newClasses += ' horizontal-scroller-buttons-vertical-' + vertPosition;
			}
			if (
				['core/columns', 'core/post-template'].includes(props.name) &&
				props.attributes.positionButtonsOver &&
				props.attributes.enableHorizontalScroller
			) {
				newClasses += ' horizontal-scroller-buttons-over';
			}
			if (
				['core/group', 'core/stack', 'core/row', 'core/grid'].includes(
					props.name
				)
			) {
				if (props.attributes.enableGroupLink) {
					const linkType = props.attributes.groupLinkType || 'self';
					newClasses += ' group-link group-link-type-' + linkType;
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

			// **Add the Unique Class to the Wrapper in the Editor**
			if (!props.wrapperProps) {
				props.wrapperProps = {};
			}

			// **Generate and Inject Styles in the Editor**
			if (props.attributes.useContentShift) {
				// Generate CSS based on attributes
				let shiftLeft = '0';
				let shiftRight = '0';
				let shiftUp = '0';
				let shiftDown = '0';
				let slideX = '0';
				let slideY = '0';

				if (attributes.shiftLeft) {
					shiftLeft = '-' + attributes.shiftLeft;
				}
				if (attributes.shiftRight) {
					shiftRight = '-' + attributes.shiftRight;
				}
				if (attributes.shiftUp) {
					shiftUp = '-' + attributes.shiftUp;
				}
				if (attributes.shiftDown) {
					shiftDown = '-' + attributes.shiftDown;
				}
				if (attributes.slideHorizontal) {
					slideX = attributes.slideHorizontal;
				}
				if (attributes.slideVertical) {
					slideY = attributes.slideVertical;
				}
				// Build the CSS
				const styles = `
				  #${uniqueClass} {
					--flexline-shift-left: ${shiftLeft};
					--flexline-shift-right: ${shiftRight};
					--flexline-shift-up: ${shiftUp};
					--flexline-shift-down: ${shiftDown};
					--flexline-slide-x: ${slideX};
					--flexline-slide-y: ${slideY};
				  }
				`;

				// Inject the styles into the editor's head
				if (!styleElementRef.current) {
					// Create a new style element
					styleElementRef.current = document.createElement('style');
					styleElementRef.current.setAttribute('type', 'text/css');
					document.head.appendChild(styleElementRef.current);
				}

				// Update the style element's content
				styleElementRef.current.textContent = styles;
			} else if (false === attributes.useContentShift) {
				// If useContentShift is not enabled, remove the style element if it exists
				if (styleElementRef.current) {
					styleElementRef.current.parentNode.removeChild(
						styleElementRef.current
					);
					styleElementRef.current = null;
				}
			}

			// Cleanup when the component unmounts or attributes change
			return () => {
				if (styleElementRef.current) {
					styleElementRef.current.parentNode.removeChild(
						styleElementRef.current
					);
					styleElementRef.current = null;
				}
			};
		}, [attributes, props.attributes, props.name, props, uniqueClass]);

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
							<ToggleControl
								label="Shift Above (z-index)"
								checked={!!props.attributes.shiftToTop}
								onChange={(value) =>
									props.setAttributes({
										shiftToTop: value,
									})
								}
							/>
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Restore Normal on Mobile"
									checked={!!props.attributes.resetMobile}
									onChange={(value) =>
										props.setAttributes({
											resetMobile: value,
										})
									}
								/>
							)}
							{props.attributes.useContentShift && (
								<>
									<hr />
									<p>
										SHIFT - NEGATIVE MARGINS <br />
										<small>
											Enter positive numbers only.
										</small>
									</p>
								</>
							)}
							{props.attributes.useContentShift && (
								<UnitControl
									label="Shift Left"
									type="number"
									min={0}
									value={props.attributes.shiftLeft}
									onChange={(value) =>
										props.setAttributes({
											shiftLeft: value,
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
								<UnitControl
									label="Shift Right"
									type="number"
									min={0}
									value={props.attributes.shiftRight}
									onChange={(value) =>
										props.setAttributes({
											shiftRight: value,
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
								<UnitControl
									label="Shift Up"
									type="number"
									min={0}
									value={props.attributes.shiftUp}
									onChange={(value) =>
										props.setAttributes({
											shiftUp: value,
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
								<UnitControl
									label="Shift Down"
									type="number"
									min={0}
									value={props.attributes.shiftDown}
									onChange={(value) =>
										props.setAttributes({
											shiftDown: value,
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
								<>
									<hr />
									<p>
										SLIDE - TRANSLATE <br />
										<small>
											Positive or negative numbers
										</small>
									</p>
								</>
							)}
							{props.attributes.useContentShift && (
								<UnitControl
									label="Slide Horizontal ( - to left, + to right )"
									value={props.attributes.slideHorizontal}
									onChange={(value) =>
										props.setAttributes({
											slideHorizontal: value,
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
								<UnitControl
									label="Slide Vertical ( - to top, + to bottom )"
									value={props.attributes.slideVertical}
									onChange={(value) =>
										props.setAttributes({
											slideVertical: value,
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
									help="Enter positive or negative values."
								/>
							)}
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
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
							<ToggleControl
								label="Shift Above (z-index)"
								checked={!!props.attributes.shiftToTop}
								onChange={(value) =>
									props.setAttributes({
										shiftToTop: value,
									})
								}
							/>
							{props.attributes.useContentShift && (
								<ToggleControl
									label="Restore Normal on Mobile"
									checked={!!props.attributes.resetMobile}
									onChange={(value) =>
										props.setAttributes({
											resetMobile: value,
										})
									}
								/>
							)}
							{props.attributes.useContentShift && (
								<>
									<hr />
									<p>
										SHIFT - NEGATIVE MARGINS <br />
										<small>
											Enter positive numbers only.
										</small>
									</p>
								</>
							)}
							{props.attributes.useContentShift && (
								<UnitControl
									label="Shift Left"
									type="number"
									min={0}
									value={props.attributes.shiftLeft}
									onChange={(value) =>
										props.setAttributes({
											shiftLeft: value,
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
								<UnitControl
									label="Shift Right"
									type="number"
									min={0}
									value={props.attributes.shiftRight}
									onChange={(value) =>
										props.setAttributes({
											shiftRight: value,
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
								<UnitControl
									label="Shift Up"
									type="number"
									min={0}
									value={props.attributes.shiftUp}
									onChange={(value) =>
										props.setAttributes({
											shiftUp: value,
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
								<UnitControl
									label="Shift Down"
									type="number"
									min={0}
									value={props.attributes.shiftDown}
									onChange={(value) =>
										props.setAttributes({
											shiftDown: value,
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
								<>
									<hr />
									<p>
										SLIDE - TRANSLATE <br />
										<small>
											Positive or negative numbers
										</small>
									</p>
								</>
							)}
							{props.attributes.useContentShift && (
								<UnitControl
									label="Slide Horizontal ( - to left, + to right )"
									value={props.attributes.slideHorizontal}
									onChange={(value) =>
										props.setAttributes({
											slideHorizontal: value,
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
								<UnitControl
									label="Slide Vertical ( - to top, + to bottom )"
									value={props.attributes.slideVertical}
									onChange={(value) =>
										props.setAttributes({
											slideVertical: value,
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
									help="Enter positive or negative values."
								/>
							)}
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		if (props.name === 'core/columns') {
			return (
				<Fragment>
					<BlockEdit {...props} />
					<InspectorControls>
						<PanelBody title="Flexline Scroller Options">
							<ToggleControl
								label="Enable Horizontal Scroller"
								checked={
									!!props.attributes.enableHorizontalScroller
								}
								onChange={(newValue) =>
									props.setAttributes({
										enableHorizontalScroller: newValue,
									})
								}
							/>
							{props.attributes.enableHorizontalScroller && (
								<ToggleControl
									label="Show Arrow Navigation"
									checked={!!props.attributes.scrollNav}
									onChange={(newValue) =>
										props.setAttributes({
											scrollNav: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<ToggleControl
									label="Hide Scrollbar"
									checked={!!props.attributes.hideScrollbar}
									onChange={(newValue) =>
										props.setAttributes({
											hideScrollbar: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<ToggleControl
									label="Loop Scrolling"
									checked={!!props.attributes.scrollLoop}
									onChange={(newValue) =>
										props.setAttributes({
											scrollLoop: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<SelectControl
									label="Buttons Horizontal Position"
									value={
										props.attributes
											.positionButtonsHorizontal
									}
									options={[
										{ value: 'left', label: 'Left' },
										{ value: 'center', label: 'Center' },
										{ value: 'right', label: 'Right' },
									]}
									onChange={(value) =>
										props.setAttributes({
											positionButtonsHorizontal: value,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<SelectControl
									label="Buttons Vertical Position"
									value={
										props.attributes.positionButtonsVertical
									}
									options={[
										{ value: 'top', label: 'Top' },
										{ value: 'bottom', label: 'Bottom' },
									]}
									onChange={(value) =>
										props.setAttributes({
											positionButtonsVertical: value,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<ToggleControl
									label="Auto Scroll"
									checked={!!props.attributes.scrollAuto}
									onChange={(newValue) =>
										props.setAttributes({
											scrollAuto: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller && (
								<ToggleControl
									label="Position Buttons Over Scroller"
									checked={
										!!props.attributes.positionButtonsOver
									}
									onChange={(newValue) =>
										props.setAttributes({
											positionButtonsOver: newValue,
										})
									}
								/>
							)}
							{props.attributes.enableHorizontalScroller &&
								props.attributes.scrollAuto && (
									<ToggleControl
										label="Hide Pause Button"
										checked={
											!!props.attributes.hidePauseButton
										}
										onChange={(newValue) =>
											props.setAttributes({
												hidePauseButton: newValue,
											})
										}
									/>
								)}
							{props.attributes.enableHorizontalScroller &&
								props.attributes.scrollAuto && (
									// set the scroll speed in milliseconds (1000 = 1 second) - default is 5000 (5 seconds) - max is 10000 (10 seconds) number
									<RangeControl
										label="Scroll Interval in Milliseconds"
										value={props.attributes.scrollSpeed}
										onChange={(newInterval) =>
											props.setAttributes({
												scrollSpeed: newInterval,
											})
										}
										defaultValue={5000}
										min={1000}
										max={10000}
										step={500}
									/>
								)}
						</PanelBody>
						<PanelBody title="Flexline Visibility">
							<ToggleControl
								label="Stack at Tablet"
								checked={!!props.attributes.stackAtTablet}
								onChange={(newValue) =>
									props.setAttributes({
										stackAtTablet: newValue,
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
		if (
			[
				'core/column',
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
