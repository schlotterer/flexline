/******/ (function() { // webpackBootstrap
/*!*********************************************!*\
  !*** ./src/js/template-pattern-inserter.js ***!
  \*********************************************/
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
// assets/js/template-switcher.js
// -----------------------------------------------------------------------------
// Starter Pattern Injector – user-initiated only + modal: Replace / Prepend / Don't Insert
// -----------------------------------------------------------------------------
// • Listens only to *user edits* of the Template (getPostEdits().template),
//   never the initial load.
// • Fetches UI-created starters (wp_block CPT) via resolveSelect.
// • If the canvas is pristine → auto Replace.
// • If not pristine → show a wp.components.Modal asking: Replace / Prepend / Don't insert.
// -----------------------------------------------------------------------------
(function () {
  var _wp$data = wp.data,
    select = _wp$data.select,
    resolveSelect = _wp$data.resolveSelect,
    subscribe = _wp$data.subscribe,
    dispatch = _wp$data.dispatch;
  var parse = wp.blocks.parse;
  var _wp$element = wp.element,
    h = _wp$element.createElement,
    createRoot = _wp$element.createRoot,
    render = _wp$element.render,
    unmountComponentAtNode = _wp$element.unmountComponentAtNode;
  var _wp$components = wp.components,
    Modal = _wp$components.Modal,
    Button = _wp$components.Button,
    Flex = _wp$components.Flex;
  var isEditorReady = function isEditorReady() {
    var ep = select('core/edit-post');
    return ep && typeof ep.isEditorReady === 'function' ? ep.isEditorReady() : true;
  };
  var getEditedTemplate = function getEditedTemplate() {
    var _select$getPostEdits;
    return (_select$getPostEdits = select('core/editor').getPostEdits()) === null || _select$getPostEdits === void 0 ? void 0 : _select$getPostEdits.template;
  }; // user edit only
  var getCurrentTemplate = function getCurrentTemplate() {
    return select('core/editor').getEditedPostAttribute('template');
  };
  var getPostId = function getPostId() {
    return select('core/editor').getCurrentPostId();
  };

  /**
   * Fetch a wp_block by slug (post_name).
   * @param slug
   */
  var fetchStarter = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(slug) {
      var records;
      return _regenerator().w(function (_context) {
        while (1) switch (_context.n) {
          case 0:
            _context.n = 1;
            return resolveSelect('core').getEntityRecords('postType', 'wp_block', {
              per_page: -1,
              status: 'publish',
              slug: slug
            });
          case 1:
            records = _context.v;
            return _context.a(2, records === null || records === void 0 ? void 0 : records[0]);
        }
      }, _callee);
    }));
    return function fetchStarter(_x) {
      return _ref.apply(this, arguments);
    };
  }();

  /**
   * Canvas considered empty?
   * @param blocks
   */
  var isPristine = function isPristine(blocks) {
    var _blocks$0$attributes;
    if (!blocks || blocks.length === 0) {
      return true;
    }
    if (blocks.length === 1 && blocks[0].name === 'core/paragraph' && (!((_blocks$0$attributes = blocks[0].attributes) !== null && _blocks$0$attributes !== void 0 && _blocks$0$attributes.content) || String(blocks[0].attributes.content).trim() === '')) {
      return true;
    }
    return blocks.every(function (b) {
      return b.name === 'core/null';
    });
  };

  /**
   * Modal prompt – returns 'replace' | 'prepend' | 'cancel'
   * @param starterSlug
   */
  var promptAction = function promptAction(starterSlug) {
    return new Promise(function (resolve) {
      var container = document.createElement('div');
      document.body.appendChild(container);
      var close = function close(value) {
        try {
          if (createRoot && container._root) {
            container._root.unmount();
          } else {
            unmountComponentAtNode === null || unmountComponentAtNode === void 0 || unmountComponentAtNode(container);
          }
        } catch (_unused) {}
        container.remove();
        resolve(value);
      };
      var UI = function UI() {
        return h(Modal, {
          title: 'Apply the starter content?',
          onRequestClose: function onRequestClose() {
            return close('cancel');
          }
        }, [h('p', {
          style: {
            marginTop: 0
          }
        }, "Pattern - ".concat(starterSlug)), h(Flex, {
          gap: '8px',
          style: {
            marginTop: '12px'
          }
        }, [h(Button, {
          variant: 'primary',
          onClick: function onClick() {
            return close('replace');
          }
        }, 'Replace'), h(Button, {
          variant: 'primary',
          onClick: function onClick() {
            return close('prepend');
          }
        }, 'Prepend'), h(Button, {
          variant: 'secondary',
          onClick: function onClick() {
            return close('cancel');
          }
        }, "Don't insert")])]);
      };
      if (createRoot) {
        container._root = createRoot(container);
        container._root.render(h(UI));
      } else {
        // Fallback for older WP where createRoot isn't available
        (render || wp.element.render)(h(UI), container);
      }
    });
  };

  // ────────────────────────────────────────────────────────────────────────────
  //  Subscriber – reacts only to *user* template edits
  // ────────────────────────────────────────────────────────────────────────────
  var lastEditedTemplate = null; // last value seen in getPostEdits().template
  var busy = false;
  var processed = new Set(); // per-session postId:template

  subscribe(/*#__PURE__*/_asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee2() {
    var _starter$content, _starter$content2;
    var editedTemplate, postId, key, starterSlug, starter, markup, newBlocks, blocksInEd, action, idsToRemove;
    return _regenerator().w(function (_context2) {
      while (1) switch (_context2.n) {
        case 0:
          if (isEditorReady()) {
            _context2.n = 1;
            break;
          }
          return _context2.a(2);
        case 1:
          editedTemplate = getEditedTemplate();
          if (!(!editedTemplate || editedTemplate === lastEditedTemplate || busy)) {
            _context2.n = 2;
            break;
          }
          return _context2.a(2);
        case 2:
          lastEditedTemplate = editedTemplate; // lock to this user action
          postId = getPostId();
          key = "".concat(postId, ":").concat(editedTemplate);
          if (!processed.has(key)) {
            _context2.n = 3;
            break;
          }
          return _context2.a(2);
        case 3:
          // already handled this exact edit

          busy = true;
          starterSlug = "".concat(editedTemplate, "-starter");
          _context2.n = 4;
          return fetchStarter(starterSlug);
        case 4:
          starter = _context2.v;
          if (starter) {
            _context2.n = 5;
            break;
          }
          processed.add(key);
          busy = false;
          return _context2.a(2);
        case 5:
          markup = typeof starter.content === 'string' ? starter.content : ((_starter$content = starter.content) === null || _starter$content === void 0 ? void 0 : _starter$content.raw) || ((_starter$content2 = starter.content) === null || _starter$content2 === void 0 ? void 0 : _starter$content2.rendered) || starter.post_content || '';
          if (markup) {
            _context2.n = 6;
            break;
          }
          processed.add(key);
          busy = false;
          return _context2.a(2);
        case 6:
          newBlocks = parse(markup);
          blocksInEd = select('core/block-editor').getBlocks();
          action = 'replace';
          if (isPristine(blocksInEd)) {
            _context2.n = 8;
            break;
          }
          _context2.n = 7;
          return promptAction(starterSlug);
        case 7:
          action = _context2.v;
        case 8:
          if (!(action === 'cancel')) {
            _context2.n = 9;
            break;
          }
          busy = false;
          return _context2.a(2);
        case 9:
          if (action === 'replace') {
            idsToRemove = blocksInEd.map(function (b) {
              return b.clientId;
            });
            if (idsToRemove.length) {
              dispatch('core/block-editor').removeBlocks(idsToRemove, true);
            }
            dispatch('core/block-editor').insertBlocks(newBlocks, 0);
          } else if (action === 'prepend') {
            dispatch('core/block-editor').insertBlocks(newBlocks, 0);
          }
          processed.add(key);
          busy = false;
        case 10:
          return _context2.a(2);
      }
    }, _callee2);
  })));
})();
/******/ })()
;