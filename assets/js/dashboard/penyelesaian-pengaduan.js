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
			url: "assets/data/penyelesaian-pengaduan-bulan.php",
			method: "GET",
			success: function (data) {

				// Array dari 12 bulan
				var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

				// Inisialisasi data array dengan 12 bulan dengan nilai nol
				var data1Data = Array(12).fill(0);
				var data2Data = Array(12).fill(0);

				data.forEach(entry => {
					var monthIndex = new Date(entry.periode).getMonth(); // Ambil indeks bulan dari data
					data1Data[monthIndex] = entry.data1;
					data2Data[monthIndex] = entry.data2;
				});

				var ctx = document.getElementById("orders").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'roundedBar', // Menggunakan 'bar' type untuk chart dengan roundedBar plugin
					data: {
						labels: months, // Tetapkan label bulan
						datasets: [{
							label: 'Pengaduan Selesai',
							data: data1Data,
							borderColor: "#2c304d",
							backgroundColor: "#6aa84f",
							hoverBackgroundColor: "#38761d"
						}, {
							label: 'Jumlah Pengaduan',
							data: data2Data,
							borderColor: "#2c304d",
							backgroundColor: "#e06666",
							hoverBackgroundColor: "#cc0000"
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
									return tooltipItem.yLabel.toLocaleString('id-ID') + ' Laporan';
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
									display: false
								}
							}]
						}
					}
				});
			}
		});
	});

	// ------------------------------------------------------- //
	// hasil
	// ------------------------------------------------------ //
	$.ajax({
		url: "assets/data/penyelesaian-pengaduan-hasil.php",
		method: "GET",
		success: function (data) {
			// Konversi ke bilangan bulat
			var percentage = parseFloat(data);

			// Menggunakan nilai tersebut dalam circleProgress
			$('.circle-orders').circleProgress({
				value: Math.abs(percentage) / 100, // Mengonversi nilai ke dalam rentang 0-1
				size: 120,
				startAngle: -Math.PI / 2,
				thickness: 6,
				lineCap: 'round',
				emptyFill: '#252946',
				fill: {
					gradient: ['#0087a4', '#08a6c3']
				}
			}).on('circle-animation-progress', function (event, progress) {
				// Menghitung persentase yang ditampilkan
				var percentValue = (percentage * progress).toFixed(2).replace('.', ',');

				// Memperbarui teks persentase
				$(this).find('.percent-orders').html(percentValue + '<i>%</i>');
			});
		},
		error: function (xhr, status, error) {
			console.error("Terjadi kesalahan saat mengambil data:", error);
		}
	});

	// ------------------------------------------------------- //
	// Data
	// ------------------------------------------------------- //
	$(document).ready(function () {
		$.ajax({
			url: 'assets/data/penyelesaian-pengaduan-now.php',
			method: 'GET',
			success: function (response) {
				$('.some-stats').eq(0).find('.number').text(response.data1 + ' Laporan');
				$('.some-stats').eq(1).find('.number').text(response.data2 + ' Laporan');
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

})(jQuery);