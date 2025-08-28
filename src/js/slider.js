// Fading slider runtime for core/group (Stack) gated by classes

function isBlockEditor() {
	return (
		typeof wp !== 'undefined' &&
		wp.data &&
		typeof wp.data.select === 'function' &&
		wp.data.select('core/block-editor') !== undefined
	);
}

function ensureWrapper(slider) {
	const parent = slider && slider.parentNode;
	if (!parent) {
		return null;
	}
	if (parent.classList && parent.classList.contains('slider-wrapper')) {
		return parent;
	}
	const w = document.createElement('div');
	w.classList.add('slider-wrapper');
	w.style.position = 'relative';
	try {
		parent.insertBefore(w, slider);
		w.appendChild(slider);
	} catch (e) {
		return null;
	}
	return w;
}

function removeWrapper(slider) {
	const parent = slider && slider.parentNode;
	if (
		!parent ||
		!parent.classList ||
		!parent.classList.contains('slider-wrapper')
	) {
		return;
	}
	const gp = parent.parentNode;
	if (!gp) {
		return;
	}
	try {
		gp.insertBefore(slider, parent);
		parent.remove();
	} catch (e) {
		// ignore
	}
}

function getSlideContainer(slider) {
	if (isBlockEditor()) {
		// In the editor, children are wrapped in a block list layout element
		const layout = slider.querySelector(
			':scope > .block-editor-block-list__layout'
		);
		if (layout) {
			return layout;
		}
	}
	return slider;
}

function isEditorChrome(el) {
	if (!el || !el.classList) {
		return false;
	}
	return (
		el.classList.contains('block-editor-default-block-appender') ||
		el.classList.contains('block-list-appender') ||
		el.classList.contains('block-editor-block-list__block-appender')
	);
}

function getSlides(slider) {
	const root = getSlideContainer(slider);
	return Array.from(root.children).filter((el) => {
		if (!el || !el.classList) {
			return false;
		}
		if (el.classList.contains('slider-nav-buttons')) {
			return false;
		}
		if (isEditorChrome(el)) {
			return false;
		}
		return true;
	});
}

function mirrorScrollerStyleClassesForButtons(slider) {
	const maps = [
		['slider-buttons-background-', 'scroller-buttons-background-'],
		['slider-buttons-text-', 'scroller-buttons-text-'],
		['slider-buttons-border-', 'scroller-buttons-border-'],
		['slider-buttons-over', 'scroller-buttons-over'],
		[
			'slider-buttons-horizontal-left',
			'horizontal-scroller-buttons-horizontal-left',
		],
		[
			'slider-buttons-horizontal-center',
			'horizontal-scroller-buttons-horizontal-center',
		],
		[
			'slider-buttons-horizontal-right',
			'horizontal-scroller-buttons-horizontal-right',
		],
		[
			'slider-buttons-vertical-top',
			'horizontal-scroller-buttons-vertical-top',
		],
		[
			'slider-buttons-vertical-bottom',
			'horizontal-scroller-buttons-vertical-bottom',
		],
		['slider-pause-on-hover', 'scroller-pause-on-hover'],
	];
	maps.forEach(([src, dest]) => {
		if (
			(src.endsWith('-') &&
				Array.from(slider.classList).some((c) => c.startsWith(src))) ||
			(!src.endsWith('-') && slider.classList.contains(src))
		) {
			if (src.endsWith('-')) {
				const match = Array.from(slider.classList).find((c) =>
					c.startsWith(src)
				);
				if (match) {
					slider.classList.add(match.replace(src, dest));
				}
			} else {
				slider.classList.add(dest);
			}
		}
	});
}

function gotoIndex(slider, idx, opts) {
	const { transitionMs, disablePointer } = opts;
	const slides = getSlides(slider);
	if (!slides.length) {
		return;
	}
	const clamped = ((idx % slides.length) + slides.length) % slides.length;
	slides.forEach((el, i) => {
		el.classList.toggle('slide-active', i === clamped);
		el.style.transition = `opacity ${transitionMs}ms ease-in-out`;
		el.style.opacity = i === clamped ? '1' : '0';
		if (disablePointer) {
			el.style.pointerEvents = 'none';
		} else {
			el.style.pointerEvents = i === clamped ? 'auto' : 'none';
		}
	});
	slider.dataset.activeIndex = String(clamped);
}

function clampState(slider, opts) {
	// Ensure exactly one slide is active with correct styles
	const active = Number(slider.dataset.activeIndex || '0');
	const slides = getSlides(slider);
	slides.forEach((el, i) => {
		const isActive = i === active;
		el.classList.toggle('slide-active', isActive);
		el.style.opacity = isActive ? '1' : '0';
		if (opts.disablePointer) {
			el.style.pointerEvents = 'none';
		} else {
			el.style.pointerEvents = isActive ? 'auto' : 'none';
		}
	});
}

function next(slider, opts) {
	const slides = getSlides(slider);
	if (!slides.length) {
		return;
	}
	const current = Number(slider.dataset.activeIndex || '0');
	const nextIdx = current + 1;
	if (!opts.loop && nextIdx >= slides.length) {
		return;
	}
	gotoIndex(slider, nextIdx, opts);
}

function prev(slider, opts) {
	const slides = getSlides(slider);
	if (!slides.length) {
		return;
	}
	const current = Number(slider.dataset.activeIndex || '0');
	const nextIdx = current - 1;
	if (!opts.loop && nextIdx < 0) {
		return;
	}
	gotoIndex(slider, nextIdx, opts);
}

function buildNav(slider, opts) {
	const wrapper = ensureWrapper(slider) || slider;
	// Reuse if present
	let nav = wrapper.querySelector('.slider-nav-buttons');
	if (!nav) {
		nav = document.createElement('div');
		nav.classList.add(
			'slider-nav-buttons',
			'horizontal-scroller-nav-buttons'
		);
		nav.style.position = 'absolute';
		nav.style.display = 'flex';
		nav.style.gap = '4px';
		nav.style.pointerEvents = 'auto';
		nav.style.zIndex = '1000';
		wrapper.appendChild(nav);

		// In editor, prevent block selection/focus when interacting with nav
		if (isBlockEditor()) {
			const swallow = (e) => {
				e.preventDefault();
				e.stopPropagation();
			};
			nav.addEventListener('mousedown', swallow, true);
			nav.addEventListener('mouseup', swallow, true);
			// Do not stop click at capture; button handlers need to run. Buttons
			// themselves stopPropagation in their own handlers.
			nav.addEventListener('focusin', swallow, true);
			nav.setAttribute('tabindex', '-1');
		}

		if (slider.classList.contains('slider-navigation')) {
			const prevBtn = document.createElement('button');
			prevBtn.type = 'button';
			prevBtn.classList.add('is-horizontal-scroll-btn', 'is-slider-prev');
			prevBtn.setAttribute('aria-label', 'Previous slide');
			prevBtn.innerHTML =
				'<span class="material-symbols-outlined">' +
				'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
				'<path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';
			prevBtn.addEventListener('click', (e) => {
				e.preventDefault();
				e.stopPropagation();
				prev(slider, opts);
				if (slider._autoTimer) {
					restartAuto(slider, opts);
				}
			});

			const nextBtn = document.createElement('button');
			nextBtn.type = 'button';
			nextBtn.classList.add('is-horizontal-scroll-btn', 'is-slider-next');
			nextBtn.setAttribute('aria-label', 'Next slide');
			nextBtn.innerHTML =
				'<span class="material-symbols-outlined">' +
				'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
				'<path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';
			nextBtn.addEventListener('click', (e) => {
				e.preventDefault();
				e.stopPropagation();
				next(slider, opts);
				if (slider._autoTimer) {
					restartAuto(slider, opts);
				}
			});

			nav.appendChild(prevBtn);
			if (
				slider.classList.contains('slider-auto') &&
				!slider.classList.contains('slider-hide-pause-button')
			) {
				const pauseBtn = document.createElement('button');
				pauseBtn.type = 'button';
				pauseBtn.classList.add(
					'is-horizontal-scroll-btn',
					'is-slider-pause'
				);
				pauseBtn.setAttribute('aria-label', 'Pause auto-slide');
				pauseBtn.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
				pauseBtn.addEventListener('click', (e) => {
					e.preventDefault();
					e.stopPropagation();
					if (slider._paused) {
						slider._paused = false;
						pauseBtn.setAttribute('aria-label', 'Pause auto-slide');
						pauseBtn.innerHTML =
							'<span class="material-symbols-outlined">' +
							'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
							'<path fill="#ffffff" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
						restartAuto(slider, opts);
					} else {
						slider._paused = true;
						pauseBtn.setAttribute(
							'aria-label',
							'Resume auto-slide'
						);
						pauseBtn.innerHTML =
							'<span class="material-symbols-outlined">' +
							'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
							'<path fill="#ffffff" d="M320-720v480l400-240-400-240Z"/></svg></span>';
						stopAuto(slider);
					}
				});
				nav.appendChild(pauseBtn);
			}
			nav.appendChild(nextBtn);
		}
	}
	// Ensure nav interactive in runtime; slides are non-interactive in editor preview
	nav.style.pointerEvents = 'auto';
	return nav;
}

function startAuto(slider, opts) {
	if (!slider.classList.contains('slider-auto') || slider._paused) {
		return;
	}
	const interval = parseInt(
		slider.getAttribute('data-slider-interval') || '4000',
		10
	);
	stopAuto(slider);
	slider._autoTimer = setInterval(() => next(slider, opts), interval);
}

function stopAuto(slider) {
	if (slider._autoTimer) {
		clearInterval(slider._autoTimer);
	}
	slider._autoTimer = null;
}

function restartAuto(slider, opts) {
	stopAuto(slider);
	startAuto(slider, opts);
}

function setHeight(slider) {
	const hAttr = slider.getAttribute('data-slider-height') || '';
	if (hAttr.trim()) {
		slider.style.height = hAttr;
		return;
	}
	const header = document.querySelector('header.site-header');
	const headerH = header ? header.offsetHeight : 0;
	slider.style.height = `calc(100svh - ${headerH}px)`;
}

function initOneSlider(slider) {
	if (slider.dataset._sliderInit === 'true') {
		return;
	}
	// Editor: only run in Preview mode
	if (isBlockEditor() && !slider.classList.contains('slider-preview-mode')) {
		return;
	}
	// Must be the slider style
	if (!slider.classList.contains('is-style-slider')) {
		return;
	}

	setHeight(slider);
	mirrorScrollerStyleClassesForButtons(slider);

	const loop = slider.classList.contains('slider-loop');
	const transitionMs = parseInt(
		slider.getAttribute('data-slider-transition') || '500',
		10
	);
	const disablePointer = isBlockEditor(); // in editor preview, block slide edits
	const opts = { loop, transitionMs, disablePointer };

	// Stacking for fade
	slider.classList.add('slider-runtime-active');
	slider.style.position = 'relative';
	slider.style.overflow = 'hidden';
	getSlides(slider).forEach((el) => {
		el.style.position = 'absolute';
		el.style.inset = '0';
		el.style.width = '100%';
		el.style.height = '100%';
		el.style.opacity = '0';
	});
	gotoIndex(slider, 0, opts);
	// Guard against stuck mid-transition when editor focus changes
	getSlides(slider).forEach((el) => {
		el.addEventListener('transitionend', () => clampState(slider, opts));
	});

	// Keep transitions simple; rely on mutation observer + transitionend clamp
	// rather than resetting transitions on focus.
	// In the editor, selection/DOM churn can recreate inner wrappers.
	// Watch the immediate slide container and re-apply the layout if needed.
	if (isBlockEditor()) {
		const root = getSlideContainer(slider);
		if (root && !slider._childWatcher) {
			const childMo = new window.MutationObserver(() => {
				// Re-assert stacking + active slide state
				getSlides(slider).forEach((el) => {
					el.style.position = 'absolute';
					el.style.inset = '0';
					el.style.width = '100%';
					el.style.height = '100%';
				});
				clampState(slider, opts);
			});
			childMo.observe(root, { childList: true });
			slider._childWatcher = childMo;
		}
	}

	buildNav(slider, opts);

	// Auto only when configured; pause-on-hover if set
	if (slider.classList.contains('slider-auto')) {
		if (isBlockEditor()) {
			startAuto(slider, opts);
		} else {
			const io = new window.IntersectionObserver(
				(entries) => {
					entries.forEach((e) => {
						if (e.isIntersecting) {
							startAuto(slider, opts);
						} else {
							stopAuto(slider);
						}
					});
				},
				{ threshold: 0.3 }
			);
			io.observe(slider);
		}

		if (slider.classList.contains('slider-pause-on-hover')) {
			slider.addEventListener('mouseenter', () => stopAuto(slider));
			slider.addEventListener('mouseleave', () =>
				startAuto(slider, opts)
			);
		}
	}

	slider.dataset._sliderInit = 'true';
}

function teardownSlider(slider) {
	if (slider.dataset._sliderInit !== 'true') {
		return;
	}
	stopAuto(slider);
	const wrapper =
		slider.parentNode &&
		slider.parentNode.classList.contains('slider-wrapper')
			? slider.parentNode
			: null;
	const container = wrapper || slider;
	const nav = container.querySelector('.slider-nav-buttons');
	if (nav) {
		nav.remove();
	}

	slider.classList.remove('slider-runtime-active');
	slider.style.height = '';
	slider.style.position = '';
	slider.style.overflow = '';
	getSlides(slider).forEach((el) => {
		el.classList.remove('slide-active');
		el.style.position = '';
		el.style.inset = '';
		el.style.width = '';
		el.style.height = '';
		el.style.opacity = '';
		el.style.transition = '';
		el.style.pointerEvents = '';
	});

	// In editor keep wrapper between toggles; remove on front-end
	if (!isBlockEditor()) {
		removeWrapper(slider);
	}

	delete slider.dataset._sliderInit;
	delete slider.dataset.activeIndex;
	// no-op: stabilise listeners removed (we clamp via observers)
	if (slider._childWatcher) {
		try {
			slider._childWatcher.disconnect();
		} catch (e) {}
		slider._childWatcher = null;
	}
}

function shouldRun(slider) {
	if (!slider.classList.contains('is-style-slider')) {
		return false;
	}
	if (isBlockEditor()) {
		return slider.classList.contains('slider-preview-mode');
	}
	return true;
}

function armOne(slider) {
	// Observe class changes to toggle runtime in editor
	if (isBlockEditor() && !slider._classWatcher) {
		const mo = new window.MutationObserver(() => {
			if (shouldRun(slider)) {
				initOneSlider(slider);
			} else {
				teardownSlider(slider);
			}
		});
		mo.observe(slider, { attributes: true, attributeFilter: ['class'] });
		slider._classWatcher = mo;
	}
	// Initial sync
	if (shouldRun(slider)) {
		initOneSlider(slider);
	} else {
		teardownSlider(slider);
	}
}

function initAll() {
	document.querySelectorAll('.is-style-slider').forEach(armOne);
}

document.addEventListener('DOMContentLoaded', initAll);
window.addEventListener('load', initAll);

if (isBlockEditor()) {
	const bodyObserver = new window.MutationObserver((records) => {
		for (const rec of records) {
			for (const node of rec.addedNodes) {
				if (
					node.nodeType === 1 &&
					node.classList &&
					node.classList.contains('is-style-slider')
				) {
					armOne(node);
				}
			}
		}
	});
	bodyObserver.observe(document.body, { childList: true, subtree: true });
}
