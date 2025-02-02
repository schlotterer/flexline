document.addEventListener('DOMContentLoaded', function () {
	// Shared function: scroll to the next item.
	function scrollToNext(scroller) {
		const currentScrollPosition = scroller.scrollLeft;
		let targetScrollPosition = currentScrollPosition;
		const epsilon = 5; // small tolerance value in pixels
		const items = Array.from(scroller.children);

		// Find the next item's start position.
		for (const item of items) {
			const itemStart = item.offsetLeft;
			if (itemStart > currentScrollPosition + epsilon) {
				targetScrollPosition = itemStart;
				break;
			}
		}

		// Check if we're at the end of the scrollable area.
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

	// Shared function: scroll to the previous item.
	function scrollToPrev(scroller) {
		const items = Array.from(scroller.children);
		let targetScrollPosition = scroller.scrollLeft;
		let firstVisibleItemFound = false;

		// Find the first item that is at least partially visible.
		for (let i = 0; i < items.length; i++) {
			const item = items[i];
			const itemStart = item.offsetLeft;
			const itemEnd = itemStart + item.offsetWidth;

			if (
				itemStart >= scroller.scrollLeft &&
				itemEnd <= scroller.scrollLeft + scroller.offsetWidth
			) {
				firstVisibleItemFound = true;
				// If there is a previous item, scroll to its start.
				if (i > 0) {
					targetScrollPosition = items[i - 1].offsetLeft;
				} else {
					targetScrollPosition = 0;
				}
				break;
			}
		}

		// Fallback: scroll to the first item if no visible item was found.
		if (!firstVisibleItemFound && items.length > 0) {
			targetScrollPosition = items[0].offsetLeft;
		}

		scroller.scrollTo({
			left: targetScrollPosition,
			behavior: 'smooth',
		});
	}

	// Set up buttons and auto–scroll for one scroller.
	function setupScrollerButtons(scroller) {
		// We'll create a container to hold any control buttons.
		let controlContainer = null;

		// If navigation is enabled, create a container and add nav buttons.
		if (scroller.classList.contains('horizontal-scroller-navigation')) {
			controlContainer = document.createElement('div');
			controlContainer.classList.add('horizontal-scroller-nav-buttons');

			// Create the "Scroll to Previous" button.
			const scrollToPrevBtn = document.createElement('button');
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
				'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';

			// Create the "Scroll to Next" button.
			const scrollToNextBtn = document.createElement('button');
			scrollToNextBtn.classList.add(
				'is-horizontal-scroll-btn',
				'is-horizontal-scroll-next'
			);
			scrollToNextBtn.setAttribute('aria-label', 'Scroll to next item');
			scrollToNextBtn.setAttribute('role', 'button');
			scrollToNextBtn.style.margin = '2px';
			scrollToNextBtn.innerHTML =
				'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';

			// Basic focus/blur styling for nav buttons.
			[scrollToPrevBtn, scrollToNextBtn].forEach(function (btn) {
				btn.style.outline = 'none';
				btn.style.border = '2px solid transparent';
				btn.onfocus = function () {
					this.style.border =
						'2px solid var(--wp--preset--color--primary)';
				};
				btn.onblur = function () {
					this.style.border = '2px solid transparent';
				};
			});

			// Attach click event listeners.
			scrollToPrevBtn.addEventListener('click', function () {
				scrollToPrev(scroller);
			});
			scrollToNextBtn.addEventListener('click', function () {
				scrollToNext(scroller);
			});

			// Append nav buttons to the control container.
			controlContainer.appendChild(scrollToPrevBtn);
			controlContainer.appendChild(scrollToNextBtn);

			// Insert the control container after the scroller.
			scroller.after(controlContainer);
		}

		// Set up auto–scrolling if the "horizontal-scroller-auto" class is present.
		if (scroller.classList.contains('horizontal-scroller-auto')) {
			// Read the scroll interval from the data attribute (default to 4000 if not set).
			const intervalAttr = scroller.getAttribute('data-scroll-interval');
			const intervalDuration = intervalAttr
				? parseInt(intervalAttr, 10)
				: 4000;

			let autoScrollInterval;
			let isPaused = false;

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

			// Pause auto–scroll on mouse enter; resume on mouse leave if not paused.
			scroller.addEventListener('mouseenter', stopAutoScroll);
			scroller.addEventListener('mouseleave', function () {
				if (!isPaused) {
					startAutoScroll();
				}
			});

			// Start auto–scrolling immediately.
			startAutoScroll();

			// If the pause/play button should be visible (i.e. hidePauseButton is not set),
			// then create a toggle button.
			if (
				!scroller.classList.contains(
					'horizontal-scroller-hide-pause-button'
				)
			) {
				const pausePlayBtn = document.createElement('button');
				pausePlayBtn.classList.add(
					'is-horizontal-scroll-btn',
					'is-horizontal-scroll-pause'
				);
				pausePlayBtn.setAttribute('aria-label', 'Pause auto-scroll');
				pausePlayBtn.setAttribute('role', 'button');
				pausePlayBtn.style.margin = '2px';
				// Initially, auto–scroll is active so we show a pause icon.
				pausePlayBtn.innerHTML =
					'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';

				// Toggle auto–scroll on click.
				pausePlayBtn.addEventListener('click', function () {
					if (isPaused) {
						// Resume auto–scroll.
						isPaused = false;
						pausePlayBtn.setAttribute(
							'aria-label',
							'Pause auto-scroll'
						);
						// Change icon to pause.
						pausePlayBtn.innerHTML =
							'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
						startAutoScroll();
					} else {
						// Pause auto–scroll.
						isPaused = true;
						pausePlayBtn.setAttribute(
							'aria-label',
							'Resume auto-scroll'
						);
						// Change icon to play.
						pausePlayBtn.innerHTML =
							'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M320-720v480l400-240-400-240Z"/></svg></span>';
						stopAutoScroll();
					}
				});

				// If we have a control container from the navigation buttons, append here;
				// otherwise, place the button directly after the scroller.
				if (controlContainer) {
					controlContainer.appendChild(pausePlayBtn);
				} else {
					scroller.after(pausePlayBtn);
				}
			}
		}
	}

	// Find all scrollers that have been given the "is-style-horizontal-scroll" class.
	const scrollers = document.querySelectorAll('.is-style-horizontal-scroll');
	scrollers.forEach(setupScrollerButtons);
});
