/**
 * FlexLine – poster-gallery helper
 *
 * Ensures every image inside a `.poster-gallery` owns an <a> wrapper
 * so baguetteBox can bind reliably—even when the user neglected to
 * set “link to → media file” in the editor.
 *
 * Works for both front-end and the site editor preview.
 */
(() => {
	const DEFAULT_SELECTOR =
		'.wp-block-gallery,:not(.wp-block-gallery)>.wp-block-image,.wp-block-media-text__media,.gallery';
	const DEFAULT_FILTER_EXPRESSION =
		'/.+\\.(gif|jpe?g|png|webp|svg|avif|heif|heic|tif?f|)($|\\?)/i';

	/**
	 * Parse a PHP-provided regex expression ("/.../flags") into a JS RegExp.
	 * If parsing fails we return null and let baguetteBox use its own default.
	 *
	 * @param {string} expression
	 * @return {RegExp|null}
	 */
	const parseRegexExpression = (expression) => {
		if (typeof expression !== 'string') {
			return null;
		}

		const trimmed = expression.trim();
		if (!trimmed || trimmed[0] !== '/') {
			return null;
		}

		const lastSlash = trimmed.lastIndexOf('/');
		if (lastSlash <= 0) {
			return null;
		}

		const pattern = trimmed.slice(1, lastSlash);
		const flags = trimmed.slice(lastSlash + 1);

		try {
			return new RegExp(pattern, flags);
		} catch (error) {
			console.warn(
				'[flexline/poster-gallery-helper] Failed to parse baguette filter regex.',
				error
			);
			return null;
		}
	};

	const getBaguetteConfig = () => {
		const config =
			window.flexlineBaguetteConfig &&
			typeof window.flexlineBaguetteConfig === 'object'
				? window.flexlineBaguetteConfig
				: {};

		const selector =
			typeof config.selector === 'string' && config.selector.trim()
				? config.selector.trim()
				: DEFAULT_SELECTOR;

		const filter =
			parseRegexExpression(config.filter) ||
			parseRegexExpression(DEFAULT_FILTER_EXPRESSION) ||
			null;

		return { selector, filter };
	};

	/**
	 * Shared caption resolver kept in JS (instead of a one-time inline load
	 * callback) so we can safely re-run baguetteBox after dynamic DOM updates.
	 *
	 * @param {HTMLAnchorElement} trigger
	 * @return {string|boolean}
	 */
	const resolveCaption = (trigger) => {
		if (!trigger || !trigger.parentElement) {
			return false;
		}

		const isImageFigure =
			trigger.parentElement.classList.contains('wp-block-image') ||
			trigger.parentElement.classList.contains('wp-block-media-text__media');

		const captionNode = isImageFigure
			? trigger.parentElement.querySelector('figcaption')
			: trigger.parentElement.parentElement?.querySelector('figcaption,dd');

		return captionNode ? captionNode.innerHTML : false;
	};

	/**
	 * Re-bind baguetteBox after dynamic gallery changes.
	 *
	 * Why this exists:
	 * - Theme-level lightbox init previously ran only once on window.load.
	 * - Location comparison cards and other SSR fragments can be injected later.
	 * - Re-running here ensures those late anchors are picked up.
	 */
	let hasBoundLightbox = false;
	let refreshInProgress = false;
	let refreshRequested = false;

	const refreshBaguetteBox = () => {
		if (!window.baguetteBox || typeof window.baguetteBox.run !== 'function') {
			return;
		}
		if (refreshInProgress) {
			refreshRequested = true;
			return;
		}
		refreshInProgress = true;

		const { selector, filter } = getBaguetteConfig();
		try {
			// Only destroy after a successful prior run to avoid calling into
			// baguetteBox teardown before its internals are fully initialized.
			if (
				hasBoundLightbox &&
				typeof window.baguetteBox.destroy === 'function'
			) {
				try {
					window.baguetteBox.destroy();
				} catch (error) {
					console.warn(
						'[flexline/poster-gallery-helper] baguetteBox.destroy() failed; continuing with fresh run.',
						error
					);
				}
			}

			window.baguetteBox.run(selector, {
				captions: resolveCaption,
				filter,
			});
			hasBoundLightbox = true;
		} finally {
			refreshInProgress = false;
			if (refreshRequested) {
				refreshRequested = false;
				window.requestAnimationFrame(refreshBaguetteBox);
			}
		}
	};

	const debounce = (fn, delay = 100) => {
		let timer = null;
		return () => {
			if (timer) {
				window.clearTimeout(timer);
			}
			timer = window.setTimeout(() => {
				timer = null;
				fn();
			}, delay);
		};
	};

	const queueLightboxRefresh = debounce(refreshBaguetteBox, 100);

	/**
	 * Returns the best URL we can promote to a lightbox link.
	 * Priority: data-full-url (added by WP on insert) > data-large-file > src.
	 * @param {HTMLImageElement} img
	 * @return {string|null}
	 */

	const getFullImageURL = (img) =>
		img.dataset.fullUrl ||
		img.dataset.largeFile ||
		img.getAttribute('src') ||
		null;

	/**
	 * Process a single poster-gallery block.
	 * @param {Element} galleryEl
	 */
	const prepareGallery = (galleryEl) => {
		galleryEl
			.querySelectorAll('figure.wp-block-image')
			.forEach((figure) => {
				// Already wrapped – bail.
				if (figure.querySelector('a')) {
					return;
				}

				const img = figure.querySelector('img');
				if (!img) {
					return;
				}

				const url = getFullImageURL(img);
				if (!url) {
					return;
				}

				const anchor = document.createElement('a');
				anchor.href = url;
				anchor.className = 'poster-gallery__link';

				// Preserve caption title for baguetteBox tooltip
				if (img.alt) {
					anchor.title = img.alt;
				}

				// Move the <img> into <a>, then back into <figure>
				figure.replaceChild(anchor, img);
				anchor.appendChild(img);
			});
	};

	/**
	 * Initialise once DOM is ready.
	 */
	const init = () => {
		document.querySelectorAll('.poster-gallery').forEach(prepareGallery);
		queueLightboxRefresh();
	};

	// DOM ready – cover classic, module, and delayed hydration.
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init, { once: true });
	} else {
		init();
	}

	// Optional: observe late-loaded blocks (Site Editor, ACF blocks, etc.)
	const mo = new MutationObserver((mutations) => {
		let changed = false;

		for (const m of mutations) {
			m.addedNodes.forEach((n) => {
				if (n.nodeType !== 1) {
					return;
				} // not an element
				if (n.matches?.('.poster-gallery')) {
					prepareGallery(n);
					changed = true;
				}
				// or new figures inserted under an existing gallery
				if (n.querySelector?.('.poster-gallery')) {
					n.querySelectorAll('.poster-gallery').forEach(
						prepareGallery
					);
					changed = true;
				}
			});
		}

		if (changed) {
			queueLightboxRefresh();
		}
	});
	const startObserver = () => {
		if (!document.body) {
			return;
		}
		mo.observe(document.body, { childList: true, subtree: true });
	};

	if (document.body) {
		startObserver();
	} else {
		document.addEventListener('DOMContentLoaded', startObserver, {
			once: true,
		});
	}

	// Explicit dynamic-content hook used by blocks that replace markup after
	// initial load (e.g. location map comparison/list rendering).
	window.addEventListener('flexline:content-updated', queueLightboxRefresh);
})();
