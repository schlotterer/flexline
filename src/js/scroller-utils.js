/* global requestAnimationFrame */

/**
 * Determine if we are running inside the block editor.
 *
 * @return {boolean} True when in the block editor context.
 */
function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

//------------------------------------------------------------------
// 1.  Helpers for scrolling / wrappers.
//------------------------------------------------------------------
function smoothScrollTo(scroller, targetScrollLeft, duration) {
	const start = scroller.scrollLeft;
	const distance = targetScrollLeft - start;
	const startTime = performance.now();

	function step(currentTime) {
		const elapsed = currentTime - startTime;
		const progress = Math.min(elapsed / duration, 1);

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

function scrollToNext(scroller) {
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
	const maxScroll = scroller.scrollWidth - scroller.clientWidth;
	if (target > maxScroll) {
		target = maxScroll;
	}

	smoothScrollTo(scroller, target, duration);
}

function scrollToPrev(scroller) {
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
// 2.  Nav / pause buttons.
//------------------------------------------------------------------
function setupScrollerButtons(scroller) {
	if (!scroller.dataset.classObserverAttached && isBlockEditor()) {
		new window.MutationObserver(() =>
			setupScrollerButtons(scroller)
		).observe(scroller, { attributes: true, attributeFilter: ['class'] });
		scroller.dataset.classObserverAttached = 'true';
	}
	// ──────────────────────────────────────────────────────────────────────
	// 0. Determine current option state *up‑front*
	//    (We need this before any early‑exit based on buttonsInitialised.)
	// ──────────────────────────────────────────────────────────────────────
	const hasNav = scroller.classList.contains(
		'horizontal-scroller-navigation'
	);
	const showPause =
		scroller.classList.contains('horizontal-scroller-auto') &&
		!scroller.classList.contains('horizontal-scroller-hide-pause-button');

	// If the nav / pause state changed since the last run, force a rebuild
	if (
		scroller.dataset.buttonsInitialised === 'true' &&
		(hasNav !== (scroller.dataset.prevHasNav === 'true') ||
			showPause !== (scroller.dataset.prevShowPause === 'true'))
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

	if (scroller.dataset.buttonsInitialised === 'true') {
		if (!hasNav && !showPause) {
			const existing = scroller.parentNode.querySelector(
				'.horizontal-scroller-nav-buttons'
			);
			if (existing) {
				existing.remove();
			}
			delete scroller.dataset.buttonsInitialised; // reset so we can rebuild later
			if (
				!scroller.classList.contains(
					'horizontal-scroller-transition-slide'
				)
			) {
				removeWrapper(scroller);
			}
		}
		return; // nothing changed – keep existing buttons or we just cleaned up
	}

	// If neither nav nor pause is requested, ensure wrapper removal and exit.
	if (!hasNav && !showPause) {
		if (
			!scroller.classList.contains('horizontal-scroller-transition-slide')
		) {
			removeWrapper(scroller);
		}
		return;
	}

	// ──────────────────────────────────────────────────────────────────────
	// 2. Build container + buttons (first time, or after tear‑down)
	// ──────────────────────────────────────────────────────────────────────
	// Make sure we have a wrapper first (created once, reused after)
	const wrapper = ensureWrapper(scroller);

	let autoScrollInterval;
	let isPaused = false;
	const hasStarted = false;

	function resetAutoScrollTimer() {
		// only reset if we’re in “auto” mode
		if (!scroller.classList.contains('horizontal-scroller-auto')) {
			return;
		}
		stopAutoScroll();
		if (!isPaused) {
			startAutoScroll();
		}
	}

	function startAutoScroll() {
		if (autoScrollInterval) {
			return;
		}
		const intervalDur = parseInt(
			scroller.getAttribute('data-scroll-interval') || '4000',
			10
		);
		autoScrollInterval = setInterval(
			() => scrollToNext(scroller),
			intervalDur
		);
	}

	function stopAutoScroll() {
		clearInterval(autoScrollInterval);
		autoScrollInterval = null;
	}

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

	if (scroller.classList.contains('horizontal-scroller-auto')) {
		if (scroller.classList.contains('scroller-pause-on-hover')) {
			scroller.addEventListener('mouseenter', stopAutoScroll);
			scroller.addEventListener('mouseleave', () => {
				if (!isPaused) {
					startAutoScroll();
				}
			});
		}
		observeVisibility();
	}

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

export { isBlockEditor, ensureWrapper, removeWrapper, setupScrollerButtons };
