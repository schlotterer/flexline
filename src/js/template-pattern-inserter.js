// assets/js/template-switcher.js
// -----------------------------------------------------------------------------
// Starter Pattern Injector – user-initiated only + modal: Replace / Prepend / Don't Insert
// -----------------------------------------------------------------------------
// • Listens only to *user edits* of the Template (getPostEdits().template),
//   never the initial load.
// • Fetches UI-created starters (wp_block CPT) via resolveSelect.
// • If the canvas is pristine → auto Replace.
// • If not pristine → show a wp.components.Modal asking: Replace / Prepend / Don't insert.
// -----------------------------------------------------------------------------
(() => {
	console.log('[template-switcher] booting (with modal)…');

	const { select, resolveSelect, subscribe, dispatch } = wp.data;
	const { parse } = wp.blocks;
	const {
		createElement: h,
		createRoot,
		render,
		unmountComponentAtNode,
	} = wp.element;
	const { Modal, Button, Flex } = wp.components;

	const isEditorReady = () => {
		const ep = select('core/edit-post');
		return ep && typeof ep.isEditorReady === 'function'
			? ep.isEditorReady()
			: true;
	};

	const getEditedTemplate = () =>
		select('core/editor').getPostEdits()?.template; // user edit only
	const getCurrentTemplate = () =>
		select('core/editor').getEditedPostAttribute('template');
	const getPostId = () => select('core/editor').getCurrentPostId();

	/**
	 * Fetch a wp_block by slug (post_name).
	 * @param {string} slug
	 */
	const fetchStarter = async (slug) => {
		const records = await resolveSelect('core').getEntityRecords(
			'postType',
			'wp_block',
			{ per_page: -1, status: 'publish', slug }
		);
		return records?.[0];
	};

	/**
	 * Canvas considered empty?
	 * @param {Array} blocks
	 */
	const isPristine = (blocks) => {
		if (!blocks || blocks.length === 0) {
			return true;
		}
		if (
			blocks.length === 1 &&
			blocks[0].name === 'core/paragraph' &&
			(!blocks[0].attributes?.content ||
				String(blocks[0].attributes.content).trim() === '')
		) {
			return true;
		}
		return blocks.every((b) => b.name === 'core/null');
	};

	/**
	 * Modal prompt – returns 'replace' | 'prepend' | 'cancel'
	 * @param {string} starterSlug
	 */
	const promptAction = (starterSlug) =>
		new Promise((resolve) => {
			const container = document.createElement('div');
			document.body.appendChild(container);

			const close = (value) => {
				try {
					if (createRoot && container._root) {
						container._root.unmount();
					} else {
						unmountComponentAtNode?.(container);
					}
				} catch {}
				container.remove();
				resolve(value);
			};

			const UI = () =>
				h(
					Modal,
					{
						title: 'Apply the starter content?',
						onRequestClose: () => close('cancel'),
					},
					[
						h(
							'p',
							{ style: { marginTop: 0 } },
							`Pattern - ${starterSlug}`
						),
						h(Flex, { gap: '8px', style: { marginTop: '12px' } }, [
							h(
								Button,
								{
									variant: 'primary',
									onClick: () => close('replace'),
								},
								'Replace'
							),
							h(
								Button,
								{
									variant: 'primary',
									onClick: () => close('prepend'),
								},
								'Prepend'
							),
							h(
								Button,
								{
									variant: 'secondary',
									onClick: () => close('cancel'),
								},
								"Don't insert"
							),
						]),
					]
				);

			if (createRoot) {
				container._root = createRoot(container);
				container._root.render(h(UI));
			} else {
				// Fallback for older WP where createRoot isn't available
				(render || wp.element.render)(h(UI), container);
			}
		});

	// ────────────────────────────────────────────────────────────────────────────
	//  Subscriber – reacts only to *user* template edits
	// ────────────────────────────────────────────────────────────────────────────
	let lastEditedTemplate = null; // last value seen in getPostEdits().template
	let busy = false;
	const processed = new Set(); // per-session postId:template

	subscribe(async () => {
		if (!isEditorReady()) {
			return;
		}

		const editedTemplate = getEditedTemplate();
		if (!editedTemplate || editedTemplate === lastEditedTemplate || busy) {
			return;
		}

		lastEditedTemplate = editedTemplate; // lock to this user action

		const postId = getPostId();
		const key = `${postId}:${editedTemplate}`;
		if (processed.has(key)) {
			return;
		} // already handled this exact edit

		busy = true;

		const starterSlug = `${editedTemplate}-starter`;
		console.log(
			'[template-switcher] user changed template →',
			editedTemplate,
			'| starter →',
			starterSlug
		);

		const starter = await fetchStarter(starterSlug);
		if (!starter) {
			console.info(
				'[template-switcher] starter pattern missing; leaving blocks.'
			);
			processed.add(key);
			busy = false;
			return;
		}

		const markup =
			typeof starter.content === 'string'
				? starter.content
				: starter.content?.raw ||
					starter.content?.rendered ||
					starter.post_content ||
					'';

		if (!markup) {
			console.warn(
				'[template-switcher] starter has no markup; aborting.'
			);
			processed.add(key);
			busy = false;
			return;
		}

		const newBlocks = parse(markup);

		const blocksInEd = select('core/block-editor').getBlocks();
		let action = 'replace';
		if (!isPristine(blocksInEd)) {
			action = await promptAction(starterSlug); // 'replace' | 'prepend' | 'cancel'
		}

		if (action === 'cancel') {
			console.log('[template-switcher] user cancelled; no changes made.');
			busy = false;
			return;
		}

		if (action === 'replace') {
			const idsToRemove = blocksInEd.map((b) => b.clientId);
			if (idsToRemove.length) {
				dispatch('core/block-editor').removeBlocks(idsToRemove, true);
			}
			dispatch('core/block-editor').insertBlocks(newBlocks, 0);
		} else if (action === 'prepend') {
			dispatch('core/block-editor').insertBlocks(newBlocks, 0);
		}

		processed.add(key);
		console.log('[template-switcher] starter injected via', action, '✓');
		busy = false;
	});
})();
