/* global requestAnimationFrame */

// Horizontal scroll functionality for horizontal scroller.

// Helper to determine if running in block editor.
function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

//------------------------------------------------------------------
// 1. A helper for manual smooth scrolling with a configurable duration.
//------------------------------------------------------------------
export function smoothScrollTo(scroller, targetScrollLeft, duration) {
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

//------------------------------------------------------------------
// 2. Next / Prev helpers for scroll variant.
//------------------------------------------------------------------
export function scrollToNext(scroller) {
	const epsilon = 5;
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

export function scrollToPrev(scroller) {
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
// 3. Infinite loop setup.
//------------------------------------------------------------------
export function setupInfiniteLoop(scroller) {
	if (scroller.dataset.loopInitialised === 'true') {
		return;
	}

	if (
		!scroller.classList.contains('horizontal-scroller-loop') ||
		!scroller.classList.contains('is-style-horizontal-scroll')
	) {
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

export function teardownInfiniteLoop(scroller) {
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

export function watchLoopToggle(scroller) {
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

export function watchChildrenForLoop(scroller) {
	if (scroller._childObserverAttached) {
		return;
	}
	const mo = new window.MutationObserver((mutations) => {
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

export function initInfiniteLoops() {
	if (isBlockEditor()) {
		document
			.querySelectorAll('[data-loop-initialised="true"]')
			.forEach((s) => {
				if (!s.classList.contains('horizontal-scroller-loop')) {
					teardownInfiniteLoop(s);
				}
			});
	}
	document
		.querySelectorAll(
			'.is-style-horizontal-scroll.horizontal-scroller-loop'
		)
		.forEach(setupInfiniteLoop);
}

//------------------------------------------------------------------
// 4. Nav / pause buttons for scroll variant.
//------------------------------------------------------------------
export function setupScrollButtons(scroller) {
	const currentStyle = 'slide';
	const hasNav = scroller.classList.contains(
		'horizontal-scroller-navigation'
	);
	const hasAuto = scroller.classList.contains('horizontal-scroller-auto');
	const showPause =
		hasAuto &&
		!scroller.classList.contains('horizontal-scroller-hide-pause-button');

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
		delete scroller.dataset.buttonsInitialised;
	}

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
			delete scroller.dataset.buttonsInitialised;
		} else {
			return;
		}
	}

	let autoScrollTimeout;
	let autoScrollDelay;
	let isPaused = false;
	const hasStarted = false;

	function resetAutoScrollTimer() {
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
		const durationValue =
			window
				.getComputedStyle(scroller)
				.getPropertyValue('--wp--custom--transition-time') || '0ms';
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
			if (isBlockEditor()) {
				observeVisibility();
			} else {
				startAutoScroll();
			}
		}
	}

	const wrapper = scroller.parentNode;
	const controlContainer = document.createElement('div');
	controlContainer.classList.add('horizontal-scroller-nav-buttons');

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
			'<path fill="#ffffff" d="M456-480 640-296l-56 56-240-240 240-240 56 56-184 184Z"/></svg></span>';
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
