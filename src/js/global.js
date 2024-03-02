document.addEventListener('DOMContentLoaded', function() {
   
    // Function to create buttons and implement scrolling for a given scroller
    function setupScrollerButtons(scroller) {
        // Assuming scroller is your scrolling container

        // Create "Scroll to Previous" button
        var scrollToPrevBtn = document.createElement('button');
        scrollToPrevBtn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-prev');
        scrollToPrevBtn.setAttribute('aria-label', 'Scroll to previous item');
        scrollToPrevBtn.setAttribute('role', 'button');
        scrollToPrevBtn.style.margin = '5px 0px 5px 0px';
        scrollToPrevBtn.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></span>';

        // Create "Scroll to Next" button
        var scrollToNextBtn = document.createElement('button');
        scrollToNextBtn.classList.add('is-horizontal-scroll-btn', 'is-horizontal-scroll-next');
        scrollToNextBtn.setAttribute('aria-label', 'Scroll to next item');
        scrollToNextBtn.setAttribute('role', 'button');
        scrollToNextBtn.style.margin = '5px 20px 5px 5px';
        scrollToNextBtn.innerHTML = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></span>';

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

   
});





