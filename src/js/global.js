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
        var isExpanded = isClosing || menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', !isExpanded);
        slideInMenu.setAttribute('aria-hidden', isExpanded);
        slideInMenu.classList.toggle('active', !isExpanded);
    }
});
