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
		const epsilon = 5;
		const durationAttr = scroller.getAttribute('data-scroll-speed');
		const duration = durationAttr ? parseInt(durationAttr, 10) : 600; // default 600ms

		const items = Array.from(scroller.children);
		let targetScrollPosition = scroller.scrollLeft;
		let firstVisibleItemFound = false;

		for (let i = 0; i < items.length; i++) {
			const item = items[i];
			const itemStart = item.offsetLeft;
			const itemEnd = itemStart + item.offsetWidth;
			if (
				itemStart >= scroller.scrollLeft &&
				itemEnd <= scroller.scrollLeft + scroller.offsetWidth
			) {
				firstVisibleItemFound = true;
				targetScrollPosition = i > 0 ? items[i - 1].offsetLeft : 0;
				break;
			}
		}

		if (!firstVisibleItemFound && items.length > 0) {
			targetScrollPosition = items[0].offsetLeft;
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

		// ADDED: A helper that resets the auto-scroll timer from scratch
		function resetAutoScrollTimer() {
			if (autoScrollInterval) {
				clearInterval(autoScrollInterval);
			}
			if (!isPaused) {
				startAutoScroll(); // start fresh
			}
		}

		// The existing start/stop logic
		function startAutoScroll() {
			const intervalAttr = scroller.getAttribute('data-scroll-interval');
			const intervalDuration = intervalAttr
				? parseInt(intervalAttr, 10)
				: 4000;
			autoScrollInterval = setInterval(function () {
				scrollToNext(scroller);
			}, intervalDuration);
		}
		function stopAutoScroll() {
			clearInterval(autoScrollInterval);
		}

		// If auto-scroll class is present, set up the interval & events.
		if (scroller.classList.contains('horizontal-scroller-auto')) {
			scroller.addEventListener('mouseenter', () => {
				stopAutoScroll();
			});
			scroller.addEventListener('mouseleave', () => {
				if (!isPaused) {
					startAutoScroll();
				}
			});
			startAutoScroll(); // start immediately on load
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

					// ADDED: Reset the timer when user clicks prev
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

					// ADDED: Reset the timer when user clicks next
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
						// Was paused -> now resume
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

						// Resume auto-scroll
						resetAutoScrollTimer(); // ADDED: effectively restarts auto-scroll
					} else {
						// Was playing -> now pause
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
						clearInterval(autoScrollInterval);
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
						if (currentRatio >= 0.5) {
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
