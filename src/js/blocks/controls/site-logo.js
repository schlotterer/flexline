import { Fragment, useEffect, useRef } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { getVisibilityControls } from '../utils';

const SiteLogoControls = (BlockEdit, props) => {
	const { attributes, setAttributes } = props;
	const { useHighResLogo } = attributes;
	const qualityPanelRef = useRef(null);
	const visibilityPanelRef = useRef(null);

	useEffect(() => {
		const qualityPanel = qualityPanelRef.current;
		if (!qualityPanel || !qualityPanel.parentNode) {
			return;
		}
		const parent = qualityPanel.parentNode;
		parent.appendChild(qualityPanel);
		const visibilityPanel = visibilityPanelRef.current;
		if (visibilityPanel) {
			parent.appendChild(visibilityPanel);
		}
	}, []);

	return (
		<Fragment>
			<BlockEdit {...props} />
			<InspectorControls>
				<PanelBody
					title="FlexLine Logo Quality"
					initialOpen={false}
					ref={qualityPanelRef}
				>
					<ToggleControl
						label="Use High-Resolution Logo"
						help="Doubles the minimum size in the sizes attribute so browsers favour sharper logo sources."
						checked={!!useHighResLogo}
						onChange={(value) =>
							setAttributes({ useHighResLogo: value })
						}
					/>
				</PanelBody>
				<PanelBody title="FlexLine Visibility" ref={visibilityPanelRef}>
					{getVisibilityControls(props)}
				</PanelBody>
			</InspectorControls>
		</Fragment>
	);
};

export const controls = SiteLogoControls;

export const getClasses = (attributes) => {
	let added = '';
	if (attributes.useHighResLogo) {
		added += ' flexline-logo-hires';
	}
	return { added };
};

export default { controls: SiteLogoControls, getClasses };
