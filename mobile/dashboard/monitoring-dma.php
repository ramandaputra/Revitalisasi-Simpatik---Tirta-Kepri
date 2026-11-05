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
    <title>SIMPATIK V2.0 - Monitoring Distrik Meter Area (DMA)</title>
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
        }

        .text-right {
            text-align: right;
        }

        .table {
            border-collapse: collapse;
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
                        <li><a href="#spi" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPI</span></a>
                            <ul id="spi" class="collapse list-unstyled pt-0">
                                <li><a href="tunggakan-empat-bulan.php">Tunggakan > 4 Bulan</a></li>
                                <li><a href="monitoring-spi.php">Monitoring SPI</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="#spka" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPKA</span></a>
                            <ul id="spka" class="collapse list-unstyled show pt-0">
                                <li><a class="active" href="monitoring-dma.php">Monitoring DMA</a></li>
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
                                <h2 class="page-header-title">Monitoring Distrik Meter Area (DMA)</h2>
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
                            <!-- Begin Row -->
                            <div class="row flex-row">
                                <!-- Begin Facebook -->
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <!-- Pie Chart -->
                                    <div class="widget has-shadow">
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4>Kebocoran DMA</h4>
                                        </div>
                                        <div class="widget-header bordered d-flex align-items-center">
                                            <div class="col-lg-7">
                                                <label for="periode" class="form-control-label">Periode:</label>
                                                <input type="month" id="periode-pie" class="form-control">
                                            </div>
                                            <div class="col-lg-0">
                                                <button type="button" class="btn btn-shadow" id="proses-pie">Tampil</button>
                                            </div>
                                        </div>
                                        <div class="widget-body">
                                            <div class="chart">
                                                <canvas id="pie-chart"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Pie Chart -->
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
                                            <h2>Grafik DMA</h2>
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="dma" class="form-control-label">Pilih DMA:</label>
                                                    <select id="dma" class="custom-select form-control">
                                                    </select>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label for="tahun" class="form-control-label">Tahun:</label>
                                                    <input type="month" id="tahun" class="form-control" value="2024-01">
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-shadow" id="proses">Tampil Data</button>
                                                </div>
                                            </div>
                                            <!-- End Widget Header -->
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
                                                        <div class="title">Persentase</div>
                                                        <div class="circle-orders">
                                                            <div class="percent-orders"></div>
                                                        </div>
                                                    </div>
                                                    <div class="some-stats mt-3">
                                                        <div class="title">Distribusi</div>
                                                        <div class="number text-blue">0</div>
                                                    </div>
                                                    <div class="some-stats mt-3">
                                                        <div class="title">Penjualan</div>
                                                        <div class="number text-blue">0</div>
                                                    </div>
                                                    <div class="some-stats mt-3">
                                                        <div class="title">Kehilangan</div>
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
                            <div class="row flex-row">
                                <div class="col-xl-12 col-md-6">
                                    <!-- Begin Widget 04 -->
                                    <div class="widget widget-04 has-shadow">
                                        <!-- Begin Widget Header -->
                                        <!-- Leaflet -->
                                        <div class="widget widget-38 has-shadow">
                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                <h4>Lokasi Pelanggan DMA</h4>
                                            </div>
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <div class="col-lg-5">
                                                    <label for="dmalist" class="form-control-label">Pilih DMA:</label>
                                                    <select id="dmalist" class="custom-select form-control">
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-shadow" id="proseslist">Tampil Data</button>
                                                </div>
                                            </div>
                                            <div id="map-container" class="widget-body p-0">
                                                <div id="layer-control" style="height: 500px; width: 100%;"></div>
                                                <div id="search-container">
                                                    <input type="text" id="search-input" placeholder="nosamb">
                                                    <button id="search-button">Cari</button>
                                                </div>
                                            </div>
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
    <!-- Begin Page Snippets -->
    <script src="assets/js/dashboard/monitoring-dma.js"></script>
    <!-- End Page Snippets -->

    <!-- script bar -->
    <script>
        $(document).ready(function() {
            // Load DMA options and default data
            loadDmaOptionsAndData();

            // Function to load DMA options and default data
            function loadDmaOptionsAndData() {
                $.ajax({
                    url: "assets/data/monitoring-dma2.php",
                    method: "GET",
                    success: function(data) {
                        var dmaSelect = $('#dma');
                        var dmaOptions = [...new Set(data.map(item => item.dma))]; // Ambil DMA unik
                        dmaOptions.forEach(function(dma) {
                            dmaSelect.append($('<option>', {
                                value: dma,
                                text: dma
                            }));
                        });

                        // Select the first DMA option by default
                        var defaultDma = dmaOptions[0];
                        dmaSelect.val(defaultDma); // Set the selected value in the dropdown

                        // Fetch and display data for the default DMA
                        fetchData(defaultDma);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Function to fetch and display data
            function fetchData(selectedDma) {
                var selectedYear = $('#tahun').val().split('-')[0]; // Ambil tahun dari input type month

                $.ajax({
                    url: "assets/data/monitoring-dma2.php",
                    method: "GET",
                    data: {
                        dma: selectedDma,
                        tahun: selectedYear
                    },
                    success: function(response) {
                        var filteredData = response.filter(item => item.dma === selectedDma && new Date(item.periode).getFullYear() == selectedYear);

                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        var distribusiData = Array(12).fill(0);
                        var penjualanData = Array(12).fill(0);
                        var kehilanganData = Array(12).fill(0);
                        var persentaseData = Array(12).fill(0);
                        var barColors = Array(12).fill("#6aa84f");

                        filteredData.forEach(entry => {
                            var monthIndex = new Date(entry.periode).getMonth();
                            distribusiData[monthIndex] += parseFloat(entry.distribusi) || 0;
                            penjualanData[monthIndex] += parseFloat(entry.penjualan) || 0;
                            kehilanganData[monthIndex] += parseFloat(entry.kehilangan) || 0;
                            persentaseData[monthIndex] = parseFloat(entry.persentase) || 0;
                        });

                        for (var i = 0; i < 12; i++) {
                            if (distribusiData[i] > penjualanData[i]) {
                                barColors[i] = "#e06666";
                            }
                        }

                        if (myChart) {
                            myChart.destroy(); // Destroy the previous chart instance
                        }
                        var ctx = document.getElementById("orders").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'roundedBar',
                            data: {
                                labels: months,
                                datasets: [{
                                    label: 'Distribusi',
                                    data: distribusiData,
                                    borderColor: "#2c304d",
                                    backgroundColor: barColors,
                                    hoverBackgroundColor: barColors.map(color => {
                                        return color === "#e06666" ? "#cc0000" : "#38761d";
                                    })
                                }, {
                                    label: 'Penjualan',
                                    data: penjualanData,
                                    borderColor: "#2c304d",
                                    backgroundColor: barColors,
                                    hoverBackgroundColor: barColors.map(color => {
                                        return color === "#e06666" ? "#cc0000" : "#38761d";
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
                                        label: function(tooltipItem, data) {
                                            var index = tooltipItem.index;
                                            var distribusi = distribusiData[index].toLocaleString('de-DE');
                                            var penjualan = penjualanData[index].toLocaleString('de-DE');
                                            var persentase = persentaseData[index].toFixed(2).replace('.', ',') + '%';

                                            if (tooltipItem.datasetIndex === 0) {
                                                return 'Distribusi: ' + distribusi + ' m³\nPersentase: ' + persentase;
                                            } else {
                                                return 'Penjualan: ' + penjualan + ' m³\nPersentase: ' + persentase;
                                            }
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
                                            display: true
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

                        var lastIndex = distribusiData.length - 1;
                        while (lastIndex >= 0 && distribusiData[lastIndex] === 0 && penjualanData[lastIndex] === 0) {
                            lastIndex--;
                        }
                        var lastDistribusi = distribusiData[lastIndex];
                        var lastPenjualan = penjualanData[lastIndex];
                        var lastKehilangan = kehilanganData[lastIndex];
                        var lastPersentase = persentaseData[lastIndex];

                        $('.some-stats').eq(0).find('.number').text(lastDistribusi.toLocaleString('de-DE'));
                        $('.some-stats').eq(1).find('.number').text(lastPenjualan.toLocaleString('de-DE'));
                        $('.some-stats').eq(2).find('.number').text(lastKehilangan.toLocaleString('de-DE'));

                        $('.circle-orders').circleProgress({
                            value: lastPersentase / 100,
                            size: 120,
                            startAngle: -Math.PI / 2,
                            thickness: 6,
                            lineCap: 'round',
                            emptyFill: '#252946',
                            fill: {
                                gradient: ['#0087a4', '#08a6c3']
                            }
                        }).on('circle-animation-progress', function(event, progress) {
                            var percentValue = Math.round(lastPersentase * progress).toString().replace('.', ',');
                            $(this).find('.percent-orders').html(percentValue + '<i>%</i>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Event listener for fetching data on button click
            $('#proses').click(function() {
                var selectedDma = $('#dma').val();
                fetchData(selectedDma);
            });
        });
    </script>
    <!-- script map -->
    <script>
        var map;
        var markers = [];
        var infoWindow;

        function initMap() {
            var mapOptions = {
                center: {
                    lat: 0.932113,
                    lng: 104.479105
                },
                zoom: 13
            };

            map = new google.maps.Map(document.getElementById('layer-control'), mapOptions);
            infoWindow = new google.maps.InfoWindow();

            fetchDMAs();
            loadGeoJSON();
        }

        function loadGeoJSON() {
            $.getJSON("assets/data/get_geojson.php", function(geojsonData) {
                var geojsonLayer = new google.maps.Data({
                    map: map
                });
                geojsonLayer.addGeoJson(geojsonData);

                geojsonLayer.setStyle(function(feature) {
                    var sumber = feature.getProperty('sumber');
                    var fillColor = 'blue'; // Default fill color
                    var strokeColor = 'orange'; // Default stroke color

                    return {
                        strokeColor: strokeColor,
                        strokeWeight: 2,
                        strokeOpacity: 0.8,
                        fillColor: fillColor,
                        fillOpacity: 0.35
                    };
                });

                geojsonLayer.addListener('click', function(event) {
                    var contentString = `<b>Keterangan:</b> ${event.feature.getProperty('sumber')}`;
                    infoWindow.setContent(contentString);
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(map);
                });
            });
        }

        function fetchDMAs() {
            console.log("Fetching DMA data...");
            $.getJSON("assets/data/get-dma.php")
                .done(function(dmaData) {
                    console.log("DMA data received:", dmaData);
                    populateDMADropdown(dmaData);
                })
                .fail(function(jqxhr, textStatus, error) {
                    console.error("Request Failed: " + textStatus + ", " + error);
                });
        }

        function populateDMADropdown(dmaData) {
            if (dmaData.length === 0) {
                console.log("No DMA data found.");
                return;
            }

            $('#dmalist').empty(); // Clear the dropdown first
            dmaData.forEach(dma => {
                $('#dmalist').append(`<option value="${dma.kodedma}">${dma.nama_dma}</option>`);
            });
        }

        function displayMarkers(markerData) {
            // Clear existing markers
            markers.forEach(markerObj => markerObj.marker.setMap(null));
            markers = [];

            if (markerData.error) {
                console.error("Error fetching marker data: ", markerData.error);
                return;
            }

            markerData.forEach(marker => {
                var kodegol = convertKodeGol(marker.kodegol);

                var statusText = marker.status === '1' ? 'Aktif' : 'Non Aktif';
                var markerColor = marker.status === '1' ? 'blue' : 'red';

                var popupContent = `<b>${marker.nosamb}</b><br>
                <u>${marker.nama}</u><br>
                Alamat: ${marker.alamat}<br>
                Kode Gol: ${kodegol}<br>
                Merk Meter: ${marker.merkmeter}<br>
                Seri Meter: ${marker.serimeter}<br>
                Status: ${statusText}`;

                var infowindow = new google.maps.InfoWindow({
                    content: popupContent
                });

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
                        fillColor: markerColor,
                        fillOpacity: 0.8,
                        strokeColor: markerColor,
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

        function convertKodeGol(kodegol) {
            switch (kodegol) {
                case 'IA':
                    return 'SOSIAL UMUM';
                case 'IB':
                    return 'SOSIAL KHUSUS';
                case 'IIA':
                    return 'RUMAH TANGGA';
                case 'IIB':
                    return 'INSTANSI PEMERINTAH';
                case 'IIIA':
                    return 'NIAGA KECIL';
                case 'IIIB':
                    return 'NIAGA BESAR';
                case 'IV':
                    return 'INDUSTRI';
                case 'V':
                    return 'GOLONGAN KHUSUS';
                default:
                    return kodegol;
            }
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

            $('#proseslist').on('click', function() {
                var selectedDMA = $('#dmalist').val();
                console.log("Fetching marker data for DMA:", selectedDMA);
                $.getJSON(`assets/data/lokasi-pelanggan-dma.php?dma=${selectedDMA}`)
                    .done(function(markerData) {
                        console.log("Marker data received:", markerData);
                        displayMarkers(markerData);
                    })
                    .fail(function(jqxhr, textStatus, error) {
                        console.error("Request Failed: " + textStatus + ", " + error);
                    });
            });
        });
    </script>
</body>

</html>