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
		$.ajax({
			url: "assets/data/distribusi-bulan.php",
			method: "GET",
			success: function (data) {
				// Array dari 12 bulan
				var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

				// Inisialisasi data array dengan 12 bulan dengan nilai nol
				var targetData = Array(12).fill(0);
				var realisasiData = Array(12).fill(0);
				var realisasiColors = Array(12).fill("#6aa84f"); // Default color for realisasi

				// Filter data dan penjumlahan
				data.forEach(entry => {
					if (["HDPE", "RPD", "PCM", "WK", "GESEK"].includes(entry.jdu)) {
						var monthIndex = new Date(entry.waktu).getMonth(); // Ambil indeks bulan dari data
						targetData[monthIndex] += parseInt(entry.data1) || 0;
						realisasiData[monthIndex] += parseInt(entry.data2) || 0;
					}
				});

				// Atur warna batang realisasi berdasarkan kondisi
				for (var i = 0; i < 12; i++) {
					if (realisasiData[i] < targetData[i]) {
						realisasiColors[i] = "#e06666"; // Merah
					} else if (realisasiData[i] >= targetData[i]) {
						realisasiColors[i] = "#6aa84f"; // Hijau
					}
				}

				var ctx = document.getElementById("orders").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'roundedBar', // Menggunakan 'bar' type untuk chart
					data: {
						labels: months, // Tetapkan label bulan
						datasets: [{
							label: 'Target',
							data: targetData,
							borderColor: "#2c304d",
							backgroundColor: "#4A90E2", // Biru
							hoverBackgroundColor: "#357ABD"
						}, {
							label: 'Realisasi',
							data: realisasiData,
							borderColor: "#2c304d",
							backgroundColor: realisasiColors,
							hoverBackgroundColor: realisasiColors.map(color => {
								return color === "#e06666" ? "#cc0000" : "#38761d"; // Ubah warna hover
							})
						}]
					},
					options: {
						responsive: true,
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
									display: true // label bulan x
								}
							}],
							yAxes: [{
								stacked: false,
								gridLines: {
									drawBorder: false,
									display: true
								},
								ticks: {
									display: true
								}
							}]
						}
					}
				});
			}
		});
	});

	// ------------------------------------------------------- //
	// Pie Chart1
	// ------------------------------------------------------ //	
	$(document).ready(function () {
		var myChart1, myChart2;

		function fetchData(periode) {
			$.ajax({
				url: 'assets/data/arus-kas1.php',
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

					var air = parseInt(response.air) || 0;
					var nonair = parseInt(response.nonair) || 0;
					var penghasilan = parseInt(response.penghasilan) || 0;
					var bahan = parseInt(response.bahan) || 0;
					var tenaga = parseInt(response.tenaga) || 0;
					var operasional = parseInt(response.lain_operasional) || 0;
					var usaha = parseInt(response.usaha) || 0;
					var investasi = parseInt(response.investasi) || 0;
					var pajak = parseInt(response.pajak) || 0;
					var nonoperasional = parseInt(response.lain_non_operasional) || 0;

					var totalPenerimaan = air + nonair + penghasilan;
					var totalPengeluaran = bahan + tenaga + operasional + usaha + investasi + pajak + nonoperasional;

					function formatCurrency(value) {
						let formattedValue = value.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

						formattedValue = formattedValue.replace('IDR', '').trim(); // Remove currency symbol
						formattedValue = formattedValue.replace(/,\d+/, ',-'); // Replace decimal part with ',-'

						return formattedValue;
					}

					$('.some-stats').eq(0).find('.number').text(formatCurrency(totalPenerimaan));
					$('.some-stats').eq(1).find('.number').text(formatCurrency(totalPengeluaran));

					// Prepare data for Penerimaan Pie Chart
					var penerimaanData = [air, nonair, penghasilan];
					var penerimaanColors = ['#28a745', '#007bff', '#6f42c1']; // Green, Blue, Purple

					var ctx1 = document.getElementById("pie-chart1").getContext('2d');
					if (myChart1) {
						myChart1.destroy();
					}
					myChart1 = new Chart(ctx1, {
						type: 'pie',
						data: {
							labels: ["Penerimaan Air", "Penerimaan Non Air", "Penghasilan Diluar Usaha"],
							datasets: [{
								label: "Penerimaan",
								backgroundColor: penerimaanColors,
								borderColor: ["#fff", "#fff", "#fff"],
								hoverBorderColor: ["#fff", "#fff", "#fff"],
								borderWidth: 1,
								data: penerimaanData
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
										return label + ': Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',-';
									}
								}
							}
						}
					});

					// Prepare data for Pengeluaran Pie Chart
					var pengeluaranData = [bahan, tenaga, operasional, usaha, investasi, pajak, nonoperasional];
					var pengeluaranColors = ['#ffc107', '#dc3545', '#fd7e14', '#e83e8c', '#20c997', '#6f42c1', '#007bff']; // Yellow, Red, Orange, Pink, Light Blue, Purple, Blue

					var ctx2 = document.getElementById("pie-chart2").getContext('2d');
					if (myChart2) {
						myChart2.destroy();
					}
					myChart2 = new Chart(ctx2, {
						type: 'pie',
						data: {
							labels: ["Biaya Bahan", "Tenaga Kerja", "Operasional", "Biaya Luar Usaha", "Investasi", "Pajak", "Non Operasional"],
							datasets: [{
								label: "Pengeluaran",
								backgroundColor: pengeluaranColors,
								borderColor: ["#fff", "#fff", "#fff", "#fff", "#fff", "#fff", "#fff"],
								hoverBorderColor: ["#fff", "#fff", "#fff", "#fff", "#fff", "#fff", "#fff"],
								borderWidth: 1,
								data: pengeluaranData
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
										return label + ': Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',-';
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

		$('#periode').val(setDefaultPeriode());

		fetchData(getFormattedPeriode($('#periode').val()));

		$('#proses-pie').on('click', function () {
			let periode = getFormattedPeriode($('#periode').val());
			fetchData(periode);
		});
	});

})(jQuery);