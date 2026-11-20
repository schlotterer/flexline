/**
 * Scoped late-component transport using the page's server-owned catalog.
 * @param {Window} win    Browser window.
 * @param {Object} config Server-provided component catalog.
 */
export function createComponentLoader(win, config) {
	const doc = win.document;
	const pending = new Map();
	const initialized = new Map([
		['.is-style-slider', new WeakSet()],
		['.is-style-horizontal-scroll', new WeakSet()],
	]);
	const order = Object.keys(config.catalog || {});
	const nodes = (root, selector) => [
		...(root?.matches?.(selector) ? [root] : []),
		...Array.from(root?.querySelectorAll?.(selector) || []),
	];
	const url = (value) => new win.URL(value, doc.baseURI).href;
	const existing = (asset) => {
		if (
			config.complete &&
			asset.kind === 'style' &&
			asset.handle !== 'flexline-modal-css'
		) {
			return true;
		}
		const handle =
			asset.handle === 'flexline-modal-css'
				? 'flexline-modal'
				: asset.handle;
		const byId = doc.getElementById(
			`${handle}-${asset.kind === 'style' ? 'css' : 'js'}`
		);
		if (byId) {
			return byId;
		}
		const selector =
			asset.kind === 'style' ? 'link[rel="stylesheet"]' : 'script[src]';
		return Array.from(doc.querySelectorAll(selector)).find(
			(node) => url(node.href || node.src) === url(asset.src)
		);
	};
	const load = (asset) => {
		if (pending.has(asset.handle)) {
			return pending.get(asset.handle);
		}
		if (existing(asset)) {
			return Promise.resolve();
		}
		const promise = new Promise((resolve, reject) => {
			const node = doc.createElement(
				asset.kind === 'style' ? 'link' : 'script'
			);
			node.dataset.flexlineAsset = asset.handle;
			const finish = (error) => {
				win.clearTimeout(timer);
				node.onload = node.onerror = null;
				if (error) {
					node.remove();
					pending.delete(asset.handle);
					reject(error);
				} else {
					resolve();
				}
			};
			node.onload = () => finish();
			node.onerror = () =>
				finish(
					new Error('Unable to load component assets. Please retry.')
				);
			const timer = win.setTimeout(
				() =>
					finish(
						new Error(
							'Component asset request timed out. Please retry.'
						)
					),
				15000
			);
			if (asset.kind === 'style') {
				node.rel = 'stylesheet';
				node.href = asset.src;
				// Insert in the original component order, before the inline cascade tail.
				const later = order
					.slice(order.indexOf(asset.handle) + 1)
					.filter((handle) =>
						handle.startsWith('flexline-component-')
					)
					.map(
						(handle) =>
							doc.querySelector(
								`[data-flexline-asset="${handle}"]`
							) ||
							doc.getElementById(
								`${handle === 'flexline-modal-css' ? 'flexline-modal' : handle}-css`
							)
					)
					.find((candidate) => candidate?.tagName === 'LINK');
				const anchor =
					asset.handle === 'flexline-modal-css'
						? doc.getElementById('flexline-custom-css')
						: later ||
							doc.getElementById(
								'flexline-component-tail-inline-css'
							) ||
							doc.getElementById('flexline-custom-css');
				if (anchor) {
					anchor.before(node);
				} else {
					doc.head.appendChild(node);
				}
			} else {
				node.async = false;
				node.src = asset.src;
				doc.head.appendChild(node);
			}
		});
		pending.set(asset.handle, promise);
		return promise;
	};
	const ensure = async (manifest) => {
		// Older plugin responses rely on predeclared or complete-mode assets.
		if (!manifest) {
			return;
		}
		if (manifest.schema !== 1 || !Array.isArray(manifest.assets)) {
			throw new Error(
				'Unsupported component assets. Please refresh the page.'
			);
		}
		const requested = new Set();
		for (const asset of manifest.assets) {
			const trusted = config.catalog?.[asset.handle];
			if (
				!trusted ||
				trusted.kind !== asset.kind ||
				url(trusted.src) !== url(asset.src) ||
				trusted.version !== asset.version
			) {
				throw new Error(
					'Component assets changed. Please refresh the page.'
				);
			}
			requested.add(asset.handle);
		}
		// All CSS finishes before any dependent runtime. Shared dependencies are predeclared.
		for (const handle of order) {
			if (requested.has(handle)) {
				await load(config.catalog[handle]);
			}
		}
	};
	const init = (root = doc) => {
		if (root !== doc && !root?.isConnected) {
			return;
		}
		for (const [selector, runtime] of [
			['.is-style-slider', win.FlexlineSlider],
			['.is-style-horizontal-scroll', win.FlexlineHorizontalScroll],
		]) {
			if (!runtime?.init) {
				continue;
			}
			for (const node of nodes(root, selector)) {
				if (!initialized.get(selector).has(node)) {
					runtime.init(node);
					initialized.get(selector).add(node);
				}
			}
		}
	};
	const teardown = (root) => {
		for (const [selector, runtime] of [
			['.is-style-slider', win.FlexlineSlider],
			['.is-style-horizontal-scroll', win.FlexlineHorizontalScroll],
		]) {
			for (const node of nodes(root, selector)) {
				runtime?.teardown?.(node);
				initialized.get(selector).delete(node);
			}
		}
	};
	win.addEventListener('flexline:content-updated', (event) => {
		init(event.detail?.root || event.detail?.element || doc);
	});
	// Older integrations may remove content without the explicit teardown API.
	const observer = new win.MutationObserver((records) => {
		for (const record of records) {
			for (const node of record.removedNodes) {
				if (!node.isConnected && node.nodeType === 1) {
					teardown(node);
				}
			}
		}
	});
	const boot = () =>
		observer.observe(doc.body, { childList: true, subtree: true });
	if (doc.body) {
		boot();
	} else {
		doc.addEventListener('DOMContentLoaded', boot, { once: true });
	}
	return { ensure, init, teardown };
}

if (
	typeof window !== 'undefined' &&
	window.FlexlineComponentAssets &&
	!window.FlexlineComponents
) {
	window.FlexlineComponents = createComponentLoader(
		window,
		window.FlexlineComponentAssets
	);
}
