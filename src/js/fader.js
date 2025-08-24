/**
 * Initialize a single fade scroller.
 *
 * @param {HTMLElement} scroller Container with fade transition class.
 */
function initOneFader(scroller) {
	if (scroller._faderCleanup) {
		scroller._faderCleanup();
	}

	const slides = Array.from(scroller.children);
	if (!slides.length) {
		return;
	}

	const interval = parseInt(
		scroller.getAttribute('data-scroll-interval') || '5000',
		10
	);
	const duration = parseInt(
		scroller.getAttribute('data-scroll-speed') || '600',
		10
	);

	let index = 0;
	const reducedMotion = window.matchMedia(
		'(prefers-reduced-motion: reduce)'
	).matches;

	slides.forEach((slide, i) => {
		slide.style.opacity = i === 0 ? '1' : '0';
		slide.style.transition = `opacity ${duration}ms`;
		slide.setAttribute('tabindex', i === 0 ? '0' : '-1');
		if (i !== 0) {
			slide.setAttribute('aria-hidden', 'true');
		} else {
			slide.removeAttribute('aria-hidden');
		}
	});

	function show(newIndex) {
		slides.forEach((slide, i) => {
			const active = i === newIndex;
			slide.style.opacity = active ? '1' : '0';
			slide.setAttribute('tabindex', active ? '0' : '-1');
			if (active) {
				slide.removeAttribute('aria-hidden');
			} else {
				slide.setAttribute('aria-hidden', 'true');
			}
		});
		index = newIndex;
	}

	function next() {
		show((index + 1) % slides.length);
	}

	let timer = null;

	function play() {
		if (reducedMotion || timer) {
			return;
		}
		scroller.setAttribute('aria-live', 'polite');
		timer = setInterval(next, interval);
	}

	function pause() {
		if (timer) {
			clearInterval(timer);
			timer = null;
		}
		scroller.setAttribute('aria-live', 'off');
	}

	scroller.addEventListener('mouseenter', pause);
	scroller.addEventListener('mouseleave', play);
	scroller.addEventListener('focusin', pause);
	scroller.addEventListener('focusout', play);

	if (!reducedMotion) {
		play();
	} else {
		scroller.setAttribute('aria-live', 'off');
	}

	scroller._faderCleanup = () => {
		pause();
		scroller.removeEventListener('mouseenter', pause);
		scroller.removeEventListener('mouseleave', play);
		scroller.removeEventListener('focusin', pause);
		scroller.removeEventListener('focusout', play);
		delete scroller._faderCleanup;
	};
}

/**
 * Initialise all fade scrollers on the page.
 */
function initFaders() {
	document
		.querySelectorAll('.horizontal-scroller-transition-fade')
		.forEach(initOneFader);
}

export { initFaders, initOneFader };
