import { Fragment } from '@wordpress/element';
import { InspectorControls, URLInput } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	UnitControl,
} from '@wordpress/components';
import { getVisibilityControls } from '../utils';

export const controls = (BlockEdit, props) => (
	<Fragment>
		<BlockEdit {...props} />
		<InspectorControls>
			<PanelBody title="FlexLine Group Link Options">
				<ToggleControl
					label="Enable Group Link"
					checked={!!props.attributes.enableGroupLink}
					onChange={(newValue) =>
						props.setAttributes({ enableGroupLink: newValue })
					}
				/>
				{props.attributes.enableGroupLink && (
					<URLInput
						label="Group Link URL"
						value={props.attributes.groupLinkURL}
						onChange={(newValue) =>
							props.setAttributes({ groupLinkURL: newValue })
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
							{ label: 'Modal Media', value: 'modal_media' },
						]}
						onChange={(newValue) =>
							props.setAttributes({ groupLinkType: newValue })
						}
						__nextHasNoMarginBottom={true}
					/>
				)}
			</PanelBody>
			<PanelBody title="FlexLine Visibility">
				{getVisibilityControls(props)}
			</PanelBody>
		</InspectorControls>
		<InspectorControls group="styles">
			<PanelBody title="FlexLine Content Shift">
				<ToggleControl
					label="Use Content Shift"
					checked={!!props.attributes.useContentShift}
					onChange={(newValue) =>
						props.setAttributes({ useContentShift: newValue })
					}
				/>
				<ToggleControl
					label="Shift Above (z-index)"
					checked={!!props.attributes.shiftToTop}
					onChange={(value) =>
						props.setAttributes({ shiftToTop: value })
					}
				/>
				{props.attributes.useContentShift && (
					<ToggleControl
						label="Restore Normal on Mobile"
						checked={!!props.attributes.resetMobile}
						onChange={(value) =>
							props.setAttributes({ resetMobile: value })
						}
					/>
				)}
				{props.attributes.useContentShift && (
					<>
						<hr />
						<p>
							SHIFT - NEGATIVE MARGINS <br />
							<small>Enter positive numbers only.</small>
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
							props.setAttributes({ shiftLeft: value })
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
							props.setAttributes({ shiftRight: value })
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
							props.setAttributes({ shiftUp: value })
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
							props.setAttributes({ shiftDown: value })
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
							<small>Positive or negative numbers</small>
						</p>
					</>
				)}
				{props.attributes.useContentShift && (
					<UnitControl
						label="Slide Horizontal ( - to left, + to right )"
						value={props.attributes.slideHorizontal}
						onChange={(value) =>
							props.setAttributes({ slideHorizontal: value })
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
							props.setAttributes({ slideVertical: value })
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

export const getClasses = (attributes) => {
	let added = '';
	if (attributes.enableGroupLink) {
		const linkType = attributes.groupLinkType || 'self';
		added += ` group-link group-link-type-${linkType}`;
	}
	return { added };
};

export default { controls, getClasses };
