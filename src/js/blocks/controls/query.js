/**
 * Related Posts Controls for core/query
 * Adds "Related Posts" panel to Query Loop inspector controls
 */

import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	Notice,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';

/**
 * Related Posts Panel Component
 * Separate component to properly use React hooks
 *
 * @param {Object} props Component props
 * @return {Object} JSX element
 */
const RelatedPostsPanel = (props) => {
	const { attributes, setAttributes } = props;
	const { enableRelatedPosts, relatedPostsTaxonomy, relatedPostsScope } =
		attributes;

	// Fetch all public taxonomies so editors can choose any taxonomy as a match source.
	// We rely on REST data for completeness instead of attempting to infer from post type.
	const taxonomyOptions = useSelect((select) => {
		const allTaxonomies =
			select('core').getTaxonomies({ per_page: -1 }) || [];

		// Filter to public taxonomies only
		const publicTaxonomies = allTaxonomies.filter(
			(tax) => tax.visibility && tax.visibility.publicly_queryable
		);

		// Build options for SelectControl
		return publicTaxonomies.map((tax) => ({
			label: tax.name,
			value: tax.slug,
		}));
	}, []);

	return (
		<InspectorControls>
			<PanelBody title="FlexLine Related Posts" initialOpen={false}>
				<ToggleControl
					label="Enable Related Posts"
					help="Show posts related to the current post by shared taxonomy term"
					checked={!!enableRelatedPosts}
					onChange={(value) => {
						const updates = { enableRelatedPosts: value };

						// When enabling Related Posts, ensure query is not using custom query
						// (query_loop_block_query_vars filter only works with standard queries)
						if (value === true) {
							const currentQuery = attributes.query || {};
							const currentExclude = currentQuery.exclude || [];

							updates.query = {
								...currentQuery,
								inherit: false, // Use standard query, not global query
								// Note: Current post exclusion happens in PHP filter
								// This just sets up the base query
								exclude: currentExclude,
							};
						}

						setAttributes(updates);
					}}
				/>

				{enableRelatedPosts && (
					<>
						<Notice
							status="info"
							isDismissible={false}
							style={{
								marginTop: '12px',
								marginBottom: '12px',
							}}
						>
							<strong>Editor Preview:</strong> Shows
							manual/inherited query settings.
							<br />
							<strong>Frontend:</strong> Automatically filters to
							related posts on singular views.
						</Notice>

						<SelectControl
							label="Match by Taxonomy"
							value={relatedPostsTaxonomy}
							options={taxonomyOptions}
							onChange={(value) =>
								setAttributes({ relatedPostsTaxonomy: value })
							}
							help="Choose which taxonomy to use for matching related posts"
						/>

						<SelectControl
							label="Post Type Scope"
							value={relatedPostsScope}
							options={[
								{
									label: 'Current Post Type Only',
									value: 'current',
								},
								{
									label: 'All Public Post Types',
									value: 'all',
								},
							]}
							onChange={(value) =>
								setAttributes({ relatedPostsScope: value })
							}
							help="Limit related posts to same post type, or allow any"
						/>
					</>
				)}
			</PanelBody>
		</InspectorControls>
	);
};

/**
 * Add Related Posts panel to Query Loop block
 *
 * @param {Function} BlockEdit Original BlockEdit component
 * @param {Object}   props     Block props
 * @return {Object} JSX element
 */
export const controls = (BlockEdit, props) => {
	return (
		<Fragment>
			<BlockEdit {...props} />
			<RelatedPostsPanel {...props} />
		</Fragment>
	);
};

/**
 * Add CSS class when related posts enabled
 *
 * @param {Object} attributes Block attributes
 * @return {Object} Object with removed and added class arrays
 */
export const getClasses = (attributes) => {
	const added = attributes.enableRelatedPosts
		? 'flexline-related-posts-enabled'
		: '';
	return {
		removed: [],
		added,
	};
};

export default { controls, getClasses };
