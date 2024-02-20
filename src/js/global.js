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
    mainButton.className = 'slide-in-menu-button';
    mainButton.setAttribute('aria-controls', 'slide-in-menu');
    mainButton.setAttribute('aria-expanded', 'false');
    mainButton.innerHTML = '<span class="dashicons dashicons-search"></span>'; // Set the default icon
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
        var iconSpan = mainButton.querySelector('.dashicons');
        if (window.innerWidth > 991) {
            iconSpan.className = 'dashicons dashicons-search';
            mainButton.setAttribute('aria-label', 'Search');
        } else {
            iconSpan.className = 'dashicons dashicons-menu';
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
            closeButton.className = 'slide-in-menu-close';
            closeButton.setAttribute('aria-label', 'Close Menu');
            closeButton.innerHTML = '<span class="dashicons dashicons-no"></span>'; // Use Dashicon 'no' for close icon
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
            button.style.top = '5px'; // Adjust this value to fit your design
        } else {
            // Re-center the button if the page is scrolled back to the top
            centerButtonInHeader();
        }
    });

   



    // Function to create buttons and implement scrolling for a given scroller
    function setupScrollerButtons(scroller) {
        // Assuming scroller is your scrolling container

        // Create "Scroll to Previous" button
        var scrollToPrevBtn = document.createElement('button');
        scrollToPrevBtn.textContent = 'Scroll to Previous';
        scrollToPrevBtn.setAttribute('aria-label', 'Scroll to previous item');
        scrollToPrevBtn.setAttribute('role', 'button');
        scrollToPrevBtn.style.margin = '0 4px';

        // Create "Scroll to Next" button
        var scrollToNextBtn = document.createElement('button');
        scrollToNextBtn.textContent = 'Scroll to Next';
        scrollToNextBtn.setAttribute('aria-label', 'Scroll to next item');
        scrollToNextBtn.setAttribute('role', 'button');
        scrollToNextBtn.style.margin = '0 4px';

        // Insert both buttons below the scroller
        // The key here is to insert the "Scroll to Next" button first if we want it on the right, 
        // and then insert the "Scroll to Previous" button before it, if keeping them below the scroller
        scroller.parentNode.insertBefore(scrollToNextBtn, scroller.nextSibling); // Insert "Scroll to Next" first
        scroller.parentNode.insertBefore(scrollToPrevBtn, scrollToNextBtn); // Then insert "Scroll to Previous" before "Scroll to Next"



        // Enhance keyboard navigation and focus styles
        [scrollToNextBtn, scrollToPrevBtn].forEach(function(btn) {
            btn.style.outline = 'none'; // Use custom focus styles
            btn.style.border = '2px solid transparent'; // Placeholder for focus style
            btn.onfocus = function() {
                this.style.border = '2px solid var(--wp--preset--color--primary)'; // Example focus style
            };
            btn.onblur = function() {
                this.style.border = '2px solid transparent';
            };
        });

        scrollToNextBtn.addEventListener('click', function() {
            var items = scroller.querySelectorAll('.is-style-horizontal-scroll > *');
            var scrollerRect = scroller.getBoundingClientRect();
            var currentScrollLeft = scroller.scrollLeft;
            var nextItemToScrollTo = null;
        
            for (let i = 0; i < items.length; i++) {
                let item = items[i];
                let itemRect = item.getBoundingClientRect();
                
                // Find the item that is currently at or just passed the left edge of the scroller
                if (itemRect.left - scrollerRect.left >= 0) {
                    nextItemToScrollTo = items[i + 1]; // The next item to scroll into view
                    break;
                }
            }
        
            if (nextItemToScrollTo) {
                // Calculate the scroll amount needed to align the next item to the left edge
                let nextItemStart = nextItemToScrollTo.offsetLeft - scroller.offsetLeft;
                scroller.scrollTo({
                    left: nextItemStart,
                    behavior: 'smooth'
                });
            }
        });
        

        // Adjusted Scroll to the previous item function for precise alignment
        scrollToPrevBtn.addEventListener('click', function() {
            var items = scroller.querySelectorAll('.is-style-horizontal-scroll > *');
            var currentScroll = scroller.scrollLeft;
            var targetItem = null;

            for (let i = 0; i < items.length; i++) {
                if (items[i].offsetLeft + items[i].clientWidth > currentScroll) {
                    targetItem = items[i - 1];
                    break;
                }
            }

            if (targetItem) {
                scroller.scrollTo({
                    left: targetItem.offsetLeft,
                    behavior: 'smooth'
                });
            }
        });
    }
    var scrollers = document.querySelectorAll('.is-style-horizontal-scroll');
    scrollers.forEach(function(scroller) {
        setupScrollerButtons(scroller);
    });

    // Function to check if the current device supports touch interactions
    function isTouchDevice() {
        return ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0);
    }

    // Only modify scroll behavior if it's not a touch device
    if (!isTouchDevice()) {
        document.querySelectorAll('.is-style-horizontal-scroll').forEach(function(el) {
            el.addEventListener('wheel', function(event) {
                // Calculate the maximum scroll left offset
                var maxScrollLeft = this.scrollWidth - this.clientWidth;
                
                // If scrolling at the start or end, allow default vertical scroll
                if ((this.scrollLeft === 0 && event.deltaY < 0) || (this.scrollLeft >= maxScrollLeft && event.deltaY > 0)) {
                    return; // Exit the function and allow vertical scroll
                }

                event.preventDefault(); // Prevent vertical scroll
                this.scrollLeft += event.deltaY; // Translate vertical scroll delta into horizontal scroll
            });
        });
    }
    
});





