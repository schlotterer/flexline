/* global Tablesort */
document.addEventListener('DOMContentLoaded', () => {
	const table = document.getElementById('flexline-docs-table');
	const attributeFilter = document.getElementById(
		'flexline-attribute-filter'
	);
	const styleFilter = document.getElementById('flexline-style-filter');
	const rows = table ? table.querySelectorAll('tbody tr') : [];

       if (table && window.Tablesort) {
               Tablesort(table);
       }

	const filterRows = () => {
		const selectedAttribute = attributeFilter
			? attributeFilter.value.toLowerCase()
			: '';
		const selectedStyle = styleFilter
			? styleFilter.value.toLowerCase()
			: '';

		rows.forEach((row) => {
			const rowAttributes = (row.dataset.attributes || '').toLowerCase();
			const rowStyles = (row.dataset.styles || '').toLowerCase();

			const matchesAttribute =
				!selectedAttribute || rowAttributes.includes(selectedAttribute);
			const matchesStyle =
				!selectedStyle || rowStyles.includes(selectedStyle);

			if (matchesAttribute && matchesStyle) {
				row.style.display = '';
			} else {
				row.style.display = 'none';
			}
		});
	};

	if (attributeFilter) {
		attributeFilter.addEventListener('change', filterRows);
	}

	if (styleFilter) {
		styleFilter.addEventListener('change', filterRows);
	}
});
