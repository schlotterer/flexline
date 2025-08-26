// Horizontal Scroll block behaviour – front‑end + block‑editor compatible

import {
	switchFadeSlide,
	setupFade,
	setupFadeButtons,
} from './horizontal-fade';
import {
	smoothScrollTo,
	setupInfiniteLoop,
	watchLoopToggle,
	watchChildrenForLoop,
	initInfiniteLoops,
	setupScrollButtons,
} from './horizontal-scroll';

// Helper ──────────────────────────────────────────────────────────────────────
function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

//------------------------------------------------------------------
// 1.  A helper for manual smooth scrolling with a configurable duration.
//------------------------------------------------------------------

//------------------------------------------------------------------
// 2.  Next / Prev helpers.
//------------------------------------------------------------------

//------------------------------------------------------------------
// 3.  Infinite loop setup.
//------------------------------------------------------------------

/*───────────────────────────────────────────────────────────────────────
A wrapper should exist *whenever* the block has the style-class and
should be gone when it doesn’t.  These two helpers enforce that rule.
───────────────────────────────────────────────────────────────────────*/
function ensureWrapper(scroller) {
	// First check if the element has a parent at all
	if (!scroller.parentNode) {
		return scroller; // Return the original element since we can't wrap it
	}

	if (
		scroller.parentNode &&
		scroller.parentNode.classList.contains('horizontal-scroll-wrapper')
	) {
		return scroller.parentNode;
	}

	const w = document.createElement('div');
	w.classList.add('horizontal-scroll-wrapper');
	w.style.position = 'relative';
	scroller.parentNode.insertBefore(w, scroller);
	w.appendChild(scroller);
	return w;
}

function removeWrapper(scroller) {
	const parent = scroller.parentNode;
	if (parent && parent.classList.contains('horizontal-scroll-wrapper')) {
		parent.parentNode.insertBefore(scroller, parent);
		parent.remove();
	}
}

//------------------------------------------------------------------
// 4.  Fade initialisation.
//------------------------------------------------------------------

//------------------------------------------------------------------
// 5.  Nav / pause buttons.
//------------------------------------------------------------------

function setupScrollerButtons(scroller) {
	if (!scroller.dataset.classObserverAttached && isBlockEditor()) {
		const relevant = [
			'is-style-horizontal-fade',
			'is-style-horizontal-scroll',
			'horizontal-scroller-navigation',
			'horizontal-scroller-auto',
			'horizontal-scroller-hide-pause-button',
			'horizontal-scroller-loop',
		];

		const updateOnRelevantChange = () => {
			const current = relevant
				.filter((cls) => scroller.classList.contains(cls))
				.join(' ');

			if (scroller.dataset.observedClass !== current) {
				scroller.dataset.observedClass = current;
				initScroller(scroller);
			}
		};

		scroller.dataset.observedClass = relevant
			.filter((cls) => scroller.classList.contains(cls))
			.join(' ');

		new window.MutationObserver(updateOnRelevantChange).observe(scroller, {
			attributes: true,
			attributeFilter: ['class'],
		});
		scroller.dataset.classObserverAttached = 'true';
	}

	if (scroller.classList.contains('is-style-horizontal-fade')) {
		setupFadeButtons(scroller);
	} else if (scroller.classList.contains('is-style-horizontal-scroll')) {
		setupScrollButtons(scroller);
	}
}

//------------------------------------------------------------------
// 6.  Visibility / status observer (unchanged).
//------------------------------------------------------------------
function buildThresholdList() {
	const t = [];
	for (let i = 0; i <= 1; i += 0.05) {
		t.push(i);
	}
	return t;
}

function setupStatusObserver(scroller) {
	// Fade style scrollers handle slide visibility manually when the
	// active slide changes, so the intersection observer is unnecessary.
	if (scroller.classList.contains('is-style-horizontal-fade')) {
		return;
	}

	const observer = new window.IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				const item = entry.target;
				const prev = parseFloat(item.dataset.prevRatio || 0);
				const curr = entry.intersectionRatio;

				if (curr > 0.05) {
					item.classList.remove('out-of-view');
					if (curr >= 0.1) {
						item.classList.add('in-view');
						item.classList.remove('entering', 'exiting');
						item.setAttribute('tabindex', '0');
						item.setAttribute('aria-hidden', 'false');
					} else {
						item.classList.remove('in-view');
						if (curr > prev) {
							item.classList.add('entering');
							item.classList.remove('exiting');
						} else if (curr < prev) {
							item.classList.add('exiting');
							item.classList.remove('entering');
						}
						item.setAttribute('tabindex', '-1');
						item.setAttribute('aria-hidden', 'true');
					}
				} else {
					item.classList.add('out-of-view');
					item.classList.remove('in-view', 'entering', 'exiting');
					item.setAttribute('tabindex', '-1');
					item.setAttribute('aria-hidden', 'true');
				}
				item.dataset.prevRatio = curr;
			});
		},
		{ root: scroller, threshold: buildThresholdList() }
	);

	Array.from(scroller.children).forEach((child, index) => {
		child.setAttribute('tabindex', '-1');
		child.setAttribute('aria-hidden', 'true');
		observer.observe(child);
		if (index === 0) {
			child.setAttribute('tabindex', '0');
			child.setAttribute('aria-hidden', 'false');
		}
	});
}

//------------------------------------------------------------------
// 7.  Public initialiser helpers so we can call them multiple times.
//------------------------------------------------------------------
function initScroller(scroller) {
	/*  First, guarantee wrapper status is in sync with the presence of the style-class. */
	if (!setupFade(scroller)) {
		if (
			scroller.classList.contains('is-style-horizontal-scroll') ||
			scroller.classList.contains('is-style-horizontal-fade')
		) {
			ensureWrapper(scroller);
		} else {
			removeWrapper(scroller);
		}
	}

	setupFade(scroller);
	setupScrollerButtons(scroller); // may add / remove button UI
	setupStatusObserver(scroller);
}

/**
 * Remove any clones & reset state on a scroller that was once
 * loop-initialized but no longer has the loop class.
 * @param {HTMLElement} scroller
 */

/**
 * Sets up a MutationObserver to watch for changes to the
 * horizontal-scroller-loop class on the given scroller element.
 * When the class is added, we set up infinite looping.
 * When the class is removed, we tear down the infinite loop.
 * @param {HTMLElement} scroller
 */

/**
 * Whenever *real* children (columns) are added/removed,
 * tear down & rebuild the clones.  Ignore any mutations that
 * involve only cloned‐slides.
 * @param {HTMLElement} scroller
 */

/**
 * Rebuild all loops: first tear down any stale ones,
 * then re-init the ones that actually still have the class.
 */

/**
 * Initialise one scroller (buttons, status, infinite loop).
 * @param {HTMLElement} scroller
 */
function initOneScroller(scroller) {
	initScroller(scroller);
	if (
		scroller.classList.contains('horizontal-scroller-loop') &&
		scroller.classList.contains('is-style-horizontal-scroll')
	) {
		setupInfiniteLoop(scroller);
	}
}

/**
 * Schedule everything (watchers + first init) at the right time.
 * @param {HTMLElement} scroller
 */
/**
 * Schedule everything (watchers + first init) at the right time.
 * @param {HTMLElement} scroller
 */
function scheduleScrollerInit(scroller) {
	if (scroller.classList.contains('is-style-horizontal-scroll')) {
		watchLoopToggle(scroller);
		watchChildrenForLoop(scroller);
	}

	if (
		isBlockEditor() &&
		scroller.classList.contains('wp-block-post-template')
	) {
		// Initial check for posts
		if (scroller.querySelectorAll('.wp-block-post').length) {
			initOneScroller(scroller);
			return;
		}

		// Set a flag to track if we've initialized
		let didInit = false;

		// Use wp.data to check for loaded posts
		if (typeof wp !== 'undefined' && wp.data && wp.data.subscribe) {
			const unsubscribe = wp.data.subscribe(() => {
				// Skip if already initialized
				if (didInit) {
					unsubscribe();
					return;
				}

				// Check if posts are loaded in the scroller
				if (scroller.querySelectorAll('.wp-block-post').length) {
					didInit = true;
					unsubscribe();
					initOneScroller(scroller);
				}
			});
		} else {
			// Fallback to MutationObserver if wp.data is not available
			const obs = new window.MutationObserver(() => {
				if (
					!didInit &&
					scroller.querySelectorAll('.wp-block-post').length
				) {
					didInit = true;
					obs.disconnect();
					initOneScroller(scroller);
				}
			});
			obs.observe(scroller, { childList: true, subtree: true });
		}

		// Fallback timeout as a last resort
		setTimeout(() => {
			if (!didInit) {
				didInit = true;
				initOneScroller(scroller);
			}
		}, 3000);
	} else {
		// For non-block editor contexts, initialize immediately
		initOneScroller(scroller);
	}
}

/**
 * Boot-strap: find every “.is-style-horizontal-scroll” and hand
 * it off to our scheduler.
 */
function initScrollers() {
	document
		.querySelectorAll(
			'.is-style-horizontal-scroll, .is-style-horizontal-fade'
		)
		.forEach(scheduleScrollerInit);
	initInfiniteLoops();
}

// on DOMContentLoaded / load you just call:
document.addEventListener('DOMContentLoaded', initScrollers);
window.addEventListener('load', initScrollers);

// Keep a reference to the body observer for later cleanup.
let bodyObserver;

// 2. Also watch for new scrollers popping into the editor
if (isBlockEditor()) {
	bodyObserver = new window.MutationObserver((records) => {
		for (const rec of records) {
			for (const node of rec.addedNodes) {
				if (
					node.nodeType === 1 &&
					(node.classList.contains('is-style-horizontal-scroll') ||
						node.classList.contains('is-style-horizontal-fade')) &&
					!node.dataset._scrollerInitQueued
				) {
					node.dataset._scrollerInitQueued = 'true';
					scheduleScrollerInit(node);
				}
			}
		}
	});

	bodyObserver.observe(document.body, {
		childList: true,
		subtree: true,
	});
	wp.domReady(() => {
		// Ensure scrollers are initialized before observing selections.
		initScrollers();

		let lastSelected;
		const unsubscribe = wp.data.subscribe(() => {
			const editor = wp.data.select('core/block-editor');
			const selectedId = editor.getSelectedBlockClientId();

			if (!selectedId || selectedId === lastSelected) {
				return;
			}

			lastSelected = selectedId;
			const block = editor.getBlock(selectedId);
			if (!block) {
				return;
			}

			const parents = editor.getBlockParents(selectedId);
			let columnId = null;

			if (block.name === 'core/column') {
				columnId = selectedId;
			} else {
				for (let i = parents.length - 1; i >= 0; i--) {
					const parentBlock = editor.getBlock(parents[i]);
					if (parentBlock && parentBlock.name === 'core/column') {
						columnId = parents[i];
						break;
					}
				}
			}

			if (!columnId) {
				return;
			}

			const el = document.querySelector(`[data-block="${columnId}"]`);
			if (!el) {
				return;
			}

			const scroller = el.closest(
				'.is-style-horizontal-scroll, .is-style-horizontal-fade'
			);
			if (!scroller) {
				return;
			}

			const index = Array.from(scroller.children).indexOf(el);
			if (scroller.classList.contains('is-style-horizontal-fade')) {
				switchFadeSlide(scroller, index);
			} else {
				const duration = parseInt(
					scroller.getAttribute('data-scroll-speed') || '600',
					10
				);
				smoothScrollTo(scroller, el.offsetLeft, duration);
			}

			if (typeof scroller._stopAutoScroll === 'function') {
				scroller._stopAutoScroll();
			}
		});

		// Clean up subscription and observer on page unload to prevent leaks.
		window.addEventListener('beforeunload', () => {
			unsubscribe();
			if (bodyObserver) {
				bodyObserver.disconnect();
				bodyObserver = null;
			}
		});
	});
}
