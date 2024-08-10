// Listen for the DOMContentLoaded event to ensure the DOM is fully loaded before executing the script.
document.addEventListener('DOMContentLoaded', function () {
	// Attempt to find the .slide-in div in the document.
	const slideInDiv = document.querySelector('.slide-in');
	// eslint-disable-next-line no-undef
	// const customizerSettings = FlexlineCustomizerSettings;
	// eslint-disable-next-line no-undef
	const customizerSearchMenuSettings = FlexlineCustomizerSearchMenuSettings;
	// const siteHeader = document.querySelector('.site-header');
	// Define SVG icons for menu, search, and close actions.
	const iconMenu =
		'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>';
	const iconSearch =
		'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>';
	const iconClose =
		'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>';

	// Check if the .slide-in div exists, log an error if not.
	if (!slideInDiv) {
		// eslint-disable-next-line no-console
		console.error('The .slide-in div was not found.');
		return;
	}

	// Create the main button that users will interact with to toggle the slide-in menu.
	const mainButton = createMainButton();
	// Insert the main button into the DOM, before the .slide-in div.
	slideInDiv.parentNode.insertBefore(mainButton, slideInDiv);
	// Initialize the button icon based on the current screen width and adjust its position.
	updateButtonIcon();
	centerButtonInHeader(mainButton);

	// Attach event listeners to the window object to handle resizing and scrolling events.
	window.addEventListener(
		'resize',
		debounce(() => {
			// Update the button icon and re-center it whenever the window is resized.
			updateButtonIcon();
			toggleButtonPosition(mainButton);
		}, 100)
	);
	window.addEventListener(
		'scroll',
		debounce(() => {
			toggleButtonPosition(mainButton);
		}, 100)
	);

	// Function to create the main toggle button for the slide-in menu.
	function createMainButton() {
		const button = document.createElement('button');
		let initialIcon = iconSearch;
		if (customizerSearchMenuSettings.useMenuIconOnDesktop === true) {
			initialIcon = iconMenu;
		}

		button.id = 'slide-in-menu-button';
		button.className = 'slide-in-menu-button wp-element-button';
		button.setAttribute('aria-label', 'Open Search and Menu');
		button.setAttribute('aria-controls', 'slide-in-menu');
		button.setAttribute('aria-expanded', 'false');
		button.setAttribute('tabindex', '0');
		button.innerHTML =
			'<span class="material-symbols-outlined">' +
			initialIcon +
			'</span>';
		button.addEventListener('click', toggleMenu);
		if (customizerSearchMenuSettings.hideSearchOnDesktop === true) {
			button.classList.add('flexline-hide-on-desktop');
		}
		if (customizerSearchMenuSettings.hideSearchOnTablet === true) {
			button.classList.add('flexline-hide-on-tablet');
		}
		return button;
	}

	// Function to update the icon of the main button based on screen width.
	function updateButtonIcon() {
		if (customizerSearchMenuSettings.useMenuIconOnDesktop !== true) {
			const iconSpan = mainButton.querySelector(
				'.material-symbols-outlined'
			);
			const isLargeScreen = window.innerWidth > 991;
			iconSpan.innerHTML = isLargeScreen ? iconSearch : iconMenu;
			mainButton.setAttribute(
				'aria-label',
				isLargeScreen ? 'Search' : 'Menu'
			);
		}
	}

	// Function to adjust the position of the main button based on scroll position.
	function toggleButtonPosition(buttonToPosition) {
		const isScrolled = window.scrollY > 0;
		// buttonToPosition.style.position = isScrolled ? 'fixed' : 'absolute';
		if (isScrolled) {
			const isSmallScreen = window.matchMedia(
				'(max-width: 781.98px)'
			).matches;
			buttonToPosition.style.top = isSmallScreen ? '12px' : '6px';
		} else {
			buttonToPosition.style.top = '';
			centerButtonInHeader(buttonToPosition);
		}
	}

	// Function to center the main button within the header.
	function centerButtonInHeader(buttonToCenter) {
		const headerContainer = document.querySelector('#header_container');
		if (headerContainer) {
			// Assuming the headerContainer's position in the viewport doesn't drastically change
			const offset =
				(headerContainer.offsetHeight - buttonToCenter.offsetHeight) /
				2;
			buttonToCenter.style.position = 'fixed';
			// Use offsetTop for a more stable reference point from the document's start
			buttonToCenter.style.top = `${headerContainer.offsetTop + offset}px`;
		}
	}

	// Function to trap focus within the slide-in menu for accessibility.
	function trapFocus(element) {
		const focusableElements = element.querySelectorAll(
			'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
		);
		const firstFocusableElement = focusableElements[0];
		const lastFocusableElement =
			focusableElements[focusableElements.length - 1];

		element.addEventListener('keydown', function (e) {
			const isTabPressed = e.key === 'Tab' || e.keyCode === 9;

			if (!isTabPressed) {
				return;
			}

			if (e.shiftKey) {
				/* shift + tab */
				if (
					e.target.ownerDocument.activeElement ===
					firstFocusableElement
				) {
					lastFocusableElement.focus(); // move focus to the last focusable element
					e.preventDefault();
				}
			} else if (
				e.target.ownerDocument.activeElement === lastFocusableElement
			) {
				firstFocusableElement.focus(); // move focus to the first focusable element
				e.preventDefault();
			}
		});
	}

	// Function to toggle the visibility of the slide-in menu.
	function toggleMenu() {
		const expanded = mainButton.getAttribute('aria-expanded') === 'true';
		mainButton.setAttribute('aria-expanded', String(!expanded));
		const slideInMenu = document.getElementById('slide-in-menu');

		if (slideInMenu) {
			slideInMenu.setAttribute('aria-hidden', String(expanded));
			slideInMenu.classList.toggle('active', !expanded);
			document.body.classList.toggle('no-scroll', !expanded);

			if (!expanded) {
				addCloseButton(slideInMenu);
				const focusableElements = slideInMenu.querySelectorAll(
					'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
				);
				if (focusableElements.length) {
					focusableElements[0].focus();
					trapFocus(slideInMenu);
				}
			} else {
				const closeButton = document.getElementById(
					'slide-in-menu-close'
				);
				if (closeButton) {
					closeButton.remove();
				}
				mainButton.focus(); // Focus back to the main button when menu is closed
			}
		}
	}

	// Function to add a close button inside the slide-in menu.
	function addCloseButton(menuContainer) {
		let closeButton = document.getElementById('slide-in-menu-close');
		if (!closeButton) {
			closeButton = document.createElement('button');
			closeButton.id = 'slide-in-menu-close';
			closeButton.className = 'slide-in-menu-close wp-element-button';
			closeButton.setAttribute('aria-label', 'Close Menu');
			closeButton.setAttribute('tabindex', '0');
			closeButton.innerHTML =
				'<span class="material-symbols-outlined">' +
				iconClose +
				'</span>';
			menuContainer.prepend(closeButton); // Prepend to make it more accessible

			closeButton.addEventListener('click', function () {
				toggleMenu();
			});
		}
	}

	// Debounce function to limit the rate at which a function can fire
	function debounce(func, wait, immediate) {
		let timeout;
		return function () {
			const context = this,
				args = arguments;
			const later = function () {
				timeout = null;
				if (!immediate) {
					func.apply(context, args);
				}
			};
			const callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) {
				func.apply(context, args);
			}
		};
	}
});
