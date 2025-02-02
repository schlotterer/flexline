document.addEventListener('DOMContentLoaded', function () {
	// Shared function: scroll to the next slide.
	function scrollToNext(scroller) {
		const currentScrollPosition = scroller.scrollLeft;
		let targetScrollPosition = currentScrollPosition;
		const epsilon = 5; // small tolerance value in pixels

		// Only consider slide elements (assumes controls have been moved out of the scroller)
		const items = Array.from(scroller.children);
		for (const item of items) {
			const itemStart = item.offsetLeft;
			if (itemStart > currentScrollPosition + epsilon) {
				targetScrollPosition = itemStart;
				break;
			}
		}

		// If at the end and looping is enabled, loop back to the start.
		if (
			scroller.scrollLeft + scroller.offsetWidth >=
				scroller.scrollWidth - epsilon &&
			scroller.classList.contains('horizontal-scroller-loop')
		) {
			targetScrollPosition = 0;
		}

		scroller.scrollTo({
			left: targetScrollPosition,
			behavior: 'smooth',
		});
	}

	// Shared function: scroll to the previous slide.
	function scrollToPrev(scroller) {
		const epsilon = 5;
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

		scroller.scrollTo({
			left: targetScrollPosition,
			behavior: 'smooth',
		});
	}

	// Set up controls (navigation and auto-scroll pause/play) for one scroller.
	function setupScrollerButtons(scroller) {
		// 1. Wrap the scroller in a new container.
		const wrapper = document.createElement('div');
		wrapper.classList.add('horizontal-scroll-wrapper');
		// Ensure the wrapper is relatively positioned.
		wrapper.style.position = 'relative';
		// Insert the wrapper in place of the scroller...
		scroller.parentNode.insertBefore(wrapper, scroller);
		// ...and then move the scroller inside the wrapper.
		wrapper.appendChild(scroller);

		// 2. Set up auto–scroll if enabled.
		let autoScrollInterval;
		let isPaused = false;
		if (scroller.classList.contains('horizontal-scroller-auto')) {
			const intervalAttr = scroller.getAttribute('data-scroll-interval');
			const intervalDuration = intervalAttr
				? parseInt(intervalAttr, 10)
				: 4000;

			function startAutoScroll() {
				if (!isPaused) {
					autoScrollInterval = setInterval(function () {
						scrollToNext(scroller);
					}, intervalDuration);
				}
			}
			function stopAutoScroll() {
				clearInterval(autoScrollInterval);
			}
			// Pause on mouse enter; resume on mouse leave.
			scroller.addEventListener('mouseenter', stopAutoScroll);
			scroller.addEventListener('mouseleave', function () {
				if (!isPaused) {
					startAutoScroll();
				}
			});
			startAutoScroll();
		}

		// 3. Create the controls container if navigation is enabled or if the pause button should appear.
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
			Array.from(scroller.classList).forEach(function (cls) {
				if (cls.indexOf('horizontal-scroller-buttons-') === 0) {
					controlContainer.classList.add(cls);
					scroller.classList.remove(cls);
				}
			});
			// Position the controls absolutely at the bottom center of the wrapper.
			controlContainer.style.position = 'absolute';
			controlContainer.style.display = 'flex';
			controlContainer.style.gap = '0px';
			// (Allow button clicks.)
			controlContainer.style.pointerEvents = 'auto';

			// 4. Create navigation buttons if enabled.
			let scrollToPrevBtn, scrollToNextBtn;
			if (hasNav) {
				// Previous Button.
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
				});

				// Next Button.
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
						// Resume auto-scroll.
						if (
							scroller.classList.contains(
								'horizontal-scroller-auto'
							)
						) {
							// Restart auto-scroll.
							autoScrollInterval = setInterval(
								function () {
									scrollToNext(scroller);
								},
								scroller.getAttribute('data-scroll-interval') ||
									4000
							);
						}
					} else {
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

			// 7. Append the control container to the wrapper (outside the scroller).
			wrapper.appendChild(controlContainer);
		}
	}

	// Find all scrollers with the "is-style-horizontal-scroll" class.
	const scrollers = document.querySelectorAll('.is-style-horizontal-scroll');
	scrollers.forEach(setupScrollerButtons);
});
