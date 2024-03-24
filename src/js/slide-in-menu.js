document.addEventListener('DOMContentLoaded', function() {
    var slideInDiv = document.querySelector('.slide-in');
    
    if (!slideInDiv) {
        console.error('The .slide-in div was not found.');
        return;
    }

    var mainButton = document.createElement('button');
    mainButton.id = 'slide-in-menu-button';
    mainButton.className = 'slide-in-menu-button wp-element-button';
    mainButton.setAttribute('aria-label', 'Open Search and Menu');
    mainButton.setAttribute('aria-controls', 'slide-in-menu');
    mainButton.setAttribute('aria-expanded', 'false');
    mainButton.setAttribute('tabindex', '0');
    mainButton.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg></span>';
    mainButton.addEventListener('click', function() {
        toggleMenu();
    });
    slideInDiv.parentNode.insertBefore(mainButton, slideInDiv);

    function updateButtonIcon() {
        var iconSpan = mainButton.querySelector('.material-symbols-outlined');
        if (window.innerWidth > 991) {
            iconSpan.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>';
            mainButton.setAttribute('aria-label', 'Search');
        } else {
            iconSpan.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>';
            mainButton.setAttribute('aria-label', 'Menu');
        }
    }

    updateButtonIcon();
    window.addEventListener('resize', updateButtonIcon);



    function centerButtonInHeader() {
        var header = document.querySelector('.site-header');
        var button = document.getElementById('slide-in-menu-button');
        if (header && button) {
            var headerHeight = header.offsetHeight;
            var buttonHeight = button.offsetHeight;
            var offset = (headerHeight - buttonHeight) / 2;
            button.style.position = 'absolute';
            button.style.top = `${offset}px`;
        }
    }
    centerButtonInHeader();
    window.addEventListener('resize', centerButtonInHeader);
    window.addEventListener('scroll', function() {
        var button = document.getElementById('slide-in-menu-button');
        if (window.scrollY > 0) {
            button.style.position = 'fixed';
            // Check if the viewport width is smaller than 767px
            if (window.matchMedia('(max-width: 781.98px)').matches) {
                button.style.top = '12px'; // Apply for smaller screens
            } else {
                button.style.top = '8px'; // Apply for larger screens
            }
        } else {
            centerButtonInHeader();
        }
    });

    // Adjusted toggleMenu function
    function toggleMenu() {
        var expanded = mainButton.getAttribute('aria-expanded') === 'true';
        mainButton.setAttribute('aria-expanded', !expanded);
        var slideInMenu = document.getElementById('slide-in-menu');
        if (slideInMenu) {
            slideInMenu.setAttribute('aria-hidden', expanded);
            slideInMenu.classList.toggle('active', !expanded);
            document.body.classList.toggle('no-scroll', !expanded);
            if (!expanded) {
                addCloseButton(slideInMenu);
                // After adding the close button and showing the menu, focus on the first focusable element
                var focusableElements = slideInMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                if (focusableElements.length) focusableElements[0].focus();
                // Trap focus within the slide-in menu
                document.addEventListener('keydown', trapTabKey);
            } else {
                // When closing the menu, remove the event listener to trap the tab key
                document.removeEventListener('keydown', trapTabKey);
                mainButton.focus(); // Focus back to the main button when menu is closed
            }
        }
    }

    // Trap tab key within the slide-in menu
    function trapTabKey(e) {
        if (e.key === 'Tab' || e.keyCode === 9) {
            let focusableElements = slideInMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            let firstFocusableElement = focusableElements[0];
            let lastFocusableElement = focusableElements[focusableElements.length - 1];

            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    e.preventDefault();
                    lastFocusableElement.focus();
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    e.preventDefault();
                    firstFocusableElement.focus();
                }
            }
        }

        if (e.key === 'Escape' || e.keyCode === 27) {
            toggleMenu();
        }
    }

    function addCloseButton(menuContainer) {
        if (!document.getElementById('slide-in-menu-close')) {
            var closeButton = document.createElement('button');
            closeButton.id = 'slide-in-menu-close';
            closeButton.className = 'slide-in-menu-close wp-element-button';
            closeButton.setAttribute('aria-label', 'Close Menu');
            closeButton.setAttribute('tabindex', '0');
            closeButton.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>';
            menuContainer.appendChild(closeButton);

            closeButton.addEventListener('click', function() {
                toggleMenu();
            });
        }
    }
});
