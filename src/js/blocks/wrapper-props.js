/* eslint-disable @wordpress/no-unsafe-wp-apis */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';

/**
 * Ensure wrapper ID and inline styles are applied at the wrapper level
 * even inside the Site (Template) Editor canvas.
 *
 * We mirror the content-shift CSS variables and also apply direct
 * margins/transforms so preview works even if the canvas hasn't
 * loaded theme CSS yet.
 */
const withFlexlineWrapperProps = createHigherOrderComponent(
	(BlockListBlock) => {
		return (props) => {
			const { attributes = {}, clientId } = props;

			const nextWrapperProps = { ...(props.wrapperProps || {}) };
			nextWrapperProps.id = nextWrapperProps.id || `block-${clientId}`;

			const style = { ...(nextWrapperProps.style || {}) };

			if (attributes.useContentShift) {
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

				// CSS vars for theme rules
				style['--flexline-shift-left'] = shiftLeft;
				style['--flexline-shift-right'] = shiftRight;
				style['--flexline-shift-up'] = shiftUp;
				style['--flexline-shift-down'] = shiftDown;
				style['--flexline-slide-x'] = slideX;
				style['--flexline-slide-y'] = slideY;

				// Inline preview fallbacks
				if (shiftLeft !== '0') {
					style.marginLeft = shiftLeft;
				}
				if (shiftRight !== '0') {
					style.marginRight = shiftRight;
				}
				if (shiftUp !== '0') {
					style.marginTop = shiftUp;
					style.marginBlockStart = shiftUp;
				}
				if (shiftDown !== '0') {
					style.marginBottom = shiftDown;
				}
				if (slideX !== '0' || slideY !== '0') {
					const existingTransform = style.transform || '';
					const translate = `translateX(${slideX}) translateY(${slideY})`;
					style.transform = existingTransform
						? `${existingTransform} ${translate}`
						: translate;
				}
			}

			nextWrapperProps.style = style;

			return (
				<BlockListBlock {...props} wrapperProps={nextWrapperProps} />
			);
		};
	},
	'withFlexlineWrapperProps'
);

addFilter(
	'editor.BlockListBlock',
	'flexline/with-wrapper-props',
	withFlexlineWrapperProps
);
