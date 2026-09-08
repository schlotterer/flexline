/* eslint-env jest */
import {
	createBlock,
	parse,
	registerBlockType,
	serialize,
	unregisterBlockType,
} from '@wordpress/blocks';
import { customSectionFrameAttributes } from '../attributes';
import { getSectionFramePreviewProps } from '../section-shapes';

// Only the inspector UI is stubbed; block serialization and preview logic are real.
jest.mock('@wordpress/block-editor', () => ({ InspectorControls: () => null }));
jest.mock('@wordpress/components', () => ({}));

const blockName = 'flexline/test-section-shape';
const selections = {
	flexlineUseFrames: true,
	flexlineFrameTop: 'saved_top',
	flexlineFrameBottom: 'saved_bottom',
	flexlineShapeMask: 'saved_mask',
	flexlineFrameOverlapTop: 'half',
	flexlineFrameOverlapBottom: 'full',
};
const expectedClasses = {
	top: ['flexline-section-frame-top', 'flexline-section-frame-overlap-top'],
	bottom: [
		'flexline-section-frame-bottom',
		'flexline-section-frame-overlap-bottom',
	],
	both: [
		'flexline-section-frame-top',
		'flexline-section-frame-overlap-top',
		'flexline-section-frame-bottom',
		'flexline-section-frame-overlap-bottom',
	],
	whole: ['flexline-section-shape-mask'],
};

const reopen = (attributes) => {
	const markup = serialize(createBlock(blockName, attributes));
	return { markup, attributes: parse(markup)[0].attributes };
};

beforeAll(() => {
	registerBlockType(blockName, {
		apiVersion: 3,
		title: 'Section Shape Test',
		category: 'design',
		attributes: customSectionFrameAttributes,
		save: () => null,
	});
});

afterAll(() => unregisterBlockType(blockName));

beforeEach(() => {
	window.flexlineBlockExtensions = {
		sectionFrames: {
			enabled: true,
			presets: ['top', 'bottom'].map((side) => ({
				id: `saved_${side}`,
				side,
				url: `https://example.test/${side}.svg`,
				height: 'clamp(56px, 7vw, 112px)',
			})),
		},
		sectionShapeMasks: {
			enabled: true,
			presets: [
				{
					id: 'saved_mask',
					url: 'https://example.test/whole.svg',
					fit: 'fill',
					css_size: '100% 100%',
				},
			],
		},
	};
});

afterEach(() => delete window.flexlineBlockExtensions);

test.each(['top', 'bottom', 'both', 'whole'])(
	'explicit %s mode survives saving with retained selections',
	(mode) => {
		const saved = reopen({ ...selections, flexlineFrameMode: mode });
		expect(saved.markup).toContain(`"flexlineFrameMode":"${mode}"`);
		expect(saved.attributes).toMatchObject({
			...selections,
			flexlineFrameMode: mode,
		});
		expect(
			getSectionFramePreviewProps('core/group', saved.attributes).classes
		).toEqual(['flexline-section-frame', ...expectedClasses[mode]]);
	}
);

test.each(['core/group', 'core/stack', 'core/row', 'core/grid'])(
	'preview props support %s',
	(supportedBlockName) => {
		const saved = reopen({
			...selections,
			flexlineFrameMode: 'both',
		});

		expect(
			getSectionFramePreviewProps(supportedBlockName, saved.attributes)
				.classes
		).toEqual(['flexline-section-frame', ...expectedClasses.both]);
	}
);

test.each([
	['whole', 'top'],
	['both', 'top'],
	['top', 'whole', 'top'],
])('switching modes and reopening: %j', (...modes) => {
	let attributes = { ...selections };
	for (const mode of modes) {
		const saved = reopen({ ...attributes, flexlineFrameMode: mode });
		expect(saved.markup).toContain(`"flexlineFrameMode":"${mode}"`);
		attributes = saved.attributes;
		expect(attributes).toMatchObject(selections);
		expect(
			getSectionFramePreviewProps('core/group', attributes).classes
		).toEqual(['flexline-section-frame', ...expectedClasses[mode]]);
	}
});

test.each([
	[
		{ flexlineFrameBottom: 'saved_bottom' },
		['flexline-section-frame-bottom'],
	],
	[
		{ flexlineFrameTop: 'saved_top', flexlineFrameBottom: 'saved_bottom' },
		['flexline-section-frame-top', 'flexline-section-frame-bottom'],
	],
	[{ flexlineShapeMask: 'saved_mask' }, ['flexline-section-shape-mask']],
])('infers older selections without a mode: %j', (selection, classes) => {
	const saved = reopen({ flexlineUseFrames: true, ...selection });
	expect(saved.markup).not.toContain('flexlineFrameMode');
	expect(
		getSectionFramePreviewProps('core/group', saved.attributes).classes
	).toEqual(['flexline-section-frame', ...classes]);
});

test('new empty Groups have no mask or overlap', () => {
	const saved = reopen({ flexlineUseFrames: true });
	expect(
		getSectionFramePreviewProps('core/group', saved.attributes).classes
	).toEqual([]);
});

test('whole mode with a missing shape does not restore retained frames', () => {
	const saved = reopen({
		...selections,
		flexlineFrameMode: 'whole',
		flexlineShapeMask: 'missing_mask',
	});
	expect(
		getSectionFramePreviewProps('core/group', saved.attributes).classes
	).toEqual([]);
});
