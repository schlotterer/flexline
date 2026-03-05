/******/ (function() { // webpackBootstrap
/*!*************************************!*\
  !*** ./src/js/visibility-toggle.js ***!
  \*************************************/
(function () {
  var buildTargetVariants = function buildTargetVariants(value) {
    var slug = (typeof value === 'string' ? value.trim() : '') || '';
    if (!slug) {
      return [];
    }
    return [slug];
  };
  var panelMatchesTarget = function panelMatchesTarget(panel, variants) {
    if (!variants.length) {
      return false;
    }
    return variants.some(function (variant) {
      var _panel$dataset;
      if (!variant) {
        return false;
      }
      if (panel.classList.contains(variant) || panel.id === variant || ((_panel$dataset = panel.dataset) === null || _panel$dataset === void 0 ? void 0 : _panel$dataset.toggleTarget) === variant) {
        return true;
      }
      return false;
    });
  };
  var getInteractiveTarget = function getInteractiveTarget(button) {
    if (!button) {
      return null;
    }
    if (button.matches('a, button')) {
      return button;
    }
    return button.querySelector('a, button');
  };
  var getTargetValue = function getTargetValue(button) {
    var _button$dataset;
    var interactive = getInteractiveTarget(button);
    if (interactive) {
      var _interactive$dataset;
      var interactiveValue = ((_interactive$dataset = interactive.dataset) === null || _interactive$dataset === void 0 ? void 0 : _interactive$dataset.toggleTarget) || interactive.getAttribute('data-toggle-target') || interactive.id;
      if (interactiveValue) {
        return interactiveValue;
      }
    }
    if ((_button$dataset = button.dataset) !== null && _button$dataset !== void 0 && _button$dataset.toggleTarget) {
      return button.dataset.toggleTarget;
    }
    return button.id;
  };
  var activateGroup = function activateGroup(group, button) {
    var buttons = group.querySelectorAll('.visibility-toggle');
    var panels = group.querySelectorAll('.toggle-is-visible, .toggle-is-hidden');
    var targetValue = getTargetValue(button);
    var targetVariants = buildTargetVariants(targetValue);
    if (!targetVariants.length || !buttons.length || !panels.length) {
      return;
    }
    buttons.forEach(function (btn) {
      var isActive = btn === button;
      var interactive = getInteractiveTarget(btn);
      btn.classList.remove('active');
      btn.classList.toggle('toggle-active', isActive);
      if (btn.matches('button, [role="button"]')) {
        btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
      } else {
        btn.removeAttribute('aria-pressed');
      }
      if (interactive) {
        if (interactive !== btn) {
          interactive.classList.remove('active');
          interactive.classList.toggle('toggle-active', isActive);
        }
        if (interactive.tagName === 'A' && !interactive.hasAttribute('role')) {
          interactive.setAttribute('role', 'button');
        }
        interactive.setAttribute('aria-pressed', isActive ? 'true' : 'false');
      }
    });
    panels.forEach(function (panel) {
      var matches = panelMatchesTarget(panel, targetVariants);
      panel.classList.toggle('toggle-is-visible', matches);
      panel.classList.toggle('toggle-is-hidden', !matches);
    });
  };
  var initGroup = function initGroup(group) {
    if (!group) {
      return;
    }
    var buttons = group.querySelectorAll('.visibility-toggle');
    var panels = group.querySelectorAll('.toggle-is-visible, .toggle-is-hidden');
    if (!buttons.length || !panels.length) {
      return;
    }
    var activeButton = Array.from(buttons).find(function (button) {
      return button.classList.contains('toggle-active') || button.classList.contains('active');
    }) || buttons[0];
    if (activeButton) {
      activateGroup(group, activeButton);
    }
  };
  var initAllGroups = function initAllGroups() {
    document.querySelectorAll('.visibility-toggle-group').forEach(initGroup);
  };
  document.addEventListener('click', function (event) {
    var button = event.target.closest('.visibility-toggle-group .visibility-toggle');
    if (!button) {
      return;
    }
    var group = button.closest('.visibility-toggle-group');
    if (!group) {
      return;
    }
    var interactive = getInteractiveTarget(button);
    if (interactive && interactive.tagName === 'A') {
      event.preventDefault();
    }
    activateGroup(group, button);
  });
  var observeNewGroups = function observeNewGroups() {
    var Observer = typeof window !== 'undefined' ? window.MutationObserver || window.WebKitMutationObserver : undefined;
    if (!Observer) {
      return;
    }
    var observer = new Observer(function (mutations) {
      var shouldInit = false;
      mutations.forEach(function (mutation) {
        if (shouldInit) {
          return;
        }
        mutation.addedNodes.forEach(function (node) {
          if (shouldInit || node.nodeType !== 1) {
            return;
          }
          var element = node;
          if (element.matches && element.matches('.visibility-toggle-group, .visibility-toggle, .toggle-is-visible, .toggle-is-hidden')) {
            shouldInit = true;
            return;
          }
          if (element.querySelector && element.querySelector('.visibility-toggle-group, .visibility-toggle, .toggle-is-visible, .toggle-is-hidden')) {
            shouldInit = true;
          }
        });
      });
      if (shouldInit) {
        initAllGroups();
      }
    });
    if (document.body) {
      observer.observe(document.body, {
        childList: true,
        subtree: true
      });
    }
  };
  var initRuntime = function initRuntime() {
    initAllGroups();
    observeNewGroups();
  };
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
  flexlineOnEarlyReady(initRuntime);
})();
/******/ })()
;