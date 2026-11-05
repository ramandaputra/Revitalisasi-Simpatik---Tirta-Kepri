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
    <title>SIMPATIK V2.0 - Distribusi</title>
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
                    <span class="heading">Target x Realisasi</span>
                    <ul class="list-unstyled">
                        <li class="active"><a href="#tek" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>TEKNIK</span></a>
                            <ul id="tek" class="collapse list-unstyled show pt-0">
                                <li><a href="produksi.php">Produksi</a></li>
                                <li><a class="active" href="distribusi.php">Distribusi</a></li>
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
                                <h2 class="page-header-title">Distribusi</h2>
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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="i-base-tab-1" data-toggle="tab" href="#i-tab-1" role="tab" aria-controls="i-tab-1" aria-selected="true"><i class="ion-stats-bars mr-2"></i>Tanjungpinang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="i-base-tab-2" data-toggle="tab" href="#i-tab-2" role="tab" aria-controls="i-tab-2" aria-selected="false"><i class="ion-stats-bars mr-2"></i>Kijang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="i-base-tab-3" data-toggle="tab" href="#i-tab-3" role="tab" aria-controls="i-tab-3" aria-selected="false"><i class="ion-stats-bars mr-2"></i>Tanjung Uban</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="i-tab-1" role="tabpanel" aria-labelledby="i-base-tab-1">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="loger-stats align-self-center">
                                                        <div class="title text-twitter">Flow</div>
                                                        <div id="loger-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="distribusi-stats-tnj align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-stats-tnj">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                </div>
                                <!-- End Row -->
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-12 col-md-6">
                                        <!-- Begin Widget 09 -->
                                        <div class="widget widget-09 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header d-flex align-items-center">
                                                <h2>Grafik Target X Realisasi Distribusi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-12 no-padding">
                                                        <div>
                                                            <canvas id="orders-tnj"></canvas>
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
                                            <!-- Map -->
                                            <div class="widget widget-38 has-shadow">
                                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                                    <h4>Jaringan Distribusi Umum</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-tnj" style="height: 485px"></div>
                                                </div>
                                                <!-- End Map -->
                                            </div>
                                            <!-- End Widget Header -->
                                        </div>
                                        <!-- End Widget 04 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Tekanan</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="tekanan-air-list">
                                                        <!-- Data akan dimuat di sini oleh AJAX -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 08 -->
                                    </div>
                                    <div class="col-xl-9 col-md-6">
                                        <!-- Begin Widget 10 -->
                                        <div class="widget widget-10 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Grafik Flow </h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <canvas id="line-gesek"></canvas>
                                                            <div class="alt-text">JDU GESEK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-hdpe"></canvas>
                                                            <div class="alt-text">JDU HDPE</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-wk"></canvas>
                                                            <div class="alt-text">JDU WK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-pcm"></canvas>
                                                            <div class="alt-text">JDU PCM</div>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-controls">
                                                        <button id="prevBtn">&#10094;</button>
                                                        <button id="nextBtn">&#10095;</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 10 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
                            <div class="tab-pane fade" id="i-tab-2" role="tabpanel" aria-labelledby="i-base-tab-2">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="loger-stats align-self-center">
                                                        <div class="title text-twitter">Flow</div>
                                                        <div id="loger-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="distribusi-stats-kjg align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-stats-kjg">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                </div>
                                <!-- End Row -->
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-12 col-md-6">
                                        <!-- Begin Widget 09 -->
                                        <div class="widget widget-09 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header d-flex align-items-center">
                                                <h2>Grafik Target X Realisasi Distribusi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-12 no-padding">
                                                        <div>
                                                            <canvas id="orders-kjg"></canvas>
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
                                            <!-- Map -->
                                            <div class="widget widget-38 has-shadow">
                                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                                    <h4>Jaringan Distribusi Umum</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-kjg" style="height: 485px"></div>
                                                </div>
                                                <!-- End Map -->
                                            </div>
                                            <!-- End Widget Header -->
                                        </div>
                                        <!-- End Widget 04 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Tekanan</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="tekanan-air-list">
                                                        <!-- Data akan dimuat di sini oleh AJAX -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 08 -->
                                    </div>
                                    <div class="col-xl-9 col-md-6">
                                        <!-- Begin Widget 10 -->
                                        <div class="widget widget-10 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Grafik Flow </h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <canvas id="line-gesek"></canvas>
                                                            <div class="alt-text">JDU GESEK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-hdpe"></canvas>
                                                            <div class="alt-text">JDU HDPE</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-wk"></canvas>
                                                            <div class="alt-text">JDU WK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-pcm"></canvas>
                                                            <div class="alt-text">JDU PCM</div>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-controls">
                                                        <button id="prevBtn">&#10094;</button>
                                                        <button id="nextBtn">&#10095;</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 10 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
                            <div class="tab-pane fade" id="i-tab-3" role="tabpanel" aria-labelledby="i-base-tab-3">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="loger-stats align-self-center">
                                                        <div class="title text-twitter">Flow</div>
                                                        <div id="loger-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="distribusi-stats-tub align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-stats-tub">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                </div>
                                <!-- End Row -->
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-12 col-md-6">
                                        <!-- Begin Widget 09 -->
                                        <div class="widget widget-09 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header d-flex align-items-center">
                                                <h2>Grafik Target X Realisasi Distribusi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-12 no-padding">
                                                        <div>
                                                            <canvas id="orders-tub"></canvas>
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
                                            <!-- Map -->
                                            <div class="widget widget-38 has-shadow">
                                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                                    <h4>Jaringan Distribusi Umum</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-tub" style="height: 485px"></div>
                                                </div>
                                                <!-- End Map -->
                                            </div>
                                            <!-- End Widget Header -->
                                        </div>
                                        <!-- End Widget 04 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Tekanan</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="tekanan-air-list">
                                                        <!-- Data akan dimuat di sini oleh AJAX -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 08 -->
                                    </div>
                                    <div class="col-xl-9 col-md-6">
                                        <!-- Begin Widget 10 -->
                                        <div class="widget widget-10 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Grafik Flow </h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <canvas id="line-gesek"></canvas>
                                                            <div class="alt-text">JDU GESEK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-hdpe"></canvas>
                                                            <div class="alt-text">JDU HDPE</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-wk"></canvas>
                                                            <div class="alt-text">JDU WK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <canvas id="line-pcm"></canvas>
                                                            <div class="alt-text">JDU PCM</div>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-controls">
                                                        <button id="prevBtn">&#10094;</button>
                                                        <button id="nextBtn">&#10095;</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Widget Body -->
                                        </div>
                                        <!-- End Widget 10 -->
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
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
    <script src="assets/js/dashboard/distribusi.js"></script>
    <!-- End Page Snippets -->
    <!-- script map -->
    <script>
        var maps = [];

        function initMap() {
            // Define map options for each map
            var mapOptions = {
                tnj: {
                    center: {
                        lat: 0.932113,
                        lng: 104.479105
                    },
                    zoom: 13,
                    mapTypeId: 'satellite'
                },
                kjg: {
                    center: {
                        lat: 0.9759273,
                        lng: 104.5578789
                    },
                    zoom: 16,
                    mapTypeId: 'satellite'
                },
                tub: {
                    center: {
                        lat: 0.8478976,
                        lng: 104.5900005
                    },
                    zoom: 16,
                    mapTypeId: 'satellite'
                }
            };

            // Initialize maps
            maps['tnj'] = new google.maps.Map(document.getElementById('layer-control-tnj'), mapOptions.tnj);
            maps['kjg'] = new google.maps.Map(document.getElementById('layer-control-kjg'), mapOptions.kjg);
            maps['tub'] = new google.maps.Map(document.getElementById('layer-control-tub'), mapOptions.tub);

            // Load GeoJSON data and apply to all maps
            $.getJSON("assets/data/get_geojson.php", function(geojsonData) {
                Object.keys(maps).forEach(mapId => {
                    var geojsonLayer = new google.maps.Data({
                        map: maps[mapId]
                    });

                    geojsonLayer.setStyle({
                        strokeColor: 'orange',
                        strokeWeight: 2,
                        strokeOpacity: 0.8
                    });

                    geojsonLayer.addGeoJson(geojsonData);
                });
            });

            // Load marker data and apply to all maps
            $.getJSON("assets/data/get_markers.php", function(markerData) {
                Object.keys(maps).forEach(mapId => {
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

                        var circleRadius = calculateCircleRadius(marker.pressure);
                        var circleColor = marker.pressure >= 1 ? 'blue' : 'red';

                        var markerWithLabel = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(marker.latitude), parseFloat(marker.longitude)),
                            map: maps[mapId],
                            label: {
                                text: marker.name,
                                fontSize: '12px',
                            },
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: circleRadius,
                                fillColor: circleColor,
                                fillOpacity: 0.6,
                                strokeWeight: 0,
                            },
                        });

                        markerWithLabel.addListener('click', function() {
                            infowindow.open(maps[mapId], markerWithLabel);
                        });
                    });
                });
            });

            // Function to calculate circle radius based on pressure
            function calculateCircleRadius(pressure) {
                return Math.max(0, 12 - pressure);
            }
        }
    </script>
    <!-- script loger -->
    <script>
        function fetchFlowStatus() {
            $.ajax({
                url: 'assets/data/status-loger.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var container = $('#loger-stats');
                    container.empty(); // Clear previous data

                    if (response.length > 0) {
                        // Define the categories we want to display
                        var categories = ["hdpe", "pcm", "wk", "gesek"];

                        // Filter the response to include only the desired categories
                        var filteredResponse = response.filter(function(flow) {
                            return categories.includes(flow.NAME);
                        });

                        // Display the filtered data
                        filteredResponse.forEach(function(flow) {
                            var formattedFlow = flow.flow.replace(/\./g, ','); // Replace dot with comma
                            var flowStatus = '<div class="number">' + flow.NAME + ': ' + formattedFlow + ' m³/jam' + '</div>';
                            container.append(flowStatus);
                        });
                    } else {
                        container.html('<div class="number">No data</div>');
                    }
                },
                error: function() {
                    $('#loger-stats').html('<div class="number">Error fetching status</div>');
                }
            });
        }

        $(document).ready(function() {
            fetchFlowStatus();
            setInterval(fetchFlowStatus, 5000); // Refresh status every 5 seconds
        });
    </script>
    <!-- script distribusi -->
    <script>
        function fetchdistribusiStatus() {
            $.ajax({
                url: 'assets/data/distribusi-bulan.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var containerTNJ = $('#distribusi-stats-tnj');
                    var containerKJG = $('#distribusi-stats-kjg');
                    var containerTUB = $('#distribusi-stats-tub');

                    containerTNJ.empty(); // Clear previous data
                    containerKJG.empty(); // Clear previous data
                    containerTUB.empty(); // Clear previous data

                    if (response.length > 0) {
                        var latestDataTNJ = {};
                        var latestDataKJG = {};
                        var latestDataTUB = {};
                        var categoriesTNJ = ["HDPE", "RPD", "PCM", "WK", "GESEK"];
                        var categoriesKJG = ["KJG"];
                        var categoriesTUB = ["TUB"];

                        // Filter and find the latest entry for each category
                        response.forEach(function(distribusi) {
                            if (categoriesTNJ.includes(distribusi.jdu)) {
                                if (!latestDataTNJ[distribusi.jdu] || new Date(distribusi.waktu) > new Date(latestDataTNJ[distribusi.jdu].waktu)) {
                                    latestDataTNJ[distribusi.jdu] = distribusi;
                                }
                            } else if (categoriesKJG.includes(distribusi.jdu)) {
                                if (!latestDataKJG[distribusi.jdu] || new Date(distribusi.waktu) > new Date(latestDataKJG[distribusi.jdu].waktu)) {
                                    latestDataKJG[distribusi.jdu] = distribusi;
                                }
                            } else if (categoriesTUB.includes(distribusi.jdu)) {
                                if (!latestDataTUB[distribusi.jdu] || new Date(distribusi.waktu) > new Date(latestDataTUB[distribusi.jdu].waktu)) {
                                    latestDataTUB[distribusi.jdu] = distribusi;
                                }
                            }
                        });

                        // Append the latest data for TNJ categories
                        categoriesTNJ.sort().forEach(function(jdu) {
                            if (latestDataTNJ[jdu]) {
                                var formattedData = parseInt(latestDataTNJ[jdu].data2).toLocaleString('id-ID'); // Format number with thousands separator
                                var distribusiStatus = '<div class="number">' + jdu + ': ' + formattedData + ' m³' + '</div>';
                                containerTNJ.append(distribusiStatus);
                            }
                        });

                        // Append the latest data for KJG categories
                        categoriesKJG.forEach(function(jdu) {
                            if (latestDataKJG[jdu]) {
                                var formattedData = parseInt(latestDataKJG[jdu].data2).toLocaleString('id-ID'); // Format number with thousands separator
                                var distribusiStatus = '<div class="number">' + jdu + ': ' + formattedData + ' m³' + '</div>';
                                containerKJG.append(distribusiStatus);
                            }
                        });

                        // Append the latest data for TUB categories
                        categoriesTUB.forEach(function(jdu) {
                            if (latestDataTUB[jdu]) {
                                var formattedData = parseInt(latestDataTUB[jdu].data2).toLocaleString('id-ID'); // Format number with thousands separator
                                var distribusiStatus = '<div class="number">' + jdu + ': ' + formattedData + ' m³' + '</div>';
                                containerTUB.append(distribusiStatus);
                            }
                        });
                    } else {
                        containerTNJ.html('<div class="number">No data</div>');
                        containerKJG.html('<div class="number">No data</div>');
                        containerTUB.html('<div class="number">No data</div>');
                    }
                },
                error: function() {
                    $('#distribusi-stats-tnj').html('<div class="number">Error fetching status</div>');
                    $('#distribusi-stats-kjg').html('<div class="number">Error fetching status</div>');
                    $('#distribusi-stats-tub').html('<div class="number">Error fetching status</div>');
                }
            });
        }

        $(document).ready(function() {
            fetchdistribusiStatus();
            setInterval(fetchdistribusiStatus, 5000); // Refresh status every 5 seconds
        });
    </script>
    <!-- script tekanan air -->
    <script>
        $(document).ready(function() {
            function loadTekananSensor() {
                $.ajax({
                    url: 'assets/data/loger-tekanan.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let tekananList = $('#tekanan-air-list');
                        tekananList.empty();
                        data.forEach(function(item) {
                            let date = new Date(item.waktu);
                            let formattedDate = ("0" + date.getDate()).slice(-2) + "/" +
                                ("0" + (date.getMonth() + 1)).slice(-2) + "/" +
                                date.getFullYear() + " " +
                                ("0" + date.getHours()).slice(-2) + ":" +
                                ("0" + date.getMinutes()).slice(-2) + ":" +
                                ("0" + date.getSeconds()).slice(-2);
                            tekananList.append(
                                `<li class="list-group-item">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <div class="username">
                                        <h4>${item.NAME}</h4>
                                    </div>
                                    <div class="msg">
                                        <p><strong>Waktu:</strong> ${formattedDate}</p>
                                        <p><strong>Pressure:</strong> ${item.pressure} </p>
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
            loadTekananSensor();

            // Muat data setiap 5 menit
            setInterval(loadTekananSensor, 300000);
        });
    </script>
    <!-- script grafik flow -->
    <script>
        $(document).ready(function() {
            let slideIndex = 0;

            function showSlides(n) {
                let slides = $(".carousel-slide");
                if (n >= slides.length) {
                    slideIndex = 0;
                }
                if (n < 0) {
                    slideIndex = slides.length - 1;
                }
                $(".carousel").css("transform", "translateX(" + (-slideIndex * 100) + "%)");
            }

            $("#nextBtn").click(function() {
                slideIndex++;
                showSlides(slideIndex);
            });

            $("#prevBtn").click(function() {
                slideIndex--;
                showSlides(slideIndex);
            });

            function loadData() {
                $.ajax({
                    url: "assets/data/loger-flow.php",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        var sensorData = {
                            "sensor_gesek": [],
                            "sensor_hdpe": [],
                            "sensor_wk": [],
                            "sensor_pcm": []
                        };

                        data.forEach(entry => {
                            if (sensorData.hasOwnProperty(entry.NAME)) {
                                var time = new Date(entry.waktu);
                                var formattedTime = time.toLocaleDateString('en-GB') + ' ' + time.toLocaleTimeString('en-GB', {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                                sensorData[entry.NAME].push({
                                    time: formattedTime,
                                    flow: parseFloat(entry.flow)
                                });
                            }
                        });

                        function createChart(elementId, data) {
                            var ctx = document.getElementById(elementId).getContext('2d');
                            var times = data.map(entry => entry.time).reverse(); // Balikkan urutan waktu
                            var flows = data.map(entry => entry.flow).reverse(); // Balikkan urutan aliran

                            return new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: times,
                                    datasets: [{
                                        label: 'Flow',
                                        data: flows,
                                        borderColor: "#4A90E2",
                                        pointBackgroundColor: "#4A90E2",
                                        pointHoverBorderColor: "#4A90E2",
                                        pointHoverBackgroundColor: "#4A90E2",
                                        pointBorderColor: "#fff",
                                        pointBorderWidth: 3,
                                        pointRadius: 6,
                                        fill: true,
                                        backgroundColor: "transparent",
                                        borderWidth: 3
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
                                        xPadding: 10,
                                        displayColors: false,
                                        yPadding: 10,
                                        callbacks: {
                                            title: function(tooltipItem, data) {
                                                var index = tooltipItem[0].index;
                                                var time = data.labels[index];
                                                return time;
                                            },
                                            label: function(tooltipItem, data) {
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
                                        yAxes: [{
                                            ticks: {
                                                display: true,
                                                beginAtZero: true,
                                                callback: function(value) {
                                                    return value.toLocaleString() + ' m³'; // Format angka pada sumbu y
                                                }
                                            },
                                            gridLines: {
                                                drawBorder: true,
                                                display: true
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                                drawBorder: true,
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

                        createChart('line-gesek', sensorData['sensor_gesek']);
                        createChart('line-hdpe', sensorData['sensor_hdpe']);
                        createChart('line-wk', sensorData['sensor_wk']);
                        createChart('line-pcm', sensorData['sensor_pcm']);
                    },
                    error: function() {
                        console.log('Error fetching data');
                    }
                });
            }

            loadData();
            showSlides(slideIndex);
        });
    </script>
</body>

</html>