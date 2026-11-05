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
		function loadChartData(waduks, chartId) {
			$.ajax({
				url: "assets/data/distribusi-bulan.php",
				method: "GET",
				success: function (data) {
					// Array of 12 months
					var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

					// Initialize data arrays with 12 months with zero values
					var data1Data = Array(12).fill(0);
					var data2Data = Array(12).fill(0);
					var data2Colors = Array(12).fill("#6aa84f"); // Default color for realisasi

					// Filter data for the specific waduks
					waduks.forEach(waduk => {
						var filteredData = data.filter(entry => entry.waduk === waduk);

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
										return tooltipItem.yLabel.toLocaleString() + ' m³';
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
		loadChartData(["Sei Pulai", "Sei Gesek"], "orders-tnj"); // Combined data for Sei Pulai and Sei Gesek
		loadChartData(["Kolong Enam"], "orders-kjg");
		loadChartData(["Sei Jago"], "orders-tub");
	});

})(jQuery);