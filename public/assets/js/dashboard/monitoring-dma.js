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

	// ------------------------------------------------------- //
	// Pie Chart
	// ------------------------------------------------------ //	
	$(document).ready(function () {
		var myChart;

		function fetchData(periode) {
			$.ajax({
				url: 'assets/data/monitoring-dma.php',
				method: 'GET',
				dataType: 'json',
				data: {
					'periode-pie': periode
				},
				success: function (response) {
					if (response.error) {
						console.error(response.error);
						return;
					}

					// Sort the response data by percentage in descending order
					response.sort((a, b) => b.persentase - a.persentase);

					var ctx = document.getElementById("pie-chart").getContext('2d');
					if (myChart) {
						myChart.destroy();
					}
					var labels = [];
					var data = [];
					var backgroundColors = [];
					var hoverBackgroundColors = [];
					var totalPercentage = 0;

					response.forEach(function (item) {
						labels.push(`${item.dma} (${item.persentase}%)`);
						data.push(item.persentase);
						totalPercentage += item.persentase;
						if (item.persentase >= 35) {
							backgroundColors.push("#ff0000");  // Red
							hoverBackgroundColors.push("#ff4d4d");
						} else if (item.persentase >= 25) {
							backgroundColors.push("#ffff00");  // Yellow
							hoverBackgroundColors.push("#ffff66");
						} else {
							backgroundColors.push("#00ff00");  // Green
							hoverBackgroundColors.push("#66ff66");
						}
					});

					myChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: labels,
							datasets: [{
								label: "Flag Data",
								backgroundColor: backgroundColors,
								hoverBackgroundColor: hoverBackgroundColors,
								borderColor: ["#fff"],
								hoverBorderColor: ["#fff"],
								borderWidth: 1,
								data: data
							}]
						},
						options: {
							plugins: {
								datalabels: {
									display: true,
									formatter: (value, ctx) => {
										let sum = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
										let percentage = (value * 100 / sum).toFixed(2) + "%";
										return percentage;
									},
									color: '#fff',
								}
							},
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
										var dataset = response[tooltipItem.index];
										var kehilanganFormatted = dataset.kehilangan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
										return `${label}\nKehilangan: ${kehilanganFormatted} m³`;
									}
								}
							}
						}
					});

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
		}

		function setDefaultPeriode() {
			const date = new Date();
			date.setMonth(date.getMonth() - 1);
			const year = date.getFullYear();
			const month = ("0" + (date.getMonth() + 1)).slice(-2);
			return `${year}-${month}`;
		}

		function getFormattedPeriode(input) {
			return input.replace("-", "");
		}

		$('#periode-pie').val(setDefaultPeriode());

		fetchData(getFormattedPeriode($('#periode-pie').val()));

		$('#proses-pie').on('click', function () {
			let periode = getFormattedPeriode($('#periode-pie').val());
			fetchData(periode);
		});
	});

	// ------------------------------------------------------- //
	// Pie Chart
	// ------------------------------------------------------ //	
	$(document).ready(function () {
		$.ajax({
			url: 'assets/data/pelanggan.php', // Path to your PHP file
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				var ctx = document.getElementById("pie-chart2").getContext('2d');

				var myChart = new Chart(ctx, {
					type: 'pie',
					data: {
						labels: ["Aktif", "Putus"],
						datasets: [{
							label: "Flag Data",
							backgroundColor: ["#057a17", "#7a1705"],
							borderColor: ["#fff", "#fff"],
							hoverBorderColor: ["#fff", "#fff"],
							borderWidth: 1,
							data: [response.data1, response.data2]
						}]
					},
					options: {
						legend: {
							display: true,
							position: 'left', // Move legend to the bottom
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
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

	// ------------------------------------------------------- //
	// Data terjual kehilangan
	// ------------------------------------------------------- //
	$(document).ready(function () {
		$.ajax({
			url: 'assets/data/tingkat-kehilangan-air-now.php',
			method: 'GET',
			dataType: 'json', // Ensure the response is treated as JSON
			success: function (response) {
				// Container untuk hasil
				var data1Html = "";
				var data2Html = "";
				var data3Html = "";

				// Filter untuk jdu yang diinginkan
				var filteredData = response.filter(function (item) {
					return ['GESEK', 'HDPE', 'PCM', 'RPD', 'WK'].includes(item.jdu);
				});

				// Urutkan berdasarkan jdu
				filteredData.sort(function (a, b) {
					return a.jdu.localeCompare(b.jdu);
				});

				// Iterasi melalui data yang sudah difilter dan diurutkan
				filteredData.forEach(function (item) {
					data1Html += '<div>' + item.jdu + ': ' + Number(item.data1).toLocaleString('id-ID') + ' m³</div>';
					data2Html += '<div>' + item.jdu + ': ' + Number(item.data2).toLocaleString('id-ID') + ' m³</div>';
					data3Html += '<div>' + item.jdu + ': ' + parseFloat(item.data3).toFixed(2).replace('.', ',') + ' %</div>';
				});

				// Tampilkan hasil di elemen yang sesuai
				$('.some-stats').eq(0).find('.number').html(data1Html);
				$('.some-stats').eq(1).find('.number').html(data2Html);
				$('.some-stats').eq(2).find('.number').html(data3Html);
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

})(jQuery);