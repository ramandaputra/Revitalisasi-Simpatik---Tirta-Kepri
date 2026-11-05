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
			url: "assets/data/efisiensi-penagihan-bulan.php",
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

				var backgroundColorsData1 = [];
				var backgroundColorsData2 = [];
				var hoverBackgroundColorsData1 = [];
				var hoverBackgroundColorsData2 = [];

				// Menentukan warna berdasarkan perbandingan biaya dan pendapatan
				for (let i = 0; i < 12; i++) {
					if (data1Data[i] > data2Data[i]) {
						backgroundColorsData1.push("#6aa84f"); // Hijau jika di atas
						hoverBackgroundColorsData1.push("#38761d"); // Hijau gelap saat hover jika di atas
						backgroundColorsData2.push("#e06666"); // Merah jika di bawah atau sama dengan
						hoverBackgroundColorsData2.push("#cc0000"); // Merah saat hover jika di bawah atau sama dengan
					} else {
						backgroundColorsData1.push("#e06666"); // Merah jika di bawah atau sama dengan
						hoverBackgroundColorsData1.push("#cc0000"); // Merah saat hover jika di bawah atau sama dengan
						backgroundColorsData2.push("#6aa84f"); // Hijau jika di atas
						hoverBackgroundColorsData2.push("#38761d"); // Hijau gelap saat hover jika di atas
					}
				}

				function formatRupiah(angka) {
					return new Intl.NumberFormat('id-ID', {
						style: 'currency',
						currency: 'IDR',
						minimumFractionDigits: 0
					}).format(angka).replace('IDR', 'Rp.').trim();
				}

				var ctx = document.getElementById("orders").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'roundedBar', // Menggunakan 'bar' type untuk chart dengan roundedBar plugin
					data: {
						labels: months, // Tetapkan label bulan
						datasets: [{
							label: 'Penerimaan Rekening Air',
							data: data1Data,
							borderColor: "#2c304d",
							backgroundColor: backgroundColorsData1,
							hoverBackgroundColor: hoverBackgroundColorsData1
						}, {
							label: 'Rekening Air (Bulan Berjalan)',
							data: data2Data,
							borderColor: "#2c304d",
							backgroundColor: backgroundColorsData2,
							hoverBackgroundColor: hoverBackgroundColorsData2
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
									return 'Rp. ' + tooltipItem.yLabel.toLocaleString('id-ID') + ',-'; // Menggunakan toLocaleString untuk format angka
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
		url: "assets/data/efisiensi-penagihan-hasil.php",
		method: "GET",
		success: function (data) {
			// Mengonversi nilai dari PHP ke bilangan bulat
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
			url: 'assets/data/efisiensi-penagihan-now.php',
			method: 'GET',
			success: function (response) {
				$('.some-stats').eq(0).find('.number').text('Rp. ' + response.data1 + ',-');
				$('.some-stats').eq(1).find('.number').text('Rp. ' + response.data2 + ',-');
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});

})(jQuery);