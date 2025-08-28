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
import visibility from './visibility';

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
	'core/column': visibility,
	'core/spacer': visibility,
	'core/paragraph': visibility,
	'core/heading': visibility,
	'core/video': visibility,
	'core/site-logo': visibility,
	'core/post-featured-image': visibility,
	'core/embed': visibility,
	'core/navigation-submenu': visibility,
	'core/navigation-link': visibility,
	'core/html': visibility,
	'core/social-link': visibility,
	'core/social-links': visibility,
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
