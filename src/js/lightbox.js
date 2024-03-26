// Function to detect video type and return an embeddable URL
// Enhanced function to detect video type and return an embeddable URL
function getVideoEmbedUrl(mediaUrl) {
    const urlParsers = [
        {
            match: /(youtube\.com\/watch\?v=|youtu\.be\/)([\w-]+)/,
            embedUrl: id => `https://www.youtube.com/embed/${id}?autoplay=1&enablejsapi=1`
        },
        {
            match: /vimeo\.com\/(\d+)/,
            embedUrl: id => `https://player.vimeo.com/video/${id}?autoplay=1`
        }
    ];

    for (let parser of urlParsers) {
        const match = mediaUrl.match(parser.match);
        if (match && match[2]) {
            return parser.embedUrl(match[2]);
        }
    }

    return '';
}

document.addEventListener('DOMContentLoaded', () => {
    const enablePopup = (element, url) => {
        element.classList.add('has-popup');
        element.setAttribute('data-enable-popup', 'true');
        element.setAttribute('data-popup-media-url', url);

        element.addEventListener('click', e => {
            e.preventDefault();
            displayLightbox(url); // Function to display the lightbox
        });
    };

    document.querySelectorAll('.enable-lightbox').forEach(block => {
        const mediaElement = block.querySelector('img, a');
        if (!mediaElement) return;

        let mediaUrl = block.dataset.popupMediaUrl || mediaElement.getAttribute(mediaElement.tagName === 'A' ? 'href' : 'src');
        if (mediaUrl) enablePopup(mediaElement, mediaUrl);
    });

    document.querySelectorAll('.wp-block-group.group-link').forEach(block => {
        const mediaUrl = block.dataset.groupLinkUrl;
        if (!mediaUrl) return;

        const triggerLightbox = e => {
            e.preventDefault();
            displayLightbox(mediaUrl);
        };

        const openInNewTab = e => {
            e.preventDefault();
            window.open(mediaUrl, '_blank').focus();
        };

        const redirectToUrl = e => {
            e.preventDefault();
            window.location.href = mediaUrl;
        };

        const action = block.classList.contains('group-link-type-popup_media') ? triggerLightbox : 
                       block.classList.contains('group-link-type-new_tab') ? openInNewTab : redirectToUrl;

        block.addEventListener('click', action);
    });
});

function displayLightbox(mediaUrl) {
    console.log('Displaying lightbox for:', mediaUrl);
    let contentHtml = '';

    if (mediaUrl.match(/\.(jpeg|jpg|gif|png)$/)) {
        contentHtml = `<img src="${mediaUrl}" style="max-width:90%; max-height:80vh;">`;
    } else if (mediaUrl.includes('youtube.com') || mediaUrl.includes('youtu.be') || mediaUrl.includes('vimeo.com')) {
        // Extract the YouTube video ID and construct the embed URL with autoplay
        const videoEmbedUrl = getVideoEmbedUrl(mediaUrl);
        contentHtml = `<div class="aspect-ratio-16-9"><iframe src="${videoEmbedUrl}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>`;
    } else if (mediaUrl.match(/\.(mp4|webm|ogg)$/)) {
        // For native video elements, add the autoplay attribute
        contentHtml = `<div class="aspect-ratio-16-9"><video controls autoplay src="${mediaUrl}" style="object-fit: contain;"></video></div>`;
    } else {
        // other domains try to put them in an iframe
        contentHtml = `<div class="aspect-ratio-match-window"><iframe src="${mediaUrl}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>`;
    }

    // Create the lightbox container
    const lightbox = document.createElement('div');
    lightbox.id = 'flexline-lightbox';
    lightbox.style.position = 'fixed';
    lightbox.style.top = '0';
    lightbox.style.left = '0';
    lightbox.style.width = '100%';
    lightbox.style.height = '100%';
    lightbox.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    lightbox.style.display = 'flex';
    lightbox.style.justifyContent = 'center';
    lightbox.style.alignItems = 'center';
    lightbox.style.zIndex = '10000000';
    lightbox.style.cursor = 'pointer';
    lightbox.setAttribute('role', 'dialog');
    lightbox.setAttribute('aria-modal', 'true');
    lightbox.setAttribute('aria-label', 'Media Lightbox');

    // Create the close button
    const closeButton = document.createElement('span');
    closeButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>';
    closeButton.style.position = 'absolute';
    closeButton.style.top = '20px';
    closeButton.style.right = '20px';
    closeButton.style.fontSize = '24px';
    closeButton.style.color = '#fff';
    closeButton.style.cursor = 'pointer';
    closeButton.setAttribute('aria-label', 'Close lightbox');
    closeButton.setAttribute('role', 'button');
    closeButton.setAttribute('tabindex', '0'); // Make it focusable
    closeButton.className = 'material-symbols-outlined';

    // Append the media content and close button to the lightbox
    lightbox.innerHTML = contentHtml;
    lightbox.appendChild(closeButton);

    // Append the lightbox to the body
    document.body.appendChild(lightbox);

    // Focus management for accessibility
    closeButton.focus();

    // Event listener for the close button
    closeButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent the lightbox click event from firing
        lightbox.remove();
    });

    // Optional: Close the lightbox when clicking outside the media content
    lightbox.addEventListener('click', () => {
        lightbox.remove();
    });

    // Close the lightbox with the Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            lightbox.remove();
        }
    }, { once: true }); // Use the `once` option to auto-remove this event listener
}


