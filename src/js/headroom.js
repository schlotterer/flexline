/* global Headroom */
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

        // If headersiteheader has a class of headroom and headroom--unpinned then use header--unpinned as a condition
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
            // No layout reads here; use cached value populated elsewhere.
            applyCenteredTop(buttonToPosition);
        }
    }

    // Cache and maintain centered top for a button.
    function recomputeCenteredTop(button) {
        const headerContainer = document.querySelector('#header_container');
        if (!headerContainer || !button) return;
        const offset =
            (headerContainer.offsetHeight - button.offsetHeight) / 2;
        const centeredTop = headerContainer.offsetTop + offset;
        button.dataset.centerTop = String(Math.round(centeredTop));
        button.style.position = 'fixed';
    }

    function applyCenteredTop(button) {
        const v = button?.dataset?.centerTop;
        if (v) {
            const desired = `${v}px`;
            if (button.style.top !== desired) {
                button.style.top = desired;
            }
        }
    }
	const headerSiteHeader = document.querySelector('header.site-header');
    const headroomOffset = headerSiteHeader.offsetHeight;

    // OPTIONAL: define some custom options
    const options = {
		offset: {
			up: headroomOffset - 70,
			down: headroomOffset,
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
            if (menuButton) {
                toggleButtonPosition(menuButton);
            }
            if (phoneButton) {
                toggleButtonPosition(phoneButton);
            }
        },
        onUnpin() {
            const menuButton = document.querySelector('#slide-in-menu-button');
            const phoneButton = document.querySelector('#web4sl-call-button');
            if (menuButton) {
                toggleButtonPosition(menuButton);
            }
            if (phoneButton) {
                toggleButtonPosition(phoneButton);
            }
        },
    };

	// Construct a Headroom instance
	const headroom = new Headroom(myHeader, options);

    // Initialize
    headroom.init();

    // Seed cached center positions and keep them fresh on resize/content changes.
    const seedButtons = () => {
        const menuButton = document.querySelector('#slide-in-menu-button');
        const phoneButton = document.querySelector('#web4sl-call-button');
        if (menuButton) recomputeCenteredTop(menuButton);
        if (phoneButton) recomputeCenteredTop(phoneButton);
    };
    seedButtons();
    window.addEventListener('load', seedButtons, { once: true });
    const headerContainer = document.querySelector('#header_container');
    if (headerContainer && 'ResizeObserver' in window) {
        const ro = new ResizeObserver(() => seedButtons());
        ro.observe(headerContainer);
    }
});
