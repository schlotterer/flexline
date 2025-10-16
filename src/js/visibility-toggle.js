(() => {
	const buildTargetVariants = (value) => {
		const slug = (typeof value === 'string' ? value.trim() : '') || '';

		if (!slug) {
			return [];
		}

		return [slug];
	};

	const panelMatchesTarget = (panel, variants) => {
		if (!variants.length) {
			return false;
		}

		return variants.some((variant) => {
			if (!variant) {
				return false;
			}

			if (
				panel.classList.contains(variant) ||
				panel.id === variant ||
				panel.dataset?.toggleTarget === variant
			) {
				return true;
			}

			return false;
		});
	};

	const getInteractiveTarget = (button) => {
		if (!button) {
			return null;
		}

		if (button.matches('a, button')) {
			return button;
		}

		return button.querySelector('a, button');
	};

	const getTargetValue = (button) => {
		const interactive = getInteractiveTarget(button);

		if (interactive) {
			const interactiveValue =
				interactive.dataset?.toggleTarget ||
				interactive.getAttribute('data-toggle-target') ||
				interactive.id;

			if (interactiveValue) {
				return interactiveValue;
			}
		}

		if (button.dataset?.toggleTarget) {
			return button.dataset.toggleTarget;
		}

		return button.id;
	};

	const activateGroup = (group, button) => {
		const buttons = group.querySelectorAll('.visibility-toggle');
		const panels = group.querySelectorAll(
			'.toggle-is-visible, .toggle-is-hidden'
		);
		const targetValue = getTargetValue(button);
		const targetVariants = buildTargetVariants(targetValue);

		if (!targetVariants.length || !buttons.length || !panels.length) {
			return;
		}

		buttons.forEach((btn) => {
			const isActive = btn === button;
			const interactive = getInteractiveTarget(btn);

			btn.classList.remove('active');
			btn.classList.toggle('toggle-active', isActive);

			if (btn.matches('button, [role="button"]')) {
				btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
			} else {
				btn.removeAttribute('aria-pressed');
			}

			if (interactive) {
				if (interactive !== btn) {
					interactive.classList.remove('active');
					interactive.classList.toggle('toggle-active', isActive);
				}

				if (
					interactive.tagName === 'A' &&
					!interactive.hasAttribute('role')
				) {
					interactive.setAttribute('role', 'button');
				}

				interactive.setAttribute(
					'aria-pressed',
					isActive ? 'true' : 'false'
				);
			}
		});

		panels.forEach((panel) => {
			const matches = panelMatchesTarget(panel, targetVariants);
			panel.classList.toggle('toggle-is-visible', matches);
			panel.classList.toggle('toggle-is-hidden', !matches);
		});
	};

	const initGroup = (group) => {
		if (!group) {
			return;
		}

		const buttons = group.querySelectorAll('.visibility-toggle');
		const panels = group.querySelectorAll(
			'.toggle-is-visible, .toggle-is-hidden'
		);

		if (!buttons.length || !panels.length) {
			return;
		}

		const activeButton =
			Array.from(buttons).find(
				(button) =>
					button.classList.contains('toggle-active') ||
					button.classList.contains('active')
			) || buttons[0];

		if (activeButton) {
			activateGroup(group, activeButton);
		}
	};

	const initAllGroups = () => {
		document
			.querySelectorAll('.visibility-toggle-group')
			.forEach(initGroup);
	};

	document.addEventListener('click', (event) => {
		const button = event.target.closest(
			'.visibility-toggle-group .visibility-toggle'
		);

		if (!button) {
			return;
		}

		const group = button.closest('.visibility-toggle-group');

		if (!group) {
			return;
		}

		const interactive = getInteractiveTarget(button);

		if (interactive && interactive.tagName === 'A') {
			event.preventDefault();
		}

		activateGroup(group, button);
	});

	const observeNewGroups = () => {
		const Observer =
			typeof window !== 'undefined'
				? window.MutationObserver || window.WebKitMutationObserver
				: undefined;

		if (!Observer) {
			return;
		}

		const observer = new Observer((mutations) => {
			let shouldInit = false;

			mutations.forEach((mutation) => {
				if (shouldInit) {
					return;
				}

				mutation.addedNodes.forEach((node) => {
					if (shouldInit || node.nodeType !== 1) {
						return;
					}

					const element = node;
					if (
						element.matches &&
						element.matches(
							'.visibility-toggle-group, .visibility-toggle, .toggle-is-visible, .toggle-is-hidden'
						)
					) {
						shouldInit = true;
						return;
					}

					if (
						element.querySelector &&
						element.querySelector(
							'.visibility-toggle-group, .visibility-toggle, .toggle-is-visible, .toggle-is-hidden'
						)
					) {
						shouldInit = true;
					}
				});
			});

			if (shouldInit) {
				initAllGroups();
			}
		});

		if (document.body) {
			observer.observe(document.body, { childList: true, subtree: true });
		}
	};

	const initRuntime = () => {
		initAllGroups();
		observeNewGroups();
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initRuntime);
	} else {
		initRuntime();
	}
})();
