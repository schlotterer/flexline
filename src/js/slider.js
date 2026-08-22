/*
 * FlexLine Fading Slider Runtime
 *
 * How this runtime connects to styles and controls
 * ------------------------------------------------
 * - Activation is class‑driven:
 *   - The Group/Stack block gets .is-style-slider from the controls layer.
 *   - In the editor, Preview mode adds .slider-preview-mode; runtime only runs in Preview.
 *   - When the runtime is running it sets .slider-runtime-active on the slider element.
 *
 * - Slides are the direct children of the slider element (or the editor inner layout wrapper).
 *   CSS (slider-variations.scss) absolutely stacks those children and animates opacity only
 *   while .slider-runtime-active is present.
 *   JS toggles only two classes on slides:
 *     .is-slide-active (visible, z-index:2, pointer-events:auto)
 *     .is-slide-prev   (previous slide, z-index:1 during cross‑fade)
 *
 * - Dynamic numbers (e.g., transition/interval/height) are read from CSS variables first
 *   (set inline on the main slider wrapper by the controls HOC), then data-* fallbacks.
 *   No inline layout styles are written by the runtime — only classes or timers.
 *
 * - Teardown is symmetric and idempotent. It clears timers/observers/listeners, removes
 *   slide state classes and unwraps the temporary .slider-wrapper + nav container.
 */

import { __, sprintf } from '@wordpress/i18n';

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
	const REDUCED_MOTION_QUERY = '(prefers-reduced-motion: reduce)';

	const getOwnerDocument = (node) => node?.ownerDocument || document;

	// Editor Preview can live in editor-canvas. Resolve window/document from
	// the slider element so observers, timers, and matchMedia use that context.
	const getOwnerWindow = (node) => {
		const doc = getOwnerDocument(node);
		return doc.defaultView || window;
	};

	const getRootDocument = (root) => {
		if (root?.nodeType === 9) {
			return root;
		}
		return root?.ownerDocument || document;
	};

	const getRootWindow = (root) => {
		const doc = getRootDocument(root);
		return doc.defaultView || window;
	};

	const querySliderElements = (root, selector) => {
		const searchRoot = root || document;
		const found = Array.from(searchRoot.querySelectorAll(selector));
		if (
			searchRoot.nodeType === 1 &&
			typeof searchRoot.matches === 'function' &&
			searchRoot.matches(selector)
		) {
			found.unshift(searchRoot);
		}
		return found;
	};

	const isSliderElement = (root) =>
		root?.nodeType === 1 &&
		root.classList &&
		(root.classList.contains('is-style-slider') ||
			root.classList.contains(RUNTIME_CLASS) ||
			root.parentElement?.classList.contains(WRAPPER_CLASS));

	const prefersReducedMotion = (slider) => {
		const win = getOwnerWindow(slider);
		return win.matchMedia && win.matchMedia(REDUCED_MOTION_QUERY).matches;
	};

	const isEditor = (root = document) => {
		const doc = getRootDocument(root);
		return (
			!!doc.body &&
			(doc.body.classList.contains('block-editor-page') ||
				doc.querySelector('.editor-styles-wrapper'))
		);
	};

	const shouldRun = (slider) =>
		isEditor(slider)
			? slider.classList.contains('slider-preview-mode')
			: true;

	const debounce = (fn, delay, root = document) => {
		let t;
		return (...args) => {
			const win = getRootWindow(root);
			win.clearTimeout(t);
			t = win.setTimeout(() => fn(...args), delay);
		};
	};

	/**
	 * Return the immediate container that holds slide children.
	 * In the editor, slides live inside the block list layout wrapper.
	 */

	function getSlideContainer(slider) {
		if (isEditor(slider)) {
			const c = slider.querySelector(
				':scope > .block-editor-block-list__layout'
			);
			return c || slider;
		}
		return slider;
	}

	function getSlides(slider) {
		/**
		 * Collect candidate slides from the container and filter out editor
		 * appenders and our nav container. This function should return only
		 * the real slide elements in document order.
		 */
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
		/**
		 * Ensure a .slider-wrapper exists around the slider element and a single
		 * sibling nav container. This wrapper is temporary and will be removed
		 * on teardown or when the feature is disabled.
		 */
		const doc = getOwnerDocument(slider);
		let wrapper = slider.parentElement;
		if (!wrapper || !wrapper.classList.contains(WRAPPER_CLASS)) {
			wrapper = doc.createElement('div');
			wrapper.className = WRAPPER_CLASS;
			if (slider.parentNode) {
				slider.parentNode.insertBefore(wrapper, slider);
			}
			wrapper.appendChild(slider);
		}
		let nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
		if (!nav) {
			nav = doc.createElement('div');
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
		/**
		 * Read a numeric option with the following precedence:
		 *  1) CSS custom property on wrapper/slider
		 *  2) data-* attribute on wrapper/slider
		 *  3) provided default
		 */
		// Try CSS var on wrapper, then on slider element
		const cssEls = [wrapper, slider];
		for (const el of cssEls) {
			if (!el) {
				continue;
			}
			const cs = getOwnerWindow(el).getComputedStyle(el);
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
			const cs = getOwnerWindow(el).getComputedStyle(el);
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
		/**
		 * Project the current index into slide state classes.
		 * CSS handles absolute stacking + transitions.
		 */
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

	// (Transitions declared in CSS; no JS needed.)

	function clampState(slider) {
		/**
		 * Clamp active index and toggle .is-slide-active / .is-slide-prev.
		 * This ensures exactly one visible slide, with the previous kept
		 * layered above during cross‑fade.
		 */
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
			el.setAttribute('aria-hidden', on ? 'false' : 'true');
			el.inert = !on;
		});
	}

	function goTo(slider, idx, fromNav = true) {
		/**
		 * Navigate to the given index (wrapping when loop is enabled).
		 * fromNav=false is used by autoplay to avoid resetting timers excessively.
		 */
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
			announceSlide(slider);
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
		/** Start/restart the autoplay timer (if interval > 0). */
		stopAuto(slider);
		if (!(slider._intervalMs > 0) || prefersReducedMotion(slider)) {
			return;
		}
		const win = getOwnerWindow(slider);
		slider._autoTimer = win.setInterval(() => {
			if (slider._isPaused || slider._hoverPaused) {
				return;
			}
			nextSlide(slider, false);
		}, slider._intervalMs);
		slider._autoTimerWindow = win;
	}

	function stopAuto(slider) {
		if (slider._autoTimer) {
			(slider._autoTimerWindow || getOwnerWindow(slider)).clearInterval(
				slider._autoTimer
			);
			slider._autoTimer = null;
			slider._autoTimerWindow = null;
		}
	}

	function announceSlide(slider) {
		if (!slider._liveRegion || !slider._slides?.length) {
			return;
		}
		slider._liveRegion.textContent = sprintf(
			// translators: 1: active slide number, 2: total slide count.
			__('Slide %1$d of %2$d', 'flexline'),
			(slider._activeIndex || 0) + 1,
			slider._slides.length
		);
	}

	function attachReducedMotionHandler(slider) {
		const win = getOwnerWindow(slider);
		if (!win.matchMedia) {
			return;
		}
		const mediaQuery = win.matchMedia(REDUCED_MOTION_QUERY);
		const onChange = () => {
			if (mediaQuery.matches) {
				stopAuto(slider);
			} else {
				restartAuto(slider);
			}
		};
		if (mediaQuery.addEventListener) {
			mediaQuery.addEventListener('change', onChange);
		} else if (mediaQuery.addListener) {
			mediaQuery.addListener(onChange);
		}
		slider._reducedMotionQuery = mediaQuery;
		slider._onReducedMotionChange = onChange;
	}

	function detachReducedMotionHandler(slider) {
		const mediaQuery = slider._reducedMotionQuery;
		const onChange = slider._onReducedMotionChange;
		if (!mediaQuery || !onChange) {
			return;
		}
		if (mediaQuery.removeEventListener) {
			mediaQuery.removeEventListener('change', onChange);
		} else if (mediaQuery.removeListener) {
			mediaQuery.removeListener(onChange);
		}
		slider._reducedMotionQuery = null;
		slider._onReducedMotionChange = null;
	}

	function restartAuto(slider) {
		if (isEditor(slider)) {
			startAuto(slider);
			return;
		}
		if (slider._isInView) {
			startAuto(slider);
		}
	}

	function setupIntersectionObserver(slider) {
		/**
		 * Front‑end only: start/stop autoplay based on viewport visibility.
		 */
		if (slider._io) {
			slider._io.disconnect();
		}
		slider._isInView = false;
		const wrapper = slider._wrapper || slider.parentElement;
		if (!wrapper || typeof wrapper.nodeType !== 'number') {
			return;
		}
		const IO = getOwnerWindow(slider).IntersectionObserver;
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
		const onEnter = () => {
			// No preventDefault here; it can interfere with editor selection.
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
		/**
		 * Provide a default height when no explicit --slider-height is set.
		 * The controls layer writes inline vars in the editor; on the front end
		 * we compute a default based on the header height.
		 */
		const wrapper = slider._wrapper || slider.parentElement;
		const win = getOwnerWindow(slider);
		const csWrapper = wrapper ? win.getComputedStyle(wrapper) : null;
		const explicitHeight = csWrapper
			? (csWrapper.getPropertyValue('--slider-height') || '').trim()
			: '';
		slider._hasExplicitHeight = !!explicitHeight;
		if (explicitHeight) {
			// Height provided – clear default so the explicit value wins and live-updates.
			if (wrapper) {
				wrapper.style.removeProperty('--slider-height-default');
			}
			return;
		}
		// No explicit height, provide a robust default based on header size
		const doc = getOwnerDocument(slider);
		const header = doc.querySelector('header.site-header');
		const h = header ? header.offsetHeight : 0;
		if (wrapper) {
			wrapper.style.setProperty(
				'--slider-height-default',
				`calc(100dvh - ${h}px)`
			);
		}
	}

	/**
	 * Lock a definite slider height so children using height:100% resolve reliably.
	 * Uses the larger of computed min-height and current box height.
	 *
	 * @param {HTMLElement} slider The slider root element.
	 */
	function lockSliderHeight(slider) {
		const cs = getOwnerWindow(slider).getComputedStyle(slider);
		const minH = parseFloat((cs.minHeight || '0').replace('px', '')) || 0;
		const boxH = slider.getBoundingClientRect().height || 0;
		const h = Math.max(minH, boxH);
		if (h > 0) {
			slider.style.height = Math.round(h) + 'px';
		} else {
			slider.style.height = '';
		}
		if (slider._hasExplicitHeight) {
			slider.classList.add('slider-has-height');
		} else {
			slider.classList.remove('slider-has-height');
		}
	}

	/**
	 * Targeted Safari guard: neutralize intrinsic ratio hints for cover bg images
	 * inside this slider only.
	 *
	 * @param {HTMLElement} slider The slider root element.
	 */
	function scrubCoverImageHints(slider) {
		const imgs = slider.querySelectorAll(
			'img.wp-block-cover__image-background'
		);
		imgs.forEach((img) => {
			img.removeAttribute('width');
			img.removeAttribute('height');
			img.setAttribute('sizes', '100vw');
			img.style.aspectRatio = 'auto';
		});
	}

	function attachResize(slider) {
		let frame = null;
		const win = getOwnerWindow(slider);
		const onResize = () => {
			if (frame) {
				return;
			}
			frame = win.requestAnimationFrame(() => {
				frame = null;
				computeAndSetEffectiveHeight(slider);
				lockSliderHeight(slider);
			});
		};
		win.addEventListener('resize', onResize);
		slider._onResize = onResize;
		slider._resizeWindow = win;
		slider._resizeFrame = () => {
			if (frame) {
				win.cancelAnimationFrame(frame);
				frame = null;
			}
		};
	}

	function attachTransitionClamp(slider) {
		/**
		 * Keep state consistent after opacity transitions by clearing the
		 * previous slide marker when the fade completes.
		 */
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
		if (!isEditor(slider)) {
			return;
		}
		const container = getSlideContainer(slider);
		if (!container || typeof container.nodeType !== 'number') {
			return;
		}
		const Observer = getOwnerWindow(slider).MutationObserver;
		if (typeof Observer !== 'function') {
			return;
		}
		const mo = new Observer(() => {
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
		const Observer = getOwnerWindow(slider).MutationObserver;
		if (typeof Observer !== 'function') {
			return;
		}
		const obs = new Observer(() => {
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
		const doc = getOwnerDocument(slider);
		const onVis = () => {
			if (doc.hidden) {
				stopAuto(slider);
			} else {
				restartAuto(slider);
			}
		};
		doc.addEventListener('visibilitychange', onVis);
		slider._onVis = onVis;
		slider._visibilityDocument = doc;
	}

	function buildNav(slider) {
		const doc = getOwnerDocument(slider);
		const wrapper = slider._wrapper || ensureWrapper(slider);
		let nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
		if (!nav) {
			nav = doc.createElement('div');
			nav.className = NAV_CLASS;
			wrapper.appendChild(nav);
		}

		// Toggle entire nav visibility via option
		nav.style.display = slider._showNav ? '' : 'none';

		// In editor Preview only, swallow selection-related events so buttons stay clickable
		if (
			isEditor(slider) &&
			slider.classList.contains('slider-preview-mode') &&
			!slider._navSwallow
		) {
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
			prev = doc.createElement('button');
			prev.type = 'button';
			prev.className = BTN_CLASS + ' ' + BTN_PREV;
			prev.setAttribute('aria-label', __('Previous', 'flexline'));
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
				pause = doc.createElement('button');
				pause.type = 'button';
				pause.className = BTN_CLASS + ' ' + BTN_PAUSE;
				pause.setAttribute('aria-label', __('Pause/Play', 'flexline'));
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
			next = doc.createElement('button');
			next.type = 'button';
			next.className = BTN_CLASS + ' ' + BTN_NEXT;
			next.setAttribute('aria-label', __('Next', 'flexline'));
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
		if (isEditor(slider)) {
			prev.tabIndex = -1;
			next.tabIndex = -1;
			if (slider._btnPause) {
				slider._btnPause.tabIndex = -1;
			}
			// nav.setAttribute('aria-hidden', 'true');
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

		// Height: compute a definite value before absolute stacking kicks in
		computeAndSetEffectiveHeight(slider);
		lockSliderHeight(slider);

		// Activate runtime
		slider.classList.add(RUNTIME_CLASS);

		// Slides and stacking
		if (typeof slider._activeIndex !== 'number') {
			slider._activeIndex = 0;
		}
		applyStacking(slider);
		clampState(slider);
		const liveRegion = getOwnerDocument(slider).createElement('div');
		liveRegion.className = 'screen-reader-text';
		liveRegion.setAttribute('aria-live', 'polite');
		liveRegion.setAttribute('aria-atomic', 'true');
		liveRegion.setAttribute('role', 'status');
		wrapper.appendChild(liveRegion);
		slider._liveRegion = liveRegion;
		attachReducedMotionHandler(slider);

		// Transitions are CSS-driven; no JS step required here

		// Build navigation
		buildNav(slider);

		// Height listeners
		attachResize(slider);

		// Targeted Safari guard for this slider only
		scrubCoverImageHints(slider);

		// Transitions and observers
		attachTransitionClamp(slider);
		attachVarsObserver(slider);
		if (isEditor(slider)) {
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
			el.removeAttribute('aria-hidden');
			el.inert = false;
			el.classList.remove('is-slide-active', 'is-slide-prev');
		});
		if (slider._liveRegion) {
			slider._liveRegion.remove();
			slider._liveRegion = null;
		}
	}

	function teardownSlider(slider) {
		// Stop timers and observers
		stopAuto(slider);
		detachReducedMotionHandler(slider);
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
			(
				slider._resizeWindow || getOwnerWindow(slider)
			).removeEventListener('resize', slider._onResize);
			slider._onResize = null;
			slider._resizeWindow = null;
		}
		if (slider._resizeFrame) {
			slider._resizeFrame();
			slider._resizeFrame = null;
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
			(
				slider._visibilityDocument || getOwnerDocument(slider)
			).removeEventListener('visibilitychange', slider._onVis);
			slider._onVis = null;
			slider._visibilityDocument = null;
		}
		detachTransitionClamp(slider);

		// Clear inline styles
		clearInlineSlideStyles(slider);
		if (slider._wrapper) {
			slider._wrapper.style.removeProperty('--slider-height-default');
		}
		slider.style.height = '';
		slider.style.removeProperty('--slider-height-effective');
		slider.classList.remove('slider-has-height');

		// Remove runtime class
		slider.classList.remove(RUNTIME_CLASS);

		// Remove nav listeners
		const wrapper = slider._wrapper || slider.parentElement;
		const nav = wrapper
			? wrapper.querySelector(':scope > .' + NAV_CLASS)
			: null;
		if (nav && slider._navSwallow) {
			nav.removeEventListener('mousedown', slider._navSwallow, true);
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

	function syncOneSlider(slider) {
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
			computeAndSetEffectiveHeight(slider);
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
		slider.classList.remove('slider-has-height');
		slider.style.removeProperty('--slider-height-effective');
		// Clear any locked height left from a previous Preview session
		slider.style.height = '';
	}

	function initSliders(root = document) {
		const sliders = isSliderElement(root)
			? [root]
			: querySliderElements(root, SLIDER_SELECTOR);
		sliders.forEach((slider) => {
			syncOneSlider(slider);
		});

		// Global safety: teardown any stray running sliders that no longer qualify
		const running = querySliderElements(root, '.' + RUNTIME_CLASS);
		running.forEach((el) => {
			const isSlider =
				el.classList && el.classList.contains('is-style-slider');
			if (!isSlider || !shouldRun(el)) {
				teardownSlider(el);
			}
		});

		// Also handle orphaned wrappers whose child lost the slider class
		const wrappers = querySliderElements(root, '.slider-wrapper');
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

	function teardownSliders(root = document) {
		const sliders = isSliderElement(root)
			? [root]
			: [
					...querySliderElements(root, SLIDER_SELECTOR),
					...querySliderElements(root, '.' + RUNTIME_CLASS),
				];
		new Set(sliders).forEach((slider) => teardownSlider(slider));
	}

	function refreshSliderVars(root = document, selector = '') {
		const doc = getRootDocument(root);
		const scope = selector ? doc.querySelector(selector) : root;
		const sliders = scope
			? querySliderElements(scope, SLIDER_SELECTOR)
			: [];
		if (!sliders.length) {
			initSliders(root);
			return;
		}

		sliders.forEach((slider) => {
			if (!shouldRun(slider)) {
				syncOneSlider(slider);
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
	}

	// Initialize on DOM ready
	const flexlineOnEarlyReady = (callback, root = document) => {
		const win = getRootWindow(root);
		if (win.Flexline && typeof win.Flexline.onEarlyReady === 'function') {
			win.Flexline.onEarlyReady(callback);
			return;
		}

		const doc = getRootDocument(root);
		if (doc.readyState === 'loading') {
			doc.addEventListener('DOMContentLoaded', callback, {
				once: true,
			});
		} else {
			callback();
		}
	};

	function watchSliders(root = document) {
		const win = getRootWindow(root);
		const Observer = win.MutationObserver;
		if (typeof Observer !== 'function') {
			return;
		}

		const doc = getRootDocument(root);
		// Watch for editor mode toggles and style/class changes
		const rerunInit = debounce(() => initSliders(root), 80, root);
		const bodyObserver = new Observer((records) => {
			let relevant = false;
			for (const rec of records) {
				if (
					rec.type === 'attributes' &&
					rec.attributeName === 'class'
				) {
					const t = rec.target;
					if (t && t.nodeType === 1) {
						// Detect both addition and removal of the key classes on the slider element itself
						const oldVal = rec.oldValue || '';
						const hadPreview =
							oldVal.indexOf('slider-preview-mode') !== -1;
						const hasPreview =
							t.classList &&
							t.classList.contains('slider-preview-mode');
						const hadSlider =
							oldVal.indexOf('is-style-slider') !== -1;
						const hasSlider =
							t.classList &&
							t.classList.contains('is-style-slider');
						if (
							hadPreview ||
							hasPreview ||
							hadSlider ||
							hasSlider
						) {
							relevant = true;
							break;
						}
					}
				}
				if (rec.type === 'childList') {
					for (const n of rec.addedNodes) {
						if (
							n.nodeType === 1 &&
							((n.classList &&
								n.classList.contains('is-style-slider')) ||
								(n.querySelector &&
									n.querySelector(SLIDER_SELECTOR)))
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
		const observeBody = () => {
			if (!doc.body || typeof doc.body.nodeType !== 'number') {
				return false;
			}

			try {
				bodyObserver.observe(doc.body, {
					childList: true,
					subtree: true,
					attributes: true,
					attributeFilter: ['class'],
					attributeOldValue: true,
				});
				return true;
			} catch (error) {
				return false;
			}
		};

		if (!observeBody()) {
			doc.addEventListener('DOMContentLoaded', observeBody, {
				once: true,
			});
			win.requestAnimationFrame(observeBody);
		}
	}

	window.FlexlineSlider = {
		init: initSliders,
		teardown: teardownSliders,
	};

	// Keep normal front-end auto-init, but expose init/teardown so editor
	// controls can refresh Preview mode after iframe-local class/style changes.
	flexlineOnEarlyReady(() => initSliders(document), document);
	watchSliders(document);

	// Editor: listen for live CSS var updates from controls
	document.addEventListener('flexline-slider-vars-updated', (e) => {
		refreshSliderVars(e?.detail?.root || document, e?.detail?.selector);
	});
})();
