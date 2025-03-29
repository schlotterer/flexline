document.addEventListener('DOMContentLoaded', function () {
	// Grab the header element
	const myHeader = document.querySelector('header.site-header');
	// Guard check
	if (!myHeader) {
		return; // No header element, so bail out
	}

	// Function to adjust the position of the main button based on scroll position.
	function toggleButtonPosition(buttonToPosition) {
		let isScrolled = window.scrollY > 0;
		const headerSiteHeader = document.querySelector('header.site-header');

		// If headersiteheader has a class of headroom and headroom--unpinned then user header--unpinned as a condition
		if (
			headerSiteHeader.classList.contains('headroom') &&
			headerSiteHeader.classList.contains('headroom--unpinned')
		) {
			isScrolled = true;
		} else if (
			headerSiteHeader.classList.contains('headroom') &&
			headerSiteHeader.classList.contains('headroom--pinned')
		) {
			isScrolled = false;
		}

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
	const headerSiteHeader = document.querySelector('header.site-header');
	const headroomOffset = headerSiteHeader.offsetHeight;

	// OPTIONAL: define some custom options
	const options = {
		offset: {
			up: 0,
			down: 0,
		},
		tolerance: { up: 5, down: 5 },
		classes: {
			initial: 'headroom',
			pinned: 'headroom--pinned',
			unpinned: 'headroom--unpinned',
		},
		onPin() {
			const menuButton = document.querySelector('#slide-in-menu-button');
			const phoneButton = document.querySelector('#web4sl-call-button');
			toggleButtonPosition(menuButton);
			toggleButtonPosition(phoneButton);
		},
		onUnpin() {
			const menuButton = document.querySelector('#slide-in-menu-button');
			const phoneButton = document.querySelector('#web4sl-call-button');
			toggleButtonPosition(menuButton);
			toggleButtonPosition(phoneButton);
		},
	};

	// Construct a Headroom instance
	const headroom = new Headroom(myHeader, options);

	// Initialize
	headroom.init();
});
