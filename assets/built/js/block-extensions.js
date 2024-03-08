/*! For license information please see block-extensions.js.LICENSE.txt */
(()=>{"use strict";var e,t={810:(e,t,r)=>{var n=r(848);function o(e){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o(e)}function u(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function a(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?u(Object(r),!0).forEach((function(t){i(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):u(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function i(e,t,r){var n;return n=function(e,t){if("object"!=o(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!=o(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(t,"string"),(t="symbol"==o(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var l=wp.hooks.addFilter,s=wp.compose.createHigherOrderComponent,c=wp.element.Fragment,f=wp.blockEditor.InspectorControls,p=wp.components,b=p.PanelBody,y=p.ToggleControl,d=(p.ToolsPanel,p.SelectControl),h=(p.ToolsPanelItem,wp.blockEditor.URLInput),v={enablePopup:{type:"boolean",default:!1},popupMediaURL:{type:"string",default:""}};var m={enableLazyLoad:{type:"boolean",default:!0}};var j={enablePosterGallery:{type:"boolean",default:!1}};var x={enableHorizontalScroll:{type:"boolean",default:!1}};var g={enableGroupLink:{type:"boolean",default:!1},groupLinkURL:{type:"string",default:""},groupLinkType:{type:"string",default:"none"}};var k=s((function(e){return function(t){return"core/image"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsxs)(b,{title:"Flexline Options",children:[(0,n.jsx)(y,{label:"Enable Lazy Load",checked:!!t.attributes.enableLazyLoad,onChange:function(e){return t.setAttributes({enableLazyLoad:e})}}),(0,n.jsx)(y,{label:"Enable Mixed Media Popup",checked:!!t.attributes.enablePopup,onChange:function(e){return t.setAttributes({enablePopup:e})}}),t.attributes.enablePopup&&(0,n.jsx)(h,{label:"Popup Media URL",value:t.attributes.popupMediaURL,onChange:function(e){return t.setAttributes({popupMediaURL:e})}})]})})]}):"core/cover"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsx)(b,{title:"Flexline Options",children:(0,n.jsx)(y,{label:"Enable Lazy Load",checked:!!t.attributes.enableLazyLoad,onChange:function(e){return t.setAttributes({enableLazyLoad:e})}})})})]}):"core/button"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsxs)(b,{title:"Flexline Options",children:[(0,n.jsx)(y,{label:"Enable Mixed Media Popup",checked:!!t.attributes.enablePopup,onChange:function(e){return t.setAttributes({enablePopup:e})}}),t.attributes.enablePopup&&(0,n.jsx)(h,{label:"Popup Media URL",value:t.attributes.popupMediaURL,onChange:function(e){return t.setAttributes({popupMediaURL:e})}})]})})]}):"core/gallery"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsx)(b,{title:"Flexline Options",children:(0,n.jsx)(y,{label:"Enable Poster Gallery",checked:!!t.attributes.enablePosterGallery,onChange:function(e){return t.setAttributes({enablePosterGallery:e})}})})})]}):"core/navigation"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsx)(b,{title:"Flexline Options",children:(0,n.jsx)(y,{label:"Enable Horizontal Scroll at Mobile",checked:!!t.attributes.enableHorizontalScroll,onChange:function(e){return t.setAttributes({enableHorizontalScroll:e})}})})})]}):"core/group"===t.name?(0,n.jsxs)(c,{children:[(0,n.jsx)(e,a({},t)),(0,n.jsx)(f,{children:(0,n.jsxs)(b,{title:"Flexline Options",children:[(0,n.jsx)(y,{label:"Enable Group Link",checked:!!t.attributes.enableGroupLink,onChange:function(e){return t.setAttributes({enableGroupLink:e})}}),t.attributes.enableGroupLink&&(0,n.jsx)(h,{label:"Group Link URL",value:t.attributes.groupLinkURL,onChange:function(e){return t.setAttributes({groupLinkURL:e})}}),t.attributes.enableGroupLink&&(0,n.jsx)(d,{label:"Link Type",value:t.attributes.groupLinkType,options:[{label:"Normal",value:"none"},{label:"New Tab",value:"new_tab"},{label:"Popup Media",value:"popup_media"}],onChange:function(e){return t.setAttributes({groupLinkType:e})}})]})})]}):(0,n.jsx)(e,a({},t))}}),"withCustomControls");l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/button"===t&&(e.attributes=a(a({},e.attributes),v)),e})),l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/image"===t&&(e.attributes=a(a(a({},e.attributes),v),m)),e})),l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/cover"===t&&(e.attributes=a(a({},e.attributes),m)),e})),l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/gallery"===t&&(e.attributes=a(a({},e.attributes),j)),e})),l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/navigation"===t&&(e.attributes=a(a({},e.attributes),x)),e})),l("blocks.registerBlockType","flexline/add-custom-attributes",(function(e,t){return"core/group"===t&&(e.attributes=a(a({},e.attributes),g)),e})),l("editor.BlockEdit","flexline/with-custom-controls",k)},930:()=>{},773:()=>{},20:(e,t,r)=>{var n=r(540),o=Symbol.for("react.element"),u=Symbol.for("react.fragment"),a=Object.prototype.hasOwnProperty,i=n.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,l={key:!0,ref:!0,__self:!0,__source:!0};function s(e,t,r){var n,u={},s=null,c=null;for(n in void 0!==r&&(s=""+r),void 0!==t.key&&(s=""+t.key),void 0!==t.ref&&(c=t.ref),t)a.call(t,n)&&!l.hasOwnProperty(n)&&(u[n]=t[n]);if(e&&e.defaultProps)for(n in t=e.defaultProps)void 0===u[n]&&(u[n]=t[n]);return{$$typeof:o,type:e,key:s,ref:c,props:u,_owner:i.current}}t.jsx=s,t.jsxs=s},287:(e,t)=>{var r=Symbol.for("react.element"),n=Symbol.for("react.portal"),o=Symbol.for("react.fragment"),u=Symbol.for("react.strict_mode"),a=Symbol.for("react.profiler"),i=Symbol.for("react.provider"),l=Symbol.for("react.context"),s=Symbol.for("react.forward_ref"),c=Symbol.for("react.suspense"),f=Symbol.for("react.memo"),p=Symbol.for("react.lazy"),b=Symbol.iterator;var y={isMounted:function(){return!1},enqueueForceUpdate:function(){},enqueueReplaceState:function(){},enqueueSetState:function(){}},d=Object.assign,h={};function v(e,t,r){this.props=e,this.context=t,this.refs=h,this.updater=r||y}function m(){}function j(e,t,r){this.props=e,this.context=t,this.refs=h,this.updater=r||y}v.prototype.isReactComponent={},v.prototype.setState=function(e,t){if("object"!=typeof e&&"function"!=typeof e&&null!=e)throw Error("setState(...): takes an object of state variables to update or a function which returns an object of state variables.");this.updater.enqueueSetState(this,e,t,"setState")},v.prototype.forceUpdate=function(e){this.updater.enqueueForceUpdate(this,e,"forceUpdate")},m.prototype=v.prototype;var x=j.prototype=new m;x.constructor=j,d(x,v.prototype),x.isPureReactComponent=!0;var g=Array.isArray,k=Object.prototype.hasOwnProperty,_={current:null},O={key:!0,ref:!0,__self:!0,__source:!0};function S(e,t,n){var o,u={},a=null,i=null;if(null!=t)for(o in void 0!==t.ref&&(i=t.ref),void 0!==t.key&&(a=""+t.key),t)k.call(t,o)&&!O.hasOwnProperty(o)&&(u[o]=t[o]);var l=arguments.length-2;if(1===l)u.children=n;else if(1<l){for(var s=Array(l),c=0;c<l;c++)s[c]=arguments[c+2];u.children=s}if(e&&e.defaultProps)for(o in l=e.defaultProps)void 0===u[o]&&(u[o]=l[o]);return{$$typeof:r,type:e,key:a,ref:i,props:u,_owner:_.current}}function w(e){return"object"==typeof e&&null!==e&&e.$$typeof===r}var L=/\/+/g;function P(e,t){return"object"==typeof e&&null!==e&&null!=e.key?function(e){var t={"=":"=0",":":"=2"};return"$"+e.replace(/[=:]/g,(function(e){return t[e]}))}(""+e.key):t.toString(36)}function E(e,t,o,u,a){var i=typeof e;"undefined"!==i&&"boolean"!==i||(e=null);var l=!1;if(null===e)l=!0;else switch(i){case"string":case"number":l=!0;break;case"object":switch(e.$$typeof){case r:case n:l=!0}}if(l)return a=a(l=e),e=""===u?"."+P(l,0):u,g(a)?(o="",null!=e&&(o=e.replace(L,"$&/")+"/"),E(a,t,o,"",(function(e){return e}))):null!=a&&(w(a)&&(a=function(e,t){return{$$typeof:r,type:e.type,key:t,ref:e.ref,props:e.props,_owner:e._owner}}(a,o+(!a.key||l&&l.key===a.key?"":(""+a.key).replace(L,"$&/")+"/")+e)),t.push(a)),1;if(l=0,u=""===u?".":u+":",g(e))for(var s=0;s<e.length;s++){var c=u+P(i=e[s],s);l+=E(i,t,o,c,a)}else if(c=function(e){return null===e||"object"!=typeof e?null:"function"==typeof(e=b&&e[b]||e["@@iterator"])?e:null}(e),"function"==typeof c)for(e=c.call(e),s=0;!(i=e.next()).done;)l+=E(i=i.value,t,o,c=u+P(i,s++),a);else if("object"===i)throw t=String(e),Error("Objects are not valid as a React child (found: "+("[object Object]"===t?"object with keys {"+Object.keys(e).join(", ")+"}":t)+"). If you meant to render a collection of children, use an array instead.");return l}function C(e,t,r){if(null==e)return e;var n=[],o=0;return E(e,n,"","",(function(e){return t.call(r,e,o++)})),n}function R(e){if(-1===e._status){var t=e._result;(t=t()).then((function(t){0!==e._status&&-1!==e._status||(e._status=1,e._result=t)}),(function(t){0!==e._status&&-1!==e._status||(e._status=2,e._result=t)})),-1===e._status&&(e._status=0,e._result=t)}if(1===e._status)return e._result.default;throw e._result}var T={current:null},$={transition:null},U={ReactCurrentDispatcher:T,ReactCurrentBatchConfig:$,ReactCurrentOwner:_};t.Children={map:C,forEach:function(e,t,r){C(e,(function(){t.apply(this,arguments)}),r)},count:function(e){var t=0;return C(e,(function(){t++})),t},toArray:function(e){return C(e,(function(e){return e}))||[]},only:function(e){if(!w(e))throw Error("React.Children.only expected to receive a single React element child.");return e}},t.Component=v,t.Fragment=o,t.Profiler=a,t.PureComponent=j,t.StrictMode=u,t.Suspense=c,t.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED=U,t.cloneElement=function(e,t,n){if(null==e)throw Error("React.cloneElement(...): The argument must be a React element, but you passed "+e+".");var o=d({},e.props),u=e.key,a=e.ref,i=e._owner;if(null!=t){if(void 0!==t.ref&&(a=t.ref,i=_.current),void 0!==t.key&&(u=""+t.key),e.type&&e.type.defaultProps)var l=e.type.defaultProps;for(s in t)k.call(t,s)&&!O.hasOwnProperty(s)&&(o[s]=void 0===t[s]&&void 0!==l?l[s]:t[s])}var s=arguments.length-2;if(1===s)o.children=n;else if(1<s){l=Array(s);for(var c=0;c<s;c++)l[c]=arguments[c+2];o.children=l}return{$$typeof:r,type:e.type,key:u,ref:a,props:o,_owner:i}},t.createContext=function(e){return(e={$$typeof:l,_currentValue:e,_currentValue2:e,_threadCount:0,Provider:null,Consumer:null,_defaultValue:null,_globalName:null}).Provider={$$typeof:i,_context:e},e.Consumer=e},t.createElement=S,t.createFactory=function(e){var t=S.bind(null,e);return t.type=e,t},t.createRef=function(){return{current:null}},t.forwardRef=function(e){return{$$typeof:s,render:e}},t.isValidElement=w,t.lazy=function(e){return{$$typeof:p,_payload:{_status:-1,_result:e},_init:R}},t.memo=function(e,t){return{$$typeof:f,type:e,compare:void 0===t?null:t}},t.startTransition=function(e){var t=$.transition;$.transition={};try{e()}finally{$.transition=t}},t.unstable_act=function(){throw Error("act(...) is not supported in production builds of React.")},t.useCallback=function(e,t){return T.current.useCallback(e,t)},t.useContext=function(e){return T.current.useContext(e)},t.useDebugValue=function(){},t.useDeferredValue=function(e){return T.current.useDeferredValue(e)},t.useEffect=function(e,t){return T.current.useEffect(e,t)},t.useId=function(){return T.current.useId()},t.useImperativeHandle=function(e,t,r){return T.current.useImperativeHandle(e,t,r)},t.useInsertionEffect=function(e,t){return T.current.useInsertionEffect(e,t)},t.useLayoutEffect=function(e,t){return T.current.useLayoutEffect(e,t)},t.useMemo=function(e,t){return T.current.useMemo(e,t)},t.useReducer=function(e,t,r){return T.current.useReducer(e,t,r)},t.useRef=function(e){return T.current.useRef(e)},t.useState=function(e){return T.current.useState(e)},t.useSyncExternalStore=function(e,t,r){return T.current.useSyncExternalStore(e,t,r)},t.useTransition=function(){return T.current.useTransition()},t.version="18.2.0"},540:(e,t,r)=>{e.exports=r(287)},848:(e,t,r)=>{e.exports=r(20)}},r={};function n(e){var o=r[e];if(void 0!==o)return o.exports;var u=r[e]={exports:{}};return t[e](u,u.exports,n),u.exports}n.m=t,e=[],n.O=(t,r,o,u)=>{if(!r){var a=1/0;for(c=0;c<e.length;c++){for(var[r,o,u]=e[c],i=!0,l=0;l<r.length;l++)(!1&u||a>=u)&&Object.keys(n.O).every((e=>n.O[e](r[l])))?r.splice(l--,1):(i=!1,u<a&&(a=u));if(i){e.splice(c--,1);var s=o();void 0!==s&&(t=s)}}return t}u=u||0;for(var c=e.length;c>0&&e[c-1][2]>u;c--)e[c]=e[c-1];e[c]=[r,o,u]},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={608:0,928:0,252:0};n.O.j=t=>0===e[t];var t=(t,r)=>{var o,u,[a,i,l]=r,s=0;if(a.some((t=>0!==e[t]))){for(o in i)n.o(i,o)&&(n.m[o]=i[o]);if(l)var c=l(n)}for(t&&t(r);s<a.length;s++)u=a[s],n.o(e,u)&&e[u]&&e[u][0](),e[u]=0;return n.O(c)},r=self.webpackChunkflexline=self.webpackChunkflexline||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})(),n.O(void 0,[928,252],(()=>n(810))),n.O(void 0,[928,252],(()=>n(930)));var o=n.O(void 0,[928,252],(()=>n(773)));o=n.O(o)})();