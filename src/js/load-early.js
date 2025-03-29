document.addEventListener('DOMContentLoaded', function () {
	// Add padding to main content to adjust for absolute/fixed header
	const headerSiteHeader = document.querySelector('header.site-header');
	const mainContent = document.querySelector('.wp-site-blocks > main');
	const body = document.body;
	if (body.classList.contains('headroom-in-use')) {
		mainContent.style.paddingTop = `${headerSiteHeader.offsetHeight}px`;
	}
});
