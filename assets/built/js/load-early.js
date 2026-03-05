/******/ (function() { // webpackBootstrap
/*!******************************!*\
  !*** ./src/js/load-early.js ***!
  \******************************/
(function () {
  var root = document.documentElement;
  if (!root) {
    return;
  }
  var flexline = window.Flexline || (window.Flexline = {});
  if (typeof flexline.onReady !== 'function') {
    flexline.onReady = function (callback) {
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, {
          once: true
        });
      } else {
        callback();
      }
    };
  }
  if (!flexline.earlyReady) {
    var resolved = false;
    var resolveEarly;
    flexline.earlyReady = new Promise(function (resolve) {
      resolveEarly = resolve;
    });
    flexline.resolveEarly = function () {
      if (resolved) {
        return;
      }
      resolved = true;
      resolveEarly();
      document.dispatchEvent(new CustomEvent('flexline:early-ready'));
    };
  }
  if (typeof flexline.onEarlyReady !== 'function') {
    flexline.onEarlyReady = function (callback) {
      if (flexline.earlyReady && flexline.earlyReady.then) {
        flexline.earlyReady.then(callback);
      } else {
        flexline.onReady(callback);
      }
    };
  }
  if (typeof flexline.getHeaderHeight !== 'function') {
    flexline.getHeaderHeight = function () {
      var raw = window.getComputedStyle(root).getPropertyValue('--header-site-header-height').trim();
      var parsed = Number.parseFloat(raw);
      if (!Number.isNaN(parsed)) {
        return parsed;
      }
      var header = document.querySelector('header.site-header');
      return header ? header.offsetHeight : 0;
    };
  }
  var updateHeaderMetrics = function updateHeaderMetrics() {
    var headerSiteHeader = document.querySelector('header.site-header');
    var mainContent = document.querySelector('.wp-site-blocks > main');
    var body = document.body;
    var headerHeight = headerSiteHeader ? headerSiteHeader.offsetHeight : 0;
    root.style.setProperty('--header-site-header-height', "".concat(headerHeight, "px"));
    if (mainContent) {
      if (headerSiteHeader && !headerSiteHeader.classList.contains('is-position-absolute') && body.classList.contains('headroom-in-use')) {
        mainContent.style.paddingTop = "".concat(headerHeight, "px");
      } else {
        mainContent.style.paddingTop = '';
      }
    }
    flexline.headerHeight = headerHeight;
    document.dispatchEvent(new CustomEvent('flexline:header-metrics', {
      detail: {
        headerHeight: headerHeight
      }
    }));
  };
  flexline.onReady(function () {
    updateHeaderMetrics();
    window.addEventListener('resize', updateHeaderMetrics);
    if (typeof flexline.resolveEarly === 'function') {
      flexline.resolveEarly();
    }
  });
})();
/******/ })()
;