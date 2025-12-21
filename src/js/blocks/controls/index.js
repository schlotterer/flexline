import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { useEffect, useRef } from '@wordpress/element';
import { updateBlockClasses } from '../utils';

import button from './button';
import buttons from './buttons';
import cover from './cover';
import gallery from './gallery';
import slider from './slider';
// import group from './group';
import image from './image';
import navigation from './navigation';
import columns from './columns';
import siteLogo from './site-logo';
import visibility from './visibility';
import query from './query';

const handlers = {
	'core/button': button,
	'core/buttons': buttons,
	'core/cover': cover,
	'core/gallery': gallery,
	'core/group': slider,
	'core/stack': slider,
	'core/image': image,
	'core/navigation': navigation,
	'core/columns': columns,
	'core/post-template': columns,
	'core/query': query,
	'core/column': visibility,
	'core/spacer': visibility,
	'core/paragraph': visibility,
	'core/heading': visibility,
	'core/video': visibility,
	'core/site-logo': siteLogo,
	'core/post-featured-image': visibility,
	'core/embed': visibility,
	'core/navigation-submenu': visibility,
	'core/navigation-link': visibility,
	'core/html': visibility,
	'core/social-link': visibility,
	'core/social-links': visibility,
	'core/accordion': visibility,
	'core/accordion-item': visibility,
	'core/accordion-heading': visibility,
	'core/accordion-panel': visibility,
	'web4sl/location-address': visibility,
	'web4sl/location-phone-link': visibility,
	'web4sl/location-map-link': visibility,
	'web4sl/location-filter-family': visibility,
	'web4sl/advanced-floor-plans': visibility,
	'web4sl/floor-plan-2d-image': visibility,
	'web4sl/floor-plan-3d-image': visibility,
	'web4sl/floor-plan-accessibility-badge': visibility,
	'web4sl/floor-plan-baths': visibility,
	'web4sl/floor-plan-beds': visibility,
	'web4sl/floor-plan-brochure-button': visibility,
	'web4sl/floor-plan-media-toggle': visibility,
	'web4sl/floor-plan-square-feet': visibility,
	'web4sl/floor-plan-starting-price': visibility,
	'web4sl/floor-plan-video-button': visibility,
	'web4sl/floor-plan-virtual-tour-button': visibility,
};

// Map attributes to the classes they control.
const classMap = {
	hideOnMobile: { true: 'flexline-hide-on-mobile' },
	hideOnTablet: { true: 'flexline-hide-on-tablet' },
	hideOnDesktop: { true: 'flexline-hide-on-desktop' },
	enableModal: { true: 'enable-modal' },
	enableLazyLoad: { false: 'no-lazy-load' },
	noWrap: { true: 'nowrap' },
	enablePosterGallery: { true: 'poster-gallery' },
	flexlineGlassOverlay: { true: 'flexline-glass-overlay' },
	enableHorizontalScrollAtMobile: {
		true: 'is-style-horizontal-scroll-at-mobile',
	},
	stackAtTablet: { true: 'flexline-stack-at-tablet' },
	enableGroupLink: { true: 'group-link' },
};

// Content shift related classes.
const contentShiftMap = {
	shiftLeft: 'flexline-content-shift-left',
	shiftRight: 'flexline-content-shift-right',
	shiftUp: 'flexline-content-shift-up',
	shiftDown: 'flexline-content-shift-down',
	slideHorizontal: 'flexline-content-slide-x',
	slideVertical: 'flexline-content-slide-y',
	shiftToTop: 'flexline-content-shift-above',
	resetMobile: 'flexline-content-shift-revert-mobile',
};

const getContentShiftClasses = (attrs) => {
	const removed = [];
	const added = [];
	const base = 'flexline-content-shift';

	if (!attrs.useContentShift) {
		removed.push(base, ...Object.values(contentShiftMap));
		return { removed, added };
	}

	added.push(base);

	Object.entries(contentShiftMap).forEach(([attr, cls]) => {
		const value = attrs[attr];
		const hasValue = [
			'shiftLeft',
			'shiftRight',
			'shiftUp',
			'shiftDown',
			'slideHorizontal',
			'slideVertical',
		].includes(attr)
			? value && value !== '0px'
			: !!value;
		if (hasValue) {
			added.push(cls);
		} else {
			removed.push(cls);
		}
	});

	return { removed, added };
};

/**
 * HOC: withCustomControls
 *
 * Attaches per-block controls and ensures a stable wrapper id + inline CSS variables
 * so the runtime can read configuration without touching saved markup.
 *
 * Flow:
 *  - Compute classes to add/remove (base + per‑feature + slider‑specific)
 *  - Ensure wrapperProps.id = block-<clientId>
 *  - Write a <style> tag targeting #block-<clientId> with CSS vars for Preview/FE
 *  - Mirror key vars inline on wrapperProps.style for immediate inheritance in Preview
 */
const withCustomControls = createHigherOrderComponent((BlockEdit) => {
	return (props) => {
		const { attributes, clientId } = props;
		const uniqueClass = `block-${clientId}`;
		const styleElementRef = useRef(null);

		const handler = handlers[props.name];
		if (handler && handler.useHooks) {
			handler.useHooks(props);
		}

		useEffect(() => {
			const removedClasses = [];
			const newClasses = [];

			Object.entries(classMap).forEach(([attr, conditions]) => {
				Object.entries(conditions).forEach(([expected, cls]) => {
					const expectedBool = expected === 'true';
					const classList = Array.isArray(cls) ? cls : [cls];
					if (props.attributes[attr] === expectedBool) {
						newClasses.push(...classList);
					} else {
						removedClasses.push(...classList);
					}
				});
			});

			const contentShift = getContentShiftClasses(props.attributes);
			removedClasses.push(...contentShift.removed);
			newClasses.push(...contentShift.added);

			if (handler && handler.getClasses) {
				const blockClasses = handler.getClasses(props.attributes);
				if (blockClasses?.removed) {
					removedClasses.push(...blockClasses.removed);
				}
				if (blockClasses?.added) {
					newClasses.push(...blockClasses.added.trim().split(/\s+/));
				}
			}

			const combinedClasses = updateBlockClasses(
				props.attributes.className || '',
				newClasses.join(' '),
				removedClasses
			);

			if (attributes.className !== combinedClasses) {
				props.setAttributes({ className: combinedClasses });
			}

			if (!props.wrapperProps) {
				props.wrapperProps = {};
			}
			// Ensure a stable ID on the block wrapper for targeting CSS variables
			props.wrapperProps.id = uniqueClass;

			// Build a style rule that collects CSS variables for any active features
			let cssRules = '';

			// We'll also mirror key vars inline on the wrapper so they work inside
			// the editor iframe where <style> in the parent document won't apply.
			const inlineVars = {};
			const inlineStyles = {};
			const setVar = (name, val) => {
				// If val is undefined/null/empty, explicitly remove the var if it existed.
				if (val === undefined || val === null || `${val}` === '') {
					inlineVars[name] = undefined;
				} else {
					inlineVars[name] = `${val}`;
				}
			};

			// Content Shift variables
			if (props.attributes.useContentShift) {
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

				cssRules += `
                  --flexline-shift-left: ${shiftLeft};
                  --flexline-shift-right: ${shiftRight};
                  --flexline-shift-up: ${shiftUp};
                  --flexline-shift-down: ${shiftDown};
                  --flexline-slide-x: ${slideX};
                  --flexline-slide-y: ${slideY};
                `;

				// Mirror inside the block wrapper for editor iframe
				setVar('--flexline-shift-left', shiftLeft);
				setVar('--flexline-shift-right', shiftRight);
				setVar('--flexline-shift-up', shiftUp);
				setVar('--flexline-shift-down', shiftDown);
				setVar('--flexline-slide-x', slideX);
				setVar('--flexline-slide-y', slideY);

				// Additionally, apply direct inline styles so Template Editor canvas
				// (which may not load our CSS) still previews the shift.
				if (shiftLeft !== '0') {
					inlineStyles.marginLeft = shiftLeft;
				}
				if (shiftRight !== '0') {
					inlineStyles.marginRight = shiftRight;
				}
				if (shiftUp !== '0') {
					inlineStyles.marginTop = shiftUp;
					inlineStyles.marginBlockStart = shiftUp;
				}
				if (shiftDown !== '0') {
					inlineStyles.marginBottom = shiftDown;
				}
				if (slideX !== '0' || slideY !== '0') {
					const existingTransform =
						(props.wrapperProps.style &&
							props.wrapperProps.style.transform) ||
						'';
					const translate = `translateX(${slideX}) translateY(${slideY})`;
					inlineStyles.transform = existingTransform
						? `${existingTransform} ${translate}`
						: translate;
				}
			} else {
				// Ensure stale vars are cleared if feature is toggled off
				setVar('--flexline-shift-left', undefined);
				setVar('--flexline-shift-right', undefined);
				setVar('--flexline-shift-up', undefined);
				setVar('--flexline-shift-down', undefined);
				setVar('--flexline-slide-x', undefined);
				setVar('--flexline-slide-y', undefined);
			}

			// Slider variables
			if (props.attributes.enableSlider) {
				const height = attributes.sliderHeight || '';
				const transitionMs = attributes.transitionDuration ?? 500;
				const auto = !!attributes.sliderAuto;
				const intervalMs = auto ? (attributes.sliderSpeed ?? 4000) : 0;
				const loop = attributes.sliderLoop ? 1 : 0;
				const pauseHover = auto && attributes.pauseOnHover ? 1 : 0;
				let showPause = 0;
				if (auto && !attributes.hidePauseButton) {
					showPause = 1;
				}
				const showNav = attributes.sliderNav ? 1 : 0;

				cssRules += `
						  --slider-height: ${height};
						  --slider-transition-ms: ${transitionMs};
						  --slider-interval-ms: ${intervalMs};
						  --slider-loop: ${loop};
						  --slider-pause-on-hover: ${pauseHover};
						  --slider-show-pause: ${showPause};
						  --slider-nav: ${showNav};
						`;
			}

			if (cssRules) {
				const styles = `#${uniqueClass} { ${cssRules} }`;

				if (!styleElementRef.current) {
					styleElementRef.current = document.createElement('style');
					styleElementRef.current.setAttribute('type', 'text/css');
					document.head.appendChild(styleElementRef.current);
				}
				styleElementRef.current.textContent = styles;

				// Also apply vars directly on the wrapper for immediate inheritance (editor iframe)
				const sliderHeightValue = (attributes.sliderHeight || '')
					.toString()
					.trim();
				const sliderTransitionMs = attributes.transitionDuration ?? 500;
				const isAutoEnabled = !!attributes.sliderAuto;
				const sliderIntervalMs = isAutoEnabled
					? (attributes.sliderSpeed ?? 4000)
					: 0;

				if (props.attributes.enableSlider) {
					// Only set height if provided; otherwise supply a preview default
					if (sliderHeightValue) {
						setVar('--slider-height', sliderHeightValue);
						setVar('--slider-height-default', undefined); // not needed when explicit height exists
					} else {
						setVar('--slider-height', undefined); // remove if previously set
						setVar(
							'--slider-height-default',
							'calc(100svh - var(--header-site-header-height, 0px))'
						);
					}
					// Ensure we always have a header height var in the editor canvas
					setVar('--header-site-header-height', '0px');
					setVar('--slider-transition-ms', sliderTransitionMs);
					setVar('--slider-interval-ms', sliderIntervalMs);
				} else {
					// Clear slider vars if disabled
					setVar('--slider-height', undefined);
					setVar('--slider-height-default', undefined);
					setVar('--header-site-header-height', undefined);
					setVar('--slider-transition-ms', undefined);
					setVar('--slider-interval-ms', undefined);
				}

				// Commit inline vars and preview styles for both content shift and slider
				props.wrapperProps.style = {
					...(props.wrapperProps.style || {}),
					...inlineVars,
					...inlineStyles,
				};

				// Notify the runtime in Preview to re-read CSS vars (height, interval, etc.)
				try {
					const evt = new CustomEvent(
						'flexline-slider-vars-updated',
						{
							detail: { selector: `#${uniqueClass}` },
						}
					);
					document.dispatchEvent(evt);
				} catch (e) {
					// ignore
				}
			} else if (styleElementRef.current) {
				styleElementRef.current.parentNode.removeChild(
					styleElementRef.current
				);
				styleElementRef.current = null;
			}

			return () => {
				if (styleElementRef.current) {
					styleElementRef.current.parentNode.removeChild(
						styleElementRef.current
					);
					styleElementRef.current = null;
				}
			};
		}, [attributes, attributes.className, handler, props, uniqueClass]);

		if (handler && handler.controls) {
			return handler.controls(BlockEdit, props);
		}

		return <BlockEdit {...props} />;
	};
}, 'withCustomControls');

addFilter(
	'editor.BlockEdit',
	'flexline/with-custom-controls',
	withCustomControls
);

export default handlers;
