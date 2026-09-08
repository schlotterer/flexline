(function () {
	function onReady(callback) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', callback, {
				once: true,
			});
			return;
		}
		callback();
	}

	function getRelativeAdminUrl(url) {
		return `${url.pathname}${url.search}`;
	}

	function updateSettingsReferers(tab) {
		if (!tab || !tab.href) {
			return;
		}

		const tabUrl = new URL(tab.href, window.location.href);
		const relativeUrl = getRelativeAdminUrl(tabUrl);

		document
			.querySelectorAll('input[name="_wp_http_referer"]')
			.forEach((field) => {
				field.value = relativeUrl;
			});
	}

	function activateTab(nextTab, tabs, panels, updateHistory = false) {
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

		updateSettingsReferers(nextTab);

		if (updateHistory && nextTab.href) {
			window.history.replaceState({}, '', nextTab.href);
		}
	}

	function initTabs() {
		const tablist = document.querySelector(
			'.nav-tab-wrapper[role="tablist"]'
		);
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
			tabs.find((tab) => tab.getAttribute('aria-selected') === 'true') ||
			tabs[0];
		activateTab(initiallyActive, tabs, panels);

		tablist.addEventListener('click', (event) => {
			const tab = event.target.closest('[role="tab"]');
			if (!tab) {
				return;
			}
			event.preventDefault();
			activateTab(tab, tabs, panels, true);
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
			activateTab(nextTab, tabs, panels, true);
			nextTab.focus();
		});
	}

	function initFallbackImageControls() {
		const featureFallbackInput = document.getElementById(
			'feature-fallback-input'
		);
		const featureFallbackImage = document.getElementById(
			'feature-fallback-image'
		);
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

	function reindexFramePresetRows(table) {
		const rows = Array.from(
			table.querySelectorAll(
				'tbody tr[data-frame-preset-row]:not([hidden])'
			)
		);

		rows.forEach((row, index) => {
			row.querySelectorAll('[name]').forEach((field) => {
				field.name = field.name.replace(
					/flexline_frame_presets\[items\]\[[^\]]+\]/,
					`flexline_frame_presets[items][${index}]`
				);
			});
		});
	}

	function updateFrameAttachmentLabel(row, label) {
		const labelNode = row.querySelector('[data-frame-attachment-label]');
		if (labelNode) {
			labelNode.textContent = label || 'No SVG selected';
		}
	}

	function updateFrameSvgPreview(row, url) {
		const preview = row.querySelector('[data-frame-svg-preview]');
		if (!preview) {
			return;
		}

		preview.replaceChildren();
		if (!url) {
			return;
		}

		const image = document.createElement('img');
		image.src = url;
		image.alt = '';
		image.loading = 'lazy';
		preview.appendChild(image);
	}

	function updateFramePresetRowError(row, message) {
		let messageNode = row.querySelector('[data-frame-row-error]');
		if (!message) {
			if (messageNode) {
				messageNode.remove();
			}
			return;
		}

		if (!messageNode) {
			messageNode = document.createElement('p');
			messageNode.className = 'description';
			messageNode.dataset.frameRowError = 'true';
			messageNode.style.color = '#b32d2e';

			const labelCell = row.querySelector('td');
			if (labelCell) {
				labelCell.appendChild(messageNode);
			}
		}

		messageNode.textContent = message;
	}

	function getMediaAttachmentValue(model, attachment, keys) {
		for (const key of keys) {
			if (attachment && attachment[key]) {
				return attachment[key];
			}

			if (attachment && key === 'url' && attachment.sizes?.full?.url) {
				return attachment.sizes.full.url;
			}

			if (model && typeof model.get === 'function' && model.get(key)) {
				return model.get(key);
			}

			if (model && key === 'url') {
				const sizes =
					typeof model.get === 'function' ? model.get('sizes') : null;
				if (sizes?.full?.url) {
					return sizes.full.url;
				}
			}

			if (model && model[key]) {
				return model[key];
			}

			if (model?.attributes?.[key]) {
				return model.attributes[key];
			}

			if (
				model?.attributes &&
				key === 'url' &&
				model.attributes.sizes?.full?.url
			) {
				return model.attributes.sizes.full.url;
			}
		}

		return '';
	}

	function setMediaFieldValue(field, value) {
		if (!field) {
			return;
		}

		field.value = value || '';
		field.defaultValue = value || '';
		field.setAttribute('value', value || '');
	}

	function getFramePresetRows(table) {
		return Array.from(
			table.querySelectorAll('tbody tr[data-frame-preset-row]')
		);
	}

	function updateFramePresetRowType(row) {
		const typeField = row.querySelector('[data-frame-field="type"]');
		const isWholeSection = typeField && typeField.value === 'whole';

		row.dataset.framePresetType = isWholeSection ? 'whole' : 'frame';
		row.querySelectorAll('[data-frame-panel="height"]').forEach((cell) => {
			cell.hidden = isWholeSection;
		});
		row.querySelectorAll('[data-frame-panel="mask"]').forEach((cell) => {
			cell.hidden = !isWholeSection;
		});
	}

	function chooseFrameSvg(row) {
		if (!window.wp || !window.wp.media) {
			return;
		}

		const frame = window.wp.media({
			title: 'Choose Section Shape SVG',
			multiple: false,
			library: { type: 'image' },
			button: { text: 'Use this SVG' },
		});

		frame.on('select', function () {
			const selection = frame.state().get('selection').first();
			if (!selection) {
				return;
			}

			const attachment = selection.toJSON();
			const attachmentUrl = getMediaAttachmentValue(
				selection,
				attachment,
				['url', 'source_url']
			);
			const isSvg =
				attachment.mime === 'image/svg+xml' ||
				attachment.subtype === 'svg+xml' ||
				/\.svg(\?.*)?$/i.test(attachmentUrl || '');

			if (!isSvg) {
				updateFrameAttachmentLabel(row, 'Selected file is not an SVG.');
				return;
			}

			const attachmentId = getMediaAttachmentValue(
				selection,
				attachment,
				['id', 'ID']
			);
			const attachmentLabel = getMediaAttachmentValue(
				selection,
				attachment,
				['title', 'filename', 'name', 'url']
			);
			const idField = row.querySelector(
				'[data-frame-field="attachment_id"]'
			);
			const urlField = row.querySelector(
				'[data-frame-field="attachment_url"]'
			);
			setMediaFieldValue(idField, attachmentId || '');
			setMediaFieldValue(urlField, attachmentUrl || '');

			updateFramePresetRowError(row, '');
			updateFrameSvgPreview(row, attachmentUrl || '');
			updateFrameAttachmentLabel(row, attachmentLabel || '');
		});

		frame.open();
	}

	function initFramePresetControls() {
		const table = document.getElementById('flexline-frame-presets-table');
		const addButton = document.getElementById('flexline-add-frame-preset');
		if (!table || !addButton) {
			return;
		}

		const template = document.getElementById(
			'flexline-frame-preset-row-template'
		);
		const body = table.querySelector('tbody');
		if (!body || !template) {
			return;
		}
		const form =
			document.getElementById('flexline-section-frames-form') ||
			document.getElementById('flexline-frame-presets-form');

		addButton.addEventListener('click', function (event) {
			event.preventDefault();

			const templateRow = template.content.querySelector(
				'tbody tr[data-frame-preset-row]'
			);
			if (!templateRow) {
				return;
			}

			const row = templateRow.cloneNode(true);
			row.querySelectorAll('input').forEach((input) => {
				if (input.dataset.frameField === 'height_min') {
					input.value = '56';
				} else if (input.dataset.frameField === 'height_preferred_vw') {
					input.value = '7';
				} else if (input.dataset.frameField === 'height_max') {
					input.value = '112';
				} else {
					input.value = '';
				}
			});
			row.querySelectorAll('select').forEach((select) => {
				if (select.dataset.frameField === 'fit') {
					select.value = 'fill';
				} else {
					select.value = 'top';
				}
			});
			updateFramePresetRowError(row, '');
			updateFrameSvgPreview(row, '');
			updateFrameAttachmentLabel(row, 'No SVG selected');
			updateFramePresetRowType(row);

			body.appendChild(row);
			reindexFramePresetRows(table);

			const labelField = row.querySelector('[data-frame-field="label"]');
			if (labelField) {
				labelField.focus();
			}
		});

		table.addEventListener('click', function (event) {
			const row = event.target.closest('tr[data-frame-preset-row]');
			if (!row || row.hidden) {
				return;
			}

			if (event.target.closest('[data-frame-choose-svg]')) {
				event.preventDefault();
				chooseFrameSvg(row);
				return;
			}

			if (event.target.closest('[data-frame-remove]')) {
				event.preventDefault();
				row.remove();
				reindexFramePresetRows(table);
				return;
			}

			if (event.target.closest('[data-frame-move-up]')) {
				event.preventDefault();
				const previous = row.previousElementSibling;
				if (previous && !previous.hidden) {
					body.insertBefore(row, previous);
					reindexFramePresetRows(table);
				}
				return;
			}

			if (event.target.closest('[data-frame-move-down]')) {
				event.preventDefault();
				const next = row.nextElementSibling;
				if (next && !next.hidden) {
					body.insertBefore(next, row);
					reindexFramePresetRows(table);
				}
			}
		});

		table.addEventListener('change', function (event) {
			if (!event.target.matches('[data-frame-field="type"]')) {
				return;
			}

			const row = event.target.closest('tr[data-frame-preset-row]');
			if (row && !row.hidden) {
				updateFramePresetRowType(row);
			}
		});

		if (form) {
			form.addEventListener('submit', function (event) {
				let firstInvalidField = null;

				getFramePresetRows(table).forEach((row) => {
					updateFramePresetRowError(row, '');

					const labelField = row.querySelector(
						'[data-frame-field="label"]'
					);
					const attachmentField = row.querySelector(
						'[data-frame-field="attachment_id"]'
					);
					const hasLabel = !!(labelField && labelField.value.trim());
					const hasAttachment = !!(
						attachmentField && attachmentField.value.trim()
					);

					if (!hasLabel && !hasAttachment) {
						return;
					}

					if (!hasLabel) {
						updateFramePresetRowError(
							row,
							'Add a label before saving this section shape.'
						);
						firstInvalidField = firstInvalidField || labelField;
					}

					if (!hasAttachment) {
						const chooseButton = row.querySelector(
							'[data-frame-choose-svg]'
						);
						updateFramePresetRowError(
							row,
							'Choose an SVG before saving this section shape.'
						);
						firstInvalidField =
							firstInvalidField ||
							chooseButton ||
							attachmentField;
					}
				});

				if (firstInvalidField) {
					event.preventDefault();
					firstInvalidField.focus();
				}
			});
		}

		getFramePresetRows(table).forEach(updateFramePresetRowType);
	}

	onReady(function () {
		initTabs();
		initFallbackImageControls();
		initFramePresetControls();
	});
})();
