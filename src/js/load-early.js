(function () {
	const root = document.documentElement;
	if (!root) {
		return;
	}

	const flexline = window.Flexline || (window.Flexline = {});
	if (typeof flexline.onReady !== 'function') {
		flexline.onReady = (callback) => {
			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', callback, {
					once: true,
				});
			} else {
				callback();
			}
		};
	}

	if (!flexline.earlyReady) {
		let resolved = false;
		let resolveEarly;
		flexline.earlyReady = new Promise((resolve) => {
			resolveEarly = resolve;
		});
		flexline.resolveEarly = () => {
			if (resolved) {
				return;
			}
			resolved = true;
			resolveEarly();
			document.dispatchEvent(new CustomEvent('flexline:early-ready'));
		};
	}

	if (typeof flexline.onEarlyReady !== 'function') {
		flexline.onEarlyReady = (callback) => {
			if (flexline.earlyReady && flexline.earlyReady.then) {
				flexline.earlyReady.then(callback);
			} else {
				flexline.onReady(callback);
			}
		};
	}

	if (typeof flexline.getHeaderHeight !== 'function') {
		flexline.getHeaderHeight = () => {
			const raw = window
				.getComputedStyle(root)
				.getPropertyValue('--header-site-header-height')
				.trim();
			const parsed = Number.parseFloat(raw);
			if (!Number.isNaN(parsed)) {
				return parsed;
			}
			const header = document.querySelector('header.site-header');
			return header ? header.offsetHeight : 0;
		};
	}

	const updateHeaderMetrics = () => {
		const headerSiteHeader = document.querySelector('header.site-header');
		const mainContent = document.querySelector('.wp-site-blocks > main');
		const body = document.body;
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

		flexline.headerHeight = headerHeight;
		document.dispatchEvent(
			new CustomEvent('flexline:header-metrics', {
				detail: { headerHeight },
			})
		);
	};

	flexline.onReady(() => {
		updateHeaderMetrics();
		window.addEventListener('resize', updateHeaderMetrics);
		if (typeof flexline.resolveEarly === 'function') {
			flexline.resolveEarly();
		}
	});
})();
