/*
 * FlexLine Fading Slider Runtime
 * - Idempotent initializer for Group/Stack blocks with .is-style-slider
 * - Works on front end and in Block Editor Preview (requires .slider-preview-mode)
 */

(() => {
	'use strict';

	const SLIDER_SELECTOR = '.is-style-slider';
	const WRAPPER_CLASS = 'slider-wrapper';
	const RUNTIME_CLASS = 'slider-runtime-active';
	const NAV_CLASS = 'slider-nav-buttons';
	const BTN_CLASS = 'is-slider-btn';
	const BTN_PREV = 'is-slider-prev';
	const BTN_NEXT = 'is-slider-next';
	const BTN_PAUSE = 'is-slider-pause';

	const isEditor = () =>
		!!document.body &&
		(document.body.classList.contains('block-editor-page') ||
			document.querySelector('.editor-styles-wrapper'));

	const shouldRun = (slider) =>
		isEditor() ? slider.classList.contains('slider-preview-mode') : true;

	const debounce = (fn, delay) => {
		let t;
		return (...args) => {
			clearTimeout(t);
			t = setTimeout(() => fn(...args), delay);
		};
	};

	function getSlideContainer(slider) {
		if (isEditor()) {
			const c = slider.querySelector(
				':scope > .block-editor-block-list__layout'
			);
			return c || slider;
		}
		return slider;
	}

	function getSlides(slider) {
		const container = getSlideContainer(slider);
		const children = Array.from(container.children || []);
		return children.filter(
			(el) =>
				el &&
				el.nodeType === 1 &&
				!el.classList.contains(NAV_CLASS) &&
				!el.classList.contains('block-editor-default-block-appender') &&
				!el.classList.contains('block-list-appender')
		);
	}

	function ensureWrapper(slider) {
		let wrapper = slider.parentElement;
		if (!wrapper || !wrapper.classList.contains(WRAPPER_CLASS)) {
			wrapper = document.createElement('div');
			wrapper.className = WRAPPER_CLASS;
			if (slider.parentNode) {
				slider.parentNode.insertBefore(wrapper, slider);
			}
			wrapper.appendChild(slider);
		}
		let nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
		if (!nav) {
			nav = document.createElement('div');
			nav.className = NAV_CLASS;
			wrapper.appendChild(nav);
		}
		return wrapper;
	}

	function removeWrapper(slider) {
		const wrapper = slider.parentElement;
		if (wrapper && wrapper.classList.contains(WRAPPER_CLASS)) {
			const parent = wrapper.parentNode;
			if (parent) {
				parent.insertBefore(slider, wrapper);
			}
			const nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
			if (nav) {
				nav.remove();
			}
			wrapper.remove();
		} else if (slider.parentElement) {
			// Remove stray nav in same container if present
			const nav = slider.parentElement.querySelector(
				':scope > .' + NAV_CLASS
			);
			if (nav) {
				nav.remove();
			}
		}
	}

	function readNumericOption(
		wrapper,
		slider,
		cssVarName,
		dataAttr,
		defaultValue
	) {
		// Try CSS var on wrapper, then on slider element
		const cssEls = [wrapper, slider];
		for (const el of cssEls) {
			if (!el) {
				continue;
			}
			const cs = window.getComputedStyle(el);
			const raw = (cs.getPropertyValue(cssVarName) || '').trim();
			if (raw) {
				const n = parseInt(raw, 10);
				if (!Number.isNaN(n)) {
					return n;
				}
			}
		}
		const sources = [wrapper, slider];
		for (const el of sources) {
			if (el && el.hasAttribute('data-' + dataAttr)) {
				const n = parseInt(
					el.getAttribute('data-' + dataAttr) || '',
					10
				);
				if (!Number.isNaN(n)) {
					return n;
				}
			}
		}
		return defaultValue;
	}

	function readBooleanOption(
		wrapper,
		slider,
		cssVarName,
		dataAttr,
		defaultValue
	) {
		// Try CSS var on wrapper, then on slider element
		const cssEls = [wrapper, slider];
		for (const el of cssEls) {
			if (!el) {
				continue;
			}
			const cs = window.getComputedStyle(el);
			let v = (cs.getPropertyValue(cssVarName) || '').trim();
			if (v) {
				v = v.toLowerCase();
				if (v === '0' || v === 'false' || v === 'no' || v === 'off') {
					return false;
				}
				if (v === '1' || v === 'true' || v === 'yes' || v === 'on') {
					return true;
				}
			}
		}
		const sources = [wrapper, slider];
		for (const el of sources) {
			if (el && el.hasAttribute('data-' + dataAttr)) {
				const raw = (
					el.getAttribute('data-' + dataAttr) || ''
				).toLowerCase();
				if (
					raw === '0' ||
					raw === 'false' ||
					raw === 'no' ||
					raw === 'off'
				) {
					return false;
				}
				if (
					raw === '1' ||
					raw === 'true' ||
					raw === 'yes' ||
					raw === 'on'
				) {
					return true;
				}
			}
		}
		return defaultValue;
	}

	function updateOptionsFromVars(slider) {
		const wrapper = slider._wrapper || slider.parentElement;
		slider._transitionMs = readNumericOption(
			wrapper,
			slider,
			'--slider-transition-ms',
			'slider-transition-ms',
			500
		);
		slider._intervalMs = readNumericOption(
			wrapper,
			slider,
			'--slider-interval-ms',
			'slider-interval-ms',
			4000
		);
		slider._loop = readBooleanOption(
			wrapper,
			slider,
			'--slider-loop',
			'slider-loop',
			true
		);
		slider._pauseOnHover = readBooleanOption(
			wrapper,
			slider,
			'--slider-pause-on-hover',
			'slider-pause-on-hover',
			true
		);
		slider._showPauseButton = readBooleanOption(
			wrapper,
			slider,
			'--slider-show-pause',
			'slider-show-pause',
			true
		);
		slider._showNav = readBooleanOption(
			wrapper,
			slider,
			'--slider-nav',
			'slider-nav',
			true
		);

		// Class fallbacks (front end resiliency)
		const hasClass = (cls) =>
			slider.classList && slider.classList.contains(cls);
		if (!(slider._intervalMs > 0) && hasClass('slider-auto')) {
			slider._intervalMs = 4000;
		}
		if (!slider._pauseOnHover && hasClass('slider-pause-on-hover')) {
			slider._pauseOnHover = true;
		}
		if (
			!slider._showPauseButton &&
			hasClass('slider-auto') &&
			!hasClass('slider-hide-pause-button')
		) {
			slider._showPauseButton = true;
		}
		if (!slider._showNav && hasClass('slider-navigation')) {
			slider._showNav = true;
		}
	}

	function applyStacking(slider) {
		const slides = getSlides(slider);
		slider._slides = slides;
		// CSS handles positioning and transitions; JS toggles classes only
		slides.forEach((el, idx) => {
			el.classList.remove('is-slide-active', 'is-slide-prev');
			if (idx === (slider._activeIndex || 0)) {
				el.classList.add('is-slide-active');
			}
		});
	}

	function enableTransitions(slider) {
		const slides = slider._slides || getSlides(slider);
		void slides; // transitions are driven by CSS
	}

	function clampState(slider) {
		const slides = slider._slides || getSlides(slider);
		const count = slides.length;
		if (count === 0) {
			return;
		}
		if (
			typeof slider._activeIndex !== 'number' ||
			Number.isNaN(slider._activeIndex)
		) {
			slider._activeIndex = 0;
		}
		if (slider._activeIndex >= count) {
			slider._activeIndex = slider._loop ? 0 : count - 1;
		}
		if (slider._activeIndex < 0) {
			slider._activeIndex = slider._loop ? count - 1 : 0;
		}
		slides.forEach((el, idx) => {
			el.classList.remove('is-slide-active', 'is-slide-prev');
			const on = idx === slider._activeIndex;
			const isPrev =
				typeof slider._prevIndex === 'number' &&
				idx === slider._prevIndex;
			if (on) {
				el.classList.add('is-slide-active');
			}
			if (isPrev) {
				el.classList.add('is-slide-prev');
			}
		});
	}

	function goTo(slider, idx, fromNav = true) {
		const slides = slider._slides || getSlides(slider);
		const count = slides.length;
		if (count <= 1) {
			return;
		}
		let next = idx;
		if (next >= count) {
			next = slider._loop ? 0 : count - 1;
		}
		if (next < 0) {
			next = slider._loop ? count - 1 : 0;
		}
		slider._prevIndex = slider._activeIndex;
		slider._activeIndex = next;
		clampState(slider);
		if (fromNav) {
			restartAuto(slider);
		}
	}

	function nextSlide(slider, fromNav = true) {
		goTo(slider, (slider._activeIndex || 0) + 1, fromNav);
	}

	function prevSlide(slider) {
		goTo(slider, (slider._activeIndex || 0) - 1, true);
	}

	function startAuto(slider) {
		stopAuto(slider);
		if (!(slider._intervalMs > 0)) {
			return;
		}
		slider._autoTimer = setInterval(() => {
			if (slider._isPaused || slider._hoverPaused) {
				return;
			}
			nextSlide(slider, false);
		}, slider._intervalMs);
	}

	function stopAuto(slider) {
		if (slider._autoTimer) {
			clearInterval(slider._autoTimer);
			slider._autoTimer = null;
		}
	}

	function restartAuto(slider) {
		if (isEditor()) {
			startAuto(slider);
			return;
		}
		if (slider._isInView) {
			startAuto(slider);
		}
	}

	function setupIntersectionObserver(slider) {
		if (slider._io) {
			slider._io.disconnect();
		}
		slider._isInView = false;
		const wrapper = slider._wrapper || slider.parentElement;
		const IO = window.IntersectionObserver;
		if (typeof IO !== 'function') {
			// Fallback: if IO is unavailable, consider it always in view
			slider._isInView = true;
			startAuto(slider);
			return;
		}
		const io = new IO(
			(entries) => {
				for (const ent of entries) {
					if (ent.isIntersecting) {
						slider._isInView = true;
						startAuto(slider);
					} else {
						slider._isInView = false;
						stopAuto(slider);
					}
				}
			},
			{ root: null, threshold: 0.1 }
		);
		io.observe(wrapper);
		slider._io = io;
	}

	function attachHoverPause(slider) {
		const wrapper = slider._wrapper || slider.parentElement;
		const onEnter = (e) => {
			e.preventDefault();
			slider._hoverPaused = true;
		};
		const onLeave = () => {
			slider._hoverPaused = false;
		};
		wrapper.addEventListener('mouseenter', onEnter);
		wrapper.addEventListener('mouseleave', onLeave);
		slider._onHoverEnter = onEnter;
		slider._onHoverLeave = onLeave;
	}

	function computeAndSetEffectiveHeight(slider) {
		const wrapper = slider._wrapper || slider.parentElement;
		const csWrapper = wrapper ? window.getComputedStyle(wrapper) : null;
		const explicitHeight = csWrapper
			? (csWrapper.getPropertyValue('--slider-height') || '').trim()
			: '';
		if (explicitHeight) {
			// Height provided – clear default so the explicit value wins and live-updates.
			if (wrapper) {
				wrapper.style.removeProperty('--slider-height-default');
			}
			return;
		}
		// No explicit height, provide a robust default based on header size
		const header = document.querySelector('header.site-header');
		const h = header ? header.offsetHeight : 0;
		if (wrapper) {
			wrapper.style.setProperty(
				'--slider-height-default',
				`calc(100svh - ${h}px)`
			);
		}
	}

	function attachResize(slider) {
		const onResize = () => computeAndSetEffectiveHeight(slider);
		window.addEventListener('resize', onResize);
		slider._onResize = onResize;
	}

	function attachTransitionClamp(slider) {
		const slides = slider._slides || getSlides(slider);
		const onTe = (e) => {
			if (e && e.propertyName && e.propertyName !== 'opacity') {
				return;
			}
			slider._prevIndex = null;
			clampState(slider);
		};
		slides.forEach((el) => {
			el.addEventListener('transitionend', onTe);
		});
		slider._onTransitionEnd = onTe;
	}

	function detachTransitionClamp(slider) {
		if (!slider._onTransitionEnd) {
			return;
		}
		const slides = slider._slides || getSlides(slider);
		slides.forEach((el) => {
			el.removeEventListener('transitionend', slider._onTransitionEnd);
		});
		slider._onTransitionEnd = null;
	}

	function attachEditorChildWatcher(slider) {
		if (!isEditor()) {
			return;
		}
		const container = getSlideContainer(slider);
		const mo = new window.MutationObserver(() => {
			applyStacking(slider);
			clampState(slider);
		});
		mo.observe(container, { childList: true, subtree: false });
		slider._childWatcher = mo;
	}

	function attachVarsObserver(slider) {
		const wrapper = slider._wrapper || slider.parentElement;
		if (!wrapper) {
			return;
		}
		const obs = new window.MutationObserver(() => {
			const prevInterval = slider._intervalMs;
			const prevTransition = slider._transitionMs;
			const prevShowPause = slider._showPauseButton;
			const prevShowNav = slider._showNav;
			updateOptionsFromVars(slider);
			if (slider._transitionMs !== prevTransition) {
				applyStacking(slider);
				clampState(slider);
			}
			if (slider._intervalMs !== prevInterval) {
				restartAuto(slider);
			}
			if (
				slider._showPauseButton !== prevShowPause ||
				slider._showNav !== prevShowNav
			) {
				buildNav(slider); // show/hide pause button
			}
		});
		obs.observe(wrapper, { attributes: true, attributeFilter: ['style'] });
		slider._varsObserver = obs;
	}

	function attachVisibilityHandler(slider) {
		const onVis = () => {
			if (document.hidden) {
				stopAuto(slider);
			} else {
				restartAuto(slider);
			}
		};
		document.addEventListener('visibilitychange', onVis);
		slider._onVis = onVis;
	}

	function buildNav(slider) {
		const wrapper = slider._wrapper || ensureWrapper(slider);
		let nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
		if (!nav) {
			nav = document.createElement('div');
			nav.className = NAV_CLASS;
			wrapper.appendChild(nav);
		}

		// Toggle entire nav visibility via option
		nav.style.display = slider._showNav ? '' : 'none';

		// In editor, swallow selection-related events so buttons stay clickable
		if (isEditor() && !slider._navSwallow) {
			const swallow = (e) => {
				e.preventDefault();
				e.stopPropagation();
			};
			nav.addEventListener('mousedown', swallow, true);
			slider._navSwallow = swallow;
		}

		// Prev button
		let prev = nav.querySelector(':scope > .' + BTN_CLASS + '.' + BTN_PREV);
		if (!prev) {
			prev = document.createElement('button');
			prev.type = 'button';
			prev.className = BTN_CLASS + ' ' + BTN_PREV;
			prev.setAttribute('aria-label', 'Previous');
			prev.innerHTML =
				'<span class="material-symbols-outlined">' +
				'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
				'<path fill="currentColor" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';
			nav.appendChild(prev);
		}
		prev.onclick = (e) => {
			e.preventDefault();
			e.stopPropagation();
			prevSlide(slider);
		};
		slider._btnPrev = prev;

		// Pause button (optional)
		let pause = nav.querySelector(
			':scope > .' + BTN_CLASS + '.' + BTN_PAUSE
		);
		if (slider._intervalMs > 0 && slider._showPauseButton) {
			if (!pause) {
				pause = document.createElement('button');
				pause.type = 'button';
				pause.className = BTN_CLASS + ' ' + BTN_PAUSE;
				pause.setAttribute('aria-label', 'Pause/Play');
				pause.innerHTML =
					'<span class="material-symbols-outlined">' +
					'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
					'<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
				nav.appendChild(pause);
			}
			pause.style.display = '';
			pause.onclick = (e) => {
				e.preventDefault();
				e.stopPropagation();
				slider._isPaused = !slider._isPaused;
				// Reflect state via aria-pressed and swap icon
				pause.setAttribute(
					'aria-pressed',
					slider._isPaused ? 'true' : 'false'
				);
				pause.innerHTML = slider._isPaused
					? '<span class="material-symbols-outlined">' +
						'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
						'<path fill="currentColor" d="M320-720v480l400-240-400-240Z"/></svg></span>'
					: '<span class="material-symbols-outlined">' +
						'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
						'<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
				restartAuto(slider);
			};
			slider._btnPause = pause;
		} else if (pause) {
			pause.style.display = 'none';
		}

		// Next button
		let next = nav.querySelector(':scope > .' + BTN_CLASS + '.' + BTN_NEXT);
		if (!next) {
			next = document.createElement('button');
			next.type = 'button';
			next.className = BTN_CLASS + ' ' + BTN_NEXT;
			next.setAttribute('aria-label', 'Next');
			next.innerHTML =
				'<span class="material-symbols-outlined">' +
				'<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' +
				'<path fill="currentColor" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';
			nav.appendChild(next);
		}
		next.onclick = (e) => {
			e.preventDefault();
			e.stopPropagation();
			nextSlide(slider, true);
		};
		slider._btnNext = next;

		// Editor: keep nav from taking focus to avoid scroll jumps
		if (isEditor()) {
			prev.tabIndex = -1;
			next.tabIndex = -1;
			if (slider._btnPause) {
				slider._btnPause.tabIndex = -1;
			}
			nav.setAttribute('aria-hidden', 'true');
		}
	}
	// Prevent editor interactions (double‑click, drag/drop) from hijacking Preview
	// (Preview guards removed — z-index and pointer-events manage interactions)

	function initOneSlider(slider) {
		// Ensure clean start
		removeWrapper(slider);
		const wrapper = ensureWrapper(slider);
		slider._wrapper = wrapper;
		updateOptionsFromVars(slider);

		// Activate runtime
		slider.classList.add(RUNTIME_CLASS);

		// Slides and stacking
		if (typeof slider._activeIndex !== 'number') {
			slider._activeIndex = 0;
		}
		applyStacking(slider);
		clampState(slider);

		// After first paint, enable transitions to avoid fade flash
		if (typeof window !== 'undefined' && window.requestAnimationFrame) {
			window.requestAnimationFrame(() => enableTransitions(slider));
		} else {
			setTimeout(() => enableTransitions(slider), 0);
		}

		// Build navigation
		buildNav(slider);

		// Height
		computeAndSetEffectiveHeight(slider);
		attachResize(slider);

		// Transitions and observers
		attachTransitionClamp(slider);
		attachVarsObserver(slider);
		if (isEditor()) {
			attachEditorChildWatcher(slider);
			// Autoplay starts immediately in editor preview
			if (slider._intervalMs > 0) {
				startAuto(slider);
			}
		} else if (slider._intervalMs > 0) {
			// Front end autoplay gated by IntersectionObserver
			setupIntersectionObserver(slider);
		}

		// Hover pause
		if (slider._intervalMs > 0 && slider._pauseOnHover) {
			attachHoverPause(slider);
		}

		// Visibility handling
		attachVisibilityHandler(slider);
	}

	function clearInlineSlideStyles(slider) {
		const slides = slider._slides || getSlides(slider);
		slides.forEach((el) => {
			el.style.opacity = '';
			el.style.zIndex = '';
			el.classList.remove('is-slide-active', 'is-slide-prev');
		});
	}

	function teardownSlider(slider) {
		// Stop timers and observers
		stopAuto(slider);
		if (slider._io) {
			slider._io.disconnect();
			slider._io = null;
		}
		if (slider._childWatcher) {
			slider._childWatcher.disconnect();
			slider._childWatcher = null;
		}
		if (slider._varsObserver) {
			slider._varsObserver.disconnect();
			slider._varsObserver = null;
		}

		// Events
		if (slider._onResize) {
			window.removeEventListener('resize', slider._onResize);
			slider._onResize = null;
		}
		if (slider._onHoverEnter) {
			const wrapper = slider._wrapper || slider.parentElement;
			if (wrapper) {
				wrapper.removeEventListener('mouseenter', slider._onHoverEnter);
				wrapper.removeEventListener('mouseleave', slider._onHoverLeave);
			}
			slider._onHoverEnter = null;
			slider._onHoverLeave = null;
		}
		if (slider._onVis) {
			document.removeEventListener('visibilitychange', slider._onVis);
			slider._onVis = null;
		}
		detachTransitionClamp(slider);

		// Clear inline styles
		clearInlineSlideStyles(slider);
		if (slider._wrapper) {
			slider._wrapper.style.removeProperty('--slider-height-default');
		}

		// Remove runtime class
		slider.classList.remove(RUNTIME_CLASS);

		// Remove nav listeners
		const wrapper = slider._wrapper || slider.parentElement;
		const nav = wrapper
			? wrapper.querySelector(':scope > .' + NAV_CLASS)
			: null;
		if (nav && slider._navSwallow) {
			nav.removeEventListener('mousedown', slider._navSwallow, true);
			nav.removeEventListener('mouseup', slider._navSwallow, true);
			// only mousedown was added
			slider._navSwallow = null;
		}
		if (slider._btnPrev) {
			slider._btnPrev.onclick = null;
		}
		if (slider._btnNext) {
			slider._btnNext.onclick = null;
		}
		if (slider._btnPause) {
			slider._btnPause.onclick = null;
		}
		slider._btnPrev = null;
		slider._btnNext = null;
		slider._btnPause = null;

		// Remove wrapper/nav
		removeWrapper(slider);
		slider._wrapper = null;
		slider._slides = null;
	}

	function initSliders() {
		const sliders = Array.from(document.querySelectorAll(SLIDER_SELECTOR));
		sliders.forEach((slider) => {
			const wants = shouldRun(slider);
			const running = slider.classList.contains(RUNTIME_CLASS);

			if (running && wants) {
				// Already running and should continue: refresh options/stacking/nav only
				slider._wrapper =
					slider._wrapper && slider._wrapper.isConnected
						? slider._wrapper
						: ensureWrapper(slider);
				const prevInterval = slider._intervalMs;
				updateOptionsFromVars(slider);
				applyStacking(slider);
				clampState(slider);
				buildNav(slider);
				if (slider._intervalMs !== prevInterval) {
					restartAuto(slider);
				}
				return;
			}
			if (running && !wants) {
				teardownSlider(slider);
				return;
			}
			if (!running && wants) {
				initOneSlider(slider);
				return;
			}
			// Not running and not wanted: ensure clean DOM
			removeWrapper(slider);
			clearInlineSlideStyles(slider);
			slider.classList.remove(RUNTIME_CLASS);
			slider.style.removeProperty('--slider-height-effective');
		});

		// Also handle orphaned wrappers whose child lost the slider class
		const wrappers = Array.from(
			document.querySelectorAll('.slider-wrapper')
		);
		wrappers.forEach((wrap) => {
			const child = wrap.firstElementChild;
			if (!child) {
				return;
			}
			// If the child is no longer a slider or shouldn't run, teardown/unwrap
			if (
				!child.classList.contains('is-style-slider') ||
				!shouldRun(child)
			) {
				teardownSlider(child);
			}
		});
	}

	// Initialize on DOM ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSliders);
	} else {
		initSliders();
	}

	// Watch for editor mode toggles and style/class changes
	const rerunInit = debounce(initSliders, 80);
	const bodyObserver = new window.MutationObserver((records) => {
		let relevant = false;
		for (const rec of records) {
			if (rec.type === 'attributes' && rec.attributeName === 'class') {
				const t = rec.target;
				if (
					t.classList &&
					(t.classList.contains('is-style-slider') ||
						t.classList.contains('slider-preview-mode'))
				) {
					relevant = true;
					break;
				}
			}
			if (rec.type === 'childList') {
				for (const n of rec.addedNodes) {
					if (
						n.nodeType === 1 &&
						n.classList &&
						n.classList.contains('is-style-slider')
					) {
						relevant = true;
						break;
					}
				}
				if (relevant) {
					break;
				}
			}
		}
		if (relevant) {
			rerunInit();
		}
	});
	bodyObserver.observe(document.body, {
		childList: true,
		subtree: true,
		attributes: true,
		attributeFilter: ['class'],
	});

	// Editor: listen for live CSS var updates from controls
	document.addEventListener('flexline-slider-vars-updated', (e) => {
		const sel = e && e.detail && e.detail.selector;
		if (sel) {
			const scope = document.querySelector(sel);
			const sliders = scope
				? Array.from(scope.querySelectorAll(SLIDER_SELECTOR))
				: [];
			if (sliders.length) {
				sliders.forEach((slider) => {
					if (!shouldRun(slider)) {
						return;
					}
					const prevInterval = slider._intervalMs;
					updateOptionsFromVars(slider);
					computeAndSetEffectiveHeight(slider);
					applyStacking(slider);
					clampState(slider);
					buildNav(slider);
					if (slider._intervalMs !== prevInterval) {
						restartAuto(slider);
					}
				});
				return;
			}
		}
		// Fallback: refresh all sliders
		rerunInit();
	});
})();
