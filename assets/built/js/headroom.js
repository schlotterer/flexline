document.addEventListener("DOMContentLoaded",(function(){var e=document.querySelector("header.site-header");if(e){var n=document.querySelector("header.site-header").offsetHeight+20;console.log(n),new Headroom(e,{offset:n,tolerance:{up:3,down:2},classes:{initial:"headroom",pinned:"headroom--pinned",unpinned:"headroom--unpinned"},onPin:function(){var e=document.querySelector("#slide-in-menu-button"),n=document.querySelector("#web4sl-call-button");o(e),o(n)},onUnpin:function(){var e=document.querySelector("#slide-in-menu-button"),n=document.querySelector("#web4sl-call-button");o(e),o(n)}}).init()}function o(e){var n=window.scrollY>0,o=document.querySelector("header.site-header");if(o.classList.contains("headroom")&&o.classList.contains("headroom--unpinned")?n=!0:o.classList.contains("headroom")&&o.classList.contains("headroom--pinned")&&(n=!1),n){var t=window.matchMedia("(max-width: 781.98px)").matches;e.style.top=t?"12px":"6px"}else e.style.top="",function(e){var n=document.querySelector("#header_container");if(n){var o=(n.offsetHeight-e.offsetHeight)/2;e.style.position="fixed",e.style.top="".concat(n.offsetTop+o,"px")}}(e)}}));