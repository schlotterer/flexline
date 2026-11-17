/* Verify splitting never deletes/reorders any compiled selector/declaration. */
const fs = require('fs');
const path = require('path');
const postcss = require('postcss');
const directory = path.join(__dirname, '../assets/built/css');
const read = (file) => fs.readFileSync(path.join(directory, file), 'utf8');
const declarations = (css) => {
	const result = [];
	postcss.parse(css).walkDecls((declaration) => {
		const ancestry = [];
		let parent = declaration.parent;
		while (parent && parent.type !== 'root') {
			ancestry.unshift(parent.type === 'rule' ? parent.selector : '@' + parent.name + ' ' + parent.params);
			parent = parent.parent;
		}
		result.push([ancestry, declaration.prop, declaration.value, declaration.important || false]);
	});
	return result;
};
const full = declarations(read('app.css'));
const split = declarations(['base.css', 'component-horizontal-scroll.css', 'component-slider.css', 'component-tail.css'].map(read).join('\n'));
if (JSON.stringify(full) !== JSON.stringify(split)) {
	throw new Error('Split CSS changed the full bundle declaration sequence.');
}
console.log(`PASS: ${full.length} compiled declarations retain selectors, values, importance and order.`);

if (read('base.css') !== read('app-conditional.css')) {
	throw new Error('Compatibility base alias drifted.');
}
