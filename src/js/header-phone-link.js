document.addEventListener('DOMContentLoaded', function() {
    var link = document.createElement('a');
    link.setAttribute('href', FlexlineCustomizerSettings.phoneLink);
    link.setAttribute('aria-label', FlexlineCustomizerSettings.ariaLabel);
    link.classList.add('wp-block-button__link');
    link.id = 'flexline-call-button';

    var iconHTML = '<span class="material-symbols-outlined">call</span>';
    link.innerHTML = iconHTML;

    var buttonContainer = document.createElement('div');
    buttonContainer.classList.add('wp-block-button');

    // Check and apply visibility classes
    var bodyClassList = document.body.classList;
    if (FlexlineCustomizerSettings.hideOnDesktop) {
        buttonContainer.classList.add('flexline-hide-on-desktop');
    } else {
        // Indicate the presence of the button on desktop
        bodyClassList.add('flexline-phone-button-visible-desktop');
    }

    if (FlexlineCustomizerSettings.hideOnTablet) {
        buttonContainer.classList.add('flexline-hide-on-tablet');
    } else {
        // Indicate the presence of the button on tablet
        bodyClassList.add('flexline-phone-button-visible-tablet');
    }

    if (FlexlineCustomizerSettings.hideOnMobile) {
        buttonContainer.classList.add('flexline-hide-on-mobile');
    } else {
        // Indicate the presence of the button on mobile
        bodyClassList.add('flexline-phone-button-visible-mobile');
    }

    document.body.appendChild(buttonContainer);
});
