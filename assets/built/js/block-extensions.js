/*! For license information please see block-extensions.js.LICENSE.txt */
!function(){"use strict";var t,e={305:function(t,e,o){var l={enableModal:{type:"boolean",default:!1},modalMediaURL:{type:"string",default:""}},r={enablePosterGallery:{type:"boolean",default:!1}},n={enableLazyLoad:{type:"boolean",default:!0}},a={enableHorizontalScroll:{type:"boolean",default:!1}},i={enableHorizontalScroller:{type:"boolean",default:!1},scrollNav:{type:"boolean",default:!0},scrollAuto:{type:"boolean",default:!1},scrollSpeed:{type:"number",default:4e3},scrollLoop:{type:"boolean",default:!1},hideScrollbar:{type:"boolean",default:!1},hidePauseButton:{type:"boolean",default:!1},positionButtonsHorizontal:{type:"select",default:"left"},positionButtonsVertical:{type:"select",default:"bottom"},positionButtonsOver:{type:"boolean",default:!1},buttonsTextColor:{type:"select",default:"white"},buttonsBackgroundColor:{type:"select",default:"secondary"},buttonsBorderColor:{type:"select",default:"none"},buttonsBoxShadow:{type:"boolean",default:!1},transitionDuration:{type:"number",default:500},pauseOnHover:{type:"boolean",default:!0}},s={enableGroupLink:{type:"boolean",default:!1},groupLinkURL:{type:"string",default:""},groupLinkType:{type:"string",default:"none"}},u={stackAtTablet:{type:"boolean",default:!1},hideOnDesktop:{type:"boolean",default:!1},hideOnTablet:{type:"boolean",default:!1},hideOnMobile:{type:"boolean",default:!1}},b={iconType:{type:"string",default:"none"}},c={useContentShift:{type:"boolean",default:!1},shiftLeft:{type:"string",default:"0px"},shiftRight:{type:"string",default:"0px"},shiftUp:{type:"string",default:"0px"},shiftDown:{type:"string",default:"0px"},shiftToTop:{type:"boolean",default:!1},slideHorizontal:{type:"string",default:"0px"},slideVertical:{type:"string",default:"0px"},resetMobile:{type:"boolean",default:!1}};function h(t){return h="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},h(t)}function p(t,e){var o=Object.keys(t);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(t);e&&(l=l.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),o.push.apply(o,l)}return o}function d(t){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?p(Object(o),!0).forEach((function(e){f(t,e,o[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):p(Object(o)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(o,e))}))}return t}function f(t,e,o){return(e=function(t){var e=function(t,e){if("object"!=h(t)||!t)return t;var o=t[Symbol.toPrimitive];if(void 0!==o){var l=o.call(t,e||"default");if("object"!=h(l))return l;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"==h(e)?e:e+""}(e))in t?Object.defineProperty(t,e,{value:o,enumerable:!0,configurable:!0,writable:!0}):t[e]=o,t}var g=wp.hooks.addFilter;g("blocks.registerBlockType","flexline/add-custom-button-attributes",(function(t,e){return"core/button"===e&&(t.attributes=d(d(d(d({},t.attributes),b),l),u)),t})),g("blocks.registerBlockType","flexline/add-custom-buttons-attributes",(function(t,e){return"core/buttons"===e&&(t.attributes=d(d({},t.attributes),u)),t})),g("blocks.registerBlockType","flexline/add-custom-column-attributes",(function(t,e){return"core/column"===e&&(t.attributes=d(d({},t.attributes),u)),t})),g("blocks.registerBlockType","flexline/add-custom-cover-attributes",(function(t,e){return"core/cover"===e&&(t.attributes=d(d(d({},t.attributes),n),u)),t})),g("blocks.registerBlockType","flexline/add-custom-gallery-attributes",(function(t,e){return"core/gallery"===e&&(t.attributes=d(d({},t.attributes),r)),t})),g("blocks.registerBlockType","flexline/add-custom-group-attributes",(function(t,e){return"core/group"===e&&(t.attributes=d(d(d(d({},t.attributes),s),u),c)),t})),g("blocks.registerBlockType","flexline/add-custom-image-attributes",(function(t,e){return"core/image"===e&&(t.attributes=d(d(d(d(d({},t.attributes),l),n),u),c)),t})),g("blocks.registerBlockType","flexline/add-custom-navigation-attributes",(function(t,e){return"core/navigation"===e&&(t.attributes=d(d(d({},t.attributes),a),u)),t})),g("blocks.registerBlockType","flexline/add-columns-attributes",(function(t,e){return"core/columns"===e&&(t.attributes=d(d(d({},t.attributes),i),u)),t})),g("blocks.registerBlockType","flexline/add-post-template-attributes",(function(t,e){return"core/post-template"===e&&(t.attributes=d(d({},t.attributes),i)),t})),g("blocks.registerBlockType","flexline/add-custom-visibility-attributes",(function(t,e){return["core/spacer","core/paragraph","core/heading","core/video","core/site-logo","core/post-featured-image","core/embed","core/html","core/social-link","core/social-links"].includes(e)&&(t.attributes=d(d({},t.attributes),u)),t}));var v=wp.hooks,x=wp.compose,m=wp.element,y=wp.blockEditor,C=wp.components,k=o(848);function j(t){return j="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},j(t)}function S(t,e){var o=Object.keys(t);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(t);e&&(l=l.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),o.push.apply(o,l)}return o}function T(t){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?S(Object(o),!0).forEach((function(e){O(t,e,o[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):S(Object(o)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(o,e))}))}return t}function O(t,e,o){return(e=function(t){var e=function(t,e){if("object"!=j(t)||!t)return t;var o=t[Symbol.toPrimitive];if(void 0!==o){var l=o.call(t,e||"default");if("object"!=j(l))return l;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"==j(e)?e:e+""}(e))in t?Object.defineProperty(t,e,{value:o,enumerable:!0,configurable:!0,writable:!0}):t[e]=o,t}function z(t){return function(t){if(Array.isArray(t))return A(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(t){if("string"==typeof t)return A(t,e);var o={}.toString.call(t).slice(8,-1);return"Object"===o&&t.constructor&&(o=t.constructor.name),"Map"===o||"Set"===o?Array.from(t):"Arguments"===o||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)?A(t,e):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function A(t,e){(null==e||e>t.length)&&(e=t.length);for(var o=0,l=Array(e);o<e;o++)l[o]=t[o];return l}var w=(0,x.createHigherOrderComponent)((function(t){return function(e){var o=e.attributes,l=e.clientId,r="block-".concat(l),n=(0,m.useRef)(null);return(0,m.useEffect)((function(){var t=[];e.attributes.hideOnMobile||t.push("flexline-hide-on-mobile"),e.attributes.hideOnTablet||t.push("flexline-hide-on-tablet"),e.attributes.hideOnDesktop||t.push("flexline-hide-on-desktop"),e.attributes.enableModal||t.push("enable-modal"),e.attributes.enableLazyLoad||t.push("no-lazy-load"),e.attributes.enablePosterGallery||t.push("poster-gallery"),e.attributes.enableHorizontalScroll||t.push("is-style-horizontal-scroll-at-mobile"),e.attributes.enableHorizontalScroller||(t.push("is-style-horizontal-scroll"),t.push("horizontal-scroller-navigation"),t.push("horizontal-scroller-loop"),t.push("horizontal-scroller-auto"),t.push("horizontal-scroller-hide-scrollbar"),t.push("horizontal-scroller-hide-pause-button"),t.push("horizontal-scroller-buttons-horizontal-left"),t.push("horizontal-scroller-buttons-horizontal-center"),t.push("horizontal-scroller-buttons-horizontal-right"),t.push("horizontal-scroller-buttons-vertical-top"),t.push("horizontal-scroller-buttons-vertical-bottom"),t.push("horizontal-scroller-buttons-over"),t.push("scroller-buttons-background-transparent"),t.push("scroller-buttons-background-white"),t.push("scroller-buttons-background-black"),t.push("scroller-buttons-background-gray"),t.push("scroller-buttons-background-primary"),t.push("scroller-buttons-background-secondary"),t.push("scroller-buttons-background-alternate"),t.push("scroller-buttons-text-white"),t.push("scroller-buttons-text-black"),t.push("scroller-buttons-text-gray"),t.push("scroller-buttons-text-primary"),t.push("scroller-buttons-text-secondary"),t.push("scroller-buttons-text-alternate"),t.push("scroller-buttons-border-none"),t.push("scroller-buttons-border-white"),t.push("scroller-buttons-border-black"),t.push("scroller-buttons-border-gray"),t.push("scroller-buttons-border-primary"),t.push("scroller-buttons-border-secondary"),t.push("scroller-buttons-border-alternate"),t.push("scroller-buttons-over"),t.push("scroller-buttons-box-shadow"),t.push("scroller-pause-on-hover")),e.attributes.scrollNav||t.push("horizontal-scroller-navigation"),e.attributes.scrollLoop||t.push("horizontal-scroller-loop"),e.attributes.scrollAuto||t.push("horizontal-scroller-auto"),e.attributes.hideScrollbar||t.push("horizontal-scroller-hide-scrollbar"),e.attributes.hidePauseButton||t.push("horizontal-scroller-hide-pause-button"),e.attributes.positionButtonsOver||t.push("horizontal-scroller-buttons-over"),"left"!==e.attributes.positionButtonsHorizontal&&t.push("horizontal-scroller-buttons-horizontal-left"),"right"!==e.attributes.positionButtonsHorizontal&&t.push("horizontal-scroller-buttons-horizontal-right"),"center"!==e.attributes.positionButtonsHorizontal&&t.push("horizontal-scroller-buttons-horizontal-center"),"top"!==e.attributes.positionButtonsVertical&&t.push("horizontal-scroller-buttons-vertical-top"),"bottom"!==e.attributes.positionButtonsVertical&&t.push("horizontal-scroller-buttons-vertical-bottom"),"transparent"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-transparent"),"white"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-white"),"black"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-black"),"gray"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-gray"),"primary"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-primary"),"secondary"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-secondary"),"alternate"!==e.attributes.buttonsBackgroundColor&&t.push("scroller-buttons-background-alternate"),"white"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-white"),"black"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-black"),"gray"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-gray"),"primary"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-primary"),"secondary"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-secondary"),"alternate"!==e.attributes.buttonsTextColor&&t.push("scroller-buttons-text-alternate"),"none"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-none"),"white"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-white"),"black"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-black"),"gray"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-gray"),"primary"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-primary"),"secondary"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-secondary"),"alternate"!==e.attributes.buttonsBorderColor&&t.push("scroller-buttons-border-alternate"),e.attributes.buttonOver||t.push("scroller-buttons-over"),e.attributes.buttonsBoxShadow||t.push("scroller-buttons-box-shadow"),e.attributes.pauseOnHover||t.push("scroller-pause-on-hover"),e.attributes.enableGroupLink||t.push("group-link"),e.attributes.useContentShift||(t.push("flexline-content-shift"),t.push("flexline-content-shift-above"),t.push("flexline-content-shift-revert-mobile"),t.push("flexline-content-shift-left"),t.push("flexline-content-shift-right"),t.push("flexline-content-shift-up"),t.push("flexline-content-shift-down"),t.push("flexline-content-slide-x"),t.push("flexline-content-slide-y")),e.attributes.useContentShift&&("0px"===e.attributes.shiftLeft&&t.push("flexline-content-shift-left"),"0px"===e.attributes.shiftRight&&t.push("flexline-content-shift-right"),"0px"===e.attributes.shiftUp&&t.push("flexline-content-shift-up"),"0px"===e.attributes.shiftDown&&t.push("flexline-content-shift-down"),"0px"===e.attributes.slideHorizontal&&t.push("flexline-content-slide-x"),"0px"===e.attributes.slideVertical&&t.push("flexline-content-slide-y"),e.attributes.shiftToTop||t.push("flexline-content-shift-above"),e.attributes.resetMobile||t.push("flexline-content-shift-revert-mobile")),"core/button"===e.name&&t.push("flexline-icon");var l,a,i=(l=e.attributes,a="",l.hideOnMobile&&(a+="flexline-hide-on-mobile "),l.hideOnTablet&&(a+="flexline-hide-on-tablet "),l.hideOnDesktop&&(a+="flexline-hide-on-desktop "),a.trim());(e.attributes.useContentShift&&(i+=" flexline-content-shift","0px"!==e.attributes.shiftLeft&&(i+=" flexline-content-shift-left"),"0px"!==e.attributes.shiftRight&&(i+=" flexline-content-shift-right"),"0px"!==e.attributes.shiftUp&&(i+=" flexline-content-shift-up"),"0px"!==e.attributes.shiftDown&&(i+=" flexline-content-shift-down"),"0px"!==e.attributes.slideHorizontal&&(i+=" flexline-content-slide-x"),"0px"!==e.attributes.slideVertical&&(i+=" flexline-content-slide-y"),e.attributes.shiftToTop&&(i+=" flexline-content-shift-above"),e.attributes.resetMobile&&(i+=" flexline-content-shift-revert-mobile")),"core/button"!==e.name&&"core/image"!==e.name||e.attributes.enableModal&&(i+=" enable-modal"),"core/button"===e.name&&e.attributes.iconType&&(i+=" flexline-icon-".concat(e.attributes.iconType)),"core/image"!==e.name&&"core/cover"!==e.name||!1===e.attributes.enableLazyLoad&&(i+=" no-lazy-load"),"core/gallery"===e.name&&e.attributes.enablePosterGallery&&(i+=" poster-gallery"),"core/navigation"===e.name&&e.attributes.enableHorizontalScroll&&(i+=" is-style-horizontal-scroll-at-mobile"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.enableHorizontalScroller&&(i+=" is-style-horizontal-scroll"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.scrollNav&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-navigation"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.scrollAuto&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-auto"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.scrollLoop&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-loop"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.hideScrollbar&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-hide-scrollbar"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.pauseOnHover&&e.attributes.enableHorizontalScroller&&(i+=" scroller-pause-on-hover"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.hidePauseButton&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-hide-pause-button"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.positionButtonsHorizontal&&e.attributes.enableHorizontalScroller)&&(i+=" horizontal-scroller-buttons-horizontal-"+e.attributes.positionButtonsHorizontal);["core/columns","core/post-template"].includes(e.name)&&e.attributes.positionButtonsVertical&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-buttons-vertical-"+e.attributes.positionButtonsVertical);(["core/columns","core/post-template"].includes(e.name)&&e.attributes.positionButtonsOver&&e.attributes.enableHorizontalScroller&&(i+=" horizontal-scroller-buttons-over"),["core/columns","core/post-template"].includes(e.name)&&e.attributes.buttonsBackgroundColor&&e.attributes.enableHorizontalScroller)&&(i+=" scroller-buttons-background-"+e.attributes.buttonsBackgroundColor);["core/columns","core/post-template"].includes(e.name)&&e.attributes.buttonsTextColor&&e.attributes.enableHorizontalScroller&&(i+=" scroller-buttons-text-"+e.attributes.buttonsTextColor);["core/columns","core/post-template"].includes(e.name)&&e.attributes.buttonsBorderColor&&e.attributes.enableHorizontalScroller&&(i+=" scroller-buttons-border-"+e.attributes.buttonsBorderColor);["core/group","core/stack","core/row","core/grid"].includes(e.name)&&(e.attributes.enableGroupLink&&(i+=" group-link group-link-type-"+(e.attributes.groupLinkType||"self")));"core/columns"===e.name&&e.attributes.stackAtTablet&&(i+=" flexline-stack-at-tablet");var s=function(t,e){var o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:[],l=t.split(" ").filter(Boolean);return o.forEach((function(t){l="flexline-icon"===t?l.filter((function(t){return!t.startsWith("flexline-icon-")})):l.filter((function(e){return e!==t}))})),e.split(" ").forEach((function(t){l.push(t.trim())})),z(new Set(l)).join(" ").trim()}(e.attributes.className||"",i,t);if(e.setAttributes({className:s}),e.wrapperProps||(e.wrapperProps={}),e.attributes.useContentShift){var u="0",b="0",c="0",h="0",p="0",d="0";o.shiftLeft&&(u="-"+o.shiftLeft),o.shiftRight&&(b="-"+o.shiftRight),o.shiftUp&&(c="-"+o.shiftUp),o.shiftDown&&(h="-"+o.shiftDown),o.slideHorizontal&&(p=o.slideHorizontal),o.slideVertical&&(d=o.slideVertical);var f="\n\t\t\t\t  #".concat(r," {\n\t\t\t\t\t--flexline-shift-left: ").concat(u,";\n\t\t\t\t\t--flexline-shift-right: ").concat(b,";\n\t\t\t\t\t--flexline-shift-up: ").concat(c,";\n\t\t\t\t\t--flexline-shift-down: ").concat(h,";\n\t\t\t\t\t--flexline-slide-x: ").concat(p,";\n\t\t\t\t\t--flexline-slide-y: ").concat(d,";\n\t\t\t\t  }\n\t\t\t\t");n.current||(n.current=document.createElement("style"),n.current.setAttribute("type","text/css"),document.head.appendChild(n.current)),n.current.textContent=f}else!1===o.useContentShift&&n.current&&(n.current.parentNode.removeChild(n.current),n.current=null);return function(){n.current&&(n.current.parentNode.removeChild(n.current),n.current=null)}}),[o,e.attributes,e.name,e,r]),"core/image"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsxs)(y.InspectorControls,{children:[(0,k.jsxs)(C.PanelBody,{title:"Flexline Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Enable Lazy Load",checked:!!e.attributes.enableLazyLoad,onChange:function(t){return e.setAttributes({enableLazyLoad:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Open a Modal",checked:!!e.attributes.enableModal,onChange:function(t){return e.setAttributes({enableModal:t})}}),e.attributes.enableModal&&(0,k.jsx)(y.URLInput,{label:"Modal Media URL",value:e.attributes.modalMediaURL,onChange:function(t){return e.setAttributes({modalMediaURL:t})}})]}),(0,k.jsxs)(C.PanelBody,{title:"Flexline Visibility",children:[(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})]}),(0,k.jsx)(y.InspectorControls,{group:"styles",children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Content Shift",children:[(0,k.jsx)(C.ToggleControl,{label:"Use Content Shift",checked:!!e.attributes.useContentShift,onChange:function(t){return e.setAttributes({useContentShift:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Shift Above (z-index)",checked:!!e.attributes.shiftToTop,onChange:function(t){return e.setAttributes({shiftToTop:t})}}),e.attributes.useContentShift&&(0,k.jsx)(C.ToggleControl,{label:"Restore Normal on Mobile",checked:!!e.attributes.resetMobile,onChange:function(t){return e.setAttributes({resetMobile:t})}}),e.attributes.useContentShift&&(0,k.jsxs)(k.Fragment,{children:[(0,k.jsx)("hr",{}),(0,k.jsxs)("p",{children:["SHIFT - NEGATIVE MARGINS ",(0,k.jsx)("br",{}),(0,k.jsx)("small",{children:"Enter positive numbers only."})]})]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Left",type:"number",min:0,value:e.attributes.shiftLeft,onChange:function(t){return e.setAttributes({shiftLeft:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Right",type:"number",min:0,value:e.attributes.shiftRight,onChange:function(t){return e.setAttributes({shiftRight:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Up",type:"number",min:0,value:e.attributes.shiftUp,onChange:function(t){return e.setAttributes({shiftUp:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Down",type:"number",min:0,value:e.attributes.shiftDown,onChange:function(t){return e.setAttributes({shiftDown:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsxs)(k.Fragment,{children:[(0,k.jsx)("hr",{}),(0,k.jsxs)("p",{children:["SLIDE - TRANSLATE ",(0,k.jsx)("br",{}),(0,k.jsx)("small",{children:"Positive or negative numbers"})]})]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Slide Horizontal ( - to left, + to right )",value:e.attributes.slideHorizontal,onChange:function(t){return e.setAttributes({slideHorizontal:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Slide Vertical ( - to top, + to bottom )",value:e.attributes.slideVertical,onChange:function(t){return e.setAttributes({slideVertical:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}],help:"Enter positive or negative values."})]})})]}):"core/cover"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Enable Lazy Load",checked:!!e.attributes.enableLazyLoad,onChange:function(t){return e.setAttributes({enableLazyLoad:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})})]}):"core/buttons"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})})]}):"core/button"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Options",children:[(0,k.jsx)(C.SelectControl,{label:"Icon Type",value:e.attributes.iconType,options:[{label:"None",value:"none"},{label:"Internal Link →",value:"internal-link"},{label:"Download ⤓",value:"download"},{label:"Play Video ►",value:"video-play"},{label:"Open Modal ⤢",value:"open-modal"},{label:"Link Out ↗",value:"link-out"}],onChange:function(t){return e.setAttributes({iconType:t})},__nextHasNoMarginBottom:!0}),(0,k.jsx)(C.ToggleControl,{label:"Open Link in a Modal",checked:!!e.attributes.enableModal,onChange:function(t){return e.setAttributes({enableModal:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})})]}):"core/gallery"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsx)(C.PanelBody,{title:"Flexline Options",children:(0,k.jsx)(C.ToggleControl,{label:"Enable Poster Gallery",checked:!!e.attributes.enablePosterGallery,onChange:function(t){return e.setAttributes({enablePosterGallery:t})}})})})]}):"core/navigation"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Enable Horizontal Scroll at Mobile",checked:!!e.attributes.enableHorizontalScroll,onChange:function(t){return e.setAttributes({enableHorizontalScroll:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})})]}):"core/group"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsxs)(y.InspectorControls,{children:[(0,k.jsxs)(C.PanelBody,{title:"Flexline Group Link Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Enable Group Link",checked:!!e.attributes.enableGroupLink,onChange:function(t){return e.setAttributes({enableGroupLink:t})}}),e.attributes.enableGroupLink&&(0,k.jsx)(y.URLInput,{label:"Group Link URL",value:e.attributes.groupLinkURL,onChange:function(t){return e.setAttributes({groupLinkURL:t})}}),e.attributes.enableGroupLink&&(0,k.jsx)(C.SelectControl,{label:"Link Type",value:e.attributes.groupLinkType,options:[{label:"Normal",value:"none"},{label:"New Tab",value:"new_tab"},{label:"Modal Media",value:"modal_media"}],onChange:function(t){return e.setAttributes({groupLinkType:t})},__nextHasNoMarginBottom:!0})]}),(0,k.jsxs)(C.PanelBody,{title:"Flexline Visibility",children:[(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})]}),(0,k.jsx)(y.InspectorControls,{group:"styles",children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Content Shift",children:[(0,k.jsx)(C.ToggleControl,{label:"Use Content Shift",checked:!!e.attributes.useContentShift,onChange:function(t){return e.setAttributes({useContentShift:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Shift Above (z-index)",checked:!!e.attributes.shiftToTop,onChange:function(t){return e.setAttributes({shiftToTop:t})}}),e.attributes.useContentShift&&(0,k.jsx)(C.ToggleControl,{label:"Restore Normal on Mobile",checked:!!e.attributes.resetMobile,onChange:function(t){return e.setAttributes({resetMobile:t})}}),e.attributes.useContentShift&&(0,k.jsxs)(k.Fragment,{children:[(0,k.jsx)("hr",{}),(0,k.jsxs)("p",{children:["SHIFT - NEGATIVE MARGINS ",(0,k.jsx)("br",{}),(0,k.jsx)("small",{children:"Enter positive numbers only."})]})]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Left",type:"number",min:0,value:e.attributes.shiftLeft,onChange:function(t){return e.setAttributes({shiftLeft:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Right",type:"number",min:0,value:e.attributes.shiftRight,onChange:function(t){return e.setAttributes({shiftRight:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Up",type:"number",min:0,value:e.attributes.shiftUp,onChange:function(t){return e.setAttributes({shiftUp:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Shift Down",type:"number",min:0,value:e.attributes.shiftDown,onChange:function(t){return e.setAttributes({shiftDown:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsxs)(k.Fragment,{children:[(0,k.jsx)("hr",{}),(0,k.jsxs)("p",{children:["SLIDE - TRANSLATE ",(0,k.jsx)("br",{}),(0,k.jsx)("small",{children:"Positive or negative numbers"})]})]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Slide Horizontal ( - to left, + to right )",value:e.attributes.slideHorizontal,onChange:function(t){return e.setAttributes({slideHorizontal:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}]}),e.attributes.useContentShift&&(0,k.jsx)(C.__experimentalUnitControl,{label:"Slide Vertical ( - to top, + to bottom )",value:e.attributes.slideVertical,onChange:function(t){return e.setAttributes({slideVertical:t})},units:[{value:"px",label:"px"},{value:"%",label:"%"},{value:"em",label:"em"},{value:"rem",label:"rem"},{value:"vw",label:"vw"},{value:"vh",label:"vh"}],help:"Enter positive or negative values."})]})})]}):"core/columns"===e.name||"core/post-template"===e.name?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsxs)(y.InspectorControls,{children:[(0,k.jsxs)(C.PanelBody,{title:"Flexline Scroller Options",children:[(0,k.jsx)(C.ToggleControl,{label:"Enable Horizontal Scroller",checked:!!e.attributes.enableHorizontalScroller,onChange:function(t){return e.setAttributes({enableHorizontalScroller:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.ToggleControl,{label:"Show Arrow Navigation",checked:!!e.attributes.scrollNav,onChange:function(t){return e.setAttributes({scrollNav:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.RangeControl,{label:"Scroll transition in Milliseconds",value:e.attributes.transitionDuration,onChange:function(t){return e.setAttributes({transitionDuration:t})},defaultValue:500,min:100,max:1500,step:50}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.ToggleControl,{label:"Hide Scrollbar",checked:!!e.attributes.hideScrollbar,onChange:function(t){return e.setAttributes({hideScrollbar:t})}}),e.attributes.enableHorizontalScroller&&"core/post-template"!==e.name&&(0,k.jsx)(C.ToggleControl,{label:"Loop Scrolling",checked:!!e.attributes.scrollLoop,onChange:function(t){return e.setAttributes({scrollLoop:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.SelectControl,{label:"Buttons Horizontal Position",value:e.attributes.positionButtonsHorizontal,options:[{value:"left",label:"Left"},{value:"center",label:"Center"},{value:"right",label:"Right"}],onChange:function(t){return e.setAttributes({positionButtonsHorizontal:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.SelectControl,{label:"Buttons Vertical Position",value:e.attributes.positionButtonsVertical,options:[{value:"top",label:"Top"},{value:"bottom",label:"Bottom"}],onChange:function(t){return e.setAttributes({positionButtonsVertical:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.ToggleControl,{label:"Position Buttons Over Scroller",checked:!!e.attributes.positionButtonsOver,onChange:function(t){return e.setAttributes({positionButtonsOver:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.SelectControl,{label:"Buttons Text Color",value:e.attributes.buttonsTextColor,options:[{value:"default",label:"Default"},{value:"white",label:"White"},{value:"black",label:"Black"},{value:"primary",label:"Primary"},{value:"secondary",label:"Secondary"},{value:"alternate",label:"Alternate"},{value:"gray",label:"Gray"}],onChange:function(t){return e.setAttributes({buttonsTextColor:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.SelectControl,{label:"Buttons Background Color",value:e.attributes.buttonsBackgroundColor,options:[{value:"default",label:"Default"},{value:"transparent",label:"Transparent"},{value:"white",label:"White"},{value:"black",label:"Black"},{value:"primary",label:"Primary"},{value:"secondary",label:"Secondary"},{value:"alternate",label:"Alternate"},{value:"gray",label:"Gray"}],onChange:function(t){return e.setAttributes({buttonsBackgroundColor:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.SelectControl,{label:"Buttons Border Color",value:e.attributes.buttonsBorderColor,options:[{value:"default",label:"Default"},{value:"none",label:"None"},{value:"white",label:"White"},{value:"black",label:"Black"},{value:"primary",label:"Primary"},{value:"secondary",label:"Secondary"},{value:"alternate",label:"Alternate"},{value:"gray",label:"Gray"}],onChange:function(t){return e.setAttributes({buttonsBorderColor:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.ToggleControl,{label:"Show Buttons Box Shadow",checked:!!e.attributes.buttonsBoxShadow,onChange:function(t){return e.setAttributes({buttonsBoxShadow:t})}}),e.attributes.enableHorizontalScroller&&(0,k.jsx)(C.ToggleControl,{label:"Auto Scroll",checked:!!e.attributes.scrollAuto,onChange:function(t){return e.setAttributes({scrollAuto:t})}}),e.attributes.enableHorizontalScroller&&e.attributes.scrollAuto&&(0,k.jsx)(C.ToggleControl,{label:"Hide Pause Button",checked:!!e.attributes.hidePauseButton,onChange:function(t){return e.setAttributes({hidePauseButton:t})}}),e.attributes.enableHorizontalScroller&&e.attributes.scrollAuto&&(0,k.jsx)(C.ToggleControl,{label:"Pause on Hover",checked:!!e.attributes.pauseOnHover,onChange:function(t){return e.setAttributes({pauseOnHover:t})}}),e.attributes.enableHorizontalScroller&&e.attributes.scrollAuto&&(0,k.jsx)(C.RangeControl,{label:"Scroll Interval in Milliseconds",value:e.attributes.scrollSpeed,onChange:function(t){return e.setAttributes({scrollSpeed:t})},defaultValue:5e3,min:1e3,max:1e4,step:500})]}),(0,k.jsxs)(C.PanelBody,{title:"Flexline Visibility",children:[(0,k.jsx)(C.ToggleControl,{label:"Stack at Tablet",checked:!!e.attributes.stackAtTablet,onChange:function(t){return e.setAttributes({stackAtTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})]})]}):["core/column","core/spacer","core/paragraph","core/heading","core/video","core/site-logo","core/post-featured-image","core/embed","core/navigation-submenu","core/navigation-link","core/html","core/social-link","core/social-links"].includes(e.name)?(0,k.jsxs)(m.Fragment,{children:[(0,k.jsx)(t,T({},e)),(0,k.jsx)(y.InspectorControls,{children:(0,k.jsxs)(C.PanelBody,{title:"Flexline Visibility",children:[(0,k.jsx)(C.ToggleControl,{label:"Hide on Desktop",checked:!!e.attributes.hideOnDesktop,onChange:function(t){return e.setAttributes({hideOnDesktop:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Tablet",checked:!!e.attributes.hideOnTablet,onChange:function(t){return e.setAttributes({hideOnTablet:t})}}),(0,k.jsx)(C.ToggleControl,{label:"Hide on Mobile",checked:!!e.attributes.hideOnMobile,onChange:function(t){return e.setAttributes({hideOnMobile:t})}})]})})]}):(0,k.jsx)(t,T({},e))}}),"withCustomControls");(0,v.addFilter)("editor.BlockEdit","flexline/with-custom-controls",w)},154:function(){},295:function(){},20:function(t,e,o){var l=o(594),r=Symbol.for("react.element"),n=Symbol.for("react.fragment"),a=Object.prototype.hasOwnProperty,i=l.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,s={key:!0,ref:!0,__self:!0,__source:!0};function u(t,e,o){var l,n={},u=null,b=null;for(l in void 0!==o&&(u=""+o),void 0!==e.key&&(u=""+e.key),void 0!==e.ref&&(b=e.ref),e)a.call(e,l)&&!s.hasOwnProperty(l)&&(n[l]=e[l]);if(t&&t.defaultProps)for(l in e=t.defaultProps)void 0===n[l]&&(n[l]=e[l]);return{$$typeof:r,type:t,key:u,ref:b,props:n,_owner:i.current}}e.Fragment=n,e.jsx=u,e.jsxs=u},848:function(t,e,o){t.exports=o(20)},594:function(t){t.exports=React}},o={};function l(t){var r=o[t];if(void 0!==r)return r.exports;var n=o[t]={exports:{}};return e[t](n,n.exports,l),n.exports}l.m=e,t=[],l.O=function(e,o,r,n){if(!o){var a=1/0;for(b=0;b<t.length;b++){o=t[b][0],r=t[b][1],n=t[b][2];for(var i=!0,s=0;s<o.length;s++)(!1&n||a>=n)&&Object.keys(l.O).every((function(t){return l.O[t](o[s])}))?o.splice(s--,1):(i=!1,n<a&&(a=n));if(i){t.splice(b--,1);var u=r();void 0!==u&&(e=u)}}return e}n=n||0;for(var b=t.length;b>0&&t[b-1][2]>n;b--)t[b]=t[b-1];t[b]=[o,r,n]},l.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},function(){var t={608:0,698:0,252:0};l.O.j=function(e){return 0===t[e]};var e=function(e,o){var r,n,a=o[0],i=o[1],s=o[2],u=0;if(a.some((function(e){return 0!==t[e]}))){for(r in i)l.o(i,r)&&(l.m[r]=i[r]);if(s)var b=s(l)}for(e&&e(o);u<a.length;u++)n=a[u],l.o(t,n)&&t[n]&&t[n][0](),t[n]=0;return l.O(b)},o=self.webpackChunkflexline=self.webpackChunkflexline||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))}(),l.O(void 0,[698,252],(function(){return l(305)})),l.O(void 0,[698,252],(function(){return l(154)}));var r=l.O(void 0,[698,252],(function(){return l(295)}));r=l.O(r)}();