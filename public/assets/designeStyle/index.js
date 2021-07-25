const menus = document.querySelectorAll(".c-menu");
const sections = document.querySelectorAll(".c-section");
const head_title_btn = document.querySelectorAll(".head-title");
const add_file_input = document.getElementById("doc");
const doc_input = document.querySelectorAll(".doc-input-file");
const list_step = document.querySelectorAll(".steps .list-step");
let files = [];

function handleMenus() {
	menus?.forEach((m) => {
		m.addEventListener("click", function () {
			const section = this.dataset.name;
			menus.forEach((m) => {
				if (m.dataset.name === section) {
					m.classList.add("active");
				} else {
					m.classList.remove("active");
				}
			});
			sections?.forEach((n) => {
				if (n.id === section) {
					n.classList.add("active");
				} else {
					n.classList.remove("active");
				}
			});
		});
	});
}

function sortTable(tableClass, n) {
	var table,
		rows,
		switching,
		i,
		x,
		y,
		shouldSwitch,
		dir,
		switchcount = 0;

	table = document.getElementById(tableClass);
	switching = true;
	dir = "asc";
	while (switching) {
		switching = false;
		rows = table.getElementsByTagName("TR");
		for (i = 1; i < rows.length - 1; i++) {
			shouldSwitch = false;
			x = rows[i].getElementsByTagName("TD")[n];
			y = rows[i + 1].getElementsByTagName("TD")[n];
			var cmpX = isNaN(parseInt(x.innerHTML))
				? x.innerHTML.toLowerCase()
				: parseInt(x.innerHTML);
			var cmpY = isNaN(parseInt(y.innerHTML))
				? y.innerHTML.toLowerCase()
				: parseInt(y.innerHTML);
			cmpX = cmpX == "-" ? 0 : cmpX;
			cmpY = cmpY == "-" ? 0 : cmpY;
			if (dir == "asc") {
				if (cmpX > cmpY) {
					shouldSwitch = true;
					break;
				}
			} else if (dir == "desc") {
				if (cmpX < cmpY) {
					shouldSwitch = true;
					break;
				}
			}
		}
		if (shouldSwitch) {
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			switchcount++;
		} else {
			if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			}
		}
	}
}

function statusChart() {
	const status_chart = document.getElementById("status-chart");
	if (status_chart) {
		new Chart(status_chart, {
			type: "doughnut",
			data: {
				labels: ["Red", "Blue", "Yellow"],
				datasets: [
					{
						label: "My First Dataset",
						data: [300, 50, 100],
						backgroundColor: [
							"rgb(255, 99, 132)",
							"rgb(54, 162, 235)",
							"rgb(255, 205, 86)",
						],
						hoverOffset: 4,
					},
				],
			},
			options: {
				responsive: true,
				legend: {
					position: "right",
					labels: {
						usePointStyle: true,
						boxWidth: 6,
					},
				},
			},
		});
	}
}

function performanceChart() {
	const perf_chart = document.getElementById("performance-chart");
	if (perf_chart) {
		new Chart(perf_chart, {
			type: "bar",
			data: {
				labels: ["Red", "Blue", "Yellow"],
				datasets: [
					{
						label: "My First Dataset",
						data: [300, 50, 100],
						backgroundColor: [
							"rgb(255, 99, 132)",
							"rgb(54, 162, 235)",
							"rgb(255, 205, 86)",
						],
						hoverOffset: 4,
					},
				],
			},
			options: {
				responsive: true,
				legend: {
					display: false,
				},
			},
		});
	}
}

function getNextSiblings(list, e) {
	const arr = [];
	const len = list.length;
	const id = list.indexOf(e);
	for (let i = id; i < len; i++) {
		arr.push(list[i]);
	}

	return arr;
}

function getPreviousSiblings(list, e) {
	const arr = [];
	const id = list.indexOf(e);
	for (let i = 0; i < id; i++) {
		arr.push(list[i]);
	}

	return arr;
}

function structSteps() {
	if (list_step) {
		if (list_step.length > 6) {
			const nextSiblingsEl = getNextSiblings(
				Array.from(list_step),
				list_step[6]
			);
			const previousSiblingsEl = getPreviousSiblings(
				Array.from(list_step),
				list_step[6]
			);

			nextSiblingsEl?.forEach((l) => {
				l.classList.add("minimize");
				l.addEventListener("click", () => {
					if (l.classList.contains("minimize")) {
						nextSiblingsEl?.forEach((l) => {
							l.classList.toggle("minimize");
						});
						previousSiblingsEl?.forEach((l) => {
							l.classList.toggle("minimize");
						});
					}
				});
			});
			previousSiblingsEl?.forEach((l) => {
				l.addEventListener("click", () => {
					if (l.classList.contains("minimize")) {
						nextSiblingsEl?.forEach((l) => {
							l.classList.toggle("minimize");
						});
						previousSiblingsEl?.forEach((l) => {
							l.classList.toggle("minimize");
						});
					}
				});
			});
		}
	}
}

function addFileTemplate(event) {
	const name = event.target.files[0].name;
	event.target.parentNode.querySelector(".name").innerHTML = name;
}

head_title_btn?.forEach((btn) => {
	btn.addEventListener("click", () => {
		const arr = Array.from(head_title_btn);
		const id = arr.indexOf(btn);
		sortTable("table0", id);
	});
});

doc_input?.forEach((doc) => {
	doc.addEventListener("change", (event) => addFileTemplate(event));
});

window.addEventListener("DOMContentLoaded", () => {
	handleMenus();
	statusChart();
	performanceChart();
	structSteps();
});
