document.addEventListener('DOMContentLoaded', function() {
    var settings = FlexlineCustomizerSettings;
    var siteHeader = document.querySelector('.site-header');

    // Determine if the phone link should be used based on the existence of .site-header
    var usePhoneLink = settings.phoneLink !== '' && siteHeader !== null;

    if (usePhoneLink) {
        var link = document.createElement('a');
        link.href = settings.phoneLink;
        link.setAttribute('aria-label', settings.ariaLabel);
        link.className = 'wp-block-button__link';
        link.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg></span>';
        link.id = 'flexline-call-button';

        // Add visibility classes directly to the link based on Customizer settings
        if (settings.hideOnDesktop) link.classList.add('flexline-hide-on-desktop');
        if (settings.hideOnTablet) link.classList.add('flexline-hide-on-tablet');
        if (settings.hideOnMobile) link.classList.add('flexline-hide-on-mobile');

        // Insert the link before the .site-header element in the DOM
        siteHeader.parentNode.insertBefore(link, siteHeader);
        
        // Adjust link positioning within the header
        centerPhoneLinkInHeader();
    }
});

// Center the phone link vertically within the header
function centerPhoneLinkInHeader() {
    var header = document.querySelector('.site-header');
    var button = document.getElementById('flexline-call-button');
    if (header && button) {
        var headerHeight = header.offsetHeight;
        var buttonHeight = button.offsetHeight;
        var offset = (headerHeight - buttonHeight) / 2;
        button.style.position = 'absolute';
        button.style.top = `${offset}px`;
    }
}

// Handle resizing and scrolling to adjust phone link positioning
window.addEventListener('resize', centerPhoneLinkInHeader);
window.addEventListener('scroll', function() {
    var button = document.getElementById('flexline-call-button');
    if (window.scrollY > 0) {
        button.style.position = 'fixed';
        // Check if the viewport width is smaller than 767px
        if (window.matchMedia('(max-width: 781.98px)').matches) {
            button.style.top = '12px'; // Apply for smaller screens
        } else {
            button.style.top = '8px'; // Apply for larger screens
        }
    } else {
        centerPhoneLinkInHeader();
    }
});
