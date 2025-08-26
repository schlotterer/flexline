/* global requestAnimationFrame */

// Horizontal Scroll block behaviour – front‑end + block‑editor compatible

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
function smoothScrollTo(scroller, targetScrollLeft, duration) {
	const start = scroller.scrollLeft;
	const distance = targetScrollLeft - start;
	const startTime = performance.now();

	function step(currentTime) {
		const elapsed = currentTime - startTime;
		const progress = Math.min(elapsed / duration, 1); // clamp 0..1

		scroller.scrollLeft = start + distance * easeInOutQuad(progress);

		if (progress < 1) {
			requestAnimationFrame(step);
		}
	}

	function easeInOutQuad(t) {
		return t < 0.5 ? 2 * t * t : 1 - Math.pow(-2 * t + 2, 2) / 2;
	}

	requestAnimationFrame(step);
}

//------------------------------------------------------------------
// 2.  Next / Prev helpers.
//------------------------------------------------------------------
function switchFadeSlide(scroller, newIndex) {
	const items = Array.from(scroller.children);
	if (!items.length) {
		return;
	}
	const count = items.length;
	const index = ((newIndex % count) + count) % count;
	items.forEach((item, i) => {
		const active = i === index;
		item.classList.toggle('is-active', active);
		// With fade transitions we manage aria-hidden manually to keep
		// non-visible slides out of the accessibility tree.
		item.setAttribute('aria-hidden', active ? 'false' : 'true');
		item.setAttribute('tabindex', active ? '0' : '-1');
	});
}

function scrollToNext(scroller) {
	if (scroller.classList.contains('is-style-horizontal-fade')) {
		const items = Array.from(scroller.children);
		const current = items.findIndex((c) =>
			c.classList.contains('is-active')
		);
		switchFadeSlide(scroller, current + 1);
		return;
	}

	const epsilon = 5; // small tolerance
	const durationAttr = scroller.getAttribute('data-scroll-speed');
	const duration = durationAttr ? parseInt(durationAttr, 10) : 600;

	const current = scroller.scrollLeft;
	let target = current;

	const items = Array.from(scroller.children);
	for (const item of items) {
		const itemStart = item.offsetLeft;
		if (itemStart > current + epsilon) {
			target = itemStart;
			break;
		}
	}
	smoothScrollTo(scroller, target, duration);
}

function scrollToPrev(scroller) {
	if (scroller.classList.contains('is-style-horizontal-fade')) {
		const items = Array.from(scroller.children);
		const current = items.findIndex((c) =>
			c.classList.contains('is-active')
		);
		switchFadeSlide(scroller, current - 1);
		return;
	}

	const epsilon = 5;
	const duration = parseInt(
		scroller.getAttribute('data-scroll-speed') || '600',
		10
	);
	const items = Array.from(scroller.children);
	const current = scroller.scrollLeft;

	const prevOffsets = items
		.map((item) => item.offsetLeft)
		.filter((offset) => offset + epsilon < current);

	const target = prevOffsets.length
		? Math.max(...prevOffsets)
		: scroller.scrollWidth - scroller.offsetWidth;

	smoothScrollTo(scroller, target, duration);
}

//------------------------------------------------------------------
// 3.  Infinite loop setup.
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
function setupFade(scroller) {
	if (!scroller.classList.contains('is-style-horizontal-fade')) {
		return false;
	}
	const wrapper = ensureWrapper(scroller);

	function setHeight() {
		const styles = window.getComputedStyle(scroller);
		const header = document.querySelector('header.site-header');
		const headerHeight = header ? header.offsetHeight : 0;
		const height =
			styles.getPropertyValue('--fade-height').trim() ||
			styles.getPropertyValue('--horizontal-fader-height').trim() ||
			`calc(100svh - ${headerHeight}px)`;
		wrapper.style.setProperty('--horizontal-fader-height', height);
	}

	setHeight();
	window.addEventListener('resize', setHeight);

	const speed = parseInt(
		scroller.getAttribute('data-scroll-speed') || '',
		10
	);
	if (!Number.isNaN(speed)) {
		scroller.style.setProperty('--horizontal-fade-duration', `${speed}ms`);
	}

	switchFadeSlide(scroller, 0);

	return true;
}

//------------------------------------------------------------------
// 5.  Nav / pause buttons.
//------------------------------------------------------------------
function setupScrollerButtons(scroller) {
	if (!scroller.dataset.classObserverAttached && isBlockEditor()) {
		new window.MutationObserver(() => initScroller(scroller)).observe(
			scroller,
			{ attributes: true, attributeFilter: ['class'] }
		);
		scroller.dataset.classObserverAttached = 'true';
	}
	// ──────────────────────────────────────────────────────────────────────
	// 0. Determine current option state *up‑front*
	//    (We need this before any early‑exit based on buttonsInitialised.)
	// ──────────────────────────────────────────────────────────────────────
	let currentStyle = 'none';
	const hasFade = scroller.classList.contains('is-style-horizontal-fade');
	const hasScroll = scroller.classList.contains('is-style-horizontal-scroll');
	if (hasFade) {
		currentStyle = 'fade';
	} else if (hasScroll) {
		currentStyle = 'slide';
	}

	const hasNav = scroller.classList.contains(
		'horizontal-scroller-navigation'
	);
	const hasAuto = scroller.classList.contains('horizontal-scroller-auto');
	const showPause =
		hasAuto &&
		!scroller.classList.contains('horizontal-scroller-hide-pause-button');

	// If the nav / pause state or transition style changed since the last run,
	// force a rebuild.
	if (
		scroller.dataset.buttonsInitialised === 'true' &&
		(hasNav !== (scroller.dataset.prevHasNav === 'true') ||
			showPause !== (scroller.dataset.prevShowPause === 'true') ||
			currentStyle !== scroller.dataset.prevStyle)
	) {
		const existing = scroller.parentNode.querySelector(
			'.horizontal-scroller-nav-buttons'
		);
		if (existing) {
			existing.remove();
		}
		delete scroller.dataset.buttonsInitialised; // let the function fall through and rebuild
	}
	// Remember current state for the next toggle
	scroller.dataset.prevHasNav = hasNav;
	scroller.dataset.prevShowPause = showPause;
	scroller.dataset.prevStyle = currentStyle;

	if (scroller.dataset.buttonsInitialised === 'true') {
		if (!hasNav && !showPause) {
			const existing = scroller.parentNode.querySelector(
				'.horizontal-scroller-nav-buttons'
			);
			if (existing) {
				existing.remove();
			}
			delete scroller.dataset.buttonsInitialised; // reset so we can rebuild later
		} else {
			return; // nothing changed – keep existing buttons
		}
	}

	// ──────────────────────────────────────────────────────────────────────
	// 1. Set up optional auto-scroll
	// ──────────────────────────────────────────────────────────────────────
	let autoScrollTimeout;
	let autoScrollDelay;
	let isPaused = false;
	const hasStarted = false;

	function resetAutoScrollTimer() {
		// only reset if we’re in “auto” mode
		if (!hasAuto) {
			return;
		}
		clearTimeout(autoScrollTimeout);
		autoScrollTimeout = null;
		if (!isPaused) {
			startAutoScroll();
		}
	}

	function scheduleNextAutoScroll() {
		autoScrollTimeout = setTimeout(() => {
			scrollToNext(scroller);
			scheduleNextAutoScroll();
		}, autoScrollDelay);
	}

	function startAutoScroll() {
		if (autoScrollTimeout) {
			return;
		}
		const scrollInterval = parseInt(
			scroller.getAttribute('data-scroll-interval') || '4000',
			10
		);
		const isFade = scroller.classList.contains('is-style-horizontal-fade');
		const durationVar = isFade
			? '--horizontal-fade-duration'
			: '--wp--custom--transition-time';
		const durationValue =
			window.getComputedStyle(scroller).getPropertyValue(durationVar) ||
			'0ms';
		const match = durationValue.match(/(\d+(?:\.\d+)?)m?s/);
		const extraDelay = match
			? parseFloat(match[1]) * (durationValue.includes('ms') ? 1 : 1000)
			: 0;
		autoScrollDelay = scrollInterval + extraDelay;
		scheduleNextAutoScroll();
	}

	function stopAutoScroll() {
		clearTimeout(autoScrollTimeout);
		autoScrollTimeout = null;
	}

	// Expose for external control (e.g., block-editor selection handler).
	scroller._stopAutoScroll = stopAutoScroll;

	function observeVisibility() {
		const observer = new window.IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting && !hasStarted) {
						startAutoScroll();
						observer.disconnect();
					}
				});
			},
			{ threshold: 0.3 }
		);
		observer.observe(scroller);
	}

	if (hasAuto) {
		const reduceMotionQuery = window.matchMedia(
			'(prefers-reduced-motion: reduce)'
		);

		const handleMotionChange = (e) => {
			if (e.matches) {
				stopAutoScroll();
			}
		};

		if (reduceMotionQuery.addEventListener) {
			reduceMotionQuery.addEventListener('change', handleMotionChange);
		} else if (reduceMotionQuery.addListener) {
			reduceMotionQuery.addListener(handleMotionChange);
		}

		if (!reduceMotionQuery.matches) {
			if (
				isBlockEditor() ||
				scroller.classList.contains('scroller-pause-on-hover')
			) {
				scroller.addEventListener('mouseenter', stopAutoScroll);
				scroller.addEventListener('mouseleave', () => {
					if (!isPaused) {
						startAutoScroll();
					}
				});
			}
			observeVisibility();
		}
	}

	// If neither nav nor pause is requested, we are done.
	if (!hasNav && !showPause) {
		return;
	}

	// ──────────────────────────────────────────────────────────────────────
	// 2. Build container + buttons (first time, or after tear‑down)
	// ──────────────────────────────────────────────────────────────────────
	// Make sure we have a wrapper first (created once, reused after)
	const wrapper = ensureWrapper(scroller);

	const controlContainer = document.createElement('div');
	controlContainer.classList.add('horizontal-scroller-nav-buttons');
	controlContainer.style.position = 'absolute';
	controlContainer.style.display = 'flex';
	controlContainer.style.gap = '4px';
	controlContainer.style.pointerEvents = 'auto';

	let scrollToPrevBtn, scrollToNextBtn, pausePlayBtn;

	if (hasNav) {
		scrollToPrevBtn = document.createElement('button');
		scrollToPrevBtn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-prev'
		);
		scrollToPrevBtn.setAttribute('aria-label', 'Scroll to previous item');
		scrollToPrevBtn.innerHTML =
			'<span class="material-symbols-outlined">' +
			'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
			'<path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';
		scrollToPrevBtn.addEventListener('click', () => {
			scrollToPrev(scroller);
			resetAutoScrollTimer();
		});

		scrollToNextBtn = document.createElement('button');
		scrollToNextBtn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-next'
		);
		scrollToNextBtn.setAttribute('aria-label', 'Scroll to next item');
		scrollToNextBtn.innerHTML =
			'<span class="material-symbols-outlined">' +
			'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
			'<path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';
		scrollToNextBtn.addEventListener('click', () => {
			scrollToNext(scroller);
			resetAutoScrollTimer();
		});
	}

	if (showPause) {
		pausePlayBtn = document.createElement('button');
		pausePlayBtn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-pause'
		);
		pausePlayBtn.setAttribute('aria-label', 'Pause auto-scroll');
		pausePlayBtn.innerHTML =
			'<span class="material-symbols-outlined">' +
			'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
			'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';

		pausePlayBtn.addEventListener('click', () => {
			if (isPaused) {
				isPaused = false;
				pausePlayBtn.setAttribute('aria-label', 'Pause auto-scroll');
				pausePlayBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
				resetAutoScrollTimer();
			} else {
				isPaused = true;
				pausePlayBtn.setAttribute('aria-label', 'Resume auto-scroll');
				pausePlayBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M320-720v480l400-240-400-240Z"/></svg></span>';
				stopAutoScroll();
			}
		});
	}

	if (hasNav) {
		controlContainer.appendChild(scrollToPrevBtn);
		if (pausePlayBtn) {
			controlContainer.appendChild(pausePlayBtn);
		}
		controlContainer.appendChild(scrollToNextBtn);
	} else if (pausePlayBtn) {
		controlContainer.appendChild(pausePlayBtn);
	}

	wrapper.appendChild(controlContainer);

	scroller.dataset.buttonsInitialised = 'true';
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
			'.is-style-horizontal-scroll.horizontal-scroller-loop'
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

		let t;
		let lastSelected;
		const unsubscribe = wp.data.subscribe(() => {
			// Re-run scroller init when editor data changes.
			clearTimeout(t);
			t = setTimeout(() => initScrollers(), 200);

			const editor = wp.data.select('core/block-editor');
			const selectedId = editor.getSelectedBlockClientId();

			if (!selectedId || selectedId === lastSelected) {
				return;
			}

			lastSelected = selectedId;
			const block = editor.getBlock(selectedId);
			if (!block || block.name !== 'core/column') {
				return;
			}

			const el = document.querySelector(`[data-block="${selectedId}"]`);
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
