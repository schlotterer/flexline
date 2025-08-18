import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { useEffect, useRef } from '@wordpress/element';
import { getVisibilityClasses, updateBlockClasses } from '../utils';

import button from './button';
import buttons from './buttons';
import cover from './cover';
import gallery from './gallery';
import group from './group';
import image from './image';
import navigation from './navigation';
import columns from './columns';
import visibility from './visibility';

const handlers = {
    'core/button': button,
    'core/buttons': buttons,
    'core/cover': cover,
    'core/gallery': gallery,
    'core/group': group,
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
            if (!props.attributes.noWrap) {
                removedClasses.push('nowrap');
            }
            if (!props.attributes.enablePosterGallery) {
                removedClasses.push('poster-gallery');
            }
            if (!props.attributes.enableHorizontalScroll) {
                removedClasses.push('is-style-horizontal-scroll-at-mobile');
            }
            if (!props.attributes.stackAtTablet) {
                removedClasses.push('flexline-stack-at-tablet');
            }
            if (!props.attributes.enableGroupLink) {
                removedClasses.push('group-link');
            }
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
                if (!props.attributes.shiftToTop) {
                    removedClasses.push('flexline-content-shift-above');
                }
                if (!props.attributes.resetMobile) {
                    removedClasses.push('flexline-content-shift-revert-mobile');
                }
            }

            let newClasses = getVisibilityClasses(props.attributes);
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
                if (props.attributes.shiftToTop) {
                    newClasses += ' flexline-content-shift-above';
                }
                if (props.attributes.resetMobile) {
                    newClasses += ' flexline-content-shift-revert-mobile';
                }
            }

            if (handler && handler.getClasses) {
                const blockClasses = handler.getClasses(props.attributes);
                if (blockClasses?.removed) {
                    removedClasses.push(...blockClasses.removed);
                }
                if (blockClasses?.added) {
                    newClasses += blockClasses.added;
                }
            }

            const combinedClasses = updateBlockClasses(
                props.attributes.className || '',
                newClasses,
                removedClasses
            );

            if (attributes.className !== combinedClasses) {
                props.setAttributes({ className: combinedClasses });
            }

            if (!props.wrapperProps) {
                props.wrapperProps = {};
            }

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

                if (!styleElementRef.current) {
                    styleElementRef.current = document.createElement('style');
                    styleElementRef.current.setAttribute('type', 'text/css');
                    document.head.appendChild(styleElementRef.current);
                }

                styleElementRef.current.textContent = styles;
            } else if (styleElementRef.current) {
                styleElementRef.current.parentNode.removeChild(styleElementRef.current);
                styleElementRef.current = null;
            }

            return () => {
                if (styleElementRef.current) {
                    styleElementRef.current.parentNode.removeChild(styleElementRef.current);
                    styleElementRef.current = null;
                }
            };
        }, [attributes, attributes.className, props.name, uniqueClass]);

        if (handler && handler.controls) {
            return handler.controls(BlockEdit, props);
        }

        return <BlockEdit {...props} />;
    };
}, 'withCustomControls');

addFilter('editor.BlockEdit', 'flexline/with-custom-controls', withCustomControls);

export default handlers;
