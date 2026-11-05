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
    <title>SIMPATIK V2.0 - Produksi Posting</title>
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .devices-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            /* Space between items */
        }

        .item {
            flex: 1 1 calc(25% - 15px);
            /* Adjust the percentage for the number of items per row */
            box-sizing: border-box;
            margin-bottom: 15px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .devices-item {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .devices-item i {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .room {
            font-size: 16px;
            font-weight: bold;
        }

        .img-fluid {
            width: 100%;
            height: auto;
            object-fit: cover;
            /* Ensure the image covers the area without stretching */
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        @media (max-width: 1200px) {
            .item {
                flex: 1 1 calc(33.33% - 15px);
                /* 3 items per row */
            }
        }

        @media (max-width: 768px) {
            .item {
                flex: 1 1 calc(50% - 15px);
                /* 2 items per row */
            }
        }

        @media (max-width: 576px) {
            .item {
                flex: 1 1 100%;
                /* 1 item per row */
            }
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
                            <li class="active"><a href="#produksi-input" aria-expanded="true" data-toggle="collapse"><i class="la la-file-text"></i><span>TEKNIK</span></a>
                                <ul id="produksi-input" class="collapse list-unstyled show pt-0">
                                    <li><a class="active" href="produksi-input.php">Produksi</a></li>
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
                                <h2 class="page-header-title">Produksi Posting</h2>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="row flex-row">
                        <div class="col-xl-12">
                            <!-- Form -->
                            <div class="widget has-shadow">
                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Posting Data</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="row flex-row justify-content-center">
                                        <div class="col-xl-10">
                                            <div id="rootwizard">
                                                <div class="step-container">
                                                    <div class="step-wizard">
                                                        <div class="progress">
                                                            <div class="progressbar"></div>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <a href="#tab1" data-toggle="tab">
                                                                    <span class="step">1</span>
                                                                    <span class="title">Jurnal Produksi</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab2" data-toggle="tab">
                                                                    <span class="step">2</span>
                                                                    <span class="title">Kualitas Air</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab3" data-toggle="tab">
                                                                    <span class="step">3</span>
                                                                    <span class="title">Posting Realisasi</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane" id="tab1">
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Jurnal Produksi</h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="widget no-bg">
                                                                    <div class="widget-body pt-0">
                                                                        <div class="devices-container d-flex flex-wrap justify-content-center">
                                                                            <div class="item" data-toggle="modal" data-target="#seipulai">
                                                                                <div class="devices-item d-flex justify-content-center align-items-center">
                                                                                    <i class="la la-industry"></i>
                                                                                    <div class="room">IPA Sei Pulai</div>
                                                                                </div>
                                                                                <img class="img-fluid" src="assets/img/waduk.png" alt="...">
                                                                            </div>
                                                                            <div class="item" data-toggle="modal" data-target="#seigesek">
                                                                                <div class="devices-item d-flex justify-content-center align-items-center">
                                                                                    <i class="la la-industry"></i>
                                                                                    <div class="room">IPA Sei Gesek</div>
                                                                                </div>
                                                                                <img class="img-fluid" src="assets/img/waduk.png" alt="...">
                                                                            </div>
                                                                            <div class="item" data-toggle="modal" data-target="#kolongenam">
                                                                                <div class="devices-item d-flex justify-content-center align-items-center">
                                                                                    <i class="la la-industry"></i>
                                                                                    <div class="room">IPA Kolong Enam</div>
                                                                                </div>
                                                                                <img class="img-fluid" src="assets/img/waduk.png" alt="...">
                                                                            </div>
                                                                            <div class="item" data-toggle="modal" data-target="#seijago">
                                                                                <div class="devices-item d-flex justify-content-center align-items-center">
                                                                                    <i class="la la-industry"></i>
                                                                                    <div class="room">IPA Sei Jago</div>
                                                                                </div>
                                                                                <img class="img-fluid" src="assets/img/waduk.png" alt="...">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Row -->
                                                        <ul class="pager wizard text-right">
                                                            <li class="previous d-inline-block">
                                                                <a href="javascript:;" class="btn btn-secondary ripple">Previous</a>
                                                            </li>
                                                            <li class="next d-inline-block">
                                                                <a href="javascript:;" class="btn btn-gradient-01">Next</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Kualitas Air</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Periode<span class="text-danger ml-2">*</span></label>
                                                                <input type="datetime-local" id="periode" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Lokasi<span class="text-danger ml-2">*</span></label>
                                                                <select id="sampel" class="custom-select form-control">
                                                                    <option value="Air Baku Sei Pulai">Air Baku Sei Pulai</option>
                                                                    <option value="Air Baku Sei Gesek">Air Baku Sei Gesek</option>
                                                                    <option value="Air Baku Kolong Enam">Air Baku Kolong Enam</option>
                                                                    <option value="Air Baku Sei Jago">Air Baku Sei Jago</option>
                                                                    <option value="Pengolahan Air RPD">Pengolahan Air RPD</option>
                                                                    <option value="Pengolahan Air PCM">Pengolahan Air PCM</option>
                                                                    <option value="Pengolahan Air WK">Pengolahan Air WK</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-6 mb-5">
                                                                <label class="form-control-label">Warna<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="warna" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Kekeruhan<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="kekeruhan" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Total Dissolved Solids<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="tds" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">pH<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="ph" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Sisa Clorine<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="scl" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData1">Posting Data</a>
                                                            </div>
                                                        </div>
                                                        <ul class="pager wizard text-right">
                                                            <li class="previous d-inline-block">
                                                                <a href="javascript:;" class="btn btn-secondary ripple">Previous</a>
                                                            </li>
                                                            <li class="next d-inline-block">
                                                                <a href="javascript:;" class="btn btn-gradient-01">Next</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Produksi</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Periode<span class="text-danger ml-2">*</span></label>
                                                                <input type="month" id="periode2" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">IPA<span class="text-danger ml-2">*</span></label>
                                                                <select id="ipa" class="custom-select form-control">
                                                                    <option value="Sei Pulai">Sei Pulai</option>
                                                                    <option value="Sei Gesek">Sei Gesek</option>
                                                                    <option value="Kolong Enam">Kolong Enam</option>
                                                                    <option value="Sei Jago">Sei Jago</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="form-control-label">Target<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="target" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Realisasi Produksi<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="realisasi" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData2">Posting Data</a>
                                                            </div>
                                                        </div>
                                                        <ul class="pager wizard text-right">
                                                            <li class="previous d-inline-block">
                                                                <a href="javascript:void(0)" class="btn btn-secondary ripple">Previous</a>
                                                            </li>
                                                            <li class="next d-inline-block">
                                                                <a href="javascript:void(0)" class="finish btn btn-gradient-01" data-toggle="modal">Finish</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Container -->
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
    <!-- Begin SeiPulai Modal -->
    <div id="seipulai" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content room-details">
                <div class="modal-header border-0">
                    <h3 class="modal-title"><i class="la la-save la-2x align-middle pr-2"></i>IPA Sei Pulai</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Waktu<span class="text-danger ml-2"></span></label>
                        <input type="datetime-local" id="waktu-seipulai" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Tinggi Muka Air<span class="text-danger ml-2"></span></label>
                        <input type="text" id="tma-seipulai" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Listrik</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="listrik-seipulai" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi PSAB</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="psab" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi PCM</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="pcm" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi RPD</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="rpd" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi HDPE</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="hdpe" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-gradient-01" data-dismiss="modal" onclick="simpanPerubahanpulai()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sei Pulai Modal -->
    <!-- Begin Sei Gesek Modal -->
    <div id="seigesek" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content room-details">
                <div class="modal-header border-0">
                    <h3 class="modal-title"><i class="la la-save la-2x align-middle pr-2"></i>IPA Sei Gesek</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Waktu<span class="text-danger ml-2"></span></label>
                        <input type="datetime-local" id="waktu-seigesek" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Tinggi Muka Air<span class="text-danger ml-2"></span></label>
                        <input type="text" id="tma-seigesek" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Listrik</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="listrik-seigesek" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi GESEK</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="gesek" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-gradient-01" data-dismiss="modal" onclick="simpanPerubahangesek()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sei Gesek Modal -->
    <!-- Begin Kolong Enam Modal -->
    <div id="kolongenam" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content room-details">
                <div class="modal-header border-0">
                    <h3 class="modal-title"><i class="la la-save la-2x align-middle pr-2"></i>IPA Kolong Enam</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Waktu<span class="text-danger ml-2"></span></label>
                        <input type="datetime-local" id="waktu-kolongenam" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Tinggi Muka Air<span class="text-danger ml-2"></span></label>
                        <input type="text" id="tma-kolongenam" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Listrik</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="listrik-kolongenam" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi Zona 1</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="kjg_zona_1" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi Zona 2</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="kjg_zona_2" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-gradient-01" data-dismiss="modal" onclick="simpanPerubahankolongenam()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Kolong Enam Modal -->
    <!-- Begin Sei Jago Modal -->
    <div id="seijago" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content room-details">
                <div class="modal-header border-0">
                    <h3 class="modal-title"><i class="la la-save la-2x align-middle pr-2"></i>IPA Sei Jago</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Waktu<span class="text-danger ml-2"></span></label>
                        <input type="datetime-local" id="waktu-seijago" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-control-label">Tinggi Muka Air<span class="text-danger ml-2"></span></label>
                        <input type="text" id="tma-seijago" class="form-control">
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Listrik</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="listrik-seijago" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi Zona 1</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="tub_zona_1" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="em-separator separator-dashed"></div>
                    <div class="row global-room-info align-items-center">
                        <div class="col-xl-6">
                            <div class="title">Pompa Distribusi Zona 2</div>
                        </div>
                        <div class="col-xl-6 text-right">
                            <label class="mb-0">
                                <input id="tub_zona_2" class="toggle-checkbox-sm" type="checkbox">
                                <span>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-gradient-01" data-dismiss="modal" onclick="simpanPerubahanjago()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sei Jago Modal -->
    <!-- Begin Vendor Js -->
    <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/jquery.ui.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
    <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/js/progress/circle-progress.min.js"></script>
    <script src="assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/components/wizard/form-wizard.min.js"></script>
    <!-- End Page Snippets -->
    <!-- script sei pulai -->
    <script>
        function simpanPerubahanpulai() {
            const waktu = document.getElementById('waktu-seipulai').value;
            const tma = document.getElementById('tma-seipulai').value;
            const listrik = document.getElementById('listrik-seipulai').checked ? 'On' : 'Off';
            const psab = document.getElementById('psab').checked ? 'On' : 'Off';
            const pcm = document.getElementById('pcm').checked ? 'On' : 'Off';
            const rpd = document.getElementById('rpd').checked ? 'On' : 'Off';
            const hdpe = document.getElementById('hdpe').checked ? 'On' : 'Off';

            const data = {
                waktu: waktu,
                tma: tma,
                listrik: listrik,
                psab: psab,
                pcm: pcm,
                rpd: rpd,
                hdpe: hdpe
            };

            console.log('Sending data:', data); // Log data to be sent

            fetch('assets/data/save-data/seipulai-status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log('Server response:', responseData); // Log server response
                    if (responseData.success) {
                        alert('Data berhasil disimpan!');
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                    alert('Terjadi kesalahan saat menyimpan data!');
                });
        }

        function getCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hour = ('0' + now.getHours()).slice(-2);
            var minute = ('0' + now.getMinutes()).slice(-2);
            var datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
            return datetime;
        }

        // Set nilai default untuk input datetime-local
        $('#waktu-seipulai').val(getCurrentDateTime());

        function fetchSeipulaiStatus() {
            fetch('assets/data/get-data/seipulai-status.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched data:', data); // Log fetched data
                    document.getElementById('listrik-seipulai').checked = data.listrik === 'On';
                    document.getElementById('psab').checked = data.PSAB === 'On';
                    document.getElementById('pcm').checked = data.PCM === 'On';
                    document.getElementById('rpd').checked = data.RPD === 'On';
                    document.getElementById('hdpe').checked = data.HDPE === 'On';
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                });
        }

        // Trigger fetching status when modal is shown
        $('#seipulai').on('shown.bs.modal', function() {
            fetchSeipulaiStatus();
        });
    </script>
    <!-- script sei gesek -->
    <script>
        function simpanPerubahangesek() {
            const waktu = document.getElementById('waktu-seigesek').value;
            const tma = document.getElementById('tma-seigesek').value;
            const listrik = document.getElementById('listrik-seigesek').checked ? 'On' : 'Off';
            const gesek = document.getElementById('gesek').checked ? 'On' : 'Off';

            const data = {
                waktu: waktu,
                tma: tma,
                listrik: listrik,
                gesek: gesek
            };

            console.log('Sending data:', data); // Log data to be sent

            fetch('assets/data/save-data/seigesek-status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log('Server response:', responseData); // Log server response
                    if (responseData.success) {
                        alert('Data berhasil disimpan!');
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                    alert('Terjadi kesalahan saat menyimpan data!');
                });
        }

        function getCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hour = ('0' + now.getHours()).slice(-2);
            var minute = ('0' + now.getMinutes()).slice(-2);
            var datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
            return datetime;
        }

        // Set nilai default untuk input datetime-local
        $('#waktu-seigesek').val(getCurrentDateTime());

        function fetchSeigesekStatus() {
            fetch('assets/data/get-data/seigesek-status.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched data:', data); // Log fetched data
                    document.getElementById('listrik-seigesek').checked = data.listrik === 'On';
                    document.getElementById('gesek').checked = data.GESEK === 'On';
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                });
        }

        // Trigger fetching status when modal is shown
        $('#seigesek').on('shown.bs.modal', function() {
            fetchSeigesekStatus();
        });
    </script>
    <!-- script Kolong Enam -->
    <script>
        function simpanPerubahankolongenam() {
            const waktu = document.getElementById('waktu-kolongenam').value;
            const tma = document.getElementById('tma-kolongenam').value;
            const listrik = document.getElementById('listrik-kolongenam').checked ? 'On' : 'Off';
            const kjg_zona_1 = document.getElementById('kjg_zona_1').checked ? 'On' : 'Off';
            const kjg_zona_2 = document.getElementById('kjg_zona_2').checked ? 'On' : 'Off';

            const data = {
                waktu: waktu,
                tma: tma,
                listrik: listrik,
                kjg_zona_1: kjg_zona_1,
                kjg_zona_2: kjg_zona_2
            };

            console.log('Sending data:', data); // Log data to be sent

            fetch('assets/data/save-data/kolongenam-status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log('Server response:', responseData); // Log server response
                    if (responseData.success) {
                        alert('Data berhasil disimpan!');
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                    alert('Terjadi kesalahan saat menyimpan data!');
                });
        }

        function getCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hour = ('0' + now.getHours()).slice(-2);
            var minute = ('0' + now.getMinutes()).slice(-2);
            var datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
            return datetime;
        }

        // Set nilai default untuk input datetime-local
        $('#waktu-kolongenam').val(getCurrentDateTime());

        function fetchKolongenamStatus() {
            fetch('assets/data/get-data/kolongenam-status.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched data:', data); // Log fetched data
                    document.getElementById('listrik-kolongenam').checked = data.listrik === 'On';
                    document.getElementById('kjg_zona_1').checked = data.KJG_ZONA_1 === 'On';
                    document.getElementById('kjg_zona_2').checked = data.KJG_ZONA_2 === 'On';
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                });
        }

        // Trigger fetching status when modal is shown
        $('#kolongenam').on('shown.bs.modal', function() {
            fetchKolongenamStatus();
        });
    </script>
    <!-- script Sei Jago -->
    <script>
        function simpanPerubahanjago() {
            const waktu = document.getElementById('waktu-seijago').value;
            const tma = document.getElementById('tma-seijago').value;
            const listrik = document.getElementById('listrik-seijago').checked ? 'On' : 'Off';
            const tub_zona_1 = document.getElementById('tub_zona_1').checked ? 'On' : 'Off';
            const tub_zona_2 = document.getElementById('tub_zona_2').checked ? 'On' : 'Off';

            const data = {
                waktu: waktu,
                tma: tma,
                listrik: listrik,
                tub_zona_1: tub_zona_1,
                tub_zona_2: tub_zona_2
            };

            console.log('Sending data:', data); // Log data to be sent

            fetch('assets/data/save-data/seijago-status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log('Server response:', responseData); // Log server response
                    if (responseData.success) {
                        alert('Data berhasil disimpan!');
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                    alert('Terjadi kesalahan saat menyimpan data!');
                });
        }

        function getCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hour = ('0' + now.getHours()).slice(-2);
            var minute = ('0' + now.getMinutes()).slice(-2);
            var datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
            return datetime;
        }

        // Set nilai default untuk input datetime-local
        $('#waktu-seijago').val(getCurrentDateTime());

        function fetchSeijagoStatus() {
            fetch('assets/data/get-data/seijago-status.php')
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched data:', data); // Log fetched data
                    document.getElementById('listrik-seijago').checked = data.listrik === 'On';
                    document.getElementById('tub_zona_1').checked = data.TUB_ZONA_1 === 'On';
                    document.getElementById('tub_zona_2').checked = data.TUB_ZONA_2 === 'On';
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                });
        }

        // Trigger fetching status when modal is shown
        $('#seijago').on('shown.bs.modal', function() {
            fetchSeijagoStatus();
        });
    </script>
    <!-- script Kualtas Air -->
    <script>
        $(document).ready(function() {
            // Fungsi untuk mendapatkan tanggal dan waktu saat ini
            function getCurrentDateTime() {
                var now = new Date();
                var year = now.getFullYear();
                var month = ('0' + (now.getMonth() + 1)).slice(-2);
                var day = ('0' + now.getDate()).slice(-2);
                var hour = ('0' + now.getHours()).slice(-2);
                var minute = ('0' + now.getMinutes()).slice(-2);
                var datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
                return datetime;
            }

            // Set nilai default untuk input datetime-local
            $('#periode').val(getCurrentDateTime());

            // Handle klik pada tombol "Posting Data"
            $('#postingData1').click(function(e) {
                e.preventDefault();

                // Ambil nilai dari setiap input
                var periode = $('#periode').val();
                var lokasi = $('#sampel').val();
                var warna = $('#warna').val();
                var kekeruhan = $('#kekeruhan').val();
                var tds = $('#tds').val();
                var ph = $('#ph').val();
                var scl = $('#scl').val();

                $.ajax({
                    url: 'assets/data/save-data/kualitas-air-input.php',
                    method: 'POST',
                    data: {
                        periode: periode,
                        lokasi: lokasi,
                        warna: warna,
                        kekeruhan: kekeruhan,
                        tds: tds,
                        ph: ph,
                        scl: scl
                    },
                    success: function(response) {
                        console.log('Data berhasil disimpan:', response);
                        // Tampilkan pesan sukses
                        alert('Data berhasil disimpan');
                        // Kosongkan kembali kolom formulir
                        $('#periode').val(getCurrentDateTime());
                        $('#sampel').val('');
                        $('#warna').val('');
                        $('#kekeruhan').val('');
                        $('#tds').val('');
                        $('#ph').val('');
                        $('#scl').val('');
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            });
        });
    </script>
    <!-- script Posting Produksi-->
    <script>
        $(document).ready(function() {
            // Fungsi untuk mendapatkan tanggal satu bulan sebelumnya
            function getPreviousMonthDate() {
                var now = new Date();
                var month = now.getMonth(); // Bulan saat ini (0-11)
                var year = now.getFullYear(); // Tahun saat ini

                // Kurangi satu bulan
                if (month === 0) { // Januari
                    month = 11; // Desember
                    year--; // Tahun sebelumnya
                } else {
                    month--;
                }

                // Format bulan dan tahun dalam format YYYY-MM
                var formattedMonth = ('0' + (month + 1)).slice(-2); // Tambahkan 1 karena bulan 0-11
                return `${year}-${formattedMonth}`;
            }

            // Setel nilai default periode2 ke satu bulan sebelumnya
            $('#periode2').val(getPreviousMonthDate());

            function getFormattedPeriode() {
                var periodeValue = $('#periode2').val();
                // Pastikan format sesuai dengan apa yang diharapkan backend
                return `${periodeValue}-01`;
            }

            // Tombol "Posting Data"
            $('#postingData2').click(function(e) {
                e.preventDefault();

                // Ambil nilai dari setiap input
                var periode = $('#periode2').val();
                var ipa = $('#ipa').val();
                var target = $('#target').val();
                var realisasi = $('#realisasi').val();

                // Format periode menjadi YYYY-MM-01 untuk dikirim ke backend
                var formattedPeriode = getFormattedPeriode();

                $.ajax({
                    url: 'assets/data/save-data/produksi-input.php',
                    method: 'POST',
                    data: {
                        periode: formattedPeriode, // Kirim tanggal yang diformat
                        ipa: ipa,
                        target: target,
                        realisasi: realisasi
                    },
                    success: function(response) {
                        console.log('Data berhasil disimpan:', response);
                        // Tampilkan pesan sukses
                        alert('Data berhasil disimpan');
                        // Kosongkan kembali kolom formulir
                        $('#periode2').val(getPreviousMonthDate()); // Reset ke satu bulan sebelumnya
                        $('#ipa').val('');
                        $('#target').val('');
                        $('#realisasi').val('');
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>