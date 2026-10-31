/* eslint-env jest */
import { execFileSync } from 'child_process';

const markup = execFileSync(
	'php',
	['tests/Unit/fixtures/render-section-shapes.php'],
	{
		encoding: 'utf8',
	}
);
const rows = () => [...document.querySelectorAll('[data-frame-preset-row]')];
const field = (row, name) => row.querySelector(`[data-frame-field="${name}"]`);
const changeType = (row, type) => {
	field(row, 'type').value = type;
	field(row, 'type').dispatchEvent(new Event('change', { bubbles: true }));
};

beforeEach(() => {
	document.body.innerHTML = markup;
	// Run the unbundled admin entry point against the actual PHP-rendered form.
	jest.isolateModules(() => require('../../../../assets/js/theme-options'));
});
afterEach(() => {
	document.body.innerHTML = '';
	delete window.wp;
});

test('unavailable whole SVG warns without removing the saved preset', () => {
	const row = rows()[1];
	expect(
		row.querySelector('[data-frame-source-warning]').textContent
	).toContain('256 KiB');
	expect(field(row, 'id').value).toBe('saved_mask');
	expect(field(row, 'attachment_id').value).toBe('10');
	expect(rows()[0].querySelector('[data-frame-source-warning]')).toBeNull();
});

test('media selection uses WordPress attachment JSON and updates submitted fields', () => {
	const row = rows()[1];
	let select;
	let attachment = {
		id: 42,
		url: 'https://example.test/shape.svg',
		title: 'Logo',
		mime: 'image/svg+xml',
	};
	const frame = {
		on: (event, callback) => {
			select = callback;
		},
		state: () => ({
			get: () => ({ first: () => ({ toJSON: () => attachment }) }),
		}),
		open: jest.fn(),
	};
	window.wp = { media: jest.fn(() => frame) };
	row.querySelector('[data-frame-choose-svg]').click();
	select();
	expect(field(row, 'attachment_id').value).toBe('42');
	expect(
		new FormData(document.querySelector('form')).get(
			field(row, 'attachment_url').name
		)
	).toBe(attachment.url);
	expect(row.querySelector('[data-frame-svg-preview] img').src).toBe(
		attachment.url
	);
	expect(row.querySelector('[data-frame-attachment-label]').textContent).toBe(
		'Logo'
	);
	expect(row.querySelector('[data-frame-source-warning]')).toBeNull();
	attachment = {
		id: 43,
		url: 'https://example.test/photo.jpg',
		mime: 'image/jpeg',
	};
	select();
	expect(field(row, 'attachment_id').value).toBe('42');
});

test('mixed presets have five stable columns and labeled settings', () => {
	expect(
		[...document.querySelectorAll('thead th')].map(
			(cell) => cell.textContent
		)
	).toEqual(['Label', 'Type', 'SVG Shape', 'Settings', 'Actions']);
	for (const row of rows()) {
		expect(row.cells).toHaveLength(5);
		expect(
			row.cells[3].querySelector('[data-frame-field="fit"]')
		).not.toBeNull();
		expect(
			row.cells[4].querySelector('[data-frame-remove]')
		).not.toBeNull();
	}
});

test('inactive heights cannot block submission and resume validation when restored', () => {
	const row = rows()[0];
	const height = field(row, 'height_min');
	height.value = '0';
	expect(document.querySelector('form').checkValidity()).toBe(false);
	changeType(row, 'whole');
	expect(height.disabled).toBe(true);
	expect(document.querySelector('form').checkValidity()).toBe(true);
	const submitted = new FormData(document.querySelector('form'));
	expect(submitted.has(height.name)).toBe(false);
	expect(submitted.get(field(row, 'fit').name)).toBe('fill');
	changeType(row, 'top');
	expect(height.disabled).toBe(false);
	expect(height.value).toBe('0');
	expect(field(row, 'fit').disabled).toBe(true);
	expect(document.querySelector('form').checkValidity()).toBe(false);
});

test('adding, reordering and removing rows preserves IDs and indexes', () => {
	document.getElementById('flexline-add-frame-preset').click();
	expect(rows()).toHaveLength(3);
	const added = rows()[2];
	changeType(added, 'whole');
	expect(field(added, 'height_min').disabled).toBe(true);
	added.querySelector('[data-frame-move-up]').click();
	expect(field(rows()[2], 'id').value).toBe('saved_mask');
	expect(field(rows()[2], 'fit').name).toBe(
		'flexline_frame_presets[items][2][fit]'
	);
	added.querySelector('[data-frame-remove]').click();
	expect(rows()).toHaveLength(2);
	expect(field(rows()[1], 'id').value).toBe('saved_mask');
	expect(field(rows()[1], 'fit').name).toBe(
		'flexline_frame_presets[items][1][fit]'
	);
});
