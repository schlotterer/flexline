document.addEventListener("DOMContentLoaded",(function(){var e=document.querySelector("header.site-header");if(e){var n=document.querySelector("header.site-header").offsetHeight+75;new Headroom(e,{offset:n,tolerance:{up:3,down:0},classes:{initial:"headroom",pinned:"headroom--pinned",unpinned:"headroom--unpinned"},onPin:function(){var e=document.querySelector("#slide-in-menu-button"),n=document.querySelector("#web4sl-call-button");t(e),t(n)},onUnpin:function(){var e=document.querySelector("#slide-in-menu-button"),n=document.querySelector("#web4sl-call-button");t(e),t(n)}}).init()}function t(e){var n=window.scrollY>0,t=document.querySelector("header.site-header");if(t.classList.contains("headroom")&&t.classList.contains("headroom--unpinned")?n=!0:t.classList.contains("headroom")&&t.classList.contains("headroom--pinned")&&(n=!1),n){var o=window.matchMedia("(max-width: 781.98px)").matches;e.style.top=o?"12px":"6px"}else e.style.top="",function(e){var n=document.querySelector("#header_container");if(n){var t=(n.offsetHeight-e.offsetHeight)/2;e.style.position="fixed",e.style.top="".concat(n.offsetTop+t,"px")}}(e)}}));