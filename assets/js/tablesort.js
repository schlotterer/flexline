(function () {
	'use strict';

	const sortTable = (table, column, desc) => {
		const tbody = table.tBodies[0];
		const rows = Array.from(tbody.querySelectorAll('tr'));

		rows.sort((a, b) => {
			const A = a.cells[column].textContent.trim();
			const B = b.cells[column].textContent.trim();
			const numA = parseFloat(A);
			const numB = parseFloat(B);

			if (!isNaN(numA) && !isNaN(numB)) {
				return desc ? numB - numA : numA - numB;
			}
			return desc ? B.localeCompare(A) : A.localeCompare(B);
		});

		rows.forEach((row) => {
			tbody.appendChild(row);
		});
	};

	const makeSortable = (table) => {
		const headers = table.querySelectorAll('th');
		headers.forEach((th, i) => {
			th.addEventListener('click', () => {
				const desc = th.classList.toggle('sort-desc');
				headers.forEach((h) => {
					if (h !== th) {
						h.classList.remove('sort-desc');
					}
				});
				sortTable(table, i, desc);
			});
		});
	};

	window.Tablesort = (table) => {
		if (table && table.tagName === 'TABLE') {
			makeSortable(table);
		}
	};
})();
