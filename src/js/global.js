document.addEventListener('DOMContentLoaded', function () {
    
    var menuButton = document.querySelector('.slide-in-menu-button');
    var slideInMenu = document.getElementById('slide-in-menu');
    var closeButton = document.querySelector('.close-menu');

    menuButton.addEventListener('click', function () {
        toggleMenu(false); // Open the menu
    });

    closeButton.addEventListener('click', function () {
        toggleMenu(true); // Close the menu
    });

    function toggleMenu(isClosing) {
        var body = document.body;
        var isExpanded = isClosing || menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', !isExpanded);
        slideInMenu.setAttribute('aria-hidden', isExpanded);
        slideInMenu.classList.toggle('active', !isExpanded);
        body.classList.toggle('no-scroll');
    }

    // Function to update button appearance based on viewport width
    function updateButtonIcon() {
        var button = document.getElementById('slide-in-menu-button');

        // Check if the viewport width is greater than 768px for desktop
        if (window.innerWidth > 768) {
            // Change to search icon and update aria-label for desktop
            button.innerHTML = '&#x1F50D;'; // Unicode for search icon
            button.setAttribute('aria-label', 'Search');
        } else {
            // Change back to hamburger menu icon and update aria-label for mobile
            button.innerHTML = '&#x2630;'; // Unicode for hamburger menu
            button.setAttribute('aria-label', 'Menu');
        }
    }

    // Listen for window resize events
    window.addEventListener('resize', updateButtonIcon);

    // Initial update on page load
    updateButtonIcon();

});

