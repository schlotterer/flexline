document.addEventListener('DOMContentLoaded', function() {
   
    function setupScrollerButtons(scroller) {
        // Create "Scroll to Previous" button
        const scrollToPrevBtn = document.createElement('button');
        scrollToPrevBtn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-prev');
        scrollToPrevBtn.setAttribute('aria-label', 'Scroll to previous item');
        scrollToPrevBtn.setAttribute('role', 'button');
        scrollToPrevBtn.style.margin = '5px 0px 5px 0px';
        scrollToPrevBtn.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';

        // Create "Scroll to Next" button
        const scrollToNextBtn = document.createElement('button');
        scrollToNextBtn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-next');
        scrollToNextBtn.setAttribute('aria-label', 'Scroll to next item');
        scrollToNextBtn.setAttribute('role', 'button');
        scrollToNextBtn.style.margin = '5px 20px 5px 5px';
        scrollToNextBtn.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';

        // Place buttons outside and adjacent to the scroller
        scroller.after(scrollToNextBtn);
        scroller.after(scrollToPrevBtn); // Ensures Prev button is directly after the scroller

        // Style adjustments for buttons
        [scrollToNextBtn, scrollToPrevBtn].forEach(function(btn) {
            btn.style.outline = 'none';
            btn.style.border = '2px solid transparent';
            btn.onfocus = function() {
                this.style.border = '2px solid var(--wp--preset--color--primary)';
            };
            btn.onblur = function() {
                this.style.border = '2px solid transparent';
            };
        });

        scrollToNextBtn.addEventListener('click', function() {
            let currentScrollPosition = scroller.scrollLeft;
            let targetScrollPosition = currentScrollPosition; // Default to current if no item is found
            const items = Array.from(scroller.children);

            for (let item of items) {
                let itemStart = item.offsetLeft;
                let itemEnd = itemStart + item.offsetWidth;

                // If an item's start is beyond the current scroll position, it's our next target
                if (itemStart > currentScrollPosition) {
                    targetScrollPosition = itemStart; // Set to scroll to the start of this item
                    break; // Exit loop once the next item is found
                }
            }

            scroller.scrollTo({
                left: targetScrollPosition,
                behavior: 'smooth'
            });
        });

        scrollToPrevBtn.addEventListener('click', function() {
            const items = Array.from(scroller.children);
            let targetScrollPosition = scroller.scrollLeft;
            let firstVisibleItemFound = false;
            
            for (let i = 0; i < items.length; i++) {
                let item = items[i];
                let itemStart = item.offsetLeft;
                let itemEnd = itemStart + item.offsetWidth;
                
                // Check if the item is fully or partially visible in the scroller's viewport
                if (itemStart >= scroller.scrollLeft && itemEnd <= (scroller.scrollLeft + scroller.offsetWidth)) {
                    // Found the first fully or partially visible item
                    firstVisibleItemFound = true;
                    
                    // Now find the previous item to this one
                    if (i > 0) {
                        let previousItem = items[i - 1];
                        targetScrollPosition = previousItem.offsetLeft;
                    } else {
                        // If it's the first item, then we scroll to the start
                        targetScrollPosition = 0;
                    }
                    break;
                }
            }

            // If no fully or partially visible item found, it means we're at the start or items are larger than viewport
            if (!firstVisibleItemFound && items.length > 0) {
                // This condition might be adjusted based on the actual behavior you're observing
                targetScrollPosition = items[0].offsetLeft; // Scroll to the first item
            }

            scroller.scrollTo({
                left: targetScrollPosition,
                behavior: 'smooth'
            });
        });
    }

    // Initialize scroller buttons for each scroller
    const scrollers = document.querySelectorAll('.is-style-horizontal-scroll');
    scrollers.forEach(setupScrollerButtons);
});
