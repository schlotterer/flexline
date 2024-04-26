// Function to detect video type and return an embeddable URL
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
        if (match && match[1]) {
            // For Vimeo the ID is in match[1], same for YouTube as match[2] is the second group.
            const videoId = match[2] || match[1]; // Fallback to match[1] if match[2] is undefined.
            return parser.embedUrl(videoId);
        }
    }

    return '';
}
document.addEventListener('DOMContentLoaded', () => {
    const enableModal = (element, url) => {
        element.classList.add('has-modal');
        element.setAttribute('data-enable-modal', 'true');
        element.setAttribute('data-modal-media-url', url);
        
        const iconPlay = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg"  height="20" viewBox="0 -960 960 960" width="20"><path fill="currentColor" d="M320-200v-560l440 280-440 280Z"/></svg></span>';
        const iconExpand = '<span class="material-symbols-outlined"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path fill="currentColor" d="M200-200v-240h80v160h160v80H200Zm480-320v-160H520v-80h240v240h-80Z"/></svg></span>';
        
        if (/youtube\.com|youtu\.be|vimeo\.com|\.mp4|\.webm|\.ogg/.test(url)) {
            // add the play icon to the end of the button content
            element.insertAdjacentHTML('beforeend', iconPlay);
        } else {
            // add the expand icon to the end of the button content
            element.insertAdjacentHTML('beforeend', iconExpand);
        }


        element.addEventListener('click', e => {
            e.preventDefault();
            displayModal(url); // Function to display the modal
        });
    };

    document.querySelectorAll('.enable-modal').forEach(block => {
        const mediaElement = block.querySelector('img, a');
        if (!mediaElement) return;

        let mediaUrl = block.dataset.modalMediaUrl || mediaElement.getAttribute(mediaElement.tagName === 'A' ? 'href' : 'src');
        if (mediaUrl) enableModal(mediaElement, mediaUrl);
    });

    document.querySelectorAll('.wp-block-group.group-link').forEach(block => {
        const mediaUrl = block.dataset.groupLinkUrl;
        if (!mediaUrl) return;

        const triggerModal = e => {
            e.preventDefault();
            displayModal(mediaUrl);
        };

        const openInNewTab = e => {
            e.preventDefault();
            window.open(mediaUrl, '_blank').focus();
        };

        const redirectToUrl = e => {
            e.preventDefault();
            window.location.href = mediaUrl;
        };

        const action = block.classList.contains('group-link-type-modal_media') ? triggerModal : 
                       block.classList.contains('group-link-type-new_tab') ? openInNewTab : redirectToUrl;

        block.addEventListener('click', action);
    });
});

function displayModal(mediaUrl) {
    console.log('Displaying modal for:', mediaUrl);
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

    // Create the modal container
    const modal = document.createElement('div');
    modal.id = 'flexline-modal';
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.left = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    modal.style.display = 'flex';
    modal.style.justifyContent = 'center';
    modal.style.alignItems = 'center';
    modal.style.zIndex = '10000000';
    modal.style.cursor = 'pointer';
    modal.setAttribute('role', 'dialog');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-label', 'Media Modal');

    // Create the close button
    const closeButton = document.createElement('span');
    closeButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#ffffff" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>';
    closeButton.style.position = 'absolute';
    closeButton.style.top = '20px';
    closeButton.style.right = '20px';
    closeButton.style.fontSize = '24px';
    closeButton.style.color = '#fff';
    closeButton.style.cursor = 'pointer';
    closeButton.setAttribute('aria-label', 'Close modal');
    closeButton.setAttribute('role', 'button');
    closeButton.setAttribute('tabindex', '0'); // Make it focusable
    closeButton.className = 'material-symbols-outlined';

    // Append the media content and close button to the modal
    modal.innerHTML = contentHtml;
    modal.appendChild(closeButton);

    // Append the modal to the body
    document.body.appendChild(modal);

    // Focus management for accessibility
    closeButton.focus();

    // Event listener for the close button
    closeButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent the modal click event from firing
        modal.remove();
    });

    // Optional: Close the modal when clicking outside the media content
    modal.addEventListener('click', () => {
        modal.remove();
    });

    // Close the modal with the Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            modal.remove();
        }
    }, { once: true }); // Use the `once` option to auto-remove this event listener
}


