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
    <title>SIMPATIK V2.0 - Tunggakan Diatas 4 Bulan</title>
    <meta name="description" content="SIMPATIK">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB861q02tPb43SuX8bSUB_mGJgo1KJ-YjE&callback=initMap"></script>
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
        .table th,
        .table td {
            border: 1px solid #49556B;
            text-align: center;
            /* Center-align table headers */
        }

        .text-right {
            text-align: right;
            /* Right-align numeric data */
        }
    </style>
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
                    <span class="heading">Target x Realisasi</span>
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
                        <li class="active"><a href="#spi" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPI</span></a>
                            <ul id="spi" class="collapse list-unstyled show pt-0">
                                <li><a class="active" href="tunggakan-empat-bulan.php">Tunggakan > 4 Bulan</a></li>
                                <li><a href="monitoring-spi.php">Monitoring SPI</a></li>
                            </ul>
                        </li>
                        <li><a href="#spka" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPKA</span></a>
                            <ul id="spka" class="collapse list-unstyled pt-0">
                                <li><a href="monitoring-dma.php">Monitoring DMA</a></li>
                                <li><a href="kegiatan-spka.php">Kegiatan SPKA</a></li>
                                <li><a href="gis.php">GIS</a></li>
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
                                <h2 class="page-header-title">Tunggakan Diatas 4 Bulan</h2>
                                <div>
                                    <div class="page-header-tools">
                                        <a class="btn btn-gradient-01" href="index.php">Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="widget-body">
                        <div class="tab-content pt-3">
                            <div class="row flex-row">
                                <div class="col-xl-12 col-md-6">
                                    <!-- Begin Widget 04 -->
                                    <div class="widget widget-07 has-shadow">
                                        <!-- Begin Widget Header -->
                                        <div class="widget-header bordered d-flex align-items-center">
                                            <div class="col-lg-5">
                                                <label for="wilayah" class="form-control-label">Wilayah:</label>
                                                <select id="wilayah" class="custom-select form-control">
                                                    <option value="all">All</option>
                                                    <option value="tanjungpinang">Tanjungpinang</option>
                                                    <option value="kijang">Kijang</option>
                                                    <option value="tanjunguban">Tanjung Uban</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-shadow" id="proses">Tampil Data</button>
                                            </div>
                                        </div>
                                        <!-- End Widget Header -->
                                        <!-- Begin Widget Body -->
                                        <div class="container mt-3">
                                            <div>
                                                <table class="table table-hover mb-0">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <td rowspan="2">Golongan</td>
                                                            <td colspan="3">Tunggakan</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelanggan</td>
                                                            <td>Pakai (m³)</td>
                                                            <td>Jumlah (Rp)</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="order-table-body">
                                                    </tbody>
                                                    <tfoot id="order-table-footer">
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Widget Body -->
                                    </div>
                                    <!-- End Widget 04 -->
                                </div>
                            </div>
                            <!-- End Row -->
                            <div class="row flex-row">
                                <div class="col-xl-12 col-md-6">
                                    <!-- Begin Widget 04 -->
                                    <div class="widget widget-04 has-shadow">
                                        <!-- Begin Widget Header -->
                                        <!-- Leaflet -->
                                        <div class="widget widget-38 has-shadow">
                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                <h4>Lokasi Pelanggan Menunggak</h4>
                                            </div>
                                            <div id="map-container" class="widget-body p-0">
                                                <div id="layer-control" style="height: 500px; width: 100%;"></div>
                                                <div id="search-container">
                                                    <input type="text" id="search-input" placeholder="nosamb">
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
                    </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB861q02tPb43SuX8bSUB_mGJgo1KJ-YjE&callback=initMap&loading=async"></script>
    <!-- End Page Vendor Js -->
    <!-- End Page Snippets -->

    <!-- script tabel -->
    <script>
        $(document).ready(function() {
            function fetchData(wilayah) {
                $.ajax({
                    url: 'assets/data/tunggakan-diatas.php',
                    method: 'GET',
                    data: {
                        wilayah: wilayah
                    },
                    dataType: 'json',
                    success: function(data) {
                        let tableBody = $('#order-table-body');
                        let tableFooter = $('#order-table-footer');
                        tableBody.empty();
                        tableFooter.empty();

                        // Summarize data based on golongan
                        let summary = {};

                        data.forEach(order => {
                            let golongan = order.kodegol;
                            if (!summary[golongan]) {
                                summary[golongan] = {
                                    pelanggan: 0,
                                    pakai: 0,
                                    jumlah: 0
                                };
                            }
                            summary[golongan].pelanggan += 1; // Count each unique pelanggan
                            summary[golongan].pakai += parseFloat(order.pakai);
                            summary[golongan].jumlah += parseFloat(order.jumlah);
                        });

                        // Define golongan descriptions
                        let golonganDescriptions = {
                            'IA': 'Sosial Umum',
                            'IB': 'Sosial Khusus',
                            'IIA': 'Rumah Tangga',
                            'IIB': 'Instansi Pemerintah',
                            'IIIA': 'Niaga Kecil',
                            'IIIB': 'Niaga Besar',
                            'IV': 'Industri',
                            'V': 'Golongan Khusus'
                        };

                        // Create table rows
                        for (let golongan in summary) {
                            let row = `
                        <tr>
                            <td class="text-center">${golonganDescriptions[golongan] || golongan}</td>
                            <td class="text-center">${summary[golongan].pelanggan.toLocaleString('id-ID')}</td>
                            <td class="text-center">${summary[golongan].pakai.toLocaleString('id-ID')}</td>
                            <td class="text-right">${summary[golongan].jumlah.toLocaleString('id-ID')}</td>
                        </tr>
                        `;
                            tableBody.append(row);
                        }

                        // Create table footer
                        let totalPelanggan = 0;
                        let totalPakai = 0;
                        let totalJumlah = 0;

                        for (let golongan in summary) {
                            totalPelanggan += summary[golongan].pelanggan;
                            totalPakai += summary[golongan].pakai;
                            totalJumlah += summary[golongan].jumlah;
                        }

                        let footerRow = `
                    <tr>
                        <td class="text-center"><strong>Total</strong></td>
                        <td class="text-center"><strong>${totalPelanggan.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalPakai.toLocaleString('id-ID')}</strong></td>
                        <td class="text-right"><strong>${totalJumlah.toLocaleString('id-ID')}</strong></td>
                    </tr>
                    `;
                        tableFooter.append(footerRow);
                    },
                    error: function() {
                        console.log('Data Belum Tersedia');
                    }
                });
            }

            // Fetch data with default 'all' option when the page loads
            fetchData('all');

            $('#proses').on('click', function() {
                let wilayah = $('#wilayah').val();
                fetchData(wilayah);
            });
        });
    </script>
    <!-- script map -->
    <script>
        var map;
        var markers = [];
        var allMarkerData = [];

        function initMap() {
            var mapOptions = {
                center: {
                    lat: 0.932113,
                    lng: 104.479105
                },
                zoom: 13
            };

            map = new google.maps.Map(document.getElementById('layer-control'), mapOptions);

            fetchData();
        }

        function fetchData() {
            $.getJSON("assets/data/lokasi-menunggak.php", function(markerData) {
                allMarkerData = markerData; // Store all data
                displayMarkers(markerData);
            });
        }

        function displayMarkers(markerData) {
            // Clear existing markers
            markers.forEach(markerObj => markerObj.marker.setMap(null));
            markers = [];

            markerData.forEach(marker => {
                var photoUrl = `http://server.tirtakepri.co.id/foto/fotorumah/${marker.nosamb}R.jpg`;
                var popupContent = `<b>${marker.nosamb}</b><br>
                <u>${marker.nama}</u><br>
                Alamat: ${marker.alamat}<br>
                Gol: ${marker.golongan}<br>
                Lembar: ${marker.lembar.toLocaleString('id-ID')}<br>
                Jumlah: ${parseFloat(marker.jumlah).toLocaleString('id-ID')}<br>
                Foto Rumah: <a href="${photoUrl}" target="_blank">${marker.nosamb}R.jpg</a>`;

                var infowindow = new google.maps.InfoWindow({
                    content: popupContent
                });

                var circleColor = parseFloat(marker.jumlah) >= 1000000 ? 'red' : 'yellow';

                var markerWithLabel = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(marker.latitude), parseFloat(marker.longitude)),
                    map: map,
                    label: {
                        text: marker.nosamb,
                        fontSize: '12px'
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

        $(document).ready(function() {
            $('#search-button').on('click', function() {
                var searchInput = $('#search-input').val().trim();
                var found = false;

                markers.forEach(function(item) {
                    if (item.nosamb.endsWith(searchInput)) {
                        map.setCenter(item.marker.getPosition());
                        map.setZoom(16);
                        item.infowindow.open(map, item.marker);
                        found = true;
                    }
                });

                if (!found) {
                    alert('Nosamb not found!');
                }
            });
        });
    </script>
</body>

</html>