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
	/**
	 * Normalize a template identifier to a bare slug.
	 * Handles:
	 *  - 'wp_template:theme//slug'
	 *  - 'theme//slug'
	 *  - 'templates/slug.html' or 'page-templates/full-width.php'
	 * @param {string} value
	 * @return {string} Normalized template slug.
	 */
	const normalizeTemplateSlug = (value) => {
		if (!value) {
			return '';
		}
		let tpl = String(value);
		// Drop provider prefix, e.g. 'wp_template:'
		tpl = tpl.replace(/^[^:]+:/, '');
		// Drop theme identifier before '//'
		const dbl = tpl.indexOf('//');
		if (dbl !== -1) {
			tpl = tpl.slice(dbl + 2);
		}
		// Last path segment (if any)
		tpl = tpl.split('/').pop();
		// Remove extension
		tpl = tpl.replace(/\.[^.]+$/, '');
		// Sanitize to slug
		return tpl
			.trim()
			.toLowerCase()
			.replace(/[^a-z0-9-]+/g, '-')
			.replace(/^-+|-+$/g, '');
	};

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

	subscribe(async () => {
		if (!isEditorReady()) {
			return;
		}

		const editedTemplate = getEditedTemplate();
		if (!editedTemplate || editedTemplate === lastEditedTemplate || busy) {
			return;
		}

		lastEditedTemplate = editedTemplate; // lock to this user action
		busy = true;

		const normalized = normalizeTemplateSlug(editedTemplate);
		if (!normalized) {
			busy = false;
			return;
		}

		const starterSlug = `${normalized}-starter`;
		const starter = await fetchStarter(starterSlug);

		if (!starter) {
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
			busy = false;
			return;
		}

		const blocksInEd = select('core/block-editor').getBlocks();
		let action = 'replace';
		if (!isPristine(blocksInEd)) {
			action = await promptAction(starterSlug);
		}

		if (action === 'cancel') {
			busy = false;
			return;
		}

		const newBlocks = parse(markup);
		if (action === 'replace') {
			const idsToRemove = blocksInEd.map((b) => b.clientId);
			if (idsToRemove.length) {
				dispatch('core/block-editor').removeBlocks(idsToRemove, true);
			}
			dispatch('core/block-editor').insertBlocks(newBlocks, 0);
		} else if (action === 'prepend') {
			dispatch('core/block-editor').insertBlocks(newBlocks, 0);
		}

		busy = false;
	});
})();
