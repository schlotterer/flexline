document.addEventListener("DOMContentLoaded",(function(){var e=document.querySelector(".slide-in");if(e){var t=document.createElement("button");t.id="slide-in-menu-button",t.className="slide-in-menu-button",t.setAttribute("aria-controls","slide-in-menu"),t.setAttribute("aria-expanded","false"),t.innerHTML='<span class="material-symbols-outlined">search</span>',t.addEventListener("click",(function(){console.log("Menu button clicked"),o()})),e.parentNode.insertBefore(t,e),n(),window.addEventListener("resize",n),i(),window.addEventListener("resize",i),window.addEventListener("scroll",(function(){var e=document.getElementById("slide-in-menu-button");window.scrollY>0?(e.style.position="fixed",e.style.top="6px"):i()})),document.querySelectorAll(".is-style-horizontal-scroll").forEach((function(e){!function(e){var t=document.createElement("button");t.classList.add("is-horizontal-scroll-btn","is-horizontal-scroll-prev"),t.setAttribute("aria-label","Scroll to previous item"),t.setAttribute("role","button"),t.style.margin="5px 0px 5px 0px",t.innerHTML='<span class="material-symbols-outlined">chevron_left</span>';var n=document.createElement("button");n.classList.add("is-horizontal-scroll-btn","is-horizontal-scroll-next"),n.setAttribute("aria-label","Scroll to next item"),n.setAttribute("role","button"),n.style.margin="5px 20px 5px 5px",n.innerHTML='<span class="material-symbols-outlined">chevron_right</span>',e.parentNode.insertBefore(n,e.nextSibling),e.parentNode.insertBefore(t,n),[n,t].forEach((function(e){e.style.outline="none",e.style.border="2px solid transparent",e.onfocus=function(){this.style.border="2px solid var(--wp--preset--color--primary)"},e.onblur=function(){this.style.border="2px solid transparent"}})),n.addEventListener("click",(function(){for(var t=e.querySelectorAll(".is-style-horizontal-scroll > *"),n=e.getBoundingClientRect(),o=null,i=0;i<t.length;i++)if(t[i].getBoundingClientRect().left-n.left>=0){o=t[i+1];break}if(o){var l=o.offsetLeft-e.offsetLeft;e.scrollTo({left:l,behavior:"smooth"})}})),t.addEventListener("click",(function(){for(var t=e.querySelectorAll(".is-style-horizontal-scroll > *"),n=e.scrollLeft,o=null,i=0;i<t.length;i++)if(t[i].offsetLeft+t[i].clientWidth>n){o=t[i-1];break}o&&e.scrollTo({left:o.offsetLeft,behavior:"smooth"})}))}(e)}))}else console.error("The .slide-in div was not found.");function n(){var e=t.querySelector(".material-symbols-outlined");window.innerWidth>991?(e.innerHTML="search",t.setAttribute("aria-label","Search")):(e.innerHTML="menu",t.setAttribute("aria-label","Menu"))}function o(){var e="true"===t.getAttribute("aria-expanded");t.setAttribute("aria-expanded",!e);var n=document.getElementById("slide-in-menu");n&&(n.setAttribute("aria-hidden",e),n.classList.toggle("active",!e),document.body.classList.toggle("no-scroll",!e),e||function(e){if(!document.getElementById("slide-in-menu-close")){var t=document.createElement("button");t.id="slide-in-menu-close",t.className="slide-in-menu-close",t.setAttribute("aria-label","Close Menu"),t.innerHTML='<span class="material-symbols-outlined">close</span>',e.appendChild(t),t.addEventListener("click",(function(){o()}))}}(n))}function i(){var e=document.querySelector(".site-header"),t=document.getElementById("slide-in-menu-button");if(e&&t){var n=(e.offsetHeight-t.offsetHeight)/2;t.style.position="absolute",t.style.top="".concat(n,"px")}}}));