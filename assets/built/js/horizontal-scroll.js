/******/ (function() { // webpackBootstrap
/*!*************************************!*\
  !*** ./src/js/horizontal-scroll.js ***!
  \*************************************/
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
/* global requestAnimationFrame */

// Horizontal Scroll block behaviour – front-end + block-editor compatible

function isBlockEditor() {
  return typeof wp !== 'undefined' && wp.data && typeof wp.data.select === 'function' && wp.data.select('core/block-editor') !== undefined;
}
var PREV_ICON_SVG = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';
var NEXT_ICON_SVG = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';
var PAUSE_ICON_SVG = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M280-240v-480h80v480h-80Zm320 0v-480h80v480h-80Z"/></svg></span>';
var PLAY_ICON_SVG = '<span class="material-symbols-outlined">' + '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">' + '<path fill="currentColor" d="M320-720v480l400-240-400-240Z"/></svg></span>';
function smoothScrollTo(scroller, targetScrollLeft, duration) {
  var start = scroller.scrollLeft;
  var distance = targetScrollLeft - start;
  var startTime = performance.now();
  function step(currentTime) {
    var elapsed = currentTime - startTime;
    var progress = Math.min(elapsed / duration, 1);
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
  var epsilon = 5;
  var durationAttr = scroller.getAttribute('data-scroll-speed');
  var duration = durationAttr ? parseInt(durationAttr, 10) : 600;
  var current = scroller.scrollLeft;
  var target = current;
  var items = Array.from(scroller.children);
  for (var _i = 0, _items = items; _i < _items.length; _i++) {
    var item = _items[_i];
    var itemStart = item.offsetLeft;
    if (itemStart > current + epsilon) {
      target = itemStart;
      break;
    }
  }
  smoothScrollTo(scroller, target, duration);
}
function scrollToPrev(scroller) {
  var epsilon = 5;
  var duration = parseInt(scroller.getAttribute('data-scroll-speed') || '600', 10);
  var items = Array.from(scroller.children);
  var current = scroller.scrollLeft;
  var prevOffsets = items.map(function (item) {
    return item.offsetLeft;
  }).filter(function (offset) {
    return offset + epsilon < current;
  });
  var target = prevOffsets.length ? Math.max.apply(Math, _toConsumableArray(prevOffsets)) : scroller.scrollWidth - scroller.offsetWidth;
  smoothScrollTo(scroller, target, duration);
}
function getRealSlides(scroller) {
  return Array.from(scroller.children).filter(function (el) {
    return !el.classList.contains('cloned-slide');
  });
}
function setupInfiniteLoop(scroller) {
  if (scroller.dataset.loopInitialised === 'true') {
    return;
  }
  if (!scroller.classList.contains('horizontal-scroller-loop')) {
    return;
  }
  scroller.style.visibility = 'hidden';
  var realSlides = getRealSlides(scroller);
  if (!realSlides.length) {
    return;
  }
  var realWidth = realSlides.reduce(function (sum, slide) {
    return sum + slide.offsetWidth;
  }, 0);
  var makeClone = function makeClone(el) {
    var c = el.cloneNode(true);
    c.classList.add('cloned-slide');
    return c;
  };
  var frontClones = realSlides.map(makeClone);
  var backClones = realSlides.map(makeClone);
  frontClones.slice().reverse().forEach(function (c) {
    return scroller.insertBefore(c, scroller.firstChild);
  });
  backClones.forEach(function (c) {
    return scroller.appendChild(c);
  });
  requestAnimationFrame(function () {
    scroller.scrollLeft = realWidth + 1;
    scroller.style.visibility = '';
    if (scroller._loopScrollHandler) {
      scroller.removeEventListener('scroll', scroller._loopScrollHandler);
    }
    scroller._loopScrollHandler = function () {
      var s = scroller.scrollLeft;
      if (s < realWidth) {
        scroller.scrollLeft = s + realWidth;
      } else if (s >= realWidth * 2) {
        scroller.scrollLeft = s - realWidth;
      }
    };
    scroller.addEventListener('scroll', scroller._loopScrollHandler, {
      passive: true
    });
  });
  scroller.dataset.loopInitialised = 'true';
}
function ensureWrapper(scroller) {
  if (!scroller.parentNode) {
    return scroller;
  }
  if (scroller.parentNode && scroller.parentNode.classList.contains('horizontal-scroll-wrapper')) {
    return scroller.parentNode;
  }
  var wrapper = document.createElement('div');
  wrapper.classList.add('horizontal-scroll-wrapper');
  wrapper.style.position = 'relative';
  scroller.parentNode.insertBefore(wrapper, scroller);
  wrapper.appendChild(scroller);
  return wrapper;
}
function removeWrapper(scroller) {
  var parent = scroller.parentNode;
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
  var wrapper = ensureWrapper(scroller);
  if (!wrapper || wrapper === scroller) {
    return;
  }
  wrapper.querySelectorAll('.horizontal-scroller-nav-buttons, .horizontal-scroller-side-buttons, .horizontal-scroller-range-dots').forEach(function (el) {
    return el.remove();
  });
}
function setButtonIcon(button, iconUrl, fallbackSvg, iconLabel) {
  if (!button) {
    return;
  }
  button.innerHTML = '';
  if (iconUrl) {
    var img = document.createElement('img');
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
  var realSlides = getRealSlides(scroller);
  var dots = Array.from(dotsContainer.children);
  if (!realSlides.length || dots.length !== realSlides.length) {
    return;
  }
  var scrollerRect = scroller.getBoundingClientRect();
  realSlides.forEach(function (slide, index) {
    var dot = dots[index];
    var slideRect = slide.getBoundingClientRect();
    var visibleWidth = Math.min(scrollerRect.right, slideRect.right) - Math.max(scrollerRect.left, slideRect.left);
    if (visibleWidth > 1) {
      dot.classList.add('is-visible');
    } else {
      dot.classList.remove('is-visible');
    }
  });
}
function setupRangeDots(scroller, wrapper) {
  var showDots = scroller.classList.contains('horizontal-scroller-show-dots');
  if (!showDots) {
    return;
  }
  var realSlides = getRealSlides(scroller);
  if (!realSlides.length) {
    return;
  }
  var dotsContainer = document.createElement('div');
  dotsContainer.classList.add('horizontal-scroller-range-dots');
  realSlides.forEach(function (_, index) {
    var dot = document.createElement('span');
    dot.classList.add('horizontal-scroller-range-dot');
    dot.setAttribute('aria-hidden', 'true');
    dot.setAttribute('data-slide-index', "".concat(index));
    dotsContainer.appendChild(dot);
  });
  wrapper.appendChild(dotsContainer);
  var update = function update() {
    return updateRangeDots(scroller, dotsContainer);
  };
  scroller._updateRangeDots = update;
  scroller._dotsScrollHandler = update;
  scroller._dotsResizeHandler = update;
  scroller.addEventListener('scroll', scroller._dotsScrollHandler, {
    passive: true
  });
  window.addEventListener('resize', scroller._dotsResizeHandler);
  requestAnimationFrame(update);
}
function setupScrollerButtons(scroller) {
  if (!scroller.dataset.classObserverAttached && isBlockEditor()) {
    new window.MutationObserver(function () {
      return setupScrollerButtons(scroller);
    }).observe(scroller, {
      attributes: true,
      attributeFilter: ['class']
    });
    scroller.dataset.classObserverAttached = 'true';
  }
  var wrapper = ensureWrapper(scroller);
  if (!wrapper || wrapper === scroller) {
    return;
  }
  clearAutoScrollRuntime(scroller);
  clearDotsRuntime(scroller);
  clearControlContainers(scroller);
  var hasNav = scroller.classList.contains('horizontal-scroller-navigation');
  var autoEnabled = scroller.classList.contains('horizontal-scroller-auto');
  var showPause = autoEnabled && !scroller.classList.contains('horizontal-scroller-hide-pause-button');
  var useSideButtons = scroller.classList.contains('horizontal-scroller-buttons-sides');
  var showDots = scroller.classList.contains('horizontal-scroller-show-dots');
  var hasBottomNavButtons = !useSideButtons && hasNav || showPause;
  var hasAnyControls = hasNav || showPause || showDots;
  scroller._isPaused = false;
  var startAutoScroll = function startAutoScroll() {
    if (!autoEnabled || scroller._autoScrollInterval) {
      return;
    }
    var intervalDur = parseInt(scroller.getAttribute('data-scroll-interval') || '4000', 10);
    scroller._autoScrollInterval = setInterval(function () {
      return scrollToNext(scroller);
    }, intervalDur);
  };
  var stopAutoScroll = function stopAutoScroll() {
    if (scroller._autoScrollInterval) {
      clearInterval(scroller._autoScrollInterval);
      scroller._autoScrollInterval = null;
    }
  };
  var resetAutoScrollTimer = function resetAutoScrollTimer() {
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
      scroller._mouseEnterHandler = function () {
        return stopAutoScroll();
      };
      scroller._mouseLeaveHandler = function () {
        if (!scroller._isPaused) {
          startAutoScroll();
        }
      };
      scroller.addEventListener('mouseenter', scroller._mouseEnterHandler);
      scroller.addEventListener('mouseleave', scroller._mouseLeaveHandler);
    }
    scroller._autoVisibilityObserver = new window.IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          startAutoScroll();
        }
      });
    }, {
      threshold: 0.3
    });
    scroller._autoVisibilityObserver.observe(scroller);
  }
  if (!hasAnyControls) {
    return;
  }
  var prevIconUrl = scroller.getAttribute('data-icon-prev-url') || '';
  var nextIconUrl = scroller.getAttribute('data-icon-next-url') || '';
  var pauseIconUrl = scroller.getAttribute('data-icon-pause-url') || '';
  var buildPrevButton = function buildPrevButton() {
    var btn = document.createElement('button');
    btn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-prev');
    btn.setAttribute('aria-label', 'Scroll to previous item');
    setButtonIcon(btn, prevIconUrl, PREV_ICON_SVG, 'Previous');
    btn.addEventListener('click', function () {
      scrollToPrev(scroller);
      resetAutoScrollTimer();
    });
    return btn;
  };
  var buildNextButton = function buildNextButton() {
    var btn = document.createElement('button');
    btn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-next');
    btn.setAttribute('aria-label', 'Scroll to next item');
    setButtonIcon(btn, nextIconUrl, NEXT_ICON_SVG, 'Next');
    btn.addEventListener('click', function () {
      scrollToNext(scroller);
      resetAutoScrollTimer();
    });
    return btn;
  };
  var buildPauseButton = function buildPauseButton() {
    var btn = document.createElement('button');
    btn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-pause');
    btn.setAttribute('aria-label', 'Pause auto-scroll');
    setButtonIcon(btn, pauseIconUrl, PAUSE_ICON_SVG, 'Pause');
    btn.addEventListener('click', function () {
      scroller._isPaused = !scroller._isPaused;
      btn.setAttribute('aria-label', scroller._isPaused ? 'Resume auto-scroll' : 'Pause auto-scroll');
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
    var navContainer = document.createElement('div');
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
    var sideButtons = document.createElement('div');
    sideButtons.classList.add('horizontal-scroller-side-buttons');
    sideButtons.appendChild(buildPrevButton());
    sideButtons.appendChild(buildNextButton());
    wrapper.appendChild(sideButtons);
  }
}
function buildThresholdList() {
  var t = [];
  for (var i = 0; i <= 1; i += 0.05) {
    t.push(i);
  }
  return t;
}
function setupStatusObserver(scroller) {
  if (scroller._statusObserver) {
    scroller._statusObserver.disconnect();
  }
  var observer = new window.IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      var item = entry.target;
      var prev = parseFloat(item.dataset.prevRatio || 0);
      var curr = entry.intersectionRatio;
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
  }, {
    root: scroller,
    threshold: buildThresholdList()
  });
  Array.from(scroller.children).forEach(function (child) {
    return observer.observe(child);
  });
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
  Array.from(scroller.children).filter(function (el) {
    return el.classList.contains('cloned-slide');
  }).forEach(function (c) {
    try {
      c.remove();
    } catch (_unused) {
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
  new window.MutationObserver(function () {
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
    attributeFilter: ['class']
  });
  scroller.dataset.loopObserverAttached = 'true';
}
function watchChildrenForLoop(scroller) {
  if (scroller._childObserverAttached) {
    return;
  }
  var mo = new window.MutationObserver(function (mutations) {
    var realChange = mutations.some(function (m) {
      return Array.from(m.addedNodes).some(function (n) {
        return n.nodeType === 1 && !n.classList.contains('cloned-slide');
      }) || Array.from(m.removedNodes).some(function (n) {
        return n.nodeType === 1 && !n.classList.contains('cloned-slide');
      });
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
  mo.observe(scroller, {
    childList: true
  });
  scroller._childObserverAttached = true;
}
function initInfiniteLoops() {
  if (isBlockEditor()) {
    document.querySelectorAll('[data-loop-initialised="true"]').forEach(function (s) {
      if (!s.classList.contains('horizontal-scroller-loop')) {
        teardownInfiniteLoop(s);
      }
    });
  }
  document.querySelectorAll('.is-style-horizontal-scroll.horizontal-scroller-loop').forEach(setupInfiniteLoop);
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
  if (isBlockEditor() && scroller.classList.contains('wp-block-post-template')) {
    if (scroller.querySelectorAll('.wp-block-post').length) {
      initOneScroller(scroller);
      return;
    }
    var didInit = false;
    if (typeof wp !== 'undefined' && wp.data && wp.data.subscribe) {
      var unsubscribe = wp.data.subscribe(function () {
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
      var obs = new window.MutationObserver(function () {
        if (!didInit && scroller.querySelectorAll('.wp-block-post').length) {
          didInit = true;
          obs.disconnect();
          initOneScroller(scroller);
        }
      });
      obs.observe(scroller, {
        childList: true,
        subtree: true
      });
    }
    setTimeout(function () {
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
  document.querySelectorAll('.is-style-horizontal-scroll').forEach(scheduleScrollerInit);
  initInfiniteLoops();
}
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
flexlineOnEarlyReady(initScrollers);
window.addEventListener('load', initScrollers);
if (isBlockEditor()) {
  var bodyObserver = new window.MutationObserver(function (records) {
    var _iterator = _createForOfIteratorHelper(records),
      _step;
    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var rec = _step.value;
        var _iterator2 = _createForOfIteratorHelper(rec.addedNodes),
          _step2;
        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
            var node = _step2.value;
            if (node.nodeType === 1 && node.classList.contains('is-style-horizontal-scroll') && !node.dataset._scrollerInitQueued) {
              node.dataset._scrollerInitQueued = 'true';
              scheduleScrollerInit(node);
            }
          }
        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  });
  bodyObserver.observe(document.body, {
    childList: true,
    subtree: true
  });
  wp.domReady(function () {
    var t;
    wp.data.subscribe(function () {
      clearTimeout(t);
      t = setTimeout(function () {
        return initScrollers();
      }, 200);
    });
  });
}
/******/ })()
;