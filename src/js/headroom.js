document.addEventListener('DOMContentLoaded', function () {
	console.log('Headroom initialized!');
	// Grab the header element
	const myHeader = document.querySelector('header.site-header');

	// Guard check
	if (!myHeader) {
		return; // No header element, so bail out
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
	// OPTIONAL: define some custom options
	const options = {
		offset: 50,
		tolerance: { up: 10, down: 0 },
		classes: {
			initial: 'headroom',
			pinned: 'headroom--pinned',
			unpinned: 'headroom--unpinned',
		},
		onPin() {
			const menuButton = document.querySelector('#slide-in-menu-button');
			const phoneButton = document.querySelector('#web4sl-call-button');
			centerButtonInHeader(menuButton);
			centerButtonInHeader(phoneButton);
		},
		onUnpin() {
			
		},
	};

	// Construct a Headroom instance
	const headroom = new Headroom(myHeader, options);

	// Initialize
	headroom.init();
});
