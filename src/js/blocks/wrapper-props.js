/* eslint-disable @wordpress/no-unsafe-wp-apis */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import {
	isContentShiftFieldSet,
	normalizeContentShiftInput,
	toNegativeContentShiftValue,
} from './utils';

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
			const setStyleValue = (key, value) => {
				if (value === undefined) {
					delete style[key];
					return;
				}
				style[key] = value;
			};

			if (attributes.useContentShift) {
				const shiftLeft = isContentShiftFieldSet(attributes.shiftLeft)
					? toNegativeContentShiftValue(attributes.shiftLeft)
					: '';
				const shiftRight = isContentShiftFieldSet(attributes.shiftRight)
					? toNegativeContentShiftValue(attributes.shiftRight)
					: '';
				const shiftUp = isContentShiftFieldSet(attributes.shiftUp)
					? toNegativeContentShiftValue(attributes.shiftUp)
					: '';
				const shiftDown = isContentShiftFieldSet(attributes.shiftDown)
					? toNegativeContentShiftValue(attributes.shiftDown)
					: '';
				const slideX = isContentShiftFieldSet(
					attributes.slideHorizontal
				)
					? normalizeContentShiftInput(attributes.slideHorizontal)
					: '';
				const slideY = isContentShiftFieldSet(attributes.slideVertical)
					? normalizeContentShiftInput(attributes.slideVertical)
					: '';

				// CSS vars for theme rules
				setStyleValue('--flexline-shift-left', shiftLeft || undefined);
				setStyleValue(
					'--flexline-shift-right',
					shiftRight || undefined
				);
				setStyleValue('--flexline-shift-up', shiftUp || undefined);
				setStyleValue('--flexline-shift-down', shiftDown || undefined);
				setStyleValue('--flexline-slide-x', slideX || undefined);
				setStyleValue('--flexline-slide-y', slideY || undefined);

				// Inline preview fallbacks
				setStyleValue('marginLeft', shiftLeft || undefined);
				setStyleValue('marginRight', shiftRight || undefined);
				setStyleValue('marginTop', shiftUp || undefined);
				setStyleValue('marginBlockStart', shiftUp || undefined);
				setStyleValue('marginBottom', shiftDown || undefined);
				if (slideX || slideY) {
					const existingTransform = style.transform || '';
					const translate = `translateX(${slideX || '0'}) translateY(${slideY || '0'})`;
					setStyleValue(
						'transform',
						existingTransform
							? `${existingTransform} ${translate}`
							: translate
					);
				} else {
					setStyleValue('transform', undefined);
				}
			} else {
				setStyleValue('--flexline-shift-left', undefined);
				setStyleValue('--flexline-shift-right', undefined);
				setStyleValue('--flexline-shift-up', undefined);
				setStyleValue('--flexline-shift-down', undefined);
				setStyleValue('--flexline-slide-x', undefined);
				setStyleValue('--flexline-slide-y', undefined);
				setStyleValue('marginLeft', undefined);
				setStyleValue('marginRight', undefined);
				setStyleValue('marginTop', undefined);
				setStyleValue('marginBlockStart', undefined);
				setStyleValue('marginBottom', undefined);
				setStyleValue('transform', undefined);
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
