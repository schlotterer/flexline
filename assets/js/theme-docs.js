/* global Tablesort */
document.addEventListener('DOMContentLoaded', () => {
	const table = document.getElementById('flexline-docs-table');
	if (table && window.Tablesort) {
		new Tablesort(table);
	}
});
