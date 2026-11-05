<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPATIK V2.0 - Dashboard</title>
    <meta name="description" content="SIMPATIK">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body id="page-top">
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="assets/img/logo-2.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- End Preloader -->
    <div class="page">
        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Begin Row -->
                    <div class="row flex-row">
                        <!-- Begin Facebook -->
                        <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="widget widget-12 has-shadow">
                                <div class="widget-body">
                                    <div class="media">
                                        <div class="align-self-center ml-5 mr-5">
                                            <i class="ion-person-stalker text-twitter"></i>
                                        </div>
                                        <div class="pelanggan-stats align-self-center">
                                            <div class="title text-twitter">Pelanggan Aktif</div>
                                            <div class="number">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Facebook -->
                        <!-- Begin Twitter -->
                        <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="widget widget-12 has-shadow">
                                <div class="widget-body">
                                    <div class="media">
                                        <div class="align-self-center ml-5 mr-5">
                                            <i class="ion-waterdrop text-twitter"></i>
                                        </div>
                                        <div class="pelanggan-stats align-self-center">
                                            <div class="title text-twitter">Penjualan</div>
                                            <div class="number">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Twitter -->
                        <!-- Begin Linkedin -->
                        <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="widget widget-12 has-shadow">
                                <div class="widget-body">
                                    <div class="media">
                                        <div class="align-self-center ml-5 mr-5">
                                            <i class="ion-cash text-twitter"></i>
                                        </div>
                                        <div class="pelanggan-stats align-self-center">
                                            <div class="title text-twitter">Penagihan</div>
                                            <div class="number">Laoding...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Linkedin -->
                    </div>
                    <!-- End Row -->
                    <div class="row flex-row">
                        <div class="col-xl-8 col-md-6">
                            <!-- Begin Widget 04 -->
                            <div class="widget widget-04 has-shadow">
                                <!-- Begin Widget Header -->
                                <!-- Leaflet -->
                                <div class="widget widget-38 has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>GIS</h4>
                                    </div>
                                    <div class="widget-body p-0">
                                        <div id="layer-control" style="height: 485px"></div>
                                    </div>
                                    <!-- End Leaflet -->
                                </div>
                                <!-- End Widget Header -->
                            </div>
                            <!-- End Widget 04 -->
                        </div>
                        <div class="col-xl-4">
                            <!-- Begin Widget 06 -->
                            <div class="widget widget-06 has-shadow">
                                <!-- Begin Widget Header -->
                                <div class="widget-header bordered d-flex align-items-center">
                                    <h2>Tinggi Muka Air</h2>
                                </div>
                                <!-- End Widget Header -->
                                <!-- Begin Widget Body -->
                                <div class="widget-body p-0">
                                    <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                        <ul class="reviews list-group w-100" id="tma-list">
                                            <!-- Data akan dimuat di sini oleh AJAX -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Widget Body -->
                            </div>
                            <!-- End Widget 06 -->
                        </div>
                    </div>
                    <!-- End Row -->
                    <!-- Begin Row -->
                    <div class="row flex-row">
                        <div class="col-xl-12 col-md-6">
                            <!-- Begin Widget 09 -->
                            <div class="widget widget-09 has-shadow">
                                <!-- Begin Widget Header -->
                                <div class="widget-header d-flex align-items-center">
                                    <h2>Produktifitas Petugas Bacameter</h2>
                                    <div class="widget-options">
                                        <button type="button" class="btn btn-shadow">View all</button>
                                    </div>
                                </div>
                                <!-- End Widget Header -->
                                <!-- Begin Widget Body -->
                                <div class="widget-body">
                                    <div class="row">
                                        <div class="col-xl-10 col-12 no-padding">
                                            <div>
                                                <canvas id="orders"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-12 d-flex flex-column my-auto no-padding text-center">
                                            <div class="new-orders">
                                                <div class="title">Progress Baca</div>
                                                <div class="circle-orders">
                                                    <div class="percent-orders"></div>
                                                </div>
                                            </div>
                                            <div class="some-stats mt-5">
                                                <div class="title">Total Baca</div>
                                                <div class="number text-blue">0</div>
                                            </div>
                                            <div class="some-stats mt-3">
                                                <div class="title">Total Problem</div>
                                                <div class="number text-blue">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 09 -->
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Container -->
                <!-- Begin Page Footer-->
                <footer class="main-footer">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                            <p class="text-gradient-02">Develop With <i class="text-danger">&hearts;</i> by Farhan</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="documentation.html">Documentation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="changelog.html">Changelog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
                <!-- End Page Footer -->
                <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Page Content -->
    </div>
    <!-- Begin Vendor Js -->
    <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="assets/vendors/js/chart/chart.min.js"></script>
    <script src="assets/vendors/js/progress/circle-progress.min.js"></script>
    <script src="assets/vendors/js/calendar/moment.min.js"></script>
    <script src="assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/js/app/app.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/dashboard/dashboard.js"></script>
    <!-- End Page Snippets -->
    <!-- script map -->
    <script>
        var map;

        function initMap() {
            var mapOptions = {
                center: {
                    lat: 1.0276896,
                    lng: 104.515698
                },
                zoom: 10
            };

            var map = new google.maps.Map(document.getElementById('layer-control'), mapOptions);

            $.getJSON("assets/data/get_geojson.php", function(geojsonData) {
                var geojsonLayer = new google.maps.Data({
                    map: map
                });

                geojsonLayer.setStyle({
                    strokeColor: 'orange', // Atur warna garis menjadi hijau
                    strokeWeight: 2, // Atur lebar garis
                    strokeOpacity: 0.8 // Atur opasitas garis
                });

                geojsonLayer.addGeoJson(geojsonData);
            });


            $.getJSON("assets/data/get_markers.php", function(markerData) {
                markerData.forEach(marker => {
                    var popupContent = `<b>${marker.name}</b><br>
                    <u>${marker.time}</u><br>
                    Pressure: ${marker.pressure} bar<br>
                    Flow: ${marker.flow} m³/h<br>
                    TDS: ${marker.tds} ppm<br>
                    Level: ${marker.level} m`;

                    var infowindow = new google.maps.InfoWindow({
                        content: popupContent,
                    });

                    // Hitung ukuran lingkaran berdasarkan nilai pressure
                    var circleRadius = calculateCircleRadius(marker.pressure);

                    var circleColor = marker.pressure >= 1 ? 'blue' : 'red'; // Warna biru untuk pressure >= 1, merah untuk pressure < 1

                    // Tambahkan marker dengan lingkaran (circle) dan label
                    var markerWithLabel = new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(marker.latitude), parseFloat(marker.longitude)),
                        map: map,
                        label: {
                            text: marker.name,
                            fontSize: '12px',
                        },
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: circleRadius,
                            fillColor: circleColor, // Warna lingkaran
                            fillOpacity: 0.6, // Opasitas warna lingkaran
                            strokeWeight: 0, // Tidak ada border
                        },
                    });

                    // Tambahkan listener untuk menampilkan infowindow saat marker diklik
                    markerWithLabel.addListener('click', function() {
                        infowindow.open(map, markerWithLabel);
                    });
                });
            });

            // Fungsi untuk menghitung ukuran lingkaran berdasarkan nilai pressure
            function calculateCircleRadius(pressure) {
                return Math.max(0, 12 - pressure); // Contoh sederhana
            }

        }
    </script>
    <!-- script pelanggan -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'assets/data/total_pelanggan.php',
                method: 'GET',
                success: function(response) {
                    $('.pelanggan-stats').eq(0).find('.number').text(response.aktif);
                    $('.pelanggan-stats').eq(1).find('.number').text(response.pakai);
                    $('.pelanggan-stats').eq(2).find('.number').text('Rp. ' + response.bayar + ',-');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    <!-- script dma -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'assets/data/dma.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    let tableBody = $('#order-table-body');
                    tableBody.empty(); // Mengosongkan baris yang ada untuk menghindari duplikasi
                    data.forEach(order => {
                        let colorClass;
                        if (order.persentase >= 50) {
                            colorClass = 'text-danger'; // Merah
                        } else if (order.persentase >= 25) {
                            colorClass = 'text-warning'; // Kuning
                        } else {
                            colorClass = 'text-success'; // Hijau
                        }

                        let row = `
                    <tr>
                        <td style="width:5%;">
                            <div class="styled-checkbox mt-2">
                                <input type="checkbox" name="cb${order.id}" id="cb${order.id}">
                                <label for="cb${order.id}"></label>
                            </div>
                        </td>
                        <td>${order.nama_dma}</td>
                        <td>${order.pelanggan}</td>
                        <td>${order.distribusi}</td>
                        <td>${order.pemakaian}</td>
                        <td>${order.kehilangan}</td>
                        <td class="${colorClass}">${order.persentase}%</td>
                    </tr>
                `;
                        tableBody.append(row); // Menambahkan baris ke tabel body
                    });
                }
            });
        });
    </script>
    <!-- script tma -->
    <script>
        $(document).ready(function() {
            function loadTMA() {
                $.ajax({
                    url: 'assets/data/tma-konsolidasi.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let tmaList = $('#tma-list');
                        tmaList.empty();
                        data.forEach(function(item) {
                            let date = new Date(item.waktu);
                            let formattedDate = ("0" + date.getDate()).slice(-2) + "/" +
                                ("0" + (date.getMonth() + 1)).slice(-2) + "/" +
                                date.getFullYear();
                            tmaList.append(
                                `<li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <div class="username">
                                                <h4>${item.waduk}</h4>
                                            </div>
                                            <div class="msg">
                                                <p><strong>Waktu:</strong> ${formattedDate}</p>
                                                <p><strong>TMA:</strong> ${item.tma} meter</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>`
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Muat data saat halaman dimuat
            loadTMA();

            // Muat data setiap 5 menit
            setInterval(loadTMA, 300000);
        });
    </script>
</body>

</html>