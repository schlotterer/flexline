/**
 * Flexline – poster-gallery helper
 *
 * Ensures every image inside a `.poster-gallery` owns an <a> wrapper
 * so baguetteBox can bind reliably—even when the user neglected to
 * set “link to → media file” in the editor.
 *
 * Works for both front-end and the site editor preview.
 */
(() => {
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
	};

	// DOM ready – cover classic, module, and delayed hydration.
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init, { once: true });
	} else {
		init();
	}

	// Optional: observe late-loaded blocks (Site Editor, ACF blocks, etc.)
	const mo = new MutationObserver((mutations) => {
		for (const m of mutations) {
			m.addedNodes.forEach((n) => {
				if (n.nodeType !== 1) {
					return;
				} // not an element
				if (n.matches?.('.poster-gallery')) {
					prepareGallery(n);
				}
				// or new figures inserted under an existing gallery
				if (n.querySelector?.('.poster-gallery')) {
					n.querySelectorAll('.poster-gallery').forEach(
						prepareGallery
					);
				}
			});
		}
	});
	mo.observe(document.body, { childList: true, subtree: true });
})();
