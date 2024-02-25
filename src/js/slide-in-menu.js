document.addEventListener('DOMContentLoaded', function() {
    // Target the .slide-in div
    var slideInDiv = document.querySelector('.slide-in');

    // Ensure the .slide-in div exists
    if (!slideInDiv) {
        console.error('The .slide-in div was not found.');
        return; // Exit if .slide-in div is not found
    }

    // Create the main toggle button
    var mainButton = document.createElement('button');
    mainButton.id = 'slide-in-menu-button';
    mainButton.className = 'slide-in-menu-button wp-element-button';
    mainButton.setAttribute('aria-label', 'Open Search and Menu');
    mainButton.setAttribute('aria-controls', 'slide-in-menu');
    mainButton.setAttribute('aria-expanded', 'false');
    mainButton.setAttribute('tabindex', '0');
    mainButton.innerHTML = '<span class="material-symbols-outlined">search</span>'; // Set the default icon
    // Add click event listener directly to the button during its creation
    mainButton.addEventListener('click', function() {
        // Logic to toggle the slide-in menu
        console.log('Menu button clicked');
        toggleMenu();
    });

    
    
    // Insert the main toggle button just before the .slide-in div
    slideInDiv.parentNode.insertBefore(mainButton, slideInDiv);

    // Function to update the button icon based on screen size
    function updateButtonIcon() {
        var iconSpan = mainButton.querySelector('.material-symbols-outlined');
        if (window.innerWidth > 991) {
            // Update the content of the button to "search" icon
            iconSpan.innerHTML = 'search'; // For text-based changes
            mainButton.setAttribute('aria-label', 'Search');
            
        } else {
            // Update the content of the button to "menu" icon
            iconSpan.innerHTML = 'menu'; // For text-based changes
            mainButton.setAttribute('aria-label', 'Menu');
        }
    }

    // Call updateButtonIcon initially and on window resize
    updateButtonIcon();
    window.addEventListener('resize', updateButtonIcon);

    
    // Toggle the visibility of the slide-in menu
    function toggleMenu() {
        var expanded = mainButton.getAttribute('aria-expanded') === 'true';
        mainButton.setAttribute('aria-expanded', !expanded);
        var slideInMenu = document.getElementById('slide-in-menu'); // Ensure this is the correct ID for your menu
        if (slideInMenu) {
            slideInMenu.setAttribute('aria-hidden', expanded);
            slideInMenu.classList.toggle('active', !expanded);
            document.body.classList.toggle('no-scroll', !expanded);
            if (!expanded) {
                // Dynamically add the close button inside slideInMenu when opening
                addCloseButton(slideInMenu);
            }
        }
    }

    // Function to dynamically add the close button inside slideInMenu
    function addCloseButton(menuContainer) {
        // Check if the close button already exists to avoid duplicates
        if (!document.getElementById('slide-in-menu-close')) {
            var closeButton = document.createElement('button');
            closeButton.id = 'slide-in-menu-close';
            closeButton.className = 'slide-in-menu-close wp-element-button';
            mainButton.setAttribute('aria-label', 'Close Search and Menu');
            closeButton.setAttribute('aria-label', 'Close Menu');
            closeButton.setAttribute('tabindex', '0');
            closeButton.innerHTML = '<span class="material-symbols-outlined">close</span>'; // Use Dashicon 'no' for close icon
            menuContainer.appendChild(closeButton); // Append close button to the menu container

            // Close menu action
            closeButton.addEventListener('click', function() {
                toggleMenu(); // Reuse toggleMenu to close
            });
        }
    }

    // Function to center the button in the site header
    function centerButtonInHeader() {
        var header = document.querySelector('.site-header');
        var button = document.getElementById('slide-in-menu-button');

        if (header && button) {
            var headerHeight = header.offsetHeight;
            var buttonHeight = button.offsetHeight;
            var offset = (headerHeight - buttonHeight) / 2;
            button.style.position = 'absolute'; // Or 'relative' depending on your layout
            button.style.top = `${offset}px`;
        }
    }

    // Call the function initially to center the button
    centerButtonInHeader();

    // Add a resize listener to re-center the button when the window size changes
    window.addEventListener('resize', centerButtonInHeader);

    // Add a scroll listener to adjust the button's position after scrolling begins
    window.addEventListener('scroll', function() {
        var button = document.getElementById('slide-in-menu-button');
        if (window.scrollY > 0) {
            // Reset or adjust the button's position when the page is scrolled
            button.style.position = 'fixed'; // Keep the button fixed at the top or adjust as necessary
            button.style.top = '6px'; // Adjust this value to fit your design
        } else {
            // Re-center the button if the page is scrolled back to the top
            centerButtonInHeader();
        }
    });
    var menuOpenButton = document.getElementById('slide-in-menu-button'); // Adjust the ID accordingly
    var menuCloseButton = document.getElementById('slide-in-menu-close'); // Adjust the ID accordingly
    var menu = document.getElementById('menu'); // Adjust the ID accordingly

    var focusableElementsString = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]';
    var focusableElements = menu.querySelectorAll(focusableElementsString);
    var firstFocusableElement = focusableElements[0];
    var lastFocusableElement = focusableElements[focusableElements.length - 1];

    // Open menu and trap focus inside
    menuOpenButton.addEventListener('click', function() {
        menu.style.display = 'block';
        firstFocusableElement.focus();
        
        // Trap focus within modal
        document.addEventListener('keydown', trapTabKey);
    });

    // Close menu function
    function closeMenu() {
        menu.style.display = 'none';
        menuOpenButton.focus();
        document.removeEventListener('keydown', trapTabKey);
    }

    // Listen for and trap the keyboard
    function trapTabKey(e) {
        // Check for TAB key press, loop focus within modal
        if (e.keyCode === 9) {
            if (e.shiftKey) /* shift + tab */ {
                if (document.activeElement === firstFocusableElement) {
                    e.preventDefault();
                    lastFocusableElement.focus();
                }
            } else /* tab */ {
                if (document.activeElement === lastFocusableElement) {
                    e.preventDefault();
                    firstFocusableElement.focus();
                }
            }
        }

        // Close modal on ESC key
        if (e.keyCode === 27) {
            closeMenu();
        }

        // Handle Enter key on close button
        if (e.keyCode === 13 && document.activeElement === menuCloseButton) {
            closeMenu();
        }
    }

    // Close button listener
    menuCloseButton.addEventListener('click', closeMenu);

    
    
});





