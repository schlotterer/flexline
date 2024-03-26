document.addEventListener('DOMContentLoaded', function() {
    const settings = FlexlineCustomizerSettings;
    const siteHeader = document.querySelector('.site-header');
    const iconPhone = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg>';

    if (settings.phoneLink && siteHeader) {
        const link = document.createElement('a');
        link.href = settings.phoneLink;
        link.setAttribute('aria-label', settings.ariaLabel);
        link.className = 'wp-block-button__link';
        link.innerHTML = iconPhone;
        link.id = 'flexline-call-button';
        
        addVisibilityClasses(link, settings);
       
        siteHeader.parentNode.insertBefore(link, siteHeader);
        adjustLinkPosition(); // Adjust the link's position on load, resize, and scroll
    }
});

function addVisibilityClasses(link, settings) {
    if (settings.hideOnDesktop) link.classList.add('flexline-hide-on-desktop');
    if (settings.hideOnTablet) link.classList.add('flexline-hide-on-tablet');
    if (settings.hideOnMobile) link.classList.add('flexline-hide-on-mobile');
}

function adjustLinkPosition() {
    const header = document.querySelector('.site-header');
    const button = document.getElementById('flexline-call-button');
    if (header && button) {
        const headerHeight = header.offsetHeight;
        const buttonHeight = button.offsetHeight;
        const offset = (headerHeight - buttonHeight) / 2;
        button.style.position = window.scrollY > 0 ? 'fixed' : 'absolute';
        button.style.top = window.scrollY > 0 ?
            (window.matchMedia('(max-width: 781.98px)').matches ? '12px' : '8px') :
            `${offset}px`;
    }
}

// Debounce function to prevent excessive calculations and DOM manipulations on rapid events
function debounce(func, wait) {
    let timeout;
    return function() {
        const later = () => {
            clearTimeout(timeout);
            func();
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

window.addEventListener('resize', debounce(adjustLinkPosition, 100));
window.addEventListener('scroll', debounce(adjustLinkPosition, 100));
