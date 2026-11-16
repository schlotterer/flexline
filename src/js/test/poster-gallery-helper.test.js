/* eslint-env jest */
import { readFileSync } from 'node:fs';
import { resolve } from 'node:path';
import { runInNewContext } from 'node:vm';

const helper = readFileSync(
	resolve(__dirname, '../../../assets/js/poster-gallery-helper.js'),
	'utf8'
);

afterEach(() => jest.useRealTimers());

test('binds the first legacy click and defers a requested refresh until the lightbox closes', () => {
	jest.useFakeTimers();
	document.body.innerHTML = `
		<figure class="wp-block-gallery poster-gallery">
			<figure class="wp-block-image"><img src="/poster.webp" alt="Poster"></figure>
		</figure>
		<figure class="wp-block-gallery poster-gallery" data-wp-interactive="core/gallery">
			<figure class="wp-block-image wp-lightbox-container"><img src="/core.webp" alt="Core poster"></figure>
		</figure>
	`;
	const clickHandler = jest.fn((event) => event.preventDefault());
	window.flexlineBaguetteConfig = {
		selector: '.poster-gallery',
		useCoreGalleryLightbox: true,
	};
	window.baguetteBox = {
		destroy: jest.fn(),
		run: jest.fn(() => {
			document
				.querySelector('.poster-gallery__link')
				.addEventListener('click', clickHandler);
		}),
	};

	runInNewContext(helper, { document, window });
	if (document.readyState === 'loading') {
		document.dispatchEvent(new Event('DOMContentLoaded'));
	}
	document.querySelector('.poster-gallery__link img').click();

	expect(clickHandler).toHaveBeenCalledTimes(1);
	expect(window.baguetteBox.run).toHaveBeenCalledTimes(1);
	expect(document.querySelector('.wp-lightbox-container a')).toBeNull();

	const overlay = document.createElement('div');
	overlay.id = 'baguetteBox-overlay';
	overlay.style.display = 'block';
	document.body.append(overlay);

	window.dispatchEvent(new Event('flexline:content-updated'));
	jest.advanceTimersByTime(100);
	expect(window.baguetteBox.destroy).not.toHaveBeenCalled();

	overlay.style.display = 'none';
	window.baguetteBox.run.mock.calls[0][1].afterHide();
	jest.advanceTimersByTime(100);
	expect(window.baguetteBox.destroy).toHaveBeenCalledTimes(1);
	expect(window.baguetteBox.run).toHaveBeenCalledTimes(2);
});
