// Function to detect video type and return an embeddable URL
function getVideoEmbedUrl(mediaUrl) {
	const urlParsers = [
		{
			match: /(youtube\.com\/watch\?v=|youtu\.be\/)([\w-]+)/,
			embedUrl: (id) =>
				`https://www.youtube.com/embed/${id}?autoplay=1&enablejsapi=1`,
		},
		{
			match: /vimeo\.com\/(\d+)/,
			embedUrl: (id) => `https://player.vimeo.com/video/${id}?autoplay=1`,
		},
	];

	for (const parser of urlParsers) {
		const match = mediaUrl.match(parser.match);
		if (match && match[1]) {
			// For Vimeo the ID is in match[1], same for YouTube as match[2] is the second group.
			const videoId = match[2] || match[1]; // Fallback to match[1] if match[2] is undefined.
			return parser.embedUrl(videoId);
		}
	}

	return '';
}
document.addEventListener('DOMContentLoaded', () => {
	const enableModal = (element, url) => {
		element.classList.add('has-modal');
		element.setAttribute('data-enable-modal', 'true');
		element.setAttribute('data-modal-media-url', url);

		const iconPlay =
			'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg"  height="20" viewBox="0 -960 960 960" width="20"><path fill="currentColor" d="M320-200v-560l440 280-440 280Z"/></svg></span>';
		const iconExpand =
			'<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path fill="currentColor" d="M200-200v-240h80v160h160v80H200Zm480-320v-160H520v-80h240v240h-80Z"/></svg></span>';

		if (/youtube\.com|youtu\.be|vimeo\.com|\.mp4|\.webm|\.ogg/.test(url)) {
			// add the play icon to the end of the button content
			element.insertAdjacentHTML('beforeend', iconPlay);
		} else {
			// add the expand icon to the end of the button content
			element.insertAdjacentHTML('beforeend', iconExpand);
		}

		// Accessibility: make non-interactive elements operable
		const isLink = element.tagName === 'A';
		const isButtonLike = isLink || element.tagName === 'BUTTON';
		if (!isButtonLike) {
			element.setAttribute('role', 'button');
			element.setAttribute('tabindex', '0');
		}
		element.setAttribute('aria-haspopup', 'dialog');
		element.setAttribute('aria-controls', 'flexline-modal');
		element.setAttribute('aria-expanded', 'false');
		if (!element.getAttribute('aria-label')) {
			const altText = element.getAttribute('alt');
			const label =
				altText && altText.trim() !== ''
					? altText
					: 'Open media in modal';
			element.setAttribute('aria-label', label);
		}

		const openFromTrigger = (trigger) => {
			trigger.setAttribute('aria-expanded', 'true');
			displayModal(url, trigger); // Function to display the modal
		};

		element.addEventListener('click', (e) => {
			e.preventDefault();
			openFromTrigger(e.currentTarget);
		});
		element.addEventListener('keydown', (e) => {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				openFromTrigger(e.currentTarget);
			}
		});
	};

	document
		.querySelectorAll('.enable-modal:not(.wp-block-button)')
		.forEach((block) => {
			const mediaElement = block.querySelector('img, a');
			if (!mediaElement) {
				return;
			}

			const mediaUrl =
				block.dataset.modalMediaUrl ||
				mediaElement.getAttribute(
					mediaElement.tagName === 'A' ? 'href' : 'src'
				);
			if (mediaUrl) {
				enableModal(mediaElement, mediaUrl);
			}
		});

	// find all .enable-modal.wp-block-button elements
	document
		.querySelectorAll('.enable-modal.wp-block-button a')
		.forEach((element) => {
			const url = element.href;
			if (!url) {
				return;
			}

			if (url) {
				element.setAttribute('aria-haspopup', 'dialog');
				element.setAttribute('aria-controls', 'flexline-modal');
				element.setAttribute('aria-expanded', 'false');
				if (
					!element.textContent.trim() &&
					!element.getAttribute('aria-label')
				) {
					element.setAttribute('aria-label', 'Open media in modal');
				}
				const openFromTrigger = (trigger) => {
					trigger.setAttribute('aria-expanded', 'true');
					displayModal(url, trigger);
				};
				element.addEventListener('click', (e) => {
					e.preventDefault();
					openFromTrigger(e.currentTarget);
				});
				element.addEventListener('keydown', (e) => {
					if (e.key === 'Enter' || e.key === ' ') {
						e.preventDefault();
						openFromTrigger(e.currentTarget);
					}
				});
			}
		});

	document
		.querySelectorAll(
			'.group-link-type-modal_media .flexline-group-link-anchor'
		)
		.forEach((block) => {
			const mediaUrl = block.href;
			if (!mediaUrl) {
				return;
			}
			block.setAttribute('aria-haspopup', 'dialog');
			block.setAttribute('aria-controls', 'flexline-modal');
			block.setAttribute('aria-expanded', 'false');
			const triggerModal = (e) => {
				e.preventDefault();
				block.setAttribute('aria-expanded', 'true');
				displayModal(mediaUrl, block);
			};
			block.addEventListener('click', triggerModal);
			block.addEventListener('keydown', (e) => {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					triggerModal(e);
				}
			});
		});
});

// Lock/unlock body scroll while preserving position
function lockBodyScroll() {
	const y = window.scrollY || document.documentElement.scrollTop || 0;
	document.body.dataset.modalScrollY = String(y);
	// Set the offset before applying fixed positioning via the CSS class
	document.body.style.top = `-${y}px`;
	document.body.classList.add('no-scroll');
}

function unlockBodyScroll() {
	const y = parseInt(document.body.dataset.modalScrollY || '0', 10);
	document.body.classList.remove('no-scroll');
	document.body.style.top = '';
	delete document.body.dataset.modalScrollY;
	const prev = document.documentElement.style.scrollBehavior;
	document.documentElement.style.scrollBehavior = 'auto';
	window.scrollTo(0, y);
	document.documentElement.style.scrollBehavior = prev || '';
}

function displayModal(mediaUrl, openerEl) {
	// eslint-disable-next-line no-console
	console.log('Displaying modal for:', mediaUrl);
	let contentHtml = '';

	if (mediaUrl.match(/\.(jpeg|jpg|gif|png|webp|avif)$/)) {
		contentHtml = `<img src="${mediaUrl}" style="max-width:90%; max-height:80vh;">`;
	} else if (
		mediaUrl.includes('youtube.com') ||
		mediaUrl.includes('youtu.be') ||
		mediaUrl.includes('vimeo.com')
	) {
		// Extract the YouTube video ID and construct the embed URL with autoplay
		const videoEmbedUrl = getVideoEmbedUrl(mediaUrl);
		contentHtml = `<div class="aspect-ratio-16-9 iframe"><iframe src="${videoEmbedUrl}" frameborder="0" title="Embedded video" allow="autoplay; fullscreen" allowfullscreen></iframe></div>`;
	} else if (mediaUrl.match(/\.(mp4|webm|ogg)$/)) {
		// For native video elements, add the autoplay attribute
		contentHtml = `<div class="aspect-ratio-16-9 video"><video controls autoplay src="${mediaUrl}" style="object-fit: contain;"></video></div>`;
	} else {
		// other domains try to put them in an iframe
		contentHtml = `<div class="aspect-ratio-match-window"><iframe src="${mediaUrl}" frameborder="0" title="Embedded content" allow="autoplay; fullscreen" allowfullscreen></iframe></div>`;
	}

	// Create the modal container
	const modal = document.createElement('div');
	modal.id = 'flexline-modal';
	modal.style.position = 'fixed';
	modal.style.top = '0';
	modal.style.left = '0';
	modal.style.width = '100%';
	modal.style.height = '100%';
	modal.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
	modal.style.display = 'flex';
	modal.style.justifyContent = 'center';
	modal.style.alignItems = 'center';
	modal.style.zIndex = '10000000';
	modal.style.cursor = 'pointer';
	modal.setAttribute('role', 'dialog');
	modal.setAttribute('aria-modal', 'true');
	modal.setAttribute('aria-label', 'Media modal');
	modal.setAttribute('tabindex', '-1');

	// Create the close button
	const closeButton = document.createElement('span');
	closeButton.innerHTML =
		'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>';
	closeButton.style.position = 'absolute';
	closeButton.style.top = '20px';
	closeButton.style.right = '20px';
	closeButton.style.fontSize = '24px';
	closeButton.style.color = '#fff';
	closeButton.style.cursor = 'pointer';
	closeButton.setAttribute('aria-label', 'Close modal');
	closeButton.setAttribute('aria-keyshortcuts', 'Escape');
	closeButton.setAttribute('role', 'button');
	closeButton.setAttribute('tabindex', '0'); // Make it focusable
	closeButton.className = 'material-symbols-outlined';

	// Append the media content and close button to the modal
	modal.innerHTML = contentHtml;
	modal.appendChild(closeButton);

	// Lock scroll and append the modal
	lockBodyScroll();
	document.body.appendChild(modal);

	// Focus management for accessibility
	const doc = modal.ownerDocument || document;
	const previouslyFocused = openerEl || doc.activeElement;
	// Focus trap setup
	const focusableSelectors = [
		'a[href]',
		'area[href]',
		'input:not([disabled])',
		'select:not([disabled])',
		'textarea:not([disabled])',
		'button:not([disabled])',
		'iframe',
		'[tabindex]:not([tabindex="-1"])',
		'[contenteditable="true"]',
	].join(',');
	const getFocusable = () =>
		Array.from(modal.querySelectorAll(focusableSelectors));

	closeButton.focus();
	let trapHandler = null;
	trapHandler = (e) => {
		// Allow Escape to close the modal even when focus is inside the dialog
		if (e.key === 'Escape') {
			e.preventDefault();
			cleanupAndClose();
			return;
		}
		if (e.key !== 'Tab') {
			return;
		}
		const list = getFocusable();
		if (list.length === 0) {
			e.preventDefault();
			closeButton.focus();
			return;
		}
		const first = list[0];
		const last = list[list.length - 1];
		if (e.shiftKey && doc.activeElement === first) {
			e.preventDefault();
			last.focus();
		} else if (!e.shiftKey && doc.activeElement === last) {
			e.preventDefault();
			first.focus();
		}
	};
	modal.addEventListener('keydown', trapHandler);

	// Event listener for the close button
	const cleanupAndClose = () => {
		modal.remove();
		unlockBodyScroll();
		if (
			previouslyFocused &&
			typeof previouslyFocused.setAttribute === 'function' &&
			typeof previouslyFocused.focus === 'function'
		) {
			previouslyFocused.setAttribute('aria-expanded', 'false');
			previouslyFocused.focus();
		}
		modal.removeEventListener('keydown', trapHandler);
		document.removeEventListener('keydown', escHandler, true);
	};

	closeButton.addEventListener('click', (e) => {
		e.stopPropagation(); // Prevent the modal click event from firing
		cleanupAndClose();
	});

	// Optional: Close the modal when clicking outside the media content
	modal.addEventListener('click', () => {
		cleanupAndClose();
	});

	// Close the modal with the Escape key
	const escHandler = function (e) {
		if (e.key === 'Escape') {
			cleanupAndClose();
		}
	};
	document.addEventListener('keydown', escHandler, true);
	// Move focus to the modal container to announce dialog region
	modal.focus();
}
