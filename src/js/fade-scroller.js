/* global getComputedStyle, IntersectionObserver */

/**
 * Initialise a scroller that crossfades its children.
 * @param {HTMLElement} scroller
 */
export function initFadeScroller(scroller) {
	if (!scroller || scroller.dataset.fadeInitialised === 'true') {
		return;
	}
	scroller.dataset.fadeInitialised = 'true';

	const items = Array.from(scroller.children).filter(
		(node) => node.nodeType === 1
	);
	if (!items.length) {
		return;
	}

	const cs = getComputedStyle(scroller);
	const duration = parseInt(cs.getPropertyValue('--fl-duration'), 10) || 600;
	const interval = parseInt(cs.getPropertyValue('--fl-interval'), 10) || 5000;
	const easing = cs.getPropertyValue('--fl-easing').trim() || 'ease';
	const fit = cs.getPropertyValue('--fl-media-fit').trim() || 'cover';

	scroller.style.position = 'relative';
	scroller.style.overflow = 'hidden';
	scroller.setAttribute('aria-live', 'off');

	items.forEach((item, i) => {
		item.style.position = 'absolute';
		item.style.inset = '0';
		item.style.opacity = i === 0 ? '1' : '0';
		item.style.transition = `opacity ${duration}ms ${easing}`;
		item.style.pointerEvents = i === 0 ? '' : 'none';
	});

	items.forEach((item) => {
		item.querySelectorAll(
			'img, video, .wp-block-cover__image-background, .wp-block-post-featured-image img'
		).forEach((m) => {
			m.style.objectFit = fit;
			m.style.width = '100%';
			m.style.height = '100%';
		});
	});

	let index = 0;

	function updateAccessibility() {
		items.forEach((item, i) => {
			const active = i === index;
			if (active) {
				item.removeAttribute('aria-hidden');
				item.querySelectorAll('[data-orig-tabindex]').forEach((el) => {
					const orig = el.dataset.origTabindex;
					if (orig === '') {
						el.removeAttribute('tabindex');
					} else {
						el.setAttribute('tabindex', orig);
					}
					delete el.dataset.origTabindex;
				});
			} else {
				item.setAttribute('aria-hidden', 'true');
				item.querySelectorAll(
					'a, button, input, textarea, select, [tabindex]'
				).forEach((el) => {
					if (!el.hasAttribute('data-orig-tabindex')) {
						el.dataset.origTabindex =
							el.getAttribute('tabindex') || '';
					}
					el.setAttribute('tabindex', '-1');
				});
			}
		});
	}

	updateAccessibility();

	function show(i) {
		if (i === index) {
			return;
		}
		items[index].style.opacity = '0';
		items[index].style.pointerEvents = 'none';
		items[i].style.opacity = '1';
		items[i].style.pointerEvents = '';
		index = i;
		updateAccessibility();
	}

	function next() {
		show((index + 1) % items.length);
	}

	let timer = null;
	const prefersReduced = window.matchMedia(
		'(prefers-reduced-motion: reduce)'
	).matches;

	function start() {
		if (prefersReduced || timer) {
			return;
		}
		timer = setInterval(next, interval);
		scroller.setAttribute('aria-live', 'off');
	}

	function stop() {
		if (timer) {
			clearInterval(timer);
			timer = null;
			scroller.setAttribute('aria-live', 'polite');
		}
	}

	scroller.addEventListener('mouseenter', stop);
	scroller.addEventListener('mouseleave', start);
	scroller.addEventListener('focusin', stop);
	scroller.addEventListener('focusout', (e) => {
		if (!scroller.contains(e.relatedTarget)) {
			start();
		}
	});

	start();

	if (!cs.getPropertyValue('--fl-height').trim()) {
		const measure = () => {
			let max = 0;
			items.forEach((item) => {
				const h = item.offsetHeight;
				if (h > max) {
					max = h;
				}
			});
			if (max) {
				scroller.style.setProperty('--fl-height', `${max}px`);
			}
		};

		measure();
		window.addEventListener('load', measure);
		scroller.querySelectorAll('img, video').forEach((m) => {
			if (m.complete || m.readyState >= 2) {
				measure();
			} else {
				m.addEventListener('load', measure);
				m.addEventListener('loadedmetadata', measure);
			}
		});
		const io = new IntersectionObserver((entries) => {
			if (entries[0].isIntersecting) {
				measure();
			}
		});
		io.observe(scroller);
	}
}
