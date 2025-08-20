/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/react/cjs/react-jsx-runtime.development.js":
/*!*****************************************************************!*\
  !*** ./node_modules/react/cjs/react-jsx-runtime.development.js ***!
  \*****************************************************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {

/**
 * @license React
 * react-jsx-runtime.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



if (true) {
  (function() {
'use strict';

var React = __webpack_require__(/*! react */ "react");

// ATTENTION
// When adding new symbols to this file,
// Please consider also adding to 'react-devtools-shared/src/backend/ReactSymbols'
// The Symbol used to tag the ReactElement-like types.
var REACT_ELEMENT_TYPE = Symbol.for('react.element');
var REACT_PORTAL_TYPE = Symbol.for('react.portal');
var REACT_FRAGMENT_TYPE = Symbol.for('react.fragment');
var REACT_STRICT_MODE_TYPE = Symbol.for('react.strict_mode');
var REACT_PROFILER_TYPE = Symbol.for('react.profiler');
var REACT_PROVIDER_TYPE = Symbol.for('react.provider');
var REACT_CONTEXT_TYPE = Symbol.for('react.context');
var REACT_FORWARD_REF_TYPE = Symbol.for('react.forward_ref');
var REACT_SUSPENSE_TYPE = Symbol.for('react.suspense');
var REACT_SUSPENSE_LIST_TYPE = Symbol.for('react.suspense_list');
var REACT_MEMO_TYPE = Symbol.for('react.memo');
var REACT_LAZY_TYPE = Symbol.for('react.lazy');
var REACT_OFFSCREEN_TYPE = Symbol.for('react.offscreen');
var MAYBE_ITERATOR_SYMBOL = Symbol.iterator;
var FAUX_ITERATOR_SYMBOL = '@@iterator';
function getIteratorFn(maybeIterable) {
  if (maybeIterable === null || typeof maybeIterable !== 'object') {
    return null;
  }

  var maybeIterator = MAYBE_ITERATOR_SYMBOL && maybeIterable[MAYBE_ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL];

  if (typeof maybeIterator === 'function') {
    return maybeIterator;
  }

  return null;
}

var ReactSharedInternals = React.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;

function error(format) {
  {
    {
      for (var _len2 = arguments.length, args = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
        args[_key2 - 1] = arguments[_key2];
      }

      printWarning('error', format, args);
    }
  }
}

function printWarning(level, format, args) {
  // When changing this logic, you might want to also
  // update consoleWithStackDev.www.js as well.
  {
    var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;
    var stack = ReactDebugCurrentFrame.getStackAddendum();

    if (stack !== '') {
      format += '%s';
      args = args.concat([stack]);
    } // eslint-disable-next-line react-internal/safe-string-coercion


    var argsWithFormat = args.map(function (item) {
      return String(item);
    }); // Careful: RN currently depends on this prefix

    argsWithFormat.unshift('Warning: ' + format); // We intentionally don't use spread (or .apply) directly because it
    // breaks IE9: https://github.com/facebook/react/issues/13610
    // eslint-disable-next-line react-internal/no-production-logging

    Function.prototype.apply.call(console[level], console, argsWithFormat);
  }
}

// -----------------------------------------------------------------------------

var enableScopeAPI = false; // Experimental Create Event Handle API.
var enableCacheElement = false;
var enableTransitionTracing = false; // No known bugs, but needs performance testing

var enableLegacyHidden = false; // Enables unstable_avoidThisFallback feature in Fiber
// stuff. Intended to enable React core members to more easily debug scheduling
// issues in DEV builds.

var enableDebugTracing = false; // Track which Fiber(s) schedule render work.

var REACT_MODULE_REFERENCE;

{
  REACT_MODULE_REFERENCE = Symbol.for('react.module.reference');
}

function isValidElementType(type) {
  if (typeof type === 'string' || typeof type === 'function') {
    return true;
  } // Note: typeof might be other than 'symbol' or 'number' (e.g. if it's a polyfill).


  if (type === REACT_FRAGMENT_TYPE || type === REACT_PROFILER_TYPE || enableDebugTracing  || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || enableLegacyHidden  || type === REACT_OFFSCREEN_TYPE || enableScopeAPI  || enableCacheElement  || enableTransitionTracing ) {
    return true;
  }

  if (typeof type === 'object' && type !== null) {
    if (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || // This needs to include all possible module reference object
    // types supported by any Flight configuration anywhere since
    // we don't know which Flight build this will end up being used
    // with.
    type.$$typeof === REACT_MODULE_REFERENCE || type.getModuleId !== undefined) {
      return true;
    }
  }

  return false;
}

function getWrappedName(outerType, innerType, wrapperName) {
  var displayName = outerType.displayName;

  if (displayName) {
    return displayName;
  }

  var functionName = innerType.displayName || innerType.name || '';
  return functionName !== '' ? wrapperName + "(" + functionName + ")" : wrapperName;
} // Keep in sync with react-reconciler/getComponentNameFromFiber


function getContextName(type) {
  return type.displayName || 'Context';
} // Note that the reconciler package should generally prefer to use getComponentNameFromFiber() instead.


function getComponentNameFromType(type) {
  if (type == null) {
    // Host root, text node or just invalid type.
    return null;
  }

  {
    if (typeof type.tag === 'number') {
      error('Received an unexpected object in getComponentNameFromType(). ' + 'This is likely a bug in React. Please file an issue.');
    }
  }

  if (typeof type === 'function') {
    return type.displayName || type.name || null;
  }

  if (typeof type === 'string') {
    return type;
  }

  switch (type) {
    case REACT_FRAGMENT_TYPE:
      return 'Fragment';

    case REACT_PORTAL_TYPE:
      return 'Portal';

    case REACT_PROFILER_TYPE:
      return 'Profiler';

    case REACT_STRICT_MODE_TYPE:
      return 'StrictMode';

    case REACT_SUSPENSE_TYPE:
      return 'Suspense';

    case REACT_SUSPENSE_LIST_TYPE:
      return 'SuspenseList';

  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_CONTEXT_TYPE:
        var context = type;
        return getContextName(context) + '.Consumer';

      case REACT_PROVIDER_TYPE:
        var provider = type;
        return getContextName(provider._context) + '.Provider';

      case REACT_FORWARD_REF_TYPE:
        return getWrappedName(type, type.render, 'ForwardRef');

      case REACT_MEMO_TYPE:
        var outerName = type.displayName || null;

        if (outerName !== null) {
          return outerName;
        }

        return getComponentNameFromType(type.type) || 'Memo';

      case REACT_LAZY_TYPE:
        {
          var lazyComponent = type;
          var payload = lazyComponent._payload;
          var init = lazyComponent._init;

          try {
            return getComponentNameFromType(init(payload));
          } catch (x) {
            return null;
          }
        }

      // eslint-disable-next-line no-fallthrough
    }
  }

  return null;
}

var assign = Object.assign;

// Helpers to patch console.logs to avoid logging during side-effect free
// replaying on render function. This currently only patches the object
// lazily which won't cover if the log function was extracted eagerly.
// We could also eagerly patch the method.
var disabledDepth = 0;
var prevLog;
var prevInfo;
var prevWarn;
var prevError;
var prevGroup;
var prevGroupCollapsed;
var prevGroupEnd;

function disabledLog() {}

disabledLog.__reactDisabledLog = true;
function disableLogs() {
  {
    if (disabledDepth === 0) {
      /* eslint-disable react-internal/no-production-logging */
      prevLog = console.log;
      prevInfo = console.info;
      prevWarn = console.warn;
      prevError = console.error;
      prevGroup = console.group;
      prevGroupCollapsed = console.groupCollapsed;
      prevGroupEnd = console.groupEnd; // https://github.com/facebook/react/issues/19099

      var props = {
        configurable: true,
        enumerable: true,
        value: disabledLog,
        writable: true
      }; // $FlowFixMe Flow thinks console is immutable.

      Object.defineProperties(console, {
        info: props,
        log: props,
        warn: props,
        error: props,
        group: props,
        groupCollapsed: props,
        groupEnd: props
      });
      /* eslint-enable react-internal/no-production-logging */
    }

    disabledDepth++;
  }
}
function reenableLogs() {
  {
    disabledDepth--;

    if (disabledDepth === 0) {
      /* eslint-disable react-internal/no-production-logging */
      var props = {
        configurable: true,
        enumerable: true,
        writable: true
      }; // $FlowFixMe Flow thinks console is immutable.

      Object.defineProperties(console, {
        log: assign({}, props, {
          value: prevLog
        }),
        info: assign({}, props, {
          value: prevInfo
        }),
        warn: assign({}, props, {
          value: prevWarn
        }),
        error: assign({}, props, {
          value: prevError
        }),
        group: assign({}, props, {
          value: prevGroup
        }),
        groupCollapsed: assign({}, props, {
          value: prevGroupCollapsed
        }),
        groupEnd: assign({}, props, {
          value: prevGroupEnd
        })
      });
      /* eslint-enable react-internal/no-production-logging */
    }

    if (disabledDepth < 0) {
      error('disabledDepth fell below zero. ' + 'This is a bug in React. Please file an issue.');
    }
  }
}

var ReactCurrentDispatcher = ReactSharedInternals.ReactCurrentDispatcher;
var prefix;
function describeBuiltInComponentFrame(name, source, ownerFn) {
  {
    if (prefix === undefined) {
      // Extract the VM specific prefix used by each line.
      try {
        throw Error();
      } catch (x) {
        var match = x.stack.trim().match(/\n( *(at )?)/);
        prefix = match && match[1] || '';
      }
    } // We use the prefix to ensure our stacks line up with native stack frames.


    return '\n' + prefix + name;
  }
}
var reentry = false;
var componentFrameCache;

{
  var PossiblyWeakMap = typeof WeakMap === 'function' ? WeakMap : Map;
  componentFrameCache = new PossiblyWeakMap();
}

function describeNativeComponentFrame(fn, construct) {
  // If something asked for a stack inside a fake render, it should get ignored.
  if ( !fn || reentry) {
    return '';
  }

  {
    var frame = componentFrameCache.get(fn);

    if (frame !== undefined) {
      return frame;
    }
  }

  var control;
  reentry = true;
  var previousPrepareStackTrace = Error.prepareStackTrace; // $FlowFixMe It does accept undefined.

  Error.prepareStackTrace = undefined;
  var previousDispatcher;

  {
    previousDispatcher = ReactCurrentDispatcher.current; // Set the dispatcher in DEV because this might be call in the render function
    // for warnings.

    ReactCurrentDispatcher.current = null;
    disableLogs();
  }

  try {
    // This should throw.
    if (construct) {
      // Something should be setting the props in the constructor.
      var Fake = function () {
        throw Error();
      }; // $FlowFixMe


      Object.defineProperty(Fake.prototype, 'props', {
        set: function () {
          // We use a throwing setter instead of frozen or non-writable props
          // because that won't throw in a non-strict mode function.
          throw Error();
        }
      });

      if (typeof Reflect === 'object' && Reflect.construct) {
        // We construct a different control for this case to include any extra
        // frames added by the construct call.
        try {
          Reflect.construct(Fake, []);
        } catch (x) {
          control = x;
        }

        Reflect.construct(fn, [], Fake);
      } else {
        try {
          Fake.call();
        } catch (x) {
          control = x;
        }

        fn.call(Fake.prototype);
      }
    } else {
      try {
        throw Error();
      } catch (x) {
        control = x;
      }

      fn();
    }
  } catch (sample) {
    // This is inlined manually because closure doesn't do it for us.
    if (sample && control && typeof sample.stack === 'string') {
      // This extracts the first frame from the sample that isn't also in the control.
      // Skipping one frame that we assume is the frame that calls the two.
      var sampleLines = sample.stack.split('\n');
      var controlLines = control.stack.split('\n');
      var s = sampleLines.length - 1;
      var c = controlLines.length - 1;

      while (s >= 1 && c >= 0 && sampleLines[s] !== controlLines[c]) {
        // We expect at least one stack frame to be shared.
        // Typically this will be the root most one. However, stack frames may be
        // cut off due to maximum stack limits. In this case, one maybe cut off
        // earlier than the other. We assume that the sample is longer or the same
        // and there for cut off earlier. So we should find the root most frame in
        // the sample somewhere in the control.
        c--;
      }

      for (; s >= 1 && c >= 0; s--, c--) {
        // Next we find the first one that isn't the same which should be the
        // frame that called our sample function and the control.
        if (sampleLines[s] !== controlLines[c]) {
          // In V8, the first line is describing the message but other VMs don't.
          // If we're about to return the first line, and the control is also on the same
          // line, that's a pretty good indicator that our sample threw at same line as
          // the control. I.e. before we entered the sample frame. So we ignore this result.
          // This can happen if you passed a class to function component, or non-function.
          if (s !== 1 || c !== 1) {
            do {
              s--;
              c--; // We may still have similar intermediate frames from the construct call.
              // The next one that isn't the same should be our match though.

              if (c < 0 || sampleLines[s] !== controlLines[c]) {
                // V8 adds a "new" prefix for native classes. Let's remove it to make it prettier.
                var _frame = '\n' + sampleLines[s].replace(' at new ', ' at '); // If our component frame is labeled "<anonymous>"
                // but we have a user-provided "displayName"
                // splice it in to make the stack more readable.


                if (fn.displayName && _frame.includes('<anonymous>')) {
                  _frame = _frame.replace('<anonymous>', fn.displayName);
                }

                {
                  if (typeof fn === 'function') {
                    componentFrameCache.set(fn, _frame);
                  }
                } // Return the line we found.


                return _frame;
              }
            } while (s >= 1 && c >= 0);
          }

          break;
        }
      }
    }
  } finally {
    reentry = false;

    {
      ReactCurrentDispatcher.current = previousDispatcher;
      reenableLogs();
    }

    Error.prepareStackTrace = previousPrepareStackTrace;
  } // Fallback to just using the name if we couldn't make it throw.


  var name = fn ? fn.displayName || fn.name : '';
  var syntheticFrame = name ? describeBuiltInComponentFrame(name) : '';

  {
    if (typeof fn === 'function') {
      componentFrameCache.set(fn, syntheticFrame);
    }
  }

  return syntheticFrame;
}
function describeFunctionComponentFrame(fn, source, ownerFn) {
  {
    return describeNativeComponentFrame(fn, false);
  }
}

function shouldConstruct(Component) {
  var prototype = Component.prototype;
  return !!(prototype && prototype.isReactComponent);
}

function describeUnknownElementTypeFrameInDEV(type, source, ownerFn) {

  if (type == null) {
    return '';
  }

  if (typeof type === 'function') {
    {
      return describeNativeComponentFrame(type, shouldConstruct(type));
    }
  }

  if (typeof type === 'string') {
    return describeBuiltInComponentFrame(type);
  }

  switch (type) {
    case REACT_SUSPENSE_TYPE:
      return describeBuiltInComponentFrame('Suspense');

    case REACT_SUSPENSE_LIST_TYPE:
      return describeBuiltInComponentFrame('SuspenseList');
  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_FORWARD_REF_TYPE:
        return describeFunctionComponentFrame(type.render);

      case REACT_MEMO_TYPE:
        // Memo may contain any component type so we recursively resolve it.
        return describeUnknownElementTypeFrameInDEV(type.type, source, ownerFn);

      case REACT_LAZY_TYPE:
        {
          var lazyComponent = type;
          var payload = lazyComponent._payload;
          var init = lazyComponent._init;

          try {
            // Lazy may contain any component type so we recursively resolve it.
            return describeUnknownElementTypeFrameInDEV(init(payload), source, ownerFn);
          } catch (x) {}
        }
    }
  }

  return '';
}

var hasOwnProperty = Object.prototype.hasOwnProperty;

var loggedTypeFailures = {};
var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;

function setCurrentlyValidatingElement(element) {
  {
    if (element) {
      var owner = element._owner;
      var stack = describeUnknownElementTypeFrameInDEV(element.type, element._source, owner ? owner.type : null);
      ReactDebugCurrentFrame.setExtraStackFrame(stack);
    } else {
      ReactDebugCurrentFrame.setExtraStackFrame(null);
    }
  }
}

function checkPropTypes(typeSpecs, values, location, componentName, element) {
  {
    // $FlowFixMe This is okay but Flow doesn't know it.
    var has = Function.call.bind(hasOwnProperty);

    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error$1 = void 0; // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.

        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            // eslint-disable-next-line react-internal/prod-error-codes
            var err = Error((componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' + 'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.' + 'This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.');
            err.name = 'Invariant Violation';
            throw err;
          }

          error$1 = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED');
        } catch (ex) {
          error$1 = ex;
        }

        if (error$1 && !(error$1 instanceof Error)) {
          setCurrentlyValidatingElement(element);

          error('%s: type specification of %s' + ' `%s` is invalid; the type checker ' + 'function must return `null` or an `Error` but returned a %s. ' + 'You may have forgotten to pass an argument to the type checker ' + 'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' + 'shape all require an argument).', componentName || 'React class', location, typeSpecName, typeof error$1);

          setCurrentlyValidatingElement(null);
        }

        if (error$1 instanceof Error && !(error$1.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error$1.message] = true;
          setCurrentlyValidatingElement(element);

          error('Failed %s type: %s', location, error$1.message);

          setCurrentlyValidatingElement(null);
        }
      }
    }
  }
}

var isArrayImpl = Array.isArray; // eslint-disable-next-line no-redeclare

function isArray(a) {
  return isArrayImpl(a);
}

/*
 * The `'' + value` pattern (used in in perf-sensitive code) throws for Symbol
 * and Temporal.* types. See https://github.com/facebook/react/pull/22064.
 *
 * The functions in this module will throw an easier-to-understand,
 * easier-to-debug exception with a clear errors message message explaining the
 * problem. (Instead of a confusing exception thrown inside the implementation
 * of the `value` object).
 */
// $FlowFixMe only called in DEV, so void return is not possible.
function typeName(value) {
  {
    // toStringTag is needed for namespaced types like Temporal.Instant
    var hasToStringTag = typeof Symbol === 'function' && Symbol.toStringTag;
    var type = hasToStringTag && value[Symbol.toStringTag] || value.constructor.name || 'Object';
    return type;
  }
} // $FlowFixMe only called in DEV, so void return is not possible.


function willCoercionThrow(value) {
  {
    try {
      testStringCoercion(value);
      return false;
    } catch (e) {
      return true;
    }
  }
}

function testStringCoercion(value) {
  // If you ended up here by following an exception call stack, here's what's
  // happened: you supplied an object or symbol value to React (as a prop, key,
  // DOM attribute, CSS property, string ref, etc.) and when React tried to
  // coerce it to a string using `'' + value`, an exception was thrown.
  //
  // The most common types that will cause this exception are `Symbol` instances
  // and Temporal objects like `Temporal.Instant`. But any object that has a
  // `valueOf` or `[Symbol.toPrimitive]` method that throws will also cause this
  // exception. (Library authors do this to prevent users from using built-in
  // numeric operators like `+` or comparison operators like `>=` because custom
  // methods are needed to perform accurate arithmetic or comparison.)
  //
  // To fix the problem, coerce this object or symbol value to a string before
  // passing it to React. The most reliable way is usually `String(value)`.
  //
  // To find which value is throwing, check the browser or debugger console.
  // Before this exception was thrown, there should be `console.error` output
  // that shows the type (Symbol, Temporal.PlainDate, etc.) that caused the
  // problem and how that type was used: key, atrribute, input value prop, etc.
  // In most cases, this console output also shows the component and its
  // ancestor components where the exception happened.
  //
  // eslint-disable-next-line react-internal/safe-string-coercion
  return '' + value;
}
function checkKeyStringCoercion(value) {
  {
    if (willCoercionThrow(value)) {
      error('The provided key is an unsupported type %s.' + ' This value must be coerced to a string before before using it here.', typeName(value));

      return testStringCoercion(value); // throw (to help callers find troubleshooting comments)
    }
  }
}

var ReactCurrentOwner = ReactSharedInternals.ReactCurrentOwner;
var RESERVED_PROPS = {
  key: true,
  ref: true,
  __self: true,
  __source: true
};
var specialPropKeyWarningShown;
var specialPropRefWarningShown;
var didWarnAboutStringRefs;

{
  didWarnAboutStringRefs = {};
}

function hasValidRef(config) {
  {
    if (hasOwnProperty.call(config, 'ref')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'ref').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.ref !== undefined;
}

function hasValidKey(config) {
  {
    if (hasOwnProperty.call(config, 'key')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'key').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.key !== undefined;
}

function warnIfStringRefCannotBeAutoConverted(config, self) {
  {
    if (typeof config.ref === 'string' && ReactCurrentOwner.current && self && ReactCurrentOwner.current.stateNode !== self) {
      var componentName = getComponentNameFromType(ReactCurrentOwner.current.type);

      if (!didWarnAboutStringRefs[componentName]) {
        error('Component "%s" contains the string ref "%s". ' + 'Support for string refs will be removed in a future major release. ' + 'This case cannot be automatically converted to an arrow function. ' + 'We ask you to manually fix this case by using useRef() or createRef() instead. ' + 'Learn more about using refs safely here: ' + 'https://reactjs.org/link/strict-mode-string-ref', getComponentNameFromType(ReactCurrentOwner.current.type), config.ref);

        didWarnAboutStringRefs[componentName] = true;
      }
    }
  }
}

function defineKeyPropWarningGetter(props, displayName) {
  {
    var warnAboutAccessingKey = function () {
      if (!specialPropKeyWarningShown) {
        specialPropKeyWarningShown = true;

        error('%s: `key` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://reactjs.org/link/special-props)', displayName);
      }
    };

    warnAboutAccessingKey.isReactWarning = true;
    Object.defineProperty(props, 'key', {
      get: warnAboutAccessingKey,
      configurable: true
    });
  }
}

function defineRefPropWarningGetter(props, displayName) {
  {
    var warnAboutAccessingRef = function () {
      if (!specialPropRefWarningShown) {
        specialPropRefWarningShown = true;

        error('%s: `ref` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://reactjs.org/link/special-props)', displayName);
      }
    };

    warnAboutAccessingRef.isReactWarning = true;
    Object.defineProperty(props, 'ref', {
      get: warnAboutAccessingRef,
      configurable: true
    });
  }
}
/**
 * Factory method to create a new React element. This no longer adheres to
 * the class pattern, so do not use new to call it. Also, instanceof check
 * will not work. Instead test $$typeof field against Symbol.for('react.element') to check
 * if something is a React Element.
 *
 * @param {*} type
 * @param {*} props
 * @param {*} key
 * @param {string|object} ref
 * @param {*} owner
 * @param {*} self A *temporary* helper to detect places where `this` is
 * different from the `owner` when React.createElement is called, so that we
 * can warn. We want to get rid of owner and replace string `ref`s with arrow
 * functions, and as long as `this` and owner are the same, there will be no
 * change in behavior.
 * @param {*} source An annotation object (added by a transpiler or otherwise)
 * indicating filename, line number, and/or other information.
 * @internal
 */


var ReactElement = function (type, key, ref, self, source, owner, props) {
  var element = {
    // This tag allows us to uniquely identify this as a React Element
    $$typeof: REACT_ELEMENT_TYPE,
    // Built-in properties that belong on the element
    type: type,
    key: key,
    ref: ref,
    props: props,
    // Record the component responsible for creating this element.
    _owner: owner
  };

  {
    // The validation flag is currently mutative. We put it on
    // an external backing store so that we can freeze the whole object.
    // This can be replaced with a WeakMap once they are implemented in
    // commonly used development environments.
    element._store = {}; // To make comparing ReactElements easier for testing purposes, we make
    // the validation flag non-enumerable (where possible, which should
    // include every environment we run tests in), so the test framework
    // ignores it.

    Object.defineProperty(element._store, 'validated', {
      configurable: false,
      enumerable: false,
      writable: true,
      value: false
    }); // self and source are DEV only properties.

    Object.defineProperty(element, '_self', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: self
    }); // Two elements created in two different places should be considered
    // equal for testing purposes and therefore we hide it from enumeration.

    Object.defineProperty(element, '_source', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: source
    });

    if (Object.freeze) {
      Object.freeze(element.props);
      Object.freeze(element);
    }
  }

  return element;
};
/**
 * https://github.com/reactjs/rfcs/pull/107
 * @param {*} type
 * @param {object} props
 * @param {string} key
 */

function jsxDEV(type, config, maybeKey, source, self) {
  {
    var propName; // Reserved names are extracted

    var props = {};
    var key = null;
    var ref = null; // Currently, key can be spread in as a prop. This causes a potential
    // issue if key is also explicitly declared (ie. <div {...props} key="Hi" />
    // or <div key="Hi" {...props} /> ). We want to deprecate key spread,
    // but as an intermediary step, we will use jsxDEV for everything except
    // <div {...props} key="Hi" />, because we aren't currently able to tell if
    // key is explicitly declared to be undefined or not.

    if (maybeKey !== undefined) {
      {
        checkKeyStringCoercion(maybeKey);
      }

      key = '' + maybeKey;
    }

    if (hasValidKey(config)) {
      {
        checkKeyStringCoercion(config.key);
      }

      key = '' + config.key;
    }

    if (hasValidRef(config)) {
      ref = config.ref;
      warnIfStringRefCannotBeAutoConverted(config, self);
    } // Remaining properties are added to a new props object


    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        props[propName] = config[propName];
      }
    } // Resolve default props


    if (type && type.defaultProps) {
      var defaultProps = type.defaultProps;

      for (propName in defaultProps) {
        if (props[propName] === undefined) {
          props[propName] = defaultProps[propName];
        }
      }
    }

    if (key || ref) {
      var displayName = typeof type === 'function' ? type.displayName || type.name || 'Unknown' : type;

      if (key) {
        defineKeyPropWarningGetter(props, displayName);
      }

      if (ref) {
        defineRefPropWarningGetter(props, displayName);
      }
    }

    return ReactElement(type, key, ref, self, source, ReactCurrentOwner.current, props);
  }
}

var ReactCurrentOwner$1 = ReactSharedInternals.ReactCurrentOwner;
var ReactDebugCurrentFrame$1 = ReactSharedInternals.ReactDebugCurrentFrame;

function setCurrentlyValidatingElement$1(element) {
  {
    if (element) {
      var owner = element._owner;
      var stack = describeUnknownElementTypeFrameInDEV(element.type, element._source, owner ? owner.type : null);
      ReactDebugCurrentFrame$1.setExtraStackFrame(stack);
    } else {
      ReactDebugCurrentFrame$1.setExtraStackFrame(null);
    }
  }
}

var propTypesMisspellWarningShown;

{
  propTypesMisspellWarningShown = false;
}
/**
 * Verifies the object is a ReactElement.
 * See https://reactjs.org/docs/react-api.html#isvalidelement
 * @param {?object} object
 * @return {boolean} True if `object` is a ReactElement.
 * @final
 */


function isValidElement(object) {
  {
    return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
  }
}

function getDeclarationErrorAddendum() {
  {
    if (ReactCurrentOwner$1.current) {
      var name = getComponentNameFromType(ReactCurrentOwner$1.current.type);

      if (name) {
        return '\n\nCheck the render method of `' + name + '`.';
      }
    }

    return '';
  }
}

function getSourceInfoErrorAddendum(source) {
  {
    if (source !== undefined) {
      var fileName = source.fileName.replace(/^.*[\\\/]/, '');
      var lineNumber = source.lineNumber;
      return '\n\nCheck your code at ' + fileName + ':' + lineNumber + '.';
    }

    return '';
  }
}
/**
 * Warn if there's no key explicitly set on dynamic arrays of children or
 * object keys are not valid. This allows us to keep track of children between
 * updates.
 */


var ownerHasKeyUseWarning = {};

function getCurrentComponentErrorInfo(parentType) {
  {
    var info = getDeclarationErrorAddendum();

    if (!info) {
      var parentName = typeof parentType === 'string' ? parentType : parentType.displayName || parentType.name;

      if (parentName) {
        info = "\n\nCheck the top-level render call using <" + parentName + ">.";
      }
    }

    return info;
  }
}
/**
 * Warn if the element doesn't have an explicit key assigned to it.
 * This element is in an array. The array could grow and shrink or be
 * reordered. All children that haven't already been validated are required to
 * have a "key" property assigned to it. Error statuses are cached so a warning
 * will only be shown once.
 *
 * @internal
 * @param {ReactElement} element Element that requires a key.
 * @param {*} parentType element's parent's type.
 */


function validateExplicitKey(element, parentType) {
  {
    if (!element._store || element._store.validated || element.key != null) {
      return;
    }

    element._store.validated = true;
    var currentComponentErrorInfo = getCurrentComponentErrorInfo(parentType);

    if (ownerHasKeyUseWarning[currentComponentErrorInfo]) {
      return;
    }

    ownerHasKeyUseWarning[currentComponentErrorInfo] = true; // Usually the current owner is the offender, but if it accepts children as a
    // property, it may be the creator of the child that's responsible for
    // assigning it a key.

    var childOwner = '';

    if (element && element._owner && element._owner !== ReactCurrentOwner$1.current) {
      // Give the component that originally created this child.
      childOwner = " It was passed a child from " + getComponentNameFromType(element._owner.type) + ".";
    }

    setCurrentlyValidatingElement$1(element);

    error('Each child in a list should have a unique "key" prop.' + '%s%s See https://reactjs.org/link/warning-keys for more information.', currentComponentErrorInfo, childOwner);

    setCurrentlyValidatingElement$1(null);
  }
}
/**
 * Ensure that every element either is passed in a static location, in an
 * array with an explicit keys property defined, or in an object literal
 * with valid key property.
 *
 * @internal
 * @param {ReactNode} node Statically passed child of any type.
 * @param {*} parentType node's parent's type.
 */


function validateChildKeys(node, parentType) {
  {
    if (typeof node !== 'object') {
      return;
    }

    if (isArray(node)) {
      for (var i = 0; i < node.length; i++) {
        var child = node[i];

        if (isValidElement(child)) {
          validateExplicitKey(child, parentType);
        }
      }
    } else if (isValidElement(node)) {
      // This element was passed in a valid location.
      if (node._store) {
        node._store.validated = true;
      }
    } else if (node) {
      var iteratorFn = getIteratorFn(node);

      if (typeof iteratorFn === 'function') {
        // Entry iterators used to provide implicit keys,
        // but now we print a separate warning for them later.
        if (iteratorFn !== node.entries) {
          var iterator = iteratorFn.call(node);
          var step;

          while (!(step = iterator.next()).done) {
            if (isValidElement(step.value)) {
              validateExplicitKey(step.value, parentType);
            }
          }
        }
      }
    }
  }
}
/**
 * Given an element, validate that its props follow the propTypes definition,
 * provided by the type.
 *
 * @param {ReactElement} element
 */


function validatePropTypes(element) {
  {
    var type = element.type;

    if (type === null || type === undefined || typeof type === 'string') {
      return;
    }

    var propTypes;

    if (typeof type === 'function') {
      propTypes = type.propTypes;
    } else if (typeof type === 'object' && (type.$$typeof === REACT_FORWARD_REF_TYPE || // Note: Memo only checks outer props here.
    // Inner props are checked in the reconciler.
    type.$$typeof === REACT_MEMO_TYPE)) {
      propTypes = type.propTypes;
    } else {
      return;
    }

    if (propTypes) {
      // Intentionally inside to avoid triggering lazy initializers:
      var name = getComponentNameFromType(type);
      checkPropTypes(propTypes, element.props, 'prop', name, element);
    } else if (type.PropTypes !== undefined && !propTypesMisspellWarningShown) {
      propTypesMisspellWarningShown = true; // Intentionally inside to avoid triggering lazy initializers:

      var _name = getComponentNameFromType(type);

      error('Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?', _name || 'Unknown');
    }

    if (typeof type.getDefaultProps === 'function' && !type.getDefaultProps.isReactClassApproved) {
      error('getDefaultProps is only used on classic React.createClass ' + 'definitions. Use a static property named `defaultProps` instead.');
    }
  }
}
/**
 * Given a fragment, validate that it can only be provided with fragment props
 * @param {ReactElement} fragment
 */


function validateFragmentProps(fragment) {
  {
    var keys = Object.keys(fragment.props);

    for (var i = 0; i < keys.length; i++) {
      var key = keys[i];

      if (key !== 'children' && key !== 'key') {
        setCurrentlyValidatingElement$1(fragment);

        error('Invalid prop `%s` supplied to `React.Fragment`. ' + 'React.Fragment can only have `key` and `children` props.', key);

        setCurrentlyValidatingElement$1(null);
        break;
      }
    }

    if (fragment.ref !== null) {
      setCurrentlyValidatingElement$1(fragment);

      error('Invalid attribute `ref` supplied to `React.Fragment`.');

      setCurrentlyValidatingElement$1(null);
    }
  }
}

var didWarnAboutKeySpread = {};
function jsxWithValidation(type, props, key, isStaticChildren, source, self) {
  {
    var validType = isValidElementType(type); // We warn in this case but don't throw. We expect the element creation to
    // succeed and there will likely be errors in render.

    if (!validType) {
      var info = '';

      if (type === undefined || typeof type === 'object' && type !== null && Object.keys(type).length === 0) {
        info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and named imports.";
      }

      var sourceInfo = getSourceInfoErrorAddendum(source);

      if (sourceInfo) {
        info += sourceInfo;
      } else {
        info += getDeclarationErrorAddendum();
      }

      var typeString;

      if (type === null) {
        typeString = 'null';
      } else if (isArray(type)) {
        typeString = 'array';
      } else if (type !== undefined && type.$$typeof === REACT_ELEMENT_TYPE) {
        typeString = "<" + (getComponentNameFromType(type.type) || 'Unknown') + " />";
        info = ' Did you accidentally export a JSX literal instead of a component?';
      } else {
        typeString = typeof type;
      }

      error('React.jsx: type is invalid -- expected a string (for ' + 'built-in components) or a class/function (for composite ' + 'components) but got: %s.%s', typeString, info);
    }

    var element = jsxDEV(type, props, key, source, self); // The result can be nullish if a mock or a custom function is used.
    // TODO: Drop this when these are no longer allowed as the type argument.

    if (element == null) {
      return element;
    } // Skip key warning if the type isn't valid since our key validation logic
    // doesn't expect a non-string/function type and can throw confusing errors.
    // We don't want exception behavior to differ between dev and prod.
    // (Rendering will throw with a helpful message and as soon as the type is
    // fixed, the key warnings will appear.)


    if (validType) {
      var children = props.children;

      if (children !== undefined) {
        if (isStaticChildren) {
          if (isArray(children)) {
            for (var i = 0; i < children.length; i++) {
              validateChildKeys(children[i], type);
            }

            if (Object.freeze) {
              Object.freeze(children);
            }
          } else {
            error('React.jsx: Static children should always be an array. ' + 'You are likely explicitly calling React.jsxs or React.jsxDEV. ' + 'Use the Babel transform instead.');
          }
        } else {
          validateChildKeys(children, type);
        }
      }
    }

    {
      if (hasOwnProperty.call(props, 'key')) {
        var componentName = getComponentNameFromType(type);
        var keys = Object.keys(props).filter(function (k) {
          return k !== 'key';
        });
        var beforeExample = keys.length > 0 ? '{key: someKey, ' + keys.join(': ..., ') + ': ...}' : '{key: someKey}';

        if (!didWarnAboutKeySpread[componentName + beforeExample]) {
          var afterExample = keys.length > 0 ? '{' + keys.join(': ..., ') + ': ...}' : '{}';

          error('A props object containing a "key" prop is being spread into JSX:\n' + '  let props = %s;\n' + '  <%s {...props} />\n' + 'React keys must be passed directly to JSX without using spread:\n' + '  let props = %s;\n' + '  <%s key={someKey} {...props} />', beforeExample, componentName, afterExample, componentName);

          didWarnAboutKeySpread[componentName + beforeExample] = true;
        }
      }
    }

    if (type === REACT_FRAGMENT_TYPE) {
      validateFragmentProps(element);
    } else {
      validatePropTypes(element);
    }

    return element;
  }
} // These two functions exist to still get child warnings in dev
// even with the prod transform. This means that jsxDEV is purely
// opt-in behavior for better messages but that we won't stop
// giving you warnings if you use production apis.

function jsxWithValidationStatic(type, props, key) {
  {
    return jsxWithValidation(type, props, key, true);
  }
}
function jsxWithValidationDynamic(type, props, key) {
  {
    return jsxWithValidation(type, props, key, false);
  }
}

var jsx =  jsxWithValidationDynamic ; // we may want to special case jsxs internally to take advantage of static children.
// for now we can ship identical prod functions

var jsxs =  jsxWithValidationStatic ;

exports.Fragment = REACT_FRAGMENT_TYPE;
exports.jsx = jsx;
exports.jsxs = jsxs;
  })();
}


/***/ }),

/***/ "./node_modules/react/jsx-runtime.js":
/*!*******************************************!*\
  !*** ./node_modules/react/jsx-runtime.js ***!
  \*******************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {



if (false) // removed by dead control flow
{} else {
  module.exports = __webpack_require__(/*! ./cjs/react-jsx-runtime.development.js */ "./node_modules/react/cjs/react-jsx-runtime.development.js");
}


/***/ }),

/***/ "./src/js/blocks/attributes.js":
/*!*************************************!*\
  !*** ./src/js/blocks/attributes.js ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   customGalleryAttributes: function() { return /* binding */ customGalleryAttributes; },
/* harmony export */   customGroupAttributes: function() { return /* binding */ customGroupAttributes; },
/* harmony export */   customHorizontalScrollAttributes: function() { return /* binding */ customHorizontalScrollAttributes; },
/* harmony export */   customHorizontalScrollerAttributes: function() { return /* binding */ customHorizontalScrollerAttributes; },
/* harmony export */   customIconAttributes: function() { return /* binding */ customIconAttributes; },
/* harmony export */   customLazyAttributes: function() { return /* binding */ customLazyAttributes; },
/* harmony export */   customModalAttributes: function() { return /* binding */ customModalAttributes; },
/* harmony export */   customNoWrapAttributes: function() { return /* binding */ customNoWrapAttributes; },
/* harmony export */   customShiftAttributes: function() { return /* binding */ customShiftAttributes; },
/* harmony export */   customVisibilityAttributes: function() { return /* binding */ customVisibilityAttributes; }
/* harmony export */ });
// Set up custom attributes.
// MediaModal - Define custom attributes
var customModalAttributes = {
  enableModal: {
    type: 'boolean',
    "default": false
  },
  modalMediaURL: {
    type: 'string',
    "default": ''
  }
};

// Poster Gallery - Define custom attributes
var customGalleryAttributes = {
  enablePosterGallery: {
    type: 'boolean',
    "default": false
  }
};

// Lazy Load - Define custom attributes
var customLazyAttributes = {
  enableLazyLoad: {
    type: 'boolean',
    "default": true
  }
};

// NoWrap - Define custom attributes
var customNoWrapAttributes = {
  noWrap: {
    type: 'boolean',
    "default": false
  }
};

// Horizontal Scroll - Define custom attributes
var customHorizontalScrollAttributes = {
  enableHorizontalScroll: {
    type: 'boolean',
    "default": false
  }
};

// Horizontal Scroller - Define custom attributes
var customHorizontalScrollerAttributes = {
  enableHorizontalScroller: {
    type: 'boolean',
    "default": false
  },
  scrollNav: {
    type: 'boolean',
    "default": true
  },
  scrollAuto: {
    type: 'boolean',
    "default": false
  },
  scrollSpeed: {
    type: 'number',
    "default": 4000
  },
  scrollLoop: {
    type: 'boolean',
    "default": false
  },
  hideScrollbar: {
    type: 'boolean',
    "default": false
  },
  hidePauseButton: {
    type: 'boolean',
    "default": false
  },
  positionButtonsHorizontal: {
    type: 'select',
    "default": 'left'
  },
  positionButtonsVertical: {
    type: 'select',
    "default": 'bottom'
  },
  positionButtonsOver: {
    type: 'boolean',
    "default": false
  },
  buttonsTextColor: {
    type: 'select',
    "default": 'white'
  },
  buttonsBackgroundColor: {
    type: 'select',
    "default": 'secondary'
  },
  buttonsBorderColor: {
    type: 'select',
    "default": 'none'
  },
  buttonsBoxShadow: {
    type: 'boolean',
    "default": false
  },
  transitionDuration: {
    type: 'number',
    "default": 500
  },
  pauseOnHover: {
    type: 'boolean',
    "default": true
  }
};

// Group - Define custom attributes
var customGroupAttributes = {
  enableGroupLink: {
    type: 'boolean',
    "default": false
  },
  groupLinkURL: {
    type: 'string',
    "default": ''
  },
  groupLinkType: {
    type: 'string',
    "default": 'none' // Default to 'none' indicating no link or an unselected state
  }
};

// Visibility - Define custom attributes
var customVisibilityAttributes = {
  stackAtTablet: {
    type: 'boolean',
    "default": false
  },
  hideOnDesktop: {
    type: 'boolean',
    "default": false
  },
  hideOnTablet: {
    type: 'boolean',
    "default": false
  },
  hideOnMobile: {
    type: 'boolean',
    "default": false
  }
};

// Button Icons - Define custom attributes
var customIconAttributes = {
  iconType: {
    type: 'string',
    "default": 'none' // Default to 'none' indicating no icon selected
  }
};

// Shift - Define custom attributes
var customShiftAttributes = {
  useContentShift: {
    type: 'boolean',
    "default": false
  },
  shiftLeft: {
    type: 'string',
    // none, left, right
    "default": '0px'
  },
  shiftRight: {
    type: 'string',
    // small, medium, large, etc.
    "default": '0px'
  },
  shiftUp: {
    type: 'string',
    // none, top, bottom
    "default": '0px'
  },
  shiftDown: {
    type: 'string',
    "default": '0px'
  },
  shiftToTop: {
    type: 'boolean',
    "default": false
  },
  slideHorizontal: {
    type: 'string',
    // small, medium, large, etc.
    "default": '0px'
  },
  slideVertical: {
    type: 'string',
    // none, top, bottom
    "default": '0px'
  },
  resetMobile: {
    type: 'boolean',
    "default": false
  }
};

/***/ }),

/***/ "./src/js/blocks/block-extensions.js":
/*!*******************************************!*\
  !*** ./src/js/blocks/block-extensions.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _filters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./filters */ "./src/js/blocks/filters.js");
/* harmony import */ var _controls__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./controls */ "./src/js/blocks/controls/index.js");
/* harmony import */ var _formats_text_shadow__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./formats/text-shadow */ "./src/js/blocks/formats/text-shadow.js");




/***/ }),

/***/ "./src/js/blocks/controls/button.js":
/*!******************************************!*\
  !*** ./src/js/blocks/controls/button.js ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Icon Type",
          value: props.attributes.iconType,
          options: [{
            label: 'None',
            value: 'none'
          }, {
            label: 'Internal Link →',
            value: 'internal-link'
          }, {
            label: 'Download ⤓',
            value: 'download'
          }, {
            label: 'Play Video ►',
            value: 'video-play'
          }, {
            label: 'Open Modal ⤢',
            value: 'open-modal'
          }, {
            label: 'Link Out ↗',
            value: 'link-out'
          }],
          onChange: function onChange(newValue) {
            return props.setAttributes({
              iconType: newValue
            });
          },
          __nextHasNoMarginBottom: true
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Open Link in a Modal",
          checked: !!props.attributes.enableModal,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableModal: newValue
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Do not allow text to wrap unless there is a return or break",
          checked: !!props.attributes.noWrap,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              noWrap: newValue
            });
          }
        }), (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)]
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var removed = ['flexline-icon'];
  var added = '';
  if (attributes.enableModal) {
    added += ' enable-modal';
  }
  if (attributes.iconType && attributes.iconType !== 'none') {
    added += " flexline-icon-".concat(attributes.iconType);
  }
  if (attributes.noWrap) {
    added += ' nowrap';
  }
  return {
    removed: removed,
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/buttons.js":
/*!*******************************************!*\
  !*** ./src/js/blocks/controls/buttons.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)
      })
    })]
  });
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls
});

/***/ }),

/***/ "./src/js/blocks/controls/columns.js":
/*!*******************************************!*\
  !*** ./src/js/blocks/controls/columns.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; },
/* harmony export */   useHooks: function() { return /* binding */ useHooks; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Scroller Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Horizontal Scroller",
          checked: !!props.attributes.enableHorizontalScroller,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableHorizontalScroller: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Show Arrow Navigation",
          checked: !!props.attributes.scrollNav,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              scrollNav: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
          label: "Scroll transition in Milliseconds",
          value: props.attributes.transitionDuration,
          onChange: function onChange(newInterval) {
            return props.setAttributes({
              transitionDuration: newInterval
            });
          },
          defaultValue: 500,
          min: 100,
          max: 1500,
          step: 50
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Hide Scrollbar",
          checked: !!props.attributes.hideScrollbar,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              hideScrollbar: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && props.name !== 'core/post-template' && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Loop Scrolling",
          checked: !!props.attributes.scrollLoop,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              scrollLoop: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Buttons Horizontal Position",
          value: props.attributes.positionButtonsHorizontal,
          options: [{
            value: 'left',
            label: 'Left'
          }, {
            value: 'center',
            label: 'Center'
          }, {
            value: 'right',
            label: 'Right'
          }],
          onChange: function onChange(value) {
            return props.setAttributes({
              positionButtonsHorizontal: value
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Buttons Vertical Position",
          value: props.attributes.positionButtonsVertical,
          options: [{
            value: 'top',
            label: 'Top'
          }, {
            value: 'bottom',
            label: 'Bottom'
          }],
          onChange: function onChange(value) {
            return props.setAttributes({
              positionButtonsVertical: value
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Position Buttons Over Scroller",
          checked: !!props.attributes.positionButtonsOver,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              positionButtonsOver: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Buttons Text Color",
          value: props.attributes.buttonsTextColor,
          options: [{
            value: 'default',
            label: 'Default'
          }, {
            value: 'white',
            label: 'White'
          }, {
            value: 'black',
            label: 'Black'
          }, {
            value: 'primary',
            label: 'Primary'
          }, {
            value: 'secondary',
            label: 'Secondary'
          }, {
            value: 'alternate',
            label: 'Alternate'
          }, {
            value: 'gray',
            label: 'Gray'
          }],
          onChange: function onChange(value) {
            return props.setAttributes({
              buttonsTextColor: value
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Buttons Background Color",
          value: props.attributes.buttonsBackgroundColor,
          options: [{
            value: 'default',
            label: 'Default'
          }, {
            value: 'transparent',
            label: 'Transparent'
          }, {
            value: 'white',
            label: 'White'
          }, {
            value: 'black',
            label: 'Black'
          }, {
            value: 'primary',
            label: 'Primary'
          }, {
            value: 'secondary',
            label: 'Secondary'
          }, {
            value: 'alternate',
            label: 'Alternate'
          }, {
            value: 'gray',
            label: 'Gray'
          }],
          onChange: function onChange(value) {
            return props.setAttributes({
              buttonsBackgroundColor: value
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Buttons Border Color",
          value: props.attributes.buttonsBorderColor,
          options: [{
            value: 'none',
            label: 'None'
          }, {
            value: 'white',
            label: 'White'
          }, {
            value: 'black',
            label: 'Black'
          }, {
            value: 'primary',
            label: 'Primary'
          }, {
            value: 'secondary',
            label: 'Secondary'
          }, {
            value: 'alternate',
            label: 'Alternate'
          }, {
            value: 'gray',
            label: 'Gray'
          }],
          onChange: function onChange(value) {
            return props.setAttributes({
              buttonsBorderColor: value
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Add Box Shadow to Buttons",
          checked: !!props.attributes.buttonsBoxShadow,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              buttonsBoxShadow: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Auto Scroll",
          checked: !!props.attributes.scrollAuto,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              scrollAuto: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && props.attributes.scrollAuto && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Hide Pause Button",
          checked: !!props.attributes.hidePauseButton,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              hidePauseButton: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && props.attributes.scrollAuto && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Pause on Hover",
          checked: !!props.attributes.pauseOnHover,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              pauseOnHover: newValue
            });
          }
        }), props.attributes.enableHorizontalScroller && props.attributes.scrollAuto && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RangeControl, {
          label: "Scroll Interval in Milliseconds",
          value: props.attributes.scrollSpeed,
          onChange: function onChange(newInterval) {
            return props.setAttributes({
              scrollSpeed: newInterval
            });
          },
          defaultValue: 4000,
          min: 1000,
          max: 10000,
          step: 500
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Visibility",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Stack at Tablet",
          checked: !!props.attributes.stackAtTablet,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              stackAtTablet: newValue
            });
          }
        }), (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)]
      })]
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var removed = [];
  if (!attributes.enableHorizontalScroller) {
    removed.push('is-style-horizontal-scroll', 'horizontal-scroller-navigation', 'horizontal-scroller-loop', 'horizontal-scroller-auto', 'horizontal-scroller-hide-scrollbar', 'horizontal-scroller-hide-pause-button', 'horizontal-scroller-buttons-horizontal-left', 'horizontal-scroller-buttons-horizontal-center', 'horizontal-scroller-buttons-horizontal-right', 'horizontal-scroller-buttons-vertical-top', 'horizontal-scroller-buttons-vertical-bottom', 'horizontal-scroller-buttons-over', 'scroller-buttons-background-transparent', 'scroller-buttons-background-white', 'scroller-buttons-background-black', 'scroller-buttons-background-gray', 'scroller-buttons-background-primary', 'scroller-buttons-background-secondary', 'scroller-buttons-background-alternate', 'scroller-buttons-text-white', 'scroller-buttons-text-black', 'scroller-buttons-text-gray', 'scroller-buttons-text-primary', 'scroller-buttons-text-secondary', 'scroller-buttons-text-alternate', 'scroller-buttons-border-none', 'scroller-buttons-border-white', 'scroller-buttons-border-black', 'scroller-buttons-border-gray', 'scroller-buttons-border-primary', 'scroller-buttons-border-secondary', 'scroller-buttons-border-alternate', 'scroller-buttons-over', 'scroller-buttons-box-shadow', 'scroller-pause-on-hover');
  }
  if (!attributes.scrollNav) {
    removed.push('horizontal-scroller-navigation');
  }
  if (!attributes.scrollLoop) {
    removed.push('horizontal-scroller-loop');
  }
  if (!attributes.scrollAuto) {
    removed.push('horizontal-scroller-auto');
  }
  if (!attributes.hideScrollbar) {
    removed.push('horizontal-scroller-hide-scrollbar');
  }
  if (!attributes.hidePauseButton) {
    removed.push('horizontal-scroller-hide-pause-button');
  }
  if (!attributes.positionButtonsOver) {
    removed.push('horizontal-scroller-buttons-over');
  }
  if (attributes.positionButtonsHorizontal !== 'left') {
    removed.push('horizontal-scroller-buttons-horizontal-left');
  }
  if (attributes.positionButtonsHorizontal !== 'right') {
    removed.push('horizontal-scroller-buttons-horizontal-right');
  }
  if (attributes.positionButtonsHorizontal !== 'center') {
    removed.push('horizontal-scroller-buttons-horizontal-center');
  }
  if (attributes.positionButtonsVertical !== 'top') {
    removed.push('horizontal-scroller-buttons-vertical-top');
  }
  if (attributes.positionButtonsVertical !== 'bottom') {
    removed.push('horizontal-scroller-buttons-vertical-bottom');
  }
  if (attributes.buttonsBackgroundColor !== 'transparent') {
    removed.push('scroller-buttons-background-transparent');
  }
  if (attributes.buttonsBackgroundColor !== 'white') {
    removed.push('scroller-buttons-background-white');
  }
  if (attributes.buttonsBackgroundColor !== 'black') {
    removed.push('scroller-buttons-background-black');
  }
  if (attributes.buttonsBackgroundColor !== 'gray') {
    removed.push('scroller-buttons-background-gray');
  }
  if (attributes.buttonsBackgroundColor !== 'primary') {
    removed.push('scroller-buttons-background-primary');
  }
  if (attributes.buttonsBackgroundColor !== 'secondary') {
    removed.push('scroller-buttons-background-secondary');
  }
  if (attributes.buttonsBackgroundColor !== 'alternate') {
    removed.push('scroller-buttons-background-alternate');
  }
  if (attributes.buttonsTextColor !== 'white') {
    removed.push('scroller-buttons-text-white');
  }
  if (attributes.buttonsTextColor !== 'black') {
    removed.push('scroller-buttons-text-black');
  }
  if (attributes.buttonsTextColor !== 'gray') {
    removed.push('scroller-buttons-text-gray');
  }
  if (attributes.buttonsTextColor !== 'primary') {
    removed.push('scroller-buttons-text-primary');
  }
  if (attributes.buttonsTextColor !== 'secondary') {
    removed.push('scroller-buttons-text-secondary');
  }
  if (attributes.buttonsTextColor !== 'alternate') {
    removed.push('scroller-buttons-text-alternate');
  }
  if (attributes.buttonsBorderColor !== 'none') {
    removed.push('scroller-buttons-border-none');
  }
  if (attributes.buttonsBorderColor !== 'white') {
    removed.push('scroller-buttons-border-white');
  }
  if (attributes.buttonsBorderColor !== 'black') {
    removed.push('scroller-buttons-border-black');
  }
  if (attributes.buttonsBorderColor !== 'gray') {
    removed.push('scroller-buttons-border-gray');
  }
  if (attributes.buttonsBorderColor !== 'primary') {
    removed.push('scroller-buttons-border-primary');
  }
  if (attributes.buttonsBorderColor !== 'secondary') {
    removed.push('scroller-buttons-border-secondary');
  }
  if (attributes.buttonsBorderColor !== 'alternate') {
    removed.push('scroller-buttons-border-alternate');
  }
  if (!attributes.buttonOver) {
    removed.push('scroller-buttons-over');
  }
  if (!attributes.buttonsBoxShadow) {
    removed.push('scroller-buttons-box-shadow');
  }
  if (!attributes.pauseOnHover) {
    removed.push('scroller-pause-on-hover');
  }
  var added = '';
  if (attributes.enableHorizontalScroller) {
    added += ' is-style-horizontal-scroll';
  }
  if (attributes.scrollNav && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-navigation';
  }
  if (attributes.scrollAuto && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-auto';
  }
  if (attributes.scrollLoop && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-loop';
  }
  if (attributes.hideScrollbar && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-hide-scrollbar';
  }
  if (attributes.pauseOnHover && attributes.enableHorizontalScroller) {
    added += ' scroller-pause-on-hover';
  }
  if (attributes.hidePauseButton && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-hide-pause-button';
  }
  if (attributes.positionButtonsHorizontal && attributes.enableHorizontalScroller) {
    added += " horizontal-scroller-buttons-horizontal-".concat(attributes.positionButtonsHorizontal);
  }
  if (attributes.positionButtonsVertical && attributes.enableHorizontalScroller) {
    added += " horizontal-scroller-buttons-vertical-".concat(attributes.positionButtonsVertical);
  }
  if (attributes.positionButtonsOver && attributes.enableHorizontalScroller) {
    added += ' horizontal-scroller-buttons-over';
  }
  if (attributes.buttonsBackgroundColor && attributes.enableHorizontalScroller) {
    added += " scroller-buttons-background-".concat(attributes.buttonsBackgroundColor);
  }
  if (attributes.buttonsTextColor && attributes.enableHorizontalScroller) {
    added += " scroller-buttons-text-".concat(attributes.buttonsTextColor);
  }
  if (attributes.buttonsBorderColor && attributes.enableHorizontalScroller) {
    added += " scroller-buttons-border-".concat(attributes.buttonsBorderColor);
  }
  if (attributes.buttonsBoxShadow && attributes.enableHorizontalScroller) {
    added += ' scroller-buttons-box-shadow';
  }
  if (attributes.stackAtTablet) {
    added += ' flexline-stack-at-tablet';
  }
  return {
    added: added,
    removed: removed
  };
};
var useHooks = function useHooks(props) {
  var _props$attributes = props.attributes,
    enableHorizontalScroller = _props$attributes.enableHorizontalScroller,
    isStackedOnMobile = _props$attributes.isStackedOnMobile,
    setAttributes = props.setAttributes,
    name = props.name;
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    if (enableHorizontalScroller && isStackedOnMobile) {
      setAttributes({
        isStackedOnMobile: false
      });
    }
  }, [enableHorizontalScroller, isStackedOnMobile]);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    if (name === 'core/columns') {
      var toggleWarning = function toggleWarning() {
        document.querySelectorAll('.components-notice.is-warning').forEach(function (notice) {
          var textDiv = notice.querySelector('.components-notice__content');
          if (textDiv.textContent.includes('exceeds the recommended amount')) {
            notice.style.display = enableHorizontalScroller ? 'none' : '';
          }
        });
      };
      toggleWarning();
      var observer = new MutationObserver(toggleWarning);
      observer.observe(document.body, {
        childList: true,
        subtree: true
      });
      return function () {
        return observer.disconnect();
      };
    }
  }, [name, enableHorizontalScroller]);
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses,
  useHooks: useHooks
});

/***/ }),

/***/ "./src/js/blocks/controls/cover.js":
/*!*****************************************!*\
  !*** ./src/js/blocks/controls/cover.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Lazy Load",
          checked: !!props.attributes.enableLazyLoad,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableLazyLoad: newValue
            });
          }
        }), (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)]
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var added = '';
  if (attributes.enableLazyLoad === false) {
    added += ' no-lazy-load';
  }
  return {
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/gallery.js":
/*!*******************************************!*\
  !*** ./src/js/blocks/controls/gallery.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }




var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Poster Gallery",
          checked: !!props.attributes.enablePosterGallery,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enablePosterGallery: newValue
            });
          }
        })
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var added = '';
  if (attributes.enablePosterGallery) {
    added += ' poster-gallery';
  }
  return {
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/group.js":
/*!*****************************************!*\
  !*** ./src/js/blocks/controls/group.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Group Link Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Group Link",
          checked: !!props.attributes.enableGroupLink,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableGroupLink: newValue
            });
          }
        }), props.attributes.enableGroupLink && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.URLInput, {
          label: "Group Link URL",
          value: props.attributes.groupLinkURL,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              groupLinkURL: newValue
            });
          }
        }), props.attributes.enableGroupLink && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
          label: "Link Type",
          value: props.attributes.groupLinkType,
          options: [{
            label: 'Normal',
            value: 'none'
          }, {
            label: 'New Tab',
            value: 'new_tab'
          }, {
            label: 'Modal Media',
            value: 'modal_media'
          }],
          onChange: function onChange(newValue) {
            return props.setAttributes({
              groupLinkType: newValue
            });
          },
          __nextHasNoMarginBottom: true
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Visibility",
        children: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      group: "styles",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Content Shift",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Use Content Shift",
          checked: !!props.attributes.useContentShift,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              useContentShift: newValue
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Shift Above (z-index)",
          checked: !!props.attributes.shiftToTop,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftToTop: value
            });
          }
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Restore Normal on Mobile",
          checked: !!props.attributes.resetMobile,
          onChange: function onChange(value) {
            return props.setAttributes({
              resetMobile: value
            });
          }
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.Fragment, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("hr", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("p", {
            children: ["SHIFT - NEGATIVE MARGINS ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("small", {
              children: "Enter positive numbers only."
            })]
          })]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Left",
          type: "number",
          min: 0,
          value: props.attributes.shiftLeft,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftLeft: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Right",
          type: "number",
          min: 0,
          value: props.attributes.shiftRight,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftRight: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Up",
          type: "number",
          min: 0,
          value: props.attributes.shiftUp,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftUp: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Down",
          type: "number",
          min: 0,
          value: props.attributes.shiftDown,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftDown: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.Fragment, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("hr", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("p", {
            children: ["SLIDE - TRANSLATE ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("small", {
              children: "Positive or negative numbers"
            })]
          })]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Slide Horizontal ( - to left, + to right )",
          value: props.attributes.slideHorizontal,
          onChange: function onChange(value) {
            return props.setAttributes({
              slideHorizontal: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Slide Vertical ( - to top, + to bottom )",
          value: props.attributes.slideVertical,
          onChange: function onChange(value) {
            return props.setAttributes({
              slideVertical: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }],
          help: "Enter positive or negative values."
        })]
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var added = '';
  if (attributes.enableGroupLink) {
    var linkType = attributes.groupLinkType || 'self';
    added += " group-link group-link-type-".concat(linkType);
  }
  return {
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/image.js":
/*!*****************************************!*\
  !*** ./src/js/blocks/controls/image.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Lazy Load",
          checked: !!props.attributes.enableLazyLoad,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableLazyLoad: newValue
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Open a Modal",
          checked: !!props.attributes.enableModal,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableModal: newValue
            });
          }
        }), props.attributes.enableModal && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.URLInput, {
          label: "Modal Media URL",
          value: props.attributes.modalMediaURL,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              modalMediaURL: newValue
            });
          }
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Visibility",
        children: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      group: "styles",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Content Shift",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Use Content Shift",
          checked: !!props.attributes.useContentShift,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              useContentShift: newValue
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Shift Above (z-index)",
          checked: !!props.attributes.shiftToTop,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftToTop: value
            });
          }
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Restore Normal on Mobile",
          checked: !!props.attributes.resetMobile,
          onChange: function onChange(value) {
            return props.setAttributes({
              resetMobile: value
            });
          }
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.Fragment, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("hr", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("p", {
            children: ["SHIFT - NEGATIVE MARGINS ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("small", {
              children: "Enter positive numbers only."
            })]
          })]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Left",
          type: "number",
          min: 0,
          value: props.attributes.shiftLeft,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftLeft: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Right",
          type: "number",
          min: 0,
          value: props.attributes.shiftRight,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftRight: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Up",
          type: "number",
          min: 0,
          value: props.attributes.shiftUp,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftUp: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Shift Down",
          type: "number",
          min: 0,
          value: props.attributes.shiftDown,
          onChange: function onChange(value) {
            return props.setAttributes({
              shiftDown: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.Fragment, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("hr", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("p", {
            children: ["SLIDE - TRANSLATE ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("small", {
              children: "Positive or negative numbers"
            })]
          })]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Slide Horizontal ( - to left, + to right )",
          value: props.attributes.slideHorizontal,
          onChange: function onChange(value) {
            return props.setAttributes({
              slideHorizontal: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }]
        }), props.attributes.useContentShift && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalUnitControl, {
          label: "Slide Vertical ( - to top, + to bottom )",
          value: props.attributes.slideVertical,
          onChange: function onChange(value) {
            return props.setAttributes({
              slideVertical: value
            });
          },
          units: [{
            value: 'px',
            label: 'px'
          }, {
            value: '%',
            label: '%'
          }, {
            value: 'em',
            label: 'em'
          }, {
            value: 'rem',
            label: 'rem'
          }, {
            value: 'vw',
            label: 'vw'
          }, {
            value: 'vh',
            label: 'vh'
          }],
          help: "Enter positive or negative values."
        })]
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var added = '';
  if (attributes.enableModal) {
    added += ' enable-modal';
  }
  if (attributes.enableLazyLoad === false) {
    added += ' no-lazy-load';
  }
  return {
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/index.js":
/*!*****************************************!*\
  !*** ./src/js/blocks/controls/index.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var _button__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./button */ "./src/js/blocks/controls/button.js");
/* harmony import */ var _buttons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./buttons */ "./src/js/blocks/controls/buttons.js");
/* harmony import */ var _cover__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./cover */ "./src/js/blocks/controls/cover.js");
/* harmony import */ var _gallery__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./gallery */ "./src/js/blocks/controls/gallery.js");
/* harmony import */ var _group__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./group */ "./src/js/blocks/controls/group.js");
/* harmony import */ var _image__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./image */ "./src/js/blocks/controls/image.js");
/* harmony import */ var _navigation__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./navigation */ "./src/js/blocks/controls/navigation.js");
/* harmony import */ var _columns__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./columns */ "./src/js/blocks/controls/columns.js");
/* harmony import */ var _visibility__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./visibility */ "./src/js/blocks/controls/visibility.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }














var handlers = {
  'core/button': _button__WEBPACK_IMPORTED_MODULE_4__["default"],
  'core/buttons': _buttons__WEBPACK_IMPORTED_MODULE_5__["default"],
  'core/cover': _cover__WEBPACK_IMPORTED_MODULE_6__["default"],
  'core/gallery': _gallery__WEBPACK_IMPORTED_MODULE_7__["default"],
  'core/group': _group__WEBPACK_IMPORTED_MODULE_8__["default"],
  'core/image': _image__WEBPACK_IMPORTED_MODULE_9__["default"],
  'core/navigation': _navigation__WEBPACK_IMPORTED_MODULE_10__["default"],
  'core/columns': _columns__WEBPACK_IMPORTED_MODULE_11__["default"],
  'core/post-template': _columns__WEBPACK_IMPORTED_MODULE_11__["default"],
  'core/column': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/spacer': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/paragraph': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/heading': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/video': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/site-logo': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/post-featured-image': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/embed': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/navigation-submenu': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/navigation-link': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/html': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/social-link': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"],
  'core/social-links': _visibility__WEBPACK_IMPORTED_MODULE_12__["default"]
};
var withCustomControls = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__.createHigherOrderComponent)(function (BlockEdit) {
  return function (props) {
    var attributes = props.attributes,
      clientId = props.clientId;
    var uniqueClass = "block-".concat(clientId);
    var styleElementRef = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useRef)(null);
    var handler = handlers[props.name];
    if (handler && handler.useHooks) {
      handler.useHooks(props);
    }
    (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(function () {
      var removedClasses = [];
      if (!props.attributes.hideOnMobile) {
        removedClasses.push('flexline-hide-on-mobile');
      }
      if (!props.attributes.hideOnTablet) {
        removedClasses.push('flexline-hide-on-tablet');
      }
      if (!props.attributes.hideOnDesktop) {
        removedClasses.push('flexline-hide-on-desktop');
      }
      if (!props.attributes.enableModal) {
        removedClasses.push('enable-modal');
      }
      if (!props.attributes.enableLazyLoad) {
        removedClasses.push('no-lazy-load');
      }
      if (!props.attributes.noWrap) {
        removedClasses.push('nowrap');
      }
      if (!props.attributes.enablePosterGallery) {
        removedClasses.push('poster-gallery');
      }
      if (!props.attributes.enableHorizontalScroll) {
        removedClasses.push('is-style-horizontal-scroll-at-mobile');
      }
      if (!props.attributes.stackAtTablet) {
        removedClasses.push('flexline-stack-at-tablet');
      }
      if (!props.attributes.enableGroupLink) {
        removedClasses.push('group-link');
      }
      if (!props.attributes.useContentShift) {
        removedClasses.push('flexline-content-shift');
        removedClasses.push('flexline-content-shift-above');
        removedClasses.push('flexline-content-shift-revert-mobile');
        removedClasses.push('flexline-content-shift-left');
        removedClasses.push('flexline-content-shift-right');
        removedClasses.push('flexline-content-shift-up');
        removedClasses.push('flexline-content-shift-down');
        removedClasses.push('flexline-content-slide-x');
        removedClasses.push('flexline-content-slide-y');
      }
      if (props.attributes.useContentShift) {
        if ('0px' === props.attributes.shiftLeft) {
          removedClasses.push('flexline-content-shift-left');
        }
        if ('0px' === props.attributes.shiftRight) {
          removedClasses.push('flexline-content-shift-right');
        }
        if ('0px' === props.attributes.shiftUp) {
          removedClasses.push('flexline-content-shift-up');
        }
        if ('0px' === props.attributes.shiftDown) {
          removedClasses.push('flexline-content-shift-down');
        }
        if ('0px' === props.attributes.slideHorizontal) {
          removedClasses.push('flexline-content-slide-x');
        }
        if ('0px' === props.attributes.slideVertical) {
          removedClasses.push('flexline-content-slide-y');
        }
        if (!props.attributes.shiftToTop) {
          removedClasses.push('flexline-content-shift-above');
        }
        if (!props.attributes.resetMobile) {
          removedClasses.push('flexline-content-shift-revert-mobile');
        }
      }
      var newClasses = (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityClasses)(props.attributes);
      if (props.attributes.useContentShift) {
        newClasses += ' flexline-content-shift';
        if ('0px' !== props.attributes.shiftLeft) {
          newClasses += ' flexline-content-shift-left';
        }
        if ('0px' !== props.attributes.shiftRight) {
          newClasses += ' flexline-content-shift-right';
        }
        if ('0px' !== props.attributes.shiftUp) {
          newClasses += ' flexline-content-shift-up';
        }
        if ('0px' !== props.attributes.shiftDown) {
          newClasses += ' flexline-content-shift-down';
        }
        if ('0px' !== props.attributes.slideHorizontal) {
          newClasses += ' flexline-content-slide-x';
        }
        if ('0px' !== props.attributes.slideVertical) {
          newClasses += ' flexline-content-slide-y';
        }
        if (props.attributes.shiftToTop) {
          newClasses += ' flexline-content-shift-above';
        }
        if (props.attributes.resetMobile) {
          newClasses += ' flexline-content-shift-revert-mobile';
        }
      }
      if (handler && handler.getClasses) {
        var blockClasses = handler.getClasses(props.attributes);
        if (blockClasses !== null && blockClasses !== void 0 && blockClasses.removed) {
          removedClasses.push.apply(removedClasses, _toConsumableArray(blockClasses.removed));
        }
        if (blockClasses !== null && blockClasses !== void 0 && blockClasses.added) {
          newClasses += blockClasses.added;
        }
      }
      var combinedClasses = (0,_utils__WEBPACK_IMPORTED_MODULE_3__.updateBlockClasses)(props.attributes.className || '', newClasses, removedClasses);
      if (attributes.className !== combinedClasses) {
        props.setAttributes({
          className: combinedClasses
        });
      }
      if (!props.wrapperProps) {
        props.wrapperProps = {};
      }
      if (props.attributes.useContentShift) {
        var shiftLeft = '0';
        var shiftRight = '0';
        var shiftUp = '0';
        var shiftDown = '0';
        var slideX = '0';
        var slideY = '0';
        if (attributes.shiftLeft) {
          shiftLeft = '-' + attributes.shiftLeft;
        }
        if (attributes.shiftRight) {
          shiftRight = '-' + attributes.shiftRight;
        }
        if (attributes.shiftUp) {
          shiftUp = '-' + attributes.shiftUp;
        }
        if (attributes.shiftDown) {
          shiftDown = '-' + attributes.shiftDown;
        }
        if (attributes.slideHorizontal) {
          slideX = attributes.slideHorizontal;
        }
        if (attributes.slideVertical) {
          slideY = attributes.slideVertical;
        }
        var styles = "\n                  #".concat(uniqueClass, " {\n                        --flexline-shift-left: ").concat(shiftLeft, ";\n                        --flexline-shift-right: ").concat(shiftRight, ";\n                        --flexline-shift-up: ").concat(shiftUp, ";\n                        --flexline-shift-down: ").concat(shiftDown, ";\n                        --flexline-slide-x: ").concat(slideX, ";\n                        --flexline-slide-y: ").concat(slideY, ";\n                  }\n                ");
        if (!styleElementRef.current) {
          styleElementRef.current = document.createElement('style');
          styleElementRef.current.setAttribute('type', 'text/css');
          document.head.appendChild(styleElementRef.current);
        }
        styleElementRef.current.textContent = styles;
      } else if (styleElementRef.current) {
        styleElementRef.current.parentNode.removeChild(styleElementRef.current);
        styleElementRef.current = null;
      }
      return function () {
        if (styleElementRef.current) {
          styleElementRef.current.parentNode.removeChild(styleElementRef.current);
          styleElementRef.current = null;
        }
      };
    }, [attributes, attributes.className, props.name, uniqueClass]);
    if (handler && handler.controls) {
      return handler.controls(BlockEdit, props);
    }
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_13__.jsx)(BlockEdit, _objectSpread({}, props));
  };
}, 'withCustomControls');
(0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__.addFilter)('editor.BlockEdit', 'flexline/with-custom-controls', withCustomControls);
/* harmony default export */ __webpack_exports__["default"] = (handlers);

/***/ }),

/***/ "./src/js/blocks/controls/navigation.js":
/*!**********************************************!*\
  !*** ./src/js/blocks/controls/navigation.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; },
/* harmony export */   getClasses: function() { return /* binding */ getClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Options",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
          label: "Enable Horizontal Scroll at Mobile",
          checked: !!props.attributes.enableHorizontalScroll,
          onChange: function onChange(newValue) {
            return props.setAttributes({
              enableHorizontalScroll: newValue
            });
          }
        }), (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)]
      })
    })]
  });
};
var getClasses = function getClasses(attributes) {
  var added = '';
  if (attributes.enableHorizontalScroll) {
    added += ' is-style-horizontal-scroll-at-mobile';
  }
  return {
    added: added
  };
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls,
  getClasses: getClasses
});

/***/ }),

/***/ "./src/js/blocks/controls/visibility.js":
/*!**********************************************!*\
  !*** ./src/js/blocks/controls/visibility.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   controls: function() { return /* binding */ controls; }
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils */ "./src/js/blocks/utils.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }





var controls = function controls(BlockEdit, props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(BlockEdit, _objectSpread({}, props)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
        title: "FlexLine Visibility",
        children: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVisibilityControls)(props)
      })
    })]
  });
};
/* harmony default export */ __webpack_exports__["default"] = ({
  controls: controls
});

/***/ }),

/***/ "./src/js/blocks/filters.js":
/*!**********************************!*\
  !*** ./src/js/blocks/filters.js ***!
  \**********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/js/blocks/attributes.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var addFilter = wp.hooks.addFilter;

function registerAttributes(blockNames, attributes) {
  blockNames.forEach(function (blockName) {
    addFilter('blocks.registerBlockType', "flexline/add-".concat(blockName.replace(/\//g, '-'), "-attributes"), function (settings, name) {
      if (name === blockName) {
        settings.attributes = _objectSpread(_objectSpread({}, settings.attributes), attributes);
      }
      return settings;
    });
  });
}
registerAttributes(['core/button'], _objectSpread(_objectSpread(_objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customIconAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customModalAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customNoWrapAttributes));
registerAttributes(['core/cover'], _objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customLazyAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes));
registerAttributes(['core/gallery'], _objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customGalleryAttributes));
registerAttributes(['core/group'], _objectSpread(_objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customGroupAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customShiftAttributes));
registerAttributes(['core/image'], _objectSpread(_objectSpread(_objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customModalAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customLazyAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customShiftAttributes));
registerAttributes(['core/navigation'], _objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customHorizontalScrollAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes));
registerAttributes(['core/columns'], _objectSpread(_objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customHorizontalScrollerAttributes), _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes));
registerAttributes(['core/post-template'], _objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customHorizontalScrollerAttributes));
registerAttributes(['core/buttons', 'core/column', 'core/spacer', 'core/paragraph', 'core/heading', 'core/video', 'core/site-logo', 'core/post-featured-image', 'core/embed', 'core/html', 'core/social-link', 'core/social-links'], _objectSpread({}, _attributes__WEBPACK_IMPORTED_MODULE_0__.customVisibilityAttributes));

/***/ }),

/***/ "./src/js/blocks/formats/text-shadow.js":
/*!**********************************************!*\
  !*** ./src/js/blocks/formats/text-shadow.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");

var _wp$richText = wp.richText,
  registerFormatType = _wp$richText.registerFormatType,
  toggleFormat = _wp$richText.toggleFormat;
var RichTextToolbarButton = wp.blockEditor.RichTextToolbarButton;
var name = 'flexline/text-shadow';
registerFormatType(name, {
  title: 'Text Shadow',
  tagName: 'span',
  className: 'is-style-text-shadow',
  edit: function edit(_ref) {
    var isActive = _ref.isActive,
      value = _ref.value,
      onChange = _ref.onChange;
    var onToggle = function onToggle() {
      onChange(toggleFormat(value, {
        type: name
      }));
    };
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)(RichTextToolbarButton, {
      icon: "text",
      title: "Text Shadow",
      onClick: onToggle,
      isActive: isActive
    });
  }
});

/***/ }),

/***/ "./src/js/blocks/utils.js":
/*!********************************!*\
  !*** ./src/js/blocks/utils.js ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getVisibilityClasses: function() { return /* binding */ getVisibilityClasses; },
/* harmony export */   getVisibilityControls: function() { return /* binding */ getVisibilityControls; },
/* harmony export */   updateBlockClasses: function() { return /* binding */ updateBlockClasses; }
/* harmony export */ });
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
/**
 * Utility functions for block controls.
 */

// Import toggle for visibility controls.


/**
 * Returns a JSX fragment containing ToggleControls for hiding an element on different screen sizes.
 *
 * @param {Object}   props                          - The component props.
 * @param {Object}   props.attributes               - The element attributes.
 * @param {boolean}  props.attributes.hideOnDesktop - Whether the element is hidden on desktop.
 * @param {boolean}  props.attributes.hideOnTablet  - Whether the element is hidden on tablet.
 * @param {boolean}  props.attributes.hideOnMobile  - Whether the element is hidden on mobile.
 * @param {Function} props.setAttributes            - A function to update the element attributes.
 * @return {JSX.Element} A JSX fragment containing the ToggleControls.
 */

var getVisibilityControls = function getVisibilityControls(props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__.ToggleControl, {
      label: "Hide on Desktop",
      checked: !!props.attributes.hideOnDesktop,
      onChange: function onChange(newValue) {
        return props.setAttributes({
          hideOnDesktop: newValue
        });
      }
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__.ToggleControl, {
      label: "Hide on Tablet",
      checked: !!props.attributes.hideOnTablet,
      onChange: function onChange(newValue) {
        return props.setAttributes({
          hideOnTablet: newValue
        });
      }
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__.ToggleControl, {
      label: "Hide on Mobile",
      checked: !!props.attributes.hideOnMobile,
      onChange: function onChange(newValue) {
        return props.setAttributes({
          hideOnMobile: newValue
        });
      }
    })]
  });
};

// Utility function to generate visibility classes based on attributes
var getVisibilityClasses = function getVisibilityClasses(attrs) {
  var classes = '';
  if (attrs.hideOnMobile) {
    classes += 'flexline-hide-on-mobile ';
  }
  if (attrs.hideOnTablet) {
    classes += 'flexline-hide-on-tablet ';
  }
  if (attrs.hideOnDesktop) {
    classes += 'flexline-hide-on-desktop ';
  }
  return classes.trim();
};

// Utility function to manage class additions and removals
var updateBlockClasses = function updateBlockClasses(currentClasses, newClasses) {
  var removedClasses = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [];
  var classList = currentClasses.split(' ').filter(Boolean); // Split classes into an array and filter out empty strings

  // Remove each class from the list that needs to be removed
  removedClasses.forEach(function (removedClass) {
    // Handle specific logic for flexline-icon-* classes
    if (removedClass === 'flexline-icon') {
      classList = classList.filter(function (cls) {
        return !cls.startsWith('flexline-icon-');
      }); // Remove all flexline-icon-* classes
    } else {
      classList = classList.filter(function (cls) {
        return cls !== removedClass;
      }); // Remove the specific class
    }
  });

  // Add the new classes
  newClasses.split(' ').forEach(function (newClass) {
    classList.push(newClass.trim());
  });
  return _toConsumableArray(new Set(classList)).join(' ').trim(); // Ensure unique classes and join them back into a string
};

/***/ }),

/***/ "./src/scss/app.scss":
/*!***************************!*\
  !*** ./src/scss/app.scss ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/scss/modal.scss":
/*!*****************************!*\
  !*** ./src/scss/modal.scss ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = wp.blockEditor;

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ (function(module) {

module.exports = wp.components;

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = wp.compose;

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = wp.element;

/***/ }),

/***/ "@wordpress/hooks":
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/***/ (function(module) {

module.exports = wp.hooks;

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ (function(module) {

module.exports = React;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/block-extensions": 0,
/******/ 			"css/modal": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkflexline"] = self["webpackChunkflexline"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/modal","css/app"], function() { return __webpack_require__("./src/js/blocks/block-extensions.js"); })
/******/ 	__webpack_require__.O(undefined, ["css/modal","css/app"], function() { return __webpack_require__("./src/scss/app.scss"); })
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/modal","css/app"], function() { return __webpack_require__("./src/scss/modal.scss"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;