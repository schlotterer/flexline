document.addEventListener('DOMContentLoaded', function () {
	const root = document.documentElement;
	if (!root) {
		return;
	}

	const headerSiteHeader = document.querySelector('header.site-header');
	const mainContent = document.querySelector('.wp-site-blocks > main');
	const body = document.body;

	const updateHeaderMetrics = () => {
		const headerHeight = headerSiteHeader
			? headerSiteHeader.offsetHeight
			: 0;
		root.style.setProperty(
			'--header-site-header-height',
			`${headerHeight}px`
		);

		if (mainContent) {
			if (
				headerSiteHeader &&
				!headerSiteHeader.classList.contains('is-position-absolute') &&
				body.classList.contains('headroom-in-use')
			) {
				mainContent.style.paddingTop = `${headerHeight}px`;
			} else {
				mainContent.style.paddingTop = '';
			}
		}
	};

	updateHeaderMetrics();
	window.addEventListener('resize', updateHeaderMetrics);
});
