/**
 * Validate at the point of use, including URLs from legacy saved data attributes.
 * DOM construction alone does not make script-scheme iframe URLs safe.
 *
 * @param {string} value Media URL.
 * @return {URL|null} Parsed HTTP(S) URL, or null for an unsafe/empty value.
 */
export function getModalMediaUrl(value) {
	if (typeof value !== 'string' || !value.trim()) {
		return null;
	}

	try {
		const url = new URL(value, document.baseURI);
		return ['http:', 'https:'].includes(url.protocol) ? url : null;
	} catch (error) {
		return null;
	}
}

function getVideoEmbedUrl(url) {
	const hostname = url.hostname.toLowerCase();
	const isHost = (host) => hostname === host || hostname.endsWith(`.${host}`);
	let id = '';

	if (isHost('youtube.com')) {
		id = url.searchParams.get('v') || '';
	} else if (isHost('youtu.be')) {
		id = url.pathname.split('/')[1] || '';
	}
	if (id && /^[\w-]+$/.test(id)) {
		return `https://www.youtube.com/embed/${id}?autoplay=1&enablejsapi=1`;
	}
	if (isHost('vimeo.com')) {
		const match = url.pathname.match(/^\/(\d+)(?:\/|$)/);
		if (match) {
			return `https://player.vimeo.com/video/${match[1]}?autoplay=1`;
		}
	}
	return '';
}

/**
 * Keep URL values out of the HTML parser after reading decoded DOM attributes.
 *
 * @param {string} value Media URL from any modal trigger.
 * @return {HTMLElement|null} Media content, or null when the URL is rejected.
 */
export function createModalMediaContent(value) {
	const url = getModalMediaUrl(value);
	if (!url) {
		return null;
	}

	if (/\.(jpeg|jpg|gif|png|webp|avif)$/i.test(url.pathname)) {
		const image = document.createElement('img');
		image.src = url.href;
		image.style.maxWidth = '90%';
		image.style.maxHeight = '80vh';
		return image;
	}

	const wrapper = document.createElement('div');
	const embedUrl = getVideoEmbedUrl(url);
	if (!embedUrl && /\.(mp4|webm|ogg)$/i.test(url.pathname)) {
		const video = document.createElement('video');
		wrapper.className = 'aspect-ratio-16-9 video';
		video.controls = true;
		video.autoplay = true;
		video.src = url.href;
		video.style.objectFit = 'contain';
		wrapper.appendChild(video);
		return wrapper;
	}

	const frame = document.createElement('iframe');
	wrapper.className = embedUrl
		? 'aspect-ratio-16-9 iframe'
		: 'aspect-ratio-match-window';
	frame.src = embedUrl || url.href;
	frame.title = embedUrl ? 'Embedded video' : 'Embedded content';
	frame.setAttribute('frameborder', '0');
	frame.setAttribute('allow', 'autoplay; fullscreen');
	frame.setAttribute('allowfullscreen', '');
	wrapper.appendChild(frame);
	return wrapper;
}
