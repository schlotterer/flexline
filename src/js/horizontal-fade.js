// Horizontal Fade functionality for horizontal scroller.

// Helper to determine if running in block editor.
function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

// Helper to ensure wrapper exists for fade style scrollers.
function ensureWrapper(scroller) {
	// First check if the element has a parent at all
	if (!scroller.parentNode) {
		return scroller;
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

//------------------------------------------------------------------
// Switch active slide for fade variant.
//------------------------------------------------------------------
export function switchFadeSlide(scroller, newIndex) {
	const items = Array.from(scroller.children);
	if (!items.length) {
		return;
	}
	const count = items.length;
	const index = ((newIndex % count) + count) % count;
	items.forEach((item, i) => {
		const active = i === index;
		item.classList.toggle('is-active', active);
		item.setAttribute('aria-hidden', active ? 'false' : 'true');
		item.setAttribute('tabindex', active ? '0' : '-1');
	});
}

//------------------------------------------------------------------
// Next / Prev helpers for fade variant.
//------------------------------------------------------------------
export function scrollToNext(scroller) {
	const items = Array.from(scroller.children);
	const current = items.findIndex((c) => c.classList.contains('is-active'));
	switchFadeSlide(scroller, current + 1);
}

export function scrollToPrev(scroller) {
	const items = Array.from(scroller.children);
	const current = items.findIndex((c) => c.classList.contains('is-active'));
	switchFadeSlide(scroller, current - 1);
}

//------------------------------------------------------------------
// Fade initialisation.
//------------------------------------------------------------------
export function setupFade(scroller) {
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
	// Avoid resetting an already active slide (e.g., in the block editor).
	const hasActiveChild = Array.from(scroller.children).some((c) =>
		c.classList.contains('is-active')
	);
	if (!hasActiveChild) {
		switchFadeSlide(scroller, 0);
	}

	if (isBlockEditor()) {
		let lastClientId;
		const unsubscribe = wp.data.subscribe(() => {
			const clientId = wp
				.select('core/block-editor')
				.getSelectedBlockClientId();
			if (!clientId || clientId === lastClientId) {
				return;
			}
			lastClientId = clientId;
			const node = document.querySelector(`[data-block="${clientId}"]`);
			if (!node) {
				return;
			}
			const slide = node.closest('.is-style-horizontal-fade > *');
			if (!slide || !scroller.contains(slide)) {
				return;
			}
			const index = Array.from(slide.parentNode.children).indexOf(slide);
			switchFadeSlide(scroller, index);
		});

		window.addEventListener('unload', unsubscribe, { once: true });
	}

	return true;
}

//------------------------------------------------------------------
// Nav / pause buttons for fade variant.
//------------------------------------------------------------------
export function setupFadeButtons(scroller) {
	// Determine current option state up‑front.
	const currentStyle = 'fade';
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
				.getPropertyValue('--horizontal-fade-duration') || '0ms';
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

	// Expose for external control.
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
