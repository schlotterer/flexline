/* global requestAnimationFrame */

// Horizontal Scroll block behaviour – front-end + block-editor compatible

function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

const PREV_ICON_SVG =
	'<span class="material-symbols-outlined">' +
	'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
	'<path fill="currentColor" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';

const NEXT_ICON_SVG =
	'<span class="material-symbols-outlined">' +
	'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
	'<path fill="currentColor" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';

const PAUSE_ICON_SVG =
	'<span class="material-symbols-outlined">' +
	'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
	'<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';

const PLAY_ICON_SVG =
	'<span class="material-symbols-outlined">' +
	'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
	'<path fill="currentColor" d="M320-720v480l400-240-400-240Z"/></svg></span>';

function smoothScrollTo(scroller, targetScrollLeft, duration) {
	const start = scroller.scrollLeft;
	const distance = targetScrollLeft - start;
	const startTime = performance.now();

	function step(currentTime) {
		const elapsed = currentTime - startTime;
		const progress = Math.min(elapsed / duration, 1);
		scroller.scrollLeft = start + distance * easeInOutQuad(progress);

		if (progress < 1) {
			requestAnimationFrame(step);
		}
	}

	function easeInOutQuad(t) {
		return t < 0.5 ? 2 * t * t : 1 - Math.pow(-2 * t + 2, 2) / 2;
	}

	requestAnimationFrame(step);
}

function scrollToNext(scroller) {
	const epsilon = 5;
	const durationAttr = scroller.getAttribute('data-scroll-speed');
	const duration = durationAttr ? parseInt(durationAttr, 10) : 600;

	const current = scroller.scrollLeft;
	let target = current;

	const items = Array.from(scroller.children);
	for (const item of items) {
		const itemStart = item.offsetLeft;
		if (itemStart > current + epsilon) {
			target = itemStart;
			break;
		}
	}
	smoothScrollTo(scroller, target, duration);
}

function scrollToPrev(scroller) {
	const epsilon = 5;
	const duration = parseInt(
		scroller.getAttribute('data-scroll-speed') || '600',
		10
	);
	const items = Array.from(scroller.children);
	const current = scroller.scrollLeft;

	const prevOffsets = items
		.map((item) => item.offsetLeft)
		.filter((offset) => offset + epsilon < current);

	const target = prevOffsets.length
		? Math.max(...prevOffsets)
		: scroller.scrollWidth - scroller.offsetWidth;

	smoothScrollTo(scroller, target, duration);
}

function getRealSlides(scroller) {
	return Array.from(scroller.children).filter(
		(el) => !el.classList.contains('cloned-slide')
	);
}

function setupInfiniteLoop(scroller) {
	if (scroller.dataset.loopInitialised === 'true') {
		return;
	}

	if (!scroller.classList.contains('horizontal-scroller-loop')) {
		return;
	}

	scroller.style.visibility = 'hidden';
	const realSlides = getRealSlides(scroller);
	if (!realSlides.length) {
		return;
	}

	const realWidth = realSlides.reduce(
		(sum, slide) => sum + slide.offsetWidth,
		0
	);

	const makeClone = (el) => {
		const c = el.cloneNode(true);
		c.classList.add('cloned-slide');
		return c;
	};
	const frontClones = realSlides.map(makeClone);
	const backClones = realSlides.map(makeClone);

	frontClones
		.slice()
		.reverse()
		.forEach((c) => scroller.insertBefore(c, scroller.firstChild));
	backClones.forEach((c) => scroller.appendChild(c));

	requestAnimationFrame(() => {
		scroller.scrollLeft = realWidth + 1;
		scroller.style.visibility = '';

		if (scroller._loopScrollHandler) {
			scroller.removeEventListener('scroll', scroller._loopScrollHandler);
		}

		scroller._loopScrollHandler = () => {
			const s = scroller.scrollLeft;
			if (s < realWidth) {
				scroller.scrollLeft = s + realWidth;
			} else if (s >= realWidth * 2) {
				scroller.scrollLeft = s - realWidth;
			}
		};
		scroller.addEventListener('scroll', scroller._loopScrollHandler, {
			passive: true,
		});
	});

	scroller.dataset.loopInitialised = 'true';
}

function ensureWrapper(scroller) {
	if (!scroller.parentNode) {
		return scroller;
	}

	if (
		scroller.parentNode &&
		scroller.parentNode.classList.contains('horizontal-scroll-wrapper')
	) {
		return scroller.parentNode;
	}

	const wrapper = document.createElement('div');
	wrapper.classList.add('horizontal-scroll-wrapper');
	wrapper.style.position = 'relative';
	scroller.parentNode.insertBefore(wrapper, scroller);
	wrapper.appendChild(scroller);
	return wrapper;
}

function removeWrapper(scroller) {
	const parent = scroller.parentNode;
	if (parent && parent.classList.contains('horizontal-scroll-wrapper')) {
		parent.parentNode.insertBefore(scroller, parent);
		parent.remove();
	}
}

function clearAutoScrollRuntime(scroller) {
	if (scroller._autoScrollInterval) {
		clearInterval(scroller._autoScrollInterval);
		scroller._autoScrollInterval = null;
	}

	if (scroller._autoVisibilityObserver) {
		scroller._autoVisibilityObserver.disconnect();
		scroller._autoVisibilityObserver = null;
	}

	if (scroller._mouseEnterHandler) {
		scroller.removeEventListener('mouseenter', scroller._mouseEnterHandler);
		scroller._mouseEnterHandler = null;
	}

	if (scroller._mouseLeaveHandler) {
		scroller.removeEventListener('mouseleave', scroller._mouseLeaveHandler);
		scroller._mouseLeaveHandler = null;
	}
}

function clearDotsRuntime(scroller) {
	if (scroller._dotsScrollHandler) {
		scroller.removeEventListener('scroll', scroller._dotsScrollHandler);
		scroller._dotsScrollHandler = null;
	}
	if (scroller._dotsResizeHandler) {
		window.removeEventListener('resize', scroller._dotsResizeHandler);
		scroller._dotsResizeHandler = null;
	}
	delete scroller._updateRangeDots;
}

function clearControlContainers(scroller) {
	const wrapper = ensureWrapper(scroller);
	if (!wrapper || wrapper === scroller) {
		return;
	}
	wrapper
		.querySelectorAll(
			'.horizontal-scroller-nav-buttons, .horizontal-scroller-side-buttons, .horizontal-scroller-range-dots'
		)
		.forEach((el) => el.remove());
}

function setButtonIcon(button, iconUrl, fallbackSvg, iconLabel) {
	if (!button) {
		return;
	}

	button.innerHTML = '';
	if (iconUrl) {
		const img = document.createElement('img');
		img.className = 'horizontal-scroller-custom-icon';
		img.src = iconUrl;
		img.alt = iconLabel;
		button.appendChild(img);
		return;
	}
	button.innerHTML = fallbackSvg;
}

function updateRangeDots(scroller, dotsContainer) {
	if (!dotsContainer) {
		return;
	}

	const realSlides = getRealSlides(scroller);
	const dots = Array.from(dotsContainer.children);
	if (!realSlides.length || dots.length !== realSlides.length) {
		return;
	}

	const scrollerRect = scroller.getBoundingClientRect();
	realSlides.forEach((slide, index) => {
		const dot = dots[index];
		const slideRect = slide.getBoundingClientRect();
		const visibleWidth =
			Math.min(scrollerRect.right, slideRect.right) -
			Math.max(scrollerRect.left, slideRect.left);
		if (visibleWidth > 1) {
			dot.classList.add('is-visible');
		} else {
			dot.classList.remove('is-visible');
		}
	});
}

function setupRangeDots(scroller, wrapper) {
	const showDots = scroller.classList.contains(
		'horizontal-scroller-show-dots'
	);
	if (!showDots) {
		return;
	}

	const realSlides = getRealSlides(scroller);
	if (!realSlides.length) {
		return;
	}

	const dotsContainer = document.createElement('div');
	dotsContainer.classList.add('horizontal-scroller-range-dots');
	realSlides.forEach((_, index) => {
		const dot = document.createElement('span');
		dot.classList.add('horizontal-scroller-range-dot');
		dot.setAttribute('aria-hidden', 'true');
		dot.setAttribute('data-slide-index', `${index}`);
		dotsContainer.appendChild(dot);
	});
	wrapper.appendChild(dotsContainer);

	const update = () => updateRangeDots(scroller, dotsContainer);
	scroller._updateRangeDots = update;
	scroller._dotsScrollHandler = update;
	scroller._dotsResizeHandler = update;
	scroller.addEventListener('scroll', scroller._dotsScrollHandler, {
		passive: true,
	});
	window.addEventListener('resize', scroller._dotsResizeHandler);
	requestAnimationFrame(update);
}

function setupScrollerButtons(scroller) {
	if (!scroller.dataset.classObserverAttached && isBlockEditor()) {
		new window.MutationObserver(() =>
			setupScrollerButtons(scroller)
		).observe(scroller, { attributes: true, attributeFilter: ['class'] });
		scroller.dataset.classObserverAttached = 'true';
	}

	const wrapper = ensureWrapper(scroller);
	if (!wrapper || wrapper === scroller) {
		return;
	}

	clearAutoScrollRuntime(scroller);
	clearDotsRuntime(scroller);
	clearControlContainers(scroller);

	const hasNav = scroller.classList.contains(
		'horizontal-scroller-navigation'
	);
	const autoEnabled = scroller.classList.contains('horizontal-scroller-auto');
	const showPause =
		autoEnabled &&
		!scroller.classList.contains('horizontal-scroller-hide-pause-button');
	const useSideButtons = scroller.classList.contains(
		'horizontal-scroller-buttons-sides'
	);
	const showDots = scroller.classList.contains(
		'horizontal-scroller-show-dots'
	);
	const hasBottomNavButtons = (!useSideButtons && hasNav) || showPause;
	const hasAnyControls = hasNav || showPause || showDots;

	scroller._isPaused = false;

	const startAutoScroll = () => {
		if (!autoEnabled || scroller._autoScrollInterval) {
			return;
		}
		const intervalDur = parseInt(
			scroller.getAttribute('data-scroll-interval') || '4000',
			10
		);
		scroller._autoScrollInterval = setInterval(
			() => scrollToNext(scroller),
			intervalDur
		);
	};

	const stopAutoScroll = () => {
		if (scroller._autoScrollInterval) {
			clearInterval(scroller._autoScrollInterval);
			scroller._autoScrollInterval = null;
		}
	};

	const resetAutoScrollTimer = () => {
		if (!autoEnabled) {
			return;
		}
		stopAutoScroll();
		if (!scroller._isPaused) {
			startAutoScroll();
		}
	};

	if (autoEnabled) {
		if (scroller.classList.contains('scroller-pause-on-hover')) {
			scroller._mouseEnterHandler = () => stopAutoScroll();
			scroller._mouseLeaveHandler = () => {
				if (!scroller._isPaused) {
					startAutoScroll();
				}
			};
			scroller.addEventListener(
				'mouseenter',
				scroller._mouseEnterHandler
			);
			scroller.addEventListener(
				'mouseleave',
				scroller._mouseLeaveHandler
			);
		}

		scroller._autoVisibilityObserver = new window.IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						startAutoScroll();
					}
				});
			},
			{ threshold: 0.3 }
		);
		scroller._autoVisibilityObserver.observe(scroller);
	}

	if (!hasAnyControls) {
		return;
	}

	const prevIconUrl = scroller.getAttribute('data-icon-prev-url') || '';
	const nextIconUrl = scroller.getAttribute('data-icon-next-url') || '';
	const pauseIconUrl = scroller.getAttribute('data-icon-pause-url') || '';

	const buildPrevButton = () => {
		const btn = document.createElement('button');
		btn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-prev'
		);
		btn.setAttribute('aria-label', 'Scroll to previous item');
		setButtonIcon(btn, prevIconUrl, PREV_ICON_SVG, 'Previous');
		btn.addEventListener('click', () => {
			scrollToPrev(scroller);
			resetAutoScrollTimer();
		});
		return btn;
	};

	const buildNextButton = () => {
		const btn = document.createElement('button');
		btn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-next'
		);
		btn.setAttribute('aria-label', 'Scroll to next item');
		setButtonIcon(btn, nextIconUrl, NEXT_ICON_SVG, 'Next');
		btn.addEventListener('click', () => {
			scrollToNext(scroller);
			resetAutoScrollTimer();
		});
		return btn;
	};

	const buildPauseButton = () => {
		const btn = document.createElement('button');
		btn.classList.add(
			'is-horizontal-scroll-btn',
			'is-horizontal-scroll-pause'
		);
		btn.setAttribute('aria-label', 'Pause auto-scroll');
		setButtonIcon(btn, pauseIconUrl, PAUSE_ICON_SVG, 'Pause');
		btn.addEventListener('click', () => {
			scroller._isPaused = !scroller._isPaused;
			btn.setAttribute(
				'aria-label',
				scroller._isPaused ? 'Resume auto-scroll' : 'Pause auto-scroll'
			);
			if (scroller._isPaused) {
				setButtonIcon(btn, '', PLAY_ICON_SVG, 'Play');
				stopAutoScroll();
			} else {
				setButtonIcon(btn, pauseIconUrl, PAUSE_ICON_SVG, 'Pause');
				resetAutoScrollTimer();
			}
		});
		return btn;
	};

	if (hasBottomNavButtons) {
		const navContainer = document.createElement('div');
		navContainer.classList.add('horizontal-scroller-nav-buttons');
		navContainer.style.position = 'absolute';
		navContainer.style.display = 'flex';
		navContainer.style.gap = '4px';
		navContainer.style.pointerEvents = 'auto';

		if (!useSideButtons && hasNav) {
			navContainer.appendChild(buildPrevButton());
		}
		if (showPause) {
			navContainer.appendChild(buildPauseButton());
		}
		if (!useSideButtons && hasNav) {
			navContainer.appendChild(buildNextButton());
		}
		wrapper.appendChild(navContainer);
	}

	if (showDots) {
		setupRangeDots(scroller, wrapper);
	}

	if (useSideButtons && hasNav) {
		const sideButtons = document.createElement('div');
		sideButtons.classList.add('horizontal-scroller-side-buttons');
		sideButtons.appendChild(buildPrevButton());
		sideButtons.appendChild(buildNextButton());
		wrapper.appendChild(sideButtons);
	}
}

function buildThresholdList() {
	const t = [];
	for (let i = 0; i <= 1; i += 0.05) {
		t.push(i);
	}
	return t;
}

function setupStatusObserver(scroller) {
	if (scroller._statusObserver) {
		scroller._statusObserver.disconnect();
	}

	const observer = new window.IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				const item = entry.target;
				const prev = parseFloat(item.dataset.prevRatio || 0);
				const curr = entry.intersectionRatio;

				if (curr > 0.05) {
					item.classList.remove('out-of-view');
					if (curr >= 0.1) {
						item.classList.add('in-view');
						item.classList.remove('entering', 'exiting');
					} else {
						item.classList.remove('in-view');
						if (curr > prev) {
							item.classList.add('entering');
							item.classList.remove('exiting');
						} else if (curr < prev) {
							item.classList.add('exiting');
							item.classList.remove('entering');
						}
					}
				} else {
					item.classList.add('out-of-view');
					item.classList.remove('in-view', 'entering', 'exiting');
				}
				item.dataset.prevRatio = curr;
			});

			if (scroller._updateRangeDots) {
				scroller._updateRangeDots();
			}
		},
		{ root: scroller, threshold: buildThresholdList() }
	);

	Array.from(scroller.children).forEach((child) => observer.observe(child));
	scroller._statusObserver = observer;
}

function initScroller(scroller) {
	if (scroller.classList.contains('is-style-horizontal-scroll')) {
		ensureWrapper(scroller);
	} else {
		removeWrapper(scroller);
		return;
	}

	setupScrollerButtons(scroller);
	setupStatusObserver(scroller);
}

function teardownInfiniteLoop(scroller) {
	if (scroller.dataset.loopInitialised !== 'true') {
		return;
	}
	Array.from(scroller.children)
		.filter((el) => el.classList.contains('cloned-slide'))
		.forEach((c) => {
			try {
				c.remove();
			} catch {
				// Ignore removal errors.
			}
		});
	if (scroller._loopScrollHandler) {
		scroller.removeEventListener('scroll', scroller._loopScrollHandler);
		scroller._loopScrollHandler = null;
	}
	scroller.scrollLeft = 0;
	delete scroller.dataset.loopInitialised;
	if (scroller._updateRangeDots) {
		scroller._updateRangeDots();
	}
}

function watchLoopToggle(scroller) {
	if (scroller.dataset.loopObserverAttached) {
		return;
	}
	new window.MutationObserver(() => {
		if (!scroller.classList.contains('horizontal-scroller-loop')) {
			teardownInfiniteLoop(scroller);
		} else {
			setupInfiniteLoop(scroller);
		}
		if (scroller._updateRangeDots) {
			scroller._updateRangeDots();
		}
	}).observe(scroller, {
		attributes: true,
		attributeFilter: ['class'],
	});
	scroller.dataset.loopObserverAttached = 'true';
}

function watchChildrenForLoop(scroller) {
	if (scroller._childObserverAttached) {
		return;
	}
	const mo = new window.MutationObserver((mutations) => {
		const realChange = mutations.some((m) => {
			return (
				Array.from(m.addedNodes).some(
					(n) =>
						n.nodeType === 1 &&
						!n.classList.contains('cloned-slide')
				) ||
				Array.from(m.removedNodes).some(
					(n) =>
						n.nodeType === 1 &&
						!n.classList.contains('cloned-slide')
				)
			);
		});

		if (!realChange) {
			return;
		}

		if (scroller.classList.contains('horizontal-scroller-loop')) {
			teardownInfiniteLoop(scroller);
			setupInfiniteLoop(scroller);
		}

		setupScrollerButtons(scroller);
		setupStatusObserver(scroller);
	});

	mo.observe(scroller, { childList: true });
	scroller._childObserverAttached = true;
}

function initInfiniteLoops() {
	if (isBlockEditor()) {
		document
			.querySelectorAll('[data-loop-initialised="true"]')
			.forEach((s) => {
				if (!s.classList.contains('horizontal-scroller-loop')) {
					teardownInfiniteLoop(s);
				}
			});
	}

	document
		.querySelectorAll(
			'.is-style-horizontal-scroll.horizontal-scroller-loop'
		)
		.forEach(setupInfiniteLoop);
}

function initOneScroller(scroller) {
	initScroller(scroller);
	if (scroller.classList.contains('horizontal-scroller-loop')) {
		setupInfiniteLoop(scroller);
	}
}

function scheduleScrollerInit(scroller) {
	watchLoopToggle(scroller);
	watchChildrenForLoop(scroller);

	if (
		isBlockEditor() &&
		scroller.classList.contains('wp-block-post-template')
	) {
		if (scroller.querySelectorAll('.wp-block-post').length) {
			initOneScroller(scroller);
			return;
		}

		let didInit = false;
		if (typeof wp !== 'undefined' && wp.data && wp.data.subscribe) {
			const unsubscribe = wp.data.subscribe(() => {
				if (didInit) {
					unsubscribe();
					return;
				}

				if (scroller.querySelectorAll('.wp-block-post').length) {
					didInit = true;
					unsubscribe();
					initOneScroller(scroller);
				}
			});
		} else {
			const obs = new window.MutationObserver(() => {
				if (
					!didInit &&
					scroller.querySelectorAll('.wp-block-post').length
				) {
					didInit = true;
					obs.disconnect();
					initOneScroller(scroller);
				}
			});
			obs.observe(scroller, { childList: true, subtree: true });
		}

		setTimeout(() => {
			if (!didInit) {
				didInit = true;
				initOneScroller(scroller);
			}
		}, 3000);
	} else {
		initOneScroller(scroller);
	}
}

function initScrollers() {
	document
		.querySelectorAll('.is-style-horizontal-scroll')
		.forEach(scheduleScrollerInit);
	initInfiniteLoops();
}

const flexlineOnEarlyReady = (callback) => {
	if (window.Flexline && typeof window.Flexline.onEarlyReady === 'function') {
		window.Flexline.onEarlyReady(callback);
		return;
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', callback, { once: true });
	} else {
		callback();
	}
};

flexlineOnEarlyReady(initScrollers);
window.addEventListener('load', initScrollers);

if (isBlockEditor()) {
	const bodyObserver = new window.MutationObserver((records) => {
		for (const rec of records) {
			for (const node of rec.addedNodes) {
				if (
					node.nodeType === 1 &&
					node.classList.contains('is-style-horizontal-scroll') &&
					!node.dataset._scrollerInitQueued
				) {
					node.dataset._scrollerInitQueued = 'true';
					scheduleScrollerInit(node);
				}
			}
		}
	});

	bodyObserver.observe(document.body, {
		childList: true,
		subtree: true,
	});
	wp.domReady(() => {
		let t;
		wp.data.subscribe(() => {
			clearTimeout(t);
			t = setTimeout(() => initScrollers(), 200);
		});
	});
}
