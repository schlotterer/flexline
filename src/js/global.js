document.addEventListener('DOMContentLoaded', function () {
	//----------------------------------------------------------------------
	// 1. A helper for manual smooth scrolling with a configurable duration.
	//----------------------------------------------------------------------
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

	//----------------------------------------------------------------------
	// 2. Replace your scrollToNext/scrollToPrev with ones that use clones.
	//----------------------------------------------------------------------
	function scrollToNext(scroller) {
		const epsilon = 5; // small tolerance
		// Use custom duration, if specified
		const durationAttr = scroller.getAttribute('data-scroll-speed');
		const duration = durationAttr ? parseInt(durationAttr, 10) : 600; // default 600ms

		const currentScrollPosition = scroller.scrollLeft;
		let targetScrollPosition = currentScrollPosition;

		// We consider only "real" slides (the middle set). But since we've
		// now cloned items, we store them with a class or data-flag. We'll
		// just consider all scroller.children if you want each "slide" to be scrollable.
		const items = Array.from(scroller.children);

		for (const item of items) {
			const itemStart = item.offsetLeft;
			if (itemStart > currentScrollPosition + epsilon) {
				targetScrollPosition = itemStart;
				break;
			}
		}

		// Animate the scroll
		smoothScrollTo(scroller, targetScrollPosition, duration);
	}

	function scrollToPrev(scroller) {
		const epsilon = 5; // tolerance for tiny fractional scrolls
		const duration = parseInt(
			scroller.getAttribute('data-scroll-speed') || '600',
			10
		);
		const items = Array.from(scroller.children);
		const current = scroller.scrollLeft;

		// collect all slide positions that are “behind” us
		const prevOffsets = items
			.map((item) => item.offsetLeft)
			.filter((offset) => offset + epsilon < current);

		let targetScrollPosition;
		if (prevOffsets.length) {
			// go to the nearest one behind us
			targetScrollPosition = Math.max(...prevOffsets);
		} else {
			// wrap to the very end
			targetScrollPosition = scroller.scrollWidth - scroller.offsetWidth;
		}

		smoothScrollTo(scroller, targetScrollPosition, duration);
	}

	//----------------------------------------------------------------------
	// 3. Function to set up the "infinite loop" with cloned slides
	//----------------------------------------------------------------------
	function setupInfiniteLoop(scroller) {
		if (!scroller.classList.contains('horizontal-scroller-loop')) {
			return; // only apply if loop is desired
		}

		const originalItems = Array.from(scroller.children);
		if (!originalItems.length) {
			return;
		}

		// 1. Measure the "real" width with no clones
		//    Scroll to 0 so we measure from left to right fully
		const savedScrollLeft = scroller.scrollLeft;
		scroller.scrollLeft = 0;
		const realWidth = scroller.scrollWidth;

		// Also capture how far the first item is from the scroller's left,
		// in case there's a small offset (e.g. a leftover margin or partial gap).
		const firstItemOffset = originalItems[0].offsetLeft;

		// 2. Restore the original scroll temporarily
		scroller.scrollLeft = savedScrollLeft;

		// 3. Clone items at the start and end
		const clonedStart = originalItems.map((item) => {
			const clone = item.cloneNode(true);
			clone.classList.add('cloned-slide');
			return clone;
		});
		const clonedEnd = originalItems.map((item) => {
			const clone = item.cloneNode(true);
			clone.classList.add('cloned-slide');
			return clone;
		});
		clonedStart.forEach((c) =>
			scroller.insertBefore(c, scroller.firstChild)
		);
		clonedEnd.forEach((c) => scroller.appendChild(c));

		// 4. Position user in the real (middle) set.
		//    We'll scroll left by "realWidth" minus any offset for the first item
		//    so the first real item lines up exactly at the container's left edge.
		//    If your firstItemOffset is 0 (no margin/padding), this just becomes "realWidth".
		scroller.scrollLeft = realWidth - firstItemOffset;

		// 5. Teleport logic to keep user in [realWidth - firstItemOffset, realWidth*2 - firstItemOffset].
		scroller.addEventListener('scroll', () => {
			const current = scroller.scrollLeft;
			const leftBoundary = realWidth - firstItemOffset;
			const rightBoundary = realWidth * 2 - firstItemOffset;

			// If scrolled beyond the real set at the right
			if (current > rightBoundary) {
				scroller.scrollLeft = current - realWidth;
			} else if (current < leftBoundary) {
				scroller.scrollLeft = current + realWidth;
			}
		});
	}

	//----------------------------------------------------------------------
	// 4. Set up controls (navigation, auto-scroll, etc.)
	//----------------------------------------------------------------------
	function setupScrollerButtons(scroller) {
		// 1. Wrap the scroller in a new container.
		const wrapper = document.createElement('div');
		wrapper.classList.add('horizontal-scroll-wrapper');
		wrapper.style.position = 'relative';
		scroller.parentNode.insertBefore(wrapper, scroller);
		wrapper.appendChild(scroller);

		// 2. Variables for auto–scroll if enabled.
		let autoScrollInterval;
		let isPaused = false;
		const hasStarted = false; // NEW: flag to track if auto-scroll has been started

		// ADDED: A helper that resets the auto-scroll timer from scratch
		function resetAutoScrollTimer() {
			stopAutoScroll();
			if (!isPaused) {
				startAutoScroll();
			}
		}

		function startAutoScroll() {
			if (autoScrollInterval) {
				return;
			} // already running
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

		// NEW: Observer to detect when the scroller is on screen
		function observeVisibility() {
			const observer = new IntersectionObserver(
				(entries) => {
					entries.forEach((entry) => {
						if (entry.isIntersecting && !hasStarted) {
							startAutoScroll(); // Start only when visible
							observer.disconnect(); // Stop observing after first trigger
						}
					});
				},
				{ threshold: 0.3 } // Adjust threshold as needed
			);

			observer.observe(scroller);
		}

		// Check if auto-scroll is enabled, but instead of starting immediately,
		// we now wait until the scroller is visible
		if (scroller.classList.contains('horizontal-scroller-auto')) {
			if (scroller.classList.contains('scroller-pause-on-hover')) {
				scroller.addEventListener('mouseenter', () => {
					stopAutoScroll();
				});
				scroller.addEventListener('mouseleave', () => {
					if (!isPaused) {
						startAutoScroll();
					}
				});
			}
			// Instead of calling startAutoScroll() immediately, we use the observer.
			observeVisibility();
		}

		// 3. Create the controls container if navigation/pause are enabled.
		const hasNav = scroller.classList.contains(
			'horizontal-scroller-navigation'
		);
		const showPause =
			scroller.classList.contains('horizontal-scroller-auto') &&
			!scroller.classList.contains(
				'horizontal-scroller-hide-pause-button'
			);

		if (hasNav || showPause) {
			const controlContainer = document.createElement('div');
			controlContainer.classList.add('horizontal-scroller-nav-buttons');
			Array.from(scroller.classList).forEach((cls) => {
				if (cls.indexOf('horizontal-scroller-buttons-') === 0) {
					controlContainer.classList.add(cls);
					scroller.classList.remove(cls);
				}
			});
			controlContainer.style.position = 'absolute';
			controlContainer.style.display = 'flex';
			controlContainer.style.gap = '0px';
			controlContainer.style.pointerEvents = 'auto';

			let scrollToPrevBtn, scrollToNextBtn;

			// 4. Create navigation buttons if enabled.
			if (hasNav) {
				scrollToPrevBtn = document.createElement('button');
				scrollToPrevBtn.classList.add(
					'is-horizontal-scroll-btn',
					'is-horizontal-scroll-prev'
				);
				scrollToPrevBtn.setAttribute(
					'aria-label',
					'Scroll to previous item'
				);
				scrollToPrevBtn.setAttribute('role', 'button');
				scrollToPrevBtn.style.margin = '2px';
				scrollToPrevBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/>' +
					'</svg></span>';
				scrollToPrevBtn.addEventListener('click', function () {
					scrollToPrev(scroller);
					// Reset the timer when user clicks previous
					resetAutoScrollTimer();
				});

				scrollToNextBtn = document.createElement('button');
				scrollToNextBtn.classList.add(
					'is-horizontal-scroll-btn',
					'is-horizontal-scroll-next'
				);
				scrollToNextBtn.setAttribute(
					'aria-label',
					'Scroll to next item'
				);
				scrollToNextBtn.setAttribute('role', 'button');
				scrollToNextBtn.style.margin = '2px';
				scrollToNextBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>' +
					'</svg></span>';
				scrollToNextBtn.addEventListener('click', function () {
					scrollToNext(scroller);
					// Reset the timer when user clicks next
					resetAutoScrollTimer();
				});
			}

			// 5. Create the pause/play button if auto-scroll is enabled and not hidden.
			let pausePlayBtn = null;
			if (showPause) {
				pausePlayBtn = document.createElement('button');
				pausePlayBtn.classList.add(
					'is-horizontal-scroll-btn',
					'is-horizontal-scroll-pause'
				);
				pausePlayBtn.setAttribute('aria-label', 'Pause auto-scroll');
				pausePlayBtn.setAttribute('role', 'button');
				pausePlayBtn.style.margin = '2px';
				pausePlayBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/>' +
					'</svg></span>';

				pausePlayBtn.addEventListener('click', function () {
					if (isPaused) {
						// Resume
						isPaused = false;
						pausePlayBtn.setAttribute(
							'aria-label',
							'Pause auto-scroll'
						);
						pausePlayBtn.innerHTML =
							'<span class="material-symbols-outlined">' +
							'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
							'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/>' +
							'</svg></span>';
						resetAutoScrollTimer(); // which now calls stopAutoScroll() then startAutoScroll()
					} else {
						// Pause
						isPaused = true;
						pausePlayBtn.setAttribute(
							'aria-label',
							'Resume auto-scroll'
						);
						pausePlayBtn.innerHTML =
							'<span class="material-symbols-outlined">' +
							'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
							'<path fill="#ffffff" d="M320-720v480l400-240-400-240Z"/>' +
							'</svg></span>';
						stopAutoScroll();
					}
				});
			}

			// 6. Append buttons in order: previous, pause (if any), next.
			if (hasNav) {
				controlContainer.appendChild(scrollToPrevBtn);
				if (pausePlayBtn) {
					controlContainer.appendChild(pausePlayBtn);
				}
				controlContainer.appendChild(scrollToNextBtn);
			} else if (pausePlayBtn) {
				controlContainer.appendChild(pausePlayBtn);
			}

			// 7. Append the control container.
			wrapper.appendChild(controlContainer);
		}
	}

	//----------------------------------------------------------------------
	// 5. IntersectionObserver logic (unchanged)
	//----------------------------------------------------------------------
	function buildThresholdList() {
		const thresholds = [];
		for (let i = 0; i <= 1.0; i += 0.05) {
			thresholds.push(i);
		}
		return thresholds;
	}

	function setupStatusObserver(scroller) {
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					const item = entry.target;
					const previousRatio = parseFloat(
						item.dataset.previousRatio || 0
					);
					const currentRatio = entry.intersectionRatio;

					if (currentRatio > 0) {
						// visible
						item.classList.remove('out-of-view');
						if (currentRatio >= 0.1) {
							item.classList.add('in-view');
							item.classList.remove('entering', 'exiting');
						} else {
							item.classList.remove('in-view');
							if (currentRatio > previousRatio) {
								item.classList.add('entering');
								item.classList.remove('exiting');
							} else if (currentRatio < previousRatio) {
								item.classList.add('exiting');
								item.classList.remove('entering');
							}
						}
					} else {
						// off-screen
						item.classList.add('out-of-view');
						item.classList.remove('in-view', 'entering', 'exiting');
					}
					item.dataset.previousRatio = currentRatio;
				});
			},
			{
				root: scroller,
				threshold: buildThresholdList(),
			}
		);

		Array.from(scroller.children).forEach((child) => {
			observer.observe(child);
		});
	}

	//----------------------------------------------------------------------
	// 6. Initialize everything on each .is-style-horizontal-scroll
	//----------------------------------------------------------------------
	const scrollers = document.querySelectorAll('.is-style-horizontal-scroll');
	scrollers.forEach((scroller) => {
		// First clone slides & set infinite loop (only if .horizontal-scroller-loop present).
		setupInfiniteLoop(scroller);

		// Then set up your nav buttons, pause/play, etc.
		setupScrollerButtons(scroller);

		// Then set up IntersectionObserver stuff (for "in-view", etc.).
		setupStatusObserver(scroller);
	});
});
