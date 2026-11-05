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
    <title>SIMPATIK V2.0 - Tingkat Kehilangan Air</title>
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
                        <li class="active"><a href="#tek" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>TEKNIK</span></a>
                            <ul id="tek" class="collapse list-unstyled show pt-0">
                                <li><a href="produksi.php">Produksi</a></li>
                                <li><a href="distribusi.php">Distribusi</a></li>
                                <li><a class="active" href="tingkat-kehilangan-air.php">Tingkat Kehilangan Air</a></li>
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
                                <h2 class="page-header-title">Tingkat Kehilangan Air</h2>
                                <div>
                                    <div class="page-header-tools">
                                        <a class="btn btn-gradient-01" href="mobile/">Dashboard</a>
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
                                    <div class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="distribusi-tnj-stats align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-tnj-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tnj-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tnj-stats align-self-center">
                                                        <div class="title text-twitter">Air Terjual</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tnj-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tnj-stats align-self-center">
                                                        <div class="title text-twitter">Kehilangan Air</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tnj-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tnj-stats align-self-center">
                                                        <div class="title text-twitter">Persentase</div>
                                                        <div class="number">Loading...</div>
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
                                                <h2>Grafik Tingkat Kehilangan Air</h2>
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
                            </div>
                            <div class="tab-pane fade" id="i-tab-2" role="tabpanel" aria-labelledby="i-base-tab-2">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="distribusi-kjg-stats align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-kjg-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div id="some-kjg-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-kjg-stats align-self-center">
                                                        <div class="title text-twitter">Air Terjual</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-kjg-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-kjg-stats align-self-center">
                                                        <div class="title text-twitter">Kehilangan Air</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-kjg-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-kjg-stats align-self-center">
                                                        <div class="title text-twitter">Persentase</div>
                                                        <div class="number">Loading...</div>
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
                                                <h2>Grafik Tingkat Kehilangan Air</h2>
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
                            </div>
                            <div class="tab-pane fade" id="i-tab-3" role="tabpanel" aria-labelledby="i-base-tab-3">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="distribusi-tub-stats align-self-center">
                                                        <div class="title text-twitter">Distribusi</div>
                                                        <div id="distribusi-tub-stats">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Facebook -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tub-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tub-stats align-self-center">
                                                        <div class="title text-twitter">Air Terjual</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tub-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tub-stats align-self-center">
                                                        <div class="title text-twitter">Kehilangan Air</div>
                                                        <div class="number">Loading...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Twitter -->
                                    <!-- Begin Twitter -->
                                    <div id="some-tub-stats" class="col-xl-3 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="some-tub-stats align-self-center">
                                                        <div class="title text-twitter">Persentase</div>
                                                        <div class="number">Loading...</div>
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
                                                <h2>Grafik Tingkat Kehilangan Air</h2>
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
    <!-- End Page Vendor Js -->
    <!-- End Page Snippets -->

    <!-- script distribusi -->
    <script>
        function fetchdistribusiStatus() {
            $.ajax({
                url: 'assets/data/distribusi-bulan.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var tnjContainer = $('#distribusi-tnj-stats');
                    var kjgContainer = $('#distribusi-kjg-stats');
                    var tubContainer = $('#distribusi-tub-stats');
                    tnjContainer.empty(); // Clear previous data
                    kjgContainer.empty(); // Clear previous data
                    tubContainer.empty(); // Clear previous data

                    if (response.length > 0) {
                        var latestData = {};
                        var tnjCategories = ["HDPE", "RPD", "PCM", "WK", "GESEK"];
                        var kjgCategory = "KJG";
                        var tubCategory = "TUB";

                        // Filter and find the latest entry for each category
                        response.forEach(function(distribusi) {
                            if (tnjCategories.includes(distribusi.jdu) || distribusi.jdu === kjgCategory || distribusi.jdu === tubCategory) {
                                if (!latestData[distribusi.jdu] || new Date(distribusi.waktu) > new Date(latestData[distribusi.jdu].waktu)) {
                                    latestData[distribusi.jdu] = distribusi;
                                }
                            }
                        });

                        // Sort and append data to respective containers
                        tnjCategories.sort().forEach(function(jdu) {
                            if (latestData[jdu]) {
                                var formattedData = parseInt(latestData[jdu].data2).toLocaleString('id-ID'); // Format number with thousands separator
                                var distribusiStatus = '<div class="number">' + latestData[jdu].jdu + ': ' + formattedData + ' m³' + '</div>';
                                tnjContainer.append(distribusiStatus);
                            }
                        });

                        if (latestData[kjgCategory]) {
                            var formattedKjgData = parseInt(latestData[kjgCategory].data2).toLocaleString('id-ID'); // Format number with thousands separator
                            var kjgStatus = '<div class="number">' + latestData[kjgCategory].jdu + ': ' + formattedKjgData + ' m³' + '</div>';
                            kjgContainer.append(kjgStatus);
                        }

                        if (latestData[tubCategory]) {
                            var formattedTubData = parseInt(latestData[tubCategory].data2).toLocaleString('id-ID'); // Format number with thousands separator
                            var tubStatus = '<div class="number">' + latestData[tubCategory].jdu + ': ' + formattedTubData + ' m³' + '</div>';
                            tubContainer.append(tubStatus);
                        }
                    } else {
                        tnjContainer.html('<div class="number">No data</div>');
                        kjgContainer.html('<div class="number">No data</div>');
                        tubContainer.html('<div class="number">No data</div>');
                    }
                },
                error: function() {
                    $('#distribusi-tnj-stats').html('<div class="number">Error fetching status</div>');
                    $('#distribusi-kjg-stats').html('<div class="number">Error fetching status</div>');
                    $('#distribusi-tub-stats').html('<div class="number">Error fetching status</div>');
                }
            });
        }

        $(document).ready(function() {
            fetchdistribusiStatus();
            setInterval(fetchdistribusiStatus, 5000); // Refresh status every 5 seconds
        });
    </script>
    <!-- script penjualan dan kehilangan -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'assets/data/tingkat-kehilangan-air-now.php',
                method: 'GET',
                dataType: 'json', // Ensure the response is treated as JSON
                success: function(response) {
                    // Container untuk hasil
                    var tnjData1Html = "";
                    var tnjData2Html = "";
                    var tnjData3Html = "";
                    var kjgData1Html = "";
                    var kjgData2Html = "";
                    var kjgData3Html = "";
                    var tubData1Html = "";
                    var tubData2Html = "";
                    var tubData3Html = "";

                    // Iterasi melalui data yang diterima
                    response.forEach(function(item) {
                        var data1Html = '<div>' + item.jdu + ': ' + Number(item.data1).toLocaleString('id-ID') + ' m³</div>';
                        var data2Html = '<div>' + item.jdu + ': ' + Number(item.data2).toLocaleString('id-ID') + ' m³</div>';
                        var data3Html = '<div>' + item.jdu + ': ' + parseFloat(item.data3).toFixed(2).replace('.', ',') + ' %</div>';

                        if (['GESEK', 'HDPE', 'PCM', 'RPD', 'WK'].includes(item.jdu)) {
                            tnjData1Html += data1Html;
                            tnjData2Html += data2Html;
                            tnjData3Html += data3Html;
                        } else if (item.jdu === 'KJG') {
                            kjgData1Html += data1Html;
                            kjgData2Html += data2Html;
                            kjgData3Html += data3Html;
                        } else if (item.jdu === 'TUB') {
                            tubData1Html += data1Html;
                            tubData2Html += data2Html;
                            tubData3Html += data3Html;
                        }
                    });

                    // Tampilkan hasil di elemen yang sesuai
                    $('#some-tnj-stats .number').eq(0).html(tnjData1Html);
                    $('#some-tnj-stats .number').eq(1).html(tnjData2Html);
                    $('#some-tnj-stats .number').eq(2).html(tnjData3Html);
                    $('#some-kjg-stats .number').eq(0).html(kjgData1Html);
                    $('#some-kjg-stats .number').eq(1).html(kjgData2Html);
                    $('#some-kjg-stats .number').eq(2).html(kjgData3Html);
                    $('#some-tub-stats .number').eq(0).html(tubData1Html);
                    $('#some-tub-stats .number').eq(1).html(tubData2Html);
                    $('#some-tub-stats .number').eq(2).html(tubData3Html);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    <!-- script grafik target x realisasi -->
    <script>
        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
        };

        Chart.helpers.drawRoundedTopRectangle = function(ctx, x, y, width, height, radius) {
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
            draw: function() {
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

        $(document).ready(function() {
            function loadChartData(wil, chartId) {
                $.ajax({
                    url: "assets/data/tingkat-kehilangan-air.php",
                    method: "GET",
                    success: function(data) {
                        // Array of 12 months
                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                        // Initialize data arrays with 12 months with zero values
                        var data1Data = Array(12).fill(0);
                        var data2Data = Array(12).fill(0);
                        var data2Colors = Array(12).fill("#6aa84f"); // Default color for realisasi

                        // Filter data for the specific
                        wil.forEach(wilayah => {
                            var filteredData = data.filter(entry => entry.wilayah === wilayah);

                            filteredData.forEach(entry => {
                                var monthIndex = new Date(entry.waktu).getMonth(); // Get the month index from the data
                                data1Data[monthIndex] += parseInt(entry.data1);
                                data2Data[monthIndex] += parseInt(entry.data2);

                                // Condition for realisasi bar color
                                if (parseInt(entry.data2) > parseInt(entry.data1)) {
                                    data2Colors[monthIndex] = "#e06666"; // Red
                                } else if (parseInt(entry.data2) <= parseInt(entry.data1)) {
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
                                        label: function(tooltipItem, data) {
                                            return tooltipItem.yLabel.toLocaleString() + ' %';
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
            loadChartData(["TNJ"], "orders-tnj"); // Combined data for Sei Pulai and Sei Gesek
            loadChartData(["KJG"], "orders-kjg");
            loadChartData(["TUB"], "orders-tub");
        });
    </script>

</body>

</html>