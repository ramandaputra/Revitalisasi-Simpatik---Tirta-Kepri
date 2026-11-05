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
    <title>SIMPATIK V2.0 - Aspek Operasional Posting</title>
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
                            <li class="active"><a href="#aspek-input" aria-expanded="true" data-toggle="collapse"><i class="la la-file-text"></i><span>Posting Kinerja</span></a>
                                <ul id="aspek-input" class="collapse list-unstyled show pt-0">
                                    <li><a href="aspek-keuangan-input.php">Aspek Keuangan</a></li>
                                    <li><a href="aspek-pelayanan-input.php">Aspek Pelayanan</a></li>
                                    <li><a class="active" href="aspek-operasional-input.php">Aspek Operasional</a></li>
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
                                <h2 class="page-header-title">Aspek Operasional</h2>
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
                                                                    <span class="title">Efisiensi Produksi & Air Tidak Berekening</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab2" data-toggle="tab">
                                                                    <span class="step">2</span>
                                                                    <span class="title">Jam Operasi & Tekanan Air</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab3" data-toggle="tab">
                                                                    <span class="step">3</span>
                                                                    <span class="title">Penggantian Meter Pelanggan</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-xl-14 mb-3">
                                                    <label class="form-control-label">Periode<span class="text-danger ml-2">*</span></label>
                                                    <input type="month" id="periode" class="form-control">
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane" id="tab1">
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Rasio Efisiensi Produksi</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Volume Produksi<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data1" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="form-control-label">Kapasitas Terpasang<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data2" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Hasil<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="hasil1" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-5">
                                                                <label class="form-control-label">Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="nilai1" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="form-control-label">Bobot Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="bobot1" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData1">Posting Data</a>
                                                            </div>
                                                        </div>
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Air Tidak Berekening</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Kehilangan<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data3" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Distribusi Air<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data4" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Hasil<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="hasil2" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-5">
                                                                <label class="form-control-label">Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="nilai2" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="form-control-label">Bobot Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="bobot2" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData2">Posting Data</a>
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
                                                    <div class="tab-pane" id="tab2">
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Jam Operasi</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Waktu Distribusi<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data5" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="form-control-label">Periode Evaluasi<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data6" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Hasil<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="hasil3" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-5">
                                                                <label class="form-control-label">Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="nilai3" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="form-control-label">Bobot Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="bobot3" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData3">Posting Data</a>
                                                            </div>
                                                        </div>
                                                        <div class="section-title mt-5 mb-5">
                                                            <h4>Tekanan Air Pelanggan</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Jumlah Pelanggan Tekanan > 0,7bar<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data7" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="form-control-label">Jumlah Pelanggan Aktif<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data8" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Hasil<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="hasil4" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-5">
                                                                <label class="form-control-label">Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="nilai4" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="form-control-label">Bobot Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="bobot4" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData4">Posting Data</a>
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
                                                            <h4>Penggantian Meter Pelanggan</h4>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-6 mb-3">
                                                                <label class="form-control-label">Jumlah Ganti Meter<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data9" class="form-control">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="form-control-label">Jumlah Pelanggan Aktif<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="data10" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Hasil<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="hasil5" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mb-5">
                                                                <label class="form-control-label">Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="nilai5" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="form-control-label">Bobot Nilai<span class="text-danger ml-2">*</span></label>
                                                                <input type="text" id="bobot5" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData5">Posting Data</a>
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
    <!-- Begin Vendor Js -->
    <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
    <script src="assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/components/wizard/form-wizard.min.js"></script>
    <!-- End Page Snippets -->
    <!-- Scrypt Data -->
    <script>
        // Function to format number with thousand separators (.)
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Function to remove thousand separators
        function unformatNumber(str) {
            return str.replace(/\./g, '');
        }

        // Function to recalculate and update values
        function recalculate() {
            // Rasio Efisiensi Produksi
            var hasilEfisiensiproduksi = (parseFloat(unformatNumber($('#data1').val())) / parseFloat(unformatNumber($('#data2').val())) * 100).toFixed(2);
            var nilaiEfisiensiproduksi;
            if (hasilEfisiensiproduksi >= 90) {
                nilaiEfisiensiproduksi = '5.0';
            } else if (hasilEfisiensiproduksi >= 80) {
                nilaiEfisiensiproduksi = '4.0';
            } else if (hasilEfisiensiproduksi >= 70) {
                nilaiEfisiensiproduksi = '3.0';
            } else if (hasilEfisiensiproduksi >= 60) {
                nilaiEfisiensiproduksi = '2.0';
            } else {
                nilaiEfisiensiproduksi = '1.0';
            }
            $('#hasil1').val(hasilEfisiensiproduksi);
            $('#nilai1').val(nilaiEfisiensiproduksi);
            $('#bobot1').val((0.07 * nilaiEfisiensiproduksi).toFixed(2));

            // Air Tidak Berekening
            var hasilAirtidakberekening = (parseFloat(unformatNumber($('#data3').val())) / parseFloat(unformatNumber($('#data4').val())) * 100).toFixed(2);
            var nilaiAirtidakberekening;
            if (hasilAirtidakberekening <= 25) {
                nilaiAirtidakberekening = '5.0';
            } else if (hasilAirtidakberekening > 25 && hasilAirtidakberekening <= 30) {
                nilaiAirtidakberekening = '4.0';
            } else if (hasilAirtidakberekening > 30 && hasilAirtidakberekening <= 35) {
                nilaiAirtidakberekening = '3.0';
            } else if (hasilAirtidakberekening > 35 && hasilAirtidakberekening <= 40) {
                nilaiAirtidakberekening = '2.0';
            } else {
                nilaiAirtidakberekening = '1.0';
            }
            $('#hasil2').val(hasilAirtidakberekening);
            $('#nilai2').val(nilaiAirtidakberekening);
            $('#bobot2').val((0.07 * nilaiAirtidakberekening).toFixed(2));

            // Jam Operasi
            var hasilJamoperasi = (parseFloat(unformatNumber($('#data5').val())) / parseFloat(unformatNumber($('#data6').val()))).toFixed(2);
            var nilaiJamoperasi;
            if (hasilJamoperasi >= 21 && hasilJamoperasi <= 24) {
                nilaiJamoperasi = '5.0';
            } else if (hasilJamoperasi >= 18 && hasilJamoperasi < 21) {
                nilaiJamoperasi = '4.0';
            } else if (hasilJamoperasi >= 16 && hasilJamoperasi < 18) {
                nilaiJamoperasi = '3.0';
            } else if (hasilJamoperasi >= 12 && hasilJamoperasi < 16) {
                nilaiJamoperasi = '2.0';
            } else {
                nilaiJamoperasi = '1.0';
            }
            $('#hasil3').val(hasilJamoperasi);
            $('#nilai3').val(nilaiJamoperasi);
            $('#bobot3').val((0.08 * nilaiJamoperasi).toFixed(2));

            // Tekanan Air
            var hasilTekananair = (parseFloat(unformatNumber($('#data7').val())) / parseFloat(unformatNumber($('#data8').val())) * 100).toFixed(2);
            var nilaiTekananair;
            if (hasilTekananair >= 80) {
                nilaiTekananair = '5.0';
            } else if (hasilTekananair >= 60 && hasilTekananair < 80) {
                nilaiTekananair = '4.0';
            } else if (hasilTekananair >= 40 && hasilTekananair < 60) {
                nilaiTekananair = '3.0';
            } else if (hasilTekananair >= 20 && hasilTekananair < 40) {
                nilaiTekananair = '2.0';
            } else {
                nilaiTekananair = '1.0';
            }
            $('#hasil4').val(hasilTekananair);
            $('#nilai4').val(nilaiTekananair);
            $('#bobot4').val((0.065 * nilaiTekananair).toFixed(2));

            // Penggantian Meter
            var hasilPenggantianmeter = (parseFloat(unformatNumber($('#data9').val())) / parseFloat(unformatNumber($('#data10').val())) * 100).toFixed(2);
            var nilaiPenggantianmeter;
            if (hasilPenggantianmeter >= 20) {
                nilaiPenggantianmeter = '5.0';
            } else if (hasilPenggantianmeter >= 15 && hasilPenggantianmeter < 20) {
                nilaiPenggantianmeter = '4.0';
            } else if (hasilPenggantianmeter >= 10 && hasilPenggantianmeter < 15) {
                nilaiPenggantianmeter = '3.0';
            } else if (hasilPenggantianmeter >= 5 && hasilPenggantianmeter < 10) {
                nilaiPenggantianmeter = '2.0';
            } else {
                nilaiPenggantianmeter = '1.0';
            }
            $('#hasil5').val(hasilPenggantianmeter);
            $('#nilai5').val(nilaiPenggantianmeter);
            $('#bobot5').val((0.05 * nilaiPenggantianmeter).toFixed(2));
        }

        $(document).ready(function() {
            // Fetch initial data and populate form fields
            $.ajax({
                url: 'assets/data/get-data/aspek-operasional.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#data1').val(formatNumber(parseFloat(data.data1)));
                    $('#data2').val(formatNumber(parseFloat(data.data2)));
                    $('#data3').val(formatNumber(parseFloat(data.data3)));
                    $('#data4').val(formatNumber(parseFloat(data.data4)));
                    $('#data5').val(formatNumber(parseFloat(data.data5)));
                    $('#data6').val(formatNumber(parseFloat(data.data6)));
                    $('#data7').val(formatNumber(parseFloat(data.data7)));
                    $('#data8').val(formatNumber(parseFloat(data.data8)));
                    $('#data9').val(formatNumber(parseFloat(data.data9)));
                    $('#data10').val(formatNumber(parseFloat(data.data10)));

                    // Recalculate initial values
                    recalculate();
                },
                error: function() {
                    alert('Failed to fetch data.');
                }
            });

            // Event listeners for recalculation
            $('#data1, #data2, #data3, #data4, #data5, #data6, #data7, #data8, #data9, #data10').on('input', recalculate);

            function getFormattedPeriode() {
                var periodeValue = $('#periode').val();
                return `${periodeValue}-01`;
            }

            // Posting data A
            $('#postingData1').on('click', function() {
                var postData1 = {
                    periode: getFormattedPeriode(),
                    postA1: unformatNumber($('#data1').val()),
                    postA2: unformatNumber($('#data2').val()),
                    postA3: $('#hasil1').val(),
                    postA4: $('#nilai1').val(),
                    postA5: $('#bobot1').val()
                };

                $.ajax({
                    url: 'assets/data/save-data/efisiensi-produksi.php',
                    type: 'POST',
                    data: postData1,
                    success: function(response) {
                        alert('Posting Data Rasio Efisiensi Produksi Berhasil.');
                    },
                    error: function() {
                        alert('Gagal Posting Data.');
                    }
                });
            });

            // Posting data B
            $('#postingData2').on('click', function() {
                var postData2 = {
                    periode: getFormattedPeriode(),
                    postB1: unformatNumber($('#data3').val()),
                    postB2: unformatNumber($('#data4').val()),
                    postB3: $('#hasil2').val(),
                    postB4: $('#nilai2').val(),
                    postB5: $('#bobot2').val()
                };

                $.ajax({
                    url: 'assets/data/save-data/air-tidak-berekening.php',
                    type: 'POST',
                    data: postData2,
                    success: function(response) {
                        alert('Posting Data Air Tidak Berekening Berhasil.');
                    },
                    error: function() {
                        alert('Gagal Posting Data.');
                    }
                });
            });

            // Posting data C
            $('#postingData3').on('click', function() {
                var postData3 = {
                    periode: getFormattedPeriode(),
                    postC1: unformatNumber($('#data5').val()),
                    postC2: unformatNumber($('#data6').val()),
                    postC3: $('#hasil3').val(),
                    postC4: $('#nilai3').val(),
                    postC5: $('#bobot3').val()
                };

                $.ajax({
                    url: 'assets/data/save-data/jam-operasi.php',
                    type: 'POST',
                    data: postData3,
                    success: function(response) {
                        alert('Posting Data Jam Operasi Berhasil.');
                    },
                    error: function() {
                        alert('Gagal Posting Data.');
                    }
                });
            });

            // Posting data D
            $('#postingData4').on('click', function() {
                var postData4 = {
                    periode: getFormattedPeriode(),
                    postD1: unformatNumber($('#data7').val()),
                    postD2: unformatNumber($('#data8').val()),
                    postD3: $('#hasil4').val(),
                    postD4: $('#nilai4').val(),
                    postD5: $('#bobot4').val()
                };

                $.ajax({
                    url: 'assets/data/save-data/tekanan-air.php',
                    type: 'POST',
                    data: postData4,
                    success: function(response) {
                        alert('Posting Data Tekanan Air Berhasil.');
                    },
                    error: function() {
                        alert('Gagal Posting Data.');
                    }
                });
            });

            // Posting data E
            $('#postingData5').on('click', function() {
                var postData5 = {
                    periode: getFormattedPeriode(),
                    postE1: unformatNumber($('#data9').val()),
                    postE2: unformatNumber($('#data10').val()),
                    postE3: $('#hasil5').val(),
                    postE4: $('#nilai5').val(),
                    postE5: $('#bobot5').val()
                };

                $.ajax({
                    url: 'assets/data/save-data/penggantian-meter.php',
                    type: 'POST',
                    data: postData5,
                    success: function(response) {
                        alert('Posting Data Penggantian Meter Berhasil.');
                    },
                    error: function() {
                        alert('Gagal Posting Data.');
                    }
                });
            });
        });
    </script>
    <!-- Scrypt Periode -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var date = new Date();
            date.setMonth(date.getMonth() - 1); // Mengurangi satu bulan

            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');

            var previousMonth = `${year}-${month}`;

            var periodeElements = document.querySelectorAll('#periode');
            periodeElements.forEach(function(input) {
                input.value = previousMonth;
            });
        });
    </script>
</body>

</html>