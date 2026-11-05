<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);

if ($is_logged_in) {
    $user_level = $_SESSION['lvl'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPATIK V2.0 - Produksi</title>
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
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5-dark.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css">
    <style>
        #map-container {
            position: relative;
            height: 500px;
            width: 100%;
        }

        #layer-control {
            height: 100%;
            width: 100%;
        }

        #search-container {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            z-index: 5;
        }

        #search-input {
            width: 200px;
            margin-right: 5px;
        }

        #search-button {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        #search-button:hover {
            background-color: darkblue;
        }
    </style>
    <style>
        .carousel-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease;
            width: 100%;
        }

        .carousel-slide {
            min-width: 100%;
            position: relative;
        }

        .carousel img {
            width: 100%;
            height: auto;
            display: block;
        }

        .alt-text {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            white-space: nowrap;
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-controls button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            font-size: 18px;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .carousel-controls button:hover {
            background: rgba(0, 0, 0, 0.7);
        }
    </style>
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
        <!-- Begin Header -->
        <header class="header">
            <nav class="navbar fixed-top">
                <!-- Begin Topbar -->
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Begin Logo -->
                    <div class="navbar-header">
                        <a href="db-default.html" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="assets/img/logo-big-2.png" alt="logo" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="assets/img/logo-2.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                        <!-- Toggle Button -->
                        <a id="toggle-btn" href="#" class="menu-btn active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <!-- End Toggle -->
                    </div>
                    <!-- End Logo -->
                    <!-- Begin Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <!-- User -->
                        <li class="nav-item dropdown">
                            <?php if ($is_logged_in) : ?>
                                <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                    <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle">
                                </a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                    </li>
                                    <li>
                                        <a href="pages-profile.html" class="dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item no-padding-bottom">Settings</a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="pages-logout.php" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <button type="button" class="btn btn-shadow mr-1 mb-2" onclick="window.location.href='pages-login.html'">Login</button>
                            <?php endif; ?>
                        </li>
                        <!-- End User -->
                    </ul>
                    <!-- End Navbar Menu -->
                </div>
                <!-- End Topbar -->
            </nav>
        </header>
        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            <div class="default-sidebar">
                <!-- Begin Side Navbar -->
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <!-- Begin Main Navigation -->
                    <ul class="list-unstyled">
                        <span class="heading">Kinerja</span>
                        <li><a href="#keuangan" aria-expanded="false" data-toggle="collapse"><i class="la la-money"></i><span>Aspek Keuangan</span></a>
                            <ul id="keuangan" class="collapse list-unstyled pt-0">
                                <li><a href="return-on-equity.php">Return on Equity</a></li>
                                <li><a href="ratio-operasi.php">Rasio Operasi</a></li>
                                <li><a href="cash-ratio.php">Rasio Kas</a></li>
                                <li><a href="efisiensi-penagihan.php">Efisiensi Penagihan</a></li>
                                <li><a href="solvabilitas.php">Solvabilitas</a></li>
                            </ul>
                        </li>
                        <li><a href="#pelayanan" aria-expanded="false" data-toggle="collapse"><i class="la la-thumbs-up"></i><span>Aspek Pelayanan</span></a>
                            <ul id="pelayanan" class="collapse list-unstyled pt-0">
                                <li><a href="cakupan-pelayanan.php">Cakupan Pelayanan</a></li>
                                <li><a href="pertumbuhan-pelanggan.php">Pertumbuhan Pelanggan</a></li>
                                <li><a href="penyelesaian-pengaduan.php">Penyelesaian Pengaduan</a></li>
                                <li><a href="kualitas-air.php">Kualitas Air</a></li>
                                <li><a href="konsumsi-air.php">Konsumsi Air</a></li>
                            </ul>
                        </li>
                        <li><a href="#operasional" aria-expanded="false" data-toggle="collapse"><i class="la la-tint"></i><span>Aspek Operasional</span></a>
                            <ul id="operasional" class="collapse list-unstyled pt-0">
                                <li><a href="rasio-efisiensi-produksi.php">Rasio Efisiensi Produksi</a></li>
                                <li><a href="air-tidak-berekening.php">Air Tidak Berekening</a></li>
                                <li><a href="jam-operasi.php">Jam Operasi</a></li>
                                <li><a href="tekanan-air.php">Tekanan Air</a></li>
                                <li><a href="penggantian-meter.php">Penggantian Meter</a></li>
                            </ul>
                        </li>
                        <li><a href="#sdm" aria-expanded="false" data-toggle="collapse"><i class="la la-group"></i><span>Aspek SDM</span></a>
                            <ul id="sdm" class="collapse list-unstyled pt-0">
                                <li><a href="jumlah-pegawai.php">Jumlah Pegawai</a></li>
                                <li><a href="rasio-pegawai-diklat.php">Rasio Pegawai Diklat</a></li>
                                <li><a href="rasio-biaya-diklat.php">Rasio Biaya Diklat</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="heading">Target</span>
                    <ul class="list-unstyled">
                        <li><a href="#tek" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>TEKNIK</span></a>
                            <ul id="tek" class="collapse list-unstyled pt-0">
                                <li><a href="produksi.php">Produksi</a></li>
                                <li><a href="distribusi.php">Distribusi</a></li>
                                <li><a href="tingkat-kehilangan-air.php">Tingkat Kehilangan Air</a></li>
                                <li><a href="perawatan-meter.php">Perawatan Meter</a></li>
                                <li><a href="pemutusan-tunggakan.php">Pemutusan Tunggakan</a></li>
                            </ul>
                        </li>
                        <li><a href="#hbl" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>HUBLANG</span></a>
                            <ul id="hbl" class="collapse list-unstyled pt-0">
                                <li><a href="drd-posting.php">DRD Posting</a></li>
                                <li><a href="pertumbuhan-pelanggan-hbl.php">Pertumbuhan Pelanggan</a></li>
                                <li><a href="pengaduan-pelanggan.php">Pengaduan Pelanggan</a></li>
                                <li><a href="perbaikan-rekening.php">Perbaikan Rekening</a></li>
                                <li><a href="pembacaan-meter.php">Pembacaan Meter</a></li>
                            </ul>
                        </li>
                        <li><a href="#keu" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>KEUANGAN</span></a>
                            <ul id="keu" class="collapse list-unstyled pt-0">
                                <li><a href="efisiensi-penagihan-keu.php">Efisiensi Penagihan</a></li>
                                <li><a href="arus-kas.php">Arus Kas</a></li>
                            </ul>
                        </li>
                        <li><a href="#spi" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPI</span></a>
                            <ul id="spi" class="collapse list-unstyled pt-0">
                                <li><a href="tunggakan-empat-bulan.php">Tunggakan > 4 Bulan</a></li>
                                <li><a href="monitoring-spi.php">Monitoring SPI</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="#spka" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPKA</span></a>
                            <ul id="spka" class="collapse list-unstyled show pt-0">
                                <li><a href="monitoring-dma.php">Monitoring DMA</a></li>
                                <li><a href="kegiatan-spka.php">Kegiatan SPKA</a></li>
                                <li><a class="active" href="gis.php">GIS</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="heading">Input Data</span>
                    <ul class="list-unstyled">
                        <?php if ($is_logged_in) : ?>
                            <li><a href="#aspek-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>Posting Kinerja</span></a>
                                <ul id="aspek-input" class="collapse list-unstyled pt-0">
                                    <li><a href="aspek-keuangan-input.php">Aspek Keuangan</a></li>
                                    <li><a href="aspek-pelayanan-input.php">Aspek Pelayanan</a></li>
                                    <li><a href="aspek-operasional-input.php">Aspek Operasional</a></li>
                                    <li><a href="aspek-sdm-input.php">Aspek SDM</a></li>
                                </ul>
                            </li>
                            <li><a href="#produksi-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>TEKNIK</span></a>
                                <ul id="produksi-input" class="collapse list-unstyled pt-0">
                                    <li><a href="produksi-input.php">Produksi</a></li>
                                    <li><a href="distribusi-input.php">Distribusi</a></li>
                                    <li><a href="perawatan-meter-input.php">Perawatan Meter</a></li>
                                </ul>
                            </li>
                            <li><a href="#keuangan-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>KEUANGAN</span></a>
                                <ul id="keuangan-input" class="collapse list-unstyled pt-0">
                                    <li><a href="arus-kas-input.php">Arus Kas</a></li>
                                </ul>
                            </li>
                            <li><a href="#spka-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>SPKA</span></a>
                                <ul id="spka-input" class="collapse list-unstyled pt-0">
                                    <li><a href="monitoring-dma-input.php">Monitoring DMA</a></li>
                                    <li><a href="kegiatan-spka-input.php">Kegiatan SPKA</a></li>
                                </ul>
                            </li>
                            <li><a href="#spi-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>SPI</span></a>
                                <ul id="spi-input" class="collapse list-unstyled pt-0">
                                    <li><a href="monitoring-spi-input.php">Monitoring SPI</a></li>
                                </ul>
                            </li>
                            <li><a href="#user-input" aria-expanded="false" data-toggle="collapse"><i class="la la-key"></i><span>Users</span></a>
                                <ul id="user-input" class="collapse list-unstyled pt-0">
                                    <li><a href="registrasi.php">Registrasi</a></li>
                                    <li><a href="reset-password.php">Reset Password</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!-- End Main Navigation -->
                </nav>
                <!-- End Side Navbar -->
            </div>
            <!-- End Left Sidebar -->
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Begin Page Header-->
                    <div class="row">
                        <div class="page-header">
                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">SPKA</h2>
                                <div>
                                    <div class="page-header-tools">
                                        <a class="btn btn-gradient-01" href="mobile/">Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="row flex-row">
                        <div class="col-xl-12 col-md-6">
                            <!-- Begin Widget 04 -->
                            <div class="widget widget-04 has-shadow">
                                <!-- Begin Widget Header -->
                                <!-- Leaflet -->
                                <div class="widget widget-38 has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>GIS</h4>
                                    </div>
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <div class="col-lg-5">
                                            <label for="zona" class="form-control-label">Zona:</label>
                                            <select id="zona" class="custom-select form-control">
                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-shadow" id="proses">Tampil Data</button>
                                        </div>
                                    </div>
                                    <div id="map-container" class="widget-body p-0">
                                        <div id="layer-control" style="height: 500px; width: 100%;"></div>
                                        <div id="search-container">
                                            <input type="text" id="search-input" placeholder="cari nosamb">
                                            <button id="search-button">Cari</button>
                                        </div>
                                    </div>
                                    <!-- End Leaflet -->
                                </div>
                                <!-- End Widget Header -->
                            </div>
                            <!-- End Widget 04 -->
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
    <!-- Modal to display customer details -->
    <div id="customerModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="customer-info"></div>
        </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB861q02tPb43SuX8bSUB_mGJgo1KJ-YjE&callback=initMap&loading=async&libraries=drawing,geometry"></script>
    <!-- End Page Vendor Js -->
    <!-- script map -->
    <script>
        var map;
        var zonaData = [];
        var searchMarker;

        function initMap() {
            var mapOptions = {
                center: {
                    lat: 1.0276896,
                    lng: 104.515698
                },
                zoom: 10
            };

            map = new google.maps.Map(document.getElementById('layer-control'), mapOptions);


            $.getJSON("assets/data/get_geojson.php", function(geojsonData) {
                var geojsonLayer = new google.maps.Data({
                    map: map
                });

                // Fungsi untuk mengatur style berdasarkan 'name' pada setiap fitur
                geojsonLayer.setStyle(function(feature) {
                    var name = feature.getProperty('name'); // Ambil nilai 'name' dari properti fitur
                    var color = 'orange'; // Default color

                    // Tentukan warna berdasarkan nilai 'name'
                    switch (name) {
                        case 'ZONA_DMA':
                            color = 'red'; // Warna untuk ZONA_DMA
                            break;
                        case 'PCM':
                            color = 'blue'; // Warna untuk PCM
                            break;
                        case 'GESEK':
                            color = 'green'; // Warna untuk GESEK
                            break;
                        case 'HDPE':
                            color = 'yellow'; // Warna untuk HDPE
                            break;
                        case 'BW':
                            color = 'purple'; // Warna untuk BW
                            break;
                        case 'RPD':
                            color = 'cyan'; // Warna untuk RPD
                            break;
                        case 'PIPA_KIJANG':
                            color = 'orange'; // Warna untuk PIPA_KIJANG
                            break;
                        case 'PIPA_TANJUNG_UBAN':
                            color = 'pink'; // Warna untuk PIPA_TANJUNG_UBAN
                            break;
                        default:
                            color = 'gray'; // Warna default jika 'name' tidak dikenali
                    }

                    // Kembalikan objek style yang akan diterapkan pada fitur
                    return {
                        strokeColor: color, // Atur warna garis sesuai dengan nama
                        strokeWeight: 2, // Atur lebar garis
                        strokeOpacity: 0.8 // Atur opasitas garis
                    };
                });

                // Tambahkan data GeoJSON ke layer
                geojsonLayer.addGeoJson(geojsonData);

                // Buat InfoWindow untuk menampilkan popup
                var infoWindow = new google.maps.InfoWindow();

                // Fungsi untuk menangani klik pada fitur
                google.maps.event.addListener(geojsonLayer, 'click', function(event) {
                    var feature = event.feature; // Ambil fitur yang diklik
                    var name = feature.getProperty('name'); // Ambil nilai 'name'
                    var jenis = feature.getProperty('jenis'); // Ambil nilai 'jenis'

                    // Buat konten HTML untuk info window
                    var contentString = '<div><strong>JDU: </strong>' + name + '<br><strong>Jenis Pipa: </strong>' + jenis + '</div>';

                    // Set konten info window dan posisi berdasarkan klik pada fitur
                    infoWindow.setContent(contentString);
                    infoWindow.setPosition(event.latLng);

                    // Tampilkan info window
                    infoWindow.open(map);
                });
                // Fungsi untuk menambahkan pengukur jarak (ruler)
                var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYLINE, // Aktifkan mode menggambar garis (untuk pengukuran jarak)
                    drawingControl: true, // Tampilkan kontrol menggambar
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.POLYLINE] // Hanya garis yang dapat digambar
                    },
                    polylineOptions: {
                        strokeColor: '#ff0000', // Warna garis pengukur
                        strokeWeight: 2, // Lebar garis pengukur
                        editable: true // Membuat garis dapat diedit
                    }
                });

                drawingManager.setMap(map); // Menambahkan drawing manager ke peta

                // Fungsi untuk menghitung jarak garis yang digambar
                google.maps.event.addListener(drawingManager, 'polylinecomplete', function(polyline) {
                    var length = google.maps.geometry.spherical.computeLength(polyline.getPath()); // Hitung panjang garis
                    alert('Total length: ' + (length / 1000).toFixed(2) + ' km'); // Tampilkan panjang dalam kilometer
                });
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
            fetchZonaData();
        }

        function fetchZonaData() {
            $.getJSON("assets/data/zona.php", function(zonaList) {
                populateZonaDropdown(zonaList);
                displayMarkersByZona(getFirstZonaName());
            });
        }

        function populateZonaDropdown(zonaList) {
            zonaList.forEach(zona => {
                $('#zona').append(`<option value="${zona}">${zona}</option>`);
            });
        }

        function getFirstZonaName() {
            return $('#zona option:first').val();
        }

        function displayMarkers(markerData) {
            // Clear existing markers
            markers.forEach(markerObj => markerObj.marker.setMap(null));
            markers = [];

            markerData.forEach(marker => {
                var waktubaca = marker.waktubaca;
                var dateObj = new Date(waktubaca);
                var month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
                var year = dateObj.getFullYear().toString().slice(-2);
                var bulan_tahun = month + year;
                var photoUrl = `http://server.tirtakepri.co.id/foto/${bulan_tahun}/${marker.nosamb}.jpg`;

                var popupContent = `<b>${marker.nosamb}</b><br>
                <u>${marker.nama}</u><br>
                Alamat: ${marker.alamat}<br>
                Gol: ${marker.golongan}<br>
                Stan Lalu: ${parseFloat(marker.stanlalu).toLocaleString('id-ID')}<br>
                Stan Sekarang: ${parseFloat(marker.stanskrg).toLocaleString('id-ID')}<br>
                Pakai: ${parseInt(marker.pakai).toLocaleString('id-ID')} m³<br>
                Petugas: ${marker.namapetugas}<br>
                Waktu Baca: ${marker.waktubaca}<br>
                Problem: ${marker.kelainan}<br>
                Foto Meter: <a href="${photoUrl}" target="_blank">${marker.nosamb}.jpg</a>`;

                var infowindow = new google.maps.InfoWindow({
                    content: popupContent
                });

                var circleColor = parseInt(marker.pakai) >= 1 ? 'blue' : 'red';

                var markerWithLabel = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(marker.latitude), parseFloat(marker.longitude)),
                    map: map,
                    label: {
                        text: marker.nosamb,
                        fontSize: '10px'
                    },
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        fillColor: circleColor,
                        fillOpacity: 0.8,
                        strokeColor: circleColor,
                        strokeWeight: 2
                    }
                });

                markerWithLabel.addListener('click', function() {
                    infowindow.open(map, markerWithLabel);
                });

                markers.push({
                    nosamb: marker.nosamb,
                    marker: markerWithLabel,
                    infowindow: infowindow
                });
            });
        }

        function displayMarkersByZona(zona) {
            var url = `assets/data/lokasi-zona.php?namazona=${encodeURIComponent(zona)}`;
            $.getJSON(url, function(markerData) {
                displayMarkers(markerData);
            });
        }

        $('#search-button').on('click', function() {
            var searchInput = $('#search-input').val().trim();
            if (searchInput === '') {
                alert('Masukkan Nosamb untuk pencarian.');
                return;
            }

            if (searchMarker) {
                searchMarker.setMap(null);
            }

            $.ajax({
                url: 'assets/data/lokasi-pelanggan.php',
                type: 'GET',
                data: {
                    nosamb: searchInput
                },
                dataType: 'json',
                success: function(data) {
                    if (data.length === 0) {
                        alert('Nosamb tidak ditemukan!');
                        return;
                    }

                    var pelanggan = data[0];
                    var waktubaca = pelanggan.waktubaca;
                    var dateObj = new Date(waktubaca);
                    var month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
                    var year = dateObj.getFullYear().toString().slice(-2);
                    var bulan_tahun = month + year;
                    var position = new google.maps.LatLng(parseFloat(pelanggan.latitude), parseFloat(pelanggan.longitude));
                    var fotorumahUrl = `http://server.tirtakepri.co.id/foto/fotorumah/${pelanggan.nosamb}R.jpg`;
                    var fotometerUrl = `http://server.tirtakepri.co.id/foto/${bulan_tahun}/${pelanggan.nosamb}.jpg`;

                    searchMarker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: pelanggan.nosamb,
                        icon: {
                            url: 'assets/icons/meter.png', // Path ke ikon rumah
                            scaledSize: new google.maps.Size(32, 32) // Ukuran ikon
                        }
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: `<div><strong>Nosamb:</strong> ${pelanggan.nosamb}<br>
                          <strong>Nama:</strong> ${pelanggan.nama}<br>
                          <strong>Alamat:</strong> ${pelanggan.alamat}<br>
                          <strong>Gol:</strong> ${pelanggan.golongan}<br>
                          <strong>Status:</strong> ${pelanggan.status}<br>
                          <strong>Pemakaian Terakhir:</strong> ${pelanggan.pakaiskrg}<br>
                          <strong>Petugas:</strong> ${pelanggan.namapetugas}<br>
                          <strong>Foto Rumah:</strong> <a href="${fotorumahUrl}" target="_blank">${pelanggan.nosamb}.jpg</a><br>
                          <strong>Foto Meter:</strong> <a href="${fotometerUrl}" target="_blank">${pelanggan.nosamb}.jpg</a>
                          </div>`
                    });

                    infowindow.open(map, searchMarker);
                    map.setCenter(position);
                    map.setZoom(16);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mencari data pelanggan.');
                }
            });
        });
    </script>
</body>

</html>