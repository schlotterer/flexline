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
    mainButton.innerHTML = '<span class="material-symbols-outlined">search</span>';
    mainButton.addEventListener('click', function() {
        toggleMenu();
    });
    slideInDiv.parentNode.insertBefore(mainButton, slideInDiv);

    function updateButtonIcon() {
        var iconSpan = mainButton.querySelector('.material-symbols-outlined');
        if (window.innerWidth > 991) {
            iconSpan.innerHTML = 'search';
            mainButton.setAttribute('aria-label', 'Search');
        } else {
            iconSpan.innerHTML = 'menu';
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
            button.style.top = '6px';
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
            closeButton.innerHTML = '<span class="material-symbols-outlined">close</span>';
            menuContainer.appendChild(closeButton);

            closeButton.addEventListener('click', function() {
                toggleMenu();
            });
        }
    }
});
