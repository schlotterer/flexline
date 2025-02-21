document.addEventListener('DOMContentLoaded', function () {
	// Add padding to main content to adjust for absolute/fixed header
	const headerSiteHeader = document.querySelector('header.site-header');
	const mainContent = document.querySelector('main.site-content');
	if (!headerSiteHeader.classList.contains('is-position-absolute')) {
		mainContent.style.paddingTop = `${headerSiteHeader.offsetHeight}px`;
	}
});
