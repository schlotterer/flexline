document.addEventListener('DOMContentLoaded', function () {
	// Add padding to main content to adjust for absolute/fixed header
	const headerSiteHeader = document.querySelector('header.site-header');
	const mainContent = document.querySelector('.wp-site-blocks > main');
	const body = document.body;
	if (
		headerSiteHeader &&
		!headerSiteHeader.classList.contains('is-position-absolute') &&
		body.classList.contains('headroom-in-use')
	) {
		if (mainContent) {
			mainContent.style.paddingTop = `${headerSiteHeader.offsetHeight}px`;
		}
	}

	// Expose header height early so CSS that depends on it (e.g., sliders)
	// can reserve correct viewport height before other JS boots.
	function setHeaderHeightVar() {
		const h = headerSiteHeader ? headerSiteHeader.offsetHeight : 0;
		// Global custom property used by slider CSS defaults
		document.documentElement.style.setProperty(
			'--header-site-header-height',
			`${h}px`
		);
	}
	setHeaderHeightVar();
	window.addEventListener('resize', setHeaderHeightVar);
});
