(function () {
	function onReady(callback) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', callback, { once: true });
			return;
		}
		callback();
	}

	function activateTab(nextTab, tabs, panels) {
		if (!nextTab) {
			return;
		}

		tabs.forEach((tab) => {
			const isActive = tab === nextTab;
			tab.classList.toggle('nav-tab-active', isActive);
			tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
			tab.tabIndex = isActive ? 0 : -1;
		});

		panels.forEach((panel) => {
			if (!panel) {
				return;
			}
			const isActive = panel.id === nextTab.dataset.tabTarget;
			panel.classList.toggle('active', isActive);
			panel.hidden = !isActive;
		});
	}

	function initTabs() {
		const tablist = document.querySelector('.nav-tab-wrapper[role="tablist"]');
		if (!tablist) {
			return;
		}

		const tabs = Array.from(tablist.querySelectorAll('[role="tab"]'));
		if (!tabs.length) {
			return;
		}

		const panels = tabs
			.map((tab) => document.getElementById(tab.dataset.tabTarget || ''))
			.filter(Boolean);

		const initiallyActive =
			tabs.find((tab) => tab.getAttribute('aria-selected') === 'true') || tabs[0];
		activateTab(initiallyActive, tabs, panels);

		tablist.addEventListener('click', (event) => {
			const tab = event.target.closest('[role="tab"]');
			if (!tab) {
				return;
			}
			event.preventDefault();
			activateTab(tab, tabs, panels);
		});

		tablist.addEventListener('keydown', (event) => {
			const current = event.target.closest('[role="tab"]');
			if (!current) {
				return;
			}

			const currentIndex = tabs.indexOf(current);
			if (currentIndex < 0) {
				return;
			}

			let nextIndex = currentIndex;
			if (event.key === 'ArrowRight') {
				nextIndex = (currentIndex + 1) % tabs.length;
			} else if (event.key === 'ArrowLeft') {
				nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
			} else if (event.key === 'Home') {
				nextIndex = 0;
			} else if (event.key === 'End') {
				nextIndex = tabs.length - 1;
			} else {
				return;
			}

			event.preventDefault();
			const nextTab = tabs[nextIndex];
			activateTab(nextTab, tabs, panels);
			nextTab.focus();
		});
	}

	function initFallbackImageControls() {
		const featureFallbackInput = document.getElementById('feature-fallback-input');
		const featureFallbackImage = document.getElementById('feature-fallback-image');
		const removeButton = document.getElementById('remove-fallback-image');
		const uploadButton = document.getElementById('upload-button');

		if (removeButton && featureFallbackInput && featureFallbackImage) {
			removeButton.addEventListener('click', function (event) {
				event.preventDefault();
				featureFallbackInput.value = '';
				featureFallbackImage.setAttribute('src', '');
			});
		}

		if (!uploadButton || !featureFallbackInput || !featureFallbackImage) {
			return;
		}

		uploadButton.addEventListener('click', function (event) {
			event.preventDefault();
			if (!window.wp || !window.wp.media) {
				return;
			}

			const imageFrame = window.wp.media({
				title: 'Upload Image',
				multiple: false,
				library: { type: 'image' },
				button: { text: 'Use this image' },
			});

			imageFrame.on('select', function () {
				const selection = imageFrame.state().get('selection').first();
				if (!selection) {
					return;
				}
				const attachment = selection.toJSON();
				featureFallbackInput.value = attachment.url || '';
				featureFallbackImage.setAttribute('src', attachment.url || '');
			});

			imageFrame.open();
		});
	}

	onReady(function () {
		initTabs();
		initFallbackImageControls();
	});
})();
