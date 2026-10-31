/* eslint-env jest */
import { createModalMediaContent, getModalMediaUrl } from '../modal-media';

describe('modal URL boundary', () => {
	test.each([
		'',
		'   ',
		null,
		undefined,
		'javascript:alert(1)',
		' \nJaVaScRiPt:alert(1)',
		'java\tscript:alert(1)',
		'java\nscript:alert(1)',
		'data:text/html,unsafe',
		'vbscript:unsafe',
		'blob:https://example.test/id',
		'file:///tmp/image.png',
		'ftp://example.test/image.png',
		'mailto:person@example.test',
		'tel:123456789',
		'https://[invalid',
	])('rejects unsafe or empty input: %s', (value) => {
		expect(getModalMediaUrl(value)).toBeNull();
		expect(createModalMediaContent(value)).toBeNull();
	});

	test.each([
		'https://example.test/image.png',
		'http://example.test/tour',
		'/uploads/image.png',
		'../media/movie.mp4',
		'//example.test/tour',
		'https://example.test/tour?x=1&y=2#view',
	])('retains HTTP(S) and relative URLs: %s', (value) => {
		expect(getModalMediaUrl(value).href).toBe(
			new URL(value, document.baseURI).href
		);
		expect(createModalMediaContent(value)).not.toBeNull();
	});

	test.each([
		['/image.PNG?version=2', 'img'],
		['/movie.MP4?download=1#start', 'video'],
		['/movie.webm', 'video'],
		['/movie.ogg', 'video'],
		['/document.pdf', 'iframe'],
		['https://tour.example.test/embed?x=1&y=2', 'iframe'],
	])('retains media type for %s', (value, tag) => {
		const content = createModalMediaContent(value);
		const media = content.matches(tag)
			? content
			: content.querySelector(tag);
		expect(media).not.toBeNull();
		expect(media.src).toBe(new URL(value, document.baseURI).href);
		if (tag === 'video') {
			expect(media.controls).toBe(true);
			expect(media.autoplay).toBe(true);
		}
	});

	test.each([
		[
			'https://www.youtube.com/watch?v=abc_123-Z',
			'https://www.youtube.com/embed/abc_123-Z?autoplay=1&enablejsapi=1',
		],
		[
			'https://youtu.be/abc_123-Z?t=10',
			'https://www.youtube.com/embed/abc_123-Z?autoplay=1&enablejsapi=1',
		],
		[
			'https://vimeo.com/123456',
			'https://player.vimeo.com/video/123456?autoplay=1',
		],
		[
			'https://player.vimeo.com/video/123456?h=private',
			'https://player.vimeo.com/video/123456?h=private',
		],
		[
			'https://www.youtube.com/embed/abc_123-Z',
			'https://www.youtube.com/embed/abc_123-Z',
		],
		[
			'https://youtube.com.example.test/watch?v=abc',
			'https://youtube.com.example.test/watch?v=abc',
		],
		[
			'https://tour.example.test/?next=https://vimeo.com/123',
			'https://tour.example.test/?next=https://vimeo.com/123',
		],
	])('preserves provider or generic embed: %s', (value, expected) => {
		expect(createModalMediaContent(value).querySelector('iframe').src).toBe(
			expected
		);
	});

	test.each(['png', 'mp4', 'pdf'])(
		'does not reparse decoded quotes in %s URLs',
		(extension) => {
			const value = `https://example.test/media/" onerror="window.modalProbe=1" data-probe="injected.${extension}`;
			const content = createModalMediaContent(value);
			const media = content.matches('img')
				? content
				: content.firstElementChild;
			expect(media.src).toBe(new URL(value).href);
			expect(media.hasAttribute('onerror')).toBe(false);
			expect(media.hasAttribute('data-probe')).toBe(false);
			expect(content.querySelector('script')).toBeNull();
		}
	);
});
