( function( wp ) {
	if (
		! wp ||
		! wp.plugins ||
		! wp.data ||
		! wp.element ||
		! wp.components ||
		( ! wp.editor && ! wp.editPost )
	) {
		return;
	}

	const registerPlugin = wp.plugins.registerPlugin;
	const editor = wp.editor || wp.editPost || {};
	const PluginDocumentSettingPanel = editor.PluginDocumentSettingPanel;
	const useSelect = wp.data.useSelect;
	const useDispatch = wp.data.useDispatch;
	const useEffect = wp.element.useEffect;
	const el = wp.element.createElement;
	const Fragment = wp.element.Fragment;
	const SelectControl = wp.components.SelectControl;
	const Spinner = wp.components.Spinner;
	const __ = wp.i18n && wp.i18n.__ ? wp.i18n.__ : function( value ) {
		return value;
	};

	if ( ! PluginDocumentSettingPanel ) {
		return;
	}

	function toInt( value ) {
		const parsed = parseInt( value, 10 );
		return Number.isNaN( parsed ) ? 0 : parsed;
	}

	const config = window.flexlinePrimaryTerms || {};
	const configuredPostType = config.postType || '';
	const configuredTaxonomies = Array.isArray( config.taxonomies )
		? config.taxonomies
		: [];
	const configuredTaxonomySet = configuredTaxonomies.reduce( function( memo, taxonomy ) {
		if ( taxonomy ) {
			memo[ taxonomy ] = true;
		}
		return memo;
	}, {} );

	function movePrimaryTermsPanelBelowTaxonomies() {
		const panel = document.querySelector( '.editor-sidebar__panel .flexline-primary-terms-panel' );
		if ( ! panel || ! panel.parentElement ) {
			return;
		}

		const parent = panel.parentElement;
		if ( parent.lastElementChild === panel ) {
			return;
		}

		parent.appendChild( panel );
	}

	function PrimaryTermPanel() {
		const postType = useSelect(
			( select ) => select( 'core/editor' ).getCurrentPostType(),
			[]
		);
		const postId = useSelect(
			( select ) => select( 'core/editor' ).getCurrentPostId(),
			[]
		);
		const meta = useSelect(
			( select ) => select( 'core/editor' ).getEditedPostAttribute( 'meta' ) || {},
			[]
		);

		const taxonomyModels = useSelect(
			( select ) => {
				if (
					! postType ||
					postType !== configuredPostType ||
					! configuredTaxonomies.length
				) {
					return [];
				}

				const core = select( 'core' );
				const editor = select( 'core/editor' );
				const taxonomies = core.getTaxonomies( {
					type: postType,
					per_page: -1,
					context: 'edit',
				} );

				if ( ! Array.isArray( taxonomies ) ) {
					return null;
				}

				return taxonomies
					.filter(
						( taxonomy ) =>
							taxonomy &&
							configuredTaxonomySet[ taxonomy.slug ] &&
							taxonomy.visibility &&
							taxonomy.visibility.public &&
							taxonomy.visibility.show_ui
					)
					.map( ( taxonomy ) => {
						const restBase = taxonomy.rest_base || taxonomy.slug;
						const assigned = editor.getEditedPostAttribute( restBase );
						const assignedIds = Array.isArray( assigned )
							? assigned.map( toInt ).filter( ( id ) => id > 0 )
							: [];
						let terms = [];

						if ( assignedIds.length ) {
							const records = core.getEntityRecords( 'taxonomy', taxonomy.slug, {
								include: assignedIds,
								per_page: assignedIds.length,
								orderby: 'include',
								context: 'view',
							} );
							terms = Array.isArray( records ) ? records : null;
						}

						return {
							slug: taxonomy.slug,
							name: taxonomy.name,
							metaKey: 'w4sl_primary_' + taxonomy.slug,
							assignedIds: assignedIds,
							terms: terms,
						};
					} );
			},
			[ postType, postId ]
		);

		const dispatchEditor = useDispatch( 'core/editor' );
		const hasTaxonomyModels =
			Array.isArray( taxonomyModels ) && taxonomyModels.length > 0;

		useEffect( () => {
			if ( ! postType || ! hasTaxonomyModels ) {
				return;
			}

			const frameId = window.requestAnimationFrame( movePrimaryTermsPanelBelowTaxonomies );
			const sidebar = document.querySelector( '.editor-sidebar__panel' );
			if ( ! sidebar || ! window.MutationObserver ) {
				return function cleanupFrameOnly() {
					window.cancelAnimationFrame( frameId );
				};
			}

			const observer = new window.MutationObserver( movePrimaryTermsPanelBelowTaxonomies );
			observer.observe( sidebar, { childList: true, subtree: true } );

			return function cleanup() {
				window.cancelAnimationFrame( frameId );
				observer.disconnect();
			};
		}, [ postType, hasTaxonomyModels ] );

		if ( ! postType ) {
			return null;
		}

		if ( taxonomyModels === null ) {
			return el(
				PluginDocumentSettingPanel,
				{
					name: 'flexline-primary-terms-panel',
					title: __( 'Primary Terms', 'flexline' ),
					className: 'flexline-primary-terms-panel',
				},
				el( Spinner, null )
			);
		}

		if ( ! taxonomyModels.length ) {
			return null;
		}

		return el(
			PluginDocumentSettingPanel,
			{
				name: 'flexline-primary-terms-panel',
				title: __( 'Primary Terms', 'flexline' ),
				className: 'flexline-primary-terms-panel',
			},
			el(
				Fragment,
				null,
				taxonomyModels.map( ( model ) => {
					const currentValue = toInt( meta[ model.metaKey ] );
					const options = [
						{
							label: __( 'Auto (first assigned)', 'flexline' ),
							value: '0',
						},
					];

					if ( model.terms === null ) {
						return el(
							'div',
							{ key: model.slug, className: 'flexline-primary-term-control' },
							el(
								'p',
								null,
								model.name + ': ' + __( 'Loading terms…', 'flexline' )
							),
							el( Spinner, null )
						);
					}

					( model.terms || [] ).forEach( ( term ) => {
						options.push( {
							label: term.name,
							value: String( toInt( term.id ) ),
						} );
					} );

					const hasAssignedTerms = model.assignedIds.length > 0;
					const help = hasAssignedTerms
						? __( 'Only terms currently assigned to this post can be selected.', 'flexline' )
						: __( 'Assign terms in this taxonomy first, then choose a primary term.', 'flexline' );

					return el( SelectControl, {
						key: model.slug,
						label: model.name,
						help: help,
						__nextHasNoMarginBottom: true,
						__next40pxDefaultSize: true,
						value: String( currentValue > 0 ? currentValue : 0 ),
						options: options,
						disabled: ! hasAssignedTerms,
						onChange: function( nextValue ) {
							const nextTermId = toInt( nextValue );
							dispatchEditor.editPost( {
								meta: Object.assign( {}, meta, {
									[ model.metaKey ]: nextTermId,
								} ),
							} );
						},
					} );
				} )
			)
		);
	}

	registerPlugin( 'flexline-primary-terms', {
		render: PrimaryTermPanel,
		icon: null,
	} );
} )( window.wp );
