document.addEventListener('DOMContentLoaded', function() {
    var settings = FlexlineCustomizerSettings;
    var siteHeader = document.querySelector('.site-header');

    // Update usePhoneLink to also check for the existence of .site-header
    var usePhoneLink = settings.phoneLink !== '' 
                        && (!settings.hideOnDesktop || !settings.hideOnTablet || !settings.hideOnMobile)
                        && siteHeader !== null; // Check if .site-header exists

    if (usePhoneLink) {
        var link = document.createElement('a');
        link.href = settings.phoneLink;
        link.setAttribute('aria-label', settings.ariaLabel);
        link.className = 'wp-block-button__link';
        link.innerHTML = '<span class="material-symbols-outlined">call</span>';

        var buttonContainer = document.createElement('div');
        buttonContainer.id = 'flexline-call-button';
        buttonContainer.className = 'wp-block-button';
        buttonContainer.appendChild(link);

        // Since we already checked for siteHeader's existence, no need to check again
        siteHeader.insertBefore(buttonContainer, siteHeader.firstChild);

        // Helper function to toggle body classes
        var toggleBodyClass = function(className, condition) {
            document.body.classList.toggle(className + '-hidden', !condition);
            document.body.classList.toggle(className + '-visible', condition);
        };

        // Apply visibility classes based on Customizer settings
        toggleBodyClass('flexline-phone-link-desktop', settings.hideOnDesktop);
        toggleBodyClass('flexline-phone-link-tablet', settings.hideOnTablet);
        toggleBodyClass('flexline-phone-link-mobile', settings.hideOnMobile);
    }
});
