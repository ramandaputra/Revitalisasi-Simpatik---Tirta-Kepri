(function ($) {

	'use strict';

	// ------------------------------------------------------- //
	// Grafik
	// ------------------------------------------------------ //
	var randomScalingFactor = function () {
		return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
	};

	Chart.helpers.drawRoundedTopRectangle = function (ctx, x, y, width, height, radius) {
		ctx.beginPath();
		ctx.moveTo(x + radius, y);
		ctx.lineTo(x + width - radius, y);
		ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
		ctx.lineTo(x + width, y + height);
		ctx.lineTo(x, y + height);
		ctx.lineTo(x, y + radius);
		ctx.quadraticCurveTo(x, y, x + radius, y);
		ctx.closePath();
	};

	Chart.elements.RoundedTopRectangle = Chart.elements.Rectangle.extend({
		draw: function () {
			var ctx = this._chart.ctx;
			var vm = this._view;
			var left, right, top, bottom, signX, signY, borderSkipped;
			var borderWidth = vm.borderWidth;

			if (!vm.horizontal) {
				left = vm.x - vm.width / 2;
				right = vm.x + vm.width / 2;
				top = vm.y;
				bottom = vm.base;
				signX = 1;
				signY = bottom > top ? 1 : -1;
				borderSkipped = vm.borderSkipped || 'bottom';
			} else {
				left = vm.base;
				right = vm.x;
				top = vm.y - vm.height / 2;
				bottom = vm.y + vm.height / 2;
				signX = right > left ? 1 : -1;
				signY = 1;
				borderSkipped = vm.borderSkipped || 'left';
			}

			if (borderWidth) {
				var barSize = Math.min(Math.abs(left - right), Math.abs(top - bottom));
				borderWidth = borderWidth > barSize ? barSize : borderWidth;
				var halfStroke = borderWidth / 2;
				var borderLeft = left + (borderSkipped !== 'left' ? halfStroke * signX : 0);
				var borderRight = right + (borderSkipped !== 'right' ? -halfStroke * signX : 0);
				var borderTop = top + (borderSkipped !== 'top' ? halfStroke * signY : 0);
				var borderBottom = bottom + (borderSkipped !== 'bottom' ? -halfStroke * signY : 0);
				if (borderLeft !== borderRight) {
					top = borderTop;
					bottom = borderBottom;
				}
				if (borderTop !== borderBottom) {
					left = borderLeft;
					right = borderRight;
				}
			}

			var barWidth = Math.abs(left - right);
			var roundness = this._chart.config.options.barRoundness || 0.2;
			var radius = barWidth * roundness * 0.2;

			var prevTop = top;

			top = prevTop + radius;
			var barRadius = top - prevTop;

			ctx.beginPath();
			ctx.fillStyle = vm.backgroundColor;
			ctx.strokeStyle = vm.borderColor;
			ctx.lineWidth = borderWidth;

			Chart.helpers.drawRoundedTopRectangle(ctx, left, (top - barRadius + 1), barWidth, bottom - prevTop, barRadius);

			ctx.fill();
			if (borderWidth) {
				ctx.stroke();
			}

			top = prevTop;
		},
	});

	Chart.defaults.roundedBar = Chart.helpers.clone(Chart.defaults.bar);

	Chart.controllers.roundedBar = Chart.controllers.bar.extend({
		dataElementType: Chart.elements.RoundedTopRectangle
	});

	$(document).ready(function () {
		function loadChartData(wilayahx, chartId) {
			$.ajax({
				url: "assets/data/perawatan-meter-bulan.php",
				method: "GET",
				success: function (data) {
					// Array of 12 months
					var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

					// Initialize data arrays with 12 months with zero values
					var data1Data = Array(12).fill(0);
					var data2Data = Array(12).fill(0);
					var data2Colors = Array(12).fill("#6aa84f"); // Default color for realisasi

					wilayahx.forEach(wilayah => {
						var filteredData = data.filter(entry => entry.wilayah === wilayah);

						filteredData.forEach(entry => {
							var monthIndex = new Date(entry.waktu).getMonth(); // Get the month index from the data
							data1Data[monthIndex] += parseInt(entry.data1);
							data2Data[monthIndex] += parseInt(entry.data2);

							// Condition for realisasi bar color
							if (parseInt(entry.data2) < parseInt(entry.data1)) {
								data2Colors[monthIndex] = "#e06666"; // Red
							} else if (parseInt(entry.data2) >= parseInt(entry.data1)) {
								data2Colors[monthIndex] = "#6aa84f"; // Green
							}
						});
					});

					var ctx = document.getElementById(chartId).getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'roundedBar', // Using 'bar' type for chart
						data: {
							labels: months, // Set month labels
							datasets: [{
								label: 'Target',
								data: data1Data,
								borderColor: "#2c304d",
								backgroundColor: "#4A90E2", // Blue
								hoverBackgroundColor: "#357ABD"
							}, {
								label: 'Realisasi',
								data: data2Data,
								borderColor: "#2c304d",
								backgroundColor: data2Colors,
								hoverBackgroundColor: data2Colors.map(color => {
									return color === "#e06666" ? "#cc0000" : "#38761d"; // Change hover color
								})
							}]
						},
						options: {
							responsive: true,
							barRoundness: 1,
							tooltips: {
								backgroundColor: 'rgba(47, 49, 66, 0.8)',
								titleFontSize: 13,
								titleFontColor: '#fff',
								caretSize: 0,
								cornerRadius: 4,
								xPadding: 5,
								displayColors: false,
								yPadding: 5,
								callbacks: {
									label: function (tooltipItem, data) {
										return tooltipItem.yLabel.toLocaleString() + ' SL';
									}
								}
							},
							legend: {
								display: true,
								position: 'bottom',
								labels: {
									fontColor: "#aea9c3",
									usePointStyle: true,
									padding: 50,
									fontSize: 13
								}
							},
							scales: {
								xAxes: [{
									barThickness: 'flex',
									stacked: false,
									gridLines: {
										drawBorder: false,
										display: false
									},
									ticks: {
										display: true // Show month labels on x-axis
									}
								}],
								yAxes: [{
									stacked: false,
									gridLines: {
										drawBorder: false,
										display: true
									},
									ticks: {
										display: false
									}
								}]
							}
						}
					});
				}
			});
		}

		// Load chart data for each reservoir
		loadChartData(["TNJ"], "orders-tnj"); // Combined data for Sei Pulai and Sei Gesek
		loadChartData(["KJG"], "orders-kjg");
		loadChartData(["TUB"], "orders-tub");
	});

	// ------------------------------------------------------- //
	// Pie Chart 1
	// ------------------------------------------------------ //	
	$(document).ready(function () {
		$.ajax({
			url: 'assets/data/perawatan-meter-rotasi.php', // Path to your PHP file
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				response.forEach(function (item) {
					var ctx;

					// Check the value of kodewil and set the appropriate canvas element
					if (item.kodewil === "1") {
						ctx = document.getElementById("pie-chart1-tnj");
					} else if (item.kodewil === "2") {
						ctx = document.getElementById("pie-chart1-kjg");
					} else if (item.kodewil === "3") {
						ctx = document.getElementById("pie-chart1-tub");
					} else {
						console.error("Invalid kodewil: " + item.kodewil);
						return;
					}

					if (!ctx) {
						console.error("Canvas element not found for kodewil: " + item.kodewil);
						return;
					}

					var context = ctx.getContext('2d');

					var myChart = new Chart(context, {
						type: 'pie',
						data: {
							labels: ["Meter >5 Tahun", "Sudah Ganti"],
							datasets: [{
								label: "Flag Data",
								backgroundColor: ["#08a6c3", "#5cb85c"],
								borderColor: ["#fff", "#fff"],
								hoverBorderColor: ["#fff", "#fff"],
								borderWidth: 1,
								data: [item.data1, item.data2]
							}]
						},
						options: {
							legend: {
								display: true,
								position: 'left',
								labels: {
									fontColor: "#FFFFFF",
									usePointStyle: true,
									fontSize: 13
								}
							},
							tooltips: {
								backgroundColor: 'rgba(47, 49, 66, 0.8)',
								titleFontSize: 13,
								titleFontColor: '#fff',
								caretSize: 0,
								cornerRadius: 4,
								xPadding: 10,
								displayColors: true,
								yPadding: 10,
								callbacks: {
									label: function (tooltipItem, data) {
										var label = data.labels[tooltipItem.index] || '';
										var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
										return label + ': ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' SL';
									}
								}
							}
						}
					});
				});
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

	// ------------------------------------------------------- //
	// Pie Chart 2
	// ------------------------------------------------------ //	
	$(document).ready(function () {
		$.ajax({
			url: 'assets/data/perawatan-meter-rusak.php', // Path to your PHP file
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				// Data containers
				var dataTnj = [0, 0]; // [data1, data2] for pie-chart2-tnj
				var dataKjg = [0, 0]; // [data1, data2] for pie-chart2-kjg
				var dataTub = [0, 0]; // [data1, data2] for pie-chart2-tub

				// Aggregate data based on kodewil
				response.forEach(function (item) {
					if (['01', '02', '03', '04'].includes(item.kodewil)) {
						dataTnj[0] += parseInt(item.data1);
						dataTnj[1] += parseInt(item.data2);
					} else if (item.kodewil === '05') {
						dataKjg[0] += parseInt(item.data1);
						dataKjg[1] += parseInt(item.data2);
					} else if (['06', '07', '08', '09'].includes(item.kodewil)) {
						dataTub[0] += parseInt(item.data1);
						dataTub[1] += parseInt(item.data2);
					}
				});

				// Function to create chart
				function createChart(canvasId, data) {
					var ctx = document.getElementById(canvasId);
					if (ctx) {
						new Chart(ctx.getContext('2d'), {
							type: 'pie',
							data: {
								labels: ["SPK(Belum diganti)", "Sudah Ganti"],
								datasets: [{
									label: "Flag Data",
									backgroundColor: ["#08a6c3", "#5cb85c"],
									borderColor: ["#fff", "#fff"],
									hoverBorderColor: ["#fff", "#fff"],
									borderWidth: 1,
									data: data
								}]
							},
							options: {
								legend: {
									display: true,
									position: 'left', // Move legend to the left
									labels: {
										fontColor: "#FFFFFF",
										usePointStyle: true,
										fontSize: 13
									}
								},
								tooltips: {
									backgroundColor: 'rgba(47, 49, 66, 0.8)',
									titleFontSize: 13,
									titleFontColor: '#fff',
									caretSize: 0,
									cornerRadius: 4,
									xPadding: 10,
									displayColors: true,
									yPadding: 10,
									callbacks: {
										label: function (tooltipItem, data) {
											var label = data.labels[tooltipItem.index] || '';
											var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
											return label + ': ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' SL';
										}
									}
								}
							}
						});
					} else {
						console.error("Canvas element not found: " + canvasId);
					}
				}

				// Create charts with aggregated data
				createChart("pie-chart2-tnj", dataTnj);
				createChart("pie-chart2-kjg", dataKjg);
				createChart("pie-chart2-tub", dataTub);
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

})(jQuery);