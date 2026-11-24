/* eslint-env jest */
import { createComponentLoader } from '../component-loader';

const css = {
	handle: 'flexline-component-slider',
	kind: 'style',
	src: 'https://example.test/slider.css?ver=1',
	version: '1',
	dependencies: ['flexline-base'],
};
const js = {
	handle: 'flexline-slider',
	kind: 'script',
	src: 'https://example.test/slider.js?ver=1',
	version: '1',
	dependencies: ['wp-i18n'],
};
const manifest = { schema: 1, assets: [css, js] };
const tick = async () => {
	await Promise.resolve();
	await Promise.resolve();
};
let loader;
beforeEach(() => {
	document.head.innerHTML =
		'<style id="flexline-component-tail-inline-css"></style>';
	document.body.innerHTML = '';
	loader = createComponentLoader(window, {
		catalog: { [css.handle]: css, [js.handle]: js },
	});
});

test('concurrent fragments share each load and scripts wait for CSS', async () => {
	const a = loader.ensure(manifest);
	const b = loader.ensure(manifest);
	expect(document.querySelectorAll('link')).toHaveLength(1);
	expect(document.querySelector('script')).toBeNull();
	expect(document.head.firstElementChild.tagName).toBe('LINK');
	document.querySelector('link').dispatchEvent(new Event('load'));
	await tick();
	expect(document.querySelectorAll('script')).toHaveLength(1);
	document.querySelector('script').dispatchEvent(new Event('load'));
	await Promise.all([a, b]);
	await loader.ensure(manifest);
	expect(document.querySelectorAll('link')).toHaveLength(1);
	expect(document.querySelectorAll('script')).toHaveLength(1);
});

test('failed requests retain a retry path', async () => {
	const failed = loader.ensure({ schema: 1, assets: [css] });
	const expectation = expect(failed).rejects.toThrow('retry');
	document.querySelector('link').dispatchEvent(new Event('error'));
	await expectation;
	expect(document.querySelector('link')).toBeNull();
	const retry = loader.ensure({ schema: 1, assets: [css] });
	document.querySelector('link').dispatchEvent(new Event('load'));
	await retry;
});

test('rejects untrusted URLs, changed versions and unknown schemas without injecting nodes', async () => {
	await expect(
		loader.ensure({
			schema: 1,
			assets: [{ ...js, src: 'https://evil.invalid/code.js' }],
		})
	).rejects.toThrow('refresh');
	await expect(
		loader.ensure({ schema: 1, assets: [{ ...js, version: '2' }] })
	).rejects.toThrow('refresh');
	await expect(loader.ensure({ schema: 2, assets: [] })).rejects.toThrow(
		'refresh'
	);
	expect(document.querySelector('script,link')).toBeNull();
});

test('supports old responses and already-enqueued optimized handles', async () => {
	const script = document.createElement('script');
	script.id = 'flexline-slider-js';
	script.src = '/optimized.js';
	document.head.appendChild(script);
	await loader.ensure(null);
	await loader.ensure({ schema: 1, assets: [js] });
	expect(document.querySelectorAll('script')).toHaveLength(1);
});

test('scopes init, skips detached nodes, and reinitializes after teardown', () => {
	window.FlexlineSlider = { init: jest.fn(), teardown: jest.fn() };
	const root = document.createElement('div');
	root.innerHTML = '<div class="is-style-slider"></div>';
	loader.init(root);
	expect(window.FlexlineSlider.init).not.toHaveBeenCalled();
	document.body.appendChild(root);
	loader.init(root);
	loader.init(root);
	expect(window.FlexlineSlider.init).toHaveBeenCalledTimes(1);
	loader.teardown(root);
	loader.init(root);
	expect(window.FlexlineSlider.init).toHaveBeenCalledTimes(2);
});

test('complete-mode pages already own component CSS', async () => {
	const complete = createComponentLoader(window, {
		complete: true,
		catalog: { [css.handle]: css },
	});
	await complete.ensure({ schema: 1, assets: [css] });
	expect(document.querySelector('link')).toBeNull();
});
