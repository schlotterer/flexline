( function( $ ) {
	if ( ! $ || typeof inlineEditPost === 'undefined' ) {
		return;
	}

	function getPostIdFromArg( id ) {
		if ( typeof id === 'object' ) {
			return parseInt( inlineEditPost.getId( id ), 10 ) || 0;
		}

		if ( typeof id === 'string' ) {
			return parseInt( id.replace( 'post-', '' ), 10 ) || 0;
		}

		return parseInt( id, 10 ) || 0;
	}

	function buildOptionsFromChecklist( $editRow ) {
		const options = [
			{
				value: '0',
				label: 'Auto (first assigned)',
			},
		];
		const seen = {};

		$editRow.find( 'input[name="post_category[]"]' ).each( function() {
			const $checkbox = $( this );
			const value = String( parseInt( $checkbox.val(), 10 ) || 0 );
			const label = $.trim( $checkbox.closest( 'label' ).text() );

			if ( ! value || '0' === value || seen[ value ] ) {
				return;
			}

			seen[ value ] = true;
			options.push( {
				value: value,
				label: label,
			} );
		} );

		return options;
	}

	function populateQuickEditSelect( postId ) {
		const $editRow = $( '#edit-' + postId );
		if ( ! $editRow.length ) {
			return;
		}

		const $select = $editRow.find( 'select[name="w4sl_primary_category_quick_edit"]' );
		if ( ! $select.length ) {
			return;
		}

		const $inlineData = $( '#inline_' + postId );
		const currentRaw = $.trim( $inlineData.find( '.w4sl_primary_category' ).text() );
		const currentValue = String( parseInt( currentRaw, 10 ) || 0 );
		const options = buildOptionsFromChecklist( $editRow );
		const availableValues = {};

		$select.empty();

		options.forEach( function( option ) {
			availableValues[ option.value ] = true;
			$select.append(
				$( '<option />', {
					value: option.value,
					text: option.label,
				} )
			);
		} );

		if ( availableValues[ currentValue ] ) {
			$select.val( currentValue );
		} else {
			$select.val( '0' );
		}

		$editRow.off( 'change.flexlinePrimaryCategory' );
		$editRow.on( 'change.flexlinePrimaryCategory', 'input[name="post_category[]"]', function() {
			const selectedBefore = String( parseInt( $select.val(), 10 ) || 0 );
			const refreshedOptions = buildOptionsFromChecklist( $editRow );
			const refreshedValues = {};

			$select.empty();
			refreshedOptions.forEach( function( option ) {
				refreshedValues[ option.value ] = true;
				$select.append(
					$( '<option />', {
						value: option.value,
						text: option.label,
					} )
				);
			} );

			if ( refreshedValues[ selectedBefore ] ) {
				$select.val( selectedBefore );
			} else {
				$select.val( '0' );
			}
		} );
	}

	const wpInlineEdit = inlineEditPost.edit;
	inlineEditPost.edit = function( id ) {
		wpInlineEdit.apply( this, arguments );

		const postId = getPostIdFromArg( id );
		if ( ! postId ) {
			return;
		}

		populateQuickEditSelect( postId );
	};
} )( window.jQuery );

