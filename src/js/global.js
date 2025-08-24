/* global requestAnimationFrame */
import { initFaders } from './fader';
import {
	isBlockEditor,
	ensureWrapper,
	removeWrapper,
	setupScrollerButtons,
} from './scroller-utils';

// Horizontal Scroll block behaviour – front‑end + block‑editor compatible

//------------------------------------------------------------------
// 1.  Infinite loop setup.
//------------------------------------------------------------------
function setupInfiniteLoop(scroller) {
	if (scroller.dataset.loopInitialised === 'true') {
		return;
	}

	if (!scroller.classList.contains('horizontal-scroller-loop')) {
		return;
	}

	scroller.style.visibility = 'hidden';
	const realSlides = Array.from(scroller.children);
	if (!realSlides.length) {
		return;
	}

	const realWidth = realSlides.reduce(
		(sum, slide) => sum + slide.offsetWidth,
		0
	);

	const makeClone = (el) => {
		const c = el.cloneNode(true);
		c.classList.add('cloned-slide');
		return c;
	};
	const frontClones = realSlides.map(makeClone);
	const backClones = realSlides.map(makeClone);

	frontClones
		.slice()
		.reverse()
		.forEach((c) => scroller.insertBefore(c, scroller.firstChild));
	backClones.forEach((c) => scroller.appendChild(c));

	requestAnimationFrame(() => {
		scroller.scrollLeft = realWidth + 1;
		scroller.style.visibility = '';
		scroller.addEventListener(
			'scroll',
			() => {
				const s = scroller.scrollLeft;
				if (s < realWidth) {
					scroller.scrollLeft = s + realWidth;
				} else if (s >= realWidth * 2) {
					scroller.scrollLeft = s - realWidth;
				}
			},
			{ passive: true }
		);
	});

	scroller.dataset.loopInitialised = 'true';
}

//------------------------------------------------------------------
// 2.  Visibility / status observer (unchanged).
//------------------------------------------------------------------
function buildThresholdList() {
	const t = [];
	for (let i = 0; i <= 1; i += 0.05) {
		t.push(i);
	}
	return t;
}

function setupStatusObserver(scroller) {
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
					} else {
						item.classList.remove('in-view');
						if (curr > prev) {
							item.classList.add('entering');
							item.classList.remove('exiting');
						} else if (curr < prev) {
							item.classList.add('exiting');
							item.classList.remove('entering');
						}
					}
				} else {
					item.classList.add('out-of-view');
					item.classList.remove('in-view', 'entering', 'exiting');
				}
				item.dataset.prevRatio = curr;
			});
		},
		{ root: scroller, threshold: buildThresholdList() }
	);

	Array.from(scroller.children).forEach((child) => observer.observe(child));
}

//------------------------------------------------------------------
// 3.  Public initialiser helpers so we can call them multiple times.
//------------------------------------------------------------------
function initScroller(scroller) {
	/*  First, guarantee wrapper status is in sync with the presence of the style-class. */
	if (scroller.classList.contains('horizontal-scroller-transition-slide')) {
		ensureWrapper(scroller);
	} else {
		removeWrapper(scroller);
	}

	setupScrollerButtons(scroller); // may add / remove button UI
	setupStatusObserver(scroller);
}

/**
 * Remove any clones & reset state on a scroller that was once
 * loop-initialized but no longer has the loop class.
 * @param {HTMLElement} scroller
 */
function teardownInfiniteLoop(scroller) {
	if (scroller.dataset.loopInitialised !== 'true') {
		return;
	}
	Array.from(scroller.children)
		.filter((el) => el.classList.contains('cloned-slide'))
		.forEach((c) => {
			try {
				c.remove();
			} catch {
				// Ignore removal errors.
			}
		});
	scroller.scrollLeft = 0;
	delete scroller.dataset.loopInitialised;
}

/**
 * Sets up a MutationObserver to watch for changes to the
 * horizontal-scroller-loop class on the given scroller element.
 * When the class is added, we set up infinite looping.
 * When the class is removed, we tear down the infinite loop.
 * @param {HTMLElement} scroller
 */
function watchLoopToggle(scroller) {
	if (scroller.dataset.loopObserverAttached) {
		return;
	}
	new window.MutationObserver(() => {
		if (!scroller.classList.contains('horizontal-scroller-loop')) {
			teardownInfiniteLoop(scroller);
		} else {
			setupInfiniteLoop(scroller);
		}
	}).observe(scroller, {
		attributes: true,
		attributeFilter: ['class'],
	});
	scroller.dataset.loopObserverAttached = 'true';
}

/**
 * Whenever *real* children (columns) are added/removed,
 * tear down & rebuild the clones.  Ignore any mutations that
 * involve only cloned‐slides.
 * @param {HTMLElement} scroller
 */
function watchChildrenForLoop(scroller) {
	if (scroller._childObserverAttached) {
		return;
	}
	const mo = new window.MutationObserver((mutations) => {
		// do any of these mutations add or remove a non‐clone?
		const realChange = mutations.some((m) => {
			return (
				Array.from(m.addedNodes).some(
					(n) =>
						n.nodeType === 1 &&
						!n.classList.contains('cloned-slide')
				) ||
				Array.from(m.removedNodes).some(
					(n) =>
						n.nodeType === 1 &&
						!n.classList.contains('cloned-slide')
				)
			);
		});

		if (
			realChange &&
			scroller.classList.contains('horizontal-scroller-loop')
		) {
			teardownInfiniteLoop(scroller);
			setupInfiniteLoop(scroller);
		}
	});

	mo.observe(scroller, { childList: true });
	scroller._childObserverAttached = true;
}

/**
 * Rebuild all loops: first tear down any stale ones,
 * then re-init the ones that actually still have the class.
 */
function initInfiniteLoops() {
	if (isBlockEditor()) {
		// 1) Cleanup any that lost their loop class:
		document
			.querySelectorAll('[data-loop-initialised="true"]')
			.forEach((s) => {
				if (!s.classList.contains('horizontal-scroller-loop')) {
					teardownInfiniteLoop(s);
				}
			});
	}
	// 2) Now re-build only the ones that still want looping
	document
		.querySelectorAll(
			'.horizontal-scroller-transition-slide.horizontal-scroller-loop'
		)
		.forEach(setupInfiniteLoop);
}

/**
 * Initialise one scroller (buttons, status, infinite loop).
 * @param {HTMLElement} scroller
 */
function initOneScroller(scroller) {
	initScroller(scroller);
	if (scroller.classList.contains('horizontal-scroller-loop')) {
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
	watchLoopToggle(scroller);
	watchChildrenForLoop(scroller);

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
		.querySelectorAll('.horizontal-scroller-transition-slide')
		.forEach(scheduleScrollerInit);
	initInfiniteLoops();
}

// on DOMContentLoaded / load you just call:
document.addEventListener('DOMContentLoaded', () => {
	initScrollers();
	initFaders();
});
window.addEventListener('load', () => {
	initScrollers();
	initFaders();
});

// Also watch for new scrollers popping into the editor
if (isBlockEditor()) {
	const bodyObserver = new window.MutationObserver((records) => {
		for (const rec of records) {
			for (const node of rec.addedNodes) {
				if (
					(node.nodeType === 1 &&
						node.classList.contains(
							'horizontal-scroller-transition-slide'
						) &&
						!node.dataset._scrollerInitQueued) ||
					(node.classList.contains(
						'horizontal-scroller-transition-fade'
					) &&
						!node.dataset._faderInitQueued)
				) {
					if (
						node.classList.contains(
							'horizontal-scroller-transition-slide'
						)
					) {
						node.dataset._scrollerInitQueued = 'true';
						scheduleScrollerInit(node);
					} else {
						node.dataset._faderInitQueued = 'true';
						initFaders();
					}
				}
			}
		}
	});

	bodyObserver.observe(document.body, {
		childList: true,
		subtree: true,
	});
	wp.domReady(() => {
		let t;
		wp.data.subscribe(() => {
			clearTimeout(t);
			t = setTimeout(() => {
				initScrollers();
				initFaders();
			}, 200);
		});
	});
}
