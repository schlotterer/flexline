// Function to detect video type and return an embeddable URL
function getVideoEmbedUrl(mediaUrl) {
    let embedUrl = '';
    if (mediaUrl.includes('youtube.com') || mediaUrl.includes('youtu.be')) {
        const youtubeId = mediaUrl.split(/v=|youtu\.be\//)[1].split(/[?&]/)[0];
        embedUrl = `https://www.youtube.com/embed/${youtubeId}`;
    } else if (mediaUrl.includes('vimeo.com')) {
        const vimeoId = mediaUrl.split('/').pop();
        embedUrl = `https://player.vimeo.com/video/${vimeoId}`;
    }
    return embedUrl;
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.enable-lightbox').forEach(block => {
        const firstEligibleElement = block.querySelector('img, a'); // Adjust based on your target elements

        if (firstEligibleElement) {
            // Retrieve the media URL stored in the block's data attribute
            const mediaUrl = block.getAttribute('data-popup-media-url');

            if (mediaUrl) {
                // Apply the lightbox logic here
                firstEligibleElement.classList.add('has-popup');
                firstEligibleElement.setAttribute('data-enable-popup', 'true');
                firstEligibleElement.setAttribute('data-popup-media-url', mediaUrl);

                // Add event listener or other logic to trigger the lightbox with the media URL
                firstEligibleElement.addEventListener('click', (e) => {
                    e.preventDefault();
                    displayLightbox(mediaUrl); // Function to display the lightbox
                });
            }
        }
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
        contentHtml = `<div class="aspect-ratio-16-9"><iframe src="${mediaUrl}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>`;
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
    lightbox.style.zIndex = '10000';
    lightbox.style.cursor = 'pointer';
    lightbox.setAttribute('role', 'dialog');
    lightbox.setAttribute('aria-modal', 'true');
    lightbox.setAttribute('aria-label', 'Media Lightbox');

    // Create the close button
    const closeButton = document.createElement('span');
    closeButton.innerText = '✖';
    closeButton.style.position = 'absolute';
    closeButton.style.top = '20px';
    closeButton.style.right = '20px';
    closeButton.style.fontSize = '24px';
    closeButton.style.color = '#fff';
    closeButton.style.cursor = 'pointer';
    closeButton.setAttribute('aria-label', 'Close lightbox');
    closeButton.setAttribute('role', 'button');
    closeButton.setAttribute('tabindex', '0'); // Make it focusable

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


