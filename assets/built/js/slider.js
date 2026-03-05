/******/ (function() { // webpackBootstrap
/*!**************************!*\
  !*** ./src/js/slider.js ***!
  \**************************/
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n2 = 0, F = function F() {}; return { s: F, n: function n() { return _n2 >= r.length ? { done: !0 } : { done: !1, value: r[_n2++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
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

(function () {
  'use strict';

  var SLIDER_SELECTOR = '.is-style-slider';
  var WRAPPER_CLASS = 'slider-wrapper';
  var RUNTIME_CLASS = 'slider-runtime-active';
  var NAV_CLASS = 'slider-nav-buttons';
  var BTN_CLASS = 'is-slider-btn';
  var BTN_PREV = 'is-slider-prev';
  var BTN_NEXT = 'is-slider-next';
  var BTN_PAUSE = 'is-slider-pause';
  var isEditor = function isEditor() {
    return !!document.body && (document.body.classList.contains('block-editor-page') || document.querySelector('.editor-styles-wrapper'));
  };
  var shouldRun = function shouldRun(slider) {
    return isEditor() ? slider.classList.contains('slider-preview-mode') : true;
  };
  var debounce = function debounce(fn, delay) {
    var t;
    return function () {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }
      clearTimeout(t);
      t = setTimeout(function () {
        return fn.apply(void 0, args);
      }, delay);
    };
  };

  /**
   * Return the immediate container that holds slide children.
   * In the editor, slides live inside the block list layout wrapper.
   */

  function getSlideContainer(slider) {
    if (isEditor()) {
      var c = slider.querySelector(':scope > .block-editor-block-list__layout');
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
    var container = getSlideContainer(slider);
    var children = Array.from(container.children || []);
    return children.filter(function (el) {
      return el && el.nodeType === 1 && !el.classList.contains(NAV_CLASS) && !el.classList.contains('block-editor-default-block-appender') && !el.classList.contains('block-list-appender');
    });
  }
  function ensureWrapper(slider) {
    /**
     * Ensure a .slider-wrapper exists around the slider element and a single
     * sibling nav container. This wrapper is temporary and will be removed
     * on teardown or when the feature is disabled.
     */
    var wrapper = slider.parentElement;
    if (!wrapper || !wrapper.classList.contains(WRAPPER_CLASS)) {
      wrapper = document.createElement('div');
      wrapper.className = WRAPPER_CLASS;
      if (slider.parentNode) {
        slider.parentNode.insertBefore(wrapper, slider);
      }
      wrapper.appendChild(slider);
    }
    var nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
    if (!nav) {
      nav = document.createElement('div');
      nav.className = NAV_CLASS;
      wrapper.appendChild(nav);
    }
    return wrapper;
  }
  function removeWrapper(slider) {
    var wrapper = slider.parentElement;
    if (wrapper && wrapper.classList.contains(WRAPPER_CLASS)) {
      var parent = wrapper.parentNode;
      if (parent) {
        parent.insertBefore(slider, wrapper);
      }
      var nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
      if (nav) {
        nav.remove();
      }
      wrapper.remove();
    } else if (slider.parentElement) {
      // Remove stray nav in same container if present
      var _nav = slider.parentElement.querySelector(':scope > .' + NAV_CLASS);
      if (_nav) {
        _nav.remove();
      }
    }
  }
  function readNumericOption(wrapper, slider, cssVarName, dataAttr, defaultValue) {
    /**
     * Read a numeric option with the following precedence:
     *  1) CSS custom property on wrapper/slider
     *  2) data-* attribute on wrapper/slider
     *  3) provided default
     */
    // Try CSS var on wrapper, then on slider element
    var cssEls = [wrapper, slider];
    for (var _i = 0, _cssEls = cssEls; _i < _cssEls.length; _i++) {
      var el = _cssEls[_i];
      if (!el) {
        continue;
      }
      var cs = window.getComputedStyle(el);
      var raw = (cs.getPropertyValue(cssVarName) || '').trim();
      if (raw) {
        var n = parseInt(raw, 10);
        if (!Number.isNaN(n)) {
          return n;
        }
      }
    }
    var sources = [wrapper, slider];
    for (var _i2 = 0, _sources = sources; _i2 < _sources.length; _i2++) {
      var _el = _sources[_i2];
      if (_el && _el.hasAttribute('data-' + dataAttr)) {
        var _n = parseInt(_el.getAttribute('data-' + dataAttr) || '', 10);
        if (!Number.isNaN(_n)) {
          return _n;
        }
      }
    }
    return defaultValue;
  }
  function readBooleanOption(wrapper, slider, cssVarName, dataAttr, defaultValue) {
    // Try CSS var on wrapper, then on slider element
    var cssEls = [wrapper, slider];
    for (var _i3 = 0, _cssEls2 = cssEls; _i3 < _cssEls2.length; _i3++) {
      var el = _cssEls2[_i3];
      if (!el) {
        continue;
      }
      var cs = window.getComputedStyle(el);
      var v = (cs.getPropertyValue(cssVarName) || '').trim();
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
    var sources = [wrapper, slider];
    for (var _i4 = 0, _sources2 = sources; _i4 < _sources2.length; _i4++) {
      var _el2 = _sources2[_i4];
      if (_el2 && _el2.hasAttribute('data-' + dataAttr)) {
        var raw = (_el2.getAttribute('data-' + dataAttr) || '').toLowerCase();
        if (raw === '0' || raw === 'false' || raw === 'no' || raw === 'off') {
          return false;
        }
        if (raw === '1' || raw === 'true' || raw === 'yes' || raw === 'on') {
          return true;
        }
      }
    }
    return defaultValue;
  }
  function updateOptionsFromVars(slider) {
    var wrapper = slider._wrapper || slider.parentElement;
    slider._transitionMs = readNumericOption(wrapper, slider, '--slider-transition-ms', 'slider-transition-ms', 500);
    slider._intervalMs = readNumericOption(wrapper, slider, '--slider-interval-ms', 'slider-interval-ms', 4000);
    slider._loop = readBooleanOption(wrapper, slider, '--slider-loop', 'slider-loop', true);
    slider._pauseOnHover = readBooleanOption(wrapper, slider, '--slider-pause-on-hover', 'slider-pause-on-hover', true);
    slider._showPauseButton = readBooleanOption(wrapper, slider, '--slider-show-pause', 'slider-show-pause', true);
    slider._showNav = readBooleanOption(wrapper, slider, '--slider-nav', 'slider-nav', true);

    // Class fallbacks (front end resiliency)
    var hasClass = function hasClass(cls) {
      return slider.classList && slider.classList.contains(cls);
    };
    if (!(slider._intervalMs > 0) && hasClass('slider-auto')) {
      slider._intervalMs = 4000;
    }
    if (!slider._pauseOnHover && hasClass('slider-pause-on-hover')) {
      slider._pauseOnHover = true;
    }
    if (!slider._showPauseButton && hasClass('slider-auto') && !hasClass('slider-hide-pause-button')) {
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
    var slides = getSlides(slider);
    slider._slides = slides;
    // CSS handles positioning and transitions; JS toggles classes only
    slides.forEach(function (el, idx) {
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
    var slides = slider._slides || getSlides(slider);
    var count = slides.length;
    if (count === 0) {
      return;
    }
    if (typeof slider._activeIndex !== 'number' || Number.isNaN(slider._activeIndex)) {
      slider._activeIndex = 0;
    }
    if (slider._activeIndex >= count) {
      slider._activeIndex = slider._loop ? 0 : count - 1;
    }
    if (slider._activeIndex < 0) {
      slider._activeIndex = slider._loop ? count - 1 : 0;
    }
    slides.forEach(function (el, idx) {
      el.classList.remove('is-slide-active', 'is-slide-prev');
      var on = idx === slider._activeIndex;
      var isPrev = typeof slider._prevIndex === 'number' && idx === slider._prevIndex;
      if (on) {
        el.classList.add('is-slide-active');
      }
      if (isPrev) {
        el.classList.add('is-slide-prev');
      }
    });
  }
  function goTo(slider, idx) {
    var fromNav = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
    /**
     * Navigate to the given index (wrapping when loop is enabled).
     * fromNav=false is used by autoplay to avoid resetting timers excessively.
     */
    var slides = slider._slides || getSlides(slider);
    var count = slides.length;
    if (count <= 1) {
      return;
    }
    var next = idx;
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
  function nextSlide(slider) {
    var fromNav = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    goTo(slider, (slider._activeIndex || 0) + 1, fromNav);
  }
  function prevSlide(slider) {
    goTo(slider, (slider._activeIndex || 0) - 1, true);
  }
  function startAuto(slider) {
    /** Start/restart the autoplay timer (if interval > 0). */
    stopAuto(slider);
    if (!(slider._intervalMs > 0)) {
      return;
    }
    slider._autoTimer = setInterval(function () {
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
    /**
     * Front‑end only: start/stop autoplay based on viewport visibility.
     */
    if (slider._io) {
      slider._io.disconnect();
    }
    slider._isInView = false;
    var wrapper = slider._wrapper || slider.parentElement;
    var IO = window.IntersectionObserver;
    if (typeof IO !== 'function') {
      // Fallback: if IO is unavailable, consider it always in view
      slider._isInView = true;
      startAuto(slider);
      return;
    }
    var io = new IO(function (entries) {
      var _iterator = _createForOfIteratorHelper(entries),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var ent = _step.value;
          if (ent.isIntersecting) {
            slider._isInView = true;
            startAuto(slider);
          } else {
            slider._isInView = false;
            stopAuto(slider);
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    }, {
      root: null,
      threshold: 0.1
    });
    io.observe(wrapper);
    slider._io = io;
  }
  function attachHoverPause(slider) {
    var wrapper = slider._wrapper || slider.parentElement;
    var onEnter = function onEnter() {
      // No preventDefault here; it can interfere with editor selection.
      slider._hoverPaused = true;
    };
    var onLeave = function onLeave() {
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
    var wrapper = slider._wrapper || slider.parentElement;
    var csWrapper = wrapper ? window.getComputedStyle(wrapper) : null;
    var explicitHeight = csWrapper ? (csWrapper.getPropertyValue('--slider-height') || '').trim() : '';
    slider._hasExplicitHeight = !!explicitHeight;
    if (explicitHeight) {
      // Height provided – clear default so the explicit value wins and live-updates.
      if (wrapper) {
        wrapper.style.removeProperty('--slider-height-default');
      }
      return;
    }
    // No explicit height, provide a robust default based on header size
    var header = document.querySelector('header.site-header');
    var h = header ? header.offsetHeight : 0;
    if (wrapper) {
      wrapper.style.setProperty('--slider-height-default', "calc(100dvh - ".concat(h, "px)"));
    }
  }

  /**
   * Lock a definite slider height so children using height:100% resolve reliably.
   * Uses the larger of computed min-height and current box height.
   *
   * @param {HTMLElement} slider The slider root element.
   */
  function lockSliderHeight(slider) {
    var cs = window.getComputedStyle(slider);
    var minH = parseFloat((cs.minHeight || '0').replace('px', '')) || 0;
    var boxH = slider.getBoundingClientRect().height || 0;
    var h = Math.max(minH, boxH);
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
    var imgs = slider.querySelectorAll('img.wp-block-cover__image-background');
    imgs.forEach(function (img) {
      img.removeAttribute('width');
      img.removeAttribute('height');
      img.setAttribute('sizes', '100vw');
      img.style.aspectRatio = 'auto';
    });
  }
  function attachResize(slider) {
    var onResize = function onResize() {
      computeAndSetEffectiveHeight(slider);
      lockSliderHeight(slider);
    };
    window.addEventListener('resize', onResize);
    slider._onResize = onResize;
  }
  function attachTransitionClamp(slider) {
    /**
     * Keep state consistent after opacity transitions by clearing the
     * previous slide marker when the fade completes.
     */
    var slides = slider._slides || getSlides(slider);
    var onTe = function onTe(e) {
      if (e && e.propertyName && e.propertyName !== 'opacity') {
        return;
      }
      slider._prevIndex = null;
      clampState(slider);
    };
    slides.forEach(function (el) {
      el.addEventListener('transitionend', onTe);
    });
    slider._onTransitionEnd = onTe;
  }
  function detachTransitionClamp(slider) {
    if (!slider._onTransitionEnd) {
      return;
    }
    var slides = slider._slides || getSlides(slider);
    slides.forEach(function (el) {
      el.removeEventListener('transitionend', slider._onTransitionEnd);
    });
    slider._onTransitionEnd = null;
  }
  function attachEditorChildWatcher(slider) {
    if (!isEditor()) {
      return;
    }
    var container = getSlideContainer(slider);
    var mo = new window.MutationObserver(function () {
      applyStacking(slider);
      clampState(slider);
    });
    mo.observe(container, {
      childList: true,
      subtree: false
    });
    slider._childWatcher = mo;
  }
  function attachVarsObserver(slider) {
    var wrapper = slider._wrapper || slider.parentElement;
    if (!wrapper) {
      return;
    }
    var obs = new window.MutationObserver(function () {
      var prevInterval = slider._intervalMs;
      var prevTransition = slider._transitionMs;
      var prevShowPause = slider._showPauseButton;
      var prevShowNav = slider._showNav;
      updateOptionsFromVars(slider);
      if (slider._transitionMs !== prevTransition) {
        applyStacking(slider);
        clampState(slider);
      }
      if (slider._intervalMs !== prevInterval) {
        restartAuto(slider);
      }
      if (slider._showPauseButton !== prevShowPause || slider._showNav !== prevShowNav) {
        buildNav(slider); // show/hide pause button
      }
    });
    obs.observe(wrapper, {
      attributes: true,
      attributeFilter: ['style']
    });
    slider._varsObserver = obs;
  }
  function attachVisibilityHandler(slider) {
    var onVis = function onVis() {
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
    var wrapper = slider._wrapper || ensureWrapper(slider);
    var nav = wrapper.querySelector(':scope > .' + NAV_CLASS);
    if (!nav) {
      nav = document.createElement('div');
      nav.className = NAV_CLASS;
      wrapper.appendChild(nav);
    }

    // Toggle entire nav visibility via option
    nav.style.display = slider._showNav ? '' : 'none';

    // In editor Preview only, swallow selection-related events so buttons stay clickable
    if (isEditor() && slider.classList.contains('slider-preview-mode') && !slider._navSwallow) {
      var swallow = function swallow(e) {
        e.preventDefault();
        e.stopPropagation();
      };
      nav.addEventListener('mousedown', swallow, true);
      slider._navSwallow = swallow;
    }

    // Prev button
    var prev = nav.querySelector(':scope > .' + BTN_CLASS + '.' + BTN_PREV);
    if (!prev) {
      prev = document.createElement('button');
      prev.type = 'button';
      prev.className = BTN_CLASS + ' ' + BTN_PREV;
      prev.setAttribute('aria-label', 'Previous');
      prev.innerHTML = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';
      nav.appendChild(prev);
    }
    prev.onclick = function (e) {
      e.preventDefault();
      e.stopPropagation();
      prevSlide(slider);
    };
    slider._btnPrev = prev;

    // Pause button (optional)
    var pause = nav.querySelector(':scope > .' + BTN_CLASS + '.' + BTN_PAUSE);
    if (slider._intervalMs > 0 && slider._showPauseButton) {
      if (!pause) {
        pause = document.createElement('button');
        pause.type = 'button';
        pause.className = BTN_CLASS + ' ' + BTN_PAUSE;
        pause.setAttribute('aria-label', 'Pause/Play');
        pause.innerHTML = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
        nav.appendChild(pause);
      }
      pause.style.display = '';
      pause.onclick = function (e) {
        e.preventDefault();
        e.stopPropagation();
        slider._isPaused = !slider._isPaused;
        // Reflect state via aria-pressed and swap icon
        pause.setAttribute('aria-pressed', slider._isPaused ? 'true' : 'false');
        pause.innerHTML = slider._isPaused ? '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M320-720v480l400-240-400-240Z"/></svg></span>' : '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
        restartAuto(slider);
      };
      slider._btnPause = pause;
    } else if (pause) {
      pause.style.display = 'none';
    }

    // Next button
    var next = nav.querySelector(':scope > .' + BTN_CLASS + '.' + BTN_NEXT);
    if (!next) {
      next = document.createElement('button');
      next.type = 'button';
      next.className = BTN_CLASS + ' ' + BTN_NEXT;
      next.setAttribute('aria-label', 'Next');
      next.innerHTML = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';
      nav.appendChild(next);
    }
    next.onclick = function (e) {
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
      // nav.setAttribute('aria-hidden', 'true');
    }
  }
  // Prevent editor interactions (double‑click, drag/drop) from hijacking Preview
  // (Preview guards removed — z-index and pointer-events manage interactions)

  function initOneSlider(slider) {
    // Ensure clean start
    removeWrapper(slider);
    var wrapper = ensureWrapper(slider);
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
    var slides = slider._slides || getSlides(slider);
    slides.forEach(function (el) {
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
      var _wrapper = slider._wrapper || slider.parentElement;
      if (_wrapper) {
        _wrapper.removeEventListener('mouseenter', slider._onHoverEnter);
        _wrapper.removeEventListener('mouseleave', slider._onHoverLeave);
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
    slider.style.height = '';
    slider.style.removeProperty('--slider-height-effective');
    slider.classList.remove('slider-has-height');

    // Remove runtime class
    slider.classList.remove(RUNTIME_CLASS);

    // Remove nav listeners
    var wrapper = slider._wrapper || slider.parentElement;
    var nav = wrapper ? wrapper.querySelector(':scope > .' + NAV_CLASS) : null;
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
  function initSliders() {
    var sliders = Array.from(document.querySelectorAll(SLIDER_SELECTOR));
    sliders.forEach(function (slider) {
      var wants = shouldRun(slider);
      var running = slider.classList.contains(RUNTIME_CLASS);
      if (running && wants) {
        // Already running and should continue: refresh options/stacking/nav only
        slider._wrapper = slider._wrapper && slider._wrapper.isConnected ? slider._wrapper : ensureWrapper(slider);
        var prevInterval = slider._intervalMs;
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
      slider.classList.remove('slider-has-height');
      slider.style.removeProperty('--slider-height-effective');
      // Clear any locked height left from a previous Preview session
      slider.style.height = '';
    });

    // Global safety: teardown any stray running sliders that no longer qualify
    var running = Array.from(document.querySelectorAll('.' + RUNTIME_CLASS));
    running.forEach(function (el) {
      var isSlider = el.classList && el.classList.contains('is-style-slider');
      if (!isSlider || !shouldRun(el)) {
        teardownSlider(el);
      }
    });

    // Also handle orphaned wrappers whose child lost the slider class
    var wrappers = Array.from(document.querySelectorAll('.slider-wrapper'));
    wrappers.forEach(function (wrap) {
      var child = wrap.firstElementChild;
      if (!child) {
        return;
      }
      // If the child is no longer a slider or shouldn't run, teardown/unwrap
      if (!child.classList.contains('is-style-slider') || !shouldRun(child)) {
        teardownSlider(child);
      }
    });
  }

  // Initialize on DOM ready
  var flexlineOnEarlyReady = function flexlineOnEarlyReady(callback) {
    if (window.Flexline && typeof window.Flexline.onEarlyReady === 'function') {
      window.Flexline.onEarlyReady(callback);
      return;
    }
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', callback, {
        once: true
      });
    } else {
      callback();
    }
  };
  flexlineOnEarlyReady(initSliders);

  // Watch for editor mode toggles and style/class changes
  var rerunInit = debounce(initSliders, 80);
  var bodyObserver = new window.MutationObserver(function (records) {
    var relevant = false;
    var _iterator2 = _createForOfIteratorHelper(records),
      _step2;
    try {
      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        var rec = _step2.value;
        if (rec.type === 'attributes' && rec.attributeName === 'class') {
          var t = rec.target;
          if (t && t.nodeType === 1) {
            // Detect both addition and removal of the key classes on the slider element itself
            var oldVal = rec.oldValue || '';
            var hadPreview = oldVal.indexOf('slider-preview-mode') !== -1;
            var hasPreview = t.classList && t.classList.contains('slider-preview-mode');
            var hadSlider = oldVal.indexOf('is-style-slider') !== -1;
            var hasSlider = t.classList && t.classList.contains('is-style-slider');
            if (hadPreview || hasPreview || hadSlider || hasSlider) {
              relevant = true;
              break;
            }
          }
        }
        if (rec.type === 'childList') {
          var _iterator3 = _createForOfIteratorHelper(rec.addedNodes),
            _step3;
          try {
            for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
              var n = _step3.value;
              if (n.nodeType === 1 && n.classList && n.classList.contains('is-style-slider')) {
                relevant = true;
                break;
              }
            }
          } catch (err) {
            _iterator3.e(err);
          } finally {
            _iterator3.f();
          }
          if (relevant) {
            break;
          }
        }
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
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
    attributeOldValue: true
  });

  // Editor: listen for live CSS var updates from controls
  document.addEventListener('flexline-slider-vars-updated', function (e) {
    var sel = e && e.detail && e.detail.selector;
    if (sel) {
      var scope = document.querySelector(sel);
      var sliders = scope ? Array.from(scope.querySelectorAll(SLIDER_SELECTOR)) : [];
      if (sliders.length) {
        sliders.forEach(function (slider) {
          if (!shouldRun(slider)) {
            return;
          }
          var prevInterval = slider._intervalMs;
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
/******/ })()
;