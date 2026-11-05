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
                                <h2 class="page-header-title">Dashboard</h2>
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
                                <a class="nav-link active" id="i-base-tab-1" data-toggle="tab" href="#i-tab-1" role="tab" aria-controls="i-tab-1" aria-selected="true"><i class="ion-stats-bars mr-2"></i>Sei Pulai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="i-base-tab-2" data-toggle="tab" href="#i-tab-2" role="tab" aria-controls="i-tab-2" aria-selected="false"><i class="ion-stats-bars mr-2"></i>Sei Gesek</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="i-base-tab-3" data-toggle="tab" href="#i-tab-3" role="tab" aria-controls="i-tab-3" aria-selected="false"><i class="ion-stats-bars mr-2"></i>Sei Jago</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="i-base-tab-4" data-toggle="tab" href="#i-tab-4" role="tab" aria-controls="i-tab-4" aria-selected="false"><i class="ion-stats-bars mr-2"></i>Kolong Enam</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="i-tab-1" role="tabpanel" aria-labelledby="i-base-tab-1">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-4 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="produksi-stats align-self-center">
                                                        <div class="title text-twitter">Produksi / Bulan</div>
                                                        <div id="produksi-stats-spl">Loading...</div>
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
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="pump-stats align-self-center">
                                                        <div class="title text-twitter">Pompa Distribusi</div>
                                                        <div id="pump-stats-spl">Loading...</div>
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
                                                        <i class="ion-speedometer text-twitter"></i>
                                                    </div>
                                                    <div class="press-stats align-self-center">
                                                        <div class="title text-twitter">Tekanan</div>
                                                        <div id="press-stats-spl">Laoding...</div>
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
                                                    <h4>Peta Waduk</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-spl" style="height: 485px"></div>
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
                                                    <ul class="reviews list-group w-100" id="tma-list-spl">
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
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Kualitas Air</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="kualitas-air-list-spl">
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
                                                <h2>Proses Produksi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_WK.gif" alt="IPA WK">
                                                            <div class="alt-text">IPA WK</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_RPD.gif" alt="IPA RPD">
                                                            <div class="alt-text">IPA RPD</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_PSAB.gif" alt="IPA PSAB">
                                                            <div class="alt-text">IPA PSAB</div>
                                                        </div>
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_PCM.gif" alt="IPA PCM">
                                                            <div class="alt-text">IPA PCM</div>
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
                                    <div class="col-xl-4 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="produksi-stats align-self-center">
                                                        <div class="title text-twitter">Produksi / Bulan</div>
                                                        <div id="produksi-stats-gsk">Loading...</div>
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
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="pump-stats align-self-center">
                                                        <div class="title text-twitter">Pompa Distribusi</div>
                                                        <div id="pump-stats-gsk">Loading...</div>
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
                                                        <i class="ion-speedometer text-twitter"></i>
                                                    </div>
                                                    <div class="press-stats align-self-center">
                                                        <div class="title text-twitter">Tekanan</div>
                                                        <div id="press-stats-gsk">Laoding...</div>
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
                                                    <h4>Peta Waduk</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-gsk" style="height: 485px"></div>
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
                                                    <ul class="reviews list-group w-100" id="tma-list-gsk">
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
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Kualitas Air</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="kualitas-air-list-gsk">
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
                                                <h2>Proses Produksi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_GESEK.gif" alt="IPA GESEK">
                                                            <div class="alt-text">IPA GESEK</div>
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
                                    <div class="col-xl-4 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="produksi-stats align-self-center">
                                                        <div class="title text-twitter">Produksi / Bulan</div>
                                                        <div id="produksi-stats-sjg">Loading...</div>
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
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="pump-stats align-self-center">
                                                        <div class="title text-twitter">Pompa Distribusi</div>
                                                        <div id="pump-stats-sjg">Loading...</div>
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
                                                        <i class="ion-speedometer text-twitter"></i>
                                                    </div>
                                                    <div class="press-stats align-self-center">
                                                        <div class="title text-twitter">Tekanan</div>
                                                        <div id="press-stats-sjg">Laoding...</div>
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
                                                    <h4>Peta Waduk</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-sjg" style="height: 485px"></div>
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
                                                    <ul class="reviews list-group w-100" id="tma-list-sjg">
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
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Kualitas Air</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="kualitas-air-list-sjg">
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
                                                <h2>Proses Produksi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_JAGO.gif" alt="IPA SEI JAGO">
                                                            <div class="alt-text">IPA SEI JAGO</div>
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
                            <div class="tab-pane fade" id="i-tab-4" role="tabpanel" aria-labelledby="i-base-tab-4">
                                <!-- Begin Row -->
                                <div class="row flex-row">
                                    <!-- Begin Facebook -->
                                    <div class="col-xl-4 col-md-6 col-sm-6">
                                        <div class="widget widget-12 has-shadow">
                                            <div class="widget-body">
                                                <div class="media">
                                                    <div class="align-self-center ml-5 mr-5">
                                                        <i class="ion-waterdrop text-twitter"></i>
                                                    </div>
                                                    <div class="produksi-stats align-self-center">
                                                        <div class="title text-twitter">Produksi / Bulan</div>
                                                        <div id="produksi-stats-kle">Loading...</div>
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
                                                        <i class="ion-levels text-twitter"></i>
                                                    </div>
                                                    <div class="pump-stats align-self-center">
                                                        <div class="title text-twitter">Pompa Distribusi</div>
                                                        <div id="pump-stats-kle">Loading...</div>
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
                                                        <i class="ion-speedometer text-twitter"></i>
                                                    </div>
                                                    <div class="press-stats align-self-center">
                                                        <div class="title text-twitter">Tekanan</div>
                                                        <div id="press-stats-kle">Laoding...</div>
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
                                                    <h4>Peta Waduk</h4>
                                                </div>
                                                <div class="widget-body p-0">
                                                    <div id="layer-control-kle" style="height: 485px"></div>
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
                                                    <ul class="reviews list-group w-100" id="tma-list-kle">
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
                                <div class="row flex-row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- Begin Widget 08 -->
                                        <div class="widget widget-06 has-shadow">
                                            <!-- Begin Widget Header -->
                                            <div class="widget-header bordered d-flex align-items-center">
                                                <h2>Kualitas Air</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body p-0">
                                                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                                                    <ul class="reviews list-group w-100" id="kualitas-air-list-kle">
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
                                                <h2>Proses Produksi</h2>
                                            </div>
                                            <!-- End Widget Header -->
                                            <!-- Begin Widget Body -->
                                            <div class="widget-body no-padding">
                                                <div class="carousel-container">
                                                    <div class="carousel">
                                                        <div class="carousel-slide">
                                                            <img src="assets/img/gif/GIF_KOLONG_ENAM.gif" alt="IPA KOLONG ENAM">
                                                            <div class="alt-text">IPA KOLONG ENAM</div>
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
    <!-- script map -->
    <script>
        var maps = [];

        function initMap() {
            // Define map options for each map
            var mapOptions = {
                spl: {
                    center: {
                        lat: 0.9159961,
                        lng: 104.5476493
                    },
                    zoom: 15,
                    mapTypeId: 'satellite'
                },
                gsk: {
                    center: {
                        lat: 0.9759273,
                        lng: 104.5578789
                    },
                    zoom: 16,
                    mapTypeId: 'satellite'
                },
                kle: {
                    center: {
                        lat: 0.8478976,
                        lng: 104.5900005
                    },
                    zoom: 16,
                    mapTypeId: 'satellite'
                },
                sjg: {
                    center: {
                        lat: 1.0793128,
                        lng: 104.2490195
                    },
                    zoom: 16,
                    mapTypeId: 'satellite'
                }
            };

            // Initialize maps
            maps['spl'] = new google.maps.Map(document.getElementById('layer-control-spl'), mapOptions.spl);
            maps['gsk'] = new google.maps.Map(document.getElementById('layer-control-gsk'), mapOptions.gsk);
            maps['kle'] = new google.maps.Map(document.getElementById('layer-control-kle'), mapOptions.kle);
            maps['sjg'] = new google.maps.Map(document.getElementById('layer-control-sjg'), mapOptions.sjg);

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
    <!-- script pompa -->
    <script>
        function fetchPumpStatus() {
            $.ajax({
                url: 'assets/data/status-pompa.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status !== "No data") {
                        var wadukData = {
                            'Sei Pulai': '#pump-stats-spl',
                            'Sei Gesek': '#pump-stats-gsk',
                            'Sei Jago': '#pump-stats-sjg',
                            'Kolong Enam': '#pump-stats-kle'
                        };

                        // Clear previous data for all containers
                        Object.values(wadukData).forEach(selector => {
                            $(selector).empty();
                        });

                        response.forEach(function(pump) {
                            var statusText = pump.status === 'On' ? 'Running' : 'Stop';
                            var statusColor = pump.status === 'On' ? 'green' : 'red';
                            var pumpStatus = '<div class="number" style="color:' + statusColor + ';">' + pump.pompa + ': ' + statusText + '</div>';
                            if (wadukData[pump.waduk]) {
                                $(wadukData[pump.waduk]).append(pumpStatus);
                            }
                        });
                    } else {
                        Object.values(wadukData).forEach(selector => {
                            $(selector).html('<div class="number">No data</div>');
                        });
                    }
                },
                error: function() {
                    Object.values(wadukData).forEach(selector => {
                        $(selector).html('<div class="number">Error fetching status</div>');
                    });
                }
            });
        }

        $(document).ready(function() {
            fetchPumpStatus();
            setInterval(fetchPumpStatus, 5000); // Refresh status every 5 seconds
        });
    </script>
    <!-- script produksi -->
    <script>
        function fetchLatestData() {
            $.ajax({
                url: 'assets/data/produksi-bulan.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var wadukData = {
                        'Sei Pulai': '#produksi-stats-spl',
                        'Sei Gesek': '#produksi-stats-gsk',
                        'Sei Jago': '#produksi-stats-sjg',
                        'Kolong Enam': '#produksi-stats-kle'
                    };

                    // Clear previous data for all containers
                    Object.values(wadukData).forEach(selector => {
                        $(selector).empty();
                    });

                    Object.keys(wadukData).forEach(waduk => {
                        // Filter the data to include only entries for the current waduk
                        var filteredData = response.filter(entry => entry.waduk === waduk);

                        // Sort the filtered data by 'waktu' in descending order to get the latest entry
                        filteredData.sort((a, b) => new Date(b.waktu) - new Date(a.waktu));

                        if (filteredData.length > 0) {
                            var latestEntry = filteredData[0]; // Get the latest entry
                            var formattedData2 = new Intl.NumberFormat('de-DE').format(latestEntry.data2); // Format data2 with thousand separators
                            var produksiStatus = '<div class="number">' + formattedData2 + ' m³</div>';
                            $(wadukData[waduk]).append(produksiStatus);
                        } else {
                            $(wadukData[waduk]).html('<div class="number">No data</div>');
                        }
                    });
                },
                error: function() {
                    Object.values(wadukData).forEach(selector => {
                        $(selector).html('<div class="number">Error fetching data</div>');
                    });
                }
            });
        }

        $(document).ready(function() {
            fetchLatestData();
            setInterval(fetchLatestData, 5000); // Refresh data every 5 seconds
        });
    </script>
    <!-- script loger -->
    <script>
        function fetchPressStatus() {
            $.ajax({
                url: 'assets/data/status-loger.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var wadukData = {
                        'Sei Pulai': ['hdpe', 'pcm', 'wk'],
                        'Sei Gesek': ['gesek'],
                        'Sei Jago': ['sjg'],
                        'Kolong Enam': ['kle']
                    };

                    var containerData = {
                        'Sei Pulai': '#press-stats-spl',
                        'Sei Gesek': '#press-stats-gsk',
                        'Sei Jago': '#press-stats-sjg',
                        'Kolong Enam': '#press-stats-kle'
                    };

                    // Clear previous data for all containers
                    Object.values(containerData).forEach(selector => {
                        $(selector).empty();
                    });

                    Object.keys(wadukData).forEach(waduk => {
                        // Filter the response to include only the desired categories for the current waduk
                        var filteredResponse = response.filter(function(press) {
                            return wadukData[waduk].includes(press.NAME);
                        });

                        // Display the filtered data for the current waduk
                        if (filteredResponse.length > 0) {
                            filteredResponse.forEach(function(press) {
                                var pressStatus = '<div class="number">' + press.NAME + ': ' + press.pressure + ' bar' + '</div>';
                                $(containerData[waduk]).append(pressStatus);
                            });
                        } else {
                            $(containerData[waduk]).html('<a href="https://hmi-kepri.bimasaktisanjaya.com/hmi" class="link-button" target="_blank">SCADA HMI</a>');
                        }
                    });
                },
                error: function() {
                    Object.values(containerData).forEach(selector => {
                        $(selector).html('<div class="number">Error fetching status</div>');
                    });
                }
            });
        }

        $(document).ready(function() {
            fetchPressStatus();
            setInterval(fetchPressStatus, 5000); // Refresh status every 5 seconds
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
            function loadChartData(waduk, chartId) {
                $.ajax({
                    url: "assets/data/produksi-bulan.php",
                    method: "GET",
                    success: function(data) {
                        // Array of 12 months
                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                        // Initialize data arrays with 12 months with zero values
                        var data1Data = Array(12).fill(0);
                        var data2Data = Array(12).fill(0);
                        var data2Colors = Array(12).fill("#6aa84f"); // Default color for realisasi

                        // Filter data for the specific waduk
                        var filteredData = data.filter(entry => entry.waduk === waduk);

                        filteredData.forEach(entry => {
                            var monthIndex = new Date(entry.waktu).getMonth(); // Get the month index from the data
                            data1Data[monthIndex] = entry.data1;
                            data2Data[monthIndex] = entry.data2;

                            // Condition for realisasi bar color
                            if (entry.data2 < entry.data1) {
                                data2Colors[monthIndex] = "#e06666"; // Red
                            } else if (entry.data2 >= entry.data1) {
                                data2Colors[monthIndex] = "#6aa84f"; // Green
                            }
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
            loadChartData("Sei Pulai", "orders-spl");
            loadChartData("Sei Gesek", "orders-gsk");
            loadChartData("Sei Jago", "orders-sjg");
            loadChartData("Kolong Enam", "orders-kle");
        });
    </script>
    <!-- script tma -->
    <script>
        $(document).ready(function() {
            function loadTMA() {
                $.ajax({
                    url: 'assets/data/tma.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Function to update the UI for a specific reservoir
                        function updateTMAList(reservoir, elementId) {
                            let tmaList = $(elementId);
                            tmaList.empty();

                            // Filter data for the specific reservoir
                            let filteredData = data.filter(function(item) {
                                return item.waduk === reservoir;
                            });

                            // Update the UI with the filtered data
                            filteredData.forEach(function(item) {
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
                        }

                        // Update each reservoir's section
                        updateTMAList('Sei Pulai', '#tma-list-spl');
                        updateTMAList('Sei Gesek', '#tma-list-gsk');
                        updateTMAList('Sei Jago', '#tma-list-sjg');
                        updateTMAList('Kolong Enam', '#tma-list-kle');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Load data when the page is loaded
            loadTMA();

            // Load data every 5 minutes
            setInterval(loadTMA, 300000);
        });
    </script>
    <!-- script slide show -->
    <script>
        const carousel = document.querySelector('.carousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel img');
            const totalSlides = slides.length;
            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }
            const offset = -currentIndex * 100;
            carousel.style.transform = `translateX(${offset}%)`;
        }

        prevBtn.addEventListener('click', () => {
            showSlide(currentIndex - 1);
        });

        nextBtn.addEventListener('click', () => {
            showSlide(currentIndex + 1);
        });
    </script>
    <!-- script kualitas air -->
    <script>
        $(document).ready(function() {
            function loadKualitasair() {
                $.ajax({
                    url: 'assets/data/kualitas-air.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear previous data
                        $('#kualitas-air-list-spl').empty();
                        $('#kualitas-air-list-gsk').empty();
                        $('#kualitas-air-list-sjg').empty();
                        $('#kualitas-air-list-kle').empty();

                        // Function to append data to a specific list
                        function appendDataToList(listSelector, item) {
                            $(listSelector).append(
                                `<li class="list-group-item">
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <div class="username">
                                            <h4>${item.lokasi}</h4>
                                        </div>
                                        <div class="msg">
                                            <p><strong>Waktu:</strong> ${item.waktu}</p>
                                            <p><strong>Warna:</strong> ${item.warna} Pt/Co</p>
                                            <p><strong>Kekeruhan:</strong> ${item.kekeruhan} NTU</p>
                                            <p><strong>pH:</strong> ${item.ph}</p>
                                            <p><strong>TDS:</strong> ${item.tds} mg/L</p>
                                            <p><strong>Sisa Clorine:</strong> ${item.scl} mg/L</p>
                                        </div>
                                    </div>
                                </div>
                            </li>`
                            );
                        }

                        // Filter and append data to respective lists
                        data.forEach(function(item) {
                            if (item.waduk === "Sei Pulai") {
                                appendDataToList('#kualitas-air-list-spl', item);
                            } else if (item.waduk === "Sei Gesek") {
                                appendDataToList('#kualitas-air-list-gsk', item);
                            } else if (item.waduk === "Sei Jago") {
                                appendDataToList('#kualitas-air-list-sjg', item);
                            } else if (item.waduk === "Kolong Enam") {
                                appendDataToList('#kualitas-air-list-kle', item);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Load data when the page is loaded
            loadKualitasair();

            // Load data every 5 minutes
            setInterval(loadKualitasair, 300000);
        });
    </script>
</body>

</html>