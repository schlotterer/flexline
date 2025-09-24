const { registerFormatType, toggleFormat } = wp.richText;
const { RichTextToolbarButton } = wp.blockEditor;

const name = 'flexline/text-shadow';

registerFormatType(name, {
	title: 'Text Shadow',
	tagName: 'span',
	className: 'is-style-text-shadow',
	edit({ isActive, value, onChange }) {
		const onToggle = () => {
			onChange(toggleFormat(value, { type: name }));
		};

		return (
			<RichTextToolbarButton
				icon="text"
				title="Text Shadow"
				onClick={onToggle}
				isActive={isActive}
			/>
		);
	},
});
